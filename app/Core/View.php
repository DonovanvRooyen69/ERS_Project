<?php
namespace App\Core;

class View{
    public static function render($viewPath, $data = []){
        $file = '../app/views/' . $viewPath . 'php';

        if(file_exists($file)){
            extract($data);
            require_once $file;
        }else{
            die("View not found: " . $file);
        }
    }
}