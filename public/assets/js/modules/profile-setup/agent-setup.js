$(".slick-slider").slick({
    slidesToShow: 1,
    infinite: true,
    slidesToScroll: 1,
    autoplay: true,
    dots: true,
    arrows: false,
    autoplaySpeed: 3000
        // dots: false, Boolean
        // arrows: false, Boolean
});


// var v = $("#booking-form").validate({
//     rules: {
//         bf_totalGuests: {
//             required: true
//         },
//         bf_date: {
//             required: true
//         },
//         bf_time: {
//             required: true
//         },
//         bf_hours: {
//             required: true
//         },
//         bf_fullname: {
//             required: true
//         },
//         bf_email: {
//             required: true,
//             email: true
//         }

//     },
//     errorElement: "span",
//     errorClass: "error",
//     errorPlacement: function(error, element) {
//         error.insertBefore(element);
//     }
// });

$(".next-btn1").click(function() {
    let formData = new FormData($("#step1Form")[0]);
    formData.append('current_status', 'second_step');
    $(this).prop('disabled', true);
    $(this).html('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> ' + $(this).text());
    const attributes = {
        hasButton: true,
        btnSelector: '.next-btn1',
        btnText: $(this).text(),
        handleSuccess: function() {
            $('.backBtn').removeClass('d-none');
            $(".tab-pane").hide();
            $("#step2").fadeIn(1000);
            $('.progressbar-dots').removeClass('active');
            $('li.progressbar-dotss_one .progressbar-dots').addClass('active');
            $('li.progressbar-dotss_zero .progressbar-dots').addClass('active_one');
            $("span#change-text").text("Completed");
            $("span#change-text_one").text("In Progress");
            $("span#change-text_one").addClass("active_three");
            $('span#change-text').addClass('active_two');

        },
        handleError: function() {
            // $('.certificateInput').removeClass('loader');
        },
        handleErrorMessages: function() {

            $.each(datas['errors'], function(index, html) {

                if (index == 'files') {
                    $('.certificateInput').removeClass('loader');
                    $(".certificateInput").next().addClass('error');
                    $(".certificateInput").next().html(html);
                    $(".certificateInput").next().show();
                }
                console.log(index);
                if (index == 'gov_files') {
                    $('.govcertificateInput').removeClass('loader');
                    $(".govcertificateInput").next().addClass('error');
                    $(".govcertificateInput").next().html(html);
                    $(".govcertificateInput").next().show();
                }
            });


        }
    };
    const ajaxOptions = {
        url: saveProfileSetupUrl,
        method: 'post',
        data: formData
    };
    makeAjaxRequest(ajaxOptions, attributes);


});
const changeText = document.querySelector("#change-text");

// changeText.addEventListener("click", function() {
//     changeText.textContent = "Text has been changed!";
// });
$(".next-btn2").click(function() {
    let formData = new FormData($("#step2Form")[0]);
    formData.append('current_status', 'third_step');
    $(this).prop('disabled', true);
    $(this).html('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> ' + $(this).text());
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
        btnSelector: '.next-btn2',
        btnText: $(this).text(),
        handleSuccess: function() {
            $('.backBtn').removeClass('d-none');
            $('.profileOverviewData').html(datas['data']);
            $(".tab-pane").hide();
            $("#step3").fadeIn(1000);
            $('li.progressbar-dotss_one .progressbar-dots').removeClass('active');
            $('li.progressbar-dotss_two .progressbar-dots').addClass('active');
            $('li.progressbar-dotss_one .progressbar-dots').addClass('active_one');
            $("span#change-text_one").text("Completed");
            $('span#change-text_one').removeClass('active_three');
            $('span#change-text_one').addClass('active_two');
            $("span#change-text_two").text("In Progress");
            $('span#change-text_two').addClass('active_three');

        },
        handleError: function() {
            // $('.certificateInput').removeClass('loader');
        },
        handleErrorMessages: function() {
            $.each(datas['errors'], function(index, html) {
                if (index == 'files') {

                }
            });


        }
    };
    const ajaxOptions = {
        url: saveProfileSetupUrl,
        method: 'post',
        data: formData
    };
    makeAjaxRequest(ajaxOptions, attributes);
});

$(document).on('click', ".submit-btn", function() {
    let formData = new FormData();
    formData.append('current_status', 'last_step');
    $(this).prop('disabled', true);
    $(this).html('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> ' + $(this).text());
    const attributes = {
        hasButton: true,
        btnSelector: '.submit-btn',
        btnText: $(this).text(),
        handleSuccess: function() {
            if (datas['data'] == 'developer') {
                $('#developer_review').modal('show');
            } else {
                localStorage.setItem('flashMessage', datas['msg']);
                window.location.href = datas['data'];
            }



        },
        handleError: function() {
            // $('.certificateInput').removeClass('loader');
        },
        handleErrorMessages: function() {


        }
    };
    const ajaxOptions = {
        url: saveProfileSetupUrl,
        method: 'post',
        data: formData
    };
    makeAjaxRequest(ajaxOptions, attributes);
    // if (v.form()) {
    //     $("#loader").show();
    //     setTimeout(function() {
    //         $("#booking-form").html("<h2>Your message was sent successfully. Thanks! We'll be in touch as soon as we can, which is usually like lightning (Unless we're sailing or eating tacos!).</h2>");
    //     }, 1000);
    //     return false;
    // }
});

