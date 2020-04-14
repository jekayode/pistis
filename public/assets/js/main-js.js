jQuery(document).ready(function($) {
    'use strict';

    if ($('.menu-list').length) {
        $('.menu-list').slimScroll({

        });


    }
    /* preloader js **/

    if ($(".preloader").length) {
        $('.preloader').delay(1000).fadeOut('slow');
    }
    /* checkboxes js **/

    if ($(".your-checkbox").length) {
        $('.your-checkbox').prop('indeterminate', true)

    }

    /* toast js **/
    
    if ($(".toast").length) {
        $('.toast').toast({

                autohide: false
            }


        )

    }
    /* menu js **/

    if ($(".dropdown-menu a.dropdown-toggle").length) {

        $('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
            if (!$(this).next().hasClass('show')) {
                $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
            }
            var $subMenu = $(this).next(".dropdown-menu");
            $subMenu.toggleClass('show');

            $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
                $('.dropdown-submenu .show').removeClass("show");
            });

            return false;
        });

    }

    /* accordion js (arrow) **/


    if ($('.collapse').length) {


        $('.collapse').on('shown.bs.collapse', function() {
            $(this).parent().find(".fa-chevron-down").removeClass("fa-chevron-down").addClass("fa-chevron-up");
        }).on('hidden.bs.collapse', function() {
            $(this).parent().find(".fa-chevron-up").removeClass("fa-chevron-up").addClass("fa-chevron-down");
        });

        $('.card-header a').click(function() {
            $('.card-header').removeClass('active');

            //If the panel was open and would be closed by this click, do not active it
            if (!$(this).closest('.card').find('.collapse').hasClass('in'))
                $(this).parents('.card-header').addClass('active');
        });

    }

    /* hero slider (index-1) **/


    if ($('.hero-slider').length) {

        $(document).ready(function() {
            $('.hero-slider').slick({
                dots: true,
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true
            });
        });

    }

    /* select2 (index-1) **/


    if ($('.select2').length) {

        $(".select2").select2();

    }


    /* hero-slider (index-1) **/


    if ($('.hero-slider').length) {

        $(window).resize(function() {
            $('.hero-slider').slick('resize');

        });

    }

    /* like-icon (index-1) **/


    if ($('.like-icon').length) {

        $('.like-icon').on('click', function(e) {
            e.preventDefault();
            $(this).toggleClass('liked');
            $(this).children('.like-icon').toggleClass('liked');
        });

    }

    /* select2-flag-icons (index-1) **/


    if ($('#select2-flag-icons').length) {

        $("#select2-flag-icons").select2({
            minimumResultsForSearch: Infinity,
            templateResult: iconFormat,
            templateSelection: iconFormat,
            escapeMarkup: function(es) { return es; }
        });

        function iconFormat(ficon) {
            var originalOption = ficon.element;
            if (!ficon.id) { return ficon.text; }
            var $ficon = "<i class='flag-icon flag-icon-" + $(ficon.element).data('flag') + "'></i>" + ficon.text;
            return $ficon;
        }

    }
    /* owl-testimonial **/


    if ($('.owl-testimonial').length) {

        $('.owl-testimonial').owlCarousel({

            loop: true,
            margin: 30,
            nav: true,
            autoplay: true,
            autoplayTimeout: 3000,
            nav: true,
            navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'],
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        });

    }

    /* owl-post-thumbnail  **/

    if ($('.owl-post-thumbnail').length) {
        $('.owl-post-thumbnail').owlCarousel({

            loop: true,
            margin: 30,
            autoplay: true,
            autoplayTimeout: 3000,
            nav: true,
            navText: ['<i class="fas fa-arrow-left"></i>', '<i class="fas fa-arrow-right"></i>'],
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 2
                }
            }
        });



    }

    if ($('.owl-post').length) {
        $('.owl-post').owlCarousel({
            loop: true,
            margin: 30,
            autoplay: true,
            autoplayTimeout: 3000,
            nav: true,
            navText: ['<i class="fas fa-arrow-left"></i>', '<i class="fas fa-arrow-right"></i>'],
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        });



    }


    /* #search-hide  **/
    if ($("#search-hide , #country , #city , #reviewlist , #reviewsort , #category , #state , #type").length) {

        $("#search-hide , #country , #city , #reviewlist , #reviewsort , #category , #state , #type").select2({
            minimumResultsForSearch: Infinity
        });
    }

    /* .listing-slider  **/
    if ($('.listing-slider').length) {
        $('.listing-slider').slick({
            dots: true,
            infinite: true,
            speed: 300,
            slidesToShow: 1,
            centerMode: true,
            centerPadding: '315px',
            autoplay: true,
            responsive: [{
                breakpoint: 1000, // or whatever breakpoint you want to render below
                settings: {
                    variableWidth: false,
                    adaptiveHeight: false,
                    centerMode: false
                }
            }]

        });






    }

    /* video play  **/
    if ($('.video-play').length) {
        $(".video-play").on('click', function(e) {
            e.preventDefault();
            var vidWrap = $(this).parent(),
                iframe = vidWrap.find('.video iframe'),
                iframeSrc = iframe.attr('src'),
                iframePlay = iframeSrc += "?autoplay=1";
            vidWrap.children('.video-thumbnail').fadeOut();
            vidWrap.children('.video-play').fadeOut();
            vidWrap.find('.video iframe').attr('src', iframePlay);


        });



    }
    /*   half-star  **/
    if ($('#rating-star').length) {

        $.fn.raty.defaults.path = 'assets/raty-js/lib/images';

        // Half Star
        $('#rating-star').raty({
            half: true,

        });
    }
    /*   half-star  **/
    if ($('#ratingstar').length) {

        $.fn.raty.defaults.path = '../assets/raty-js/lib/images';

        // Half Star
        $('#ratingstar').raty({
            half: true,

        });
    }

    /*   datepicker  **/
    if ($('#datepicker-inline').length) {
        var dateSelect = $('#datepicker-inline');
        var dateDepart = $('#start-date');
        var dateReturn = $('#end-date');
        var spanDepart = $('.date-depart');
        var spanReturn = $('.date-return');
        var spanDateFormat = 'ddd, MMMM D yyyy';

        dateSelect.datepicker({
            todayHighlight: true,
            autoclose: true,
            format: "mm/dd",
            maxViewMode: 0,
            startDate: "now"
        }).on('change', function() {
            var start = $.format.date(dateDepart.datepicker('getDate'), spanDateFormat);
            var end = $.format.date(dateReturn.datepicker('getDate'), spanDateFormat);
            spanDepart.text(start);
            spanReturn.text(end);
        });


    }

    /*   datepicker  **/
    if ($('#datepicker').length) {

        jQuery('#datepicker').datepicker({
            todayHighlight: true,
            format: 'mm/dd/yyyy',
            autoclose: true,
        });


    }


    /*   datareplace  **/
    if ($('span[data-replace]').length) {

        jQuery('body').delegate('span[data-replace]', 'click', function(event) {
            event.preventDefault();
            var older_value = jQuery(this).html();
            jQuery(this)
                .html(jQuery(this)
                    .attr('data-replace'))
                .attr('data-replace');
        });


    }

    /*   listing nav  **/
    if ($('.sticky').length) {
        $(window).scroll(function() {
            var sticky = $('.sticky'),
                scroll = $(window).scrollTop();

            if (scroll >= 100) sticky.addClass('listing-nav-fixed');
            else sticky.removeClass('listing-nav-fixed');
        });



    }

    /*   stopevent  **/
    if ($('.stopevent').length) {

        $(document).on('click.bs.dropdown.data-api', '.stopevent', function(e) {
            e.stopPropagation();
        });

    }


    /*   slider-padding **/
    if ($('#slider-padding').length) {

        var paddingSlider = document.getElementById('slider-padding');

        noUiSlider.create(paddingSlider, {
            tooltips: [wNumb({ decimals: 0, prefix: '$' }), wNumb({ decimals: 0, prefix: '$' })],
            behaviour: 'drag-tap',
            connect: true,
            range: {
                'min': 0,
                'max': 500
            },

            start: [50, 400]



        });


    }

    /*   showhidepassword **/
    if ($('.showhidepassword').length) {

        $(".showhidepassword").click(function() {

            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });

    }

    /*   showhidepassword **/
    if ($('.timer').length) {
        $('.timer').countTo();
    }
    /*   notification scrool **/
    if ($('.notification-list').length) {
        $('.notification-list').slimScroll({
            height: '350px'
        });

    }

    /*   Select all checkbox **/
    if ($('.chk_all').length) {

        $(".chk_all").click(function() {

            var checkAll = $(".chk_all").prop('checked');
            if (checkAll) {
                $(".checkboxes").prop("checked", true);
            } else {
                $(".checkboxes").prop("checked", false);
            }

        });



    }

    /*   offcanvas-collapse **/

    if ($('.offcanvas-collapse').length) {
        $('[data-toggle="offcanvas"]').on('click', function() {
            $('.offcanvas-collapse').toggleClass('open')
        })

    }

    if ($('.sidebar-nav-fixed a').length) {
        $('.sidebar-nav-fixed a')
            // Remove links that don't actually link to anything

            .click(function(event) {
                // On-page links
                if (
                    location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') &&
                    location.hostname == this.hostname
                ) {
                    // Figure out element to scroll to
                    var target = $(this.hash);
                    target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                    // Does a scroll target exist?
                    if (target.length) {
                        // Only prevent default if animation is actually gonna happen
                        event.preventDefault();
                        $('html, body').animate({
                            scrollTop: target.offset().top - 90
                        }, 1000, function() {
                            // Callback after animation
                            // Must change focus!
                            var $target = $(target);
                            $target.focus();
                            if ($target.is(":focus")) { // Checking if the target was focused
                                return false;
                            } else {
                                $target.attr('tabindex', '-1'); // Adding tabindex for elements not focusable
                                $target.focus(); // Set focus again
                            };
                        });
                    }
                };
                $('.sidebar-nav-fixed a').each(function() {
                    $(this).removeClass('active');
                })
                $(this).addClass('active');


            });

    }

    /*   datatable js **/


    if ($('#example').length) {
        $(document).ready(function() {
            $('#example').DataTable();
        });

    }

    if ($('.editor-textarea').length) {

        tinymce.init({ selector: '.editor-textarea' });

    }

    if ($('[data-toggle="tooltip"]').length) {
            $('[data-toggle="tooltip"]').tooltip()

    }



 








});