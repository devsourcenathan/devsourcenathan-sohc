<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    public function lodgment()
    {
        return $this->hasOne(Lodgment::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
