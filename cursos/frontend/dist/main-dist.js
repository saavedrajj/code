"use strict";!function(){function i(){$("#description").addClass("fixed").removeClass("absolute"),$("#navigation").slideUp(),$("#sticky-navigation").slideDown()}function n(){$("#description").removeClass("fixed").addClass("absolute"),$("#navigation").slideDown(),$("#sticky-navigation").slideUp()}function o(){var i=$("#description"),n=i.height();return $(window).scrollTop()>$(window).height()-1.5*n}var s=!1;$("sticky-navigation").slideUp(0),$("sticky-navigation").removeClass("hidden"),$(window).scroll(function(){var t=o();t&&!s&&(s=!0,i()),!t&&s&&(s=!1,n())})}();
