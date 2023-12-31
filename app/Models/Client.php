<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'clients';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const LANGUAGE_SELECT = [
        'ar' => 'Arabic',
        'en' => 'English',
    ];

    public const STATUS_SELECT = [
        '1' => 'enabled',
        '2' => 'not enabled',
    ];

    protected $fillable = [
        'mobile',
        'name',
        'email',
        'fcm_token',
        'status',
        'language',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function addresses()
    {
        return $this->hasMany(ClientAddress::class);
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
