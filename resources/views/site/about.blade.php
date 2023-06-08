@extends('site.template', ['activePage' => 'aboutpage'])
@section('content')
    {{-- page title banauna paryo using breadcrumb --}}



    {{-- about section starts here --}}
    <section id="about" class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="about-image">
                        <img src="{{ asset('site/image/about.png') }}" alt="ABOUT IMAGE"
                            title="AKIRTAM ELECTRONIC ECOMMERCE WEBSITE" class="img-fluid">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="about-content">
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque deserunt porro veniam aperiam
                            iure iste sed, ipsa vero architecto nam, harum, laudantium doloribus sunt. Soluta,
                            architecto doloribus. Ipsum, eos omnis.
                            architecto doloribus. Ipsum, eos omnis.

                        </p>

                        <p style="text-align: center">
                            <a class="btn mt-2">Read More</a>
                        </p>
                    </div>

                    <div class="about-video">
                        <iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/zBjJUV-lzHo"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen style="width: 100%;"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- about section ends here --}}
@endsection
