@extends('layouts.master')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.box.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.boxes.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="required">{{ trans('cruds.box.fields.status') }}</label>
                            <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status"
                                id="statuss" required>
                                <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>
                                    {{ trans('global.pleaseSelect') }}</option>
                                @foreach (App\Models\Box::STATUS_SELECT as $key => $label)
                                    <option value="{{ $key }}"
                                        {{ old('status', 'enabled') === (string) $key ? 'selected' : '' }}>
                                        {{ $label }}
                                    </option>
                                @endforeach
                            </select>
                            @if ($errors->has('status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('status') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.box.fields.status_helper') }}</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="required" for="price">{{ trans('cruds.box.fields.price') }}</label>
                            <input class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" type="number"
                                name="price" id="price" value="{{ old('price', '') }}" step="0.01" required>
                            @if ($errors->has('price'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('price') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.box.fields.price_helper') }}</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="lat">{{ trans('cruds.box.fields.lat') }}</label>
                            <input class="form-control {{ $errors->has('lat') ? 'is-invalid' : '' }}" type="number"
                                name="lat" id="lat" value="{{ old('lat', '') }}" step="0.01">
                            @if ($errors->has('lat'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('lat') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.box.fields.lat_helper') }}</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="lng">{{ trans('cruds.box.fields.lng') }}</label>
                            <input class="form-control {{ $errors->has('lng') ? 'is-invalid' : '' }}" type="number"
                                name="lng" id="lng" value="{{ old('lng', '') }}" step="0.01">
                            @if ($errors->has('lng'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('lng') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.box.fields.lng_helper') }}</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="expiry_date">{{ trans('cruds.box.fields.expiry_date') }}</label>
                            <input class="form-control date {{ $errors->has('expiry_date') ? 'is-invalid' : '' }}"
                                type="text" name="expiry_date" id="expiry_date" value="{{ old('expiry_date') }}">
                            @if ($errors->has('expiry_date'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('expiry_date') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.box.fields.expiry_date_helper') }}</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <!-- New fields: serial_number, color, and size -->
                        <div class="form-group">
                            <label for="serial_number">{{ trans('cruds.box.fields.serial_number') }}</label>
                            <input class="form-control {{ $errors->has('serial_number') ? 'is-invalid' : '' }}"
                                type="text" name="serial_number" id="serial_number" value="{{ old('serial_number') }}">
                            @if ($errors->has('serial_number'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('serial_number') }}
                                </div>
                            @endif
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="color">{{ trans('cruds.box.fields.color') }}</label>
                            <input class="form-control {{ $errors->has('color') ? 'is-invalid' : '' }}" type="text"
                                name="color" id="color" value="{{ old('color') }}">
                            @if ($errors->has('color'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('color') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="size">{{ trans('cruds.box.fields.size') }}</label>
                            <input class="form-control {{ $errors->has('size') ? 'is-invalid' : '' }}" type="text"
                                name="size" id="size" value="{{ old('size') }}">
                            @if ($errors->has('size'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('size') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group mt-2">
                    <button class="btn btn-danger" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>


            </form>
        </div>
    </div>
@endsection
