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
                        <td style="vertical-align: top;">{{ __('Mikrorajonai/seniūnijos') }}:</td>
                        <td>{{ implode(', ', $districts) }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('Auditorija') }}:</td>
                        <td>{{ $sumOfAuditoriums }} {{ __('gyv.') }}</td>
                    </tr>
                </table>
                <div class="mb-3">
                    {{ __('Užsisakydami skrajučių platinimo paslaugą, Jūs sutinkate su paslaugos teikimo') }} <a href="{{ route('terms-and-conditions') }}" target="_blank">{{ __('taisyklėmis') }}</a>.
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
