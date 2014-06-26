(function() {

    var setUpSearch = function() {
        var opts = {
            el: $('.search')
        };

        ACU.Search(opts);
        ACU.Booking();
        ACU.Navigation();
    };

    var whenReady = function() {
        setUpSearch();
    };

    $(document).ready(whenReady);
})();
