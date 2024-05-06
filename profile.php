<?php
    session_start();
    // if(!isset($_SESSION['user'])){
    //     header('location:login.php');
    //     exit();
    // }
    include 'inc/conn-db.php';
    //________creat data base forech user
    $email ="akram@gmail.com";
    $stm="SELECT * FROM users WHERE email ='$email'";
    $q=$conn->prepare($stm);
    $q->execute();
    $data=$q->fetch();    






    //________________add Worker_____________________________________________________________________
    if(isset($_POST['addWorker'])){
        $CompanyName = $data['companyName'];
        $workerName  = filter_var($_POST['workerName'],FILTER_SANITIZE_STRING);
        $workerGroup  = filter_var($_POST['workergroup'],FILTER_SANITIZE_STRING);
        $workersalery = filter_var($_POST['workersalery'],FILTER_SANITIZE_STRING);
        $workerjobtitle = filter_var($_POST['workerjobtitle'],FILTER_SANITIZE_STRING);
        $workerpassword = filter_var($_POST['workerpassword'],FILTER_SANITIZE_STRING);
        $hashedPassword = password_hash($workerpassword, PASSWORD_DEFAULT);
        $workeremail = filter_var($_POST['workeremail'],FILTER_SANITIZE_STRING);
        $workerphone = filter_var($_POST['workerphone'],FILTER_SANITIZE_STRING);
        $stm="INSERT INTO $UserName 
            (subworker,subworkergroup,subworkercompanyname,subworkerEmail,subworkerPassword,subworkerJobTitle,subworkersalery,subworkerPhoneNumber,subworkerId)
             VALUES 
            ('$workerName','$workerGroup','$CompanyName','$workeremail','$hashedPassword','$workerjobtitle','$workersalery','$workerphone','not yet')";
        $conn->prepare($stm)->execute();
        header('location:profile.php');
        /*`workername` VARCHAR(250) NOT NULL,
        `workeremail` VARCHAR(250) NOT NULL,
        `workerpassword` VARCHAR(250) NOT NULL,
        `workerage` VARCHAR(250) NOT NULL,
        `workerjobtitle` VARCHAR(250) NOT NULL,
        `workerlate` VARCHAR(250) NOT NULL,
        `workerworktime` VARCHAR(250) NOT NULL,
        `workerchekin` VARCHAR(250) NOT NULL,
        `workerchekout` VARCHAR(250) NOT NULL,
        `workerapsent` VARCHAR(250) NOT NULL,*/
    }

    $currentDate = date("Y-m-d");
    //____________________add Group_________________________________________________________________
    if(isset($_POST['addGroup'])){
        
        $gorupEndingTime = filter_var($_POST['gorupEndingTime'],FILTER_SANITIZE_STRING);
        $gorupEndingTimer = filter_var($_POST['endtimer'],FILTER_SANITIZE_STRING);
        $gorupStartingTime = filter_var($_POST['gorupStartingTime'],FILTER_SANITIZE_STRING);
        $gorupStartingTimer = filter_var($_POST['starttimer'],FILTER_SANITIZE_STRING);
        $gorupName = filter_var($_POST['gorupName'],FILTER_SANITIZE_STRING);
        function createGroupDatabase($groupBdName){
            $email = $_SESSION['user']['email'];
            include 'inc/conn-db.php';
            $stm="SELECT * FROM users WHERE email ='$email'";
            $q=$conn->prepare($stm);
            $q->execute();
            $data=$q->fetch(); 
            $companyName = $data['companyName'];

            $GroupdbName = $companyName . 'Group' . $groupBdName;
            
            $createTableQuery = "CREATE TABLE IF NOT EXISTS $GroupdbName (
                `id` INT NOT NULL AUTO_INCREMENT,
                `date` VARCHAR(250) NOT NULL,
                `GroupName` VARCHAR(250) NOT NULL,
                `Groupin` VARCHAR(250) NOT NULL,
                `Groupout` VARCHAR(250) NOT NULL,
                `workerName` VARCHAR(250) NOT NULL,
                `workerEmail` VARCHAR(250) NOT NULL,
                `workerjobTitle` VARCHAR(250) NOT NULL,
                `workerTimeIn` VARCHAR(250) NOT NULL,
                `workerTimeout` VARCHAR(250) NOT NULL,
                `workerState` VARCHAR(250) NOT NULL,
                PRIMARY KEY (`id`)
            )";
        
            // Execute the table creation query
            if ($conn->exec($createTableQuery) !== false) {
                // Table creation was successful, check if it's the first time (no rows)
        
                $rowCountQuery = "SELECT COUNT(*) as count FROM $GroupdbName";
                $rowCount = $conn->query($rowCountQuery)->fetchColumn();
        
                if ($rowCount == 0) {
                    // No rows exist, it's the first time, proceed to insert data
        
                    $gorupEndingTime = filter_var($_POST['gorupEndingTime'], FILTER_SANITIZE_STRING);
                    $gorupEndingTimer = filter_var($_POST['endtimer'], FILTER_SANITIZE_STRING);
                    $gorupStartingTime = filter_var($_POST['gorupStartingTime'], FILTER_SANITIZE_STRING);
                    $gorupStartingTimer = filter_var($_POST['starttimer'], FILTER_SANITIZE_STRING);
                    $currentDate = date("Y-m-d");
                    // Use prepared statements to prevent SQL injection
                    $stm = $conn->prepare("INSERT INTO $GroupdbName (date,GroupName, Groupin, Groupout) VALUES (?,?, ?, ?)");
                    $stm->bindParam(1, $currentDate, PDO::PARAM_STR);
                    $stm->bindParam(2, $groupBdName, PDO::PARAM_STR);
                    $stm->bindParam(3, $gorupStartingTime, PDO::PARAM_STR);
                    $stm->bindParam(4, $gorupEndingTime, PDO::PARAM_STR);
        
                    // Execute the insert query
                    $stm->execute();
        
                    // You can return any relevant information or success status here
                } 
            } else {
                // Handle table creation failure
                echo "Table creation failed.";
            }
        }
        
        // Example usage
        $groupBdName = $gorupName;
        createGroupDatabase($groupBdName);

        function createmsgsDatabase(){
            $email = $_SESSION['user']['email'];
            $gorupName = filter_var($_POST['gorupName'],FILTER_SANITIZE_STRING);
            include 'inc/conn-db.php';
            $stm="SELECT * FROM users WHERE email ='$email'";
            $q=$conn->prepare($stm);
            $q->execute();
            $data=$q->fetch(); 
            $companyName = $data['companyName'];
    
            $groupmasgsdbName = $companyName .'msgsGroup'.$gorupName;
            
            $createmsgsTableQuery = "CREATE TABLE IF NOT EXISTS $groupmasgsdbName (
                `id` INT NOT NULL AUTO_INCREMENT,
                `date` VARCHAR(250) NOT NULL,
                `sendername` VARCHAR(250) NOT NULL,
                `sendermsg` VARCHAR(250) NOT NULL,
                `sendertime` VARCHAR(250) NOT NULL,
                `senderemail` VARCHAR(250) NOT NULL,
                PRIMARY KEY (`id`)
            )";
            $conn->exec($createmsgsTableQuery);
        }
        createmsgsDatabase();
        header('location:profile.php');
    }





