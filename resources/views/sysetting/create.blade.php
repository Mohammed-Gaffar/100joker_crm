@extends('layouts.app')

@section('main_content')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10 col-xl-8">
                    <h2 class="h3 mb-4 page-title">Settings</h2>
                    <div class="my-4">
                        <form action=" @if(isset($company))
                        {{'/setting/update_company_profile/'.$company->id}}
                        @else
                        {{'/settings/save/companysetting'}}
                         @endif
                            " method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('post')
                            <div class="row mt-5 align-items-center">
                                <div class="col-md-3 text-center mb-5">
                                    <div class="avatar avatar-xl">
                                        <img src="{{(isset($company->comp_pic_path))? $company->comp_pic_path :""}}" alt="..." class="avatar-img rounded-circle">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="row align-items-center">
                                        <div class="col-md-7">
                                            <label for="company name">@lang('site.company name')</label>
                                            <h4 class="mb-1">{{(isset($company->company_name) ==1 )? $company->company_name :"" }}</h4>
                                            <p class="small mb-3"><span class="badge badge-dark">{{(isset($company->state) ==1 )? $company->state :"" }}</span></p>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-md-7">
{{--                                            <p class="text-muted"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris blandit nisl ullamcorper, rutrum metus in, congue lectus. In hac habitasse platea dictumst. Cras urna quam, malesuada vitae risus at, pretium blandit sapien. </p>--}}
                                        </div>
                                        <div class="col">
                                            <p class="small mb-0 text-muted">{{(isset($company->location)==1)? $company->location :""}}</p>
                                            <p class="small mb-0 text-muted">{{(isset($company->state)==1)? $company->state :""}}</p>
                                            <p class="small mb-0 text-muted">{{(isset($company->city)==1)? $company->city :""}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="firstname">@lang('site.company name')</label>
                                    <input type="text" name="company_name" value="{{(isset($company->company_name)==1)? $company->company_name :""}}" id="company_name" class="form-control" placeholder="akta kdabra">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="lastname">@lang('site.company cr')</label>
                                    <input type="text" id="company cr" value="{{(isset($company->cr_number)==1)? $company->cr_number :""}}" name="cr_number" class="form-control" placeholder="Asher">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">@lang('site.email')</label>
                                    <input type="email" name="email" value="{{(isset($company->email)==1)? $company->email :""}}" class="form-control" id="inputEmail4" placeholder="brown@asher.me">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">@lang('site.vat certificate number  ')</label>
                                    <input type="text" name="vat_cert_number" value="{{(isset($company->vat_cert_number)==1)? $company->vat_cert_number :""}}" class="form-control" id="inputEmail4" placeholder="brown@asher.me">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label for="inputAddress5">@lang('site.address')</label>
                                    <input type="text" name="location" value="{{(isset($company->location)==1)? $company->location :""}}" class="form-control" id="inputAddress5" placeholder="P.O. Box 464, 5975 Eget Avenue">
                                </div>
                                <div class="col-md-6">
                                    <label for="inputAddress5">@lang('site.adding img')</label>
                                    <input type="file" name="comp_pic_path" id="" >
                                </div>
                             </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputState5">@lang('site.state')</label>
                                    <input type="text" value="{{(isset($company->state)==1)? $company->state :""}}" name="state" class="form-control" id="inputCompany5" placeholder="Nec Urna Suscipit Ltd">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputState5">@lang('site.city')</label>
                                    <input type="text" value="{{(isset($company->city)==1)? $company->city :""}}" name="city" class="form-control" id="inputCompany5" placeholder="Nec Urna Suscipit Ltd">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputState5">@lang('site.post')</label>
                                    <input type="text" value="{{(isset($company->post)==1)? $company->post :""}}" name="post" class="form-control" id="inputCompany5" placeholder="Nec Urna Suscipit Ltd">
                                </div>

                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputCompany5">@lang('site.phone')</label>
                                    <input type="text" name="telephone" value="{{(isset($company->telephone))? $company->telephone : ""}}" class="form-control" id="inputCompany5" placeholder="Nec Urna Suscipit Ltd">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputState5">@lang('site.email')</label>
                                    <input type="email"  class="form-control" id="email"  value="{{(isset($company->email)==1)? $company->email :""}}">
                                </div>
                            </div>
                            <hr class="my-4">
                           @if(isset($company))
                                <a href="{{'/setting/update_company_profile/'.$company->id}}">
                                    <button  class="btn btn-warning">update Change</button>
                                </a>
                            @else
                                <button type="submit" class="btn btn-primary">Save Change</button>
                           @endif
                        </form>
                    </div> <!-- /.card-body -->
                </div> <!-- /.col-12 -->
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
    </main>

@stop
