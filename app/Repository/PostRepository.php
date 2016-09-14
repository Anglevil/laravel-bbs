<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/14
 * Time: 9:56
 */

namespace App\Repository;


use App\Models\Post;

class PostRepository
{
    protected $post;
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

}