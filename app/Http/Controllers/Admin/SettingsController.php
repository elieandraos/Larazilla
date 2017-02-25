<?php

namespace App\Http\Controllers\Admin;

use Flash;
use App\Http\Requests;
use App\Models\Settings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingsController extends Controller
{
	public function __construct()
    {
        //set the breadcrumbs
        $breadcrumb = [ 'links' => [], 'title' => 'Settings', 'bg_icon' => 'fa fa-cubes'];
        array_push($breadcrumb['links'], ['url' => route('admin.settings'), 'title' => 'Settings']);
        $this->breadcrumb = $breadcrumb;
    }

    public function index()
    {
    	$settings = Settings::first();
    	return view('admin.settings.index', ['settings' => $settings,'breadcrumb' => $this->breadcrumb]);
    }

    public function update(Request $request, $settingsId)
    {
    	$settings = Settings::find($settingsId);
    	$multilang = $request->get('multilang');
    	$settings->update([
    		'multilang' => $multilang
    	]);

    	Flash::success('Setting was updated successfully.');
    	return redirect( route('admin.settings'));
    }
}
