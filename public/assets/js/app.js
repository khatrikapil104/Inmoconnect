
document.addEventListener('DOMContentLoaded', function () {
    // Retrieve the flash message from local storage
    var flashMessage = localStorage.getItem('flashMessage');
    var flashMessageTitle = localStorage.getItem('flashMessageTitle');
    if (flashMessage) {
        // Display the flash message using your preferred method
        show_message(flashMessage, 'success', flashMessageTitle ? { title: flashMessageTitle } : {});

        // Clear the flash message from local storage to avoid showing it again
        localStorage.removeItem('flashMessage');
        localStorage.removeItem('flashMessageTitle');
    }

    var flashMessage2Msg1 = localStorage.getItem('flashMessage2-msg1');
    var flashMessage2Msg2 = localStorage.getItem('flashMessage2-msg2');
    var flashMessage2Msg3 = localStorage.getItem('flashMessage2-msg3');
    if (flashMessage2Msg1) {
        // Display the flash message using your preferred method
        show_message2(flashMessage2Msg1, flashMessage2Msg2 ?? '', flashMessage2Msg3 ?? '');

        // Clear the flash message from local storage to avoid showing it again
        localStorage.removeItem('flashMessage2-msg1');
        localStorage.removeItem('flashMessage2-msg2');
        localStorage.removeItem('flashMessage2-msg3');
    }
});

function debounce(func, wait = 1, immediate = true) {
    var timeout;

    return function () {
        // function which stores in a variable the context of the function itself and the arguments it passes
        var context = this, args = arguments;
        // create a variable which stores a function
        var later = function () {
            // function which runs the function passed as parameter
            // if the argument immediate is passed as false
            timeout = null;
            if (!immediate) {
                func.apply(context, args);
            }
        };
        var callNow = immediate && !timeout;
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
        // or if the callNow variable is true (meaning: immediate is true and timeout is null (in other words, the time-out is not ongoing))
        if (callNow) {
            func.apply(context, args);
        }
    };
};



function checkForScroll(event) {

    const navigationBar = document.querySelector(".navbar-toggle");
    const parentElement = navigationBar.closest('#wrapper');

    if (parentElement && parentElement.classList.contains('toggled-2')) {

        navigationBar.classList.remove("navigation-bar-toggle");
    } else {

        var distanceFromTheTop = window.scrollY;

        if (distanceFromTheTop > 1) {
            navigationBar.classList.add("navigation-bar-toggle");
        }
        else {
            navigationBar.classList.remove("navigation-bar-toggle");
        }
    }
}

// Attach the function to the scroll event
window.addEventListener('scroll', checkForScroll);


// Attach the function to the scroll event
window.addEventListener('scroll', checkForScroll);


// call the debounce function passing as argument the scrolling function, as a response to the scroll event
window.addEventListener("scroll", debounce(checkForScroll));

function show_message3(message, type, attributes = {}) {
    // Get the modal element
    var modal = $('#showMessageModal');
    modal.find('.modalIcons').hide();
    modal.find('.modal-confirm').hide();
    // Set modal title and content based on the message type
    switch (type) {
        case 'success':
            modal.find('.icon-success-icon').show();
            modal.find('.modal-message').html(message);
            break;
        case 'error':
            modal.find('.icon-error-icon').show();
            modal.find('.modal-message').html(message);
            break;
        case 'warning':
            modal.find('.icon-warning-icon').show();
            modal.find('.modal-message').html(message);
            break;
        case 'confirm':
            modal.find('.icon-error-icon1').show();
            modal.find('.modal-message').html(message);
            if (attributes.hasOwnProperty('confirmMessage') && attributes.hasOwnProperty('confirmBtnText')) {
                modal.find('.modal-confirm').show();
                modal.find('.modal-confirm-message').html(attributes.confirmMessage);
                modal.find('.modal-confirm-btn-success').html(attributes.confirmBtnText);
                if (attributes.hasOwnProperty('confirmSecondaryMessage')) {
                    modal.find('.modal-confirm-secondary-text').show();
                    modal.find('.modal-confirm-secondary-text').html(attributes.confirmSecondaryMessage);
                } else {
                    modal.find('.modal-confirm-secondary-text').hide();
                }
            }
            break;
        default:
            modal.find('.modal-title').text('Info');
            modal.find('.modal-body').html('<div class="alert alert-info">' + message + '</div>');
            break;
    }


    // Show the modal
    modal.modal('show');

    // If the type is 'confirm', attach a callback to the confirmation button
    if (type === 'confirm' && attributes.hasOwnProperty('confirmMessage') && attributes.hasOwnProperty('confirmBtnText') && attributes.hasOwnProperty('callback') && typeof attributes.callback === 'function') {
        modal.find('.modal-confirm-btn-success').off('click').on('click', function () {
            // Execute the callback function when the confirmation button is clicked
            attributes.callback();
            modal.modal('hide');
        });
    }

    // showModal('confirm', 'Are you sure you want to proceed?', function() {
    //     // Code to execute when the user confirms
    //     console.log('Confirmed!');
    // });
}


