<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'is_completed'
    ];

    public function labels(){
        return $this->belongsToMany(Label::class,'label_task','task_id','label_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
