<?php
namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   User::truncate();
        DB::table('role_user')->truncate();
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@nowui.com',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
          $manager=User::create([
            'name' => 'Manger',
            'email' => 'manager@nowui.com',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

          $planificateur=User::create([
            'name' => 'Planificateur',
            'email' => 'planificateur@nowui.com',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $technicien=User::create([
            'name' => 'George',
            'email' => 'george@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('george'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $adminRole=Role::where('name','admin')->first();
        $managerRole=Role::where('name','manager')->first();
        $planificateurRole=Role::where('name','planificateur')->first();
        $technicienRole=Role::where('name','technicien')->first();
        $manager->roles()->attach($managerRole);
        $planificateur->roles()->attach($planificateurRole);
        $technicien->roles()->attach($technicienRole);

    }
}
