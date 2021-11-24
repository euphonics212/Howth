<?php

$first_name =  $_REQUEST["firstName"];
$last_name = $_REQUEST["lastName"];


include('connString.php');
include('functions.php');
include('admin_nav.php');

//include('booking_procedures.php');
    
$dbConn = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);

if (!$dbConn) {
  die("Connection failed: " . mysqli_connect_error());
 }

 
 $showTours       = $_REQUEST["showTours"];
 

include('admin_head.php');


echo' <body>';

// $loggedin =false;


// $login = $_REQUEST["login"];

// if ($login=="OK") {
//     $loggedin = true; 

// }



// if ($loggedin) { 


//     include('admin_nav.php');

// } else {

//     include('logindialog.php');

//     die();

// }


$procedurebeingcalled = $_REQUEST["procedure"];





if ($procedurebeingcalled == "viewbooking"){

  
   // echo "hello";   

   echo '

   <div class="container">
           
   <table class="table table-striped">
       <thead>
           <tr>
           <th>Action</th>
           <th>Reference Number</th>
           <th>Tour</th>
           <th>Customer Name</th>
           <th>Number of people</th>
           <th>Tour Date</th>
           </tr>
       </thead>
       <tbody>';

           $query = "SELECT * , Bookings.guid AS book_guid
                        FROM Bookings
                        LEFT JOIN Tours ON Tours.guid = Bookings.Tours_Guid
                        WHERE Bookings.deleted=0 ORDER BY tour_date DESC";
           
           
       $dt = mysqli_query($dbConn, $query );
       while($Rows = mysqli_fetch_assoc($dt)){
       
           echo'   <tr>';
           echo'       <td>a</td>';
           echo'       <td>' . $Rows["booking_ref_num"] . '</td>';
           echo'       <td>' . $Rows["tour_name"] . '</td>';
           echo'       <td>' . $Rows["cust_name"] . '</td>';
           echo'       <td>' . $Rows["num_of_people"] . '</td>';
           echo'       <td>' . $Rows["tour_date"] . '</td>';
           echo'  </tr>';
       };
       echo '  
       </tbody>
   </table>
   </div>';

}



if ($procedurebeingcalled == "tours"){

    echo '

   <div class="container">
           
   <table class="table table-striped">
       <thead>
           <tr>
           <th>Tour Name</th>
           <th>Price</th>
           <th>Active</th>
           </tr>
       </thead>
       <tbody>';

           $query = "SELECT tour_name, price, active
                        FROM Tours";
           
           
       $dt = mysqli_query($dbConn, $query );
       while($Rows = mysqli_fetch_assoc($dt)){
       
           echo'   <tr>';
           echo'       <td>' . $Rows["tour_name"] . '</td>';
           echo'       <td>' . $Rows["price"] . '</td>';
           echo'       <td>' . $Rows["active"] . '</td>';
           echo'  </tr>';
       };
       echo '  
       </tbody>
   </table>
   </div>';
};

//Tourguides - admin
if ($procedurebeingcalled == "tourguides"){

    echo '

    <button><a href="addTourGuid.php?procedure=AddTourGuid">  Add Tour Guide </a></button>
    
   <div class="container">
           
   <table class="table table-striped">
       <thead>
           <tr>
           <th>First Name</th>
           <th>Last Name</th>
           <th>Active</th>
           </tr>
       </thead>
       <tbody>';

           $query = "SELECT first_name, last_name, active
                        FROM Tours_Guide";
           
           
       $dt = mysqli_query($dbConn, $query );
       while($Rows = mysqli_fetch_assoc($dt)){
       
           echo'   <tr>';
           echo'       <td>Edit</td>';
           echo'       <td>' . $Rows["first_name"] . '</td>';
           echo'       <td>' . $Rows["last_name"] . '</td>';
           echo'       <td>' . $Rows["active"] . '</td>';
           echo'  </tr>';
       };
       echo '  
       </tbody>
   </table>
   </div>';
};

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

echo'</body>';
echo'</html>';

?>