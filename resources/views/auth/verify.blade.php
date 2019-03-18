@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verificar su dirección de email') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Se ha enviado un nuevo link a su dirección de email.') }}
                        </div>
                    @endif

                    {{ __('Antes de proceder, por favor busque en su email el link de verificación.') }}
                    {{ __('Si no recibió el email') }}, <a href="{{ route('verification.resend') }}">{{ __('haga clic acá para requerir otro') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
