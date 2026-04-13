<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'titre',
        'description',
        'duration',
        'barber_id',
        'category_id',
        'prix'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function barbers()
    {
        return $this->belongsToMany(Barber::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function galleries()
    {
        return $this->hasMany(ServiceGallery::class);
    }
}