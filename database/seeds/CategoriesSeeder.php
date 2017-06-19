<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('categories')->insert([
       'name'=>'Moda para dama',
       'slug'=>'moda-para-dama',
       'description'=>'Tendencias en moda  para mujer, gama de colores, diferentes bases textiles, buenos precios',
      ]);
      DB::table('categories')->insert([
       'name'=>'Moda junior',
       'slug'=>'moda-junior',
       'description'=>'Colores de moda, diferentes telas, vestidos y conjuntos',
      ]);
      DB::table('categories')->insert([
       'name'=>'Telas para chaquetas',
       'slug'=>'telas-para-chaquetas',
       'description'=>'todos los forros de moda',
      ]);
    }
}
