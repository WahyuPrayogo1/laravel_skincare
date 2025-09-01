<x-filament::page>
    <div class="space-y-6">
        <!-- Card untuk Form Import -->
        <div class="p-6 bg-white rounded-lg shadow">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-2xl font-bold">Import Products dari CSV</h2>
                <a href="{{ \App\Filament\Resources\ProductResource::getUrl('index') }}" class="text-primary-600 hover:text-primary-700 flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Kembali ke Daftar Produk
                </a>
            </div>

            <form action="{{ route('product.import') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Pilih File CSV</label>
                    <input type="file" name="csv_file" accept=".csv" required
                           class="block w-full text-sm text-gray-500
                                  file:mr-4 file:py-2 file:px-4
                                  file:rounded-full file:border-0
                                  file:text-sm file:font-semibold
                                  file:bg-primary-50 file:text-primary-700
                                  hover:file:bg-primary-100">
                </div>

                <div class="flex space-x-4">
                    <button type="submit"
                            class="inline-flex items-center px-4 py-2 bg-primary-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-primary-700 focus:bg-primary-700 active:bg-primary-900 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10"></path>
                        </svg>
                        Import Data
                    </button>

                    <a href="{{ route('product.import.template') }}"
                       class="inline-flex items-center px-4 py-2 bg-success-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-success-700 focus:bg-success-700 active:bg-success-900 focus:outline-none focus:ring-2 focus:ring-success-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                        </svg>
                        Download Template
                    </a>
                </div>
            </form>
        </div>

        <!-- Status Messages -->
        @if(session('imported'))
            <div class="p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span class="font-medium">Berhasil mengimport {{ session('imported') }} produk!</span>
                </div>
            </div>
        @endif

        @if(session('errors') && is_array(session('errors')) && count(session('errors')) > 0)
            <div class="p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
                <div class="flex items-center mb-2">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span class="font-medium">Terjadi {{ count(session('errors')) }} error:</span>
                </div>
                <ul class="list-disc list-inside ml-4 space-y-1">
                    @foreach(session('errors') as $error)
                        <li class="text-sm">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Validation Errors -->
        @if($errors->any())
            <div class="p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
                <div class="flex items-center mb-2">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span class="font-medium">Terjadi {{ $errors->count() }} error validasi:</span>
                </div>
                <ul class="list-disc list-inside ml-4 space-y-1">
                    @foreach($errors->all() as $error)
                        <li class="text-sm">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Petunjuk Import -->
        <div class="p-6 bg-white rounded-lg shadow">
            <h3 class="text-xl font-semibold mb-4">Petunjuk Import</h3>

            <div class="space-y-4">
                <div>
                    <h4 class="font-medium mb-2 text-gray-800">Format CSV yang Diperlukan:</h4>
                    <ul class="text-sm text-gray-600 space-y-1 list-disc list-inside">
                        <li><strong>Name</strong> - Nama produk (wajib)</li>
                        <li><strong>Kode Produk</strong> - Kode unik produk (wajib)</li>
                        <li><strong>Description</strong> - Deskripsi produk</li>
                        <li><strong>Category</strong> - Nama kategori</li>
                        <li><strong>Supplier</strong> - Nama supplier</li>
                        <li><strong>Price</strong> - Harga (contoh: 150000)</li>
                        <li><strong>Expired Date</strong> - Tanggal kadaluarsa (YYYY-MM-DD)</li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-medium mb-2 text-gray-800">Contoh Format:</h4>
                    <div class="bg-gray-100 p-4 rounded text-sm font-mono overflow-x-auto">
                        Name,Kode Produk,Description,Category,Supplier,Price,Expired Date<br>
                        Facial Wash,FW001,Pembersih wajah,Skincare,Supplier A,75000,2024-12-31<br>
                        Body Lotion,BL002,Lotion untuk tubuh,Body Care,Supplier B,120000,2025-06-30
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-filament::page>
