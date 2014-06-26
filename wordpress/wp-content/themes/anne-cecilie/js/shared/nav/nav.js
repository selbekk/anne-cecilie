(function() {
    ACU.Navigation = function() {
        var $el;
        var $trigger;

        var showMenu = function() {
            $el.removeClass('hidden-xs'); // remove if present
            $el.slideDown(500);
        };

        var hideMenu = function() {
            $el.hide(200);
        };

        var triggerMenu = function() {
            $el.addClass('mobile-navigation');
            $el.is(':hidden') ? showMenu() : hideMenu();
        };

        var init = function() {
            $el = $('.main-navigation');
            $trigger = $('.menu-trigger');
            $trigger.on('click', triggerMenu);
        };

        init();

    };
})();
