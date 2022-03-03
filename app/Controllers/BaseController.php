<?php
namespace App\Controllers;
use Laminas\Diactoros\Response\HtmlResponse as HtmlResponse;
class BaseController {
    protected $templateEngine;
    public function __construct()
    {
        $loader = new \Twig\Loader\FilesystemLoader('../views');
        $this->templateEngine =   new \Twig\Environment($loader, array(
            'debug' => true,
            'cache' => false,
        ));
    }
    public function renderHTML($fileName, $data=[]) {
        return new HTMLResponse($this->templateEngine->render($fileName, $data));

    }
}
?>