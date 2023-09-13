<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'mobile_no',
        'otp_code',
        'dob',
        'gender',
        'place_of_birth',
        'country_of_residency',
        'passport_no',
        'issue_date',
        'expiry_date',
        'place_of_issue',
        'arrival_date',
        'profession',
        'organization',
        'visa_duration',
        'visa_status',
        'passport_pic',
        'personal_pic',
        'companion_id',
        'accommodation_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function companion()
    {
        return $this->hasOne(Companion::class);
    }
    public function accommodation()
    {
        return $this->hasOne(Accommodation::class);
    }
}
