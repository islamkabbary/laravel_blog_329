@extends('layouts.app')


@section('title', 'Contact Us')



@section('header')
    <header class="masthead" style="background-image: url('assets/img/contact-bg.jpg')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="page-heading">
                        <h1>Contact Me</h1>
                        <span class="subheading">Have questions? I have answers.</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection



@section('content')
    <main class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <p>Want to get in touch? Fill out the form below to send me a message and I will get back to you as soon
                        as possible!</p>
                    <div class="my-5">
                        <form id="contactForm" method="POST" action="{{ route('create_new_contect') }}">
                            @csrf
                            <div class="form-floating">
                                <input class="form-control" id="name" type="text" placeholder="Enter your name..." name="name"/>
                                <label for="name">Name</label>
                            </div>
                            <div class="form-floating">
                                <input class="form-control" id="email" type="email" placeholder="Enter your email..." name="email"/>
                                <label for="email">Email</label>
                            </div>
                            <div class="form-floating">
                                <input class="form-control" id="phone" type="tel"
                                    placeholder="Enter your phone number..." name="phone"/>
                                <label for="phone">Phone Number</label>
                            </div>
                            <div class="form-floating">
                                <textarea name="message" class="form-control" id="message" placeholder="Enter your message here..." style="height: 12rem"
                                ></textarea>
                                <label for="message">Message</label>
                            </div>
                            <br />
                            <div class="d-none" id="submitSuccessMessage">
                                <div class="text-center mb-3">
                                    <div class="fw-bolder">Form submission successful!</div>
                                    To activate this form, sign up at
                                    <br />
                                    <a
                                        href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                                </div>
                            </div>
                            <!-- Submit error message-->
                            <!---->
                            <!-- This is what your users will see when there is-->
                            <!-- an error submitting the form-->
                            <div class="d-none" id="submitErrorMessage">
                                <div class="text-center text-danger mb-3">Error sending message!</div>
                            </div>
                            <!-- Submit Button-->
                            <button class="btn btn-primary text-uppercase" id="submitButton"
                                type="submit">Send</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
