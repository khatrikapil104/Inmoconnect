$(document).ready(function() {
    initialize();
    // $('#uploadedPropertiesModal').modal('show');
    if (isEditPage == "Yes") {
        setTimeout(() => {
            $("#type_id").change();
            $("#category_id").change();
        }, 1000);
    }
});
$(document).on("click", ".addCreateNewPropertyBtn", function(e) {
    e.preventDefault();

    let sale_price = $("#sale_price").val();
    let short_price = $("#short_price").val();
    let long_price = $("#long_price").val();

    let price = "";

    if (sale_price !== null && sale_price !== "") {
        price = sale_price;
    } else if (short_price !== null && short_price !== "") {
        price = short_price;
    } else if (long_price !== null && long_price !== "") {
        price = long_price;
    }

    $btnName = $(this).text();
    $(this).prop("disabled", true);
    $(this).html(
        '<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> ' +
        $btnName
    );
    const that = this;
    var formData = new FormData($("#addNewPropertyForm")[0]);

    formData.append("price", price);

    if ($('input[name = copies]').length > 0) {
        formData.append("copies", parseInt($('input[name = copies]').val()));
    }
    if (developmentId) {
        formData.append("development_id", developmentId);
    }

    var files = $("#files").get(0).dropzone.files;
    for (var i = 0; i < files.length; i++) {
        formData.append("files[]", files[i]);
    }

    var cover_image = $("#cover_image").get(0).dropzone.files;
    for (var i = 0; i < cover_image.length; i++) {
        formData.append("cover_image", cover_image[i]);
    }

    let documentIds = [];
    let subFetureId = [];
    $(".removeDocumentBtn").each(function(index, elem) {
        documentIds.push($(elem).attr("data-id"));
    });
    $(".featureChekedId").each(function(index, featureId) {
        var feature_id = $(featureId).attr("data-id");
        if (!subFetureId[feature_id]) {
            subFetureId[feature_id] = [];
        }
        $(".subFetureCheckbox").each(function(index, elem) {
            if ($(elem).is(":checked") && feature_id != null) {
                if ($(elem).attr("feature_id") === feature_id) {
                    subFetureId[feature_id].push([$(elem).attr("data-id")]);
                }
            }
        });
    });

    $.each(subFetureId, function(feature_id, ids) {
        if (ids != null && feature_id != null) {
            formData.append("subFetureId[" + feature_id + "]", ids);
        }
    });
    formData.append("documentIds", documentIds.join(","));
    const attributes = {
        hasButton: true,
        btnSelector: ".addCreateNewPropertyBtn",
        btnText: $btnName,
        handleSuccess: function() {
            if (datas['msg'] && datas['msg'] == 'uploadedPropertiesModal') {
                $('.uploadedPropertiesTableData').html(datas["data"]);
                $('#uploadedPropertiesModal').modal('show');
            } else {

                localStorage.setItem("flashMessage", datas["msg"]);
                window.location.href = datas["data"];
            }
        },
        handleErrorMessages: function() {
            $.each(datas["errors"], function(index, html) {
                if (index == "files") {
                    $("#files")
                        .parent(".dynamic-dropzone-container")
                        .next()
                        .addClass("error");
                    $("#files")
                        .parent(".dynamic-dropzone-container")
                        .next()
                        .html(html);
                    $("#files")
                        .parent(".dynamic-dropzone-container")
                        .next()
                        .show();
                }
                if (index == "cover_image") {
                    $("#cover_image")
                        .parent(".dynamic-dropzone-container")
                        .next()
                        .addClass("error");
                    $("#cover_image")
                        .parent(".dynamic-dropzone-container")
                        .next()
                        .html(html);
                    $("#cover_image")
                        .parent(".dynamic-dropzone-container")
                        .next()
                        .show();
                }
            });
            var invalidFeedbackElements =
                document.getElementsByClassName("invalid-feedback");

            // Iterate through the elements
            for (var i = 0; i < invalidFeedbackElements.length; i++) {
                var element = invalidFeedbackElements[i];
                var computedStyle = window.getComputedStyle(element);
                if (computedStyle.display === "block") {
                    var scrollPosition =
                        element.getBoundingClientRect().top +
                        window.scrollY -
                        300;
                    window.scrollTo(0, scrollPosition);
                    break;
                }
            }
        },
    };
    const ajaxOptions = {
        url: routeUrl,
        method: "post",
        data: formData,
    };

    makeAjaxRequest(ajaxOptions, attributes);
});

