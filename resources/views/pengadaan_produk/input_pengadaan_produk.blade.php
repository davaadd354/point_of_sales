<x-app-layout>
    <style>
        .select2-container--default .select2-selection--single {
            height: 42px;
            border-color: rgb(209 213 219);
            border-radius: 0.375rem;
        }
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 42px;
            padding-left: 12px;
        }
        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 40px;
        }
        .select2-container--default .select2-results__option {
            padding: 8px 12px;
        }
        .product-option {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .product-option img {
            width: 40px;
            height: 40px;
            object-fit: cover;
            border-radius: 4px;
        }
    </style>

    {{-- Breadcrumb --}}
    <div class="bg-gray-50 border-b py-2">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
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
                    <li>
                        <div class="flex items-center">
                            <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                            </svg>
                            <a href="{{route('getPengadaanProduk')}}" class="ml-1 text-sm font-medium text-gray-700 hover:text-indigo-600 md:ml-2">Pengadaan Produk</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                            </svg>
                            <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">Input Data</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="py-6 sm:py-12">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="md:flex md:items-center md:justify-between mb-6">
                <div class="min-w-0 flex-1">
                    <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">Input Pengadaan Produk</h2>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 sm:p-6 text-gray-900">
                    
                    <form action="{{route('saveInputPengadaanProduk')}}" method="POST" class="space-y-4 sm:space-y-6">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6">
                            <div class="space-y-2">
                                <label for="produk_id" class="block text-sm font-medium text-gray-700">Produk</label>
                                <div class="relative">
                                    <select name="produk_id" id="produk_id" required style="width: 100%;">
                                        <option value="0">Pilih Produk</option>
                                        @foreach ($data_produk as $pr)
                                            <option value="{{$pr->id}}" data-image="{{$pr->url_gambar}}" data-name="{{$pr->nama_produk}}">{{$pr->nama_produk}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="space-y-2">
                                <label for="supplier_id" class="block text-sm font-medium text-gray-700">Supplier</label>
                                <div class="relative">
                                    <select name="supplier_id" id="supplier_id" required
                                        class="mt-1 block w-full appearance-none rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                        <option value="">Pilih Supplier</option>
                                        @foreach ($data_supplier as $spl)
                                            <option value="{{$spl->id}}">{{$spl->nama_toko}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="space-y-2">
                                <label for="jumlah_pcs" class="block text-sm font-medium text-gray-700">Jumlah Pcs</label>
                                <input type="number" name="jumlah_pcs" id="jumlah_pcs" required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    placeholder="Masukkan jumlah Pcs">
                            </div>

                            <div class="space-y-2">
                                <label for="harga_modal_per_pcs" class="block text-sm font-medium text-gray-700">Harga Modal Per Pcs</label>
                                <input type="number" name="harga_modal_per_pcs" id="harga_modal_per_pcs" required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    placeholder="Masukkan harga modal per pcs">
                            </div>

                        </div>

                        <div class="flex justify-end mt-4 sm:mt-6">
                            <button type="submit" 
                                class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        $(document).ready(function() {
            $('#produk_id').select2({
                placeholder: 'Pilih Produk',
                templateResult: formatProduct,
                templateSelection: formatProduct
            });

            $('#supplier_id').select2()
        });

        function formatProduct(state) {
            if (!state.id) return state.text;

            var img_url = $(state.element).data('image')
            var view_img = `<img src="${img_url}"/>`
            var $state = $(
                `<div class="product-option">
                    ${img_url ? view_img : ''}
                    <span>${state.text}</span>
                </div>`
            );
            return $state;
        }
    </script>
</x-app-layout>
