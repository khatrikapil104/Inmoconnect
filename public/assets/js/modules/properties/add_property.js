
$(document).ready(function() {
    initialize();
});
$(document).on('click','.addNewPropertyBtn',function(e){
    e.preventDefault();
    $btnName = $(this).text();
    $(this).prop('disabled',true);
    $(this).html('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> '+$btnName);
    const that = this;
    var formData = new FormData($('#addPropertyForm')[0]);
    var files = $("#files").get(0).dropzone.files;
    for (var i = 0; i < files.length; i++) {
        formData.append("files[]", files[i]);
    }

    const attributes = {hasButton : true, btnSelector : '.addNewPropertyBtn',btnText : $btnName, handleSuccess : function() {
        localStorage.setItem('flashMessage', datas['msg']);
        window.location.href =  datas['data'];
    }, handleErrorMessages : function(){
        $.each(datas['errors'], function(index, html) {
            if(index == 'files'){
                $("#files").parent('.dynamic-dropzone-container').next().addClass('error');
                $("#files").parent('.dynamic-dropzone-container').next().html(html);
                $("#files").parent('.dynamic-dropzone-container').next().show();
            }
        });

        var invalidFeedbackElements = document.getElementsByClassName("invalid-feedback");

    // Iterate through the elements
    for (var i = 0; i < invalidFeedbackElements.length; i++) {
        var element = invalidFeedbackElements[i];
        var computedStyle = window.getComputedStyle(element);
        if (computedStyle.display === "block") {
            var scrollPosition = element.getBoundingClientRect().top + window.scrollY - 300;
            window.scrollTo(0, scrollPosition);
            break;
        }
    }

    } };
    const ajaxOptions = {
        url: routeUrl,
        method: 'post',
        data: formData
    };

    makeAjaxRequest(ajaxOptions,attributes);

});


$(document).ready(function () {
    $('#owner_id').change(function () {
        var selectedAgentId = $(this).val();

        var agentDetailsUrl = geAgentDetailsUrl.replace(':id',selectedAgentId);
        $.ajax({
            url: agentDetailsUrl,
            method: 'GET',
            success: function (response) {
                // Update the details based on the response
                $('#vendor_name').val(response.name);
                $('#vendor_mobile').val(response.phone);
                $('#vendor_email').val(response.email);
            },
            error: function (error) {
                console.log(error);
            }
        });
    });
});


var autocomplete;

function initialize() {
    var options = {
        // componentRestrictions: {
        //     country: "fr"
        // }
    };

    var acInput = document.getElementById("address");
    // for (var i = 0; i < acInputs.length; i++) {
    var autocomplete = new google.maps.places.Autocomplete(acInput, options);
    autocomplete.inputId = acInput.id;
    google.maps.event.addListener(autocomplete, 'place_changed', function () {
        var place = this.getPlace();
        var lat = place.geometry.location.lat();
        var lng = place.geometry.location.lng();
        $('#latitude_v').val(lat);
        $('#longitude_v').val(lng);
        var doorFlatNo = "";
        var streetName = "";

        // Extract door/flat no. and street from address components
        for (var i = 0; i < place.address_components.length; i++) {
            var component = place.address_components[i];
            if (component.types.includes('subpremise')) {
                doorFlatNo = component.short_name;
                break;
            } else if (component.types.includes('premise')) {
                doorFlatNo = component.short_name;
                break;
            } else if (component.types.includes('street_number')) {
                doorFlatNo = component.short_name;
            }
        }

        // Update visible text fields
        $('#street_number_v').val(doorFlatNo);

        // Extract street name
        for (var i = 0; i < place.address_components.length; i++) {
            var component = place.address_components[i];
            if (component.types.includes('route')) {
                streetName = component.short_name;
                break;
            }
        }

        // Update visible text field for street name
        $('#street_name_v').val(streetName);

        // Extract country, state, city, and zipcode from address components
        var country = "";
        var state = "";
        var city = "";
        var zipcode = "";

        for (var i = 0; i < place.address_components.length; i++) {
            var component = place.address_components[i];
            if (component.types.includes('country')) {
                country = component.long_name;
            } else if (component.types.includes('administrative_area_level_1')) {
                state = component.long_name;
            } else if (component.types.includes('locality')) {
                city = component.long_name;
            } else if (component.types.includes('postal_code')) {
                zipcode = component.short_name;
            }
        }

        // Update hidden fields
        $("#country_v").val(country);
        $("#state_v").val(state);
        $("#city_v").val(city);

        // Update visible text field for zipcode
        $('#zipcode_v').val(zipcode);

        initMapOnChange();
    });
    // }
}

$(document).on('click','.locateAddressBtn',function(){
    initMapOnChange();
});

function initMap() {
    let latVal = $('#latitude_v').val();
    let lngVal = $('#longitude_v').val();
    if(latVal && lngVal){
        // Initialize the map
        var map = new google.maps.Map(document.getElementById('propertyMap'), {
            center: { lat: parseFloat(latVal), lng: parseFloat(lngVal) },
            zoom: 15
        });

        // Add a marker
        var marker = new google.maps.Marker({
          position: { lat: parseFloat(latVal), lng: parseFloat(lngVal) },
          map: map
        });
    }else{
        // Initialize the map
        var map = new google.maps.Map(document.getElementById('propertyMap'), {
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
    if(latVal && lngVal){

        // Initialize the map
        var map = new google.maps.Map(document.getElementById('propertyMap'), {
          center: { lat: parseFloat(latVal), lng: parseFloat(lngVal) },
          zoom: 15
        });

        // Add a marker
        var marker = new google.maps.Marker({
          position: { lat: parseFloat(latVal), lng: parseFloat(lngVal) },
          map: map
        });
    }else{
        $("#address").addClass('is-invalid');
        $("#address").next().addClass('error');
        $("#address").next().html(invalidAddressText);
        $("#address").show();
    }
}


