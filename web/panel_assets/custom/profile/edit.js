$('#profile_repeater_phone').repeater({
    initEmpty: ($('#profile_repeater_phone').data('count') == 0 ? true : false ),
    show: function () {
        $(this).slideDown();
        let selectType = $(this).find('[data-control="select2"]');
        selectType.find('option:first').prop('selected', true);
        selectType.select2({minimumResultsForSearch: 'Infinity'});
    },

    hide: function (deleteElement) {
        $(this).slideUp(deleteElement);
    }
});

$('#profile_repeater_website').repeater({
    initEmpty: ($('#profile_repeater_website').data('count') == 0 ? true : false ),
    show: function () {
        $(this).slideDown();
    },

    hide: function (deleteElement) {
        $(this).slideUp(deleteElement);
    }
});



$('#profile_repeater_emails').repeater({
    initEmpty: ($('#profile_repeater_emails').data('count') == 0 ? true : false ),
    show: function () {
        $(this).slideDown();
        let selectType = $(this).find('[data-control="select2"]');
        selectType.find('option:first').prop('selected', true);
        selectType.select2({minimumResultsForSearch: 'Infinity'});
    },

    hide: function (deleteElement) {
        $(this).slideUp(deleteElement);
    }
});

$('#profile_repeater_address').repeater({
    initEmpty: ($('#profile_repeater_address').data('count') == 0 ? true : false ),
    show: function () {
        $(this).slideDown();
        let selectType = $(this).find('[data-control="select2"]');
        selectType.find('option:first').prop('selected', true);
        selectType.select2({minimumResultsForSearch: 'Infinity'});
    },

    hide: function (deleteElement) {
        $(this).slideUp(deleteElement);
    }
});

$('#profile_repeater_socialmedia').repeater({
    initEmpty: ($('#profile_repeater_socialmedia').data('count') == 0 ? true : false ),
    show: function () {
        $(this).slideDown();
        let selectType = $(this).find('[data-control="select2"]');
        selectType.find('option:first').prop('selected', true);
        selectType.select2({minimumResultsForSearch: 'Infinity'});
    },

    hide: function (deleteElement) {
        $(this).slideUp(deleteElement);
    }
});


$('#profile_repeater_youtube_link').repeater({
    initEmpty: ($('#profile_repeater_youtube_link').data('count') == 0 ? true : false ),
    show: function () {
        $(this).slideDown();
    },

    hide: function (deleteElement) {
        $(this).slideUp(deleteElement);
    }
});

$(function () {
    let modalPhones = document.getElementById('tt_phone_modal');
    let modalWebsite = document.getElementById('tt_websites_modal');
    let modalEmails = document.getElementById('tt_emails_modal');
    let modalAddresses = document.getElementById('tt_addresses_modal');
    let modalSmm = document.getElementById('tt_smm_modal');
    let modalVideo = document.getElementById('tt_youtube_link_modal');


    modalPhones.addEventListener('hide.bs.modal', function (event) {
        let countItems = $(modalPhones).find('[data-repeater-item]').length;
        $('[data-bages-count-phones]').text(countItems);
    });

    modalWebsite.addEventListener('hide.bs.modal', function (event) {
        let countItems = $(modalWebsite).find('[data-repeater-item]').length;
        $('[data-bages-count-website]').text(countItems);
    });

    modalEmails.addEventListener('hide.bs.modal', function (event) {
        let countItems = $(modalEmails).find('[data-repeater-item]').length;
        $('[data-bages-count-emails]').text(countItems);
    });

    modalVideo.addEventListener('hide.bs.modal', function (event) {
        let countItems = $(modalVideo).find('[data-repeater-item]').length;
        $('[data-bages-count-video]').text(countItems);
    });

    modalAddresses.addEventListener('hide.bs.modal', function (event) {
        let countItems = $(modalAddresses).find('[data-repeater-item]').length;
        $('[data-bages-count-addresses]').text(countItems);
    });

    modalSmm.addEventListener('hide.bs.modal', function (event) {
        let countItems = $(modalSmm).find('[data-repeater-item]').length;
        $('[data-bages-count-smm]').text(countItems);
    });


});




