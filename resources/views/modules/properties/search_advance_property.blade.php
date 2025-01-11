@extends('layouts.app')
@section('content')
    <div class="overlay" id="overlay"></div>

    <div class="main-content-crm b-color-background min-vh-100" id="page-content-wrapper">
        <div class="crm-main-content">

            <!-- ////////////////////////////breadcrumv///////////////////////////////////// -->

            <x-forms.crm-breadcrumb :fieldData="[
                ['url' => route(routeNamePrefix() . 'propertySearch.index'), 'label' => 'Property Search'],
                ['url' => '', 'label' => !empty($searchData['state_name']) ? $searchData['state_name'] : ''],
                ['url' => '', 'label' => !empty($searchData['city_name']) ? $searchData['city_name'] : ''],
            ]" />
            <!-- ////////////////////////////////end-breadcreamv////////////////////////////////////// -->

            <div class="property_search-main-card border-r-8 b-color-white box-shadow-one propertySearchFilterData">
                @include('modules.properties.includes.property_search_filter_data')

            </div>

            <div class="row">
                <div class="col-md-6 mt-20">
                    <div class="paginationText mt-10">
                        @include('components.tables.pagination', ['type' => 'only_text'])
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-flex justify-content-end common-label-css filter_short_by mt-1">
                        <x-forms.crm-single-select :fieldData="[
                            'name' => 'sort_by_property_search',
                            'class' => 'sort_by_property_search',
                            'hasLabel' => false,
                            'label' => trans('messages.search_filter.Sort_By'),
                            'id' => 'sort_by',
                            'options' => [
                                'price_asc' => 'Price (Inc)',
                                'price_desc' => 'Price (Dec)',
                                'area_asc' => 'Area (Inc)',
                                'area_desc' => 'Area (Dec)',
                                'last_update' => 'Last Update',
                                'newest' => 'Newest',
                                'oldest' => 'Oldest',
                            ],
                            'attributes' => [],
                            'hasHelpText' => false,
                            'placeholder' => 'Sort By',
                            'isRequired' => false,
                            'selected' => !empty($searchData['sort_by']) ? $searchData['sort_by'] : '',
                        ]" />
                    </div>

                </div>
            </div>



            {{-- card --}}
            <div class=" propertySearchData tableData mt-4">

                @include('components.tables.custom-table', ['results' => $results])
            </div>


            <div class=" pt-4 pb-4 paginationData">
                @include('components.tables.pagination')
            </div>
        </div>
    </div>
    {{-- add-unit --}}
    <div class="modal fade" id="initiate_collaboration" tabindex="-1" role="dialog"
        aria-labelledby="initiate_collaborationLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-width-change_three " role="document">
            <div class="modal-content modal-content-file">
                <div class="modal-header border-0 modal-header_file pb-0">
                    <h5 class="modal-title text-center text-18 font-weight-700 lineheight-22 color-primary w-100"
                        id="initiate_collaborationLabel">Property Collaboration</h5>
                    <button type="button" class="close b-color-transparent" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"> <i class=" icon-cross text-24 color-b-blue opacity-8"></i></span>
                    </button>
                </div>
                <div class="modal-body modal-header_file">
                     <form action="" method="post" id="initiateCollaborate" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center ">
                                <h6 class="text-14 font-weight-700 color-primary">Agent Details</h6>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 modal_customer-details ">
                                <div class="row">
                                    <div id="propertyDetails" data-propertyDetails="" data-customer="{{ auth()->user()->name }}"></div>
                                    <div class="col-sm-6 col-md-3 col-lg-3">
                                        <div class="d-flex gap-12">
                                            <img src="http://127.0.0.1:8000/img/default-user.jpg" width="40" height="40"
                                                alt="image" class="border-r-4" id="agentImage">
                                            <div class="">
                                                <h6 class="text-14 font-weight-700 color-primary">Name:</h6>
                                                <h6 class="text-14 font-weight-400 color-b-blue pt-1" id="agentName"></h6>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-sm-6 col-md-3 col-lg-3 pt-3 pt-sm-0">
                                        <div class="modal-details-c">
                                            <h6 class="text-14 font-weight-700 color-primary">Mobile Number:</h6>
                                            <h6 class="text-14 font-weight-400 color-b-blue pt-1" id="agentPhone"></h6>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-3 col-lg-3 pt-3 pt-md-0">
                                        <div class="modal-details-c">
                                            <h6 class="text-14 font-weight-700 color-primary">Email:</h6>
                                            <h6 class="text-14 font-weight-400 color-b-blue pt-1" id="agentEmail"></h6>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-3 col-lg-3 pt-3 pt-md-0">
                                        <div class="modal-details-c">
                                            <h6 class="text-14 font-weight-700 color-primary">City</h6>
                                            <h6 class="text-14 font-weight-400 color-b-blue pt-1" id="agentCity"></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center ">
                                <h6 class="text-14 font-weight-700 color-primary">A Message From Primary Agent</h6>
                            </div>
                            <div class="col-md-12 common-label-css">
                                <div class="form-group crm-textarea-container position-relative mt-3">
                                    <textarea disabled="disabled"
                                        class="message_from crm-textarea form-control form-control border-r-8 border-blue b-color-transparent text-12 font-weight-400 line-height-15 text-capitalize color-b-blue"
                                        name="m_primary_agent" id="m_primary_agent" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center mt-30">
                                <h6 class="text-14 font-weight-700 color-primary">Please share your contact Details</h6>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css">
                                <div class="form-group mt-3 position-relative">
                                    <label for="name" class="text-14 font-weight-400 lineheight-18  color-b-blue">Full
                                        Name:<span class="required">*</span>
                                    </label>
                                    <input type="text"
                                        class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                        name="name" id="name" value="{{ auth()->user()->name }}" placeholder="">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css">
                                <div class="form-group mt-3 position-relative">
                                    <label for="name"
                                        class="text-14 font-weight-400 lineheight-18  color-b-blue">Email:<span
                                            class="required">*</span>
                                    </label>
                                    <input type="text" disabled="disabled"
                                        class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                        name="email" id="email" value="{{ auth()->user()->email }}" placeholder="">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css">
                                <div class="form-group mt-3 position-relative">
                                    <label for="name" class="text-14 font-weight-400 lineheight-18  color-b-blue">Mobile
                                        Number:<span class="required">*</span>
                                    </label>
                                    <input type="text"
                                        class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                        name="phone" id="phone" value="{{ auth()->user()->phone }}" placeholder="">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 common-label-css">
                                <div class="form-group mt-3 position-relative">
                                    <label for="name" class="text-14 font-weight-400 lineheight-18  color-b-blue">City:
                                        <span class="required">*</span>
                                    </label>
                                    <input type="text"
                                        class="form-control border-r-8 border-blue b-color-transparent text-14 font-weight-400 lineheight-18 color-b-blue height-46 "
                                        name="city" id="city" value="{{ auth()->user()->city }}" placeholder="">
                                </div>
                            </div>
                            <input type="hidden" name="agentid" id="agentid" value="" />
                            <div class="col-md-12 common-label-css">
                                <div class="form-group crm-textarea-container position-relative mt-3">
                                    <label for="message" class="text-14 font-weight-400 lineheight-18 color-b-blue">Message:
                                    </label>
                                    <textarea
                                        class="crm-textarea form-control form-control border-r-8 border-blue b-color-transparent text-12 font-weight-400 line-height-15 text-capitalize color-b-blue"
                                        name="frommessage" id="message" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12 d-flex gap-3 align-items-center mt-3">
                                <input type="checkbox" id="checkbox_modal" name="button_reset" value="button_reset" required>
                                <p class="text-14 color-b-blue font-weight-400" for="checkbox_modal">I agree with primary agent's message and give
                                    my consent to post this property at my portfolio.</p>
                            </div>
                            <div
                                class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css d-flex justify-content-end align-items-end pt-30">
                                <div class="form-group position-relative">
                                    <button type="button" onclick="openConfirm()"
                                        class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white" >Initiate Collaboration </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="modal " id="add_to_do_list" data-bs-backdrop="static" style="display: none;background: #00000040;"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-width-change_eight" role="document">
            <div class="modal-content  border-r-8 border-0 b-color-white p-30">
                <div class="modal-header border-0 justify-content-end p-0">
                    <button type="button" class="close b-color-transparent cursor-pointer" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path id="Union" fill-rule="evenodd" clip-rule="evenodd"
                                    d="M8 10.0544L2.05438 16L0 13.9456L5.94561 8L6.64978e-06 2.05438L2.05439 0L8 5.94561L13.9456 0L16 2.05438L10.0544 8L16 13.9456L13.9456 16L8 10.0544Z"
                                    fill="black" fill-opacity="0.5"></path>
                            </svg>
                        </span>
                    </button>
                </div>
                <div class="modal-body p-0 text-center mt10">
                    <div class="modal-body-text">
                        <i class="icon-success-icon modalIcons text60" height="60" width="60"
                            style="display:none;"></i>
                        <i class="icon-error-icon modalIcons text60" height="60" width="60"
                            style="display:none;"></i>
                        <i class="icon-warning-icon modalIcons text60" height="60" width="60"
                            style="display:none;"></i>
                        <i class="icon-error-icon1 modalIcons text60" height="60" width="60" style=""></i>
                        <div
                            class="text-18 lineheight-22 font-weight-700 letter-s-48 color-b-blue opacity-8 pt-30 modal-message">
                            You are sending property inquiry to <div class="agentName"></div>.</div>
                        <div class="modal-confirm" style="">
                            <div
                                class="text-18 lineheight-22 font-weight-700 letter-s-48 color-primary pt-10 modal-confirm-message">
                                Are you sure?</div>
                            <div
                                class="text-12 font-weight-400 lineheight-15 opacity-5 color-black pt-20 modal-confirm-secondary-text">
                                Property ID: <div class="propertyId"></div>
                            </div>
                            <div class="d-flex align-items-center justify-content-center gap-3 mt-10">
                                <button type="button" id="confirmYesButton" data-currentuser="{{ Auth::user()->id }}" onclick="clickedYes()"
                                    class="gardient-button small-button border-r-8 b-color-Gradient text-14 font-weight-700 lineheight-18 color-white">Yes</button>
                                <button type="button" id="confirmNoButton" onclick="clickedNo()" data-bs-dismiss="modal"
                                    class="small-button border-r-8 b-color-white text-14 font-weight-700 lineheight-18 color-primary border-primary d-flex align-items-center">No</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
        <script type="text/javascript">
             var makeCollaborateUrl = "{{ route(routeNamePrefix() .'property.makeCollaboration') }}";
        </script>
        @if(auth()->user()->role->name == 'agent')
            <script src="{{ asset('assets/js/modules/properties/initiateCollaborate.js') }}"></script>
        @endif
        @if (request()->isMethod('POST'))
            <script>
                setTimeout(() => {

                    $('#searchFilterBtn').trigger('click');
                }, 1000);
            </script>
        @endif

        {{-- more-filter & prize dropdown --}}
        <script>
            // Function Definition and Initial Setup
            function myFunctions() {
                var dropdown = document.getElementById("myDropdown");
                var filterBox = document.querySelector(".filter_box");

                if (dropdown) {
                    dropdown.classList.toggle("show");

                    // Dynamic Style Injection
                    var dynamicStyle = document.getElementById('dynamicStyles');
                    if (!dynamicStyle) {
                        dynamicStyle = document.createElement('style');
                        dynamicStyle.id = 'dynamicStyles';
                        document.head.appendChild(dynamicStyle);
                    }

                    // CSS Transformations Based on Dropdown State
                    if (dropdown.classList.contains("show")) {
                        dynamicStyle.textContent = `
                            .filter_box::before {
                                transform: translate(-50%, -50%) rotate(-135deg);
                            }
                        `;
                    } else {
                        dynamicStyle.textContent = `
                            .filter_box::before {
                                transform: translate(-50%, -50%) rotate(45deg);
                            }
                        `;
                    }

                    // Click Event for Toggle Button
                    document.getElementById('toggleButton').addEventListener('click', function(event) {
                        event.stopPropagation();
                        event.preventDefault();

                        // Dropdown and Chat Dropdown Logic
                        var chatDropdowns = document.querySelectorAll(".chat_img-dropdown");
                        chatDropdowns.forEach(function(chatDropdown) {
                            chatDropdown.classList.remove('show');
                        });

                        // Main Button Logic
                        if (mainButtonPropertyFilter.classList.contains("active")) {
                            propertyFilterMainContent.style.display = "none";
                        } else {
                            if (propertyFilterMainContent.style.display === "none" || propertyFilterMainContent.style
                                .display === "") {
                                propertyFilterMainContent.style.display = "block";
                                mainButtonPropertyFilter.classList.add("active");
                            } else {
                                propertyFilterMainContent.style.display = "none";
                                mainButtonPropertyFilter.classList.remove("active");
                            }
                        }
                    });

                    // Document Click to Close Dropdowns
                    document.addEventListener('click', function(event) {
                        var dropdown = document.getElementById("myDropdown");
                        var filterBox = document.querySelector(".filter_box");
                        var toggleButton = document.getElementById("toggleButton");
                        var chatDropdowns = document.querySelectorAll(".chat_img-dropdown");

                        // Close Dropdown if clicked outside
                        if (dropdown && !dropdown.contains(event.target) &&
                            !filterBox.contains(event.target) &&
                            !toggleButton.contains(event.target)) {
                            dropdown.classList.remove("show");
                            toggleButton.classList.remove("active");

                            var dynamicStyle = document.getElementById('dynamicStyles');
                            if (dynamicStyle) {
                                dynamicStyle.remove();
                            }
                        }

                        // Chat Dropdowns Closing Logic
                        chatDropdowns.forEach(function(chatDropdown) {
                            if (!chatDropdown.contains(event.target)) {
                                chatDropdown.classList.remove("show");
                            }
                        });
                    })

                    // Event Listener for Toggle Button
                    toggleButton.addEventListener('click', function(event) {
                        event.stopPropagation();
                        toggleContent();

                        // Remove show class from chatimg-dropdowns
                        var chatDropdowns = document.querySelectorAll(".chatimg-dropdowns.show");
                        if (chatDropdowns.length > 0) {
                            chatDropdowns.forEach(function(chatDropdown) {
                                chatDropdown.classList.remove('show');
                            });
                        } else {
                            console.log("No chatimg-dropdowns elements with show class found!");
                        }

                        event.preventDefault();
                    });
                }
            }

            // Enforce Chat Dropdown Rules
            function enforceChatDropdownRules() {
                var mainButton = document.querySelector(".main-button-property-filter");

                mainButton.addEventListener('click', function() {
                    if (mainButton.classList.contains('active')) {
                        var chatDropdowns = document.querySelectorAll(".chat_img-dropdown");

                        chatDropdowns.forEach(function(chatDropdown) {
                            chatDropdown.classList.remove('show');
                        });
                    }
                });

                // Mutation Observer for Active Class Changes
                const observer = new MutationObserver(function(mutations) {
                    mutations.forEach(function(mutation) {
                        if (mutation.attributeName === "class" && mainButton.classList.contains('active')) {
                            var chatDropdowns = document.querySelectorAll(".chat_img-dropdown");

                            chatDropdowns.forEach(function(chatDropdown) {
                                chatDropdown.classList.remove('show');
                            });
                        }
                    });
                });

                // Observe class changes on the main-button-property-filter
                observer.observe(mainButton, {
                    attributes: true
                });
            }

            // Initialize the function
            enforceChatDropdownRules();

            // Get the elements
            const toggleButton = document.getElementById('toggleButton');
            const mainButtonPropertyFilter = document.querySelector('.main-button-property-filter');
            const propertyFilterMainContent = document.getElementById('property_filter_main_content');

            // Toggle Content Function
            function toggleContent() {
                if (propertyFilterMainContent.style.display === "none" || propertyFilterMainContent.style.display === "") {
                    propertyFilterMainContent.style.display = "block";
                    mainButtonPropertyFilter.classList.add("active");

                    // Closing Content Logic
                    var chatDropdowns = document.querySelectorAll(".chat_img-dropdown");
                    chatDropdowns.forEach(function(chatDropdown) {
                        chatDropdown.classList.remove('show');
                    });
                } else {
                    closeContent();
                }
            }

            // Add Event Listener to Toggle Button
            toggleButton.addEventListener('click', function(event) {
                event.stopPropagation();
                toggleContent();
                event.preventDefault();
            });

            // Define the closeContent function
            function closeContent() {
                propertyFilterMainContent.style.display = "none";
                mainButtonPropertyFilter.classList.remove("active");
            }

            // Add Event Listener to Datepickers
            const datepickers = document.querySelectorAll(
                '.datepicker-days, .datepicker-months, .datepicker-years , .year, .month');
            datepickers.forEach(function(datepicker) {
                datepicker.addEventListener('click', function(event) {
                    console.log("DatePicker clicked!");
                    event.stopPropagation();
                    mainButtonPropertyFilter.classList.add("active");
                    propertyFilterMainContent.style.display = "block";
                });
            });

            // Add Event Listener to Body
            document.body.addEventListener('click', function(event) {
                // Check if click is outside the target elements
                if (
                    propertyFilterMainContent.style.display === "block" &&
                    !propertyFilterMainContent.contains(event.target) &&
                    !toggleButton.contains(event.target) &&
                    !mainButtonPropertyFilter.contains(event.target) &&
                    !event.target.closest(
                        '.datepicker-days, .datepicker-months, .datepicker-years, .year ,.month'
                    )
                ) {
                    closeContent();
                }
            });

            // Ensure that datepicker elements do not close the content if they're clicked
            propertyFilterMainContent.addEventListener('click', function(event) {
                event.stopPropagation();
            });
        </script>

        {{-- tablink-active --}}
        {{-- <script>
            document.addEventListener('DOMContentLoaded', function() {
                const tabLinks = document.querySelectorAll('.tablink_main .tablinks');

                tabLinks.forEach(link => {
                    link.addEventListener('click', function(e) {
                        e.preventDefault();

                        tabLinks.forEach(tablink => tablink.classList.remove('active'));

                        this.classList.add('active');

                        const targetId = this.getAttribute('href').substring(1);

                        const targetElement = document.getElementById(targetId);
                        if (targetElement) {
                            // Scroll the target element into view within the tabs container
                            targetElement.scrollIntoView({
                                behavior: 'smooth',
                                block: 'nearest'
                            });
                        }
                    });
                });
            });
        </script> --}}

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const tabLinks = document.querySelectorAll('.tablink_main .tablinks');
                const sections = document.querySelectorAll('.filter_tab-content_height section');
                const container = document.querySelector('.filter_tab-content_height');

                function updateActiveTabLink() {
                    sections.forEach(section => {
                        const rect = section.getBoundingClientRect();
                        const viewportHeight = window.innerHeight;
                        const scrollPosition = container.scrollTop + viewportHeight / 2;
                        if (rect.top <= scrollPosition && rect.bottom >= scrollPosition) {
                            const sectionId = section.id;
                            const correspondingTabLink = document.querySelector(
                                `.tablink_main .tablinks[href="#${sectionId}"]`);
                            if (correspondingTabLink) {
                                tabLinks.forEach(tablink => tablink.classList.remove('active'));
                                correspondingTabLink.classList.add('active');
                            }
                        }
                    });
                }

                tabLinks.forEach(link => {
                    link.addEventListener('click', function(e) {
                        e.preventDefault();

                        tabLinks.forEach(tablink => tablink.classList.remove('active'));
                        this.classList.add('active');

                        const targetId = this.getAttribute('href').substring(1);
                        const targetElement = document.getElementById(targetId);
                        if (targetElement) {
                            targetElement.scrollIntoView({
                                behavior: 'smooth',
                                block: 'nearest'
                            });
                        }
                    });
                });

                let debounceTimeout;
                container.addEventListener('scroll', function() {
                    clearTimeout(debounceTimeout);
                    debounceTimeout = setTimeout(updateActiveTabLink, 100);
                });

                // Call updateActiveTabLink on page load
                updateActiveTabLink();
            });
        </script>
        {{-- modal-open-header-z-index --}}
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var modal = document.getElementById("myModal");
                var btn = document.getElementById("openModalBtn");
                var closeBtn = document.getElementById("closemodalbtn");
                var header = document.querySelector("header");
                btn.onclick = function() {
                    modal.style.display = "block";
                    header.style.zIndex = 3;
                };

                closeBtn.onclick = function() {
                    modal.style.display = "none";
                    header.style.zIndex = 4;
                };

                window.onclick = function(event) {
                    if (event.target == modal) {
                        modal.style.display = "none";
                        header.style.zIndex = 4;
                    }
                };
            });
        </script>

        <script>
            function openMyModal2() {
                let myModal = new
                bootstrap.Modal(document.getElementById('property_lead_sure'), {});
                myModal.show();
            }
            var propertyAdvanceSearchSave = "{{ route(routeNamePrefix() . 'properties.advance_search.save') }}";
            $(document).on('click', '.saveSearchBtn', function(e) {
                e.preventDefault();
                $btnName = $(this).text();
                $(this).prop('disabled', true);
                $(this).html('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> ' +
                    $btnName);
                const that = this;

                var formData = new FormData($('#filterForm')[0]);
                formData.append('search_name', $('input[name=search_name]').val());
                formData.append('total_search_result_count', $('input[name=total_properties_count]').val());
                const attributes = {
                    hasButton: true,
                    btnSelector: '.saveSearchBtn',
                    btnText: $btnName,
                    handleSuccess: function() {
                        localStorage.setItem('flashMessage', datas['msg']);

                        window.location.href = datas['data'];
                    },
                    handleErrorMessages: function() {
                        $.each(datas["errors"], function(index, html) {

                            if (index == "search_name") {
                                $("input[name = " + index + "]").addClass('is-invalid');
                                $("input[name = " + index + "]").parent().next('.invalid-feedback')
                                    .addClass('error');
                                $("input[name = " + index + "]").parent().next('.invalid-feedback')
                                    .html(html);
                                $("input[name = " + index + "]").parent().next('.invalid-feedback')
                                    .show();
                                $("input[name = " + index + "]").show();

                            }
                        });

                    },
                };
                const ajaxOptions = {
                    url: propertyAdvanceSearchSave,
                    method: 'post',
                    data: formData
                };

                makeAjaxRequest(ajaxOptions, attributes);

            });
        </script>
        <script>
            $(document).ready(function() {
                let currentYear = new Date().getFullYear();
                let earliestYear = 2020;

                let options = '';
                while (currentYear >= earliestYear) {
                    options += `<option value="${currentYear}">${currentYear}</option>`;
                    currentYear -= 1;
                }

                $('.completion_year').each(function() {
                    $(this).append(options);
                });

                let months = '';
                for (let month = 1; month <= 12; month++) {
                    // Add leading zero for single-digit months
                    let monthStr = month < 10 ? `0${month}` : month;
                    months += `<option value="${monthStr}">${month}</option>`;
                }

                $('.completion_month').each(function() {
                    $(this).append(months);
                });

                $('#completed_construction').on('change', function() {
                    $('#under_construction_month_year').hide();
                    $('#completion_year').show();
                    $('.rent_type').show();
                    if ($(this).is(':checked')) {
                        $('#completion_year').show();
                        $("input[name='year_month']").val("");
                    } else {
                        console.log('hide');
                        $('#completion_year').hide();
                    }
                });

                $('#under_construction').on('change', function() {
                    $('#completion_year').hide();
                    $('.rent_type').hide();
                    $('#under_construction_month_year').show();
                    if ($(this).is(':checked')) {
                        $('#under_construction_month_year').show();
                        $("input[name='year']").val("");
                    } else {
                        $('#under_construction_month_year').hide();
                    }
                });

                $('input[name=rent_type]').on('change', function() {
                    if ($(this).is(':checked') && $(this).val() == 'long_term') {
                        $('.shortTermPriceDiv').hide();
                        $('.longTermPriceDiv').show();
                    } else {
                        $('.shortTermPriceDiv').show();
                        $('.longTermPriceDiv').hide();
                    }

                });


            });
        </script>


        @if (!empty($searchData['type_id']))
            <script>
                $(document).ready(function() {

                    setTimeout(() => {
                        $("#type_id").change();
                    }, 1000);
                });
            </script>
        @endif
        <script>
            var agentInquireyRoute = "{{ route(routeNamePrefix() . 'properties.storeInquirey') }}";
        </script>
        <script>
            $(document).ready(function() {
                $("#type_id").change(function() {
                    var typeId = $(this).val();
                    console.log(typeId)
                    if (typeId.length == 0) {
                        $("#subtype_id").empty().prop("disabled", true);
                        $(this).parents('.select_with_checkbox').find('.search_filter_group').hide();
                        return; // Exit early if no type is selected
                    }
                    $(this).parents('.select_with_checkbox').find('.search_filter_group').show();
                    typeId = typeId.join(',');
                    var subtypeSelectedTypeId =
                        "{{ route(routeNamePrefix() . 'properties.subtype', ':typeId') }}";
                    var subtypeUrl = subtypeSelectedTypeId.replace(":typeId", typeId);
                    var subTypeId = "<?php echo !empty($searchData['subtype_id']) ? json_encode($searchData['subtype_id']) : '[]'; ?>";
                    var selectedSubtypeId = (subTypeId.length > 0) ? subTypeId : $("#subtype_id").val();

                    $.ajax({
                        url: subtypeUrl,
                        type: "GET",
                        success: function(response) {
                            var subtypes = response;
                            $("#subtype_id").empty().prop("disabled", false);

                            $.each(subtypes, function(index, subtype) {
                                $("#subtype_id").append(
                                    '<option value="' +
                                    subtype.id +
                                    '">' +
                                    subtype.name +
                                    "</option>"
                                );

                            });
                            $("#subtype_id").val(selectedSubtypeId);

                        },
                        error: function(xhr, status, error) {
                            console.error("Failed to fetch subtypes");
                        },
                    });
                });
                $("#location,#listed_as,#subtype_id").change(function() {
                    var Value = $(this).val();

                    if (Value.length == 0) {
                        $(this).parents('.select_with_checkbox').find('.search_filter_group').hide();
                    } else {
                        $(this).parents('.select_with_checkbox').find('.search_filter_group').show();
                    }
                });
                $('#reference_id').keyup(function() {
                    var Value = $(this).val();
                    if (Value && Value.length > 0) {

                        $(this).parents('.Search_filter_height').find('.search_filter_group').show();
                    } else {
                        $(this).parents('.Search_filter_height').find('.search_filter_group').hide();
                    }
                });

                var slider = document.getElementById('price_range');
                slider.noUiSlider.on('update', function(values, handle) {
                    var minPrice = values[0];
                    var maxPrice = values[1];

                    $('.minPriceRangeVal').text(minPrice);
                    $('.maxPriceRangeVal').text(maxPrice);
                });


            });
            $('.subFeatureCheckbox').click(function() {
                $subFeatureId = $(this).data('id');
                if ($(this).prop('checked')) {

                    $subFeatureName = $(this).next().text();
                    $selectedFeatureHtml = '<div class="button_tab-flex subFeatureInFilterBox' + $subFeatureId +
                        '"><span>' + $subFeatureName + '</span><a class="removeSubFeatureBtnInFilterBox" data-id="' +
                        $subFeatureId + '"><span class="position-relative" style="top:-1px;">x</span></a></div>';
                    $('.filterFeaturesBox').append($selectedFeatureHtml);
                } else {

                    $('.filterFeaturesBox').find('.subFeatureInFilterBox' + $subFeatureId).remove();
                }
            });
            $(document).on('click', '.removeSubFeatureBtnInFilterBox', function() {

                $subFeatureId = $(this).data('id');
                $(this).parent().remove();
                $('#subFeature' + $subFeatureId).prop('checked', false);
            });
            $('.updateFeaturesBtn').click(function() {
                $selectedFeatureHtml = "";
                $('.filterFeaturesBox').find('.removeSubFeatureBtnInFilterBox').each(function(index, element) {

                    $selectedFeatureHtml += '<div class="button_tab-flex propertyAmenity' + $(element).data(
                            'id') + '"><span>' + $(element).prev().text() +
                        '</span><a class="removePropertyAmenity" data-id="' + $(element).data('id') +
                        '"><span class="position-relative" style="top:-1px;">x</span></a><input type="hidden" name="featureIds[]" value="' +
                        $(element)
                        .data('id') + '"></div>';
                });
                $('.propertyAmenitiesBox').html($selectedFeatureHtml);
                $('.filterFeaturesModalCloseBtn').trigger('click');

            });
            $(document).on('click', '.removePropertyAmenity', function() {
                $subFeatureId = $(this).data('id');
                $(this).parent().remove();
                $('.subFeatureInFilterBox' + $subFeatureId).remove();
                $('#subFeature' + $subFeatureId).prop('checked', false);
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

            $('.download_plan').on('click', function(e) {
                $('#property_id').val($(this).attr('property-id'));
                $('#property_reference_id').text($(this).attr('property_ref'));
            });
        </script>
    @endpush
@endsection
