<?php

namespace App\Http\Controllers\Admin;

use App\Models\PaymentMethod;
use Illuminate\Http\Request;
use App\Http\Requests\PaymentMethod\{
    StoreRequest,
    UpdateRequest
};
use Illuminate\Support\Facades\Storage;

class PaymentMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payment_methods = PaymentMethod::orderByDesc('id')->paginate(15);

        return view('admin.payment_methods.index', compact('payment_methods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.payment_methods.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $payment_method = PaymentMethod::create($request->except('image'));

        if($request->hasFile('image')) {

            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();

            Storage::disk('root_public')->putFileAs(
                'pm_images', $image, $payment_method->id.'.'.$extension
            );

            $payment_method->image = "pm_images/$payment_method->id.$extension";
            $payment_method->save();
        }

        return redirect()->route('admin.payment_methods.index')->with('message', 'Payment Method Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PaymentMethod  $paymentMethod
     * @return \Illuminate\Http\Response
     */
    public function show(PaymentMethod $payment_method)
    {
        return view('admin.payment_methods.show', compact('payment_method'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PaymentMethod  $paymentMethod
     * @return \Illuminate\Http\Response
     */
    public function edit(PaymentMethod $payment_method)
    {
        return view('admin.payment_methods.edit', compact('payment_method'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PaymentMethod  $paymentMethod
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, PaymentMethod $payment_method)
    {
        $data = $request->except('image');

        if(! $request->has('is_active')) {
            $data['is_active'] = 0;
        }

        if($request->hasFile('image')) {

            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();

            Storage::disk('root_public')->putFileAs(
                'pm_images', $image, $payment_method->id.'.'.$extension
            );

            $payment_method->image =  "pm_images/$payment_method->id.$extension";
        }

        $payment_method->update($data);

        return redirect()->route('admin.payment_methods.index', [$payment_method])->with('message', 'Payment Method Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaymentMethod  $paymentMethod
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaymentMethod $paymentMethod)
    {
        //
    }
}
