<?php

namespace App\Models;

use App\Traits\Auditable;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Box extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'boxes';

    public static $boxType = [
        [
            "id" => 1,
            "title" => "White Box",
            "descrption" => "Get White BOX Now",
            "price" => 1950,
            "image" => "https://rdsbox.sa/assets/images/pro5.png"
        ],
        [
            "id" => 2,
            "title" => "Black Box",
            "descrption" => "Get Black BOX Now",
            "price" => 1950,
            "image" => "https://rdsbox.sa/assets/images/pro6.png"
        ],
    ];

    public static $boxTypeAR = [
        [
            "id" => 1,
            "title" => "صندوق أبيض",
            "descrption" => "احصل على صندوقك باللون الأبيض",
            "price" => 1950,
            "image" => "https://rdsbox.sa/assets/images/pro5.png"
        ],
        [
            "id" => 2,
            "title" => "صندوق أسود",
            "descrption" => "احصل على صندوقك باللون الأسود",
            "price" => 1950,
            "image" => "https://rdsbox.sa/assets/images/pro6.png"
        ],
    ];

    public static function getPackageById($boxId)
    {
        $box = collect(self::$boxType)->firstWhere('id', $boxId);
        return $box;
    }

    public const STATUS_SELECT = [
        'available'  => 'available',
        'enabled'  => 'enabled',
        'assigned'  => 'assigned',
        'disabled' => 'disabled',
        'paid' => 'Paid',
    ];

    protected $dates = [
        'expiry_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'status',
        'client_id',
        'pass_codes',
        'serial_number',
        'size',
        'color',
        'price',
        'lat',
        'lng',
        'expiry_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function getExpiryDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setExpiryDateAttribute($value)
    {
        $this->attributes['expiry_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
