<?php

namespace App\Http\Controllers;

use App\company_profiles;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CompanyProfilesController extends Controller
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\company_profiles  $company_profiles
     * @return \Illuminate\Http\Response
     */
    public function show(company_profiles $company_profiles)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\company_profiles  $company_profiles
     * @return \Illuminate\Http\Response
     */
    public function edit(company_profiles $company_profiles)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\company_profiles  $company_profiles
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $company_profiles)
    {
        //
        $data = $request->validate([
            'company_name'=>'required',
            'cr_number'=>'required',
            'vat_cert_number'=>'required',
            'comp_pic_path'=>'required',
            'location'=>'required',
            'state'=>'required',
            'city'=>'required',
            'post'=>'required',
            'telephone'=>'required',
            'email'=>'required',
    ]);

        $result =  company_profiles::findorfail($company_profiles);
        $result->update($data);

        if ($request->file('comp_pic_path') != null){
            try{
                $file= $request->file('comp_pic_path');
                $filename= "logo.".$file->getClientOriginalExtension();
//                $filename= $filename."." .$file->getClientOriginalExtension();//.$file->getClientOriginalName();
                $file-> move(public_path('/public/company_img/'), $filename);

//                $con = company_profiles::where('id','=',$result->sequence);

                $result -> update ([
//                    'comp_pic_path'=>$result->sequence,
                    'comp_pic_path'=>"/public/company_img/".$filename."",
                ]);

            } catch (\Exception $e) {

                return $e->getMessage();
            }

        }


        Alert::toast('data has been updated');
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\company_profiles  $company_profiles
     * @return \Illuminate\Http\Response
     */
    public function destroy(company_profiles $company_profiles)
    {
        //
    }
}
