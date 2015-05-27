$(function() {
    var bgClass = '.bg-img';
    var showClass = 'is-showing'
    var $images = $(bgClass);

    $images.first().addClass(showClass);

    setInterval(function() {
        var $current = $images.filter('.' + showClass);
        var $next = $current.next(bgClass).length ? $current.next(bgClass) : $(bgClass).first();

        $current.removeClass(showClass);
        $next.addClass(showClass);
    }, 5000);
});
