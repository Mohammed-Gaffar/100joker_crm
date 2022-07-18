<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = \App\User::create([
            'u_nameAr' => 'محمد جعفر',
            'u_nameEn'=>'mohammed gaffer',
//            'slug'=>'mohammed_gaffer',
            'identity_number'=>'2426931883',
            'email' => 'mg@ingaz.com',
            'password' => bcrypt('123456'),
            'phone'=>'0551316566',
            'code'=>'3002',
            'department'=>'information technology',
            'job_position'=>'programmer',
            'recruitment_date'=>date(now()),
            'status'=>'1',
//            'is_marketer'=>'1'

        ]);


        $user ->attachRole('super_admin');


        $user2 = \App\User::create([
            'u_nameAr' => 'test',
            'u_nameEn'=>'test',
//            'slug'=>'marketer',
            'identity_number'=>'11329878',
            'email' => 'test@test.com',
            'password' => bcrypt('123456'),
            'phone'=>'0546205458',
            'code'=>'3088',
            'department'=>'marketers',
            'job_position'=>'marketer',
            'recruitment_date'=>date(now()),
            'status'=>'1',

        ]);
        $user ->attachRole('admin');

    }
}
