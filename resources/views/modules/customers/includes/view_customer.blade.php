<div class="row">
    <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center ">
        <h6 class="text-14 font-weight-700 color-primary">Personal Details</h6>
    </div>
    <div class="col-12 col-sm-12 col-md-12 col-lg-12 modal_customer-details ">
        <div class="row">
            <div class="col-lg-3">
                <div class="d-flex gap-12">
                    <img src="{{ !empty($result->image) ? $result->image : asset('img/default-user.jpg') }}" width="40"
                        height="40" alt="image" class="border-r-4">
                    <div class="">
                        <h6 class="text-14 font-weight-700 color-primary">Name:</h6>
                        <h6 class="text-14 font-weight-400 color-b-blue pt-1">{{$result->name}}</h6>
                    </div>
                </div>

            </div>

            <div class="col-lg-3">
                <div class="modal-details-c">
                    <h6 class="text-14 font-weight-700 color-primary">Mobile Number:</h6>
                    <h6 class="text-14 font-weight-400 color-b-blue pt-1">{{$result->phone}}</h6>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="modal-details-c">
                    <h6 class="text-14 font-weight-700 color-primary">Email:</h6>
                    <h6 class="text-14 font-weight-400 color-b-blue pt-1">{{$result->email}}</h6>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="modal-details-c">
                    <h6 class="text-14 font-weight-700 color-primary">City</h6>
                    <h6 class="text-14 font-weight-400 color-b-blue pt-1">{{$result->city ?? '-'}}</h6>
                </div>
            </div>
        </div>
        {{-- <div class="d-flex">
                  
                    <div class="">
                        <h6>Mobile Number:</h6>
                        <h6>+56 123 567 890</h6>
                    </div>
                </div> --}}
    </div>
    <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center ">
        <h6 class="text-14 font-weight-700 color-primary">Property Preference</h6>
    </div>
    <div class="col-6 col-sm-6 col-md-6 col-lg-6 pt-20">
        <h6 class="text-14 font-weight-700 color-primary">Property Category: <span
                class="font-weight-400 color-b-blue">{{$result->userPropertyPreference->userPropertyCategory->name ?? '-'}}</span></h6>
    </div>
    <div class="col-6 col-sm-6 col-md-6 col-lg-6 pt-20">
        <h6 class="text-14 font-weight-700 color-primary">Property Type: <span
                class="font-weight-400 color-b-blue">@if (!empty($result->typeNames))
                {{$result->typeNames }}
                @else
                -
                @endif</span></h6>
    </div>
    <div class="col-6 col-sm-6 col-md-6 col-lg-6 pt-20">
        <h6 class="text-14 font-weight-700 color-primary">Property Situation: <span
                class="font-weight-400 color-b-blue">@if (!empty($result->situationNames))
                {{$result->situationNames }}
                @else
                -
                @endif</span></h6>
    </div>
    <div class="col-6 col-sm-6 col-md-6 col-lg-6 pt-20">
        <h6 class="text-14 font-weight-700 color-primary">Preferred Location: <span
                class="font-weight-400 color-b-blue">{{$result->userPropertyPreference->preferred_location ?? '-'}}</span></h6>
    </div>
    <div class="col-6 col-sm-6 col-md-6 col-lg-6 pt-20">
        <h6 class="text-14 font-weight-700 color-primary">Feature Option: <span
                class="font-weight-400 color-b-blue">@if (!empty($result->feature))
                {{$result->feature }}
                @else
                -
                @endif </span></h6>
    </div>
    <div class="col-6 col-sm-6 col-md-6 col-lg-6 pt-20">
        <h6 class="text-14 font-weight-700 color-primary">Sq m: <span
                class="font-weight-400 color-b-blue"> @if (!empty($result->userPropertyPreference->min_size))
                {{$result->userPropertyPreference->min_size}} m<sup>2</sup> -{{$result->userPropertyPreference->max_size}} m<sup>2</sup></span></h6>
                @else
                    -
                @endif
                 
    </div>
    <div class="col-6 col-sm-6 col-md-6 col-lg-6 pt-20">
        <h6 class="text-14 font-weight-700 color-primary">Budget Range: <span
                class="font-weight-400 color-b-blue"> @if (!empty($result->userPropertyPreference->min_price))
                €{{$result->userPropertyPreference->min_price}} - €{{$result->userPropertyPreference->max_price}}
                @else
                -
                @endif </span></h6>
    </div>
    {{-- <div class="col-6 col-sm-6 col-md-6 col-lg-6 pt-20">
        <h6 class="text-14 font-weight-700 color-primary">Government ID: <span><img
                    src="{{ !empty($result->user->government_certification) ? $result->user->government_certification : asset('img/default-property.jpg') }}" width="40" height="40"
                    alt="image" class="border-r-4"></span>
                    
        </h6>
    </div> --}}
    <div
        class="col-12 col-sm-12 col-md-12 col-lg-12 common-label-css d-flex justify-content-end align-items-end pt-30">
        <div class="form-group position-relative">
            <button type="button" onclick = "window.open('{{route(routeNamePrefix().'messages.index')}}','_self')"
                class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white ">Send
                Message</button>
        </div>
    </div>
</div>