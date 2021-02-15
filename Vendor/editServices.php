<html>
    <head>
        <!-- <link rel="stylesheet" href="../css/bookEvent.css"> -->
        <title>Add Services</title>
        <script src="../js/edit.js" type="text/javascript"></script>
    </head>
    <?php
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        require_once('../includes/db/dbConnection.php');
        $db = DBConnection::getInstance();
        $connection = $db->getConnection();
    ?>
    <body>
        <div>This is the header</div>
        <div class="container">
            <form action="../Controls/vendorEdit.php" method="post" class="form">
            <div class="section">
                <div class="title">Edit Services</div>
            </div>

            <?php
                $user=$_SESSION['userId'];
            ?>
                
            

            <div class="checkbox">
                <input type="checkbox" name="needPhotography" id="needPhotography" class="box" onchange="displaySection('secPhotography','needPhotography')">
                <span class="span">Photography</span>
            </div>

            <div class="section secPhotography" id="secPhotography">
                <div class="label">Edit/Select Packages</div>
            </br>
            
                
            <input type="text" name="packagePhoto" id="packagePhoto" placeholder="Package name">
            <input type="number" name="pricePhoto" id="pricePhoto" placeholder="price">
            <input type="text" name="descriptionPhoto" id="descriptionPhoto" placeholder="description">
            <input type="hidden" name="idp" id="idp" value=''>
            <input type="hidden" name="alreadyExists" id="alreadyExists">
            <button onclick="adddetails('tablePhoto','packagePhoto','pricePhoto','descriptionPhoto','idp');" type="button" name="update">Add package</button>
            <button onclick="setNull('packagePhoto','pricePhoto','descriptionPhoto','idp');" type="button" name="clear">Reset</button></br>
            
            <table id="tablePhoto" onmouseup="table('tablePhoto','packagePhoto','pricePhoto','descriptionPhoto','idp');">
                <tr >
                    <th>Package</th>
                    
                    <th>Price</th>
                    
                    <th>Description</th>
                    
                </tr>
                <?php
                    $photo='SELECT * FROM photography WHERE spId='.$user;
                    $query_photo=mysqli_query($connection,$photo);
                    if(mysqli_num_rows($query_photo) > 0) {
                        while($row = mysqli_fetch_assoc($query_photo)){
                            // echo "<tr><td>".$row['albumType']."</td><td>".$row['price']."</td><td>".$row['description']."</td><td><input type='hidden' name='idp[]' id='idp' value=".$row['pId']."></td></tr>";
                            echo "<tr>
                                <td>".$row['albumType']."</td><input type='hidden' name='typeP[]' value=".$row['albumType'].">
                                <td>".$row['price']."</td><input type='hidden' name='priceP[]' value=".$row['price'].">
                                <td>".$row['description']."</td><input type='hidden' name='descriptionP[]' value=".$row['description'].">
                                <td style='display: none;'>".$row['pId']."</td><input type='hidden' name='idp[]' value=".$row['pId']."></tr>";
                        }
                    }
                    
                ?>
            </table>
            </div>

            <hr>
            <!-- videography section -->

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
                <input type="hidden" name="idv" id="idv" value='0'>
                <input type="hidden" name="alreadyExists" id="alreadyExists">
                <button onclick="adddetails('tableVideo','packageVideo','priceVideo','descriptionVideo','idv');" type="button">Add package</button>
                <button onclick="setNull('packageVideo','priceVideo','descriptionVideo','idv');" type="button" name="clear">Reset</button>
                <table id="tableVideo" onmouseup="table('tableVideo','packageVideo','priceVideo','descriptionVideo','idv');">
                    <tr>
                        <th>Package</th>
                        <th>Price</th>
                        <th>Description</th>
                    </tr>
                    <?php
                        $video='SELECT * FROM videography WHERE spId='.$user;
                        $query_video=mysqli_query($connection,$video);
                        
                        if(mysqli_num_rows($query_video) > 0) {
                            while($row = mysqli_fetch_assoc($query_video)){
                
                                // echo '<tr><td>'.$row['type'].'</td><td>'.$row['price'].'</td><td>'.$row['description'].'</td><td>'.$row['pId'].'</td></tr>';
                                echo "<tr>
                                <td>".$row['type']."</td><input type='hidden' name='typeV[]' value=".$row['type'].">
                                <td>".$row['price']."</td><input type='hidden' name='priceV[]' value=".$row['price'].">
                                <td>".$row['description']."</td><input type='hidden' name='descriptionV[]' value=".$row['description'].">
                                <td style='display: none;'>".$row['pId']."</td><input type='hidden' name='idv[]' value=".$row['pId']."></tr>";
                            }
                            
                        }
                    ?>

                </table>
            </div> 
            <hr>
            <!-- Decoration section -->

            <div class="checkbox">
                <input type="checkbox" name="needDecoration" id="needDecoration" class="box" onchange="displaySection('secDecoration','needDecoration')">
                <span class="span">Decoration</span>
            </div>

            <div class="section secDecoration" id="secDecoration">
                </br>
                
                <b>Existing packages</b>
                <table id="video" cellspacing="1" onmouseup="table('video','packageVideo','priceVideo','descriptionVideo','idv');">
                

                <input type="text" name="packageDecoration" id="packageDecoration" placeholder="Package name">
                <input type="number" name="priceDecoration" id="priceDecoration" placeholder="price">
                <input type="text" name="descriptionDecoration" id="descriptionDecoration" placeholder="description">
                <input type="hidden" name="idd" id="idd" value='0'>
                <input type="hidden" name="alreadyExists" id="alreadyExists">
                <button onclick="adddetails('tableDecoration','packageDecoration','priceDecoration','descriptionDecoration','idd');" type="button">Add package</button>
                <button onclick="setNull('packageDecoration','priceDecoration','descriptionDecoration','idd');" type="button" name="clear">Reset</button></br>
                <table id="tableDecoration" onmouseup="table('tableDecoration','packageDecoration','priceDecoration','descriptionDecoration','idd');">
                    <tr>
                        <th>Package</th>
                        <th>Price</th>
                        <th>Description</th>
                    </tr>
                    <?php
                        $decoration='SELECT * FROM decoration WHERE spId='.$user;
                        $query_decoration=mysqli_query($connection,$decoration);
                        
                        if(mysqli_num_rows($query_decoration) > 0) {
                            while($row = mysqli_fetch_assoc($query_decoration)){
                
                                // echo '<tr><td>'.$row['type'].'</td><td>'.$row['price'].'</td><td>'.$row['description'].'</td><td>'.$row['pId'].'</td></tr>';
                                echo "<tr>
                                <td>".$row['type']."</td><input type='hidden' name='typeV[]' value=".$row['type'].">
                                <td>".$row['price']."</td><input type='hidden' name='priceV[]' value=".$row['price'].">
                                <td>".$row['description']."</td><input type='hidden' name='descriptionV[]' value=".$row['description'].">
                                <td style='display: none;'>".$row['pId']."</td><input type='hidden' name='idV[]' value=".$row['pId']."></tr>";
                            }
                            
                        }
                    ?>
                </table>
            </div> 

            <hr>
            <!-- Location section -->

            <div class="checkbox">
                <input type="checkbox" name="needLocation" id="needLocation" class="box" onchange="displaySection('secLocation','needLocation')">
                <span class="span">Location</span>
            </div>

            <div class="section secLocation" id="secLocation">
                </br>
                
                <b>Existing packages</b>
                <table id="video" cellspacing="1" onmouseup="table('tableLocation','tableLocation','Location','descriLocation','idv');">
                

                <input type="text" name="packageLocation" id="packageLocation" placeholder="Package name">
                <input type="number" name="priceLocation" id="priceLocation" placeholder="price">
                <input type="text" name="descriptionLocation" id="descriptionLocation" placeholder="description">
                <input type="hidden" name="idl" id="idl" value='0'>
                <input type="hidden" name="alreadyExists" id="alreadyExists">
                <button onclick="adddetails('tableLocation','packageLocation','priceLocation','descriptionLocation','idl');" type="button">Add package</button>
                <button onclick="setNull('packageLocation','priceLocation','descriptionLocation','idl');" type="button" name="clear">Reset</button></br>
                <table id="tableLocation" onmouseup="table('tableLocation','packageLocation','priceLocation','descriptionLocation','idl');">
                    <tr>
                        <th>Package</th>
                        <th>Price</th>
                        <th>Description</th>
                    </tr>
                    <?php
                        $location='SELECT * FROM location WHERE spId='.$user;
                        $query_location=mysqli_query($connection,$location);
                        
                        if(mysqli_num_rows($query_location) > 0) {
                            while($row = mysqli_fetch_assoc($query_location)){
                
                                // echo '<tr><td>'.$row['type'].'</td><td>'.$row['price'].'</td><td>'.$row['description'].'</td><td>'.$row['pId'].'</td></tr>';
                                echo "<tr>
                                <td>".$row['packtype']."</td><input type='hidden' name='typeL[]' value=".$row['packtype'].">
                                <td>".$row['price']."</td><input type='hidden' name='priceL[]' value=".$row['price'].">
                                <td>".$row['description']."</td><input type='hidden' name='descriptionL[]' value=".$row['description'].">
                                <td style='display: none;'>".$row['pId']."</td><input type='hidden' name='idL[]' value=".$row['pId']."></tr>";
                            }
                            
                        }
                    ?>
                </table>
            </div> 

            <hr>