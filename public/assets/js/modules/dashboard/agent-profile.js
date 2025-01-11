$("ul.tabs li").click(function () {
    var tab_id = $(this).attr("data-tab");

    $("ul.tabs li").removeClass("current");
    $(".tab-content_one").removeClass("current");

    $(this).addClass("current");
    $("#" + tab_id).addClass("current");
});
$(document).on("click", ".updateTab1Btn", function (e) {
    e.preventDefault();
    $btnName = $(this).text();
    $(this).prop("disabled", true);
    $(this).html(
        '<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> ' +
            $btnName
    );
    const that = this;
    var formData = new FormData($("#tab1Form")[0]);
    const attributes = {
        hasButton: true,
        btnSelector: ".updateTab1Btn",
        btnText: $btnName,
        handleSuccess: function () {
            show_message(datas["msg"], "success");
        },
        handleErrorMessages: function () {
            $.each(datas["errors"], function (index, html) {
                if (index == "files") {
                    $(".certificateInput").removeClass("loader");
                    $(".certificateInput").next().addClass("error");
                    $(".certificateInput").next().html(html);
                    $(".certificateInput").next().show();
                }
            });
        },
    };
    const ajaxOptions = {
        url: routeUrlTab1,
        method: "post",
        data: formData,
    };

    makeAjaxRequest(ajaxOptions, attributes);
});
$(document).on("click", ".updateTab2Btn", function (e) {
    e.preventDefault();
    $btnName = $(this).text();
    $(this).prop("disabled", true);
    $(this).html(
        '<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> ' +
            $btnName
    );
    const that = this;
    var formData = new FormData($("#tab2Form")[0]);
    const attributes = {
        hasButton: true,
        btnSelector: ".updateTab2Btn",
        btnText: $btnName,
        handleSuccess: function () {
            show_message(datas["msg"], "success");
        },
    };
    const ajaxOptions = {
        url: routeUrlTab2,
        method: "post",
        data: formData,
    };

    makeAjaxRequest(ajaxOptions, attributes);
});

function handleFileSelect(event) {
    const fileList = event.target.files;

    const formData = new FormData();
    // Append each file to FormData
    for (const file of fileList) {
        formData.append("files[]", file);
    }
    $(".certificateInput").addClass("loader");
    const attributes = {
        hasButton: $(".addNewCertificateBtn").length > 0 ? true : false,
        btnSelector:
            $(".addNewCertificateBtn").length > 0
                ? ".addNewCertificateBtn"
                : "",
        btnText:
            $(".addNewCertificateBtn").length > 0
                ? $(".addNewCertificateBtn").text()
                : "",
        handleSuccess: function () {
            $(".certificateData").html(datas["data"]);
            $(".certificateInput").removeClass("loader");
        },
        handleError: function () {
            $(".certificateInput").removeClass("loader");
        },
        handleErrorMessages: function () {
            $.each(datas["errors"], function (index, html) {
                $(".certificateInput").removeClass("loader");
                $(".certificateInput").next().addClass("error");
                $(".certificateInput").next().html(html);
                $(".certificateInput").next().show();
            });
        },
    };
    const ajaxOptions = {
        url: addCertificateUrl,
        method: "post",
        data: formData,
    };
    makeAjaxRequest(ajaxOptions, attributes);
}

$(document).on("click", ".removeCertificateBtn", function () {
    $(".certificateInput").addClass("loader");
    const attributes = {
        hasButton: false,
        handleSuccess: function () {
            $(".certificateData").html(datas["data"]);
            $(".certificateInput").removeClass("loader");
        },
        handleError: function () {
            $(".certificateInput").removeClass("loader");
        },
        handleErrorMessages: function () {
            $(".certificateInput").removeClass("loader");
        },
    };
    let certificateId = $(this).attr("data-id");
    let url = removeCertificateUrl.replace(":id", certificateId);
    const ajaxOptions = {
        url: url,
        method: "get",
    };
    makeAjaxRequest(ajaxOptions, attributes);
});

