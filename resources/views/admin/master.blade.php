<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="{!! asset('admin_assets/img/favicon.png') !!}" type="image/x-icon"/>
    <title>@yield('title')</title>
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Menu CSS -->
    <link href="{!! asset('admin_assets/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css') !!}"
          rel="stylesheet">
    <!-- toast CSS -->
    <link href="{!! asset('admin_assets/plugins/bower_components/toast-master/css/jquery.toast.css') !!}"
          rel="stylesheet">
    <!-- morris CSS -->
    <link href="{!! asset('admin_assets/plugins/bower_components/morrisjs/morris.css') !!}" rel="stylesheet">
    <!-- animation CSS -->
    <link href="{!! asset('admin_assets/css/animate.css') !!}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{!! asset('admin_assets/css/style.css') !!}" rel="stylesheet">
    <!-- color CSS -->
    <link href="{!! asset('admin_assets/css/colors/blue.css') !!}" id="theme" rel="stylesheet">
    <!-- data table CSS -->
    <link href="{!! asset('admin_assets/plugins/bower_components/datatables/jquery.dataTables.min.css') !!}" rel="stylesheet" type="text/css"/>
    <!-- Date Picker -->
    <link rel="stylesheet" href="{!! asset('admin_assets/plugins/bower_components/datepicker/datepicker3.css') !!}">
    <!-- time picker-->
    <link rel="stylesheet" href="{!! asset('admin_assets/plugins/bower_components/timepicker/bootstrap-timepicker.min.css') !!}">
    <!-- sweetalert-->
    <link rel="stylesheet" href="{!! asset('admin_assets/plugins/bower_components/sweetalert/sweetalert.css') !!}">
    <!-- select 2 -->
    <link rel="stylesheet" href="{!! asset('admin_assets/plugins/bower_components/select2/select2.min.css') !!}">
    <!-- toast CSS -->
    <link href="{!! asset('admin_assets/plugins/bower_components/toast-master/css/jquery.toast.css') !!}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	
    <script src="{!! asset('admin_assets/plugins/bower_components/jquery/dist/jquery.min.js')!!}"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">

    <script type="text/javascript">
        var base_url = "{{ url('/').'/' }}";
    </script>
    <style>
        .bg-title .breadcrumb {
            background: 0 0;
            margin-bottom: 0;
            float: none;
            padding: 0;
            margin-bottom: 9px;
            font-weight: 700;
            color: #777;
        }

        .select2-container .select2-selection--single .select2-selection__rendered {
            height: auto;
            margin-top: -6px;
            padding-left: 0;
            padding-right: 0;
        }

        .select2-container .select2-selection--single {
            box-sizing: border-box;
            cursor: pointer;
            display: block;
            height: 35px;
        }

        .select2-container--default .select2-selection--single, .select2-selection .select2-selection--single {
            border: 1px solid #d2d6de;
            border-radius: 0;
            padding: 8px 11px;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 26px;
            position: absolute;
            top: 4px;
            right: 1px;
            width: 20px;
        }

        .breadcrumbColor a {
            color: #41b3f9 !important;
        }

        tr td {
            color: black !important;
        }

        .tr_header {
            background-color: #EDF1F5;
        }

        table.dataTable thead th, table.dataTable thead td {
            padding: 10px 18px;
            border-bottom: 1px solid #e4e7ea;
        }

        .btnColor {
            color: #fff !important;
        }

        .validateRq {
            color: red;
        }

        .panel .panel-heading {
            border-radius: 0;
            font-weight: 500;
            font-size: 16px;
            padding: 10px 25px;
        }

        .btn_style {
            width: 106px;
        }

        .error {
            color: red;
        }
        #side-menu li a {
            color: #54667a;
            border-left: 0px solid #fff;
            font-weight: 600;
        }
        .sidebar .mdi {
            font-size: 21px;
            margin-right: 7px;
        }
        .caret {
            display: inline-block;
            width: 0;
            height: 0;
            margin-left: 5px;
            vertical-align: middle;
            border-top: 8px dashed;
            border-top: 4px solid\9;
            border-right: 4px solid transparent;
            border-left: 4px solid transparent;
        }
        .navbar-top-links > li > a {
            color: #ffffff;
            font-size: 17px;
        }
        .logo b {
            height: 60px;
            float: left;
            padding-left: 10px;
            width: auto;
            line-height: 59px;
            text-align: center;
            margin-left: 81px;

        }

    </style>
</head>

<body class="fix-header" >
<div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
    </svg>
