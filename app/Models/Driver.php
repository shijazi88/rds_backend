<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Passport\HasApiTokens;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Driver extends Authenticatable
{
    use SoftDeletes, HasFactory;
    use HasApiTokens;

    public $table = 'drivers';

    protected $hidden = [
        'password',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const LANGUAGE_SELECT = [
        'en' => 'English',
        'ar' => 'Arabic',
    ];

    public const STATUS_SELECT = [
        'enabled'  => 'Enabled',
        'disabled' => 'Disabled',
    ];

    protected $fillable = [
        'name',
        'password',
        'status',
        'mobile',
        'email',
        'language',
        'lat',
        'lng',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
