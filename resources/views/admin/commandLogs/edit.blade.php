@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.commandLog.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.command-logs.update", [$commandLog->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="box_id">{{ trans('cruds.commandLog.fields.box') }}</label>
                <select class="form-control select2 {{ $errors->has('box') ? 'is-invalid' : '' }}" name="box_id" id="box_id" required>
                    @foreach($boxes as $id => $entry)
                        <option value="{{ $id }}" {{ (old('box_id') ? old('box_id') : $commandLog->box->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('box'))
                    <div class="invalid-feedback">
                        {{ $errors->first('box') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.commandLog.fields.box_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="command">{{ trans('cruds.commandLog.fields.command') }}</label>
                <input class="form-control {{ $errors->has('command') ? 'is-invalid' : '' }}" type="text" name="command" id="command" value="{{ old('command', $commandLog->command) }}" required>
                @if($errors->has('command'))
                    <div class="invalid-feedback">
                        {{ $errors->first('command') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.commandLog.fields.command_helper') }}</span>
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