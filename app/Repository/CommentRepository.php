<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/14
 * Time: 10:12
 */

namespace App\Repository;


use App\Models\Comment;

class CommentRepository
{

    protected $comment;
    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }
}