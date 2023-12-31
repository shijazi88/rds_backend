<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyClientAddressRequest;
use App\Http\Requests\StoreClientAddressRequest;
use App\Http\Requests\UpdateClientAddressRequest;
use App\Models\Client;
use App\Models\ClientAddress;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ClientAddressController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('client_address_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = ClientAddress::with(['client'])->select(sprintf('%s.*', (new ClientAddress)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'client_address_show';
                $editGate      = 'client_address_edit';
                $deleteGate    = 'client_address_delete';
                $crudRoutePart = 'client-addresses';

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
            $table->addColumn('client_mobile', function ($row) {
                return $row->client ? $row->client->mobile : '';
            });

            $table->editColumn('lat', function ($row) {
                return $row->lat ? $row->lat : '';
            });
            $table->editColumn('lng', function ($row) {
                return $row->lng ? $row->lng : '';
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'client']);

            return $table->make(true);
        }

        return view('admin.clientAddresses.index');
    }

    public function create()
    {
        abort_if(Gate::denies('client_address_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clients = Client::pluck('mobile', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.clientAddresses.create', compact('clients'));
    }

    public function store(StoreClientAddressRequest $request)
    {
        $clientAddress = ClientAddress::create($request->all());

        return redirect()->route('admin.client-addresses.index');
    }

    public function edit(ClientAddress $clientAddress)
    {
        abort_if(Gate::denies('client_address_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clients = Client::pluck('mobile', 'id')->prepend(trans('global.pleaseSelect'), '');

        $clientAddress->load('client');

        return view('admin.clientAddresses.edit', compact('clientAddress', 'clients'));
    }

    public function update(UpdateClientAddressRequest $request, ClientAddress $clientAddress)
    {
        $clientAddress->update($request->all());

        return redirect()->route('admin.client-addresses.index');
    }

    public function show(ClientAddress $clientAddress)
    {
        abort_if(Gate::denies('client_address_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clientAddress->load('client');

        return view('admin.clientAddresses.show', compact('clientAddress'));
    }

    public function destroy(ClientAddress $clientAddress)
    {
        abort_if(Gate::denies('client_address_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clientAddress->delete();

        return back();
    }

    public function massDestroy(MassDestroyClientAddressRequest $request)
    {
        $clientAddresses = ClientAddress::find(request('ids'));

        foreach ($clientAddresses as $clientAddress) {
            $clientAddress->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
