<?php
use App\Admin;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {  DB::table('admins')->insert([
        'email' => 'admin@admin.com',
        'password' => bcrypt('123456'),

    ]);
    $admin= Admin::find(1);
    $admin->assignRole('admin');
    }
}
