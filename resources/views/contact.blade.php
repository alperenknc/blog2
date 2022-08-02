@extends('layouts.sayfa')
@section('title')
Contact Page
@endsection
@section('content')
<div class="canvas">
    <div class="canvas-overlay"></div>
    <section class="post-fluid">
        <div class="container-fluid">
            <div class="row laread-contact">
                <div class="contact-box">
                    <span class="icon-contact"><i class="fa fa-paper-plane"></i></span>
                </div>
                <div class="contact-info">
                    <h2>Contact</h2>
                    <p class="text-contact"><i class="fa fa-map-marker"></i>  İstanbul, Turtkey</p>
                    <a href="mailto:readeach@readeach.com" class="text-contact"><i class="fa fa-envelope"></i>  readeach@readeach.com</a>
                    <div class="contact-form">
                        <form action="{{ route('contact.post') }}" method="POST" >
                            @csrf
                            <input class="contact-input" name="name" placeholder="Name" type="text" >
                            <input class="contact-input" name="surname" placeholder="Surname" type="text" >
                            <input class="contact-input" name="subject" placeholder="Subject" type="text" >
                            <input class="contact-input"  name="email" placeholder="Email" type="text" >
                            <textarea class="contact-textarea"  name="message"placeholder="Message"></textarea>
                            <div class="clearfix">
                                <div class="progress-button">
                                        <button type="submit" class="btn btn-grey btn-outline"><span>SEND</span></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection