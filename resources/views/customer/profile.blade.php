<!-- Admin Dashboard -->
@extends('customer.main')

@push('title')
Profile
@endpush
@section('main-section')
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Account</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                    <div class="modal-body">
                        <h6>Are you sure you want to delete your account?</h6>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <a href="{{ Route('deleteprofile',['customer'=> $customer->id]) }}"><button type="button" class="btn btn-primary">Yes. Delete</button></a>
                    </div>
        </div>
    </div>
</div>

    <div class="row">
        <div class="col-md-12">
            @include('inc.fail')
            @include('inc.success')
            <div class="card">
                <div class="card-header">
                    <h3>Account Profile</h3>
                </div>
                <div class="card-body">
                    <form action="{{ Route('updateprofile',['customer'=> $customer->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">

                            <div class="col-md-4 mb-3">
                                <label>Name</label>
                                    <input type="text" name="name" class="form-control" value="{{ $customer->name }}">
                                    <span class="text-danger">
                                        @error('name')
                                            {{ $message }}
                                        @enderror
                                    </span>
                            </div>
                            
                            <div class="col-md-4 mb-3">
                                <label>E-mail</label>
                                <input type="text" name="email" class="form-control" value="{{ $customer->email }}">
                                <span class="text-danger">
                                    @error('email')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            
                            <div class="col-md-4 mb-3">
                                <label>Profile Photo</label>
                                <input type="hidden" name="oldimage" class="form-control" value="{{ $customer->image }}">
                                <input type="file" name="image" class="form-control">
                                @if(is_null($customer->image))
                                    <span class="text-danger"> Profile photo not uploaded. </span>
                                @else
                                    <img src="{{asset($customer->image)}}" width="60px" height="60px"/>
                                @endif
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="contact_no">Contact Number</label>
                                <input type="number" class="form-control" name="contact_no" id="contact_no"
                                    placeholder="Contact number" value="{{ $customer->contact_no }}">
                                <span class="text-danger">
                                    @error('contact_no')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="gender">Gender</label>
                                <select name="gender" id="gender" class="form-control">
                                    <option {{ $customer->gender == "Male" ? "selected" : ""}}>Male</option>
                                    <option {{ $customer->gender == "Female" ? "selected" : ""}}>Female</option>
                                    <option {{ $customer->gender == "Other" ? "selected" : ""}}>Other</option>
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
                                    placeholder="Date of birth" value="{{ $customer->dob }}">
                                <span class="text-danger">
                                    @error('dob')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
    
                            <div class="col-md-4 mb-3">
                                <label for="address">Address</label>
                                <textarea type="text" class="form-control" name="address" id="address" rows="4"
                                    placeholder="Address">{{ $customer->address }}</textarea>
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

                            <div class="col-md-6 mb-3">
                                <a href="{{ Route('dashboard') }}"
                                    class="btn btn-primary float-start text-white">Back</a>
                                    <a href="" data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn btn-danger float-end text-white">Delete Account</a>
                                </div>
                                <div class="col-md-6 mb-3">
                                <button type="submit" class="btn btn-success float-end text-white">Update Profile</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @push('script')

<script>
    window.addEventListener('close-modal', event => {

        $('#deleteModal').modal('hide');
    });
</script>

@endpush
@endsection
