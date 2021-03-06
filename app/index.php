<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="robots" content="{if $page.noindex}none{else}all{/if}">
    <meta name="description" content="{$page.description}">
    <meta name="keywords" content="{$page.keywords}">
    <meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE">

    <link rel="stylesheet" href="css/styles.css">

    <title>{$page.title}</title>
</head>
<body>

    <!-- [+] .container -->
    <div class="container">

        <!-- [+] .nav navbar-nav -->
        <ul class="nav navbar-nav">
            <li><a href="">Lorem.</a></li>
            <li><a href="">Expedita?</a></li>
            <li><a href="">Ut.</a></li>
            <li><a href="">Iure.</a></li>
        </ul>
        <!-- [-] .nav navbar-nav -->

    </div>
    <!-- [-] .container -->

    
    <!-- [+] .container -->
    <div class="container">

        <div class="row">
            
            <!-- [+] .col-md-8 -->
            <div class="col-md-8 js-article">
                
                <div class="page-header">
                  <h1>Example page header</h1>
                </div>

                <img src="http://placehold.it/800x430" alt="" class="img-responsive">

                <hr>

                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque, est.</p>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore quae, ut, officia numquam nisi delectus tenetur ipsum provident hic optio asperiores nemo iure fugit fugiat, quod culpa et consequatur odit, incidunt aperiam porro quisquam doloremque eaque! Magni eius esse qui unde, dolores quibusdam recusandae, assumenda. At dolores nesciunt vitae molestiae.</p>

                <a href="" class="btn btn-primary js-main-comment">Leave a comment</a>

                <hr>

                <div class="js-comment-form">

                    <div class="well">
                        <form action="" role="form" id="comment-form">
                            <div class="form-group">
                                <label for="comment-author">Name:</label>
                                <input type="text" name="commentAuthor" id="comment-author" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="comment-text">Leave a comment:</label>
                                <textarea name="commentText" id="comment-text" cols="30" rows="3" class="form-control" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary js-submit">Submit</button>
                        </form>
                    </div>

                    <hr>

                </div>

                <? include_once "php/main.php" ?>

            </div>
            <!-- [-] .col-md-8 -->


            <!-- [+] .col-md-4 -->
            <div class="col-md-4">
                
                <div class="well">
                    <h4>Side Bar</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem aliquid accusantium aspernatur, ea, suscipit, possimus tenetur iusto tempore libero accusamus rerum ipsam, nemo debitis! Qui eius iusto, ratione dignissimos eligendi.</p>
                </div>

            </div>
            <!-- [-] .col-md-4 -->


        </div>

        <hr>

    </div>
    <!-- [-] .container -->

    
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <script src="js/index.js"></script>

</body>
</html>