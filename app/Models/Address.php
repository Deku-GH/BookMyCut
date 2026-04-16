<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'city',
        'street',
        'code_post',
        'barber_id'
    ];

    public function barber()
    {
        return $this->belongsTo(Barber::class);
    }
}