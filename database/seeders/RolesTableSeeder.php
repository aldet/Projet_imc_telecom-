<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use mysql_xdevapi\Table;
Use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Role::truncate();
         Role::create(['name'=>'admin']);
         Role::create(['name'=>'manager']);
         Role::create(['name'=>'planificateur']);
         Role::create(['name'=> 'technicien']);
    }
}
