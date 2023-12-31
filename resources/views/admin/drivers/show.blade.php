@extends('layouts.master')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.driver.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.drivers.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th>
                                {{ trans('cruds.driver.fields.id') }}
                            </th>
                            <td>
                                {{ $driver->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.driver.fields.name') }}
                            </th>
                            <td>
                                {{ $driver->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.driver.fields.password') }}
                            </th>
                            <td>
                                ********
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.driver.fields.status') }}
                            </th>
                            <td>
                                {{ App\Models\Driver::STATUS_SELECT[$driver->status] ?? '' }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.driver.fields.mobile') }}
                            </th>
                            <td>
                                {{ $driver->mobile }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.driver.fields.email') }}
                            </th>
                            <td>
                                {{ $driver->email }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.driver.fields.language') }}
                            </th>
                            <td>
                                {{ App\Models\Driver::LANGUAGE_SELECT[$driver->language] ?? '' }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.driver.fields.lat') }}
                            </th>
                            <td>
                                {{ $driver->lat }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.driver.fields.lng') }}
                            </th>
                            <td>
                                {{ $driver->lng }}
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.drivers.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
