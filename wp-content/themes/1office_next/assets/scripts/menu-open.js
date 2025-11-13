(function ($) {
    $(document).ready(function () {

        function setActiveCat(active_class) {
            $('.mega_menu_cat_btn').removeClass('active');
            $(`.${active_class}`).addClass('active');
        }
        setActiveCat("cat_1work");



        let checkBanggia = false
        $(".banggia").click(function () {
            if (!checkBanggia) {
                $(".banggia ul").css({
                    'opacity': '1',
                    'pointer-events': 'auto',
                })
                $(".mega_menu").css({
                    'opacity': '0',
                    'pointer-events': 'none',
                })
                checkMegamenu = false
                checkBanggia = true
            } else {
                $(".banggia ul").css({
                    'opacity': '0',
                    'pointer-events': 'none',
                })
                checkBanggia = false
            }
        })
        let checkMegamenu = false
        $(".tinhnang").click(function () {
            if (!checkMegamenu) {
                $(".mega_menu").css({
                    'opacity': '1',
                    'pointer-events': 'auto',
                })
                $(".banggia ul").css({
                    'opacity': '0',
                    'pointer-events': 'none',
                })
                checkBanggia = false
                checkMegamenu = true
            } else {
                $(".mega_menu").css({
                    'opacity': '0',
                    'pointer-events': 'none',
                })
                checkMegamenu = false
            }
        })

        //mega menu
        let check1work = true
        let check1hrm = false
        let check1crm = false
        $(".cat_1work").click(function () {
            if (!check1work) {
                $(".items_1hrm").css({
                    'transition': 'all 0s ease',
                    'opacity': '0',
                    'pointer-events': 'none',
                    'height': '0',
                })
                check1hrm = false
                $(".items_1crm").css({
                    'transition': 'all 0s ease',
                    'opacity': '0',
                    'pointer-events': 'none',
                    'height': '0',
                })
                check1crm = false
                $(".items_1work").css({
                    'transition': 'all 0.5s ease',
                    'opacity': '1',
                    'pointer-events': 'auto',
                    'height': 'auto',
                })
                check1work = true
                setActiveCat("cat_1work")
                $(".truycap").attr('href', '#')
                $(".truycap").html('Truy cập 1Work')
            }
        })

        $(".cat_1hrm").click(function () {
            if (!check1hrm) {
                $(".items_1work").css({
                    'transition': 'all 0s ease',

                    'opacity': '0',
                    'pointer-events': 'none',
                    'height': '0',
                })
                check1work = false
                $(".items_1crm").css({
                    'transition': 'all 0s ease',
                    'opacity': '0',
                    'pointer-events': 'none',
                    'height': '0',
                })
                check1crm = false
                $(".items_1hrm").css({
                    'transition': 'all 0.5s ease',
                    'opacity': '1',
                    'pointer-events': 'auto',
                    'height': 'auto',
                })
                check1hrm = true
                setActiveCat("cat_1hrm")
                $(".truycap").attr('href', '#')
                $(".truycap").html('Truy cập 1HRM')
            }
        })
        $(".cat_1crm").click(function () {
            if (!check1crm) {
                $(".items_1work").css({
                    'transition': 'all 0s ease',
                    'opacity': '0',
                    'pointer-events': 'none',
                    'height': '0',
                })
                check1work = false
                $(".items_1hrm").css({
                    'transition': 'all 0s ease',
                    'opacity': '0',
                    'pointer-events': 'none',
                    'height': '0',
                })
                check1hrm = false
                $(".items_1crm").css({
                    'transition': 'all 0.5s ease',
                    'opacity': '1',
                    'pointer-events': 'auto',
                    'height': 'auto',
                })
                check1crm = true
                setActiveCat("cat_1crm")
                $(".truycap").attr('href', '#')
                $(".truycap").html('Truy cập 1CRM')
            }


        })
    });
})(jQuery);

