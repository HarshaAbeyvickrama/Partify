<?php include('./Includes/header.php'); ?>

<div class="bgclr" style="z-index: 2;">
    <div class="textslidebg">
        <div class="textslide">
            Turning ideas</br> into action
        </div> 
    </div>   
</br>
    <div class="button">
        <div ><a href="#addevents">ADD </br> EVENTS</a></div>
    </div>
</div>
    
    <div class="main">   

        <div class="slides"> 
            <img src="./Assets/party1.jfif">
        </div>
        <div class="slides"> 
            <img src="./Assets/party2.jfif">
        </div>
        <div class="slides"> 
            <img src="./Assets/party4.jfif">
        </div>
        <div class="slides"> 
            <img src="./Assets/party5.jfif">
        </div>
        <div class="slides"> 
            <img src="./Assets/party6.jfif">
        </div>
        <div class="slides"> 
            <img src="party7.jfif">
        </div>
        <div class="slides"> 
            <img src="party8.jfif">
        </div>
        <div class="slides"> 
            <img src="party9.jfif">
        </div>
        <div class="slides"> 
            <img src="party10.jfif">
        </div>
        <div class="slides"> 
            <img src="party11.jfif">
        </div>
        <div class="slides"> 
            <img src="party12.jfif">
        </div>
   
    </div>


    <div class="row home1">

        <div class="column pic">
          <img src="home1.jfif" style="width:100%">
        </div>
    
        <div class="column text">
             <div class="container">
                <div class="front-box text1"><p>weddings</p></div>
                <div class="flip-box-back">
                    <p>Your wedding day is one of the most special times you’ll ever experience in your life — and we know that and understand the urgency and importance of getting everything right. Our job as your wedding or anniversary planner is to make sure your focus is on the day, and everything else is taken care of.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row home2">
        <div class="column text">
            <div class="container">
                <div class="front-box text2"><p>birthdays</p></div>
                <div class="flip-box-back">
                <p>Each year we turn a year older! And that is a special moment. Let us celebrate it with you by delivering you your ideal birthday event including planning, scheduling, catering, games and more! Whatever you dream up we can bring to fruition. Or, if you need help with every detail, we’re here for that, too!</p>
                </div> 
            </div>
        </div>
        <div class="column pic">
            <img src="home2.jfif" style="width:100%">
         </div>
    </div>

    <div class="row home3">
        <div class="column pic">
          <img src="home5.jfif" style="width:100%">
        </div>
        <div class="column text">
            <div class="container">
                <div class="front-box text3"><p>gatherings</p></div>
                <div class="flip-box-back">
                    <p>Whether you’re hosting a rooftop party, personal celebration, or co-working events, Partify party planners will provide you with the expertise and creativity needed to woo your guests. Our staff is trained, armed and ready to help plan, schedule, manage and execute your ideal social event.</p>
                </div> 
            </div> 
        </div>
    </div>




    <div class="services">
        <div class="serviceimg1">
            <img src="home8.jfif" width="100%"></br>
        </div>
        <div class="servicedes">
            <div>
                <center><h1>We can help you find.</h1></center>
                </br></br>
                <ul>
                    <li>Venues/Location</li>
                    <li>Caterers</li>
                    <li>Photographers</li>
                    <li>Videographers</li>
                    <li>Decorations</li>
                </ul>
            </div>
        </div>
        <div class="serviceimg2">
            <img src="home7.jfif" width="100%"></br>
        </div>
    </div>   



    <?php
        include('./includes/footer.php');
    ?>


    <script>
        var slideIndex = 0;
        slider();
        
        function slider() {
          var i;
          var slides = document.getElementsByClassName("slides"); 
          for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";  
          }
          slideIndex++;
          if (slideIndex > slides.length) {slideIndex = 1}
          slides[slideIndex-1].style.display = "block";
          
          setTimeout(slider, 2000);
        }
        
    </script>
</body>