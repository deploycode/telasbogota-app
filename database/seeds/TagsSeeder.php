<?php

use Illuminate\Database\Seeder;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('tags')->insert([
       'name'=>'Algodón',
       'slug'=>'algodon',
      ]);
      DB::table('tags')->insert([
       'name'=>'Políester',
       'slug'=>'poliester',
      ]);
      DB::table('tags')->insert([
       'name'=>'Chalis',
       'slug'=>'chalis',
      ]);
      DB::table('tags')->insert([
       'name'=>'Asetato',
       'slug'=>'asetato',
      ]);
      DB::table('tags')->insert([
       'name'=>'Cariñosito',
       'slug'=>'carinosito',
      ]);
      DB::table('tags')->insert([
       'name'=>'Piel de conejo',
       'slug'=>'piel-de-conejo',
      ]);
      DB::table('tags')->insert([
       'name'=>'Lanilla',
       'slug'=>'lanilla',
      ]);
      DB::table('tags')->insert([
       'name'=>'Estampados',
       'slug'=>'estampados',
      ]);
      DB::table('tags')->insert([
       'name'=>'Unicolor',
       'slug'=>'unicolor',
      ]);
      DB::table('tags')->insert([
       'name'=>'Flores',
       'slug'=>'flores',
      ]);
      DB::table('tags')->insert([
       'name'=>'Rayas',
       'slug'=>'rayas',
      ]);
      DB::table('tags')->insert([
       'name'=>'Miniprint',
       'slug'=>'miniprint',
      ]);
      DB::table('tags')->insert([
       'name'=>'Arabescos',
       'slug'=>'arabescos',
      ]);
      DB::table('tags')->insert([
       'name'=>'Sócalos',
       'slug'=>'socalos',
      ]);
      DB::table('tags')->insert([
       'name'=>'Crepé',
       'slug'=>'crepe',
      ]);

    }
}
