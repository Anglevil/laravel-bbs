<?php
namespace Lib\Handler;

use App\Models\Picture;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use League\Flysystem\Exception;

class UploadHandler{

    protected $allow_ext = ['image/png','image/jpeg','image/gif','image/jpg'];
    protected $file;
    protected $ext;

    /**
     * @param $file
     * @return array
     */
    public function uploadAvatar($file){
        $this->file = $file;
        $this->checkExt();
        $upload = $this->upload('avatar');
        return $upload;
    }

    /**
     * @param $file
     * @return array
     */
    public function uploadImage($file){
        $this->file = $file;
        $this->checkExt();
        $upload = $this->upload('post');
        return $upload;
    }
    /**
     * @throws Exception
     */
    protected function checkExt(){
        $ext = strtolower($this->file->getMimeType());
        if(!$ext || !in_array($ext,$this->allow_ext)){
            throw new Exception('upload with extensions error');
        }
        $this->ext = explode('.',$this->file->getClientOriginalName())[1];
    }

    /**
     * @param $field
     * @param string $filename
     * @param string $path
     * @return array
     */
    protected function upload($field,$filename='',$path=''){

        $local_name = $this->file->getClientOriginalName();
        $filename = $filename?$filename:md5_file($this->file->getRealPath()).'.'.$this->ext;
        $path = $path?$path:'Uploads/'.date('Y').'/'.date('m').'/'.date('d');

        $upload = $this->file->move($path,$filename);

        $picture = new Picture();
        $picture->member_id = Auth::id();
        $picture->disk_name = $upload->getFilename();
        $picture->disk_path = $upload->getPath();
        $picture->file_size = $upload->getSize();
        $picture->file_type = $upload->getMimeType();
        $picture->local_name = $local_name;
        $picture->created_at = Carbon::now()->toDateTimeString();
        $picture->updated_at = Carbon::now()->toDateTimeString();
        $picture->field = $field?$field:'other';
        $res = $picture->save();

        if($res){
            return $picture->toArray();
        }else{
            return [];
        }

    }
}