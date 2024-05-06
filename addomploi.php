
<?php
    session_start();
    // if(!isset($_SESSION['user'])){
    //     header('location:login.php');
    //     exit();
    // }
    include 'inc/conn-db.php';
    

    //________________add Worker_____________________________________________________________________
    
    $errors=[];
    if(isset($_POST['addSunday'])){
        $workeremail = filter_var($_POST['workeremail'],FILTER_SANITIZE_STRING);
        $stm="SELECT email FROM members WHERE email ='$workeremail'";
        $q=$conn->prepare($stm);
        $q->execute();
        $data=$q->fetch();

        $groupname = filter_var($_POST['groupname'],FILTER_SANITIZE_STRING);
        $s78 = filter_var($_POST['s78'],FILTER_SANITIZE_STRING);
        $s89 = filter_var($_POST['s89'],FILTER_SANITIZE_STRING);
        $s910 = filter_var($_POST['s910'],FILTER_SANITIZE_STRING);
        $s1011 = filter_var($_POST['s1011'],FILTER_SANITIZE_STRING);
        $s1112 = filter_var($_POST['s1112'],FILTER_SANITIZE_STRING);
        $s12 = filter_var($_POST['s12'],FILTER_SANITIZE_STRING);
        $s23 = filter_var($_POST['s23'],FILTER_SANITIZE_STRING);
        $s34 = filter_var($_POST['s34'],FILTER_SANITIZE_STRING);

        $stm="INSERT INTO sunday 
            (groupname,s78,s89,s910,s1011,s1112,s12,s23,s34)
            VALUES 
            ('$groupname','$s78','$s89','$s910','$s1011','$s1112','$s12','$s23','$s34')";
        $conn->prepare($stm)->execute();
        
        header('location:profile.php'); 

        
        
    }
    if(isset($_POST['addmonday'])){
        $workeremail = filter_var($_POST['workeremail'],FILTER_SANITIZE_STRING);
        $stm="SELECT email FROM members WHERE email ='$workeremail'";
        $q=$conn->prepare($stm);
        $q->execute();
        $data=$q->fetch();

        $groupname = filter_var($_POST['groupname'],FILTER_SANITIZE_STRING);
        $s78 = filter_var($_POST['s78'],FILTER_SANITIZE_STRING);
        $s89 = filter_var($_POST['s89'],FILTER_SANITIZE_STRING);
        $s910 = filter_var($_POST['s910'],FILTER_SANITIZE_STRING);
        $s1011 = filter_var($_POST['s1011'],FILTER_SANITIZE_STRING);
        $s1112 = filter_var($_POST['s1112'],FILTER_SANITIZE_STRING);
        $s12 = filter_var($_POST['s12'],FILTER_SANITIZE_STRING);
        $s23 = filter_var($_POST['s23'],FILTER_SANITIZE_STRING);
        $s34 = filter_var($_POST['s34'],FILTER_SANITIZE_STRING);

        $stm="INSERT INTO monday 
            (groupname,s78,s89,s910,s1011,s1112,s12,s23,s34)
            VALUES 
            ('$groupname','$s78','$s89','$s910','$s1011','$s1112','$s12','$s23','$s34')";
        $conn->prepare($stm)->execute();
        
        header('location:profile.php'); 

        
        
    }
    if(isset($_POST['thersday'])){
        $workeremail = filter_var($_POST['workeremail'],FILTER_SANITIZE_STRING);
        $stm="SELECT email FROM members WHERE email ='$workeremail'";
        $q=$conn->prepare($stm);
        $q->execute();
        $data=$q->fetch();

        $groupname = filter_var($_POST['groupname'],FILTER_SANITIZE_STRING);
        $s78 = filter_var($_POST['s78'],FILTER_SANITIZE_STRING);
        $s89 = filter_var($_POST['s89'],FILTER_SANITIZE_STRING);
        $s910 = filter_var($_POST['s910'],FILTER_SANITIZE_STRING);
        $s1011 = filter_var($_POST['s1011'],FILTER_SANITIZE_STRING);
        $s1112 = filter_var($_POST['s1112'],FILTER_SANITIZE_STRING);
        $s12 = filter_var($_POST['s12'],FILTER_SANITIZE_STRING);
        $s23 = filter_var($_POST['s23'],FILTER_SANITIZE_STRING);
        $s34 = filter_var($_POST['s34'],FILTER_SANITIZE_STRING);

        $stm="INSERT INTO thersday 
            (groupname,s78,s89,s910,s1011,s1112,s12,s23,s34)
            VALUES 
            ('$groupname','$s78','$s89','$s910','$s1011','$s1112','$s12','$s23','$s34')";
        $conn->prepare($stm)->execute();
        
        header('location:profile.php'); 

        
        
    }
    if(isset($_POST['wed'])){
        $workeremail = filter_var($_POST['workeremail'],FILTER_SANITIZE_STRING);
        $stm="SELECT email FROM members WHERE email ='$workeremail'";
        $q=$conn->prepare($stm);
        $q->execute();
        $data=$q->fetch();

        $groupname = filter_var($_POST['groupname'],FILTER_SANITIZE_STRING);
        $s78 = filter_var($_POST['s78'],FILTER_SANITIZE_STRING);
        $s89 = filter_var($_POST['s89'],FILTER_SANITIZE_STRING);
        $s910 = filter_var($_POST['s910'],FILTER_SANITIZE_STRING);
        $s1011 = filter_var($_POST['s1011'],FILTER_SANITIZE_STRING);
        $s1112 = filter_var($_POST['s1112'],FILTER_SANITIZE_STRING);
        $s12 = filter_var($_POST['s12'],FILTER_SANITIZE_STRING);
        $s23 = filter_var($_POST['s23'],FILTER_SANITIZE_STRING);
        $s34 = filter_var($_POST['s34'],FILTER_SANITIZE_STRING);

        $stm="INSERT INTO wednesday 
            (groupname,s78,s89,s910,s1011,s1112,s12,s23,s34)
            VALUES 
            ('$groupname','$s78','$s89','$s910','$s1011','$s1112','$s12','$s23','$s34')";
        $conn->prepare($stm)->execute();
        
        header('location:profile.php'); 

        
        
    }
    if(isset($_POST['tus'])){
        $workeremail = filter_var($_POST['workeremail'],FILTER_SANITIZE_STRING);
        $stm="SELECT email FROM members WHERE email ='$workeremail'";
        $q=$conn->prepare($stm);
        $q->execute();
        $data=$q->fetch();

        $groupname = filter_var($_POST['groupname'],FILTER_SANITIZE_STRING);
        $s78 = filter_var($_POST['s78'],FILTER_SANITIZE_STRING);
        $s89 = filter_var($_POST['s89'],FILTER_SANITIZE_STRING);
        $s910 = filter_var($_POST['s910'],FILTER_SANITIZE_STRING);
        $s1011 = filter_var($_POST['s1011'],FILTER_SANITIZE_STRING);
        $s1112 = filter_var($_POST['s1112'],FILTER_SANITIZE_STRING);
        $s12 = filter_var($_POST['s12'],FILTER_SANITIZE_STRING);
        $s23 = filter_var($_POST['s23'],FILTER_SANITIZE_STRING);
        $s34 = filter_var($_POST['s34'],FILTER_SANITIZE_STRING);

        $stm="INSERT INTO tusday 
            (groupname,s78,s89,s910,s1011,s1112,s12,s23,s34)
            VALUES 
            ('$groupname','$s78','$s89','$s910','$s1011','$s1112','$s12','$s23','$s34')";
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
        <link rel="stylesheet" href="./sass/addomp.css">
    <script src="https://kit.fontawesome.com/c0712c6de3.js" crossorigin="anonymous"></script>
    <title>Add member</title>
</head>
<body>
    <a href="profile.php">Dashbord</a>
   
    <div class="container">
<!---------------add Workers------------------------------------------------------------->
        <form class="addgroups" action="" method="POST" >
            <div class="addWorker">
                <h3>Add omploi</h3>

                <div>
                    <label for="workersalery">Sunday 7:00/8:00</label>
                    <select name="s78" id="s78">
                        <option value="arab">Arab</option>
                        <option value="math">math</option>
                        <option value="sport">sport</option>
                    </select>
                </div>


                <div>
                    <label for="workersalery">Sunday 8:00/9:00</label>
                    <select name="s89" id="s89">
                        <option value="arab">Arab</option>
                        <option value="math">math</option>
                        <option value="sport">sport</option>
                    </select>
                </div>


                <div>
                    <label for="workersalery">Sunday 9:00/10:00</label>
                    <select name="s910" id="s910">
                        <option value="arab">Arab</option>
                        <option value="math">math</option>
                        <option value="sport">sport</option>
                    </select>
                </div>


                <div>
                    <label for="workersalery">Sunday 10:00/11:00</label>
                    <select name="s1011" id="s1011">
                        <option value="arab">Arab</option>
                        <option value="math">math</option>
                        <option value="sport">sport</option>
                    </select>
                </div>


                <div>
                    <label for="workersalery">Sunday 11:00/12:00</label>
                    <select name="s1112" id="s1112">
                        <option value="arab">Arab</option>
                        <option value="math">math</option>
                        <option value="sport">sport</option>
                    </select>
                </div>


                <div>
                    <label for="workersalery">Sunday 1:00/2:00</label>
                    <select name="s12" id="s12">
                        <option value="arab">Arab</option>
                        <option value="math">math</option>
                        <option value="sport">sport</option>
                    </select>
                </div>


                <div>
                    <label for="workersalery">Sunday 2:00/3:00</label>
                    <select name="s23" id="s23">
                        <option value="arab">Arab</option>
                        <option value="math">math</option>
                        <option value="sport">sport</option>
                    </select>
                </div>


                <div>
                    <label for="workersalery">Sunday 3:00/4:00</label>
                    <select name="s34" id="s34">
                        <option value="arab">Arab</option>
                        <option value="math">math</option>
                        <option value="sport">sport</option>
                    </select>
                </div>


                <div>
                    <label for="groupname">Enter the member group  :</label>
                    <select name="groupname" id="groupname">
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
            <button name="addSunday" >Add omploi</button>
        </form>
        <form class="addgroups" action="" method="POST" >
            <div class="addWorker">
                <h3>Add monday</h3>

                <div>
                    <label for="workersalery">monday 7:00/8:00</label>
                    <select name="s78" id="s78">
                        <option value="arab">Arab</option>
                        <option value="math">math</option>
                        <option value="sport">sport</option>
                    </select>
                </div>


                <div>
                    <label for="workersalery">monday 8:00/9:00</label>
                    <select name="s89" id="s89">
                        <option value="arab">Arab</option>
                        <option value="math">math</option>
                        <option value="sport">sport</option>
                    </select>
                </div>


                <div>
                    <label for="workersalery">monday 9:00/10:00</label>
                    <select name="s910" id="s910">
                        <option value="arab">Arab</option>
                        <option value="math">math</option>
                        <option value="sport">sport</option>
                    </select>
                </div>


                <div>
                    <label for="workersalery">monday 10:00/11:00</label>
                    <select name="s1011" id="s1011">
                        <option value="arab">Arab</option>
                        <option value="math">math</option>
                        <option value="sport">sport</option>
                    </select>
                </div>


                <div>
                    <label for="workersalery">monday 11:00/12:00</label>
                    <select name="s1112" id="s1112">
                        <option value="arab">Arab</option>
                        <option value="math">math</option>
                        <option value="sport">sport</option>
                    </select>
                </div>


                <div>
                    <label for="workersalery">monday 1:00/2:00</label>
                    <select name="s12" id="s12">
                        <option value="arab">Arab</option>
                        <option value="math">math</option>
                        <option value="sport">sport</option>
                    </select>
                </div>


                <div>
                    <label for="workersalery">monday 2:00/3:00</label>
                    <select name="s23" id="s23">
                        <option value="arab">Arab</option>
                        <option value="math">math</option>
                        <option value="sport">sport</option>
                    </select>
                </div>


                <div>
                    <label for="workersalery">monday 3:00/4:00</label>
                    <select name="s34" id="s34">
                        <option value="arab">Arab</option>
                        <option value="math">math</option>
                        <option value="sport">sport</option>
                    </select>
                </div>


                <div>
                    <label for="groupname">Enter the member group  :</label>
                    <select name="groupname" id="groupname">
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
            <button name="addmonday" >Add omploi</button>
        </form>
        <form class="addgroups" action="" method="POST" >
            <div class="addWorker">
                <h3>Add monday</h3>

                <div>
                    <label for="workersalery">monday 7:00/8:00</label>
                    <select name="s78" id="s78">
                        <option value="arab">Arab</option>
                        <option value="math">math</option>
                        <option value="sport">sport</option>
                    </select>
                </div>


                <div>
                    <label for="workersalery">monday 8:00/9:00</label>
                    <select name="s89" id="s89">
                        <option value="arab">Arab</option>
                        <option value="math">math</option>
                        <option value="sport">sport</option>
                    </select>
                </div>


                <div>
                    <label for="workersalery">monday 9:00/10:00</label>
                    <select name="s910" id="s910">
                        <option value="arab">Arab</option>
                        <option value="math">math</option>
                        <option value="sport">sport</option>
                    </select>
                </div>


                <div>
                    <label for="workersalery">monday 10:00/11:00</label>
                    <select name="s1011" id="s1011">
                        <option value="arab">Arab</option>
                        <option value="math">math</option>
                        <option value="sport">sport</option>
                    </select>
                </div>


                <div>
                    <label for="workersalery">monday 11:00/12:00</label>
                    <select name="s1112" id="s1112">
                        <option value="arab">Arab</option>
                        <option value="math">math</option>
                        <option value="sport">sport</option>
                    </select>
                </div>


                <div>
                    <label for="workersalery">monday 1:00/2:00</label>
                    <select name="s12" id="s12">
                        <option value="arab">Arab</option>
                        <option value="math">math</option>
                        <option value="sport">sport</option>
                    </select>
                </div>


                <div>
                    <label for="workersalery">monday 2:00/3:00</label>
                    <select name="s23" id="s23">
                        <option value="arab">Arab</option>
                        <option value="math">math</option>
                        <option value="sport">sport</option>
                    </select>
                </div>


                <div>
                    <label for="workersalery">monday 3:00/4:00</label>
                    <select name="s34" id="s34">
                        <option value="arab">Arab</option>
                        <option value="math">math</option>
                        <option value="sport">sport</option>
                    </select>
                </div>


                <div>
                    <label for="groupname">Enter the member group  :</label>
                    <select name="groupname" id="groupname">
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
            <button name="thersday" >Add omploi</button>
        </form>
        <form class="addgroups" action="" method="POST" >
            <div class="addWorker">
                <h3>Add monday</h3>

                <div>
                    <label for="workersalery">monday 7:00/8:00</label>
                    <select name="s78" id="s78">
                        <option value="arab">Arab</option>
                        <option value="math">math</option>
                        <option value="sport">sport</option>
                    </select>
                </div>


                <div>
                    <label for="workersalery">monday 8:00/9:00</label>
                    <select name="s89" id="s89">
                        <option value="arab">Arab</option>
                        <option value="math">math</option>
                        <option value="sport">sport</option>
                    </select>
                </div>


                <div>
                    <label for="workersalery">monday 9:00/10:00</label>
                    <select name="s910" id="s910">
                        <option value="arab">Arab</option>
                        <option value="math">math</option>
                        <option value="sport">sport</option>
                    </select>
                </div>


                <div>
                    <label for="workersalery">monday 10:00/11:00</label>
                    <select name="s1011" id="s1011">
                        <option value="arab">Arab</option>
                        <option value="math">math</option>
                        <option value="sport">sport</option>
                    </select>
                </div>


                <div>
                    <label for="workersalery">monday 11:00/12:00</label>
                    <select name="s1112" id="s1112">
                        <option value="arab">Arab</option>
                        <option value="math">math</option>
                        <option value="sport">sport</option>
                    </select>
                </div>


                <div>
                    <label for="workersalery">monday 1:00/2:00</label>
                    <select name="s12" id="s12">
                        <option value="arab">Arab</option>
                        <option value="math">math</option>
                        <option value="sport">sport</option>
                    </select>
                </div>


                <div>
                    <label for="workersalery">monday 2:00/3:00</label>
                    <select name="s23" id="s23">
                        <option value="arab">Arab</option>
                        <option value="math">math</option>
                        <option value="sport">sport</option>
                    </select>
                </div>


                <div>
                    <label for="workersalery">monday 3:00/4:00</label>
                    <select name="s34" id="s34">
                        <option value="arab">Arab</option>
                        <option value="math">math</option>
                        <option value="sport">sport</option>
                    </select>
                </div>


                <div>
                    <label for="groupname">Enter the member group  :</label>
                    <select name="groupname" id="groupname">
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
            <button name="wed" >Add omploi</button>
        </form>
        <form class="addgroups" action="" method="POST" >
            <div class="addWorker">
                <h3>Add monday</h3>

                <div>
                    <label for="workersalery">monday 7:00/8:00</label>
                    <select name="s78" id="s78">
                        <option value="arab">Arab</option>
                        <option value="math">math</option>
                        <option value="sport">sport</option>
                    </select>
                </div>


                <div>
                    <label for="workersalery">monday 8:00/9:00</label>
                    <select name="s89" id="s89">
                        <option value="arab">Arab</option>
                        <option value="math">math</option>
                        <option value="sport">sport</option>
                    </select>
                </div>


                <div>
                    <label for="workersalery">monday 9:00/10:00</label>
                    <select name="s910" id="s910">
                        <option value="arab">Arab</option>
                        <option value="math">math</option>
                        <option value="sport">sport</option>
                    </select>
                </div>


                <div>
                    <label for="workersalery">monday 10:00/11:00</label>
                    <select name="s1011" id="s1011">
                        <option value="arab">Arab</option>
                        <option value="math">math</option>
                        <option value="sport">sport</option>
                    </select>
                </div>


                <div>
                    <label for="workersalery">monday 11:00/12:00</label>
                    <select name="s1112" id="s1112">
                        <option value="arab">Arab</option>
                        <option value="math">math</option>
                        <option value="sport">sport</option>
                    </select>
                </div>


                <div>
                    <label for="workersalery">monday 1:00/2:00</label>
                    <select name="s12" id="s12">
                        <option value="arab">Arab</option>
                        <option value="math">math</option>
                        <option value="sport">sport</option>
                    </select>
                </div>


                <div>
                    <label for="workersalery">monday 2:00/3:00</label>
                    <select name="s23" id="s23">
                        <option value="arab">Arab</option>
                        <option value="math">math</option>
                        <option value="sport">sport</option>
                    </select>
                </div>


                <div>
                    <label for="workersalery">monday 3:00/4:00</label>
                    <select name="s34" id="s34">
                        <option value="arab">Arab</option>
                        <option value="math">math</option>
                        <option value="sport">sport</option>
                    </select>
                </div>


                <div>
                    <label for="groupname">Enter the member group  :</label>
                    <select name="groupname" id="groupname">
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
            <button name="tus" >Add omploi</button>
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

