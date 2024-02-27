@extends('layouts.app')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <link rel="stylesheet" href="{{ asset('assets/css/contact.css') }}" />
    </head>

    <body>
        <div class="section section-contents section-contact section-pad">
            <div class="container">
                <div class="content row">
                    <div class="contact-content row">
                        <div class="drop-message col-md-8 pad-r res-m-bttm">
                            <h2>Contact Information</h2>
                            <div class="row">
                                <div class="col-sm-5 res-s-bttm-sm">
                                    <p>{{ @$websiteSettings->website_address }}</p>
                                </div>
                            </div>
                            <div class="gaps size-lg"></div>
                            <div class="clear"></div>
                            <h4>Complete and submit the form below -</h4>
                            <div id="alert"></div>
                            <form id="contact" class="form-message" action="{{ route('fronts.contact.store') }}"
                                method="post">
                                <div class="form-results"></div>
                                <div class="form-group row">
                                    <div class="form-field col-md-6 form-m-bttm">
                                        <input name="name" type="text" placeholder="Name *"
                                            class="form-control required">
                                    </div>
                                    <div class="form-field col-md-6">
                                        <input name="email" type="email" placeholder="Email *"
                                            class="form-control required email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="form-field col-md-6 form-m-bttm">
                                        <input name="phone" type="text" placeholder="Phone *"
                                            class="form-control required">
                                    </div>
                                    <div class="form-field col-md-6">
                                        <select name="problem" class="form-control">
                                            <option disabled selected>Select Your Problem</option>
                                            @foreach ($problems as $problem)
                                                <option value="{{ $problem->problem }}">
                                                    {{ $problem->problem }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="form-field col-md-12">
                                        <textarea name="message" placeholder="Messages / Question *" class="txtarea form-control w-100 required"></textarea>
                                    </div>
                                </div>
                                <button type="submit" class="btn submit-btn solid-btn sb-h">Submit</button>
                            </form>
                        </div>
                        <div class="contact-maps col-md-4">
                            <div class="map-holder map-contact-vertical">
                                <div class="gmap"><iframe
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14472.44669409152!2d66.97227242956977!3d24.928265323190395!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3eb31553c5a6ef73%3A0x7fc7ffaf1a7b1ec6!2sMominabad%20Orangi%20Town%2C%20Karachi%2C%20Karachi%20City%2C%20Sindh%2C%20Pakistan!5e0!3m2!1sen!2s!4v1704990524485!5m2!1sen!2s"
                                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                        referrerpolicy="no-referrer-when-downgrade"></iframe></span>
                                    <small><a href="#" class="btn-link">View on google Map &rsaquo;</a></small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </body>

    </html>
@endsection
@section('script')
    <script src="{{ asset('assets/js/contact.js') }}"></script>
@endsection
