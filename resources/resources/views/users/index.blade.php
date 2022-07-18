@extends('layouts.app')

@section('main_content')

    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
               <div class="card card-body">
                   <div class="card-header">
                       <h3 class="card-title">المستخدمين </h3>
                   </div>
                   <div class="card-body">
                       <div class="card">
                           <div class="card-header" >
                               <div class="input-group input-group-sm" style="width: 350px;">
                                   <input type="text" name="table_search" class="form-control float-right" placeholder="@lang('site.search')">

                                   <div class="input-group-append">
                                       <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                   </div>
                                   <div class="input-group-append">
                                       <a href="{{'/users/create'}}"> <button type="submit" class="btn btn-default"><i class="fas fa-user-plus"></i></button></a>
                                   </div>
                               </div>
                           </div>
                           <!-- /.card-header -->
                           <div class="card-body">
                               <table class="table table-hover">
                                   <thead>
                                   <tr>
                                       <th style="width: 10px">#</th>
                                       <th>@lang('site.nameAr')</th>
                                       <th>@lang('site.nameEn')</th>
                                       <th>@lang('site.email')</th>
                                       <th>@lang('site.marketing_link')</th>
                                       <th>@lang('site.customers_count')</th>
                                       <th>@lang('site.actions')</th>
                                   </tr>
                                   </thead>
                                   <tbody>
                                   @forelse($users as $index => $user)
                                       <tr>
                                           <td>
                                               {{$index}}
                                           </td>
                                           <td>
                                               {{$user->u_nameAr}}
                                           </td>
                                           <td>{{$user->u_nameEn}}</td>
                                           <td>{{$user->email}}</td>
                                           @if($user->is_marketer ==1)
                                               <td> <a href="https://wa.me/?text=+http://ingaz-co.com/advertisement/{{$user->slug}}" class="btn btn-success"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></td>
                                           @else
                                               <td></td>
                                           @endif
                                           <td> {{$user->customers_count}}</td>
                                           <td style="display:flex;">
                                               <a href="/users/edit/{{$user->id}}"><button class="btn btn-block btn-warning">@lang('site.edit')</button></a>

                                               @if(auth()->user()->hasPermission('delete-users'))
                                                   <form action="/users/delete/{{$user->id}}"method="post">
                                                       @csrf
                                                       @method('delete')
                                                       <button type="submit" class="btn btn-block btn-danger">@lang('site.delete')</button>
                                                   </form>
                                               @endif
                                           </td>
                                       </tr>
                                   @empty
                                       no users
                                   @endforelse

                                   </tbody>
                               </table>

                           </div>
                           <!-- /.card-body -->
                           <div class="card-footer clearfix">
                               <ul class="pagination pagination-sm m-0 float-right">
                                   {{$users->links()}}
                               </ul>
                           </div>
                       </div>
                       <!-- /.card -->

                   </div>
               </div>
            </div>
        </div>
    </main>

{{--   <div class="col-md-10">--}}
{{--       <div class="main_content">--}}
{{--           <div class="container-fluid">--}}
{{--               <div class="row justify-content-center">--}}
{{--                    <div class="card card-info">--}}
{{--               <div class="card-header">--}}
{{--                   <h3 class="card-title">المستخدمين </h3>--}}
{{--               </div>--}}
{{--               <div class="card-body">--}}
{{--                       <div class="card">--}}
{{--                           <div class="card-header" >--}}
{{--                               <div class="input-group input-group-sm" style="width: 350px;">--}}
{{--                                   <input type="text" name="table_search" class="form-control float-right" placeholder="@lang('site.search')">--}}

{{--                                   <div class="input-group-append">--}}
{{--                                       <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>--}}
{{--                                   </div>--}}
{{--                                   <div class="input-group-append">--}}
{{--                                       <a href="{{'/users/create'}}"> <button type="submit" class="btn btn-default"><i class="fas fa-user-plus"></i></button></a>--}}
{{--                                   </div>--}}
{{--                               </div>--}}
{{--                           </div>--}}
{{--                           <!-- /.card-header -->--}}
{{--                           <div class="card-body">--}}
{{--                               <table class="table table-bordered">--}}
{{--                                   <thead>--}}
{{--                                   <tr>--}}
{{--                                       <th style="width: 10px">#</th>--}}
{{--                                       <th>@lang('site.nameAr')</th>--}}
{{--                                       <th>@lang('site.nameEn')</th>--}}
{{--                                       <th>@lang('site.email')</th>--}}
{{--                                       <th>@lang('site.marketing_link')</th>--}}
{{--                                       <th>@lang('site.customers_count')</th>--}}
{{--                                       <th>@lang('site.actions')</th>--}}
{{--                                   </tr>--}}
{{--                                   </thead>--}}
{{--                                   <tbody>--}}
{{--                                   @forelse($users as $index => $user)--}}
{{--                                       <tr>--}}
{{--                                           <td>--}}
{{--                                               {{$index}}--}}
{{--                                           </td>--}}
{{--                                           <td>--}}
{{--                                               {{$user->u_nameAr}}--}}
{{--                                           </td>--}}
{{--                                           <td>{{$user->u_nameEn}}</td>--}}
{{--                                           <td>{{$user->email}}</td>--}}
{{--                                           @if($user->is_marketer ==1)--}}
{{--                                               <td> <a href="https://wa.me/?text=+http://ingaz-co.com/advertisement/{{$user->slug}}" class="btn btn-success"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></td>--}}
{{--                                           @else--}}
{{--                                               <td></td>--}}
{{--                                           @endif--}}
{{--                                           <td> {{$user->customers_count}}</td>--}}
{{--                                           <td style="display:flex;">--}}
{{--                                               <a href="/users/edit/{{$user->id}}"><button class="btn btn-block btn-warning">@lang('site.edit')</button></a>--}}

{{--                                               @if(auth()->user()->hasPermission('delete-users'))--}}
{{--                                                   <form action="/users/delete/{{$user->id}}"method="post">--}}
{{--                                                       @csrf--}}
{{--                                                       @method('delete')--}}
{{--                                                       <button type="submit" class="btn btn-block btn-danger">@lang('site.delete')</button>--}}
{{--                                                   </form>--}}
{{--                                               @endif--}}
{{--                                           </td>--}}
{{--                                       </tr>--}}
{{--                                   @empty--}}
{{--                                       no users--}}
{{--                                   @endforelse--}}

{{--                                   </tbody>--}}
{{--                               </table>--}}

{{--                           </div>--}}
{{--                           <!-- /.card-body -->--}}
{{--                           <div class="card-footer clearfix">--}}
{{--                               <ul class="pagination pagination-sm m-0 float-right">--}}
{{--                                   {{$users->links()}}--}}
{{--                               </ul>--}}
{{--                           </div>--}}
{{--                       </div>--}}
{{--                       <!-- /.card -->--}}

{{--               </div>--}}
{{--               <!-- /.card-body -->--}}
{{--           </div>--}}
{{--               </div>--}}
{{--           </div>--}}
{{--       </div>--}}
{{--   </div>--}}



@stop

