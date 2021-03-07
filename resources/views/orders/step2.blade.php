@extends('layouts.client-frontend')

@section('main-content')
    <h1>{{ __('Platinamas leidinys') }}</h1>
    <p>{{ __('Pasirinkite variantą, kuris labiausiai atitiks Jūsų poreikius') }}</p>
    @include('partials.messages')
    <form method="post" action="{{ route('orders.post_to_step2') }}">
        @csrf

        <div class="text-right">
            <button type="submit" class="btn btn-primary">
                {{ __('Toliau') }}
            </button>
        </div>
    </form>
@endsection
