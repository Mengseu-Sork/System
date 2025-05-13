<?php

class BaseController
{
    function view($view, $data = [])
    {
        extract($data);
        ob_clean();
        $content = ob_get_clean();
        require_once 'Views/layout.php';
        require_once 'Views/'.$view.'.php';
    }

    function redirect($uri)
    {
        header('Location:' . $uri);
        exit();
    }


}