$(document).on('click', '.uploadedPropertiesSubmitBtn', function(e) {
    e.preventDefault();
    $btnName = $(this).text();
    $status = $(this).attr('data-name');
    $(this).prop('disabled', true);
    $(this).html('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> ' + $btnName);
    const that = this;
    $('.uploadPropertiesModalErrorMsg').addClass('d-none');
    var formData = new FormData($('#uploadedPropertiesForm')[0]);
    formData.append('status', $status);

    const attributes = {
        hasButton: true,
        btnSelector: '.uploadedProperties' + $status + 'Btn',
        btnText: $btnName,
        handleSuccess: function() {
            localStorage.setItem('flashMessage', datas['msg']);
            window.location.href = datas['data'];
        },
        handleErrorMessages: function() {
            console.log('asdas')
            $.each(datas["errors"], function(index, html) {

                if ($("input[name=\"" + index + "\"]").length > 0 && $("input[name=\"" + index + "\"]").parent().next().hasClass('input-group-append')) {
                    $("input[name=\"" + index + "\"]").addClass('is-invalid');
                    $("input[name=\"" + index + "\"]").parent().next().next().addClass('error');
                    $("input[name=\"" + index + "\"]").parent().next().next().html(html);
                    $("input[name=\"" + index + "\"]").parent().next().next().show();
                } else if ($("input[name=\"" + index + "\"]").length > 0) {
                    $("input[name=\"" + index + "\"]").addClass('is-invalid');
                    $("input[name=\"" + index + "\"]").next().addClass('error');
                    $("input[name=\"" + index + "\"]").next().html(html);
                    $("input[name=\"" + index + "\"]").show();
                } else if ($("select[name=\"" + index + "\"]").length > 0) {
                    $("select[name=\"" + index + "\"]").addClass('is-invalid');
                    $("select[name=\"" + index + "\"]").next().addClass('error');
                    $("select[name=\"" + index + "\"]").next().html(html);
                    $("select[name=\"" + index + "\"]").next().show();
                }

                if (index == 'uploadedPropertiesData]') {
                    $('.uploadPropertiesModalErrorMsg1').removeClass('d-none');
                }
                if (html.includes('Required')) {
                    $('.uploadPropertiesModalErrorMsg2').removeClass('d-none');
                }
                if (html.includes('Already Exists')) {
                    $('.uploadPropertiesModalErrorMsg3').removeClass('d-none');
                }
            });
        }
    };
    const ajaxOptions = {
        url: routeUrlUploadedProperties,
        method: 'post',
        data: formData
    };

    makeAjaxRequest(ajaxOptions, attributes);

});

$(document).on('click', '.removeUploadedPropertyButton', function(e) {
    e.preventDefault();
    console.log(e);
    
    $('.uploadedPropertyRow' + $(this).attr('data-id')).remove();
    var count = $("#uploadedPropertiesTableDatas tr").length;
    $('.numberofcopies').text(count-1);
});
$(document).on('click', '.uploadedPropertiesCheckboxAll', function() {
    if ($(this).prop('checked')) {
        $('.uploadedPropertiesCheckbox').prop('checked', true);
    } else {
        $('.uploadedPropertiesCheckbox').prop('checked', false);

    }
});

// $(document).ready(function () {
//     $('#owner_id').change(function () {
//         var selectedAgentId = $(this).val();

//         var agentDetailsUrl = geAgentDetailsUrl.replace(':id',selectedAgentId);
//         $.ajax({
//             url: agentDetailsUrl,
//             method: 'GET',
//             success: function (response) {
//                 // Update the details based on the response
//                 $('#vendor_name').val(response.name);
//                 $('#vendor_mobile').val(response.phone);
//                 $('#vendor_email').val(response.email);
//             },
//             error: function (error) {
//                 console.log(error);
//             }
//         });
//     });
// });

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
    google.maps.event.addListener(autocomplete, "place_changed", function() {
        var place = this.getPlace();
        var lat = place.geometry.location.lat();
        var lng = place.geometry.location.lng();
        $("#latitude_v").val(lat);
        $("#longitude_v").val(lng);
        var doorFlatNo = "";
        var streetName = "";
        // console.log(place);
        // Extract door/flat no. and street from address components
        for (var i = 0; i < place.address_components.length; i++) {
            var component = place.address_components[i];
            if (component.types.includes("subpremise")) {
                doorFlatNo = component.short_name;
                break;
            } else if (component.types.includes("premise")) {
                doorFlatNo = component.short_name;
                break;
            } else if (component.types.includes("street_number")) {
                doorFlatNo = component.short_name;
            }
        }
        // Update visible text fields
        $("#street_number_v").val(doorFlatNo);
        // $("#cou").val(doorFlatNo);

        // Extract street name
        for (var i = 0; i < place.address_components.length; i++) {
            var component = place.address_components[i];
            if (component.types.includes("route")) {
                streetName = component.short_name;
                break;
            }
        }

        // Update visible text field for street name
        $("#street_name_v").val(streetName);

        // Extract country, state, city, and zipcode from address components
        var country = "";
        var state = "";
        var city = "";
        var zipcode = "";

        for (var i = 0; i < place.address_components.length; i++) {
            var component = place.address_components[i];

            if (component.types.includes("country")) {
                country = component.long_name;
                console.log(country);
            } else if (
                component.types.includes("administrative_area_level_1")
            ) {
                state = component.long_name;
            } else if (component.types.includes("locality")) {
                city = component.long_name;
            } else if (component.types.includes("postal_code")) {
                zipcode = component.short_name;
            }
        }

        // Update hidden fields
        
        $("#country").val(country);
        $("#state_provenience").val(state);
        $("#city").val(city);

        // Update visible text field for zipcode
        $("#zipcode_v").val(zipcode);

        initMapOnChange();
    });
    // }
}

