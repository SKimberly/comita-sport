<?php

use App\Events\WebsocketDemoEvent;
use Illuminate\Support\Facades\Route;

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

Route::get('/', 'WellcomeController@index');

Route::resource('smscontactos','AdminController');

Auth::routes();

Route::get('categorias/{slug}/productos','WellcomeController@show')->name('categoria.productos');

//Route::get('/home', 'HomeController@index')->name('home');
Route::group([
    'prefix' => 'admin',
    'middleware' => 'auth'],
function(){
    Route::get('/', 'AdminController@index')->name('admin');

    /*Route::get('/', function () {
        broadcast(new WebsocketDemoEvent('some data'));
        return  redirect()->action('AdminController@index');
    })->name('admin');*/

    Route::get('users/{slug}','UserController@show')->name('admin.users.show');
    Route::put('users/{slug}','UserController@create')->name('admin.users.create');


    //Rutas USUARIOS
    Route::get('users', 'UserController@index')->name('admin.users.index');
    Route::post('users', 'UserController@store')->name('admin.users.store');
    Route::get('users/{slug}/edit', 'UserController@edit')->name('admin.users.edit');
    Route::put('users/{slug}/update','UserController@update')->name('admin.users.update');
    Route::delete('users/{slug}/baja','UserController@destroy')->name('admin.users.delete');

    /*Estas rutas son para complementos*/
    Route::get('categorias', 'CategoriaController@index')->name('admin.categorias');
    Route::post('categorias', 'CategoriaController@store')->name('admin.categorias.store');
    Route::get('categorias/{slug}/edit', 'CategoriaController@edit')->name('admin.categorias.edit');
    Route::put('categorias/{slug}', 'CategoriaController@update')->name('admin.categorias.update');
    Route::delete('categorias/{slug}/baja', 'CategoriaController@destroy')->name('admin.categorias.delete');

    /*Rutas para tallas*/
    Route::get('tallas','TallaController@index')->name('admin.tallas.index');
    Route::post('tallas', 'TallaController@store')->name('tallas.store');
    Route::put('tallas/{slug}', 'TallaController@update')->name('admin.tallas.update');
    Route::delete('tallas/{slug}/baja', 'TallaController@destroy')->name('admin.tallas.delete');

    /*Rutas para materiales*/
    Route::get('materiales','MaterialController@index')->name('admin.materiales.index');
    Route::post('materiales', 'MaterialController@store')->name('materiales.store');
    Route::get('materiales/{slug}/edit', 'MaterialController@edit')->name('admin.materiales.edit');
    Route::put('materiales/{slug}', 'MaterialController@update')->name('admin.materiales.update');
    Route::delete('materiales/{slug}/baja', 'MaterialController@destroy')->name('admin.materiales.delete');


    /*Estas son rutas para los productos*/
    Route::get('productos','ProductoController@index')->name('admin.productos.index');
    Route::post('productos','ProductoController@store')->name('admin.productos.store');
    Route::get('productos/{slug}/edit','ProductoController@edit')->name('admin.productos.edit');
    Route::put('productos/{slug}','ProductoController@update')->name('admin.productos.update');
    Route::post('productos/{id}/fotos','ProductoController@storefotos');
    Route::delete('producto/foto/{id}/eliminar','ProductoController@deletefotos')->name('producto.foto.delete');
    Route::delete('producto/{id}/baja', 'ProductoController@destroy')->name('admin.productos.baja');
    Route::get('producto/{slug}/detalle','ProductoController@prodetalle')->name('admin.producto.detalles');

    /*Rutas para insertar productos al carrito*/
    Route::post('producto/{id}/carrito','CarritoDetalleController@show')->name('producto.detalle.carrito');
    Route::get('carrito/detalle','CarritoDetalleController@index')->name('carrito.detalle');
    Route::delete('producto/detalle/{id}/eliminar', 'CarritoDetalleController@destroy')->name('producto.carrito.delete');

    Route::post('carrito/ordenado','CarritoController@update')->name('admin.carrito.update');

    /*Aqui van las rutas de cotizaciones*/
    Route::get('cotizaciones','CotizacionController@index')->name('admin.cotizaciones.index');
    Route::post('cotizaciones','CotizacionController@store')->name('admin.cotizaciones.store');
    Route::get('cotizaciones/{slug}/edit','CotizacionController@edit')->name('admin.cotizaciones.edit');
    Route::put('cotizaciones/{slug}','CotizacionController@update')->name('admin.cotizaciones.update');

    Route::post('cotizaciones/{id}/fotos','CotizacionController@storefotos');
    Route::delete('cotizaciones/foto/{id}/eliminar','CotizacionController@deletefotos')->name('cotizacion.foto.delete');
    Route::get('cotizaciones/{slug}/show','CotizacionController@show')->name('admin.cotizaciones.show');
    Route::delete('cotizacion/{id}/eliminar', 'CotizacionController@destroy')->name('admin.cotizacion.delete');

    /*Rutas para pedidos*/
    Route::get('pedidos','PedidoController@index')->name('admin.pedidos.index');
    Route::get('pedidos/{id}/show','PedidoController@show')->name('admin.pedidos.show');
    Route::get('pedidos/{slug}/cotizacion','PedidoController@detallecoti')->name('admin.pedidos.detallecoti');



    /*Rutas para los mensajes*/
    Route::get('/cotizaciones/{id}/mensajesapi','MensajeController@fetchMessage');
    //Route::get('/cotizaciones/name/{id}','MensajeController@show')->name('admin.mensajes.name');
    Route::post('mensajes/cotizacion','MensajeController@store')->name('admin.mensajes.store');



    Route::post('cotizacion/money','CotizacionController@moneycoti')->name('admin.cotizacion.money');
    Route::get('cotizacion/{id}/pedido','CotizacionController@cotiapedido')->name('admin.cotizaciones.pedido');




    Route::get('ventas','VentaController@index')->name('admin.ventas.index');




    /*Ruta para imagen de deposito de pago*/





    /*Pedidos aprobados*/
    Route::get('aprobados','AprobadoController@index')->name('admin.aprobados');
    Route::get('aprobados/{id}/aprobado','AprobadoController@aprobado')->name('admin.aprobados.carriapro');
    Route::delete('carrito/{id}/rechazado','AprobadoController@rechazado')->name('admin.aprobados.carrirepro');
    Route::get('aprobados/{id}/cotiapro','AprobadoController@cotiaprobado')->name('admin.aprobados.cotiapro');
    Route::delete('cotizacion/{id}/rechazado','AprobadoController@cotirechazado')->name('admin.aprobados.cotirepro');

    Route::get('rechazados','AprobadoController@indexview')->name('admin.rechazados');


    Route::get('pagos','PagoController@index')->name('admin.pagos.index');

    Route::get('pagos/{id}/verifycarri','PagoController@verifycarri')->name('pago.verify.carrito');
    Route::get('pagos/{id}/verifycoti','PagoController@verifycoti')->name('pago.verify.cotizacion');

    Route::put('pagos/{id}/resverify','PagoController@resverify')->name('admin.pagos.resverify');

    Route::post('pago/carrito/pago','PagoController@carripago')->name('admin.ventas.carripago');
    Route::post('pago/cotizacion/pago','PagoController@cotipago')->name('admin.pagos.cotipago');


    Route::get('pago/img/{id}/carrito','PagoController@imgpagocarri')->name('aprobados.pagar.carrito');
    Route::get('pago/img/{slug}/cotizacion','PagoController@imgpagocoti')->name('aprobados.pagar.cotizacion');

    Route::post('pagos/img','PagoController@store')->name('admin.pagos.store');

    //Calendario
    Route::get('/calendario/view','AprobadoController@calendario')->name('admin.calendario.index');

    //Reportes
    Route::get('/reportes/view','ReporteController@index')->name('admin.reportes.index');

    Route::post('/reportes/tipo/view','ReporteController@vertipo')->name('reporte.tipo.view');
    Route::post('/reportes/coti/view','ReporteController@vercoti')->name('reporte.coti.view');
    Route::post('/reportes/prenda/view','ReporteController@verprenda')->name('reporte.prenda.view');


    Route::get('/estadisticas/view','ReporteController@estadisticas')->name('admin.estadisticas.index');

    Route::get('/recibo/{id}/aprobado','ReporteController@aproreciboca')->name('aprobados.recibo');

    }
);




