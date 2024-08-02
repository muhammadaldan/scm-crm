<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Transaction extends Model
{
    use HasFactory, HasUuids;

    protected $guarded = [];

    public function barang(){
        return $this->belongsTo(Barang::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function pedangang(){
        return $this->belongsTo(Pedagang::class);
    }

    public function petani(){
        return $this->belongsTo(Petani::class);
    }

    public function industri(){
        return $this->belongsTo(Industri::class);
    }

    public function getReference(){
        return $this->belongsTo($this->reference, 'reference_id', 'id');
    }
}