function show_message(message, type, attributes = {}) {
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "1000",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };
    if (type == 'success') {
        toastr.success(message, attributes.hasOwnProperty('title') ? attributes.title : '');
        // toastr.success(message,attributes.hasOwnProperty('title') ? attributes.title : 'Success');
    } else if (type == 'error') {
        toastr.error(message, attributes.hasOwnProperty('title') ? attributes.title : '');
    } else if (type == 'warning') {
        toastr.warning(message, attributes.hasOwnProperty('title') ? attributes.title : '');
    }

}



function show_message(message, type, attributes = {}) {
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "1000",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };
    if (type == 'success') {
        toastr.success(message, attributes.hasOwnProperty('title') ? attributes.title : '');
        // toastr.success(message,attributes.hasOwnProperty('title') ? attributes.title : 'Success');
    } else if (type == 'error') {
        toastr.error(message, attributes.hasOwnProperty('title') ? attributes.title : '');
    } else if (type == 'warning') {
        toastr.warning(message, attributes.hasOwnProperty('title') ? attributes.title : '');
    }

}


function show_message2(messageFirst, messageSecond = '', messageThird = '') {
    var modal = $('#showMessageModal2');
    modal.find('.message-first').html(messageFirst);
    modal.find('.message-second').html(messageSecond);
    modal.find('.message-third').html(messageThird);

    // Show the modal
    modal.modal('show');

}

const header = document.querySelector('.header');

// Function to update z-index based on select2 state
function updateHeaderZIndex() {
    const select2Container = document.querySelector('.select2-container--open');
    if (select2Container) {
        header.style.zIndex = 9999999; // Set to high z-index when select2 is open
    } else {
        header.style.zIndex = 999999; // Reset to original z-index
    }
}

/////when modal-open background-not scroll////////////////////
$(document).ready(function () {
    $('.modal').on('shown.bs.modal', function () {
        $('html').css('overflow-y', 'hidden');
    });
    $('.modal').on('hidden.bs.modal', function () {
        $('html').css('overflow-y', 'auto');
    });
});

//datepicker open that time background-not scroll//////////////////
$('#datepicker').on('click', function () {
    console.log('Datepicker dropdown clicked');
    $('body').css('overflow-y', 'hidden');
    $('.filter_tab-content_height').css('overflow-y', 'hidden');
    $('.modal').css('overflow-y', 'hidden');
});

$('#datepicker').on('focusout', function () {
    console.log('Datepicker dropdown focusout');
    $('body').css('overflow-y', 'auto');
    $('.filter_tab-content_height').css('overflow-y', 'auto');
    $('.modal').css('overflow-y', 'auto');
});

// document.addEventListener('change', (event) => {
//     if (event.target.classList.contains('isNotifiableCheckbox')) {
//         const bellIcon = event.target.parentNode.parentNode.querySelector('.icon-bell');
//         if (event.target.checked) {
//             bellIcon.style.opacity = 1;
//         } else {
//             bellIcon.style.opacity = 0.5;
//         }
//     }
// });



// ////////////////////tab-slider in responsive z-index/////////////////////////////////
document.addEventListener('DOMContentLoaded', function () {
    const wrapper = document.querySelector('#wrapper');
    const tabSlider = document.querySelector('.tab_slider');
    const prevButton = document.querySelector('.tab_slider-main .prev');
    const nextButton = document.querySelector('.tab_slider-main .next');

    // Function to update z-index based on .toggled-2 class
    function updateZIndex() {
        if (wrapper.classList.contains('toggled-2')) {
            tabSlider.style.zIndex = '5';
            prevButton.style.zIndex = '5';
            nextButton.style.zIndex = '5';
        } else {
            tabSlider.style.zIndex = '';
            prevButton.style.zIndex = '';
            nextButton.style.zIndex = '';
        }
    }

    // Monitor changes to the #wrapper class attribute
    const observer = new MutationObserver(function (mutations) {
        mutations.forEach(function (mutation) {
            if (mutation.attributeName === 'class') {
                updateZIndex();
            }
        });
    });

    // Start observing the #wrapper for class attribute changes
    observer.observe(wrapper, { attributes: true });

    // Initial check in case the class is already there
    updateZIndex();
});


