@php
    $userPermissionArrData = session()->has('user_permissions_arr') ? session()->get('user_permissions_arr') : [];
@endphp
@if ($userPermissionArrData)
    <div id="wrapper">
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav nav-pills nav-stacked" id="menu">

                <li class="active" class="collapse navbar-collapse " id="bs-example-navbar-collapse-1">
                    <a href="#" class="sidebar-menu">
                        <!-- <button class="toggle-btn" id="toggleBtn">Collapse and lock</button> -->
                        <button class="navbar-toggle collapse in b-color-transparent " data-toggle="collapse"
                            id="menu-toggle-2">
                            <i class="icon-collabse text-18 color-b-blue"></i>
                            <span
                                class="side-listing side-collapse">{{ trans('messages.sidebar.Collapse_and_lock') }}</span>
                        </button>

                    </a>
                </li>
                @if (!in_array(routeNamePrefix() . 'user.dashboard', $userPermissionArrData))
                    <li>
                        <a href="{{ route(routeNamePrefix() . 'user.dashboard') }}"
                            class="sidebar-menu {{ requestSegment(1) == 'dashboard' ? 'active' : '' }}">
                            <i class="icon-dashboard text-18 color-b-blue"></i>
                            </span>
                            <span class="side-listing ">{{ trans('messages.sidebar.Dashboard') }}</span>
                        </a>
                    </li>
                @endif
                @if (!in_array(routeNamePrefix() . 'developments.index', $userPermissionArrData))
                    @if (auth()->user()->role->name == 'superadmin' || auth()->user()->role->name == 'admin' || auth()->user()->role->name == 'developer')
                        <li>
                            <a href="{{ route(routeNamePrefix() . 'developments.index') }}"
                                class="sidebar-menu {{ requestSegment(1) == 'developments' ? 'active' : '' }}">
                                <i class="icon-house_type text-18 color-b-blue"></i>
                                </span>
                                <span class="side-listing ">{{ trans('Developments') }}</span>
                            </a>
                        </li>
                    @endif
                @endif
                @if (!in_array(routeNamePrefix() . 'properties.index', $userPermissionArrData))
                    <li>
                        <a href="{{ route(routeNamePrefix() . 'properties.index') }}"
                            class="sidebar-menu {{ requestSegment(1) == 'properties' && requestSegment(2) == '' ? 'active' : '' }}">
                            <i class="icon-property_listing text-18 color-b-blue"></i>
                            </span>
                            <span class="side-listing ">{{ trans('messages.sidebar.Property_Listing') }}</span>
                        </a>
                    </li>
                @endif
                @if (auth()->user()->role->name == 'agent')
                    @if (!in_array(routeNamePrefix() . 'properties.index', $userPermissionArrData))
                        <li>
                            <a href="{{ route(routeNamePrefix() . 'properties.lead.index') }}"
                                class="sidebar-menu {{ requestSegment(1) == 'properties' && requestSegment(2) == '' ? 'active' : '' }}">
                                <i class="icon-Property-Leads text-18 color-b-blue"></i>
                                </span>
                                <span class="side-listing ">{{ trans('messages.sidebar.Property_Leads') }}</span>
                            </a>
                        </li>
                    @endif
                @endif
                @if (!in_array(routeNamePrefix() . 'propertySearch.index', $userPermissionArrData))
                    <li>
                        <a href="{{ route(routeNamePrefix() . 'propertySearch.index') }}"
                            class="sidebar-menu {{ requestSegment(1) == 'properties' && requestSegment(2) == 'search' ? 'active' : '' }}">
                            <i class="icon-property_search text-18  color-b-blue"></i>
                            <span class="side-listing ">{{ trans('messages.sidebar.Property_Search') }}</span>
                        </a>
                    </li>
                @endif



                <!--
            <li class="darksoul-dropdown-js">
                <button id="dropdownButton_one" class="darksoul-btn-medium white sidebar-menu dropdown-btn b-color-transparent {{ requestSegment(1) == 'agents' ? 'active' : '' }}">
                <i class=" icon-agent text-18  color-b-blue"></i>
                    </span> <span class="side-listing ">{{ trans('messages.dashboard-sidebar.Agents') }}</span>
                </button>
                <ul id="jsDropdown" class="darksoul-dropdown-content-js">
                    <li class="darksoul-dropdown-item-js "><a class="none black show-only-agent-two {{ requestSegment(1) == 'agents' && requestSegment(2) == '' ? 'active' : '' }}" href="{{ route(routeNamePrefix() . 'agents.index') }}">{{ trans('messages.sidebar.My_Agents') }}</a></li>
                    @if (auth()->user()->role->name == 'superadmin' ||
                            auth()->user()->role->name == 'admin' ||
                            auth()->user()->role->name == 'agent')
