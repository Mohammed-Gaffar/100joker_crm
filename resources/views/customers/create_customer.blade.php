@extends('layouts.app')

@section('main_content')
    <br>
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12 col-xl-10">
                    <div class="row align-items-center my-4">
                        <div class="col">
                            <h2 class="h3 mb-0 page-title">@lang('site.add customer')</h2>
                        </div>
                    </div>
                    <form action="/SaveCustoemr" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method("POST")
                        <hr class="my-4">
                        <h5 class="mb-2 mt-4">@lang('site.personal data')</h5>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="customer_name">@lang('site.customer name')</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="work_function">@lang('site.work_function')</label>
                                <input type="text" name="work_function" id="job_function" class="form-control">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <label for="inputEmail4">@lang('site.personal_email')</label>
                                <input type="email"  name="personal_email" class="form-control" id="inputEmail4">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputPhone">@lang('site.personal_phone')</label>
                                <input type="number"  name="personal_phone" class="form-control" id="inputPhone">
                            </div>
                        </div>
                        <hr class="my-4">
                        <h5 class="mb-2 mt-4">@lang('site.work information')</h5>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="company">@lang('site.company name')</label>
                                <input type="text" name="company" id="firstname" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="lastname">@lang('site.Department')</label>
                                <input type="text" id="lastname" class="form-control">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="company">@lang('site.work_phone')</label>
                                <input type="number" name="work_phone" id="firstname" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="lastname">@lang('site.work_email')</label>
                                <input type="email" name="work_email" id="work_email" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress5">@lang('site.address')</label>
                            <input type="text" name="customer_address" class="form-control" id="inputAddress5">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="custom-zip">@lang('site.Zip code')</label>
                                <input class="form-control input-zip" name="zip-code" id="custom-zip">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputState5">@lang('site.state')</label>
                                <select id="inputState5" name="state" class="form-control">
                                    @foreach($cities as $index=>$city)
                                        <option valye="{{$index}}">{{$city}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputState5">@lang('site.city')</label>
                                <select id="inputState5" name="city" class="form-control">
                                    @foreach($cities as $index=>$city)
                                        <option valye="{{$index}}">{{$city}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <hr class="my-4">
                        <h5 class="mb-2 mt-4">@lang('site.others')</h5>
                        <div class="form-row">
                            <div class="col-md-12">
                                <label for="customer_note">@lang('site.note')</label>
                                <input type="text" name="notes" id="note" class="form-control" >
                            </div>
                            <br>
                        </div>
                        <hr class="my-4">
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="customPass" checked>
                                    <label class="custom-control-label" for="customPass">Create account and email generated password</label>
                                </div>
                            </div>
                            <div class="col-md-6 text-right">
{{--                                <button type="button" class="btn btn-primary">Save Change</button>--}}
                                <input type="submit" value="@lang('site.save changes')" class="btn btn-primary">
                            </div>
                        </div>
                    </form>
                </div> <!-- .col-12 -->
            </div> <!-- .row -->
        </div> <!-- .container-fluid -->
        <div class="modal fade modal-notif modal-slide" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="defaultModalLabel">Notifications</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="list-group list-group-flush my-n3">
                            <div class="list-group-item bg-transparent">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="fe fe-box fe-24"></span>
                                    </div>
                                    <div class="col">
                                        <small><strong>Package has uploaded successfull</strong></small>
                                        <div class="my-0 text-muted small">Package is zipped and uploaded</div>
                                        <small class="badge badge-pill badge-light text-muted">1m ago</small>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item bg-transparent">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="fe fe-download fe-24"></span>
                                    </div>
                                    <div class="col">
                                        <small><strong>Widgets are updated successfull</strong></small>
                                        <div class="my-0 text-muted small">Just create new layout Index, form, table</div>
                                        <small class="badge badge-pill badge-light text-muted">2m ago</small>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item bg-transparent">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="fe fe-inbox fe-24"></span>
                                    </div>
                                    <div class="col">
                                        <small><strong>Notifications have been sent</strong></small>
                                        <div class="my-0 text-muted small">Fusce dapibus, tellus ac cursus commodo</div>
                                        <small class="badge badge-pill badge-light text-muted">30m ago</small>
                                    </div>
                                </div> <!-- / .row -->
                            </div>
                            <div class="list-group-item bg-transparent">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="fe fe-link fe-24"></span>
                                    </div>
                                    <div class="col">
                                        <small><strong>Link was attached to menu</strong></small>
                                        <div class="my-0 text-muted small">New layout has been attached to the menu</div>
                                        <small class="badge badge-pill badge-light text-muted">1h ago</small>
                                    </div>
                                </div>
                            </div> <!-- / .row -->
                        </div> <!-- / .list-group -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Clear All</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade modal-shortcut modal-slide" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="defaultModalLabel">Shortcuts</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body px-5">
                        <div class="row align-items-center">
                            <div class="col-6 text-center">
                                <div class="squircle bg-success justify-content-center">
                                    <i class="fe fe-cpu fe-32 align-self-center text-white"></i>
                                </div>
                                <p>Control area</p>
                            </div>
                            <div class="col-6 text-center">
                                <div class="squircle bg-primary justify-content-center">
                                    <i class="fe fe-activity fe-32 align-self-center text-white"></i>
                                </div>
                                <p>Activity</p>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-6 text-center">
                                <div class="squircle bg-primary justify-content-center">
                                    <i class="fe fe-droplet fe-32 align-self-center text-white"></i>
                                </div>
                                <p>Droplet</p>
                            </div>
                            <div class="col-6 text-center">
                                <div class="squircle bg-primary justify-content-center">
                                    <i class="fe fe-upload-cloud fe-32 align-self-center text-white"></i>
                                </div>
                                <p>Upload</p>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-6 text-center">
                                <div class="squircle bg-primary justify-content-center">
                                    <i class="fe fe-users fe-32 align-self-center text-white"></i>
                                </div>
                                <p>Users</p>
                            </div>
                            <div class="col-6 text-center">
                                <div class="squircle bg-primary justify-content-center">
                                    <i class="fe fe-settings fe-32 align-self-center text-white"></i>
                                </div>
                                <p>Settings</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main> <!-- main -->
@stop
