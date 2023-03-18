<!-- Main layout -->
@include('admin.inc.header')
<div class="container-scroller">
    @include('customer.inc.navbar')
    <div class="container-fluid page-body-wrapper">
        @include('customer.inc.sidepanel')

        <div class="main-panel">
            <div class="content-wrapper">
                @yield('main-section')

            </div>
            @include('customer.inc.footer')
        </div>
    </div>
</div>
@include('customer.inc.scripts')
