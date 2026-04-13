<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TimeSlot extends Model
{
      protected $table = 'timeslots';
    protected $fillable = [
        'barber_id',
        'start_time',
        'end_time',
        'day'
    ];

    public function barber()
    {
        return $this->belongsTo(Barber::class);
    }

    public function booking()
    {
        return $this->hasOne(Booking::class);
    }
}