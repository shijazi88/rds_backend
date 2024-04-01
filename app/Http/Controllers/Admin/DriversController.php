<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDriverRequest;
use App\Http\Requests\StoreDriverRequest;
use App\Http\Requests\UpdateDriverRequest;
use App\Models\Driver;
use Gate;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class DriversController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('driver_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Driver::query()->select(sprintf('%s.*', (new Driver)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'driver_show';
                $editGate      = 'driver_edit';
                $deleteGate    = 'driver_delete';
                $crudRoutePart = 'drivers';

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
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('status', function ($row) {
                return $row->status ? Driver::STATUS_SELECT[$row->status] : '';
            });
            $table->editColumn('mobile', function ($row) {
                return $row->mobile ? $row->mobile : '';
            });
            $table->editColumn('email', function ($row) {
                return $row->email ? $row->email : '';
            });
            $table->editColumn('language', function ($row) {
                return $row->language ? Driver::LANGUAGE_SELECT[$row->language] : '';
            });
            $table->editColumn('lat', function ($row) {
                return $row->lat ? $row->lat : '';
            });
            $table->editColumn('lng', function ($row) {
                return $row->lng ? $row->lng : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.drivers.index');
    }

    public function create()
    {
        abort_if(Gate::denies('driver_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.drivers.create');
    }

    public function store(StoreDriverRequest $request)
    {
        $data = $request->validated();
    $data['password'] = Hash::make($data['password']);
    
    $driver = Driver::create($data);

        return redirect()->route('admin.drivers.index');
    }

    public function edit(Driver $driver)
    {
        abort_if(Gate::denies('driver_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.drivers.edit', compact('driver'));
    }

    public function update(UpdateDriverRequest $request, Driver $driver)
    {
        $driver->update($request->all());

        return redirect()->route('admin.drivers.index');
    }

    public function show(Driver $driver)
    {
        abort_if(Gate::denies('driver_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.drivers.show', compact('driver'));
    }

    public function destroy(Driver $driver)
    {
        abort_if(Gate::denies('driver_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $driver->delete();

        return back();
    }

    public function massDestroy(MassDestroyDriverRequest $request)
    {
        $drivers = Driver::find(request('ids'));

        foreach ($drivers as $driver) {
            $driver->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
