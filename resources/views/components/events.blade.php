
    <section class="testimonials">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1 class="mb-0 pb-0"><b>
                            Upcoming Events
                        </b></h1>
                </div>
            </div>
        </div>
        <div class="container ">
            <div class="row">
                <div class="col-lg-12">
                    <div class="gtco-testimonials">
                        <div class="owl-carousel owl-carousel1 owl-theme"> 
                            @if (!empty($events))
                            @foreach ($events as $event)
                                <div class="card ">
                                    <div class="card-body">
                                        <h5>{{ $event->title }}<br />
                                        </h5>
                                        <div class="mt-3">
                                            <i class="bi bi-clock-fill"></i><br>
                                            <p class="mb-0 pb-0">{{ $event->start_date }}</p>
                                            <p>{{ $event->end_date }}</p>
                                        </div>
                                        <div>
                                            <i class="bi bi-geo-alt-fill"></i>
                                            <p class="mb-0 pb-0">
                                                {{ $event->address }}
                                            </p>
                                        </div>
                                        <hr class="upcoming-line">
                                        <button class="city-council-btn "> {{ $event->title }}</button>
                                    </div>
                                </div>
                            @endforeach
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

