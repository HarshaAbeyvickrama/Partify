<?php
    session_start();
    if(!isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']!='true' && $_SESSION['userType']!='Vendor'){
        header("Location: ../login.php");
    }

    require_once('../includes/db/dbConnection.php');
    $db = DBConnection::getInstance();
    $connection = $db->getConnection();
    include('../includes/template.php');
?>
       
<link rel="stylesheet" href="../css/view.css">
<div class="title">
            <div class="title">VIEW services</div>
        </div>
        <div>
            <?php
            $user=$_SESSION['userId'];
                $query= 'SELECT * FROM service WHERE spId='.$user;
                $query_run=mysqli_query($connection,$query);

                while($rowMain = mysqli_fetch_assoc($query_run)){
                    
                    
                    $count=0;
                        
                    if($rowMain['catering']=='Y'){
                        echo "<table><tr><th>Catering</th></tr>";
                        $count++;
        
                        $meal= 'SELECT breakfast,lunch,dinner FROM catering WHERE spId='.$user;
                        $query_meal=mysqli_query($connection,$meal);
                        if(mysqli_num_rows($query_meal) > 0) {
                            while($row = mysqli_fetch_assoc($query_meal)){
                                if($row['breakfast']=='Y'){
                                    echo "<tr><td>Breakbast<td>";

                                    echo '<td><form action="deleteMeals.php" method="post">
                                    <input type="hidden" name="delete_tab" value="catering">
                                    <input type="hidden" name="delete_meal" value="breakfast">
                                    <button type="submit" name="delete_btn" class="btn"> DELETE</button>
                                    </form></td></tr>';
                                }
                                if($row['lunch']=='Y'){
                                    echo "<tr><td>Lunch<td>";

                                    echo '<td><form action="deleteMeals.php" method="post">
                                    <input type="hidden" name="delete_tab" value="catering">
                                    <input type="hidden" name="delete_meal" value="lunch">
                                    <button type="submit" name="delete_btn" class="btn"> DELETE</button>
                                    </form></td></tr>';
                                }
                                if($row['dinner']=='Y'){
                                    echo "<tr><td>Dinner<td>";

                                    echo '<td><form action="deleteMeals.php" method="post">
                                    <input type="hidden" name="delete_tab" value="catering">
                                    <input type="hidden" name="delete_meal" value="dinner">
                                    <button type="submit" name="delete_btn" class="btn"> DELETE</button>
                                    </form></td></tr>';
                                }
                            }
                        }
        
                        echo "</table>";
                    }
        
                    $photo='SELECT * FROM photography WHERE spId='.$user;
                    $query_photo=mysqli_query($connection,$photo);
                    if($rowMain['photography']=='Y'){
                        echo "<table><tr><th>Photography</th></tr>";
                        $count++;
        
                        if(mysqli_num_rows($query_photo) > 0) {
                            while($row = mysqli_fetch_assoc($query_photo)){
                                echo "<tr><td>".$row['albumType']."</td>";

                                echo '<td><form action="deleteServices.php" method="post">
                                    <input type="hidden" name="delete_tab" value="photography">
                                    <input type="hidden" name="delete_id" value="'.$row['pId'].'">
                                    <button type="submit" name="delete_btn" class="btn"> DELETE</button>
                                    </form></td></tr>';
                
                            }
                        }
        
                        echo "</table>";
                    }
        
                    $video='SELECT * FROM videography WHERE spId='.$user;
                    $query_video=mysqli_query($connection,$video);
                    if($rowMain['videography']=='Y'){
                        echo "<table><tr><th>Videography</th></tr>";
                        $count++;
        
                        if(mysqli_num_rows($query_video) > 0) {
                            while($row = mysqli_fetch_assoc($query_video)){
                                echo "<tr><td>".$row['type']."</td>";

                                echo '<td><form action="deleteServices.php" method="post">
                                <input type="hidden" name="delete_tab" value="videography">
                                <input type="hidden" name="delete_id" value="'.$row['pId'].'">
                                <button type="submit" name="delete_btn" class="btn"> DELETE</button>
                                </form></td></tr>';
                            }
                        }
                            
                        echo "</table>";
                    }
        
                    $decor='SELECT * FROM decoration WHERE spId='.$user;
                    $query_decor=mysqli_query($connection,$decor);
                    if($rowMain['decoration']=='Y'){
                        echo "<table><tr><th>Decorations</th></tr>";
                        $count++;
        
                        if(mysqli_num_rows($query_decor) > 0) {
                            while($row = mysqli_fetch_assoc($query_decor)){
                                echo "<tr><td>".$row['type']."</td>";

                                echo '<td><form action="deleteServices.php" method="post">
                                <input type="hidden" name="delete_tab" value="decoration">
                                <input type="hidden" name="delete_id" value="'.$row['pId'].'">
                                <button type="submit" name="delete_btn" class="btn"> DELETE</button>
                                </form></td></tr>';
                            }
                        }
                            
                        echo "</table>";
                    }
        
                    $location='SELECT * FROM location WHERE spId='.$user;
                    $query_location=mysqli_query($connection,$location);
                    if($rowMain['location']=='Y'){
                        echo "<table><tr><th>Location</th></tr>";
                        $count++;
        
                        if(mysqli_num_rows($query_location) > 0) {
                            while($row = mysqli_fetch_assoc($query_location)){
                                echo "<tr><td>".$row['packtype']."</td>";
                                echo "<td>".$row['address']."</td>";
                                echo "<td>".$row['pId']."</td>";

                                
                                echo '<td><form action="deleteServices.php" method="post">
                                <input type="hidden" name="delete_tab" value="location">
                                <input type="hidden" name="delete_id" value="'.$row['pId'].'">
                                <button type="submit" name="delete_btn" class="btn"> DELETE</button>
                                </form></td></tr>';
                            }
                        }
                            
                        echo "</table>";
                    }
        
                    if($count==0){
                        echo "NO SERVICES ADDED.";
                    }
                }
            ?>
            <div class="form">
                <form action="../Vendor/editServices.php" method="post">
                    <button class="submit" type="submit" name="editbtn" > EDIT SERVICES</button>
                </form>
            </div>
    
            
        
        
        
        
    </div>