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
        arrows: false,
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
                    slidesToShow: 7,
                    slidesToScroll: 7,
                },
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 6,
                    slidesToScroll: 6,
                },
            },
            {
                breakpoint: 567,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 4,
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

/////////////////////// sidebar-open width change & header z-index/////////////////
function openEventSidebar() {
    var viewportWidth = window.innerWidth || document.documentElement.clientWidth;

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

//Chart Related Script Start
if (hasChart) {
    Chart.pluginService.register({
        afterUpdate: function(chart) {
            for (let i = 1; i < chart.config.data.labels.length; i++) {
                var arc = chart.getDatasetMeta(0).data[i];
                arc.round = {
                    x: (chart.chartArea.left + chart.chartArea.right) / 2,
                    y: (chart.chartArea.top + chart.chartArea.bottom) / 2,
                    // radius: (chart.outerRadius + chart.innerRadius) / 2,
                    thickness: (chart.outerRadius - chart.innerRadius) / 2 - 1,
                    backgroundColor: arc._model.backgroundColor,
                };
            }
            // Draw rounded corners for first item
            var arc = chart.getDatasetMeta(0).data[0];
            arc.round = {
                x: (chart.chartArea.left + chart.chartArea.right) / 2,
                y: (chart.chartArea.top + chart.chartArea.bottom) / 2,
                // radius: (chart.outerRadius + chart.innerRadius) / 2,
                thickness: (chart.outerRadius - chart.innerRadius) / 2 - 1,
                backgroundColor: arc._model.backgroundColor,
            };
        },

        afterDraw: function(chart) {
            for (let i = 1; i < chart.config.data.labels.length; i++) {
                var ctx = chart.chart.ctx;
                arc = chart.getDatasetMeta(0).data[i];
                var startAngle = Math.PI / 2 - arc._view.startAngle;
                var endAngle = Math.PI / 2 - arc._view.endAngle;
                ctx.save();
                ctx.translate(arc.round.x, arc.round.y);
                ctx.fillStyle = arc.round.backgroundColor;
                ctx.beginPath();
                ctx.arc(
                    arc.round.radius * Math.sin(endAngle),
                    arc.round.radius * Math.cos(endAngle),
                    arc.round.thickness,
                    0,
                    2 * Math.PI
                );
                ctx.closePath();
                ctx.fill();
                ctx.restore();
            }
            // Draw rounded corners for first item
            var ctx = chart.chart.ctx;
            arc = chart.getDatasetMeta(0).data[0];
            var startAngle = Math.PI / 2 - arc._view.startAngle;
            var endAngle = Math.PI / 2 - arc._view.endAngle;
            ctx.save();
            ctx.translate(arc.round.x, arc.round.y);
            ctx.fillStyle = arc.round.backgroundColor;
            ctx.beginPath();
            // ctx.arc(arc.round.radius * Math.sin(startAngle), arc.round.radius * Math.cos(startAngle), arc.round.thickness, 0, 2 * Math.PI);
            ctx.arc(
                arc.round.radius * Math.sin(endAngle),
                arc.round.radius * Math.cos(endAngle),
                arc.round.thickness,
                0,
                2 * Math.PI
            );
            ctx.closePath();
            ctx.fill();
            ctx.restore();
        },
    });

    var config = {
        type: "doughnut",
        data: {
            labels: propertyTypes,
            datasets: [{
                label: "My First Dataset",
                data: typeCounts,
                backgroundColor: [
                    "rgba(241, 66, 27, 1)",
                    "rgba(6, 180, 138, 1)",
                    "rgba(101, 96, 240, 1)",
                    "rgba(111, 211, 247, 1)",
                    "rgba(255, 138, 0, 1)",
                    "rgba(252, 113, 255, 1)",
                ],
                hoverBackgroundColor: [
                    "rgba(211, 39, 0, 1)",
                    "rgba(0, 128, 97, 1)",
                    "rgba(9, 0, 255, 1)",
                    "rgba(0, 176, 239, 1)",
                    "rgba(216, 116, 0, 1)",
                    "rgba(250, 0, 255, 1)",
                ],
                hoverBorderWidth: 0,
            }, ],
        },
        options: {
            responsive: true,

            legend: {
                responsive: true,
                position: "bottom",
                // reverse: true,
                lineWidth: 50,
                maxWidth: 100,
                fullWidth: false,
                labels: {
                    // generateLabels:({e,legentItem,legend})=>{
                    //     console.log(legentItem,'legentItem')
                    //     console.log(legend,'legend')
                    // },
                    usePointStyle: true,
                    boxWidth: 10,
                    padding: 15,
                    fontSize: 14,
                    fontColor: "rgba(95, 95, 95, 1)",
                    width: 200,
                },
            },

            tooltips: {
                enabled: true,
            },
            cutoutPercentage: 78,
            rotation: -0.5 * Math.PI,
            circumference: 2 * Math.PI,
            // title: {
            // 	display: true,
            // 	text: 'Chart.js Doughnut Chart'
            // },
            animation: {
                animateScale: true,
                animateRotate: true,
            },
            elements: {
                center: {
                    // the longest text that could appear in the center  7,500,000 /10,000,000
                    maxText: "100%",
                    text: "",
                    fontColor: "#fff",
                    fontStyle: "bold",
                    // minFontSize: 1,
                    maxFontSize: 256,
                },
            },
        },
    };

    window.onload = function() {
        var ctx = document.getElementById("myChart").getContext("2d");
        window.myDoughnut = new Chart(ctx, config);
        // window.myDoughnut.generateLegend();
    };
}
//Chart Related Script End


//Bar Chart Related Script Start
if (hasBarChart) {
    const ctx = document.getElementById('myBarChart').getContext('2d');
    const myBarChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Madrid', 'Andalucia', 'Valencia', 'Catalonia', 'Aragon'], // X-axis labels
            datasets: [{
                label: 'Top Regions',
                data: [80, 72, 60, 40, 30], // Y-axis data (percentages)
                backgroundColor: '#4B3F97', // Filled color for bars
                borderWidth: 0, // No border for bars
                borderColor: 'transparent' // Transparent border for bars
            }]
        },
        options: {
            responsive: true,
            legend: {
                display: false // Hide the legend
            },
            scales: {
                xAxes: [{
                    gridLines: {
                        display: false, // Remove grid lines on X-axis
                        drawBorder: false // Remove border on X-axis
                    },
                    ticks: {
                        fontColor: '#000', // Black color for X-axis labels
                        fontStyle: 'normal', // Normal font style for X-axis labels
                        fontVariant: 'normal', // Normal font variant for X-axis labels
                        fontStretch: 'normal', // Normal font stretch for X-axis labels
                        fontSize: 10, // Font size for X-axis labels
                        fontWeight: 700, // Bold font weight for X-axis labels

                        padding: 0 // Padding for X-axis labels
                    }
                }],
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        max: 100, // Maximum value of Y-axis (100%)
                        display: false, // Hide Y-axis labels
                        fontColor: '#000' // Black color for Y-axis labels
                    },
                    gridLines: {
                        display: false, // Remove grid lines on Y-axis
                        drawBorder: false // Remove border on Y-axis
                    }
                }]
            },
            plugins: {
                datalabels: {
                    color: '#FFFFFF', // White color for labels
                    anchor: 'end',
                    align: 'start',
                    formatter: function(value) {
                        return value + '%'; // Display percentage symbol
                    },
                    font: {
                        weight: 'bold',
                        size: 14 // Adjust font size for the percentage labels
                    }
                }
            },
            animation: {
                duration: 0 // Disable animation
            }
        }
    });

}
//Bar Chart Related Script End

