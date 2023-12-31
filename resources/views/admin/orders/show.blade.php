@extends('layouts.master')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.order.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.orders.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th>
                                {{ trans('cruds.order.fields.id') }}
                            </th>
                            <td>
                                {{ $order->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.order.fields.client') }}
                            </th>
                            <td>
                                @if ($order->client)
                                    <a href="{{ route('admin.clients.show', $order->client->id) }}">
                                        {{ $order->client->mobile ?? '' }}
                                    </a>
                                @else
                                    {{ trans('global.na') }}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.order.fields.box') }}
                            </th>
                            <td>
                                {{ $order->box->status ?? '' }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.order.fields.driver') }}
                            </th>
                            <td>
                                @if ($order->driver)
                                    <a href="{{ route('admin.drivers.show', $order->driver->id) }}">
                                        {{ $order->driver->name ?? '' }}
                                    </a>
                                @else
                                    {{ trans('global.na') }}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.order.fields.amount_before_vat') }}
                            </th>
                            <td>
                                {{ $order->amount_before_vat }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.order.fields.vat') }}
                            </th>
                            <td>
                                {{ $order->vat }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.order.fields.discount') }}
                            </th>
                            <td>
                                {{ $order->discount }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.order.fields.amount_after_vat') }}
                            </th>
                            <td>
                                {{ $order->amount_after_vat }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.order.fields.delivery_date') }}
                            </th>
                            <td>
                                {{ $order->delivery_date }}
                            </td>
                        </tr>

                        <tr>
                            <th>
                                {{ trans('cruds.order.fields.address') }}
                            </th>
                            <td>
                                @if ($order->address)
                                    <a href="{{ route('admin.client-addresses.show', $order->address->id) }}">
                                        {{ $order->address->name ?? '' }}
                                    </a>
                                @else
                                    {{ trans('global.na') }}
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.orders.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
