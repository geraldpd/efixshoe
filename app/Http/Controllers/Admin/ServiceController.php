<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Service\{
    StoreRequest,
    UpdateRequest
};
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::paginate(15);

        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Service  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $service = Service::create($request->except('image'));

        if($request->hasFile('image')) {

            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();

            Storage::putFileAs(
                'public/services', $image, $service->id.'.'.$extension
            );

            $service->image = $service->id.'.'.$extension;
            $service->save();
        }

        return redirect()->route('admin.services.show', [$service])->with('message', 'Service Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        return view('admin.services.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Service  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Service $service)
    {
        $data = $request->except('image');

        if(! $request->has('is_active')) {
            $data['is_active'] = 0;
        }

        if($request->hasFile('image')) {

            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();

            Storage::putFileAs(
                'public/services', $image, $service->id.'.'.$extension
            );

            $service->image = $service->id.'.'.$extension;
        }

        $service->update($data);

        return redirect()->route('admin.services.show', [$service])->with('message', 'Service Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        //
    }
}
