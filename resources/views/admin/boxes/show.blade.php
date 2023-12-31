@extends('layouts.master')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.box.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.boxes.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th>
                                {{ trans('cruds.box.fields.id') }}
                            </th>
                            <td>
                                {{ $box->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.box.fields.status') }}
                            </th>
                            <td>
                                {{ App\Models\Box::STATUS_SELECT[$box->status] ?? '' }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.box.fields.price') }}
                            </th>
                            <td>
                                {{ $box->price }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.box.fields.lat') }}
                            </th>
                            <td>
                                {{ $box->lat }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.box.fields.lng') }}
                            </th>
                            <td>
                                {{ $box->lng }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.box.fields.expiry_date') }}
                            </th>
                            <td>
                                {{ $box->expiry_date }}
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.boxes.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
