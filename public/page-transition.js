(function () {
    'use strict';

    const OVERLAY_ID = 'page-transition';
    const STYLE_ID = 'page-transition-styles';
    const BRAND_NAME = 'PLMun Campus Connect';

    function addTransitionStyles() {
        if (document.getElementById(STYLE_ID)) {
            return;
        }

        const style = document.createElement('style');
        style.id = STYLE_ID;

        style.textContent = `
            #${OVERLAY_ID} {
                position: fixed;
                inset: 0;
                z-index: 999999;
                display: flex;
                align-items: center;
                justify-content: center;
                overflow: hidden;
                isolation: isolate;
                background: #101f3a;
                opacity: 0;
                visibility: hidden;
                pointer-events: none;
                clip-path: inset(0 0 100% 0);
                transition:
                    clip-path 0.48s cubic-bezier(0.76, 0, 0.24, 1),
                    opacity 0.25s ease,
                    visibility 0.48s ease;
            }

            #${OVERLAY_ID}.active {
                opacity: 1;
                visibility: visible;
                pointer-events: auto;
                clip-path: inset(0 0 0 0);
            }

            #${OVERLAY_ID} .transition-background {
                position: absolute;
                inset: 0;
                z-index: -2;
                background:
                    radial-gradient(
                        circle at 50% 45%,
                        rgba(201, 160, 74, 0.17),
                        transparent 32%
                    ),
                    linear-gradient(
                        135deg,
                        #101f3a 0%,
                        #172b4d 52%,
                        #0c172b 100%
                    );
                transform: scale(1.08);
                transition: transform 0.8s ease;
            }

            #${OVERLAY_ID}.active .transition-background {
                transform: scale(1);
            }

            #${OVERLAY_ID} .transition-glow {
                position: absolute;
                z-index: -1;
                width: min(70vw, 480px);
                aspect-ratio: 1;
                border-radius: 50%;
                background: rgba(201, 160, 74, 0.09);
                filter: blur(70px);
                animation: plmunGlow 3s ease-in-out infinite alternate;
            }

            #${OVERLAY_ID} .transition-content {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                padding: 24px;
                text-align: center;
                opacity: 0;
                transform: translateY(18px) scale(0.97);
                transition:
                    opacity 0.35s ease 0.12s,
                    transform 0.45s cubic-bezier(0.2, 0.8, 0.2, 1) 0.12s;
            }

            #${OVERLAY_ID}.active .transition-content {
                opacity: 1;
                transform: translateY(0) scale(1);
            }

            #${OVERLAY_ID} .transition-logo-wrap {
                position: relative;
                display: grid;
                place-items: center;
                width: 104px;
                height: 104px;
                margin-bottom: 25px;
            }

            #${OVERLAY_ID} .transition-logo-ring {
                position: absolute;
                inset: 0;
                border: 1px solid rgba(201, 160, 74, 0.4);
                border-radius: 32px;
                transform: rotate(45deg) scale(0.85);
                opacity: 0;
                transition:
                    transform 0.6s ease,
                    opacity 0.4s ease;
            }

            #${OVERLAY_ID}.active .transition-logo-ring {
                transform: rotate(0deg) scale(1);
                opacity: 1;
            }

            #${OVERLAY_ID} .transition-logo {
                width: 76px;
                height: 76px;
                display: block;
                object-fit: contain;
                border-radius: 50%;
                background: #fff;
                border: 3px solid rgba(201, 160, 74, 0.85);
                box-shadow: 0 0 35px rgba(201, 160, 74, 0.15);
                animation: plmunLogoFloat 2.2s ease-in-out infinite;
            }

            #${OVERLAY_ID} .transition-brand {
                margin: 0;
                color: #fff;
                font-family: 'Plus Jakarta Sans', sans-serif;
                font-size: clamp(19px, 4vw, 25px);
                font-weight: 800;
                letter-spacing: -0.6px;
                line-height: 1.4;
            }

            #${OVERLAY_ID} .transition-subtitle {
                margin-top: 8px;
                color: #c9d2e2;
                font-family: 'Plus Jakarta Sans', sans-serif;
                font-size: 12px;
                font-weight: 500;
                letter-spacing: 2px;
                text-transform: uppercase;
            }

            #${OVERLAY_ID} .transition-loader {
                position: relative;
                width: 150px;
                height: 3px;
                margin-top: 30px;
                overflow: hidden;
                border-radius: 99px;
                background: rgba(255, 255, 255, 0.13);
            }

            #${OVERLAY_ID} .transition-loader::after {
                content: "";
                position: absolute;
                top: 0;
                left: -45%;
                width: 45%;
                height: 100%;
                border-radius: inherit;
                background: linear-gradient(
                    90deg,
                    transparent,
                    #e8c46d,
                    #fff0b7,
                    #c99732,
                    transparent
                );
                animation: plmunLoader 1.15s ease-in-out infinite;
            }

            #${OVERLAY_ID} .transition-corner {
                position: absolute;
                width: 80px;
                height: 80px;
                border-color: rgba(201, 160, 74, 0.3);
                border-style: solid;
                pointer-events: none;
            }

            #${OVERLAY_ID} .transition-corner.top-left {
                top: 22px;
                left: 22px;
                border-width: 1px 0 0 1px;
            }

            #${OVERLAY_ID} .transition-corner.bottom-right {
                right: 22px;
                bottom: 22px;
                border-width: 0 1px 1px 0;
            }

            @keyframes plmunLoader {
                from {
                    left: -45%;
                }
                to {
                    left: 110%;
                }
            }

            @keyframes plmunGlow {
                from {
                    opacity: 0.45;
                    transform: scale(0.9);
                }
                to {
                    opacity: 1;
                    transform: scale(1.08);
                }
            }

            @keyframes plmunLogoFloat {
                0%, 100% {
                    transform: translateY(0);
                }
                50% {
                    transform: translateY(-4px);
                }
            }

            @media (max-width: 576px) {
                #${OVERLAY_ID} .transition-logo-wrap {
                    width: 88px;
                    height: 88px;
                    margin-bottom: 22px;
                }

                #${OVERLAY_ID} .transition-logo {
                    width: 66px;
                    height: 66px;
                }

                #${OVERLAY_ID} .transition-corner {
                    width: 44px;
                    height: 44px;
                }

                #${OVERLAY_ID} .transition-corner.top-left {
                    top: 14px;
                    left: 14px;
                }

                #${OVERLAY_ID} .transition-corner.bottom-right {
                    right: 14px;
                    bottom: 14px;
                }
            }

            @media (prefers-reduced-motion: reduce) {
                #${OVERLAY_ID},
                #${OVERLAY_ID} *,
                #${OVERLAY_ID} *::before,
                #${OVERLAY_ID} *::after {
                    animation: none !important;
                    transition: none !important;
                }
            }
        `;

        document.head.appendChild(style);
    }

    function initializePageTransitions() {
        let overlay = document.getElementById(OVERLAY_ID);

        if (!overlay) {
            overlay = document.createElement('div');
            overlay.id = OVERLAY_ID;
            overlay.setAttribute('aria-hidden', 'true');
            document.body.appendChild(overlay);
        }

        // Build the branded transition content consistently on each page.
        overlay.innerHTML = `
            <div class="transition-background"></div>
            <div class="transition-glow"></div>

            <div class="transition-corner top-left"></div>
            <div class="transition-corner bottom-right"></div>

            <div class="transition-content">
                <div class="transition-logo-wrap">
                    <div class="transition-logo-ring"></div>

                    <img
                        class="transition-logo"
                        src="/images/logo2.jpg"
                        alt=""
                    >
                </div>

                <p class="transition-brand">${BRAND_NAME}</p>

                <p class="transition-subtitle">
                    Connecting campus communities
                </p>

                <div class="transition-loader" aria-hidden="true"></div>
            </div>
        `;

        addTransitionStyles();

        if (
            document.documentElement.dataset.transitionsInitialized === 'true'
        ) {
            return;
        }

        document.documentElement.dataset.transitionsInitialized = 'true';

        // Animate regular internal navigation.
        document.addEventListener('click', function (event) {
            const target = event.target;

            if (!(target instanceof Element)) {
                return;
            }

            const link = target.closest('a[href]');

            if (!link) {
                return;
            }

            if (
                event.defaultPrevented ||
                event.button !== 0 ||
                event.ctrlKey ||
                event.metaKey ||
                event.shiftKey ||
                event.altKey ||
                link.target === '_blank' ||
                link.hasAttribute('download') ||
                link.hasAttribute('data-no-transition')
            ) {
                return;
            }

            let url;

            try {
                url = new URL(link.href, window.location.href);
            } catch (error) {
                return;
            }

            if (
                url.origin !== window.location.origin ||
                !['http:', 'https:'].includes(url.protocol)
            ) {
                return;
            }

            // Don't animate links that only jump to an anchor on this page.
            if (
                url.pathname === window.location.pathname &&
                url.search === window.location.search &&
                url.hash
            ) {
                return;
            }

            // Avoid a transition when clicking the current URL.
            if (url.href === window.location.href) {
                return;
            }

            overlay.classList.add('active');
            overlay.setAttribute('aria-hidden', 'false');
        });

        // Animate form submissions such as login, registration and logout.
        document.addEventListener('submit', function (event) {
            const form = event.target;

            if (!(form instanceof HTMLFormElement)) {
                return;
            }

            if (
                event.defaultPrevented ||
                form.target === '_blank' ||
                form.hasAttribute('data-no-transition')
            ) {
                return;
            }

            overlay.classList.add('active');
            overlay.setAttribute('aria-hidden', 'false');
        });

        // Hide the overlay when a page is restored from browser history.
        window.addEventListener('pageshow', function () {
            overlay.classList.remove('active');
            overlay.setAttribute('aria-hidden', 'true');
        });
    }

    if (document.readyState === 'loading') {
        document.addEventListener(
            'DOMContentLoaded',
            initializePageTransitions,
            { once: true }
        );
    } else {
        initializePageTransitions();
    }
})();
