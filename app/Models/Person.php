<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
class Person extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    //full_name, gender, birthdate, phone_number, address
    protected $table = 'Person';
    public $timestamps = false;
    protected $fillable = ['full_name', 'gender', 'birthdate', 'phone_number', 'address', "company_id",'user_id'];
    public function user()
    {
        return $this->hasOne(User::class);
    }
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    
    public function projects()
    {
        return $this->belongsToMany(Project::class, 'person_project', 'person_id', 'project_id');
    }
    public function task()
    {
        return $this->hasMany(Task::class);
    }
}
