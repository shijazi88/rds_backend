<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\TenantScoped;
use DateTimeInterface;

class SmsOtp extends Model
{
    use HasFactory;
    use TenantScoped;

    public $table = 'sms_otp';
    protected $dates = [
        'created_at',
        'updated_at',
    ];
    public const STATUS_SELECT = [
        'used'     => 'used',
        'not_used' => 'not_used',
    ];

    protected $fillable = [
        'mobile',
        'otp',
        'status',
        'created_at',
        'updated_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

   
}