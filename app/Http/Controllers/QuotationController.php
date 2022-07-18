<?php

namespace App\Http\Controllers;

use App\customer;
use App\quotation;
//use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\TraitUseAdaptation\Alias;
use RealRashid\SweetAlert\Facades\Alert;
use niklasravnsborg\LaravelPdf\Facades\Pdf;


class QuotationController extends Controller
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
    public function create($customer)
    {
        //
        $customernum = customer::findorfail($customer);

        $customer = DB::table('customers')->where('customers.id','=',$customernum->id)
            ->join('users','users.id','=','customers.id')
                ->select('customers.*','users.u_nameAr','users.email AS u_email','users.phone AS u_phone')->first();

//        dd($customer);

        return view('quotations.create',compact('customer'));
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

        $company_data = \App\company_profiles::where('id','=','1')->first();


        $customer = customer::findorfail($customer);
        $last_customer_quotation = DB::table('quotations')->where('cus_id','=',$customer->id)->orderBy('id','desc')->first();

        if(isset($last_customer_quotation->serial) ){
            $q_serial = ++$last_customer_quotation->serial ;
        }else{
            $q_serial = date('Y').date('m')."0001";;
        }

        $request->offsetSet('serial',$q_serial);
        $request->offsetSet('user',auth()->user()->getAuthIdentifier());
        $request->offsetSet('cus_id',$customer->id);
        $request->offsetSet('quotation_content','the message content');
        $request->offsetSet('file_path','/quotations/'.$q_serial.'pdf');

//        dd($request);


        $data = $request->validate([
            'serial'=>'required',
            'cus_id'=>'required',
            'user'=>'required',
            'quotation_content'=>'required',
            'date'=>'required',
            'file_path'=>'required',
            'cus_email'=>'required',

        ]);

        quotation::create($data);

        $quotation_detils = quotation::where('serial','=',$q_serial)->first();

        //        dd($quotation_detils);

        $pdf = PDF::loadView('PDF.invt', compact('company_data','customer','quotation_detils'),[
            'format' => 'A4',
        ]);

        $pdf->save('quotations/'.$q_serial.'.pdf');
        Alert::toast('success','all data are saved');
//        return redirect()->back();
        return $pdf->download('abra_kdabra.pdf');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function show(quotation $quotation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function edit(quotation $quotation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, quotation $quotation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function destroy(quotation $quotation)
    {
        //
    }
}
