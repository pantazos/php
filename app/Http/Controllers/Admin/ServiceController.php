<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyServiceRequest;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Models\Category;
use App\Models\Commission;
use App\Models\Service;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ServiceController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('service_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $services = Service::with(['category', 'commission'])->latest()->get();

        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        abort_if(Gate::denies('service_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Category::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $commissions = Commission::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.services.create', compact('categories', 'commissions'));
    }

    public function store(StoreServiceRequest $request)
    {
        $service = Service::create($request->all());

        return redirect()->route('admin.services.index');
    }

    public function edit(Service $service)
    {
        abort_if(Gate::denies('service_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Category::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $commissions = Commission::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $service->load('category', 'commission');

        return view('admin.services.edit', compact('categories', 'commissions', 'service'));
    }

    public function update(UpdateServiceRequest $request, Service $service)
    {
        $service->update($request->all());

        return redirect()->route('admin.services.index');
    }

    public function show(Service $service)
    {
        abort_if(Gate::denies('service_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $service->load('category', 'commission');

        return view('admin.services.show', compact('service'));
    }

    public function destroy(Service $service)
    {
        abort_if(Gate::denies('service_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $service->delete();

        return back();
    }

    public function massDestroy(MassDestroyServiceRequest $request)
    {
        Service::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