////////////////////sidebar active///////////////////////////

// Sidebar Navigation Active State
$(document).ready(function () {
    $('.sidebar-nav li a').click(function () {
        $('.sidebar-nav li a').removeClass("active");
        $(this).addClass("active");
    });
});

// Toggle Menu for Sidebar
$("#menu-toggle").click(function (e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
});

// Toggle Menu and Overlay
$("#menu-toggle-2").click(function (e) {
    e.preventDefault();

    $("#wrapper").toggleClass("toggled-2");
    $('.overlay').toggleClass('overlay-active');
});

// Function to Check Screen Width
function isSmallScreen() {
    return window.innerWidth < 998;
}




// Monitor changes in the DOM
const observer = new MutationObserver(updateHeaderZIndex);

// Start observing the body for child list changes (to detect when the select2 opens/closes)
observer.observe(document.body, { childList: true, subtree: true });

// Initial check in case the select2 is already open
updateHeaderZIndex();
// /////////////////////////close screen &  Handling Screen Resize//////////////////////

// Closing the Sidebar and Overlay When Clicking Outside
$('body').click(function (event) {
    var wrapper = $('#wrapper');
    var overlay = $('.overlay');

    if (isSmallScreen()) {

        if (!$(event.target).closest('#menu-toggle-2').length && !$(event.target).closest('.sidebar-dropdown-button').length) {

            wrapper.removeClass('toggled-2');

            overlay.removeClass('overlay-active');
        }
    }
});

// Handling Screen Resize
$(window).resize(function () {
    if (!isSmallScreen()) {

        $('#wrapper').removeClass('toggled-2');
        $('.overlay').removeClass('overlay-active');
    }
});


// //////////////////////////// language-translation //////////////////////////////

// setCountry Function
function setCountry(code) {
    if (code || code == '') {
        var text = jQuery('a[cunt_code="' + code + '"]').html();
        $(".dropdown dt a span").html(text);
    }
}

$(document).ready(function () {

    // Flag Visibility
    $(".dropdown img.flag").addClass("flagvisibility");

    // Dropdown Toggle on Click
    $(".dropdown dt a").click(function () {
        $(".dropdown dd ul").toggle();
        $("#country-select").toggleClass("active");
        var viewportWidth = $(window).width();

        if (viewportWidth <= 576 && $("#country-select").hasClass("active")) {
            $(".navbar-toggle").addClass("hide-toggle");
        } else {
            $(".navbar-toggle").removeClass("hide-toggle");
        }
    });

    // Dropdown Item Selection
    $(".dropdown dd ul li a").click(function () {
        var text = $(this).html();
        $(".dropdown dt a span").html(text);
        $(".dropdown dd ul").hide();
        $("#result").html("Selected value is: " + getSelectedValue("country-select"));
    });

    // Hiding the Language Dropdown on Specific Dropdown Clicks
    $(".requestsDropdown,.notificationsDropdown,.profileDropdown,.messagesDropdown").click(function () {
        $(".languagesDropdown dd ul").hide();
        $("#country-select").removeClass("active");

    });

    // Retrieving the Selected Value from a Dropdown
    function getSelectedValue(id) {
        return $("#" + id).find("dt a span.value").html();
    }

    // Hide Dropdown on Click Outside
    $(document).bind('click', function (e) {
        var $clicked = $(e.target);
        if (!$clicked.parents().hasClass("dropdown")) {
            $(".dropdown dd ul").hide();
            $("#country-select").removeClass("active");
            var viewportWidth = $(window).width();

            if (viewportWidth <= 576 && $("#country-select").hasClass("active")) {
                $(".navbar-toggle").addClass("hide-toggle");
            } else {
                $(".navbar-toggle").removeClass("hide-toggle");
            }
        }

        // Flag Visibility Toggle
        $("#flagSwitcher").click(function () {
            $(".dropdown img.flag").toggleClass("flagvisibility");
        });

    })
});


//////////////////// header-notification///////////////////////////

// Mouseover Events
$(".notificationsDropdown").on("mouseover", function () {
    var viewportWidth = window.innerWidth || document.documentElement.clientWidth;
    if (viewportWidth >= 576) {
        $(".navbar-toggle ").css("visibility", "visible");
    } else {
        $(".navbar-toggle ").css("visibility", "hidden");
    }
});

// Mouseout Events
$(".notificationsDropdown").on("mouseout", function () {
    $(".navbar-toggle").css("visibility", "visible");
});

