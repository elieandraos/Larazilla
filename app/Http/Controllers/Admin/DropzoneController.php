<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Response;
use Spatie\MediaLibrary\Media;

class DropzoneController extends Controller
{

    /**
     * Upload a file when added to the dropzone 
     * 
     * @param Request $request 
     * @return type
     */
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


    /**
     * Delete a media file from the media library
     * 
     * @param Request $request 
     * @return type
     */
    public function delete(Request $request)
    {
        $input = $request->all();
        $media = Media::find($input['id']);
        
        if($media)
        {
            $media->delete();
            return Response::json(['success' => true], 200);
        }
        else
        {
            return Response::json(['success' => false, 'error' => 'Media not found.'], 200);
        }
    }
}
