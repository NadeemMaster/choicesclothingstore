<!-- Registration form -->
<div class="row">
    <div class="col-md-12">
        @include('inc.fail')
        @include('inc.success')
        <div class="card my-3">
            <div class="card-header">
                <h3>
                    @stack('signupheading')
                </h3>
            </div>
            <div class="card-body">
                <form action="@stack('signuproute')" method="post" class=" my-3 px-2">

                    @csrf

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name"
                                placeholder="Full name" value="{{ old('name') }}">
                            <span class="text-danger">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="email">E-mail</label>
                            <input type="email" class="form-control" name="email" id="email"
                                placeholder="Email address" value="{{ old('email') }}">
                            <span class="text-danger">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="contact_no">Contact Number</label>
                            <input type="number" class="form-control" name="contact_no" id="contact_no"
                                placeholder="Contact number" value="{{ old('contact_no') }}">
                            <span class="text-danger">
                                @error('contact_no')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="gender">Gender</label>
                            <select name="gender" id="gender" class="form-control" value="{{ old('gender') }}">
                                <option selected disabled hidden>Choose gender . . .</option>
                                <option>Male</option>
                                <option>Female</option>
                                <option>Other</option>
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
                                placeholder="Date of birth" value="{{ old('dob') }}">
                            <span class="text-danger">
                                @error('dob')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" name="address" id="address"
                                placeholder="Address" value="{{ old('address') }}">
                            <span class="text-danger">
                                @error('address')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control"
                                placeholder="Password here">
                            <span class="text-danger">
                                @error('password')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="password_confirmation">Confirm password</label>
                            <input type="password" name="password_confirmation" id="" class="form-control"
                                placeholder="Retype password">
                            <span class="text-danger">
                                @error('password_confirmation')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                    </div>

                    @stack('signupbtn')

                </form>
            </div>
        </div>
    </div>
</div>