// Mouseover Events
$(".requestsDropdown").on("mouseover", function () {
    var viewportWidth = window.innerWidth || document.documentElement.clientWidth;
    if (viewportWidth >= 576) {
        $(".navbar-toggle ").css("visibility", "visible");
    } else {
        $(".navbar-toggle ").css("visibility", "hidden");
    }
});

// Mouseout Events
$(".requestsDropdown").on("mouseout", function () {
    $(".navbar-toggle").css("visibility", "visible");
});

// Mouseover Events
$(".messagesDropdown").on("mouseover", function () {
    var viewportWidth = window.innerWidth || document.documentElement.clientWidth;
    if (viewportWidth >= 576) {
        $(".navbar-toggle ").css("visibility", "visible");
    } else {
        $(".navbar-toggle ").css("visibility", "hidden");
    }
});

// Mouseout Events
$(".messagesDropdown").on("mouseout", function () {
    $(".navbar-toggle").css("visibility", "visible");
});


//////////////// sidebar-dropdown/////////////////////////////

// DOM Content Loaded Event
document.addEventListener('DOMContentLoaded', function () {

    // Selecting Dropdown Elements
    const dropdowns = document.querySelectorAll(".dropdown-one");

    // Toggle Dropdown Function
    function toggleDropdown(dropdown, shouldOpen, transition = true) {
        const dropdownContent = dropdown.querySelector('.dropdown-content-one');

        if (!transition) {
            dropdownContent.classList.add('no-transition');
        }

        if (shouldOpen) {
            dropdownContent.style.maxHeight = `${dropdownContent.scrollHeight}px`;
        } else {
            dropdownContent.style.maxHeight = null;
        }
        dropdown.classList.toggle('open', shouldOpen);

        if (!transition) {
            setTimeout(() => {
                dropdownContent.classList.remove('no-transition');
            }, 0);
        }
    }

    // Open Dropdown for Active Link Function
    function openDropdownForActiveLink(link) {
        const parentDropdown = link.closest('.dropdown-one');
        if (parentDropdown) {
            toggleDropdown(parentDropdown, true, false);
        }
    }

    // Check Dropdowns for Active Links Function
    function checkDropdownsForActiveLinks() {
        dropdowns.forEach(dropdown => {
            const activeLink = dropdown.querySelector('.dropdown-content-one a.active.none_black');
            if (activeLink) {
                openDropdownForActiveLink(activeLink);
            }
        });
    }

    // Adding Event Listeners to Dropdowns
    dropdowns.forEach(dropdown => {
        dropdown.querySelector('.dropbtn-one').addEventListener('click', () => {
            const isOpen = dropdown.classList.contains('open');
            toggleDropdown(dropdown, !isOpen);
        });

        // Adding Event Listeners to Links
        dropdown.querySelectorAll('.dropdown-content-one a').forEach(link => {
            link.addEventListener('click', function (event) {
                const activeLink = dropdown.querySelector('.dropdown-content-one a.active');
                if (activeLink) {
                    activeLink.classList.remove('active');
                }
                link.classList.add('active');

                // Open dropdown for the active link
                openDropdownForActiveLink(link);

                // If the link has a href attribute, allow navigation to the specified URL
                if (link.getAttribute('href')) {
                    return;
                }

                // Prevent default action if the link does not have a href attribute
                event.preventDefault();
            });
        });
    });

    // Check Dropdowns for Active Links on Page Load
    checkDropdownsForActiveLinks();
});


// /////////////////header-z-index when modal open///////////////
$(document).on('show.bs.modal', function () {
    setTimeout(function () {
        $('header').css('z-index', '5');
        $('.property_view_breadcrumb').css('z-index', '5');
        $('.tab_slider').css('z-index', '5');
        $('.tab_slider-main .prev').css('z-index', '5');
        $('.tab_slider-main .next').css('z-index', '5');
    }, 0);
});

$(document).on('hidden.bs.modal', function () {
    $('.property_view_breadcrumb').css('z-index', '');
    $('.tab_slider').css('z-index', '5');
    $('.tab_slider-main .prev').css('z-index', '5');
    $('.tab_slider-main .next').css('z-index', '5');

    // Check if any modal is still open
    if ($('.modal.show').length === 0) {
        $('header').css('z-index', '');
    }
});

///////////////////// fancybox-open header z-index/////////////////////////////////
// const header = document.getElementById('header');
// const fancyboxContainer = document.querySelector('.fancybox__container');
// fancyboxContainer.addEventListener('DOMAttrModified', () => {
//     if (fancyboxContainer.classList.contains('has-toolbar') && fancyboxContainer.classList.contains('is-idle')) {
//         header.style.zIndex = 5;
//     } else {
//         header.style.zIndex = '';
//     }
// });









