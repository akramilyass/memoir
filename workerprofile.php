<?php 
    session_start();
    if(!isset($_SESSION['worker'])){
        header('location:workerlogin.php');
        exit();
    }
    include 'inc/conn-db.php';

    $email = $_SESSION['worker']['email']; 
    $name = $_SESSION['worker']['name'];
    
    $currentTime = date('Y-m-d H:i:s');
    $currentDate = date('Y-m-d');
    
    $stm="SELECT * FROM members WHERE email = '$email'";
    $q=$conn->prepare($stm);
    $q->execute();
    $data=$q->fetch();
    $groupname = $data['groupname'];
    $usertype = $data['type'];
    $id= $data['id'] ;



    // fetch omploi
    $stm = "SELECT * FROM sunday WHERE groupname = :groupname";
    $q = $conn->prepare($stm);
    $q->bindParam(':groupname', $groupname); // Binding $groupname as a parameter to prevent SQL injection
    $q->execute();
    $omploisunday = $q->fetch(PDO::FETCH_ASSOC); // Fetching just one row

    // Accessing the 's78' column directly
    $h1 = $omploisunday['s78'];
    $h2 = $omploisunday['s89'];
    $h3 = $omploisunday['s910'];
    $h4 = $omploisunday['s1011'];
    $h5 = $omploisunday['s1112'];
    $h6 = $omploisunday['s12'];
    $h7 = $omploisunday['s23'];
    $h8 = $omploisunday['s34'];
    



    $stm = "SELECT * FROM monday WHERE groupname = :groupname";
    $q = $conn->prepare($stm);
    $q->bindParam(':groupname', $groupname); // Binding $groupname as a parameter to prevent SQL injection
    $q->execute();
    $omploimonday = $q->fetch(PDO::FETCH_ASSOC); // Fetching just one row

    // Accessing the 's78' column directly
    $mondayh1 = $omploimonday['s78'];
    $mondayh2 = $omploimonday['s89'];
    $mondayh3 = $omploimonday['s910'];
    $mondayh4 = $omploimonday['s1011'];
    $mondayh5 = $omploimonday['s1112'];
    $mondayh6 = $omploimonday['s12'];
    $mondayh7 = $omploimonday['s23'];
    $mondayh8 = $omploimonday['s34'];
  


    $stm = "SELECT * FROM thersday WHERE groupname = :groupname";
    $q = $conn->prepare($stm);
    $q->bindParam(':groupname', $groupname); // Binding $groupname as a parameter to prevent SQL injection
    $q->execute();
    $omploithersday = $q->fetch(PDO::FETCH_ASSOC); // Fetching just one row

    // Accessing the 's78' column directly
    $thersdayh1 = $omploithersday['s78'];
    $thersdayh2 = $omploithersday['s89'];
    $thersdayh3 = $omploithersday['s910'];
    $thersdayh4 = $omploithersday['s1011'];
    $thersdayh5 = $omploithersday['s1112'];
    $thersdayh6 = $omploithersday['s12'];
    $thersdayh7 = $omploithersday['s23'];
    $thersdayh8 = $omploithersday['s34'];



    $stm = "SELECT * FROM wednesday WHERE groupname = :groupname";
    $q = $conn->prepare($stm);
    $q->bindParam(':groupname', $groupname); // Binding $groupname as a parameter to prevent SQL injection
    $q->execute();
    $omploiwednesday = $q->fetch(PDO::FETCH_ASSOC); // Fetching just one row

    // Accessing the 's78' column directly
    $wednesdayh1 = $omploiwednesday['s78'];
    $wednesdayh2 = $omploiwednesday['s89'];
    $wednesdayh3 = $omploiwednesday['s910'];
    $wednesdayh4 = $omploiwednesday['s1011'];
    $wednesdayh5 = $omploiwednesday['s1112'];
    $wednesdayh6 = $omploiwednesday['s12'];
    $wednesdayh7 = $omploiwednesday['s23'];
    $wednesdayh8 = $omploiwednesday['s34'];



    $stm = "SELECT * FROM tusday WHERE groupname = :groupname";
    $q = $conn->prepare($stm);
    $q->bindParam(':groupname', $groupname); // Binding $groupname as a parameter to prevent SQL injection
    $q->execute();
    $omploitusday = $q->fetch(PDO::FETCH_ASSOC); // Fetching just one row

    // Accessing the 's78' column directly
    $tusdayh1 = $omploitusday['s78'];
    $tusdayh2 = $omploitusday['s89'];
    $tusdayh3 = $omploitusday['s910'];
    $tusdayh4 = $omploitusday['s1011'];
    $tusdayh5 = $omploitusday['s1112'];
    $tusdayh6 = $omploitusday['s12'];
    $tusdayh7 = $omploitusday['s23'];
    $tusdayh8 = $omploitusday['s34'];

    //___________get primery group infos __________________
    $GroupdbName = 'group' . $groupname;
    $stmt = "SELECT * FROM $GroupdbName";
    $qq = $conn->prepare($stmt);
    $qq->execute();
    $datat = $qq->fetch(PDO::FETCH_ASSOC);





    //_________________check in logic____________________________________________________________
    /*if(isset($_POST['chekin'])){
        $GroupdbName = $companyname . 'group' . $group;
        $currentDate = date('Y-m-d');
        $stmm = "SELECT workerState FROM $GroupdbName WHERE date ='$currentDate' AND workerEmail ='$email' ";
        $qu = $conn->prepare($stmm);
        $qu->execute();

        $Data = $qu->fetch(PDO::FETCH_ASSOC);
        echo $Data;
        /*
            $stm="INSERT INTO $GroupdbName 
                (date,workerName,workerEmail,workerjobTitle,workerTimeIn,workerTimeout,workerState)
                VALUES 
                ('$currentDate','$name','$email','$jobtitle','$currentTime','still on work','on work')";
            $conn->prepare($stm)->execute();
            header('location:workerprofile.php');



    }*/
    if(isset($_POST['chekin'])){
        $GroupdbName = $companyname . 'Group' . $group;
        $currentDate = date('Y-m-d');
        $stmm = "SELECT * FROM $GroupdbName WHERE date = :currentDate AND workerEmail = :email";
        $qu = $conn->prepare($stmm);
        $qu->bindParam(':currentDate', $currentDate);
        $qu->bindParam(':email', $email);
        $qu->execute();

        $data = $qu->fetchAll(PDO::FETCH_ASSOC);

        // Check if there is any data
        if ($data[0]['workerState']=='Present') {
           // echo '<script>alert("you already Present")</script>';
            //header('location:workerprofile.php');
            
        }elseif($data[0]['workerState']=='on work')
        {
           // echo '<script>alert("you already in")</script>';
            header('location:workerprofile.php');
        }else{
            $stm=" UPDATE $GroupdbName SET
            `workerTimeIn`='$currentTime',
            `workerState`='on work' 
            WHERE date ='$currentDate' AND workerEmail ='$email'
        ";
            $conn->prepare($stm)->execute();
            header('location:workerprofile.php');
        }
    }


    //_________________check out logic____________________________________________________________

    /*
    if(isset($_POST['chekout'])){
        $GroupdbName = $companyname . 'group' . $group;
        $currentDate = date('Y-m-d');
        $stm=" UPDATE $GroupdbName SET
            `workerTimeout`='$currentTime',
            `workerState`='Present' 
            WHERE date ='$currentDate' AND workerEmail ='$email'
        ";
    $conn->prepare($stm)->execute();
    header('location:workerprofile.php');
    }*/
    
    //_______________________SEND MSGS_______________________________________________________
    if(isset($_POST['send'])){
        $currentDate = date("Y-m-d");
        $currentTimestamp = time(); // Get the current timestamp
        $timeString = date("H:i:s", $currentTimestamp);
        $sendermsg = filter_var($_POST['sendmsg'],FILTER_SANITIZE_STRING);
        $groupmasgsdbName = 'msgsGroup'.$groupname;

        $stm="INSERT INTO $groupmasgsdbName
         (date,sendername,sendermsg,sendertime,senderemail,sendertype)
          VALUES 
          ('$currentDate','$name','$sendermsg','$timeString','$email','$usertype')";
        $conn->prepare($stm)->execute();   
        header('location:workerprofile.php'); 
    }
    
    $stm="SELECT * FROM members WHERE groupname = '$groupname'";
    $q=$conn->prepare($stm);
    $q->execute();
    $dataa=$q->fetchAll();
    $memberscount = 0 ;
    foreach($dataa as $data){
        $memberscount ++ ;
    }

    $stm="SELECT * FROM dev WHERE groupname = '$groupname'";
    $q=$conn->prepare($stm);
    $q->execute();
    $devs =$q->fetchAll();
   
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="./sass/workerprofile.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fingerprintjs2/2.1.0/fingerprint2.min.js"></script>
    <script src="https://kit.fontawesome.com/c0712c6de3.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <title>Profile</title>
