@extends('layouts.app')
@section('content')
<style>
  .container-message{
      padding:40px;
  }
  .message-heading{
      font-size:40px;
      font-weight:600;
  }
  .content{
     display: flex;
    flex-direction: column;
    align-content: center;
    justify-content: center;
  }
  .chairman-picture{
          /*height: 500px; */
          width: 100%;
         /*object-fit: cover;*/
  }
  .chairmanname{
        font-size:22px;
      font-weight:700;
      color:black;
  }
  .tittle{
              font-size:15px;
      font-weight:400;
      color:#22574D;
      margin-top:-20px
  }
</style>
<div class="container-message">
  <div class="row" >
    <div class="col">
        <img class="chairman-picture" src="https://tmcmominabad.gos.pk/uploads/content/TMC_ABOUT_CHAIRMAN.jpg" alt=""/>
    </div>
    <div class="col content">
      <h1 class="message-heading">Chairman Message</h1>
      <p>It is with great pleasure that I address you, reflecting on our collective journey of growth and resilience. In the face of challenges, our organization has demonstrated remarkable adaptability and determination.

        As we navigate through the dynamic landscape of municipal governance, innovation remains a key focus. We eagerly embrace technological advancements to ensure that our town stays at the forefront of effective governance. Collaboration has been a cornerstone of our accomplishments, and together, we have fostered strong relationships that drive our community's progress.

        Looking ahead, we are well-positioned for continued success. I extend my gratitude for your ongoing trust and partnership in this collective endeavor. Let us move forward with confidence, seizing new opportunities and shaping a future of prosperity for our beloved town.

Thank you for your continued trust and partnership. Let us stride forward with confidence, seizing new opportunities and shaping a future of prosperity.</p>
<p class="chairmanname">Maalik Arif</p>
<span class="tittle">Chairman</span>

    </div>
  </div>
</div>

@endsection

