@extends('layouts.master')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.permission.title_singular') }}
        </div>
        @if (Auth::guard('web')->check())
            <div class="card-body">
                <form method="POST" action="{{ route('admin.permissions.store') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="guard_name" value="web">

                    <div class="form-group">
                        <label class="required" for="name">{{ trans('cruds.permission.fields.name') }}</label>
                        <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text"
                            name="name" id="name" value="{{ old('name', '') }}" required>
                        @if ($errors->has('name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.permission.fields.title_helper') }}</span>
                    </div>
                    <div class="form-group mt-2">
                        <button class="btn btn-danger btn-s" type="submit">
                            {{ trans('global.save') }}
                        </button>
                        <a class="btn btn-info btn-s" href="{{ route('admin.permissions.index') }}">
                            {{ trans('global.back_to_list') }}
                        </a>
                    </div>
                </form>
            </div>
        @elseif(Auth::guard('client_users')->check())
            <div class="card-body">
                <form method="POST" action="{{ route('admin.client-permissions.store') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="guard_name" value="client_users">

                    <div class="form-group">
                        <label class="required" for="name">{{ trans('cruds.permission.fields.name') }}</label>
                        <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text"
                            name="name" id="name" value="{{ old('name', '') }}" required>
                        @if ($errors->has('name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.permission.fields.title_helper') }}</span>
                    </div>
                    <div class="form-group mt-2">
                        <button class="btn btn-danger btn-s" type="submit">
                            {{ trans('global.save') }}
                        </button>
                        <a class="btn btn-info btn-s" href="{{ route('admin.permissions.index') }}">
                            {{ trans('global.back_to_list') }}
                        </a>
                    </div>
                </form>
            </div>
        @endif
    </div>
@endsection
