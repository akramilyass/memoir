<?php
    session_start();
    // if(!isset($_SESSION['user'])){
    //     header('location:login.php');
    //     exit();
    // }
    $currentDate = date("Y-m-d");
    //____________________add Group_________________________________________________________________
    if(isset($_POST['addGroup'])){
        include 'inc/conn-db.php';
        $gorupName = filter_var($_POST['gorupName'],FILTER_SANITIZE_STRING);
        function createGroupDatabase($groupBdName){
            include 'inc/conn-db.php';

            $GroupdbName ='Group' . $groupBdName;
            
            $createTableQuery = "CREATE TABLE IF NOT EXISTS $GroupdbName (
                `id` INT NOT NULL AUTO_INCREMENT,
                `GroupName` VARCHAR(250) NOT NULL,
                PRIMARY KEY (`id`)
            )";


            // Execute the table creation query
            if ($conn->exec($createTableQuery) !== false) {
                // Table creation was successful, check if it's the first time (no rows)
        
                $rowCountQuery = "SELECT COUNT(*) as count FROM $GroupdbName";
                $rowCount = $conn->query($rowCountQuery)->fetchColumn();
        
                if ($rowCount == 0) {
                    // No rows exist, it's the first time, proceed to insert data
        
                    $currentDate = date("Y-m-d");
                    // Use prepared statements to prevent SQL injection
                    $stm = $conn->prepare("INSERT INTO $GroupdbName
                     (GroupName) VALUES (?)");
                    $stm->bindParam(1, $groupBdName, PDO::PARAM_STR);
        
                    // Execute the insert query
                    $stm->execute();
        
                    // You can return any relevant information or success status here
                } 
            } else {
                // Handle table creation failure
                echo "Table creation failed.";
            }
        }
        $groupBdName = $gorupName;
        createGroupDatabase($groupBdName);
        //__insert to company groups

        $allgroups ='AllGroup';
        $stm="INSERT INTO  $allgroups
            (date,GroupName)
             VALUES 
            ('$currentDate','$gorupName')";
        $conn->prepare($stm)->execute();
        

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
?>

<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="./sass/addgroup.css">
    <script src="https://kit.fontawesome.com/c0712c6de3.js" crossorigin="anonymous"></script>
    <title>add group</title>
</head>
<body>
<a href="profile.php">Dashbord</a>
    <div class="container" >

<!---------------add Groups------------------------------------------------------------->
        <form class="addgroups" action="addgroup.php" method="POST" >
            <div class="addgroup">
                <h3>Add Group</h3>
                <div>
                    <label for="gorupName">Enter the group Name :</label>
                    <input type="text" id="gorupName" name="gorupName" placeholder="gorupName" required >
                </div>
                <!-- <div>
                    <label for="gorupbadg">Enter the group ending time :</label>
                    <select name="gorupbadg" id="gorupbadg" required>
                        <option value="circl">circl</option>
                        <option value="poly">poly</option>
                    </select>
                </div> -->
            </div>
            <button name="addGroup" >Add Group</button>
        </form>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.7.1/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.7.1/ScrollTrigger.min.js"></script>
    <script >
        
//_______prevent spacing in input add group name


document.getElementById('gorupName').addEventListener('input', function(event) {
  // Get the input value
  var inputValue = event.target.value;

  // Remove any spaces from the input value
  var newValue = inputValue.replace(/\s/g, '');
  
  // Update the input field with the modified value
  event.target.value = newValue;
});
    </script>
</body>
</html>



