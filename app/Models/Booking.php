<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'user_id',
        'barber_id',
        'service_id',
        'time_slot_id',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function rating()
    {
        return $this->hasOne(Ratings::class, 'booking_id');
    }

    public function barber()
    {
        return $this->belongsTo(Barber::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function timeSlot()
    {
        return $this->belongsTo(TimeSlot::class);
    }

    public function notification()
    {
        return $this->hasOne(Notification::class);
    }
}
