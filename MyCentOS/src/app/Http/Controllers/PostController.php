<?php
class PostController
{
    // コンストラクタの実行
    public function __construct($models, $views) {
        $this->models = $models;
        $this->views = $views."posts/";
        $this->layouts = $views."layouts/";
    }

    // 共通処理の実装
    public function init() {
        $values = array(
            layouts => $this->layouts,
        );
        return $values;
    }
   
    // indexメソッドの宣言
    public function index() {
        $values = $this->init();
        include($this->models.'Post.php');
        $postmodel = new Post();
        $result = $postmodel->index();
        $posts = $result;
        include($this->views.'index.php');
    }

    // createメソッドの宣言
    public function create() {
        $values = $this->init();
        include($this->models.'Post.php');
        include($this->views.'create.php');
    }

   
   
   // storeメソッドの宣言
   public function store() {
    $values = $this->init();
    
    include($this->models.'Post.php');
    $postmodel = new Post();
    $result = $postmodel->store();

    $post = $result[0];
    $error = $result[1];
    include($this->views.'create.php');
}

    // showメソッドの宣言
    public function show($article_id) {
        
    }

    // editメソッドの宣言
    public function edit($article_id) {
        
        $values = $this->init();
        include($this->models.'Post.php');
        $postmodel = new POST();
        $result = $postmodel->edit($article_id);
        
        $post = $result[0];
       
        include($this->views.'edit.php');
    }

    // updateメソッドの宣言
    public function update($article_id) {
        $values = $this->init();
        
        include($this->models.'Post.php');
        $postmodel = new Post();
        $result = $postmodel->update($article_id);
        
        $post = $result[0];
        $error = $result[1];
        include($this->views.'edit.php');
    }

    // destoryメソッドの宣言
    public function destroy($article_id) {
        $values = $this->init();

        include($this->models.'Post.php');
        $postmodel = new Post();
        $result = $postmodel->destroy($article_id);

        header('Location: http://192.168.33.10/');
    }

}

?>
