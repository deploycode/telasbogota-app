<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
       'name'=>'Gabriel Rodríguez',
       'email'=>'gabriel@deploycode.co',
       'password'=>bcrypt('WebDeveloper1992'),
     ]);
     DB::table('users')->insert([
      'name'=>'Carlos García',
      'email'=>'ventas@telasbogota.com',
      'password'=>bcrypt('Rasputin2017'),
    ]);
    }
}
