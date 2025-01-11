<div class="chat_second-card">
    <div class="row">
        <div class="col-md-12 text-center">
            <!-- Your Image Upload Component -->
            <div class="form-group crm-profile-image-upload-container position-relative">
                <x-forms.crm-profile-image-upload :attributes="[
                    'name' => 'group_image',
                    'hasLabel' => false,
                    'label' => trans('messages.dashboard.Profile_Image'),
                    'id' => 'image',
                    'attributes' => [],
                    'selectedImage' => !empty($findGroup->group_image)
                        ? getFileUrl($findGroup->group_image, 'groups')
                        : asset('img/default-user.jpg'),
                    'hasHelpText' => false,
                    'help' => 'Please enter your password',
                    'isRequired' => false,
                ]" />
            </div>
            <div class="col-lg-12 pt-2">
                <div class="text-14 font-weight-700 text-capitalize lineheight-18 color-b-blue">
                    {{$findGroup->name ?? ''}}</div>
                    {{-- here to transalte --}}
                <div class="color-light-grey-eight lineheight-18 text-14 font-weight-400 ">
                    {{trans('messages.Number_of_group_members')}}: 
                    {{$findGroup->group_members->total()}}</div>
                <div class="lineheight-18 text-14 font-weight-400 color-primary">
                    {{trans('messages.Group_ID')}}:
                {{$findGroup->group_number ?? ''}}</div>
            </div>
        </div>
    </div>
    <!-- ///////////////////////////////////////grop_tabs//////////////////////////// -->
    <ul class="Group_chat">
        <li class="tab-link1 current" data-tab="Group_c-1">
            {{trans('messages.goup_message.About')}}
        </li>
        <li class="tab-link1" data-tab="Group_c-2">
            {{trans('messages.goup_messgae.Members')}}
        </li>
        <li class="tab-link1 " data-tab="Group_c-3">
            {{trans('messages.group_message.Files')}}
        </li>
    </ul>
    <!-- //////////////inner-tab-1/////////////////////// -->
    <div id="Group_c-1" class="tab-content_group current">
        <div class="row">
            <div class="col-lg-7 pt-2 pb-3">
                <div class="tab_group-content">
                    <div class="d-flex align-items-center gap-1 mt-3">
                        <div class="text-14 font-weight-700 lineheight-18 color-b-blue text-capitalize">
                            {{trans('messages.group_message.Group_Name')}}:
                        </div>
                        <div class="text-14 font-weight-400 lineheight-18 color-b-blue text-capitalize">
                            {{ $findGroup->name ?? '' }} </div>
                    </div>
                    <div class="d-flex align-items-center gap-1 mt-3">
                        <div class="text-14 font-weight-700 lineheight-18 color-b-blue text-capitalize">
                            {{trans('messages.Group_ID')}}:
                        </div>
                        <div class="text-14 font-weight-400 lineheight-18 color-b-blue text-uppercase">
                            {{ $findGroup->group_number ?? '' }} </div>
                    </div>
                    <div class="d-flex align-items-center gap-1 mt-3">
                        <div class="text-14 font-weight-700 lineheight-18 color-b-blue text-capitalize">
                            {{trans('messages.group_message.no_of_group_members')}}:
                        </div>
                        <div class="text-14 font-weight-400 lineheight-18 color-b-blue text-capitalize">
                            {{ $findGroup->group_members->total() }}</div>
                    </div>
                    <div class="d-flex align-items-center gap-1 mt-3">
                        <div class="text-14 font-weight-700 lineheight-18 color-b-blue text-capitalize">
                            {{trans('messages.group_message.Admin_of_group')}}:
                        </div>
                        <div class="text-14 font-weight-400 lineheight-18 color-b-blue text-capitalize">
                            {{ !empty($findGroup->group_admins) ? implode(', ', $findGroup->group_admins) : '-' }}
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-1 mt-3">
                        <div class="text-14 font-weight-700 lineheight-18 color-b-blue text-capitalize">
                            {{trans('messages.group_message.Group_created_by')}}:
                        </div>
                        <div class="text-14 font-weight-400 lineheight-18 color-b-blue text-capitalize">
                            {{ $findGroup->created_by_name ?? '' }}</div>
                    </div>
                    @if(empty($findGroup->is_group_left))
                        @if(!empty($findGroup->is_group_admin))
                        <div class="d-flex align-items-center gap-3 mt-3">
                            <i class=" icon-Leave icon-20"></i>
                            <div class="text-14 font-weight-400 lineheight-18 color-red-two text-capitalize leaveGroupBtn" data-id="{{$findGroup->id}}" data-name="{{$findGroup->name ?? ''}}">
                                {{trans('messages.leave_group')}}
                            </div>
                        </div>
                        @endif
                        @if(!empty($findGroup->is_group_admin))
                        <div class="d-flex align-items-center gap-3 mt-3 deleteGroupBtn" data-id="{{$findGroup->id}}" data-name="{{$findGroup->name ?? ''}}">
                            <i class=" icon-Delete icon-20 color-red-two "></i>
                            <div class="text-14 font-weight-400 lineheight-18 color-red-two text-capitalize">
                                {{trans('messages.delete_group')}}
                            </div>
                        </div>
                        @endif
                    @endif
                </div>
            </div>
            @if(!empty($findGroup->is_group_admin))
            <div class="chat-m-button col-lg-5 d-flex justify-content-end pt-20 mt-1">
                <button
                    class=" w-150 h-42 text-14 lineheight-18 font-weight-700 color-primary d-flex align-items-center justify-content-center gap-2 b-color-transparent border-primary border-r-8 editGroupBtn" data-id="{{$findGroup->id}}"
                    ><i class=" icon-edit icon-20"></i>
                    {{trans('messages.edit_group')}}
                </button>
            </div>
            @endif
        </div>
    </div>
    <!-- ///////////////inner-tab-2//////////////////////// -->
    <div id="Group_c-2" class="tab-content_group search-group-member">
        <div class="row">
            <div class="col-lg-12">
                <!-- ////////searc-button -->
                <div class="pt-4 pb-2 search-dashboard d-flex justify-content-between flex-wrap gap-2">
                    <div class="search_button w-100">
                        <div class="form-group position-relative">
                            <div class="input-group input-group-sm dashboard_input-search w-100">
                                <span
                                    class="input-group-text icon-Search input-icon-search dashboard-search-icon z-1"></span>
                                <input type="text" name="search_group_member_input"
                                    class="input-icon-one form-control border-r-8 border-0 b-color-transparent text-14 font-weight-400 line-height-15 color-b-blue height-40 text-capitalize searchGroupMemberInput"
                                   data-id="{{$findGroup->id}}" placeholder="{{trans('messages.Search_member_here')}}" value="">
                            </div>
                        </div>
                    </div>
                    <div class="search-select"></div>
                </div>
                <div class="member-height-group">
                    @include('modules.messages.includes.load_group_members')
                </div>


            </div>
        </div>
    </div>
    <!-- /////////////////inner-tab-3//////////////////// -->
    <div id="Group_c-3" class="tab-content_group search-group-file">
        <div class="row">
            <div class="col-lg-12">
                <!-- ////////searc-button -->
                <div class="pt-4 pb-2 search-dashboard d-flex justify-content-between flex-wrap gap-2">
                    <div class="search_button w-100">
                        <div class="form-group position-relative">
                            <div class="input-group input-group-sm dashboard_input-search w-100">
                                <span
                                    class="input-group-text icon-Search input-icon-search dashboard-search-icon z-1"></span>
                                <input type="text" name="search_group_file_input"
                                    class="input-icon-one form-control border-r-8 border-0 b-color-transparent text-14 font-weight-400 line-height-15 color-b-blue height-40 text-capitalize searchGroupFileInput" data-id="{{$findGroup->id}}"
                                    placeholder="{{trans('messages.search_file_here')}}" value="">
                            </div>
                        </div>
                    </div>
                    <div class="search-select"></div>
                </div>
                <div class="member-height-group search-group-file-input">
                    @include('modules.messages.includes.load_group_files')
                </div>


            </div>
        </div>
    </div>
