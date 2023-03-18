<?php

namespace App\Http\Controllers\Admin;

use App\Models\Settings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class SettingController extends Controller
{
    public function setting()
    {
        return view('admin.admin.settings');
    }

    public function updategeneral(Request $request, $id)
    {
        $request->validate([
            'app_name' => 'string|nullable',
            'logo' => 'image|nullable',
            'logo_mini' => 'image|nullable',
            'favicon' => 'image|nullable',
            'inbduget_price' => 'integer|nullable',
        ]);

        $general = Settings::findOrfail($id);

        if ($general) {

            if (!is_null($request->app_name)) {
                $general->app_name = $request['app_name'];
                session()->flash('success','Name updated successfully!');
            }

            if (!is_null($request->logo)) {
                if ($request->hasFile('logo')) {
                    if (File::exists($general->logo)) {
                        File::delete($general->logo);
                    }
                    $uploadpath = 'uploads/settings/';
                    $logo = $request->file('logo');
                    $logoname = time() . '.' . $logo->getClientOriginalExtension();
                    $logo->move($uploadpath, $logoname);
                    $logopathname = $uploadpath . $logoname;
                    $general->logo = $logopathname;
                }
                
                session()->flash('success','Logo updated successfully!');
            }

            if (!is_null($request->logo_mini)) {
                if ($request->hasFile('logo_mini')) {
                    if (File::exists($general->logo_mini)) {
                        File::delete($general->logo_mini);
                    }
                    $uploadpath = 'uploads/settings/';
                    $logo_mini = $request->file('logo_mini');
                    $logo_mininame = time() . '.' . $logo_mini->getClientOriginalExtension();
                    $logo_mini->move($uploadpath, $logo_mininame);
                    $logo_minipathname = $uploadpath . $logo_mininame;
                    $general->logo_mini = $logo_minipathname;
                }

                session()->flash('success','Mini logo updated successfully!');
            }

            if (!is_null($request->favicon)) {
                if ($request->hasFile('favicon')) {
                    if (File::exists($general->favicon)) {
                        File::delete($general->favicon);
                    }
                    $uploadpath = 'uploads/settings/';
                    $favicon = $request->file('favicon');
                    $faviconname = time() . '.' . $favicon->getClientOriginalExtension();
                    $favicon->move($uploadpath, $faviconname);
                    $faviconpathname = $uploadpath . $faviconname;
                    $general->favicon = $faviconpathname;
                }
                
                session()->flash('success','Favicon updated successfully!');
            }

            if (!is_null($request->inbudget_price)) {
                $general->inbudget_price = $request['inbudget_price'];
                session()->flash('success','Inbudget Price updated successfully!');
            }

            $update = $general->update();
            if ($update) {
                if (Session::has('success')) {
                    return redirect()->route('settings');
                }else {
                    return redirect()->route('settings')->with('warning', 'Nothing changed.');
                }
            } else {
                return redirect()->route('settings')->with('fail', 'Something went wrong! Try again.');
            }
        }

    }

    public function updatesocial(Request $request, $id)
    {
        $request->validate([
            'facebook' => 'url|nullable',
            'twitter' => 'url|nullable',
            'youtube' => 'url|nullable',
            'instagram' => 'url|nullable',
            'whatsapp' => 'url|nullable',
            'google_map' => 'url|nullable',
        ]);

        $social = Settings::findOrfail($id);
        if ($social) {

            if (!is_null($request->facebook)) {
                $social->facebook = $request['facebook'];
                session()->flash('success','Facebook updated successfully!');
            }

            if (!is_null($request->twitter)) {
                $social->twitter = $request['twitter'];
                session()->flash('success','Twitter updated successfully!');
            }

            if (!is_null($request->youtube)) {
                $social->youtube = $request['youtube'];
                session()->flash('success','YouTube updated successfully!');
            }

            if (!is_null($request->instagram)) {
                $social->instagram = $request['instagram'];
                session()->flash('success','Instagram updated successfully!');
            }

            if (!is_null($request->whatsapp)) {
                $social->whatsapp = $request['whatsapp'];
                session()->flash('success','WhatsApp updated successfully!');
            }

            if (!is_null($request->google_map)) {
                $social->google_map = $request['google_map'];
                session()->flash('success','Google Map updated successfully!');
            }


            $update = $social->update();
            if ($update) {
                if (Session::has('success')) {
                    return redirect()->route('settings');
                }else {
                    return redirect()->route('settings')->with('warning', 'Nothing changed.');
                }
            } else {
                return redirect()->route('settings')->with('fail', 'Something went wrong! Try again.');
            }
        }

    }

    public function updateloginimages(Request $request, $id)
    {
        $request->validate([
            'admin_login_image' => 'image|nullable',
            'customer_login_image' => 'image|nullable',
        ]);

        $loginimages = Settings::findOrfail($id);

        if ($loginimages) {

            if (!is_null($request->admin_login_image)) {
                if ($request->hasFile('admin_login_image')) {
                    if (File::exists($loginimages->admin_login_image)) {
                        File::delete($loginimages->admin_login_image);
                    }
                    $uploadpath = 'uploads/settings/';
                    $admin_login_image = $request->file('admin_login_image');
                    $admin_login_imagename = time() . '.' . $admin_login_image->getClientOriginalExtension();
                    $admin_login_image->move($uploadpath, $admin_login_imagename);
                    $admin_login_imagepathname = $uploadpath . $admin_login_imagename;
                    $loginimages->admin_login_image = $admin_login_imagepathname;
                }
                
                session()->flash('success','Admin Login Image updated successfully!');
            }

            if (!is_null($request->customer_login_image)) {
                if ($request->hasFile('customer_login_image')) {
                    if (File::exists($loginimages->customer_login_image)) {
                        File::delete($loginimages->customer_login_image);
                    }
                    $uploadpath = 'uploads/settings/';
                    $customer_login_image = $request->file('customer_login_image');
                    $customer_login_imagename = time() . '.' . $customer_login_image->getClientOriginalExtension();
                    $customer_login_image->move($uploadpath, $customer_login_imagename);
                    $customer_login_imagepathname = $uploadpath . $customer_login_imagename;
                    $loginimages->customer_login_image = $customer_login_imagepathname;
                }

                session()->flash('success','Customer Login Image updated successfully!');
            }

            $update = $loginimages->update();
            if ($update) {
                if (Session::has('success')) {
                    return redirect()->route('settings');
                }else {
                    return redirect()->route('settings')->with('warning', 'Nothing changed.');
                }
            } else {
                return redirect()->route('settings')->with('fail', 'Something went wrong! Try again.');
            }
        }

    }

    public function updatecontactus(Request $request, $id)
    {
        $request->validate([
            'contact_us_title' => 'string|nullable',
            'contact_us_msg' => 'string|nullable',
        ]);

        $contactus = Settings::findOrfail($id);
        if ($contactus) {

            if (!is_null($request->contact_us_title)) {
                $contactus->contact_us_title = $request['contact_us_title'];
                session()->flash('success','Contact Us Title updated successfully!');
            }

            if (!is_null($request->contact_us_msg)) {
                $contactus->contact_us_msg = $request['contact_us_msg'];
                session()->flash('success','Contact Us Message updated successfully!');
            }

            $update = $contactus->update();
            if ($update) {
                if (Session::has('success')) {
                    return redirect()->route('settings');
                }else {
                    return redirect()->route('settings')->with('warning', 'Nothing changed.');
                }
            } else {
                return redirect()->route('settings')->with('fail', 'Something went wrong! Try again.');
            }
        }

    }
    
    public function updateaboutus(Request $request, $id)
    {
        $request->validate([
            'about_image' => 'image|nullable',
            'about_us' => 'string|nullable',
        ]);

        $aboutus = Settings::findOrfail($id);

        if ($aboutus) {

            if (!is_null($request->about_image)) {
                if ($request->hasFile('about_image')) {
                    if (File::exists($aboutus->about_image)) {
                        File::delete($aboutus->about_image);
                    }
                    $uploadpath = 'uploads/settings/';
                    $about_image = $request->file('about_image');
                    $about_imagename = time() . '.' . $about_image->getClientOriginalExtension();
                    $about_image->move($uploadpath, $about_imagename);
                    $about_imagepathname = $uploadpath . $about_imagename;
                    $aboutus->about_image = $about_imagepathname;
                }
                
                session()->flash('success','About Us Image updated successfully!');
            }

            
            if (!is_null($request->about_us)) {
                $aboutus->about_us = $request['about_us'];
                session()->flash('success','About Us updated successfully!');
            }

            $update = $aboutus->update();
            if ($update) {
                if (Session::has('success')) {
                    return redirect()->route('settings');
                }else {
                    return redirect()->route('settings')->with('warning', 'Nothing changed.');
                }
            } else {
                return redirect()->route('settings')->with('fail', 'Something went wrong! Try again.');
            }
        }

    }

    public function updateprivacy(Request $request, $id)
    {
        $request->validate([
            'privacy_image' => 'image|nullable',
            'privacy_title' => 'string|nullable',
            'privacy_policy' => 'string|nullable',
        ]);

        $privacy = Settings::findOrfail($id);

        if ($privacy) {

            if (!is_null($request->privacy_image)) {
                if ($request->hasFile('privacy_image')) {
                    if (File::exists($privacy->privacy_image)) {
                        File::delete($privacy->privacy_image);
                    }
                    $uploadpath = 'uploads/settings/';
                    $privacy_image = $request->file('privacy_image');
                    $privacy_imagename = time() . '.' . $privacy_image->getClientOriginalExtension();
                    $privacy_image->move($uploadpath, $privacy_imagename);
                    $privacy_imagepathname = $uploadpath . $privacy_imagename;
                    $privacy->privacy_image = $privacy_imagepathname;
                }
                
                session()->flash('success','Privacy Policy Image updated successfully!');
            }

            if (!is_null($request->privacy_title)) {
                $privacy->privacy_title = $request['privacy_title'];
                session()->flash('success','Privacy Policy Title updated successfully!');
            }
            
            if (!is_null($request->privacy_policy)) {
                $privacy->privacy_policy = $request['privacy_policy'];
                session()->flash('success','Privacy Policy Statement updated successfully!');
            }

            $update = $privacy->update();
            if ($update) {
                if (Session::has('success')) {
                    return redirect()->route('settings');
                }else {
                    return redirect()->route('settings')->with('warning', 'Nothing changed.');
                }
            } else {
                return redirect()->route('settings')->with('fail', 'Something went wrong! Try again.');
            }
        }

    }
}
