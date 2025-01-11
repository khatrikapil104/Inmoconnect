
    $(document).on('click','.deleteViewProperty', function (e) {
        e.preventDefault();
        var name = $(this).data('name');

        var id = $(this).data('id');
       show_message3(propertyDeleteConfirmText,
            'confirm', {
                confirmMessage: areYouSureTextConfirmPopup,
                confirmBtnText: deleteTextConfirmPopup,
                confirmSecondaryMessage: deleteTextConfirmPopup+' '+ name,
                callback: function () {
                    window.location.href = propertyDeleteUrl.replace(':id',id);
                }
            });
    });

    $(document).on('click', '#send_inquiry_btn', function(e) {
        e.preventDefault();
        $btnName = $(this).text();
        $(this).prop('disabled', true);
        $(this).html('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> ' +
            $btnName);
        const that = this;

        var formData = new FormData($('#property_inquiery_form')[0]);

        const attributes = {
            hasButton: true,
            btnSelector: '#send_inquiry_btn',
            btnText: $btnName,
            handleSuccess: function() {
                toastr.success(datas['msg'])
                $('#initiate_collaboration').modal('hide');
                $('#property_lead_sure').modal('hide');
                location.reload();
            },
            handleErrorMessages: function() {
                $.each(datas['errors'], function(index, html) {
                    $(".agent_terms_agree_id").next().addClass('error');
                    $(".agent_terms_agree_id").next().html(html);
                    $(".agent_terms_agree_id").next().show();
                });
                $('#property_lead_sure').modal('hide');
            },
        };

        const ajaxOptions = {
            url: agentInquireyRoute,
            method: 'post',
            data: formData
        };

        makeAjaxRequest(ajaxOptions, attributes);

    });



    $(document).on('click',".toggle-link",function (e) {
        e.preventDefault();

        var parentDiv = $(this).parents("#propertyDescription");
        var hiddenContent = parentDiv.find(".hidden-content");

        if (hiddenContent.is(":visible")) {
            hiddenContent.hide();
            $(this).text(showMoreText);
        } else {
            hiddenContent.show();
            $(this).text(showLessText);
        }
    });

function initMap() {
    if(latVal && lngVal && isHidden == 'no'){
        // Initialize the map
        var map = new google.maps.Map(document.getElementById('propertyMap'), {
            center: { lat: parseFloat(latVal), lng: parseFloat(lngVal) },
            zoom: 15
        });

        // Add a marker
        var marker = new google.maps.Marker({
          position: { lat: parseFloat(latVal), lng: parseFloat(lngVal) },
          map: map,
          title: 'Click me for location'
        });
        var locationURL = 'https://www.google.com/maps?q=' + encodeURIComponent(parseFloat(latVal) + ',' + parseFloat(lngVal)) + '&hl=en';
        var infowindow = new google.maps.InfoWindow({
            content: '<a id="location-link" href="'+locationURL+'" target="_blank" >View Location</a>'
        });
        marker.addListener('click', function() {
            infowindow.open(map, marker);
        });


    }else{
        // Initialize the map
        var map = new google.maps.Map(document.getElementById('propertyMap'), {
            center: { lat: 40.83984419999999, lng: -73.079011 },
            zoom: 10
        });
    }

}