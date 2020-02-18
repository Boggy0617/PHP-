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
    <header class="navbar navbar-dark bg-success">
       <div class="container">
           <div>
               <a class="navbar-brand" href="./index.php">
                 PHP Full Scrach
               </a>
           </div>
       </div>
    </header>

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
                                             
                    <form method="POST" action="/store">
                        <fieldset class="mb-4">
                            <div class="form-group">
                                <label for="title">
                                    タイトル
                                </label>
                                <input
                                    id="title"
                                    name="title"
                                    class="form-control "
                                    value=""
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
                                ></textarea>
                                                    </div>
    
                            <div class="mt-5">
                                <a class="btn btn-secondary" href="./index.php">
                                    キャンセル
                                </a>
    
                                <button type="submit" class="btn btn-primary">
                                    投稿する
                                </button>
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