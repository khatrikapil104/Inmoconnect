$(document).on('click', '.addDevelopmentBtn', function(e) {
    e.preventDefault();
    $btnName = $(this).text();
    $(this).prop('disabled', true);
    $(this).html('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> ' + $btnName);
    const that = this;

    var formData = new FormData($('#addDevelopmentForm')[0]);
    var development_images = $("#development_images").get(0).dropzone.files;
    for (var i = 0; i < development_images.length; i++) {
        formData.append("development_images[]", development_images[i]);
    }
    var floor_plans = $("#floor_plans").get(0).dropzone.files;
    for (var i = 0; i < floor_plans.length; i++) {
        formData.append("floor_plans[]", floor_plans[i]);
    }

    var cover_image = $("#cover_image").get(0).dropzone.files;
    for (var i = 0; i < cover_image.length; i++) {
        formData.append("cover_image", cover_image[i]);
    }
    var legal_document = $("#legal_document").get(0).dropzone.files;
    for (var i = 0; i < legal_document.length; i++) {
        formData.append("legal_document", legal_document[i]);
    }
    var brochure = $("#brochure").get(0).dropzone.files;
    for (var i = 0; i < brochure.length; i++) {
        formData.append("brochure", brochure[i]);
    }

    const attributes = {
        hasButton: true,
        btnSelector: '.addDevelopmentBtn',
        btnText: $btnName,
        handleSuccess: function() {
            localStorage.setItem('flashMessage', datas['msg']);
            window.location.reload();
        },handleErrorMessages: function() {
            $.each(datas["errors"], function(index, html) {
                if (index == "development_images" || index == "floor_plans" || index == "cover_image" || index == "legal_document" || index == "brochure"  ) {
                    $("#"+index)
                        .parent(".dynamic-dropzone-container")
                        .next()
                        .addClass("error");
                    $("#"+index)
                        .parent(".dynamic-dropzone-container")
                        .next()
                        .html(html);
                    $("#"+index)
                        .parent(".dynamic-dropzone-container")
                        .next()
                        .show();
                }
            });

        },
    };
    const ajaxOptions = {
        url: routeUrlAddDevelopment,
        method: 'post',
        data: formData
    };

    makeAjaxRequest(ajaxOptions, attributes);

});
// $(document).on('click', '.editDevelopmentBtn', function() {
//     $('#editDevelopmentModal').find('.modal-body').addClass('loader');
//     $('#editDevelopmentModal').modal('show');
//     $id = $(this).attr('data-id');
//     $name = $(this).attr('data-name');
//     const attributes = {
//         hasButton: false,
//         handleSuccess: function() {
//             $('#editDevelopmentModal').find('#updateDevelopmentForm').html(datas['data']);
//             $('#editDevelopmentModal').find('.modal-body').removeClass('loader');
//             $('#editDevelopmentModal').find('.cancelInvitationBtn').attr('data-id', parseInt($id));
//             $('#editDevelopmentModal').find('.cancelInvitationBtn').attr('data-name', $name);
//             $('#editDevelopmentModal').find('.updateDevelopmentBtn').attr('data-id', parseInt($id));
//         },
//         handleError: function() {
//             $('#editDevelopmentModal').find('.modal-body').removeClass('loader');
//         },
//         handleErrorMessages: function() {}
//     };

//     const ajaxOptions = {
//         url: routeUrlLoadEditView.replace(':id', $id),
//         method: 'get',
//         data: {}
//     };

//     makeAjaxRequest(ajaxOptions, attributes);
// });

$(document).on('click', '.removeDevelopmentBtn', function(e) {
    e.preventDefault();
    var name = $(this).data('name');
    var id = $(this).data('id');

    show_message3(developmentDeleteConfirmText + " <br> " + name,
        'confirm', {
            confirmMessage: areYouSureTextConfirmPopup,
            confirmBtnText: removeTextConfirmPopup,
            confirmSecondaryMessage: removeTextConfirmPopup + ' ' + name,
            callback: function() {
                window.location.href = developmentDeleteUrl.replace(':id', id);
            }
        });
});

