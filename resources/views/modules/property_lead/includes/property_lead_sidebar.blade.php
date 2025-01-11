{{-- @dd($result->user->role->name) --}}
<div class="sidebar_one-content">
    <div class="d-flex align-items-center justify-content-between">
        <div class="text-18 font-weight-700 lineheight-22 color-b-blue">{{ $result->propertyDetail->name ?? '' }}</div>
        <div class="text-18 font-weight-700 lineheight-22 color-b-blue">{{ ucfirst($result->name) ?? '' }}</div>
    </div>
    <div class="d-flex align-items-center justify-content-between mt-2">
        <div class="text-14 font-weight-700 lineheight-18 color-b-blue">Property Type:<span
                class="font-weight-400">{{ $result->propertyDetail->type->name ?? '' }}</span>
        </div>
        <div class="text-14 font-weight-400 lineheight-18 color-b-blue">{{ ucfirst($result->account_type) ?? '' }}</div>
    </div>
    <div class="d-flex align-items-center justify-content-between mt-2">
        <div class="text-14 font-weight-400 lineheight-18 color-b-blue"><i class="icon-property_id text-14"></i>
            <span> &nbsp;{{ $result->propertyDetail->reference ?? '' }} </span>
        </div>
        <div class="text-14 font-weight-400 lineheight-18 color-b-blue">
            {{ date('d/m/Y, h:i A', strtotime($result->created_at ?? '')) }}</div>
    </div>
</div>


