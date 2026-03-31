<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barber_gallery extends Model
{
    protected $fillable = [
        'barber_id',
        'image_url'
    ];

    public function barber()
    {
        return $this->belongsTo(Barber::class);
    }
}