$(document).on("keyup", "input[name=search_input_property]", function() {
    loadPropertiesData();
});
$(document).on("change", "select[name=sort_by_property]", function() {
    if ($(this).val() && $(this).val() != "") {
        loadPropertiesData();
    }
});

var propertiesContainer = $(".propertyTableData").find(".table_dashboard");
var agentDataContainer = $(".agentTableData").find(".table_dashboard");
var propertiesPage = 1;
var isFetchingProperties = false;
var lastFetchedPageProperty = 1;

propertiesContainer.scroll(function() {
    propertiesPage = 2;
    // Check if the user is near the bottom of the container
    if (
        isFetchingProperties ||
        propertiesContainer.scrollTop() + propertiesContainer.innerHeight() <
        propertiesContainer[0].scrollHeight - 100
    ) {
        return;
    }

    // Check if the user has scrolled to a new page
    var currentPage =
        Math.ceil(
            propertiesContainer.scrollTop() / propertiesContainer.innerHeight()
        ) + 1;
    if (currentPage > lastFetchedPageProperty) {
        // Set the flag to indicate that a request is in progress
        isFetchingProperties = true;
        loadPropertiesData();
    }
});

function loadPropertiesData() {
    let formData = new FormData();
    $(".propertyTableData").find(".table_dashboard").addClass("loader");
    formData.append(
        "search_input_property",
        $("input[name=search_input_property]").val() || ""
    );
    formData.append(
        "sort_by_property",
        $("select[name=sort_by_property]").val() || ""
    );
    formData.append("page", propertiesPage);
    // (formData);
    const attributes = {
        hasButton: false,
        handleSuccess: function() {
            $(".propertyTableData")
                .find(".table_dashboard")
                .removeClass("loader");
            $(".propertyTableData").find(".no_data_found").empty();
            console.log(propertiesPage);
            if (
                datas["properties"].current_page != 2 &&
                datas["properties"] != ""
            ) {
                $(".propertyTableData").find(".table-dashboard-data").remove();
                $(".propertyTableData")
                    .find(".dashboard_table tbody")
                    .html(datas["data"]);
            } else if (
                datas["properties"].current_page != null &&
                datas["properties"].current_page != ""
            ) {
                if (propertiesPage <= datas["properties"].last_page) {
                    console.log("append");
                    $(".propertyTableData")
                        .find(".dashboard_table")
                        .append(datas["data"]);
                    propertiesPage++;
                    lastFetchedPageProperty++;
                    isFetchingProperties = false;
                }
            } else {
                $(".propertyTableData").find(".table-dashboard-data").remove();
                $(".propertyTableData")
                    .find(".no_data_found")
                    .html(datas["data"]);
            }
        },
        handleError: function() {
            $(".propertyTableData")
                .find(".table_dashboard")
                .removeClass("loader");
        },
        handleErrorMessages: function() {},
    };
    const ajaxOptions = {
        url: routeUrlLoadProperties,
        method: "post",
        data: formData,
    };

    makeAjaxRequest(ajaxOptions, attributes);
}

