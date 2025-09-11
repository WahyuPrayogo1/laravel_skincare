<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\ExpiredProductNotification;

Route::get('/test-email', function () {
    $products = Product::whereDate('expired_at', '<=', Carbon::now()->addDays(30))
                       ->orderBy('expired_at', 'asc')
                       ->get();

    if ($products->count() > 0) {
        Mail::to('zaldinandika01@gmail.com')->send(new ExpiredProductNotification($products));
        return 'Email sudah dikirim dengan ' . $products->count() . ' produk!';
    }

    return 'Tidak ada produk expired atau hampir expired.';
});


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index']);
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');


Route::post('/import-products', [\App\Filament\Resources\ProductResource\Pages\ImportProducts::class, 'import'])
    ->name('product.import');

Route::get('/download-template', [\App\Filament\Resources\ProductResource\Pages\ImportProducts::class, 'downloadTemplate'])
    ->name('product.import.template');
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
