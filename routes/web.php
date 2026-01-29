<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/* Clientes Routes */
Route::get('/clientes', [App\Http\Controllers\ClientesController::class, 'index'])->name('clientes.index');
Route::get('/clientes/create', [App\Http\Controllers\ClientesController::class, 'create'])->name('clientes.create');
Route::post('/clientes', [App\Http\Controllers\ClientesController::class, 'store'])->name('clientes.store');
Route::get('/clientes/{cliente}', [App\Http\Controllers\ClientesController::class, 'show'])->name('clientes.show');
Route::get('/clientes/{cliente}/edit', [App\Http\Controllers\ClientesController::class, 'edit'])->name('clientes.edit');
Route::put('/clientes/{cliente}', [App\Http\Controllers\ClientesController::class, 'update'])->name('clientes.update');
Route::delete('/clientes/{cliente}', [App\Http\Controllers\ClientesController::class, 'destroy'])->name('clientes.destroy');

/* Producto Routes */
Route::get('/producto', [App\Http\Controllers\ProductoController::class, 'index'])->name('producto.index');
Route::get('/producto/create', [App\Http\Controllers\ProductoController::class, 'create'])->name('producto.create');
Route::post('/producto', [App\Http\Controllers\ProductoController::class, 'store'])->name('producto.store');
Route::get('/producto/{producto}', [App\Http\Controllers\ProductoController::class, 'show'])->name('producto.show');
Route::get('/producto/{producto}/edit', [App\Http\Controllers\ProductoController::class, 'edit'])->name('producto.edit');
Route::put('/producto/{producto}', [App\Http\Controllers\ProductoController::class, 'update'])->name('producto.update');
Route::delete('/producto/{producto}', [App\Http\Controllers\ProductoController::class, 'destroy'])->name('producto.destroy');

/* Mascota Routes */
Route::get('/mascotas', [App\Http\Controllers\MascotasController::class, 'index'])->name('mascotas.index');
Route::get('/mascotas/create', [App\Http\Controllers\MascotasController::class, 'create'])->name('mascotas.create');
Route::post('/mascotas', [App\Http\Controllers\MascotasController::class, 'store'])->name('mascotas.store');
Route::get('/mascotas/{mascota}/edit', [App\Http\Controllers\MascotasController::class, 'edit'])->name('mascotas.edit');
Route::put('/mascotas/{mascota}', [App\Http\Controllers\MascotasController::class, 'update'])->name('mascotas.update');
Route::get('/mascotas/{mascota}', [App\Http\Controllers\MascotasController::class, 'show'])->name('mascotas.show');
Route::delete('/mascotas/{mascota}', [App\Http\Controllers\MascotasController::class, 'destroy'])->name('mascotas.destroy');

/* Citas Routes */
Route::get('/citas', [App\Http\Controllers\CitasController::class, 'index'])->name('citas.index');
Route::get('/citas/create', [App\Http\Controllers\CitasController::class, 'create'])->name('citas.create');
Route::post('/citas', [App\Http\Controllers\CitasController::class, 'store'])->name('citas.store');
Route::get('/citas/{cita}/edit', [App\Http\Controllers\CitasController::class, 'edit'])->name('citas.edit');
Route::put('/citas/{cita}', [App\Http\Controllers\CitasController::class, 'update'])->name('citas.update');
Route::get('/citas/{cita}', [App\Http\Controllers\CitasController::class, 'show'])->name('citas.show');
Route::delete('/citas/{cita}', [App\Http\Controllers\CitasController::class, 'destroy'])->name('citas.destroy');

/* Empleados Routes */
Route::get('/empleados', [App\Http\Controllers\EmpleadosController::class, 'index'])->name('empleados.index');
Route::get('/empleados/create', [App\Http\Controllers\EmpleadosController::class, 'create'])->name('empleados.create');
Route::post('/empleados', [App\Http\Controllers\EmpleadosController::class, 'store'])->name('empleados.store');
Route::get('/empleados/{empleado}/edit', [App\Http\Controllers\EmpleadosController::class, 'edit'])->name('empleados.edit');
Route::put('/empleados/{empleado}', [App\Http\Controllers\EmpleadosController::class, 'update'])->name('empleados.update');
Route::get('/empleados/{empleado}', [App\Http\Controllers\EmpleadosController::class, 'show'])->name('empleados.show');
Route::delete('/empleados/{empleado}', [App\Http\Controllers\EmpleadosController::class, 'destroy'])->name('empleados.destroy');