$(document).on("click", ".locateAddressBtn", function() {
    initMapOnChange();
});

function initMap() {
    let latVal = $("#latitude_v").val();
    let lngVal = $("#longitude_v").val();

    if (latVal && lngVal) {
        // Initialize the map
        var map = new google.maps.Map(document.getElementById("propertyMap"), {
            center: { lat: parseFloat(latVal), lng: parseFloat(lngVal) },
            zoom: 15,
        });

        // Add a marker
        var marker = new google.maps.Marker({
            position: { lat: parseFloat(latVal), lng: parseFloat(lngVal) },
            map: map,
        });

        if (developmentId) {
            prefillFieldsWithDevelopmentAddress();
        }
    } else {
        // Initialize the map
        var map = new google.maps.Map(document.getElementById("propertyMap"), {
            center: { lat: 40.83984419999999, lng: -73.079011 },
            zoom: 10,
        });
    }
}

function prefillFieldsWithDevelopmentAddress() {
    var latitude = parseFloat($("#latitude_v").val());
    var longitude = parseFloat($("#longitude_v").val());
    var address = $("#address").val(); 

    if (!latitude || !longitude || !address) {
        console.error("Latitude or Longitude or address not provided!");
        return;
    }

    var geocoder = new google.maps.Geocoder();

    // Perform reverse geocoding using latitude and longitude
    geocoder.geocode({ location: { lat: latitude, lng: longitude } }, function (results, status) {
        if (status === google.maps.GeocoderStatus.OK) {
            if (results[0]) {
                var addressComponents = results[0].address_components;

                // Extract details from address components
                var doorFlatNo = "";
                var streetName = "";
                var country = "";
                var state = "";
                var city = "";
                var zipcode = "";

                addressComponents.forEach(function (component) {
                 
                    if (component.types.includes("subpremise")) {
                        doorFlatNo = component.short_name;
                    } else if (component.types.includes("premise")) {
                        doorFlatNo = component.short_name;
                    } else if (component.types.includes("street_number")) {
                        doorFlatNo = component.short_name;
                    } else if (component.types.includes("route")) {
                        streetName = component.short_name;
                    } else if (component.types.includes("country")) {
                        country = component.long_name;
                    } else if (component.types.includes("administrative_area_level_1")) {
                        state = component.long_name;
                    } else if (component.types.includes("locality")) {
                        city = component.long_name;
                    } else if (component.types.includes("postal_code")) {
                        zipcode = component.short_name;
                    }
                });

                // Prefill fields
                $("#street_number_v").val(doorFlatNo);
                $("#street_name_v").val(streetName);
                $("#country").val(country);
                $("#state_provenience").val(state);
                $("#city").val(city);
                $("#zipcode_v").val(zipcode);

              
            } else {
                console.error("No results found for the given location.");
            }
        } else {
            console.error("Geocoder failed due to: " + status);
        }
    });
}



function initMapOnChange() {
    $(".invalid-feedback").html("");
    $(".invalid-feedback").removeClass("error");
    $(".is-invalid").removeClass("is-invalid");
    let latVal = $("#latitude_v").val();
    let lngVal = $("#longitude_v").val();
    if (latVal && lngVal) {
        // Initialize the map
        var map = new google.maps.Map(document.getElementById("propertyMap"), {
            center: { lat: parseFloat(latVal), lng: parseFloat(lngVal) },
            zoom: 15,
        });

        // Add a marker
        var marker = new google.maps.Marker({
            position: { lat: parseFloat(latVal), lng: parseFloat(lngVal) },
            map: map,
            draggable: true,
        });

        // Add event listener for marker dragend event
        google.maps.event.addListener(marker, "dragend", function() {
            // Get the updated position of the marker
            const markerPosition = marker.getPosition();
            // Use Geocoder to get address details based on marker position
            const geocoder = new google.maps.Geocoder();
            geocoder.geocode({ location: markerPosition },
                function(results, status) {
                    console.log(status);
                    if (status === "OK") {
                        if (results[0]) {
                            // Display the formatted address in the console
                            console.log(
                                "Address:",
                                results[0].formatted_address
                            );
                        } else {
                            console.error("No results found");
                        }
                    } else {
                        console.error("Geocoder failed due to: " + status);
                    }
                }
            );
        });
        // }P
    } else {
        $("#address").addClass("is-invalid");
        $("#address").next().addClass("error");
        $("#address").next().html(invalidAddressText);
        $("#address").show();
    }
}