</div>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}

<script>
    $(document).ready(function() {
        $('.tab-link1').click(function() {
            $('.tab-link1').removeClass('current');
            $('.tab-content_group').removeClass('current');
            $(this).addClass('current');
            $('#' + $(this).attr('data-tab')).addClass('current');

        });
    });
    
    $("input[name=group_image]").attr("onchange", '');
        $('.searchGroupMemberInput').on("keyup", function() {
            loadGroupMemberData();
        });
        var membersContainer = $('.search-group-member').find(".member-height-group");
        var groupFileContainer = $('.search-group-file').find(".search-group-file-input");
        var memberPage = 2;
        var isFetchingMember = false;
        var lastFetchedPageMember = 1;

        membersContainer.scroll(function() {
            // Calculate the bottom position of the container
            var containerBottom = membersContainer.scrollTop() + membersContainer.innerHeight();
            // Check if the user is near the bottom of the container
            if (isFetchingMember || containerBottom < membersContainer[0].scrollHeight - 100) {
                return;
            }

            var currentPage = Math.ceil(membersContainer.scrollTop() / membersContainer.innerHeight());
            console.log(currentPage);
            // var currentPage = Math.ceil(containerBottom / membersContainer.innerHeight());
            if (currentPage > lastFetchedPageMember) {
                isFetchingMember = true;
                loadGroupMemberData(memberPage);
            }
        });

        function loadGroupMemberData(page) {
            let groupId = $('.searchGroupMemberInput').attr('data-id');
            let formData = new FormData();
            $(".search-group-member").find('.member-height-group').addClass("loader");

            formData.append(
                "search_group_member",
                $("input[name=search_group_member_input]").val() || ""
            );

            formData.append("page", page);

            const attributes = {
                hasButton: false,
                handleSuccess: function() {
                    $(".search-group-member").find('.member-height-group').removeClass("loader");
                    console.log(datas);
                    if (datas['member'] && datas['member']["group_members"]) {
                        if (datas['member']["group_members"].current_page != 1) {
                            if (datas["data"].indexOf("No members found") == -1) {
                            $(".member-height-group").append(datas["data"]);
                            memberPage++;
                            lastFetchedPageMember++;
                        }
                        } else {
                            console.log('wer');
                            console.log(datas["data"]);
                            $(".member-height-group").find(".load_group_members").remove();
                            $(".member-height-group").html(datas["data"]);
                        }
                    } else {
                        console.error("Invalid data format received.");
                    }

                    isFetchingMember = false;
                },
                handleError: function() {
                    $(".search-group-member").find(".member-height-group").removeClass("loader");
                },
                handleErrorMessages: function() {},
            };

            let url = "{{ route(routeNamePrefix() . 'messages.searchGroupMember', ':groupId') }}";
            url = url.replace(':groupId', groupId);

            const ajaxOptions = {
                url: url,
                method: "post",
                data: formData,
            };

            makeAjaxRequest(ajaxOptions, attributes);
        }
        $('.searchGroupFileInput').on("keyup", function() {
            loadGroupFileData();
        });
        groupFileContainer.scroll(function() {
            // Calculate the bottom position of the container
            var containerBottom = groupFileContainer.scrollTop() + groupFileContainer.innerHeight();
            // Check if the user is near the bottom of the container
            if (isFetchingMember || containerBottom < groupFileContainer[0].scrollHeight - 100) {
                return;
            }

            var currentPage = Math.ceil(groupFileContainer.scrollTop() / groupFileContainer.innerHeight());
            console.log(currentPage);
            // var currentPage = Math.ceil(containerBottom / membersContainer.innerHeight());
            if (currentPage > lastFetchedPageMember) {
                isFetchingMember = true;
                loadGroupFileData(memberPage);
            }
        });

        function loadGroupFileData(page) {
            let fileId = $('.searchGroupFileInput').attr('data-id');
            let formData = new FormData();
            $(".search-group-file").find('.search-group-file-input').addClass("loader");

            formData.append(
                "search_group_file",
                $("input[name=search_group_file_input]").val() || ""
            );

            formData.append("page", page);

            const attributes = {
                hasButton: false,
                handleSuccess: function() {
                    $(".search-group-file").find('.search-group-file-input').removeClass("loader");
                    console.log(datas);
                    if (datas['file'] && datas['file']["group_files"]) {
                        if (datas['file']["group_files"].current_page != 1) {
                            if (datas["data"].indexOf("No files Found") == -1) {
                            $(".member-height-group").append(datas["data"]);
                            memberPage++;
                            lastFetchedPageMember++;
                        }
                        } else {
                            console.log('wer');
                            console.log(datas["data"]);
                            $(".member-height-group").find(".search-group-file-input").remove();
                            $(".search-group-file-input").html(datas["data"]);
                        }
                    } else {
                        console.error("Invalid data format received.");
                    }

                    isFetchingMember = false;
                },
                handleError: function() {
                    $(".search-group-member").find(".member-height-group").removeClass("loader");
                },
                handleErrorMessages: function() {},
            };

            let url = "{{ route(routeNamePrefix() . 'messages.searchGroupFile', ':groupId') }}";
            url = url.replace(':groupId', fileId);

            const ajaxOptions = {
                url: url,
                method: "post",
                data: formData,
            };

            makeAjaxRequest(ajaxOptions, attributes);
        }

</script>
