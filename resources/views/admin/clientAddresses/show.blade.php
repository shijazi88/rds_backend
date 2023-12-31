@extends('layouts.master')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.clientAddress.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.client-addresses.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th>
                                {{ trans('cruds.clientAddress.fields.id') }}
                            </th>
                            <td>
                                {{ $clientAddress->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.clientAddress.fields.client') }}
                            </th>
                            <td>
                                {{ $clientAddress->client->mobile ?? '' }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.clientAddress.fields.lat') }}
                            </th>
                            <td>
                                {{ $clientAddress->lat }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.clientAddress.fields.lng') }}
                            </th>
                            <td>
                                {{ $clientAddress->lng }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.clientAddress.fields.name') }}
                            </th>
                            <td>
                                {{ $clientAddress->name }}
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.client-addresses.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