$(document).on("keyup", "input[name=search_input_user]", function() {
    loadAgentManagementData();
});

agentDataContainer.scroll(function() {
    propertiesPage = 2;
    if (
        isFetchingProperties ||
        agentDataContainer.scrollTop() + agentDataContainer.innerHeight() <
        agentDataContainer[0].scrollHeight - 100
    ) {
        return;
    }

    // Check if the user has scrolled to a new page
    var currentPage =
        Math.ceil(
            agentDataContainer.scrollTop() / agentDataContainer.innerHeight()
        ) + 1;

    if (currentPage > lastFetchedPageProperty) {
        // Set the flag to indicate that a request is in progress
        isFetchingProperties = true;
        loadAgentManagementData();
    }
});

function loadAgentManagementData() {
    let formData = new FormData();
    $(".agentTableData").find(".table_dashboard").addClass("loader");
    formData.append(
        "search_input_user",
        $("input[name=search_input_user]").val() || ""
    );
    formData.append("page", propertiesPage);
    const attributes = {
        hasButton: false,
        handleSuccess: function() {
            $(".agentTableData").find(".table_dashboard").removeClass("loader");
            $(".agentTableData").find(".table_dashboard").removeClass("loader");
            $(".agentTableData").find(".no_data_found").empty();
            if (datas["agents"].current_page != 2 && datas["agents"] != "") {
                console.log("search");
                $(".agentTableData").find(".agents-data-list").remove();
                $(".agentTableData")
                    .find(".dashboard_table tbody")
                    .html(datas["data"]);
            } else if (
                datas["agents"].current_page != null &&
                datas["agents"].current_page != ""
            ) {
                if (propertiesPage <= datas["agents"].last_page) {
                    console.log("append");
                    $(".agentTableData")
                        .find(".dashboard_table")
                        .append(datas["data"]);
                    propertiesPage++;
                    lastFetchedPageProperty++;
                    isFetchingProperties = false;
                }
            } else {
                console.log("blank");
                $(".agentTableData").find(".agents-data-list").remove();
                $(".agentTableData").find(".agents-data-list").find(".no_data_found").html(datas["data"]);
            }
        },
        handleError: function() {
            $(".agentTableData").find(".table_dashboard").removeClass("loader");
        },
        handleErrorMessages: function() {},
    };
    const ajaxOptions = {
        url: routeUrlLoadAgents,
        method: "post",
        data: formData,
    };

    makeAjaxRequest(ajaxOptions, attributes);
}

