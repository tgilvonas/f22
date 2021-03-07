const monthNames = [
    'Sausis',
    'Vasaris',
    'Kovas',
    'Balandis',
    'Gegužė',
    'Birželis',
    'Liepa',
    'Rugpjūts',
    'Rugsėjis',
    'Spalis',
    'Lapkritis',
    'Gruodis'
];
const dayNamesShort = [
    'Sk',
    'Pr',
    'An',
    'Tr',
    'Kt',
    'Pn',
    'Št',
];

$(document).ready(function(){
    $('.js-select-all-districts').change(function(){
        if ($('.js-select-all-districts').prop('checked')) {
            $('.js-district-to-select').prop('checked', true);
        } else {
            $('.js-district-to-select').prop('checked', false);
        }
    });
    $('.js-district-to-select').change(function(){
        $('.js-select-all-districts').prop('checked', false);
    });
});
