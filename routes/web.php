<?php

use App\Http\Controllers\CitasController;
use App\Http\Controllers\ClienteHomeController;
use App\Http\Controllers\LoginClienteController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\clienteController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/eventos', function () {
    return view('partials.db-connection');
});
Route::get('/test', function () {
    return view('test');
});
Route::get('/index', function () {
    return view('index');
});
Route::get('/inicio', function () {
    return view('inicio');
})->name('inicio');
Route::get('/warning', function () {
    return view('auth.warning');
});


Route::get('/registersuccess', function () {
    return view('registersuccess');
})->name('registroSatisfactorio');


/* Inicio de sesion de clientes */
Route::get('/login', [LoginController::class, 'show'])->name('user.getLogin');
Route::post('/login', [LoginClienteController::class, 'login'])->name('user.postLogin');

/* Registro de Clientes */
Route::get('/register', [clienteController::class, 'show'])->name('user.getRegister');
Route::post('/register', [clienteController::class, 'store'])->name('user.postRegister');


///Controlar error de conexion de base de datos inexistene



/*                          Rutas de rol cliente                         */


Route::group(['prefix' => 'user', 'middleware' => ['logged']], function () {


    Route::get('/home', [HomeController::class, 'show'])->name('user.getHome');


    Route::get('/reservarCita', [CitasController::class, 'create'])->name('getFormCita');
    Route::post('/reservarCita', [CitasController::class, 'store'])->name('postFormCita');


    Route::get('/misCitas', [CitasController::class, 'userIndex'])->name('user.getIndexCita');

    Route::get('/misCitas/cancelarCita/{idCita}', [CitasController::class, 'cancelarCita'])->name('user.cancelarCita');

    Route::get('/settings', function () {
        return view('layout.workingOn');
    });
    Route::get('/settings/password', function () {
        return view('layout.workingOn');
    });


    
    
});

/*                  Rutas de rol administrador                 */

Route::prefix('admin')->group(function () {

    /* Inicio de sesion usuarios del sistema */
    
    /*  En desuso
    Route::get('/login', [LoginController::class, 'show'])->name('admin.getLogin');
    Route::post('/login', [LoginController::class, 'login'])->name('admin.PostLogin')

    Registro de usuario del sistema 

    Route::get('/register', [RegisterController::class, 'show'])->name('admin.GetRegister');
    Route::post('/register', [RegisterController::class, 'register'])->name('admin.PostRegister'); */



    Route::get('/home', [HomeController::class, 'show']);


    Route::get('/citas', [CitasController::class, 'showIndex'])->name('admin.cita.index');
    Route::get('/citas/{cita}/edit', [CitasController::class, 'edit'])->name('admin.cita.edit');
    Route::put('/citas/{cita}/update', [CitasController::class, 'update'])->name('admin.cita.update');
    Route::delete('/citas/{cita}/delete', [CitasController::class, 'destroy'])->name('admin.cita.delete');
    Route::GET('/citas/{cita}/delete', [CitasController::class, 'showIndex']);
    Route::get('/citas/actualizar/{id}', [CitasController::class, 'actualizarEstado'])->name('admin.actualizarEstadoCita');


    /* Calendario de citas */
    Route::get('/calendario', function () {
        return view('home.calendario');
    });


    Route::get('/clientes', function () {
        return view('layout.workingOn');
    });
    Route::get('/reservarCita', function () {
        return view('layout.workingOn');
    });
    Route::get('/pages', function () {
        return view('layout.workingOn');
    });
    Route::get('/settings', function () {
        return view('layout.workingOn');
    });
    Route::get('/settings/password', function () {
        return view('layout.workingOn');
    });
});


##

Route::get('logout', [LogoutController::class, 'logout']);
Route::post('logout', [LogoutController::class, 'logout']);
##
