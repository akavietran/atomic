<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Task extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'Task';
    public $timestamps = false;
    protected $fillable = ['project_id', 'person_id', 'start_time','end_time','priority','name','description','status'];
    
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
    public function person()
    {
         return $this->belongsTo(Person::class);
    }
    public function getPriorityName()
    {
        $priorityMap = [
            1 => 'Cao',
            2 => 'Trung bình',
            3 => 'Thấp',
        ];

        return $priorityMap[$this->priority] ?? '';
    }

    public function getStatusName()
    {
        $statusMap = [
            1 => 'Mới tạo',
            2 => 'Đang làm',
            3 => 'Hoàn thành',
            4 => 'Tạm hoãn',
        ];

        return $statusMap[$this->status] ?? '';
    }
}