</div>
<div id="wrapper">
    <nav class="navbar navbar-default navbar-static-top m-b-0">
        <div class="navbar-header">
            <div class="top-left-part">
                <a class="logo" href="{{url('dashboard')}}">
                    <b>
                        LOGO
                    </b>
                  <span class="hidden-xs"</span>
                </a>
            </div>
            <ul class="nav navbar-top-links navbar-left">
                <li><a href="javascript:void(0)" class="open-close waves-effect waves-light"><i  class="ti-menu tiMenu"></i></a></li>
            </ul>
            <ul class="nav navbar-top-links navbar-right pull-right">
                <li class="dropdown">
                   @php  $employeeInfo = employeeInfo(); @endphp
                    <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> <img
                                src="{!! asset('admin_assets/img/default.png') !!}" alt="user-img" width="36"
                                class="img-circle"><b class="hidden-xs"><span class="hideMenu">{!!   $employeeInfo->email !!}</span></b><span
                                class="caret hideMenu"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-user animated flipInY">
                        <li><a href=""><i class="ti-user"></i> My Profile</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{url('changePassword')}}"><i class="ti-settings"></i> Change Password</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{URL::to('/logout')}}"><i class="fa fa-power-off"></i> Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav slimscrollsidebar">
            <div class="sidebar-head">
                <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span class="hide-menu">Navigation</span></h3>
			</div>
            <div class="user-profile">
                <div class="dropdown user-pro-body">
                    <div>
                        <img src="{!! asset('admin_assets/img/default.png') !!}" alt="user-img" class="img-circle">
                    </div>
                    <a href="#" class="dropdown-toggle u-dropdown " data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="hideMenu">
                            {!!   $employeeInfo->name !!}</span>
                    </a>
                </div>
            </div>
            <ul class="nav" id="side-menu">
                <li>
                    <a href="{{ url('dashboard') }}" class="waves-effect">
                        <i class="mdi mdi-home hideMenu" data-icon="v"></i>
                        <span class="hide-menu hideMenu"> Dashboard  </span></a>
                </li>
                @foreach(showMenu() as $value)
                    <li><a href="{{route($value->menu_url)}}" class="waves-effect">
                            <i class="{{$value->menu_icon}}" data-icon="v"></i>
                            <span class="hide-menu hideMenu"> {{$value->name}}  </span></a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div id="page-wrapper">
        @yield('content')
    </div>
    <footer class="footer text-center">
        {{date('Y')}} &copy; <strong><a href="http://nextdot.com.au" target="_blank">NextDot</a>
        </strong> All rights reserved.
    </footer>
</div>

<div class="modal fade" id="ajax" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">

        </div>
    </div>
</div>
<div class="modal fade" id="modelLg" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

        </div>
    </div>
</div>


<script src="{!! asset('admin_assets/bootstrap/dist/js/bootstrap.min.js') !!}"></script>
<!-- Menu Plugin JavaScript -->
<script src="{!! asset('admin_assets/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js') !!}"></script>
<!--slimscroll JavaScript -->
<script src="{!! asset('admin_assets/js/jquery.slimscroll.js') !!}"></script>
<!--Wave Effects -->
<script src="{!! asset('admin_assets/js/waves.js') !!}"></script>
<!--Counter js -->
<script src="{!! asset('admin_assets/plugins/bower_components/waypoints/lib/jquery.waypoints.js') !!}"></script>
<script src="{!! asset('admin_assets/plugins/bower_components/counterup/jquery.counterup.min.js') !!}"></script>
<!-- Sparkline chart JavaScript -->
<script src="{!! asset('admin_assets/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js') !!}"></script>
<!-- Custom Theme JavaScript -->
<script src="{!! asset('admin_assets/js/custom.min.js') !!}"></script>
<script src="{!! asset('admin_assets/js/dashboard1.js') !!}"></script>
<script src="{!! asset('admin_assets/plugins/bower_components/toast-master/js/jquery.toast.js') !!}"></script>
<script src="{!! asset('admin_assets/plugins/bower_components/datatables/jquery.dataTables.min.js') !!}"></script>
<script src="{!! asset('admin_assets/plugins/bower_components/sweetalert/sweetalert-dev.js') !!}"></script>
<!-- bootstrap-datepicker -->
<script src="{!! asset('admin_assets/plugins/bower_components/datepicker/bootstrap-datepicker.js')!!}"></script>
<!--TIme picker js-->
<script src="{!! asset('admin_assets/plugins/bower_components/timepicker/bootstrap-timepicker.min.js')!!}"></script>
<!-- select2 -->
<script src="{!! asset('admin_assets/plugins/bower_components/select2/select2.full.min.js')!!}"></script>
<!-- toast -->
<script src="{!! asset('admin_assets/plugins/bower_components/toast-master/js/jquery.toast.js')!!}"></script>
<script src="{!! asset('admin_assets/js/toastr.js')!!}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<!-- jquery-validator -->
<script type="text/javascript" src="{!! asset('admin_assets/plugins/bower_components/jquery-validator/jquery-validator.1.15.0.js')!!}"></script>
<script type="text/javascript" src="{!! asset('admin_assets/plugins/bower_components/jquery-validator/jquery-additional-method.1.15.0.min.js')!!}"></script>



