<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


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

Route::get('/', [App\Http\Controllers\InicioController::class, 'index'])->name('inicio.index');
Auth::routes(['verify' =>true]);
Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.home');
Route::get('/admin/{imagen}/edit', [App\Http\Controllers\HomeController::class, 'edit'])->name('admin.edit');
Route::put('/admin/{imagen}', [App\Http\Controllers\HomeController::class, 'update'])->name('admin.update');

//------------------------------Personas

Route::get('/admin/nuevaPersona', [App\Http\Controllers\User::class, 'create'])->name('persona.create');
Route::get('/admin/personas', [App\Http\Controllers\User::class, 'index']);
Route::get('/admin/personas/{persona}', [App\Http\Controllers\User::class, 'show'])->name('persona.show');
Route::put('/admin/personas/{persona}', [App\Http\Controllers\User::class, 'update'])->name('persona.update');
Route::get('/admin/personas/{persona}/edit', [App\Http\Controllers\User::class, 'edit'])->name('persona.edit');
Route::post('/admin/personas', [App\Http\Controllers\User::class, 'store'])->name('persona.store');



//-------------------------------Servicios
Route::get('/admin/nuevaServicio', [App\Http\Controllers\ServicioController::class, 'create'])->name('servicio.create');
Route::get('/admin/servicios', [App\Http\Controllers\ServicioController::class, 'index']);
Route::get('/admin/servicios/{servicio}', [App\Http\Controllers\ServicioController::class, 'show'])->name('servicio.show');
Route::put('/admin/servicios/{servicios}', [App\Http\Controllers\ServicioController::class, 'update'])->name('servicio.update');
Route::get('/admin/servicios/{servicios}/edit', [App\Http\Controllers\ServicioController::class, 'edit'])->name('servicio.edit');
Route::post('/admin/servicios', [App\Http\Controllers\ServicioController::class, 'store'])->name('servicio.store');


//-------------------------------Producto
Route::get('/admin/nuevaProducto', [App\Http\Controllers\ProductoControlador::class, 'create'])->name('producto.create');
Route::get('/admin/productos', [App\Http\Controllers\ProductoControlador::class, 'index']);
Route::get('/admin/productos/{producto}', [App\Http\Controllers\ProductoControlador::class, 'show'])->name('producto.show');
Route::put('/admin/productos/{producto}', [App\Http\Controllers\ProductoControlador::class, 'update'])->name('producto.update');
Route::get('/admin/productos/{producto}/edit', [App\Http\Controllers\ProductoControlador::class, 'edit'])->name('producto.edit');
Route::post('/admin/productos', [App\Http\Controllers\ProductoControlador::class, 'store'])->name('producto.store');

//-------------------------------Productos
Route::get('/admin/nuevaProveedor', [App\Http\Controllers\ProveedorControlador::class, 'create'])->name('proveedor.create');
Route::get('/admin/proveedor', [App\Http\Controllers\ProveedorControlador::class, 'index']);
Route::get('/admin/proveedor/{proveedor}', [App\Http\Controllers\ProveedorControlador::class, 'show'])->name('proveedor.show');
Route::put('/admin/proveedor/{proveedor}', [App\Http\Controllers\ProveedorControlador::class, 'update'])->name('proveedor.update');
Route::get('/admin/proveedor/{proveedor}/edit', [App\Http\Controllers\ProveedorControlador::class, 'edit'])->name('proveedor.edit');
Route::post('/admin/proveedor', [App\Http\Controllers\ProveedorControlador::class, 'store'])->name('proveedor.store');

//-------------------------------Ventas
Route::get('/admin/nuevaVenta', [App\Http\Controllers\VentasController::class, 'create'])->name('venta.create');
Route::get('/admin/venta', [App\Http\Controllers\VentasController::class, 'index']);
Route::get('/admin/venta/{venta}', [App\Http\Controllers\VentasController::class, 'show'])->name('venta.show');
Route::put('/admin/venta/{venta}', [App\Http\Controllers\VentasController::class, 'update'])->name('venta.update');
Route::get('/admin/venta/{venta}/edit', [App\Http\Controllers\VentasController::class, 'edit'])->name('venta.edit');
Route::post('/admin/venta', [App\Http\Controllers\VentasController::class, 'store'])->name('venta.store');

//-------------------------------ROLES
Route::get('/admin/nuevaRol', [App\Http\Controllers\RolesControlador::class, 'create'])->name('rol.create');
Route::get('/admin/roles', [App\Http\Controllers\RolesControlador::class, 'index']);
Route::get('/admin/roles/{rol}', [App\Http\Controllers\RolesControlador::class, 'show'])->name('rol.show');
Route::put('/admin/roles/{rol}', [App\Http\Controllers\RolesControlador::class, 'update'])->name('rol.update');
Route::get('/admin/roles/{rol}/edit', [App\Http\Controllers\RolesControlador::class, 'edit'])->name('rol.edit');
Route::post('/admin/roles', [App\Http\Controllers\RolesControlador::class, 'store'])->name('rol.store');





//Rutas de estadistica

Route::get('/admin/estadistica', [App\Http\Controllers\EstadisticaController::class, 'index']);

Route::get('/admin/widgets', [App\Http\Controllers\EstadisticaController::class, 'widgets']);

