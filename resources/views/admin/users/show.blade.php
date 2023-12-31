@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.user.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.users.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>{{ trans('cruds.user.fields.id') }}</th>
                        <td>{{ $user->id }}</td>
                    </tr>
                    <tr>
                        <th>{{ trans('cruds.user.fields.name') }}</th>
                        <td>{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <th>{{ trans('cruds.user.fields.email') }}</th>
                        <td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <th>{{ trans('cruds.user.fields.email_verified_at') }}</th>
                        <td>{{ $user->email_verified_at }}</td>
                    </tr>
                    <tr>
                        <th>{{ trans('cruds.user.fields.roles') }}</th>
                        <td>
                            <div class="row">
                                @foreach ($user->roles as $key => $role)
                                    <div class="col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="roles[]"
                                                id="role_{{ $key }}" value="{{ $role->id }}" checked
                                                disabled>
                                            <label class="form-check-label" for="role_{{ $key }}">
                                                {{ $role->name }}
                                            </label>
                                        </div>
                                    </div>
                                    @if (($loop->index + 1) % 4 == 0)
                            </div>
                            <div class="row">
                                @endif
                                @endforeach
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.users.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
@endsection
