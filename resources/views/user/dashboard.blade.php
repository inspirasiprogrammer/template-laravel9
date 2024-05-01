@extends('layouts.main.app')
@section('head')
@include('layouts.main.headersection',['title'=> __('Dashboard'),'buttons'=>[
  // [
  //   'name'=>'<i class="fa fa-plus"></i>&nbsp'.__('Create Device'),
  //   // 'url'=> route('user.device.create'),
  // ],
  // [
  //   'name'=>'<i class="fi fi-rs-paper-plane"></i>&nbsp'.__('Sent a message'),
  //   // 'url'=> url('/user/sent-text-message'),
  // ],
]])
@endsection
@section('content')

@endsection
@push('js')
<script src="{{ asset('assets/vendor/chart.js/dist/chart.min.js') }}"></script>
<script src="{{ asset('assets/plugins/canvas-confetti/confetti.browser.min.js') }}"></script>
@endpush
