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

    public function getReference(){
        return $this->belongsTo($this->reference, 'reference_id', 'id');
    }
}
