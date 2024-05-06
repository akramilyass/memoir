
<?php
    session_start();
    // if(!isset($_SESSION['user'])){
    //     header('location:login.php');
    //     exit();
    // }
    include 'inc/conn-db.php';
    

    //________________add Worker_____________________________________________________________________
    
    $errors=[];
    if(isset($_POST['addWorker'])){
        $workeremail = filter_var($_POST['workeremail'],FILTER_SANITIZE_STRING);
        $stm="SELECT email FROM members WHERE email ='$workeremail'";
        $q=$conn->prepare($stm);
        $q->execute();
        $data=$q->fetch();

        if($data){
            $errors[]="البريد الاكترونى موجود بالفعل";
        }else{
            $email = $_SESSION['user']['email'];
            include 'inc/conn-db.php';
            $workerName  = filter_var($_POST['workerName'],FILTER_SANITIZE_STRING);
            $groupname  = filter_var($_POST['workergroup'],FILTER_SANITIZE_STRING);
            $workerjobtitle = filter_var($_POST['workerjobtitle'],FILTER_SANITIZE_STRING);
            $workerpassword = filter_var($_POST['workerpassword'],FILTER_SANITIZE_STRING);
            $hashedPassword = password_hash($workerpassword, PASSWORD_DEFAULT);
            $workeremail = filter_var($_POST['workeremail'],FILTER_SANITIZE_STRING);
            $workerphone = filter_var($_POST['workerphone'],FILTER_SANITIZE_STRING);

            $stm="INSERT INTO members 
                (name,email,password,type,phonenumber,groupname)
                VALUES 
                ('$workerName','$workeremail','$workerpassword','$workerjobtitle','$workerphone','$groupname')";
                $conn->prepare($stm)->execute();
                header('location:profile.php'); 
            
        }

        
        
    }


   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="./sass/addgroup.css">
    <script src="https://kit.fontawesome.com/c0712c6de3.js" crossorigin="anonymous"></script>
    <title>Add member</title>
</head>
<body>
<a href="profile.php">Dashbord</a>
    <div class="container">
    <!---------------add Workers------------------------------------------------------------->
        <form class="addgroups" action="addworker.php" method="POST" >
            <div class="addWorker">
                <h3>Add member</h3>
                <div>
                    <label for="workerName">Enter the member Name :</label>
                    <input type="text" id="workerName" name="workerName" placeholder="worker Name" value="<?php if(isset($_POST['workerName'])){echo $_POST['workerName'];} ?>" required >
                </div>

                <div>
                    <label for="workerphone">Enter the member phone number  :</label>
                    <input type="number" id="workerphone" name="workerphone" value="<?php if(isset($_POST['workerphone'])){echo $_POST['workerphone'];} ?>" placeholder="member phone" required >
                </div>

                <div>
                    <label for="workeremail" class='<?php  if(!empty($errors)){echo"red";}?>'>Enter the member email  :</label>
                    <input type="text" id="workeremail" name="workeremail" value="<?php if(isset($_POST['workeremail'])){echo $_POST['workeremail'];} ?>" placeholder="member email" required >
                </div>
                <div>
                    <label for="workerpassword">Enter the member password  :</label>
                    <input type="password" id="workerpassword" name="workerpassword" value="<?php if(isset($_POST['workerpassword'])){echo $_POST['workerpassword'];} ?>" placeholder="member password" required >
                </div>

                <div>
                    <label for="workerjobtitle">Enter the member type  :</label>
                    <select name="workerjobtitle" id="workerjobtitle">
                        <option value="parent">parent</option>
                        <option value="student">student</option>
                        <option value="teacher">teacher</option>
                    </select>
                </div>
