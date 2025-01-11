@extends('layouts.app')
@section('content')
@section('title')
    View Team Management Inmoconnect
@endsection

@php
    $totalActiveTeamMembers = $teamMembersCount;
@endphp
<div class="overlay" id="overlay"></div>
<div class="main-content-crm b-color-background min-vh-100" id="page-content-wrapper">
    <div class="crm-main-content">
        <div class="empty-search-header">
            <div class="header-title d-flex align-items-center justify-content-between">
                <div class="header-left-breadcrumb d-flex align-items-center">
                    <a>
                        <h3 class="text-20 lineheight-24 color-primary d-inline-block breadcrumb-bottom font-weight-700 letter-s-36"
                            onclick="window.open('{{ route(routeNamePrefix() . 'team_management.index') }}','_self')">
                            Team Management</h3>
                    </a>

                    <h3 class="small-breadcrum text-20 lineheight-24 color-primary d-inline-block font-weight-400 letter-s-36 breadcrumb-top ps-4"
                        onclick="window.open('','_self')">View Profile</h3>



                </div>

                {{-- <div class="header-left-team d-flex gap-3">
                    <button class="button_green_team green_button_account">Total Active Accounts <span
                            class="button_green-span green_border-team">{{$totalActiveTeamMembers}}</span></button>
                    <button class="button_green_team pink_button_account">Remaining Accounts <span
                            class="button_green-span pink_border-team">{{$activeMembersLimit - $totalActiveTeamMembers}}</span></button>
                    
                </div> --}}
            </div>

        </div>

        {{-- Personal Information --}}
        <div class="b-color-white box-shadow-one border-r-8  edit_profiile-tab_one">
            <div class="border-r-12 b-color-white ">
                <div class="row row-border row-border_light-ten">
                    <div class="col-lg-12 px-0">
                        <div
                            class="text-18 font-weight-700 lineheight-22 text-capitalize color-primary pb-3 agent-information_border">
                            Personal Information:
                        </div>
                    </div>
                </div>
                <div class="main-card_profile">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="pt-3 d-flex align-items-center">
                                <div class="personal_information_img">
                                    <img src="{{ !empty($user->image) ? $user->image : asset('img/default-user.jpg') }}"
                                        alt="image" class="border-r-20" width="80" height="80">
                                </div>
                                <div class="presonal_information_s_card ms-3">
                                    <div class="text-18 color-primary font-weight-700 lineheight-22 text-capitalize">
                                        {{ $user->name ?? 'N/A' }}</div>
                                    <div class="text-14 color-b-blue font-weight-400 lineheight-18 pt-1">
                                        {{ str_replace(' ', '-', ucwords(str_replace('-', ' ', $user->role->name))) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-6 pt-30">
                            <div class="presonal_information_s_card">
                                <div class="text-14 color-primary font-weight-700 lineheight-18">
                                    Email:</div>
                                <div class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                    {{ $user->email ?? 'N/A' }}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 pt-30">
                            <div class="presonal_information_s_card">
                                <div class="text-14 color-primary font-weight-700 lineheight-18">
                                    Mobile Number:</div>
                                <div class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                    {{ $user->phone ?? 'N/A' }}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 pt-30">
                            <div class="presonal_information_s_card">
                                <div class="text-14 color-primary font-weight-700 lineheight-18">
                                    Date of Birth:</div>
                                <div class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                    {{ $user->date_of_birth ?? 'N/A' }}</div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 pt-30">
                            <div class="presonal_information_s_card">
                                <div class="text-14 color-primary font-weight-700 lineheight-18">
                                    Gender:</div>
                                <div class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                    {{ $user->gender ?? 'N/A' }}</div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 pt-30">
                            <div class="presonal_information_s_card">
                                <div class="text-14 color-primary font-weight-700 lineheight-18">
                                    Languages Spoken:</div>
                                <div class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                    {{ $user->languages_spoken ?? 'N/A' }}</div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 pt-30">
                            <div class="presonal_information_s_card">
                                <div class="text-14 color-primary font-weight-700 lineheight-18">
                                    Qualification Type:</div>
                                <div class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                    {{ $user->qualification_type ?? 'N/A' }}</div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 pt-30">
                            <div class="presonal_information_s_card">
                                <div class="text-14 color-primary font-weight-700 lineheight-18">
                                    Professional Certifications:</div>
                                @if ($certificateData->isNotEmpty())
                                    <span class="text-14 color-b-blue font-weight-400 lineheight-18">
                                        @foreach ($certificateData as $certificate)
                                            @if ($certificate->type == 'document')
                                                <span class="me-3"
                                                    onclick="window.open('{{ $certificate->certificate ?? '' }}','_blank')"
                                                    data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                    title="{{ $certificate->original_name ?? '' }}">
                                                    <img src= "{{ asset('img/certificate.svg') }}" />
                                                </span>
                                            @else
                                                <span
                                                    onclick="window.open('{{ $certificate->certificate ?? '' }}','_blank')"
                                                    data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                    title="{{ $certificate->original_name ?? '' }}">
                                                    <i
                                                        class="text-20 color-b-blue font-weight-400 lineheight-18 icon-certificate_2 downloadGovtCertificateBtn"></i>
                                                </span>
                                            @endif
                                        @endforeach


                                    </span>
                                @else
                                    <span class="text-14 color-b-blue font-weight-400 lineheight-18 text-center"> N/A
                                    </span>
                                @endif

                            </div>
                        </div>
                        {{-- <div class="col-lg-4 col-md-6 col-sm-6 pt-30">
                            <div class="presonal_information_s_card">
                                <div class="text-14 color-primary font-weight-700 lineheight-18">
                                    Field of Study/Major:</div>
                                <div class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                    {{ $user->field_of_study ?? 'N/A' }}
                                </div>
                            </div>
                        </div> --}}
                        <div class="col-lg-4 col-md-6 col-sm-6 pt-30">
                            <div class="presonal_information_s_card">
                                <div class="text-14 color-primary font-weight-700 lineheight-18">
                                    Government ID:</div>
                                <div class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                    @if (!empty($user->government_certification))
                                    <span class="downloadGovtCertificateBtn" data-id={{ $user->id }}>
                                        <img src= "{{ asset('img/certificate.svg') }}" />
                                    </span>
                                    @else
                                    
                                    <span> N/A
                                </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 pt-30">
                            <div class="presonal_information_s_card">
                                <div class="text-14 color-primary font-weight-700 lineheight-18">
                                    Address:</div>
                                <div class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                    {{ $user->address ?? 'N/A' }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- company-information --}}
        <div class="b-color-white box-shadow-one border-r-8  edit_profiile-tab_one mt-20">
            <div class="border-r-12 b-color-white">
                <div class="row row-border row-border_light-ten">
                    <div class="col-lg-12 px-0">
                        <div
                            class="text-18 font-weight-700 lineheight-22 text-capitalize color-primary pb-3 agent-information_border ">
                            Company Information:
                        </div>
                    </div>
                </div>
                <div class="main-card_profile">
                    @include('modules.dashboard.includes.user_company_details_data')

                </div>
            </div>
        </div>

    </div>
</div>

<script>
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
        var downloadGovCertificateUrl =
        "{{ route(routeNamePrefix() . 'user.downloadGovCertificate', ':id') }}";
        let url = downloadGovCertificateUrl.replace(':id', govCertificateUserId);
        const ajaxOptions = {
            url: url,
            method: 'get'
        };
        makeAjaxRequest(ajaxOptions, attributes);
    });
</script>

@endsection
