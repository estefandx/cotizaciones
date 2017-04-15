<?php

use Illuminate\Database\Seeder;
use App\Producto;

class ProductoTablaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productos = factory(Producto::class)->times(80)->create();
    }
}
