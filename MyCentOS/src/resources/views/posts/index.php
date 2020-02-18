<!DOCTYPE html>



<html lang="ja">
<head>
  <?php include($values[layouts].'meta.php'); ?> 
</head>
<body>
 <div id="wrapper">
 
  <?php include($values[layouts].'header.php'); ?>
    <main style="padding-bottom:20px;">
        <div class="container">
        <div class="mb-4" style="padding-top:20px;">
                <a href="./create" class="btn btn-primary">
                    投稿を新規作成する
                </a>
            </div>
         <?php foreach ($posts as $post) : ?>
            
            
            <div class='card mb-4'>
                <div class='card-header'>
                    <p><?php echo $post["title"];  ?></p>
                </div>
                <div class='card-body'>
                    <p class='card-text'>
                    <?php echo $post["content"]; ?>
                    </p>
    
                    <a class='card-link' href=<?php echo '/edit/'.$post["id"];?>>
                        編集
                    </a>
                </div>
                <div class='card-footer'>
                    
                </div>
            </div>
         <?php endforeach;?>
        </div>
    </main>     
    <?php include($values[layouts].'footer.php'); ?>
    
    
</div>
</body>
</html>