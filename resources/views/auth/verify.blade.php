@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verifikasi Alamat Email') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Alamat Link verifikasi sudah dikirimkan ke email anda, silahkan periksa email terbaru anda!') }}
                        </div>
                    @endif

                    {{ __('Untuk melanjutkan, silahkan periksa link verifikasi') }}
                    {{ __('Tidak menemukan email verifikasi?') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Kirim Ulang!') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
