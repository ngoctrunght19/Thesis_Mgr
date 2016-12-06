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
	        	'username'    => 'khoa',
	            "password" => Hash::make("khoa"),
	            "quyen"  => "khoa"
	        ],

	        [
	            'username'    => 'hocvien',
	            "password" => Hash::make("hocvien"),
	            "quyen"  => "hocvien"
	        ],

	        [
	        	'username'    => 'giangvien',
	            "password" => Hash::make("giangvien"),
	            "quyen"  => "giangvien"
	        ]
	    ];
	    
	    DB::table('taikhoan')->delete();
	    foreach ($users as $user){
	//        User::create($user);
	    	DB::table('taikhoan')->insert($user);
	    }
    }
}
