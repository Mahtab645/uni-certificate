(function () {
    'use strict';

    function initMobileNav() {
        var nav = document.getElementById('mainNav');
        var toggle = document.getElementById('navToggle');
        var closeBtn = document.getElementById('navClose');
        var backdrop = document.getElementById('navBackdrop');
        if (!nav || !toggle) return;

        var mq = window.matchMedia('(max-width: 1199.98px)');

        function isMobile() {
            return mq.matches;
        }

        function closeNav() {
            document.body.classList.remove('nav-open');
            toggle.setAttribute('aria-expanded', 'false');
            if (backdrop) backdrop.hidden = true;
        }

        function openNav() {
            document.body.classList.add('nav-open');
            toggle.setAttribute('aria-expanded', 'true');
            if (backdrop) backdrop.hidden = false;
            nav.scrollTop = 0;
        }

        toggle.addEventListener('click', function () {
            if (!isMobile()) return;
            if (document.body.classList.contains('nav-open')) closeNav();
            else openNav();
        });

        if (closeBtn) closeBtn.addEventListener('click', closeNav);
        if (backdrop) backdrop.addEventListener('click', closeNav);
        nav.querySelectorAll('a').forEach(function (link) {
            link.addEventListener('click', closeNav);
        });

        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') closeNav();
        });

        if (mq.addEventListener) {
            mq.addEventListener('change', function () {
                if (!isMobile()) closeNav();
            });
        }
    }

    function initCookieBanner() {
        var banner = document.getElementById('cookieBanner');
        var acceptBtn = document.getElementById('cookieAccept');
        var cancelBtn = document.getElementById('cookieCancel');
        if (!banner || !acceptBtn || !cancelBtn) return;

        var storageKey = 'ifta_cookie_ok';
        var dayMs = 24 * 60 * 60 * 1000;

        try {
            var saved = parseInt(window.localStorage.getItem(storageKey) || '0', 10);
            if (saved && Date.now() - saved < dayMs) {
                return;
            }
        } catch (err) {
            /* show the banner if storage is blocked */
        }

        banner.hidden = false;

        function dismissBanner() {
            try {
                window.localStorage.setItem(storageKey, String(Date.now()));
            } catch (err) {
                /* ignore */
            }
            banner.hidden = true;
        }

        acceptBtn.addEventListener('click', dismissBanner);
        cancelBtn.addEventListener('click', dismissBanner);
    }

    function getCookie(name) {
        var parts = ('; ' + document.cookie).split('; ' + name + '=');
        if (parts.length === 2) {
            return parts.pop().split(';').shift();
        }
        return '';
    }

    function setTranslateCookie(value) {
        document.cookie = 'googtrans=' + value + '; path=/; SameSite=Lax';
        var hostname = window.location.hostname;
        if (hostname !== 'localhost' && hostname.indexOf('.') !== -1) {
            document.cookie = 'googtrans=' + value + '; path=/; domain=.' + hostname + '; SameSite=Lax';
        }
    }

    function clearTranslateCookie() {
        var expired = 'googtrans=; expires=Thu, 01 Jan 1970 00:00:00 GMT; path=/';
        document.cookie = expired;
        var hostname = window.location.hostname;
        if (hostname !== 'localhost' && hostname.indexOf('.') !== -1) {
            document.cookie = expired + '; domain=.' + hostname;
        }
    }

    function currentTranslateLang() {
        var value = decodeURIComponent(getCookie('googtrans') || '');
        var match = value.match(/\/en\/([a-z]{2})/i);
        if (match && match[1] && match[1].toLowerCase() !== 'en') {
            return match[1].toLowerCase();
        }
        return 'en';
    }

    function updateLangButtons(lang) {
        document.querySelectorAll('.lang-btn').forEach(function (btn) {
            btn.classList.toggle('is-active', btn.getAttribute('data-lang') === lang);
        });
        document.documentElement.setAttribute('lang', lang);
    }

    function setPageLanguage(lang) {
        if (lang !== 'de' && lang !== 'en') {
            lang = 'en';
        }
        if (lang === currentTranslateLang()) {
            updateLangButtons(lang);
            return;
        }
        if (lang === 'en') {
            clearTranslateCookie();
        } else {
            clearTranslateCookie();
            setTranslateCookie('/en/de');
        }
        window.location.reload();
    }

    function initLanguageSwitch() {
        updateLangButtons(currentTranslateLang());
        document.querySelectorAll('.lang-btn').forEach(function (btn) {
            btn.addEventListener('click', function () {
                setPageLanguage(btn.getAttribute('data-lang') || 'en');
            });
        });
    }

    window.googleTranslateElementInit = function () {
        if (!window.google || !google.translate || !google.translate.TranslateElement) {
            return;
        }
        new google.translate.TranslateElement({
            pageLanguage: 'en',
            includedLanguages: 'en,de',
            autoDisplay: false
        }, 'google_translate_element');

        var lang = currentTranslateLang();
        if (lang === 'de') {
            window.setTimeout(function () {
                var select = document.querySelector('.goog-te-combo');
                if (select && select.value !== 'de') {
                    select.value = 'de';
                    select.dispatchEvent(new Event('change'));
                }
            }, 400);
        }
    };

    function initCareerFile() {
        var input = document.getElementById('cv');
        var title = document.getElementById('cvTitle');
        var hint = document.getElementById('cvHint');
        if (!input || !title || !hint) return;

        input.addEventListener('change', function () {
            if (input.files && input.files[0]) {
                title.textContent = input.files[0].name;
                hint.textContent = 'Click to choose a different file';
            } else {
                title.textContent = 'Choose a file';
                hint.textContent = 'PDF, Word or ODT · max 15 MB';
            }
        });
    }

    document.addEventListener('DOMContentLoaded', function () {
        initMobileNav();
        initCookieBanner();
        initLanguageSwitch();
        initCareerFile();
    });
})();
