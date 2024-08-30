<!DOCTYPE html>
<html lang="en">
<!-- Head section -->
@include('admin.partials.head')
@yield('style')
<body>
    <div class="container">
        <div class="row">
            <!-- Siderbar section -->
            @include('admin.partials.sidebar')
            <div class="page-right">
                <!-- Header section -->
                @include('admin.partials.header')
                <!-- Content section -->
                <div class="panel-details">
                    @yield('content')
                    <!-- Footer section -->
                    @include('admin.partials.footer')
                </div>
            </div>
            <!-- Script section -->
            @yield('scripts')
        </div>
    </div>
</body>

</html>
