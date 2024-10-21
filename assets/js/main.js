$(document).ready(function () {
    loader()
    aside()
    header()
    // cursor()
    // boxes()
    fadeIn()
    animateCounters()
    circleSvg()
    // carousel()
    wrapperDistance()
    horizontalScroll()
    slider()
    bannerCursor()

    $(window).on('resize', function () {
        wrapperDistance()
        aside()
        header()
    })

})

function wrapperDistance() {
    // let distance = $('.wrapper').offset().left
    let distanceSobre = $('.sobre').offset().left
    let distanceEspecialista = $('.eventos-lives__especialista').offset().left
    let distanceCarrosel = $('.eventos-lives__texto-carrosel').offset().left

    // $('.wrapper-left').each(function (item) {
    //     item.css('padding-left', `${distance}px`)
    // })
    // $('.wrapper-right').each(function (item) {
    //     item.css('padding-right', `${distance}px`)
    // })

    // $('.wrapper-full').each(function (item) {
    //     item.css('padding-left', `${distance}px`)
    //     item.css('padding-right', `${distance}px`)
    // })

    $('.sobre').css({
        'padding-left': `${distanceSobre}px`,
        'padding-right': `${distanceSobre}px`,
        'margin': 'initial',
        'max-width': '100%',
        'width': '100%',
    })

    $('.eventos-lives__especialista').css({
        'padding-left': `${distanceEspecialista}px`,
        'padding-right': `${distanceEspecialista}px`,
        'margin': 'initial',
        'max-width': '100%',
        'width': '100%',
    })

    $('.eventos-lives__texto-carrosel').css({
        'padding-left': `${distanceCarrosel}px`,
        'padding-right': `${distanceCarrosel}px`,
        'margin': 'initial',
        'max-width': '100%',
        'width': '100%',
    })
}

function loader() {
    gsap.to('.loader > svg', {
        rotate: 360,
        duration: 2,
        repeat: -1,
        ease: "power1.inOut",
    })

    checkIfPageLoaded()
}

function checkIfPageLoaded() {
    if (document.readyState === 'complete') {
        setTimeout(() => {
            $('.loader').removeClass('loader--active')
        }, 3000)
    } else {
        $(window).on('load', function () {
            setTimeout(() => {
                $('.loader').removeClass('loader--active')
            }, 3000)
        })
    }
}

function aside() {
    if($(window).width() < 901) { return }

    const menuButton = $('.aside__button')

    menuButton.on('click', function () {
        $(this).toggleClass('aside__button--active')
        $('.aside').toggleClass('aside--menuopen')
    })

    const sectionHeight = $('.banner').height()

    $(window).scroll(function () {
        var scrollPosition = $(this).scrollTop()

        if (scrollPosition > sectionHeight) {
            $('.aside').addClass('aside--hide')
            $('.aside').removeClass('aside--menuopen')

            $(window).mousemove(function (event) {
                if (event.pageX <= 5) {
                    $('.aside').removeClass('aside--hide')
                } else {
                    if (!$('.aside').is(':hover')) {
                        if ($('.aside').hasClass('aside--menuopen')) {
                            return
                        }

                        $('.aside__button').removeClass('aside__button--active') 
                        $('.aside').addClass('aside--hide')
                    }
                }
            })
        } else {
            $('.aside').removeClass('aside--hide')

            $(window).mousemove(function (event) {
                $('.aside').removeClass('aside--hide')
            })
        }
    })
}

function header() {
    if($(window).width() > 900) { return }

    const menuButton = $('.header__button')

    menuButton.on('click', function () {
        $(this).toggleClass('header__button--active')
        $('.header').toggleClass('header--menuopen')
    })

    const sectionHeight = $('.banner').height()

    $(window).scroll(function () {
        var scrollPosition = $(this).scrollTop()

        if (scrollPosition > sectionHeight) {
            $('.header').addClass('header--hide')
            $('.header').removeClass('header--menuopen')

            $(window).mousemove(function (event) {
                if (event.pageX <= 5) {
                    $('.header').removeClass('header--hide')
                } else {
                    if (!$('.header').is(':hover')) {
                        if ($('.header').hasClass('header--menuopen')) {
                            return
                        }

                        $('.header').addClass('header--hide')
                    }
                }
            })
        } else {
            $('.header').removeClass('header--hide')

            $(window).mousemove(function (event) {
                $('.header').removeClass('header--hide')
            })
        }
    })
}

