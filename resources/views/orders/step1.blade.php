@extends('layouts.client-frontend')

@section('main-content')
    <h1>{{ __('Mikrorajonas') }}</h1>
    <p>{{ __('Pasirinkite mikrorajonus, kuriuose vyks platinimas') }}</p>
    @include('partials.messages')
    <form method="post" action="{{ route('orders.post_after_step_1') }}">
        @csrf
        <div id="districts_form_inner">

        </div>
        <div class="text-right pb-3">
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
                    <input type="text" class="form-control" v-model="search_text" @keyup="performSearch">
                </div>
            </div>
            <div class="">
                <label class="font-weight-bold">
                    <input type="checkbox" v-model="allDistrictsChecked" @change="setAllDistrictsInSelection"> Pažymėti visus rajonus
                </label>
            </div>
            <div class="wrapper-with-loader">
                <div class="row">
                    <div class="col-xl-12">
                        <label class="btn btn-sm btn-warning mr-1" v-for="districtInSelection in districtsInSelection" @mousedown="unsetDistrictInSelection(districtInSelection)" @mouseup.prevent>
                            <input type="checkbox" v-model="districtInSelection.checked" name="districts[]" :value="districtInSelection.id" @change.prevent @click.prevent @mouseup.prevent @mousedown="unsetDistrictInSelection(districtInSelection)">
                            <span v-text="districtInSelection.name"></span>
                        </label>
                        <button class="btn btn-sm btn-danger" type="button" v-if="districtsInSelection.length > 0" @click="clearAllDistrictsInSelection">Išvalyti pasirinkimus</button>
                    </div>
                </div>
                <hr v-if="districtsInSelection.length > 0"/>
                <div class="row">
                    <div v-for="district in districts" class="col-xl-3" v-show="!district.checked">
                        <label>
                            <input type="checkbox" v-model="district.checked" @change="setDistrictsInSelection(district)"> <span v-text="district.name"></span>
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 font-weight-bold">Pasirinktų auditorijų suma: <span v-text="sumOfAuditoriums"></span></div>
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
                allDistrictsChecked: false,
                sumOfAuditoriums: 0,
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
                },
                setDistrictsInSelection: function (district) {
                    for (let i=0; i<this.districts.length; i++) {
                        if (this.districts[i].name == district.name) {
                            this.districtsInSelection.push(district);
                        }
                    }
                    this.calculateSumOfAuditoriums();
                },
                unsetDistrictInSelection: function (district) {
                    for (let i=0; i<this.districtsInSelection.length; i++) {
                        if (this.districtsInSelection[i].name == district.name) {
                            this.districtsInSelection.splice(i, 1);
                            this.calculateSumOfAuditoriums();
                        }
                    }
                    for (let i=0; i<this.districts.length; i++) {
                        if (this.districts[i].name == district.name) {
                            this.districts[i].checked = false;
                        }
                    }
                },
                setAllDistrictsInSelection: function() {
                    if (this.allDistrictsChecked) {
                        this.districtsInSelection = this.districts;
                        for (let i=0; i<this.districtsInSelection.length; i++) {
                            this.districtsInSelection[i].checked = true;
                        }
                        this.calculateSumOfAuditoriums();
                    } else {
                        this.districtsInSelection = [];
                        this.getListOfDistricts();
                        this.sumOfAuditoriums = 0;
                    }
                },
                clearAllDistrictsInSelection: function () {
                    this.districtsInSelection = [];
                    this.allDistrictsChecked = false;
                    this.getListOfDistricts();
                    this.sumOfAuditoriums = 0;
                },
                calculateSumOfAuditoriums: function () {
                    this.sumOfAuditoriums = 0;
                    for (let i=0; i<this.districtsInSelection.length; i++) {
                        if (this.districtsInSelection[i].checked) {
                            this.sumOfAuditoriums = this.sumOfAuditoriums + this.districtsInSelection[i].population;
                        }
                    }
                }
            }
        });
    </script>
@endsection
