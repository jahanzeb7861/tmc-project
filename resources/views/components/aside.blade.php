 <div class="d-lg-block d-none filter-div">
     <div class="filter aside-filter order-lg-1 order-1 ">
         <div class="w-100">
             <h2 class="filter-heading mb-0 p-3 pb-0">TMC Mominabad</h2>
             <ul class="aside-list">
                 <li>
                     @foreach ($menus as $post)
                         <a href='{{ $post->url }}'>{{ $post->title }}</a>
                     @endforeach
                 </li>
             </ul>


         </div>
     </div>
 </div>
