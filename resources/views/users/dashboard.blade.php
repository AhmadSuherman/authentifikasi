@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @if(Auth()->user()->hasRole('student'))
            <div class="card">
                <div class="card-header" style="background: yellow">{{ __('Dashboard Siswa') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <br><br>
                    Example Tampilan Untuk Siswa
                </div>
            </div>
            @elseif(Auth()->user()->hasRole('teacher'))

            <div class="card">
                <div class="card-header" style="background: grey">{{ __('Dashboard Guru') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <br><br>
                    Example Tampilan Untuk Guru
                </div>
            </div>

            @elseif(Auth()->user()->hasRole('staff'))

             <div class="card">
                <div class="card-header" style="background: blue">{{ __('Dashboard Staff') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <br><br>
                    Example Tampilan Untuk Staff
                </div>
            </div>

            @else

            Anda Siapa? Anda Pasti admin? yakan? silahkan Setting di Resources/views/users/dashboard sesuai Tampilan yang anda mau untuk admin, Terimakasih

            @endif


        </div>
    </div>
</div>
@endsection