$(document).on('click', '.updateDevelopmentBtn', function(e) {
    e.preventDefault();
    $btnName = $(this).text();
    $id = $(this).data('id');
    $(this).prop('disabled', true);
    $(this).html('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> ' + $btnName);
    const that = this;

    var formData = new FormData($('#updateDevelopmentForm')[0]);
    var development_images = $("#development_images").get(0).dropzone.files;
    for (var i = 0; i < development_images.length; i++) {
        formData.append("development_images[]", development_images[i]);
    }
    var floor_plans = $("#floor_plans").get(0).dropzone.files;
    for (var i = 0; i < floor_plans.length; i++) {
        formData.append("floor_plans[]", floor_plans[i]);
    }

    var cover_image = $("#cover_image").get(0).dropzone.files;
    for (var i = 0; i < cover_image.length; i++) {
        formData.append("cover_image", cover_image[i]);
    }
    var legal_document = $("#legal_document").get(0).dropzone.files;
    for (var i = 0; i < legal_document.length; i++) {
        formData.append("legal_document", legal_document[i]);
    }
    var brochure = $("#brochure").get(0).dropzone.files;
    for (var i = 0; i < brochure.length; i++) {
        formData.append("brochure", brochure[i]);
    }

    const attributes = {
        hasButton: true,
        btnSelector: '.updateDevelopmentBtn',
        btnText: $btnName,
        handleSuccess: function() {
            localStorage.setItem('flashMessage', datas['msg']);
            window.location.reload();
        },handleErrorMessages: function() {
            $.each(datas["errors"], function(index, html) {
                if (index == "development_images" || index == "floor_plans" || index == "cover_image" || index == "legal_document" || index == "brochure"  ) {
                    $("#"+index)
                        .parent(".dynamic-dropzone-container")
                        .next()
                        .addClass("error");
                    $("#"+index)
                        .parent(".dynamic-dropzone-container")
                        .next()
                        .html(html);
                    $("#"+index)
                        .parent(".dynamic-dropzone-container")
                        .next()
                        .show();
                }
            });

        },
    };
    const ajaxOptions = {
        url: routeUrlUpdateDevelopment.replace(':id', $id),
        method: 'post',
        data: formData
    };

    makeAjaxRequest(ajaxOptions, attributes);

});

// Terms of payment selector code
const minVal = 1;
const maxVal = 50;
$(document).on('click','.increasePaymentTermsBtn',function(){
    let currentVal = parseInt($(this).parent().find('input[name=agent_commission_per]').val());
    if (currentVal < maxVal) {
        $(this).parent().find('input[name=agent_commission_per]').val( currentVal + 1);
      }
});
$(document).on('click','.decreasePaymentTermsBtn',function(){
    let currentVal = parseInt($(this).parent().find('input[name=agent_commission_per]').val());
    if (currentVal > minVal) {
        $(this).parent().find('input[name=agent_commission_per]').val( currentVal - 1);
      }
});
// Terms of payment selector code


// Location related code 
$(document).ready(function() {
    initialize();
});
var autocomplete;
function initialize() {
    // Select all input fields with the class "project-location"
    var locationInputs = document.querySelectorAll(".developmentLocation");

    var options = {
        // componentRestrictions: {
        //     country: "fr"
        // }
    };

    // Loop through each location input and attach autocomplete
    locationInputs.forEach((input, index) => {
        if (!input.hasAttribute("data-autocomplete-bound")) {
            var autocomplete = new google.maps.places.Autocomplete(input, options);
            input.setAttribute("data-autocomplete-bound", "true"); // Mark as initialized to avoid duplicates

            // Add a listener to each autocomplete instance
            google.maps.event.addListener(autocomplete, 'place_changed', function() {
                var place = autocomplete.getPlace();
                var lat = place.geometry.location.lat();
                var lng = place.geometry.location.lng();
               
                // Find and update latitude and longitude fields for this specific input
                document.getElementById(`latitude_v_${index}`).value = lat;
                document.getElementById(`longitude_v_${index}`).value = lng;

                initMapOnChange(lat, lng, `developmentLocationMap_${index}`);
            });
        }
    });
}

// Initialize a map for each location field
function initMap() {
    document.querySelectorAll(".developmentLocation").forEach((input, index) => {
        let latVal = document.getElementById(`latitude_v_${index}`).value;
        let lngVal = document.getElementById(`longitude_v_${index}`).value;
        let mapElementId = `developmentLocationMap_${index}`;

        if (latVal && lngVal) {
            var map = new google.maps.Map(document.getElementById(mapElementId), {
                center: { lat: parseFloat(latVal), lng: parseFloat(lngVal) },
                zoom: 15
            });

            var marker = new google.maps.Marker({
                position: { lat: parseFloat(latVal), lng: parseFloat(lngVal) },
                map: map
            });
        } else {
            var map = new google.maps.Map(document.getElementById(mapElementId), {
                center: { lat: 40.83984419999999, lng: -73.079011 },
                zoom: 10
            });
        }
    });
}

// Function to reinitialize the map on location change
function initMapOnChange(lat, lng, mapElementId) {
    if (lat && lng) {
        var map = new google.maps.Map(document.getElementById(mapElementId), {
            center: { lat: parseFloat(lat), lng: parseFloat(lng) },
            zoom: 15
        });

        var marker = new google.maps.Marker({
            position: { lat: parseFloat(lat), lng: parseFloat(lng) },
            map: map
        });
    } else {
        console.error("Invalid latitude or longitude");
    }
}

// Call this function after an AJAX request that adds new location fields
function setupAutocompleteForNewFields() {
    initialize();  // This will re-run the initialization for all fields
}

// Location related code

