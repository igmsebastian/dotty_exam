<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('dashboard') }}/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('dashboard') }}/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Admin | @yield('title')</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="{{ asset('dashboard') }}/css/bootstrap.min.css" rel="stylesheet" />

    <!--  Paper Dashboard core CSS    -->
    <link href="{{ asset('dashboard') }}/css/paper-dashboard.css" rel="stylesheet" />


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{ asset('dashboard') }}/css/demo.css" rel="stylesheet" />


    <!--  Fonts and icons     -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="{{ asset('dashboard') }}/css/themify-icons.css" rel="stylesheet">
</head>

<body>
    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    <div class="wrapper">
        @include('admin.layouts.navbars.sidebar')
        <div class="main-panel">
            @include('admin.layouts.navbars.nav')
            @yield('content')
            @include('admin.layouts.footer')
        </div>
    </div>
</body>

<!--   Core JS Files. Extra: TouchPunch for touch library inside jquery-ui.min.js   -->
<script src="{{ asset('dashboard') }}/js/jquery.min.js" type="text/javascript"></script>
<script src="{{ asset('dashboard') }}/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="{{ asset('dashboard') }}/js/perfect-scrollbar.min.js" type="text/javascript"></script>
<script src="{{ asset('dashboard') }}/js/bootstrap.min.js" type="text/javascript"></script>

<!--  Forms Validations Plugin -->
<script src="{{ asset('dashboard') }}/js/jquery.validate.min.js"></script>

<!-- Promise Library for SweetAlert2 working on IE -->
<script src="{{ asset('dashboard') }}/js/es6-promise-auto.min.js"></script>

<!--  Select Picker Plugin -->
<script src="{{ asset('dashboard') }}/js/bootstrap-selectpicker.js"></script>

<!--  Checkbox, Radio, Switch and Tags Input Plugins -->
<script src="{{ asset('dashboard') }}/js/bootstrap-switch-tags.js"></script>

<!--  Bootstrap Table Plugin    -->
<script src="{{ asset('dashboard') }}/js/bootstrap-table.js"></script>

<!--  Plugin for DataTables.net  -->
<script src="{{ asset('dashboard') }}/js/jquery.datatables.js"></script>

<!-- Paper Dashboard PRO Core javascript and methods for Demo purpose -->
<script src="{{ asset('dashboard') }}/js/paper-dashboard.js"></script>

<!-- Paper Dashboard PRO DEMO methods, don't include it in your project! -->
<script src="{{ asset('dashboard') }}/js/demo.js"></script>

<script type="text/javascript">
    $().ready(function(){
        $('#registerFormValidation').validate();
        $('#loginFormValidation').validate();
        $('#allInputsFormValidation').validate();
    });
</script>

@stack('scripts')

</html>
