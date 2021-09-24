<?php


namespace App\Models;


use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;


class Post
{

    public $title;

    public $body;

    public $excerpt;

    public $date;

    public $slug;

    /**
     * @param $title
     * @param $body
     * @param $excerpt
     * @param $date
     * @param $slug
     */

    public function __construct($title, $body, $excerpt, $date, $slug)
    {
        $this->title = $title;
        $this->body = $body;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->slug = $slug;
    }


    public static function find($slug)
    {

        $posts = static::all();
        return $posts->firstWhere('slug', $slug);

        /*$path = resource_path("/posts/{$slug}.html");  //concaténation

        if(!file_exists($path)){
            throw new ModelNotFoundException(); //couldnt find the model we want
        }

        return cache()->remember("posts.{$slug}", 1200, fn() => file_get_contents($path));*/
    }

    public static function findOrFail($slug)
    {

        $post = static::find($slug);

       if(!$post){
           throw new ModelNotFoundException();
       }

       return $post;
    }


    public static function all(): Collection
    {
        return cache()->rememberForever('posts.all', function(){
            $files = File::files(resource_path('posts'));

            $posts = collect($files)
                ->map(function ($file){
                    $document = \Spatie\YamlFrontMatter\YamlFrontMatter::parseFile($file);

                    return new Post($document->title, $document->body(), $document->excerpt, $document->date, $document->slug);
                })
                ->sortByDesc('date');

            return $posts;
        });

        /*foreach ($files as $file){
               $document = \Spatie\YamlFrontMatter\YamlFrontMatter::parseFile($file);
               $posts[] = new Post($document->title, $document->body(), $document->excerpt, $document->date, $document->slug);
           }*/

    }
}

/*$posts = File::files(resource_path("posts"));

$models = array_map(function($post){
    return $post->getContents();
}, $posts);

return $models;*/
