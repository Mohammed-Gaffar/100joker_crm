<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Laratrust\Traits\LaratrustUserTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\DocBlock\Tags\Author;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Traits\HasRoles;


class UserController extends Controller
{
    //

    public function __construct()
    {

//        $this->middleware(['isAbleTo:users_read'])->only('index');
//        $this->middleware(['permission:users_create'])->only('create');

//        $this->middleware(['permission:users_read'])->only('index');
//        $this->middleware(['permission:users_update'])->only('update');
//        $this->middleware(['permission:users_update'])->only('edit');
//        $this->middleware(['permission:users_create'])->only('create');

    }

    public  function index(){
        $users = \App\User::paginate(5);

        return view('users.index',compact('users'));
    }

    public function create(){
        $roles = Role::where('id','>','1')->orderBy('id','desc')->pluck('display_name','name');
//        dd($roles);
        return view('users.create',compact('roles'));
    }

    public  function store(Request $request){

        $request->validate([
            'u_nameAr'=>'required',
            'u_nameEn'=>'required|string',
            'email'=>'required|email',
            'password'=>'required',
            'identity_number'=>'required',
            'phone'=>'required',
            'code'=>'required',
            'department'=> 'required',
            'job_position'=>'required',
            'recruitment_date'=>'required',
//            'user_role'=>'required',
        ]);

        $user= new User;
//        $user->slug=str_replace(' ','_',$request->u_nameEn).time(); //
        $user->u_nameAr=$request->u_nameAr;
        $user->u_nameEn=$request->u_nameEn;
        $user->email=$request->email;
        $user->identity_number=$request->identity_number;
        $user->phone=$request->phone;
        $user->code=$request->code;
        $user->department=$request->department;
        $user->job_position=$request->job_position;
        $user->recruitment_date=$request->recruitment_date;
        $user->password=Hash::make($request->password);
        $user->save();


        $user_role = $request->user_role ;
//        dd($request->permissions);
        $role = Role::where('id','=',$user_role)->firs();

        $user->attachrole($role->name);

//        dd($user);

        $user->syncPermissions($request->permissions);

        session()->flash('success',__('site.adding successfully'));

        return redirect('/users');//->back();


    }

    public function destroy(user $user){
            $user->delete();
            session()->flash('success',_('site.add'));
            return redirect('/users');
    }

    public function edit(user $user){

        $roles =  Role::where('id','>','1')->orderBy('id','desc')->pluck('display_name','id');
//        dd($roles);

        return view('users.edit',compact('user','roles'));
    }

    public function update(request $request, $user)
    {
        $request->validate([
            'u_nameAr'=>'required',
            'u_nameEn'=>'required|string',
            'email'=>'required|email',
            'password'=>'required',
            'identity_number'=>'required',
            'phone'=>'required',
            'code'=>'required',
            'department'=> 'required',
            'job_position'=>'required',
            'recruitment_date'=>'required',
            'user_role'=>'required',
        ]);



        $d = $request->input('password') ;

        if (Hash::needsRehash($d)) {
            $d = Hash::make($request->input('password'));
        }



        $uproles = DB::table('role_user')->where('user_id','=',$user)->update([
            'role_id'=> '1'
        ]);


        $request->offsetSet('password',$d);

        $data = $request->except('confirmation password','permissions[]');


        $result = User::findorfail($user);

        $result->update($data);


        $result->syncPermissions($request->permissions);

        Alert::toast('تم تحديث البيانات بنجاح','success');
        return redirect('users');

    }

    public  function advertisement($slug)
    {
        $marketer=User::where('slug','=',$slug)->first();
    return view('advertisement',compact('marketer'));
    }


}