$(document).ready(function() {
    $("#type_id").change(function() {
        var typeId = $(this).val();

        if (typeId === "") {
            $("#subtype").empty().prop("disabled", true);
            return; // Exit early if no type is selected
        }
        var subtypeUrl = subtypeSelectedTypeId.replace(":typeId", typeId);
        var selectedSubtypeId = subTypeId ? subTypeId : $("#subtype").val();
        var selectedSubtypeId2 = subTypeId2 ? subTypeId2 : $("#subtype2").val();

        $.ajax({
            url: subtypeUrl,
            type: "GET",
            success: function(response) {
                var subtypes = response;
                $("#subtype").empty().prop("disabled", false);
                $("#subtype2").empty().prop("disabled", false);

                $.each(subtypes, function(index, subtype) {
                    $("#subtype").append(
                        '<option value="' +
                        subtype.id +
                        '">' +
                        subtype.name +
                        "</option>"
                    );
                    $("#subtype2").append(
                        '<option value="' +
                        subtype.id +
                        '">' +
                        subtype.name +
                        "</option>"
                    );
                });
                $("#subtype").val(selectedSubtypeId);
                $("#subtype2").val(selectedSubtypeId2);
            },
            error: function(xhr, status, error) {
                console.error("Failed to fetch subtypes");
            },
        });
    });
});

// <!-- select type plot that time show and hide field  -->

$(document).ready(function() {
    $("#type_id").change(function() {
        var selectedType = $(this).find("option:selected").text();
        // console.log(selectedType)
        if (selectedType === "Plot") {
            $(
                "#bedrooms, #bathrooms, #floors, #total_size, #storeys, #no_of_properties_builtin, #terrace, #levels, #garden_plot, #properties_int_floor_space, #agency_ref"
            ).hide();
            $("#plot_size").show();
        } else {
            $(
                "#bedrooms, #bathrooms,#floors,#total_size,#storeys,#no_of_properties_builtin,#terrace,#levels,#garden_plot,#properties_int_floor_space, #agency_ref"
            ).show();
            $("#plot_size").hide();
        }
    });
});

// <!-- select type Commercial that time show and hide field  -->

$(document).ready(function() {
    $("#type_id").change(function() {
        var selectedType = $(this).find("option:selected").text();
        if (selectedType === "Commercial") {
            $("#commercial_checkbox_container").removeClass("d-none");
            $("#subtype2Container").show();
        } else {
            $("#commercial_checkbox_container").addClass("d-none");
            $("#subtype2Container").hide();
        }
    });
});

//category select short term and long term option that time show and hide field

$(document).ready(function() {
    $("#category_id").change(function() {
        var selectedCategory = $(this).find("option:selected").text();

        if (selectedCategory === "Short Term Rental") {
            $("#short-term-ref-field").show();
            $("#long-term-ref-field").hide();
            $("#rental-license-ref-field").show();
        } else if (selectedCategory === "Long Term Rental") {
            $("#short-term-ref-field").hide();
            $("#long-term-ref-field").show();
            $("#rental-license-ref-field").show();
        } else {
            $("#short-term-ref-field").hide();
            $("#long-term-ref-field").hide();
            $("#rental-license-ref-field").hide();
        }
    });
});
//select listed by dropdown agent based on filled this filed
$(document).ready(function() {
    $("#owner_id").change(function() {
        var selectedAgentId = $(this).val();

        var agentDetailsUrl = geAgentDetailsUrl.replace(":id", selectedAgentId);
        $.ajax({
            url: agentDetailsUrl,
            method: "GET",
            success: function(response) {
                // Update the details based on the response
                $("#contact_name").val(response.name);
                $("#contact_mobile").val(response.phone);
                $("#contact_email").val(response.email);
                $("#contact_city").val(response.city);
                $("#contact_state_province").val(response.state);
                $("#contact_country").val(response.country);
                $("#contact_zipcode").val(response.zipcode);
                $("#contact_street_address").val(response.address);
                $("#company_name").val(response.company_name);
            },
            error: function(error) {
                console.log(error);
            },
        });
    });
});

