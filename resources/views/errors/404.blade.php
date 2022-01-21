@extends('frontend.layouts.master')

@section('content')


<!-- Eshop Color Plate -->
<div class="color-plate ">
    <a class="color-plate-icon"><i class="ti-paint-bucket"></i></a>
    <h4>Eshop Colors</h4>
    <p>Here is some awesome color's available on Eshop Template.</p>
    <span class="color1"></span>
    <span class="color2"></span>
    <span class="color3"></span>
    <span class="color4"></span>
    <span class="color5"></span>
    <span class="color6"></span>
    <span class="color7"></span>
    <span class="color8"></span>
    <span class="color9"></span>
    <span class="color10"></span>
    <span class="color11"></span>
    <span class="color12"></span>
</div>
<!-- /End Color Plate -->
    
    <!-- Error Page -->
    <section class="error-page">
        <div class="table">
            <div class="table-cell">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-3 col-12">
                            <!-- Error Inner -->
                            <div class="error-inner">
                                <h2>404</h2>
                                <h5>This page cannot be founded</h5>
                                <p>Oops! The page you are looking for does not exist. It might have been moved or deleted.</p>
                                <div class="button">
                                    <a href="{{route('home')}}" class="btn">Go Homepage</a>
                                </div>
                            </div>
                            <!--/ End Error Inner -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ End Error Page -->



@endsection