<script>
            @if(Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info') }}";
    switch(type){
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;

        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;
        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;
        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
    @endif

      $(function () {
        $(".select2").select2();
        $('#myTable').DataTable({
            "ordering": false,
        });

    });

    $(".alert-success").delay(2000).fadeOut("slow");
    $(document).on("focus", ".yearPicker", function () {
        $(this).datepicker({
            format: 'yyyy',
            minViewMode: 2
        }).on('changeDate', function (e) {
            $(this).datepicker('hide');
        });
    });

    $(document).on("focus", ".dateField", function () {
        $(this).datepicker({
            format: 'dd/mm/yyyy',
            todayHighlight: true,
            clearBtn: true
        }).on('changeDate', function (e) {
            $(this).datepicker('hide');
        });
    });

    $(document).on("focus", ".timePicker", function () {
        $(this).timepicker({
            showInputs: false,
            minuteStep: 5
        });
    });

    $(".monthField").datepicker({
        format: "yyyy-mm",
        viewMode: "months",
        minViewMode: "months"
    }).on('changeDate', function (e) {
        $(this).datepicker('hide');
    });

    $(document).on('click', '.delete', function () {
        var actionTo = $(this).attr('href');
        var token = $(this).attr('data-token');
        var id = $(this).attr('data-id');
        swal({
                    title: "Are you sure?",
                    text: "You will not be able to recover this imaginary file!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, delete it!",
                    closeOnConfirm: false
                },
                function (isConfirm) {
                    if (isConfirm) {
                        $.ajax({
                            url: actionTo,
                            type: 'post',
                            data: {_method: 'delete', _token: token},
                            success: function (data) {
                                if (data == 'hasForeignKey') {
                                    swal({
                                        title: "Oops!",
                                        text: "This data is used anywhere",
                                        type: "error"
                                    });
                                } else if (data == 'success') {
                                    swal({
                                                title: "Deleted!",
                                                text: "Your information delete successfully.",
                                                type: "success"
                                            },
                                            function (isConfirm) {
                                                if (isConfirm) {
                                                    $('.' + id).fadeOut();
                                                }
                                            });
                                } else {
                                    swal({
                                        title: "Deleted!",
                                        text: "Something Error Found !, Please try again.",
                                        type: "error"
                                    });
                                }
                            }

                        });
                    } else {
                        swal("Cancelled", "Your data is safe .", "error");
                    }
                });
        return false;
    });


    var custom = function (){
        console.log('custom js initialised');
        alertInit = function() {

            setTimeout(function() {
                $('.alert-info').fadeOut('fast');
            }, 1000);

        };

        ajaxModalInit = function () {
            // console.log("hello");
            $('#modelLg').on('show.bs.modal', function (event) {
                $(this).removeData('bs.modal');
            });

            $('#modelLg').on('hidden.bs.modal',function(){
                $(this).removeData('bs.modal');
            });

            $("body").on("show.bs.modal",'#ajax', function(e) {
                var source = $(e.relatedTarget);
                var link = source.attr('data-url'); //Our custom data which we want to pass to the modal body.

                $(this).find(".modal-content").load(link);//Pass the custom data to the modal body which is loading a link page.
            });


            $("body").on("show.bs.modal",'#modelLg', function(e) {
                var source = $(e.relatedTarget);
                var link = source.attr('data-url'); //Our custom data which we want to pass to the modal body.

                $(this).find(".modal-content").load(link);//Pass the custom data to the modal body which is loading a link page.
            });
        };

        var handleModals = function () {

            // fix stackable modal issue: when 2 or more modals opened, closing one of modal will remove .modal-open class.
            $('body').on('hide.bs.modal', function () {

                if ($('.modal:visible').size() > 1 && $('html').hasClass('modal-open') == false) {
                    $('html').addClass('modal-open');
                } else if ($('.modal:visible').size() <= 1) {
                    $('html').removeClass('modal-open');
                }
            });
        };



        return {

            init: function () {
                alertInit(); //all message alert
                ajaxModalInit();
            }
        }
    }();

    custom.init();
</script>




<script>
    custom.init();
</script>
@yield('page_scripts')

</body>
</html>
