@extends('layouts.app')

@section('main_content')

        <div class="main-content">
            <div class="card my-4">
                <div class="card-header">
                    <strong>@lang('site,quotation create')</strong>
                </div>
                <div class="card-body">
                    <form id="my2022-form" action="{{'/qoutations/saveqoutation/'.$customer->id}}" method="post">
                        @csrf
                        @method('post')
                        <div>
                            <h3>@lang('site.customer information')</h3>
                            <section>
                                <div class="form-group">
                                    <label for="userName">@lang('site.customer name')*</label>
                                    <input id="userName" name="name" value="{{$customer->name}}"  type="text" class="form-control required" readonly >
                                </div>
                                <div class="form-group">
                                    <label for="work_function">@lang('site.work_function') *</label>
                                    <input id="work_function" name="work_function" value="{{$customer->work_function}}" type="text" class="form-control required" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="personal_phone">@lang('site.personal_phone') *</label>
                                    <input id="personal_phone" name="personal_phone" value="{{$customer->personal_phone}}" type="text" class="form-control required" readonly>
                                </div>
                                <div class="help-text text-muted">(*) Mandatory</div>
                            </section>
                            <h3>@lang('site.working information')</h3>
                            <section>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="copany_name">@lang('site.company name') *</label>
                                        <input id="company_name" name="company" type="text" value="{{$customer->company}}" class="form-control required" readonly>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="work_phone">@lang('site.work_phone')*</label>
                                        <input id="work_phone" name="work_phone" type="text" class="form-control required" value="{{$customer->work_phone}}" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email">@lang('site.work_email') *</label>
                                    <input id="work_email" name="cus_email" type="text" class="form-control required" value="{{$customer->work_email}}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="address">@lang('site.address')</label>
                                    <input id="address" name="address" class="form-control" type="text" value="{{$customer->address}}" readonly>
                                </div>
                                <div class="help-text text-muted">(*) Mandatory</div>
                            </section>
                            <h3>@lang('site.user information')</h3>
                            <section>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="work_phone">@lang('site.name')*</label>
                                        <input id="work_phone" name="work_phone" type="text" class="form-control required" value="{{$customer->u_nameAr}}"readonly>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="work_phone">@lang('site.phone')*</label>
                                        <input id="work_phone" name="work_phone" type="text" class="form-control required" value="{{$customer->u_phone}}"readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email">@lang('site.email') *</label>
                                    <input id="u_mail" name="u_mail" type="text" class="form-control required" value="{{$customer->u_email}}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="address">@lang('site.supervisor')</label>
                                    <input id="supervisor" name="supervisor" class="form-control" type="text" value="momo" readonly>
                                </div>
                                <div class="help-text text-muted">(*) Mandatory</div>
                            </section>
                            <h3>@lang('site.quotation information')</h3>
                            <section>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="copany_name">@lang('site.date') *</label>
                                        <input id="date" name="date" type="date" class="form-control datepicker" >
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="work_phone">@lang('site.phone')*</label>
                                        <input id="work_phone" name="work_phone" type="text" class="form-control required" value="{{$customer->work_phone}}" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email">@lang('site.work_email') *</label>
                                    <input id="work_email" name="work_email" type="text" class="form-control required" value="{{$customer->work_phone}}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="address">@lang('site.address')</label>
                                    <input id="address" name="address" class="form-control" type="text" value="{{$customer->address}}" readonly>
                                </div><div class="help-text text-muted">(*) Mandatory</div>
                            </section>
                            <h3>@lang('site.confirmation')</h3>
                            <section>
                                <input id="acceptTerms" name="acceptTerms" type="checkbox" class="required"> <label for="acceptTerms">I agree with the Terms and Conditions.</label>
                            </section>
                        </div>
                    </form>
                </div> <!-- .card-body -->
            </div> <!-- .card -->
        </div>

    @stop

@section('customer_scripts')
    <script>

    </script>
@stop
