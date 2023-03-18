<!-- Admin Dashboard -->
@extends('admin.main')

@push('title')
Edit Admin
@endpush
@section('main-section')
    <div class="row">
        <div class="col-md-12">
            @include('inc.fail')
            @include('inc.success')
            <div class="card">
                <div class="card-header">
                    <h3>Edit Admin</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('adminupdate', ['admin' => $admin->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">

                            <div class="col-md-4 mb-3">
                                <label>Name</label>
                                    <input type="text" name="name" class="form-control" value="{{ $admin->name }}">
                                    <span class="text-danger">
                                        @error('name')
                                            {{ $message }}
                                        @enderror
                                    </span>
                            </div>
                            
                            <div class="col-md-4 mb-3">
                                <label>E-mail</label>
                                <input type="text" name="email" class="form-control" value="{{ $admin->email }}">
                                <span class="text-danger">
                                    @error('email')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            
                            <div class="col-md-4 mb-3">
                                <label>Profile Photo</label>
                                <input type="file" name="image" class="form-control">
                                @if(is_null($admin->image))
                                    <span class="text-danger"> Profile photo not uploaded. </span>
                                @else
                                    <img src="{{asset($admin->image)}}" width="60px" height="60px"/>
                                @endif
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="contact_no">Contact Number</label>
                                <input type="number" class="form-control" name="contact_no" id="contact_no"
                                    placeholder="Contact number" value="{{ $admin->contact_no }}">
                                <span class="text-danger">
                                    @error('contact_no')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="gender">Gender</label>
                                <select name="gender" id="gender" class="form-control">
                                    <option {{ $admin->gender == "Male" ? "selected" : ""}}>Male</option>
                                    <option {{ $admin->gender == "Female" ? "selected" : ""}}>Female</option>
                                    <option {{ $admin->gender == "Other" ? "selected" : ""}}>Other</option>
                                </select>
                                <span class="text-danger">
                                    @error('gender')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="dob">Date of birth</label>
                                <input type="date" class="form-control" name="dob" id="dob"
                                    placeholder="Date of birth" value="{{ $admin->dob }}">
                                <span class="text-danger">
                                    @error('dob')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
    
                            <div class="col-md-4 mb-3">
                                <label for="address">Address</label>
                                <textarea type="text" class="form-control" name="address" id="address" rows="4"
                                    placeholder="Address">{{ $admin->address }}</textarea>
                                <span class="text-danger">
                                    @error('address')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
    
                            <div class="col-md-4 mb-3">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control"
                                    placeholder="Password here">
                                <span class="text-danger">
                                    @error('password')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
    
                            <div class="col-md-4 mb-3">
                                <label for="password_confirmation">Confirm password</label>
                                <input type="password" name="password_confirmation" id="" class="form-control"
                                    placeholder="Retype password">
                                <span class="text-danger">
                                    @error('password_confirmation')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="col-md-12 mb-3">
                                <a href="{{ Route('adminindex') }}"
                                    class="btn btn-danger float-start text-white">Back</a>
                                <button type="submit" class="btn btn-success float-end text-white">Update Admin</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
