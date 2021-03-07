<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8" />
    <title>{{isset($title)?$title:'Reset-Password | Eat-Drink-Enjoy'}}</title>
    <meta name="description" content="Login page example" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <link href="{{asset('/css/pages/login/classic/login-1.css?v=7.0.4')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/plugins/custom/prismjs/prismjs.bundle.css?v=7.0.4')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/css/style.bundle.css?v=7.0.4')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/css/themes/layout/header/base/light.css?v=7.0.4')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/css/themes/layout/header/menu/light.css?v=7.0.4')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/css/themes/layout/brand/dark.css?v=7.0.4')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/css/themes/layout/aside/dark.css?v=7.0.4')}}" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="{{asset('/front/images/logo.png')}}" />
    <link rel="stylesheet" href="{{asset('vendor/toastr/css/toastr.min.css')}}">

</head>

<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
    
    @yield('content')
    
    @include('admin.commons.scripts')

    @yield('scripts')

</body>

</html>