<li class="darksoul-dropdown-item-js "><a class="none black show-only-agent {{ requestSegment(1) == 'agents' && requestSegment(2) == 'search' ? 'active' : '' }}" href="{{ route(routeNamePrefix() . 'agentSearch.index') }}">{{ trans('messages.sidebar.Search_Agents') }}</a></li>
@endif
                </ul>
            </li> -->
                @if (
                    !in_array(routeNamePrefix() . 'agents.index', $userPermissionArrData) ||
                        !in_array(routeNamePrefix() . 'agentSearch.index', $userPermissionArrData))
                    @if (auth()->user()->role->name == 'agent' || auth()->user()->role->name == 'developer')
                        <li class="dropdown-one">
                            <a href="javascript:void(0)"
                                class="sidebar-dropdown-button dropbtn-one  b-color-transparent {{ requestSegment(1) == 'agents' ? 'active' : '' }}"><span
                                    class="arrow"></span>
                                <i class=" icon-agent text-18  color-b-blue"></i> <span
                                    class="side-listing ">{{ trans('Network Connection') }}</span>
                            </a>
                            <div class="dropdown-content-one">
                                @if (!in_array(routeNamePrefix() . 'agents.index', $userPermissionArrData))
                                    <a class="none_black  {{ requestSegment(1) == 'connections' && requestSegment(2) == '' ? 'active' : '' }}"
                                        href="{{ route(routeNamePrefix() . 'agents.index') }}">{{ trans('messages.sidebar.My_Agents') }}</a>
                                @endif

                                @if (!in_array(routeNamePrefix() . 'agents.index', $userPermissionArrData))
                                    @if (auth()->user()->role->name != 'developer')
                                        <a class="none_black {{ requestSegment(1) == 'connections' && requestSegment(2) == 'developers' ? 'active' : '' }}"
                                            href="{{ route(routeNamePrefix() . 'agents.index', ['value' => 'developers']) }}">{{ trans('messages.sidebar.Developer_Agents') }}</a>
                                    @endif

                                @endif
                                @if (!in_array(routeNamePrefix() . 'agentSearch.index', $userPermissionArrData))
                                    <a class="none_black {{ requestSegment(1) == 'agents' && requestSegment(2) == 'search' ? 'active' : '' }}"
                                        href="{{ route(routeNamePrefix() . 'agentSearch.index') }}">
                                        @if (auth()->user()->role->name == 'developer')
                                            {{ trans('messages.sidebar.Search_Agents') }}
                                        @else
                                            {{ trans('messages.sidebar.Search_Connection') }}
                                        @endif
                                    </a>
                                @endif
                            </div>
                        </li>
                        {{-- @else
            <li class="dropdown-one">
                <a href="javascript:void(0)"
                    class="sidebar-dropdown-button dropbtn-one  b-color-transparent {{ requestSegment(1) == 'agents' ? 'active' : '' }}"><span
                        class="arrow"></span>
                    <i class=" icon-agent text-18  color-b-blue"></i> <span
                        class="side-listing ">{{ trans('messages.sidebar.Agents') }}</span>
                </a>
                <div class="dropdown-content-one">
                    @if (!in_array(routeNamePrefix() . 'agents.index', $userPermissionArrData))
                    <a class="none_black  {{ requestSegment(1) == 'agents' && requestSegment(2) == '' ? 'active' : '' }}"
                        href="{{ route(routeNamePrefix() . 'agents.index') }}">{{ trans('messages.sidebar.My_Agents') }}</a>
                    @endif
                    @if (!in_array(routeNamePrefix() . 'agentSearch.index', $userPermissionArrData))
                        <a class="none_black {{ requestSegment(1) == 'agents' && requestSegment(2) == 'search' ? 'active' : '' }}"
                            href="{{ route(routeNamePrefix() . 'agentSearch.index') }}">{{ trans('messages.sidebar.Search_Agents') }}</a>
                    @endif
                </div>
            </li> --}}
                    @endif

                @endif


                @if (!in_array(routeNamePrefix() . 'team_management.index', $userPermissionArrData))
                    <li>
                        <a href="{{ route(routeNamePrefix() . 'team_management.index') }}"
                            class="sidebar-menu {{ requestSegment(1) == 'team-management' ? 'active' : '' }}">
                            <i class="icon-team_management text-18  color-b-blue"></i>

                            <span class="side-listing ">{{ trans('Team Management') }}</span>
                        </a>
                    </li>
                @endif

                @if (!in_array(routeNamePrefix() . 'customers.index', $userPermissionArrData))
                    <li>
                        <a href="{{ route(routeNamePrefix() . 'customers.index') }}"
                            class="sidebar-menu {{ requestSegment(1) == 'customers' ? 'active' : '' }}">
                            <i class=" icon-customer text-18  color-b-blue"></i>

                            <span class="side-listing ">{{ trans('messages.dashboard-sidebar.Customers') }}</span>
                        </a>
                    </li>
                @endif
                @if (!in_array(routeNamePrefix() . 'messages.index', $userPermissionArrData))
                    <li>
                        <a href="{{ route(routeNamePrefix() . 'messages.index') }}"
                            class="sidebar-menu {{ requestSegment(1) == 'messages' ? 'active' : '' }}">
                            <i class="icon-message text-18  color-b-blue"></i>
                            <span class="side-listing ">
                                {{ trans('messages.Messages') }}
                            </span>
                        </a>
                    </li>
                @endif
                @if (!in_array(routeNamePrefix() . 'projects.index', $userPermissionArrData))
                    <li>
                        <a href="{{ route(routeNamePrefix() . 'projects.index') }}"
                            class="sidebar-menu {{ requestSegment(1) == 'projects' && requestSegment(2) == 'search' ? 'active' : '' }}">
                            <i class="icon-my_project text-18  color-b-blue"></i>
                            <span class="side-listing ">{{ trans('messages.dashboard-sidebar.My_Projects') }}</span>
                        </a>
                    </li>
                @endif

                @if (!in_array(routeNamePrefix() . 'files.index', $userPermissionArrData))
                    <li>
                        <a href="{{ route(routeNamePrefix() . 'folder.index') }}"
                            class="sidebar-menu {{ requestSegment(1) == 'files' ? 'active' : '' }}">
                            <i class=" icon-my_file text-18  color-b-blue"></i>
                            <span class="side-listing ">{{ trans('messages.dashboard-sidebar.My_Files') }}</span>
                        </a>
                    </li>
                @endif

                @if (!in_array(routeNamePrefix() . 'calender.index', $userPermissionArrData))
                    <li>

                        <a href="{{ route(routeNamePrefix() . 'calender.index') }}"
                            class="sidebar-menu {{ requestSegment(1) == 'calender' ? 'active' : '' }}">
                            <i class=" icon-my_calender text-18  color-b-blue"></i>
                            <span class="side-listing ">{{ trans('messages.dashboard-sidebar.My_Calander') }}</span>
                        </a>
                    </li>
                @endif

                @if (!in_array(routeNamePrefix() . 'properties.save_search_data', $userPermissionArrData))
                    <li>
                        <a href="{{ route(routeNamePrefix() . 'properties.save_search_data') . '?tab=search' }}"
                            class="sidebar-menu {{ requestSegment(1) == 'properties' && requestSegment(2) == 'saved-search-data' ? 'active' : '' }}">
                            <i class="icon-saved_items text-18  color-b-blue"></i>
                            <span class="side-listing ">
                                {{ trans('Saved Items') }}
                            </span>
                        </a>
                    </li>
                @endif

                @if (!in_array(routeNamePrefix() . 'user.index', $userPermissionArrData))
                    <li>
                        <a href="{{ route(routeNamePrefix() . 'user.index') }}"
                            class="sidebar-menu {{ requestSegment(1) == 'users' ? 'active' : '' }}">
                            <i class="icon-User text-18  color-b-blue"></i>
                            </span> <span class="side-listing">{{ trans('messages.sidebar.Users') }}</span></a>
                    </li>
                @endif



                @if (!in_array(routeNamePrefix() . 'developer.index', $userPermissionArrData))
                    <li>
                        <a href="{{ route(routeNamePrefix() . 'developer.index') }}"
                            class="sidebar-menu {{ requestSegment(1) == 'users' ? 'active' : '' }}">
                            <i class="icon-developer text-18  color-b-blue"></i>
                            </span> <span class="side-listing">{{ trans('messages.sidebar.Developers') }}</span></a>
                    </li>
                @endif
                @if (!in_array(routeNamePrefix() . 'beta_agents.index', $userPermissionArrData))
                    <li>
                        <a href="{{ route(routeNamePrefix() . 'beta_agents.index') }}"
                            class="sidebar-menu {{ requestSegment(1) == 'beta-agents' ? 'active' : '' }}">
                            <i class="icon-beta_agent text-18  color-b-blue"></i>
                            </span> <span
                                class="side-listing">{{ trans('messages.beta-agents.beta_agents') }}</span></a>
                    </li>
                @endif
                @if (!in_array(routeNamePrefix() . 'beta_developers.index', $userPermissionArrData))
                    <li>
                        <a href="{{ route(routeNamePrefix() . 'beta_developers.index') }}"
                            class="sidebar-menu {{ requestSegment(1) == 'beta_developers' ? 'active' : '' }}">
                            <i class="icon-beta_developer text-18  color-b-blue"></i>
                            </span> <span
                                class="side-listing">{{ trans('messages.beta-developer.beta_developer') }}</span></a>
                    </li>
                @endif
                @if (!in_array(routeNamePrefix() . 'newsletters.index', $userPermissionArrData))
                    <li>
                        <a href="{{ route(routeNamePrefix() . 'newsletters.index') }}"
                            class="sidebar-menu {{ requestSegment(1) == 'newsletters' ? 'active' : '' }}">
                            <i class=" icon-newsletter text-18  color-b-blue"></i>
                            </span> <span
                                class="side-listing">{{ trans('messages.newsletters.newletters') }}</span></a>
                    </li>
                @endif

            </ul>
            <!-- </div> -->
            <!-- </div> -->
            @if (!empty(Auth::user()->companyDetails))
                <div class="real_inmo_card">
                    <div class="d-flex real-imno_flex gap-3 align-items-center">
                        <img src="{{ !empty(Auth::user()->companyDetails->company_image) ? Auth::user()->companyDetails->company_image : asset('img/logoplaceholder.svg') }}"
                            alt="image" width="42" height="42" class="rounded">
                        <div class="collapse_hide">
                            <div class="text-16 font-weight-700 lineheight-18 color-white">
                                {{ Auth::user()->companyDetails->company_name ?? '' }}</div>
                            <a href="{{ route(routeNamePrefix() . 'user.view-company') }}"
                                class="pt-1 text-14 font-weight-400 lineheight-18 color-white text-decoration-underline">View
                                Company</a>
                        </div>

                    </div>
                </div>
            @endif
        </div>
@endif
