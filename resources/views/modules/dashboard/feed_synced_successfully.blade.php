@extends('layouts.app')
@section('content')

@section('title')
    {{ trans('messages.properties.View_Property') }} Inmoconnect
@endsection
<div class="overlay" id="overlay"></div>
<div id="page-content-wrapper" class="min-vh-100 b-color-background">
    <div class="crm-main-content">

        {{-- breadcrumb  --}}
        <div class="empty-search-header">
            <div class="header-title d-flex align-items-center justify-content-between">
                {{-- property-left --}}
                <div class="header-left-breadcrumb d-flex align-items-center">
                    <div class="text-20 lineheight-24 color-primary d-inline-block breadcrumb-bottom font-weight-700 letter-s-36"
                        onclick="window.open('{{ route(routeNamePrefix() . 'user.company-details') }}','_self')">My
                        Company
                    </div>
                    <div class="small-breadcrum text-20 lineheight-24 color-primary d-inline-block font-weight-400 letter-s-36 breadcrumb-top ps-4"
                        onclick="window.open('','_self')">XML Feed</div>
                </div>
                {{-- property-right --}}
                <div class="header-right-button_one d-flex align-items-center gap-3">
                </div>
            </div>
        </div>
        {{-- end-breadcrumb --}}
        {{-- @dd($progressbatchdata->deleted_records) --}}
        <div class="p-30 pb-0 box-shadow-one b-color-white border-r-8  propertyTableData gap-3">
            <div class="row d-flex flex-row justify-content-between">
                <div class="col-xl-10 col-lg-10 col-md-8">
                    <h5 class="color-primary text-20 font-weight-700 text-center">Feed Synced Successfully.</h5>

                    <p class="text-14 color-primary lineheight-18 font-weight-400 text-center pt-2">Last Synced at
                        {{ !empty($formattedDate) ? $formattedDate : '' }}</p>

                    @if (auth()->user()->role->name == 'developer')
                        <p class="text-14 color-primary lineheight-18 font-weight-400 text-center pt-2 color-red unlisted-properties-count"
                            data-count="{{ $progressbatchdata->inserted_records ?? 0 }}">You
                            have
                            {{ $progressbatchdata->inserted_records ?? '0' }} Unlisted Properties. Please assign their
                            development.</p>
                    @endif
                </div>
                {{-- @if (Auth::user()->role->name == "developer" )
                <div class="col-xl-2 xol-lg-2 col-md-4">
                    <button
                        class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white"
                        onclick="defaultAssign()">
                        <i class="icon-edit icon-20"></i><span class="ms-2 d_none_mob text-14"><strong>Assign
                                Property</strong></span>
                    </button>
                </div>
                @endif --}}
            </div>
            <div class="xml_feed mt-3">
                <div class="flex align-items-center gap-1">
                    <div class="d-block p-20">
                        <ul class="xml_list">
                            <li class="pt-0">All <span
                                    class="font-weight-700">{{ !empty($progressbatchdata->total_records) ? $progressbatchdata->total_records : '' }}</span>
                                records from <a href="#"
                                    class="font-weight-700">{{ !empty($progressbatchdata->url) ? $progressbatchdata->url : '' }}
                                </a> were
                                successfully processed.</li>
                            <li>Inmoconnect All Import updated <span
                                    class="font-weight-700">{{ !empty($progressbatchdata->updated_records) ? $progressbatchdata->updated_records : 0 }}</span>
                                records, and
                                deleted <span
                                    class="font-weight-700">{{ $progressbatchdata->deleted_records ?? 0 }}</span>
                                records.</li>
                        </ul>

                    </div>

                </div>

            </div>

            <p class="toggle_xml mt-30">

            </p>

        </div>

        {{-- @push('scripts')
            <script>
                var developmentAssignrouteurl = "{{ route(routeNamePrefix() . 'developer.assigndevelopment') }}";
            </script>
            
            @if (Auth::user()->role->name == "developer" && ($progressbatchdata->inserted_records ?? 0) > 0)
            <script>
                $(document).ready(function() {
                    defaultAssign();
                });

                function defaultAssign(unlistedcount) {
                    var unlistedcount = $('.unlisted-properties-count').data('count');

                    show_message3("XML Feed Processed Successfully. Please Check And Assign Their Respective Development.",
                        "confirm", {
                            confirmMessage: "Assign Development",
                            confirmBtnText: "Assign",
                            confirmSecondaryMessage: unlistedcount + " New Properties",
                            callback: function() {
                                window.location.href = developmentAssignrouteurl;
                            },
                        });
                }
            </script>
            @endif
        @endpush --}}
    @endsection