jQuery(document).ready(function ($) {
    $('.js__sendSearchForm').click(function (e) {
        e.preventDefault();
        $(this).parents('form').submit();
    });

    $('.js__searchForm').submit(function (e) {
        e.preventDefault();
        var q = $('#field-search').val();
        var action = $(this).attr('action');
        if(q){
            location = action + '?q=' + q;
        }
    });
    
    $('.js__userLogout').click(function (e) {
        e.preventDefault();
        var request = $.ajax({
            data: {'logout': 1},
            url: '/actions/logout',
            type: 'post',
            dataType: 'html',
        });
        request.done(function () {
            location.reload();
        });
    });
});