<!-- @if (!empty(@$announcements))
@foreach($announcements as $announcement)
<div class="news-container order-lg-3 order-2">
    <div class="news-container order-lg-3 order-2">
        <div class="col-sm-12 PromotionPanelMainOuterWraper mb-3">
            <div class="col-xm-12 col-sm-12 PromoPanItem PPI-Yellow h-auto">
                <a target="_self" tabindex="0">
                    <label class="col-sm-12 PPIHeading">
                        {{ $announcement->title }}
                    </label>
                </a>
                <label class="col-sm-12 PPIMSGBody">
                    {{ $announcement->description }}
                </label>
                <a target="_self" tabindex="0" class='d-none'>
                    <i class="bi bi-arrow-right-circle-fill ms-3 news-arrow"></i>
                </a>
            </div>
        </div>
    </div>
</div>
@endforeach
@endif -->

@if (!empty(@$announcements))
<div class="news-container order-lg-3 order-2">
    <div id="carouselExampleControls" class="carousel slide mt-3" style="width: 260px;">
        <div class="carousel-inner ">
            @foreach($announcements as $key => $announcement)
            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}" style="object-fit: cover !important;height: 270px !important; ">
                <div class="news-container order-lg-3 order-2">
                    <div class="col-sm-12 PromotionPanelMainOuterWraper mb-3">
                        <div class="col-xm-12 col-sm-12 PromoPanItem PPI-Yellow h-auto">
                            <a target="_self" tabindex="0">
                                <label class="col-sm-12 PPIHeading">
                                    {{ $announcement->title }}
                                </label>
                            </a>
                            <label class="col-sm-12 PPIMSGBody">
                                {{ $announcement->description }}
                            </label>
                            <a target="_self" tabindex="0" class='d-none'>
                                <i class="bi bi-arrow-right-circle-fill ms-3 news-arrow"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
@endif

@section('scripts')
<script>
    $(document).ready(function () {
        $('#announcement-slider').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000, // Adjust autoplay speed as needed
            dots: true, // Show dots navigation
            arrows: false // Hide navigation arrows
            // Add more options as needed
        });
    });

</script>
@endsection
