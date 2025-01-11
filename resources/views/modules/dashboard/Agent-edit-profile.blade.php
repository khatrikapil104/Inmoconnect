@extends('layouts.app')
@section('content')
@section('title')
    {{ trans('messages.dashboard.Edit_Profile') }} Inmoconnect
@endsection

<div class="overlay" id="overlay"></div>
<div id="page-content-wrapper" class="main-content-crm b-color-background min-vh-100" id="page-content-wrapper">
    <div class="crm-main-content">

        <!-- //breadcrumb///// -->
        <x-forms.crm-breadcrumb :fieldData="[
            [
                'url' => route(routeNamePrefix() . 'user.profile'),
                'label' => trans('messages.dashboard.Profile'),
            ],
            {{-- [
                'url' => '',
                'label' => trans('messages.dashboard.Edit_Profile'),
            ], --}}
        ]" />

        <div class="b-color-white box-shadow-one border-r-8 p-3">
            <div class="border-r-12 b-color-white edit_profiile-tab_one pt-0">
                <div class="row row-border row-border_light-ten">
                    <div class="col-lg-12 px-0 ">
                        <div
                            class="text-18 font-weight-700 lineheight-22 text-capitalize color-primary pb-2 agent-information_border d-flex justify-content-between align-items-center">
                            Personal Information:
                            <button
                                class="edit_profile_agent border-r-8  d-flex justify-content-center align-items-center px-3"
                                data-bs-toggle="modal" data-bs-target="#dataFilterModal"
                                onclick="window.location.href='{{ route(routeNamePrefix() . 'user.profile') }}';">
                                <i class="icon-edit icon-20"></i><span class="ms-2 d_none_mob text-14"><strong>Edit
                                        Profile</strong></span>
                            </button>
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
                        @if (auth()->user()->role->name != 'customer')
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
                                        <span class="text-14 color-b-blue font-weight-400 lineheight-18 text-center">
                                            N/A
                                        </span>
                                    @endif

                                </div>
                            </div>
                            {{-- <div class="col-lg-4 col-md-6 col-sm-6 pt-30"> --}}
                            {{-- <div class="presonal_information_s_card">
                                <div class="text-14 color-primary font-weight-700 lineheight-18">
                                    Field of Study/Major:</div>
                                <div class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                    {{ $user->field_of_study ?? 'N/A' }}
                                </div>
                            </div> --}}
                            {{-- </div> --}}
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
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-lg-4 pt-30">
                            <div class="presonal_information_s_card">
                                <div class="text-14 color-primary font-weight-700 lineheight-18">
                                    Address:</div>
                                <div class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                    {{-- {{ $user->address , $user->city , $user->state , $user->country , $user->zipcode }}</div> --}}
                                    {{ $userAddress }}</div>
                            </div>
                        </div>
                        {{-- @if (auth()->user()->role->name == 'customer')
                            <div class="col-lg-4 pt-30">
                                <div class="presonal_information_s_card">
                                    <div class="text-14 color-primary font-weight-700 lineheight-18">
                                        City:</div>
                                    <div class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                        {{ $user->city ?? 'N/A' }}</div>
                                </div>
                            </div>
                            <div class="col-lg-4 pt-30">
                                <div class="presonal_information_s_card">
                                    <div class="text-14 color-primary font-weight-700 lineheight-18">
                                        State:</div>
                                    <div class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                        {{ $user->state ?? 'N/A' }}</div>
                                </div>
                            </div>
                            <div class="col-lg-4 pt-30">
                                <div class="presonal_information_s_card">
                                    <div class="text-14 color-primary font-weight-700 lineheight-18">
                                        Country:</div>
                                    <div class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                        {{ $user->country ?? 'N/A' }}</div>
                                </div>
                            </div>
                            <div class="col-lg-4 pt-30">
                                <div class="presonal_information_s_card">
                                    <div class="text-14 color-primary font-weight-700 lineheight-18">
                                        Zipcode:</div>
                                    <div class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                        {{ $user->zipcode ?? 'N/A' }}</div>
                                </div>
                            </div>
                        @endif --}}
                    </div>
                    @if (auth()->user()->role->name != 'customer')
                        <div class="row">
                            <div class="col-lg-12 pt-30">
                                <div class="presonal_information_s_card">
                                    <div class="text-14 color-primary font-weight-700 lineheight-18">
                                        A Message To Collaborate Agents :
                                    </div>
                                    <div class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                        {!! $user->msg_to_collaborator_agents ?? 'N/A' !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        {{-- property preference for customer only --}}
        @if (auth()->user()->role->name == 'customer')
            <div class="b-color-white box-shadow-one border-r-8 p-3 mt-20">
                <div class="border-r-12 b-color-white edit_profiile-tab_one pt-0 mt-10">
                    <div class="row row-border row-border_light-ten ">
                        <div class="col-lg-12 px-0 ">
                            <div
                                class="text-18 font-weight-700 lineheight-22 text-capitalize color-primary pb-2 agent-information_border d-flex justify-content-between align-items-center">
                                Property Preference:
                            </div>
                        </div>
                    </div>

                    <div class="main-card_profile">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-sm-6 pt-30">
                                <div class="presonal_information_s_card">
                                    <div class="text-14 color-primary font-weight-700 lineheight-18">
                                        Type:</div>
                                    <div class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                        {{ !empty($preferencetypeArr) ? $preferencetypeArr : 'N/A' }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 pt-30">
                                <div class="presonal_information_s_card">
                                    <div class="text-14 color-primary font-weight-700 lineheight-18">
                                        Situation:</div>
                                    <div class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                        {{ !empty($situationsArr) ? $situationsArr : 'N/A' }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 pt-30">
                                <div class="presonal_information_s_card">
                                    <div class="text-14 color-primary font-weight-700 lineheight-18">
                                        Features:</div>
                                    <div class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                        {{ !empty($user->featureNames) ? $user->featureNames : 'N/A' }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-sm-6 pt-30">
                                <div class="presonal_information_s_card">
                                    <div class="text-14 color-primary font-weight-700 lineheight-18">
                                        Preferred Location:</div>
                                    <div class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                        {{ !empty($userPropertyPreference->preferred_location) ? $userPropertyPreference->preferred_location : 'N/A' }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 pt-30">
                                <div class="presonal_information_s_card">
                                    <div class="text-14 color-primary font-weight-700 lineheight-18">
                                        Sq m:</div>
                                    <div class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                        {{ $userPropertyPreference->min_size }} -
                                        {{ $userPropertyPreference->max_size }} m²</div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 pt-30">
                                <div class="presonal_information_s_card">
                                    <div class="text-14 color-primary font-weight-700 lineheight-18">
                                        Budget Range:</div>
                                    <div class="text-14 color-b-blue font-weight-400 lineheight-18 pt-2">
                                        {{config('Reading.default_currency') . $userPropertyPreference->min_price }} -
                                        {{ $userPropertyPreference->max_price }}</div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        @endif

        @push('scripts')
            <script>
                var routeUrlTab1 = "{{ route(routeNamePrefix() . 'user.profileTab1') }}";
                var routeUrlTab2 = "{{ route(routeNamePrefix() . 'user.profileTab2') }}";
                var addCertificateUrl = "{{ route(routeNamePrefix() . 'user.uploadCertificates') }}";
                var removeCertificateUrl = "{{ route(routeNamePrefix() . 'user.removeCertificate', ':id') }}";
                var addGovCertificateUrl = "{{ route(routeNamePrefix() . 'user.uploadGovtCertificates') }}";
                var downloadGovCertificateUrl = "{{ route(routeNamePrefix() . 'user.downloadGovCertificate', ':id') }}";
            </script>
            <script src="{{ asset('assets/js/modules/dashboard/agent-profile.js') }}"></script>
            <script>
                function temp() {
                    $('#tab-1').removeClass('d-none');
                    $('.edit_profiile-tab_one').addClass('d-none');
                }
            </script>
        @endpush
    @endsection
