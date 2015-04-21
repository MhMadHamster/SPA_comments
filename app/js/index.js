$(document).ready(function() {

    var commentForm = $('.js-comment-form');

    $('.media-list').on('click', '.js-reply', function(e) {

        var replyTo = $(this).closest('.comment-buttons');

        e.preventDefault();

        $('.js-comment-form').slideUp(300, function() {
            replyTo.after(commentForm);
            $(this).slideDown(300, function() {
                $(this).find('textarea').trigger('focus');
            });
        });

    });

    $('.js-main-comment').click(function(e) {

        var commentButton = $(this);

        e.preventDefault();

        $('.js-comment-form').slideUp(300, function() {
            commentButton.next().after(commentForm);
            $(this).slideDown(300, function() {
                $(this).find('textarea').trigger('focus');
            });
        });

    });


    // Remove
    $('.media-list').on('click', '.js-remove', function(e) {

        e.preventDefault();

        var commentToRemove = $(this).closest('.media');

        if(commentToRemove.find(commentForm).length !== 0) {
            commentForm.hide();
            $('.js-article').append(commentForm);
        };

        commentToRemove.slideUp(300, function() {
            $(this).remove();
        });

    });


    // Submit Form
    $('#comment-form').submit(function(e) {

        e.preventDefault();

        var author = this.commentAuthor.value,
            comment = this.commentText.value;

        this.commentAuthor.value = '';
        this.commentText.value = '';

        if (author === '') {
            author = 'Anonymous';
        };

        if ($(this).closest('.media').length === 0) {
            $(this).closest('.js-article').find('.media-list').append('<li class="media">' +
                                                                        '<div class="media-body">' +
                                                                            '<h4 class="media-heading">' + author + '</h4>' +
                                                                            '<p>' + comment + '</p>' +
                                                                            '<div class="comment-buttons">' +
                                                                                '<a href="" class="js-reply">Reply <span class="glyphicon glyphicon-retweet" aria-hidden="true"></span></a>' +
                                                                                '<a href="" class="js-remove">Remove<span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true"></span></a>' +
                                                                            '</div>' +
                                                                        '</div>' +
                                                                       '</li>');
        } else {
            $(this).closest('.media-body').append('<li class="media">' +
                                                    '<div class="media-left"></div>' +
                                                    '<div class="media-body">' +
                                                        '<h4 class="media-heading">' + author + '</h4>' +
                                                        '<p>' + comment + '</p>' +
                                                        '<div class="comment-buttons">' +
                                                            '<a href="" class="js-reply">Reply <span class="glyphicon glyphicon-retweet" aria-hidden="true"></span></a>' +
                                                            '<a href="" class="js-remove">Remove<span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true"></span></a>' +
                                                        '</div>' +
                                                    '</div>' +
                                                 '</li>');
        };

        $(this).closest('.js-comment-form').slideUp(300);

    });

});