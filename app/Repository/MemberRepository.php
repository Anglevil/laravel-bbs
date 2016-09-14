<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/14
 * Time: 9:57
 */

namespace App\Repository;


use App\Models\Member;

class MemberRepository
{

    protected $member;
    public function __construct(Member $member)
    {
        $this->member = $member;
    }

}