<!--
                <div>
                    <label for="workersalery">Enter the worker salery  :</label>
                    <input type="number" id="workersalery" name="workersalery" placeholder="workersalery" required >
                    <select name="currency" id="currency">
                        <option value="AM">AED</option>
                        <option value="PM">USD</option>
                        <option value="PM">EURO</option>
                        <option value="PM">DA</option>
                    </select>
                </div>-->
                <div>
                    <label for="workergroup">Enter the member group  :</label>
                    <select name="workergroup" id="workergroup">
                    <?php
                        
                            $prefix = $UserName.'Group'. '%';
                            $stm = "SHOW TABLES LIKE ?";
                            $q = $conn->prepare($stm);
                            $q->execute([$prefix]);

                            $tables = $q->fetchAll(PDO::FETCH_COLUMN);

                            // Count the number of matching tables
                            $matchingTableCount = count($tables);
                            echo "Number Groups: $matchingTableCount<br><br><br>";
                            foreach ($tables as $table) {
                                // Get all columns from the table
                                $columnsStm = "SHOW COLUMNS FROM $table";
                                $columnsQ = $conn->prepare($columnsStm);
                                $columnsQ->execute();
                            
                                // Fetch all columns for the table
                                $allColumns = $columnsQ->fetchAll(PDO::FETCH_COLUMN);
                            
                                // Check if 'mainGroupName' column exists in the result
                                if (in_array('mainGroupName', $allColumns)) {
                                    // If 'mainGroupName' column exists, select it along with 'GroupName'
                                    $dataStm = "SELECT mainGroupName, GroupName FROM $table";
                                } else {
                                    // If 'mainGroupName' column doesn't exist, select only 'GroupName'
                                    $dataStm = "SELECT GroupName FROM $table";
                                }
                            
                                $dataQ = $conn->prepare($dataStm);
                                $dataQ->execute();
                            
                                $rowData = $dataQ->fetch(PDO::FETCH_ASSOC);
                               // $worekersecondarygroup = isset($rowData['mainGroupName']) ? $rowData['GroupName'] : 'none';
                                if ($rowData !== false) {
                                    // Check if 'mainGroupName' exists in the result
                                

                                    if (isset($rowData['mainGroupName'])) {
                                        $G = $rowData['mainGroupName'];
                                        // Display both 'mainGroupName' and 'GroupName' in the option
                                        $groupname = $rowData['GroupName'];
                                        echo "<option class='group " . $rowData['mainGroupName'] . " " . $groupname . "' data-value='$groupname' value='$G' > " . $rowData['mainGroupName'] . " - " . $groupname . "</option>";
                                    } else {
                                        // Display only 'GroupName' in the option
                                        $G = $rowData['GroupName'];
                                        echo "<option class='group' value='{$G}' > " . $rowData['GroupName'] . "</option>";
                                    }
                                } else {
                                    echo "No data found for table $table.<br>";
                                }
                            
                                echo "<br>";
                            }
                            
                    ?>
                    
                    </select>
                        <?php 
                            if(isset($_COOKIE['maingroupName'])){
                                $maingroupName = $_COOKIE['maingroupName'];
                            
                                echo '<select name="workerseconderygroup" id="workerseconderygroup">';
                                
                                echo "<option class='group' value='$G' > " . $maingroupName . " </option>";
        

                                        
                                echo'</select>';
                            }
                        ?>
                </div>
            </div>
            <button name="addWorker" >Add member</button>
        </form>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.7.1/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.7.1/ScrollTrigger.min.js"></script>
    <script defer>
        
                

        var workergroupSelect = document.getElementById('workergroup');

        workergroupSelect.addEventListener('click', function() {
            // Get the selected option
            var selectedOption = workergroupSelect.options[workergroupSelect.selectedIndex];

            // Access the data-value attribute value using dataset
            var dataValue = selectedOption.dataset.value;

            // Check if data-value is present
            if (dataValue) {
                // Set the cookie
                console.log('Setting cookie:', dataValue);
                document.cookie = `secondarygroupName=${dataValue}`;
               // location.reload();
            } else {
                // Remove the cookie
                console.log('Removing cookie');
                document.cookie = 'secondarygroupName=; expires=Thu, 01 Jan 1970 00:00:00 UTC;';
                //document.cookie = 'secondarygroupName=; expires=Thu, 01 Jan 1970 00:00:00 UTC;';

              //  document.cookie = 'secondarygroupName=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/addworker.php;';
               // location.reload();
            }
        });
        // Get all cookies

    </script>

</body>
</html>

