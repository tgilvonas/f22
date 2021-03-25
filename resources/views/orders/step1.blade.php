@extends('layouts.client-frontend')

@section('main-content')
    <h1>{{ __('Mikrorajonas') }}</h1>
    <p>{{ __('Pasirinkite mikrorajonus, kuriuose vyks platinimas') }}</p>
    @include('partials.messages')
    <form method="post" action="{{ route('orders.post_after_step_1') }}">
        @csrf
        <div id="districts_form_inner">

        </div>
        <div class="text-right">
            <button type="submit" class="btn btn-primary">
                {{ __('Toliau') }}
            </button>
        </div>
    </form>

    <script type="text/x-template" id="template_for_districts_selection">
        <div id="template_for_districts_selection_inner">
            <div class="row pb-3">
                <div class="col-xl-1 pt-1">
                    <div class="">Ieškoti:</div>
                </div>
                <div class="col-xl-11">
                    <input type="text" class="form-control" v-model="search_text" v-on:keyup="performSearch">
                </div>
            </div>
            <div class="">
                <label class="font-weight-bold">
                    <input type="checkbox" name="select_all_districts"> Pažymėti visus rajonus
                </label>
            </div>
            <div class="wrapper-with-loader">
                <div class="row">
                    <div v-for="district in districts" class="col-xl-3">
                        <label>
                            <input type="checkbox" v-model="district.selected"> <span v-text="district.name"></span>
                        </label>
                    </div>
                </div>
                <div class="loader-overlay" v-if="loading"></div>
            </div>
            <p v-if="districts.length==0">Mikrorajonų nerasta.</p>
        </div>
    </script>
    <script type="text/javascript">
        window.urls = {
            csrf_token: {!! "'".csrf_token()."'" !!},
            get_list_of_districts: {!! "'".route('orders.get_list_of_districts')."'" !!}
        };
        ingredientsList = new Vue({
            el: '#districts_form_inner',
            template: '#template_for_districts_selection',
            data: {
                districts: [],
                districtsInSelection: [],
                search_text: '',
                loading: true
            },
            mounted: function() {
                this.getListOfDistricts();
            },
            methods: {
                getListOfDistricts: function() {
                    let self = this;
                    self.loading = true;
                    axios.get(urls.get_list_of_districts, {
                        params: {
                            search_text: self.search_text
                        }
                    }).then(function(response){
                        self.loading = false;
                        self.districts = response.data;
                    });
                },
                performSearch: function() {
                    let delayTimer;
                    let self = this;
                    clearTimeout(delayTimer);
                    delayTimer = setTimeout(function() {
                        self.getListOfDistricts();
                    }, 1000);
                }
            }
        });
    </script>
@endsection
