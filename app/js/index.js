$(document).ready(function() {

    var commentForm = $('.js-comment-form');

    $('.js-reply').on('click', function(e) {

        var replyTo = $(this).closest('.comment-buttons');

        e.preventDefault();

        $('.js-comment-form').slideUp(300, function() {
            replyTo.after(commentForm);
            $(this).slideDown(300, function() {
                $(this).find('textarea').trigger('focus');
            });
        });

    })

    $('.js-main-comment').click(function(e) {

        var commentButton = $(this);

        e.preventDefault();

        $('.js-comment-form').slideUp(300, function() {
            commentButton.next().after(commentForm);
            $(this).slideDown(300, function() {
                $(this).find('textarea').trigger('focus');
            });
        });

    })

});