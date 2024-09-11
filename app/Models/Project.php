<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $guarded = false;
    protected $with = ['type'];
    protected $dates = ['created_at_time', 'contracted_at', 'deadline'];

    public function type(){
        return $this->belongsTo(Type::class, 'type_id' , 'id');
    }
}
