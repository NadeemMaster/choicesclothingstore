<!-- Admin Dashboard -->
@extends('admin.main')

@push('title')
    Settings
@endpush

@section('main-section')
    <div>
        <div class="row">
            <div class="col-md-12 ">
                @include('inc.fail')
                @include('inc.success')
                @include('inc.warning')
                <div class="card">
                    <div class="card-header">
                        <h3>Settings
                            <a href="{{ Route('admindashboard') }}" class="btn btn-primary  float-end text-white">Back</a>
                        </h3>
                    </div>
                    <div class="card-body">

                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="gsetting-tab" data-bs-toggle="tab"
                                    data-bs-target="#gsetting-tab-pane" type="button" role="tab"
                                    aria-controls="gsetting-tab-pane" aria-selected="true">General</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="social-tab" data-bs-toggle="tab"
                                    data-bs-target="#social-tab-pane" type="button" role="tab"
                                    aria-controls="social-tab-pane" aria-selected="false">Social</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="login-tab" data-bs-toggle="tab"
                                    data-bs-target="#login-tab-pane" type="button" role="tab"
                                    aria-controls="login-tab-pane" aria-selected="false">Login</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="contactus-tab" data-bs-toggle="tab"
                                    data-bs-target="#contactus-tab-pane" type="button" role="tab"
                                    aria-controls="contactus-tab-pane" aria-selected="false">Contact Us</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="aboutus-tab" data-bs-toggle="tab"
                                    data-bs-target="#aboutus-tab-pane" type="button" role="tab"
                                    aria-controls="aboutus-tab-pane" aria-selected="false">About Us</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="privacy-tab" data-bs-toggle="tab"
                                    data-bs-target="#privacy-tab-pane" type="button" role="tab"
                                    aria-controls="privacy-tab-pane" aria-selected="false">Privacy Policy</button>
                            </li>
                        </ul>

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="gsetting-tab-pane" role="tabpanel"
                                aria-labelledby="gsetting-tab" tabindex="0">

                                <form action="{{ route('updategeneral', ['id' => $setting->id]) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="row">

                                        <div class="col-md-12 mt-4">
                                            <label>Site Name</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="app_name" class="form-control mt-1"
                                                value="{{ old('app_name') }}">
                                            <span class="text-danger">
                                                @error('app_name')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="col-md-6 align-self-center">
                                            {{ $setting->app_name }}
                                        </div>

                                        <div class="col-md-12 mt-4">
                                            <label>Logo <small class="text-danger">(Width = 120px, Height =
                                                    40px)</small></label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="file" name="logo" class="form-control mt-2">
                                            <span class="text-danger">
                                                @error('logo')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="col-md-6 align-self-center">
                                            <img src="{{ asset($setting->logo) }}" width="120px" height="40px" />
                                        </div>

                                        <div class="col-md-12 mt-4">
                                            <label>Mini Logo <small class="text-danger">(Width = 40px, Height =
                                                    30px)</small></label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="file" name="logo_mini" class="form-control mt-2">
                                            <span class="text-danger">
                                                @error('logo_mini')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="col-md-6 align-self-center">
                                            <img src="{{ asset($setting->logo_mini) }}" width="40px" height="30px" />
                                        </div>

                                        <div class="col-md-12 mt-4">
                                            <label>Favicon <small class="text-danger">(Width = 40px, Height =
                                                    40px)</small></label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="file" name="favicon" class="form-control mt-2">
                                            <span class="text-danger">
                                                @error('favicon')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="col-md-6 align-self-center">
                                            <img src="{{ asset($setting->favicon) }}" width="40px" height="40px" />
                                        </div>

                                        <div class="col-md-12 mt-4">
                                            <label>Inbudget Price setting</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="inbudget_price" class="form-control mt-1"
                                                value="{{ old('inbudget_price') }}">
                                            <span class="text-danger">
                                                @error('inbudget_price')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="col-md-6 align-self-center">
                                            {{ $setting->inbudget_price }}
                                        </div>

                                        <div class="col-md-6 mt-3">
                                            <button type="submit" class="btn btn-primary text-white float-end">Save
                                                Changes</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="tab-pane fade" id="social-tab-pane" role="tabpanel" aria-labelledby="social-tab"
                                tabindex="0">

                                <form action="{{ route('updatesocial', ['id' => $setting->id]) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="row">

                                        <div class="col-md-12 mt-4">
                                            <label>Facebook <small class="text-danger">( https://www.facebook.com/xxxxxxx
                                                    )</small></label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="facebook" class="form-control mt-2"
                                                value="{{ old('facebook') }}">
                                            <span class="text-danger">
                                                @error('facebook')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="col-md-6 align-self-center">
                                            {{ $setting->facebook }}
                                        </div>

                                        <div class="col-md-12 mt-4">
                                            <label>Twitter <small class="text-danger">( https://twitter.com/xxxxxxx
                                                    )</small></label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="twitter" class="form-control mt-2"
                                                value="{{ old('twitter') }}">
                                            <span class="text-danger">
                                                @error('twitter')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="col-md-6 align-self-center">
                                            {{ $setting->twitter }}
                                        </div>

                                        <div class="col-md-12 mt-4">
                                            <label>YouTube <small class="text-danger">( https://www.youtube.com/xxxxxxx
                                                    )</small></label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="youtube" class="form-control mt-2"
                                                value="{{ old('youtube') }}">
                                            <span class="text-danger">
                                                @error('youtube')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="col-md-6 align-self-center">
                                            {{ $setting->youtube }}
                                        </div>

                                        <div class="col-md-12 mt-4">
                                            <label>Instagram <small class="text-danger">( https://www.instagram.com/xxxxxxx
                                                    )</small></label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="instagram" class="form-control mt-2"
                                                value="{{ old('instagram') }}">
                                            <span class="text-danger">
                                                @error('instagram')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="col-md-6 align-self-center">
                                            {{ $setting->instagram }}
                                        </div>

                                        <div class="col-md-12 mt-4">
                                            <label>WhatsApp <small class="text-danger">( https://wa.me/message/xxxxxxx
                                                    )</small></label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="whatsapp" class="form-control mt-2"
                                                value="{{ old('whatsapp') }}">
                                            <span class="text-danger">
                                                @error('whatsapp')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="col-md-6 align-self-center">
                                            {{ $setting->whatsapp }}
                                        </div>

                                        <div class="col-md-12 mt-4">
                                            <label>Google Map <small class="text-danger">(
                                                    https://www.google.com/maps/embed?pb=!xxxxxxx )</small></label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="google_map" class="form-control mt-2"
                                                value="{{ old('google_map') }}">
                                            <span class="text-danger">
                                                @error('google_map')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="col-md-6 align-self-center">
                                            {{ $setting->google_map }}
                                        </div>

                                        <div class="col-md-6 mt-3">
                                            <button type="submit" class="btn btn-primary text-white float-end">Save
                                                Changes</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="tab-pane fade" id="login-tab-pane" role="tabpanel" aria-labelledby="login-tab"
                                tabindex="0">

                                <form action="{{ route('updateloginimages', ['id' => $setting->id]) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                <div class="row">

                                    <div class="col-md-12 mt-4">
                                        <label>Admin Login Image <small class="text-danger">(Width = 600px, Height =
                                                600px)</small></label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="file" name="admin_login_image" class="form-control mt-2">
                                        <span class="text-danger">
                                            @error('admin_login_image')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-md-6 align-self-center">
                                        <img src="{{ asset($setting->admin_login_image) }}" width="80px"
                                            height="80px" />
                                    </div>

                                    <div class="col-md-12 mt-4">
                                        <label>Customer Login Image <small class="text-danger">(Width = 600px, Height =
                                                600px)</small></label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="file" name="customer_login_image" class="form-control mt-2">
                                        <span class="text-danger">
                                            @error('customer_login_image')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-md-6 align-self-center">
                                        <img src="{{ asset($setting->customer_login_image) }}" width="80px"
                                            height="80px" />
                                    </div>

                                    <div class="col-md-6 mt-3">
                                        <button type="submit" class="btn btn-primary text-white float-end">Save
                                            Changes</button>
                                    </div>
                                </div>
                            </form>
                            </div>

                            <div class="tab-pane fade" id="contactus-tab-pane" role="tabpanel"
                                aria-labelledby="contactus-tab" tabindex="0">

                                <form action="{{ route('updatecontactus', ['id' => $setting->id]) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                <div class="row">

                                    <div class="col-md-12 mt-4">
                                        <label>Contact Us Title</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="contact_us_title" class="form-control mt-2"
                                            value="{{ old('contact_us_title') }}">
                                        <span class="text-danger">
                                            @error('contact_us_title')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-md-6 align-self-center">
                                        {{ $setting->contact_us_title }}
                                    </div>

                                    <div class="col-md-12 mt-4">
                                        <label>Contact Us Message</label>
                                    </div>
                                    <div class="col-md-6">
                                        <textarea name="contact_us_msg" class="form-control mt-2" rows="10">{{ old('contact_us_msg') }}</textarea>
                                        <span class="text-danger">
                                            @error('contact_us_msg')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-md-6 align-self-center">
                                        {{ $setting->contact_us_msg }}
                                    </div>

                                    <div class="col-md-6 mt-3">
                                        <button type="submit" class="btn btn-primary text-white float-end">Save
                                            Changes</button>
                                    </div>
                                </div>
                            </form>
                            </div>

                            <div class="tab-pane fade" id="aboutus-tab-pane" role="tabpanel"
                                aria-labelledby="aboutus-tab" tabindex="0">

                                <form action="{{ route('updateaboutus', ['id' => $setting->id]) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                <div class="row">

                                    <div class="col-md-12 mt-4">
                                        <label>About Us Image <small class="text-danger">(Width = 600px, Height =
                                                800px)</small></label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="file" name="about_image" class="form-control mt-2">
                                        <span class="text-danger">
                                            @error('about_image')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-md-6 align-self-center">
                                        <img src="{{ asset($setting->about_image) }}" width="80px" height="100px" />
                                    </div>

                                    <div class="col-md-12 mt-4">
                                        <label>About Us</label>
                                    </div>
                                    <div class="col-md-6">
                                        <textarea name="about_us" class="form-control mt-2" rows="20">{{ old('about_us') }}</textarea>
                                        <span class="text-danger">
                                            @error('about_us')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-md-6 align-self-center">
                                        {{ $setting->about_us }}
                                    </div>

                                    <div class="col-md-6 mt-3">
                                        <button type="submit" class="btn btn-primary text-white float-end">Save
                                            Changes</button>
                                    </div>
                                </div>
                            </form>
                            </div>

                            <div class="tab-pane fade" id="privacy-tab-pane" role="tabpanel"
                                aria-labelledby="privacy-tab" tabindex="0">

                                <form action="{{ route('updateprivacy', ['id' => $setting->id]) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                <div class="row">

                                    <div class="col-md-12 mt-4">
                                        <label>Privacy Policy Image <small class="text-danger">(Width = 1500px, Height =
                                                500px)</small></label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="file" name="privacy_image" class="form-control mt-2">
                                        <span class="text-danger">
                                            @error('privacy_image')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-md-6 align-self-center">
                                        <img src="{{ asset($setting->privacy_image) }}" width="150px" height="50px" />
                                    </div>

                                    <div class="col-md-12 mt-4">
                                        <label>Privacy Policy Title</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="privacy_title" class="form-control mt-2"
                                            value="{{ old('privacy_title') }}">
                                        <span class="text-danger">
                                            @error('privacy_title')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-md-6 align-self-center">
                                        {{ $setting->privacy_title }}
                                    </div>

                                    <div class="col-md-12 mt-4">
                                        <label>Privacy Policy</label>
                                    </div>
                                    <div class="col-md-6">
                                        <textarea name="privacy_policy" class="form-control mt-2" rows="30">{{ old('privacy_policy') }}</textarea>
                                        <span class="text-danger">
                                            @error('privacy_policy')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-md-6 align-self-center">
                                        {{ $setting->privacy_policy }}
                                    </div>

                                    <div class="col-md-6 mt-3">
                                        <button type="submit" class="btn btn-primary text-white float-end">Save
                                            Changes</button>
                                    </div>
                                </div>
                            </form>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
