/**
 * CUSTOM MODERN JAVASCRIPT EFFECTS
 * For Corona Admin Dark Template
 */

(function($) {
    'use strict';

    $(document).ready(function() {

        // ========================================
        // PAGE LOADING ANIMATION
        // ========================================

        // Show loading overlay on page load
        $('body').append('<div class="loading-overlay" id="loadingOverlay"><div class="spinner"></div></div>');

        $(window).on('load', function() {
            $('#loadingOverlay').fadeOut(500, function() {
                $(this).remove();
            });
        });

        // ========================================
        // SMOOTH SCROLL
        // ========================================

        $('a[href^="#"]').on('click', function(e) {
            var target = $(this.getAttribute('href'));
            if (target.length) {
                e.preventDefault();
                $('html, body').stop().animate({
                    scrollTop: target.offset().top - 100
                }, 800, 'swing');
            }
        });

        // ========================================
        // CARD ANIMATIONS ON SCROLL
        // ========================================

        function animateOnScroll() {
            $('.card').each(function() {
                var elementTop = $(this).offset().top;
                var elementBottom = elementTop + $(this).outerHeight();
                var viewportTop = $(window).scrollTop();
                var viewportBottom = viewportTop + $(window).height();

                if (elementBottom > viewportTop && elementTop < viewportBottom) {
                    $(this).addClass('animated fadeInUp');
                }
            });
        }

        $(window).on('scroll', animateOnScroll);
        animateOnScroll(); // Run on page load

        // ========================================
        // TABLE ROW CLICK ANIMATION
        // ========================================

        $('.table tbody tr').on('click', function(e) {
            // Don't trigger if clicking buttons or links
            if (!$(e.target).is('button, a, .btn, .btn *')) {
                $(this).addClass('pulse-animation');
                setTimeout(() => {
                    $(this).removeClass('pulse-animation');
                }, 600);
            }
        });

        // ========================================
        // BUTTON CLICK RIPPLE EFFECT
        // ========================================

        $('.btn').on('click', function(e) {
            var $ripple = $('<span class="ripple"></span>');
            var btnOffset = $(this).offset();
            var xPos = e.pageX - btnOffset.left;
            var yPos = e.pageY - btnOffset.top;

            $ripple.css({
                top: yPos + 'px',
                left: xPos + 'px'
            });

            $(this).append($ripple);

            setTimeout(function() {
                $ripple.remove();
            }, 600);
        });

        // ========================================
        // FORM VALIDATION ANIMATION
        // ========================================

        $('form').on('submit', function(e) {
            var hasError = false;

            $(this).find('.form-control[required]').each(function() {
                if ($(this).val() === '') {
                    hasError = true;
                    $(this).addClass('shake-animation');
                    setTimeout(() => {
                        $(this).removeClass('shake-animation');
                    }, 500);
                }
            });

            if (hasError) {
                e.preventDefault();
            }
        });

        // ========================================
        // AUTO-HIDE ALERTS
        // ========================================

        $('.alert').each(function() {
            var $alert = $(this);
            setTimeout(function() {
                $alert.fadeOut(500, function() {
                    $(this).remove();
                });
            }, 5000); // Auto hide after 5 seconds
        });

        // ========================================
        // SEARCH BOX ANIMATION
        // ========================================

        $('.search input[type="text"]').on('focus', function() {
            $(this).parent().addClass('search-focused');
        }).on('blur', function() {
            $(this).parent().removeClass('search-focused');
        });

        // ========================================
        // NUMBER COUNTER ANIMATION
        // ========================================

        function animateValue(element, start, end, duration) {
            var range = end - start;
            var current = start;
            var increment = end > start ? 1 : -1;
            var stepTime = Math.abs(Math.floor(duration / range));

            var timer = setInterval(function() {
                current += increment;
                $(element).text(current);
                if (current == end) {
                    clearInterval(timer);
                }
            }, stepTime);
        }

        // Animate numbers in cards
        $('.card-stats .count').each(function() {
            var $this = $(this);
            var countTo = parseInt($this.text());
            if (!isNaN(countTo)) {
                $this.text('0');
                animateValue($this[0], 0, countTo, 2000);
            }
        });

        // ========================================
        // TOOLTIP INITIALIZATION
        // ========================================

        $('[data-toggle="tooltip"]').tooltip({
            trigger: 'hover',
            animation: true,
            delay: { show: 200, hide: 100 }
        });

        // ========================================
        // POPOVER INITIALIZATION
        // ========================================

        $('[data-toggle="popover"]').popover({
            trigger: 'hover',
            animation: true
        });

        // ========================================
        // BACK TO TOP BUTTON
        // ========================================

        // Create back to top button
        $('body').append('<button id="backToTop" class="btn btn-gradient-primary" title="Back to Top"><i class="mdi mdi-arrow-up"></i></button>');

        var $backToTop = $('#backToTop');

        $backToTop.css({
            position: 'fixed',
            bottom: '30px',
            right: '30px',
            display: 'none',
            zIndex: 9999,
            borderRadius: '50%',
            width: '50px',
            height: '50px',
            padding: '0',
            boxShadow: '0 4px 20px rgba(74, 144, 226, 0.5)'
        });

        $(window).scroll(function() {
            if ($(this).scrollTop() > 200) {
                $backToTop.fadeIn();
            } else {
                $backToTop.fadeOut();
            }
        });

        $backToTop.click(function() {
            $('html, body').animate({scrollTop: 0}, 800);
            return false;
        });

        // ========================================
        // FORM INPUT ANIMATIONS
        // ========================================

        $('.form-control').on('focus', function() {
            $(this).parent().addClass('input-focused');
        }).on('blur', function() {
            $(this).parent().removeClass('input-focused');
        });

        // ========================================
        // CONFIRM DELETE WITH SWEET ALERT STYLE
        // ========================================

        $('form[onsubmit*="confirm"]').each(function() {
            $(this).removeAttr('onsubmit');
            $(this).on('submit', function(e) {
                e.preventDefault();
                var form = this;

                // Create custom confirm dialog
                var $modal = $('<div class="custom-confirm-modal">' +
                    '<div class="custom-confirm-content glass-effect">' +
                    '<i class="mdi mdi-alert-circle-outline text-warning" style="font-size: 4rem;"></i>' +
                    '<h4 class="mt-3">Apakah Anda yakin?</h4>' +
                    '<p class="text-muted">Data yang dihapus tidak dapat dikembalikan!</p>' +
                    '<div class="mt-4">' +
                    '<button class="btn btn-gradient-danger confirm-yes mr-2"><i class="mdi mdi-delete"></i> Ya, Hapus!</button>' +
                    '<button class="btn btn-light confirm-no"><i class="mdi mdi-close"></i> Batal</button>' +
                    '</div>' +
                    '</div>' +
                    '</div>');

                $modal.css({
                    position: 'fixed',
                    top: 0,
                    left: 0,
                    right: 0,
                    bottom: 0,
                    backgroundColor: 'rgba(0,0,0,0.8)',
                    display: 'flex',
                    alignItems: 'center',
                    justifyContent: 'center',
                    zIndex: 10000,
                    backdropFilter: 'blur(5px)'
                });

                $modal.find('.custom-confirm-content').css({
                    padding: '2rem',
                    borderRadius: '15px',
                    textAlign: 'center',
                    maxWidth: '400px',
                    animation: 'bounceIn 0.5s'
                });

                $('body').append($modal);

                $modal.find('.confirm-yes').click(function() {
                    $modal.fadeOut(300, function() {
                        $(this).remove();
                        form.submit();
                    });
                });

                $modal.find('.confirm-no').click(function() {
                    $modal.fadeOut(300, function() {
                        $(this).remove();
                    });
                });

                $modal.click(function(e) {
                    if (e.target === this) {
                        $modal.fadeOut(300, function() {
                            $(this).remove();
                        });
                    }
                });
            });
        });

        // ========================================
        // ADD ANIMATION CLASSES
        // ========================================

        // Add animation keyframes to document
        var animationStyles = `
            @keyframes bounceIn {
                0% { opacity: 0; transform: scale(0.3); }
                50% { opacity: 1; transform: scale(1.05); }
                70% { transform: scale(0.9); }
                100% { transform: scale(1); }
            }

            @keyframes pulse-animation {
                0% { transform: scale(1); }
                50% { transform: scale(1.02); }
                100% { transform: scale(1); }
            }

            @keyframes shake-animation {
                0%, 100% { transform: translateX(0); }
                10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
                20%, 40%, 60%, 80% { transform: translateX(5px); }
            }

            .pulse-animation {
                animation: pulse-animation 0.6s ease;
            }

            .shake-animation {
                animation: shake-animation 0.5s ease;
                border-color: #ff6b9d !important;
            }

            .search-focused {
                transform: scale(1.05);
            }

            .input-focused {
                transform: translateY(-2px);
            }
        `;

        $('<style>').text(animationStyles).appendTo('head');

        // ========================================
        // CONSOLE MESSAGE
        // ========================================

        console.log('%c🎉 Corona Admin Dark - Enhanced Edition', 'color: #4A90E2; font-size: 20px; font-weight: bold;');
        console.log('%cModern effects loaded successfully!', 'color: #38ef7d; font-size: 14px;');

    });

})(jQuery);
