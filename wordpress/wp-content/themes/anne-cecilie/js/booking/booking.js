(function() {

    ACU.Booking = function() {

        var $el;
        var isSubmitted = false;

        var sendEmail = function() {
            $.ajax({
                url: '/wp-content/themes/anne-cecilie/ajax/booking.php',
                method: 'post',
                data: $el.serialize(),
                success: emailSent,
                error: emailFailed
            });
        };

        var emailSent = function(data) {
            var successMessage = 'Thank you! We will get back to you as soon as possible.';
            var $successEl = $('<div class="message-box success"></div>');
            $successEl.text(successMessage);
            $el.prepend($successEl);
        };

        var emailFailed = function(xhr, status, error) {
            $el.on('submit', submitForm);

            var errorMessage = '';

            if(status == 400) {
                errorMessage = 'Please fill out all the fields. There are only three of them :-)';
            }
            else if (status == 500) {
                errorMessage = 'Oops, sorry. Our fault. Seems like something isn\'t working right. ' +
                'Send your email directly to ac.ukkelberg@gmail.com. Sorry for the inconvenience!';
            }
            else {
                // Unknown codes... what to do with them..?
                errorMessage = 'Something isn\'t right in the world of email sending. Please send your email ' +
                'directly to ac.ukkelberg@gmail.com. Sorry for the inconvenience!';
            }

            var $errorEl = $('<div class"message-box error"></div>');
            $errorEl.text(errorMessage);
            $el.prepend($errorEl);
        };

        var removeMessages = function() {
            $el.find('.message-box').remove();
        };

        var submitForm = function(e) {
            e.preventDefault();

            if(isSubmitted) {
                return;
            }
            isSubmitted = true;

            removeMessages();

            sendEmail();
        };

        var init = function() {
            $el = $('#contact-form');
            if(!$el.length) {
                return;
            }

            $el.on('submit', submitForm);

        };

        init();
    }
})();
