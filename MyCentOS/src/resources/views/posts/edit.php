<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="phpのフルクラッチで作られた掲示板です。">
    <link
        rel="stylesheet"
        href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous"
    >
    <title>PHP</title>
</head>
<body>
   <?php include ($values[layouts].'header.php');?>
   
    <main style="padding-bottom:20px;">
    
        <div>
        <div class="container mt-4">
            <div class="border p-4">
                <h1 class="h5 mb-4">
                    投稿の編集
                </h1>

                <h1 class="h5 mb-4 text-danger">
                        <?php foreach ($error as $alert) : ?>
                        <?php echo $alert; ?>
                          <?php endforeach; ?>
                                             </h1>
    
                <form method="POST" action=<?php echo "/update/".$post["id"];?>>
                
                    <input type="hidden" name="_token" value="CNqkpyCybYGpxQUKn5aJxaSEOB1QVEAAgdASk1TK">                <input type="hidden" name="_method" value="PUT">
                    <fieldset class="mb-4">
                        <div class="form-group">
                            <label for="title">
                                タイトル
                            </label>
                            <input
                                id="title"
                                name="title"
                                class="form-control "
                                value=<?php echo $post ["title"];?>
                                type="text"
                            >
                                                </div>
    
                        <div class="form-group">
                            <label for="content">
                                本文
                            </label>
    
                            <textarea
                                id="content"
                                name="content"
                                class="form-control "
                                rows="10"
                            ><?php echo $post ["content"];?></textarea>
                                                </div>
    
                        <div class="mt-5">
    
                            <button type="submit" class="btn btn-primary">
                                更新する
                            </button>
    
                            <a class="btn btn-danger" href=<?php echo '/destroy/'.$post["id"];?>>
                                削除する
                            </a>
    
                            <a class="btn btn-secondary" href=<?php echo '/edit/'.$post["id"];?>>
                                キャンセル
                            </a>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
        </div>
    </main>       
    

    <footer class="footer bg-dark">
        <div class="container">
            <p style="color:white; text-align:right;">
                ©Noritaka Gibo All rignts reserved
            </p>
        </div>
    </footer>
</body>
</html>