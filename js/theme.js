/**
 * EGovt Theme JavaScript
 *
 * @package EGovt
 */

(function($) {
    'use strict';

    // DOM Ready
    $(document).ready(function() {
        // Mobile Menu Toggle
        var menuToggle = $('#menuToggle');
        var mainNav = $('#mainNav');

        menuToggle.on('click', function() {
            mainNav.toggleClass('active');
            var icon = menuToggle.find('i');
            if (mainNav.hasClass('active')) {
                icon.removeClass('fa-bars').addClass('fa-times');
            } else {
                icon.removeClass('fa-times').addClass('fa-bars');
            }
        });

        // Close menu when clicking on a link
        mainNav.find('a').on('click', function() {
            mainNav.removeClass('active');
            var icon = menuToggle.find('i');
            icon.removeClass('fa-times').addClass('fa-bars');
        });

        // Hero Slider
        var slides = $('.slide');
        var dots = $('.dot');
        var currentSlide = 0;
        var totalSlides = slides.length;

        function showSlide(index) {
            slides.removeClass('active');
            dots.removeClass('active');
            slides.eq(index).addClass('active');
            dots.eq(index).addClass('active');
        }

        function nextSlide() {
            currentSlide = (currentSlide + 1) % totalSlides;
            showSlide(currentSlide);
        }

        // Auto-slide every 5 seconds
        if (slides.length > 1) {
            setInterval(nextSlide, 5000);
        }

        // Dot click handlers
        dots.on('click', function() {
            currentSlide = $(this).data('slide');
            showSlide(currentSlide);
        });

        // Statistics Counter Animation
        var counted = false;
        var statNumbers = $('.stat-number');

        function animateCounter(element) {
            var $element = $(element);
            var target = parseInt($element.data('target'));
            var duration = 2000;
            var step = target / (duration / 16);
            var current = 0;

            var counter = setInterval(function() {
                current += step;
                if (current >= target) {
                    $element.text(target);
                    clearInterval(counter);
                } else {
                    $element.text(Math.floor(current));
                }
            }, 16);
        }

        function checkStatsVisibility() {
            var statsSection = $('.statistics');
            if (statsSection.length === 0) return;

            var rect = statsSection[0].getBoundingClientRect();
            var isVisible = rect.top < $(window).height() && rect.bottom > 0;

            if (isVisible && !counted) {
                counted = true;
                statNumbers.each(function() {
                    animateCounter(this);
                });
            }
        }

        // Back to Top Button
        var backToTop = $('#backToTop');

        function toggleBackToTop() {
            if ($(window).scrollTop() > 500) {
                backToTop.addClass('visible');
            } else {
                backToTop.removeClass('visible');
            }
        }

        backToTop.on('click', function() {
            $('html, body').animate({
                scrollTop: 0
            }, 500);
        });

        // Header Scroll Effect
        var header = $('.header');

        function handleHeaderScroll() {
            if ($(window).scrollTop() > 100) {
                header.css('box-shadow', '0 2px 20px rgba(0, 0, 0, 0.1)');
            } else {
                header.css('box-shadow', '0 2px 10px rgba(0, 0, 0, 0.1)');
            }
        }

        // Smooth Scroll for Anchor Links
        $('a[href^="#"]').on('click', function(e) {
            e.preventDefault();
            var target = $($(this).attr('href'));
            if (target.length) {
                var headerHeight = header.outerHeight();
                var targetPosition = target.offset().top - headerHeight;
                $('html, body').animate({
                    scrollTop: targetPosition
                }, 500);
            }
        });

        // Scroll Event Listener
        $(window).on('scroll', function() {
            toggleBackToTop();
            handleHeaderScroll();
            checkStatsVisibility();
        });

        // Intersection Observer for Fade-in Animations
        if ('IntersectionObserver' in window) {
            var fadeInObserver = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        $(entry.target).addClass('fade-in-visible');
                        fadeInObserver.unobserve(entry.target);
                    }
                });
            }, {
                root: null,
                rootMargin: '0px',
                threshold: 0.1
            });

            // Observe elements for fade-in animation
            $('.service-item, .event-card, .news-card, .council-card, .image-card').each(function() {
                $(this).addClass('fade-in');
                fadeInObserver.observe(this);
            });
        }

        // Newsletter Form
        $('.newsletter-form').on('submit', function(e) {
            e.preventDefault();
            var email = $(this).find('input[type="email"]').val();
            if (email) {
                alert('Thank you for subscribing! You will receive our latest news and updates.');
                $(this)[0].reset();
            }
        });

        // Play Button (Video Modal Placeholder)
        $('.play-btn').on('click', function(e) {
            e.preventDefault();
            alert('Video modal would open here. This is a placeholder for the video intro feature.');
        });

        // Handle Window Resize
        var resizeTimer;
        $(window).on('resize', function() {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(function() {
                // Close mobile menu on resize to desktop
                if ($(window).width() > 992) {
                    mainNav.removeClass('active');
                    var icon = menuToggle.find('i');
                    icon.removeClass('fa-times').addClass('fa-bars');
                }
            }, 250);
        });

        // Initialize on Page Load
        checkStatsVisibility();

    });

})(jQuery);

// Add CSS class for fade-in animation
var style = document.createElement('style');
style.textContent = `
    .fade-in {
        opacity: 0;
        transform: translateY(30px);
        transition: opacity 0.6s ease, transform 0.6s ease;
    }
    
    .fade-in-visible {
        opacity: 1;
        transform: translateY(0);
    }
`;
document.head.appendChild(style);
