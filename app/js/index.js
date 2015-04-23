$(document).ready(function() {

    function tmpl(result, author, comment) {
        return  '<div class="media-left"><p class="text-muted">#' + result + '</p></div>' +
                '<div class="media-body">' +
                    '<h4 class="media-heading">' + author + '</h4>' +
                    '<p>' + comment + '</p>' +
                    '<div class="comment-buttons">' +
                        '<a href="" class="js-reply">Reply <span class="glyphicon glyphicon-retweet"></span></a>' +
                        '<a href="" class="js-remove">Remove <span class="glyphicon glyphicon-remove"></span></a>' +
                    '</div>' +
                '</div>';
    }

    var commentForm = $('.js-comment-form'),
        re = /[^\w\d\s[А-Яа-я]]/;

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

        var commentToRemove = $(this).closest('.media'),
            commentId = commentToRemove.attr('id');

        if(commentToRemove.find(commentForm).length !== 0) {
            commentForm.hide();
            $('.js-article').append(commentForm);
        };

        $.ajax({
            method: 'POST',
            url: '../app/php/delete.php',
            data: { deleteId: commentId },
            error: function(xhr, error) {
                console.debug(xhr);
                console.debug(error);
                alert('Something has gone wrong! Check console for details.')
            },
            success: function(result) {
                commentToRemove.slideUp(300, function() {
                    $(this).remove();
                });
                console.log(result);
            }
        })

    });


    // Submit Form
    $('#comment-form').submit(function(e) {

        e.preventDefault();

        var author = this.commentAuthor.value,
            comment = this.commentText.value,
            _this = $(this)
            parent;

        if (re.exec(author) || re.exec(comment)) {
            alert("Unexpected input!");
            return false;
        };

        if ($(this).closest('.media').closest('.media').length) {
            parent = $(this).closest('.media').closest('.media').attr('id');
        } else {
            parent = 0;
        }

        this.commentAuthor.value = '';
        this.commentText.value = '';

        if (author === '') {
            author = 'Anonymous';
        };

        $.ajax({
            method: 'POST',
            url: '../app/php/add.php',
            data: { newAuthor: author, newComment: comment, newParent: parent },
            error: function(xhr, error) {
                console.debug(xhr);
                console.debug(error);
                alert('Something has gone wrong! Check console for details.')
            },
            success: function(result) {

                if (_this.closest('.media').length === 0) {
                    _this.closest('.js-article')
                         .find('.media-list')
                         .append('<li class="media" id="' + result + '">' + tmpl(result, author, comment) + '</li>');
                } else {
                    _this.closest('.media-body')
                         .append('<div class="media" id="' + result + '">' + tmpl(result, author, comment) + '</li>');
                };
        
        }});

        $(this).closest('.js-comment-form').slideUp(300);

    });

});