$(document).ready(function() {
    // Initialize slider-for
    $(".slider-for").slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        fade: true,
        infinite: true,
        asNavFor: ".slider-nav",
    });

    // Initialize slider-nav
    $(".slider-nav").slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        asNavFor: ".slider-for",
        infinite: true,
        dots: false,
        arrows: false,
        // centerMode: true,
        // focusOnSelect: true
    });
});

// Copies selector code
const minVal = 1;
const maxVal = 100;
$(document).on("click", ".increaseCopiesBtn", function() {
    let currentVal = parseInt(
        $(this).parent().find("input[name=copies]").val()
    );
    if (currentVal < maxVal) {
        $(this)
            .parent()
            .find("input[name=copies]")
            .val(currentVal + 1);
    }
});
$(document).on("click", ".decreaseCopiesBtn", function() {
    let currentVal = parseInt(
        $(this).parent().find("input[name=copies]").val()
    );
    if (currentVal > minVal) {
        $(this)
            .parent()
            .find("input[name=copies]")
            .val(currentVal - 1);
    }
});
// Copies selector code

// Subtype on type Change
$(document).ready(function() {
    $("#type_id").change(function() {
        var typeId = $(this).val();

        if (typeId === "") {
            $("#subtype").empty().prop("disabled", true);
            return; // Exit early if no type is selected
        }
        var subtypeUrl = subtypeSelectedTypeId.replace(":typeId", typeId);

        $.ajax({
            url: subtypeUrl,
            type: "GET",
            success: function(response) {
                var subtypes = response;
                $("#subtype").empty().prop("disabled", false);
                $("#subtype2").empty().prop("disabled", false);
                $("#subtype").append("<option> Property Subtype </option>");
                $.each(subtypes, function(index, subtype) {
                    $("#subtype").append('<option value="' + subtype.id + '">' + subtype.name + "</option>");
                    $("#subtype2").append(
                        '<option value="' +
                        subtype.id +
                        '">' +
                        subtype.name +
                        "</option>"
                    );
                });
            },
            error: function(xhr, status, error) {
                console.error("Failed to fetch subtypes");
            },
        });
    });
});
// Subtype on type Change

$(document).on("click", ".addNewUnitBtn", function(e) {
    e.preventDefault();
    $btnName = $(this).text();
    $(this).prop("disabled", true);
    $(this).html(
        '<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> ' +
        $btnName
    );
    const that = this;

    var formData = new FormData($("#addUnitForm")[0]);

    const attributes = {
        hasButton: true,
        btnSelector: ".addNewUnitBtn",
        btnText: $btnName,
        handleSuccess: function() {
            // localStorage.setItem('flashMessage', datas['msg']);
            window.location.href = datas["data"];
        },
    };
    const ajaxOptions = {
        url: routeUrlAddUnit,
        method: "post",
        data: formData,
    };

    makeAjaxRequest(ajaxOptions, attributes);
});

$(document).on("click", ".removeDevelopmentBtn", function(e) {
    e.preventDefault();
    var name = $(this).data("name");
    var id = $(this).data("id");

    show_message3(developmentDeleteConfirmText, "confirm", {
        confirmMessage: areYouSureTextConfirmPopup,
        confirmBtnText: deleteTextConfirmPopup,
        confirmSecondaryMessage: deleteTextConfirmPopup + " " + name,
        callback: function() {
            window.location.href = developmentDeleteUrl.replace(":id", id);
        },
    });
});

// Terms of payment selector code
const minSelectorVal = 1;
const maxSelectorVal = 50;
$(document).on("click", ".increasePaymentTermsBtn", function() {
    let currentVal = parseInt(
        $(this).parent().find("input[name=agent_commission_per]").val()
    );
    if (currentVal < maxSelectorVal) {
        $(this)
            .parent()
            .find("input[name=agent_commission_per]")
            .val(currentVal + 1);
    }
});
$(document).on("click", ".decreasePaymentTermsBtn", function() {
    let currentVal = parseInt(
        $(this).parent().find("input[name=agent_commission_per]").val()
    );
    if (currentVal > minSelectorVal) {
        $(this)
            .parent()
            .find("input[name=agent_commission_per]")
            .val(currentVal - 1);
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
            var autocomplete = new google.maps.places.Autocomplete(
                input,
                options
            );
            input.setAttribute("data-autocomplete-bound", "true"); // Mark as initialized to avoid duplicates

            // Add a listener to each autocomplete instance
            google.maps.event.addListener(
                autocomplete,
                "place_changed",
                function() {
                    var place = autocomplete.getPlace();
                    var lat = place.geometry.location.lat();
                    var lng = place.geometry.location.lng();

                    // Find and update latitude and longitude fields for this specific input
                    document.getElementById(`latitude_v_${index}`).value = lat;
                    document.getElementById(`longitude_v_${index}`).value = lng;

                    initMapOnChange(
                        lat,
                        lng,
                        `developmentLocationMap_${index}`
                    );
                }
            );
        }
    });
}

