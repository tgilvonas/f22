@extends('layouts.client-frontend')

@section('main-content')
    <h1>{{ __('Užsakymas') }}</h1>
    <p>{{ __('Peržiūrėkite užsakymo detales ir pradėkite platinimą') }}</p>
    @include('partials.messages')
    <form method="post" action="/">
        @csrf
        <div class="row">
            <div class="col-lg-6">
                <div class="font-weight-bold text-center pb-3">
                    {{ __('Pasirinkite mokėjimo būdą') }}
                </div>
            </div>
            <div class="col-lg-6">
                <div class="font-weight-bold text-center pb-3">
                    {{ __('Užsakymo informacija') }}
                </div>
                <table class="mb-3">
                    <tr>
                        <td>{{ __('Mikrorajonai') }}</td>
                        <td>{{ $sumOfDistricts }} {{ __('vnt.') }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('Pašto dėžučių kiekis') }}</td>
                        <td>{{ $sumOfPostalBoxes }} {{ __('vnt.') }}</td>
                    </tr>
                </table>
                <div class="mb-3">
                    {{ __('Sutinku su') }} {{ __('taisyklėmis') }}.
                    {{ __('Jūsų duomenys bus tvarkomi pagal mūsų privatumo politiką. Šiai svetainei taikoma reCAPTCHA apsauga, Google Privatumo politika ir Paslaugų teikimo sąlygos') }}.
                </div>
                <img src="/img/payments/payments.png" alt="" class="mb-3 img-width-auto" />
            </div>
        </div>
        <div class="text-right">
            <button type="submit" class="btn btn-primary">
                {{ __('Užsakyti') }}
            </button>
        </div>
    </form>
@endsection
