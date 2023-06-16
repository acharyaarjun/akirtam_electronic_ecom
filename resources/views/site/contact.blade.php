@extends('site.template', ['activePage' => 'contactpage'])

@section('content')
    {{-- bread crumbs starts here --}}
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="breadcrumb-hero">
            <div class="container">
                <div class="breadcrumb-hero">
                    <h2>Get In Touch</h2>
                    <ol>
                        <li><a href="{{ route('getHome') }}">Home</a></li>
                        <li>Contact Us</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    {{-- bread crumbs ends here --}}
    {{-- contact section starts here --}}
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d51694.6932313312!2d83.58829994234632!3d28.17287131320961!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x781b1b881d4a04ca!2zMjjCsDExJzIyLjAiTiA4M8KwMzcnMjMuNSJF!5e0!3m2!1sen!2snp!4v1666016733960!5m2!1sen!2snp"
                        width="100%" height="450" style="border: 2px solid var(--title-color); margin-bottom: 30px;"
                        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="contact-box">
                        <i class="fas fa-location icon"></i>
                        <h4>Location - Head Office</h4>
                        <p>
                            Jaimin-1, Kushmisera, Baglung
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="contact-box">
                        <i class="fas fa-phone icon"></i>
                        <h4>Phone</h4>
                        <p>
                            061-234234, +977-9876543210
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="contact-box">
                        <i class="fas fa-message icon"></i>
                        <h4>Email</h4>
                        <p>
                            apridcodes@gmail.com
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h6></h6>
                        <h2>Branches</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="contact-box">
                        <h4>Branch Office: Kathmandu</h4>
                        <p>
                            Thamel JP Marg, Thamel, Kathmandu, Nepal, 44600 <br>
                            apridcodes@gmail.com <br>
                            061-234234, +977-9876543210
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="contact-box">
                        <h4>Branch Office: Pokhara</h4>
                        <p>
                            Srijana Chowk, Pokhara-8, Nepal, Rastra Bank Rd, Pokhara 33700 <br>
                            apridcodes@gmail.com <br>
                            061-234234, +977-9876543210
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="contact-box">
                        <h4>Branch Office: Biratnagar</h4>
                        <p>
                            Main Rd (South) Traffic Chowk, Biratnagar 56613 <br>
                            apridcodes@gmail.com <br>
                            061-234234, +977-9876543210
                        </p>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-12">
                    <form action="">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fullname"></label>
                                    <input type="text" id="fullname" class="form-control" placeholder="Name" required>
                                </div>
                                <div class="form-group">
                                    <label for="email"></label>
                                    <input type="email" id="email" class="form-control" placeholder="Email" required>
                                </div>
                                <div class="form-group">
                                    <label for="subject"></label>
                                    <input type="text" id="subject" class="form-control" placeholder="Subject"
                                        required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="message"></label>
                                    <textarea id="message" class="form-control" rows="7" required style="height: 196px" placeholder="Message"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 text-center mt-3">
                            <div class="form-group">
                                <label for=""></label>
                                <input type="submit" value="submit form" class="btn">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    {{-- contact section ends here --}}
@endsection
