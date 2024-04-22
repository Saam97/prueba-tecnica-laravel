<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CreateController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LostPasswordController;
use App\Http\Controllers\NewPasswordController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\PreguntasController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UsuariosController;
use Illuminate\Support\Facades\Route;

// Login

Route::middleware('guest')->group(function () {
    Route::get('/', [LoginController::class, 'index'])->name('login.index');
    Route::post('/', [LoginController::class, 'login'])->name('login.user');
    Route::get('/registro', [CreateController::class, 'index'])->name('create.index');
    Route::post('/registro', [CreateController::class, 'create'])->name('create.user');
    Route::get('/olvide', [LostPasswordController::class, 'index'])->name('lost.index');
    Route::post('/olvide', [LostPasswordController::class, 'recovery'])->name('lost.recovery');
    Route::get('/reestablecer/{token}', [NewPasswordController::class, 'index'])->name('recovery.index');
    Route::put('/reestablecer/{token}', [NewPasswordController::class, 'newPassword'])->name('recovery.newpassword');
    Route::get('/confirmar-cuenta/{token}', [AuthController::class, 'confirmar'])->name('user-confirmar');
});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

//Confirmación de Cuenta
Route::get('/confirmar-cuenta/{token}', [AuthController::class, 'confirmar'])->name('user-confirmar');

//Area de Administracion
Route::middleware(['admin', 'auth:sanctum'])->group(function () {
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin-index');
Route::get('/admin/usuarios', [UsuariosController::class, 'index'])->name('admin-usuarios');
Route::get('/admin/usuarios/{id}', [UsuariosController::class, 'mostrarUsuario'])->name('admin-usuarios-id');

Route::get('/admin/preguntas', [PreguntasController::class, 'index'])->name('preguntas.index');
Route::get('/admin/preguntas/{id}', [PreguntasController::class, 'preguntaView'])->name('pregunta.view');
Route::post('/admin/preguntas/{id}', [PreguntasController::class, 'update'])->name('preguntas.update');
});

//Area Usuario Dashboard
Route::middleware(['auth', 'non_admin'])->group(function () {
Route::get('/user/dashboard', [DashboardController::class, 'indexUsuario'])->name('user.index');
Route::get('/user/perfil', [PerfilController::class, 'perfilIndex'])->name('perfil.index');
Route::post('/user/perfil', [PerfilController::class, 'update'])->name('user.update');
});