//Remove File in edit property page
$(document).ready(function() {
    $(".removeFileBtn").on("click", function() {
        var parentElement = $(this).closest(".text-14");
        parentElement.empty();
    });
});

function handleDocumentsSelect(event) {
    const fileList = event.target.files;

    const formData = new FormData();
    // Append each file to FormData
    for (const file of fileList) {
        formData.append("files[]", file);
    }

    let documentIds = [];
    $(".removeDocumentBtn").each(function(index, elem) {
        documentIds.push($(elem).attr("data-id"));
    });
    formData.append("documentIds", documentIds.join(","));

    $(".propertyDocumentsDiv").addClass("loader");
    const attributes = {
        hasButton: false,
        handleSuccess: function() {
            $(".propertyDocumentsData").html(datas["data"]);
            $(".propertyDocumentsDiv").removeClass("loader");
        },
        handleError: function() {
            $(".propertyDocumentsDiv").removeClass("loader");
        },
        handleErrorMessages: function() {
            $.each(datas["errors"], function(index, html) {
                $(".propertyDocumentsDiv").removeClass("loader");
                $(".propertyDocumentsDiv").next().addClass("error");
                $(".propertyDocumentsDiv").next().html(html);
                $(".propertyDocumentsDiv").next().show();
            });
        },
    };
    const ajaxOptions = {
        url: addDocumentUrl,
        method: "post",
        data: formData,
    };
    makeAjaxRequest(ajaxOptions, attributes);
}

$(document).on("click", ".removeDocumentBtn", function() {
    $(".propertyDocumentsDiv").addClass("loader");
    const attributes = {
        hasButton: false,
        handleSuccess: function() {
            $(".propertyDocumentsData").html(datas["data"]);
            $(".propertyDocumentsDiv").removeClass("loader");
        },
        handleError: function() {
            $(".propertyDocumentsDiv").removeClass("loader");
        },
        handleErrorMessages: function() {
            $(".propertyDocumentsDiv").removeClass("loader");
        },
    };
    let documentId = $(this).attr("data-id");

    let documentIds = [];
    $(".removeDocumentBtn").each(function(index, elem) {
        documentIds.push($(elem).attr("data-id"));
    });

    let url =
        removeDocumentUrl.replace(":id", documentId) +
        "?documentIds=" +
        documentIds.join(",");
    const ajaxOptions = {
        url: url,
        method: "get",
    };
    makeAjaxRequest(ajaxOptions, attributes);
});

// <!--select status completion that time show and hide field  -->

// $(document).ready(function() {
//     // Function to handle showing or hiding fields based on the status completion
//     function handleStatusCompletion() {
//         var selectedStatus = $("#completion_status")
//             .find("option:selected")
//             .val();
//         if (selectedStatus === "Completed") {
//             $("#year_completed_container").show();
//            // $("#month_year_container").hide();
//         } else {
//             //$("#year_completed_container").hide();
//             $("#month_year_container").show();
//         }
//     }

//     handleStatusCompletion();

//     $("#completion_status").change(function() {
//         handleStatusCompletion();
//     });
// });
$(document).ready(function() {
    $("#year_completed_container").show();

    function handleStatusCompletion() {
        $("#year_completed_container").show();
    }

    handleStatusCompletion();

    $("#completion_status").change(function() {
        handleStatusCompletion();
    });
});

// Property Pricing according to types

$(document).ready(function() {
    $("#rental_conatiner").hide();
    $("#allow_required_container").hide();
    // Function to handle showing or hiding fields based on the selected option
    function handleOptionSelection() {
        var selectedOption = $("#pro_listed_as").find("option:selected").val();
        // console.log(selectedOption);
        if (selectedOption === "For Sale") {
            // console.log(selectedOption);
            // Show sale-related fields
            $("#sale_price_container").show();
            $("#rental_conatiner").hide();
            $("#short_term_container").hide();
            $("#long_term_container").hide();
            $("#percentage_container").show();
            $("#commission_container").show();
            $("#net_price_container").show();
            $("#listing_container").show();
            $("#selling_container").show();
            $(".value_deed_container").show();
            $("#minimun_container").show();
            $("#fees_tax_container").show();
            $("#commission_note_container").show();
            $("#allow_required_container").hide();
            $("#rent_certificate_container").hide();
        } else if (selectedOption === "For Rent") {
            // console.log('sdf');

            // rent-related fields should be shown
            $("#rental_conatiner").show();
            $("#sale_price_container").hide();
            $("#short_term_container").show();
            $("#percentage_container").show();
            $("#commission_container").show();
            $("#net_price_container").hide();
            $("#listing_container").show();
            $("#selling_container").show();
            $(".value_deed_container").hide();
            $("#minimun_container").hide();
            $("#fees_tax_container").hide();
            $("#commission_note_container").show();
            $("#allow_required_container").show();
            $("#rent_certificate_container").show();
        }
    }

    handleOptionSelection();

    $("#pro_listed_as").change(function() {
        handleOptionSelection();
    });
});

