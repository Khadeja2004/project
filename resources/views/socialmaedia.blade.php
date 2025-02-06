@extends('layouts.app')

@section('title', 'contact with  El More')

@section('content')
<div class="social-media-page">
    <div class="container">
        <h3>Need Assistance? We’re just a message away. 
            Reach out to us this instant.</h3>
            <div class="row">
                <div class="col-6">
                    <img src="{{ asset('images/container.png') }}" alt="">
                </div>
                <div class="col-6">
                    <form action="">
                        <label for="name">Name</label>
                        <input type="text"  id="name" placeholder="Enter your name">
                        <label for="email">Email</label>
                        <input type="text"  id="name" placeholder="Enter your Email">
                        <label for="subject">Subject</label>
                        <input type="text"  id="name" placeholder="Enter subject">
                        <label for="message">Message</label>
                        <textarea id="messagr" placeholder="Enter Your Message"></textarea>
                    </form>
                    <button class="submit-btn">Submit</button>
                </div>
            </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .social-media-page{
        padding: 50px 0;
        background-color: #fff;
        direction: ltr;
    }

    .social-media-page h3{
        text-align: center;
        margin-bottom: 100px;
    }

    form{
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    form  label{
        font-size: 18px;
        color: #333;
        font-weight: 600;
    }

    form input , form textarea{
        outline: none;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .submit-btn{
        display: flex;
        justify-self: center;
        background-color: black;
        color: white;
        padding: 10px 30px;
        border-radius: 5px;
        border: none;
        cursor: pointer;
        margin-top: 20px;
    }
   
</style>
@endsection
