<?php

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {

        $users = factory(User::class)->times(10)->make()->makeVisible([
            'password',
            'remember_token',
        ])->toArray();
        User::insert($users);

        $user           = User::find(1);
        $user->name     = 'soypablo';
        $user->email    = '25709255@qq.com';
        $user->password = bcrypt('123456');
        $user->avatar   = \Illuminate\Support\Facades\Storage::url('avatar/2018/03/16/1_1521186874.jpg');
        $user->save();

    }
}
