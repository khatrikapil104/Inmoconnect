$(document).ready(function() {
    initialize();
});
$(document).ready(function() {
    function getCurrentSlideIndex() {
        var today = new Date();
        var dayOfMonth = today.getDate();
        var groupIndex = Math.floor((dayOfMonth - 1) / 7);
        return groupIndex * 7;
    }
    var initialSlideIndex = getCurrentSlideIndex();
    $(".slick-list").slick({
        slidesToShow: 7,
        slidesToScroll: 7,
        arrows: true,
        dots: false,
        infinite: true,
        centerPadding: "60px",
        autoplay: false,
        initialSlide: initialSlideIndex,
        responsive: [{
                breakpoint: 1440,
                settings: {
                    slidesToShow: 7,
                    slidesToScroll: 7,
                },
            },
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 5,
                    slidesToScroll: 5,
                },
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 4,
                },
            },
            {
                breakpoint: 567,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                },
            },
        ],
        // centerMode: true,
    });
    $(".prev-btn").click(function() {
        $(".slick-list").slick("slickPrev");
    });

    $(".next-btn").click(function() {
        $(".slick-list").slick("slickNext");
    });
});

function initMap() {
    if (latVal && lngVal) {
        // Initialize the map
        var map = new google.maps.Map(
            document.getElementById("projectLocationMap"), {
                center: { lat: parseFloat(latVal), lng: parseFloat(lngVal) },
                zoom: 15,
            }
        );

        // Initialize the edit form map
        var mapAddForm = new google.maps.Map(
            document.getElementById("projectLocationMapAddForm"), {
                center: { lat: parseFloat(latVal), lng: parseFloat(lngVal) },
                zoom: 15,
            }
        );

        // Add a marker
        var marker = new google.maps.Marker({
            position: { lat: parseFloat(latVal), lng: parseFloat(lngVal) },
            map: map,
            title: "Click me for location",
        });
        var locationURL =
            "https://www.google.com/maps?q=" +
            encodeURIComponent(parseFloat(latVal) + "," + parseFloat(lngVal)) +
            "&hl=en";
        var infowindow = new google.maps.InfoWindow({
            content: '<a id="location-link" href="' +
                locationURL +
                '" target="_blank" >View Location</a>',
        });
        marker.addListener("click", function() {
            infowindow.open(map, marker);
        });

        //Add a Marker for Edit form
        var marker = new google.maps.Marker({
            position: { lat: parseFloat(latVal), lng: parseFloat(lngVal) },
            map: mapAddForm,
            title: "Click me for location",
        });
        var locationURL =
            "https://www.google.com/maps?q=" +
            encodeURIComponent(parseFloat(latVal) + "," + parseFloat(lngVal)) +
            "&hl=en";
        var infowindow = new google.maps.InfoWindow({
            content: '<a id="location-link" href="' +
                locationURL +
                '" target="_blank" >View Location</a>',
        });
        marker.addListener("click", function() {
            infowindow.open(mapAddForm, marker);
        });
    } else {
        // Initialize the map
        var map = new google.maps.Map(
            document.getElementById("projectLocationMap"), {
                center: { lat: 40.83984419999999, lng: -73.079011 },
                zoom: 10,
            }
        );
    }
}
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
    google.maps.event.addListener(autocomplete, "place_changed", function() {
        var place = this.getPlace();
        var lat = place.geometry.location.lat();
        var lng = place.geometry.location.lng();
        $("#latitude_v").val(lat);
        $("#longitude_v").val(lng);
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

function initMapOnChange() {
    $(".invalid-feedback").html("");
    $(".invalid-feedback").removeClass("error");
    $(".is-invalid").removeClass("is-invalid");
    let latVal = $("#latitude_v").val();
    let lngVal = $("#longitude_v").val();
    if (latVal && lngVal) {
        // Initialize the map
        var map = new google.maps.Map(
            document.getElementById("projectLocationMapAddForm"), {
                center: { lat: parseFloat(latVal), lng: parseFloat(lngVal) },
                zoom: 15,
            }
        );

        // Add a marker
        var marker = new google.maps.Marker({
            position: { lat: parseFloat(latVal), lng: parseFloat(lngVal) },
            map: map,
        });
    } else {
        $("#project_location").addClass("is-invalid");
        $("#project_location").next().addClass("error");
        $("#project_location").next().html(invalidAddressText);
        $("#project_location").show();
    }
}

// Import Properties Related Script
var importPropertiesContainer = $(".importPropertiesContainer");
var importPropertiesPage = 2;
var isFetchingImportProperties = false;
var lastFetchedPageImportProperty = 1;

function attachScrollEventImportProperties() {
    $(document).on("scroll", ".importPropertiesContainer", function() {
        console.log("asdasdads");
        // Check if the user is near the bottom of the container
        if (
            isFetchingImportProperties ||
            importPropertiesContainer.scrollTop() +
            importPropertiesContainer.innerHeight() <
            importPropertiesContainer[0].scrollHeight - 100
        ) {
            return;
        }

        // Check if the user has scrolled to a new page
        var currentPage =
            Math.ceil(
                importPropertiesContainer.scrollTop() /
                importPropertiesContainer.innerHeight()
            ) + 1;
        if (currentPage > lastFetchedPageImportProperty) {
            // Set the flag to indicate that a request is in progress
            isFetchingImportProperties = true;
            loadProjectPropertiesData(true);
        }
    });
}

function loadImportProperties() {
    $(".importPropertiesData").addClass("loader");
    $(".importPropertiesModal").modal("show");
    const attributes = {
        hasButton: false,
        handleSuccess: function() {
            $(".importPropertiesData").removeClass("loader");

            $(".importPropertiesData").html(datas["data"]);
        },
        handleError: function() {
            $(".importPropertiesData").removeClass("loader");
        },
    };
    const ajaxOptions = {
        url: importPropertiesUrl,
        method: "post",
        data: {},
    };
    makeAjaxRequest(ajaxOptions, attributes);
}

$(document).on("click", ".importProperiesBtn", function() {
    loadImportProperties();
});
$(document).on("click", ".selectAllManagePropertyCheckbox", function() {
    $totalCount = $(".totalManagePropertiesCount").text();
    $selectedCount = $(".selectedManagePropertiesCount").text();
    if ($(this).prop("checked")) {
        $(".managePropertyCheckbox").prop("checked", true);
        $(".selectedManagePropertiesCount").text(parseInt($totalCount));
    } else {
        $(".managePropertyCheckbox").prop("checked", false);
        $(".selectedManagePropertiesCount").text(0);
    }
});
$(document).on("click", ".managePropertyCheckbox", function() {
    $totalCount = $(".totalManagePropertiesCount").text();
    $selectedCount = $(".selectedManagePropertiesCount").text();
    $(".selectAllManagePropertyCheckbox").prop("checked", false);
    if ($(this).prop("checked")) {
        $(".selectedManagePropertiesCount").text(parseInt($selectedCount) + 1);
    } else {
        $(".selectedManagePropertiesCount").text(parseInt($selectedCount) - 1);
    }
});

$(document).on("click", ".deleteProjectBtn", function(e) {
    e.preventDefault();
    var name = $(this).data("name");

    var id = $(this).data("id");
    show_message3(projectDeleteConfirmText, "confirm", {
        confirmMessage: areYouSureTextConfirmPopup,
        confirmBtnText: deleteTextConfirmPopup,
        confirmSecondaryMessage: deleteTextConfirmPopup + " " + name,
        callback: function() {
            window.location.href = projectDeleteUrl.replace(":id", id);
        },
    });
});

$(document).on("click", ".saveProjectBtn", function(e) {
    e.preventDefault();
    $btnName = $(this).text();
    $(this).prop("disabled", true);
    $(this).html(
        '<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> ' +
        $btnName
    );
    const that = this;

    var formData = new FormData($("#addProjectForm")[0]);
    $(".removeProjectAttachmentBtn").each(function(index, element) {
        console.log($(element).data("id"));
        formData.append("files[]", $(element).data("id"));
    });
    const attributes = {
        hasButton: true,
        btnSelector: ".saveProjectBtn",
        btnText: $btnName,
        handleSuccess: function() {
            localStorage.setItem("flashMessage", datas["msg"]);
            window.location.reload();
        },
    };
    const ajaxOptions = {
        url: routeUrlAddProject,
        method: "post",
        data: formData,
    };

    makeAjaxRequest(ajaxOptions, attributes);
});

// Project Properties Related Script
var projctPropertiesContainer = $(".propertyMangementRow").find(
    ".table_dashboard"
);
var projectPropertiesPage = 2;
var isFetchingProjectProperties = false;
var lastFetchedPageProjectProperty = 1;

projctPropertiesContainer.scroll(function() {
    // Check if the user is near the bottom of the container
    if (
        isFetchingProjectProperties ||
        projctPropertiesContainer.scrollTop() +
        projctPropertiesContainer.innerHeight() <
        projctPropertiesContainer[0].scrollHeight - 100
    ) {
        return;
    }

    // Check if the user has scrolled to a new page
    var currentPage =
        Math.ceil(
            projctPropertiesContainer.scrollTop() /
            projctPropertiesContainer.innerHeight()
        ) + 1;
    if (currentPage > lastFetchedPageProjectProperty) {
        // Set the flag to indicate that a request is in progress
        isFetchingProjectProperties = true;
        loadProjectPropertiesData(true);
    }
});

$(document).on("keyup", "input[name=search_input_property]", function() {
    loadProjectPropertiesData();
});

function loadProjectPropertiesData(withScroll = false) {
    let formData = new FormData();
    if (!withScroll) {
        $(".projectPropertyTableData").addClass("loader");
    }
    formData.append(
        "search_input_property",
        $("input[name=search_input_property]").val() || ""
    );
    formData.append("page", withScroll ? projectPropertiesPage : 1);
    const attributes = {
        hasButton: false,
        handleSuccess: function() {
            $(".projectPropertyTableData").removeClass("loader");
            if (withScroll) {
                $(".projectPropertyTableData").append(datas["data"]);
                if (projectPropertiesPage < datas["properties"].last_page) {
                    // Increment the page number for the next request
                    projectPropertiesPage++;

                    // Update the last fetched page
                    lastFetchedPageProjectProperty++;

                    // Reset the flag since the request is complete
                    isFetchingProjectProperties = false;
                }
            } else {
                $(".projectPropertyTableData").html(datas["data"]);
                lastFetchedPageProjectProperty = 1;
                projectPropertiesPage = 2;
                isFetchingProjectProperties = false;
            }
        },
        handleError: function() {
            $(".projectPropertyTableData").removeClass("loader");
        },
        handleErrorMessages: function() {},
    };
    const ajaxOptions = {
        url: routeUrlLoadProjectPropertiesData,
        method: "post",
        data: formData,
    };

    makeAjaxRequest(ajaxOptions, attributes);
}

$(document).on("click", ".deleteProjectPropertyBtn", function(e) {
    e.preventDefault();
    var name = $(this).data("name");

    var id = $(this).data("id");
    show_message3(projectPropertyDeleteConfirmText, "confirm", {
        confirmMessage: areYouSureTextConfirmPopup,
        confirmBtnText: removeTextConfirmPopup,
        confirmSecondaryMessage: removeTextConfirmPopup + " " + name,
        callback: function() {
            const attributes = {
                hasButton: false,
                handleSuccess: function() {
                    loadProjectPropertiesData();
                },
                handleError: function() {},
                handleErrorMessages: function() {},
            };
            routeUrlDeleteProjectProperty =
                routeUrlDeleteProjectProperty.replace(":id", id);
            const ajaxOptions = {
                url: routeUrlDeleteProjectProperty,
                method: "get",
                data: {},
            };
            makeAjaxRequest(ajaxOptions, attributes);
        },
    });
});

//Customer Management Related Script

function loadImportCustomers() {
    $(".importCustomersData").addClass("loader");
    $(".importCustomersModal").modal("show");
    const attributes = {
        hasButton: false,
        handleSuccess: function() {
            $(".importCustomersData").removeClass("loader");

            $(".importCustomersData").html(datas["data"]);
        },
        handleError: function() {
            $(".importCustomersData").removeClass("loader");
        },
    };
    const ajaxOptions = {
        url: importCustomersUrl,
        method: "post",
        data: {},
    };
    makeAjaxRequest(ajaxOptions, attributes);
}

$(document).on("click", ".importCustomersBtn", function() {
    loadImportCustomers();
});

function loadManageCustomers() {
    $(".manageCustomersData").addClass("loader");
    $(".manageCustomersModal").modal("show");
    const attributes = {
        hasButton: false,
        handleSuccess: function() {
            $(".manageCustomersData").removeClass("loader");

            $(".manageCustomersData").html(datas["data"]);
        },
        handleError: function() {
            $(".manageCustomersData").removeClass("loader");
        },
    };
    const ajaxOptions = {
        url: manageCustomersUrl,
        method: "post",
        data: {},
    };
    makeAjaxRequest(ajaxOptions, attributes);
}

$(document).on("click", ".manageCustomersBtn", function() {
    loadManageCustomers();
});

$(document).on("click", ".selectAllManageCustomerCheckbox", function() {
    $totalCount = $(".totalManageCustomersCount").text();
    $selectedCount = $(".selectedManageCustomersCount").text();
    if ($(this).prop("checked")) {
        $(".manageCustomerCheckbox").prop("checked", true);
        $(".selectedManageCustomersCount").text(parseInt($totalCount));
    } else {
        $(".manageCustomerCheckbox").prop("checked", false);
        $(".selectedManageCustomersCount").text(0);
    }
});
$(document).on("click", ".manageCustomerCheckbox", function() {
    $totalCount = $(".totalManageCustomersCount").text();
    $selectedCount = $(".selectedManageCustomersCount").text();
    $(".selectAllManageCustomerCheckbox").prop("checked", false);
    if ($(this).prop("checked")) {
        $(".selectedManageCustomersCount").text(parseInt($selectedCount) + 1);
    } else {
        $(".selectedManageCustomersCount").text(parseInt($selectedCount) - 1);
    }
});

$(document).on("click", ".removeCustomerFromManageCustomers", function() {
    $(this).parents(".col-lg-6").remove();
});

var projctCustomersContainer = $(".customerMangementRow").find(
    ".table_dashboard"
);
var projectCustomersPage = 2;
var isFetchingProjectCustomers = false;
var lastFetchedPageProjectCustomer = 1;

projctCustomersContainer.scroll(function() {
    // Check if the user is near the bottom of the container
    if (
        isFetchingProjectCustomers ||
        projctCustomersContainer.scrollTop() +
        projctCustomersContainer.innerHeight() <
        projctCustomersContainer[0].scrollHeight - 100
    ) {
        return;
    }

    // Check if the user has scrolled to a new page
    var currentPage =
        Math.ceil(
            projctCustomersContainer.scrollTop() /
            projctCustomersContainer.innerHeight()
        ) + 1;
    if (currentPage > lastFetchedPageProjectCustomer) {
        // Set the flag to indicate that a request is in progress
        isFetchingProjectCustomers = true;
        loadProjectCustomersData(true);
    }
});

$(document).on("keyup", "input[name=search_input_customer]", function() {
    loadProjectCustomersData();
});

function loadProjectCustomersData(withScroll = false) {
    let formData = new FormData();
    if (!withScroll) {
        $(".projectCustomerTableData").addClass("loader");
    }
    formData.append(
        "search_input_customer",
        $("input[name=search_input_customer]").val() || ""
    );
    formData.append("page", withScroll ? projectCustomersPage : 1);
    const attributes = {
        hasButton: false,
        handleSuccess: function() {
            $(".projectCustomerTableData").removeClass("loader");
            if (withScroll) {
                $(".projectCustomerTableData").append(datas["data"]);
                if (projectCustomersPage < datas["customers"].last_page) {
                    // Increment the page number for the next request
                    projectCustomersPage++;

                    // Update the last fetched page
                    lastFetchedPageProjectCustomer++;

                    // Reset the flag since the request is complete
                    isFetchingProjectCustomers = false;
                }
            } else {
                $(".projectCustomerTableData").html(datas["data"]);
                lastFetchedPageProjectCustomer = 1;
                projectCustomersPage = 2;
                isFetchingProjectCustomers = false;
            }
        },
        handleError: function() {
            $(".projectCustomerTableData").removeClass("loader");
        },
        handleErrorMessages: function() {},
    };
    const ajaxOptions = {
        url: routeUrlLoadProjectCustomersData,
        method: "post",
        data: formData,
    };

    makeAjaxRequest(ajaxOptions, attributes);
}

$(document).on("click", ".deleteProjectCustomerBtn", function(e) {
    e.preventDefault();
    var name = $(this).data("name");

    var id = $(this).data("id");
    show_message3(
        projectCustomerDeleteConfirmText + ' "' + name + '"',
        "confirm", {
            confirmMessage: areYouSureTextConfirmPopup,
            confirmBtnText: removeTextConfirmPopup,
            confirmSecondaryMessage: removeTextConfirmPopup + " " + name,
            callback: function() {
                const attributes = {
                    hasButton: false,
                    handleSuccess: function() {
                        loadProjectCustomersData();
                    },
                    handleError: function() {},
                    handleErrorMessages: function() {},
                };
                routeUrlDeleteProjectCustomer =
                    routeUrlDeleteProjectCustomer.replace(":id", id);
                const ajaxOptions = {
                    url: routeUrlDeleteProjectCustomer,
                    method: "get",
                    data: {},
                };
                makeAjaxRequest(ajaxOptions, attributes);
            },
        }
    );
});

//Agent Management Related Script

function loadImportAgents() {
    $(".importAgentsData").addClass("loader");
    $(".importAgentsModal").modal("show");
    const attributes = {
        hasButton: false,
        handleSuccess: function() {
            $(".importAgentsData").removeClass("loader");

            $(".importAgentsData").html(datas["data"]);
        },
        handleError: function() {
            $(".importAgentsData").removeClass("loader");
        },
    };
    const ajaxOptions = {
        url: importAgentsUrl,
        method: "post",
        data: {},
    };
    makeAjaxRequest(ajaxOptions, attributes);
}

$(document).on("click", ".importAgentsBtn", function() {
    loadImportAgents();
});

$(document).on("click", ".selectAllManageAgentCheckbox", function() {
    $totalCount = $(".totalManageAgentsCount").text();
    $selectedCount = $(".selectedManageAgentsCount").text();
    if ($(this).prop("checked")) {
        $(".manageAgentCheckbox").prop("checked", true);
        $(".selectedManageAgentsCount").text(parseInt($totalCount));
    } else {
        $(".manageAgentCheckbox").prop("checked", false);
        $(".selectedManageAgentsCount").text(0);
    }
});
$(document).on("click", ".manageAgentCheckbox", function() {
    $totalCount = $(".totalManageAgentsCount").text();
    $selectedCount = $(".selectedManageAgentsCount").text();
    $(".selectAllManageAgentCheckbox").prop("checked", false);
    if ($(this).prop("checked")) {
        $(".selectedManageAgentsCount").text(parseInt($selectedCount) + 1);
    } else {
        $(".selectedManageAgentsCount").text(parseInt($selectedCount) - 1);
    }
});
$(document).on("click", ".removeAgentFromManageCustomers", function() {
    $(this).parents("tr").remove();
});

function loadManageAgents() {
    $(".manageAgentsData").addClass("loader");
    $(".manageAgentsModal").modal("show");
    const attributes = {
        hasButton: false,
        handleSuccess: function() {
            $(".manageAgentsData").removeClass("loader");

            $(".manageAgentsData").html(datas["data"]);
        },
        handleError: function() {
            $(".manageAgentsData").removeClass("loader");
        },
    };
    const ajaxOptions = {
        url: manageAgentsUrl,
        method: "post",
        data: {},
    };
    makeAjaxRequest(ajaxOptions, attributes);
}

$(document).on("click", ".manageAgentsBtn", function() {
    loadManageAgents();
});

var projctAgentsContainer = $(".agentMangementRow").find(".table_dashboard");
var projectAgentsPage = 2;
var isFetchingProjectAgents = false;
var lastFetchedPageProjectAgent = 1;

projctAgentsContainer.scroll(function() {
    // Check if the user is near the bottom of the container
    if (
        isFetchingProjectAgents ||
        projctAgentsContainer.scrollTop() +
        projctAgentsContainer.innerHeight() <
        projctAgentsContainer[0].scrollHeight - 100
    ) {
        return;
    }

    // Check if the user has scrolled to a new page
    var currentPage =
        Math.ceil(
            projctAgentsContainer.scrollTop() /
            projctAgentsContainer.innerHeight()
        ) + 1;
    if (currentPage > lastFetchedPageProjectAgent) {
        // Set the flag to indicate that a request is in progress
        isFetchingProjectAgents = true;
        loadProjectAgentsData(true);
    }
});

$(document).on("keyup", "input[name=search_input_agent]", function() {
    loadProjectAgentsData();
});

function loadProjectAgentsData(withScroll = false) {
    let formData = new FormData();
    if (!withScroll) {
        $(".projectAgentTableData").addClass("loader");
    }
    formData.append(
        "search_input_agent",
        $("input[name=search_input_agent]").val() || ""
    );
    formData.append("page", withScroll ? projectAgentsPage : 1);
    const attributes = {
        hasButton: false,
        handleSuccess: function() {
            $(".projectAgentTableData").removeClass("loader");
            if (withScroll) {
                $(".projectAgentTableData").append(datas["data"]);
                if (projectAgentsPage < datas["agents"].last_page) {
                    // Increment the page number for the next request
                    projectAgentsPage++;

                    // Update the last fetched page
                    lastFetchedPageProjectAgent++;

                    // Reset the flag since the request is complete
                    isFetchingProjectAgents = false;
                }
            } else {
                $(".projectAgentTableData").html(datas["data"]);
                lastFetchedPageProjectAgent = 1;
                projectAgentsPage = 2;
                isFetchingProjectAgents = false;
            }
        },
        handleError: function() {
            $(".projectAgentTableData").removeClass("loader");
        },
        handleErrorMessages: function() {},
    };
    const ajaxOptions = {
        url: routeUrlLoadProjectAgentsData,
        method: "post",
        data: formData,
    };

    makeAjaxRequest(ajaxOptions, attributes);
}

$(document).on("click", ".deleteProjectAgentBtn", function(e) {
    e.preventDefault();
    var name = $(this).data("name");

    var id = $(this).data("id");
    show_message3(
        projectAgentDeleteConfirmText + ' "' + name + '"',
        "confirm", {
            confirmMessage: areYouSureTextConfirmPopup,
            confirmBtnText: removeTextConfirmPopup,
            confirmSecondaryMessage: removeTextConfirmPopup + " " + name,
            callback: function() {
                const attributes = {
                    hasButton: false,
                    handleSuccess: function() {
                        loadProjectAgentsData();
                    },
                    handleError: function() {},
                    handleErrorMessages: function() {},
                };
                routeUrlDeleteProjectAgent = routeUrlDeleteProjectAgent.replace(
                    ":id",
                    id
                );
                const ajaxOptions = {
                    url: routeUrlDeleteProjectAgent,
                    method: "get",
                    data: {},
                };
                makeAjaxRequest(ajaxOptions, attributes);
            },
        }
    );
});

//Task Management Related Script
$(document).on("click", ".saveTaskBtn", function(e) {
    e.preventDefault();
    $btnName = $(this).text();
    $(this).prop("disabled", true);
    $(this).html(
        '<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> ' +
        $btnName
    );
    const that = this;

    var formData = new FormData($("#addProjectTaskForm")[0]);
    formData.append("end_date", $("#end_date").val());
    const attributes = {
        hasButton: true,
        btnSelector: ".saveTaskBtn",
        btnText: $btnName,
        handleSuccess: function() {
            var taskId = datas.data;
            if (taskId.length > 0) {
                show_message3(
                    "You are attempting to reset Your Task?",
                    "confirm", {
                        confirmMessage: "Are you sure?",
                        confirmBtnText: "Reset",
                        confirmSecondaryMessage: "Reset",
                        callback: function() {
                            formData.append("remove_task_id", taskId);
                            const ajaxOptions = {
                                url: routeUrlAddTask,
                                method: "post",
                                data: formData,
                            };

                            makeAjaxRequest(ajaxOptions, attributes);
                        },
                    }
                );
            } else {
                window.location.reload();
                localStorage.setItem("flashMessage", datas["msg"]);
            }
        },
    };
    const ajaxOptions = {
        url: routeUrlAddTask,
        method: "post",
        data: formData,
    };

    makeAjaxRequest(ajaxOptions, attributes);
});
$(document).on("click", ".saveSingleTaskBtn", function(e) {
    e.preventDefault();
    $btnName = $(this).text();
    $(this).prop("disabled", true);
    $(this).html(
        '<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> ' +
        $btnName
    );
    const that = this;

    var formData = new FormData($("#addSingleTaskForm")[0]);
    const attributes = {
        hasButton: true,
        btnSelector: ".saveSingleTaskBtn",
        btnText: $btnName,
        handleSuccess: function() {
            localStorage.setItem("flashMessage", datas["msg"]);
            window.location.reload();
        },
    };
    const ajaxOptions = {
        url: routeUrlAddSingleTask,
        method: "post",
        data: formData,
    };

    makeAjaxRequest(ajaxOptions, attributes);
});
var projctTasksContainer = $(".taskMangementRow").find(".table_dashboard");
var projectTasksPage = 2;
var isFetchingProjectTasks = false;
var lastFetchedPageProjectTask = 1;

projctTasksContainer.scroll(function() {
    // Check if the user is near the bottom of the container
    if (
        isFetchingProjectTasks ||
        projctTasksContainer.scrollTop() + projctTasksContainer.innerHeight() <
        projctTasksContainer[0].scrollHeight - 100
    ) {
        return;
    }

    // Check if the user has scrolled to a new page
    var currentPage =
        Math.ceil(
            projctTasksContainer.scrollTop() /
            projctTasksContainer.innerHeight()
        ) + 1;
    if (currentPage > lastFetchedPageProjectTask) {
        // Set the flag to indicate that a request is in progress
        isFetchingProjectTasks = true;
        loadProjectTasksData(true);
    }
});

$(document).on("keyup", "input[name=search_input_task]", function() {
    loadProjectTasksData();
});

function loadProjectTasksData(withScroll = false) {
    let formData = new FormData();
    if (!withScroll) {
        $(".projectTaskTableData").addClass("loader");
    }
    formData.append(
        "search_input_task",
        $("input[name=search_input_task]").val() || ""
    );
    formData.append("page", withScroll ? projectTasksPage : 1);
    const attributes = {
        hasButton: false,
        handleSuccess: function() {
            $(".projectTaskTableData").removeClass("loader");
            if (withScroll) {
                $(".projectTaskTableData").append(datas["data"]);
                if (projectTasksPage < datas["tasks"].last_page) {
                    // Increment the page number for the next request
                    projectTasksPage++;

                    // Update the last fetched page
                    lastFetchedPageProjectTask++;

                    // Reset the flag since the request is complete
                    isFetchingProjectTasks = false;
                }
            } else {
                $(".projectTaskTableData").html(datas["data"]);
                lastFetchedPageProjectTask = 1;
                projectTasksPage = 2;
                isFetchingProjectTasks = false;
            }
        },
        handleError: function() {
            $(".projectTaskTableData").removeClass("loader");
        },
        handleErrorMessages: function() {},
    };
    const ajaxOptions = {
        url: routeUrlLoadProjectTasksData,
        method: "post",
        data: formData,
    };

    makeAjaxRequest(ajaxOptions, attributes);
}

$(document).on("click", ".deleteProjectTaskBtn", function(e) {
    e.preventDefault();
    var name = $(this).data("name");
    var id = $(this).data("id");

    show_message3(projectTaskDeleteConfirmText + ' "' + name + '"', "confirm", {
        confirmMessage: areYouSureTextConfirmPopup,
        confirmBtnText: removeTextConfirmPopup,
        confirmSecondaryMessage: removeTextConfirmPopup + " " + name,
        callback: function() {
            const attributes = {
                hasButton: false,
                handleSuccess: function() {
                    loadProjectTasksData();
                },
                handleError: function() {},
                handleErrorMessages: function() {},
            };
            var routeDeleteProjectTask = routeUrlDeleteProjectTask.replace(
                ":id",
                id
            );

            const ajaxOptions = {
                url: routeDeleteProjectTask,
                method: "get",
                data: {},
            };
            makeAjaxRequest(ajaxOptions, attributes);
        },
    });
});

function updateTaskStatus(formData = {}) {
    const attributes = {
        hasButton: false,
        handleSuccess: function() {
            loadProjectTasksData();
            $(".complete_project").remove();
            $(datas["data"]).insertBefore(".deleteProjectBtn");
        },
        handleError: function() {},
        handleErrorMessages: function() {},
    };
    const ajaxOptions = {
        url: updateTaskStatusUrl,
        method: "post",
        data: formData,
    };
    makeAjaxRequest(ajaxOptions, attributes);
}
$(document).on("click", ".selectAllTaskCheckbox", function() {
    if ($(this).prop("checked")) {
        let formData = new FormData();
        $(".projectTaskCheckbox").each(function(index, element) {
            formData.append("dataArr[]", $(element).attr("data-id"));
        });
        updateTaskStatus(formData);
        $(".projectTaskCheckbox").prop("checked", true);
    } else {
        $(".projectTaskCheckbox").prop("checked", false);
    }
});
$(document).on("click", ".projectTaskCheckbox", function() {
    var formData = new FormData();
    if ($(this).prop("checked")) {
        formData.append("dataArr[]", $(this).attr("data-id"));
        console.log($(this).attr("data-id"));
        updateTaskStatus(formData);
    }
    if (!$(this).prop("checked")) {
        formData.append("dataArr[]", $(this).attr("data-id"));
        console.log($(this).attr("data-id"));
        updateTaskStatus(formData);
    }
});

//Project Attachment Related Script

var projctAttachmentsContainer = $(".attachmentMangementRow").find(
    ".table_dashboard"
);
var projectAttachmentsPage = 2;
var isFetchingProjectAttachments = false;
var lastFetchedPageProjectAttachment = 1;

projctAttachmentsContainer.scroll(function() {
    // Check if the user is near the bottom of the container
    if (
        isFetchingProjectAttachments ||
        projctAttachmentsContainer.scrollTop() +
        projctAttachmentsContainer.innerHeight() <
        projctAttachmentsContainer[0].scrollHeight - 100
    ) {
        return;
    }

    // Check if the user has scrolled to a new page
    var currentPage =
        Math.ceil(
            projctAttachmentsContainer.scrollTop() /
            projctAttachmentsContainer.innerHeight()
        ) + 1;
    if (currentPage > lastFetchedPageProjectAttachment) {
        // Set the flag to indicate that a request is in progress
        isFetchingProjectAttachments = true;
        loadProjectAttachmentsData(true);
    }
});

$(document).on("keyup", "input[name=search_input_attachment]", function() {
    loadProjectAttachmentsData();
});

function loadProjectAttachmentsData(withScroll = false) {
    let formData = new FormData();
    if (!withScroll) {
        $(".projectAttachmentTableData").addClass("loader");
    }
    formData.append(
        "search_input_attachment",
        $("input[name=search_input_attachment]").val() || ""
    );
    formData.append("page", withScroll ? projectAttachmentsPage : 1);
    const attributes = {
        hasButton: false,
        handleSuccess: function() {
            $(".projectAttachmentTableData").removeClass("loader");
            if (withScroll) {
                $(".projectAttachmentTableData").append(datas["data"]);
                if (projectAttachmentsPage < datas["attachments"].last_page) {
                    // Increment the page number for the next request
                    projectAttachmentsPage++;

                    // Update the last fetched page
                    lastFetchedPageProjectAttachment++;

                    // Reset the flag since the request is complete
                    isFetchingProjectAttachments = false;
                }
            } else {
                $(".projectAttachmentTableData").html(datas["data"]);
                lastFetchedPageProjectAttachment = 1;
                projectAttachmentsPage = 2;
                isFetchingProjectAttachments = false;
            }
        },
        handleError: function() {
            $(".projectAttachmentTableData").removeClass("loader");
        },
        handleErrorMessages: function() {},
    };
    const ajaxOptions = {
        url: routeUrlLoadProjectAttachmentsData,
        method: "post",
        data: formData,
    };

    makeAjaxRequest(ajaxOptions, attributes);
}

$(document).on("click", ".downloadProjectAttachmentBtn", function(e) {
    e.preventDefault();
    var id = $(this).data("id");
    $(".downloadProjectAttachmentBtn").addClass("loader");
    const attributes = {
        hasButton: false,
        handleSuccess: function() {
            const data = datas["data"];
            const link = document.createElement("a");
            link.setAttribute("href", data);
            link.setAttribute("download", datas["originalFileName"]);
            link.click();
            $(".downloadProjectAttachmentBtn").removeClass("loader");
        },
        handleError: function() {},
        handleErrorMessages: function() {},
    };
    var routeDownloadProjectAttachment = routeUrlDownloadProjectAttachment.replace(":id", id);
    const ajaxOptions = {
        url: routeDownloadProjectAttachment,
        method: "get",
        data: {},
    };
    makeAjaxRequest(ajaxOptions, attributes);
});

$(document).on("click", ".projectAttachmentChooseBtn", function(event) {
    event.preventDefault();
    $('#uploadDocumentModal').attr('data-current-action', 'project_attachment');
    $(".data_file_id").addClass('d-none');
    $(".eventsfolders").prop('disabled', false);
    $('#uploadDocumentModal').find('.justify-content-end').addClass('justify-content-between');
    $('#uploadDocumentModal').find('.justify-content-end').removeClass('justify-content-end');
    $(".custom_width-modal-folder").addClass("d-none");
    $(".create_new_folder_btn").show();
    $(".form_file").hide();
    $(".uploadDcoumentsModalSubmitBtn").show();
    $("#uploadDocumentModal").modal("show");
});

$(document).on("click", ".projectAttachmentUploaded", function(event) {
    event.preventDefault();
    $('#uploadDocumentModal').find('.justify-content-between').addClass('justify-content-end');
    $('#uploadDocumentModal').find('.justify-content-between').removeClass('justify-content-between');
    $('#uploadDocumentModal').attr('data-current-action', 'view_project_attachment');
    $(".custom_width-modal-folder").removeClass("d-none");
    $(".eventsfolders").prop('disabled', true);
    $(".uploadDcoumentsModalSubmitBtn").hide();
    $(".create_new_folder_btn").hide();
    $(".data_file_id").removeClass('d-none');
    $(".form_file").hide();
    // $(".data_file_id").prop("disabled", false);
    $("#uploadDocumentModal").modal("show");
});


// $(document).on("click", "." + uploadDcoumentsModal, function() {
//     $("#uploadDocumentModalForm").attr("action", submitImportAttachmentsUrl);
//     $("#uploadProjectDocumentModalForm").submit();
// });
$(document).on("click", ".saveEventBtn", function(e) {
    e.preventDefault();
    $btnName = $(this).text();
    $(this).prop("disabled", true);
    $(this).html(
        '<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> ' +
        $btnName
    );
    const that = this;

    var formData = new FormData($("#addEventForm")[0]);
    $(".removeEventAttachmentBtn").each(function(index, element) {
        formData.append("files[]", $(element).data("id"));
    });

    var projectIdField = document.getElementById("project_id");
    if (projectIdField) {
        formData.append("project_id", projectIdField.value);
    }
    const attributes = {
        hasButton: true,
        btnSelector: ".saveEventBtn",
        btnText: $btnName,
        handleSuccess: function() {
            localStorage.setItem("flashMessage", datas["msg"]);
            window.location.reload();
        },
    };
    const ajaxOptions = {
        url: routeUrlAddEvent,
        method: "post",
        data: formData,
    };

    makeAjaxRequest(ajaxOptions, attributes);
});
$(document).on("click", ".calender_date", function(e) {
    $current_date = $(this).attr("current_date");
    $project_id = $(this).attr("project_id");
    $slug = $(this).attr("slug");
    $now = new Date().toISOString().split("T")[0];
    $(".calender_date").removeClass("tody_appointment_date");
    $(this).addClass("tody_appointment_date");
    var formData = new FormData();
    formData.append("current_date", $current_date);
    formData.append("slug", $slug);
    formData.append("project_id", $project_id);
    let url = loadCurrentEvent;

    const that = this;
    const attributes = {
        hasButton: false,
        handleSuccess: function() {
            $(".load-event-data")
                .find(".Project_Events_Schedule_data")
                .html("");
            $(".load-event-data")
                .find(".Project_Events_Schedule_data")
                .html(datas["data"]);
            // if ($current_date < $now) {
            //     $('#project_add_event').hide();
            // } else {
            //     $('#project_add_event').show();
            // }
            // $('.load-event-data').html(datas["data"]);
        },
    };
    const ajaxOptions = {
        url: url,
        method: "post",
        data: formData,
    };
    makeAjaxRequest(ajaxOptions, attributes);
});

/////////////////////// sidebar-open width change & header z-index/////////////////
function openSidebar() {
    var viewportWidth =
        window.innerWidth || document.documentElement.clientWidth;

    if (viewportWidth >= 992) {
        document.getElementById("mySidebar_one").style.width = "755px";
        document.querySelector("header").style.zIndex = 5;
    } else {
        document.getElementById("mySidebar_one").style.width = "100%";
    }
    window.addEventListener("resize", function() {
        if (document.querySelector("#mySidebar_one").offsetWidth === 755) {
            document.querySelector("header").style.zIndex = 5;
        }
    });
}
//////////// overlay-active////////////////////////////
function closeSidebar() {
    document.getElementById("mySidebar_one").style.width = "0";
    document.getElementById("main").style.marginLeft = "0";
}
$(".upcomingEventName").click(function(e) {
    $(".overlay").addClass("overlay-active");
});
$(".close-btn").click(function(e) {
    $(".overlay").removeClass("overlay-active");
});

$(document).on(
    "click",
    ".upcomingEventName,.closeEditViewButton",
    function(e) {
        $eventId = $(this).attr("data-id");
        // $('.sidebarEventsForm').addClass('loader');
        openSidebar();
        let url = routeUrlViewEvent.replace(":eventId", $eventId);

        const that = this;
        const attributes = {
            hasButton: false,
            handleSuccess: function() {
                $(".sidebarEventsForm").removeClass("loader");
                $(".eventSidebarModalTitle").text("Event Details");
                $(".sidebarEventsForm").html(datas["data"]);
            },
        };
        const ajaxOptions = {
            url: url + "?type=view",
            method: "get",
            data: {},
        };
        makeAjaxRequest(ajaxOptions, attributes);
    }
);
$(document).on("click", ".editEventBtn", function(e) {
    $eventId = $(this).attr("data-id");
    $eventName = $(this).attr("data-name");
    $(".sidebarEventsForm").addClass("loader");
    openSidebar();
    let url = routeUrlViewEvent.replace(":eventId", $eventId);

    const that = this;
    const attributes = {
        hasButton: false,
        handleSuccess: function() {
            $(".sidebarEventsForm").removeClass("loader");
            $(".eventSidebarModalTitle").html(editEventDetailsText);
            $(".sidebarEventsForm").html(datas["data"]);
        },
    };
    const ajaxOptions = {
        url: url + "?type=edit",
        method: "get",
        data: {},
    };
    makeAjaxRequest(ajaxOptions, attributes);
});
$(document).on("click", ".deleteEventBtn", function(e) {
    e.preventDefault();
    var name = $(this).data("name");
    var id = $(this).data("id");

    show_message3(Attempt_deleteText, "confirm", {
        confirmMessage: areYouSureText,
        confirmBtnText: deleteText,
        confirmSecondaryMessage: deleteText + " " + name,
        callback: function() {
            window.location.href = eventDeleteUrl.replace(":eventId", id);
        },
    });
});
$(document).on("click", ".updateEventBtn", function(e) {
    e.preventDefault();
    $btnName = $(this).text();
    $eventId = $(this).data("id");
    $(this).prop("disabled", true);
    $(this).html(
        '<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> ' +
        $btnName
    );
    const that = this;
    let url = routeUrlEditEvent.replace(":eventId", $eventId);
    var formData = new FormData($(".sidebarEventsForm")[0]);
    $(".removeEventAttachmentBtn").each(function(index, element) {
        formData.append("files[]", $(element).data("id"));
    });
    const attributes = {
        hasButton: true,
        btnSelector: ".updateEventBtn",
        btnText: $btnName,
        handleSuccess: function() {
            localStorage.setItem("flashMessage", datas["msg"]);
            window.location.reload();
        },
    };
    const ajaxOptions = {
        url: url,
        method: "post",
        data: formData,
    };

    makeAjaxRequest(ajaxOptions, attributes);
});

$(document).on("click", ".removeEventAttachmentBtn", function() {
    $(".eventAttachmentInput").addClass("loader");
    const attributes = {
        hasButton: false,
        handleSuccess: function() {
            $(".eventAttachmentData").html(datas["data"]);
            $(".eventAttachmentInput").removeClass("loader");
        },
        handleError: function() {
            $(".eventAttachmentInput").removeClass("loader");
            $(".eventAttachmentInput").removeClass("loader");
        },
        handleErrorMessages: function() {
            $(".eventAttachmentInput").removeClass("loader");
        },
    };
    let eventAttachmentId = $(this).attr("data-id");
    let url = removeEventAttachementUrl.replace(":id", eventAttachmentId);
    const ajaxOptions = {
        url: url,
        method: "get",
    };
    makeAjaxRequest(ajaxOptions, attributes);
});

$(document).on("change", ".task_type", function() {
    $(".projectTaskTableData").addClass("loader");
    var task_type_id = $(this).val();

    const attributes = {
        hasButton: false,
        handleSuccess: function() {
            $(".task_type_data").html("");
            $(".task_type_data").html(datas["data"]);
            $(".Add-New-To-DoList").show();
            $(".projectTaskTableData").removeClass("loader");
            $("#addSubTaskType").html("");
            datas.subTypeTask_id.forEach(function(index, element) {
                var hiddenInput = $("<input>", {
                    type: "hidden",
                    name: "sub_task_id[]",
                    value: index,
                });

                $("#addSubTaskType").append(hiddenInput);
            });
        },
        handleError: function() {
            $(".projectTaskTableData").removeClass("loader");
        },
        handleErrorMessages: function() {
            $(".projectTaskTableData").removeClass("loader");
        },
    };
    let url = taskTypeUrl.replace(":id", task_type_id);
    const ajaxOptions = {
        url: url,
        method: "get",
    };
    makeAjaxRequest(ajaxOptions, attributes);
});
$(document).on("click", ".saveAssignTodoList", function() {
    $btnName = $(this).text();
    $(this).prop("disabled", true);
    $(this).html(
        '<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> ' +
        $btnName
    );
    var formData = new FormData($("#addAssignToDoList")[0]);
    var project_task_id = $(".project_task_id").val();

    var assign_to_user = ".assign_to" + project_task_id;
    $(assign_to_user + " option:selected").each(function(index, element) {
        formData.append("assign_to_user[]", element.value);
    });
    const attributes = {
        hasButton: true,
        btnSelector: ".saveAssignTodoList",
        btnText: $btnName,
        handleSuccess: function() {
            localStorage.setItem("flashMessage", datas["msg"]);
            window.location.reload();
        },
        handleError: function() {

        },
        handleErrorMessages: function() {
            $.each(datas['errors'], function(index, html) {
                console.log(html);

                $('.assign_task_id').removeClass('loader');
                $(".assign_task_id").next().addClass('error');
                $(".assign_task_id").html(html);
                $(".assign_task_id").show();
            });

        },
    };
    let url = addAssignToDoList;
    const ajaxOptions = {
        url: url,
        method: "post",
        data: formData,
    };
    makeAjaxRequest(ajaxOptions, attributes);
});
$(document).on("click", ".project_task_id", function() {
    var project_task_id = $(this).data("id");
    $(".project_task_id").val(project_task_id);
});
$(document).on("click", ".assingToDoModal", function() {
    var assing_to_user_id = $(this).parents('.assingToUserId').find('.assingToUser').attr('assingToUserId');
    console.log(assing_to_user_id);

});