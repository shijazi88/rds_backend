@extends('layouts.master')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.companyUser.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.company-users.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="required" for="compnay_id">{{ trans('cruds.companyUser.fields.compnay') }}</label>
                    <select class="form-control select2 {{ $errors->has('compnay') ? 'is-invalid' : '' }}" name="compnay_id"
                        id="compnay_id" required>
                        @foreach ($compnays as $id => $entry)
                            <option value="{{ $id }}" {{ old('compnay_id') == $id ? 'selected' : '' }}>
                                {{ $entry }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('compnay'))
                        <div class="invalid-feedback">
                            {{ $errors->first('compnay') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.companyUser.fields.compnay_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="name">{{ trans('cruds.companyUser.fields.name') }}</label>
                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text"
                        name="name" id="name" value="{{ old('name', '') }}" required>
                    @if ($errors->has('name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.companyUser.fields.name_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="password">{{ trans('cruds.companyUser.fields.password') }}</label>
                    <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password"
                        name="password" id="password" required>
                    @if ($errors->has('password'))
                        <div class="invalid-feedback">
                            {{ $errors->first('password') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.companyUser.fields.password_helper') }}</span>
                </div>
                <div class="form-group">
                    <button class="btn btn-danger" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
