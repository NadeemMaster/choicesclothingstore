<!-- Contact Us -->
@extends('main')

@push('title')
    Contact Us
@endpush
@section('main-section')
    <div class="content mt-3">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <iframe class="container mt-4" src="{{$setting->google_map}}" width="500" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <div class="col-md-6 mb-3">

                        <h3 class="heading my-3 text-center">{{$setting->contact_us_title}}</h3>
                        @include('inc.success')
                        @include('inc.fail')
                        <p class="text-justify">{{$setting->contact_us_msg}}</p>
                        <form class="mb-3" method="post" action="{{ Route('sendmsg') }}" id="contactForm"
                            name="contactForm">
                            @csrf

                            <div class="col-md-12 mb-3">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" id="name"
                                    placeholder="Your name" value="{{ old('name') }}">
                                <span class="text-danger">
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label>E-mail</label>
                                <input type="text" class="form-control" name="email" id="email" placeholder="Email"
                                    value="{{ old('email') }}">
                                <span class="text-danger">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label>Subject</label>
                                <input type="text" class="form-control" name="subject" id="subject"
                                    placeholder="Subject" value="{{ old('subject') }}">
                                <span class="text-danger">
                                    @error('subject')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label>Message</label>
                                <textarea class="form-control" name="message" id="message" rows="5"
                                    placeholder="Write your message">{{ old('message') }}</textarea>
                                <span class="text-danger">
                                    @error('message')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary float-end">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