// Initialize a map for each location field
function initMap() {
    document
        .querySelectorAll(".developmentLocation")
        .forEach((input, index) => {
            // console.log(document.getElementById(`latitude_v_0`).value)
            let latVal = document.getElementById(`latitude_v_${index}`).value;
            let lngVal = document.getElementById(`longitude_v_${index}`).value;
            let mapElementId = `developmentLocationMap_${index}`;

            if (latVal && lngVal) {
                var map = new google.maps.Map(
                    document.getElementById(mapElementId), {
                        center: {
                            lat: parseFloat(latVal),
                            lng: parseFloat(lngVal),
                        },
                        zoom: 15,
                    }
                );

                var marker = new google.maps.Marker({
                    position: {
                        lat: parseFloat(latVal),
                        lng: parseFloat(lngVal),
                    },
                    map: map,
                });
            } else {
                var map = new google.maps.Map(
                    document.getElementById(mapElementId), {
                        center: { lat: 40.83984419999999, lng: -73.079011 },
                        zoom: 10,
                    }
                );
            }
        });
}

// Function to reinitialize the map on location change
function initMapOnChange(lat, lng, mapElementId) {
    if (lat && lng) {
        var map = new google.maps.Map(document.getElementById(mapElementId), {
            center: { lat: parseFloat(lat), lng: parseFloat(lng) },
            zoom: 15,
        });

        var marker = new google.maps.Marker({
            position: { lat: parseFloat(lat), lng: parseFloat(lng) },
            map: map,
        });
    } else {
        console.error("Invalid latitude or longitude");
    }
}

// Call this function after an AJAX request that adds new location fields
function setupAutocompleteForNewFields() {
    initialize(); // This will re-run the initialization for all fields
}

// Location related code

$(document).on("click", ".updateDevelopmentBtn", function(e) {
    e.preventDefault();
    $btnName = $(this).text();
    $id = $(this).data("id");
    $(this).prop("disabled", true);
    $(this).html(
        '<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> ' +
        $btnName
    );
    const that = this;

    var formData = new FormData($("#updateDevelopmentForm")[0]);
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
        btnSelector: ".updateDevelopmentBtn",
        btnText: $btnName,
        handleSuccess: function() {
            localStorage.setItem("flashMessage", datas["msg"]);
            $('#editDevelopmentModal').modal('hide');
            window.location.href = loadManageUrl;
        },
        handleErrorMessages: function() {
            
            $.each(datas["errors"], function(index, html) {
                
                if (
                    index == "development_images" ||
                    index == "floor_plans" ||
                    index == "cover_image" ||
                    index == "legal_document" ||
                    index == "brochure"
                ) { 
                    $("#" + index)
                        .parent(".dynamic-dropzone-container")
                        .next()
                        .addClass("error");
                    $("#" + index)
                        .parent(".dynamic-dropzone-container")
                        .next()
                        .html(html);
                    $("#" + index)
                        .parent(".dynamic-dropzone-container")
                        .next()
                        .show();
                }
            });
        },
    };
    const ajaxOptions = {
        url: routeUrlUpdateDevelopment.replace(":id", $id),
        method: "post",
        data: formData,
    };

    makeAjaxRequest(ajaxOptions, attributes);
});

var selectedCheckboxesArr = [];

