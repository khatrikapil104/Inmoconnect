@extends('layouts.app')
@section('content')
    @push('styles')

        {{-- slick-slider --}}
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />

        {{-- title --}}
        @section('title')
            {{ trans('messages.properties.View_Property') }} Inmoconnect
        @endsection

        {{-- main-section --}}
        <div class="overlay" id="overlay"></div>
        <div id="page-content-wrapper" class="min-vh-100 b-color-background">
            <div class="crm-main-content">

                {{-- use this for button --}}
                <div class="position-fixed view_connect_agent">
                    <button type="button"
                        class="small-button border-r-8 b-color-primary text-14 font-weight-700 lineheight-18 color-white  d-flex align-items-center">
                        <i class=" icon-Download me-2 icon-20 color-white"></i>
                        Download Brochure</button>
                </div>
                {{-- end -use this for button --}}

            </div>
        </div>

        @push('scripts')
            <script
                src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap&libraries=places"
                defer></script>
            <script>
                var latVal = "{{ $property->latitude ?? '' }}";
                var lngVal = "{{ $property->longitude ?? '' }}";
                var isHidden = "{{ !empty($isHidden) ? 'yes' : 'no' }}";
                var propertyDeleteUrl = "{{ route(routeNamePrefix() . 'properties.destroy', ':id') }}";
                var propertyDeleteConfirmText =
                    "{{ trans('messages.confirm_popup.You_are_attempting_to_delete_Your_Property') }}";
                var areYouSureTextConfirmPopup = "{{ trans('messages.confirm_popup.Are_you_sure') }}";
                var deleteTextConfirmPopup = "{{ trans('messages.confirm_popup.Delete') }}";
                var showMoreText = "{{ trans('messages.properties.Show_More') }}";
                var showLessText = "{{ trans('messages.properties.Show_Less') }}";
            </script>
            <script src="{{ asset('assets/js/modules/properties/show_property.js') }}"></script>
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>



            {{-- <script>
                $(document).ready(function() {
                    var $slider = $('.tab-menu ul');
            
                    // Slick Slider Initialization
                    $slider.slick({
                        slidesToShow: 7,
                        slidesToScroll: 1,
                        infinite: false,
                        loop: false,
                        arrows: false,
                        responsive: [{
                                breakpoint: 1200,
                                settings: {
                                    slidesToShow: 4.5,
                                }
                            },
                            {
                                breakpoint: 1024,
                                settings: {
                                    slidesToShow: 3,
                                }
                            },
                            {
                                breakpoint: 768,
                                settings: {
                                    slidesToShow: 2,
                                }
                            },
                            {
                                breakpoint: 480,
                                settings: {
                                    slidesToShow: 1,
                                }
                            }
                        ]
                    });
            
                    
                    $('.next-tab').on('click', function(event) {
                        event.preventDefault();
                        $slider.slick('slickNext');
                        // Get the current slide index
                        var currentSlideIndex = $slider.slick('slickCurrentSlide');
                        // Remove active class from all tabs
                        $('.tab-menu li a').removeClass('active');
                        // Update the active tab
                        var tabIndex = currentSlideIndex;
                        var $tab = $('.tab-menu li:eq(' + tabIndex + ') a');
                        $tab.addClass('active');
                        // Trigger the tab click handler to update the tab box content
                        $tab.trigger('click');
                    });

                    $('.prev-tab').on('click', function(event) {
                        event.preventDefault();
                        $slider.slick('slickPrev');
                        // Get the current slide index
                        var currentSlideIndex = $slider.slick('slickCurrentSlide');
                        // Check if the slider has reached the first slide
                        if (currentSlideIndex === 0) {
                            // Trigger a click on the first tab
                            $('.tab-menu li:first-child a').trigger('click');
                        } else {
                            // Update the active tab
                            var prevTabIndex = $slider.slick('slickCurrentSlide');
                            $('.tab-menu li a').removeClass('active');
                            var $prevTab = $('.tab-menu li:eq(' + prevTabIndex + ') a');
                            $prevTab.addClass('active');
                            // Trigger the tab click handler to update the tab box content
                            $prevTab.trigger('click');
                        }
                    });
                // Tab Click Handler
                    $('.tab-menu li a').on('click', function(event) {
                        event.preventDefault(); 
                        var target = $(this).attr('data-rel');
                        $('.tab-menu li a').removeClass('active');
                        $(this).addClass('active');
                        $("#" + target).fadeIn('slow').siblings(".tab-box").hide();
                    });
                });
            </script> --}}
            <script>
                $(document).ready(function() {
                    var $slider = $('.tab-menu ul');

                    // Slick Slider Initialization
                    $slider.slick({
                        slidesToShow: 7,
                        slidesToScroll: 1,
                        infinite: false,
                        loop: false,
                        arrows: false,
                        responsive: [{
                                breakpoint: 1200,
                                settings: {
                                    slidesToShow: 4.5,
                                }
                            },
                            {
                                breakpoint: 1024,
                                settings: {
                                    slidesToShow: 3,
                                }
                            },
                            {
                                breakpoint: 768,
                                settings: {
                                    slidesToShow: 2,
                                }
                            },
                            {
                                breakpoint: 480,
                                settings: {
                                    slidesToShow: 1,
                                }
                            }
                        ]
                    });


                    $('.next-tab').on('click', function(event) {
                        event.preventDefault();
                        $slider.slick('slickNext');
                        // Get the current slide index
                        var currentSlideIndex = $slider.slick('slickCurrentSlide');
                        // Remove active class from all tabs
                        $('.tab-menu li a').removeClass('active');
                        // Update the active tab
                        var tabIndex = currentSlideIndex;
                        var $tab = $('.tab-menu li:eq(' + tabIndex + ') a');
                        $tab.addClass('active');
                        // Trigger the tab click handler to update the tab box content
                        $tab.trigger('click');
                    });

                    $('.prev-tab').on('click', function(event) {
                        event.preventDefault();
                        $slider.slick('slickPrev');
                        // Get the current slide index
                        var currentSlideIndex = $slider.slick('slickCurrentSlide');
                        // Check if the slider has reached the first slide
                        if (currentSlideIndex === 0) {
                            // Trigger a click on the first tab
                            $('.tab-menu li:first-child a').trigger('click');
                        } else {
                            // Update the active tab
                            var prevTabIndex = $slider.slick('slickCurrentSlide');
                            $('.tab-menu li a').removeClass('active');
                            var $prevTab = $('.tab-menu li:eq(' + prevTabIndex + ') a');
                            $prevTab.addClass('active');
                            // Trigger the tab click handler to update the tab box content
                            $prevTab.trigger('click');
                        }
                    });
                    // Tab Click Handler
                    $('.tab-menu li a').on('click', function(event) {
                        event.preventDefault();
                        var target = $(this).attr('data-rel');
                        $('.tab-menu li a').removeClass('active');
                        $(this).addClass('active');
                        $("#" + target).fadeIn('slow').siblings(".tab-box").hide();
                    });
                });
            </script>


            <script>
                $(document).ready(function() {

                    // Selecting Sections and Navigation Links
                    const sections = document.querySelectorAll('.card-description');
                    const navLinks = document.querySelectorAll('.tablinks');
                    const $slider = $('.view_property-page_slider');
                    const offset = 205;
                    let activeLink = null;
                    const totalTabs = navLinks.length;

                    // Slider with responsive
                    $slider.slick({
                        dots: false,
                        infinite: false,
                        speed: 300,
                        slidesToShow: 4.5,
                        slidesToScroll: 1,
                        arrows: false,
                        draggable: false,
                        responsive: [{
                                breakpoint: 1300,
                                settings: {
                                    slidesToShow: 4
                                }
                            },
                            {
                                breakpoint: 1200,
                                settings: {
                                    slidesToShow: 3
                                }
                            },
                            {
                                breakpoint: 1024,
                                settings: {
                                    slidesToShow: 3
                                }
                            },
                            {
                                breakpoint: 786,
                                settings: {
                                    slidesToShow: 2
                                }
                            },
                            {
                                breakpoint: 600,
                                settings: {
                                    slidesToShow: 1
                                }
                            }
                        ]
                    });

                    // Keyboard Navigation
                    $(document).on('keydown', function(e) {
                        if (e.key === 'ArrowRight') {
                            e.preventDefault();
                            moveSlider('next');
                        } else if (e.key === 'ArrowLeft') {
                            e.preventDefault();
                            moveSlider('prev');
                        }
                    });

                    // Button Click Events
                    $('#view_property-page_slider_prev').on('click', function(e) {
                        e.preventDefault();
                        moveSlider('prev');
                    });

                    $('#view_property-page_slider_next').on('click', function(e) {
                        e.preventDefault();
                        moveSlider('next');
                    });

                    // Moving the Slider
                    const moveSlider = (direction) => {
                        const currentIndex = $slider.slick('slickCurrentSlide');
                        if (direction === 'next' && currentIndex < totalTabs - 1) {
                            $slider.slick('slickNext');
                        } else if (direction === 'prev' && currentIndex > 0) {
                            $slider.slick('slickPrev');
                        }
                        setTimeout(updateActiveTabAndScroll, 0);
                    };

                    // Updating Active Tab and Scrolling
                    const updateActiveTabAndScroll = () => {
                        const currentIndex = $slider.slick('slickCurrentSlide');
                        const link = navLinks[currentIndex];
                        if (link) {
                            makeActive(link);
                            const targetId = link.getAttribute('data-target');
                            const targetSection = document.getElementById(targetId);
                            if (targetSection) {
                                const sectionHeight = targetSection.offsetHeight;
                                const scrollOffset = sectionHeight > 138 ? offset : 138;
                                window.scrollTo({
                                    top: targetSection.offsetTop - scrollOffset,
                                    behavior: 'smooth'
                                });
                            }
                        }
                    };

                    // Highlighting Active Tab
                    const makeActive = (link) => {
                        if (activeLink !== link) {
                            if (activeLink) {
                                activeLink.classList.remove('active');
                            }
                            if (link) {
                                link.classList.add('active');
                                activeLink = link;
                            }
                        }
                    };

                    // Observing Section Visibility
                    const sectionObserver = new IntersectionObserver((entries) => {
                        entries.forEach((entry) => {
                            if (entry.isIntersecting) {
                                const targetId = entry.target.id;
                                const link = document.querySelector(`.tablinks[data-target="${targetId}"]`);
                                makeActive(link);
                                const index = Array.from(navLinks).indexOf(link);
                                $slider.slick('slickGoTo', index);
                            }
                        });
                    }, {
                        rootMargin: `-70% 0px -90% 0px`,
                        threshold: 0
                    });

                    // Observing Each Section
                    sections.forEach((section) => {
                        sectionObserver.observe(section);
                    });

                    // Handling Tab Link Clicks
                    navLinks.forEach((link) => {
                        link.addEventListener('click', (e) => {
                            e.preventDefault();
                            const targetSectionId = link.getAttribute('data-target');
                            const targetSection = document.getElementById(targetSectionId);
                            if (targetSection) {
                                const sectionHeight = targetSection.offsetHeight;
                                const scrollOffset = sectionHeight > 138 ? offset : 138;
                                window.scrollTo({
                                    top: targetSection.offsetTop - scrollOffset,
                                    behavior: 'smooth'
                                });
                                makeActive(link);
                                const index = Array.from(navLinks).indexOf(link);
                                $slider.slick('slickGoTo', index);
                            }
                        });
                    });
                });
            </script>


            <script>
                document.addEventListener('DOMContentLoaded', function() {

                    // Selecting Slider and Buttons
                    const slider = document.getElementById('view_property-page_slider_id');
                    const prevButton = document.getElementById('view_property-page_slider_prev');
                    const nextButton = document.getElementById('view_property-page_slider_next');

                    // Setting Sticky Offsets
                    const stickyOffset = slider.offsetTop;
                    const fixedTopOffset = 30;

                    // Sticky Behavior Function
                    function updateSticky() {
                        const scrollTop = window.scrollY || window.pageYOffset;
                        if (scrollTop >= stickyOffset) {
                            slider.classList.add('fixed');
                            prevButton.classList.add('fixed');
                            nextButton.classList.add('fixed');
                        } else {
                            slider.classList.remove('fixed');
                            prevButton.classList.remove('fixed');
                            nextButton.classList.remove('fixed');
                        }
                    }

                    // Scroll Event Listener
                    window.addEventListener('scroll', updateSticky);
                    updateSticky();
                });
            </script>

            {{-- <script>
                $(document).ready(function() {
                    // Selecting Sections and Navigation Links
                    const sections = document.querySelectorAll('.card-description');
                    const navLinks = document.querySelectorAll('.tablinks');
                    const $slider = $('.view_property-page_slider');
                    const offset = 205;  
                    let activeLink = null;
                    const totalTabs = navLinks.length; 
            
                    // Slider with responsive
                    $slider.slick({
                        dots: false,
                        infinite: false, 
                        speed: 300,
                        slidesToShow: 4.5,
                        slidesToScroll: 1,
                        arrows: false,
                        draggable: false,
                        responsive: [
                            { breakpoint: 1300, settings: { slidesToShow: 4 } },
                            { breakpoint: 1200, settings: { slidesToShow: 3 } },
                            { breakpoint: 1024, settings: { slidesToShow: 3 } },
                            { breakpoint: 786, settings: { slidesToShow: 2 } },
                            { breakpoint: 600, settings: { slidesToShow: 1 } }
                        ]
                    });
            
                    // Keyboard Navigation
                    $(document).on('keydown', function(e) {
                        if (e.key === 'ArrowRight') {
                            e.preventDefault();
                            moveSlider('next');
                        } else if (e.key === 'ArrowLeft') {
                            e.preventDefault();
                            moveSlider('prev');
                        }
                    });
            
                    // Button Click Events
                    $('#view_property-page_slider_prev').on('click', function(e) {
                        e.preventDefault(); 
                        moveSlider('prev');
                    });
            
                    $('#view_property-page_slider_next').on('click', function(e) {
                        e.preventDefault(); 
                        moveSlider('next');
                    });
            
                   // Moving the Slider
                    const moveSlider = (direction) => {
                        const currentIndex = $slider.slick('slickCurrentSlide');
                        if (direction === 'next' && currentIndex < totalTabs - 1) {
                            $slider.slick('slickNext');
                        } else if (direction === 'next' && currentIndex === totalTabs - 1) {
                            // Make the last tab active
                            const lastLink = navLinks[totalTabs - 1];
                            makeActive(lastLink);
                            const targetId = lastLink.getAttribute('data-target');
                            const targetSection = document.getElementById(targetId);
                            if (targetSection) {
                                const sectionHeight = targetSection.offsetHeight; 
                                const scrollOffset = sectionHeight > 138 ? offset : 138; 
                                window.scrollTo({
                                    top: targetSection.offsetTop - scrollOffset,
                                    behavior: 'smooth'
                                });
                            }
                        } else if (direction === 'prev' && currentIndex > 0) {
                            $slider.slick('slickPrev');
                        }
                        setTimeout(updateActiveTabAndScroll, 0);
                    };
                                        // Updating Active Tab and Scrolling
                    const updateActiveTabAndScroll = () => {
                        const currentIndex = $slider.slick('slickCurrentSlide');
                        const link = navLinks[currentIndex];
                        if (link) {
                            makeActive(link);
                            const targetId = link.getAttribute('data-target');
                            const targetSection = document.getElementById(targetId);
                            if (targetSection) {
                                const sectionHeight = targetSection.offsetHeight; 
                                const scrollOffset = sectionHeight > 138 ? offset : 138; 
                                window.scrollTo({
                                    top: targetSection.offsetTop - scrollOffset,
                                    behavior: 'smooth'
                                });
                            }
                        }
                    };
            
                    // Highlighting Active Tab
                    const makeActive = (link) => {
                        if (activeLink !== link) {
                            if (activeLink) {
                                activeLink.classList.remove('active');
                            }
                            if (link) {
                                link.classList.add('active');
                                activeLink = link;
                            }
                        }
                    };
            
                    // Observing Section Visibility
                    const sectionObserver = new IntersectionObserver((entries) => {
                        entries.forEach((entry) => {
                            if (entry.isIntersecting) {
                                const targetId = entry.target.id;
                                const link = document.querySelector(`.tablinks[data-target="${targetId}"]`);
                                makeActive(link);
                                const index = Array.from(navLinks).indexOf(link);
                                $slider.slick('slickGoTo', index);
                            }
                        });
                    }, {
                        rootMargin: `-70% 0px -90% 0px`,
                        threshold: 0
                    });
            
                    // Observing Each Section
                    sections.forEach((section) => {
                        sectionObserver.observe(section);
                    });
            
                    // Handling Tab Link Clicks
                    navLinks.forEach((link) => {
                        link.addEventListener('click', (e) => {
                            e.preventDefault();
                            const targetSectionId = link.getAttribute('data-target');
                            const targetSection = document.getElementById(targetSectionId);
                            if (targetSection) {
                                const sectionHeight = targetSection.offsetHeight; 
                                const scrollOffset = sectionHeight > 138 ? offset : 138; 
                                window.scrollTo({
                                    top: targetSection.offsetTop - scrollOffset,
                                    behavior: 'smooth'
                                });
                                makeActive(link);
                                const index = Array.from(navLinks).indexOf(link);
                                $slider.slick('slickGoTo', index);
                            }
                        });
                    });
            
                    // Sticky Slider and Buttons
                    const sliderElement = document.getElementById('view_property-page_slider_id');
                    const prevButton = document.getElementById('view_property-page_slider_prev');
                    const nextButton = document.getElementById('view_property-page_slider_next');
                    const stickyOffset = sliderElement.offsetTop;
                    const fixedTopOffset = 30; 
            
                    function updateSticky() {
                        const scrollTop = window.scrollY || window.pageYOffset;
                        if (scrollTop >= stickyOffset) {
                            sliderElement.classList.add('fixed');
                            prevButton.classList.add('fixed');
                            nextButton.classList.add('fixed');
                        } else {
                            sliderElement.classList.remove('fixed');
                            prevButton.classList.remove('fixed');
                            nextButton.classList.remove('fixed');
                        }
                    }
            
                    window.addEventListener('scroll', updateSticky);
                    updateSticky(); // Ensure sticky behavior is applied on page load if scrolled
                });
            </script> --}}


        @endpush
    @endsection
