<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home',["title" => "Home"]);
});

Route::get('/about', function () {
    return view('about',[
    "title" => "About",   
    "name" => "Muhammad Drajat",
    "email" => "drajat053@ummi.ac.id",
    "image" => "drajat.png" 
    ]);
});

Route::get('/blog', function () {
      $blog_post = [
    [
    "title" => "My First Blog Post",
    "slug" => "judul-post-pertama",
    "author" => "Drajat",
    
    "body" => "Lorem ipsum dolor sit, amet consectetur adipisicing elit. 
    Autem ipsum accusamus rem corrupti dicta reiciendis nihil saepe temporibus. 
    Laudantium illum modi quo voluptatibus labore est minus harum exercitationem error odio!"
    ],
    [
    "title" => "Second Blog Post",
    "slug" => "judul-post-kedua",
    "author" => "Admin",
    
    "body" => "Lorem ipsum dolor sit, amet consectetur adipisicing elit. 
    Autem ipsum accusamus rem corrupti dicta reiciendis nihil saepe temporibus. 
    Laudantium illum modi quo voluptatibus labore est minus harum exercitationem error odio!"
    ],
    [
    "title" => "Third Blog Post",
    "slug" => "judul-post-ketiga",
    "author" => "Admin 2",
    
    "body" => "Lorem ipsum dolor sit, amet consectetur adipisicing elit. 
    Autem ipsum accusamus rem corrupti dicta reiciendis nihil saepe temporibus. 
    Laudantium illum modi quo voluptatibus labore est minus harum exercitationem error odio!"
    ],
];
    return view('posts',[
        "title" => "Blog",
        "posts" => $blog_post
    ]);
});

//halaman single post
Route::get('post/{slug}',function($slug){
    $blog_post = [
    [
    "title" => "My First Blog Post",
    "slug" => "judul-post-pertama",
    "author" => "Drajat",
    
    "body" => "Lorem ipsum dolor sit, amet consectetur adipisicing elit. 
    Autem ipsum accusamus rem corrupti dicta reiciendis nihil saepe temporibus. 
    Laudantium illum modi quo voluptatibus labore est minus harum exercitationem error odio!"
    ],
    [
    "title" => "Second Blog Post",
    "slug" => "judul-post-kedua",
    "author" => "Admin",
    
    "body" => "Lorem ipsum dolor sit, amet consectetur adipisicing elit. 
    Autem ipsum accusamus rem corrupti dicta reiciendis nihil saepe temporibus. 
    Laudantium illum modi quo voluptatibus labore est minus harum exercitationem error odio!"
    ],
    [
    "title" => "Third Blog Post",
    "slug" => "judul-post-ketiga",
    "author" => "Admin 2",
    
    "body" => "Lorem ipsum dolor sit, amet consectetur adipisicing elit. 
    Autem ipsum accusamus rem corrupti dicta reiciendis nihil saepe temporibus. 
    Laudantium illum modi quo voluptatibus labore est minus harum exercitationem error odio!"
    ],
];

    $new_post = [];
    foreach ($blog_post as $post ) {
        if ($post["slug"] === $slug ) {
            $new_post = $post;
        }
    }

    return view('post',[
        "title" => "Single Post",
        "post" => $new_post,
    ]);
});