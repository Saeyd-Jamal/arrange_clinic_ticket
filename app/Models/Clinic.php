<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];

    public function doctors(){
        return $this->hasMany(User::class);
    }
}
