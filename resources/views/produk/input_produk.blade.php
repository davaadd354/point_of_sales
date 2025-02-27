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
                            <a href="{{route('getProduk')}}" class="ml-1 text-sm font-medium text-gray-700 hover:text-indigo-600 md:ml-2">Produk</a>
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
                    <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">Input Data Supplier</h2>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 sm:p-6 text-gray-900">
                    
                    <form action="{{route('saveInputProduk')}}" method="POST" class="space-y-4 sm:space-y-6" enctype="multipart/form-data">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6">
                            <div class="space-y-2">
                                <label for="nama_produk" class="block text-sm font-medium text-gray-700">Nama Produk</label>
                                <input type="text" name="nama_produk" id="nama_produk" required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    placeholder="Masukkan nama produk">
                            </div>

                            <div class="space-y-2">
                                <label for="berat" class="block text-sm font-medium text-gray-700">Berat (gram)</label>
                                <input type="number" name="berat" id="berat" required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    placeholder="Masukkan berat per pcs">
                            </div>

                            <div class="space-y-2">
                                <label for="harga_pcs" class="block text-sm font-medium text-gray-700">Harga Satuan</label>
                                <input type="number" name="harga_pcs" id="harga_pcs" required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    placeholder="Masukkan harga satuan">
                            </div>

                            <div class="space-y-2">
                                <label for="harga_grosir" class="block text-sm font-medium text-gray-700">Harga Grosir</label>
                                <input type="number" name="harga_grosir" id="harga_grosir" required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    placeholder="Masukkan harga grosir">
                            </div>

                            <div class="space-y-2">
                                <label for="gambar" class="block text-sm font-medium text-gray-900">Upload Gambar <small>(Max:2mb)</small></label>
                                <div class="flex">
                                    <label class="flex items-center px-4 py-2 bg-gray-800 text-white rounded-l-lg hover:bg-gray-700 cursor-pointer">
                                        <span class="text-sm">Choose File</span>
                                        <input type="file" name="gambar" id="gambar" required accept="image/*" 
                                            onchange="previewImage(event)" class="hidden">
                                    </label>
                                    <div class="flex-1 px-3 py-2 bg-gray-50 border border-l-0 border-gray-300 rounded-r-lg">
                                        <span id="file-chosen" class="text-sm text-gray-500">No file chosen</span>
                                    </div>
                                </div>
                                <img id="imagePreview" class="mt-2 hidden w-full md:w-1/2 h-auto rounded-md" />
                            </div>

                            <div class="col-span-2 sm:col-span-1">
                                <label for="simbol" class="block mb-2 text-sm font-medium text-gray-900 md:flex">
                                    Barcode UPC Produk
                                </label>
                                <div class="flex">
                                    <button type="button" onclick="openBarcodeModal()" class="inline-flex items-center px-3 text-sm text-gray-900 bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l hover:text-white focus:outline-none border border-e-0 border-gray-300 rounded-s-md">
                                        <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd" d="M7.5 4.586A2 2 0 0 1 8.914 4h6.172a2 2 0 0 1 1.414.586L17.914 6H19a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h1.086L7.5 4.586ZM10 12a2 2 0 1 1 4 0 2 2 0 0 1-4 0Zm2-4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Z" clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                    <input type="text" id="upc" name="upc" class="rounded-none rounded-e-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 block flex-1 min-w-0 w-full text-sm p-2.5" placeholder="Masukan kode Barcode Produk" required="">
                                </div>
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

    <!-- Barcode Scanner Modal -->
    <div id="barcodeModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left w-full">
                            <h3 class="text-base font-semibold leading-6 text-gray-900 mb-4">Scan Barcode</h3>
                            <div class="mt-2">
                                <div id="reader" class="w-full"></div>
                            </div>
                            <div class="mt-2 text-center">
                                <span id="tampil_hasil_scan"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                    <button type="button" onclick="closeBarcodeModal()" class="mt-3 inline-flex w-full justify-center rounded-md bg-red-500 text-white px-3 py-2 text-sm font-semibold shadow-sm ring-1 ring-inset ring-red-400 hover:bg-red-200 sm:mt-0 sm:w-auto">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
    
    <script>
        $(document).ready(function() {
            // Initialize Select2 on all select elements
            $('select').select2();
        });

        function previewImage(event) {
            const fileInput = event.target;
            const fileChosen = document.getElementById('file-chosen');
            const imagePreview = document.getElementById('imagePreview');
            
            // Update the file name display
            if (fileInput.files.length > 0) {
                fileChosen.textContent = fileInput.files[0].name;
            } else {
                fileChosen.textContent = 'No file chosen';
            }

            // Preview the image
            if (fileInput.files && fileInput.files[0]) {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    imagePreview.classList.remove('hidden');
                }
                
                reader.readAsDataURL(fileInput.files[0]);
            } else {
                imagePreview.src = '';
                imagePreview.classList.add('hidden');
            }
        }

        let html5QrcodeScanner = null

        function openBarcodeModal() {
            document.getElementById('barcodeModal').classList.remove('hidden');
            // Initialize barcode scanner here if needed
            html5QrcodeScanner = new Html5QrcodeScanner(
                "reader",
                { fps: 20, qrbox: {width: 250, height: 150} },
                /* verbose= */ false
            );

            html5QrcodeScanner.render(onScanSuccess, onScanFailure);
        }

        function closeBarcodeModal() {
            document.getElementById('barcodeModal').classList.add('hidden');
        }

        function onScanSuccess(decodedText, decodedResult) {
            // handle the scanned code as you like, for example:
            console.log(`Code matched = ${decodedText}`, decodedResult);
            $('#upc').val(decodedText)
            html5QrcodeScanner.clear()
            closeBarcodeModal()
            // $('#tampil_hasil_scan').html(`Hasil Scan : ${decodedText}`)

        }

        function onScanFailure(error) {
        // handle scan failure, usually better to ignore and keep scanning.
        // for example:
        console.warn(`Code scan error = ${error}`);
        }

    </script>
</x-app-layout>
