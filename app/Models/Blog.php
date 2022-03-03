<?php
/**
*
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
* @author sergio vera jurado<a19vejuse@iesgrancapitan.org>
*
*/
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Blog extends Model{
    protected $table = 'blog';
    public function comments(){
        return $this->hasMany(Comment::class);
    }
// private static $instancia;
//     public static function getInstancia()
//     {
//     if (!isset(self::$instancia)) {
//             $miclase = __CLASS__;
//             self::$instancia = new $miclase;
//         }
//         return self::$instancia;
//     }
//     public function __clone()
//     {
//         trigger_error('La clonación no es permitida!.', E_USER_ERROR);
//     }
//     private $id;
//     private $title;
//     private $blog;
//     private $image;
//     private $tags;
//     private $author;
//     public function __construct(){}
//     public function setTitle($title)
//     {
//         $this->title = $title;
//     }
//     public function setBlog($blog)
//     {
//         $this->blog = $blog;
//     }
//     public function setImage($image)
//     {
//         $this->image = $image;
//     }
//     public function setTags($tags)
//     {
//         $this->tags = $tags;
//     }
//     public function setAuthor($author)
//     {
//         $this->author = $author;
//     }

//     public function get($id=''){
//         $this->query = "SELECT * FROM blog WHERE id = '$id'";
//         $this->parametros['id']=$id;
//         $this->get_results_from_query();
//         return $this->rows;
//     }
//     public function get_All(){
//         $this->query = "SELECT * FROM blog";
//         $this->get_results_from_query();
//         return $this->rows;
//     }
//     public function edit(){
//         $this->query = "UPDATE blog SET author=:author, blog=:blog, image=:image, title=:title,tags=:tags,WHERE id=:id";
//         $this->parametros['author']=$this->author;
//         $this->parametros['blog']=$this->blog;
//         $this->parametros['image']=$this->image;
//         $this->parametros['title']=$this->title;
//         $this->parametros['tags']=$this->tags;
//         $this->parametros['id']=$this->id;
//         $this->get_results_from_query();
//         $this->mensaje = 'blog editado correctamente';
//     }
//     public function delete(){
//         $this->query = "DELETE FROM blog WHERE id=:id";
//         $this->parametros['id']=$this->id;
//         $this->get_results_from_query();
//         $this->mensaje = 'blog eliminado correctamente';
//     }
//     public function set(){
//         $this->query = "INSERT INTO blog(title, author, blog, image, tags)
//                             VALUES(:title, :author, :blog, :image, :tags)";
//             $this->parametros['title']= $this->title;
//             $this->parametros['author']= $this->author;
//             $this->parametros['blog']= $this->blog;
//             $this->parametros['image']= $this->image;
//             $this->parametros['tags']= $this->tags;
//             $this->get_results_from_query();
//             // $this->execute_single_query();
//             $this->mensaje = 'entrada añadida.';
//             }
}

?>