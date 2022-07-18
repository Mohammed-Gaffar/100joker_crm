@extends('layouts.app')

@section('main_content')
    <main role="main" class="main-content">

            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-10 col-xl-8">
                        <div class="card" style="padding:30px;border-radius: 30px !important; ">
                            <h2 class="h3 mb-4 page-title">@lang('site.edit_customer_profile')</h2>
                            <div class="my-4">
                                <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">@lang('site.customer profile')</a>
                                    </li>
{{--                                    <li class="nav-item">--}}
{{--                                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Security</a>--}}
{{--                                    </li>--}}
{{--                                    <li class="nav-item">--}}
{{--                                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Notifications</a>--}}
{{--                                    </li>--}}
                                </ul>
                                <form action="{{'/customer/updatecustomer/'.$customer->id}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method("POST")
                                    <div class="row mt-5 align-items-center">
                                        <div class="col-md-3 text-center mb-5">
                                            <div class="avatar avatar-xl">
                                                <img src="{{asset('asset/avatars/face-1.jpg')}}" alt="..." class="avatar-img rounded-circle">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="row align-items-center">
                                                <div class="col-md-7">
                                                    <h4 class="mb-1"><input type="text" name="name" id="name" value="{{$customer->name}}" class="form-control">  </h4>
                                                    <p class="small mb-3"><span class="badge badge-dark">{{$customer->address}}</span></p>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-md-7">
                                                    <p class="text-muted">{{$customer->notes}}</p>
                                                </div>
                                                <div class="col">
                                                    <p class="small mb-0 text-muted">Nec Urna Suscipit Ltd</p>
                                                    <p class="small mb-0 text-muted">P.O. Box 464, 5975 Eget Avenue</p>
                                                    <p class="small mb-0 text-muted">(537) 315-1481</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="my-4">
                                    <h5 class="mb-2 mt-4">@lang('site.work information')</h5>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="company">@lang('site.Company Name')</label>
                                            <input type="text" name="company" value="{{$customer->company}}" id="firstname" class="form-control">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="lastname">@lang('site.Department')</label>
                                            <input type="text" id="lastname" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="company">@lang('site.work_phone')</label>
                                            <input type="number" value="{{$customer->work_phone}}" name="work_phone" id="firstname" class="form-control">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="lastname">@lang('site.work_email')</label>
                                            <input type="email" value="{{$customer->work_email}}" name="work_email" id="work_email" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="custom-zip">@lang('site.address')</label>
                                            <input type="text" name="address" value="{{$customer->address}}" class="form-control" id="address">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="custom-zip">@lang('site.change_image')</label>
                                            <input type="file" name="customer_pic" class="form-control" id="">
                                        </div>
                                    </div>
                                    <hr class="my-4">
                                    <h5 class="mb-2 mt-4">@lang('site.others')</h5>
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <label for="customer_note">@lang('site.note')</label>
                                            <input type="text" name="notes" value="{{$customer->notes}}" id="note" class="form-control" >
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
                            </div> <!-- /.card-body -->
                        </div>
                    </div> <!-- /.col-12 -->
                </div> <!-- .row -->
            </div> <!-- .container-fluid -->


        <div class="modal fade modal-notif modal-slide" tabindex="-1" role4="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
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
    </main>
@stop
