@extends('layouts.app')
@section('content')
    @push('styles')

        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.css" />
        <link rel="stylesheet" type="text/css"
            href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick-theme.min.css" />

        @section('title')
            {{ trans('messages.sidebar.Property_Search') }} Inmoconnect
        @endsection

        <div class="overlay" id="overlay"></div>
        <div class="main-content-crm b-color-background min-vh-100" id="page-content-wrapper">
            <div class="crm-main-content">

                <!-- ////////////////////////////breadcrum///////////////////////////////////// -->
                <div class="empty-search-header"
                    style='position: fixed;z-index:9999;background-color:#f6f6ff;width: calc(100% - 324px);'>
                    <div class="header-title d-flex align-items-center justify-content-between">
                        <div class="header-left-breadcrumb d-flex align-items-center">
                            <div
                                class="text-20 lineheight-24 color-primary d-inline-block breadcrumb-bottom font-weight-700 letter-s-36">
                                Property Listing
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ///////////////////////////end-breadcrum////////////////////////////////////// -->


                {{-- tabs --}}
                <!-- Hero -->
                <section class="et-hero-tabs">
                    <div class="et-hero-tabs-container">
                        <a class="et-hero-tab" href="#tab-es6">ES6</a>
                        <a class="et-hero-tab" href="#tab-flexbox">Flexbox</a>
                        <a class="et-hero-tab" href="#tab-react">React</a>
                        <a class="et-hero-tab" href="#tab-angular">Angular</a>
                        <a class="et-hero-tab" href="#tab-other">Other</a>
                        <span class="et-hero-tab-slider"></span>
                    </div>
                </section>

                <!-- Main -->
                <main class="et-main">
                    <section class="et-slide" id="tab-es6">
                        <h1>ES6</h1>
                        <h3>something about es6</h3>
                    </section>
                    <section class="et-slide" id="tab-flexbox">
                        <h1>Flexbox</h1>
                        <h3>something about flexbox</h3>
                    </section>
                    <section class="et-slide" id="tab-react">
                        <h1>React</h1>
                        <h3>something about react</h3>
                    </section>
                    <section class="et-slide" id="tab-angular">
                        <h1>Angular</h1>
                        <h3>something about angular</h3>
                    </section>
                    <section class="et-slide" id="tab-other">
                        <h1>Other</h1>
                        <h3>something about other</h3>
                    </section>
                </main>
                {{-- end-tabs --}}
            @endsection

            @push('scripts')

                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
                {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
                {{-- <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
                <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script> --}}

                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

                <script type="text/javascript">
                    $('.et-hero-tabs-container').slick({
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        arrows: true,
                        fade: true,
                        // asNavFor: '.slider-nav'
                    });
                </script>

                <script>
                    class StickyNavigation {

                        constructor() {
                            this.currentId = null;
                            this.currentTab = null;
                            this.tabContainerHeight = 70;
                            let self = this;
                            $('.et-hero-tab').click(function() {
                                self.onTabClick(event, $(this));
                            });
                            $(window).scroll(() => {
                                this.onScroll();
                            });
                            $(window).resize(() => {
                                this.onResize();
                            });
                        }

                        onTabClick(event, element) {
                            event.preventDefault();
                            let scrollTop = $(element.attr('href')).offset().top - this.tabContainerHeight + 1;
                            $('html, body').animate({
                                scrollTop: scrollTop
                            }, 600);
                        }

                        onScroll() {
                            this.checkTabContainerPosition();
                            this.findCurrentTabSelector();
                        }

                        onResize() {
                            if (this.currentId) {
                                this.setSliderCss();
                            }
                        }

                        checkTabContainerPosition() {
                            let offset = $('.et-hero-tabs').offset().top + $('.et-hero-tabs').height() - this.tabContainerHeight;
                            if ($(window).scrollTop() > offset) {
                                $('.et-hero-tabs-container').addClass('et-hero-tabs-container--top');
                            } else {
                                $('.et-hero-tabs-container').removeClass('et-hero-tabs-container--top');
                            }
                        }

                        findCurrentTabSelector(element) {
                            let newCurrentId;
                            let newCurrentTab;
                            let self = this;
                            $('.et-hero-tab').each(function() {
                                let id = $(this).attr('href');
                                let offsetTop = $(id).offset().top - self.tabContainerHeight;
                                let offsetBottom = $(id).offset().top + $(id).height() - self.tabContainerHeight;
                                if ($(window).scrollTop() > offsetTop && $(window).scrollTop() < offsetBottom) {
                                    newCurrentId = id;
                                    newCurrentTab = $(this);
                                }
                            });
                            if (this.currentId != newCurrentId || this.currentId === null) {
                                this.currentId = newCurrentId;
                                this.currentTab = newCurrentTab;
                                this.setSliderCss();
                            }
                        }

                        setSliderCss() {
                            let width = 0;
                            let left = 0;
                            if (this.currentTab) {
                                width = this.currentTab.css('width');
                                left = this.currentTab.offset().left;
                            }
                            $('.et-hero-tab-slider').css('width', width);
                            $('.et-hero-tab-slider').css('left', left);
                        }

                    }

                    new StickyNavigation();
                </script>
