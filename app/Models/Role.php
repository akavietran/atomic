<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Role extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'Role';
    public $timestamps = false;
    protected $fillable = ['role', 'description'];
    public function user()
    {
        return $this->belongsToMany(User::class);
    }
}
