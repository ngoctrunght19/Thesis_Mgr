<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'taikhoan';
    protected $fillable = [
        'username', 'password', 'quyen', 'id', 'actived'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    public function isAdmin() {
      return $this->quyen == 'admin';
    }

    public function isKhoa() {
      return $this->quyen == 'khoa';
    }

    public function isHocVien() {
      return $this->quyen == 'hocvien';
    }

    public function isGiangVien() {
      return $this->quyen == 'giangvien';
    }


}
