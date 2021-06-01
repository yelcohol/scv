/*! bigSlide - v0.5.0 - 2014-09-12
* http://ascott1.github.io/bigSlide.js/
* Copyright (c) 2014 Adam D. Scott; Licensed MIT */
/*! bigSlide - v0.4.3 - 2014-01-25
* http://ascott1.github.io/bigSlide.js/
* Copyright (c) 2014 Adam D. Scott; Licensed MIT */

(function($) {
  'use strict';

  $.fn.bigSlide = function(options) {

    var settings = $.extend({
      'menu': ('#menu'),
      'push': ('.push'),
      'side': 'left',
      'menuWidth': '285px',
      'speed': '300',
      'activeBtn':'menu-open'
    }, options);

    var menuLink = this,
        menu = $(settings.menu),
        push = $(settings.push),
        width = settings.menuWidth;

    var positionOffScreen = {
      'position': 'fixed',
      'top': '0',
      'bottom': '0',
      'settings.side': '-' + settings.menuWidth,
      'width': settings.menuWidth,
      'height': '100%'
    };

    var animateSlide = {
      '-webkit-transition': settings.side + ' ' + settings.speed + 'ms ease',
      '-moz-transition': settings.side + ' ' + settings.speed + 'ms ease',
      '-ms-transition': settings.side + ' ' + settings.speed + 'ms ease',
      '-o-transition': settings.side + ' ' + settings.speed + 'ms ease',
      'transition': settings.side + ' ' + settings.speed + 'ms ease'
    };

    menu.css(positionOffScreen);
    push.css(settings.side, '0');
    menu.css(animateSlide);
    push.css(animateSlide);

    menu._state = 'closed';

    menu.open = function() {
      menu._state = 'open';
      menu.css(settings.side, '0');
      push.css(settings.side, width);
      menuLink.addClass(settings.activeBtn);
    };

    menu.close = function() {
      menu._state = 'closed';
      menu.css(settings.side, '-' + width);
      push.css(settings.side, '0');
      menuLink.removeClass(settings.activeBtn);
    };

   $(document).on('click.bigSlide', function(e) {
     if (!$(e.target).parents().andSelf().is(menuLink) && menu._state === 'open')  {
       // 딥블루 테마에서 사이드 메뉴 닫기 버튼에서만 닫혀지도록 하기 위해 주석처리
       // menu.close();
       menuLink.removeClass(settings.activeBtn);
     }
    });

    menuLink.on('click.bigSlide', function(e) {
      e.preventDefault();
      if (menu._state === 'closed') {
        menu.open();
      } else {
        menu.close();
      }
    });

    menuLink.on('touchend', function(e){
      menuLink.trigger('click.bigSlide');
      e.preventDefault();
    });

    return menu;

  };

}(jQuery));
