<?php

class AppController {
    private $reguest;

    public function __construct(){
        $this->request = $_SERVER['REQUEST_METHOD'];
    }

    protected function isGet(): bool{
        return $this->request === "GET";
    }

    protected function isPost(): bool{
        return $this->request === "POST";
    }

    protected function render(string $template = null, array $variables = []){
        $templatePath = 'public/views/'.$template.'.php';

        if (!file_exists($templatePath)){
            // might cause problems ITF
            
            die('File not found!');
        }

        extract($variables);
        ob_start();
        include($templatePath);
        $output = ob_get_clean();

        print $output;
    }
}