(function() {

    var setUpSearch = function() {
        var opts = {
            el: $('.search')
        };

        ACU.Search(opts);
    };

    var whenReady = function() {
        setUpSearch();
    };

    $(document).ready(whenReady);
})();