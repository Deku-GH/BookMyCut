<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barber extends Model
{
    protected $fillable = [
        'user_id',
        'rating'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class);
    }

    public function timeSlots()
    {
        return $this->hasMany(TimeSlot::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function galleries()
    {
        return $this->hasMany(Barber_gallery::class);
    }

    public function ratings()
    {
        return $this->hasMany(Ratings::class);
    }
    public function address()
    {
        return $this->hasOne(Address::class);
    }
}