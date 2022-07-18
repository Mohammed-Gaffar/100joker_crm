{{--{{dd($user,--}}
{{--    $user->hasPermission(['create-users']),--}}
{{--    $user->hasPermission(['delete-users']),--}}
{{--    $user->hasRole(['admin']),--}}
{{--    $user->hasRole(['super_admin']),--}}
{{--        )}}--}}
<div class="card-body">

    <div class="form-group">
        <label for="first_name">@lang('site.nameAr')</label>
        <input type="text" name="u_nameAr" class="form-control" value="{{isset($user)? "$user->u_nameAr": "" }}"  id="firstname" placeholder="@lang('site.nameAr') ">
    </div>
    <div class="form-group">
        <label for="last_name">@lang('site.nameEn')</label>
        <input type="text" name="u_nameEn" class="form-control" value="{{isset($user)? "$user->u_nameEn": "" }}"  id="lastname" placeholder="@lang('site.nameEn')">
    </div>
    <div class="form-group">
        <label for="email">@lang('site.email')</label>
        <input type="text" name="email" class="form-control" value="{{isset($user)? "$user->email": "" }}"  id="email" placeholder="@lang('site.email')">
    </div>
    <div class="form-group">
        <label for="user_role">@lang('site.user role')</label>
        <select name="user_role" class="form-control">
            @foreach($roles as $index => $role )
                <option value="{{$index}}">@lang('site.'.$role)</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="password">@lang('site.password')</label>
        <input type="password" name="password" class="form-control"  value="{{isset($user)? "$user->password": "" }}"   id="email" placeholder="@lang('site.password')" >
    </div>
    <div class="form-group">
        <label for="email">@lang('site.confirmation password')</label>
        <input type="password" name="confirmation password" class="form-control" value="{{isset($user)? "$user->password": "" }}" id="confirmation password" placeholder="@lang('site.confirmation password')">
    </div>
    <div>


    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-check">
                {{-- <label for="usercode">@lang('site.is_marketer')</label>&nbsp; &nbsp; : &nbsp;&nbsp; --}}
                {{-- <input type="checkbox" name="is_marketer" class="form-check-input" > --}}
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-6">
            <label for="usercode">@lang('site.code')</label>
            <input type="text" name="code" value="{{isset($user)? "$user->code": "" }}" class="form-control" id="">
            <label for="idnumber">@lang('site.id num')</label>
            <input type="number" name="identity_number" value="{{isset($user)? "$user->identity_number": "" }}" class="form-control" id="">
            <label for="u_department">@lang('site.department')</label>
            <input type="text" name="department" value="{{isset($user)? "$user->department": "" }}" id="" class="form-control">
        </div>
        <div class="col-md-6">
            <label for="u_recruitment_date">@lang('site.recruitment date')</label>
            <input type="date" class="form-control" name="recruitment_date" value="{{isset($user)? "$user->recruitment_date": "" }}" style="width: 100%">
            <label for="u_job_position">@lang('site.position')</label>
            <input type="text" name="job_position" value="{{isset($user)? "$user->job_position": "" }}" id="" class="form-control">
            <label for="u_job_position">@lang('site.phone')</label>
            <input type="text" name="phone" value="{{isset($user)? "$user->phone": "" }}" id="" class="form-control">
        </div>
    </div>
</div>



<div class="card card-primary card-outline">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-edit"></i>
            @lang('site.permisions')
        </h3>
    </div>
    <div class="card-body">

        @php
            $sections = ['reports','users'];
            $maps = ['read','create','update','delete'];

        @endphp

        <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
            @foreach($sections as $index=>$section)
                <li class="nav-item">
                    <a class="nav-link" id="custom-content-below-home-tab" data-toggle="pill" href="#custom-content-below-{{$section}}" role="tab" aria-controls="custom-content-below-{{$section}}" aria-selected="false">@lang('site.'.$section)</a>
                </li>
            @endforeach
        </ul>

        <div class="tab-content" id="custom-content-below-tabContent">
            @foreach($sections as $index=>$section)
                <div class="tab-pane fade {{(($index == 0 ) ? 'show active' : '')}}"  id="custom-content-below-{{$section}}" role="tabpanel" aria-labelledby="custom-content-below-{{$section}}">
                    <br>
                    @foreach($maps as $map)
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="{{$map}}-{{$section}}" value="{{$map}}-{{$section}}" name="permissions[]" {{ isset($user) ?  $user->hasPermission($map.'-'.$section )? "checked":""  :""}} >
                                <label for="{{$map}}-{{$section}}" class="custom-control-label">@lang('site.'.$map )</label>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
    <!-- /.card -->
</div>
