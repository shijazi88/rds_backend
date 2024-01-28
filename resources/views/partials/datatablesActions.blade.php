    <div class="dropdown">
        <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="ri-more-2-fill"></i>
        </a>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">

            @can($viewGate)
                <li>
                    <a href="{{ route('admin.' . $crudRoutePart . '.show', $row->id) }}" class="dropdown-item">
                        {{ trans('global.view') }}</a>
                </li>
            @endcan
            @can($editGate)
                <li>
                    <a class="dropdown-item" href="{{ route('admin.' . $crudRoutePart . '.edit', $row->id) }}">
                        {{ trans('global.edit') }}</a>
                </li>
            @endcan
            @can($deleteGate)
                <li>
                    <form action="{{ route('admin.' . $crudRoutePart . '.destroy', $row->id) }}" method="POST"
                        onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="submit" class="dropdown-item" value="{{ trans('global.delete') }}">
                    </form>
                </li>
            @endcan

            @if (isset($crudRoutePart) && $crudRoutePart == 'subscriptions')
                @if ($row->status == 'active')
                    @can($suspendGate)
                        <li>
                            <a class="dropdown-item" href="{{ route('admin.' . $crudRoutePart . '.suspend', $row->id) }}">
                                {{ trans('global.suspend') }}</a>
                        </li>
                    @endcan
                @endif
            @endif

            @if (isset($crudRoutePart) && $crudRoutePart == 'subscriptions')
                @if ($row->status == 'active')
                    @can($upgradeGate)
                        <li>
                            <a class="dropdown-item" href="{{ route('admin.' . $crudRoutePart . '.upgrade', $row->id) }}">
                                {{ trans('global.upgrade') }}</a>
                        </li>
                    @endcan
                @endif
            @endif

            @if (isset($crudRoutePart) && $crudRoutePart == 'subscriptions')
                @can($cancelGate)
                    @if ($row->status == 'active')
                        <li>
                            <a class="dropdown-item" href="#"
                                onclick="event.preventDefault(); if(confirm('{{ trans('global.confirm_cancel') }}')){document.getElementById('cancel-form-{{ $row->id }}').submit();}">
                                {{ trans('global.cancel') }}
                            </a>
                            <form id="cancel-form-{{ $row->id }}"
                                action="{{ route('admin.' . $crudRoutePart . '.cancel', $row->id) }}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                        </li>
                    @endif
                @endcan
            @endif
            @if (isset($crudRoutePart) && $crudRoutePart == 'subscriptions')
                @can($reactivateGate)
                    <li>
                        <a class="dropdown-item" href="#"
                            onclick="event.preventDefault(); if(confirm('{{ trans('global.confirm_reactivate') }}')){document.getElementById('reactivate-form-{{ $row->id }}').submit();}">
                            {{ trans('global.reactivate') }}
                        </a>
                        <form id="reactivate-form-{{ $row->id }}"
                            action="{{ route('admin.' . $crudRoutePart . '.reactivate', $row->id) }}" method="POST"
                            style="display: none;">
                            @csrf
                        </form>
                    </li>
                @endcan
            @endif

            @if (isset($crudRoutePart) && $crudRoutePart == 'branches')
                @can($copyGate)
                    <li>
                        <a class="dropdown-item" href="{{ route('admin.' . $crudRoutePart . '.copy', $row->id) }}">
                            {{ trans('global.copy') }}</a>
                    </li>
                @endcan
            @endif
            @if (isset($crudRoutePart) && $crudRoutePart == 'class-schedules')
                @can($copyGate)
                    <li>
                        <a class="dropdown-item" href="{{ route('admin.' . $crudRoutePart . '.copy', $row->id) }}">
                            {{ trans('global.copy') }}</a>
                    </li>
                @endcan
            @endif

            @if (isset($crudRoutePart) && $crudRoutePart == 'member-transactions')
                @can($paymentsGate)
                    <li>
                        <a class="dropdown-item" href="{{ route('admin.' . $crudRoutePart . '.payments', $row->id) }}">
                            {{ trans('cruds.memberPayment.label') }}</a>
                    </li>
                @endcan
            @endif
            @if (isset($crudRoutePart) && $crudRoutePart == 'member-transactions')
                @can($tapGate)
                    <li>
                        <a class="dropdown-item" href="{{ route('admin.' . $crudRoutePart . '.tap', $row->id) }}">
                            {{ trans('cruds.tapTransaction.title') }}</a>
                    </li>
                @endcan
            @endif
        </ul>
    </div>
