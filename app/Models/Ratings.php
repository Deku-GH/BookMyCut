<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ratings extends Model
{
    protected $fillable = [
        'user_id',
        'barber_id',
        'stars',
        'comment',
        'booking_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function booking()
    {
        return $this->belongsTo(Booking::class, 'booking_id');
    }
    public function barber()
    {
        return $this->belongsTo(Barber::class);
    }
}