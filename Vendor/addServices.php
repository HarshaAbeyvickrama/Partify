<?php
    session_start();
    if(!isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']!='true' && $_SESSION['userType']!='Vendor'){
        header("Location: ../login.php");
    }

    
    include('../includes/template.php');
?>

        <link rel="stylesheet" href="../css/bookEvent.css">
        <title>Add Services</title>
        <script src="../js/addservice.js" type="text/javascript"></script>
   
       
        <div class="container">
            <form action="../Controls/vendorControl.php" method="post" class="form">
            
            <div class="section">
                <div class="title">Select the services you wish to provide</div>
            </div>
    
            <div class="checkbox">
                <input type="checkbox" name="needMeal" id="needMeal" class="box" onchange="displaySection('secMeal','needMeal')">
                <span class="span">Meals</span>
            </div>

            <div class="section secMeal" id="secMeal">
                <div class="label">Select Meal Options</div></br>
                <input type="checkbox" name="breakfast" id="breakfast" value="breakfast" class="box" >
                <span >Breakfast</span>
                <input type="number" name="breakfastPrice" id="breakfastPrice" class="input" placeholder="Price per plate">
                <input type="checkbox" name="lunch" id="lunch" value="lunch" class="box">
                <span>Lunch</span>
                <input type="number" name="lunchPrice" id="lunchPrice" class="input" placeholder="Price per plate">
                <input type="checkbox" name="dinner" id="dinner" value="dinner" class="box">
                <span>Dinner</span>
                <input type="number" name="dinnerPrice" id="dinnerPrice" class="input" placeholder="Price per plate">
            </div>

            <hr>

            <div class="checkbox">
                <input type="checkbox" name="needPhotography" id="needPhotography" class="box" onchange="displaySection('secPhotography','needPhotography')">
                <span class="span">Photography</span>
            </div>

            <div class="section secPhotography" id="secPhotography">
                <div class="label">Select Packages</div>
            </br>
                
            <input type="text" name="packagePhoto" id="packagePhoto" placeholder="Package name">
            <input type="number" name="pricePhoto" id="pricePhoto" placeholder="price">
            <input type="text" name="descriptionPhoto" id="descriptionPhoto" placeholder="description">
            <button onclick="addPhoto();" type="button" class="packagebtn">Add package</button></br>

            <table id="tablePhoto">
                <tr>
                    <th>Package</th>
                    <th>Price</th>
                    <th>Description</th>
                </tr>
            </table>
            </div>

            <hr>

            <div class="checkbox">
                <input type="checkbox" name="needVideography" id="needVideography" class="box" onchange="displaySection('secVideography','needVideography')">
                <span class="span">Videography</span>
            </div>

            <div class="section secVideography" id="secVideography">
                <div class="label">Select Packages</div>
            </br>

            <input type="text" name="packageVideo" id="packageVideo" placeholder="Package name">
            <input type="number" name="priceVideo" id="priceVideo" placeholder="price">
            <input type="text" name="descriptionVideo" id="descriptionVideo" placeholder="description">
            <button onclick="addVideo();" type="button" class="packagebtn">Add package</button></br>

            <table id="tableVideo">
                <tr>
                    <th>Package</th>
                    <th>Price</th>
                    <th>Description</th>
                </tr>
            </table>
            </div> 

            <hr>

            <div class="checkbox">
                <input type="checkbox" name="needDecoration" id="needDecoration"  class="box" onchange="displaySection('secDecoration','needDecoration')">
                <span class="span">Decorations</span>
            </div>

            <div class="section secDecoration" id="secDecoration">
                
            <input type="text" name="packageDecor" id="packageDecor" placeholder="Package name">
            <input type="number" name="priceDecor" id="priceDecor" placeholder="price">
            <input type="text" name="descriptionDecor" id="descriptionDecor" placeholder="description">
            <button onclick="addDecor();" type="button" class="packagebtn">Add package</button></br>

            <table id="tableDecor">
                <tr>
                    <th>Package</th>
                    <th>Price</th>
                    <th>Description</th>
                </tr>
            </table>
            </div>

            <hr>

            <div class="checkbox">
                <input type="checkbox" name="needLocation" id="needLocation" class="box" onchange="displaySection('secLocation','needLocation')">
                <span class="span">Location</span>
            </div>
                
            <div class="section secLocation" id="secLocation">
                <div class="label">Include a swimming pool</div>
                <input type="checkbox" name="swimmingPool" id="swimmingPool" class="box"></br>
                <div class="label">AC</div>
                <input type="checkbox" name="airCondition" id="airCondition" class="box"></br>
                <div class="label">Location</div>
                <input  type="text" name="locationName" id="loacationName" class="input" placeholder="Location">
                <input type="text" name="packageLocation" id="packageLocation" placeholder="Package name">
                <input type="number" name="priceLocation" id="priceLocation" placeholder="price">
                <input type="text" name="descriptionLocation" id="descriptionLocation" placeholder="description">
                <button onclick="addLocation();" type="button" class="packagebtn">Add package</button></br>

                <table id="tableLocation">
                    <tr>
                        <th>Package</th>
                        <th>Price</th>
                        <th>Description</th>
                    </tr>
                </table>
            </div>
                
                

            </div>
            <div class="btnSubmit services">
                <button type="submit" name="btnAddService" class="packagebtn submitbtn">Add Services</button>
            </div>

            
            </form>       
                
    
        </div>
    </body>
</html>