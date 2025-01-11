function setCountry(e) {
    if (e || "" == e) {
        var t = jQuery('a[cunt_code="' + e + '"]').html();
        $(".dropdown dt a span").html(t);
    }
}

function loadRecaptcha() {
    var e = document.createElement("script");
    (e.src = "https://www.google.com/recaptcha/api.js"),
    (e.async = !0),
    document.body.appendChild(e);
}

function loadVideo() {
    document.getElementById("videoWrapper").innerHTML =
        '<iframe src="https://youtu.be/gDEtKbQ5xu0" frameborder="0" allowfullscreen></iframe>';
}
$(".slick-carousel_three").slick({
        vertical: !1,
        verticalSwiping: !1,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: !1,
        speed: 1500,
        autoplaySpeed: 5e3,
        infinite: !0,
        arrows: !1,
        swipeToSlide: !1,
        swipe: !1,
        touchMove: !1,
        asNavFor: ".slick_carousel_one,.slick-carousel_two,.slick-carousel",
    }),
    $(".slick-carousel").slick({
        vertical: !0,
        verticalSwiping: !0,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: !1,
        speed: 1500,
        autoplaySpeed: 5e3,
        infinite: !0,
        arrows: !1,
        touchMove: !1,
        swipeToSlide: !1,
        swipe: !1,
        asNavFor: ".slick_carousel_one,.slick-carousel_two,.slick-carousel_three",
    }),
    $(".slick_carousel_one").slick({
        vertical: !0,
        verticalSwiping: !0,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: !1,
        speed: 1500,
        autoplaySpeed: 5e3,
        infinite: !0,
        arrows: !1,
        touchMove: !1,
        swipeToSlide: !1,
        swipe: !1,
        asNavFor: ".slick-carousel,.slick-carousel_two,.slick-carousel_three",
    }),
    $(".slick-carousel_two").slick({
        vertical: !0,
        verticalSwiping: !0,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: !0,
        speed: 1500,
        autoplaySpeed: 5e3,
        infinite: !0,
        arrows: !1,
        touchMove: !1,
        swipeToSlide: !1,
        swipe: !1,
        asNavFor: ".slick_carousel_one,.slick-carousel,.slick-carousel_three",
    }),
    AOS.init({ once: !0 }),
    $(window).scroll(function() {
        var e = $("#navbar");
        $(window).scrollTop() >= 40 ?
            e.addClass("sticky") :
            e.removeClass("sticky");
    }),
    $(document).ready(function() {
        $(".dropdown img.flag").addClass("flagvisibility"),
            $(".dropdown dt a").click(function() {
                $(".dropdown dd ul").toggle(),
                    $("#country-select").toggleClass("active");
            }),
            $(".dropdown dd ul li a").click(function() {
                var e = $(this).find(".countryName").text(),
                    t = "country-select";
                console.log(e),
                    "United Kingdom" == e && (e = "U.K"),
                    $(".dropdown dt a").find(".countryName").text(e),
                    $(".dropdown dd ul").hide(),
                    $("#result").html(
                        "Selected value is: " +
                        $("#" + t)
                        .find("dt a span.value")
                        .html()
                    ),
                    $(".dropdown dd ul").is(":hidden") &&
                    $("#country-select").removeClass("active");
            }),
            $(
                ".requestsDropdown,.notificationsDropdown,.profileDropdown"
            ).click(function() {
                $(".languagesDropdown dd ul").hide(),
                    $(".dropdown dd ul").is(":hidden") &&
                    $("#country-select").removeClass("active");
            }),
            $(document).bind("click", function(e) {
                !$(e.target).parents().hasClass("dropdown") &&
                    ($(".dropdown dd ul").hide(),
                        $(".dropdown dd ul").is(":hidden") &&
                        $("#country-select").removeClass("active")),
                    $("#flagSwitcher").click(function() {
                        $(".dropdown img.flag").toggleClass("flagvisibility");
                    });
            });
    }),
    document.querySelectorAll(".navbar-nav .nav-link").forEach((e) => {
        e.addEventListener("click", function(t) {
            var o = document.querySelector(".navbar-collapse");
            o.classList.contains("show") &&
                (o.classList.remove("show"),
                    t.preventDefault(),
                    setTimeout(function() {
                        window.location.href = e.getAttribute("href");
                    }, 500));
        });
    }),
    $(document).ready(function() {
        $("a.nav-link").on("click", function(e) {
            if ("" !== this.hash) {
                e.preventDefault();
                var t = this.hash;
                console.log("Hash:", t),
                    console.log("Offset:", 80),
                    console.log("Target Offset Top:", $(t).offset().top),
                    setTimeout(function() {
                        $("html, body").animate({ scrollTop: $(t).offset().top - 80 },
                            100
                        );
                    }, 50);
            }
        });
    }),
    document.addEventListener("DOMContentLoaded", function() {
        if (window.location.hash) {
            var e = document.querySelector(window.location.hash);
            e && e.scrollIntoView({ behavior: "smooth" });
        }
    }),
    document.addEventListener("DOMContentLoaded", function() {
        let e = document.querySelector(".navbar-toggler"),
            t = document.querySelector(".bars"),
            o = document.querySelector(".cross"),
            s = document.querySelector(".navbar-collapse");
        e.addEventListener("click", function() {
                s.classList.contains("show") ?
                    ((t.style.display = "inline-block"),
                        (o.style.display = "none")) :
                    ((t.style.display = "none"),
                        (o.style.display = "inline-block"));
            }),
            document
            .querySelector("#navbarSupportedContent")
            .addEventListener("hidden.bs.collapse", function() {
                (t.style.display = "inline-block"),
                (o.style.display = "none");
            }),
            document
            .querySelector("#navbarSupportedContent")
            .addEventListener("shown.bs.collapse", function() {
                (t.style.display = "none"),
                (o.style.display = "inline-block");
            }),
            document.querySelectorAll(".nav-link").forEach((e) => {
                e.addEventListener("click", function() {
                    (t.style.display = "inline-block"),
                    (o.style.display = "none");
                });
            });
    }),
    $(document).on("submit", "#claimYourSpotForm", function(e) {
        e.preventDefault(),
            ($btnName = $(this).find(".claimYourSpotBtn").text()),
            $(".claimYourSpotMsgErr").text("").hide(),
            $(".claimYourSpotMsgSuccess").text("").hide(),
            $(this).find(".claimYourSpotBtn").prop("disabled", !0),
            $(this)
            .find(".claimYourSpotBtn")
            .html(
                '<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> ' +
                $btnName
            );
        var t = new FormData($("#claimYourSpotForm")[0]);
        let o = {
            hasButton: !0,
            btnSelector: ".claimYourSpotBtn",
            btnText: $btnName,
            handleSuccess: function() {
                $(".claimYourSpotMsgSuccess").text(datas.msg).show(),
                    $("#claimYourSpotForm")[0].reset();
            },
            handleError: function() {
                $(".claimYourSpotMsgErr").text(errorMsg).show();
            },
            handleErrorMessages: function() {
                $.each(datas.errors, function(e, t) {
                    "terms_conditions" == e &&
                        ($("input[name=terms_conditions]")
                            .parents(".checkbox_text")
                            .next()
                            .addClass("error"),
                            $("input[name=terms_conditions]")
                            .parents(".checkbox_text")
                            .next()
                            .html(t),
                            $("input[name=terms_conditions]")
                            .parents(".checkbox_text")
                            .next()
                            .show()),
                        "g-recaptcha-response" == e &&
                        ($(".g-recaptcha-response").hide(),
                            $(".claimYourSpotMsgErr").addClass("error"),
                            $(".claimYourSpotMsgErr").html(t),
                            $(".claimYourSpotMsgErr").show());
                });
            },
        };
        makeAjaxRequest({ url: routeUrlClaimYourSpot, method: "post", data: t },
            o
        );
    }),
    $(document).on("submit", "#subscribeNewsletterForm", function(e) {
        e.preventDefault(),
            ($btnName = $(this).find(".subscribeNewsletterBtn").text()),
            $(".subscribeNewsletterMsgErr").text("").hide(),
            $(".subscribeNewsletterMsgSuccess").text("").hide(),
            $(this).find(".subscribeNewsletterBtn").prop("disabled", !0),
            $(this)
            .find(".subscribeNewsletterBtn")
            .html(
                '<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> ' +
                $btnName
            );
        var t = new FormData($("#subscribeNewsletterForm")[0]);
        let o = {
            hasButton: !0,
            btnSelector: ".subscribeNewsletterBtn",
            btnText: $btnName,
            handleSuccess: function() {
                $(".subscribeNewsletterMsgSuccess").text(datas.msg).show(),
                    $("#subscribeNewsletterForm")[0].reset();
            },
            handleError: function() {
                $(".subscribeNewsletterMsgErr").text(errorMsg).show();
            },
            handleErrorMessages: function() {
                $.each(datas.errors, function(e, t) {
                    "newsletter_email" == e &&
                        ($(".subscribeNewsletterMsgErr").addClass("error"),
                            $(".subscribeNewsletterMsgErr").html(t),
                            $(".subscribeNewsletterMsgErr").show());
                });
            },
        };
        makeAjaxRequest({ url: routeUrlSubscribeNewsletter, method: "post", data: t },
            o
        );
    }),
    window.addEventListener ?
    window.addEventListener("load", loadRecaptcha, !1) :
    window.attachEvent ?
    window.attachEvent("onload", loadRecaptcha) :
    (window.onload = loadRecaptcha),
    document.addEventListener("DOMContentLoaded", function() {
        var e = window.location.hash.substr(1);
        if ((console.log(e, "fragment"), e)) {
            var t = document.getElementById(e);
            t && t.scrollIntoView({ behavior: "smooth" });
        }
    }),
    $(window).on("load", function() {
        $("#preloader").hide();
    });
