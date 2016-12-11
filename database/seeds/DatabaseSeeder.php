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
	            'username' => 'admin',
	            "password" => Hash::make("admin"),
	            "quyen"  => "admin",
	            "actived" => 1
	        ],

	        [
	        	'username' => 'khoa',
	            "password" => Hash::make("khoa"),
	            "quyen"  => "khoa",
	            "actived" => 1
	        ],

	        [
	            'username' => 'hocvien',
	            "password" => Hash::make("hocvien"),
	            "quyen"  => "hocvien",
	            "actived" => 1
	        ],

	        [
	        	'username'    => 'giangvien',
	            "password" => Hash::make("giangvien"),
	            "quyen"  => "giangvien",
	            "actived" => 1
	        ]
	    ];
	    
	    DB::table('taikhoan')->delete();
	    foreach ($users as $user){
	//        User::create($user);
	    	DB::table('taikhoan')->insert($user);
	    }

	    $khoa = [
        
	        [
	            'tenkhoa' => 'Công nghệ thông tin'
	        ],
	        [
	            'tenkhoa' => 'Điện tử viễn thông'
	        ],
	        [
	            'tenkhoa' => 'Vật lý kỹ thuật'
	        ]
	    ];
	//    DB::table('khoa')->delete();
	    foreach ($khoa as $kh){
	//        User::create($user);
	    	DB::table('khoa')->insert($kh);
	    }

	    $query = DB::table('khoa')->where('tenkhoa','Công nghệ thông tin')->get();
	    $makhoa = $query[0]->makhoa;

	    $query = DB::table('taikhoan')->where('username','khoa')->get();
	    $mataikhoan = $query[0]->id;
	    $canbokhoa = [ 
	        [
	            'id' => 'khoa',
	            'hoten' => 'Trần Văn Khoa',
	            'makhoa' => $makhoa,
	            'mataikhoan' => $mataikhoan,
	        ]
	    ];

	    DB::table('canbokhoa')->delete();
	    foreach ($canbokhoa as $cbk){
	//        User::create($user);
	    	DB::table('canbokhoa')->insert($cbk);
	    }
    }
}
