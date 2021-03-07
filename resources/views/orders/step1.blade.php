@extends('layouts.client-frontend')

@section('main-content')
    <h1>{{ __('Mikrorajonas') }}</h1>
    <p>{{ __('Pasirinkite mikrorajonus, kuriuose vyks platinimas') }}</p>
    <form method="post" action="{{ route('orders.post_to_step2') }}">
        @csrf
        @foreach($districts as $district)
            <label>
                <input type="checkbox" name="districts[]" value="{{ $district->id }}"/> {{ $district->name }}
            </label>
        @endforeach
        <div class="text-right">
            <button type="submit" class="btn btn-primary">
                {{ __('Toliau') }}
            </button>
        </div>
    </form>
@endsection
