(function() {

    ACU.ContactForm = function() {

        var $el;

        var sendEmail = function() {
            // TODO: Send AJAX request
        };

        var submitForm = function() {
            if(!validate()) {
                // TODO: show validation errors
                return;
            }

            sendEmail();
        };

        var init = function() {
            $el = $('#contact-form');

        };

        init();
    }
})();