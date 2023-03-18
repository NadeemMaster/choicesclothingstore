<!-- About Us -->
@extends('main')

@push('title')
    About Us
@endpush
@section('main-section')
    <div class="content mt-3">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <p><img src="{{ asset($setting->about_image) }}" alt="Image" class="img-fluid"></p>
                    </div>
                    <div class="col-md-6">
                        <h2 class="heading mb-4 text-center">About Us!</h2>
                        <p class="text-justify">{{$setting->about_us}}</p>

                        <ul class="social-icons">
                            <li><a class="facebook" target="_blank" href="{{$setting->facebook}}"><i class="fa fa-facebook"></i></a></li>
                            <li><a class="twitter" target="_blank" href="{{$setting->twitter}}"><i class="fa fa-twitter"></i></a></li>
                            <li><a class="youtube" target="_blank" href="{{$setting->youtube}}"><i class="fa fa-youtube"></i></a></li>
                            <li><a class="instagram" target="_blank" href="{{$setting->instagram}}"><i class="fa fa-instagram"></i></a></li>
                            <li><a class="whatsapp" target="_blank" href="{{$setting->whatsapp}}"><i class="fa fa-whatsapp"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