<div class="sidebar_one-content-card-four p-30 pb-0">
    <div class="modal_customer-details mt-0">
        <div class="  modal_margin-detail">
            <div class="cat_box-small-i">
                <h6 class="text-16 font-weight-700 color-primary text-center">Lead Details</h6>
            </div>
            <div class="d-flex align-items-start justify-content-between pt-20">
                <img src="{{ !empty($result->user->image) ? $result->user->image : asset('img/default-user.jpg') }}"
                    width="60" height="60" alt="image" class="border-r-8">
                @if ($result->user->role->name == 'customer')
                    <button type="button"
                        onclick="window.open('{{ route(routeNamePrefix() . 'customers.index') }}','_self')"
                        class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white ">View
                        Profile</button>
                @elseif ($result->user->role->name == 'agent')
                    <button type="button"
                        onclick="window.open('{{ route(routeNamePrefix() . 'agents.viewAgent', $result->user_id) }}','_self')"
                        class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white ">View
                        Profile</button>
                @endif

            </div>
            <div class="row text-start">
                <div class="col-lg-4 pt-12">
                    <div class="d-flex flex-column">
                        <p class="text-14 color-primary font-weight-700">Lead Name:</p>
                        <p class="text-14 color-b-blue font-weight-400">{{ ucwords(strtolower($result->name)) ?? '' }}
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 pt-12">
                    <div class="d-flex flex-column">
                        <p class="text-14 color-primary font-weight-700">Account Type:</p>
                        <p class="text-14 color-b-blue font-weight-400">{{ ucfirst($result->account_type) ?? '' }}</p>
                    </div>
                </div>
                <div class="col-lg-4 pt-12">
                    <div class="d-flex flex-column">
                        <p class="text-14 color-primary font-weight-700">Email Id:</p>
                        <p class="text-14 color-b-blue font-weight-400">{{ $result->email ?? '' }}</p>
                    </div>
                </div>
                <div class="col-lg-4 pt-12">
                    <div class="d-flex flex-column">
                        <p class="text-14 color-primary font-weight-700">Mobile Number:</p>
                        <p class="text-14 color-b-blue font-weight-400">{{ $result->phone ?? '' }}</p>
                    </div>
                </div>
                <div class="col-lg-4 pt-12">
                    <div class="d-flex flex-column">
                        <p class="text-14 color-primary font-weight-700">Gender:</p>
                        <p class="text-14 color-b-blue font-weight-400">{{ $result->user->gender ?? '' }}</p>
                    </div>
                </div>
                <div class="col-lg-4 pt-12">
                    <div class="d-flex flex-column">
                        <p class="text-14 color-primary font-weight-700">Languages Spoken:</p>
                        <p class="text-14 color-b-blue font-weight-400">{{ $result->user->languages_spoken ?? '' }}
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 pt-12">

                    <div class="d-flex flex-column">
                        <p class="text-14 color-primary font-weight-700">Government ID:</p>
                        <div class="d-flex gap-2 align-items-start">
                            <img src= "{{ asset('img/certificate.svg') }}" />
                            <p class="text-14 color-b-blue font-weight-400">
                                <span>{{ $result->user->government_certification ?? '' }}</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 pt-12">
                    <div class="d-flex flex-column">
                        <p class="text-14 color-primary font-weight-700">Preferred Location:</p>
                        <p class="text-14 color-b-blue font-weight-400">
                            {{ $result->userPropertyPreferences->preferred_location ?? '' }}</p>
                    </div>
                </div>
                <div class="col-lg-4 pt-12">
                    <div class="d-flex flex-column">
                        <p class="text-14 color-primary font-weight-700">Budget Range:
                        </p>
                        <p class="text-14 color-b-blue font-weight-400">
                            @if (!empty($result->userPropertyPreferences->min_price))
                                {{ config('Reading.default_currency') . ' ' . number_format($result->userPropertyPreferences->min_price, 2) }}
                                -
                                {{ config('Reading.default_currency') . ' ' . number_format($result->userPropertyPreferences->max_price, 2) }}
                            @endif
                        </p>
                    </div>
                </div>

                <div class="col-lg-12 pt-12">
                    <div class="d-flex flex-column">
                        <p class="text-14 color-primary font-weight-700">Address:</p>
                        <p class="text-14 color-b-blue font-weight-400">{{ $result->user->address ?? '' }}</p>
                    </div>
                </div>
                <div class="col-lg-12 pt-12">
                    <div class="d-flex flex-column">
                        <p class="text-14 color-primary font-weight-700">Message:</p>
                        <p class="text-14 color-b-blue font-weight-400">{{ $result->message ?? '' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal_customer-details mb-0">
        <div class="  modal_margin-detail ">
            <div class="cat_box-small-i">
                <h6 class="text-16 font-weight-700 color-primary text-center">Property Details</h6>
            </div>
            <div class="d-flex align-items-start justify-content-between pt-20">
                <img src="{{ !empty($result->propertyDetail->cover_image) ? $result->propertyDetail->cover_image : asset('img/default-user.jpg') }}"
                    width="60" height="60" alt="image" class="border-r-8">
                <button type="button"
                    onclick="window.open('{{ route(routeNamePrefix() . 'properties.search.show', $result->propertyDetail->reference) }}','_self')"
                    class="Gradient_button small-button border-r-8 b-color-Gradient text-14 font-weight-400 lineheight-18 color-white ">View
                    property</button>
            </div>
            <div class="row text-start">
                <div class="col-lg-12 pt-12">
                    <div class="d-flex flex-column">
                        <p class="text-14 color-primary font-weight-700">Property Name</p>
                        <p class="text-14 color-b-blue font-weight-400">
                            {{ ucfirst($result->propertyDetail->name) ?? '' }}</p>
                    </div>
                </div>
                <div class="col-lg-4 pt-12">
                    <div class="d-flex flex-column">
                        <p class="text-14 color-primary font-weight-700">Property Reference:</p>
                        <p class="text-14 color-b-blue font-weight-400">{{ $result->propertyDetail->reference ?? '' }}
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 pt-12">
                    <div class="d-flex flex-column">
                        <p class="text-14 color-primary font-weight-700">Property Listed As:</p>
                        <p class="text-14 color-b-blue font-weight-400">{{ $result->propertyDetail->listed_as ?? '' }}
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 pt-12">
                    <div class="d-flex flex-column">
                        <p class="text-14 color-primary font-weight-700">Property Price:</p>
                        <p class="text-14 color-b-blue font-weight-400">
                            {{ config('Reading.default_currency') . ' ' . number_format($result->propertyDetail->price, 2) ?? '' }}
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 pt-12">
                    <div class="d-flex flex-column">
                        <p class="text-14 color-primary font-weight-700">Property Type:</p>
                        <p class="text-14 color-b-blue font-weight-400">
                            {{ $result->propertyDetail->type->name ?? '' }}</p>
                    </div>
                </div>
                <div class="col-lg-4 pt-12">
                    <div class="d-flex flex-column">
                        <p class="text-14 color-primary font-weight-700">Property Subtype:</p>
                        <p class="text-14 color-b-blue font-weight-400">
                            {{ $result->propertyDetail->subtype->name ?? '' }}</p>
                    </div>
                </div>
                <div class="col-lg-4 pt-12">
                    <div class="d-flex flex-column">
                        <p class="text-14 color-primary font-weight-700">Total Size:</p>
                        <p class="text-14 color-b-blue font-weight-400">{{ $result->propertyDetail->size ?? '' }} M
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 pt-12">
                    <div class="d-flex flex-column">
                        <p class="text-14 color-primary font-weight-700">Bedroom:</p>
                        <p class="text-14 color-b-blue font-weight-400">{{ $result->propertyDetail->bedrooms ?? '' }}
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 pt-12">
                    <div class="d-flex flex-column">
                        <p class="text-14 color-primary font-weight-700">Bathroom:</p>
                        <p class="text-14 color-b-blue font-weight-400">{{ $result->propertyDetail->bathrooms ?? '' }}
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 pt-12">
                    <div class="d-flex flex-column">
                        <p class="text-14 color-primary font-weight-700">Property Status/Completion:
                        </p>
                        <p class="text-14 color-b-blue font-weight-400">
                            {{ $result->propertyDetail->status_completion ?? '' }} </p>
                    </div>
                </div>
                @if ($result->account_type == 'agent')
                    <div class="col-lg-12 pt-12">
                        <div class="d-flex flex-column">
                            <p class="text-14 color-primary font-weight-700">Commission:
                            </p>
                            <p class="text-14 color-b-blue font-weight-400">
                                {{ $result->propertyDetail->percentage ?? '' }}% </p>
                        </div>
                    </div>
                    <div class="col-lg-4 pt-12">
                        <div class="d-flex flex-column">
                            <p class="text-14 color-primary font-weight-700">Listing Agent(%):
                            </p>
                            <p class="text-14 color-b-blue font-weight-400">
                                {{ $result->propertyDetail->list_agent_per ?? '' }}% </p>
                        </div>
                    </div>
                    <div class="col-lg-4 pt-12">
                        <div class="d-flex flex-column">
                            <p class="text-14 color-primary font-weight-700">Listing Agent(€):
                            </p>
                            <p class="text-14 color-b-blue font-weight-400">
                                €{{ $result->propertyDetail->list_agent_com ?? '' }} </p>
                        </div>
                    </div>
                    <div class="col-lg-4 pt-12">
                    </div>
                    <div class="col-lg-4 pt-12">
                        <div class="d-flex flex-column">
                            <p class="text-14 color-primary font-weight-700">Selling Agent(%):
                            </p>
                            <p class="text-14 color-b-blue font-weight-400">
                                {{ $result->propertyDetail->sell_agent_per ?? '' }}% </p>
                        </div>
                    </div>
                    <div class="col-lg-4 pt-12">
                        <div class="d-flex flex-column">
                            <p class="text-14 color-primary font-weight-700">Selling Agent(€):
                            </p>
                            <p class="text-14 color-b-blue font-weight-400">
                                €{{ $result->propertyDetail->sell_agent_com ?? '' }} </p>
                        </div>
                    </div>
                    <div class="col-lg-4 pt-12">
                    </div>
                @endif

                <div class="col-lg-12 pt-12">
                    <div class="d-flex flex-column">
                        <p class="text-14 color-primary font-weight-700">Address:</p>
                        <p class="text-14 color-b-blue font-weight-400">{{ $result->propertyDetail->address ?? '' }}
                        </p>
                    </div>
                </div>
                <div class="col-lg-12 pt-12">
                    <div class="d-flex flex-column">
                        <p class="text-14 color-primary font-weight-700">Description:</p>
                        <p class="text-14 color-b-blue font-weight-400">
                            {{ $result->propertyDetail->description ?? '' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
