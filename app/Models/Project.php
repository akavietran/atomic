<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Project extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'Project';
    protected $fillable = ['code', 'name', 'description','company_id',];
    public $timestamps = false;
    public function persons()
    {
        return $this->belongsToMany(Person::class, 'person_project', 'project_id', 'person_id')->orderByPivot('project_id', 'asc')->orderByPivot('person_id', 'asc');
    }
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    public function task()
    {
        return $this->hasMany(Task::class);
    }
}
