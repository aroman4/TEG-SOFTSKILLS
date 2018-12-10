@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Verifica tu email</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            Un link de verificación ha sido enviado a tu correo.
                        </div>
                    @endif

                    Revisa tu correo para obtener el link de verificación.
                    Si no recibiste el email, <a href="{{ route('verification.resend') }}">click aquí para solicitar otro</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
