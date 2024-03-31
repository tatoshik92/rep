
$(function () {
    // Google map - open/close
    $('.kr-open-map-popup').click(function(){
        krMapPopupOpen();
    });
    function krMapPopupOpen(){
        $('.kr-popup-map').addClass('kr-opened');
        $('#krCordLocation').val($('#formCoordinate').val());
        $('#addressAutocomplete').val($('#formAddress').val());
        initMap();
    }

    $('.kr-map-popup-close').click(function(){
        $('.kr-popup-map').removeClass('kr-opened');
    });

    $('.kr-popup-input-clear').click(function () {
        $('#addressAutocomplete').val('');
        $('#krCordLocation').val('');
    });


    $('.kr-popup-button-ok').click(function(){
        $('#formCoordinate').val($('#krCordLocation').val()).parsley().validate();
        $('#formAddress').val($('#addressAutocomplete').val()).parsley().validate();
        $('#formAddress').addClass('kr-noempty');
        $('.kr-popup-map').removeClass('kr-opened');
    });

    //Google map
    if ($('div').is('#map')) {
        initMap();
    }
    function initMap() {
        var coordinates = $('#krCordLocation').val();
        if (coordinates == "" || coordinates == undefined) {
            coordinates = $('#krCordLocation').data('default');
        }
        var coordinatesArr = coordinates.split('(').join('').split(')').join('').split(' ').join('').split(",");
        var lat = parseFloat(coordinatesArr[0]);
        var lng = parseFloat(coordinatesArr[1]);
        var centerLatLng = { lat: lat, lng: lng };
        var input = document.getElementById('addressAutocomplete');


        var map = new google.maps.Map(document.getElementById('map'), {
            center: centerLatLng,
            zoom: 13,
        });

        var marker = new google.maps.Marker({
            draggable: true,
            position: centerLatLng,
            map: map,
        });

        var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.setFields(
            ['address_components', 'geometry', 'icon', 'name']);

        var geocoder = new google.maps.Geocoder();

        autocomplete.addListener('place_changed', function () {
            // infowindow.close();
            marker.setVisible(false);
            var place = autocomplete.getPlace();
            if (!place.geometry) {
                // User entered the name of a Place that was not suggested and
                // pressed the Enter key, or the Place Details request failed.
                window.alert("No details available for input: '" + place.name + "'");
                return;
            }

            // If the place has a geometry, then present it on a map.
            if (place.geometry.viewport) {
                map.fitBounds(place.geometry.viewport);
            } else {
                map.setCenter(place.geometry.location);
                map.setZoom(17);  // Why 17? Because it looks good.
            }
            marker.setPosition(place.geometry.location);
            marker.setVisible(true);

            geocoder.geocode({ latLng: marker.getPosition() }, function (result, status) {
                if ('OK' === status) {
                    address = result[0].formatted_address;
                    $('#krCordLocation').val(marker.getPosition());
                    $('#addressAutocomplete').val(address);
                    //console.log($('#krCordLocation').val());
                    //console.log($('#addressAutocomplete').val());

                } else {
                    console.log('Geocode was not successful for the following reason: ' + status);
                }

            });

        });

        google.maps.event.addListener(marker, "dragend", function (event) {
            var lat, long, address, resultArray;

            lat = marker.getPosition().lat();
            long = marker.getPosition().lng();

            map.setCenter(new google.maps.LatLng(lat, long));

            geocoder.geocode({ latLng: marker.getPosition() }, function (result, status) {
                if ('OK' === status) {
                    address = result[0].formatted_address;
                    $('#krCordLocation').val(marker.getPosition());
                    $('#addressAutocomplete').val(address);
                    //console.log($('#krCordLocation').val());
                    //console.log($('#krAddressLocation').val());

                } else {
                    console.log('Geocode was not successful for the following reason: ' + status);
                }

            });
        });

        google.maps.event.addListener(map, 'click', function (event) {

            var lat, long, address, resultArray;

            lat = event.latLng.lat();
            long = event.latLng.lng();


            map.setCenter(new google.maps.LatLng(lat, long));
            var myLatLng = new google.maps.LatLng(lat, long);
            marker.setPosition(myLatLng);

            geocoder.geocode({ latLng: marker.getPosition() }, function (result, status) {
                if ('OK' === status) {
                    address = result[0].formatted_address;
                    $('#krCordLocation').val(marker.getPosition());
                    $('#addressAutocomplete').val(address);
                    //console.log($('#krCordLocation').val());
                    //console.log($('#addressAutocomplete').val(address));

                } else {
                    console.log('Geocode was not successful for the following reason: ' + status);
                }
            });
        });
    };


});