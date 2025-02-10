//Ajax form handler
jQuery(document).ready(function($) {
    $('#custom-search-form').submit(function(e) {
        e.preventDefault();

        var searchQuery = $('#search-query').val();

        $.ajax({
            url: ajax_obj.ajax_url,
            type: 'POST',
            data: {
                action: 'custom_search',
                query: searchQuery
            },
            success: function(response) {
                $('#search-results').html(response);
            }
        });
    });
});
