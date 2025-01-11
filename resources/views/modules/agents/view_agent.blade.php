@extends('layouts.app')
@section('content')
    <div class="overlay" id="overlay"></div>
    <div class="main-content-crm b-color-background  min-vh-100" id="page-content-wrapper">
        <div class="crm-main-content">

            <x-forms.crm-breadcrumb :fieldData="[
                [
                    'url' => route(routeNamePrefix() . 'agents.index', !empty($value) ? $value : ''),
                    'label' => trans('Network Connection'),
                ],
                [
                    'url' => route(routeNamePrefix() . 'agents.index', !empty($value) ? $value : ''),
                    'label' => !empty($value)
                        ? trans('messages.sidebar.Developer_Agents')
                        : trans('messages.sidebar.My_Agents'),
                ],
                ['url' => '', 'label' => $checkIfValidUser->name ?? ''],
            ]" :additionalData="[
                'hasAddButton' => auth()->user()->role->name == 'admin' || auth()->user()->role->name == 'superadmin',
                'addButtonClass' => ' icon-icon_home',
                'url' =>
                    requestSegment(1) == 'agents'
                        ? (!empty($checkIfValidUser->id)
                            ? route(routeNamePrefix() . 'agents.userPropertiesCreate', $checkIfValidUser->id)
                            : route(routeNamePrefix() . 'properties.create'))
                        : (requestSegment(1) == 'users'
                            ? (!empty($checkIfValidUser->id)
                                ? route(routeNamePrefix() . 'user.userPropertiesCreate', $checkIfValidUser->id)
                                : route(routeNamePrefix() . 'properties.create'))
                            : route(routeNamePrefix() . 'properties.create')),
            ]" />
            <div class="row ">
                @include('components.tables.custom-table', [
                    'results' => $agentData,
                    'listingType' => !empty($value) ? 'developer-listing' : 'agent-listing',
                ])
            </div>
            <x-views.layouts.main-card.sub-components.card-heading :fieldData="[
                'class' => 'pb-3',
                'name' =>
                    ($checkIfValidUser->name ?? '') .
                    (isset($checkIfValidUser) && $checkIfValidUser->name ? ' ' : '') .
                    '\'s ' .
                    (isset($checkIfValidUser) && $checkIfValidUser->role->name=='developer'
                        ? trans('messages.view_agent.breadcrumb.Developers')
                        : trans('messages.view_agent.breadcrumb.Properties')),
            ]" />

            <div class="row propertyListingData tableData">
                @include('components.tables.custom-table', [
                    'results' => $propertyData,
                    'listingType' => !empty($value) ? 'developement-search' : 'property-search',
                    'listRouteUrl' => route(routeNamePrefix() . 'agents.viewAgent', $checkIfValidUser->id ?? ''),
                ])
            </div>
            <div class="paginationData">
                <!-- Custom Pagination File -->
                @include('components.tables.pagination', ['results' => $propertyData])
            </div>
            
        </div>
    </div>
    @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
    @endpush
    <script>
        var agentInquireyRoute = "{{ route(routeNamePrefix() . 'properties.storeInquirey') }}";
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
@endsection
