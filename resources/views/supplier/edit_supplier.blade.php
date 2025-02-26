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
                    <li>
                        <div class="flex items-center">
                            <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                            </svg>
                            <a href="{{route('getSupplier')}}" class="ml-1 text-sm font-medium text-gray-700 hover:text-indigo-600 md:ml-2">Supplier</a>
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
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="md:flex md:items-center md:justify-between mb-6">
                <div class="min-w-0 flex-1">
                    <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">Edit Data Supplier</h2>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 sm:p-6 text-gray-900">
                    
                    <form action="{{route('saveEditSupplier')}}" method="POST" class="space-y-4 sm:space-y-6">
                        @csrf
                        <input type="number" name="id" value="{{$supplier->id}}" hidden>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6">
                            <div class="space-y-2">
                                <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                                <input type="text" name="nama" id="nama" required value="{{$supplier->nama}}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    placeholder="Masukkan nama supplier">
                            </div>

                            <div class="space-y-2">
                                <label for="handphone" class="block text-sm font-medium text-gray-700">No HP</label>
                                <input type="number" name="handphone" id="handphone" required value="{{$supplier->handphone}}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    placeholder="Masukkan nomor handphone">
                            </div>

                            <div class="space-y-2">
                                <label for="nama_toko" class="block text-sm font-medium text-gray-700">Nama Toko / Agen</label>
                                <input type="text" name="nama_toko" id="nama_toko" required value="{{$supplier->nama_toko}}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    placeholder="Masukkan nama toko">
                            </div>

                            <div class="space-y-2">
                                <label for="provinsi_id" class="block text-sm font-medium text-gray-700">Provinsi</label>
                                <div class="relative">
                                    <select name="provinsi_id" id="provinsi_id" onchange="getKabupaten()" required
                                        class="mt-1 block w-full appearance-none rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                        <option value="">Pilih Provinsi</option>
                                        @foreach ($data_provinsi as $prov)
                                            <option value="{{$prov->id}}" {{$prov->id == $supplier->provinsi_id ? 'selected' : ''}}>{{$prov->deskripsi}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="space-y-2">
                                <label for="kabupaten_id" class="block text-sm font-medium text-gray-700">Kabupaten</label>
                                <div class="relative">
                                    <select name="kabupaten_id" id="kabupaten_id" onchange="getKecamatan()" required
                                        class="mt-1 block w-full appearance-none rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                        <option value="">Pilih Kabupaten</option>
                                        @foreach ($data_kabupaten as $kab)
                                            <option value="{{$kab->id}}" {{$kab->id == $supplier->kabupaten_id ? 'selected' : ''}}>{{$kab->deskripsi}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="space-y-2">
                                <label for="kecamatan_id" class="block text-sm font-medium text-gray-700">Kecamatan</label>
                                <div class="relative">
                                    <select name="kecamatan_id" id="kecamatan_id" onchange="getKelurahan()" required
                                        class="mt-1 block w-full appearance-none rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                        <option value="">Pilih Kecamatan</option>
                                        @foreach ($data_kecamatan as $kec)
                                            <option value="{{$kec->id}}" {{$kec->id == $supplier->kecamatan_id ? 'selected' : ''}}>{{$kec->deskripsi}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="space-y-2">
                                <label for="kelurahan_id" class="block text-sm font-medium text-gray-700">Kelurahan</label>
                                <div class="relative">
                                    <select name="kelurahan_id" id="kelurahan_id" required
                                        class="mt-1 block w-full appearance-none rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                        <option value="">Pilih Kelurahan</option>
                                        @foreach ($data_kelurahan as $kel)
                                            <option value="{{$kel->id}}" {{$kel->id == $supplier->kelurahan_id ? 'selected' : ''}}>{{$kel->deskripsi}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="space-y-2">
                                <label for="kode_pos" class="block text-sm font-medium text-gray-700">Kode POS</label>
                                <input type="number" name="kode_pos" id="kode_pos" required value="{{$supplier->kode_pos}}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    placeholder="Masukkan nomor kode POS">
                            </div>
                            <div class="space-y-2">
                                <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                                <textarea type="text" name="alamat" id="alamat" required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    placeholder="Masukkan alamat">{{$supplier->alamat}}</textarea>
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
            // Initialize Select2 on all select elements
            $('select').select2();
        });

        function getKabupaten(){
            var provinsi_id = $('#provinsi_id').val();
            var token = '{{ csrf_token() }}';
            var my_url = "{{ route('getKabupaten') }}";
            var formData = {
                '_token': token,
                'provinsi_id': provinsi_id
            };
            $.ajax({
                method: 'GET',
                url: my_url,
                data: formData,
                success: function(resp) {
                    var option = '<option value="">Pilih Kabupaten</option>'
                    $.each(resp, function( i, v ) {
                        option += `<option value="${v['id']}">${v['deskripsi']}</option>`
                    });

                    $('#kabupaten_id').html(option)
                },
                error: function(resp) {
                   console.log(resp)
                }
            });
        }

        function getKecamatan(){
            var kabupaten_id = $('#kabupaten_id').val();
            var token = '{{ csrf_token() }}';
            var my_url = "{{ route('getKecamatan') }}";
            var formData = {
                '_token': token,
                'kabupaten_id': kabupaten_id
            };
            $.ajax({
                method: 'GET',
                url: my_url,
                data: formData,
                success: function(resp) {
                    var option = '<option value="">Pilih Kecamatan</option>'
                    $.each(resp, function( i, v ) {
                        option += `<option value="${v['id']}">${v['deskripsi']}</option>`
                    });

                    $('#kecamatan_id').html(option)
                },
                error: function(resp) {
                   console.log(resp)
                }
            });
        }

        function getKelurahan(){
            var kecamatan_id = $('#kecamatan_id').val();
            var token = '{{ csrf_token() }}';
            var my_url = "{{ route('getKelurahan') }}";
            var formData = {
                '_token': token,
                'kecamatan_id': kecamatan_id
            };
            $.ajax({
                method: 'GET',
                url: my_url,
                data: formData,
                success: function(resp) {
                    var option = '<option value="">Pilih Kelurahan</option>'
                    $.each(resp, function( i, v ) {
                        option += `<option value="${v['id']}">${v['deskripsi']}</option>`
                    });

                    $('#kelurahan_id').html(option)
                },
                error: function(resp) {
                   console.log(resp)
                }
            });
        }



    </script>
</x-app-layout>
