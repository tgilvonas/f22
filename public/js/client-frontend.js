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

    $('.js-order-type-box[data-id="'+$('.js-order-type-input:checked').val()+'"]').addClass('selected');
    $('.js-print-format-box[data-id="'+$('.js-print-format-input:checked').val()+'"]').addClass('selected');
    $('.js-select-order-type').click(function(){
        $('.js-order-type-box').removeClass('selected');
        $(this).parents('.js-order-type-box').addClass('selected');
        $('.js-order-type-input').prop('checked', false);
        $('.js-order-type-input[value="'+$(this).attr('data-id')+'"]').prop('checked', true);
    });
    $('.js-print-format-box').click(function(){
        $('.js-print-format-box').removeClass('selected');
        $(this).addClass('selected');
        $('.js-print-format-input').prop('checked', false);
        $('.js-print-format-input[value="'+$(this).attr('data-id')+'"]').prop('checked', true);
    });
});
