@extends('layouts.client-frontend')

@section('main-content')
    <h1>{{ __('Užsakymas') }}</h1>
    <p>{{ __('Peržiūrėkite užsakymo detales ir pradėkite platinimą') }}</p>
    @include('partials.messages')
    <form method="post" action="/">
        @csrf
        <div class="row">
            <div class="col-lg-6">
                <div class="font-weight-bold text-center">
                    {{ __('Pasirinkite mokėjimo būdą') }}
                </div>
            </div>
            <div class="col-lg-6">
                <div class="font-weight-bold text-center">
                    {{ __('Užsakymo informacija') }}
                </div>
            </div>
        </div>
        <div class="text-right">
            <button type="submit" class="btn btn-primary">
                {{ __('Užsakyti') }}
            </button>
        </div>
    </form>
@endsection
