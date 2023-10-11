(function ($) {
    var mobileBreakpoint = '980';

    var sliderButtonLeft = '<button type="button" class="slick-arrow slick-prev"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16.866 29.009"><path data-name="Tracé 1" d="M13.44 2.12L1.501 14.951 14.749 26.89" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"/></svg></button>';
    var sliderButtonRight = '<button type="button" class="slick-arrow slick-next"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16.866 29.009"><path data-name="Tracé 2" d="M3.426 26.889l11.939-12.831L2.117 2.119" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"/></svg></button>';

    $(document).on('ready', function () {
        menuManager();
        headerManager();

        floatingButtonManager();

        accordionsManager();

        popinsManager();

        formsManager();

        customSelectsManager();

        if ($('body.home').length === 1) {
            initHome();
        }

        if ($('#slider-training-testimonies').length === 1) {
            initTestimoniesSlider();
        }

        if ($('#slider-problematics').length === 1) {
            problematicsManager();
        }

        if ($('#slider-blog-last-posts').length === 1) {
            blogPostSliderManager();
        }

        $('#footer-send-message').on('click', function () {
            $('.floating-button-container').addClass('is-open');
        });
    });

    function menuManager() {
        // Ouverture du menu au clic sur le bouton 'hamburger' (mobile)
        $('.header-container').on('click', '.button-toggle-menu', function () {
            $(this).toggleClass('is-open');

            $('.header-menu').toggleClass('is-open');

            $('body').toggleClass('no-scroll');
        });

        $('.main-navigation').on('click', '.menu-item-has-children', function (event) {
            $(this).toggleClass('is-open');
        });

        // Bidouille pour gérer l'ouverture d'un sous-menu desktop sur un écran tactile
        $('.main-navigation').on('mouseenter', '.menu-item-has-children > a', function (event) {
            var self = this;
            setTimeout(function () {
                $(self).addClass('is-hover');
            }, 10);
        });
        $('.main-navigation').on('mouseleave', '.menu-item-has-children > a', function (event) {
            $(this).removeClass('is-hover');
        });

        $('.main-navigation').on('click', '.menu-item-has-children > a', function (event) {
            if (!$(this).is(['href'])) {
                $(this).closest('.menu-item-has-children').trigger('click');;
            }
            event.stopPropagation();

            if ($(window).width() >= mobileBreakpoint) {
                if (!$(this).hasClass('is-hover')) {
                    event.preventDefault();
                }

                $('.main-navigation .menu-item-has-childr.menu-item-has-childreen > a').removeClass('is-hover');
            }
        });

        // Sur mobile, on ouvre le sous menu de la page courante
        $('.main-navigation .current-page-ancestor, .main-navigation .current-menu-parent').addClass('is-open');
    }

    function headerManager() {
        // Apparition/disparition du menu au scroll
        var lastScroll = $(window).scrollTop();
        var headerHeight = $("#masthead").height();

        $(window).on("scroll", function () {
            var delta = $(window).scrollTop() - lastScroll;

            if (delta > 0 && !$("#masthead").hasClass("close") && $(window).scrollTop() >= headerHeight) { // Scroll vers le bas
                if (!$("#navbar").hasClass("open") && !$("#search-container").hasClass("open")) {
                    $("#masthead").addClass("close");
                }
            } else if (delta < 0 && $("#masthead").hasClass("close")) { // Scroll vers le haut
                $("#masthead").removeClass("close");
            }

            lastScroll = $(window).scrollTop();
        });
    }

    function floatingButtonManager() {
        $('.floating-button-container').on('click', '.floating-button', function () {
            $(this).closest('.floating-button-container').toggleClass('is-open');
        });

        $('.floating-button-container').on('click', '.floating-button-container-close', function () {
            $(this).closest('.floating-button-container').removeClass('is-open');
        });
    }

    function accordionsManager() {
        $('.accordion').on('click', '.accordion-title', function () {
            $(this).closest('.accordion').toggleClass('is-open');
        });
    }

    function popinsManager() {
        $('[data-open-popin]').on('click', function () {
            $('[data-popin="' + $(this).data('open-popin') + '"], .popin-overlay').addClass('is-open');
        });

        var closePopin = function () {
            $('[data-popin], .popin-overlay').removeClass('is-open');
        };

        $('.popin-overlay').on('click', function () {
            closePopin();
        });
        $('.popin').on('click', '.popin-close', function () {
            closePopin();
        });
    }

    function formsManager() {
        $('[data-request]').on('click', function () {
            if ($(this).data('form')) { // Ancre
                var value = $('[name="form-' + $(this).data('form') + '"] [name="Dropdown"] [data-value="' + $(this).data('request') + '"]').val();
                $('[name="form-' + $(this).data('form') + '"] [name="Dropdown"]').val(value);
            } else { // Ouverture popin
                var value = $('[data-popin="' + $(this).data('open-popin') + '"] [name="Dropdown"] [data-value="' + $(this).data('request') + '"]').val();
                $('[data-popin="' + $(this).data('open-popin') + '"] [name="Dropdown"]').val(value);
            }
        });
    }

    function customSelectsManager() {
        var closeCustomSelect = (selectToOpen, mouseClickOutside) => {
            $('[data-open-select]').removeClass("is-open");
            $(selectToOpen).removeClass("is-open");

            $(document).off("click", mouseClickOutside);
        };

        $('[data-open-select]').on('click', function () {
            var self = this;
            $(this).toggleClass('is-open');
            $('[data-select="' + $(this).data('open-select') + '"]').toggleClass('is-open');

            const timerCloseCustomSelect = setTimeout(() => {
                clearTimeout(timerCloseCustomSelect);

                var mouseClickOutside;
                if ($('[data-select="' + $(this).data('open-select') + '"]').hasClass('is-open')) {
                    $(document).on('click', mouseClickOutside = function (event) {
                        if (event.target !== $(self)) {
                            closeCustomSelect($('[data-select="' + $(self).data('open-select') + '"]'), mouseClickOutside);
                        }
                    });
                }
            }, 10);
        });
    }

    function initHome() {
        // Slider solutions (tout en haut)
        new VecCarousel({
            vecCarousel: '#slider-solutions', // id de la div contenant les éléments du carousel
            nbItems: 1, // Nombre d'éléments par écran
            fillWithBlank: true, // Remplir les blancs du dernier écran (s'il y en a) par des items vides (utile notamment lorsque les éléments d'un écran sont justifiés)
            hasArrows: false, // Si on active les flèches
            hasNavigation: true, // Si on active les boutons de navigation
            isLooping: true, // Si on souhaite que le carrousel puisse boucler (mettre à true seulement si on ne met pas de timer)
            timerDuration: 6000, // Durée du slide automatique, en millisecondes (mettre 0 ou ne pas renseigner pour qu'il n'y ait pas de slide automatique)
            stopOnMouseOver: false, // Si on stoppe le slide dans le cas où la souris survole le carrousel
            threshold: 100, // Distance en pixels que l'on doit parcourir au touch sur surface tactile pour déclencher un slide (50 par défaut)
            transition: 'slide', // Type de transition (slide ou fade)
            durationTransition: 600, // Durée (en millisecondes) de la durée de la transition
            waitImagesLoaded: false, // Direction d'animation (horizontal ou vertical)
            screenHeightOffset: 0, // Hauteur à ajouter à la hauteur calculée du carousel
        });

        // Slider références clients
        $('#slider-customer-references').slick({
            centerMode: true,
            slidesToScroll: 1,
            centerPadding: '60px',
            slidesToShow: 2,
            mobileFirst: true,
            arrows: true,
            dots: false,
            infinite: true,
            draggable: false,
            prevArrow: sliderButtonLeft,
            nextArrow: sliderButtonRight,
            responsive: [
                {
                    breakpoint: 980,
                    settings: {
                        centerPadding: '0px',
                        slidesToShow: 6,
                    },
                },
            ],
        });
    }

    function initTestimoniesSlider() {
        // Slider témoignages
        $('#slider-training-testimonies').slick({
            slidesToScroll: 1,
            slidesToShow: 1,
            mobileFirst: true,
            arrows: true,
            dots: true,
            infinite: true,
            draggable: false,
            adaptiveHeight: true,
            prevArrow: sliderButtonLeft,
            nextArrow: sliderButtonRight,
        });
    }

    // Slider problématiques
    function problematicsManager() {
        $('#slider-problematics').on('init', function () {
            $(this).addClass('is-loaded');
        });

        var problematicSlider = $('#slider-problematics').slick({
            centerMode: true,
            slidesToScroll: 1,
            centerPadding: '50px',
            slidesToShow: 1,
            mobileFirst: true,
            arrows: true,
            dots: false,
            infinite: true,
            draggable: false,
            prevArrow: sliderButtonLeft,
            nextArrow: sliderButtonRight,
            responsive: [
                {
                    breakpoint: 440,
                    settings: {
                        centerPadding: '100px',
                    },
                },
                {
                    breakpoint: 680,
                    settings: {
                        centerPadding: '160px',
                    },
                },
                {
                    breakpoint: 768,
                    settings: {
                        centerPadding: '50px',
                        slidesToShow: 3,
                    },
                },
                {
                    breakpoint: 1300,
                    settings: {
                        centerPadding: '250px',
                        slidesToShow: 3,
                    },
                },
                {
                    breakpoint: 1540,
                    settings: {
                        centerPadding: '300px',
                        slidesToShow: 3,
                    },
                },
            ],
        });

        // Effet au survol sur un slide
        // var problematicSlideInformationsDisplayDuration = getDurationTransition('#slider-problematics .slider-problematics-content-hidden');
        $('#slider-problematics').on('mouseenter', '.slide-content', function () {
            $(this).addClass('is-over');

            var hiddenContentHeight = 0;
            $(this).find('.slider-problematics-content-hidden > *').each(function () {
                hiddenContentHeight += $(this).outerHeight(true);
            });

            var $currentContent = $(this).find('.slider-problematics-content-hidden');
            $(this).find('.slider-problematics-content-hidden').css({
                'height': hiddenContentHeight + 'px',
                'opacity': '1',
            });
            // $currentContent.css({'height': hiddenContentHeight + 'px'});
            // $currentContent.css({'height': hiddenContentHeight + 'px', 'opacity': '1'});

            // var problematicSlideInformationsDisplayTimer = setTimeout(function () {
            //     clearTimeout(problematicSlideInformationsDisplayTimer);

            //     $currentContent.css({'opacity': '1'});
            // }, problematicSlideInformationsDisplayDuration);
        });
        $('#slider-problematics').on('mouseleave', '.slide-content', function () {
            $(this).removeClass('is-over');
            $(this).find('.slider-problematics-content-hidden').css({
                'height': '0',
                'opacity': '0',
            });
        });

        // Au clic sur un slide
        $('#slider-problematics').on('click', '.slide-content', function () {
            if ($(window).width() < 768) { // Sur les petites résolutions, où on n'a qu'un slide d'affiché
                if ($(this).closest('[data-slick-index]').data('slick-index') > problematicSlider.slick('slickCurrentSlide')) {
                    problematicSlider.slick('slickNext');
                } else if ($(this).closest('[data-slick-index]').data('slick-index') < problematicSlider.slick('slickCurrentSlide')) {
                    problematicSlider.slick('slickPrev');
                }
            }
        });

        // Au choix d'une 'problématique'
        var problematicChoice = function (problematicValue, problematicText) {
            if (problematicValue !== '') {
                var indexToSlide = null;
                if (+$('#slider-problematics [data-slick-index="' + problematicSlider.slick('slickCurrentSlide') + '"]').data('problematic') === +problematicValue) { // On est déjà sur la problématique sélectionnée -> on se rend sur le premier slide de la problématique avant le slide courant
                    var currentFound = false;
                    for (var i = $('#slider-problematics .slick-slide').length - 1; i >= 0; i--) {
                        if (currentFound) {
                            if (+$($('#slider-problematics .slick-slide')[i]).data('problematic') === +problematicValue) {
                                if (i === 0) {
                                    indexToSlide = +$($('#slider-problematics .slick-slide')[i]).data('slick-index');
                                } else {
                                    if (+$($('#slider-problematics .slick-slide')[i - 1]).data('problematic') !== +problematicValue) {
                                        indexToSlide = +$($('#slider-problematics .slick-slide')[i]).data('slick-index');

                                        break;
                                    }
                                }
                            }
                        } else {
                            if (+$($('#slider-problematics .slick-slide')[i]).data('slick-index') === problematicSlider.slick('slickCurrentSlide')) {
                                if (+$($('#slider-problematics .slick-slide')[i]).data('problematic') === +problematicValue) {
                                    if (i > 0) {
                                        if (+$($('#slider-problematics .slick-slide')[i - 1]).data('problematic') !== +problematicValue) {
                                            break;
                                        }
                                    } else {
                                        break;
                                    }
                                }

                                currentFound = true;
                            }
                        }
                    }
                } else { // On n'est pas sur la problématique sélectionnée -> on se rend sur le prochain slide de la problématique après le slide courant
                    var currentFound = false;
                    for (var i = 0; i <  $('#slider-problematics .slick-slide').length; i++) {
                        if (currentFound) {
                            if (+$($('#slider-problematics .slick-slide')[i]).data('problematic') === +problematicValue) {
                                indexToSlide = +$($('#slider-problematics .slick-slide')[i]).data('slick-index');

                                break;
                            }
                        } else {
                            if (+$($('#slider-problematics .slick-slide')[i]).data('slick-index') === problematicSlider.slick('slickCurrentSlide')) {
                                currentFound = true;
                            }
                        }
                    }
                }

                if (indexToSlide !== null) {
                    problematicSlider.slick('slickGoTo', indexToSlide);
                }
            }

            $("#problematic-choice-tmp-option").text(problematicText);
            $('.slider-problematics-block [name="problematic-choice"]').width($("#problematic-choice-tmp").width());
        };

        $('.slider-problematics-block').on('change', '[name="problematic-choice"]', function () {
            problematicChoice($(this).val(), $(this).find(':selected').text());
        });

        problematicChoice($('.slider-problematics-block [name="problematic-choice"]').val(), $('.slider-problematics-block [name="problematic-choice"]').find(':selected').text()); // Pour positionner le slider à l'ouverture de la page
        setTimeout(function () { // Pour être sûr que la liste déroulante prenne la bonne largeur au chargement de la page
            problematicChoice($('.slider-problematics-block [name="problematic-choice"]').val(), $('.slider-problematics-block [name="problematic-choice"]').find(':selected').text()); // Pour positionner le slider à l'ouverture de la page
        }, 200);
    }

    function blogPostSliderManager() {
        // Slider derniers articles du blog
        $('#slider-blog-last-posts').slick({
            centerMode: true,
            centerPadding: '30px',
            slidesToScroll: 1,
            slidesToShow: 1,
            mobileFirst: true,
            arrows: true,
            dots: false,
            infinite: true,
            draggable: false,
            focusOnSelect: false,
            prevArrow: sliderButtonLeft,
            nextArrow: sliderButtonRight,
            responsive: [
                {
                    breakpoint: 650,
                    settings: {
                        centerPadding: '50px',
                        slidesToShow: 2,
                    },
                },
                {
                    breakpoint: 980,
                    settings: {
                        centerMode: false,
                        slidesToShow: 3,
                    },
                },
            ],
        });
    }

    // function isTouchEnabled() {
    //     return ('ontouchstart' in window || navigator.maxTouchPoints > 0 || navigator.msMaxTouchPoints > 0);
    // }
})(jQuery);

function getCookie(cname) {
    var name = cname + '=';
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');

    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];

        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }

        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }

    return '';
}

function getCookieValue(cookie, cname) {
    // var keyValues = cookie.split('!').filter(function (aKeyValue) {
    //     return aKeyValue.trim() !== '';
    // });

    var keyValues = cookie.split('!');

    for (var i = 0; i < keyValues.length; i++) {
        if (keyValues[i].indexOf(cname + '=') === 0) {
            return keyValues[i].substring((cname + '=').length);
        }
    }

    return '';
}

function getDurationTransition(selector, indexArray) {
    var durationTransition = jQuery(selector).css('transition-duration');

    if (typeof(indexArray) !== 'undefined') {
        durationTransitionArray = [];
        durationTransitionArray = durationTransition.split(',');

        durationTransition = durationTransitionArray[indexArray];
    }

    durationTransition = durationTransition.substring(0, durationTransition.length - 1);
    durationTransition = durationTransition.replace('.', '');
    durationTransition *= 1000;

    return durationTransition;
}