function bannerCursor() {
    const $bannerCursor = $('.banner__cursor');

    // Mouse move event to track cursor position
    $(window).mousemove(function (event) {
        $bannerCursor.css({
            left: event.pageX,
            top: event.pageY,
            cursor: 'none'
        });
    });

    // Variable to store the Y position of the mouse
    let mouseY = 0;

    $(window).on('mousemove', function (event) {
        mouseY = event.pageY;  // Store the current Y position of the mouse
    });

    // Mouse wheel event to maintain the Y position of the mouse while scrolling
    $(document).on('mousewheel', function () {
        $bannerCursor.css({
            top: mouseY  // Keep the Y position constant during scroll
        });
    });
}

function cursor() {
    if (window.matchMedia('(pointer: coarse)').matches) {
        $('.gui-cursor').remove()
        return
    }

    const $customCursor = $('.gui-cursor')
    const $bannerCursor = $('.banner__cursor')

    let mouseX = 0, mouseY = 0
    let cursorX = 0, cursorY = 0

    $(document).on('mousemove', function (e) {
        mouseX = e.pageX
        mouseY = e.pageY
    })

    function animateCursor() {
        const distX = mouseX - cursorX
        const distY = mouseY - cursorY

        cursorX += distX * 0.1
        cursorY += distY * 0.1


        $customCursor.css({
            left: `${cursorX}px`,
            top: `${cursorY}px`
        })

        $bannerCursor.css({
            left: `${cursorX}px`,
            top: `${cursorY}px`
        })

        requestAnimationFrame(animateCursor)
    }

    animateCursor()

    const $elements = $('a, button, .loader')
    $elements.on('mouseenter', function () {
        $('.gui-cursor').css({
            width: '4rem',
            height: '4rem',
            borderWidth: '.7rem'
        })
    })
    $elements.on('mouseleave', function () {
        $('.gui-cursor').css({
            width: '2rem',
            height: '2rem',
            borderWidth: '.3rem'
        })
    })
}

function boxes() {
    gsap.registerPlugin(ScrollTrigger)

    const boxesSection = document.querySelector('.boxes')

    // Pinning the boxes section
    gsap.from(boxesSection, {
        scrollTrigger: {
            trigger: boxesSection,
            start: "top center", // Pin the section when it hits the center of the viewport
            end: "bottom top",    // Unpin when the bottom of the section reaches the top of the viewport
            pin: true,           // Pin it in place
            markers: true,       // Enable markers for debugging
        }
    })

    // Target all boxes__cards elements
    const cards = gsap.utils.toArray('.boxes__card')

    // Loop through each card and set up animation
    cards.forEach(function (card, index) {
        gsap.from(card, {
            opacity: 0,             // Start hidden
            y: 100,                 // Start 100px below the final position
            duration: 0.6,          // Animation duration
            scrollTrigger: {
                trigger: boxesSection, // Use the main section as the trigger
                start: `top ${index * 30 + 60}vh`, // Adjust the start position to trigger when the section is more visible
                toggleActions: "play none none reverse",  // Play on scroll down, reverse on scroll up
                once: false,          // Animation plays every time you scroll into view
                markers: true         // Enable markers for debugging
            }
        })
    })
}

function horizontalScroll() {    
    let logo = horizontalLoop('.logos-container figure', {speed: 1, repeat: -1, paddingRight: 0, center: true,});
    gsap.to(logo, {timeScale: 1, duration: 0.4, ease: "power1.inOut"});

    let lives = horizontalLoop('.eventos-lives__container figure', {speed: 1, repeat: -1, paddingRight: 32, center: true,});
    gsap.to(lives, {timeScale: 1, duration: 0.4, ease: "power1.inOut"});

    let testimonials = horizontalLoop('.eventos-lives__testimonials-container blockquote', {speed: 1, repeat: -1, paddingRight: 50, center: true,});
    gsap.to(testimonials, {timeScale: -1, duration: 0.4, ease: "power1.inOut"});

    let midia = horizontalLoop('.na-midia__container .na-midia__item', {speed: 1, repeat: -1, paddingRight: 0, center: true,});
    gsap.to(midia, {timeScale: -1, duration: 0.4, ease: "power1.inOut"});

    addHoverPause('.logos-container', logo);
    addHoverPause('.eventos-lives__container', lives);
    addHoverPause('.eventos-lives__testimonials-container', testimonials);
    addHoverPause('.na-midia__container', midia);
}

