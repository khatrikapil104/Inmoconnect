<div class="main-card border-r-8  mb-15">

    <div
        class="empty-search border-r-8 b-color-white d-flex align-items-center justify-content-center px-50 py-30 box-shadow-one">
        @if($listingType == 'property-listing')
        <div class="row d-flex align-items-center">
            <div class="col-lg-6  empty-order">
                <div class="search-left">
                    <h3 class="text-20 lineheight-22 color-primary font-weight-700 letter-s-48">{{trans('messages.empty_table.Grow_Your_Property_Portfolio_with_InmoConnect')}}</h3>
                    <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue pt-10">{{trans('messages.empty_table.Ready_to_expand_your_property')}}</h6>

                    <ul class="search-list">
                        <li class="text14 font-weight-400 lineheight-18 color-b-blue pt-15"><span
                                class="font-weight-700">{{trans('messages.empty_table.Increased_Visibility')}}</span> {{trans('messages.empty_table.Showcase_your_listings_to_a_wider_audience_of_potential_buyers_and_investors')}}</li>
                        <li class="text14 font-weight-400 lineheight-18 color-b-blue pt-15"><span
                                class="font-weight-700">{{trans('messages.empty_table.Effortless_Management')}}</span> {{trans('messages.empty_table.Easily_manage_and_update_property')}}</li>
                        <li class="text14 font-weight-400 lineheight-18 color-b-blue pt-15"><span
                                class="font-weight-700">{{trans('messages.empty_table.Seamless_Collaboration')}}</span> {{trans('messages.empty_table.Collaborate_with_fellow_agents')}}</li>
                    </ul>
                    <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue pt-15">{{trans('messages.empty_table.Start_growing_your_property_portfolio_today')}}</h6>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="search-right">
                    <div class="search-right-img opacity-8 text-center mb-5 mb-lg-0">
                        <img src="{{asset('img/empty-property.png')}}" alt="image" class="#">
                    </div>
                </div>
            </div>
        </div>
        @elseif($listingType == 'property-search')
        <div class="row d-flex align-items-center">
            <div class="col-lg-6 empty-order">
                <div class="search-left me-4">
                    <h3 class="text-20 lineheight-22 color-primary font-weight-700 letter-s-48">{{trans('messages.empty_table.Discover_Opportunities')}}<br>{{trans('messages.empty_table.Search_Agent_Listings_on_InmoConnect')}}</h3>
                    <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue pt-10">{{trans('messages.empty_table.Why_Search_Agent_Listings_on_InmoConnect')}}</h6>
                    <ul class="search-list">
                        <li class="text14 font-weight-400 lineheight-18 color-b-blue pt-15"><span
                                class="font-weight-700">{{trans('messages.empty_table.Diverse_Inventory')}}</span> {{trans('messages.empty_table.Access_a_wide_range_of_properties_listed_by_experienced_professionals')}}</li>
                        <li class="text14 font-weight-400 lineheight-18 color-b-blue pt-15"><span
                                class="font-weight-700">{{trans('messages.empty_table.Market_Insights')}}</span> {{trans('messages.empty_table.Stay_informed_about_market_trends_and_pricing_strategies')}}</li>
                        <li class="text14 font-weight-400 lineheight-18 color-b-blue pt-15"><span
                                class="font-weight-700">{{trans('messages.empty_table.Collaboration_Potential')}}</span> {{trans('messages.empty_table.Find_properties_for_collaboration_and_expand_your_real_estate_network')}}</li>
                    </ul>
                    <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue pt-15">{{trans('messages.empty_table.Explore_the_listings_now_and_find_your_next_real_estate_opportunity_on_InmoConnect')}}</h6>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="search-right">
                    <div class="search-right-img text-center mb-5 mb-lg-0">
                        <img src="{{asset('img/empty-search.png')}}" alt="image" class="#">
                    </div>
                </div>
            </div>
        </div>
        @elseif($listingType == 'agent-listing')
        <div class="row d-flex align-items-center">
            <div class="col-lg-6 empty-order">
                <div class="search-left">
                    <h3 class="text-20 lineheight-24 color-primary font-weight-700 letter-s-48">{{trans('messages.empty_table.Discover_and_Connect_with_Fellow_Agents')}}</h3>
                    <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue pt-10">{{trans('messages.empty_table.Welcome_to_your_network_dashboard_on_InmoConnect')}}</h6>
                    <h6 class="text-14 font-weight-400 line-height-18 color-b-blue pt-4">{{trans('messages.empty_table.Why_Connect_with_Agents_on_InmoConnect')}}</h6>
                    <ul class="search-list">
                        <li class="text14 font-weight-400 lineheight-18 color-b-blue pt-15"><span
                                class="font-weight-700">{{trans('messages.empty_table.Unlock_Collaborative_Potential')}}</span> {{trans('messages.empty_table.Partner_with_fellow_agents_to_streamline_transactions')}}</li>
                        <li class="text14 font-weight-400 lineheight-18 color-b-blue pt-15"><span
                                class="font-weight-700">{{trans('messages.empty_table.Tap_into_Industry_Insights')}}</span> {{trans('messages.empty_table.Access_valuable_market_knowledge_from_seasoned_professionals')}}</li>
                        <li class="text14 font-weight-400 lineheight-18 color-b-blue pt-15"><span
                                class="font-weight-700">{{trans('messages.empty_table.Expand_Your_Reach')}}</span> {{trans('messages.empty_table.Develop_relationships_that_can_lead_to_referrals_and_business_growth')}}</li>
                    </ul>
                    <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue pt-15">{{trans('messages.empty_table.Begin_building_your_real_estate_network_today')}}</h6>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="search-right">
                    <div class="search-right-img opacity-8 text-center mb-5 mb-lg-0">
                        <img src="{{asset('img/empty-agent-search.png')}}" alt="image" class="#">
                    </div>
                </div>
            </div>
        </div>
        @elseif($listingType == 'agent-search')
        <div class="row d-flex align-items-center">
            <div class="col-lg-6 empty-order">
                <div class="search-left pe-4">
                    <h3 class="text-20 lineheight-24 color-primary font-weight-700 letter-s-48">{{trans('messages.empty_table.Build_Your_Network_on_InmoConnect')}}</h3>
                    <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue pt-10">{{trans('messages.empty_table.Why_Build_Your_Network_on_InmoConnect')}}</h6>
                    <ul class="search-list">
                        <li class="text14 font-weight-400 lineheight-18 color-b-blue pt-15"><span
                                class="font-weight-700">{{trans('messages.empty_table.Collaborative_Potential')}}</span> {{trans('messages.empty_table.Connect_with_other_agents_to_collaborate_on_property_listings_and_project')}}</li>
                        <li class="text14 font-weight-400 lineheight-18 color-b-blue pt-15"><span
                                class="font-weight-700">{{trans('messages.empty_table.Industry_Insights')}}</span> {{trans('messages.empty_table.Gain_access_to_valuable_knowledge_and_market_trends_from_experienced_professionals')}}</li>
                        <li class="text14 font-weight-400 lineheight-18 color-b-blue pt-15"><span
                                class="font-weight-700">{{trans('messages.empty_table.Referral_Opportunities')}}</span> {{trans('messages.empty_table.Forge_relationships_that_can_lead_to_referrals_and_business_growth')}}</li>
                    </ul>
                    <h6 class="text-14 font-weight-400 lineheight-18 color-b-blue pt-15">{{trans('messages.empty_table.Start_building_your_network_today_Explore_our_agent_directory_and_connect_with_other_professionals')}}</h6>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="search-right">
                    <div class="search-right-img text-center mb-5 mb-lg-0">
                        <img src="{{asset('img/empty.svg')}}" alt="image" class="#">
                    </div>
                </div>
            </div>
        </div>
        @elseif($listingType == 'user-listing')
        <div class="row d-flex align-items-center">
            <div class="col-lg-12">
                <h3 class="text-20 lineheight-22 color-primary font-weight-700 letter-s-48">No user found</h3>
            </div>
        </div>
        @elseif($listingType == 'customer-listing' || $listingType == 'customer-listing-company')
        <div class="row d-flex align-items-center">
            <div class="col-lg-6 empty-order">
                <div class="search-left me-4">
                    <h3 class="text-20 lineheight-22 color-primary font-weight-700 letter-s-48">
                        {{trans('messages.my-customers.Empower_Your_Clients')}}
                    </h3>
                    <div class="text14 font-weight-400 lineheight-18 color-b-blue pt-10">
                        {{trans('messages.my-customers.Why_Your_Clients_Will_Love_InmoConnect_Invitations')}}

                    </div>
                    <ul class="search-list">
                        <li class="text14 font-weight-400 lineheight-18 color-b-blue pt-15"><span
                                class="font-weight-700">
                                {{trans('messages.my-customers.Seamless_Onboarding')}}
                            </span> 
                                {{trans('messages.my-customer.details_Seamless_Onboarding')}} 
                            </li>
                        <li class="text14 font-weight-400 lineheight-18 color-b-blue pt-15"><span
                                class="font-weight-700">
                                {{trans('messages.my-customers.Unified Collaboration')}}
                            </span>  
                                {{trans('messages.my-customers.details_Unified_Collaboration')}}
                        </li>
                        <li class="text14 font-weight-400 lineheight-18 color-b-blue pt-15"><span
                                class="font-weight-700">
                                {{trans('messages.my-customers.Efficient_Communication')}}
                            </span>
                             {{trans('messages.my-customers.details_Efficient_Communication')}}
                            </li>
                        <li class="text14 font-weight-400 lineheight-18 color-b-blue pt-15"><span
                                class="font-weight-700">
                                {{trans('messages.my-customers.Exclusive_Property_Access')}}
                            </span> 
                            {{trans('messages.my-customersdetails_Exclusive_Property_Access')}}
                        </li>
                        <li class="text14 font-weight-400 lineheight-18 color-b-blue pt-15"><span
                                class="font-weight-700">
                                {{trans('messages.my-customers.Real_Time_Updates')}}
                            </span>
                            {{trans('messages.my-customers.details_Real_Time_Updates')}}
                        </li>
                    </ul>
                    <div class="text14 font-weight-400 lineheight-18 color-b-blue pt-15">
                        {{trans('messages.my-customers.Start_inviting_customers_to_join_InmoConnect_today')}}
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="search-right">
                    <div class="search-right-img text-center mb-5 mb-lg-0">
                        <img src="{{asset('img/empty_myproject.svg')}}" alt="image" class="#">
                    </div>
                </div>
            </div>
        </div>
        @elseif($listingType == 'development-listing')
        <div class="row d-flex align-items-center">
            <div class="col-lg-6  empty-order">
                <div class="search-left">
                    <div class="text-20 lineheight-22 color-primary font-weight-700 letter-s-48">Start
                        Showcasing Your Real Estate Projects Today!</div>
                    <div class="text-14 font-weight-400 lineheight-18 color-b-blue pt-10">Why Add Your
                        Developments on Inmoconnect?</div>

                    <ul class="search-list">
                        <li class="text14 font-weight-400 lineheight-18 color-b-blue pt-15"><span
                                class="font-weight-700">Comprehensive Project Management:</span> Easily
                            manage all aspects of your real estate projects, from unit listings to pricing
                            and availability.</li>
                        <li class="text14 font-weight-400 lineheight-18 color-b-blue pt-15"><span
                                class="font-weight-700">Maximize Exposure:</span> Showcase your developments
                            to a wide network of agents and potential buyers.</li>
                        <li class="text14 font-weight-400 lineheight-18 color-b-blue pt-15"><span
                                class="font-weight-700">Streamlined Collaboration:</span> Collaborate with
                            agents, set commission terms, and manage sales agreements seamlessly.</li>
                        <li class="text14 font-weight-400 lineheight-18 color-b-blue pt-15"><span
                                class="font-weight-700">Real-Time Updates:</span> Keep your listings current
                            with automated updates, ensuring potential buyers have the latest information.
                        </li>
                    </ul>
                    <div class="text14 font-weight-400 lineheight-18 color-b-blue pt-15">Start adding your
                        developments now and take your real estate business to new heights with Inmoconnect.
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="search-right">
                    <div class="search-right-img opacity-8 text-center mb-5 mb-lg-0">
                            <img src="{{ asset('img/empty_development.svg') }}" alt="image"
                        class="">
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>