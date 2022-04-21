<!DOCTYPE html>
<html lang="en">
@include('backend.seller.includes.meta')
<head>
    <title>Obligate Gadgets - @yield('title')</title>
    @include('backend.admin.includes.style')
</head>
<body class="fixed-navbar">
<div class="page-wrapper">
    @include('backend.seller.includes.header')
    @include('backend.seller.includes.menu')
    <div class="content-wrapper">
        @yield('body')
        @include('backend.seller.includes.footer')
    </div>
</div>
@include('backend.seller.includes.script')
</body>
</html>
