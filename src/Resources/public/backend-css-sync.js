/*
 * Live-syncs the "Lesbare CSS-Klassen" selector into the cssID class field.
 *
 * The server-side save_callback already merges the selection into cssID on save;
 * this mirrors the same logic in the browser so the cssID class field updates
 * immediately when the selection changes (add/remove), without saving first.
 *
 * Implemented as a delegated listener so it survives Turbo navigation and works
 * together with the Choices.js multi-select (which dispatches "change" on the
 * underlying <select>).
 */
(function () {
    'use strict';

    var SELECT_RE = /^ctrl_cssFrameworkClasses(_\d+)?$/;

    function getClassInput(select) {
        var match = select.id.match(SELECT_RE);
        var suffix = (match && match[1]) ? match[1] : '';

        // The cssID widget renders two inputs: _0 = ID, _1 = class
        return document.getElementById('ctrl_cssID' + suffix + '_1')
            || document.getElementById('ctrl_cssID_1');
    }

    function sync(select) {
        var input = getClassInput(select);

        if (!input) {
            return;
        }

        var all = Array.prototype.map.call(select.options, function (o) { return o.value; });
        var selected = Array.prototype.map.call(select.selectedOptions, function (o) { return o.value; });

        // Keep classes that are not managed by the framework, drop the framework ones
        var classes = (input.value || '').split(/\s+/).filter(function (c) {
            return c !== '' && all.indexOf(c) === -1;
        });

        // Add the current selection (deduplicated)
        selected.forEach(function (c) {
            if (classes.indexOf(c) === -1) {
                classes.push(c);
            }
        });

        input.value = classes.join(' ');
    }

    document.addEventListener('change', function (e) {
        var target = e.target;

        if (target && 'SELECT' === target.tagName && SELECT_RE.test(target.id)) {
            sync(target);
        }
    });
})();
