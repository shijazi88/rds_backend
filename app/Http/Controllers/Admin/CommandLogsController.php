<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCommandLogRequest;
use App\Http\Requests\StoreCommandLogRequest;
use App\Http\Requests\UpdateCommandLogRequest;
use App\Models\Box;
use App\Models\CommandLog;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class CommandLogsController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('command_log_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = CommandLog::with(['box'])->select(sprintf('%s.*', (new CommandLog)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'command_log_show';
                $editGate      = 'command_log_edit';
                $deleteGate    = 'command_log_delete';
                $crudRoutePart = 'command-logs';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->addColumn('box_price', function ($row) {
                return $row->box ? $row->box->serial_number : '';
            });

            $table->editColumn('command', function ($row) {
                return $row->command ? $row->command : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'box']);

            return $table->make(true);
        }

        return view('admin.commandLogs.index');
    }

    public function create()
    {
        abort_if(Gate::denies('command_log_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $boxes = Box::pluck('price', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.commandLogs.create', compact('boxes'));
    }

    public function store(StoreCommandLogRequest $request)
    {
        $commandLog = CommandLog::create($request->all());

        return redirect()->route('admin.command-logs.index');
    }

    public function edit(CommandLog $commandLog)
    {
        abort_if(Gate::denies('command_log_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $boxes = Box::pluck('price', 'id')->prepend(trans('global.pleaseSelect'), '');

        $commandLog->load('box');

        return view('admin.commandLogs.edit', compact('boxes', 'commandLog'));
    }

    public function update(UpdateCommandLogRequest $request, CommandLog $commandLog)
    {
        $commandLog->update($request->all());

        return redirect()->route('admin.command-logs.index');
    }

    public function show(CommandLog $commandLog)
    {
        abort_if(Gate::denies('command_log_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $commandLog->load('box');

        return view('admin.commandLogs.show', compact('commandLog'));
    }

    public function destroy(CommandLog $commandLog)
    {
        abort_if(Gate::denies('command_log_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $commandLog->delete();

        return back();
    }

    public function massDestroy(MassDestroyCommandLogRequest $request)
    {
        $commandLogs = CommandLog::find(request('ids'));

        foreach ($commandLogs as $commandLog) {
            $commandLog->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
