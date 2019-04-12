<?php
use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $author = Role::where('slug', 'author')->first();
        $editor = Role::where('slug', 'editor')->first();

        $user1 = User::create([
            'name' => 'Phóng viên 1',
            'email' => 'pv1@allaravel.dev',
            'password' => bcrypt('123456')
        ]);
        $user1->roles()->attach($author);

        $user2 = User::create([
            'name' => 'Phóng viên 2',
            'email' => 'pv2@allaravel.dev',
            'password' => bcrypt('123456')
        ]);
        $user2->roles()->attach($author);

        $user3 = User::create([
            'name' => 'Biên tập viên 1',
            'email' => 'btv1@allaravel.dev',
            'password' => bcrypt('123456')
        ]);
        $user2->roles()->attach($editor);

        //    $role_employee = Role::where('name', 'employee')->first();
        //    $role_manager  = Role::where('name', 'admin')->first();
        //    $role_saler = Role::where('name', 'saler')->first();

        //    $employee = new User();
        //    $employee->name = 'Employee Name';
        //    $employee->email = 'employee@example.com';
        //    $employee->password = bcrypt('123');
        //    $employee->save();
        //    $employee->roles()->attach($role_employee);

        //    $saler = new User();
        //    $saler->name = 'Saler Name';
        //    $saler->email = 'saler@example.com';
        //    $saler->password = bcrypt('123');
        //    $saler->save();
        //    $saler->roles()->attach($role_saler);

        //    $manager = new User();
        //    $manager->name = 'Admin Name';
        //    $manager->email = 'admin@example.com';
        //    $manager->password = bcrypt('123');
        //    $manager->save();
        //    $manager->roles()->attach($role_manager);
    }
}
