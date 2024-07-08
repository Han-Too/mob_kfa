<script>
    Sfdump = window.Sfdump || (function(doc) {
        var refStyle = doc.createElement('style')
          , rxEsc = /([.*+?^${}()|\[\]\/\\])/g
          , idRx = /\bsf-dump-\d+-ref[012]\w+\b/
          , keyHint = 0 <= navigator.platform.toUpperCase().indexOf('MAC') ? 'Cmd' : 'Ctrl'
          , addEventListener = function(e, n, cb) {
            e.addEventListener(n, cb, false);
        };
        refStyle.innerHTML = 'pre.sf-dump .sf-dump-compact, .sf-dump-str-collapse .sf-dump-str-collapse, .sf-dump-str-expand .sf-dump-str-expand { display: none; }';
        doc.head.appendChild(refStyle);
        refStyle = doc.createElement('style');
        doc.head.appendChild(refStyle);
        if (!doc.addEventListener) {
            addEventListener = function(element, eventName, callback) {
                element.attachEvent('on' + eventName, function(e) {
                    e.preventDefault = function() {
                        e.returnValue = false;
                    }
                    ;
                    e.target = e.srcElement;
                    callback(e);
                });
            }
            ;
        }
        function toggle(a, recursive) {
            var s = a.nextSibling || {}, oldClass = s.className, arrow, newClass;
            if (/\bsf-dump-compact\b/.test(oldClass)) {
                arrow = '&#9660;';
                newClass = 'sf-dump-expanded';
            } else if (/\bsf-dump-expanded\b/.test(oldClass)) {
                arrow = '&#9654;';
                newClass = 'sf-dump-compact';
            } else {
                return false;
            }
            if (doc.createEvent && s.dispatchEvent) {
                var event = doc.createEvent('Event');
                event.initEvent('sf-dump-expanded' === newClass ? 'sfbeforedumpexpand' : 'sfbeforedumpcollapse', true, false);
                s.dispatchEvent(event);
            }
            a.lastChild.innerHTML = arrow;
            s.className = s.className.replace(/\bsf-dump-(compact|expanded)\b/, newClass);
            if (recursive) {
                try {
                    a = s.querySelectorAll('.' + oldClass);
                    for (s = 0; s < a.length; ++s) {
                        if (-1 == a[s].className.indexOf(newClass)) {
                            a[s].className = newClass;
                            a[s].previousSibling.lastChild.innerHTML = arrow;
                        }
                    }
                } catch (e) {}
            }
            return true;
        }
        ;function collapse(a, recursive) {
            var s = a.nextSibling || {}
              , oldClass = s.className;
            if (/\bsf-dump-expanded\b/.test(oldClass)) {
                toggle(a, recursive);
                return true;
            }
            return false;
        }
        ;function expand(a, recursive) {
            var s = a.nextSibling || {}
              , oldClass = s.className;
            if (/\bsf-dump-compact\b/.test(oldClass)) {
                toggle(a, recursive);
                return true;
            }
            return false;
        }
        ;function collapseAll(root) {
            var a = root.querySelector('a.sf-dump-toggle');
            if (a) {
                collapse(a, true);
                expand(a);
                return true;
            }
            return false;
        }
        function reveal(node) {
            var previous, parents = [];
            while ((node = node.parentNode || {}) && (previous = node.previousSibling) && 'A' === previous.tagName) {
                parents.push(previous);
            }
            if (0 !== parents.length) {
                parents.forEach(function(parent) {
                    expand(parent);
                });
                return true;
            }
            return false;
        }
        function highlight(root, activeNode, nodes) {
            resetHighlightedNodes(root);
            Array.from(nodes || []).forEach(function(node) {
                if (!/\bsf-dump-highlight\b/.test(node.className)) {
                    node.className = node.className + ' sf-dump-highlight';
                }
            });
            if (!/\bsf-dump-highlight-active\b/.test(activeNode.className)) {
                activeNode.className = activeNode.className + ' sf-dump-highlight-active';
            }
        }
        function resetHighlightedNodes(root) {
            Array.from(root.querySelectorAll('.sf-dump-str, .sf-dump-key, .sf-dump-public, .sf-dump-protected, .sf-dump-private')).forEach(function(strNode) {
                strNode.className = strNode.className.replace(/\bsf-dump-highlight\b/, '');
                strNode.className = strNode.className.replace(/\bsf-dump-highlight-active\b/, '');
            });
        }
        return function(root, x) {
            root = doc.getElementById(root);
            var indentRx = new RegExp('^(' + (root.getAttribute('data-indent-pad') || ' ').replace(rxEsc, '\\$1') + ')+','m'), options = {
                "maxDepth": 1,
                "maxStringLength": 160,
                "fileLinkFormat": false
            }, elt = root.getElementsByTagName('A'), len = elt.length, i = 0, s, h, t = [];
            while (i < len)
                t.push(elt[i++]);
            for (i in x) {
                options[i] = x[i];
            }
            function a(e, f) {
                addEventListener(root, e, function(e, n) {
                    if ('A' == e.target.tagName) {
                        f(e.target, e);
                    } else if ('A' == e.target.parentNode.tagName) {
                        f(e.target.parentNode, e);
                    } else {
                        n = /\bsf-dump-ellipsis\b/.test(e.target.className) ? e.target.parentNode : e.target;
                        if ((n = n.nextElementSibling) && 'A' == n.tagName) {
                            if (!/\bsf-dump-toggle\b/.test(n.className)) {
                                n = n.nextElementSibling || n;
                            }
                            f(n, e, true);
                        }
                    }
                });
            }
            ;function isCtrlKey(e) {
                return e.ctrlKey || e.metaKey;
            }
            function xpathString(str) {
                var parts = str.match(/[^'"]+|['"]/g).map(function(part) {
                    if ("'" == part) {
                        return '"\'"';
                    }
                    if ('"' == part) {
                        return "'\"'";
                    }
                    return "'" + part + "'";
                });
                return "concat(" + parts.join(",") + ", '')";
            }
            function xpathHasClass(className) {
                return "contains(concat(' ', normalize-space(@class), ' '), ' " + className + " ')";
            }
            addEventListener(root, 'mouseover', function(e) {
                if ('' != refStyle.innerHTML) {
                    refStyle.innerHTML = '';
                }
            });
            a('mouseover', function(a, e, c) {
                if (c) {
                    e.target.style.cursor = "pointer";
                } else if (a = idRx.exec(a.className)) {
                    try {
                        refStyle.innerHTML = 'pre.sf-dump .' + a[0] + '{background-color: #B729D9; color: #FFF !important; border-radius: 2px}';
                    } catch (e) {}
                }
            });
            a('click', function(a, e, c) {
                if (/\bsf-dump-toggle\b/.test(a.className)) {
                    e.preventDefault();
                    if (!toggle(a, isCtrlKey(e))) {
                        var r = doc.getElementById(a.getAttribute('href').slice(1))
                          , s = r.previousSibling
                          , f = r.parentNode
                          , t = a.parentNode;
                        t.replaceChild(r, a);
                        f.replaceChild(a, s);
                        t.insertBefore(s, r);
                        f = f.firstChild.nodeValue.match(indentRx);
                        t = t.firstChild.nodeValue.match(indentRx);
                        if (f && t && f[0] !== t[0]) {
                            r.innerHTML = r.innerHTML.replace(new RegExp('^' + f[0].replace(rxEsc, '\\$1'),'mg'), t[0]);
                        }
                        if (/\bsf-dump-compact\b/.test(r.className)) {
                            toggle(s, isCtrlKey(e));
                        }
                    }
                    if (c) {} else if (doc.getSelection) {
                        try {
                            doc.getSelection().removeAllRanges();
                        } catch (e) {
                            doc.getSelection().empty();
                        }
                    } else {
                        doc.selection.empty();
                    }
                } else if (/\bsf-dump-str-toggle\b/.test(a.className)) {
                    e.preventDefault();
                    e = a.parentNode.parentNode;
                    e.className = e.className.replace(/\bsf-dump-str-(expand|collapse)\b/, a.parentNode.className);
                }
            });
            elt = root.getElementsByTagName('SAMP');
            len = elt.length;
            i = 0;
            while (i < len)
                t.push(elt[i++]);
            len = t.length;
            for (i = 0; i < len; ++i) {
                elt = t[i];
                if ('SAMP' == elt.tagName) {
                    a = elt.previousSibling || {};
                    if ('A' != a.tagName) {
                        a = doc.createElement('A');
                        a.className = 'sf-dump-ref';
                        elt.parentNode.insertBefore(a, elt);
                    } else {
                        a.innerHTML += ' ';
                    }
                    a.title = (a.title ? a.title + '\n[' : '[') + keyHint + '+click] Expand all children';
                    a.innerHTML += elt.className == 'sf-dump-compact' ? '<span>&#9654;</span>' : '<span>&#9660;</span>';
                    a.className += ' sf-dump-toggle';
                    x = 1;
                    if ('sf-dump' != elt.parentNode.className) {
                        x += elt.parentNode.getAttribute('data-depth') / 1;
                    }
                } else if (/\bsf-dump-ref\b/.test(elt.className) && (a = elt.getAttribute('href'))) {
                    a = a.slice(1);
                    elt.className += ' ' + a;
                    if (/[\[{]$/.test(elt.previousSibling.nodeValue)) {
                        a = a != elt.nextSibling.id && doc.getElementById(a);
                        try {
                            s = a.nextSibling;
                            elt.appendChild(a);
                            s.parentNode.insertBefore(a, s);
                            if (/^[@#]/.test(elt.innerHTML)) {
                                elt.innerHTML += ' <span>&#9654;</span>';
                            } else {
                                elt.innerHTML = '<span>&#9654;</span>';
                                elt.className = 'sf-dump-ref';
                            }
                            elt.className += ' sf-dump-toggle';
                        } catch (e) {
                            if ('&' == elt.innerHTML.charAt(0)) {
                                elt.innerHTML = '&#8230;';
                                elt.className = 'sf-dump-ref';
                            }
                        }
                    }
                }
            }
            if (doc.evaluate && Array.from && root.children.length > 1) {
                root.setAttribute('tabindex', 0);
                SearchState = function() {
                    this.nodes = [];
                    this.idx = 0;
                }
                ;
                SearchState.prototype = {
                    next: function() {
                        if (this.isEmpty()) {
                            return this.current();
                        }
                        this.idx = this.idx < (this.nodes.length - 1) ? this.idx + 1 : 0;
                        return this.current();
                    },
                    previous: function() {
                        if (this.isEmpty()) {
                            return this.current();
                        }
                        this.idx = this.idx > 0 ? this.idx - 1 : (this.nodes.length - 1);
                        return this.current();
                    },
                    isEmpty: function() {
                        return 0 === this.count();
                    },
                    current: function() {
                        if (this.isEmpty()) {
                            return null;
                        }
                        return this.nodes[this.idx];
                    },
                    reset: function() {
                        this.nodes = [];
                        this.idx = 0;
                    },
                    count: function() {
                        return this.nodes.length;
                    },
                };
                function showCurrent(state) {
                    var currentNode = state.current(), currentRect, searchRect;
                    if (currentNode) {
                        reveal(currentNode);
                        highlight(root, currentNode, state.nodes);
                        if ('scrollIntoView'in currentNode) {
                            currentNode.scrollIntoView(true);
                            currentRect = currentNode.getBoundingClientRect();
                            searchRect = search.getBoundingClientRect();
                            if (currentRect.top < (searchRect.top + searchRect.height)) {
                                window.scrollBy(0, -(searchRect.top + searchRect.height + 5));
                            }
                        }
                    }
                    counter.textContent = (state.isEmpty() ? 0 : state.idx + 1) + ' of ' + state.count();
                }
                var search = doc.createElement('div');
                search.className = 'sf-dump-search-wrapper sf-dump-search-hidden';
                search.innerHTML = ' <input type="text" class="sf-dump-search-input"> <span class="sf-dump-search-count">0 of 0<\/span> <button type="button" class="sf-dump-search-input-previous" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 1331l-166 165q-19 19-45 19t-45-19L896 965l-531 531q-19 19-45 19t-45-19l-166-165q-19-19-19-45.5t19-45.5l742-741q19-19 45-19t45 19l742 741q19 19 19 45.5t-19 45.5z"\/><\/svg> <\/button> <button type="button" class="sf-dump-search-input-next" tabindex="-1"> <svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1683 808l-742 741q-19 19-45 19t-45-19L109 808q-19-19-19-45.5t19-45.5l166-165q19-19 45-19t45 19l531 531 531-531q19-19 45-19t45 19l166 165q19 19 19 45.5t-19 45.5z"\/><\/svg> <\/button> ';
                root.insertBefore(search, root.firstChild);
                var state = new SearchState();
                var searchInput = search.querySelector('.sf-dump-search-input');
                var counter = search.querySelector('.sf-dump-search-count');
                var searchInputTimer = 0;
                var previousSearchQuery = '';
                addEventListener(searchInput, 'keyup', function(e) {
                    var searchQuery = e.target.value;
                    /* Don't perform anything if the pressed key didn't change the query */
                    if (searchQuery === previousSearchQuery) {
                        return;
                    }
                    previousSearchQuery = searchQuery;
                    clearTimeout(searchInputTimer);
                    searchInputTimer = setTimeout(function() {
                        state.reset();
                        collapseAll(root);
                        resetHighlightedNodes(root);
                        if ('' === searchQuery) {
                            counter.textContent = '0 of 0';
                            return;
                        }
                        var classMatches = ["sf-dump-str", "sf-dump-key", "sf-dump-public", "sf-dump-protected", "sf-dump-private", ].map(xpathHasClass).join(' or ');
                        var xpathResult = doc.evaluate('.//span[' + classMatches + '][contains(translate(child::text(), ' + xpathString(searchQuery.toUpperCase()) + ', ' + xpathString(searchQuery.toLowerCase()) + '), ' + xpathString(searchQuery.toLowerCase()) + ')]', root, null, XPathResult.ORDERED_NODE_ITERATOR_TYPE, null);
                        while (node = xpathResult.iterateNext())
                            state.nodes.push(node);
                        showCurrent(state);
                    }, 400);
                });
                Array.from(search.querySelectorAll('.sf-dump-search-input-next, .sf-dump-search-input-previous')).forEach(function(btn) {
                    addEventListener(btn, 'click', function(e) {
                        e.preventDefault();
                        -1 !== e.target.className.indexOf('next') ? state.next() : state.previous();
                        searchInput.focus();
                        collapseAll(root);
                        showCurrent(state);
                    })
                });
                addEventListener(root, 'keydown', function(e) {
                    var isSearchActive = !/\bsf-dump-search-hidden\b/.test(search.className);
                    if ((114 === e.keyCode && !isSearchActive) || (isCtrlKey(e) && 70 === e.keyCode)) {
                        /* F3 or CMD/CTRL + F */
                        if (70 === e.keyCode && document.activeElement === searchInput) {
                            /* * If CMD/CTRL + F is hit while having focus on search input, * the user probably meant to trigger browser search instead. * Let the browser execute its behavior: */
                            return;
                        }
                        e.preventDefault();
                        search.className = search.className.replace(/\bsf-dump-search-hidden\b/, '');
                        searchInput.focus();
                    } else if (isSearchActive) {
                        if (27 === e.keyCode) {
                            /* ESC key */
                            search.className += ' sf-dump-search-hidden';
                            e.preventDefault();
                            resetHighlightedNodes(root);
                            searchInput.value = '';
                        } else if ((isCtrlKey(e) && 71 === e.keyCode)/* CMD/CTRL + G */
                        || 13 === e.keyCode /* Enter */
                        || 114 === e.keyCode /* F3 */
                        ) {
                            e.preventDefault();
                            e.shiftKey ? state.previous() : state.next();
                            collapseAll(root);
                            showCurrent(state);
                        }
                    }
                });
            }
            if (0 >= options.maxStringLength) {
                return;
            }
            try {
                elt = root.querySelectorAll('.sf-dump-str');
                len = elt.length;
                i = 0;
                t = [];
                while (i < len)
                    t.push(elt[i++]);
                len = t.length;
                for (i = 0; i < len; ++i) {
                    elt = t[i];
                    s = elt.innerText || elt.textContent;
                    x = s.length - options.maxStringLength;
                    if (0 < x) {
                        h = elt.innerHTML;
                        elt[elt.innerText ? 'innerText' : 'textContent'] = s.substring(0, options.maxStringLength);
                        elt.className += ' sf-dump-str-collapse';
                        elt.innerHTML = '<span class=sf-dump-str-collapse>' + h + '<a class="sf-dump-ref sf-dump-str-toggle" title="Collapse"> &#9664;</a></span>' + '<span class=sf-dump-str-expand>' + elt.innerHTML + '<a class="sf-dump-ref sf-dump-str-toggle" title="' + x + ' remaining characters"> &#9654;</a></span>';
                    }
                }
            } catch (e) {}
        }
        ;
    }
    )(document);
</script>
<style>
    pre.sf-dump {
        display: block;
        white-space: pre;
        padding: 5px;
        overflow: initial !important;
    }

    pre.sf-dump:after {
        content: "";
        visibility: hidden;
        display: block;
        height: 0;
        clear: both;
    }

    pre.sf-dump span {
        display: inline;
    }

    pre.sf-dump a {
        text-decoration: none;
        cursor: pointer;
        border: 0;
        outline: none;
        color: inherit;
    }

    pre.sf-dump img {
        max-width: 50em;
        max-height: 50em;
        margin: .5em 0 0 0;
        padding: 0;
        background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAAAAAA6mKC9AAAAHUlEQVQY02O8zAABilCaiQEN0EeA8QuUcX9g3QEAAjcC5piyhyEAAAAASUVORK5CYII=) #D3D3D3;
    }

    pre.sf-dump .sf-dump-ellipsis {
        display: inline-block;
        overflow: visible;
        text-overflow: ellipsis;
        max-width: 5em;
        white-space: nowrap;
        overflow: hidden;
        vertical-align: top;
    }

    pre.sf-dump .sf-dump-ellipsis+.sf-dump-ellipsis {
        max-width: none;
    }

    pre.sf-dump code {
        display: inline;
        padding: 0;
        background: none;
    }

    .sf-dump-public.sf-dump-highlight, .sf-dump-protected.sf-dump-highlight, .sf-dump-private.sf-dump-highlight, .sf-dump-str.sf-dump-highlight, .sf-dump-key.sf-dump-highlight {
        background: rgba(111, 172, 204, 0.3);
        border: 1px solid #7DA0B1;
        border-radius: 3px;
    }

    .sf-dump-public.sf-dump-highlight-active, .sf-dump-protected.sf-dump-highlight-active, .sf-dump-private.sf-dump-highlight-active, .sf-dump-str.sf-dump-highlight-active, .sf-dump-key.sf-dump-highlight-active {
        background: rgba(253, 175, 0, 0.4);
        border: 1px solid #ffa500;
        border-radius: 3px;
    }

    pre.sf-dump .sf-dump-search-hidden {
        display: none !important;
    }

    pre.sf-dump .sf-dump-search-wrapper {
        font-size: 0;
        white-space: nowrap;
        margin-bottom: 5px;
        display: flex;
        position: -webkit-sticky;
        position: sticky;
        top: 5px;
    }

    pre.sf-dump .sf-dump-search-wrapper > * {
        vertical-align: top;
        box-sizing: border-box;
        height: 21px;
        font-weight: normal;
        border-radius: 0;
        background: #FFF;
        color: #757575;
        border: 1px solid #BBB;
    }

    pre.sf-dump .sf-dump-search-wrapper > input.sf-dump-search-input {
        padding: 3px;
        height: 21px;
        font-size: 12px;
        border-right: none;
        border-top-left-radius: 3px;
        border-bottom-left-radius: 3px;
        color: #000;
        min-width: 15px;
        width: 100%;
    }

    pre.sf-dump .sf-dump-search-wrapper > .sf-dump-search-input-next, pre.sf-dump .sf-dump-search-wrapper > .sf-dump-search-input-previous {
        background: #F2F2F2;
        outline: none;
        border-left: none;
        font-size: 0;
        line-height: 0;
    }

    pre.sf-dump .sf-dump-search-wrapper > .sf-dump-search-input-next {
        border-top-right-radius: 3px;
        border-bottom-right-radius: 3px;
    }

    pre.sf-dump .sf-dump-search-wrapper > .sf-dump-search-input-next > svg, pre.sf-dump .sf-dump-search-wrapper > .sf-dump-search-input-previous > svg {
        pointer-events: none;
        width: 12px;
        height: 12px;
    }

    pre.sf-dump .sf-dump-search-wrapper > .sf-dump-search-count {
        display: inline-block;
        padding: 0 5px;
        margin: 0;
        border-left: none;
        line-height: 21px;
        font-size: 12px;
    }

    pre.sf-dump, pre.sf-dump .sf-dump-default {
        background-color: #18171B;
        color: #FF8400;
        line-height: 1.2em;
        font: 12px Menlo, Monaco, Consolas, monospace;
        word-wrap: break-word;
        white-space: pre-wrap;
        position: relative;
        z-index: 99999;
        word-break: break-all
    }

    pre.sf-dump .sf-dump-num {
        font-weight: bold;
        color: #1299DA
    }

    pre.sf-dump .sf-dump-const {
        font-weight: bold
    }

    pre.sf-dump .sf-dump-str {
        font-weight: bold;
        color: #56DB3A
    }

    pre.sf-dump .sf-dump-note {
        color: #1299DA
    }

    pre.sf-dump .sf-dump-ref {
        color: #A0A0A0
    }

    pre.sf-dump .sf-dump-public {
        color: #FFFFFF
    }

    pre.sf-dump .sf-dump-protected {
        color: #FFFFFF
    }

    pre.sf-dump .sf-dump-private {
        color: #FFFFFF
    }

    pre.sf-dump .sf-dump-meta {
        color: #B729D9
    }

    pre.sf-dump .sf-dump-key {
        color: #56DB3A
    }

    pre.sf-dump .sf-dump-index {
        color: #1299DA
    }

    pre.sf-dump .sf-dump-ellipsis {
        color: #FF8400
    }

    pre.sf-dump .sf-dump-ns {
        user-select: none;
    }

    pre.sf-dump .sf-dump-ellipsis-note {
        color: #1299DA
    }
</style>
<pre class=sf-dump id=sf-dump-1985177105 data-indent-pad="  ">
    <span class=sf-dump-note>Error</span>
    {<a class=sf-dump-ref>#1321</a>
    <samp data-depth=1 class=sf-dump-expanded>
        <span style="color: #A0A0A0;">// app\Http\Controllers\ApplicantController.php:308</span>
        #<span class=sf-dump-protected title="Protected property">message</span>
        : "<span class=sf-dump-str title="34 characters">Class &quot;App\Helpers\Auth &quot;not found</span>
        "
  #<span class=sf-dump-protected title="Protected property">code</span>
        : <span class=sf-dump-num>0</span>
        #<span class=sf-dump-protected title="Protected property">file</span>
        : "
        <span class=sf-dump-str title="C:\laragon\www\mob-kfa\protected\app\Helpers\BackOffice.php
59 characters">
            <span class="sf-dump-ellipsis sf-dump-ellipsis-path">C:\laragon\www\mob-kfa\protected</span>
            <span class="sf-dump-ellipsis sf-dump-ellipsis-path">\</span>
            app\Helpers\BackOffice.php
        </span>
        "
  #<span class=sf-dump-protected title="Protected property">line</span>
        : <span class=sf-dump-num>57</span>
        <span class=sf-dump-meta>trace</span>
        : {
        <samp data-depth=2 class=sf-dump-compact>
            <span class=sf-dump-meta title="C:\laragon\www\mob-kfa\protected\app\Helpers\BackOffice.php:57
Stack level 50.">
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">C:\laragon\www\mob-kfa\protected</span>
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">\</span>
                app\Helpers\BackOffice.php:57
            </span>
            {
            <samp data-depth=3 class=sf-dump-compact>
                <span class=sf-dump-note title="App\Helpers\BackOffice::registerToBackOffice($password, $pin, $merchant)
">
                    <span class="sf-dump-ellipsis sf-dump-ellipsis-note">App\Helpers</span>
                    <span class="sf-dump-ellipsis sf-dump-ellipsis-note">\</span>
                    BackOffice::registerToBackOffice($password, $pin, $merchant)
                </span>
                &#8230;&#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        <span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-const title="in App\Helpers\BackOffice::registerToBackOffice($password, $pin, $merchant)">
                        <span class="sf-dump-default">\t</span>
                        $auth = Auth::user();<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        $mccId = Utils::getBoIdOutlets($merchant-&gt;mcc);<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
            </samp>
            }
    
            <span class=sf-dump-meta title="C:\laragon\www\mob-kfa\protected\app\Http\Controllers\ApplicantController.php:295
Stack level 49.">
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">C:\laragon\www\mob-kfa\protected</span>
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">\</span>
                app\Http\Controllers\ApplicantController.php:295
            </span>
            {
            <samp data-depth=3 class=sf-dump-compact>
                <span class=sf-dump-note title="App\Http\Controllers\ApplicantController-&gt;addMerchantBO($token_applicant)
">
                    <span class="sf-dump-ellipsis sf-dump-ellipsis-note">App\Http\Controllers</span>
                    <span class="sf-dump-ellipsis sf-dump-ellipsis-note">\</span>
                    ApplicantController-&gt;addMerchantBO($token_applicant)
                </span>
                &#8230;&#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        <span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-const title="in App\Http\Controllers\ApplicantController-&gt;addMerchantBO($token_applicant)">
                        $merchant_id = BackOffice::registerToBackOffice($encPass, $encPin, $merchant);<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        // $merchant_id = BackOffice::registerToBackOffice($encPass, $merchant-&gt;email, $merchant-&gt;username, $encPin, $merchant-&gt;nama_merchant);<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                <span class=sf-dump-meta>arguments</span>
                : {
                <samp data-depth=4 class=sf-dump-compact>
                    <span class=sf-dump-meta>$password</span>
                    : "<span class=sf-dump-str title="94 characters">j1mpjz0M9cYEgD40TQBiHEtzm5YdGxdlVgEl6EY69zE=:Bv+nlY3R9NNGwvEVyJ7fDA==:Au004Su8Hky6aohOAGG+3A==</span>
                    "
        <span class=sf-dump-meta>$pin</span>
                    : "<span class=sf-dump-str title="94 characters">syhgcBW2t6hqpYr8djSkoVKwww2uiBA3pgEn+ZaD8XU=:pbPKJeAH4mxWv4vM4X0QkQ==:PNyyZwXtpHQzmx5m9Nkw4g==</span>
                    "
        <span class=sf-dump-meta>$merchant</span>
                    : 
                    <span class=sf-dump-note title="App\Models\Merchant
">
                        <span class="sf-dump-ellipsis sf-dump-ellipsis-note">App\Models</span>
                        <span class="sf-dump-ellipsis sf-dump-ellipsis-note">\</span>
                        Merchant
                    </span>
                    {<a class=sf-dump-ref>#1559</a>
                    &#8230;}
      
                </samp>
                }
    
            </samp>
            }
    
            <span class=sf-dump-meta title="C:\laragon\www\mob-kfa\protected\app\Http\Controllers\ApplicantController.php:252
Stack level 48.">
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">C:\laragon\www\mob-kfa\protected</span>
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">\</span>
                app\Http\Controllers\ApplicantController.php:252
            </span>
            {
            <samp data-depth=3 class=sf-dump-compact>
                <span class=sf-dump-note title="App\Http\Controllers\ApplicantController-&gt;documentUpdate(Request $request)
">
                    <span class="sf-dump-ellipsis sf-dump-ellipsis-note">App\Http\Controllers</span>
                    <span class="sf-dump-ellipsis sf-dump-ellipsis-note">\</span>
                    ApplicantController-&gt;documentUpdate(Request $request)
                </span>
                &#8230;&#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        if ($request-&gt;status_approval == &#039;Approve &#039;) {<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-const title="in App\Http\Controllers\ApplicantController-&gt;documentUpdate(Request $request)">
                        $integrated = $this-&gt;addMerchantBO($data-&gt;token_applicant);<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        <span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                <span class=sf-dump-meta>arguments</span>
                : {
                <samp data-depth=4 class=sf-dump-compact>
                    <span class=sf-dump-meta>$token_applicant</span>
                    : "<span class=sf-dump-str title="36 characters">464f08b9-ec4a-46e9-8bc5-63a32ecd914d</span>
                    "
      
                </samp>
                }
    
            </samp>
            }
    
            <span class=sf-dump-meta title="C:\laragon\www\mob-kfa\protected\vendor\laravel\framework\src\Illuminate\Routing\Controller.php:54
Stack level 47.">
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">C:\laragon\www\mob-kfa\protected\vendor</span>
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">\laravel\framework\</span>
                src\Illuminate\Routing\Controller.php:54
            </span>
            {
            <samp data-depth=3 class=sf-dump-compact>
                <span class=sf-dump-note title="Illuminate\Routing\Controller-&gt;callAction($method, $parameters)
">
                    <span class="sf-dump-ellipsis sf-dump-ellipsis-note">Illuminate\Routing</span>
                    <span class="sf-dump-ellipsis sf-dump-ellipsis-note">\</span>
                    Controller-&gt;callAction($method, $parameters)
                </span>
                &#8230;&#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        {<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-const title="in Illuminate\Routing\Controller-&gt;callAction($method, $parameters)">
                        return $this-&gt;{$method}(...array_values($parameters));<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        }<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                <span class=sf-dump-meta>arguments</span>
                : {
                <samp data-depth=4 class=sf-dump-compact>
                    <span class=sf-dump-meta>$request</span>
                    : 
                    <span class=sf-dump-note title="Illuminate\Http\Request
">
                        <span class="sf-dump-ellipsis sf-dump-ellipsis-note">Illuminate\Http</span>
                        <span class="sf-dump-ellipsis sf-dump-ellipsis-note">\</span>
                        Request
                    </span>
                    {<a class=sf-dump-ref href=#sf-dump-1985177105-ref244 title="40 occurrences">#44</a>
                    &#8230;}
      
                </samp>
                }
    
            </samp>
            }
    
            <span class=sf-dump-meta title="C:\laragon\www\mob-kfa\protected\vendor\laravel\framework\src\Illuminate\Routing\ControllerDispatcher.php:43
Stack level 46.">
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">C:\laragon\www\mob-kfa\protected\vendor</span>
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">\laravel\framework\</span>
                src\Illuminate\Routing\ControllerDispatcher.php:43
            </span>
            {
            <samp data-depth=3 class=sf-dump-compact>
                <span class=sf-dump-note title="Illuminate\Routing\ControllerDispatcher-&gt;dispatch(Route $route, $controller, $method)
">
                    <span class="sf-dump-ellipsis sf-dump-ellipsis-note">Illuminate\Routing</span>
                    <span class="sf-dump-ellipsis sf-dump-ellipsis-note">\</span>
                    ControllerDispatcher-&gt;dispatch(Route $route, $controller, $method)
                </span>
                &#8230;&#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        if (method_exists($controller, &#039;callAction &#039;)) {<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-const title="in Illuminate\Routing\ControllerDispatcher-&gt;dispatch(Route $route, $controller, $method)">
                        return $controller-&gt;callAction($method, $parameters);<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        }<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                <span class=sf-dump-meta>arguments</span>
                : {
                <samp data-depth=4 class=sf-dump-compact>
                    <span class=sf-dump-meta>$method</span>
                    : "<span class=sf-dump-str title="14 characters">documentUpdate</span>
                    "
        <span class=sf-dump-meta>$parameters</span>
                    : <span class=sf-dump-note>array:1</span>
                    [ &#8230;1]
      
                </samp>
                }
    
            </samp>
            }
    
            <span class=sf-dump-meta title="C:\laragon\www\mob-kfa\protected\vendor\laravel\framework\src\Illuminate\Routing\Route.php:260
Stack level 45.">
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">C:\laragon\www\mob-kfa\protected\vendor</span>
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">\laravel\framework\</span>
                src\Illuminate\Routing\Route.php:260
            </span>
            {
            <samp data-depth=3 class=sf-dump-compact>
                <span class=sf-dump-note title="Illuminate\Routing\Route-&gt;runController()
">
                    <span class="sf-dump-ellipsis sf-dump-ellipsis-note">Illuminate\Routing</span>
                    <span class="sf-dump-ellipsis sf-dump-ellipsis-note">\</span>
                    Route-&gt;runController()
                </span>
                &#8230;&#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        return $this-&gt;controllerDispatcher()-&gt;dispatch(<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-const title="in Illuminate\Routing\Route-&gt;runController()">
                        $this, $this-&gt;getController(), $this-&gt;getControllerMethod()<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        );<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                <span class=sf-dump-meta>arguments</span>
                : {
                <samp data-depth=4 class=sf-dump-compact>
                    <span class=sf-dump-meta>$route</span>
                    : 
                    <span class=sf-dump-note title="Illuminate\Routing\Route
">
                        <span class="sf-dump-ellipsis sf-dump-ellipsis-note">Illuminate\Routing</span>
                        <span class="sf-dump-ellipsis sf-dump-ellipsis-note">\</span>
                        Route
                    </span>
                    {<a class=sf-dump-ref href=#sf-dump-1985177105-ref2416 title="3 occurrences">#416</a>
                    &#8230;}
        <span class=sf-dump-meta>$controller</span>
                    : 
                    <span class=sf-dump-note title="App\Http\Controllers\ApplicantController
">
                        <span class="sf-dump-ellipsis sf-dump-ellipsis-note">App\Http\Controllers</span>
                        <span class="sf-dump-ellipsis sf-dump-ellipsis-note">\</span>
                        ApplicantController
                    </span>
                    {<a class=sf-dump-ref>#472</a>
                    &#8230;}
        <span class=sf-dump-meta>$method</span>
                    : "<span class=sf-dump-str title="14 characters">documentUpdate</span>
                    "
      
                </samp>
                }
    
            </samp>
            }
    
            <span class=sf-dump-meta title="C:\laragon\www\mob-kfa\protected\vendor\laravel\framework\src\Illuminate\Routing\Route.php:205
Stack level 44.">
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">C:\laragon\www\mob-kfa\protected\vendor</span>
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">\laravel\framework\</span>
                src\Illuminate\Routing\Route.php:205
            </span>
            {
            <samp data-depth=3 class=sf-dump-compact>
                <span class=sf-dump-note title="Illuminate\Routing\Route-&gt;run()
">
                    <span class="sf-dump-ellipsis sf-dump-ellipsis-note">Illuminate\Routing</span>
                    <span class="sf-dump-ellipsis sf-dump-ellipsis-note">\</span>
                    Route-&gt;run()
                </span>
                &#8230;&#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        if ($this-&gt;isControllerAction()) {<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-const title="in Illuminate\Routing\Route-&gt;run()">
                        return $this-&gt;runController();<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        }<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
            </samp>
            }
    
            <span class=sf-dump-meta title="C:\laragon\www\mob-kfa\protected\vendor\laravel\framework\src\Illuminate\Routing\Router.php:798
Stack level 43.">
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">C:\laragon\www\mob-kfa\protected\vendor</span>
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">\laravel\framework\</span>
                src\Illuminate\Routing\Router.php:798
            </span>
            {
            <samp data-depth=3 class=sf-dump-compact>
                <span class=sf-dump-note title="Illuminate\Routing\Router-&gt;Illuminate\Routing\{closure}
">
                    <span class="sf-dump-ellipsis sf-dump-ellipsis-note">Illuminate\Routing\Router-&gt;Illuminate\Routing</span>
                    <span class="sf-dump-ellipsis sf-dump-ellipsis-note">\</span>
                    {closure}
                </span>
                &#8230;&#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        -&gt;then(fn ($request) =&gt;$this-&gt;prepareResponse(<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-const title="in Illuminate\Routing\Router-&gt;Illuminate\Routing\{closure}">
                        $request, $route-&gt;run()<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        ));<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
            </samp>
            }
    
            <span class=sf-dump-meta title="C:\laragon\www\mob-kfa\protected\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:141
Stack level 42.">
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">C:\laragon\www\mob-kfa\protected\vendor</span>
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">\laravel\framework\</span>
                src\Illuminate\Pipeline\Pipeline.php:141
            </span>
            {
            <samp data-depth=3 class=sf-dump-compact>
                <span class=sf-dump-note title="Illuminate\Pipeline\Pipeline-&gt;Illuminate\Pipeline\{closure}
">
                    <span class="sf-dump-ellipsis sf-dump-ellipsis-note">Illuminate\Pipeline\Pipeline-&gt;Illuminate\Pipeline</span>
                    <span class="sf-dump-ellipsis sf-dump-ellipsis-note">\</span>
                    {closure}
                </span>
                &#8230;&#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        try {<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-const title="in Illuminate\Pipeline\Pipeline-&gt;Illuminate\Pipeline\{closure}">
                        return $destination($passable);<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        } catch (Throwable $e) {<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                <span class=sf-dump-meta>arguments</span>
                : {
                <samp data-depth=4 class=sf-dump-compact>
                    <span class=sf-dump-note title="Illuminate\Http\Request
">
                        <span class="sf-dump-ellipsis sf-dump-ellipsis-note">Illuminate\Http</span>
                        <span class="sf-dump-ellipsis sf-dump-ellipsis-note">\</span>
                        Request
                    </span>
                    {<a class=sf-dump-ref href=#sf-dump-1985177105-ref244 title="40 occurrences">#44</a>
                    &#8230;}
      
                </samp>
                }
    
            </samp>
            }
    
            <span class=sf-dump-meta title="C:\laragon\www\mob-kfa\protected\vendor\laravel\framework\src\Illuminate\Routing\Middleware\SubstituteBindings.php:50
Stack level 41.">
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">C:\laragon\www\mob-kfa\protected\vendor</span>
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">\laravel\framework\</span>
                src\Illuminate\Routing\Middleware\SubstituteBindings.php:50
            </span>
            {
            <samp data-depth=3 class=sf-dump-compact>
                <span class=sf-dump-note title="Illuminate\Routing\Middleware\SubstituteBindings-&gt;handle($request, Closure $next)
">
                    <span class="sf-dump-ellipsis sf-dump-ellipsis-note">Illuminate\Routing\Middleware</span>
                    <span class="sf-dump-ellipsis sf-dump-ellipsis-note">\</span>
                    SubstituteBindings-&gt;handle($request, Closure $next)
                </span>
                &#8230;&#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        <span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-const title="in Illuminate\Routing\Middleware\SubstituteBindings-&gt;handle($request, Closure $next)">
                        return $next($request);<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        }<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                <span class=sf-dump-meta>arguments</span>
                : {
                <samp data-depth=4 class=sf-dump-compact>
                    <span class=sf-dump-note title="Illuminate\Http\Request
">
                        <span class="sf-dump-ellipsis sf-dump-ellipsis-note">Illuminate\Http</span>
                        <span class="sf-dump-ellipsis sf-dump-ellipsis-note">\</span>
                        Request
                    </span>
                    {<a class=sf-dump-ref href=#sf-dump-1985177105-ref244 title="40 occurrences">#44</a>
                    &#8230;}
      
                </samp>
                }
    
            </samp>
            }
    
            <span class=sf-dump-meta title="C:\laragon\www\mob-kfa\protected\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:180
Stack level 40.">
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">C:\laragon\www\mob-kfa\protected\vendor</span>
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">\laravel\framework\</span>
                src\Illuminate\Pipeline\Pipeline.php:180
            </span>
            {
            <samp data-depth=3 class=sf-dump-compact>
                <span class=sf-dump-note title="Illuminate\Pipeline\Pipeline-&gt;Illuminate\Pipeline\{closure}
">
                    <span class="sf-dump-ellipsis sf-dump-ellipsis-note">Illuminate\Pipeline\Pipeline-&gt;Illuminate\Pipeline</span>
                    <span class="sf-dump-ellipsis sf-dump-ellipsis-note">\</span>
                    {closure}
                </span>
                &#8230;&#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        $carry = method_exists($pipe, $this-&gt;method)<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-const title="in Illuminate\Pipeline\Pipeline-&gt;Illuminate\Pipeline\{closure}">
                        ? $pipe-&gt;{$this-&gt;method}(...$parameters)<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        : $pipe(...$parameters);<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                <span class=sf-dump-meta>arguments</span>
                : {
                <samp data-depth=4 class=sf-dump-compact>
                    <span class=sf-dump-meta>$request</span>
                    : 
                    <span class=sf-dump-note title="Illuminate\Http\Request
">
                        <span class="sf-dump-ellipsis sf-dump-ellipsis-note">Illuminate\Http</span>
                        <span class="sf-dump-ellipsis sf-dump-ellipsis-note">\</span>
                        Request
                    </span>
                    {<a class=sf-dump-ref href=#sf-dump-1985177105-ref244 title="40 occurrences">#44</a>
                    &#8230;}
        <span class=sf-dump-meta>$next</span>
                    : <span class=sf-dump-note>Closure($passable)</span>
                    {<a class=sf-dump-ref href=#sf-dump-1985177105-ref2461 title="13 occurrences">#461</a>
                    &#8230;}
      
                </samp>
                }
    
            </samp>
            }
    
            <span class=sf-dump-meta title="C:\laragon\www\mob-kfa\protected\vendor\laravel\framework\src\Illuminate\Auth\Middleware\Authenticate.php:44
Stack level 39.">
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">C:\laragon\www\mob-kfa\protected\vendor</span>
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">\laravel\framework\</span>
                src\Illuminate\Auth\Middleware\Authenticate.php:44
            </span>
            {
            <samp data-depth=3 class=sf-dump-compact>
                <span class=sf-dump-note title="Illuminate\Auth\Middleware\Authenticate-&gt;handle($request, Closure $next, ...$guards)
">
                    <span class="sf-dump-ellipsis sf-dump-ellipsis-note">Illuminate\Auth\Middleware</span>
                    <span class="sf-dump-ellipsis sf-dump-ellipsis-note">\</span>
                    Authenticate-&gt;handle($request, Closure $next, ...$guards)
                </span>
                &#8230;&#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        <span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-const title="in Illuminate\Auth\Middleware\Authenticate-&gt;handle($request, Closure $next, ...$guards)">
                        return $next($request);<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        }<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                <span class=sf-dump-meta>arguments</span>
                : {
                <samp data-depth=4 class=sf-dump-compact>
                    <span class=sf-dump-note title="Illuminate\Http\Request
">
                        <span class="sf-dump-ellipsis sf-dump-ellipsis-note">Illuminate\Http</span>
                        <span class="sf-dump-ellipsis sf-dump-ellipsis-note">\</span>
                        Request
                    </span>
                    {<a class=sf-dump-ref href=#sf-dump-1985177105-ref244 title="40 occurrences">#44</a>
                    &#8230;}
      
                </samp>
                }
    
            </samp>
            }
    
            <span class=sf-dump-meta title="C:\laragon\www\mob-kfa\protected\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:180
Stack level 38.">
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">C:\laragon\www\mob-kfa\protected\vendor</span>
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">\laravel\framework\</span>
                src\Illuminate\Pipeline\Pipeline.php:180
            </span>
            {
            <samp data-depth=3 class=sf-dump-compact>
                <span class=sf-dump-note title="Illuminate\Pipeline\Pipeline-&gt;Illuminate\Pipeline\{closure}
">
                    <span class="sf-dump-ellipsis sf-dump-ellipsis-note">Illuminate\Pipeline\Pipeline-&gt;Illuminate\Pipeline</span>
                    <span class="sf-dump-ellipsis sf-dump-ellipsis-note">\</span>
                    {closure}
                </span>
                &#8230;&#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        $carry = method_exists($pipe, $this-&gt;method)<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-const title="in Illuminate\Pipeline\Pipeline-&gt;Illuminate\Pipeline\{closure}">
                        ? $pipe-&gt;{$this-&gt;method}(...$parameters)<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        : $pipe(...$parameters);<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                <span class=sf-dump-meta>arguments</span>
                : {
                <samp data-depth=4 class=sf-dump-compact>
                    <span class=sf-dump-meta>$request</span>
                    : 
                    <span class=sf-dump-note title="Illuminate\Http\Request
">
                        <span class="sf-dump-ellipsis sf-dump-ellipsis-note">Illuminate\Http</span>
                        <span class="sf-dump-ellipsis sf-dump-ellipsis-note">\</span>
                        Request
                    </span>
                    {<a class=sf-dump-ref href=#sf-dump-1985177105-ref244 title="40 occurrences">#44</a>
                    &#8230;}
        <span class=sf-dump-meta>$next</span>
                    : <span class=sf-dump-note>Closure($passable)</span>
                    {<a class=sf-dump-ref href=#sf-dump-1985177105-ref2461 title="13 occurrences">#461</a>
                    &#8230;}
      
                </samp>
                }
    
            </samp>
            }
    
            <span class=sf-dump-meta title="C:\laragon\www\mob-kfa\protected\vendor\laravel\framework\src\Illuminate\Foundation\Http\Middleware\VerifyCsrfToken.php:78
Stack level 37.">
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">C:\laragon\www\mob-kfa\protected\vendor</span>
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">\laravel\framework\</span>
                src\Illuminate\Foundation\Http\Middleware\VerifyCsrfToken.php:78
            </span>
            {
            <samp data-depth=3 class=sf-dump-compact>
                <span class=sf-dump-note title="Illuminate\Foundation\Http\Middleware\VerifyCsrfToken-&gt;handle($request, Closure $next)
">
                    <span class="sf-dump-ellipsis sf-dump-ellipsis-note">Illuminate\Foundation\Http\Middleware</span>
                    <span class="sf-dump-ellipsis sf-dump-ellipsis-note">\</span>
                    VerifyCsrfToken-&gt;handle($request, Closure $next)
                </span>
                &#8230;&#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        ) {<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-const title="in Illuminate\Foundation\Http\Middleware\VerifyCsrfToken-&gt;handle($request, Closure $next)">
                        return tap($next($request), function ($response) use ($request) {<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        if ($this-&gt;shouldAddXsrfTokenCookie()) {<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                <span class=sf-dump-meta>arguments</span>
                : {
                <samp data-depth=4 class=sf-dump-compact>
                    <span class=sf-dump-note title="Illuminate\Http\Request
">
                        <span class="sf-dump-ellipsis sf-dump-ellipsis-note">Illuminate\Http</span>
                        <span class="sf-dump-ellipsis sf-dump-ellipsis-note">\</span>
                        Request
                    </span>
                    {<a class=sf-dump-ref href=#sf-dump-1985177105-ref244 title="40 occurrences">#44</a>
                    &#8230;}
      
                </samp>
                }
    
            </samp>
            }
    
            <span class=sf-dump-meta title="C:\laragon\www\mob-kfa\protected\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:180
Stack level 36.">
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">C:\laragon\www\mob-kfa\protected\vendor</span>
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">\laravel\framework\</span>
                src\Illuminate\Pipeline\Pipeline.php:180
            </span>
            {
            <samp data-depth=3 class=sf-dump-compact>
                <span class=sf-dump-note title="Illuminate\Pipeline\Pipeline-&gt;Illuminate\Pipeline\{closure}
">
                    <span class="sf-dump-ellipsis sf-dump-ellipsis-note">Illuminate\Pipeline\Pipeline-&gt;Illuminate\Pipeline</span>
                    <span class="sf-dump-ellipsis sf-dump-ellipsis-note">\</span>
                    {closure}
                </span>
                &#8230;&#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        $carry = method_exists($pipe, $this-&gt;method)<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-const title="in Illuminate\Pipeline\Pipeline-&gt;Illuminate\Pipeline\{closure}">
                        ? $pipe-&gt;{$this-&gt;method}(...$parameters)<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        : $pipe(...$parameters);<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                <span class=sf-dump-meta>arguments</span>
                : {
                <samp data-depth=4 class=sf-dump-compact>
                    <span class=sf-dump-meta>$request</span>
                    : 
                    <span class=sf-dump-note title="Illuminate\Http\Request
">
                        <span class="sf-dump-ellipsis sf-dump-ellipsis-note">Illuminate\Http</span>
                        <span class="sf-dump-ellipsis sf-dump-ellipsis-note">\</span>
                        Request
                    </span>
                    {<a class=sf-dump-ref href=#sf-dump-1985177105-ref244 title="40 occurrences">#44</a>
                    &#8230;}
        <span class=sf-dump-meta>$next</span>
                    : <span class=sf-dump-note>Closure($passable)</span>
                    {<a class=sf-dump-ref href=#sf-dump-1985177105-ref2461 title="13 occurrences">#461</a>
                    &#8230;}
      
                </samp>
                }
    
            </samp>
            }
    
            <span class=sf-dump-meta title="C:\laragon\www\mob-kfa\protected\vendor\laravel\framework\src\Illuminate\View\Middleware\ShareErrorsFromSession.php:49
Stack level 35.">
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">C:\laragon\www\mob-kfa\protected\vendor</span>
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">\laravel\framework\</span>
                src\Illuminate\View\Middleware\ShareErrorsFromSession.php:49
            </span>
            {
            <samp data-depth=3 class=sf-dump-compact>
                <span class=sf-dump-note title="Illuminate\View\Middleware\ShareErrorsFromSession-&gt;handle($request, Closure $next)
">
                    <span class="sf-dump-ellipsis sf-dump-ellipsis-note">Illuminate\View\Middleware</span>
                    <span class="sf-dump-ellipsis sf-dump-ellipsis-note">\</span>
                    ShareErrorsFromSession-&gt;handle($request, Closure $next)
                </span>
                &#8230;&#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        <span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-const title="in Illuminate\View\Middleware\ShareErrorsFromSession-&gt;handle($request, Closure $next)">
                        return $next($request);<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        }<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                <span class=sf-dump-meta>arguments</span>
                : {
                <samp data-depth=4 class=sf-dump-compact>
                    <span class=sf-dump-note title="Illuminate\Http\Request
">
                        <span class="sf-dump-ellipsis sf-dump-ellipsis-note">Illuminate\Http</span>
                        <span class="sf-dump-ellipsis sf-dump-ellipsis-note">\</span>
                        Request
                    </span>
                    {<a class=sf-dump-ref href=#sf-dump-1985177105-ref244 title="40 occurrences">#44</a>
                    &#8230;}
      
                </samp>
                }
    
            </samp>
            }
    
            <span class=sf-dump-meta title="C:\laragon\www\mob-kfa\protected\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:180
Stack level 34.">
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">C:\laragon\www\mob-kfa\protected\vendor</span>
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">\laravel\framework\</span>
                src\Illuminate\Pipeline\Pipeline.php:180
            </span>
            {
            <samp data-depth=3 class=sf-dump-compact>
                <span class=sf-dump-note title="Illuminate\Pipeline\Pipeline-&gt;Illuminate\Pipeline\{closure}
">
                    <span class="sf-dump-ellipsis sf-dump-ellipsis-note">Illuminate\Pipeline\Pipeline-&gt;Illuminate\Pipeline</span>
                    <span class="sf-dump-ellipsis sf-dump-ellipsis-note">\</span>
                    {closure}
                </span>
                &#8230;&#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        $carry = method_exists($pipe, $this-&gt;method)<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-const title="in Illuminate\Pipeline\Pipeline-&gt;Illuminate\Pipeline\{closure}">
                        ? $pipe-&gt;{$this-&gt;method}(...$parameters)<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        : $pipe(...$parameters);<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                <span class=sf-dump-meta>arguments</span>
                : {
                <samp data-depth=4 class=sf-dump-compact>
                    <span class=sf-dump-meta>$request</span>
                    : 
                    <span class=sf-dump-note title="Illuminate\Http\Request
">
                        <span class="sf-dump-ellipsis sf-dump-ellipsis-note">Illuminate\Http</span>
                        <span class="sf-dump-ellipsis sf-dump-ellipsis-note">\</span>
                        Request
                    </span>
                    {<a class=sf-dump-ref href=#sf-dump-1985177105-ref244 title="40 occurrences">#44</a>
                    &#8230;}
        <span class=sf-dump-meta>$next</span>
                    : <span class=sf-dump-note>Closure($passable)</span>
                    {<a class=sf-dump-ref href=#sf-dump-1985177105-ref2461 title="13 occurrences">#461</a>
                    &#8230;}
      
                </samp>
                }
    
            </samp>
            }
    
            <span class=sf-dump-meta title="C:\laragon\www\mob-kfa\protected\vendor\laravel\framework\src\Illuminate\Session\Middleware\StartSession.php:121
Stack level 33.">
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">C:\laragon\www\mob-kfa\protected\vendor</span>
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">\laravel\framework\</span>
                src\Illuminate\Session\Middleware\StartSession.php:121
            </span>
            {
            <samp data-depth=3 class=sf-dump-compact>
                <span class=sf-dump-note title="Illuminate\Session\Middleware\StartSession-&gt;handleStatefulRequest(Request $request, $session, Closure $next)
">
                    <span class="sf-dump-ellipsis sf-dump-ellipsis-note">Illuminate\Session\Middleware</span>
                    <span class="sf-dump-ellipsis sf-dump-ellipsis-note">\</span>
                    StartSession-&gt;handleStatefulRequest(Request $request, $session, Closure $next)
                </span>
                &#8230;&#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        <span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-const title="in Illuminate\Session\Middleware\StartSession-&gt;handleStatefulRequest(Request $request, $session, Closure $next)">
                        $response = $next($request);<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        <span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                <span class=sf-dump-meta>arguments</span>
                : {
                <samp data-depth=4 class=sf-dump-compact>
                    <span class=sf-dump-note title="Illuminate\Http\Request
">
                        <span class="sf-dump-ellipsis sf-dump-ellipsis-note">Illuminate\Http</span>
                        <span class="sf-dump-ellipsis sf-dump-ellipsis-note">\</span>
                        Request
                    </span>
                    {<a class=sf-dump-ref href=#sf-dump-1985177105-ref244 title="40 occurrences">#44</a>
                    &#8230;}
      
                </samp>
                }
    
            </samp>
            }
    
            <span class=sf-dump-meta title="C:\laragon\www\mob-kfa\protected\vendor\laravel\framework\src\Illuminate\Session\Middleware\StartSession.php:64
Stack level 32.">
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">C:\laragon\www\mob-kfa\protected\vendor</span>
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">\laravel\framework\</span>
                src\Illuminate\Session\Middleware\StartSession.php:64
            </span>
            {
            <samp data-depth=3 class=sf-dump-compact>
                <span class=sf-dump-note title="Illuminate\Session\Middleware\StartSession-&gt;handle($request, Closure $next)
">
                    <span class="sf-dump-ellipsis sf-dump-ellipsis-note">Illuminate\Session\Middleware</span>
                    <span class="sf-dump-ellipsis sf-dump-ellipsis-note">\</span>
                    StartSession-&gt;handle($request, Closure $next)
                </span>
                &#8230;&#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        <span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-const title="in Illuminate\Session\Middleware\StartSession-&gt;handle($request, Closure $next)">
                        return $this-&gt;handleStatefulRequest($request, $session, $next);<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        }<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                <span class=sf-dump-meta>arguments</span>
                : {
                <samp data-depth=4 class=sf-dump-compact>
                    <span class=sf-dump-meta>$request</span>
                    : 
                    <span class=sf-dump-note title="Illuminate\Http\Request
">
                        <span class="sf-dump-ellipsis sf-dump-ellipsis-note">Illuminate\Http</span>
                        <span class="sf-dump-ellipsis sf-dump-ellipsis-note">\</span>
                        Request
                    </span>
                    {<a class=sf-dump-ref href=#sf-dump-1985177105-ref244 title="40 occurrences">#44</a>
                    &#8230;}
        <span class=sf-dump-meta>$session</span>
                    : 
                    <span class=sf-dump-note title="Illuminate\Session\Store
">
                        <span class="sf-dump-ellipsis sf-dump-ellipsis-note">Illuminate\Session</span>
                        <span class="sf-dump-ellipsis sf-dump-ellipsis-note">\</span>
                        Store
                    </span>
                    {<a class=sf-dump-ref>#539</a>
                    &#8230;}
        <span class=sf-dump-meta>$next</span>
                    : <span class=sf-dump-note>Closure($passable)</span>
                    {<a class=sf-dump-ref>#528</a>
                    &#8230;}
      
                </samp>
                }
    
            </samp>
            }
    
            <span class=sf-dump-meta title="C:\laragon\www\mob-kfa\protected\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:180
Stack level 31.">
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">C:\laragon\www\mob-kfa\protected\vendor</span>
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">\laravel\framework\</span>
                src\Illuminate\Pipeline\Pipeline.php:180
            </span>
            {
            <samp data-depth=3 class=sf-dump-compact>
                <span class=sf-dump-note title="Illuminate\Pipeline\Pipeline-&gt;Illuminate\Pipeline\{closure}
">
                    <span class="sf-dump-ellipsis sf-dump-ellipsis-note">Illuminate\Pipeline\Pipeline-&gt;Illuminate\Pipeline</span>
                    <span class="sf-dump-ellipsis sf-dump-ellipsis-note">\</span>
                    {closure}
                </span>
                &#8230;&#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        $carry = method_exists($pipe, $this-&gt;method)<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-const title="in Illuminate\Pipeline\Pipeline-&gt;Illuminate\Pipeline\{closure}">
                        ? $pipe-&gt;{$this-&gt;method}(...$parameters)<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        : $pipe(...$parameters);<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                <span class=sf-dump-meta>arguments</span>
                : {
                <samp data-depth=4 class=sf-dump-compact>
                    <span class=sf-dump-meta>$request</span>
                    : 
                    <span class=sf-dump-note title="Illuminate\Http\Request
">
                        <span class="sf-dump-ellipsis sf-dump-ellipsis-note">Illuminate\Http</span>
                        <span class="sf-dump-ellipsis sf-dump-ellipsis-note">\</span>
                        Request
                    </span>
                    {<a class=sf-dump-ref href=#sf-dump-1985177105-ref244 title="40 occurrences">#44</a>
                    &#8230;}
        <span class=sf-dump-meta>$next</span>
                    : <span class=sf-dump-note>Closure($passable)</span>
                    {<a class=sf-dump-ref href=#sf-dump-1985177105-ref2461 title="13 occurrences">#461</a>
                    &#8230;}
      
                </samp>
                }
    
            </samp>
            }
    
            <span class=sf-dump-meta title="C:\laragon\www\mob-kfa\protected\vendor\laravel\framework\src\Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse.php:37
Stack level 30.">
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">C:\laragon\www\mob-kfa\protected\vendor</span>
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">\laravel\framework\</span>
                src\Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse.php:37
            </span>
            {
            <samp data-depth=3 class=sf-dump-compact>
                <span class=sf-dump-note title="Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse-&gt;handle($request, Closure $next)
">
                    <span class="sf-dump-ellipsis sf-dump-ellipsis-note">Illuminate\Cookie\Middleware</span>
                    <span class="sf-dump-ellipsis sf-dump-ellipsis-note">\</span>
                    AddQueuedCookiesToResponse-&gt;handle($request, Closure $next)
                </span>
                &#8230;&#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        {<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-const title="in Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse-&gt;handle($request, Closure $next)">
                        $response = $next($request);<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        <span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                <span class=sf-dump-meta>arguments</span>
                : {
                <samp data-depth=4 class=sf-dump-compact>
                    <span class=sf-dump-note title="Illuminate\Http\Request
">
                        <span class="sf-dump-ellipsis sf-dump-ellipsis-note">Illuminate\Http</span>
                        <span class="sf-dump-ellipsis sf-dump-ellipsis-note">\</span>
                        Request
                    </span>
                    {<a class=sf-dump-ref href=#sf-dump-1985177105-ref244 title="40 occurrences">#44</a>
                    &#8230;}
      
                </samp>
                }
    
            </samp>
            }
    
            <span class=sf-dump-meta title="C:\laragon\www\mob-kfa\protected\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:180
Stack level 29.">
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">C:\laragon\www\mob-kfa\protected\vendor</span>
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">\laravel\framework\</span>
                src\Illuminate\Pipeline\Pipeline.php:180
            </span>
            {
            <samp data-depth=3 class=sf-dump-compact>
                <span class=sf-dump-note title="Illuminate\Pipeline\Pipeline-&gt;Illuminate\Pipeline\{closure}
">
                    <span class="sf-dump-ellipsis sf-dump-ellipsis-note">Illuminate\Pipeline\Pipeline-&gt;Illuminate\Pipeline</span>
                    <span class="sf-dump-ellipsis sf-dump-ellipsis-note">\</span>
                    {closure}
                </span>
                &#8230;&#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        $carry = method_exists($pipe, $this-&gt;method)<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-const title="in Illuminate\Pipeline\Pipeline-&gt;Illuminate\Pipeline\{closure}">
                        ? $pipe-&gt;{$this-&gt;method}(...$parameters)<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        : $pipe(...$parameters);<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                <span class=sf-dump-meta>arguments</span>
                : {
                <samp data-depth=4 class=sf-dump-compact>
                    <span class=sf-dump-meta>$request</span>
                    : 
                    <span class=sf-dump-note title="Illuminate\Http\Request
">
                        <span class="sf-dump-ellipsis sf-dump-ellipsis-note">Illuminate\Http</span>
                        <span class="sf-dump-ellipsis sf-dump-ellipsis-note">\</span>
                        Request
                    </span>
                    {<a class=sf-dump-ref href=#sf-dump-1985177105-ref244 title="40 occurrences">#44</a>
                    &#8230;}
        <span class=sf-dump-meta>$next</span>
                    : <span class=sf-dump-note>Closure($passable)</span>
                    {<a class=sf-dump-ref href=#sf-dump-1985177105-ref2461 title="13 occurrences">#461</a>
                    &#8230;}
      
                </samp>
                }
    
            </samp>
            }
    
            <span class=sf-dump-meta title="C:\laragon\www\mob-kfa\protected\vendor\laravel\framework\src\Illuminate\Cookie\Middleware\EncryptCookies.php:67
Stack level 28.">
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">C:\laragon\www\mob-kfa\protected\vendor</span>
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">\laravel\framework\</span>
                src\Illuminate\Cookie\Middleware\EncryptCookies.php:67
            </span>
            {
            <samp data-depth=3 class=sf-dump-compact>
                <span class=sf-dump-note title="Illuminate\Cookie\Middleware\EncryptCookies-&gt;handle($request, Closure $next)
">
                    <span class="sf-dump-ellipsis sf-dump-ellipsis-note">Illuminate\Cookie\Middleware</span>
                    <span class="sf-dump-ellipsis sf-dump-ellipsis-note">\</span>
                    EncryptCookies-&gt;handle($request, Closure $next)
                </span>
                &#8230;&#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        {<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-const title="in Illuminate\Cookie\Middleware\EncryptCookies-&gt;handle($request, Closure $next)">
                        return $this-&gt;encrypt($next($this-&gt;decrypt($request)));<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        }<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                <span class=sf-dump-meta>arguments</span>
                : {
                <samp data-depth=4 class=sf-dump-compact>
                    <span class=sf-dump-note title="Illuminate\Http\Request
">
                        <span class="sf-dump-ellipsis sf-dump-ellipsis-note">Illuminate\Http</span>
                        <span class="sf-dump-ellipsis sf-dump-ellipsis-note">\</span>
                        Request
                    </span>
                    {<a class=sf-dump-ref href=#sf-dump-1985177105-ref244 title="40 occurrences">#44</a>
                    &#8230;}
      
                </samp>
                }
    
            </samp>
            }
    
            <span class=sf-dump-meta title="C:\laragon\www\mob-kfa\protected\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:180
Stack level 27.">
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">C:\laragon\www\mob-kfa\protected\vendor</span>
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">\laravel\framework\</span>
                src\Illuminate\Pipeline\Pipeline.php:180
            </span>
            {
            <samp data-depth=3 class=sf-dump-compact>
                <span class=sf-dump-note title="Illuminate\Pipeline\Pipeline-&gt;Illuminate\Pipeline\{closure}
">
                    <span class="sf-dump-ellipsis sf-dump-ellipsis-note">Illuminate\Pipeline\Pipeline-&gt;Illuminate\Pipeline</span>
                    <span class="sf-dump-ellipsis sf-dump-ellipsis-note">\</span>
                    {closure}
                </span>
                &#8230;&#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        $carry = method_exists($pipe, $this-&gt;method)<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-const title="in Illuminate\Pipeline\Pipeline-&gt;Illuminate\Pipeline\{closure}">
                        ? $pipe-&gt;{$this-&gt;method}(...$parameters)<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        : $pipe(...$parameters);<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                <span class=sf-dump-meta>arguments</span>
                : {
                <samp data-depth=4 class=sf-dump-compact>
                    <span class=sf-dump-meta>$request</span>
                    : 
                    <span class=sf-dump-note title="Illuminate\Http\Request
">
                        <span class="sf-dump-ellipsis sf-dump-ellipsis-note">Illuminate\Http</span>
                        <span class="sf-dump-ellipsis sf-dump-ellipsis-note">\</span>
                        Request
                    </span>
                    {<a class=sf-dump-ref href=#sf-dump-1985177105-ref244 title="40 occurrences">#44</a>
                    &#8230;}
        <span class=sf-dump-meta>$next</span>
                    : <span class=sf-dump-note>Closure($passable)</span>
                    {<a class=sf-dump-ref href=#sf-dump-1985177105-ref2461 title="13 occurrences">#461</a>
                    &#8230;}
      
                </samp>
                }
    
            </samp>
            }
    
            <span class=sf-dump-meta title="C:\laragon\www\mob-kfa\protected\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:116
Stack level 26.">
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">C:\laragon\www\mob-kfa\protected\vendor</span>
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">\laravel\framework\</span>
                src\Illuminate\Pipeline\Pipeline.php:116
            </span>
            {
            <samp data-depth=3 class=sf-dump-compact>
                <span class=sf-dump-note title="Illuminate\Pipeline\Pipeline-&gt;then(Closure $destination)
">
                    <span class="sf-dump-ellipsis sf-dump-ellipsis-note">Illuminate\Pipeline</span>
                    <span class="sf-dump-ellipsis sf-dump-ellipsis-note">\</span>
                    Pipeline-&gt;then(Closure $destination)
                </span>
                &#8230;&#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        <span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-const title="in Illuminate\Pipeline\Pipeline-&gt;then(Closure $destination)">
                        return $pipeline($this-&gt;passable);<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        }<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                <span class=sf-dump-meta>arguments</span>
                : {
                <samp data-depth=4 class=sf-dump-compact>
                    <span class=sf-dump-note title="Illuminate\Http\Request
">
                        <span class="sf-dump-ellipsis sf-dump-ellipsis-note">Illuminate\Http</span>
                        <span class="sf-dump-ellipsis sf-dump-ellipsis-note">\</span>
                        Request
                    </span>
                    {<a class=sf-dump-ref href=#sf-dump-1985177105-ref244 title="40 occurrences">#44</a>
                    &#8230;}
      
                </samp>
                }
    
            </samp>
            }
    
            <span class=sf-dump-meta title="C:\laragon\www\mob-kfa\protected\vendor\laravel\framework\src\Illuminate\Routing\Router.php:799
Stack level 25.">
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">C:\laragon\www\mob-kfa\protected\vendor</span>
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">\laravel\framework\</span>
                src\Illuminate\Routing\Router.php:799
            </span>
            {
            <samp data-depth=3 class=sf-dump-compact>
                <span class=sf-dump-note title="Illuminate\Routing\Router-&gt;runRouteWithinStack(Route $route, Request $request)
">
                    <span class="sf-dump-ellipsis sf-dump-ellipsis-note">Illuminate\Routing</span>
                    <span class="sf-dump-ellipsis sf-dump-ellipsis-note">\</span>
                    Router-&gt;runRouteWithinStack(Route $route, Request $request)
                </span>
                &#8230;&#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        $request, $route-&gt;run()<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-const title="in Illuminate\Routing\Router-&gt;runRouteWithinStack(Route $route, Request $request)">
                        ));<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        }<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                <span class=sf-dump-meta>arguments</span>
                : {
                <samp data-depth=4 class=sf-dump-compact>
                    <span class=sf-dump-meta>$destination</span>
                    : <span class=sf-dump-note>Closure($request)</span>
                    {<a class=sf-dump-ref>#523</a>
                    &#8230;}
      
                </samp>
                }
    
            </samp>
            }
    
            <span class=sf-dump-meta title="C:\laragon\www\mob-kfa\protected\vendor\laravel\framework\src\Illuminate\Routing\Router.php:776
Stack level 24.">
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">C:\laragon\www\mob-kfa\protected\vendor</span>
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">\laravel\framework\</span>
                src\Illuminate\Routing\Router.php:776
            </span>
            {
            <samp data-depth=3 class=sf-dump-compact>
                <span class=sf-dump-note title="Illuminate\Routing\Router-&gt;runRoute(Request $request, Route $route)
">
                    <span class="sf-dump-ellipsis sf-dump-ellipsis-note">Illuminate\Routing</span>
                    <span class="sf-dump-ellipsis sf-dump-ellipsis-note">\</span>
                    Router-&gt;runRoute(Request $request, Route $route)
                </span>
                &#8230;&#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        return $this-&gt;prepareResponse($request,<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-const title="in Illuminate\Routing\Router-&gt;runRoute(Request $request, Route $route)">
                        $this-&gt;runRouteWithinStack($route, $request)<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        );<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                <span class=sf-dump-meta>arguments</span>
                : {
                <samp data-depth=4 class=sf-dump-compact>
                    <span class=sf-dump-meta>$route</span>
                    : 
                    <span class=sf-dump-note title="Illuminate\Routing\Route
">
                        <span class="sf-dump-ellipsis sf-dump-ellipsis-note">Illuminate\Routing</span>
                        <span class="sf-dump-ellipsis sf-dump-ellipsis-note">\</span>
                        Route
                    </span>
                    {<a class=sf-dump-ref href=#sf-dump-1985177105-ref2416 title="3 occurrences">#416</a>
                    &#8230;}
        <span class=sf-dump-meta>$request</span>
                    : 
                    <span class=sf-dump-note title="Illuminate\Http\Request
">
                        <span class="sf-dump-ellipsis sf-dump-ellipsis-note">Illuminate\Http</span>
                        <span class="sf-dump-ellipsis sf-dump-ellipsis-note">\</span>
                        Request
                    </span>
                    {<a class=sf-dump-ref href=#sf-dump-1985177105-ref244 title="40 occurrences">#44</a>
                    &#8230;}
      
                </samp>
                }
    
            </samp>
            }
    
            <span class=sf-dump-meta title="C:\laragon\www\mob-kfa\protected\vendor\laravel\framework\src\Illuminate\Routing\Router.php:740
Stack level 23.">
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">C:\laragon\www\mob-kfa\protected\vendor</span>
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">\laravel\framework\</span>
                src\Illuminate\Routing\Router.php:740
            </span>
            {
            <samp data-depth=3 class=sf-dump-compact>
                <span class=sf-dump-note title="Illuminate\Routing\Router-&gt;dispatchToRoute(Request $request)
">
                    <span class="sf-dump-ellipsis sf-dump-ellipsis-note">Illuminate\Routing</span>
                    <span class="sf-dump-ellipsis sf-dump-ellipsis-note">\</span>
                    Router-&gt;dispatchToRoute(Request $request)
                </span>
                &#8230;&#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        {<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-const title="in Illuminate\Routing\Router-&gt;dispatchToRoute(Request $request)">
                        return $this-&gt;runRoute($request, $this-&gt;findRoute($request));<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        }<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                <span class=sf-dump-meta>arguments</span>
                : {
                <samp data-depth=4 class=sf-dump-compact>
                    <span class=sf-dump-meta>$request</span>
                    : 
                    <span class=sf-dump-note title="Illuminate\Http\Request
">
                        <span class="sf-dump-ellipsis sf-dump-ellipsis-note">Illuminate\Http</span>
                        <span class="sf-dump-ellipsis sf-dump-ellipsis-note">\</span>
                        Request
                    </span>
                    {<a class=sf-dump-ref href=#sf-dump-1985177105-ref244 title="40 occurrences">#44</a>
                    &#8230;}
        <span class=sf-dump-meta>$route</span>
                    : 
                    <span class=sf-dump-note title="Illuminate\Routing\Route
">
                        <span class="sf-dump-ellipsis sf-dump-ellipsis-note">Illuminate\Routing</span>
                        <span class="sf-dump-ellipsis sf-dump-ellipsis-note">\</span>
                        Route
                    </span>
                    {<a class=sf-dump-ref href=#sf-dump-1985177105-ref2416 title="3 occurrences">#416</a>
                    &#8230;}
      
                </samp>
                }
    
            </samp>
            }
    
            <span class=sf-dump-meta title="C:\laragon\www\mob-kfa\protected\vendor\laravel\framework\src\Illuminate\Routing\Router.php:729
Stack level 22.">
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">C:\laragon\www\mob-kfa\protected\vendor</span>
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">\laravel\framework\</span>
                src\Illuminate\Routing\Router.php:729
            </span>
            {
            <samp data-depth=3 class=sf-dump-compact>
                <span class=sf-dump-note title="Illuminate\Routing\Router-&gt;dispatch(Request $request)
">
                    <span class="sf-dump-ellipsis sf-dump-ellipsis-note">Illuminate\Routing</span>
                    <span class="sf-dump-ellipsis sf-dump-ellipsis-note">\</span>
                    Router-&gt;dispatch(Request $request)
                </span>
                &#8230;&#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        <span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-const title="in Illuminate\Routing\Router-&gt;dispatch(Request $request)">
                        return $this-&gt;dispatchToRoute($request);<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        }<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                <span class=sf-dump-meta>arguments</span>
                : {
                <samp data-depth=4 class=sf-dump-compact>
                    <span class=sf-dump-meta>$request</span>
                    : 
                    <span class=sf-dump-note title="Illuminate\Http\Request
">
                        <span class="sf-dump-ellipsis sf-dump-ellipsis-note">Illuminate\Http</span>
                        <span class="sf-dump-ellipsis sf-dump-ellipsis-note">\</span>
                        Request
                    </span>
                    {<a class=sf-dump-ref href=#sf-dump-1985177105-ref244 title="40 occurrences">#44</a>
                    &#8230;}
      
                </samp>
                }
    
            </samp>
            }
    
            <span class=sf-dump-meta title="C:\laragon\www\mob-kfa\protected\vendor\laravel\framework\src\Illuminate\Foundation\Http\Kernel.php:190
Stack level 21.">
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">C:\laragon\www\mob-kfa\protected\vendor</span>
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">\laravel\framework\</span>
                src\Illuminate\Foundation\Http\Kernel.php:190
            </span>
            {
            <samp data-depth=3 class=sf-dump-compact>
                <span class=sf-dump-note title="Illuminate\Foundation\Http\Kernel-&gt;Illuminate\Foundation\Http\{closure}
">
                    <span class="sf-dump-ellipsis sf-dump-ellipsis-note">Illuminate\Foundation\Http\Kernel-&gt;Illuminate\Foundation\Http</span>
                    <span class="sf-dump-ellipsis sf-dump-ellipsis-note">\</span>
                    {closure}
                </span>
                &#8230;&#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        <span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-const title="in Illuminate\Foundation\Http\Kernel-&gt;Illuminate\Foundation\Http\{closure}">
                        return $this-&gt;router-&gt;dispatch($request);<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        };<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                <span class=sf-dump-meta>arguments</span>
                : {
                <samp data-depth=4 class=sf-dump-compact>
                    <span class=sf-dump-meta>$request</span>
                    : 
                    <span class=sf-dump-note title="Illuminate\Http\Request
">
                        <span class="sf-dump-ellipsis sf-dump-ellipsis-note">Illuminate\Http</span>
                        <span class="sf-dump-ellipsis sf-dump-ellipsis-note">\</span>
                        Request
                    </span>
                    {<a class=sf-dump-ref href=#sf-dump-1985177105-ref244 title="40 occurrences">#44</a>
                    &#8230;}
      
                </samp>
                }
    
            </samp>
            }
    
            <span class=sf-dump-meta title="C:\laragon\www\mob-kfa\protected\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:141
Stack level 20.">
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">C:\laragon\www\mob-kfa\protected\vendor</span>
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">\laravel\framework\</span>
                src\Illuminate\Pipeline\Pipeline.php:141
            </span>
            {
            <samp data-depth=3 class=sf-dump-compact>
                <span class=sf-dump-note title="Illuminate\Pipeline\Pipeline-&gt;Illuminate\Pipeline\{closure}
">
                    <span class="sf-dump-ellipsis sf-dump-ellipsis-note">Illuminate\Pipeline\Pipeline-&gt;Illuminate\Pipeline</span>
                    <span class="sf-dump-ellipsis sf-dump-ellipsis-note">\</span>
                    {closure}
                </span>
                &#8230;&#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        try {<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-const title="in Illuminate\Pipeline\Pipeline-&gt;Illuminate\Pipeline\{closure}">
                        return $destination($passable);<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        } catch (Throwable $e) {<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                <span class=sf-dump-meta>arguments</span>
                : {
                <samp data-depth=4 class=sf-dump-compact>
                    <span class=sf-dump-note title="Illuminate\Http\Request
">
                        <span class="sf-dump-ellipsis sf-dump-ellipsis-note">Illuminate\Http</span>
                        <span class="sf-dump-ellipsis sf-dump-ellipsis-note">\</span>
                        Request
                    </span>
                    {<a class=sf-dump-ref href=#sf-dump-1985177105-ref244 title="40 occurrences">#44</a>
                    &#8230;}
      
                </samp>
                }
    
            </samp>
            }
    
            <span class=sf-dump-meta title="C:\laragon\www\mob-kfa\protected\vendor\laravel\framework\src\Illuminate\Foundation\Http\Middleware\TransformsRequest.php:21
Stack level 19.">
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">C:\laragon\www\mob-kfa\protected\vendor</span>
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">\laravel\framework\</span>
                src\Illuminate\Foundation\Http\Middleware\TransformsRequest.php:21
            </span>
            {
            <samp data-depth=3 class=sf-dump-compact>
                <span class=sf-dump-note title="Illuminate\Foundation\Http\Middleware\TransformsRequest-&gt;handle($request, Closure $next)
">
                    <span class="sf-dump-ellipsis sf-dump-ellipsis-note">Illuminate\Foundation\Http\Middleware</span>
                    <span class="sf-dump-ellipsis sf-dump-ellipsis-note">\</span>
                    TransformsRequest-&gt;handle($request, Closure $next)
                </span>
                &#8230;&#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        <span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-const title="in Illuminate\Foundation\Http\Middleware\TransformsRequest-&gt;handle($request, Closure $next)">
                        return $next($request);<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        }<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                <span class=sf-dump-meta>arguments</span>
                : {
                <samp data-depth=4 class=sf-dump-compact>
                    <span class=sf-dump-note title="Illuminate\Http\Request
">
                        <span class="sf-dump-ellipsis sf-dump-ellipsis-note">Illuminate\Http</span>
                        <span class="sf-dump-ellipsis sf-dump-ellipsis-note">\</span>
                        Request
                    </span>
                    {<a class=sf-dump-ref href=#sf-dump-1985177105-ref244 title="40 occurrences">#44</a>
                    &#8230;}
      
                </samp>
                }
    
            </samp>
            }
    
            <span class=sf-dump-meta title="C:\laragon\www\mob-kfa\protected\vendor\laravel\framework\src\Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull.php:31
Stack level 18.">
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">C:\laragon\www\mob-kfa\protected\vendor</span>
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">\laravel\framework\</span>
                src\Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull.php:31
            </span>
            {
            <samp data-depth=3 class=sf-dump-compact>
                <span class=sf-dump-note title="Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull-&gt;handle($request, Closure $next)
">
                    <span class="sf-dump-ellipsis sf-dump-ellipsis-note">Illuminate\Foundation\Http\Middleware</span>
                    <span class="sf-dump-ellipsis sf-dump-ellipsis-note">\</span>
                    ConvertEmptyStringsToNull-&gt;handle($request, Closure $next)
                </span>
                &#8230;&#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        <span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-const title="in Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull-&gt;handle($request, Closure $next)">
                        return parent::handle($request, $next);<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        }<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                <span class=sf-dump-meta>arguments</span>
                : {
                <samp data-depth=4 class=sf-dump-compact>
                    <span class=sf-dump-meta>$request</span>
                    : 
                    <span class=sf-dump-note title="Illuminate\Http\Request
">
                        <span class="sf-dump-ellipsis sf-dump-ellipsis-note">Illuminate\Http</span>
                        <span class="sf-dump-ellipsis sf-dump-ellipsis-note">\</span>
                        Request
                    </span>
                    {<a class=sf-dump-ref href=#sf-dump-1985177105-ref244 title="40 occurrences">#44</a>
                    &#8230;}
        <span class=sf-dump-meta>$next</span>
                    : <span class=sf-dump-note>Closure($passable)</span>
                    {<a class=sf-dump-ref>#458</a>
                    &#8230;}
      
                </samp>
                }
    
            </samp>
            }
    
            <span class=sf-dump-meta title="C:\laragon\www\mob-kfa\protected\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:180
Stack level 17.">
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">C:\laragon\www\mob-kfa\protected\vendor</span>
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">\laravel\framework\</span>
                src\Illuminate\Pipeline\Pipeline.php:180
            </span>
            {
            <samp data-depth=3 class=sf-dump-compact>
                <span class=sf-dump-note title="Illuminate\Pipeline\Pipeline-&gt;Illuminate\Pipeline\{closure}
">
                    <span class="sf-dump-ellipsis sf-dump-ellipsis-note">Illuminate\Pipeline\Pipeline-&gt;Illuminate\Pipeline</span>
                    <span class="sf-dump-ellipsis sf-dump-ellipsis-note">\</span>
                    {closure}
                </span>
                &#8230;&#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        $carry = method_exists($pipe, $this-&gt;method)<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-const title="in Illuminate\Pipeline\Pipeline-&gt;Illuminate\Pipeline\{closure}">
                        ? $pipe-&gt;{$this-&gt;method}(...$parameters)<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        : $pipe(...$parameters);<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                <span class=sf-dump-meta>arguments</span>
                : {
                <samp data-depth=4 class=sf-dump-compact>
                    <span class=sf-dump-meta>$request</span>
                    : 
                    <span class=sf-dump-note title="Illuminate\Http\Request
">
                        <span class="sf-dump-ellipsis sf-dump-ellipsis-note">Illuminate\Http</span>
                        <span class="sf-dump-ellipsis sf-dump-ellipsis-note">\</span>
                        Request
                    </span>
                    {<a class=sf-dump-ref href=#sf-dump-1985177105-ref244 title="40 occurrences">#44</a>
                    &#8230;}
        <span class=sf-dump-meta>$next</span>
                    : <span class=sf-dump-note>Closure($passable)</span>
                    {<a class=sf-dump-ref href=#sf-dump-1985177105-ref2461 title="13 occurrences">#461</a>
                    &#8230;}
      
                </samp>
                }
    
            </samp>
            }
    
            <span class=sf-dump-meta title="C:\laragon\www\mob-kfa\protected\vendor\laravel\framework\src\Illuminate\Foundation\Http\Middleware\TransformsRequest.php:21
Stack level 16.">
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">C:\laragon\www\mob-kfa\protected\vendor</span>
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">\laravel\framework\</span>
                src\Illuminate\Foundation\Http\Middleware\TransformsRequest.php:21
            </span>
            {
            <samp data-depth=3 class=sf-dump-compact>
                <span class=sf-dump-note title="Illuminate\Foundation\Http\Middleware\TransformsRequest-&gt;handle($request, Closure $next)
">
                    <span class="sf-dump-ellipsis sf-dump-ellipsis-note">Illuminate\Foundation\Http\Middleware</span>
                    <span class="sf-dump-ellipsis sf-dump-ellipsis-note">\</span>
                    TransformsRequest-&gt;handle($request, Closure $next)
                </span>
                &#8230;&#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        <span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-const title="in Illuminate\Foundation\Http\Middleware\TransformsRequest-&gt;handle($request, Closure $next)">
                        return $next($request);<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        }<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                <span class=sf-dump-meta>arguments</span>
                : {
                <samp data-depth=4 class=sf-dump-compact>
                    <span class=sf-dump-note title="Illuminate\Http\Request
">
                        <span class="sf-dump-ellipsis sf-dump-ellipsis-note">Illuminate\Http</span>
                        <span class="sf-dump-ellipsis sf-dump-ellipsis-note">\</span>
                        Request
                    </span>
                    {<a class=sf-dump-ref href=#sf-dump-1985177105-ref244 title="40 occurrences">#44</a>
                    &#8230;}
      
                </samp>
                }
    
            </samp>
            }
    
            <span class=sf-dump-meta title="C:\laragon\www\mob-kfa\protected\vendor\laravel\framework\src\Illuminate\Foundation\Http\Middleware\TrimStrings.php:40
Stack level 15.">
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">C:\laragon\www\mob-kfa\protected\vendor</span>
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">\laravel\framework\</span>
                src\Illuminate\Foundation\Http\Middleware\TrimStrings.php:40
            </span>
            {
            <samp data-depth=3 class=sf-dump-compact>
                <span class=sf-dump-note title="Illuminate\Foundation\Http\Middleware\TrimStrings-&gt;handle($request, Closure $next)
">
                    <span class="sf-dump-ellipsis sf-dump-ellipsis-note">Illuminate\Foundation\Http\Middleware</span>
                    <span class="sf-dump-ellipsis sf-dump-ellipsis-note">\</span>
                    TrimStrings-&gt;handle($request, Closure $next)
                </span>
                &#8230;&#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        <span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-const title="in Illuminate\Foundation\Http\Middleware\TrimStrings-&gt;handle($request, Closure $next)">
                        return parent::handle($request, $next);<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        }<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                <span class=sf-dump-meta>arguments</span>
                : {
                <samp data-depth=4 class=sf-dump-compact>
                    <span class=sf-dump-meta>$request</span>
                    : 
                    <span class=sf-dump-note title="Illuminate\Http\Request
">
                        <span class="sf-dump-ellipsis sf-dump-ellipsis-note">Illuminate\Http</span>
                        <span class="sf-dump-ellipsis sf-dump-ellipsis-note">\</span>
                        Request
                    </span>
                    {<a class=sf-dump-ref href=#sf-dump-1985177105-ref244 title="40 occurrences">#44</a>
                    &#8230;}
        <span class=sf-dump-meta>$next</span>
                    : <span class=sf-dump-note>Closure($passable)</span>
                    {<a class=sf-dump-ref>#143</a>
                    &#8230;}
      
                </samp>
                }
    
            </samp>
            }
    
            <span class=sf-dump-meta title="C:\laragon\www\mob-kfa\protected\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:180
Stack level 14.">
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">C:\laragon\www\mob-kfa\protected\vendor</span>
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">\laravel\framework\</span>
                src\Illuminate\Pipeline\Pipeline.php:180
            </span>
            {
            <samp data-depth=3 class=sf-dump-compact>
                <span class=sf-dump-note title="Illuminate\Pipeline\Pipeline-&gt;Illuminate\Pipeline\{closure}
">
                    <span class="sf-dump-ellipsis sf-dump-ellipsis-note">Illuminate\Pipeline\Pipeline-&gt;Illuminate\Pipeline</span>
                    <span class="sf-dump-ellipsis sf-dump-ellipsis-note">\</span>
                    {closure}
                </span>
                &#8230;&#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        $carry = method_exists($pipe, $this-&gt;method)<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-const title="in Illuminate\Pipeline\Pipeline-&gt;Illuminate\Pipeline\{closure}">
                        ? $pipe-&gt;{$this-&gt;method}(...$parameters)<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        : $pipe(...$parameters);<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                <span class=sf-dump-meta>arguments</span>
                : {
                <samp data-depth=4 class=sf-dump-compact>
                    <span class=sf-dump-meta>$request</span>
                    : 
                    <span class=sf-dump-note title="Illuminate\Http\Request
">
                        <span class="sf-dump-ellipsis sf-dump-ellipsis-note">Illuminate\Http</span>
                        <span class="sf-dump-ellipsis sf-dump-ellipsis-note">\</span>
                        Request
                    </span>
                    {<a class=sf-dump-ref href=#sf-dump-1985177105-ref244 title="40 occurrences">#44</a>
                    &#8230;}
        <span class=sf-dump-meta>$next</span>
                    : <span class=sf-dump-note>Closure($passable)</span>
                    {<a class=sf-dump-ref href=#sf-dump-1985177105-ref2461 title="13 occurrences">#461</a>
                    &#8230;}
      
                </samp>
                }
    
            </samp>
            }
    
            <span class=sf-dump-meta title="C:\laragon\www\mob-kfa\protected\vendor\laravel\framework\src\Illuminate\Foundation\Http\Middleware\ValidatePostSize.php:27
Stack level 13.">
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">C:\laragon\www\mob-kfa\protected\vendor</span>
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">\laravel\framework\</span>
                src\Illuminate\Foundation\Http\Middleware\ValidatePostSize.php:27
            </span>
            {
            <samp data-depth=3 class=sf-dump-compact>
                <span class=sf-dump-note title="Illuminate\Foundation\Http\Middleware\ValidatePostSize-&gt;handle($request, Closure $next)
">
                    <span class="sf-dump-ellipsis sf-dump-ellipsis-note">Illuminate\Foundation\Http\Middleware</span>
                    <span class="sf-dump-ellipsis sf-dump-ellipsis-note">\</span>
                    ValidatePostSize-&gt;handle($request, Closure $next)
                </span>
                &#8230;&#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        <span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-const title="in Illuminate\Foundation\Http\Middleware\ValidatePostSize-&gt;handle($request, Closure $next)">
                        return $next($request);<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        }<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                <span class=sf-dump-meta>arguments</span>
                : {
                <samp data-depth=4 class=sf-dump-compact>
                    <span class=sf-dump-note title="Illuminate\Http\Request
">
                        <span class="sf-dump-ellipsis sf-dump-ellipsis-note">Illuminate\Http</span>
                        <span class="sf-dump-ellipsis sf-dump-ellipsis-note">\</span>
                        Request
                    </span>
                    {<a class=sf-dump-ref href=#sf-dump-1985177105-ref244 title="40 occurrences">#44</a>
                    &#8230;}
      
                </samp>
                }
    
            </samp>
            }
    
            <span class=sf-dump-meta title="C:\laragon\www\mob-kfa\protected\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:180
Stack level 12.">
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">C:\laragon\www\mob-kfa\protected\vendor</span>
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">\laravel\framework\</span>
                src\Illuminate\Pipeline\Pipeline.php:180
            </span>
            {
            <samp data-depth=3 class=sf-dump-compact>
                <span class=sf-dump-note title="Illuminate\Pipeline\Pipeline-&gt;Illuminate\Pipeline\{closure}
">
                    <span class="sf-dump-ellipsis sf-dump-ellipsis-note">Illuminate\Pipeline\Pipeline-&gt;Illuminate\Pipeline</span>
                    <span class="sf-dump-ellipsis sf-dump-ellipsis-note">\</span>
                    {closure}
                </span>
                &#8230;&#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        $carry = method_exists($pipe, $this-&gt;method)<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-const title="in Illuminate\Pipeline\Pipeline-&gt;Illuminate\Pipeline\{closure}">
                        ? $pipe-&gt;{$this-&gt;method}(...$parameters)<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        : $pipe(...$parameters);<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                <span class=sf-dump-meta>arguments</span>
                : {
                <samp data-depth=4 class=sf-dump-compact>
                    <span class=sf-dump-meta>$request</span>
                    : 
                    <span class=sf-dump-note title="Illuminate\Http\Request
">
                        <span class="sf-dump-ellipsis sf-dump-ellipsis-note">Illuminate\Http</span>
                        <span class="sf-dump-ellipsis sf-dump-ellipsis-note">\</span>
                        Request
                    </span>
                    {<a class=sf-dump-ref href=#sf-dump-1985177105-ref244 title="40 occurrences">#44</a>
                    &#8230;}
        <span class=sf-dump-meta>$next</span>
                    : <span class=sf-dump-note>Closure($passable)</span>
                    {<a class=sf-dump-ref href=#sf-dump-1985177105-ref2461 title="13 occurrences">#461</a>
                    &#8230;}
      
                </samp>
                }
    
            </samp>
            }
    
            <span class=sf-dump-meta title="C:\laragon\www\mob-kfa\protected\vendor\laravel\framework\src\Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance.php:86
Stack level 11.">
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">C:\laragon\www\mob-kfa\protected\vendor</span>
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">\laravel\framework\</span>
                src\Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance.php:86
            </span>
            {
            <samp data-depth=3 class=sf-dump-compact>
                <span class=sf-dump-note title="Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance-&gt;handle($request, Closure $next)
">
                    <span class="sf-dump-ellipsis sf-dump-ellipsis-note">Illuminate\Foundation\Http\Middleware</span>
                    <span class="sf-dump-ellipsis sf-dump-ellipsis-note">\</span>
                    PreventRequestsDuringMaintenance-&gt;handle($request, Closure $next)
                </span>
                &#8230;&#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        <span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-const title="in Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance-&gt;handle($request, Closure $next)">
                        return $next($request);<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        }<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                <span class=sf-dump-meta>arguments</span>
                : {
                <samp data-depth=4 class=sf-dump-compact>
                    <span class=sf-dump-note title="Illuminate\Http\Request
">
                        <span class="sf-dump-ellipsis sf-dump-ellipsis-note">Illuminate\Http</span>
                        <span class="sf-dump-ellipsis sf-dump-ellipsis-note">\</span>
                        Request
                    </span>
                    {<a class=sf-dump-ref href=#sf-dump-1985177105-ref244 title="40 occurrences">#44</a>
                    &#8230;}
      
                </samp>
                }
    
            </samp>
            }
    
            <span class=sf-dump-meta title="C:\laragon\www\mob-kfa\protected\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:180
Stack level 10.">
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">C:\laragon\www\mob-kfa\protected\vendor</span>
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">\laravel\framework\</span>
                src\Illuminate\Pipeline\Pipeline.php:180
            </span>
            {
            <samp data-depth=3 class=sf-dump-compact>
                <span class=sf-dump-note title="Illuminate\Pipeline\Pipeline-&gt;Illuminate\Pipeline\{closure}
">
                    <span class="sf-dump-ellipsis sf-dump-ellipsis-note">Illuminate\Pipeline\Pipeline-&gt;Illuminate\Pipeline</span>
                    <span class="sf-dump-ellipsis sf-dump-ellipsis-note">\</span>
                    {closure}
                </span>
                &#8230;&#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        $carry = method_exists($pipe, $this-&gt;method)<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-const title="in Illuminate\Pipeline\Pipeline-&gt;Illuminate\Pipeline\{closure}">
                        ? $pipe-&gt;{$this-&gt;method}(...$parameters)<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        : $pipe(...$parameters);<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                <span class=sf-dump-meta>arguments</span>
                : {
                <samp data-depth=4 class=sf-dump-compact>
                    <span class=sf-dump-meta>$request</span>
                    : 
                    <span class=sf-dump-note title="Illuminate\Http\Request
">
                        <span class="sf-dump-ellipsis sf-dump-ellipsis-note">Illuminate\Http</span>
                        <span class="sf-dump-ellipsis sf-dump-ellipsis-note">\</span>
                        Request
                    </span>
                    {<a class=sf-dump-ref href=#sf-dump-1985177105-ref244 title="40 occurrences">#44</a>
                    &#8230;}
        <span class=sf-dump-meta>$next</span>
                    : <span class=sf-dump-note>Closure($passable)</span>
                    {<a class=sf-dump-ref href=#sf-dump-1985177105-ref2461 title="13 occurrences">#461</a>
                    &#8230;}
      
                </samp>
                }
    
            </samp>
            }
    
            <span class=sf-dump-meta title="C:\laragon\www\mob-kfa\protected\vendor\fruitcake\laravel-cors\src\HandleCors.php:38
Stack level 9.">
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">C:\laragon\www\mob-kfa\protected\vendor</span>
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">\fruitcake\laravel-cors\</span>
                src\HandleCors.php:38
            </span>
            {
            <samp data-depth=3 class=sf-dump-compact>
                <span class=sf-dump-note title="Fruitcake\Cors\HandleCors-&gt;handle($request, Closure $next)
">
                    <span class="sf-dump-ellipsis sf-dump-ellipsis-note">Fruitcake\Cors</span>
                    <span class="sf-dump-ellipsis sf-dump-ellipsis-note">\</span>
                    HandleCors-&gt;handle($request, Closure $next)
                </span>
                &#8230;&#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        if (! $this-&gt;shouldRun($request)) {<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-const title="in Fruitcake\Cors\HandleCors-&gt;handle($request, Closure $next)">
                        return $next($request);<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        }<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                <span class=sf-dump-meta>arguments</span>
                : {
                <samp data-depth=4 class=sf-dump-compact>
                    <span class=sf-dump-note title="Illuminate\Http\Request
">
                        <span class="sf-dump-ellipsis sf-dump-ellipsis-note">Illuminate\Http</span>
                        <span class="sf-dump-ellipsis sf-dump-ellipsis-note">\</span>
                        Request
                    </span>
                    {<a class=sf-dump-ref href=#sf-dump-1985177105-ref244 title="40 occurrences">#44</a>
                    &#8230;}
      
                </samp>
                }
    
            </samp>
            }
    
            <span class=sf-dump-meta title="C:\laragon\www\mob-kfa\protected\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:180
Stack level 8.">
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">C:\laragon\www\mob-kfa\protected\vendor</span>
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">\laravel\framework\</span>
                src\Illuminate\Pipeline\Pipeline.php:180
            </span>
            {
            <samp data-depth=3 class=sf-dump-compact>
                <span class=sf-dump-note title="Illuminate\Pipeline\Pipeline-&gt;Illuminate\Pipeline\{closure}
">
                    <span class="sf-dump-ellipsis sf-dump-ellipsis-note">Illuminate\Pipeline\Pipeline-&gt;Illuminate\Pipeline</span>
                    <span class="sf-dump-ellipsis sf-dump-ellipsis-note">\</span>
                    {closure}
                </span>
                &#8230;&#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        $carry = method_exists($pipe, $this-&gt;method)<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-const title="in Illuminate\Pipeline\Pipeline-&gt;Illuminate\Pipeline\{closure}">
                        ? $pipe-&gt;{$this-&gt;method}(...$parameters)<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        : $pipe(...$parameters);<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                <span class=sf-dump-meta>arguments</span>
                : {
                <samp data-depth=4 class=sf-dump-compact>
                    <span class=sf-dump-meta>$request</span>
                    : 
                    <span class=sf-dump-note title="Illuminate\Http\Request
">
                        <span class="sf-dump-ellipsis sf-dump-ellipsis-note">Illuminate\Http</span>
                        <span class="sf-dump-ellipsis sf-dump-ellipsis-note">\</span>
                        Request
                    </span>
                    {<a class=sf-dump-ref href=#sf-dump-1985177105-ref244 title="40 occurrences">#44</a>
                    &#8230;}
        <span class=sf-dump-meta>$next</span>
                    : <span class=sf-dump-note>Closure($passable)</span>
                    {<a class=sf-dump-ref href=#sf-dump-1985177105-ref2461 title="13 occurrences">#461</a>
                    &#8230;}
      
                </samp>
                }
    
            </samp>
            }
    
            <span class=sf-dump-meta title="C:\laragon\www\mob-kfa\protected\vendor\laravel\framework\src\Illuminate\Http\Middleware\TrustProxies.php:39
Stack level 7.">
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">C:\laragon\www\mob-kfa\protected\vendor</span>
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">\laravel\framework\</span>
                src\Illuminate\Http\Middleware\TrustProxies.php:39
            </span>
            {
            <samp data-depth=3 class=sf-dump-compact>
                <span class=sf-dump-note title="Illuminate\Http\Middleware\TrustProxies-&gt;handle(Request $request, Closure $next)
">
                    <span class="sf-dump-ellipsis sf-dump-ellipsis-note">Illuminate\Http\Middleware</span>
                    <span class="sf-dump-ellipsis sf-dump-ellipsis-note">\</span>
                    TrustProxies-&gt;handle(Request $request, Closure $next)
                </span>
                &#8230;&#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        <span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-const title="in Illuminate\Http\Middleware\TrustProxies-&gt;handle(Request $request, Closure $next)">
                        return $next($request);<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        }<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                <span class=sf-dump-meta>arguments</span>
                : {
                <samp data-depth=4 class=sf-dump-compact>
                    <span class=sf-dump-note title="Illuminate\Http\Request
">
                        <span class="sf-dump-ellipsis sf-dump-ellipsis-note">Illuminate\Http</span>
                        <span class="sf-dump-ellipsis sf-dump-ellipsis-note">\</span>
                        Request
                    </span>
                    {<a class=sf-dump-ref href=#sf-dump-1985177105-ref244 title="40 occurrences">#44</a>
                    &#8230;}
      
                </samp>
                }
    
            </samp>
            }
    
            <span class=sf-dump-meta title="C:\laragon\www\mob-kfa\protected\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:180
Stack level 6.">
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">C:\laragon\www\mob-kfa\protected\vendor</span>
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">\laravel\framework\</span>
                src\Illuminate\Pipeline\Pipeline.php:180
            </span>
            {
            <samp data-depth=3 class=sf-dump-compact>
                <span class=sf-dump-note title="Illuminate\Pipeline\Pipeline-&gt;Illuminate\Pipeline\{closure}
">
                    <span class="sf-dump-ellipsis sf-dump-ellipsis-note">Illuminate\Pipeline\Pipeline-&gt;Illuminate\Pipeline</span>
                    <span class="sf-dump-ellipsis sf-dump-ellipsis-note">\</span>
                    {closure}
                </span>
                &#8230;&#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        $carry = method_exists($pipe, $this-&gt;method)<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-const title="in Illuminate\Pipeline\Pipeline-&gt;Illuminate\Pipeline\{closure}">
                        ? $pipe-&gt;{$this-&gt;method}(...$parameters)<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        : $pipe(...$parameters);<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                <span class=sf-dump-meta>arguments</span>
                : {
                <samp data-depth=4 class=sf-dump-compact>
                    <span class=sf-dump-meta>$request</span>
                    : 
                    <span class=sf-dump-note title="Illuminate\Http\Request
">
                        <span class="sf-dump-ellipsis sf-dump-ellipsis-note">Illuminate\Http</span>
                        <span class="sf-dump-ellipsis sf-dump-ellipsis-note">\</span>
                        Request
                    </span>
                    {<a class=sf-dump-ref href=#sf-dump-1985177105-ref244 title="40 occurrences">#44</a>
                    &#8230;}
        <span class=sf-dump-meta>$next</span>
                    : <span class=sf-dump-note>Closure($passable)</span>
                    {<a class=sf-dump-ref href=#sf-dump-1985177105-ref2461 title="13 occurrences">#461</a>
                    &#8230;}
      
                </samp>
                }
    
            </samp>
            }
    
            <span class=sf-dump-meta title="C:\laragon\www\mob-kfa\protected\vendor\laravel\framework\src\Illuminate\Pipeline\Pipeline.php:116
Stack level 5.">
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">C:\laragon\www\mob-kfa\protected\vendor</span>
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">\laravel\framework\</span>
                src\Illuminate\Pipeline\Pipeline.php:116
            </span>
            {
            <samp data-depth=3 class=sf-dump-compact>
                <span class=sf-dump-note title="Illuminate\Pipeline\Pipeline-&gt;then(Closure $destination)
">
                    <span class="sf-dump-ellipsis sf-dump-ellipsis-note">Illuminate\Pipeline</span>
                    <span class="sf-dump-ellipsis sf-dump-ellipsis-note">\</span>
                    Pipeline-&gt;then(Closure $destination)
                </span>
                &#8230;&#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        <span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-const title="in Illuminate\Pipeline\Pipeline-&gt;then(Closure $destination)">
                        return $pipeline($this-&gt;passable);<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        }<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                <span class=sf-dump-meta>arguments</span>
                : {
                <samp data-depth=4 class=sf-dump-compact>
                    <span class=sf-dump-note title="Illuminate\Http\Request
">
                        <span class="sf-dump-ellipsis sf-dump-ellipsis-note">Illuminate\Http</span>
                        <span class="sf-dump-ellipsis sf-dump-ellipsis-note">\</span>
                        Request
                    </span>
                    {<a class=sf-dump-ref href=#sf-dump-1985177105-ref244 title="40 occurrences">#44</a>
                    &#8230;}
      
                </samp>
                }
    
            </samp>
            }
    
            <span class=sf-dump-meta title="C:\laragon\www\mob-kfa\protected\vendor\laravel\framework\src\Illuminate\Foundation\Http\Kernel.php:165
Stack level 4.">
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">C:\laragon\www\mob-kfa\protected\vendor</span>
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">\laravel\framework\</span>
                src\Illuminate\Foundation\Http\Kernel.php:165
            </span>
            {
            <samp data-depth=3 class=sf-dump-compact>
                <span class=sf-dump-note title="Illuminate\Foundation\Http\Kernel-&gt;sendRequestThroughRouter($request)
">
                    <span class="sf-dump-ellipsis sf-dump-ellipsis-note">Illuminate\Foundation\Http</span>
                    <span class="sf-dump-ellipsis sf-dump-ellipsis-note">\</span>
                    Kernel-&gt;sendRequestThroughRouter($request)
                </span>
                &#8230;&#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        -&gt;through($this-&gt;app-&gt;shouldSkipMiddleware() ? [] : $this-&gt;middleware)<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-const title="in Illuminate\Foundation\Http\Kernel-&gt;sendRequestThroughRouter($request)">
                        -&gt;then($this-&gt;dispatchToRouter());<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        }<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                <span class=sf-dump-meta>arguments</span>
                : {
                <samp data-depth=4 class=sf-dump-compact>
                    <span class=sf-dump-meta>$destination</span>
                    : <span class=sf-dump-note>Closure($request)</span>
                    {<a class=sf-dump-ref>#457</a>
                    &#8230;}
      
                </samp>
                }
    
            </samp>
            }
    
            <span class=sf-dump-meta title="C:\laragon\www\mob-kfa\protected\vendor\laravel\framework\src\Illuminate\Foundation\Http\Kernel.php:134
Stack level 3.">
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">C:\laragon\www\mob-kfa\protected\vendor</span>
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">\laravel\framework\</span>
                src\Illuminate\Foundation\Http\Kernel.php:134
            </span>
            {
            <samp data-depth=3 class=sf-dump-compact>
                <span class=sf-dump-note title="Illuminate\Foundation\Http\Kernel-&gt;handle($request)
">
                    <span class="sf-dump-ellipsis sf-dump-ellipsis-note">Illuminate\Foundation\Http</span>
                    <span class="sf-dump-ellipsis sf-dump-ellipsis-note">\</span>
                    Kernel-&gt;handle($request)
                </span>
                &#8230;&#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        <span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-const title="in Illuminate\Foundation\Http\Kernel-&gt;handle($request)">
                        $response = $this-&gt;sendRequestThroughRouter($request);<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        } catch (Throwable $e) {<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                <span class=sf-dump-meta>arguments</span>
                : {
                <samp data-depth=4 class=sf-dump-compact>
                    <span class=sf-dump-meta>$request</span>
                    : 
                    <span class=sf-dump-note title="Illuminate\Http\Request
">
                        <span class="sf-dump-ellipsis sf-dump-ellipsis-note">Illuminate\Http</span>
                        <span class="sf-dump-ellipsis sf-dump-ellipsis-note">\</span>
                        Request
                    </span>
                    {<a class=sf-dump-ref href=#sf-dump-1985177105-ref244 title="40 occurrences">#44</a>
                    &#8230;}
      
                </samp>
                }
    
            </samp>
            }
    
            <span class=sf-dump-meta title="C:\laragon\www\mob-kfa\protected\public\index.php:52
Stack level 2.">
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">C:\laragon\www\mob-kfa\protected</span>
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">\</span>
                public\index.php:52
            </span>
            {
            <samp data-depth=3 class=sf-dump-compact>
                <span class=sf-dump-note>require_once</span>
                &#8230;&#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        $response = $kernel-&gt;handle(<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-const title="in require_once">
                        $request = Request::capture()<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        )-&gt;send();<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                <span class=sf-dump-meta>arguments</span>
                : {
                <samp data-depth=4 class=sf-dump-compact>
                    <span class=sf-dump-meta>$request</span>
                    : 
                    <span class=sf-dump-note title="Illuminate\Http\Request
">
                        <span class="sf-dump-ellipsis sf-dump-ellipsis-note">Illuminate\Http</span>
                        <span class="sf-dump-ellipsis sf-dump-ellipsis-note">\</span>
                        Request
                    </span>
                    {<a class=sf-dump-ref href=#sf-dump-1985177105-ref244 title="40 occurrences">#44</a>
                    &#8230;}
      
                </samp>
                }
    
            </samp>
            }
    
            <span class=sf-dump-meta title="C:\laragon\www\mob-kfa\protected\vendor\laravel\framework\src\Illuminate\Foundation\resources\server.php:16
Stack level 1.">
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">C:\laragon\www\mob-kfa\protected\vendor</span>
                <span class="sf-dump-ellipsis sf-dump-ellipsis-path">\laravel\framework\</span>
                src\Illuminate\Foundation\resources\server.php:16
            </span>
            {
            <samp data-depth=3 class=sf-dump-compact>
                &#8250;
                <code class="php">
                    <span class=sf-dump-default>
                        <span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;
                <code class="php">
                    <span class=sf-dump-const title="">
                        require_once $publicPath.&#039;/index.php &#039;;<span class="sf-dump-default sf-dump-ns">\r</span>
                    </span>
                </code>
                &#8250;<span class=sf-dump-meta>arguments</span>
                : {
                <samp data-depth=4 class=sf-dump-compact>
                    "<span class=sf-dump-str title="49 characters">C:\laragon\www\mob-kfa\protected\public\index.php</span>
                    "
      
                </samp>
                }
    
            </samp>
            }
  
        </samp>
        }

    </samp>
    }

</pre>
<script>
    Sfdump("sf-dump-1985177105")
</script>
