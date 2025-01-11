function openSidebar() {
    // Get the viewport width
    var viewportWidth =
        window.innerWidth || document.documentElement.clientWidth;

    // Set different widths based on the viewport width
    if (viewportWidth >= 992) {
        // Desktop view
        document.getElementById("mySidebar_one").style.width = "755px";
        // document.getElementById("main").style.marginLeft = "0px";
    } else {
        // Mobile view
        // Set different width and margin for mobile view
        document.getElementById("mySidebar_one").style.width = "100%";
        // document.getElementById("main").style.marginLeft = "0px"; // You can adjust this value as needed
    }
}

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

$(document).on(
    "click",
    ".upcomingEventName,.closeEditViewButton",
    function(e) {
        $eventId = $(this).attr("data-id");
        $(".sidebarEventsForm").addClass("loader");
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

$(document).on("click", ".edit-my-event, .fc-time-grid-event,.fc-day-grid-event", function(e) {
    e.preventDefault();

    $eventId = $(this).attr("data-id");
    if (!$eventId) {
        $eventId = $(this).find(".edit-my-event").attr("data-id");
    }
    $(".sidebarEventsForm").addClass("loader");
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
});

$(document).on("click", ".icon-Delete", function(e) {
    e.preventDefault();
    var name = $(this).data("name");
    var id = $(this).data("id");

    show_message3("You Are Attempting To Delete Event?", "confirm", {
        confirmMessage: "Are You Sure",
        confirmBtnText: "Delete",
        confirmSecondaryMessage: "Delete" + " " + name,
        callback: function() {
            window.location.href = eventDeleteUrl.replace(":eventId", id);
        },
    });
});

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
            $(".eventSidebarModalTitle").text("Edit Event Details");
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

    show_message3("You Are Attempting To Delete Event?", "confirm", {
        confirmMessage: "Are You Sure",
        confirmBtnText: "Delete",
        confirmSecondaryMessage: "Delete" + " " + name,
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

$(document).on("change", "#project_id", function(e) {
    $projectId = $(this).val();
    $eventId = $(".sidebarEventsForm").find(".closeEditViewButton").attr("data-id");
    let url = associationDataLoad.replace(":projectId", $projectId);

    const that = this;
    const attributes = {
        hasButton: false,
        handleSuccess: function() {
            console.log(datas);
            if ($eventId != undefined) {

                $(".sidebarEventsForm").find(".agent-propety-data").remove();
                $(".my_project_base_event").before(datas["data"]);
            } else {

                $(".addEventForm").find(".agent-propety-data").remove();
                $(".addEventForm").append(datas["data"]);
            }
        },
    };
    const ajaxOptions = {
        url: url,
        method: "get",
        data: {},
    };
    makeAjaxRequest(ajaxOptions, attributes);
});