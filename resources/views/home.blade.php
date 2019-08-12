@extends('layouts.app')
@include('barranavppal')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">Sistema HADECI</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    ¡Usted está logueado/a!

                </div>
  @include('segundabarranav')
            </div>
        </div>
    </div>

</div>

@endsection
{{-- @include('segundabarranav') --}}
