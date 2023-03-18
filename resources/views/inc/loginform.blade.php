<!-- Login Form -->
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <img src=@stack('loginimage') class="img-fluid">
            </div>

            @stack('loginheading')

            @include('inc.fail')

            <form action="@stack('loginroute')" method="post" class="px-2 my-2">
            @csrf

            <div class="row">
                <div class="col-md-12 form-group mt-3">
                    <label>E-mail</label>
                    <input type="email" name="email" id="" class="form-control" value="{{ old('email') }}"
                        placeholder="Your email address">
                    <span class="text-danger">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 form-group mt-3">
                    <label>Password</label>
                    <input type="password" name="password" id="" class="form-control"
                        placeholder="Password here">
                    <spam class="text-danger">
                        @error('password')
                            {{ $message }}
                        @enderror
                        </span>
                </div>
            </div>
            <div class="d-flex justify-content-center mt-3">
                <button class="btn btn-primary w-75">
                    Login
                </button>
            </div>

            @stack('loginfooter')
            </form>
        </div>
    </div>
</div>
