<h2 class="text-24 font-weight-700 text-capitalize color-primary text-center lineheight-30 mt-30 mb-30">
    {{trans('messages.profile-setup.Profile_Overview')}}</h2>

<!-- ///////////////personal-information/////////////////////////////// -->
<div class="border-r-12 b-color-white box-shadow-one  p-15">
    <div class="row row-border ">
        <div class="col-lg-12 px-0 border-white-twenty">
            <div class="text-16 font-weight-700 lineheight-20 text-capitalize color-primary pb-3">
                {{trans('messages.profile-setup.Personal_Information')}}
            </div>
        </div>
    </div>
    <div class="pt-3 pb-2">
        <img src="{{!empty($user->image) ? $user->image : asset('img/default-user.jpg')}}" alt="Default Image"
            class=" border-r-20" id="image_image" height="100" width="100">
    </div>
    <div class="row row-border">
        <div class="col-lg-6 d-flex align-items-start px-0 py-10 border-white-twenty">
            <div class="text-14 color-primary font-weight-700 lineheight-18 me-1 me-1">
                {{ trans('messages.profile-setup.Name').":" }}
                <span class="text-14 color-b-blue font-weight-400 lineheight-18">{{$user->name ?? 'N/A'}}</span>
            </div>
        </div>
        <div class="col-lg-6 d-flex align-items-start py-10 px-0 border-white-twenty">
            <div class="text-14 color-primary font-weight-700 lineheight-18 me-1">
                {{trans('messages.dashboard.Email').":"}}
                <span class="text-14 color-b-blue font-weight-400 lineheight-18">
                    {{$user->email ?? 'N/A'}}</span>
            </div>
        </div>
    </div>
    <div class="row row-border">
        <div class="col-lg-6 d-flex align-items-start py-10 px-0 border-white-twenty">
            <div class="text-14 color-primary font-weight-700 lineheight-18 me-1">
                {{trans('messages.dashboard.Mobile_Number').':'}}
                <span class="text-14 color-b-blue font-weight-400 lineheight-18">{{$user->phone ?? 'N/A'}}</span>
            </div>
        </div>
        <div class="col-lg-6 d-flex align-items-start py-10 px-0 border-white-twenty">
            <div class="text-14 color-primary font-weight-700 lineheight-18 me-1">
                {{trans('messages.profile-setup.Date_of_Birth').':'}}
                <span class="text-14 color-b-blue font-weight-400 lineheight-18">
                    {{$user->date_of_birth ?? 'N/A'}}</span>
            </div>
        </div>
    </div>
    <div class="row row-border">
        <div class="col-lg-6 d-flex align-items-start py-10 px-0 border-white-twenty">
            <div class="text-14 color-primary font-weight-700 lineheight-18 me-1">
                {{trans('messages.profile-setup.Gender').':'}}
                <span class="text-14 color-b-blue font-weight-400 lineheight-18">{{$user->gender ?? 'N/A'}}
                </span>
            </div>
        </div>
        <div class="col-lg-6 d-flex align-items-start py-10 px-0 border-white-twenty">
            <div class="text-14 color-primary font-weight-700 lineheight-18 me-1">
                {{trans('messages.profile-setup.Street_Address').':'}}
                <span class="text-14 color-b-blue font-weight-400 lineheight-18">
                    {{$user->address ?? 'N/A'}}</span>
            </div>
        </div>
    </div>
    <div class="row row-border">
        <div class="col-lg-6 d-flex align-items-start py-10 px-0 border-white-twenty">
            <div class="text-14 color-primary font-weight-700 lineheight-18 me-1">
                {{trans('messages.profile-setup.City').':'}}
                <span class="text-14 color-b-blue font-weight-400 lineheight-18">
                    {{$user->city ?? 'N/A'}}</span>
            </div>
        </div>
        <div class="col-lg-6 d-flex align-items-start py-10 px-0 border-white-twenty">
            <div class="text-14 color-primary font-weight-700 lineheight-18 me-1">
                {{trans('messages.profile-setup.State').':'}}
                <span class="text-14 color-b-blue font-weight-400 lineheight-18">{{$user->state ?? 'N/A'}}
                </span>
            </div>
        </div>
    </div>
    <div class="row row-border">
        <div class="col-lg-6 d-flex align-items-start py-10 px-0 border-white-twenty">
            <div class="text-14 color-primary font-weight-700 lineheight-18 me-1">
                {{trans('messages.profile-setup.Country').':'}}
                <span class="text-14 color-b-blue font-weight-400 lineheight-18">{{$user->country ?? 'N/A'}}
                </span>
            </div>
        </div>
        <div class="col-lg-6 d-flex align-items-start py-10 px-0 border-white-twenty">
            <div class="text-14 color-primary font-weight-700 lineheight-18 me-1">
                {{trans('messages.profile-setup.Zip_Code').':'}}
                <span class="text-14 color-b-blue font-weight-400 lineheight-18">{{$user->zipcode ?? 'N/A'}}
                </span>
            </div>
        </div>
    </div>
    <div class="row row-border">
        <div class="col-lg-12 d-flex align-items-center py-10 px-0 pb-0">
            <div class="text-14 color-primary font-weight-700 lineheight-18 me-1">
                {{trans('messages.profile-setup.Languages_Spoken').':'}}
                <span class="text-14 color-b-blue font-weight-400 lineheight-18">{{$user->languages_spoken ??
                    'N/A'}}</span>
            </div>
        </div>

    </div>

