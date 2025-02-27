<x-app-layout>
    {{-- Breadcrumb --}}
    <div class="bg-gray-50 border-b py-2">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="{{ route('dashboard') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-indigo-600">
                            <svg class="w-3 h-3 mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                            </svg>
                            Dashboard
                        </a>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                            </svg>
                            <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">Produk</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="py-6 sm:py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="md:flex md:items-center md:justify-between mb-6">
                <div class="min-w-0 flex-1">
                    <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">Data Produk</h2>
                </div>
                <div class="min-w-0 flex-1 md:text-right">
                    <a href="{{route('inputProduk')}}" class="bg-indigo-500 text-white px-4 py-2 mb-1 rounded hover:bg-indigo-600 transition duration-200 inline-block">
                        <i class="fa-solid fa-plus"></i> Tambah Produk
                    </a>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 sm:p-6 text-gray-900">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-indigo-100">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Produk</th>
                                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">UPC</th>
                                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Foto Produk</th>
                                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Harga Satuan</th>
                                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Harga Grosir</th>
                                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($data_produk as $key => $pr)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{$key+1}}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{$pr->nama_produk}}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 text-center">{{$pr->upc}}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-center text-gray-800">
                                            <img src="{{$pr->url_gambar}}" alt="{{$pr->file_name}}" class="mt-2 w-full h-auto rounded-md" />
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-800 text-right max-w-md whitespace-nowrap">
                                            Rp. {{ number_format($pr->harga_pcs,0,',','.') }}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-800 text-right max-w-md whitespace-nowrap">
                                            Rp. {{ number_format($pr->harga_grosir,0,',','.') }}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-center">
                                            <a href="{{route('editProduk') . '?id=' . $pr->id}}" class="bg-blue-500 text-white px-4 py-2 mb-1 rounded hover:bg-blue-600 transition duration-200 inline-block">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                            <button onclick="hapusProduk({{$pr->id}})" class="bg-red-500 text-white px-4 py-2 mb-1 rounded hover:bg-red-600 transition duration-200">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function hapusProduk(id) {
            Swal.fire({
                title: "Yakin untuk menghapus data Produk?",
                showCancelButton: true,
                confirmButtonText: "Ya",
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    var my_url = "{{ route('hapusProduk') }}";
                    var formData = {
                        _token : '{{csrf_token()}}',
                        id : id
                    };
                    $.ajax({
                        method: 'POST',
                        url: my_url,
                        data: formData,
                        success: function(resp) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Data Produk berhasil di hapus'
                            });

                            location.reload()
                        },  
                        error: function(resp) {
                            Swal.fire({
                                icon: 'error',
                                title: resp.responseJSON.message
                            });
                        }
                    });
                } 
            });
        }
    </script>
    
</x-app-layout>