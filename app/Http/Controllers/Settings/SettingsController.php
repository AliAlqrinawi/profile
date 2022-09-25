<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class SettingsController extends Controller
{

    public function edite_general_settings(Request $request)
    {
        if(Gate::denies('Settings.view')){
            abort(403);
        }
        $settings_general = Setting::get();
        //dd($settings_general);
        return view('settings.edite' , compact('settings_general'));
    }

    public function update_general_settings(Request $request)
    {
        if(Gate::denies('Settings.view')){
            abort(403);
        }
        $settings_general = Setting::where('key_id' , 'about_ar')->first();
        $settings_general->value = $request['about_ar'];
        $settings_general->update();
        $settings_general = Setting::where('key_id' , 'about_en')->first();
        $settings_general->value = $request['about_en'];
        $settings_general->update();
        $settings_general = Setting::where('key_id' , 'phone')->first();
        $settings_general->value = $request['phone'];
        $settings_general->update();
        $settings_general = Setting::where('key_id' , 'Facebook')->first();
        $settings_general->value = $request['Facebook'];
        $settings_general->update();
        $settings_general = Setting::where('key_id' , 'Instagram')->first();
        $settings_general->value = $request['Instagram'];
        $settings_general->update();

        return redirect()->route('edite.setting.general');
    }
}
