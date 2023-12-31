@extends('layouts.master')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.order.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.orders.update', [$order->id]) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="required" for="client_id">{{ trans('cruds.order.fields.client') }}</label>
                            <select class="form-control select2 {{ $errors->has('client') ? 'is-invalid' : '' }}"
                                name="client_id" id="client_id" required>
                                @foreach ($clients as $id => $entry)
                                    <option value="{{ $id }}"
                                        {{ (old('client_id') ? old('client_id') : $order->client->id ?? '') == $id ? 'selected' : '' }}>
                                        {{ $entry }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('client'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('client') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.client_helper') }}</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="required" for="box_id">{{ trans('cruds.order.fields.box') }}</label>
                            <select class="form-control select2 {{ $errors->has('box') ? 'is-invalid' : '' }}"
                                name="box_id" id="box_id" required>
                                @foreach ($boxes as $id => $entry)
                                    <option value="{{ $id }}"
                                        {{ (old('box_id') ? old('box_id') : $order->box->id ?? '') == $id ? 'selected' : '' }}>
                                        {{ $entry }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('box'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('box') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.box_helper') }}</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="required" for="driver_id">{{ trans('cruds.order.fields.driver') }}</label>
                            <select class="form-control select2 {{ $errors->has('driver') ? 'is-invalid' : '' }}"
                                name="driver_id" id="driver_id" required>
                                @foreach ($drivers as $id => $entry)
                                    <option value="{{ $id }}"
                                        {{ (old('driver_id') ? old('driver_id') : $order->driver->id ?? '') == $id ? 'selected' : '' }}>
                                        {{ $entry }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('driver'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('driver') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.driver_helper') }}</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="required"
                                for="amount_before_vat">{{ trans('cruds.order.fields.amount_before_vat') }}</label>
                            <input class="form-control {{ $errors->has('amount_before_vat') ? 'is-invalid' : '' }}"
                                type="number" name="amount_before_vat" id="amount_before_vat"
                                value="{{ old('amount_before_vat', $order->amount_before_vat) }}" step="0.01" required>
                            @if ($errors->has('amount_before_vat'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('amount_before_vat') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.amount_before_vat_helper') }}</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="required" for="vat">{{ trans('cruds.order.fields.vat') }}</label>
                            <input class="form-control {{ $errors->has('vat') ? 'is-invalid' : '' }}" type="number"
                                name="vat" id="vat" value="{{ old('vat', $order->vat) }}" step="0.01"
                                required>
                            @if ($errors->has('vat'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('vat') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.vat_helper') }}</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="discount">{{ trans('cruds.order.fields.discount') }}</label>
                            <input class="form-control {{ $errors->has('discount') ? 'is-invalid' : '' }}" type="number"
                                name="discount" id="discount" value="{{ old('discount', $order->discount) }}"
                                step="0.01">
                            @if ($errors->has('discount'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('discount') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.discount_helper') }}</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="required"
                                for="amount_after_vat">{{ trans('cruds.order.fields.amount_after_vat') }}</label>
                            <input class="form-control {{ $errors->has('amount_after_vat') ? 'is-invalid' : '' }}"
                                type="number" name="amount_after_vat" id="amount_after_vat"
                                value="{{ old('amount_after_vat', $order->amount_after_vat) }}" step="0.01" required>
                            @if ($errors->has('amount_after_vat'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('amount_after_vat') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.amount_after_vat_helper') }}</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="delivery_date">{{ trans('cruds.order.fields.delivery_date') }}</label>
                            <input class="form-control datetime {{ $errors->has('delivery_date') ? 'is-invalid' : '' }}"
                                type="text" name="delivery_date" id="delivery_date"
                                value="{{ old('delivery_date', $order->delivery_date) }}">
                            @if ($errors->has('delivery_date'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('delivery_date') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.delivery_date_helper') }}</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="required">{{ trans('cruds.order.fields.status') }}</label>
                            <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status"
                                id="statuss" required>
                                <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>
                                    {{ trans('global.pleaseSelect') }}</option>
                                @foreach (App\Models\Order::status_SELECT as $key => $label)
                                    <option value="{{ $key }}"
                                        {{ old('status', $order->status) === (string) $key ? 'selected' : '' }}>
                                        {{ $label }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('status') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.status_helper') }}</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="address_id">{{ trans('cruds.order.fields.address') }}</label>
                            <select class="form-control select2 {{ $errors->has('address') ? 'is-invalid' : '' }}"
                                name="address_id" id="address_id">
                                @foreach ($addresses as $id => $entry)
                                    <option value="{{ $id }}"
                                        {{ (old('address_id') ? old('address_id') : $order->address->id ?? '') == $id ? 'selected' : '' }}>
                                        {{ $entry }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('address'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('address') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.address_helper') }}</span>
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