$(document).on('click', ".backBtn", function() {
    if ($('#step2').is(':visible')) {
        $(".tab-pane").hide();
        $("#step1").fadeIn(1000);
        $('.progressbar-dots').removeClass('active');
        $('.progressbar-dots').removeClass('active_one');
        $('.progressbar-dots').removeClass('active_two');
        $('li.progressbar-dotss_zero .progressbar-dots').removeClass('active_one');
        $('li.progressbar-dotss_zero .progressbar-dots').addClass('active');
        $("span#change-text").text("In Progress");
        $("span#change-text").addClass("active_three");
        $("span#change-text_one").removeClass("active_three");
        $("span#change-text_one").removeClass("active_two");
        $("span#change-text_one").text("Pending");
        $('.backBtn').addClass('d-none');
    } else if ($('#step3').is(':visible')) {
        $(".tab-pane").hide();
        $("#step2").fadeIn(1000);
        $('.progressbar-dots').removeClass('active');
        $('li.progressbar-dotss_one .progressbar-dots').removeClass('active_one');
        $('li.progressbar-dotss_one .progressbar-dots').addClass('active');
        $('li.progressbar-dotss_two .progressbar-dots').addClass('final-dots');
        $("span#change-text_two").text("Pending");
        $("span#change-text_two").removeClass("active_three");
        $("span#change-text_one").text("In Progress");
        $("span#change-text_one").addClass("active_three");
        // $('span#change-text').addClass('active_two');
    }
});

function handleFileSelect(event) {
    const fileList = event.target.files;

    const formData = new FormData();
    // Append each file to FormData
    for (const file of fileList) {
        formData.append('files[]', file);
    }
    $('.certificateInput').addClass('loader');
    const attributes = {
        hasButton: ($('.addNewCertificateBtn').length > 0) ? true : false,
        btnSelector: ($('.addNewCertificateBtn').length > 0) ? '.addNewCertificateBtn' : '',
        btnText: ($('.addNewCertificateBtn').length > 0) ? $('.addNewCertificateBtn').text() : '',
        handleSuccess: function() {
            $('.certificateData').html(datas['data']);
            $('.certificateInput').removeClass('loader');
        },
        handleError: function() {
            $('.certificateInput').removeClass('loader');
        },
        handleErrorMessages: function() {
            $.each(datas['errors'], function(index, html) {
                $('.certificateInput').removeClass('loader');
                $(".certificateInput").next().addClass('error');
                $(".certificateInput").next().html(html);
                $(".certificateInput").next().show();
            });


        }
    };
    const ajaxOptions = {
        url: addCertificateUrl,
        method: 'post',
        data: formData
    };
    makeAjaxRequest(ajaxOptions, attributes);

}

$(document).on('click', '.removeCertificateBtn', function() {
    $('.certificateInput').addClass('loader');
    const attributes = {
        hasButton: false,
        handleSuccess: function() {
            $('.certificateData').html(datas['data']);
            $('.certificateInput').removeClass('loader');
        },
        handleError: function() {
            $('.certificateInput').removeClass('loader');
        },
        handleErrorMessages: function() {
            $('.certificateInput').removeClass('loader');
        }
    };
    let certificateId = $(this).attr('data-id');
    let url = removeCertificateUrl.replace(':id', certificateId);
    const ajaxOptions = {
        url: url,
        method: 'get'
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
    formData.append('files', file[0]);
    $('.govcertificateInput').addClass('loader');
    const attributes = {
        hasButton: ($('.changeGovCertificateBtn').length > 0) ? true : false,
        btnSelector: ($('.changeGovCertificateBtn').length > 0) ? '.changeGovCertificateBtn' : '',
        btnText: ($('.changeGovCertificateBtn').length > 0) ? $('.changeGovCertificateBtn').text() : '',
        handleSuccess: function() {
            $('.governmentData').html(datas['data']);
            $('.govcertificateInput').removeClass('loader');
        },
        handleError: function() {
            $('.govcertificateInput').removeClass('loader');
        },
        handleErrorMessages: function() {
            $.each(datas['errors'], function(index, html) {
                $('.govcertificateInput').removeClass('loader');
                $(".govcertificateInput").next().addClass('error');
                $(".govcertificateInput").next().html(html);
                $(".govcertificateInput").next().show();
            });


        }
    };
    const ajaxOptions = {
        url: addGovCertificateUrl,
        method: 'post',
        data: formData
    };
    makeAjaxRequest(ajaxOptions, attributes);

}

$(document).on('click', '.downloadGovtCertificateBtn', function() {
    $('.govcertificateInput').addClass('loader');
    const attributes = {
        hasButton: false,
        handleSuccess: function() {
            const data = datas['data'];
            const link = document.createElement('a');
            link.setAttribute('href', data);
            link.setAttribute('download', datas['originalFileName']);
            link.click();
            $('.govcertificateInput').removeClass('loader');
        },
        handleError: function() {},
        handleErrorMessages: function() {}
    };
    let govCertificateUserId = $(this).attr('data-id');
    let url = downloadGovCertificateUrl.replace(':id', govCertificateUserId);
    const ajaxOptions = {
        url: url,
        method: 'get'
    };
    makeAjaxRequest(ajaxOptions, attributes);
});
$(document).on("click", ".addSubFeturesBtn", function() {
    const formData = new FormData($("#step2")[0]);
    var featureId = $(this).data("id");
    $(".subFetureCheckbox").each(function(index, elem) {

        if ($(elem).is(":checked")) {
            formData.append("subFetureId[]", $(elem).data("id"));
        }
    });
    $(".checkbox_modal").modal("hide");
});

$(document).ready(function() {
    sessionStorage.removeItem('checkedSubFeaturesData');

    $(".featureChekedId").on("change", function(e) {
        var featureChekedId = $(this).data("id");
        var checkedSubFeatures = [];
        $('input.subFetureCheckbox[feature_id="' + featureChekedId + '"]:checked').each(function() {
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
        $(".checkbox_modal").modal("hide");
    });

});