@extends('layouts.app')
@section('content')
<style>
    body{
            overflow-x: hidden !important;
            
    }
    button#downloadButton {
    background-color: #22574D;
    color: white;
    border-radius: 4px;
    padding: 10px;
    display: flex;
    align-items: center;
    text-decoration: none;
    color: white;
    border: 2px solid transparent;
}
</style>
    <div class="section section-contents bg-light section-pad">
           <div class="row" style="background: url(https://tmcmominabad.gos.pk/assets/images/inner-hd-new.jpg);
        background-position: center center; background-repeat: no-repeat; background-size: cover; height: 300px; width: 110%; margin-top:-85px;">
    </div>
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <h2>
Trade License
</h2>
                <p>A trade license is a legal document issued by the government or local authority that permits an individual or business entity to engage in specific commercial activities within a defined jurisdiction. This license is a crucial requirement for conducting lawful and regulated business operations. <  </p>
             <button id="downloadButton">Download Chalan</button>

            </div>
        </div>
    </div>
    </div>
    
 <script>
    document.getElementById("downloadButton").addEventListener("click", function() {
        // Replace "URL_OF_YOUR_FILE" with the actual URL of your file
        var fileUrl = "https://tmcmominabad.gos.pk/assets/images/trade.jpeg";
        
        // Creating a temporary link element
        var link = document.createElement("a");
        link.href = fileUrl;
        link.download = "Trade License"; // You can set the default downloaded file name here
        
        // Appending the link to the body
        document.body.appendChild(link);

        // Triggering the click event on the link
        link.click();

        // Removing the link from the DOM
        document.body.removeChild(link);
    });
</script>
@endsection

