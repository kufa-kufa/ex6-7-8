<!Doctype html>
<html>
<head>
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Мой первый Блог</title>
</head>
<body>
    <div class="container">
        <h1>мой первый блог</h1>
        <div>
            <div class="article">
                <?php foreach ($articles as $article) {
                    echo '<li><a href=article.php?id='.$article["id"].'>'.$article["title"].'</a></li>';
                }
                ?>
               
             </div>
          </div>
        </div>
        
        </body>
        </html>  
                
    



