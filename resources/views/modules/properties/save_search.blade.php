@extends('layouts.app')
@section('content')
    @push('styles')

        {{-- title --}}
        @section('title')
            Saved Items Inmoconnect
        @endsection

        {{-- main-content --}}
        <div class="overlay" id="overlay"></div>
        <div id="page-content-wrapper" class="main-content-crm b-color-background min-vh-100" id="page-content-wrapper">
            <div class="crm-main-content">

                {{-- breadcrumb  --}}
                <div class="empty-search-header">
                    <div class="header-title d-flex align-items-center justify-content-between">
                        <div class="header-left-breadcrumb d-flex align-items-center">
                            <div class="text-20 lineheight-24 color-primary d-inline-block breadcrumb-bottom font-weight-700">
                                Saved Items
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end-breadcrumb --}}


                <div class="d-flex justify-content-between saved_items_tabs flex-wrap gap-3">

                    {{-- tabs --}}
                    <ul class="tabs">
                        <li class="tab-link text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-black {{ (!empty(request()->tab) && request()->tab == 'search') || empty(request()->tab) ? 'current' : '' }}"
                            data-tab="tab-1">Saved Search </li>
                        <li class="tab-link text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-black {{ !empty(request()->tab) && request()->tab == 'properties' ? 'current' : '' }}"
                            data-tab="tab-2">Saved Properties</li>
                    </ul>
                    {{-- end-tabs --}}

                    {{-- sved-search --}}
                    <h5 class="text-16 opacity-7 font-weight-400 color-b-blue totalSavedSearchCount"
                        style="{{ (!empty(request()->tab) && request()->tab == 'search') || empty(request()->tab) ? 'display:block;' : 'display:none;' }}">
                        Number of Saved Search: <span
                            class="opacity-1 font-weight-700">{{ $data->count() }}/{{ config('Modules.properties.saved_search_limit') }}</span>
                    </h5>
                    {{-- saved-properties --}}
                    <h5 class="text-16 opacity-7 font-weight-400 color-b-blue totalSavedPropertiesCount"
                        style="{{ !empty(request()->tab) && request()->tab == 'properties' ? 'display:block;' : 'display:none;' }}">
                        Number of Saved Properties: <span
                            class="opacity-1 font-weight-700">{{ $savedPropertiesData->count() }}</span>
                    </h5>
                </div>

                {{-- Saved Search --}}
                <div id="tab-1"
                    class="tab-content_one {{ (!empty(request()->tab) && request()->tab == 'search') || empty(request()->tab) ? 'current' : '' }}">

                    {{-- card --}}
                    @php
                        $count = 0;
                    @endphp
                    @if ($data->isNotEmpty())
                        @foreach ($data as $item)
                            @php
                                $searchName = json_decode($item->search_data);
                            @endphp


                            <div class="b-color-white box-shadow-one border-r-8  p-20 mt-20">
                                <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
                                    {{--  name & date --}}
                                    <div class="left_side-tab">
                                        <h4 class="text-18 font-weight-700 pb-2">{{ $item->search_name }}</h4>
                                        <h5 class="text-16 font-weight-400">Saved on {{ $item->created_at->format('d/m/Y') }}
                                        </h5>
                                    </div>

                                    <div class="right_side-tab d-flex gap-12 flex-wrap">
                                        {{-- tooltip --}}
                                        @php
                                            if (
                                                isset($searchName->type_id) &&
                                                (is_array($searchName->type_id) ||
                                                    $searchName->type_id instanceof Countable)
                                            ) {
                                                $typeCount = count($searchName->type_id);
                                                $remainingCount = $typeCount > 2 ? $typeCount - 2 : 0;
                                            } else {
                                                $typeCount = 0;
                                                $remainingCount = 0;
                                            }
                                        @endphp
                                        @if ($remainingCount > 0)
                                            <div class="type_tooltip">
                                                <div class="tooltip tab-button-save">
                                                    +{{ $remainingCount }}
                                                    <span class="tooltiptext">
                                                        <ul>
                                                            @foreach ($searchName->type_id as $index => $type)
                                                                @if ($index >= 2)
                                                                    <li>
                                                                        {{ findSpecificRecordData(App\Models\Type::class, ['id' => $type], 'name') }}
                                                                    </li>
                                                                @endif
                                                            @endforeach
                                                        </ul>
                                                    </span>
                                                </div>
                                            </div>
                                        @endif


                                        {{-- property-type --}}
                                        @if (!empty($searchName->type_id))
                                            @php
                                                // Limit the displayed types to the first 2
                                                $limitedTypes = array_slice($searchName->type_id, 0, 2);
                                            @endphp

                                            @foreach ($limitedTypes as $type)
                                                <div class="tab-button-save text-16 font-weight-400 color-primary border-r-4">
                                                    {{ findSpecificRecordData(App\Models\Type::class, ['id' => $type], 'name') }}
                                                </div>
                                            @endforeach
                                        @endif


                                        {{-- house-icon & number --}}
                                        <div class="d-flex gap-12 align-items-center">
                                            <i class="icon-house_id text-24 color-b-blue"></i>
                                            <h5 class="text-16 font-weight-700 color-primary">
                                                {{ $item->total_search_result_count }}</h5>
                                        </div>

                                        {{-- bell notification & checkbox --}}
                                        <div class="d-flex gap-12 align-items-center saved_search_icon" id="savedSearchIcon">
                                            <i class="icon-bell icon-24 color-primary" id="bellIcon"></i>
                                            <div class="event-checkbox d-flex save_search-checkbox">
                                                <label class="switch">
                                                    <input type="checkbox" name="is_notificable" value="1"
                                                        class="form-control isNotifiableCheckbox"
                                                        data-id="{{ $item->id ?? '' }}"
                                                        {{ $item->is_notifiable == 1 ? 'checked' : '' }} id="searchCheckbox">
                                                    <span class="slider">

                                                    </span>
                                                </label>
                                            </div>
                                        </div>


                                        {{-- search-button --}}
                                        <a
                                            href="{{ route(routeNamePrefix() . 'properties.advance_search.index', $item->id) }}"><i
                                                class="icon-Search  text-24  color-b-blue"></i>
                                        </a>

                                        {{-- delete-button --}}
                                        <a class="deleteSavedSearchBtn" data-id = "{{ $item->id ?? '' }}"
                                            data-name = "{{ $item->search_name ?? '' }}"><i
                                                class="icon-Delete  text-24  color-b-blue"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        {{-- no-result-found --}}
                        <div class="b-color-white box-shadow-one border-r-8  p-20 mt-20">
                            <div class="d-block justify-content-between align-items-center text-center flex-wrap gap-2">
                                <h6 class="p-10">No results found</h6>
                            </div>
                        </div>
                    @endif
                </div>

                {{-- Saved Properties --}}
                <div id="tab-2"
                    class="tab-content_one py-10 {{ !empty(request()->tab) && request()->tab == 'properties' ? 'current' : '' }}">
                    @include('components.tables.custom-table', [
                        'results' => $savedPropertiesData,
                        'listingType' => $listingType,
                    ])

                </div>
            </div>
        </div>

        @push('scripts')

            <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
            <script src="{{ asset('assets/js/modules/dashboard/agent-profile.js') }}"></script>
            <script>
                var latVal = "{{ $property->latitude ?? '' }}";
                var lngVal = "{{ $property->longitude ?? '' }}";
                var isHidden = "{{ !empty($isHidden) ? 'yes' : 'no' }}";
                var savedSearchDeleteUrl = "{{ route(routeNamePrefix() . 'properties.deleteSavedSearch', ':id') }}";
                var savedSearchDeleteConfirmText = "{{ trans('You Are Attempting To Remove Save Search') }}";
                var areYouSureTextConfirmPopup = "{{ trans('messages.confirm_popup.Are_you_sure') }}";
                var removeTextConfirmPopup = "{{ trans('messages.confirm_popup.Remove') }}";
                var isNotificableUpdateUrl = "{{ route(routeNamePrefix() . 'properties.isNotificableUpdate', ':id') }}";
            </script>
            <script src="{{ asset('assets/js/modules/properties/save_search.js') }}"></script>



        @endpush
    @endsection
