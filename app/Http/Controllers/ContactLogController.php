<?php

namespace App\Http\Controllers;

use App\contact_log;
use App\custoemr_image;
use App\customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class ContactLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$customer)
    {
        //
        $request->offsetSet(  'customer_id' ,$customer);
        $request->offsetSet('user' , auth()->user()->getAuthIdentifier());
//                dd($request , $customer);

        $data = $request->validate([
            'contact_date'=> 'required',
            'customer_id'=>'required',
            'purpose'=>'required',
            'method'=>'required',
            'user'=>'required',
            'note'=>'required',
        ]);

        contact_log::create($data);
        Alert::success('all data was saved successfully');
        return redirect()->back();




    }

    /**
     * Display the specified resource.
     *
     * @param  \App\contact_log  $contact_log
     * @return \Illuminate\Http\Response
     */
    public function show(contact_log $contact_log ,$customer)
    {
        //
        $customer = customer::findorfail($customer);

        $customer_img = custoemr_image::where('customer_id','=',$customer->sequence)->first();
//        dd();
        $customer_log = contact_log::where('customer_id','=',$customer->sequence)->get();

        $customer_contacting_times = contact_log::where('customer_id','=',$customer->sequence)->get()->count();

        //    dd($customer,$customer_log, $customer->sequence, $customer->company);
        return view('contacts.create_contact',compact('customer','customer_log','customer_contacting_times','customer_img'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\contact_log  $contact_log
     * @return \Illuminate\Http\Response
     */
    public function edit(contact_log $contact_log)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\contact_log  $contact_log
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, contact_log $contact_log)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\contact_log  $contact_log
     * @return \Illuminate\Http\Response
     */
    public function destroy(contact_log $contact_log)
    {
        //
    }
}
