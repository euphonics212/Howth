<?php

if($procedurebeingcalled == "AddTourGuid"){
    echo '
    <div class="card col-md-5 col-offset-md-3">
    
        <h5 class="card-header info-color white-text text-center py-4">
            <strong>Add Tour Guide</strong>
        </h5>
    
        <!--Card content-->
        <div class="card-body px-lg-5 pt-0">
    
            <!-- Form -->
            <form class="text-center" style="color: #757575;" action="#!">
    
                <div class="form-row">
                    <div class="col">
                        <!-- First name -->
                        <div class="md-form">
                            <input type="text" id="firstName" class="form-control">
                            <label for="firstName">First name</label>
                        </div>
                    </div>
                    
                    <div class="col">
                        <!-- Last name -->
                        <div class="md-form">
                            <input type="text" id="lastName" class="form-control">
                            <label for="lastName">Last name</label>
                        </div>
                    </div>
                </div>
    

    
                <!-- Password -->
                <div class="md-form">
                    <input type="password" id="password" class="form-control" aria-describedby="materialRegisterFormPasswordHelpBlock">
                    <label for="password">Password</label>
                    
                </div>

                <div class="md-form">
                    <button><a href="addtourGuide.php?procedurebeingcalled=addnewguide">Add Tour Guide </a></button>
                    
                </div>
                
    
            </form>
            <!-- Form -->
    
        </div>
    
    </div>
    <!-- Material form register -->';
}



if($procedurebeingcalled == "addnewguide"){
    
    $tourguideGuide =  guid();

    $query = "INSERT INTO Tour_Guide (guid, first_name, last_name, active) 
                VALUES ( '".
                $tourguideGuide ."','" . 
                $custTour . "','".
                addslashes($custName) . "','".
                addslashes($custPhone) . "','".
                addslashes($custEmail) . "','".
                addslashes($custMessage) . "','".
                addslashes($numOfPeople) . "','".
                $tourDate. "','".
                $bookref ."');";

                mysqli_query($dbConn, $query);
}
echo'Hello';

?>