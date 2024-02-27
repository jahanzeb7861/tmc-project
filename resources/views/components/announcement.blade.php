@if (!empty(@$announcement))
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
@endif