// $(document).on("click", ".saveEventBtn", function (e) {
//     e.preventDefault();
//     $btnName = $(this).text();
//     $(this).prop("disabled", true);
//     $(this).html(
//         '<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> ' +
//         $btnName
//     );
//     const that = this;

//     var formData = new FormData($("#addEventForm")[0]);
//     const attributes = {
//         hasButton: true,
//         btnSelector: ".saveEventBtn",
//         btnText: $btnName,
//         handleSuccess: function () {
//             localStorage.setItem("flashMessage", datas["msg"]);
//             window.location.reload();
//         },
//     };
//     const ajaxOptions = {
//         url: routeUrlAddEvent,
//         method: "post",
//         data: formData,
//     };

//     makeAjaxRequest(ajaxOptions, attributes);
// });

// $(document).on(
//     "click",
//     ".upcomingEventName,.closeEditViewButton",
//     function (e) {
//         $eventId = $(this).attr("data-id");
//         $(".sidebarEventsForm").addClass("loader");
//         openEventSidebar();
//         let url = routeUrlViewEvent.replace(":eventId", $eventId);

//         const that = this;
//         const attributes = {
//             hasButton: false,
//             handleSuccess: function () {
//                 $(".sidebarEventsForm").removeClass("loader");
//                 //$('.eventSidebarModalTitle').text('Event Details');
//                 $(".eventSidebarModalTitle").html(eventDetailstext);
//                 $(".sidebarEventsForm").html(datas["data"]);
//             },
//         };
//         const ajaxOptions = {
//             url: url + "?type=view",
//             method: "get",
//             data: {},
//         };
//         makeAjaxRequest(ajaxOptions, attributes);
//     }
// );

// $(document).on("click", ".editEventBtn", function (e) {
//     $eventId = $(this).attr("data-id");
//     $eventName = $(this).attr("data-name");
//     $(".sidebarEventsForm").addClass("loader");
//     openEventSidebar();
//     let url = routeUrlViewEvent.replace(":eventId", $eventId);

//     const that = this;
//     const attributes = {
//         hasButton: false,
//         handleSuccess: function () {
//             $(".sidebarEventsForm").removeClass("loader");
//             $(".eventSidebarModalTitle").html(editEventDetailsText);
//             $(".sidebarEventsForm").html(datas["data"]);
//         },
//     };
//     const ajaxOptions = {
//         url: url + "?type=edit",
//         method: "get",
//         data: {},
//     };
//     makeAjaxRequest(ajaxOptions, attributes);
// });