$(document).on("submit", "#claimYourSpotFormId", function(e) {
    e.preventDefault(),
        ($btnName = $(this).find(".claimYourSpotBtnId").text()),
        $(".claimYourSpotMsgErr").text("").hide(),
        $(".claimYourSpotMsgSuccess").text("").hide(),
        $(this).find(".claimYourSpotBtnId").prop("disabled", !0),
        $(this)
        .find(".claimYourSpotBtnId")
        .html(
            '<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> ' +
            $btnName
        );
    var t = new FormData($("#claimYourSpotFormId")[0]);
    let o = {
        hasButton: !0,
        btnSelector: ".claimYourSpotBtnId",
        btnText: $btnName,
        handleSuccess: function() {
            $(".claimYourSpotMsgSuccess").text(datas.msg).show(),
                $("#claimYourSpotFormId")[0].reset();
        },
        handleError: function() {
            $(".claimYourSpotMsgErr").text(errorMsg).show();
        },
        handleErrorMessages: function() {
            $.each(datas.errors, function(e, t) {
                "terms_conditions" == e &&
                    ($("input[name=terms_conditions]")
                        .parents(".checkbox_text")
                        .next()
                        .addClass("error"),
                        $("input[name=terms_conditions]")
                        .parents(".checkbox_text")
                        .next()
                        .html(t),
                        $("input[name=terms_conditions]")
                        .parents(".checkbox_text")
                        .next()
                        .show()),
                    "g-recaptcha-response" == e &&
                    ($(".g-recaptcha-response").hide(),
                        $(".claimYourSpotMsgErr").addClass("error"),
                        $(".claimYourSpotMsgErr").html(t),
                        $(".claimYourSpotMsgErr").show());
            });
        },
    };
    makeAjaxRequest({ url: routeUrlClaimYourSpotDeveloper, method: "post", data: t },
        o
    );
});