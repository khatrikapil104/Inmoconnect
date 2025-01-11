<div class="sidebar_one " id="mySidebar_one">
    <h4 class="modal-title text-18 font-weight-700 line-height-24 color-b-blue w-100 eventSidebarModalTitle"
        id="dataFilterModalLabel">
        {{ trans('messages.add-events.Event_Details') }}
    </h4>
    <a href="javascript:void(0)" class="close-btn" onclick="closeSidebar()">
        <span aria-hidden="true">
            <i class=" icon-cross text-18 color-b-blue opacity-8"></i>
        </span>
    </a>
    <form class="sidebarEventsForm h-100" method="post">
    </form>
</div>
<script>
    $(document).on('click', '.sidebar_one-content-card input[name=is_project_base_event]', function() {
        if ($(this).is(':checked')) {
            $('.sidebar_one-content-card select[name=project_id]').parents('.common-label-css').show();
        } else {

            let url = "{{ route(routeNamePrefix() . 'events.associationDataLoad') }}";;

            const that = this;
            const attributes = {
                hasButton: false,
                handleSuccess: function() {
                    console.log(datas);
                    $('.sidebarEventsForm').find('.agent-propety-data').remove();
                    $('.my_project_base_event').before(datas['data']);
                }
            };
            const ajaxOptions = {
                url: url,
                method: 'get',
                data: {}
            };
            makeAjaxRequest(ajaxOptions, attributes);
            // });
            $('#addEventModal').find('select[name=project_id]').parents('.common-label-css').hide();

            $('.sidebar_one-content-card select[name=project_id]').parents('.common-label-css').hide();
        }
    });

    $(document).on("change", "#project_id", function(e) {
        $projectId = $(this).val();
        var associationDataLoad = "{{ route(routeNamePrefix() . 'events.associationDataLoad', ':projectId') }}";
        let url = associationDataLoad.replace(":projectId", $projectId);

        const that = this;
        const attributes = {
            hasButton: false,
            handleSuccess: function() {
                console.log(datas['data']);
                $('.sidebarEventsForm').find('.agent-propety-data').remove();
                $('.my_project_base_event').before(datas['data']);
            },
        };
        const ajaxOptions = {
            url: url,
            method: "get",
            data: {},
        };
        makeAjaxRequest(ajaxOptions, attributes);
    });
</script>
