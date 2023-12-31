<?php

namespace App\Traits;

use App\Scopes\TenantScope;
use Illuminate\Database\Eloquent\Builder;

trait TenantScoped
{

    public static function boot()
    {
        parent::boot();
    }
}
