<?php

namespace App\Http\Controllers\Common;

use App\Models\Picture;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PictureController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['except' => ['get']]);
    }
    /**
     * @param Request $request
     * @return array
     */
    public function upload(Request $request){
        $file = $request->file('file');
        $field = $request->get('field');
        if(!$file->isValid()){
            return $this->ajaxReturn(-1,'未知错误');
        }

        $allow_ext = ['image/png','image/jpeg','image/gif','image/jpg'];
        //判断格式是否正常
        if(!in_array($file->getMimeType(),$allow_ext)){
            return $this->ajaxReturn(-2,'格式不被允许');
        }
        $ext = explode('.',$file->getClientOriginalName())[1];
        $local_name = $file->getClientOriginalName();
        //判断格式
        $path = 'Uploads/'.date('Y').'/'.date('m').'/'.date('d');
        $filename = md5_file($file->getRealPath()).'.'.$ext;
        $upload = $file->move($path,$filename);

        $picture = new Picture();
        $picture->member_id = Auth::id();
        $picture->disk_name = $upload->getFilename();
        $picture->disk_path = $upload->getPath();
        $picture->file_size = $upload->getSize();
        $picture->file_type = $upload->getMimeType();
        $picture->local_name = $local_name;
        $picture->created_at = Carbon::now()->toDateTimeString();
        $picture->updated_at = Carbon::now()->toDateTimeString();
        $picture->field = $field?$field:'';
        $res = $picture->save();

        if($res){
            return $this->ajaxReturn(1,'上传成功',$picture->toArray());
        }else{
            return $this->ajaxReturn(0,'上传失败');
        }

    }

    /**
     *
     */
    public function get($id){

    }

    /**
     * @param int $status
     * @param string $msg
     * @param array $data
     * @return array
     */
    protected  function ajaxReturn($status=1,$msg="SUCCESS",$data=[]){

        return ['status'=>$status,'msg'=>$msg,'data'=>$data];
    }
}
