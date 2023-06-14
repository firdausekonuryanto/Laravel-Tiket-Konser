<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penonton extends Model
{
    use HasFactory;
    protected $guarded = ['id'];


    public function tikets()
    {
        return $this->hasMany(Tiket::class, 'id_penonton', 'id_user');
    }
}
