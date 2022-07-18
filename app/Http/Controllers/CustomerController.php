<?php

namespace App\Http\Controllers;

use App\city;
use App\contact_log;
use App\custoemr_image;
use App\customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $customers = DB::table('customers')->join('users','customers.user','=','users.id')
            ->select('customers.*','users.u_nameAr AS user_name')->get();

//        dd($customers);

        return view('customers.index',compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $cities = city::pluck('nameAR','id');

//        dd($cities);
        return view('customers.create_customer',compact('cities'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customer_Address = ( $request->customer_address."-" .$request->city."-".$request->state."(".$request->input('zip-code').")" );
        $request->offsetSet('address',$customer_Address);
        $request->offsetSet( 'user' , auth()->user()->getAuthIdentifier());
        $sequence = rand(10,1000);
        $request->offsetSet( 'sequence' , $sequence);
        $request->offsetSet( 'supervisor' , '3');



        $myrequest =  $request->except('customer_address','city','state','zip-code');

        customer::create($myrequest);
        custoemr_image::create([
            'customer_id'=>$sequence,

        ]);

            //            try{
            //
            //
            //            } catch (\Exception $e) {
            //
            //                return $e->getMessage();
            //            }

        Alert::success('done');
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(customer $customer ,$id)
    {
        //
        $customer =customer::where('id','=',$id)->first();
        $customer_img = custoemr_image::where('customer_id','=',$customer->sequence)->first();
        $contacttimes = contact_log::where('customer_id','=',$customer->sequence)->get()->count();

//            dd($customer_img->img_path);
        return view('customers.customer_profile',compact('customer','customer_img','contacttimes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(customer $customer)

    {
        $cities = city::pluck('nameAR','id');
        return view('customers.edit_customer',compact('customer','cities'));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $customer)
    {
        //

        $result = customer::findorfail($customer);
//        dd($result->sequence);
        $mydata = $request->validate([
            'name'=>'required',
            'company'=>'required',
            'work_phone'=>"required",
            'work_email'=>'required',
            'address'=>'required',

            'notes'=>'required',
        ]) ;

        if ($request->file('customer_pic') != null){
            try{
                $file= $request->file('customer_pic');
                $filename= date('YmdHi').$file->getClientOriginalName();
                $filename=$result->sequence.".".$file->getClientOriginalExtension();//.$file->getClientOriginalName();
                $file-> move(public_path('public/Image'), $filename);

                $con = custoemr_image::where('customer_id','=',$result->sequence);

                $con -> update ([
                   'customer_id'=>$result->sequence,
                    'img_path'=>"public/Image/".$filename."",
                ]);

            } catch (\Exception $e) {

                return $e->getMessage();
            }

        }

        $result->update($mydata);

        Alert::success('all data are saved');
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(customer $customer)
    {
        //
    }
}
