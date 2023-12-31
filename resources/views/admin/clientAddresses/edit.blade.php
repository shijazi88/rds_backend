@extends('layouts.master')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.clientAddress.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.client-addresses.update', [$clientAddress->id]) }}"
                enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="required" for="client_id">{{ trans('cruds.clientAddress.fields.client') }}</label>
                            <select class="form-control select2 {{ $errors->has('client') ? 'is-invalid' : '' }}"
                                name="client_id" id="client_id" required>
                                @foreach ($clients as $id => $entry)
                                    <option value="{{ $id }}"
                                        {{ (old('client_id') ? old('client_id') : $clientAddress->client->id ?? '') == $id ? 'selected' : '' }}>
                                        {{ $entry }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('client'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('client') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.clientAddress.fields.client_helper') }}</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="required" for="lat">{{ trans('cruds.clientAddress.fields.lat') }}</label>
                            <input class="form-control {{ $errors->has('lat') ? 'is-invalid' : '' }}" type="number"
                                name="lat" id="lat" value="{{ old('lat', $clientAddress->lat) }}" step="0.01"
                                required>
                            @if ($errors->has('lat'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('lat') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.clientAddress.fields.lat_helper') }}</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="required" for="lng">{{ trans('cruds.clientAddress.fields.lng') }}</label>
                            <input class="form-control {{ $errors->has('lng') ? 'is-invalid' : '' }}" type="number"
                                name="lng" id="lng" value="{{ old('lng', $clientAddress->lng) }}" step="0.01"
                                required>
                            @if ($errors->has('lng'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('lng') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.clientAddress.fields.lng_helper') }}</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="required" for="name">{{ trans('cruds.clientAddress.fields.name') }}</label>
                            <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text"
                                name="name" id="name" value="{{ old('name', $clientAddress->name) }}" required>
                            @if ($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.clientAddress.fields.name_helper') }}</span>
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