function handleGovernmentFileSelect(event) {
    const file = event.target.files;

    const formData = new FormData();
    // Append each file to FormData
    // console.log(file[0]);
    // for (const file of fileList) {

    // }
    formData.append("files", file[0]);
    $(".govcertificateInput").addClass("loader");
    const attributes = {
        hasButton: $(".changeGovCertificateBtn").length > 0 ? true : false,
        btnSelector:
            $(".changeGovCertificateBtn").length > 0
                ? ".changeGovCertificateBtn"
                : "",
        btnText:
            $(".changeGovCertificateBtn").length > 0
                ? $(".changeGovCertificateBtn").text()
                : "",
        handleSuccess: function () {
            $(".governmentData").html(datas["data"]);
            $(".govcertificateInput").removeClass("loader");
        },
        handleError: function () {
            $(".govcertificateInput").removeClass("loader");
        },
        handleErrorMessages: function () {
            $.each(datas["errors"], function (index, html) {
                $(".govcertificateInput").removeClass("loader");
                $(".govcertificateInput").next().addClass("error");
                $(".govcertificateInput").next().html(html);
                $(".govcertificateInput").next().show();
            });
        },
    };
    const ajaxOptions = {
        url: addGovCertificateUrl,
        method: "post",
        data: formData,
    };
    makeAjaxRequest(ajaxOptions, attributes);
}
$(document).on("click", ".downloadGovtCertificateBtn", function () {
    $(".govcertificateInput").addClass("loader");
    const attributes = {
        hasButton: false,
        handleSuccess: function () {
            const data = datas["data"];
            const link = document.createElement("a");
            link.setAttribute("href", data);
            link.setAttribute("download", datas["originalFileName"]);
            link.click();
            $(".govcertificateInput").removeClass("loader");
        },
        handleError: function () {},
        handleErrorMessages: function () {},
    };
    let govCertificateUserId = $(this).attr("data-id");
    let url = downloadGovCertificateUrl.replace(":id", govCertificateUserId);
    const ajaxOptions = {
        url: url,
        method: "get",
    };
    makeAjaxRequest(ajaxOptions, attributes);
});

$(document).on("click", ".updateCompanyDetail", function (e) {
    e.preventDefault();
    $btnName = $(this).text();
    $(this).prop("disabled", true);
    $(this).html(
        '<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> ' +
            $btnName
    );
    const that = this;
    var formData = new FormData($("#user-company-details")[0]);
    const attributes = {
        hasButton: true,
        btnSelector: ".updateCompanyDetail",
        btnText: $btnName,
        handleSuccess: function () {
            show_message(datas["msg"], "success");
        },
        handleErrorMessages: function () {
            $.each(datas["errors"], function (index, html) {
                if (index == "files") {
                    $(".certificateInput").removeClass("loader");
                    $(".certificateInput").next().addClass("error");
                    $(".certificateInput").next().html(html);
                    $(".certificateInput").next().show();
                }
            });
        },
    };
    const ajaxOptions = {
        url: updateCompanyDetail,
        method: "post",
        data: formData,
    };

    makeAjaxRequest(ajaxOptions, attributes);
});

$(document).on("click", ".request_setup", function (e) {
    e.preventDefault();
    $btnName = $(this).text();
    $(this).prop("disabled", true);
    $(this).html(
        '<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> ' +
            $btnName
    );
    const that = this;
    var formData = new FormData($("#xmlassistedform")[0]);
    const attributes = {
        hasButton: true,
        btnSelector: ".request_setup",
        btnText: $btnName,
        handleSuccess: function () {
            show_message(datas["msg"], "success");

            $("#xmlassistedform").html("");
            // console.log(temp);

            $("#xmlassistedform").html(
                "<h4>Your Request has been Submitted Successfully. Our Team will get back to you soon</h4>"
            );
        },
        handleErrorMessages: function () {},
    };
    const ajaxOptions = {
        url: assistedSetup,
        method: "post",
        data: formData,
    };

    makeAjaxRequest(ajaxOptions, attributes);
});

