<?php

namespace App\Http\Controllers\Member;

use App\Models\Member;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EditController extends Controller
{

    public function edit(){
        return view('member.edit.edit');
    }
    public function edit_store(Request $request){
        $this->validate($request, [
            'name' => 'required|max:50',
        ]);
        $data = $request->input();
        unset($data['_token']);
        $member = Member::where('id',Auth::id())->firstOrFail();
        foreach ($data as $k=>$v){
            $member->$k = $v;
        }
        $member->save();
        return redirect('/member/edit')->withSuccess("修改成功");
    }
    public function edit_avatar(){
        return view('member.edit.edit_avatar');
    }
    public function edit_avatar_store(Request $request){
        $file = $request->file('avatar');
        $avatar = app('Lib\Handler\UploadHandler')->uploadAvatar($file);
        if(isset($avatar['id'])){
            $member = Member::where('id',Auth::id())->firstOrFail();
            $member->avatar = $avatar['id'];
            $member->save();
        }
        return redirect('/member/edit_avatar')->withSuccess("修改成功");
    }

    public function edit_password(){
        return view('member.edit.edit_password');
    }

    public function edit_binding(){
        return view('member.edit.edit_binding');
    }
}
