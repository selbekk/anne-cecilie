(function() {
    ACU.Search = function(opts) {

        var template = Handlebars.templates.search;

        var $el;

        var $wrapper;
        var $form;
        var $field;
        var $glyph;

        var search = function() {
            $field.focus();
            if(!$field.val()) {
                return;
            }

            $el.off();
            $form.submit();
        };

        var showField = function() {
            $field.css({
                display: 'inline-block'
            }).animate({ width: '140px' }, 300, function() { $field.focus() });

        };

        var hideField = function() {
            $field.animate({ width: 0 }, 300, function() { $field.hide() });
        };

        var closeOnEscape = function(e) {
            if(e.keyCode === 27) {
                hideField();
            }
        };

        var closeOnFieldBlur = function(e) {
            setTimeout(function() {
                if( !$field.is(':focus') ) {
                    hideField();
                }
            }, 1000);
        };


        var glyphClicked = function() {
             $field.is(':visible') ? search() : showField();
        };

        var initEvents = function() {
            $glyph.on('click', glyphClicked);
            $field.on('keyup', closeOnEscape);
            $field.on('blur', closeOnFieldBlur);

        };

        var initView = function() {
            var context = {
                texts: {
                    hover: 'Search this site'
                }
            };

            var html = template(context);
            $el.html(html);

            $wrapper = $el.find('.search-wrapper');
            $glyph = $wrapper.find('.glyphicon');
            $form = $wrapper.find('.search-form');
            $field = $form.find('.search-field');

            initEvents();

            $glyph.fadeIn('slow');
        };

        var init = function(opts) {
            $el = opts.el;
            initView();
        };

        init(opts);
    };
})();