$(document).ready(function() {
    initialize();
});
$(document).on('click', '.saveProjectBtn', function(e) {
    e.preventDefault();
    $btnName = $(this).text();
    $(this).prop('disabled', true);
    $(this).html('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> ' + $btnName);
    const that = this;

    var formData = new FormData($('#addProjectForm')[0]);
    $('.removeProjectAttachmentBtn').each(function(index, element) {
        formData.append('files[]', $(element).data('id'))
    });
    const attributes = {
        hasButton: true,
        btnSelector: '.saveProjectBtn',
        btnText: $btnName,
        handleSuccess: function() {
            localStorage.setItem('flashMessage', datas['msg']);
            window.location.reload();
        }
    };
    const ajaxOptions = {
        url: routeUrlAddProject,
        method: 'post',
        data: formData
    };

    makeAjaxRequest(ajaxOptions, attributes);

});


var autocomplete;

function initialize() {
    var options = {
        // componentRestrictions: {
        //     country: "fr"
        // }
    };

    var acInput = document.getElementById("project_location");
    // for (var i = 0; i < acInputs.length; i++) {
    var autocomplete = new google.maps.places.Autocomplete(acInput, options);
    autocomplete.inputId = acInput.id;
    google.maps.event.addListener(autocomplete, 'place_changed', function() {
        var place = this.getPlace();
        var lat = place.geometry.location.lat();
        var lng = place.geometry.location.lng();
        $('#latitude_v').val(lat);
        $('#longitude_v').val(lng);
        // var doorFlatNo = "";
        // var streetName = "";

        // // Extract door/flat no. and street from address components
        // for (var i = 0; i < place.address_components.length; i++) {
        //     var component = place.address_components[i];
        //     if (component.types.includes('subpremise')) {
        //         doorFlatNo = component.short_name;
        //         break;
        //     } else if (component.types.includes('premise')) {
        //         doorFlatNo = component.short_name;
        //         break;
        //     } else if (component.types.includes('street_number')) {
        //         doorFlatNo = component.short_name;
        //     }
        // }

        // // Update visible text fields
        // $('#street_number_v').val(doorFlatNo);

        // // Extract street name
        // for (var i = 0; i < place.address_components.length; i++) {
        //     var component = place.address_components[i];
        //     if (component.types.includes('route')) {
        //         streetName = component.short_name;
        //         break;
        //     }
        // }

        // // Update visible text field for street name
        // $('#street_name_v').val(streetName);

        // // Extract country, state, city, and zipcode from address components
        // var country = "";
        // var state = "";
        // var city = "";
        // var zipcode = "";

        // for (var i = 0; i < place.address_components.length; i++) {
        //     var component = place.address_components[i];
        //     if (component.types.includes('country')) {
        //         country = component.long_name;
        //     } else if (component.types.includes('administrative_area_level_1')) {
        //         state = component.long_name;
        //     } else if (component.types.includes('locality')) {
        //         city = component.long_name;
        //     } else if (component.types.includes('postal_code')) {
        //         zipcode = component.short_name;
        //     }
        // }

        // Update hidden fields
        // $("#country_v").val(country);
        // $("#state_v").val(state);
        // $("#city_v").val(city);

        // // Update visible text field for zipcode
        // $('#zipcode_v').val(zipcode);

        initMapOnChange();
    });
    // }
}

function initMap() {
    let latVal = $('#latitude_v').val();
    let lngVal = $('#longitude_v').val();
    if (latVal && lngVal) {
        // Initialize the map
        var map = new google.maps.Map(document.getElementById('projectLocationMapAddForm'), {
            center: { lat: parseFloat(latVal), lng: parseFloat(lngVal) },
            zoom: 15
        });

        // Add a marker
        var marker = new google.maps.Marker({
            position: { lat: parseFloat(latVal), lng: parseFloat(lngVal) },
            map: map
        });
    } else {
        // Initialize the map
        var map = new google.maps.Map(document.getElementById('projectLocationMapAddForm'), {
            center: { lat: 40.83984419999999, lng: -73.079011 },
            zoom: 10
        });
    }

}

function initMapOnChange() {
    $('.invalid-feedback').html("");
    $('.invalid-feedback').removeClass("error");
    $('.is-invalid').removeClass("is-invalid");
    let latVal = $('#latitude_v').val()
    let lngVal = $('#longitude_v').val()
    if (latVal && lngVal) {

        // Initialize the map
        var map = new google.maps.Map(document.getElementById('projectLocationMapAddForm'), {
            center: { lat: parseFloat(latVal), lng: parseFloat(lngVal) },
            zoom: 15
        });

        // Add a marker
        var marker = new google.maps.Marker({
            position: { lat: parseFloat(latVal), lng: parseFloat(lngVal) },
            map: map
        });
    } else {
        $("#project_location").addClass('is-invalid');
        $("#project_location").next().addClass('error');
        $("#project_location").next().html(invalidAddressText);
        $("#project_location").show();
    }
}