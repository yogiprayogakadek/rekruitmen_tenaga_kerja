<head>

    <meta charset="utf-8" />
    <title>Rekruitmen Tenaga Kerja | @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('assets/uploads/images/logo.png')}}">

    <!-- Layout config Js -->
    <script src="{{asset('assets/js/layout.js')}}"></script>
    <!-- Bootstrap Css -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{asset('assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{asset('assets/css/custom.min.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{asset('assets/datatables/1.11.5/css/dataTables.bootstrap5.min.css')}}" />
    <!--datatable responsive css-->
    <link rel="stylesheet" href="{{asset('assets/datatables/responsive/2.2.9/css/responsive.bootstrap.min.css')}}" />

    <link rel="stylesheet" href="{{asset('assets/datatables/buttons/2.2.2/css/buttons.dataTables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    @stack('css')

</head>