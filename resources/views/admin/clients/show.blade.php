@extends('layouts.master')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.client.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.clients.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th>
                                {{ trans('cruds.client.fields.id') }}
                            </th>
                            <td>
                                {{ $client->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.client.fields.mobile') }}
                            </th>
                            <td>
                                {{ $client->mobile }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.client.fields.name') }}
                            </th>
                            <td>
                                {{ $client->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.client.fields.email') }}
                            </th>
                            <td>
                                {{ $client->email }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.client.fields.status') }}
                            </th>
                            <td>
                                {{ App\Models\Client::STATUS_SELECT[$client->status] ?? '' }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.client.fields.language') }}
                            </th>
                            <td>
                                {{ App\Models\Client::LANGUAGE_SELECT[$client->language] ?? '' }}
                            </td>
                        </tr>

                        <tr>
                            <th>
                                {{ trans('cruds.clientAddress.title') }}
                            </th>
                            <td>
                                @if ($clientAddresses->count() > 0)
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>{{ trans('cruds.clientAddress.fields.name') }}</th>
                                                <th>{{ trans('cruds.clientAddress.fields.lat') }}</th>
                                                <th>{{ trans('cruds.clientAddress.fields.lng') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($clientAddresses as $address)
                                                <tr>
                                                    <td>{{ $address->name }}</td>
                                                    <td>{{ $address->lat }}</td>
                                                    <td>{{ $address->lng }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    {{ trans('global.no_data_found') }}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.order.title') }}
                            </th>
                            <td>
                                @if ($orders->count() > 0)
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>{{ trans('cruds.order.fields.amount_before_vat') }}</th>
                                                <th>{{ trans('cruds.order.fields.vat') }}</th>
                                                <th>{{ trans('cruds.order.fields.discount') }}</th>
                                                <th>{{ trans('cruds.order.fields.amount_after_vat') }}</th>
                                                <th>{{ trans('cruds.order.fields.delivery_date') }}</th>
                                                <th>{{ trans('cruds.order.fields.status') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($orders as $order)
                                                <tr>
                                                    <td>{{ $order->amount_before_vat }}</td>
                                                    <td>{{ $order->vat }}</td>
                                                    <td>{{ $order->discount }}</td>
                                                    <td>{{ $order->amount_after_vat }}</td>
                                                    <td>{{ $order->delivery_date }}</td>
                                                    <td>{{ $order->status }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    {{ trans('global.no_data_found') }}
                                @endif
                            </td>
                        </tr>



                    </tbody>
                </table>



                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.clients.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
