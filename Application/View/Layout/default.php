<!DOCTYPE html>

<html>
    
    <head>
        <title>Index page</title>
        <script src="//Public/js/jquery.min.js"></script>
        <script src="//Public/js/masonry.pkgd.min.js"></script>
        
        <style>
            #container {
                width: 60%;
                margin: auto;
            }
        </style>
    </head>
    
    <body>
        <script>
            var container = document.querySelector('#container');
            var msnry = new Masonry(container, {
                columnWidth: 200,
                itemSelector: '.item'
            });
        </script>
        
        <div id="container" class="js-masonry">
            <div class="item">
                <img src="http://placehold.it/350x350">
                <img src="http://placehold.it/150x350">
                <img src="http://placehold.it/250x50">
                <img src="http://placehold.it/50x350">
            </div>
            <div class="item w2">
                <img src="http://placehold.it/350x350">
                <img src="http://placehold.it/350x350">
                <img src="http://placehold.it/350x350">
                <img src="http://placehold.it/350x350">
            </div>
            <div class="item">
                <img src="http://placehold.it/350x350">
                <img src="http://placehold.it/350x350">
                <img src="http://placehold.it/350x350">
                <img src="http://placehold.it/350x350">
            </div>
            <div class="item">
                <img src="http://placehold.it/350x350">
                <img src="http://placehold.it/350x350">
                <img src="http://placehold.it/350x350">
                <img src="http://placehold.it/350x350">
            </div>
            <div class="item">
                <img src="http://placehold.it/350x350">
                <img src="http://placehold.it/350x350">
                <img src="http://placehold.it/350x350">
                <img src="http://placehold.it/350x350">
            </div>
            <div class="item">
                <img src="http://placehold.it/350x350">
                <img src="http://placehold.it/350x350">
                <img src="http://placehold.it/350x350">
                <img src="http://placehold.it/350x350">
                
            </div>
        </div>
    </body>
    
</html>