jQuery(document).ready(function($) {
    function add_file(event, selector) {
        var send_attachment_bkp = wp.media.editor.send.attachment;

        event.preventDefault();

        image_selector = '#' + selector.attr('id') + '.custom_media_image';
        url_selector = '#' + selector.attr('id') + '.custom_media_url';
        upload_selector = '#' + selector.attr('id') + '.media_upload';

        wp.media.editor.send.attachment = function(props, attachment) {
            $(image_selector).attr('src', attachment.url);
            $(url_selector).val(attachment.url);

            wp.media.editor.send.attachment = send_attachment_bkp;

            if ( attachment.type == 'image') {
                var custom_image_properties = '<br><img src="' + attachment.url + '" height="100" width="400" />';
                $(custom_image_properties).insertAfter(upload_selector);
                $(upload_selector).unbind().attr('class', 'button remove_image').text('Remove');
            }

            file_bindings();
        }

        wp.media.editor.open();

        return false;
    }

    function remove_file(selector) {
        image_selector = '#' + selector.attr('id') + '.custom_media_image';
        url_selector = '#' + selector.attr('id') + '.custom_media_url';
        remove_selector = '#' + selector.attr('id') + '.remove_image';
        $(url_selector).val('');
        $(image_selector).attr('src', '');
        $(remove_selector).unbind().attr('class', 'button media_upload').text('Upload');

        file_bindings();
    }

    function file_bindings() {
        $('.remove_image').on('click', function() {
            parent_id = '#' + $(this).attr('id');
            remove_file($(this).parents(parent_id));
        });
        
        $('.media_upload').click(function(event) {
            parent_id = '#' + $(this).attr('id');
            add_file(event, $(this).parents(parent_id));
        });
    }
  
    file_bindings();
});
