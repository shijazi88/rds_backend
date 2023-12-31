@extends('layouts.master')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.user.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.users.update', [$user->id]) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="required" for="name">{{ trans('cruds.user.fields.name') }}</label>
                            <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text"
                                name="name" id="name" value="{{ old('name', $user->name) }}" required>
                            @if ($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="email">{{ trans('cruds.user.fields.email') }}</label>
                            <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email"
                                name="email" id="email" value="{{ old('email', $user->email) }}" required>
                            @if ($errors->has('email'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.email_helper') }}</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="required" for="password">{{ trans('cruds.user.fields.password') }}</label>
                            <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password"
                                name="password" id="password">
                            @if ($errors->has('password'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('password') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.password_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="roles">{{ trans('cruds.user.fields.roles') }}</label>
                            <div class="select-all-buttons mb-2">
                                <button type="button"
                                    class="btn btn-sm btn-primary select-all">{{ trans('global.select_all') }}</button>
                                <button type="button"
                                    class="btn btn-sm btn-secondary deselect-all">{{ trans('global.deselect_all') }}</button>
                            </div>
                            <div class="row">
                                @foreach ($roles as $id => $role)
                                    <div class="col-md-3">
                                        <div class="form-check">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input switch" type="checkbox" name="roles[]"
                                                    role="switch" id="role_{{ $id }}"
                                                    value="{{ $id }}"
                                                    {{ in_array($id, old('roles', [])) || $user->roles->contains($id) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="role_{{ $id }}">
                                                    {{ $role }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    @if (($loop->index + 1) % 4 == 0)
                            </div>
                            <div class="row">
                                @endif
                                @endforeach
                            </div>
                            @if ($errors->has('roles'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('roles') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.roles_helper') }}</span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <button class="btn btn-danger mt-2" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
            </form>
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
                $('input[name="roles[]"]').prop('checked', false);
            });
        });
    </script>
@endsection
