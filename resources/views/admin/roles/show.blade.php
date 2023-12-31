@extends('layouts.master')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.role.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    @if (Auth::guard('web')->check())
                        <a class="btn btn-default" href="{{ route('admin.roles.index') }}">
                            {{ trans('global.back_to_list') }}
                        </a>
                    @elseif(Auth::guard('client_users')->check())
                        <a class="btn btn-info btn-s" href="{{ route('admin.roles.index') }}">
                            {{ trans('global.back_to_list') }}
                        </a>
                    @endif
                </div>
                <table class="table table-bordered table-striped mt-2">
                    <tbody>
                        <tr>
                            <th>
                                {{ trans('cruds.role.fields.id') }}
                            </th>
                            <td>
                                {{ $role->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.role.fields.name') }}
                            </th>
                            <td>
                                {{ $role->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>{{ trans('cruds.role.fields.permissions') }}</th>
                            <td>
                                <div class="row">
                                    @foreach ($role->permissions()->orderBy('name')->get() as $permission)
                                        <div class="col-md-3">
                                            <span class="label label-info">{{ $permission->name }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </td>
                        </tr>

                    </tbody>
                </table>
                <div class="form-group">
                    @if (Auth::guard('web')->check())
                        <a class="btn btn-default" href="{{ route('admin.roles.index') }}">
                            {{ trans('global.back_to_list') }}
                        </a>
                    @elseif(Auth::guard('client_users')->check())
                        <a class="btn btn-info btn-s" href="{{ route('admin.roles.index') }}">
                            {{ trans('global.back_to_list') }}
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
