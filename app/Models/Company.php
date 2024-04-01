<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Company extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    //name, code, address
    protected $table = 'Company';
    public $timestamps = false;
    protected $fillable = [
        'name',
        'code',
        'address',
    ];
    public function person()
    {
        return $this->hasMany(Person::class);
    }
    public function department()
    {
        return $this->hasMany(Department::class);
    }
    public function project()
    {
        return $this->hasMany(Project::class);
    }
}
