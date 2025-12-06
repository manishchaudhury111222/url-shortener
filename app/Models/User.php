<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'password', 'role', 'company_id'];

    const ROLE_SUPER_ADMIN = 1;
    const ROLE_ADMIN = 2;
    const ROLE_MEMBER = 3;

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function urls()
    {
        return $this->hasMany(Url::class);
    }

    // Helper methods to check roles
    public function isSuperAdmin()
    {
        return $this->role === self::ROLE_SUPER_ADMIN;
    }
    public function isAdmin()
    {
        return $this->role === self::ROLE_ADMIN;
    }
    public function isMember()
    {
        return $this->role === self::ROLE_MEMBER;
    }
}