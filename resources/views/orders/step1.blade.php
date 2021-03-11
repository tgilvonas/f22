@extends('layouts.client-frontend')

@section('main-content')
    <h1>{{ __('Mikrorajonas') }}</h1>
    <p>{{ __('Pasirinkite mikrorajonus, kuriuose vyks platinimas') }}</p>
    @include('partials.messages')
    <form method="post" action="{{ route('orders.post_after_step_1') }}">
        @csrf
        <div class="">
            <label class="font-weight-bold">
                <input type="checkbox" name="select_all_districts" class="js-select-all-districts"> {{ __('Pažymėti visus rajonus') }}
            </label>
        </div>
        <div class="row">
            @foreach($districts as $district)
                <label class="col-xl-3">
                    <input type="checkbox" name="districts[]" value="{{ $district->id }}" class="js-district-to-select" /> {{ $district->name }}
                </label>
            @endforeach
        </div>
        <div class="text-right">
            <button type="submit" class="btn btn-primary">
                {{ __('Toliau') }}
            </button>
        </div>
    </form>
@endsection
