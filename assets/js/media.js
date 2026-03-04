"use strict";

(function($) {
    $(document).ready(function() {
        $('.upload_image_button').click(function(e) {
            e.preventDefault();
            var imageUploader = wp.media({
                title: 'Select Image',
                button: {
                    text: 'Use this image'
                },
                multiple: false
            });

            imageUploader.open();

            imageUploader.on('select', function() {
                var image = imageUploader.state().get('selection').first().toJSON();
                var inputField = $(e.target).prev('input');
                inputField.val(image.url);
            });
        });
    });
})(jQuery);