(function() {
    ACU.Gallery = function() {
        var $thumbnails = $('.gallery-item');

        var isShowing = false;
        var currentItem;

        var showLayover = function($itemToShow) {
            var $layover = $('.layover-outer');
            if(!$layover.length) {
                createLayover();
                $layover = $('.layover-outer');
            }

            var imgUrl = $itemToShow.data('full-url');

            $layover.find('.image-holder').css({ backgroundImage: 'url('+ imgUrl +')' } );

            currentItem = $itemToShow;
            isShowing = true;
        };

        var createLayover = function() {
            var layoverHtml =
            '<div class="layover-outer">'+
                '<div class="layover-inner">' +
                    '<div class="image-holder"></div>' +
                '</div>' +
                '<div class="trigger closer"><span class="glyphicon glyphicon-remove"></span></div>' +
                '<div class="trigger previous"><span class="glyphicon glyphicon-chevron-left"></span></div>' +
                '<div class="trigger next"><span class="glyphicon glyphicon-chevron-right"></span></div>' +
            '</div>';

            $('body').append(layoverHtml);
        }

        var hideLayover = function() {
            if(!isShowing) {
                return; // No need to hide what's hidden
            }
            $('.layover-outer').fadeOut(400, function() {
                $(this).remove();
                isShowing = false;
            });
        };

        var nextImage = function() {
            var nextItem = currentItem.next();
            if(nextItem.length && !nextItem.hasClass('gallery-item')) {
                nextItem = nextItem.next();
            }
            if(nextItem.length) {
                showLayover(nextItem);
            }
        };

        var previousImage = function() {
            var previousItem = currentItem.prev();
            if(previousItem.length && !previousItem.hasClass('gallery-item')) {
                previousItem = previousItem.prev();
            }
            if(previousItem.length) {
                showLayover(previousItem);
            }
        };

        var keyboardListener = function(e) {
            // if not showing, don't listen
            if(!isShowing) {
                return;
            }

            var key = e.keyCode;
            if(key === 27) { // escape
                return hideLayover();
            }

            if(key === 37) { // left arrow
                return previousImage();
            }
            if(key === 39) { // right arrow
                return nextImage();
            }
        };

        var thumbnailClicked = function(e) {
            e.preventDefault();
            e.stopPropagation();

            showLayover($(this));

        };

        var init = function() {
            if(!$thumbnails.length) {
                // Nothing to initialize on this page
                return;
            }

            $thumbnails.on('click', thumbnailClicked);
            $(document).on('keyup', keyboardListener);
            $(document).delegate('.closer', 'click', hideLayover);
        };

        init();
    };


    ACU.Gallery();
})();
