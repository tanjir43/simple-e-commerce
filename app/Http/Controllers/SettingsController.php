<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function settings(){
        $setting = Settings::first();
        return view('backend.admin.settings.settings',compact('setting'));
    }

    public function settingsUpdate(Request $request){
        $setting = Settings::first();
        $status= $setting->update([
            'title' => $request->title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
            'logo' => $request->logo,
            'favicon' => $request->favicon,
            'email' => $request->email,
            'footer' => $request->footer,
            'phone' => $request->phone,
            'address' => $request->address,
            'fax' => $request->fax,
            'facebook_url' => $request->facebook_url,
            'twitter_url' => $request->twitter_url,
            'linked_in_url' => $request->linked_in_url,
            'pinterest_url' => $request->pinterest_url,
        ]);
        if ($status){
            return back()->with('success','Settings successfully updated');
        }
    }
    public function smtp(){
        return view('backend.admin.settings.smtp');
    }
    public function smtpUpdate(Request $request){
        foreach ($request->types as $key=>$type){
            $this->overWriteEnvFile($type,$request[$type]);
        }
        return back()->with('success','SMTP configuration updated successfully');
    }

    public function overWriteEnvFile($type,$val){
        $path = base_path('.env');
        if (file_exists($path)){
            $val    =   '"'.trim($val).'"';
            if (is_numeric(strpos(file_get_contents($path),$type))&& strpos(file_get_contents($path),$type)>=0){
                file_put_contents($path,str_replace(
                    $type. '="'.env($type).'"',$type.'='.$val,file_get_contents($path)
                ));
            }
            else{
                file_put_contents($path,file_get_contents($path))."\r\n".$type.'='.$val;
            }
        }
    }

    public function payment(){
        return view('backend.admin.settings.payment');
    }
    public function paypalUpdate(Request $request){
        foreach ($request->types as $key=>$type){
            $this->overWriteEnvFile($type,$request[$type]);
        }
        $settings = Settings::first();
        if ($request->has('paypal_sandbox')){
            $settings->paypal_sandbox=1;
            $settings->save();
        }else{
            $settings->paypal_sandbox=0;
            $settings->save();
        }
        return back()->with('success','Payment settings updated successfully');
    }
}















