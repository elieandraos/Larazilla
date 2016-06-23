<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Response;

class DropzoneController extends Controller
{
    public function upload(Request $request)
    {
    	$input = $request->all();
    	$file = $input['file'];
    
        if($file) 
        {
            $destinationPath = storage_path('temp/');
            $filename =  str_random(16) . "_" . $file->getClientOriginalName();
            $upload_success = $file->move($destinationPath, $filename);

            if ($upload_success) 
                return Response::json(['message'=>'success','filename'=>$destinationPath.$filename], 200);
            else 
                return Response::json('Server Error', 400);
        }

        return Response::json('Server Error', 400);
    }
}
