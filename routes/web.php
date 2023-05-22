<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmpresasController;
use App\Http\Controllers\OfertasController;
use App\Http\Controllers\UserController;
use App\Models\Ofertas;
use Illuminate\Support\Facades\Auth;

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

//esta es la primera ruta que se modifica, la raiz del proyecto, que sera un home personalizado con la vista de login

Route::get('/', function () {
    return view('homme');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/login', [SessionController::class, 'create'])->name('login.index');
Route::post('/login', [SessionController::class, 'store'])->name('login.store');
Route::post('/logout', [SessionController::class, 'destroy'])->name('logout');
Route::match(['get', 'post'], '/admin', [AdminController::class, 'index'])->name('admin.index');

Route::get('/register.index', [RegisterController::class, 'create'])->name('register.index');
Route::get('/register', [RegisterController::class, 'create'])->name('register.create');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');



Route::post('/admin/users', [AdminController::class, 'showUsers'])->name('users.index');

Route::delete('/admin/users/{id}', [AdminController::class, 'deleteUsers'])->name('users.destroy');
Route::get('/admin/users/create', [AdminController::class, 'create'])->name('users.create');
Route::post('/admin/users/update', [AdminController::class, 'update'])->name('users.update');


Route::match(['get', 'post'], 'admin/empresas', [EmpresasController::class, 'index'])->name('empresas.index');
Route::post('empresas/create', [EmpresasController::class, 'create'])->name('empresas.create');
Route::post('admin/empresas/store', [EmpresasController::class, 'store'])->name('empresas.store');
Route::get('admin/empresas/{empresa}/edit', [EmpresasController::class, 'update'])->name('empresas.edit');
Route::put('admin/empresas/{empresa}', [EmpresasController::class, 'update'])->name('empresas.update');
Route::get('admin/empresas/pdf', [EmpresasController::class, 'generatePDF'])->name('empresas.pdf');
Route::delete('admin/empresas/{empresa}', [EmpresasController::class, 'delete'])->name('empresas.destroy');


Route::get('admin/ofertas/index', [OfertasController::class, 'index'])->name('ofertas.index');
Route::get('ofertas-pdf', [OfertasController::class, 'generatePDF'])->name('ofertas.pdf');

Route::get('/ofertas/create', [OfertasController::class, 'create'])->name('ofertas.create');
Route::post('/ofertas', [OfertasController::class, 'store'])->name('ofertas.store');

Route::get('/ofertas/{id}/edit', [OfertasController::class, 'edit'])->name('ofertas.edit');
Route::put('/ofertas/{id}', [OfertasController::class, 'update'])->name('ofertas.update');

Route::delete('/ofertas/{id}', [OfertasController::class, 'destroy'])->name('ofertas.destroy');

Route::get('/user', [UserController::class, 'index'])->name('empleados.index');
Route::get('/actualizar-datos-grafico', [UserController::class, 'actualizarDatosGrafico'])->name('actualizarDatosGrafico');
Route::get('/total-ofertas', function () {
    $totalOfertas = App\Models\Ofertas::count();
    return response()->json(['total' => $totalOfertas]);
})->name('total-ofertas');



Route::get('/weather-data', [AdminController::class, 'getWeatherData'])->name('weather.data');