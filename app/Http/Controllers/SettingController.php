<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use app\Models\Setting;

class SettingController extends Controller
{
    public function show($id_setting)
    {
        $relations = [
            //
        ];
        $setting = Setting::where('ID_SETTINGS', $id_setting)->with( $relations )->first();
        
        return view('models.setting.show', ['setting' => $setting]);
    }
}
