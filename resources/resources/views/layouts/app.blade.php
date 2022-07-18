
<!doctype html>
<html>
<head>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>{{ config('app.name', 'MG-CRM') }}</title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="{{ asset('asset/css/simplebar.css') }}">
    <!-- Fonts CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Icons CSS -->
    @if(app()->getLocale() == 'ar')
        <link rel="stylesheet" href="{{ asset('asset/css/feather.css')}}">
        <link rel="stylesheet" href="{{ asset('asset/css/select2.css') }}">
        <link rel="stylesheet" href="{{ asset ('asset/css/dropzone.css') }}">
        <link rel="stylesheet" href="{{ asset('asset/css/uppy.min.css') }}">
        <link rel="stylesheet" href="{{ asset('asset/css/jquery.steps.css') }}">
        <link rel="stylesheet" href="{{ asset('asset/css/jquery.timepicker.css') }}">
        <link rel="stylesheet" href="{{ asset('asset/css/quill.snow.css') }}">
        <!-- Date Range Picker CSS -->
        <link rel="stylesheet" href="{{ asset('asset/css/daterangepicker.css') }}">
        <!-- App CSS -->
        <link rel="stylesheet" href="{{asset('asset/css/app-light.css')}}" id="lightTheme">
        <link rel="stylesheet" href="{{asset('asset/css/app-dark.css')}}" id="darkTheme" disabled>
    @else
        <link rel="stylesheet" href="{{ asset('asset/LTR/css/feather.css')}}">
        <link rel="stylesheet" href="{{ asset('asset/LTR/css/select2.css') }}">
        <link rel="stylesheet" href="{{ asset ('asset/LTR/css/dropzone.css') }}">
        <link rel="stylesheet" href="{{ asset('asset/LTR/css/uppy.min.css') }}">
        <link rel="stylesheet" href="{{ asset('asset/LTR/css/jquery.steps.css') }}">
        <link rel="stylesheet" href="{{ asset('asset/LTR/css/jquery.timepicker.css') }}">
        <link rel="stylesheet" href="{{ asset('asset/LTR/css/quill.snow.css') }}">
        <!-- Date Range Picker CSS -->
        <link rel="stylesheet" href="{{ asset('asset/LTR/css/daterangepicker.css') }}">
        <!-- App CSS -->
        <link rel="stylesheet" href="{{asset('asset/LTR/css/app-light.css')}}" id="lightTheme">
        <link rel="stylesheet" href="{{asset('asset/LTR/css/app-dark.css')}}" id="darkTheme" disabled>
    @endif

    {{--    sweet alerts lenks --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link href='https://fonts.googleapis.com/css?family=Cairo' rel='stylesheet'>


</head>
<body class="vertical  light rtl ">
@include('_partial._errors')
@include('sweetalert::alert')

<div class="wrapper">
    <nav class="topnav navbar navbar-light">
        <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
            <i class="fe fe-menu navbar-toggler-icon"></i>
        </button>
        <form class="form-inline mr-auto searchform text-muted">
            <input class="form-control mr-sm-2 bg-transparent border-0 pl-4 text-muted" type="search" placeholder="Type something..." aria-label="Search">
        </form>
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link text-muted my-2" href="#" id="modeSwitcher" data-mode="light">
                    <i class="fe fe-sun fe-16"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-muted my-2" href="./#" data-toggle="modal" data-target=".modal-shortcut">
                    <span class="fe fe-grid fe-16"></span>
                </a>
            </li>
            <li class="nav-item nav-notif">
                <a class="nav-link text-muted my-2" href="./#" data-toggle="modal" data-target=".modal-notif">
                    <span class="fe fe-bell fe-16"></span>
                    <span class="dot dot-md bg-success"></span>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-muted pr-0" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="avatar avatar-sm mt-2">
                <img src="{{asset('asset/avatars/face-1.jpg')}}" alt="..." class="avatar-img rounded-circle">
              </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                    <label for="user">user : {{auth()->user()->getAuthIdentifier()}}</label>
                    <a class="dropdown-item" href="#">@lang('site.Profile')</a>
                    <a class="dropdown-item" href="#">@lang('site.Settings')</a>
                    <a class="dropdown-item" href="#">@lang('site.Activities')</a>
                    <form action="{{route('logout')}}" method="POST">
                        @csrf
                        @method('POST')
                        <input type="submit" value="@lang('site.logout')" class="dropdown-item" style="text-align: left !important;">
                    </form>
                    <hr>
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                        {{ $properties['native'] }}
                    </a>
                    @endforeach
                </div>
            </li>
        </ul>
    </nav>
    <aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
        <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
            <i class="fe fe-x"><span class="sr-only"></span></i>
        </a>
        <nav class="vertnav navbar navbar-light">
            <!-- nav bar -->
            <div class="w-100 mb-4 d-flex">
                <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="./index.html">
                    <svg version="1.1" id="logo" class="navbar-brand-img brand-sm" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120" xml:space="preserve">
                <g>
                    <polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
                    <polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
                    <polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
                </g>
              </svg>
                </a>
            </div>
            <p class="text-muted nav-heading mt-4 mb-1">
                <span>@lang('site.home')</span>
            </p>

            <ul class="navbar-nav flex-fill w-100 mb-2">
                <li class="nav-item w-100">
                    <a class="nav-link" href="{{'/home'}}">
                        <i class="fe fe-home fe-16"></i>
                        <span class="ml-3 item-text">@lang('site.dashbord')</span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a href="#profile" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                        <i class="fe fe-user fe-16"></i>
                        <span class="ml-3 item-text">@lang('site.customers management')</span>
                    </a>
                    <ul class="collapse list-unstyled pl-4 w-100" id="profile">
                        <a class="nav-link pl-3" href="{{'/customers'}}"><span class="ml-1">@lang('site.customers')</span></a>
                        <a class="nav-link pl-3" href="{{'/customer_create'}}"><span class="ml-1">@lang('site.add customer')</span></a>
                        <a class="nav-link pl-3" href="{{'/blocked_customers'}}"><span class="ml-1">@lang('site.blocked customers')</span></a>
                    </ul>
                </li>
                            {{--   =========contract management  menu items ====================--}}
                <li class="nav-item dropdown">
                    <a href="#pages" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                        <i class="fe fe-file fe-16"></i>
                        <span class="ml-3 item-text">@lang('site.contracts management')</span>
                    </a>
                    <ul class="collapse list-unstyled pl-4 w-100 w-100" id="pages">
                        <li class="nav-item">
                            <a class="nav-link pl-3" href="{{'/add contracts'}}">
                                <span class="ml-1 item-text">@lang('site.add contract')</span>
                            </a>
                        </li>
                    </ul>
                </li>

                {{--   =========marketing managemt section items ====================--}}
                <li class="nav-item dropdown">
                    <a href="#auth" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                        <i class="fe fe-shield fe-16"></i>
                        <span class="ml-3 item-text">@lang('site.marketing management')</span>
                    </a>
                    <ul class="collapse list-unstyled pl-4 w-100" id="auth">
                        @if(auth()->user()->hasRole(['super_admin']))
                            <a class="nav-link pl-3" href="./auth-login.html"><span class="ml-1">@lang('site.add')</span></a>
                        @endif
                            @if(auth()->user()->hasPermission('read-users'))
                                <a class="nav-link pl-3" href="./auth-login.html"><span class="ml-1">@lang('site.add')</span></a>
                            @endif
                    </ul>
                </li>

                {{--   =========other secvtion for future usage ====================--}}
                <li class="nav-item dropdown">
                    <a href="#layouts" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                        <i class="fe fe-layout fe-16"></i>
                        <span class="ml-3 item-text">@lang('site.users')</span>
                    </a>
                    <ul class="collapse list-unstyled pl-4 w-100" id="layouts">
                        <li class="nav-item">
                            <a class="nav-link pl-3" href="{{'/users'}}"><span class="ml-1 item-text">@lang('site.users')</span></a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a href="#tables" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                        <i class="fe fe-settings fe-16"></i>
                        <span class="ml-3 item-text">@lang('site.settings')</span>
                    </a>
                    <ul class="collapse list-unstyled pl-4 w-100" id="tables">
                        <li class="nav-item">
                            <a class="nav-link pl-3" href="{{'/system/company/setting'}}"><span class="ml-1 item-text">@lang('site.company settings')</span></a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </aside>
    @yield('main_content')
</div> <!-- .wrapper -->

<script src="{{asset('asset/js/jquery.min.js')}}"></script>
<script src="{{asset('asset/js/popper.min.js')}}"></script>
<script src="{{asset('asset/js/moment.min.js')}}"></script>
<script src="{{asset('asset/js/bootstrap.min.js')}}"></script>
<script src="{{asset('asset/js/simplebar.min.js')}}"></script>
<script src='{{asset('asset/js/daterangepicker.js')}}'></script>
<script src='{{asset('asset/js/jquery.stickOnScroll.js')}}'></script>
<script src="{{asset('asset/js/tinycolor-min.js')}}"></script>
<script src="{{asset('asset/js/config.js')}}"></script>
<script src="{{asset('asset/js/d3.min.js')}}"></script>
<script src="{{asset('asset/js/topojson.min.js')}}"></script>
<script src="{{asset('asset/js/datamaps.all.min.js')}}"></script>
<script src="{{asset('asset/js/datamaps-zoomto.js')}}"></script>
<script src="{{asset('asset/js/datamaps.custom.js')}}"></script>
<script src="{{asset('asset/js/Chart.min.js')}}"></script>
<script>
    /* defind global options */
    Chart.defaults.global.defaultFontFamily = base.defaultFontFamily;
    Chart.defaults.global.defaultFontColor = colors.mutedColor;
</script>
<script src="{{asset('asset/js/gauge.min.js')}}"></script>
<script src="{{asset('asset/js/jquery.sparkline.min.js')}}"></script>
<script src="{{asset('asset/js/apexcharts.min.js')}}"></script>
<script src="{{asset('asset/js/apexcharts.custom.js')}}"></script>
<script src='{{asset('asset/js/jquery.mask.min.js')}}'></script>
<script src='{{asset('asset/js/select2.min.js')}}'></script>
<script src='{{asset('asset/js/jquery.steps.min.js')}}'></script>
<script src='{{asset('asset/js/jquery.validate.min.js')}}'></script>
<script src='{{asset('asset/js/jquery.timepicker.js')}}'></script>
<script src='{{asset('asset/js/dropzone.min.js')}}'></script>
<script src='{{asset('asset/js/uppy.min.js')}}'></script>
<script src='{{asset('asset/js/quill.min.js')}}'></script>

@yield('custom_scripts')

{{--//================custom internal scripts ==========================================--}}
<script>
    $('.select2').select2(
        {
            theme: 'bootstrap4',
        });
    $('.select2-multi').select2(
        {
            multiple: true,
            theme: 'bootstrap4',
        });
    $('.drgpicker').daterangepicker(
        {
            singleDatePicker: true,
            timePicker: false,
            showDropdowns: true,
            locale:
                {
                    format: 'MM/DD/YYYY'
                }
        });
    $('.time-input').timepicker(
        {
            'scrollDefault': 'now',
            'zindex': '9999' /* fix modal open */
        });
    /** date range picker */
    if ($('.datetimes').length)
    {
        $('.datetimes').daterangepicker(
            {
                timePicker: true,
                startDate: moment().startOf('hour'),
                endDate: moment().startOf('hour').add(32, 'hour'),
                locale:
                    {
                        format: 'M/DD hh:mm A'
                    }
            });
    }
    var start = moment().subtract(29, 'days');
    var end = moment();

    function cb(start, end)
    {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    }
    $('#reportrange').daterangepicker(
        {
            startDate: start,
            endDate: end,
            ranges:
                {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                }
        }, cb);
    cb(start, end);
    $('.input-placeholder').mask("00/00/0000",
        {
            placeholder: "__/__/____"
        });
    $('.input-zip').mask('00000-000',
        {
            placeholder: "____-___"
        });
    $('.input-money').mask("#.##0,00",
        {
            reverse: true
        });
    $('.input-phoneus').mask('(000) 000-0000');
    $('.input-mixed').mask('AAA 000-S0S');
    $('.input-ip').mask('0ZZ.0ZZ.0ZZ.0ZZ',
        {
            translation:
                {
                    'Z':
                        {
                            pattern: /[0-9]/,
                            optional: true
                        }
                },
            placeholder: "___.___.___.___"
        });
    // editor
    var editor = document.getElementById('editor');
    if (editor)
    {
        var toolbarOptions = [
            [
                {
                    'font': []
                }],
            [
                {
                    'header': [1, 2, 3, 4, 5, 6, false]
                }],
            ['bold', 'italic', 'underline', 'strike'],
            ['blockquote', 'code-block'],
            [
                {
                    'header': 1
                },
                {
                    'header': 2
                }],
            [
                {
                    'list': 'ordered'
                },
                {
                    'list': 'bullet'
                }],
            [
                {
                    'script': 'sub'
                },
                {
                    'script': 'super'
                }],
            [
                {
                    'indent': '-1'
                },
                {
                    'indent': '+1'
                }], // outdent/indent
            [
                {
                    'direction': 'rtl'
                }], // text direction
            [
                {
                    'color': []
                },
                {
                    'background': []
                }], // dropdown with defaults from theme
            [
                {
                    'align': []
                }],
            ['clean'] // remove formatting button
        ];
        var quill = new Quill(editor,
            {
                modules:
                    {
                        toolbar: toolbarOptions
                    },
                theme: 'snow'
            });
    }
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function()
    {
        'use strict';
        window.addEventListener('load', function()
        {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form)
            {
                form.addEventListener('submit', function(event)
                {
                    if (form.checkValidity() === false)
                    {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>

<script>
    var uptarg = document.getElementById('drag-drop-area');
    if (uptarg)
    {
        var uppy = Uppy.Core().use(Uppy.Dashboard,
            {
                inline: true,
                target: uptarg,
                proudlyDisplayPoweredByUppy: false,
                theme: 'dark',
                width: 770,
                height: 210,
                plugins: ['Webcam']
            }).use(Uppy.Tus,
            {
                endpoint: 'https://master.tus.io/files/'
            });
        uppy.on('complete', (result) =>
        {
            console.log('Upload complete! We’ve uploaded these files:', result.successful)
        });
    }
</script>

<script src="{{asset('asset/js/apps.js')}}"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>

<script>
    window.dataLayer = window.dataLayer || [];

    function gtag()
    {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'UA-56159088-1');
</script>

</body>
</html>
