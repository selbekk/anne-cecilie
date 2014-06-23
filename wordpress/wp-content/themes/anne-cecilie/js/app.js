(function() {

    var setUpSearch = function() {
        var opts = {
            el: $('.search')
        };

        ACU.Search(opts);
        ACU.Booking();
    };

    var whenReady = function() {
        setUpSearch();
    };

    $(document).ready(whenReady);
})();
