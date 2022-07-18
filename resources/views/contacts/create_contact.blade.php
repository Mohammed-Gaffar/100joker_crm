@extends('layouts.app')

@section('main_content')

    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
               <div class="card card-body" style="border-radius: 30px !important;">
                   <div class="col-12">
                       <h2 class="h3 mb-0 page-title">@lang('site.contact record')</h2>
                       <div class="row align-items-center my-4">
                           <div class="col-md-6">
                               <div id="chart-box">
                                   {{--                                <div id="donutChartWidget"></div>--}}
                                   <center>
                                       <img src="{{asset($customer_img->img_path)}}" alt="..." class="avatar-img rounded-circle" width="128px" height="128px">
                                   </center>

                               </div>
                           </div>
                           <div class="col-md-6">
                               <div class="row align-items-center my-2">
                                   <div class="col">
                                       <strong>@lang('site.number of contacting times')</strong><br  />
                                       <span class="my-0 text-muted small">+85%</span>
                                   </div>
                                   <div class="col-auto">
                                       <strong class="my-0">{{$customer_contacting_times}}</strong>
                                   </div>
                                   <div class="col-3">
                                       <div class="progress" style="height: 4px;">
                                           <div class="progress-bar bg-success" role="progressbar" style="width: 85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                                       </div>
                                   </div>
                               </div>

                               <div class="row align-items-center my-2">
                                   <div class="col">
                                       <strong>Processing</strong><br />
                                       <span class="my-0 text-muted small">+60%</span>
                                   </div>
                                   <div class="col-auto">
                                       <strong>80</strong>
                                   </div>
                                   <div class="col-3">
                                       <div class="progress" style="height: 4px;">
                                           <div class="progress-bar bg-primary" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                       </div>
                                   </div>
                               </div>

                               <div class="row align-items-center my-2">
                                   <div class="col">
                                       <strong>Assigned</strong>
                                       <div class="my-0 text-muted small">+2%</div>
                                   </div>
                                   <div class="col-auto">
                                       <strong>262</strong>
                                   </div>
                                   <div class="col-3">
                                       <div class="progress" style="height: 4px;">
                                           <div class="progress-bar bg-warning" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                       </div>
                                   </div>
                               </div>

                               <div class="row align-items-center my-2">
                                   <div class="col">
                                       <strong>Pending</strong>
                                       <div class="my-0 text-muted small">+6%</div>
                                   </div>
                                   <div class="col-auto">
                                       <strong>26</strong>
                                   </div>
                                   <div class="col-3">
                                       <div class="progress" style="height: 4px;">
                                           <div class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                       </div>
                                   </div>
                               </div>
                           </div> <!-- .col-md-12 -->
                       </div> <!-- .row -->
                       <div class="row">
                           <div class="col-md-12">
                               <!-- table -->
                               <table class="table table-borderless table-striped">
                                   <thead>
                                   <tr>
                                       <th>ID</th>
                                       <th>@lang('site.date')</th>
                                       <th>@lang('site.purpose')</th>
                                       <th>@lang('site.method')</th>
                                       <th>@lang('site.user')</th>
                                       <th>@lang('site.note')</th>
                                   </tr>
                                   </thead>
                                   <tbody>
                                   @foreach($customer_log as $index => $log)
                                       <tr>
                                           <td>{{++$index}}</td>
                                           <td>{{$log->contact_date}}</td>
                                           <td>{{$log->purpose}}</td>
                                           <td>{{$log->method}}</td>
                                           <td>{{$log->user}}</td>
                                           <td>{{$log->note}}</td>
                                       </tr>
                                   @endforeach
                                   </tbody>
                               </table>
                               <nav aria-label="Table Paging" class="my-3">
                                   <hr>
                                   <div style="text-align: left !important;">
                                       <button type="button" class="btn mb-2 btn-info" data-toggle="modal" data-target=".modal-full">@lang('site.add contact')</button>
                                       <a href="{{'/quotations/create/'.$customer->id}}"><button type="button" class="btn mb-2 btn-outline-success" >@lang('site.create quotation')</button></a>
                                   </div>
                                   <br>
                                   <ul class="pagination justify-content-end mb-0">
                                       <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                       <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                       <li class="page-item"><a class="page-link" href="#">2</a></li>
                                       <li class="page-item"><a class="page-link" href="#">3</a></li>
                                       <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                   </ul>
                               </nav>
                           </div> <!-- .col -->
                       </div> <!-- .row -->
                   </div> <!-- .col-12 -->
               </div>
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

        <!-- Fullscreen modal -->
        <div class="modal fade modal-full" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <button aria-label="" type="button" class="close px-2" data-dismiss="modal" aria-hidden="true">
                <span aria-hidden="true">×</span>
            </button>
            <div class="modal-dialog modal-dialog-centered" role="document" >
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <p>@lang('site.add_contact_to'){{$customer->name}}  @lang('site.company') {{$customer->company}}</p>
                        <div class="col-md-12">
                            <form class=" justify-content-center" action="{{'/contacts/addingcustomercontact/'.$customer->sequence}}" method="POST">
                                @csrf
                                @method('POST')
                                        <label for="name">@lang('site.date')</label>
                                        <input type="date" name="contact_date" id="" class="form-control  bg-transparent" >
                                    <br>
                                        <label for="name">@lang('site.company')</label>
                                        <input type="text" name="company" value="{{$customer->company}}" id=""  class="form-control bg-transparent">
                                    <br>
                                    <label for="name">@lang('site.contact_purpose')</label>
                                    <select name="purpose" id="" class="form-control bg-transparent">
                                        <option value="promotion">promotion</option>
                                        <option value="normal contact">normal contact</option>
                                        <option value="solving problem">solving problem</option>
                                    </select>
                                    <br>
                                    <label for="name">@lang('site.contact_method')</label>
                                    <select name="method" id="" class="form-control bg-transparent">
                                        <option value="phone">phone</option>
                                        <option value="visit">visit</option>
                                        <option value="email">email</option>
                                    </select>
                                    <br>
                                    <label for="contact_note">@lang('site.contact_note')</label>
                                    <input type="text" name="note" class="form-control bg-transparent" id="">

                                <button class="btn btn-primary btn-lg mb-2 my-2 my-sm-0" type="submit">Search</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- small modal -->
    </main> <!-- main -->


    @stop
