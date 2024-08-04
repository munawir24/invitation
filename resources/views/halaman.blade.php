@extends('layouts.tamu-template')

@section('title')
    Pondok Pesantren Entrepreneur Dar Al-Raudhah
@endsection

@section('content-header')
    <div class="container">
        <div class="row mb-2">
            <div class="col-12">
                <h3 class="m-0"> Home</h3>
            </div><!-- /.col -->
            {{-- <div class="col-6">
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item" hidden><a href="#">Layout</a></li>
                    <li class="breadcrumb-item">Top Navigation</li>
                </ol>
            </div><!-- /.col --> --}}
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection

@section('content')
    <!-- Container untuk slideshow -->
    <div class="container">
        <div class="row">
            <!-- /.col-md-12 -->
            <div class="col-lg-12">
                <div class="card card-warning card-outline">
                    <div class="card-body">
                        <center>
                            <marquee class="rounded-sm" bgcolor='lime' style='color:;'>
                                <h2>SELAMAT DATANG</h2>
                            </marquee>
                            <marquee class="rounded-sm" direction="right" bgcolor='yellow'
                                style='color:black; font-family: aldhabi; padding-top: 10px;'>
                                <h2 class="text-bold">أَهْلًا وَسَهْلًا في المعهد الإسلامى دارالرّوضة</h2>
                            </marquee>
                            <marquee class="rounded-sm" direction="up" scrollamount="3" bgcolor='green'
                                style='color:#fff; text-align: center' border='1px solid black'>
                                <h2>PONDOK PESANTREN ENTREPRENEUR DAR AL-RAUDHAH</h2>
                            </marquee>
                        </center>
                    </div>
                </div>
            </div>
            <!-- /.col-md-6 -->
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="info-box bg-success shadow">
                    <span class="info-box-icon" style="width: 30%"><img src="{{ asset('pictures/FOTO_SAYYID.png') }}"
                            alt="" width="100%"></span>

                    <div class="info-box-content">
                        {{-- <span class="info-box-text">Likes</span> --}}
                        <span class="info-box-number">"Pendidikan bagi beliau adalah investasi sumber daya
                            manusia
                            yang paling menentukan bagi masa depan agama dan bangsa. Belajar harus menyenangkan
                            dan
                            mampu mengembangkan kecerdasan anak secara utuh (Basthotan fil’ilmi waljismi dan dzu
                            qolbin salim), sehingga anak mampu menyelesaikan permasalahan kehidupan guna meraih
                            kebahagiaan dunia akhirat"</span>

                        {{-- <div class="progress">
                            <div class="progress-bar" style="width: 70%"></div>
                        </div>
                        <span class="progress-description">
                            70% Increase in 30 Days
                        </span> --}}
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <div class="card card-warning card-outline" style="font-size: 14pt">
                    <div class="card-body" style="text-align: justify;">
                        <center>
                            <img src="{{ asset('pictures/logo_pondok.png') }}" alt="" width="25%">
                        </center>
                        <h4 class="text-bold text-center pt-3"><strong>VISI</strong></h4>
                        <div class="mb-3 text-center text-justify"><b>Menumbuh kembangkan insan kamil yang mandiri dan
                                terpadu, berilmu dan beramal, ber-akhlaqul karimah dan berpendidikan tinggi, dan berjiwa
                                Taqwallah</b></div>
                        <h4 class="text-center text-bold"><strong>MISI</strong></h4>
                        <ol>
                            <li>Mendidik dan membina serta menyiapkan manusia yang bertanggung jawab,
                                disiplin, dan berkepribadian luhur.</li>
                            <li>Merencanakan mekanisme da'wah yang efektif dan terpadu sesuai dengan kondisi sosial budaya
                                masyarakat,
                                dan tetap mempertahankan nilai yang sudah baik demi terwujudnya sistem masyarakat madani
                            </li>
                            <li>Menanam dan menumbuh kembangkan motivasi da'wah dengan berwirausaha.</li>
                            <li>Membangun sikap mental berwirausaha, yaitu percaya diri, sadar akan jati dirinya
                                adalah makhluq Allah, bermotivasi meraih suatu cita-cita, pantang menyerah, mau bekerja
                                keras,
                                kreatif, inovatif, berani mengambil resiko dengan perhitungan, berperilaku pemimpin yang
                                memiliki
                                visi kedepan, tanggap terhadap saran dan kritik, memiliki kemampuan empati dan keterampilan
                                sosial.
                                (mengaplikasikan kitab kuning).</li>
                            <li>Meningkatkan kecakapan dan keterampilan santri dibidang ilmu pengetahuan, teknologi, seni
                                dan budaya dengan dasar Agama yang kuat</li>
                            <li>Mendukung pelaksanaan program pemerintah yang tidak bertentangan dengan syari'at Islam dalam
                                mencerdaskan kehidupan bangsa, dan mewujudkan cita-cita luhur bangsa, serta meningkatkan
                                kualitas sumber daya manusia.</li>
                        </ol>
                    </div>
                </div>

            </div>
            <!-- /.col-md-6 -->
        </div>

    </div>
@endsection

@section('informasi')
    <div class="main-footer border-0">

    </div>
@endsection

@section('script')
    <script>
        // Mengambil elemen slideshow
        var myCarousel = document.getElementById('myCarousel');
        // Membuat objek Carousel dari elemen
        var carousel = new bootstrap.Carousel(myCarousel, {
            interval: 5000 // Waktu jeda dalam milidetik (10 detik)
        });
    </script>
@endsection
