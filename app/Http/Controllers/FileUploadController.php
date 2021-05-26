<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Response;
use Image;

class FileUploadController extends Controller
{
    public function imageUpload(Request $request) 
    { 
        $validator = Validator::make($request->all(),[ 
              'file' => 'required|mimes:png,jpeg|max:4096',
        ]);   
  
        if($validator->fails()) {          
             
            return response()->json(['error'=>$validator->errors()], 401);                        
         }  
  
   
        if ($file = $request->file('file')) {

            
            $name = $file->getClientOriginalName();
            $path = 'assets/images/users';

            $image = imagecreatefromjpeg($path);
            
            $file->move($path,$name);

            User::where('id', $request['id'])->update(array('image_path' => $name));
               
            return response()->json([
                "success" => true,
                "message" => "File successfully uploaded",
                "file" => $file
            ]);
   
        }
  
   
    }

    public function getImage($file_name){
        $path = public_path().'/assets/images/users/'.$file_name;
        return Response::download($path);        
    }

    

}
