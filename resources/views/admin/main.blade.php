<!-- Main layout -->
@include('admin.inc.header')
<div class="container-scroller">
    @include('admin.inc.navbar')
    <div class="container-fluid page-body-wrapper">
        @include('admin.inc.sidepanel')

        <div class="main-panel">
            <div class="content-wrapper">
                @yield('main-section')

            </div>
            @include('admin.inc.footer')
        </div>
    </div>
</div>
@include('admin.inc.scripts')
