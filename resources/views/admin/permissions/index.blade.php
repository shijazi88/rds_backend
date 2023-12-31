@extends('layouts.master')
@section('content')
    @can('permission_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                @if (Auth::guard('web')->check())
                    <a class="btn btn-success" href="{{ route('admin.permissions.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.permission.title_singular') }}
                    </a>
                @elseif(Auth::guard('client_users')->check())
                    <a class="btn btn-success" href="{{ route('admin.client-permissions.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.permission.title_singular') }}
                    </a>
                @endif
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.permission.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-Permission"
                    width="100%">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.permission.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.permission.fields.name') }}
                            </th>
                            <th>
                                {{ trans('cruds.permission.fields.guard_name') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permissions as $key => $permission)
                            <tr data-entry-id="{{ $permission->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $permission->id ?? '' }}
                                </td>
                                <td>
                                    {{ $permission->name ?? '' }}
                                </td>
                                <td>
                                    {{ $permission->guard_name ?? '' }}
                                </td>
                                <td>
                                    @can('permission_show')
                                        @if (Auth::guard('web')->check())
                                            <a class="btn btn-sm btn-info view-item-btn"
                                                href="{{ route('admin.permissions.show', $permission->id) }}">
                                                {{ trans('global.view') }}
                                            </a>
                                        @elseif(Auth::guard('client_users')->check())
                                            <a class="btn btn-sm btn-info view-item-btn"
                                                href="{{ route('admin.client-permissions.show', $permission->id) }}">
                                                {{ trans('global.view') }}
                                            </a>
                                        @endif
                                    @endcan

                                    @can('permission_edit')
                                        @if (Auth::guard('web')->check())
                                            <a class="btn btn-sm btn-success edit-item-btn"
                                                href="{{ route('admin.permissions.edit', $permission->id) }}">
                                                {{ trans('global.edit') }}
                                            </a>
                                        @elseif(Auth::guard('client_users')->check())
                                            <a class="btn btn-sm btn-success edit-item-btn"
                                                href="{{ route('admin.client-permissions.edit', $permission->id) }}">
                                                {{ trans('global.edit') }}
                                            </a>
                                        @endif
                                    @endcan

                                    @can('permission_delete')
                                        @if (Auth::guard('web')->check())
                                            <form action="{{ route('admin.permissions.destroy', $permission->id) }}"
                                                method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                                style="display: inline-block;">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="submit" class="btn btn-sm btn-danger remove-item-btn"
                                                    value="{{ trans('global.delete') }}">
                                            </form>
                                        @elseif(Auth::guard('client_users')->check())
                                            <form action="{{ route('admin.client-permissions.destroy', $permission->id) }}"
                                                method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                                style="display: inline-block;">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="submit" class="btn btn-sm btn-danger remove-item-btn"
                                                    value="{{ trans('global.delete') }}">
                                            </form>
                                        @endif
                                    @endcan

                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @parent
    <script>
        $(function() {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
            @can('permission_delete')
                let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
                let deleteButton = {
                    text: deleteButtonTrans,
                    url: "{{ route('admin.permissions.massDestroy') }}",
                    className: 'btn-danger',
                    action: function(e, dt, node, config) {
                        var ids = $.map(dt.rows({
                            selected: true
                        }).nodes(), function(entry) {
                            return $(entry).data('entry-id')
                        });

                        if (ids.length === 0) {
                            alert('{{ trans('global.datatables.zero_selected') }}')

                            return
                        }

                        if (confirm('{{ trans('global.areYouSure') }}')) {
                            $.ajax({
                                    headers: {
                                        'x-csrf-token': _token
                                    },
                                    method: 'POST',
                                    url: config.url,
                                    data: {
                                        ids: ids,
                                        _method: 'DELETE'
                                    }
                                })
                                .done(function() {
                                    location.reload()
                                })
                        }
                    }
                }
                // dtButtons.push(deleteButton)
            @endcan

            $.extend(true, $.fn.dataTable.defaults, {
                orderCellsTop: true,
                order: [
                    [1, 'desc']
                ],
                pageLength: 100,
            });
            let table = $('.datatable-Permission:not(.ajaxTable)').DataTable({
                buttons: dtButtons
            })
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        })
    </script>
@endsection