$(document).on("change", ".developmentUnitCheckboxAll", function(e) {
    // var selectedCheckboxesArr = [];
    if ($(".developmentUnitCheckboxAll:checked").length > 0) {
        $(".action_Short_by").css("opacity", "100%");
        $(".developmentUnitCheckbox").prop("checked", true);
        $(".updateDevelopementStatus").attr("disabled", false);
        $("#sort_by_property_two").attr("disabled", false);
        // $('#developmentUnitCheckbox').attr('disabled', false);
        $(".developmentUnitCheckbox").each(function(index, element) {
            if ($(element).prop("checked")) {
                selectedCheckboxesArr.push($(element).data("id"));
            }
        });

    } else {
        $(".action_Short_by").css("opacity", "50%");
        $(".developmentUnitCheckbox").prop("checked", false);
        $(".updateDevelopementStatus").attr("disabled", true);
        // $('#assign_btn').attr('disabled', true);
    }
});
$(document).on("click", ".developmentUnitCheckbox", function(e) {
    $("#sort_by_property_two").attr("disabled", false);
    $(".updateDevelopementStatus").attr("disabled", false);
    $(".developmentUnitCheckbox").each(function(index, element) {
        if ($(element).prop("checked")) {
            selectedCheckboxesArr.push($(element).data("id"));
        }
    });


    if ($(".developmentUnitCheckbox:checked").length > 0) {
        $(".action_Short_by").css("opacity", "100%");
        $("#sort_by_property_two").attr("disabled", false);
        $("#assign_btn").attr("disabled", false);
    } else {
        $(".action_Short_by").css("opacity", "50%");
        $("#sort_by_property_two").attr("disabled", true);
        $("#assign_btn").attr("disabled", true);
    }
});

$(document).on("click", "#send_inquiry_btn", function(e) {
    e.preventDefault();
    $btnName = $(this).text();

    $id = $(this).data("id");
    $(this).prop("disabled", true);
    $(this).html(
        '<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> ' +
        $btnName
    );
    const that = this;

    var selectedCheckboxesArr = [];

    $(".developmentUnitCheckbox:checked").each(function(index, element) {
        selectedCheckboxesArr.push($(element).data("id"));
    });
    $(".developmentUnitCheckboxAll:checked").each(function(index, element) {
        selectedCheckboxesArr.push($(element).data("id"));
    });

    var formData = new FormData();
    var selectElement = document.getElementById("sort_by_property_two");
    var selectedOptionText =
        selectElement.options[selectElement.selectedIndex].value;
    formData.append("development_status", selectedOptionText);
    selectedCheckboxesArr.forEach(function(value) {
        formData.append("selectedCheckboxesArr[]", value);
    });

    const attributes = {
        hasButton: true,
        btnSelector: ".development_status",
        btnText: $btnName,
        handleSuccess: function() {
            localStorage.setItem("flashMessage", datas["msg"]);
            window.location.reload();
        },
        handleErrorMessages: function() {},
    };
    const ajaxOptions = {
        url: loadManageUrl.replace(":id", $id),
        method: "post",
        data: formData,
    };

    makeAjaxRequest(ajaxOptions, attributes);
});

// function openMyModal2() {

// }
$(document).on("click", ".updateDevelopementStatus", function(e) {
    var selectedText = null;
    var referenceValue = [];
    $(".developmentUnitCheckbox:checked").each(function(index, element) {
        referenceValue.push($(element).data('reference'));

    });
    selectedText = $("#sort_by_property_two option:selected").text();
    if ($(this).val() != 'edit') {
        $('.unit_message').text(selectedText)
        $('#unit_heading').text(selectedText);
        referenceValue.forEach((input, index) => {
            $('.property_reference_id').append(input + '<br>');
        })


        let myModal = new bootstrap.Modal(

            document.getElementById("property_lead_sure"), {}
        );
        myModal.show();
    }

});

$(document).on('click', '.removeDevelopmentUnitBtn', function(e) {
    e.preventDefault();
    var name = $(this).data('name');
    var id = $(this).data('id');

    show_message3(customerDeleteConfirmText1 + " " + name,
        'confirm', {
            confirmMessage: areYouSureTextConfirmPopup,
            confirmBtnText: removeTextConfirmPopup,
            confirmSecondaryMessage: removeTextConfirmPopup + ' ' + name,
            callback: function() {
                window.location.href = developmentDeleteUnitUrl.replace(':id', id);
            }
        });
});