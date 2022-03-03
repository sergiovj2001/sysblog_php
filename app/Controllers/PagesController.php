<?php
namespace App\Controllers;

use App\Models\Blog;

class PagesController extends BaseController {
    public function aboutAction() {
        return $this->renderHTML('Page/about.html.twig');
    }
    public function contactAction() {
        return $this->renderHTML('Page/contact.html.twig');
    }
    public function contactActionSend($request){
        if ($request->getmethod()== 'POST') {
            $postData = $request->getParsedBody();
        }
        return $this->renderHTML('Page/contactEmail.html.twig',$postData);
    }
    public function showBlogPostAction($request) {
        $uri = explode('/', $request->getRequestTarget());
        $id = end($uri);
        $blog = Blog::find($id);
        $comments = $blog::find($id)->comments;
        return $this->renderHTML('Page/showBlog.html.twig',[
            'blog'=>$blog,
            'comments'=>$comments
        ]);
    }
}
?>