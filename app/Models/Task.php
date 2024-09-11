<?php

namespace App\Models;

use App\Http\Resources\FailedRow\FailedRowResource;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $guarded = false;

    const STATUS_PROCESS = 1;
    const STATUS_SUCCESS = 2;
    const STATUS_ERROR = 3;

    public static function getStatuses(): array
{
    return [
        self::STATUS_PROCESS => 'Process',
        self::STATUS_SUCCESS => 'Success',
        self::STATUS_ERROR => 'Error while importing',
    ];
}

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function file(){
        return $this->belongsTo(File::class, 'file_id', 'id');
    }
    public function failedRows(){
        return $this->hasMany(FailedRow::class, 'task_id', 'id');
    }
}
