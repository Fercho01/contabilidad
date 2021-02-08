<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;
use Illuminate\Support\Facades\DB;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            [
                'name'          => 'Navegar usuarios',
                'slug'          => 'usuario.index',
                'description'   => 'Lista y navega todos los usuarios del sistema',
            ],
            [
                'name'          => 'Registrar usuario',
                'slug'          => 'usuario.registrar',
                'description'   => 'Registrar usuario al Sistema',
            ],
            [
                'name'          => 'Editar usuario',
                'slug'          => 'usuario.edit',
                'description'   => 'Podra editar cualquier dato de un usuario del sistema',
            ],
            /* *********************************************************************************************************************/
            //Roles
            [
                'name'          => 'Navegar roles',
                'slug'          => 'roles.index',
                'description'   => 'Lista y navega todos los roles del sistema',
            ],
            [
                'name'          => 'Creacion de roles',
                'slug'          => 'roles.create',
                'description'   => 'Podra crear nuevos roles en el sistema',
            ],
            [
                'name'          => 'Edicion de roles',
                'slug'          => 'roles.edit',
                'description'   => 'Podra editar cualquier dato de un rol del sistema',
            ],
            [
                'name'          => 'Eliminar roles',
                'slug'          => 'roles.destroy',
                'description'   => 'Podra eliminar cualquier rol del sistema',
            ],
            /* *********************************************************************************************************************/
            // Proveedor
            [
                'name'          => 'Navegar Proveedor',
                'slug'          => 'proveedor.index',
                'description'   => 'Lista y navega todos los proveedores del sistema',
            ],
            [
                'name'          => 'Creacion de proveedor',
                'slug'          => 'proveedor.registrar',
                'description'   => 'Podra crear nuevo proveedor en el sistema',
            ],
            [
                'name'          => 'Edicion de proveedor',
                'slug'          => 'proveedor.update',
                'description'   => 'Podra editar cualquier dato de un proveedor del sistema',
            ],
            [
                'name'          => 'Eliminar proveedor',
                'slug'          => 'proveedor.delete',
                'description'   => 'Podra eliminar cualquier proveedor del sistema',
            ],
            /* *********************************************************************************************************************/
            // Pedido Compra
            [
                'name'          => 'Navegar pedido compra',
                'slug'          => 'pedidoCompras.index',
                'description'   => 'Lista y navega todos los pedido compras del sistema',
            ],
            [
                'name'          => 'Creacion de pedido compra',
                'slug'          => 'pedidoCompras.registrar',
                'description'   => 'Podra crear nuevo pedido compras en el sistema',
            ],
            [
                'name'          => 'Edicion de pedido compra',
                'slug'          => 'pedidoCompras.actualizar',
                'description'   => 'Podra editar cualquier dato de un pedido compra del sistema',
            ],
            [
                'name'          => 'Eliminar pedido Compra',
                'slug'          => 'pedidoCompras.eliminar',
                'description'   => 'Podra eliminar cualquier pedido compra del sistema',
            ],
            /* *********************************************************************************************************************/
            // Libro Diario
            [
                'name'          => 'Navegar libro diarios',
                'slug'          => 'librodiario.index',
                'description'   => 'Lista y navega todos los libros diarios del sistema',
            ],
            [
                'name'          => 'Creacion de libro diario',
                'slug'          => 'librodiario.registrar',
                'description'   => 'Podra crear nuevo libro diario en el sistema',
            ],
            [
                'name'          => 'Edicion de libro diario',
                'slug'          => 'librodiario.actualizar',
                'description'   => 'Podra editar cualquier dato de un libro diario del sistema',
            ],
            [
                'name'          => 'Eliminar libro diario',
                'slug'          => 'librodiario.eliminar',
                'description'   => 'Podra eliminar cualquier libro diario del sistema',
            ],
            /* ****************************************************************************************************************/
            // Libro Mayor
            [
                'name'          => 'Navegar libro mayores',
                'slug'          => 'libromayor.index',
                'description'   => 'Lista y navega todos los libros mayores del sistema',
            ],
            [
                'name'          => 'Creacion de libro mayor',
                'slug'          => 'libromayor.registrar',
                'description'   => 'Podra crear nuevo libro mayor en el sistema',
            ],
            [
                'name'          => 'Edicion de libro mayor',
                'slug'          => 'libromayor.actualizar',
                'description'   => 'Podra editar cualquier dato de un libro mayor del sistema',
            ],
            [
                'name'          => 'Eliminar libro mayor',
                'slug'          => 'libromayor.eliminar',
                'description'   => 'Podra eliminar cualquier libro mayor del sistema',
            ],
            /* *************************************************************************************************************/
            // Asiento
            [
                'name'          => 'Navegar Asientos',
                'slug'          => 'asiento.index',
                'description'   => 'Lista y navega todos los asientos del sistema',
            ],
            [
                'name'          => 'Creacion de asiento',
                'slug'          => 'asiento.registrar',
                'description'   => 'Podra crear nuevo asiento en el sistema',
            ],
            [
                'name'          => 'Edicion de asiento',
                'slug'          => 'asiento.actualizar',
                'description'   => 'Podra editar cualquier dato de un asiento del sistema',
            ],
            [
                'name'          => 'Eliminar asiento',
                'slug'          => 'asiento.eliminar',
                'description'   => 'Podra eliminar cualquier asiento del sistema',
            ],
            /* *************************************************************************************************************/
            // Factura Compras
            [
                'name'          => 'Navegar factura compra',
                'slug'          => 'facturacompra.index',
                'description'   => 'Lista y navega todas las facturas compras del sistema',
            ],
            [
                'name'          => 'Creacion de factura compra',
                'slug'          => 'facturacompra.registrar',
                'description'   => 'Podra crear nueva factura compra en el sistema',
            ],
            [
                'name'          => 'Eliminar factura compra',
                'slug'          => 'facturacompra.eliminar',
                'description'   => 'Podra eliminar cualquier factura compra del sistema',
            ],
            /* *************************************************************************************************************/
            // Pagos Compras
            [
                'name'          => 'Navegar pago compras',
                'slug'          => 'pagocompra.index',
                'description'   => 'Lista y navega todas las pago compras del sistema',
            ],
            [
                'name'          => 'Creacion de pago compra',
                'slug'          => 'pagocompra.registrar',
                'description'   => 'Podra crear nueva pago compra en el sistema',
            ],
            [
                'name'          => 'Eliminar pago compra',
                'slug'          => 'pagocompra.eliminar',
                'description'   => 'Podra eliminar cualquier pago compra del sistema',
            ],
            /* ***************************************************************************************************************/
            // Cliente
            [
                'name'          => 'Navegar clientes',
                'slug'          => 'cliente.index',
                'description'   => 'Lista y navega todos los clientes del sistema',
            ],
            [
                'name'          => 'Creacion de cliente',
                'slug'          => 'cliente.registrar',
                'description'   => 'Podra crear nuevo cliente en el sistema',
            ],
            [
                'name'          => 'Edicion de cliente',
                'slug'          => 'cliente.actualizar',
                'description'   => 'Podra editar cualquier dato de un cliente del sistema',
            ],
            [
                'name'          => 'Eliminar cliente',
                'slug'          => 'cliente.eliminar',
                'description'   => 'Podra eliminar cualquier cliente del sistema',
            ],
            /* *************************************************************************************************************/
            // Pedido Venta
            [
                'name'          => 'Navegar pedido ventas',
                'slug'          => 'pedidoventa.index',
                'description'   => 'Lista y navega todos los pedido ventas del sistema',
            ],
            [
                'name'          => 'Creacion de pedido venta',
                'slug'          => 'pedidoventa.registrar',
                'description'   => 'Podra crear nuevo pedido venta en el sistema',
            ],
            [
                'name'          => 'Edicion de pedido venta',
                'slug'          => 'pedidoventa.actualizar',
                'description'   => 'Podra editar cualquier dato de un pedido venta del sistema',
            ],
            [
                'name'          => 'Eliminar pedido venta',
                'slug'          => 'pedidoventa.eliminar',
                'description'   => 'Podra eliminar cualquier pedido venta del sistema',
            ],
            /* *****************************************************************************************************************/
            // Factura Venta
            [
                'name'          => 'Navegar pago facturas ventas',
                'slug'          => 'facturaventa.index',
                'description'   => 'Lista y navega todas las facturas ventas del sistema',
            ],
            [
                'name'          => 'Creacion de factura venta',
                'slug'          => 'facturaventa.registrar',
                'description'   => 'Podra crear nueva factura venta en el sistema',
            ],
            [
                'name'          => 'Eliminar factura venta',
                'slug'          => 'facturaventa.eliminar',
                'description'   => 'Podra eliminar cualquier factura venta del sistema',
            ],
            /* *************************************************************************************************************/
            // Pagos Ventas
            [
                'name'          => 'Navegar pago pagos ventas',
                'slug'          => 'pagoventa.index',
                'description'   => 'Lista y navega todas las pagos ventas del sistema',
            ],
            [
                'name'          => 'Creacion de pago venta',
                'slug'          => 'pagoventa.registrar',
                'description'   => 'Podra crear nueva pago venta en el sistema',
            ],
            [
                'name'          => 'Eliminar pago venta',
                'slug'          => 'pagoventa.eliminar',
                'description'   => 'Podra eliminar cualquier pago venta del sistema',
            ]


        ]);
    }
}
