<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileUploadController;


Route::get('/', function () {
    return view('/auth/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/cadastro', function () {
    return view('cadastro');
})->name('cadastro')->middleware('auth'); // A chave Auth permite que qualquer usuário logado pode acessar o sistema

Route::middleware(['admin'])->group(function () {
    Route::get('/relatorio', function () {
        return view('relatorio');
    })->name('relatorio');

    Route::get('/pagamento', function () {
        return view('pagamento');
    })->name('pagamento');
});

Route::post('/upload', [FileUploadController::class, 'upload']);
Route::get('/store', function () {
    return view('store');
});

require __DIR__.'/auth.php';