</head>
<body>
    
    <div class="contenair">
        <nav>
            <div class="nav-header">
                <p><?php echo $groupname;?></p>
                <p><?php echo $memberscount;?></p>
                <p class="adddev"  data-id="<?php echo $id?>">add devoir</p>
            </div>
            <?php if($usertype == "teacher"){
                 foreach($dataa as $data){
                 $username = $data['name'];
                 $usertype = $data['type'];
                 $isstupdent = false ;

                 if($usertype == "student"){
                    $isstupdent = true ;
                 }
                 
                ?>
                <div class="member" <?php if($isstupdent == true){ echo "data-id=\"" . $data['id'] . "\""; }?> >
                    <p><?php echo $username;?></p>
                    <p><?php echo $usertype;?></p>                
                </div>

            <?php }}?>
            <?php if($usertype == "parent"){
                 foreach($devs as $dev){
                 $date = $dev['devdate'];
                 $devoir = $dev['dev'];
                ?>
                <div class="member"  >
                    <p><?php echo $date;?></p>
                    <p><a class="pdf-director" href="pdfshow.php?cv-name=<?php echo $devoir ;?>" target="blank" > devoir</a></p>
                </div>
            <?php }}?>
        </nav>
        <div class="dash">
            <div class="day">
                <h3>sunday</h3>
                <p>7/8 <?php echo $h1;?></p>
                <p>8/9 <?php echo $h2;?></p>
                <p>9/10 <?php echo $h3;?></p>
                <p>10/11 <?php echo $h4;?></p>
                <p>11/12 <?php echo $h5;?></p>
                <p>1/2 <?php echo $h6;?></p>
                <p>2/3 <?php echo $h7;?></p>
                <p>3/4 <?php echo $h8;?></p>                
            </div>
            <div class="day">
                <h3>monday</h3>
                <p>7/8 <?php echo $mondayh1;?></p>
                <p>8/9 <?php echo $mondayh2;?></p>
                <p>9/10 <?php echo $mondayh3;?></p>
                <p>10/11 <?php echo $mondayh4;?></p>
                <p>11/12 <?php echo $mondayh5;?></p>
                <p>1/2 <?php echo $mondayh6;?></p>
                <p>2/3 <?php echo $mondayh7;?></p>
                <p>3/4 <?php echo $mondayh8;?></p>                
            </div>
            <div class="day">
                <h3>thersday</h3>
                <p>7/8 <?php echo $thersdayh1;?></p>
                <p>8/9 <?php echo $thersdayh2;?></p>
                <p>9/10 <?php echo $thersdayh3;?></p>
                <p>10/11 <?php echo $thersdayh4;?></p>
                <p>11/12 <?php echo $thersdayh5;?></p>
                <p>1/2 <?php echo $thersdayh6;?></p>
                <p>2/3 <?php echo $thersdayh7;?></p>
                <p>3/4 <?php echo $thersdayh8;?></p>                
            </div>
            <div class="day">
                <h3>wednesday</h3>
                <p>7/8 <?php echo $wednesdayh1;?></p>
                <p>8/9 <?php echo $wednesdayh2;?></p>
                <p>9/10 <?php echo $wednesdayh3;?></p>
                <p>10/11 <?php echo $wednesdayh4;?></p>
                <p>11/12 <?php echo $wednesdayh5;?></p>
                <p>1/2 <?php echo $wednesdayh6;?></p>
                <p>2/3 <?php echo $wednesdayh7;?></p>
                <p>3/4 <?php echo $wednesdayh8;?></p>                
            </div>
            <div class="day">
                <h3>tusday</h3>
                <p>7/8 <?php echo $tusdayh1;?></p>
                <p>8/9 <?php echo $tusdayh2;?></p>
                <p>9/10 <?php echo $tusdayh3;?></p>
                <p>10/11 <?php echo $tusdayh4;?></p>
                <p>11/12 <?php echo $tusdayh5;?></p>
                <p>1/2 <?php echo $tusdayh6;?></p>
                <p>2/3 <?php echo $tusdayh7;?></p>
                <p>3/4 <?php echo $tusdayh8;?></p>                
            </div>

        </div>
        <div class="contact-wraper">
            <div class="bg"><img src="./assets/cibwhite.png" alt="" srcset=""></div>
            <div class="bgg"><img src="./assets/cibwhite.png" alt="" srcset=""></div>
            <div class="contact main ">
                <div class="msg-show">
                    <?php
                        //include 'teamhelp.php';
                        include 'inc/conn-db.php';
                        $groupmasgsdbName = 'msgsGroup'.$groupname;
                        $stmt = $conn->prepare("SELECT * FROM $groupmasgsdbName");
                        $stmt->execute();

                        $mesges = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    ?>

                    <div class="msg-display">
                        <?php foreach($mesges as $mesge):?>
                            <div class="displayed" >
                                <p class="infos" ><span><?php echo $mesge['sendername'];?></span><span><?php echo $mesge['sendertime'];?></span><span><?php echo $mesge['sendertype'];?></span> <span><?php echo $mesge['date'];?></span> </p>
                                <p><?php // echo $mesge['senderemail'];?></p>
                                <p class="msg" ><?php echo $mesge['sendermsg'];?></p>                                  

                            </div> 
                        <?php endforeach;?>                
                    </div>
                </div>
                <form action="workerprofile.php" method="post">
                    <div class="input">
                        <input type="text" name="sendmsg" class="sen-dmsg" id="sendmsg" placeholder="Write a messge" >
                    </div>
                    <div class='btn'><button name="send"><img src="./assets/send.png" alt="" srcset=""></button></div>
                </form>
            </div>

        </div>
            <div class="navigation">
                <ul>
                    <li class="list members main-nav-label ">
                        <a href="#">
                            <span class="icon" ><img src="./assets/user.png" alt="" srcset=""></span>
                            <span class="text" >members</span>
                        </a>
                    </li>
                    
                    <li class="list message maingroup  btnformaingroup">
                        <a href="#">
                            <span class="icon" ><img src="./assets/chatbuble.png" alt="" srcset=""></span>
                            <span class="text" >messegs</span>
                        </a>
                    </li>
                    <li class=" home active">

                        <a href="#">
                            <!-- <?php
                                    // $GroupdbName = $companyname . 'Group' . $group;
                                    // $currentDate = date('Y-m-d');
                                    // $stmm = "SELECT * FROM $GroupdbName WHERE date = :currentDate AND workerEmail = :email";
                                    // $qu = $conn->prepare($stmm);
                                    // $qu->bindParam(':currentDate', $currentDate);
                                    // $qu->bindParam(':email', $email);
                                    // $qu->execute();
                            
                                    // $data = $qu->fetchAll(PDO::FETCH_ASSOC);
                            
                                    // // Check if there is any data
                                    // if ($data[0]['workerState']=='not yet') {
                                    //     echo '<span class="icon orange" data-state="you have to chekin" ><img src="./assets/scan.png" alt="" srcset=""></span>';
                                        
                                    // }elseif($data[0]['workerState']=='on work'){
                                    //     include 'inc/conn-db.php';
                                    //     $taskdbName = $companyname . 'tasks';
                                    //     $GroupdbName = $companyname . 'Group' . $group;

                                    //         include 'inc/conn-db.php';
                                    //         $taskdbName = $companyname . 'Tasks';
                                    //         $stmt = $conn->prepare("SELECT * FROM $taskdbName ");
                                    //         $stmt->execute();
                                    //         $allTasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                    //         $foundInProgressTask = false;

                                    //         foreach ($allTasks as $task) {
                                    //             if ($task['TaskState'] === 'on progress') {
                                    //                 $foundInProgressTask = true;
                                    //                 break; // Break the loop once a task with 'on progress' is found
                                    //             }
                                    //         }

                                    //         if ($foundInProgressTask) {
                                    //             echo '<span class="icon orange " data-state="you have a task"><img src="./assets/task.png" alt="" srcset=""></span>';
                                    //         } else {
                                    //             echo '<span class="icon yellow "data-state="you have to chekout" ><img src="./assets/chekout.png" alt="" srcset=""></span>';
                                    //         }
                                            
                                    // } elseif($data[0]['workerState']=='Present'){
                                    //     echo '<span class="icon green" data-state="you have completed your day"><img src="./assets/done.png" alt="" srcset=""></span>';
                                    // }
                                        
                                    
                                        
                                    
                             
                            ?> -->
                            <span class="icon green" data-state="you have completed your day"><img src="./assets/done.png" alt="" srcset=""></span>

                            
                        </a>
                    </li>
                    <li class="list call main-dash-label">
                        <a href="#">
                            <span class="icon" ><img src="./assets/tasks.png" alt="" srcset=""></span>
                            <span class="text" >tasks</span>
                        </a>
                    </li>
                    <li class="list setings secondgroup btnforsecondgroup">
                        <a href="#">
                            <span class="icon" ><img src="./assets/chatbuble.png" alt="" srcset=""></span>
                            <span class="text" >settings</span>
                        </a>
                    </li>
                    
                </ul>
            </div>
    </div>
    <script src="./script/workerprofile.js"></script>
</body>
</html>