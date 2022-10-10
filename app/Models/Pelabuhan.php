<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelabuhan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function terminal()
    {
        return $this->belongsTo(Pendataanpelabuhan::class);
    }
}
