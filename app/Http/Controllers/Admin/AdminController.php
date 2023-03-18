<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\AdminFormRequest;
use Illuminate\Contracts\Session\Session;
use Illuminate\Validation\Rules\Password;

class AdminController extends Controller
{
    public function indexadmin()
    {
        return view('admin.admin.indexadmin');
    }

    public function loginform()
    {
        return view('admin.admin.login');
    }

    public function login(Request $credentials)
    {
        $credentials->validate([
            'email' => 'required|email',
            'password' => ['required', Password::min(8)->mixedCase()->letters()->symbols()->uncompromised()],
        ]);

        $userInfo = Admin::where('email', '=', $credentials->email)->first();

        if (!$userInfo) {
            return back()->with('fail', "You don't have an account! please register first");
        } else {
            
            if (sha1($credentials->password) == $userInfo->password) {
                $credentials->session()->put('admin', $userInfo->id);
                $credentials->session()->put('adminname', $userInfo->name);
                $credentials->session()->put('adminimage', $userInfo->image);
                return redirect()->route('admindashboard');
            } else {
                return back()->with('fail', 'Wrong password');
            }
        }
    }

    public function newadmin()
    {
        return view('admin.admin.addadmin');
    }

    public function register(AdminFormRequest $request)
    {

        $admindata =$request->validated();

        $admin = new Admin();

        $admin->name = $admindata['name'];
        $admin->email = $admindata['email'];
        $admin->contact_no = $admindata['contact_no'];
        $admin->gender = $admindata['gender'];
        $admin->dob = $admindata['dob'];
        $admin->address = $admindata['address'];
        $admin->password = sha1($admindata['password']);
        if (File::exists('uploads/profile/default.jpg')) {
            $avtar = 'uploads/profile/admin/' . time() . '.jpg';
            copy('uploads/profile/default.jpg', $avtar);
            $admin->image = $avtar;
        }
        $save = $admin->save();

        if ($save) {
            return redirect('admin/admins')->with('success', 'New admin added successfuly');
        } else {
            return back()->with('fail', 'Somthing went wrong, please try again');
        }
    }

    public function logout()
    {
        if (session()->has('admin')) {
            session()->pull('admin');
            session()->pull('adminname');
            session()->pull('adminimage');
            return redirect('/')->with('success', 'Logged out successfuly');
        }
    }

    public function edit(Admin $admin)
    {
        return view('admin.admin.edit', compact('admin'));
    }

    public function update(Request $request, $admin)
    {

            $request->validate([
            'name' => [
                'required'
            ],
            'email' => [
                'required',
                'email'
            ],
            'image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png'
            ],
            'contact_no' => [
                'required',
                'numeric',
                'digits:11'                
            ],
            'gender' => [
                'required'
            ],
            'dob' => [
                'required'
            ],
            'address' => [
                'required'
            ],
            'password' => [
                'nullable',
                 Password::min(8)->mixedCase()->letters()->symbols()->uncompromised(),
                'confirmed'
            ],
        ]);

        $admin = Admin::findOrfail($admin);

        $admin->name = $request['name'];
        $admin->email = $request['email'];

        if ($request->hasFile('image')) {
            $uploadpath = 'uploads/profile/admin/';
            if (File::exists($admin->image)) {
                File::delete($admin->image);
            }
            $image = $request->file('image');
            $imageext = $image->getClientOriginalExtension();
            $imagename = time() . '.' . $imageext;
            $image->move($uploadpath, $imagename);
            $imagepathname = $uploadpath . $imagename;
            $admin->image = $imagepathname;
        } else {
           
        }

        $admin->contact_no = $request['contact_no'];
        $admin->gender = $request['gender'];
        $admin->dob = $request['dob'];
        $admin->address = $request['address'];
        
        if(is_null($request['password'])){

        } else {
            $admin->password = sha1($request['password']);
        }

        $update = $admin->update();

        if ($update) {
            if (session()->has('admin')) {
                $userInfo = Admin::where('id', '=', session()->get('admin'))->first();
                session()->put('adminname', $userInfo->name);
                session()->put('adminimage', $userInfo->image);
            }
            return redirect()->route('adminindex')->with('success', 'Admin updated successfully');
        } else {
            return back()->with('fail', 'Somthing went wrong, please try again');
        }

    }
    
}