<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    public static string $USER_ROLE_CONST = 'REGULAR_USER';
    public static string $EMPLOYEE_ROLE_CONST = 'EMPLOYEE';
    public static string $ADMIN_ROLE_CONST = 'ADMIN';

    protected $fillable = [
        'name',
        'constant',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
