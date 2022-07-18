@extends('layouts.app')


@section('main_content')
    @include('_partial._errors')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">@lang('site.edit')</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action="/users/update/{{$user->id }}" method="post">
                            @method('patch')
                            @csrf
                            @include('_partial.user_form')
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">@lang('site.update')</button>
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


@stop
