<?php
namespace App\Controllers;

use App\Models\Blog;

class IndexController extends BaseController {

public function indexAction() {
        $blogs = Blog::all();
        return $this->renderHTML("Page/index.html.twig", [
            'blogs' => $blogs
        ]);
    }
}