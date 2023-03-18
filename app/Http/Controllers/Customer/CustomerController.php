<?php

namespace App\Http\Controllers\Customer;

use App\Models\Order;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rules\Password;
use App\Http\Requests\CustomerFormRequest;

class CustomerController extends Controller
{
    public function indexcustomer()
    {
        return view('admin.customer.indexcustomer');
    }

    public function loginform()
    {
        return view('customer.login');
    }

    public function login(Request $credentials)
    {
        $credentials->validate([
            'email' => 'required|email',
            'password' => ['required', Password::min(8)->mixedCase()->letters()->symbols()->uncompromised()],
        ]);

        $userInfo = Customer::where('email', '=', $credentials->email)->first();

        if (!$userInfo) {
            return back()->with('fail', "You don't have an account! please register first");
        } else {
            
            if (sha1($credentials->password) == $userInfo->password) {
                $credentials->session()->put('customer', $userInfo->id);
                $credentials->session()->put('customername', $userInfo->name);
                $credentials->session()->put('customerimage', $userInfo->image);
                return redirect('/');
            } else {
                return back()->with('fail', 'Wrong password');
            }
        }
    }

    
    public function newcustomer()
    {
        return view('admin.customer.addcustomer');
    }
    
    public function dashboard()
    {
        $totalorders = Order::where('user_id', session()->get('customer'))->count();
        $receivedorders = Order::where([['user_id', session()->get('customer')],['delivery_status', 'Received']])->count();
        $confirmedorders = Order::where([['user_id', session()->get('customer')],['status', 'confirmed'],['delivery_status', 'in progress'],])->count();
        $pendingorders = Order::where([['user_id', session()->get('customer')],['status', 'pending']])->count();
        return view('customer.dashboard', compact('totalorders', 'receivedorders', 'confirmedorders', 'pendingorders'));
    }
    
    public function signup()
    {
        return view('customer.signup');
    }

    public function register(CustomerFormRequest $request)
    {
        $userdata = $request->validated();

        $customer = new Customer();

        $customer->name = $userdata['name'];
        $customer->email = $userdata['email'];
        $customer->contact_no = $userdata['contact_no'];
        $customer->gender = $userdata['gender'];
        $customer->dob = $userdata['dob'];
        $customer->address = $userdata['address'];
        $customer->password = sha1($userdata['password']);
        if (File::exists('uploads/profile/default.jpg')) {
            $avtar = 'uploads/profile/customer/' . time() . '.jpg';
            copy('uploads/profile/default.jpg', $avtar);
            $customer->image = $avtar;
        }
        $save = $customer->save();

        if ($save) {
            return redirect('customer/login')->with('success', 'Registered successfuly! Login Now');
        } else {
            return back()->with('fail', 'Somthing went wrong, please try again');
        }
    }

    public function addcustomer(CustomerFormRequest $request)
    {
        $userdata = $request->validated();

        $customer = new Customer();

        $customer->name = $userdata['name'];
        $customer->email = $userdata['email'];
        $customer->contact_no = $userdata['contact_no'];
        $customer->gender = $userdata['gender'];
        $customer->dob = $userdata['dob'];
        $customer->address = $userdata['address'];
        $customer->password = sha1($userdata['password']);
        if (File::exists('uploads/profile/default.jpg')) {
            $avtar = 'uploads/profile/customer/' . time() . '.jpg';
            copy('uploads/profile/default.jpg', $avtar);
            $customer->image = $avtar;
        }
        $save = $customer->save();
        if ($save) {
            return redirect('admin/customers')->with('success', 'Customer added successfuly!');
        } else {
            return back()->with('fail', 'Somthing went wrong, please try again');
        }
    }

    public function logout()
    {
        if (session()->has('customer')) {
            session()->pull('customer');
            session()->pull('customername');
            session()->pull('customerimage');
            return redirect('/')->with('success', 'Logged out successfuly');
        }
    }
    
    public function profile()
    {
        if (session()->has('customer')) {
            $customer = Customer::where('id', '=', session()->get('customer'))->first();
        }

        return view('customer.profile',['customer'=> $customer]);
    }

    public function edit(Customer $customer)
    {
        return view('admin.customer.edit', compact('customer'));
    }

    public function update(Request $request, $customer)
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

        $customer = Customer::findOrfail($customer);

        $customer->name = $request['name'];
        $customer->email = $request['email'];

        if ($request->hasFile('image')) {
            $uploadpath = 'uploads/profile/customer/';
            if (File::exists($customer->image)) {
                File::delete($customer->image);
            }
            $image = $request->file('image');
            $imageext = $image->getClientOriginalExtension();
            $imagename = time() . '.' . $imageext;
            $image->move($uploadpath, $imagename);
            $imagepathname = $uploadpath . $imagename;
            $customer->image = $imagepathname;
        } else {
            $customer->image = $request['oldimage'];
        }

        $customer->contact_no = $request['contact_no'];
        $customer->gender = $request['gender'];
        $customer->dob = $request['dob'];
        $customer->address = $request['address'];
        
        if(is_null($request['password'])){

        } else {
            $customer->password = sha1($request['password']);
        }

        $update = $customer->update();

        if ($update) {
            if (session()->has('customer')) {
                $userInfo = Customer::where('id', '=', session()->get('customer'))->first();
                session()->put('customername', $userInfo->name);
                session()->put('customerimage', $userInfo->image);
            }
            return redirect()->back()->with('success', 'Customer updated successfully');
        } else {
            return back()->with('fail', 'Somthing went wrong, please try again');
        }
    }

    public function deleteprofile($id)
    {
        $customer = Customer::find($id);
        if(File::exists($customer->image)){
            File::delete($customer->image);
        }
        $customer->delete();
        session()->pull('customer');
        session()->pull('customername');
        session()->pull('customerimage');
        return redirect('/')->with('success','Your account has been deleted successfully!');
        $this->dispatchBrowserEvent('close-modal');
    }

}
