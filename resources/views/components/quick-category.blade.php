<style>
    .container-crousel{
        padding:10px 0px;
        width:100%;
        padding-bottom: 25px;
    }
</style>
     <div class="row">
         <div class="col-lg-12  w-100">
             <button class="accordian-main w-100" style="padding: 18px 10px 10px; border-radius: 5px 5px 0 0;">I WANT TO</button>
             <div class="panel-main w-100" style="padding: 8px 10px 20px; border-radius: 0 0 5px 5px;">
                 <div class="row">


                 @foreach ($posts as $post)
                        <div class="col-xl-4 col-lg-6 mt-2">
                            <a href="details/{{ $post->slug }}" target="_blank" class="panel-card">
                                <div class="panel-card--icon">
                                    <!-- <i class="bi bi-currency-dollar"></i> -->
                                </div>
                                <div class="panel-card--text">{{ $post->title }}</div>
                            </a>
                        </div>
                    @endforeach

                             <!-- <div class="col-xl-4 col-lg-6 mt-2">
                                 <a href="/pay"
                                     class="panel-card">
                                     <div class="panel-card--icon">
                                     </div>
                                     <div class="panel-card--text">Pay My Taxes</div>
                                 </a>
                             </div>
                                       <div class="col-xl-4 col-lg-6 mt-2">
                                 <a href="/applay"
                                     class="panel-card">
                                     <div class="panel-card--icon">
                                     </div>
                                     <div class="panel-card--text">Apply for Trade License  </div>
                                 </a>
                             </div>
                                   <div class="col-xl-4 col-lg-6 mt-2">
                                 <a href="/book"
                                     class="panel-card">
                                     <div class="panel-card--icon">
                                     </div>
                                     <div class="panel-card--text">Solid Waste Management</div>
                                 </a>
                             </div>
                                       <div class="col-xl-4 col-lg-6 mt-2">
                                 <a href="/citykarachi"
                                     class="panel-card">
                                     <div class="panel-card--icon">
                                     </div>
                                     <div class="panel-card--text">Report an Issue</div>
                                 </a>
                             </div>                        <div class="col-xl-4 col-lg-6 mt-2">
                                 <a href="/career"
                                     class="panel-card">
                                     <div class="panel-card--icon">
                                     </div>
                                     <div class="panel-card--text">View Current Jobs</div>
                                 </a>
                             </div>
                                                     <div class="col-xl-4 col-lg-6 mt-2">
                                 <a href="/libary"
                                     class="panel-card">
                                     <div class="panel-card--icon">
                                     </div>
                                     <div class="panel-card--text">Visit a Library</div>
                                 </a>
                             </div>
                                                                <div class="col-xl-4 col-lg-6 mt-2">
                                 <a href="/hostpital"
                                     class="panel-card">
                                     <div class="panel-card--icon">
                                     </div>
                                     <div class="panel-card--text">Visit a Hospital</div>
                                 </a>
                             </div>
                                                                     <div class="col-xl-4 col-lg-6 mt-2">
                                 <a href="/sports"
                                     class="panel-card">
                                     <div class="panel-card--icon">
                                     </div>
                                     <div class="panel-card--text">Sports & Recreation</div>
                                 </a>
                             </div> -->
                         <div class="col-xl-4 col-lg-6 mt-2">
                             <a href="/iwantto" class="panel-card panel-card-btn text-center">
                                 <div class="panel-card--text text-white text-center">View More
                                     Services</div>
                             </a>
                         </div>
                 </div>
             </div>

     </div>
         </div>

