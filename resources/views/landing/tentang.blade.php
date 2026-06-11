@extends('layouts.master')
@section('hideWidget')
@endsection
@section('content')
    <!-- About Section -->
    <section id="about" class="py-5 bg-light">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-lg-6">
                    <h2 class="fw-bolder mb-4">About Us</h2>
                    <p class="lead mb-4 justify-content">Blog Kami merupakan platform berbagi informasi dan pengetahuan yang
                        berfokus pada dunia teknologi, pemrograman, serta pengembangan perangkat lunak. Kami menyajikan
                        berbagai artikel, tutorial, dan referensi yang dirancang untuk membantu pembaca memperluas wawasan
                        serta mengikuti perkembangan teknologi terkini. Website ini dikembangkan menggunakan Framework
                        Laravel, yang menerapkan konsep MVC (Model-View-Controller) sehingga menghasilkan sistem yang
                        terorganisir, efisien, dan mudah untuk dikembangkan lebih lanjut.</p>
                    <a class="btn btn-primary btn-lg px-4 me-sm-3" href="{{ route('login') }}">Author</a>
                    <a class="btn btn-outline-primary btn-lg px-4" href="{{ route('beranda') }}">Home</a>
                </div>
                <div class="col-lg-6 pt-4">
                    <img src="https://images.unsplash.com/photo-1741851374666-1bc849a293c3?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        alt="About TechNova" class="img-fluid rounded">
                </div>
            </div>
        </div>
    </section>
@endsection
