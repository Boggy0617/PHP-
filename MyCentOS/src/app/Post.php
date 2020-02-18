<?php

class Post{
    private $DB_HOST = '192.168.33.10';
    private $DB_NAME = 'php_quest';
    private $DB_USER = 'root';
    private $DB_PASSWORD = 'phpQuest2019@';

    protected function db_access(){
        // PHPのエラーを表示するように設定
        error_reporting(E_ALL & ~E_NOTICE);

        // データベースの接続
        try {
            $dbh = new PDO('mysql:host='.$this->DB_HOST.';dbname='.$this->DB_NAME, $this->DB_USER, $this->DB_PASSWORD);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $dbh;
        } catch (PDOException $e) {
            echo $e->getMessage();
            echo "<br>
            <h1 style='color:red; text-align:center;'>
                500 Internal Server Error
            </h1>";
            die;
            return null;
            exit;
        }
    }

        protected function validation($data_title,$data_content){
            $error = array();
    
            if (empty($data_title) || ctype_space($data_title)){
                $error[] = "タイトルを入力してください。";
            } else if (empty($data_content) || ctype_space($data_content)){
                $error[] = "本文を入力してください。";
            } else if (strlen($data_content)>140){
                $error[] = "本文は140字以下にしてください。";
            } 
    
            return $error;
    
        
    }
    public function index(){
        $dbh = $this->db_access();

        $sql = 'SELECT * from posts';
        $stmt = $dbh->prepare($sql);

        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
        
        

        
    }
    
    public function store() {
        
        $post= array('title'=> $_POST['title'],'content'=> $_POST['content']);
       
        $error = $this->validation($_POST['title'],$_POST['content']);
       
        if (count($error)){
            //addにエラーログを飛ばします。
        } else {
            //値を保存します。
            $dbh = $this->db_access();
            try {
                $dbh->beginTransaction();
                
                $sql = 'INSERT INTO posts(title, content) VALUES(:title, :content)';
                $stmt = $dbh->prepare($sql);
                $stmt->bindValue(':title', $_POST['title'], PDO::PARAM_STR);
                $stmt->bindValue(':content', $_POST['content'], PDO::PARAM_STR);
                $stmt->execute();

                $dbh->commit();
            } catch(PDOException $Exception){
                $dbh->rollBack();

            }
            $error[] = "作成しました！";
        }
       
        $result = array($post, $error);

        return $result;
    }

       

    public function edit($article_id) {
            
        $dbh = $this->db_access();
       
        $sql = 'SELECT * from posts WHERE id = :id';
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':id', $article_id, PDO::PARAM_INT);

        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $result;
    }

    public function update($article_id) {
        
        $post= array('title'=> $_POST['title'],'content'=> $_POST['content']);
        
        $error = $this->validation($_POST['title'],$_POST['content']);
        
        if (count($error)){
            //addにエラーログを飛ばします。
        } else {
            //値を保存します。
           
            $dbh = $this->db_access();
            try {
                
                $dbh->beginTransaction();
                
                $sql = 'UPDATE posts SET title= :title, content= :content WHERE id= :id';
                $stmt = $dbh->prepare($sql);
                $stmt->bindValue(':title', $_POST['title'], PDO::PARAM_STR);
                $stmt->bindValue(':content', $_POST['content'], PDO::PARAM_STR);
                $stmt->bindValue(':id', $article_id, PDO::PARAM_INT);
                $stmt->execute();

                $dbh->commit();
            } catch(PDOException $Exception){
                $dbh->rollBack();

            }
            $error[] = "更新しました！";
        }

        $result = array($post, $error);

        return $result;
    }

    public function destroy($article_id) {
        $dbh = $this->db_access();

        $sql = 'DELETE from posts WHERE id = :id';
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':id', $article_id, PDO::PARAM_INT);

        $stmt->execute();

        return 'ok';
    }

    
}


// $day1 = array(
//     "num" => "1",
//     "user" => "Noritaka Gibo",
//     "title" => "9月27日(金)　PHP QUESTの第1回が行われました！",
//     "content" => 
//     "
//     ・PHPに関する市場動向<br>
//     ・クライアントサーバモデル<br>
//     ・MOCKアプリケーションの作成<br>                        
//     ",
//     "tags" => "#HTML, #CSS",
// );
// $day2 = array(
//     "num" => "2",
//     "user" => "Noritaka Gibo",
//     "title" => "10月4日(金)　PHP QUESTの第2回が行われました！",
//     "content" => 
//     "
//     ・CommandLineの使い方<br>  
//     ・includeによるファイル共通化<br>  
//     ・PHPのHTMLへの埋め込み<br>  
//     ",
//     "tags" => "#PHP",
// );
// $day3 = array(
//     "num" => "３",
//     "user" => "Noritaka Gibo",
//     "title" => "10月11日(金)　PHP QUESTの第3回が行われました！",
//     "content" => 
//     "
//     ・プロトコル(HTTP, TCP/IP)<br>  
//     ・Vagrant,VirtualBox,Apacheとは？<br>  
//     ・htaccess(フロントコントローラによるルーティング)<br>  
    
//     ",
//     "tags" => "#Vagrant #Docker",
// );
// $posts = array($day1, $day2, $day3);
?> 