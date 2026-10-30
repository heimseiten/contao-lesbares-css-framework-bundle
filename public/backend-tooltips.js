/*
 * Quick tooltips for the "Lesbare CSS-Klassen" selector: hovering a class shows
 * what it does after a short moment (the browser's own title tooltip and the
 * Contao tooltip both wait about a second). Looks like the Contao tooltip (.tip),
 * so it follows the light and dark back end theme.
 *
 * The texts (window.lesbareCssKlassen, class => description) are written into the
 * page by the CssClassSelectorListener. Delegated listeners, so it survives Turbo
 * navigation and the re-rendering of the Choices.js items.
 */
(function () {
    'use strict';

    var DELAY = 120;
    var tip = null;
    var timer = null;
    var current = null;

    function container() {
        if (!tip || !document.body.contains(tip)) {
            tip = document.createElement('div');
            tip.className = 'tip';
            tip.setAttribute('role', 'tooltip');
            tip.style.position = 'absolute';
            tip.style.display = 'none';
            tip.style.maxWidth = '440px';
            document.body.appendChild(tip);
        }

        return tip;
    }

    function target(el) {
        var item = el && el.closest ? el.closest('.choices [data-value]') : null;

        if (!item || !item.getAttribute('data-value')) {
            return null;
        }

        var choices = item.closest('.choices');

        return choices && choices.querySelector('select[id^="ctrl_cssFrameworkClasses"]') ? item : null;
    }

    function hide() {
        clearTimeout(timer);
        current = null;

        if (tip) {
            tip.style.display = 'none';
        }
    }

    document.addEventListener('pointerover', function (event) {
        if ('touch' === event.pointerType) {
            return;
        }

        var item = target(event.target);

        if (!item || item === current) {
            return;
        }

        var text = (window.lesbareCssKlassen || {})[item.getAttribute('data-value')];

        if (!text) {
            return;
        }

        hide();
        current = item;

        timer = setTimeout(function () {
            var box = item.getBoundingClientRect();
            var el = container();
            var inner = document.createElement('div');

            inner.textContent = text;
            el.replaceChildren(inner);
            el.style.left = (window.scrollX + box.left) + 'px';
            el.style.top = (window.scrollY + box.bottom + 10) + 'px';
            el.style.display = 'block';
        }, DELAY);
    });

    document.addEventListener('pointerout', function (event) {
        if (current && !current.contains(event.relatedTarget)) {
            hide();
        }
    });

    document.addEventListener('click', hide, true);
    document.addEventListener('turbo:before-render', hide);
})();
