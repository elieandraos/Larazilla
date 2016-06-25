<?php

use Illuminate\Database\Seeder;
use App\Models\PostTypePanelComponentType;

class ComponentTypeTableSeeder extends DatabaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->cleanUp('posts_types_panels_components_types');

		PostTypePanelComponentType::create([
			"name" => "Text",
            "caption" => "HTML text input field",
			"presenter_name" => "Text"
		]);

        PostTypePanelComponentType::create([
            "name" => "Paragrapah",
            "caption" => "HTML textarea input",
            "presenter_name" => "Textarea"
        ]);

        PostTypePanelComponentType::create([
            "name" => "Dropdown",
            "caption" => "HTML select input",
            "presenter_name" => "Dropdown"
        ]);

        PostTypePanelComponentType::create([
            "name" => "Checkbox List",
            "caption" => "HTML checkbox input",
            "presenter_name" => "Checkbox"
        ]);

        PostTypePanelComponentType::create([
            "name" => "Radio List",
            "caption" => "HTML radio input",
            "presenter_name" => "Radio"
        ]);                   

        PostTypePanelComponentType::create([
            "name" => "Single File Upload",
            "caption" => "HTML file input",
            "presenter_name" => "Image"
        ]);

        PostTypePanelComponentType::create([
            "name" => "Multiple File Upload",
            "caption" => "Dropzone Js Multiple File Upload",
            "presenter_name" => "AjaxUploader"
        ]);      
    }

}