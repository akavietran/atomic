<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Department extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'Department';
    public $timestamps = false;
    protected $fillable = [
        'code','name', 'parent_id','company_id'
    ];
    public function children() {
        return $this->hasMany(Department::class, 'parent_id', 'id');
    }
    
    public function parent() {
        return $this->belongsTo(Department::class, 'parent_id', 'id');
    }
    public function company()
    {
        return $this->belongsTo(Company::class);
    }


   
   
}
