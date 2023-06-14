<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tiket extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function penonton()
    {
        return $this->belongsTo(Penonton::class, 'id_penonton', 'id_user');
    }
}