</div>

<!-- ///////////////property-prefrence//////////////////////////////// -->
<div class="border-r-12 b-color-white box-shadow-one  mt-20 p-15">
    <div class="row row-border">
        <div class="col-lg-12 px-0 border-white-twenty">
            <div class="text-16 font-weight-700 lineheight-20 text-capitalize color-primary pb-3">
                {{trans('messages.profile-setup.Property_Preference')}}</div>
        </div>
    </div>
    <div class="row row-border">
        {{-- <div class="col-lg-6 d-flex align-items-start py-10 px-0 border-white-twenty">
            <div class="text-14 color-primary font-weight-700 lineheight-18 me-1">
                {{trans('messages.profile-setup.Property_Category').':'}}
                <span class="text-14 color-b-blue font-weight-400 lineheight-18">{{$user->category_name ??
                    'N/A'}}</span>
            </div>
        </div> --}}
        <div class="col-lg-6 d-flex align-items-start py-10 px-0 border-white-twenty">
            <div class="text-14 color-primary font-weight-700 lineheight-18 me-1">
                {{trans('messages.profile-setup.Property_Type').':'}}
                <span class="text-14 color-b-blue font-weight-400 lineheight-18">{{$user->typeNames ?? 'N/A'}} </span>
            </div>
        </div>
    </div>
    <div class="row row-border">
        <div class="col-lg-6 d-flex align-items-start py-10 px-0 border-white-twenty">
            <div class="text-14 color-primary font-weight-700 lineheight-18 me-1">
                {{trans('messages.profile-setup.Property_Situation').':'}}
                <span class="text-14 color-b-blue font-weight-400 lineheight-18">{{$user->situationNames ?? 'N/A'}}
                </span>
            </div>
        </div>
        <div class="col-lg-6 d-flex align-items-start py-10 px-0 border-white-twenty">
            <div class="text-14 color-primary font-weight-700 lineheight-18 me-1">
                {{trans('messages.profile-setup.Preferred_Location').':'}}
                <span class="text-14 color-b-blue font-weight-400 lineheight-18">{{$user->preferred_location ?? 'N/A'}}
                </span>
            </div>
        </div>
    </div>
    <div class="row row-border">
        <div class="col-lg-12 d-flex align-items-center py-2 px-0 border-white-twenty">
            <div class="text-14 color-primary font-weight-700 lineheight-18 me-1">
                {{trans('messages.profile-setup.Feature_Option').':'}}
                <span class="text-14 color-b-blue font-weight-400 lineheight-18">
                    <span>{{$user->featureNames ?? 'N/A'}}</span>
                </span>
            </div>
        </div>
    </div>
    <div class="row row-border">
        <div class="col-lg-6 d-flex align-items-center py-10 px-0 pb-0 pb-2 pb-lg-0 custom-border">
            <div class="text-14 color-primary font-weight-700 lineheight-18 me-1">
                {{trans('Sq m').':'}}
                <span class="text-14 color-b-blue font-weight-400 lineheight-18">
                    {{$user->min_size}} m² - {{$user->max_size}} m² </span>
            </div>
        </div>
        <div class="col-lg-6 d-flex align-items-center py-10 px-0 pb-0">
            <div class="text-14 color-primary font-weight-700 lineheight-18 me-1">
                {{trans('messages.profile-setup.Budget Range').':'}}
                <span class="text-14 color-b-blue font-weight-400 lineheight-18">
                    {{config('Reading.default_currency').$user->min_price}} -
                    {{config('Reading.default_currency').$user->max_price}} </span>
            </div>
        </div>
    </div>

</div>

<!-- /////////////////submit-button//////////////////////////////// -->
<div class="text-end">
    <button type="submit"
        class="submit-btn small-button border-r-8 b-color-Gradient color-white text-14 font-weight-700 lineheight-18  gardient-button next-btn">{{trans('messages.profile-setup.Confirm')}}
    </button>
</div>