function addHoverPause(containerSelector, timeline) {
    let container = document.querySelector(containerSelector);
    container.addEventListener('mouseenter', () => {
        gsap.to(timeline, {timeScale: 0, duration: 0.4, ease: "power1.inOut"});
    });
    container.addEventListener('mouseleave', () => {
        let direction = timeline.timeScale() > 0 ? 1 : -1;
        gsap.to(timeline, {timeScale: direction, duration: 0.4, ease: "power1.inOut"});
    });
}

function horizontalLoop(items, config) {
    items = gsap.utils.toArray(items);
    config = config || {};
    let tl = gsap.timeline({repeat: config.repeat, paused: config.paused, defaults: {ease: "none"}, onReverseComplete: () => tl.totalTime(tl.rawTime() + tl.duration() * 100)});
    let length = items.length,
        startX = items[0].offsetLeft,
        times = [],
        widths = [],
        xPercents = [],
        curIndex = 0,
        pixelsPerSecond = (config.speed || 1) * 100,
        snap = config.snap === false ? v => v : gsap.utils.snap(config.snap || 1),
        totalWidth, curX, distanceToStart, distanceToLoop, item, i;

    gsap.set(items, {
        xPercent: (i, el) => {
            let w = widths[i] = parseFloat(gsap.getProperty(el, "width", "px"));
            xPercents[i] = snap(parseFloat(gsap.getProperty(el, "x", "px")) / w * 100 + gsap.getProperty(el, "xPercent"));
            return xPercents[i];
        }
    });
    gsap.set(items, {x: 0});
    totalWidth = items[length - 1].offsetLeft + xPercents[length - 1] / 100 * widths[length - 1] - startX + items[length - 1].offsetWidth * gsap.getProperty(items[length - 1], "scaleX") + (parseFloat(config.paddingRight) || 0);

    for (i = 0; i < length; i++) {
        item = items[i];
        curX = xPercents[i] / 100 * widths[i];
        distanceToStart = item.offsetLeft + curX - startX;
        distanceToLoop = distanceToStart + widths[i] * gsap.getProperty(item, "scaleX");
        tl.to(item, {xPercent: snap((curX - distanceToLoop) / widths[i] * 100), duration: distanceToLoop / pixelsPerSecond}, 0)
            .fromTo(item, {xPercent: snap((curX - distanceToLoop + totalWidth) / widths[i] * 100)}, {xPercent: xPercents[i], duration: (curX - distanceToLoop + totalWidth - curX) / pixelsPerSecond, immediateRender: false}, distanceToLoop / pixelsPerSecond)
            .add("label" + i, distanceToStart / pixelsPerSecond);
        times[i] = distanceToStart / pixelsPerSecond;
    }

    function toIndex(index, vars) {
        vars = vars || {};
        (Math.abs(index - curIndex) > length / 2) && (index += index > curIndex ? -length : length);
        let newIndex = gsap.utils.wrap(0, length, index),
            time = times[newIndex];
        if (time > tl.time() !== index > curIndex) {
            vars.modifiers = {time: gsap.utils.wrap(0, tl.duration())};
            time += tl.duration() * (index > curIndex ? 1 : -1);
        }
        curIndex = newIndex;
        vars.overwrite = true;
        return tl.tweenTo(time, vars);
    }

    tl.next = vars => toIndex(curIndex + 1, vars);
    tl.previous = vars => toIndex(curIndex - 1, vars);
    tl.current = () => curIndex;
    tl.toIndex = (index, vars) => toIndex(index, vars);
    tl.times = times;
    tl.progress(1, true).progress(0, true);
    if (config.reversed) {
        tl.vars.onReverseComplete();
        tl.reverse();
    }
    return tl;
}


