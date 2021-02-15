<?php
    session_start();
    if(!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn']!='true' || $_SESSION['userType']!='User'){
        header("Location: ../login.php");
    }  
    include('../Includes/template.php');
    include('../Controls/userControl.php');

?>
<link rel="stylesheet" type="text/css" href="../css/forms.css">
<script src="../js/user.js" type="text/javascript"></script>
<form action="../Controls/userControl.php" method="post" class="form bookEvent">
            <div class="section">
                <div class="title"><h2>Book New Event</h2></div>
                <div class="label">Event Name</div>
                <input type="text" name="eventName" id="eventName" class="input" required>
                <div class="label">Event Type</div>
                <select name="eventType" id="eventType" class="select" required>
                    <option value="" class="option">- none -</option>
                    <option value="BirthDay Party" class="option">BirthDay Party</option>
                    <option value="Wedding Ceromony" class="option">Wedding Ceromony</option>
                    <option value="Get Together" class="option">Get Together</option>
                    <option value="Bachelors Party" class="option">Bachelors Party</option>
                </select>
                <div class="label">Event Location</div>
                <input type="text" name="eventLocation" id="eventLocation" class="input">
                <div class="label">Event Date</div>
                <input type="date" name="eventDate" id="eventDate" class="dateTime">
                <div class="label">Time</div>
                <span class="span">From</span>
                <input type="time" class="dateTime" name="startTime">
                <span class="span">To</span>
                <input type="time" class="dateTime" name="endTime">
            </div>
            <div class="checkbox">
                    <input type="checkbox" name="needMeal" id="needMeal" class="box" onchange="displaySection('secMeal','needMeal')">
                    <span class="span">Meals</span>
            </div>
            <div class="section secMeal" id="secMeal">
                    
                <div class="label">Select Catering Service</div>
                <select name="cateringService" id="cateringService" class="select">
                    <option value="" class="option">- none -</option>
                     
                    <?php
                        $res = getServicesProviders('meal');
                        
                        while($row = mysqli_fetch_assoc($res)){
                          
                           $sp = $row['name'];
                           $spvId = $row['spId'];
                           echo "<option value='$spvId' class='option'>$sp</option>";
                        }
                        
                    ?>
                    


                </select>
                <div class="label">Select Meal</div>
                <select name="mealType" id="mealType" class="select">
                    <option value="" class="option">- none -</option>
                    <option value="breakfast" class="option">Breakfast</option> 
                    <option value="lunch" class="option">Lunch</option> 
                    <option value="dinner" class="option">Dinner</option> 
                </select>
                <div class="label">Number Of Plates</div>
                <input type="number" name="noOfPlates" id="noOfPlates" min="250">
            </div>
            <div class="checkbox">
                    <input type="checkbox" name="needPhotography" id="needPhotography" class="box" onchange="displaySection('secPhotography','needPhotography')">
                    <span class="span">Photography</span>
                </div>
            <div class="section secPhotography" id="secPhotography">
                <div class="label">Select Photographer</div>
                <select name="photographer" id="photographer" class="select" >
                    <option value="" class="option">- none -</option>
                    <!-- <option value="" class="option"></option> add items from php -->

                    <?php
                        $res = getServicesProviders('photo');
                        while($row = mysqli_fetch_assoc($res)){
                           $sp = $row['name'];
                           $spId = $row['spId'];
                           echo "<option value='$spId' class='option'>$sp</option>";
                        }
                    ?>



                </select>
                <div class="label">Select Package</div>
                <select name="photographyPackage" id="photographyPackage" class="select">
                    <option value="" class="option">- none -</option>
                    <!-- <option value="" class="option"></option> add items from php -->
                    <?php
                        $res = getServices('photo');
                        while($row = mysqli_fetch_assoc($res)){
                           $sp = $row['albumType'];
                           echo "<option value='$sp' class='option'>$sp</option>";
                        }
                    ?>  
                    
                </select>
            </div>
            <div class="checkbox">
                    <input type="checkbox" name="needVideography" id="needVideography" class="box" onchange="displaySection('secVideography','needVideography')">
                    <span class="span">Videography</span>
                </div>
            <div class="section secVideography" id="secVideography">
                <div class="label">Select Videographer</div>
                <select name="videographer" id="videographer" class="select">
                    <option value="" class="option">- none -</option>
                    <!-- <option value="" class="option"></option> add items from php -->

                    <?php
                        $res = getServicesProviders('video');
                        
                        while($row = mysqli_fetch_assoc($res)){
                          
                           $sp = $row['name'];
                           $spId = $row['spId'];
                           echo "<option value='$spId' class='option'>$sp</option>";
                        }
                        
                    ?>
                </select>
                <div class="label">Select Package</div>
                <select name="videographyPackage" id="videographyPackage" class="select">
                    <option value="" class="option">- none -</option>
                    <!-- <option value="" class="option"></option> add items from php -->

                    <?php
                        $res = getServices('video');
                        while($row = mysqli_fetch_assoc($res)){
                           $sp = $row['type'];
                           echo "<option value='$sp' class='option'>$sp</option>";
                        }
                    ?>  
                </select>
            </div>
            <div class="checkbox">
                    <input type="checkbox" name="needDecoration" id="needDecoration" class="box" onchange="displaySection('secDecoration','needDecoration')">
                    <span class="span">Decorations</span>
            </div>
            <div class="section secDecoration" id="secDecoration">
                <div class="label">Select Decorator</div>
                <select name="decorator" id="decorator" class="select">
                    <option value="" class="option">- none -</option>
                    <!-- <option value="" class="option"></option> add items from php -->

                    <?php
                        $res = getServicesProviders('deco');
                        while($row = mysqli_fetch_assoc($res)){
                           $sp = $row['name'];
                           $spvId = $row['spId'];
                           echo "<option value='$spvId' class='option'>$sp</option>";
                        }   
                        
                    ?>
                </select>
                <div class="label">Select Package</div>
                    <select name="decoratorPackage" id="decoratorPackage" class="select">
                        <option value="" class="option">- none -</option>
                        <!-- <option value="" class="option"></option> add items from php -->

                        <?php
                            $res = getServices('deco');
                            while($row = mysqli_fetch_assoc($res)){
                            $sp = $row['type'];
                            echo "<option value='$sp' class='option'>$sp</option>";
                            }
                        ?>
                    </select>
                </div>
            <div class="checkbox">
                    <input type="checkbox" name="needLocation" id="needLocation" class="box" onchange="displaySection('secLocation','needLocation')">
                    <span class="span">Location</span>
            </div>
            <div class="section secLocation" id="secLocation">
                <div class="label">Select Location</div>
                <select name="locationProvider" id="locationProvider" class="select">
                    <option value="" class="option">- none -</option>
                    <!-- <option value="" class="option"></option> add items from php -->

                    <?php
                        $res = getServicesProviders('location');
                        while($row = mysqli_fetch_assoc($res)){
                           $sp = $row['name'];
                           $spvId = $row['spId'];
                           echo "<option value='$spvId' class='option'>$sp</option>";
                        }   
                        
                    ?>
                </select>
                <div class="label">Select Package</div>
                    <select name="locationType" id="locationType" class="select" >
                        <option value="" class="option">- none -</option>
                        <!-- <option value="" class="option"></option> add items from php -->

                        <?php
                             $res = getServices('location');
                            while($row = mysqli_fetch_assoc($res)){
                            $sp = $row['type'];
                            echo "<option value='$sp' class='option'>$sp</option>";
                            }
                        ?>
                    </select>
                </div>
            <div class="btnSubmit">
                <button type="submit" name="btnBookEvent">Book Event</button>
            </div>
        </form>

        </div>
            
        </div>
    </div>
</body>
</html>