$(document).ready(function () {
    // $('#checkbox_modal').;
    $(".run_feed_copy").prop("disabled", true);
    $(".run_feed_btn").prop("disabled", true);
    $(".run_feed_btn").removeClass("Gradient_button");
    $("#checkbox_modal").prop("checked", false);
});

$(document).on("change", "#checkbox_modal", function () {
    if ($(this).is(":checked")) {
        $(".run_feed_pra").removeClass("opacity-25");
        $(".run_feed").removeClass("opacity-25");
        $(".run_feed_copy").prop("disabled", false);
        $(".run_feed_btn").prop("disabled", false);
        $(".run_feed_btn").addClass("Gradient_button");
    } else {
        $(".run_feed_pra").addClass("opacity-25");
        $(".run_feed").addClass("opacity-25");
        $(".run_feed_copy").prop("disabled", true);
        $(".run_feed_btn").prop("disabled", true);
        $(".run_feed_btn").removeClass("Gradient_button");
    }
});

$(document).on("click", ".run_feed_btn", function (e) {
    e.preventDefault();
    $btnName = $(this).text();
    $(this).prop("disabled", true);
    $(this).html(
        '<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> ' +
            $btnName
    );
    const that = this;
    var formData = new FormData($("#run_feed_form")[0]);
    const attributes = {
        hasButton: true,
        btnSelector: ".run_feed_btn",
        btnText: $btnName,
        handleSuccess: function () {
          $('.crm-main-content').html(datas['htmlData']);
        },
        handleErrorMessages: function () {},
    };
    const ajaxOptions = {
        url: xmlrunfeedroute,
        method: "post",
        data: formData,
    };

    makeAjaxRequest(ajaxOptions, attributes);
});



$(document).on("click", ".confirm_run_btn", function (e) {
    e.preventDefault();
    $btnName = $(this).text();
    $(this).prop("disabled", true);
    $(this).html(
        '<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> ' +
            $btnName
    );
    const that = this;
    const formData = new FormData();
    var uploadurl = $(this).attr("data-url");
    formData.append("uploadurl", uploadurl);
    const attributes = {
        hasButton: true,
        btnSelector: ".confirm_run_btn",
        btnText: $btnName,
        handleSuccess: function () {
            show_message(datas["msg"], "success");
            $(".propertyTableData").html(datas["htmlData"]);
            
            let startTime = Date.now(); 
            function checkProgress() {
                let url = importProgress + "?feedurl="+uploadurl;
                let feedurl =  feedsyncedurl + "?feedurl="+uploadurl;
                $.ajax({
                    type: "get",
                    url: url,
                    success: function (response) {
                        console.log(response);
            
                        document.getElementById("import-progress-bar").value = response.progress;
                        $(".feed_percentage").text(response.progress + "%");
                        $(".file_count").text(response.processed_records + "/" + response.total_records);
            
                        let elapsedMilliseconds = Date.now() - startTime;
                        let elapsedSeconds = Math.floor(elapsedMilliseconds / 1000);
                        let hours = Math.floor(elapsedSeconds / 3600);
                        let minutes = Math.floor((elapsedSeconds % 3600) / 60);
                        let seconds = elapsedSeconds % 60;
            
                        let formattedTime = 
                            (hours < 10 ? '0' + hours : hours) + ':' + 
                            (minutes < 10 ? '0' + minutes : minutes) + ':' + 
                            (seconds < 10 ? '0' + seconds : seconds);
            
                        $(".elapsed_time").text(formattedTime);
            
                        if (response.progress === 100) {
                            clearInterval(progressInterval);
                            window.location.href = feedurl;
                        }
                    },
                });
            }

            let progressInterval = setInterval(checkProgress, 1000);
        },
        handleErrorMessages: function () {},
    };

    const ajaxOptions = {
        // url: xmlUploads,
        url: TestxmlUploads,
        method: "post",
        data: formData,
    };

    makeAjaxRequest(ajaxOptions, attributes);
});
