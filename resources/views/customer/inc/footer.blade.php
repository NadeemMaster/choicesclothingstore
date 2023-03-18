<!-- Footer -->
<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 text-center">
                    <a href="{{ Route('index') }}">
                        Home
                    </a>
            </div>
            <div class="col-md-10 text-center">
            Copyright &copy; 2022-{{ date('Y') }} All Rights Reserved by
                <a href="{{ Route('index') }}">
                    {{$setting->app_name}}
                </a>
            </div>
        </div>
    </div>
</footer>