// $(document).on("click", ".deleteEventBtn", function (e) {
//     e.preventDefault();
//     var name = $(this).data("name");
//     var id = $(this).data("id");

//     show_message3(Attempt_deleteText, "confirm", {
//         confirmMessage: areYouSureText,
//         confirmBtnText: deleteText,
//         confirmSecondaryMessage: deleteText + " " + name,
//         callback: function () {
//             window.location.href = eventDeleteUrl.replace(":eventId", id);
//         },
//     });
// });
// $(document).on("click", ".updateEventBtn", function (e) {
//     e.preventDefault();
//     $btnName = $(this).text();
//     $eventId = $(this).data("id");
//     $(this).prop("disabled", true);
//     $(this).html(
//         '<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> ' +
//         $btnName
//     );
//     const that = this;
//     let url = routeUrlEditEvent.replace(":eventId", $eventId);
//     var formData = new FormData($(".sidebarEventsForm")[0]);
//     $(".removeEventAttachmentBtn").each(function (index, element) {
//         formData.append("files[]", $(element).data("id"));
//     });
//     const attributes = {
//         hasButton: true,
//         btnSelector: ".updateEventBtn",
//         btnText: $btnName,
//         handleSuccess: function () {
//             localStorage.setItem("flashMessage", datas["msg"]);
//             window.location.reload();
//         },
//     };
//     const ajaxOptions = {
//         url: url,
//         method: "post",
//         data: formData,
//     };

//     makeAjaxRequest(ajaxOptions, attributes);
// });

// $(document).on("click", ".removeEventAttachmentBtn", function () {
//     $(".eventAttachmentInput").addClass("loader");
//     const attributes = {
//         hasButton: false,
//         handleSuccess: function () {
//             $(".eventAttachmentData").html(datas["data"]);
//             $(".eventAttachmentInput").removeClass("loader");
//         },
//         handleError: function () {
//             $(".eventAttachmentInput").removeClass("loader");
//             $(".eventAttachmentInput").removeClass("loader");
//         },
//         handleErrorMessages: function () {
//             $(".eventAttachmentInput").removeClass("loader");
//         },
//     };
//     let eventAttachmentId = $(this).attr("data-id");
//     let url = removeEventAttachementUrl.replace(":id", eventAttachmentId);
//     const ajaxOptions = {
//         url: url,
//         method: "get",
//     };
//     makeAjaxRequest(ajaxOptions, attributes);
// });



// Company To-do list related script
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
var userCompanyTasksContainer = $(".taskMangementRow").find(".table_dashboard");
var userCompanyTasksPage = 2;
var isFetchingUserCompanyTasks = false;
var lastFetchedPageUserCompanyTask = 1;

userCompanyTasksContainer.scroll(function() {
    // Check if the user is near the bottom of the container
    if (
        isFetchingUserCompanyTasks ||
        userCompanyTasksContainer.scrollTop() + userCompanyTasksContainer.innerHeight() <
        userCompanyTasksContainer[0].scrollHeight - 100
    ) {
        return;
    }

    // Check if the user has scrolled to a new page
    var currentPage =
        Math.ceil(
            userCompanyTasksContainer.scrollTop() /
            userCompanyTasksContainer.innerHeight()
        ) + 1;
    if (currentPage > lastFetchedPageUserCompanyTask) {
        // Set the flag to indicate that a request is in progress
        isFetchingUserCompanyTasks = true;
        loadUserCompanyTasksData(true);
    }
});

$(document).on("keyup", "input[name=search_input_task]", function() {
    loadUserCompanyTasksData();
});

