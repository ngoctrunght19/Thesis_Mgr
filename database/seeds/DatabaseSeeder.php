<?php

use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
         $users =[
        
	        [
	            'username'    => 'admin',
	            "password" => Hash::make("admin"),
	            "quyen"  => "admin"
	        ],
	        [
	            'username'    => 'trung',
	            "password" => Hash::make("trung123"),
	            "quyen"  => "hv"
	        ],
	        [
	        	'username'    => 'giangvien',
	            "password" => Hash::make("giangvien"),
	            "quyen"  => "gv"
	        ]
	    ];
	    
	    DB::table('taikhoan')->delete();
	    foreach ($users as $user){
	//        User::create($user);
	    	DB::table('taikhoan')->insert($user);
	    }
    }
}
