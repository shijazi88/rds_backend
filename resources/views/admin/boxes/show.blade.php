@extends('layouts.master')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.box.title') }}
        </div>
        {{-- 
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif --}}


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
                        <tr>
                            <th>
                                {{ trans('cruds.box.fields.serial_number') }}
                            </th>
                            <td>
                                {{ $box->serial_number }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.box.fields.color') }}
                            </th>
                            <td>
                                {{ $box->color }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.box.fields.size') }}
                            </th>
                            <td>
                                {{ $box->size }}
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.boxes.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>

                @include('admin.boxes.commands', ['commands' => $commands])

            </div>
        </div>
    </div>
@endsection