function horizontalLoop(items, config) {
    items = gsap.utils.toArray(items);
    config = config || {};
    let tl = gsap.timeline({repeat: config.repeat, paused: config.paused, defaults: {ease: "none"}, onReverseComplete: () => tl.totalTime(tl.rawTime() + tl.duration() * 100)});
    let length = items.length,
        startX = items[0].offsetLeft,
        times = [],
        widths = [],
        xPercents = [],
        curIndex = 0,
        pixelsPerSecond = (config.speed || 1) * 100,
        snap = config.snap === false ? v => v : gsap.utils.snap(config.snap || 1),
        totalWidth, curX, distanceToStart, distanceToLoop, item, i;

    gsap.set(items, {
        xPercent: (i, el) => {
            let w = widths[i] = parseFloat(gsap.getProperty(el, "width", "px"));
            xPercents[i] = snap(parseFloat(gsap.getProperty(el, "x", "px")) / w * 100 + gsap.getProperty(el, "xPercent"));
            return xPercents[i];
        }
    });
    gsap.set(items, {x: 0});
    totalWidth = items[length - 1].offsetLeft + xPercents[length - 1] / 100 * widths[length - 1] - startX + items[length - 1].offsetWidth * gsap.getProperty(items[length - 1], "scaleX") + (parseFloat(config.paddingRight) || 0);

    for (i = 0; i < length; i++) {
        item = items[i];
        curX = xPercents[i] / 100 * widths[i];
        distanceToStart = item.offsetLeft + curX - startX;
        distanceToLoop = distanceToStart + widths[i] * gsap.getProperty(item, "scaleX");
        tl.to(item, {xPercent: snap((curX - distanceToLoop) / widths[i] * 100), duration: distanceToLoop / pixelsPerSecond}, 0)
            .fromTo(item, {xPercent: snap((curX - distanceToLoop + totalWidth) / widths[i] * 100)}, {xPercent: xPercents[i], duration: (curX - distanceToLoop + totalWidth - curX) / pixelsPerSecond, immediateRender: false}, distanceToLoop / pixelsPerSecond)
            .add("label" + i, distanceToStart / pixelsPerSecond);
        times[i] = distanceToStart / pixelsPerSecond;
    }

    function toIndex(index, vars) {
        vars = vars || {};
        (Math.abs(index - curIndex) > length / 2) && (index += index > curIndex ? -length : length);
        let newIndex = gsap.utils.wrap(0, length, index),
            time = times[newIndex];
        if (time > tl.time() !== index > curIndex) {
            vars.modifiers = {time: gsap.utils.wrap(0, tl.duration())};
            time += tl.duration() * (index > curIndex ? 1 : -1);
        }
        curIndex = newIndex;
        vars.overwrite = true;
        return tl.tweenTo(time, vars);
    }

    tl.next = vars => toIndex(curIndex + 1, vars);
    tl.previous = vars => toIndex(curIndex - 1, vars);
    tl.current = () => curIndex;
    tl.toIndex = (index, vars) => toIndex(index, vars);
    tl.times = times;
    tl.progress(1, true).progress(0, true);
    if (config.reversed) {
        tl.vars.onReverseComplete();
        tl.reverse();
    }
    return tl;
}


function fadeIn() {
    gsap.registerPlugin(ScrollTrigger)

    gsap.utils.toArray('section:not(.boxes):not(.banner):not(.sobre), .eventos-lives > *:not(.eventos-lives__dados)').forEach(function (section) {
        gsap.fromTo(section,
            {
                opacity: 0,
                y: 50
            },
            {
                opacity: 1,
                y: 0,
                duration: 0.8,
                ease: 'power2.out',
                scrollTrigger: {
                    trigger: section,
                    start: 'top 75%',
                    toggleActions: 'play none none none',
                    once: true,
                }
            }
        )
    })
}

function animateCounters() {
    const counters = document.querySelectorAll('span[data-number]')

    counters.forEach(counter => {
        let targetValue = +counter.getAttribute('data-number')

        gsap.fromTo(counter,
            { innerText: 0 },
            {
                innerText: targetValue,
                duration: 10, // Duração da animação
                ease: 'power2.out',
                scrollTrigger: {
                    trigger: counter,
                    start: 'top 75%', // Quando o elemento estiver 75% visível
                    toggleActions: 'play none none none',
                    once: true // A animação só ocorre uma vez
                },
                snap: { innerText: 1 }, // Anima em incrementos inteiros
                onUpdate: function () {
                    counter.innerText = Math.ceil(counter.innerText) // Atualiza o texto com o valor arredondado
                }
            }
        )
    })
}

function slider() {
    $('.palestras-projetos__container').slick({
        infinite: false,
        prevArrow: $('.palestras-projetos__nav--prev'),
        nextArrow: $('.palestras-projetos__nav--next'),
    })

    // $('.publicidade__galeria').slick({
    //     centerMode: true,
    //     autoplay: true,
    //     autoplaySpeed: 3000,
    //     slidesToShow: 2,
    //     arrows: false,
    //     dots: false,
    // })
}

