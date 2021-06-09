jQuery(function($){

    function get_swiper_child_width(el){

        var totalWidth = 0;

        $(el).children().each(function() {
              totalWidth = totalWidth + $(this).width();
        });

        return totalWidth;
    }

    $(document).ready(function(){
        var gnb_wrap_el = "#gnb_wrap",
            gnb_el = "#gnb";

        var menuSwiper = undefined,
            menu_el = "#swipe_gnb_menu",
            menu_el_length = $(menu_el+" > ul > li").length,
            current_index = $(menu_el+" > ul > li").find("a.gnb_sl").parent().index(),
            menu_el_width = get_swiper_child_width(menu_el+" > ul") + 100;

        var SubSwiper = undefined,
            sub_menu = "#sb_cate",
            sub_menu_length = $(sub_menu+" > ul > li").length,
            sub_current_index = $(sub_menu+" > ul > li").find(".on").index(),
            sudb_menu_el_width = get_swiper_child_width(sub_menu+" > ul") + 20;

        function Menu_initSwiper() {
            var screenWidth = $(window).width();

            if(screenWidth <= menu_el_width && menuSwiper == undefined) {

                $(menu_el).find('.swiper-slide a').removeAttr('style');

                menuSwiper = new Swiper(menu_el, {
                    freeMode:true,
                    slidesPerView: 'auto',
                    spaceBetween: 0,
                    speed: 100
                });

                if( current_index > 0 ){
                    menuSwiper.slideTo(current_index, 1);
                }

            } else if (screenWidth > menu_el_width && menuSwiper != undefined) {
                menuSwiper.destroy();
                menuSwiper = undefined;
                $(menu_el).find('.swiper-wrapper').removeAttr('style');
                $(menu_el).find('.swiper-slide').removeAttr('style');
            }

            if( screenWidth > menu_el_width && menuSwiper == undefined ){
                var child_width = $(menu_el).width() / menu_el_length;

                child_width = Math.round(child_width);

                $(menu_el).find('.swiper-slide a').attr({"style":"width:"+child_width+"px;text-align:center"});
            }

        }

        function Sub_menuSwiper() {
            var screenWidth = $(window).width();

            SubSwiper = new Swiper(sub_menu, {
                freeMode:true,
                slidesPerView: 'auto',
                spaceBetween: 5,
            });

            if( sub_current_index > 0 ){
                SubSwiper.slideTo(sub_current_index, 100);
            }

        }

        if( menu_el_length ){
            Menu_initSwiper();

            $(gnb_wrap_el).stickyNavbar({
                mobile : true,
                startAt: 0,
                zindex: 1000,
            });

            $(window).on('resize', function(){
               Menu_initSwiper();
            });
        }

        if ( sub_menu_length ) {
            $(sub_menu+" > ul").addClass("swiper-wrapper");
            $(sub_menu+" > ul > li").addClass("swiper-slide");

            Sub_menuSwiper();
        }

    });
});