function loadUserCompanyTasksData(withScroll = false) {
    let formData = new FormData();
    if (!withScroll) {
        $(".userCompanyTaskTableData").addClass("loader");
    }
    formData.append(
        "search_input_task",
        $("input[name=search_input_task]").val() || ""
    );
    formData.append("page", withScroll ? userCompanyTasksPage : 1);
    const attributes = {
        hasButton: false,
        handleSuccess: function() {
            $(".userCompanyTaskTableData").removeClass("loader");
            if (withScroll) {
                $(".userCompanyTaskTableData").append(datas["data"]);
                if (userCompanyTasksPage < datas["tasks"].last_page) {
                    // Increment the page number for the next request
                    userCompanyTasksPage++;

                    // Update the last fetched page
                    lastFetchedPageUserCompanyTask++;

                    // Reset the flag since the request is complete
                    isFetchingUserCompanyTasks = false;
                }
            } else {
                $(".userCompanyTaskTableData").html(datas["data"]);
                lastFetchedPageUserCompanyTask = 1;
                userCompanyTasksPage = 2;
                isFetchingUserCompanyTasks = false;
            }
        },
        handleError: function() {
            $(".userCompanyTaskTableData").removeClass("loader");
        },
        handleErrorMessages: function() {},
    };
    const ajaxOptions = {
        url: routeUrlLoadUserCompanyTasksData,
        method: "post",
        data: formData,
    };

    makeAjaxRequest(ajaxOptions, attributes);
}

$(document).on("click", ".deleteUserCompanyTaskBtn", function(e) {
    e.preventDefault();
    var name = $(this).data("name");
    var id = $(this).data("id");

    show_message3(userCompanyTaskDeleteConfirmText + ' "' + name + '"', "confirm", {
        confirmMessage: areYouSureTextConfirmPopup,
        confirmBtnText: removeTextConfirmPopup,
        confirmSecondaryMessage: removeTextConfirmPopup + " " + name,
        callback: function() {
            const attributes = {
                hasButton: false,
                handleSuccess: function() {
                    loadUserCompanyTasksData();
                },
                handleError: function() {},
                handleErrorMessages: function() {},
            };
            var routeDeleteUserCompanyTask = routeUrlDeleteUserCompanyTask.replace(
                ":id",
                id
            );

            const ajaxOptions = {
                url: routeDeleteUserCompanyTask,
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
            loadUserCompanyTasksData();
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
        $(".userCompanyTaskCheckbox").each(function(index, element) {
            formData.append("dataArr[]", $(element).attr("data-id"));
        });
        updateTaskStatus(formData);
        $(".userCompanyTaskCheckbox").prop("checked", true);
    } else {
        $(".userCompanyTaskCheckbox").prop("checked", false);
    }
});
$(document).on("click", ".userCompanyTaskCheckbox", function() {
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

$(document).on("click", ".saveAssignTodoList", function() {
    $btnName = $(this).text();
    $(this).prop("disabled", true);
    $(this).html(
        '<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> ' +
        $btnName
    );
    var formData = new FormData($("#addAssignToDoList")[0]);
    var user_task_id = $(".user_task_id").val();

    var assign_to_user = ".assign_to" + user_task_id;
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
$(document).on("click", ".user_task_id", function() {
    var user_task_id = $(this).data("id");
    $(".user_task_id").val(user_task_id);
});
$(document).on("click", ".assingToDoModal", function() {
    var assing_to_user_id = $(this).parents('.assingToUserId').find('.assingToUser').attr('assingToUserId');

});



//Event Related Script
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
    var projectIdField = document.getElementById("project_id");
    $(".removeEventAttachmentBtn").each(function(index, element) {
        formData.append("files[]", $(element).data("id"));
    });
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
            $(".Project_Events_Schedule_data")
                .html("");
            $(".Project_Events_Schedule_data")
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
function openEventSidebar() {
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
        openEventSidebar();
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
    openEventSidebar();
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

//dashboard map properties Map - tab 
$('ul.tabs li').click(function() {
    var tab_id = $(this).attr('data-tab');
    $('ul.tabs li').removeClass('current');
    $('.tab-content_one').removeClass('current');
    $(this).addClass('current');
    $("#" + tab_id).addClass('current');
});