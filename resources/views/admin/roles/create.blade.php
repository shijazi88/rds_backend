@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.role.title_singular') }}
        </div>

        @if (Auth::guard('web')->check())
            <div class="card-body">
                <form method="POST" action="{{ route('admin.roles.store') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="guard_name" value="web">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="required" for="name">{{ trans('cruds.role.fields.name') }}</label>
                                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text"
                                    name="name" id="name" value="{{ old('name', '') }}" required>
                                @if ($errors->has('name'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('name') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.role.fields.title_helper') }}</span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="required">{{ trans('cruds.role.fields.permissions') }}</label>
                                <div style="padding-bottom: 4px">
                                    <button type="button" class="btn btn-info btn-xs select-all"
                                        style="border-radius: 0">{{ trans('global.select_all') }}</button>
                                    <button type="button" class="btn btn-info btn-xs deselect-all"
                                        style="border-radius: 0">{{ trans('global.deselect_all') }}</button>
                                </div>
                                <div class="row">
                                    @foreach ($permissions as $id => $permission)
                                        <div class="col-md-3">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input switch" type="checkbox" name="permissions[]"
                                                    id="permission_{{ $id }}" value="{{ $id }}"
                                                    {{ in_array($id, old('permissions', [])) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="permission_{{ $id }}">
                                                    {{ $permission }}
                                                </label>
                                            </div>
                                        </div>
                                        @if (($loop->index + 1) % 4 == 0)
                                </div>
                                <div class="row">
        @endif
        @endforeach
    </div>
    @if ($errors->has('permissions'))
        <div class="invalid-feedback">
            {{ $errors->first('permissions') }}
        </div>
    @endif
    <span class="help-block">{{ trans('cruds.role.fields.permissions_helper') }}</span>
    </div>
    </div>
    </div>
    <div class="form-group">
        <button class="btn btn-danger" type="submit">
            {{ trans('global.save') }}
        </button>
    </div>
    </form>
    </div>
@elseif(Auth::guard('client_users')->check())
    <div class="card-body">
        <form method="POST" action="{{ route('admin.client-roles.store') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="guard_name" value="client_users">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="required" for="name">{{ trans('cruds.role.fields.name') }}</label>
                        <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text"
                            name="name" id="name" value="{{ old('name', '') }}" required>
                        @if ($errors->has('name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.role.fields.title_helper') }}</span>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="required">{{ trans('cruds.role.fields.permissions') }}</label>
                        <div style="padding-bottom: 4px">
                            <button type="button" class="btn btn-info btn-xs select-all"
                                style="border-radius: 0">{{ trans('global.select_all') }}</button>
                            <button type="button" class="btn btn-info btn-xs deselect-all"
                                style="border-radius: 0">{{ trans('global.deselect_all') }}</button>
                        </div>
                        <div class="row">
                            @foreach ($permissions as $id => $permission)
                                <div class="col-md-3">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input switch" type="checkbox" name="permissions[]"
                                            id="permission_{{ $id }}" value="{{ $id }}"
                                            {{ in_array($id, old('permissions', [])) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="permission_{{ $id }}">
                                            {{ $permission }}
                                        </label>
                                    </div>
                                </div>
                                @if (($loop->index + 1) % 4 == 0)
                        </div>
                        <div class="row">
                            @endif
                            @endforeach
                        </div>
                        @if ($errors->has('permissions'))
                            <div class="invalid-feedback">
                                {{ $errors->first('permissions') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.role.fields.permissions_helper') }}</span>
                    </div>
                </div>
            </div>
            <div class="form-group mt-2">
                <button class="btn btn-danger btn-s" type="submit">
                    {{ trans('global.save') }}
                </button>
                <a class="btn btn-info btn-s" href="{{ route('admin.roles.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </form>
    </div>
    @endif
    </div>
    </div>
@endsection


@section('scripts')
    <script>
        $(document).ready(function() {
            $('.select-all').click(function() {
                $('input[type="checkbox"]').prop('checked', true);
            });

            $('.deselect-all').click(function() {
                $('input[name="permissions[]"]').prop('checked', false);
            });
        });
    </script>
@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function() {

            $('form').find('input[required], select[required], textarea[required]').each(function() {
                var label = $('label[for="' + $(this).attr('id') + '"]');
                if (label.length > 0) {
                    label.append('<span class="required-field">*</span>');
                }
            });
        });
    </script>
@endsection
