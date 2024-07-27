<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tipe Undangan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    Tipe Undangan
                </div>
                <div x-data="tableData" class="p-6 text-gray-900 dark:text-gray-100">
                    <table border="1" class="bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Dibuat</th>
                                <th>Diubah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <template x-for="row in rows" :key="row.id">
                                <tr>
                                    <td x-text="row.id"></td>
                                    <td x-text="row.nama"></td>
                                    <td x-text="row.created_at"></td>
                                    <td x-text="row.updated_at"></td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>

                <script>
                    function tableData() {
                        return {
                            rows: @json($data)
                        }
                    }
                </script>
            </div>
        </div>
    </div>
</x-app-layout>
