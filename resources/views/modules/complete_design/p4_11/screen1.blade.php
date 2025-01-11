@extends('layouts.app')
@section('content')
    @push('styles')

        @section('title')
            {{ trans('messages.dashboard.Edit_Profile') }} Inmoconnect
        @endsection

        <div class="overlay" id="overlay"></div>
        <div id="page-content-wrapper" class="main-content-crm b-color-background min-vh-100" id="page-content-wrapper">
            <div class="crm-main-content">

                {{-- breadcrumb  --}}
                <div class="empty-search-header">
                    <div class="header-title d-flex align-items-center justify-content-between">
                        <div class="header-left-breadcrumb d-flex align-items-center">
                            <div class="text-20 lineheight-24 color-primary d-inline-block breadcrumb-bottom font-weight-700">
                                Property Search
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end-breadcrumb --}}

                <div class="b-color-white box-shadow-one border-r-8  p-30">
                    <!-- /////tabs///////// -->
                    <ul class="tabs">
                        <li class="tab-link current text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-black"
                            data-tab="tab-1">Apartment </li>
                        <li class="tab-link text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-black"
                            data-tab="tab-2">House</li>
                        <li class="tab-link text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-black"
                            data-tab="tab-3">Plot</li>
                        <li class="tab-link text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-black"
                            data-tab="tab-4">Commercial</li>
                        <li class="tab-link text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-black"
                            data-tab="tab-5">Countryhouse</li>
                        <li class="tab-link text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-black"
                            data-tab="tab-6">Duplex</li>
                        <li class="tab-link text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-black"
                            data-tab="tab-7">Penthouse</li>
                        <li class="tab-link text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-black"
                            data-tab="tab-8">Townhouse</li>
                        <li class="tab-link text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-black"
                            data-tab="tab-9">Villas</li>
                            <li class="tab-link text-18 font-weight-700 text-capitalize lineheight-22 letter-s-36 color-black"
                            data-tab="tab-10">New Developments</li>
                    </ul>

                    {{-- Apartment --}}
                    <div id="tab-1" class="tab-content_one current">
                        <div class="row">
                            <div class="col-lg-6">

                                {{-- State/Province --}}
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css pt-3">
                                    <x-forms.crm-single-select :fieldData="[
                                        'name' => 'subtype_id',
                                        'hasLabel' => true,
                                        'label' => 'State/Province:',
                                        'id' => 'subtype_one',
                                        'options' => [],
                                        'attributes' => [],
                                        'hasHelpText' => false,
                                        'placeholder' => 'State',
                                        'isRequired' => true,
                                        'minimumResultsForSearch' => 0,
                                        'selected' => $property->subtype_id ?? '',
                                    ]" />
                                </div>

                                {{-- City --}}
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css pt-3">
                                    <x-forms.crm-text-field :fieldData="[
                                        'name' => 'reference',
                                        'hasLabel' => true,
                                        'label' => 'City:',
                                        'id' => 'city',
                                        'attributes' => [],
                                        'hasHelpText' => false,
                                        //'help' => 'Please enter your name',
                                        'placeholder' => 'Valencia',
                                        'isRequired' => true,
                                        'value' => $property->reference ?? '',
                                    ]" />
                                </div>

                                {{-- Locality --}}
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css pt-3">
                                    <x-forms.crm-text-field :fieldData="[
                                        'name' => 'reference',
                                        'hasLabel' => true,
                                        'label' => 'Locality:',
                                        'id' => 'Locality',
                                        'attributes' => [],
                                        'hasHelpText' => false,
                                        //'help' => 'Please enter your name',
                                        'isRequired' => true,
                                        'placeholder' => 'Valencia',
                                        'value' => $property->reference ?? '',
                                    ]" />
                                </div>

                                {{-- Search-button --}}
                                <div
                                    class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css d-flex justify-content-start  pt-30 mb-30">
                                    <div class="form-group position-relative">
                                        <button type="button"
                                            class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white ">Search</button>
                                    </div>
                                </div>
                            </div>

                            {{-- image --}}
                            <div class="col-lg-6">
                                <div class="image_property-tab">
                                    <img src="{{ asset('img/property-search-tab_one.svg') }}" alt="image">
                                </div>
                            </div>
                        </div>
                    </div>


                    {{-- House --}}
                    <div id="tab-2" class="tab-content_one">
                        <div class="row">
                            <div class="col-lg-6">

                                {{-- State/Province --}}
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css pt-3">
                                    <x-forms.crm-single-select :fieldData="[
                                        'name' => 'subtype_id',
                                        'hasLabel' => true,
                                        'label' => 'State/Province:',
                                        'id' => 'subtype_two',
                                        'options' => [],
                                        'attributes' => [],
                                        'hasHelpText' => false,
                                        'placeholder' => 'State',
                                        'isRequired' => true,
                                        'minimumResultsForSearch' => 0,
                                        'selected' => $property->subtype_id ?? '',
                                    ]" />
                                </div>

                                {{-- City --}}
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css pt-3">
                                    <x-forms.crm-text-field :fieldData="[
                                        'name' => 'reference',
                                        'hasLabel' => true,
                                        'label' => 'City:',
                                        'id' => 'city',
                                        'attributes' => [],
                                        'hasHelpText' => false,
                                        //'help' => 'Please enter your name',
                                        'placeholder' => 'Valencia',
                                        'isRequired' => true,
                                        'value' => $property->reference ?? '',
                                    ]" />
                                </div>

                                {{-- Locality --}}
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css pt-3">
                                    <x-forms.crm-text-field :fieldData="[
                                        'name' => 'reference',
                                        'hasLabel' => true,
                                        'label' => 'Locality:',
                                        'id' => 'Locality',
                                        'attributes' => [],
                                        'hasHelpText' => false,
                                        //'help' => 'Please enter your name',
                                        'isRequired' => true,
                                        'placeholder' => 'Valencia',
                                        'value' => $property->reference ?? '',
                                    ]" />
                                </div>

                                {{-- Search-button --}}
                                <div
                                    class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css d-flex justify-content-start  pt-30 mb-30">
                                    <div class="form-group position-relative">
                                        <button type="button"
                                            class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white ">Search</button>
                                    </div>
                                </div>
                            </div>

                            {{-- image --}}
                            <div class="col-lg-6">
                                <div class="image_property-tab">
                                    <img src="{{ asset('img/property-search-tab_one.svg') }}" alt="image">
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Plot --}}
                    <div id="tab-3" class="tab-content_one">
                        <div class="row">
                            <div class="col-lg-6">

                                {{-- State/Province --}}
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css pt-3">
                                    <x-forms.crm-single-select :fieldData="[
                                        'name' => 'subtype_id',
                                        'hasLabel' => true,
                                        'label' => 'State/Province:',
                                        'id' => 'subtype_three',
                                        'options' => [],
                                        'attributes' => [],
                                        'hasHelpText' => false,
                                        'placeholder' => 'State',
                                        'isRequired' => true,
                                        'minimumResultsForSearch' => 0,
                                        'selected' => $property->subtype_id ?? '',
                                    ]" />
                                </div>

                                {{-- City --}}
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css pt-3">
                                    <x-forms.crm-text-field :fieldData="[
                                        'name' => 'reference',
                                        'hasLabel' => true,
                                        'label' => 'City:',
                                        'id' => 'city',
                                        'attributes' => [],
                                        'hasHelpText' => false,
                                        //'help' => 'Please enter your name',
                                        'placeholder' => 'Valencia',
                                        'isRequired' => true,
                                        'value' => $property->reference ?? '',
                                    ]" />
                                </div>

                                {{-- Locality --}}
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css pt-3">
                                    <x-forms.crm-text-field :fieldData="[
                                        'name' => 'reference',
                                        'hasLabel' => true,
                                        'label' => 'Locality:',
                                        'id' => 'Locality',
                                        'attributes' => [],
                                        'hasHelpText' => false,
                                        //'help' => 'Please enter your name',
                                        'isRequired' => true,
                                        'placeholder' => 'Valencia',
                                        'value' => $property->reference ?? '',
                                    ]" />
                                </div>

                                {{-- Search-button --}}
                                <div
                                    class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css d-flex justify-content-start  pt-30 mb-30">
                                    <div class="form-group position-relative">
                                        <button type="button"
                                            class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white ">Search</button>
                                    </div>
                                </div>
                            </div>

                            {{-- image --}}
                            <div class="col-lg-6">
                                <div class="image_property-tab">
                                    <img src="{{ asset('img/property-search-tab_one.svg') }}" alt="image">
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Commercial --}}
                    <div id="tab-4" class="tab-content_one">
                        <div class="row">
                            <div class="col-lg-6">

                                {{-- State/Province --}}
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css pt-3">
                                    <x-forms.crm-single-select :fieldData="[
                                        'name' => 'subtype_id',
                                        'hasLabel' => true,
                                        'label' => 'State/Province:',
                                        'id' => 'subtype_four',
                                        'options' => [],
                                        'attributes' => [],
                                        'hasHelpText' => false,
                                        'placeholder' => 'State',
                                        'isRequired' => true,
                                        'minimumResultsForSearch' => 0,
                                        'selected' => $property->subtype_id ?? '',
                                    ]" />
                                </div>

                                {{-- City --}}
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css pt-3">
                                    <x-forms.crm-text-field :fieldData="[
                                        'name' => 'reference',
                                        'hasLabel' => true,
                                        'label' => 'City:',
                                        'id' => 'city',
                                        'attributes' => [],
                                        'hasHelpText' => false,
                                        //'help' => 'Please enter your name',
                                        'placeholder' => 'Valencia',
                                        'isRequired' => true,
                                        'value' => $property->reference ?? '',
                                    ]" />
                                </div>

                                {{-- Locality --}}
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css pt-3">
                                    <x-forms.crm-text-field :fieldData="[
                                        'name' => 'reference',
                                        'hasLabel' => true,
                                        'label' => 'Locality:',
                                        'id' => 'Locality',
                                        'attributes' => [],
                                        'hasHelpText' => false,
                                        //'help' => 'Please enter your name',
                                        'isRequired' => true,
                                        'placeholder' => 'Valencia',
                                        'value' => $property->reference ?? '',
                                    ]" />
                                </div>

                                {{-- Search-button --}}
                                <div
                                    class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css d-flex justify-content-start  pt-30 mb-30">
                                    <div class="form-group position-relative">
                                        <button type="button"
                                            class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white ">Search</button>
                                    </div>
                                </div>
                            </div>

                            {{-- image --}}
                            <div class="col-lg-6">
                                <div class="image_property-tab">
                                    <img src="{{ asset('img/property-search-tab_one.svg') }}" alt="image">
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Countryhouse --}}
                    <div id="tab-5" class="tab-content_one">
                        <div class="row">
                            <div class="col-lg-6">

                                {{-- State/Province --}}
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css pt-3">
                                    <x-forms.crm-single-select :fieldData="[
                                        'name' => 'subtype_id',
                                        'hasLabel' => true,
                                        'label' => 'State/Province:',
                                        'id' => 'subtype_five',
                                        'options' => [],
                                        'attributes' => [],
                                        'hasHelpText' => false,
                                        'placeholder' => 'State',
                                        'isRequired' => true,
                                        'minimumResultsForSearch' => 0,
                                        'selected' => $property->subtype_id ?? '',
                                    ]" />
                                </div>

                                {{-- City --}}
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css pt-3">
                                    <x-forms.crm-text-field :fieldData="[
                                        'name' => 'reference',
                                        'hasLabel' => true,
                                        'label' => 'City:',
                                        'id' => 'city',
                                        'attributes' => [],
                                        'hasHelpText' => false,
                                        //'help' => 'Please enter your name',
                                        'placeholder' => 'Valencia',
                                        'isRequired' => true,
                                        'value' => $property->reference ?? '',
                                    ]" />
                                </div>

                                {{-- Locality --}}
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css pt-3">
                                    <x-forms.crm-text-field :fieldData="[
                                        'name' => 'reference',
                                        'hasLabel' => true,
                                        'label' => 'Locality:',
                                        'id' => 'Locality',
                                        'attributes' => [],
                                        'hasHelpText' => false,
                                        //'help' => 'Please enter your name',
                                        'isRequired' => true,
                                        'placeholder' => 'Valencia',
                                        'value' => $property->reference ?? '',
                                    ]" />
                                </div>

                                {{-- Search-button --}}
                                <div
                                    class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css d-flex justify-content-start  pt-30 mb-30">
                                    <div class="form-group position-relative">
                                        <button type="button"
                                            class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white ">Search</button>
                                    </div>
                                </div>
                            </div>

                            {{-- image --}}
                            <div class="col-lg-6">
                                <div class="image_property-tab">
                                    <img src="{{ asset('img/property-search-tab_one.svg') }}" alt="image">
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Duplex --}}
                    <div id="tab-6" class="tab-content_one">
                        <div class="row">
                            <div class="col-lg-6">

                                {{-- State/Province --}}
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css pt-3">
                                    <x-forms.crm-single-select :fieldData="[
                                        'name' => 'subtype_id',
                                        'hasLabel' => true,
                                        'label' => 'State/Province:',
                                        'id' => 'subtype_six',
                                        'options' => [],
                                        'attributes' => [],
                                        'hasHelpText' => false,
                                        'placeholder' => 'State',
                                        'isRequired' => true,
                                        'minimumResultsForSearch' => 0,
                                        'selected' => $property->subtype_id ?? '',
                                    ]" />
                                </div>

                                {{-- City --}}
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css pt-3">
                                    <x-forms.crm-text-field :fieldData="[
                                        'name' => 'reference',
                                        'hasLabel' => true,
                                        'label' => 'City:',
                                        'id' => 'city',
                                        'attributes' => [],
                                        'hasHelpText' => false,
                                        //'help' => 'Please enter your name',
                                        'placeholder' => 'Valencia',
                                        'isRequired' => true,
                                        'value' => $property->reference ?? '',
                                    ]" />
                                </div>

                                {{-- Locality --}}
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css pt-3">
                                    <x-forms.crm-text-field :fieldData="[
                                        'name' => 'reference',
                                        'hasLabel' => true,
                                        'label' => 'Locality:',
                                        'id' => 'Locality',
                                        'attributes' => [],
                                        'hasHelpText' => false,
                                        //'help' => 'Please enter your name',
                                        'isRequired' => true,
                                        'placeholder' => 'Valencia',
                                        'value' => $property->reference ?? '',
                                    ]" />
                                </div>

                                {{-- Search-button --}}
                                <div
                                    class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css d-flex justify-content-start  pt-30 mb-30">
                                    <div class="form-group position-relative">
                                        <button type="button"
                                            class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white ">Search</button>
                                    </div>
                                </div>
                            </div>

                            {{-- image --}}
                            <div class="col-lg-6">
                                <div class="image_property-tab">
                                    <img src="{{ asset('img/property-search-tab_one.svg') }}" alt="image">
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Penthouse --}}
                    <div id="tab-7" class="tab-content_one">
                        <div class="row">
                            <div class="col-lg-6">

                                {{-- State/Province --}}
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css pt-3">
                                    <x-forms.crm-single-select :fieldData="[
                                        'name' => 'subtype_id',
                                        'hasLabel' => true,
                                        'label' => 'State/Province:',
                                        'id' => 'subtype_seven',
                                        'options' => [],
                                        'attributes' => [],
                                        'hasHelpText' => false,
                                        'placeholder' => 'State',
                                        'isRequired' => true,
                                        'minimumResultsForSearch' => 0,
                                        'selected' => $property->subtype_id ?? '',
                                    ]" />
                                </div>

                                {{-- City --}}
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css pt-3">
                                    <x-forms.crm-text-field :fieldData="[
                                        'name' => 'reference',
                                        'hasLabel' => true,
                                        'label' => 'City:',
                                        'id' => 'city',
                                        'attributes' => [],
                                        'hasHelpText' => false,
                                        //'help' => 'Please enter your name',
                                        'placeholder' => 'Valencia',
                                        'isRequired' => true,
                                        'value' => $property->reference ?? '',
                                    ]" />
                                </div>

                                {{-- Locality --}}
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css pt-3">
                                    <x-forms.crm-text-field :fieldData="[
                                        'name' => 'reference',
                                        'hasLabel' => true,
                                        'label' => 'Locality:',
                                        'id' => 'Locality',
                                        'attributes' => [],
                                        'hasHelpText' => false,
                                        //'help' => 'Please enter your name',
                                        'isRequired' => true,
                                        'placeholder' => 'Valencia',
                                        'value' => $property->reference ?? '',
                                    ]" />
                                </div>

                                {{-- Search-button --}}
                                <div
                                    class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css d-flex justify-content-start  pt-30 mb-30">
                                    <div class="form-group position-relative">
                                        <button type="button"
                                            class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white ">Search</button>
                                    </div>
                                </div>
                            </div>

                            {{-- image --}}
                            <div class="col-lg-6">
                                <div class="image_property-tab">
                                    <img src="{{ asset('img/property-search-tab_one.svg') }}" alt="image">
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Townhouse --}}
                    <div id="tab-8" class="tab-content_one">
                        <div class="row">
                            <div class="col-lg-6">

                                {{-- State/Province --}}
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css pt-3">
                                    <x-forms.crm-single-select :fieldData="[
                                        'name' => 'subtype_id',
                                        'hasLabel' => true,
                                        'label' => 'State/Province:',
                                        'id' => 'subtype_eight',
                                        'options' => [],
                                        'attributes' => [],
                                        'hasHelpText' => false,
                                        'placeholder' => 'State',
                                        'isRequired' => true,
                                        'minimumResultsForSearch' => 0,
                                        'selected' => $property->subtype_id ?? '',
                                    ]" />
                                </div>

                                {{-- City --}}
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css pt-3">
                                    <x-forms.crm-text-field :fieldData="[
                                        'name' => 'reference',
                                        'hasLabel' => true,
                                        'label' => 'City:',
                                        'id' => 'city',
                                        'attributes' => [],
                                        'hasHelpText' => false,
                                        //'help' => 'Please enter your name',
                                        'placeholder' => 'Valencia',
                                        'isRequired' => true,
                                        'value' => $property->reference ?? '',
                                    ]" />
                                </div>

                                {{-- Locality --}}
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css pt-3">
                                    <x-forms.crm-text-field :fieldData="[
                                        'name' => 'reference',
                                        'hasLabel' => true,
                                        'label' => 'Locality:',
                                        'id' => 'Locality',
                                        'attributes' => [],
                                        'hasHelpText' => false,
                                        //'help' => 'Please enter your name',
                                        'isRequired' => true,
                                        'placeholder' => 'Valencia',
                                        'value' => $property->reference ?? '',
                                    ]" />
                                </div>

                                {{-- Search-button --}}
                                <div
                                    class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css d-flex justify-content-start  pt-30 mb-30">
                                    <div class="form-group position-relative">
                                        <button type="button"
                                            class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white ">Search</button>
                                    </div>
                                </div>
                            </div>

                            {{-- image --}}
                            <div class="col-lg-6">
                                <div class="image_property-tab">
                                    <img src="{{ asset('img/property-search-tab_one.svg') }}" alt="image">
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Villas --}}
                    <div id="tab-9" class="tab-content_one">
                        <div class="row">
                            <div class="col-lg-6">

                                {{-- State/Province --}}
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css pt-3">
                                    <x-forms.crm-single-select :fieldData="[
                                        'name' => 'subtype_id',
                                        'hasLabel' => true,
                                        'label' => 'State/Province:',
                                        'id' => 'subtype_nine',
                                        'options' => [],
                                        'attributes' => [],
                                        'hasHelpText' => false,
                                        'placeholder' => 'State',
                                        'isRequired' => true,
                                        'minimumResultsForSearch' => 0,
                                        'selected' => $property->subtype_id ?? '',
                                    ]" />
                                </div>

                                {{-- City --}}
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css pt-3">
                                    <x-forms.crm-text-field :fieldData="[
                                        'name' => 'reference',
                                        'hasLabel' => true,
                                        'label' => 'City:',
                                        'id' => 'city',
                                        'attributes' => [],
                                        'hasHelpText' => false,
                                        //'help' => 'Please enter your name',
                                        'placeholder' => 'Valencia',
                                        'isRequired' => true,
                                        'value' => $property->reference ?? '',
                                    ]" />
                                </div>

                                {{-- Locality --}}
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css pt-3">
                                    <x-forms.crm-text-field :fieldData="[
                                        'name' => 'reference',
                                        'hasLabel' => true,
                                        'label' => 'Locality:',
                                        'id' => 'Locality',
                                        'attributes' => [],
                                        'hasHelpText' => false,
                                        //'help' => 'Please enter your name',
                                        'isRequired' => true,
                                        'placeholder' => 'Valencia',
                                        'value' => $property->reference ?? '',
                                    ]" />
                                </div>

                                {{-- Search-button --}}
                                <div
                                    class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css d-flex justify-content-start  pt-30 mb-30">
                                    <div class="form-group position-relative">
                                        <button type="button"
                                            class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white ">Search</button>
                                    </div>
                                </div>
                            </div>

                            {{-- image --}}
                            <div class="col-lg-6">
                                <div class="image_property-tab">
                                    <img src="{{ asset('img/property-search-tab_one.svg') }}" alt="image">
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- New Developments --}}
                    <div id="tab-10" class="tab-content_one">
                        <div class="row">
                            <div class="col-lg-6">

                                {{-- State/Province --}}
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css pt-3">
                                    <x-forms.crm-single-select :fieldData="[
                                        'name' => 'subtype_id',
                                        'hasLabel' => true,
                                        'label' => 'State/Province:',
                                        'id' => 'subtype_nine',
                                        'options' => [],
                                        'attributes' => [],
                                        'hasHelpText' => false,
                                        'placeholder' => 'State',
                                        'isRequired' => true,
                                        'minimumResultsForSearch' => 0,
                                        'selected' => $property->subtype_id ?? '',
                                    ]" />
                                </div>

                                {{-- City --}}
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css pt-3">
                                    <x-forms.crm-text-field :fieldData="[
                                        'name' => 'reference',
                                        'hasLabel' => true,
                                        'label' => 'City:',
                                        'id' => 'city',
                                        'attributes' => [],
                                        'hasHelpText' => false,
                                        //'help' => 'Please enter your name',
                                        'placeholder' => 'Valencia',
                                        'isRequired' => true,
                                        'value' => $property->reference ?? '',
                                    ]" />
                                </div>

                                {{-- Locality --}}
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css pt-3">
                                    <x-forms.crm-text-field :fieldData="[
                                        'name' => 'reference',
                                        'hasLabel' => true,
                                        'label' => 'Locality:',
                                        'id' => 'Locality',
                                        'attributes' => [],
                                        'hasHelpText' => false,
                                        //'help' => 'Please enter your name',
                                        'isRequired' => true,
                                        'placeholder' => 'Valencia',
                                        'value' => $property->reference ?? '',
                                    ]" />
                                </div>

                                {{-- Search-button --}}
                                <div
                                    class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css d-flex justify-content-start  pt-30 mb-30">
                                    <div class="form-group position-relative">
                                        <button type="button"
                                            class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white ">Search</button>
                                    </div>
                                </div>
                            </div>

                            {{-- image --}}
                            <div class="col-lg-6">
                                <div class="image_property-tab">
                                    <img src="{{ asset('img/property-search-tab_one.svg') }}" alt="image">
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Saved buttons --}}
                    <div class="border_tab-search">
                        <div
                            class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css d-flex justify-content-start align-items-center pt-30">
                            <div class="form-group position-relative gap-12 d-flex align-items-center">
                                <button type="button"
                                    class="small-button border-r-8 b-color-white text-14 font-weight-700 lineheight-18 color-primary border-primary d-flex align-items-center"
                                    data-toggle="modal" data-target="#cancelbutton">
                                    <i class=" icon-Export me-2 icon-20"></i>
                                    Saved Search</button>
                                <button type="button"
                                    class="small-button border-r-8 b-color-white text-14 font-weight-700 lineheight-18 color-primary border-primary d-flex align-items-center"
                                    data-toggle="modal" data-target="#cancelbutton">
                                    <i class=" icon-Export me-2 icon-20"></i>
                                    Saved Properties</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @push('scripts')

            <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
            <script src="{{ asset('assets/js/modules/dashboard/agent-profile.js') }}"></script>

        @endpush
    @endsection
