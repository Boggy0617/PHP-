<?php
$url_text = $_GET['url'];
$params = explode('/', $url_text);

$webroot = $_SERVER['DOCUMENT_ROOT'];
$models = $webroot.'/../app/';
$views = $webroot."/../resources/views/";

include('../app/Http/Controllers/PostController.php'); 
$postController = new PostController($models,$views);

switch ($params[0]) {
    case "":
        
        $postController->index();
        
        break;
    case "create":
        $postController->create();
        break;
    case "store":
        $postController->store(); 
        
        break;
    case "show":
        $article_id = $params[1];
        $postController->show($article_id); 
        break;
    case "edit":
        $article_id = $params[1];
        $postController->edit($article_id); 
        break;
    case "update":
        $article_id = $params[1];
        $postController->update($article_id); 
        break;
    case "destroy":
        $article_id = $params[1];
        $postController->destroy($article_id); 
        break;
}

?>