@extends('layouts.frontend2.app')
@push('title') Masking SMS @endpush
@section('content')

    <!-- page-title area start -->
    <div class="page-title-area mg-bottom-105">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-6">
                    <h3 class="title">Maskign SMS</h3>
                </div>
                <div class="col-sm-6 text-center align-self-center">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Masking SMS</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- page-title area end -->

    <!-- contact area start -->
    <div class="contact-area pd-bottom-85">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title text-center">
                        <h5 class="subtitle">যেকোনো সংখ্যক</h5>
                        <h3 class="title">মাস্কিং এসএমএস নিন</h3>
                        <p>প্রতি এসএমএস মাত্র ৫০ পয়সা। কমপক্ষে ১০০ টাকা রিচার্জ করতে হবে।</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="single-facility media  bg-success">
                        <span class="number bg-danger"><b><i class="fa fa-star"></i></b></span>
                        <div class="facility-details media-body">
                            <div class="row">
                                <div class="col-lg-5 align-self-center">
                                    <h3 class="title"><i class="fa fa-comment-o"></i>Purchase</h3>
                                </div>
                                <div class="col-lg-12 align-self-center">
                                    <form class="sen-form"  method="post" id="send-message-form" action=" {{ route('frontend.contactUsStore') }}">
                                        @csrf
                                        <p class="fieldset">
                                            <label class="image-replace" for="name">Name</label>
                                            <input class="full-width has-padding has-border" type="text" name="name" value="{{ old('name') }}" placeholder="Name" required>
                                        </p>
                                        <p class="fieldset">
                                            <label class="image-replace sen-email" for="email">E-mail</label>
                                            <input class="full-width has-padding has-border" type="email" name="email" value="{{ old('email') }}" placeholder="Email" required>
                                        </p>
                                        <p class="fieldset">
                                            <label class="image-replace sen-phone" for="email">Phone</label>
                                            <input class="full-width has-padding has-border" type="text" name="phone" value="{{ old('phone') }}" placeholder="Phone" required>
                                        </p>
                                        <p class="fieldset">
                                            <label class="image-replace sen-phone" for="payment_amount">Payment amount</label>
                                            <input class="full-width has-padding has-border" type="text" id="payment_amount" name="payment_amount" value="{{ old('payment_amount') }}" placeholder="Payment amount" required>
                                        </p>
                                        <p class="fieldset">
                                            <label class="image-replace sen-phone" for="payment_transaction_id">Transaction ID</label>
                                            <input class="full-width has-padding has-border" type="text" id="payment_transaction_id" name="payment_transaction_id" value="{{ old('payment_transaction_id') }}" placeholder="Transaction ID " required>
                                        </p>
                                        <p class="fieldset">
                                            <input class="full-width has-padding" type="submit" value="Purchased now">
                                        </p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- contact area end -->
@endsection
