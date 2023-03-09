@extends('admin.adminlayout')
  @section('contentindex')
    @include('admin.layout.header')
      @yield('content')
      @yield('js')
    @include('admin.layout.footer')
  @endsection


