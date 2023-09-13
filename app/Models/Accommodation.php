<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accommodation extends Model
{
    use HasFactory;

    protected $fillable = [
        'checkin_date',
        'checkout_date',
        'room_type',
        'extra_checkin_date',
        'extra_checkout_date',
        'extra_room_type'
    ];

    public function guest()
    {
        return $this->belongsTo(Guest::class);
    }
}
