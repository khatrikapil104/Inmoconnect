<div id="overlay1">
    {{-- responsive-header --}}
    <div class="responsive-header ">
        <img src="{{ asset('img/header-logo.svg') }}" alt="image" class=""
            onclick="window.open('{{ route(routeNamePrefix() . 'user.dashboard') }}','_self')">
    </div>

    <header class="header b-color-primary  position-fixed w-100 " data-loggedInRole="@if(auth()->check()){{ auth()->user()->role->name }}@endif">
        <div class="d-flex align-items-center">

            {{-- left-logo --}}
            <div class="left-header ">
                <div class="left-header-logo h-85 d-flex align-items-center">
                    <img src="{{ asset('img/header-logo.svg') }}" alt="image" class=""
                        onclick="window.open('{{ route(routeNamePrefix() . 'user.dashboard') }}','_self')">
                </div>
            </div>

            {{-- right-logo --}}
            <div class="right-header right-header d-flex w-100 justify-content-sm-end justify-content-center gap-3">

                <div class="profile-header d-flex gap2 align-items-center">

                    {{-- select-language --}}
                    <div class="select-language d-flex align-items-center">
                        <div class="wrapper h-85 d-flex align-items-center">
                            <dl id="country-select" class="dropdown languagesDropdown">
                                @php
                                    $languages = getLanguages();
                                    $currentLocale = session()->has('locale')
                                        ? session()->get('locale')
                                        : config('app.locale');

                                    $defaultLanguage =
                                        $languages->firstWhere('lang_code', $currentLocale) ?: $languages->first();
                                @endphp
                                <dt>
                                    <a href="javascript:void(0);">
                                        <span>
                                            <span class="responsive_language">
                                                <img src="/img/Language_selection.svg" alt="image"
                                                    class="border-r-8 mx-2">
                                            </span>
                                            <span class="responsive_language_one">
                                                <img src="/img/es_flag.png" alt="image" class="border-r-8 mx-2">
                                            </span>
                                            <span>{{ $defaultLanguage->title }}</span>

                                        </span>
                                    </a>
                                </dt>
                                <dd>
                                    <ul style="display: none;" class="flag-dropdown">
                                        @foreach (getLanguages() as $language)
                                            <li>
                                                <a
                                                    href="{{ route(routeNamePrefix() . 'user.setLocale', $language->lang_code) }}">
                                                    <span>
                                                        <img src="{{ asset('img/' . $language->image) }}" alt="image"
                                                            class="border-r-8 mx-2">
                                                    </span>
                                                    <span
                                                        class="text-18 color-black font-weight-400 lineheight-24 ms-2">{{ $language->title }}</span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </dd>
                            </dl>
                        </div>
                    </div>


                    @php
                        $requests = fetchRequests(request());
                    @endphp

                    {{-- profile-request --}}
                    <div class="dropdown requestsDropdown">
                        <button class="dropbtn b-color-transparent h-85">
                            <a class="#" id="btn2">
                                <div class="position-relative icon-span">
                                    <i class="icon-agnet-request icon-20 color-white"></i>
                                    <span
                                        class="d-flex align-items-center justify-content-center text-11 font-weight-700 colo-b-primary b-white-grey requestCounter color-b-blue">{{ $requests['count'] ?? 0 }}</span>
                                </div>
                            </a>
                        </button>
                        <div class="dropdown-content dropdown-request">
                            <div class="menu-container" id="dropdown2">
                                <div class="user-menu1 user-menu-left">
                                    <div class="text-16 color-black font-weight-700 lineheight-20 pb-3">
                                        {{ trans('messages.header.Agent_Requests') }}</div>
                                    <div class="scroll-bar requestContainer">
                                        @include('components.views.layouts.requests.request-index', [
                                            'values' => $requests['data'],
                                        ])
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @php
                        $notifications = fetchNotifications(request());
                        $messages = fetchUserMessages(request());
                        $messageCount = $messages['count'] ?? 0;

                    @endphp

                    {{-- mail --}}
                    <div class="dropdown messagesDropdown">
                        <button class="dropbtn b-color-transparent h-85">
                            <a class="#" id="btn1">
                                <div class="icon-user-1 position-relative icon-span">
                                    <i class=" icon-Mail icon-20 color-white"></i>
                                    <span
                                        class="d-flex align-items-center justify-content-center text-11 font-weight-700 colo-b-primary b-white-grey messageCounter color-b-blue">{{ $messageCount }}</span>
                                </div>
                            </a>
                        </button>
                        <div class="dropdown-content dropdown-content-mail dropdown-mail">
                            <div class="menu-container " id="dropdown2">
                                <div class="user-menu1">
                                    <div class="left-mail d-flex justify-content-between align-items-center pb-2">
                                        <div class="text-16 color-black font-weight-700 lineheight-20 text-capitalize">
                                            {{ trans('messages.Messages') }}
                                            <span class="color-light-grey-seven">(<span
                                                    class="messageCounter">{{ $messageCount }}</span>)</span>
                                        </div>
                                        @if ($messageCount > 0)
                                            <div class="left-notification-toogle d-flex align-items-center gap-1">
                                                <a href="{{ route(routeNamePrefix() . 'messages.markAllAsReadMessage') }}"
                                                    class="color-primary text-14 lineheight-18 font-weight-400 text-decoration-underline">
                                                    {{ trans('messages.mark_as_read') }}
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="scroll-bar mx-2 my-2">
                                        <div class="messageContainer">
                                            @include('components.views.layouts.messages.message-index', [
                                                'values' => $messages['data'],
                                            ])
                                        </div>
                                    </div>

                                    <a href="{{ route(routeNamePrefix() . 'messages.index') }}"
                                        class="border-mail-one text-14 lineheight-18 font-weight-400 color-primary text-decoration-underline d-flex justify-content-center py-3 text-capitalize">
                                        {{ trans('messages.view_all_message') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>


                    {{-- notification --}}
                    <div class="dropdown notificationsDropdown">
                        <button class="dropbtn b-color-transparent h-85">
                            <a class="#" id="btn1">
                                <div class="icon-user-1 position-relative icon-span">
                                    <i class="icon-bell icon-20 color-white"></i>
                                    <span
                                        class="d-flex align-items-center justify-content-center text-11 font-weight-700 colo-b-primary b-white-grey notificationCounter color-b-blue">{{ $notifications['count'] ?? 0 }}</span>
                                </div>
                            </a>
                        </button>
                        <div class="dropdown-content dropdown-notificatio">
                            <div class="menu-container " id="dropdown2">
                                <div class="user-menu1">
                                    <div class="d-flex justify-content-between align-items-center pb-1 pb-sm-3">
                                        <div class="text-16 color-black font-weight-700 lineheight-20">
                                            {{ trans('messages.header.Notifications') }}</div>
                                        <div class="left-notification-toogle d-flex align-items-center gap-1">
                                        </div>
                                    </div>
                                    <div class="scroll-bar notificationContainer">

                                        @include(
                                            'components.views.layouts.notifications.notification-index',
                                            ['values' => $notifications['data']]
                                        )

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    {{-- profile-dropdown --}}
                    @php
                        $user = getLoggedInUserNameHeader();
                    @endphp

                    <div class="dropdown profileDropdown">
                        <div class="d-flex align-items-center">
                            <button class="dropbtn b-color-transparent h-85">
                                <a class="mini-photo-wrapper" href="#" id="btn2">
                                    <img src="{{ !empty($user->image) ? $user->image : asset('img/default-user.jpg') }}"
                                        alt="Default Image" class="border-r-8" height="50" width="50">
                                </a>
                            </button>
                            <div class="dropdown_profile_text ps-2">
                                <div class="text-14 lineheight-18 color-white font-weight-700 text-capitalize">
                                    {{ ucfirst($user->name) }}</div>
                                <div class="text-14 lineheight-18 color-white font-weight-400 text-capitalize">
                                    {{ !empty($user->role->name) ? ucfirst($user->role->name) : '' }} </div>
                            </div>
                        </div>
                        <div class="dropdown-content1">
                            <div class="menu-container" id="dropdown2">
                                <ul class="user-menu ">
                                    <div class="profile-highlight d-flex gap-4 p-3 p-sm-4 align-items-center">
                                        <img src="{{ !empty($user->image) ? $user->image : asset('img/default-user.jpg') }}"
                                            alt="Default Image" class="border-r-8" height="100" width="100"
                                            width="60" height="60">
                                        <div class="details">
                                            <div class="profile-name text-20 font-weight-700 color-black lineheight-24 letter-s-36"
                                                style="line-height:23px;">
                                                {{ $user->name ?? '' }}
                                            </div>
                                            <div
                                                class="profile-footer color-black opacity-6 font-weight-400 text-16 lineheight-20">
                                                {{ !empty($user->role->name) ? ucfirst($user->role->name) : '' }}
                                            </div>
                                        </div>
                                    </div>
                                    <li class="user-menu__item">
                                        <a class="user-menu-link py-2 px-3 d-flex align-items-center gap-3"
                                            href="{{ route(routeNamePrefix() . 'user.profile-edit') }}">

                                            <div class=" icon-my_profile text-20 color-b-blue"></div>
                                            <div
                                                class="text-14 lineheight-24 color-b-blue text-capitalize font-weight-400">
                                                {{ trans('messages.header.My_Profile') }}</div>
                                        </a>
                                    </li>
                                    <li class="user-menu__item">
                                        <a class="user-menu-link py-2 px-3 d-flex align-items-center gap-3"
                                            href="{{ route(routeNamePrefix() . 'user.changePassword') }}">

                                            <div class=" icon-Change-password text-20 color-b-blue"></div>
                                            <div
                                                class="text-14 lineheight-24 color-b-blue text-capitalize font-weight-400">
                                                {{ trans('messages.header.Change_Password') }}</div>
                                        </a>
                                    </li>
                                    <li class="user-menu__item">
                                        <a data-name="{{ auth()->user()->name }}"
                                            class="user-menu-link py-2 px-3 d-flex align-items-center gap-3 logoutBtn"
                                            href="javascript:void(0)">
                                            <div class=" icon-logout text-20 color-b-blue"></div>
                                            <div
                                                class="text-14 lineheight-24 color-b-blue text-capitalize font-weight-400">
                                                {{ trans('messages.confirm_popup.Logout') }}</div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
</div>

@push('scripts')
    <script>
        var acceptRejectRequestUrl = "{{ route(routeNamePrefix() . 'miscellaneous.acceptRejectRequest') }}";
        var routeUrlNotification = "{{ route(routeNamePrefix() . 'miscellaneous.fetchNotifications') }}";
        var routeUrlRequest = "{{ route(routeNamePrefix() . 'miscellaneous.fetchRequests') }}";
        var logoutUrl = "{{ route(routeNamePrefix() . 'user.logout') }}";
        var logoutConfirmText = "{{ trans('messages.confirm_popup.You_are_attempting_to_log_out_of_Inmoconnect') }}";
        var loggedInAsConfirmText = "{{ trans('messages.confirm_popup.logged_in_as') }}";
        var areYouSureTextConfirmPopup = "{{ trans('messages.confirm_popup.Are_you_sure') }}";
        var logoutTextConfirmPopup = "{{ trans('messages.confirm_popup.Logout') }}";
        var acceptedRequestText = "{{ trans('messages.request_modal.accepted_request_text') }}";
        var rejectedRequestText = "{{ trans('messages.request_modal.rejected_request_text') }}";
        var loggedInUserId = "{{ auth()->user()->id }}";
    </script>
    <script src="{{ asset('assets/js/modules/includes/header.js') }}"></script>
@endpush
