<!-- Footer -->
<footer class="site-footer">
    <div class="container">
        <div class="row">

            <div class="col-md-3">
                <iframe class="container mt-4" src="{{$setting->google_map}}" width="250" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

            <div class="col-md-3">
                <h6>Quick Links</h6>
                <ul class="footer-links">
                    <li><a href="{{ Route('adminlogin') }}">Admin</a></li>
                    <li><a href="{{ Route('login') }}">Login</a></li>
                    <li><a href="{{ Route('signup') }}">Sign Up</a></li>
                    <li><a href="{{ Route('aboutus') }}">About Us</a></li>
                    <li><a href="{{ Route('contactus') }}">Contact Us</i></a></li>
                    <li><a href="{{ Route('privacypolicy') }}">Privacy Policy</a></li>
                </ul>
            </div>

            <div class="col-md-6">
                <h6>About Us</h6>
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
        <hr>
    </div>
    <div class="container text-center">
        <p class="copyright-text">Copyright &copy; 2022-{{ date('Y') }} All Rights Reserved by
            <a href="{{ Route('index') }}">
                {{$setting->app_name}}
            </a>
        </p>
    </div>
</footer>
