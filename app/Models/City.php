<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = ['name', 'cost', 'department_id'];

    use HasFactory;
    
    public function districts(){
        return $this->hasMany(District::class);
    }

    public function orders(){
        return $this->hasMany(Order::class);
    }
}
