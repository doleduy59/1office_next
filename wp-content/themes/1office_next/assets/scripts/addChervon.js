//code tham khảo
(function () {
    const SVG_CHEVRON = '<svg class="chevron" style="margin:0.5rem" width="11" height="7" viewBox="0 0 11 7" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false"><path d="M0.462764 0.47579C0.679728 0.241468 1.03148 0.241468 1.24844 0.47579L5.30006 4.85151L9.3517 0.47579C9.56866 0.241468 9.92036 0.241468 10.1373 0.47579C10.3543 0.710112 10.3543 1.08995 10.1373 1.32427L5.69287 6.12431C5.47591 6.35863 5.12421 6.35863 4.90725 6.12431L0.46278 1.32427C0.245816 1.08995 0.2458 0.710112 0.462764 0.47579Z" fill="#3A3D42" stroke="#3A3D42" stroke-width="0.6"/></svg>';

    function injectChevron(a) {
        if (a.querySelector('.chevron')) return;
        const wrapper = document.createElement('span');
        wrapper.className = 'chevron-wrap';
        wrapper.setAttribute('aria-hidden', 'true');
        wrapper.innerHTML = SVG_CHEVRON;
        a.appendChild(wrapper);
    }

    function setupAnchor(a) {
        injectChevron(a);
    }

    function scanAndSetup(root = document) {
        const anchors = root.querySelectorAll('header .menu-item > a[href="#"]');
        anchors.forEach(setupAnchor);
    }

    document.addEventListener('DOMContentLoaded', function () {
        scanAndSetup();
        const headerRoot = document.querySelector('header') || document.body;
        const obs = new MutationObserver(mutations => {
            for (const m of mutations) {
                if (m.addedNodes.length) scanAndSetup(m.target);
            }
        });
        obs.observe(headerRoot, { childList: true, subtree: true });
    });
})();