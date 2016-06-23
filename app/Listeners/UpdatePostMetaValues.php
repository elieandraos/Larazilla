<?php

namespace App\Listeners;

use App\Events\PostIsSaved;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\PostMeta;
use App\Models\Post;
use App\Models\PostTypePanelComponent;
use Request;

class UpdatePostMetaValues
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  PostIsSaved  $event
     * @return void
     */
    public function handle(PostIsSaved $event)
    {
        $post = $event->post;
        $input = $event->input;
        $postTypeMetaKeys = $post->postType->components->lists('meta_key', 'id')->toArray();
         
        if(isset($input['meta']))
        {
            $metas = $input['meta'];
            $this->deleteUnsettedPostMeta($postTypeMetaKeys, $metas, $post);

            foreach($metas as $meta_key => $meta_data)
            {
                $postMeta = $post->getPostMeta($meta_key);
                $component = PostTypePanelComponent::where('meta_key', '=', $meta_key)->where('post_type_id', '=', $post->post_type_id)->first();
                //build the PostMeta model input
                $meta_input = [ 'post_id' => $post->id, 'key' => $meta_key];
                $meta_input = array_merge($meta_input, $this->getMetaInput($meta_key, $meta_data, $component, $input, $post));

                if($postMeta)
                    $postMeta->update($meta_input);
                else
                    PostMeta::create($meta_input);
            }
        }
    }


    /**
     * Build the PostMeta input array based on type input parameter type
     * 
     * @param type $meta_key 
     * @param type $meta_data 
     * @param type $component 
     * @param type $input 
     * @return type
     */
    public function getMetaInput($meta_key, $meta_data, $component, $input, $post)
    {
        $meta_input = [];

        foreach($meta_data as $locale => $meta_value)
        {
            $meta_input['component_id'] = $component->id;

            //DELETE MEDIA FIRST (IF SET)
            if(isset($input['removeMedia'][$meta_key][$locale]))
            {
                $media = $post->getMediaByCustomProperties( [ 'key' => $meta_key, 'locale' => $locale], $component->settings()->get('collection'));
                if($media)
                    $media->delete();
            }

            //UPLOADED FILES
            if(is_object($meta_value) && get_class($meta_value) == "Illuminate\Http\UploadedFile")
            {
                $file = $input['meta'][$meta_key][$locale];
                $tempDirectory = storage_path('temp');
                $fileName = $file->getClientOriginalName();
                $file->move($tempDirectory, $fileName);
                
                $media = $post->addMedia($tempDirectory . '/' . $fileName)
                    ->withCustomProperties(['key' => $meta_key, 'locale' => $locale])
                    ->toCollection($component->settings()->get('collection'));
   
                $meta_input[$locale] = ['value' => $component->settings()->get('collection')];   
            }
            //DROPZONE MULTIPLE UPLOAD
            elseif(is_array($meta_value) && in_array('dz_file', array_keys($meta_value)))
            {
                foreach($meta_value['dz_file'] as $key => $file_path)
                {
                    if(trim($file_path))
                    {
                        $order = $meta_value['dz_order'][$key];
                        $media = $post->addMedia($file_path)
                                    ->withCustomProperties(['key' => $meta_key, 'locale' => $locale, 'order' => $order])
                                    ->toCollection($component->settings()->get('collection'));
                    }
                }
                $meta_input[$locale] = ['value' => $component->settings()->get('collection')];
            }
            //CHECKBOXES/RADIOS ARRAY VALUES
            elseif(is_array($meta_value))
            {
                $av = array_values($meta_value);
                $new_meta_value = json_encode($av[0]);
                $meta_input[$locale] = [ "value" => $new_meta_value];
            }
            //NORMAL INPUTS
            elseif($meta_value)
            {
                $meta_input[$locale] = [ "value" => $meta_value];
            }
        }
        return $meta_input;
    }



    /**
     * Delete the post meta if not present in the post params 
     * case of unsetting checkboxes
     * 
     * @param type $postTypeMetaKeys 
     * @param type $submittedMetas 
     * @param type $post 
     * @return type
     */
    public function deleteUnsettedPostMeta($postTypeMetaKeys, $metas, $post)
    {
        $submittedMetas = array_keys($metas);
        foreach($postTypeMetaKeys as $meta_key)
        {
            if(!in_array($meta_key, $submittedMetas))
            {
                $postMeta = PostMeta::where('key', '=', $meta_key)->where('post_id', '=', $post->id)->first();
                if($postMeta)
                    $postMeta->delete();
            }
        }
    }


}
