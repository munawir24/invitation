<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pesanan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index(){
        $no = 1;
        $no2 = 1;
        $no3 = 1;
        $data = User::where('role', '=', 'SUPER ADMIN')->get();
        $admin = User::where('role', '=', 'ADMIN')->get();
        $user = User::where('role', '=', 'USER')->get();
        $order = Pesanan::all();
        return view("auth.index",compact("data","order","admin","user","no","no2","no3"));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'role' => 'required|max:255',
            'id_slug' => 'nullable',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
            'foto' => 'nullable|image|max:2048'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->role = $request->role;
        $user->id_slug = $request->id_slug;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);


        // mengunggah file foto
        if ($request->hasFile('foto')) {
            $photo = $request->file('foto');
            $split2 = explode('.', $photo->getClientOriginalName());
            $format = str_replace('$', '', $split2[1]);
            $photoName = 'user-' . $request->role . '-' . Str::slug($request->name, '-') . '.' . $format;
            $photo->move(public_path('pictures/user'), $photoName);
            // $photo->move(public_path(asset('pictures/user')), $photoName);
            $user->foto = $photoName;
        } else {
            $user->foto = 'default_user.jpg';
        }

        $user->save();
        toast('Ok,Data User Berhasil Ditambahkan', 'success');
        return redirect()->route('user')->with('success', 'User Berhasil Dibuat');

        // return redirect()->route('user');
    }
    public function edit($id)
    {
        // $user = User::findOrFail($id);
        try {
            $user = User::find($id);
            return view('auth.edit', compact('user'));
        } catch (DecryptException $e) {
            // Redirect to the menu-pendaftaran route if decryption fails
            return redirect()->route('user');
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'level' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable',
            'photo' => 'nullable|image|max:2048'
        ]);

        $sekolah = $request->sekolah == null ? '' : ' - ' . $request->sekolah;
        $kelas = $request->kelas == null ? '' : ' - ' . $request->kelas;
        $penentuan = $kelas == null ? $sekolah : $kelas;

        $levels = $request->level . '' . $penentuan;
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->level = $request->level . '' . $penentuan;
        $user->email = $request->email;
        $foto_asal = $user->foto;

        // mengunggah file foto baru (jika ada)
        if ($request->hasFile('foto')) {
            $photo = $request->file('foto');
            $split2 = explode('.', $photo->getClientOriginalName());
            $format = str_replace('$', '', $split2[1]);
            $photoName = 'user_' . $levels . '_' . $request->name . '.' . $format;
            $photo->move(public_path('pictures/user'), $photoName);
            $user->foto = $photoName;
        }
        else {
            $user->foto = $foto_asal;
        }

        // update password (jika diinput)
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return redirect()->route('user')->with('success', 'Data User Berhasil Diperbarui');
    }

    public function destroy($id)
    {
        $user = user::find($id);
        $user->delete();
        toast('Ok, Data User Berhasil Dihapus', 'success');
        return redirect()->route('user');
    }
}
