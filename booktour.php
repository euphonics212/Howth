

<?php 
   
    include('admin/connString.php');
    
    $dbConn = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);
    
    if (!$dbConn) {
        die("Connection failed: " . mysqli_connect_error());
    }


    $custName           = $_REQUEST["custName"];
    $custEmail          = $_REQUEST["custEmail"];
    $custPhone          = $_REQUEST["custPhone"];
    $custTour           = $_REQUEST["custTour"];
    $numOfPeople        = $_REQUEST["numOfPeople"];
    $tourDate           = $_REQUEST["tourDate"];
    $custMessage        = $_REQUEST["custMessage"];
    $savedtheform       = $_REQUEST["savedtheform"];

    include('bookingHead.php');

    include('bookingNav.php');

 

    include('functions.php');

     $bookingPageLoad = $_REQUEST[bookingPageLoad];

     

     if ($bookingPageLoad =="" ){
     $bookingPageLoad = "bookingPageLoad";
    }
    
    if ($custTour=="NONE"){
        $myErrormessage .= "You need to select a Tour!<BR>";
       }

 echo '
    
    <div class="container-fluid">
        <div class="row page-header-container">
            <div class="col-sm-12 col-md-3 ">
                <h2 class="page-header">Book a Tour</h2>
            </div>
            <div class="col-sm-12 col-md-3 ">
           
        </div>
        </div>

        <!--Page Section-->
        <div class="row page-section" id="email-form">
            <div class="col-sm-12 col-md-6 col-md-offset-6 section-header-container">
                <h3 class="section-header">Make a booking</h3>
            </div>

            <!--section for images and captions-->
            <div class="col-sm-2 col-md-offset-2">
                <div class="section-article-image cancel-hover" id="contact-img1"></div>
                <span class="caption-text "><p>Howth Lighthouse</p></span>
                <div class="section-article-image cancel-hover" id="contact-img2"></div>
                <span class="caption-text"><p>Howth Harbour</p></span>
                <div class="section-article-image cancel-hover" id="contact-img3"></div>
                <span class="caption-text"><p>Howth Fish Monger</p></span>
            </div>';


    echo '
            <!--Form-->
            <div class="col-sm-5 col-md-offset-1">

                <div class="section-article-text"  style="height: auto;">

                    <form action="booktour.php?bookingPageLoad=bookingPageLoad" method="post">

                        <!--<div class="container-fluid">-->

                            <!--name input with required attribute-->
                            <div class="row form-input-row">
                                <div class="col-md-2">
                                    <label for="name">Name</label> 
                                </div>
                                <div class="col-md-3">
                                    <input type="text" id="name" name="custName" required value="'. $custName  .'">
                                </div>
                                <br/>
                             
                            </div>  

    
                            
                             <!--email input with required attribute-->
                            <div class="row form-input-row">
                                <div class="col-md-2">
                                    <label for="email">Email</label>
                                </div>
                                <div class="col-md-3">
                                    <input type="email" id="email" name=" custEmail" required value="' .  $custEmail . '"><br/>
                                </div>
                                <br/> 
                            </div>  

                            <!--phone input with required attribute-->
                            <div class="row form-input-row">
                                <div class="col-md-2">
                                    <label for="phone">Phone Number</label>
                                </div>
                                <div class="col-md-3">
                                    <input type="tel" id="phone" name="custPhone" required value="' . $custPhone . '"><br/>
                                </div>
                                <br/> 
                            </div> 
                            <!--phone input with required attribute-->
                            <div class="row form-input-row">
                                <div class="col-md-2">
                                    <label for="phone">Date of tour</label>
                                </div>
                                <div class="col-md-3">
                                    <input type="date" id="phone" name="tourDate" required value="' . $tourDate . '"><br/>
                                </div>
                                <br/> 
                            </div> ';                            

echo' 


                            <!--Tours input with required attribute--/////////////////////////////////////////////////////////////////////////////////////////////////////-->

                            <div class="row form-input-row">
                                <div class="col-md-2">
                                    <label for="numberPeople">Number of People</label>
                                </div>
                                <div class="col-md-3">
                                    <input type="number" id="numberPeople" name="numOfPeople" required value="' . $numOfPeople . '"><br/>
                                </div>
                            </div>


                            <div class="row form-input-row">
                                <div class="col-md-2">
                                    <label for="tourSelect">Select Tour</label>
                                </div>

                                <div class = "col-md-3">

                                <select name="custTour">
                                ';
                                $query = "SELECT * FROM Tours WHERE active=1;";

                                $resultSet = mysqli_query($dbConn, $query);

                                echo '<option value="None">None Selected</option>';

                                while($RowLine = mysqli_fetch_assoc($resultSet)) {

                                    echo '<option value="'. $RowLine["guid"]. '"';

                                    if ($RowLine["guid"] == $custTour){
                                        echo ' selected ';
                                    }

                                    echo '   >'. $RowLine["tour_name"].' | &euro; '.$RowLine["price"] .'</option>';
	            	            }

                               
                                echo'
                            
                                <br/> <br/> 
                            </div> 

                             <!--textbox input not required for a brief message-->
                            <div class="row form-input-row">
                                <div class="col-md-2">
                                    <label for="message">Message</label>
                                </div>
                                <div class="col-md-2">
                                    <textarea rows="10" cols="50" id="message" name="custMessage">'. $custMessage .'</textarea><br/>
                                </div>
                                <br/> 
                            </div>  

                            <!--submit button-->
                            <div class="row form-input-row"> 
                                <div class="col-md-2">
                                    <button type="submit" value="Book Tour">Send</button>
                                    
                                </div>
                            </div>

                        </div> 
                        
                        <input type="hidden" name="savedtheform" value="yes">
                       
                    </form>
                </div>
            </div>
        </div>';



        if (isset($savedtheform)){

            $bookref = "GTO-".generateRandomString();
            $bookingGuid =  guid();



            $query = "INSERT INTO Bookings (guid, Tours_Guid, cust_name, cust_phone, cust_email, cust_message,
                        num_of_people, tour_date, booking_ref_num) 
                        VALUES ( '".
                        $bookingGuid ."','" . 
                        $custTour . "','".
                        addslashes($custName) . "','".
                        addslashes($custPhone) . "','".
                        addslashes($custEmail) . "','".
                        addslashes($custMessage) . "','".
                        addslashes($numOfPeople) . "','".
                        $tourDate. "','".
                        $bookref ."');";

                     

                        

                        mysqli_query($dbConn, $query);

                        echo '<meta http-equiv="refresh" content="0;url=booktour.php?procedure=THANKYOU&bookref='.$bookref.'&bookname='.$custName.'">';

                       
        }


    include('bookingFoot.php');
    echo dirname(__FILE__) . '/path/to/file.php';
?>

