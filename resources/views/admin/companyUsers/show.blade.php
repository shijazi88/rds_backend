@extends('layouts.master')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.companyUser.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.company-users.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th>
                                {{ trans('cruds.companyUser.fields.id') }}
                            </th>
                            <td>
                                {{ $companyUser->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.companyUser.fields.compnay') }}
                            </th>
                            <td>
                                {{ $companyUser->compnay->name ?? '' }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.companyUser.fields.name') }}
                            </th>
                            <td>
                                {{ $companyUser->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.companyUser.fields.password') }}
                            </th>
                            <td>
                                ********
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.company-users.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
