<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Role;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'name' => 'Admin',
                'slug' => 'admin',
                'special' => 'all-access',//Permiso de todo los accesos
                'description' => 'Administrador del sistema',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
        ]);
    }
}
