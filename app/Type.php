<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable = [ 'name'];
    public function tasks(){
        return $this->hasMany(Task::class,'type');
    }
}
