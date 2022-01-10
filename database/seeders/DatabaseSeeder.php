<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\TipoDePago;
use App\Models\Producto;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([RoleSeeder::class]);

        $this->call([UsersTableSeeder::class]);

        $user1 = TipoDePago::create([
            'nombre'=> 'Tarjeta',
        ]);
        $user2 = TipoDePago::create([
            'nombre'=> 'Efectivo',
        ]);

        $user3 = Producto::create([
            'nombre'=> 'Zapato',
            'precio_mayor'=> 100,
            'precio_unidad'=> 150,
            'stock'=> 20,
        ]);
        $user4 = Producto::create([
            'nombre'=> 'Pantalon',
            'precio_mayor'=> 200,
            'precio_unidad'=> 350,
            'stock'=> 20,
        ]);
    }
}
