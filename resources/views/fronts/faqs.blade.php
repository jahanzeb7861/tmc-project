@extends('layouts.app')
@section('content')
<style>
    body{
            overflow-x: hidden !important;
    }
</style>

<div class="accordion acc" id="accordionExample">
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                    aria-expanded="true" aria-controls="collapseOne">
                    How can I purchase tickets to visit the TMC Museum?
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    Purchasing tickets for your TMC Museum visit is easy! You can buy tickets online through our website or at the museum's entrance. Visit our Tickets and Admission page for pricing details, special discounts, and any current promotions. We recommend checking for online ticket availability, especially during peak visiting hours.
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Are photography and videography allowed inside the museum?
                </button>
            </h2>

            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    Yes, photography for personal use is generally allowed in most areas of the TMC Museum. However, we kindly ask visitors to refrain from using flash photography or tripods to ensure the safety of our exhibits and the comfort of other patrons. For specific guidelines and any restricted areas, please refer to our Photography Policy on the Visitor Information page.
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Does the TMC Museum offer guided tours for groups or schools?
                </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    Absolutely! TMC Museum provides guided tours for groups, schools, and organizations. To arrange a guided tour, please contact our Education and Outreach Department through the information provided on our Guided Tours page. Our educational programs cater to various age groups and can be customized to align with specific curriculum objectives.    
                </div>
            </div>
        </div>
    </div>

@endsection