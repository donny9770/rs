<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserWithRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User;
        $admin->name = 'Administrator';
        $admin->email = 'admin@app.test';
        $admin->email_verified_at = date('Y-m-d H:i:s');
        $admin->password = bcrypt('123456789');
        $admin->role = 'admin';
        $admin->save();

        $admin = new User;
        $admin->name = 'Dokter';
        $admin->email = 'dokter@app.test';
        $admin->email_verified_at = date('Y-m-d H:i:s');
        $admin->password = bcrypt('123456789');
        $admin->role = 'dokter';
        $admin->save();
		
		$admin = new User;
        $admin->name = 'Staf Pelayanan';
        $admin->email = 'pel01@app.test';
        $admin->email_verified_at = date('Y-m-d H:i:s');
        $admin->password = bcrypt('123456789');
        $admin->role = 'pelayanan';
        $admin->save();
    }
}