//________________________exract data About members
    $stm="SELECT * FROM members ";
    $q=$conn->prepare($stm);
    $q->execute();
    $data=$q->fetch(); 

    //-handl delet worker
    if (isset($_GET['delete'])) {
        $workerId = $_GET['delete'];
        $stm = "DELETE FROM members WHERE id = '$workerId'";
        $conn->prepare($stm)->execute();
        header('location:profile.php');
    }

?>

                






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="./sass/profile.css">
    <script src="https://kit.fontawesome.com/c0712c6de3.js" crossorigin="anonymous"></script>
    <title>PROFILE</title>
</head>
<body>
    <input type="checkbox" name="nav-bar" id="nav-bar">
    <label class="main-nav-label" for="nav-bar"><i class="fa-solid fa-bars"></i></label>
    <header >
       
        <div class="user-info">
            <p class="user-name" >kouadira</p>
                          
        </div>
        <a href="logout.php">Logout</a> 
    </header>
    <div class="wraper">
        <div class="logo"><img src="./assets/logo.png" alt="" srcset=""></div>
        <div class="dashbord">
            <div class="dash-header">
                <div class="info-display">
                    <p class="info-title"></p>
                    <h1 class="info-data"> مرحبا</h1>
                </div>
                <div class="count">
                    <div class="countgroups">
                        <img src="./assets/chart.png" alt="" srcset="">
                        <p>Groups</p>
                        <p class="groupnumber span"><?php
                           $stmt = "SELECT * FROM allgroup";
                           $qq = $conn->prepare($stmt);
                           $qq->execute();
                           $tables = $qq->fetchAll(PDO::FETCH_ASSOC); // or PDO::FETCH_BOTH
                           // Count the number of rows fetched
                           $groupscount = count($tables);
                           echo $groupscount;
                        ?></p>
                    </div>
                    <div class="workers-count">
                        <img src="./assets/userr.png" alt="" srcset="">
                        <p>Members</p>  
                        <p class="workernumber span" ><?php
                            $stm = "SELECT * FROM members";
                            $q = $conn->prepare($stm);
                            $q->execute();

                            $rowCount = $q->rowCount(); // Get the number of rows

                            echo '<span >'. $rowCount.'</span>';

                            
                        ?></p>
                    </div>
                    <!-- <div class="tasks-count ">
                        <img src="./assets/star.png" alt="" srcset="">
                        <p>Tasks</p>
                        <p class="tasknumber span"><?php // echo $TaskCount ; ?></p>
                        
                    </div> -->
                </div>
            </div>

            
            <div class="nav show " >
                <div class="nav-section">
                    <div class="buttons">
                        <button class='addmemberbtn' ><img src="./assets/plus.png" alt="" srcset="">add member</button>
                        <button class='addgroupbtn'><img src="./assets/box.png" alt="" srcset="">add group</button>
                        <!-- <button class='addtaskbtn' ><img src="./assets/bord.png" alt="" srcset="">add task</button>  -->
                        <button class="badg" ><img src="./assets/badg.png" alt="" srcset="">requests</button> 
                        <button class='delletworker'><img src="./assets/x.png" alt="" srcset="">delete member</button>
                        <!-- <button ><img src="./assets/msg.png" alt="" srcset="">messges</button>
                        <button><img src="./assets/heart.png" alt="" srcset="">favorate</button>-->
                        <button class="addomploi" ><img src="./assets/magic.png" alt="" srcset="">add omploi</button> 
                    </div>

                </div>    
                <div class="groups-section">
                    <div class="slider">

                        
                            <?php
                            $stmt = "SELECT * FROM allgroup";
                            $qq = $conn->prepare($stmt);
                            $qq->execute();
                            $groups = $qq->fetchAll(PDO::FETCH_ASSOC); // or PDO::FETCH_BOTH
                            foreach($groups as $group ){
                                $groupname=$group['GroupName'];
                                echo "<div class='group' data-id='" . $group['id'] . "'>";
                                echo "<p class='hi'>";
                                        echo $groupname;
                                    echo "</p>";
                                echo "</div>";
                            }

                            ?>
                        
                    </div>
                
                </div>
            </div>
            
            <div class="workerswraper hide">
                <div class="workers-data">  
                    <div class="names-section">
                        <div class="names">
                            <?php
                            $stm = "SELECT * FROM members";
                            $q = $conn->prepare($stm);
                            $q->execute();

                            $rowCount = $q->rowCount();
                                if ($rowCount > 0) {
                                    // Loop through all the fetched data
                                    while ($data = $q->fetch(PDO::FETCH_ASSOC)) {
                                        // Access and echo the data from the second column
                                       echo'<div class="worker" data-id="'.$data[array_keys($data)[0]].' ">' ;
                                    
                                            echo '<p class="worker-name" > '. $data[array_keys($data)[1]] .' </p>';
                                            
                                        echo'</div>' ;
                                    }
                                } else {
                                    echo "No workers yet.";
                                }
                            ?>                    
                        </div>

                    </div> 
                
                </div>
            </div>                  
            <div class="workerdelletswraper hide">
                <div class="workers-data">  
                    <div class="names-section">
                        <div class="names">
                            <?php
                            $stm = "SELECT * FROM members";
                            $q = $conn->prepare($stm);
                            $q->execute();

                            $rowCount = $q->rowCount();
                                if ($rowCount > 0) {
                                    // Loop through all the fetched data
                                    while ($data = $q->fetch(PDO::FETCH_ASSOC)) {
                                        // Access and echo the data from the second column
                                       echo'<div  data-id="'.$data[array_keys($data)[0]].' ">' ;
                                    
                                            echo '<p class="worker-name" > '. $data[array_keys($data)[1]] .' </p>';                                            
                                            echo '<a class="a" href="profile.php?delete=' . $data[array_keys($data)[0]] . '" class="deleteButton"><img src="./assets/x.png" alt="" srcset=""> </a>';
                                            
                                        echo'</div>' ;
                                    }
                                } else {
                                    echo "No workers yet.";
                                }
                            ?>                    
                        </div>

                    </div> 
                
                </div>
            </div>
            <div class="msgs hide">
                <div class="div">
                        <?php
                            $stmt = "SELECT * FROM allgroup";
                            $qq = $conn->prepare($stmt);
                            $qq->execute();
                            $groups = $qq->fetchAll(PDO::FETCH_ASSOC); // or PDO::FETCH_BOTH
                            foreach($groups as $group ){
                                $groupname=$group['GroupName'];
                                echo "<p class='groupname'>";
                                        echo $groupname;
                                    echo "</p>";
                            }

                        ?>
                </div>
                
            </div>
            <div class="navigation">
                <ul>
                    <li class="list members ">
                        <a href="#">
                            <span class="icon" ><img src="./assets/user.png" alt="" srcset=""></span>
                            <span class="text" >members</span>
                        </a>
                    </li>
                    
                    <li class="list msgbtn">
                        <a href="#">
                            <span class="icon" ><img src="./assets/chatbuble.png" alt="" srcset=""></span>
                            <span class="text" >messegs</span>
                        </a>
                    </li>
                    <li class="list home active">
                        <a href="#">
                            <span class="icon" ><img src="./assets/homeoutline.png" alt="" srcset=""></span>
                            <span class="text" >Home</span>
                        </a>
                    </li>
                    <li class="list ">
                        <a href="#">
                            <span class="icon" ><img src="./assets/tasks.png" alt="" srcset=""></span>
                            <span class="text" >tasks</span>
                        </a>
                    </li>
                    <li class="list setings">
                        <a href="#">
                            <span class="icon" ><img src="./assets/settingsoutline.png" alt="" srcset=""></span>
                            <span class="text" >settings</span>
                        </a>
                    </li>
                    <div class="indecator"></div>
                </ul>
            </div>
            
        </div>  
    </div>
    
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.7.1/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.7.1/ScrollTrigger.min.js"></script>
    <script src="./script/profile.js"></script>
</body>
</html>













