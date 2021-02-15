<?php
    session_start();
    if(!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn']!='true' || $_SESSION['userType']!='User'){
        header("Location: ../login.php");
    }  
    require_once('../Includes/db/dbConnection.php');
    $db = DBConnection::getInstance();
    $connection = $db->getConnection();
    include('../Includes/template.php');
    include('../Controls/userControl.php');

?>


<link rel="stylesheet" type="text/css" href="../css/forms.css">
<script src="../js/user.js" type="text/javascript"></script>
<form action="../Controls/userControl.php" method="post" class="form bookEvent">
            <div class="section">
                <?php
                    $bookingId = $_POST['bId'];
                    $event = getEvent($_POST['bId']);
                    echo "<input type='hidden' name='bookingId' value='$bookingId'>";
                ?>
                
                <div class="title"><h2>Edit Event</h2></div>
                <div class="label">Event Name</div>
                <input type="text" name="eventName" id="eventName" class="input" value="<?php echo $event['eventName'] ?>" required>
                <div class="label">Event Type</div>
                <select name="eventType" id="eventType" class="select" required default="<?php echo $event['type'] ?>">
              
                
                    <option value="" class="option">- none -</option>
                    <option value="BirthDay Party" class="option" <?php if ($event['type'] == "BirthDay Party") echo "selected='selected'";?>>BirthDay Party</option>
                    <option value="Wedding Ceromony" class="option" <?php if ($event['type'] == "Wedding Ceromony") echo "selected='selected'";?>>Wedding Ceromony</option>
                    <option value="Get Together" class="option" <?php if ($event['type'] == "Get Together") echo "selected='selected'";?>>Get Together</option>
                    <option value="Bachelors Party" class="option" <?php if ($event['type'] == "Bachelors Party") echo "selected='selected'";?>>Bachelors Party</option>
                </select>
                
                <div class="label">Event Date</div>
                <input type="date" name="eventDate" id="eventDate" class="dateTime" value="<?php echo $event['date'] ?>">
                <div class="label">Time</div>
                <span class="span">From</span>
                <input type="time" class="dateTime" name="startTime" value="<?php echo $event['startTime'] ?>">
                <span class="span">To</span>
                <input type="time" class="dateTime" name="endTime" value="<?php echo $event['endTime'] ?>">
            </div>
            <div class="checkbox">
                    <input type="checkbox" name="needMeal" id="needMeal" class="box" onchange="displaySection('secMeal','needMeal')" <?php if ($event['meal'] == "Y" || $event['meal'] == "y") echo "checked";?>>
                    <span class="span">Meals</span>
            </div>
            <div class="section secMeal" id="secMeal">
           
    
                <div class="label">Select Catering Service</div>
                <select name="cateringService" id="cateringService" class="select" >
                    <option value="" class="option">- none -</option>
                    <?php
                        $res = getServicesProviders('meal');
                        
                        while($row = mysqli_fetch_assoc($res)){
                          
                           $sp = $row['name'];

                           $spvId = $row['spId'];
                          
                           

                           if($event['meal']=='y' || $event['meal']=='Y' ){  
                                $resMeal = getMeals($_POST['bId']);
                               
                                if($resMeal['spId']==$spvId){
                                        echo "<option value='$spvId' class='option' ";
                                        echo "selected='selected'";
                                        echo ">$sp</option> ";
                                
                                }else{
                                    echo "<option value='$spvId' class='option'>$sp</option>";  
                                }
                            }
                        }
                        
                    ?>
    
                </select>
                
                <!-- <?php print_r($resMeal); ?>  -->

                
                <div class="label">Select Meal</div>
                <select name="mealType" id="mealType" class="select">
                
                    <option value="" class="option">- none -</option>
                    <option value="breakfast" class="option" <?php if($resMeal['mealName']='Breakfast') echo "Selected"?>>Breakfast</option> 
                    <option value="lunch" class="option" <?php if($resMeal['mealName']='Lunch') echo "Selected"?>>Lunch</option> 
                    <option value="dinner" class="option" <?php if($resMeal['mealName']='Dinner') echo "Selected"?>>Dinner</option> 
                </select>
                <div class="label">Number Of Plates</div>
                <?php

                        try {
                            $plates = $resMeal['noOfPlates'];
                        } catch (Exception $e) {
                            
                            echo "Exception : ".$e;
                        }
                ?>
                <input type="number" name="noOfPlates" id="noOfPlates" min="250" value="<?php echo $plates;?>" >
            </div>
            <div class="checkbox">
                    <input type="checkbox" name="needPhotography" id="needPhotography" class="box" onchange="displaySection('secPhotography','needPhotography')" <?php if ($event['photography'] == "Y" || $event['photography'] == "y") echo "checked";?>>
                    <span class="span">Photography</span>
                </div>
            <div class="section secPhotography" id="secPhotography">
                <div class="label">Select Photographer</div>
                <select name="photographer" id="photographer" class="select">
                    <option value="" class="option">- none -</option>

                    <?php
                        $res = getServicesProviders('photo');
                        while($row = mysqli_fetch_assoc($res)){
                           $sp = $row['name'];
                           $spId = $row['spId'];
                           
                           if($event['photography']=='y' || $event['photography']=='Y' ){ 
                                $resPhoto = getPhoto($_POST['bId']);
                                if($resPhoto['spId']==$spId){
                                    echo "<option value='$spId' class='option' ";
                                    echo "selected='selected'";
                                    echo ">$sp</option> ";
                                }
                            }else{
                                echo "<option value='$spId' class='option'>$sp</option>";  
                            }
                        }
                    ?>



                </select>

                <div class="label">Select Package</div>
                <select name="photographyPackage" id="photographyPackage" class="select">
                    <option value="" class="option">- none -</option>
                    <?php
                        $res = getServicesProviders('photo');
                        while($row = mysqli_fetch_assoc($res)){
                           $sp = $row['albumType'];
                           if($resPhoto['spId']==$spId){
                                echo "<option value='$spId' class='option' ";
                                echo "selected='selected'";
                                echo ">$sp</option> ";
                        
                            }else{
                                echo "<option value='$spId' class='option'>$sp</option>";  
                            }
                        }
                    ?>  
                    
                </select>
            </div>
            <div class="checkbox">
                    <input type="checkbox" name="needVideography" id="needVideography" class="box" onchange="displaySection('secVideography','needVideography')" <?php if ($event['videography'] == "Y" || $event['videography'] == "y") echo "checked";?>>
                    <span class="span">Videography</span>
                </div>
            <div class="section secVideography" id="secVideography">
                <div class="label">Select Videographer</div>
                <select name="videographer" id="videographer" class="select">
                    <option value="" class="option">- none -</option>

                    <?php
                        $res = getServicesProviders('video');
                        $currentVideographer = 'null';
                        $currentVideoPack = 'null';
                        while($row = mysqli_fetch_assoc($res)){
                          
                           $sp = $row['name'];
                           $spId = $row['spId'];
                           echo "<option value='$spId' class='option'>$sp</option>";
                           if($event['videography']=='y' || $event['videography']=='Y' ){ 
                                $res = getVideo($_POST['bId']);
                                if($res['spId']==$spId){
                                    echo "<option value='$spId' class='option' ";
                                    echo "selected='selected'";
                                    echo ">$sp</option> ";
                                }
                            }else{
                                echo "<option value='$spId' class='option'>$sp</option>";  
                            }
                            
                        }
                        
                    ?>
                </select>
                <div class="label">Select Package</div>
                <select name="videographyPackage" id="videographyPackage" class="select">
                    <option value="" class="option">- none -</option>

                    <?php
                        $res = getServicesProviders('video');
                        while($row = mysqli_fetch_assoc($res)){
                           $sp = $row['type'];
                           if($resPhoto['spId']==$spId){
                            echo "<option value='$spId' class='option' ";
                            echo "selected='selected'";
                            echo ">$sp</option> ";
                    
                        }else{
                            echo "<option value='$spId' class='option'>$sp</option>";  
                        }
                        }
                           
                    ?>  
                </select>
            </div>
            <div class="checkbox">
                    <input type="checkbox" name="needDecoration" id="needDecoration" class="box" onchange="displaySection('secDecoration','needDecoration')" <?php if ($event['decoration'] == "Y" || $event['decoration'] == "y") {echo "checked";}?>>
                    <span class="span">Decorations</span>
                </div>
            <div class="section secDecoration" id="secDecoration">
                <div class="label">Select Decorator</div>
                <select name="decorator" id="decorator" class="select">
                    <option value="" class="option">- none -</option>
                    
                    <?php
                        $res = getServicesProviders('deco');
                        while($row = mysqli_fetch_assoc($res)){
                           $sp = $row['name'];
                           $spvId = $row['spId'];
                           echo "<script>alert(".$spvId.")</script>";
                           if($event['decoration']=='y' || $event['decoration']=='Y' ){ 
                            $res = getDeco($_POST['bId']);
                                if($res['spId']==$spvId){
                                    echo "<option value='$spvId' class='option' ";
                                    echo "selected='selected'";
                                    echo ">$sp</option> ";
                            
                                }else{
                                    echo "<option value='$spvId' class='option'>$sp</option>";  
                                }
                            }
                        }   
                        
                    ?>
                </select>
                <div class="label">Select Package</div>
                <select name="decoratorPackage" id="decoratorPackage" class="select">
                    <option value="" class="option">- none -</option>

                    <?php
                        $res = getServicesProviders('deco');
                        while($row = mysqli_fetch_assoc($res)){
                            if($res['spId']==$spvId){
                                echo "<option value='$spvId' class='option' ";
                                echo "selected='selected'";
                                echo ">$sp</option> ";
                        
                            }else{
                                echo "<option value='$spvId' class='option'>$sp</option>";  
                            }
                        }
                    ?>
                </select>
            </div>
            <div class="checkbox">
                    <input type="checkbox" name="needLocation" id="needLocation" class="box" onchange="displaySection('secLocation','needLocation')" <?php if ($event['location'] == "Y" || $event['location'] == "y") echo "checked";?>>
                    <span class="span">Location</span>
            </div>
            <div class="section secLocation" id="secLocation">
                <div class="label">Select Location</div>
                <select name="locationProvider" id="locationProvider" class="select">
                    <option value="" class="option">- none -</option>

                    <?php
                        $res = getServicesProviders('location');
                        while($row = mysqli_fetch_assoc($res)){
                           $sp = $row['name'];
                           $spvId = $row['spId'];
                           echo "<option value='$spId' class='option'>$sp</option>";
                           if($event['location']=='y' || $event['location']=='Y' ){ 
                                $res = getLocation($_POST['bId']);
                                    if($res['spId']==$spvId){
                                        $currentLocationProvider = $sp;
                                        $currentLocation = $res['locationType'];
                                    }else{
                                        $currentLocationProvider = 'null';
                                        $currentLocation = 'null';
                                    }
                            }else{
                                $currentLocationProvider = 'null';
                                $currentLocation = 'null';
                            }
                        }
                       
                        
                    ?>
                </select>
                <div class="label">Select Package</div>
                    <select name="locationType" id="locationType" class="select" >
                        <option value="" class="option">- none -</option>

                        <?php
                             $res = getServicesProviders('location');
                            while($row = mysqli_fetch_assoc($res)){
                            $sp = $row['type'];
                                if($resPhoto['spId']==$spId){
                                    echo "<option value='$spId' class='option' ";
                                    echo "selected='selected'";
                                    echo ">$sp</option> ";
                            
                                }else{
                                    echo "<option value='$spId' class='option'>$sp</option>";  
                                }
                            }
                            ?>
              
                    </select>
                </div>
            <div class="btnSubmit">
                <button type="submit" name="btnEditEvent">Update Event</button>
            </div>
        </form>

        </div>
            
        </div>
    </div>
</body>
</html>

