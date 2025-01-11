$('ul.tabs li').click(function() {
    var tab_id = $(this).attr('data-tab');

    $('ul.tabs li').removeClass('current');
    $('.tab-content_one').removeClass('current');

    $(this).addClass('current');
    $("#" + tab_id).addClass('current');
});
$(document).on('click', '.updateTab1Btn', function(e) {
    e.preventDefault();
    $btnName = $(this).text();
    $(this).prop('disabled', true);
    $(this).html('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> ' + $btnName);
    const that = this;
    var formData = new FormData($('#tab1Form')[0]);
    const attributes = {
        hasButton: true,
        btnSelector: '.updateTab1Btn',
        btnText: $btnName,
        handleSuccess: function() {
            show_message(datas['msg'], 'success');
        }
    };
    const ajaxOptions = {
        url: routeUrlTab1,
        method: 'post',
        data: formData
    };

    makeAjaxRequest(ajaxOptions, attributes);

});
$(document).on('click', '.updateTab2Btn', function(e) {
    e.preventDefault();
    $btnName = $(this).text();
    $(this).prop('disabled', true);
    $(this).html('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> ' + $btnName);
    const that = this;
    var formData = new FormData($('#tab2Form')[0]);
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
        btnSelector: '.updateTab2Btn',
        btnText: $btnName,
        handleSuccess: function() {
            show_message(datas['msg'], 'success');
        }
    };
    const ajaxOptions = {
        url: routeUrlTab2,
        method: 'post',
        data: formData
    };

    makeAjaxRequest(ajaxOptions, attributes);

});

$(document).on("click", ".addSubFeturesBtn", function() {
    const formData = new FormData($("#tab2Form")[0]);
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