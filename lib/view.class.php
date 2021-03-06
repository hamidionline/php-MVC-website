<?php

class View
{
    protected $data;
    protected $path;

    public static function getDefaultViewPath() {
        $router = App::getRouter();

        if (!$router){
            return false;
        }

        $controller_dir = $router->getController();
        $template_name = $router->getMethodPrefix().$router->getAction().'.php';

        return VIEWS_PATH.DS.$controller_dir.DS.$template_name;
    }

    public function __construct($data = array(), $path = null)
    {
        if (! $path){
            // our defalut path here
                $path = self::getDefaultViewPath();
        }

        if ( !file_exists($path)){
            throw new Exception("template file not found in ".$path);

        }

        $this->path = $path;
        $this->data = $data;
    }


    public function render(){
        $data = $this->data;
        ob_start();
        include ($this->path);

        $content = ob_get_clean();

        return $content;
    }
}