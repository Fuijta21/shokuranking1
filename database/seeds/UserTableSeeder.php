<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1;$i <=30 ; $i++){
            DB::table('user')->insert([
                'name'=>"テストユーザ{$i}",
                'email'=>"test{$i}@example.com",
                'password'=>"password{$i}",
                'shoukaibun'=>"{$i}",
                'age'=>"3",
                'gender'=>"otoko",
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
                'deleted_at'=>NULL,]);
        }
    }
}
