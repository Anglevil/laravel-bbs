<?php

function navViewActive($anchor)
{
    return Route::currentRouteName() == $anchor ? 'active' : '';
}
//获取图片地址
function getPicture($icon){
    $picture = \App\Models\Picture::where('id',$icon)->first();
    if($picture){
        return '/'.$picture->disk_path.'/'.$picture->disk_name;
    }else{
        return 'https://dn-phphub.qbox.me/uploads/avatars/5741_1473307257.png?imageView2/1/w/100/h/100';
    }
}