<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{
    use HasFactory;

    protected $fillable = ["firstname", "lastname"];

    public function cars() {

        return $this->hasMany(Car::class);
    }
}
