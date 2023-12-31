<?php


namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class TenantScope implements Scope
{
    
    public function apply(Builder $builder, Model $model)
    {
        if(session()->has('client_id'))
        {
            \Log::info($model);
             $currentTenant = session()->get('client_id');
            if ($model instanceof \App\Models\Client) {
                $builder->where('id', $currentTenant);
            } elseif ($currentTenant) {
                $tableName = $builder->getModel()->getTable();
                $builder->where( $tableName.'.client_id', $currentTenant);
            } else {
                // Handle the case where the current tenant is null
            }
        } else{
            // \Log::error("no client for this user");
        }            
    }
}
