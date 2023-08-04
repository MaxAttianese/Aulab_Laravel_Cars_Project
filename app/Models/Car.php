<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = ["brand_id", "engine_id","model", "price", "buyer_id"];

    public function brand() {

        return $this->belongsTo(Brand::class);
    }

    public function engine() {

        return $this->belongsTo(Engine::class);
    }

    public function extras() {

        return $this->belongsToMany(Extra::class);
    }

    public function buyer() {

        return $this->belongsTo(Buyer::class);
    }
}
