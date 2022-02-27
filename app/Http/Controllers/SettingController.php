<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Setting;

class SettingController extends Controller
{
    public function show(Request $request)
    {
        $relations = [
            //
        ];
        $setting = Setting::where('ID_SETTINGS', $request->get('id_setting'))->with( $relations )->first();
        
        return view('models.setting.show', ['setting' => $setting]);
    }
}