function circleSvg() {
    gsap.registerPlugin(ScrollTrigger)

    $('.palestras__tema svg path').each(function () {
        var $this = $(this)
        var pathLength = this.getTotalLength()

        $this.css({
            strokeDasharray: pathLength,
            strokeDashoffset: pathLength
        })

        gsap.to(this, {
            strokeDashoffset: 0,
            duration: 3,
            ease: "power1.inOut",
            scrollTrigger: {
                trigger: $this.closest('.palestras__tema'),
                start: "top 80%",
                end: "top 50%",
                once: false,
            }
        })
    })

    $('.publicidade__marca svg rect').each(function () {
        var $this = $(this)
        var pathLength = this.getTotalLength()

        $this.css({
            strokeDasharray: pathLength,
            strokeDashoffset: pathLength
        })

        gsap.to(this, {
            strokeDashoffset: 0,
            duration: 3,
            ease: "power1.inOut",
            scrollTrigger: {
                trigger: $this.closest('.publicidade__marca'),
                start: "top 80%",
                end: "top 50%",
                once: false,
            }
        })
    })
}

function carousel() {
    function initCarousel($container, config) {
        const $items = $container.find('.eventos-lives__carousel-item')
        const itemCount = $items.length
        let currentIndex = 0
        let autoPlayInterval
    
        config = $.extend({
            visibleItems: 3,
            autoPlay: true,
            autoPlayDelay: 3000,
            secondaryPosition: 'right',
            overlap: false,
            overlapRatio: 0.8,
            mainItemWidth: 0.6
        }, config)
    
        function updateCarousel() {
            const containerWidth = $container.width()
            const visibleItems = Math.min(config.visibleItems, itemCount)
            const mainItemWidth = containerWidth * config.mainItemWidth
            const secondaryItemWidth = (containerWidth - mainItemWidth) / (visibleItems - 1)
            const mainPosition = config.mainItemPosition || 'center'
    
            $items.each(function (index) {
                const offset = (index - currentIndex + itemCount) % itemCount
                let width, left, top, zIndex, opacity, scale
    
                if (offset < visibleItems) {
                    if (offset === 0) {
                        width = mainItemWidth
                        left = (mainPosition === 'center') ? (containerWidth - mainItemWidth) / 2 : 0
                        zIndex = visibleItems + 1
                        opacity = 1
                        scale = 1
                    } else {
                        width = secondaryItemWidth
                        left = (mainPosition === 'center')
                            ? (offset <= visibleItems / 2)
                                ? (containerWidth - mainItemWidth) / 2 - (visibleItems / 2 - offset + 0.5) * secondaryItemWidth
                                : (containerWidth + mainItemWidth) / 2 + (offset - visibleItems / 2 - 0.5) * secondaryItemWidth
                            : mainItemWidth + (offset - 1) * secondaryItemWidth
    
                        zIndex = visibleItems - offset
                        opacity = 1 - (offset * 0.2)
                        scale = 1 - (offset * 0.1)
                    }
    
                    top = `${10 + (offset * 5)}%`
    
                    $(this).css({
                        width: `${width}px`,
                        height: '80%',
                        left: `${left}px`,
                        top: top,
                        zIndex: zIndex,
                        opacity: opacity,
                        transform: `scale(${scale})`,
                        transition: 'all 0.5s ease',
                        display: 'block'
                    })
                } else {
                    $(this).hide()
                }
            })
        }
    
        function nextItem() {
            currentIndex = (currentIndex + 1) % itemCount
            updateCarousel()
        }
    
        function startAutoPlay() {
            stopAutoPlay()
            if (config.autoPlay) {
                autoPlayInterval = setInterval(nextItem, config.autoPlayDelay)
            }
        }
    
        function stopAutoPlay() {
            clearInterval(autoPlayInterval)
        }
    
        // Initialize carousel and autoplay
        updateCarousel()
        startAutoPlay()
    
        // Update layout on window resize
        $(window).on('resize', updateCarousel)
    }
    
    initCarousel($('.eventos-lives__carrosel'), {
        visibleItems: 3,
        secondaryPosition: 'right',
        overlap: false,
        mainItemWidth: 0.4
    })
}