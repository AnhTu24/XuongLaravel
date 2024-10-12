<?php
namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    protected $fillable = [
        'username', 'password', 'fullname', 'image', 'email', 'phone', 'address', 'role', 'active',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getAuthIdentifierName()
    {
        return 'username'; // Trả về tên trường dùng để xác thực
    }

    public function getAuthPassword()
    {
        return $this->password; // Trả về mật khẩu đã được hash
    }

    public function isActive()
    {
        return $this->active == 1; // Kiểm tra xem người dùng đã kích hoạt chưa
    }
}
