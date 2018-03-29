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

        $users = factory(User::class)->times(30)->make()->makeVisible([
            'password',
            'remember_token',
        ])->each(function($user,$index){
            $avatar=[
                'img/1.png',
                'img/2.png',
                'img/3.png',
                'img/4.png',
                'img/5.png',
            ];
            $from =array_random($avatar);
            $to = 'avatar/'.date('Ym/d',time()).'/'.str_random(10).'.png';

            Storage::disk('public')->copy($from, $to);
            $user->avatar = $to;
        });
        User::insert($users->toArray());

        $user           = User::find(1);
        $user->name     = 'soypablo';
        $user->email    = '25709255@qq.com';
        $user->password = bcrypt('123456');
        $user->save();

    }
}