// <!--Rent type hide and show -->

$(document).ready(function() {
    function handleStatusCompletion() {
        var selectedStatus = $("#rent_type").val();

        if (selectedStatus === "short_term") {
            $("#sale_price").val("");
            $("#short_term_container").show();
            $("#long_term_container").hide();
        } else if (selectedStatus === "long_term") {
            $("#long_term_container").show();
            $("#short_term_container").hide();
        } else {
            $("#long_term_container").hide();
            $("#short_term_container").hide();
        }
    }

    handleStatusCompletion();

    $("#rent_type").change(function() {
        handleStatusCompletion();
    });
});

// <!--Rental type hide and show  -->
// $(document).ready(function () {
//     // Initially hide the rental container
//     $('#rental_conatiner').hide();

//     // Add an event listener for changes to the "Property Listed As" dropdown
//     $('#pro_listed_as').on('change', function () {
//         var selectedValue = $(this).val();

//         if (selectedValue === 'for_rent') {
//             // Show rental container if "For Rent" is selected
//             $('#rental_conatiner').show();
//         } else {
//             // Hide rental container for any other selection
//             $('#rental_conatiner').hide();
//         }
//     });
// });

$(document).on("click", ".addSubFeturesBtn", function() {
    const formData = new FormData($("#addNewPropertyForm")[0]);
    var featureId = $(this).data("id");
    $(".subFetureCheckbox").each(function(index, elem) {
        if ($(elem).is(":checked")) {
            formData.append("subFetureId[]", $(elem).data("id"));
        }
    });
    $(".checkbox_modal").modal("hide");
});

// Converting meters and feets according to Dimension type

// $(document).ready(function() {
//     function updateUnitLabels(selection) {
//         //for '.unit-label' class
//         $(".unit-label").text(selection === "Feet" ? "ft²" : "m²");

//         //for '.unit-label2' class
//         $(".unit-label2").text(selection === "Feet" ? "ft" : "m²");
//     }

//     // Set initial unit label based on existing selection
//     var initialSelection = $("#dimension_type").val();
//     updateUnitLabels(initialSelection || "Meter");

//     $("#dimension_type").on("change", function() {
//         var selectedValue = $(this).val();
//         updateUnitLabels(selectedValue);
//     });
// });

//For SALE
$(document).ready(function() {
    // Set default values to 0
    // $("#percentage").val(0).prop("readonly", true);
    $("#list_agent").val(0).prop("readonly", true);
    $("#sell_agent").val(0).prop("readonly", true);

    // Function to calculate commissions
    function calculateCommissions() {
        var salePrice = parseFloat($("#sale_price").val()) || 0;
        var totalPercentage = parseFloat($("#percentage").val()) || 0;

        // Calculate total commission
        var commission = (salePrice * totalPercentage) / 100;

        var listAgentPer = parseFloat($("#list_agent").val()) || 0;
        var sellAgentPer = parseFloat($("#sell_agent").val()) || 0;

        // Ensure listing and selling agent percentages do not exceed the total percentage
        if (listAgentPer + sellAgentPer > totalPercentage) {
            sellAgentPer = totalPercentage - listAgentPer;
            $("#sell_agent").val(sellAgentPer.toFixed(2));
        }

        // Calculate listing and selling agent commissions
        var listAgentCom = ((commission * listAgentPer) / totalPercentage) || 0;
        var sellAgentCom = ((commission * sellAgentPer) / totalPercentage) || 0;

        // Update fields with calculated values
        $(".commission").val(commission.toFixed(2)).prop("readonly", true);
        $("#net_price").val((salePrice - commission).toFixed(2)).prop("readonly", true);
        $("#list_Agent_c").val(listAgentCom.toFixed(2)).prop("readonly", true);
        $("#sell_Agent_c").val(sellAgentCom.toFixed(2)).prop("readonly", true);
    }

    function autoFillPercentages() {
        var totalPercentage = parseFloat($("#percentage").val()) || 0;
        var listAgentPer = parseFloat($("#list_agent").val()) || 0;
        var sellAgentPer = parseFloat($("#sell_agent").val()) || 0;

        // Calculate remaining percentage
        if (listAgentPer > totalPercentage) {
            listAgentPer = totalPercentage;
            $("#list_agent").val(listAgentPer.toFixed(2));
        }
        if (sellAgentPer > totalPercentage) {
            sellAgentPer = totalPercentage - listAgentPer;
            $("#sell_agent").val(sellAgentPer.toFixed(2));
        }

        // If one of the fields is updated, auto-fill the other
        if ($("#list_agent").is(":focus")) {
            sellAgentPer = totalPercentage - listAgentPer;
            $("#sell_agent").val(sellAgentPer.toFixed(2));
        } else if ($("#sell_agent").is(":focus")) {
            listAgentPer = totalPercentage - sellAgentPer;
            $("#list_agent").val(listAgentPer.toFixed(2));
        }

        // Ensure total percentage does not exceed 100
        if (totalPercentage > 100) {
            $("#percentage").val(100);
            totalPercentage = 100;
        }
        calculateCommissions();
    }

    // Enable fields on click
    function enableFields() {
        $(this).prop("readonly", false); // Make the clicked field editable
    }

    // Attach event handlers for input changes
    $("#sale_price, #percentage, #list_agent, #sell_agent").on("input", autoFillPercentages);
    $("#percentage, #list_agent, #sell_agent").on("click", enableFields); // Enable fields on click

    // Ensure percentage input does not exceed 100
    $("#percentage").on("input", function() {
        var value = parseFloat($(this).val()) || 0;
        if (value > 100) {
            $(this).val(100);
        }
    });

    // Datepicker setup
    $("#year_completed").datepicker({
        format: "yyyy",
        viewMode: "years",
        minViewMode: "years",
        autoclose: true,
    });

    // Dropzone file removal logic (unchanged)
    dropzone.on("removedfile", function(file) {
        var removedUploadedFilesId = file.customId;
        const attributes = {
            hasButton: false,
            handleSuccess: function() {},
            handleError: function() {},
            handleErrorMessages: function() {},
        };
        let url = removePropertyAttachement.replace(":id", removedUploadedFilesId);
        const ajaxOptions = {
            url: url,
            method: "get",
        };
        makeAjaxRequest(ajaxOptions, attributes);
    });
});

