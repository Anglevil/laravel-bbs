<?php
namespace Lib\Notification;

use App\Models\Member;

class Mention
{
    public $body_parsed;
    public $members = [];
    public $names;
    public $content;

    public function getMentionedUsername()
    {
        preg_match_all("/(\S*)\@([^\r\n\s]*)/i", $this->content, $atlist_tmp);
        $names = [];
        foreach ($atlist_tmp[2] as $k=>$v) {
            if ($atlist_tmp[1][$k] || strlen($v) >25) {
                continue;
            }
            $names[] = $v;
        }
        return array_unique($names);
    }

    public function replace()
    {
        $this->body_parsed = $this->content;

        foreach ($this->members as $member) {
            $search = '@' . $member->name;
            $place = '<a href="'.route('member.index', $member->id).'">'.$search.'</a>';
            //$place = '['.$search.']('.route('member.index', $member->id).')';
            $this->body_parsed = str_replace($search, $place, $this->body_parsed);
        }
    }

    public function parse($content)
    {
        $this->content = $content;

        $this->names = $this->getMentionedUsername();
        count($this->names) > 0 && $this->members = Member::whereIn('name', $this->names)->get();

        $this->replace();
        return $this->body_parsed;
    }
}
