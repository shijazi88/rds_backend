<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'orders';

    protected $dates = [
        'delivery_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const status_SELECT = [
        'created'    => 'created',
        'cancelled'  => 'cancelled',
        'completed'  => 'completed',
        'inprogress' => 'inprogress',
    ];

    protected $fillable = [
        'client_id',
        'box_id',
        'driver_id',
        'amount_before_vat',
        'vat',
        'discount',
        'amount_after_vat',
        'delivery_date',
        'status',
        'address_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    // protected function serializeDate(DateTimeInterface $date)
    // {
    //     return $date->format('Y-m-d H:i:s');
    // }

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function box()
    {
        return $this->belongsTo(Box::class, 'box_id');
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class, 'driver_id');
    }

    // public function getDeliveryDateAttribute($value)
    // {
    //     return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    // }

    // public function setDeliveryDateAttribute($value)
    // {
    //     $this->attributes['delivery_date'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    // }

    public function address()
    {
        return $this->belongsTo(ClientAddress::class, 'address_id');
    }
}