/*
// for sale and for rent working completly 

$(document).ready(function () {
    function calculateValues() {
        var transactionType = $("#pro_listed_as").val(); // Get transaction type from dropdown

        if (transactionType === 'For Rent') {
            // Rent calculation logic
            var shortTermPrice = parseFloat($("#short_price").val()) || 0;
            var longTermPrice = parseFloat($("#long_price").val()) || 0;
            var percentage_rent = parseFloat($("#percentage").val()) || 0;

            // Ensure percentage does not exceed 100
            if (percentage_rent > 100) {
                percentage_rent = 100;
                $("#percentage").val(percentage_rent);
            }

            // Use either short-term or long-term price
            var price = shortTermPrice || longTermPrice;
            var commission_rent = (price * percentage_rent) / 100;

            // Calculate listing and selling agent percentages
            var listAgentPercentage = parseFloat($("#list_agent").val()) || 0;
            var sellAgentPercentage = percentage_rent - listAgentPercentage;
            $("#sell_agent").val(sellAgentPercentage.toFixed(2));

            // Calculate listing and selling agent commissions
            var listAgentCommission = (commission_rent * listAgentPercentage) / percentage_rent;
            var sellAgentCommission = (commission_rent * sellAgentPercentage) / percentage_rent;

            // Update fields with auto-calculated values
            $(".commission").val(commission_rent.toFixed(2)).prop("readonly", true);
            $("#list_Agent_c").val(listAgentCommission.toFixed(2)).prop("readonly", true);
            $("#sell_Agent_c").val(sellAgentCommission.toFixed(2)).prop("readonly", true);
        } else if (transactionType === 'For Sale') {
            // Sale calculation logic
            var salePrice = parseFloat($("#sale_price").val()) || 0;
            var totalPercentage = parseFloat($("#percentage").val()) || 0;

            // Ensure percentage does not exceed 100
            if (totalPercentage > 100) {
                totalPercentage = 100;
                $("#percentage").val(totalPercentage);
            }

            // Calculate total commission
            var commission = (salePrice * totalPercentage) / 100;

            // Calculate listing and selling agent percentages
            var listAgentPer = parseFloat($("#list_agent").val()) || 0;
            var sellAgentPer = totalPercentage - listAgentPer;
            $("#sell_agent").val(sellAgentPer.toFixed(2));

            // Calculate listing and selling agent commissions
            var listAgentCom = (commission * listAgentPer) / totalPercentage;
            var sellAgentCom = (commission * sellAgentPer) / totalPercentage;

            // Update fields with auto-calculated values
            $(".commission").val(commission.toFixed(2)).prop("readonly", true);
            $("#net_price").val((salePrice - commission).toFixed(2)).prop("readonly", true);
            $("#list_Agent_c").val(listAgentCom.toFixed(2)).prop("readonly", true);
            $("#sell_Agent_c").val(sellAgentCom.toFixed(2)).prop("readonly", true);
        }
    }

    // Reset fields if any price field is cleared
    function resetFields() {
        $("#short_price").val("");
        $("#long_price").val("");
        $("#sale_price").val("");
        $("#percentage").val("");
        $("#commission").val("");
        $("#list_agent").val("");
        $("#sell_agent").val("");
        $("#list_Agent_c").val("");
        $("#sell_Agent_c").val("");
        $("#net_price").val("");
    }

    // Event listeners for input changes and transaction type selection
    $("#pro_listed_as, #short_price, #long_price, #sale_price, #percentage, #list_agent, #sell_agent").on("input", calculateValues);

    // Ensure percentage input does not exceed 100
    $("#percentage").on("input", function () {
        var value = parseFloat($(this).val()) || 0;
        if (value > 100) {
            $(this).val(100);
        }
    });

    // Reset fields if any of the price fields are cleared
    $("#short_price, #long_price, #sale_price").on("input", function () {
        if ($(this).val() === "") {
            resetFields();
        }
    });
});
*/





