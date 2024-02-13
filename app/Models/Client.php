<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Client extends Authenticatable
{
    use SoftDeletes, HasFactory;
    use HasApiTokens;
    use Notifiable;

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
        'enabled' => 'enabled',
        'not_enabled' => 'not enabled',
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
    public function boxes()
    {
        return $this->hasMany(Box::class);
    }
}
