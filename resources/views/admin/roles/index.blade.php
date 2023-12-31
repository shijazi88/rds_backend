@extends('layouts.master')

@section('content')
    <div class="container mt-3">
        <div class="row">

            @foreach ($roles as $role)
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Role Name: {{ $role->name }}</h5>
                            {{-- <p class="card-text">ID: {{ $role->id }}</p> --}}
                            <p class="card-text">Total Permissions: {{ $role->permissions->count() }}</p>
                            <div class="text-center">
                                @can('role_edit')
                                    <a href="{{ Auth::guard('web')->check() ? route('admin.roles.edit', $role->id) : route('admin.client-roles.edit', $role->id) }}"
                                        class="btn btn-sm btn-success">{{ trans('global.edit') }}</a>
                                @endcan
                                @can('role_show')
                                    <a href="{{ Auth::guard('web')->check() ? route('admin.roles.show', $role->id) : route('admin.client-roles.show', $role->id) }}"
                                        class="btn btn-sm btn-info">{{ trans('global.view') }}</a>
                                @endcan
                                @can('role_delete')
                                    <form
                                        action="{{ Auth::guard('web')->check() ? route('admin.roles.destroy', $role->id) : route('admin.client-roles.destroy', $role->id) }}"
                                        method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                        style="display: inline-block;">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit"
                                            class="btn btn-sm btn-danger">{{ trans('global.delete') }}</button>
                                    </form>
                                @endcan
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            @can('role_create')
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ Auth::guard('web')->check() ? route('admin.roles.create') : route('admin.client-roles.create') }}"
                                class="btn btn-success">{{ trans('global.add') }} {{ trans('cruds.role.title_singular') }}</a>
                        </div>
                    </div>
                </div>
            @endcan
        </div>
    </div>
@endsection