$(document).ready(function() {
    sessionStorage.removeItem('checkedSubFeaturesData');

    $(".featureChekedId").on("change", function(e) {
        var featureChekedId = $(this).data("id");

        var checkedSubFeatures = [];
        $(
            'input.subFetureCheckbox[feature_id="' + featureChekedId + '"]:checked'
        ).each(function() {
            checkedSubFeatures.push($(this).data("id"));
        });
        if (checkedSubFeatures.length > 0) {
            $('input.featureChekedId[data-id="' + featureChekedId + '"]').prop(
                "checked",
                true
            );
        } else {
            $('input.featureChekedId[data-id="' + featureChekedId + '"]').prop(
                "checked",
                false
            );
        }
    });
    $(".close_modal").on("click", function(e) {
        var checkedSubFeaturesData = sessionStorage.getItem('checkedSubFeaturesData');
        var checkedSubFeaturesDatas = JSON.parse(checkedSubFeaturesData)

        if (checkedSubFeaturesDatas != null && checkedSubFeaturesDatas.length > 0) {
            checkedSubFeaturesDatas.forEach(function(value, index) {
                $('input.subFetureCheckbox[data-id="' + value + '"]').prop("checked", true);
            });
        } else {
            $('input.subFetureCheckbox').prop("checked", false);
        }

    });
    $(".addSubFeturesBtn").on("click", function() {
        sessionStorage.removeItem('checkedSubFeaturesData');
        var featureId = $(this).data("id");

        var checkedSubFeatures = [];
        $(
            'input.subFetureCheckbox[feature_id="' + featureId + '"]:checked'
        ).each(function() {
            checkedSubFeatures.push($(this).data("id"));
        });

        var featureCheckbox = $(
            'input[type="checkbox"][id="' + featureId + '"]'
        );

        if (featureCheckbox.length) {
            if (checkedSubFeatures.length > 0) {
                $('input.featureChekedId[data-id="' + featureId + '"]').prop(
                    "checked",
                    true
                );

                sessionStorage.setItem('checkedSubFeaturesData', JSON.stringify(checkedSubFeatures));
            } else {
                $('input.featureChekedId[data-id="' + featureId + '"]').prop(
                    "checked",
                    false
                );
            }
            sessionStorage.setItem('checkedSubFeaturesData', JSON.stringify(checkedSubFeatures));
        }
    });

});

// by default the county will be spain in property form fields

// $(document).ready(function() {
//     // Set default country to Spain if the field is empty
//     if ($("#country").val() === "") {
//         $("#country").val("Spain");
//     }
// });



// Copies selector code
const minVal = 1;
const maxVal = 100;
$(document).on('click', '.increaseCopiesBtn', function() {
    let currentVal = parseInt($(this).parent().find('input[name=copies]').val());
    if (currentVal < maxVal) {
        $(this).parent().find('input[name=copies]').val(currentVal + 1);
    }
});
$(document).on('click', '.decreaseCopiesBtn', function() {
    let currentVal = parseInt($(this).parent().find('input[name=copies]').val());
    if (currentVal > minVal) {
        $(this).parent().find('input[name=copies]').val(currentVal - 1);
    }
});
// Copies selector code

//hide and show listing agent and selling agent fields for Agent User and Developer user
$(document).ready(function() {
    // Check if the user role is 'developer'
    if (userRole === "developer") {
        // Loop through the field IDs and hide their containers
        fieldsToHide.forEach(function(fieldId) {
            $("#" + fieldId).closest(".common-label-css").hide(); // Adjust class as necessary
        });
        // Hide the headers for Listing Agent and Selling Agent
        headersToHide.forEach(function(headerClass) {
            $(headerClass).hide();
        });
    }
});