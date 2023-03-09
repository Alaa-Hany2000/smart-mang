@extends('admin.adminlayout')
  @section('contentindex')
    @include('admin.layout.header')
    @yield('cssStyle')
      @yield('content')
      @yield('js')
    @include('admin.layout.footer')
  @endsection


