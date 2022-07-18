@extends('layouts.app')


@section('main_content')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">@lang('site.user add')</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action="{{ '/users/store' }}" method="post">
                            @method('POST')
                            @csrf
                                 @include('_partial.user_form')
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">@lang('site.add')</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->

                    <!-- /.card-footer -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </main>

    </div>

    @stop
