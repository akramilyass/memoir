<?php
    include 'inc/conn-db.php';

    $id = $_COOKIE['id'];
    $stm="SELECT * FROM members WHERE id ='$id'";
    $q=$conn->prepare($stm);
    $q->execute();
    $data=$q->fetch();
    $name = $data['name'];
    $groupname = $data['groupname'];
    $cuurentdate = date("Y-m-d");
    //____________________add worker 
    if(isset($_POST['addworker'])){
        include 'inc/conn-db.php';
        $name  = filter_var($_POST['name'],FILTER_SANITIZE_STRING);
        $date  = filter_var($_POST['date'],FILTER_SANITIZE_STRING);
        

        // File upload handling
        $pdfFileName = time() . '-' . uniqid() . '-' . $_FILES["pdfFile"]["name"];

        // Set the temporary file name
        $tname = $_FILES["pdfFile"]["tmp_name"];
    
        // Set the upload directory (relative path to "assets" in the same root)
        $upDir = 'assets';
    
        // Check if the directory exists, if not, create it
        if (!file_exists($upDir)) {
            mkdir($upDir, 0777, true);
        }
    
        // Move the uploaded file to the specified directory
        $destination = $upDir . '/' . $pdfFileName;
        
        if (move_uploaded_file($tname, $destination)) {
            echo "File uploaded successfully.";
        } else {
            echo "Error uploading file.";
        }
        /*
        $stm="INSERT INTO workers 
            (name,email,jobTitle,age,dis,gender,exGneral,yearsEx,place,langNum,degree,coverLetter,CVname,CVdata)
             VALUES 
            ('$name','$email','$jobTitle','$age','$dis','$gender','$exGneral','$yearsEx','$place','$langNum','$degree','$coverLetter','$pdfFileName','$pdfData')";
        */
        $stm = $conn->prepare("INSERT INTO dev 
        (profname,cuurentdate,devdate,groupname,dev)
        VALUES 
        (?, ?, ?, ?, ?)");

        $stm->bindParam(1, $name);
        $stm->bindParam(2, $cuurentdate);
        $stm->bindParam(3, $date);
        $stm->bindParam(4, $groupname);
        $stm->bindParam(5, $pdfFileName);
        $stm->execute();

        header('location:adddev.php');
    
    }

 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900;1000&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="./sass/addgroup.css">
    <script src="https://kit.fontawesome.com/c0712c6de3.js" crossorigin="anonymous"></script>
    <title>add devoir</title>
</head>
<body>
    <a href="workerprofile.php">Profile</a>
    <div class="container">
        <script>
            let addcvbtn = document.querySelector('#addcvbtn');

            addcvbtn.addEventListener('click',()=>{
                window.location='profile.php'
            })
        </script>
        <form class="addgroups" action="adddev.php" method="POST" enctype="multipart/form-data">
            <h1> add devoire</h1>
            <div><label for="pdfFile">devoir</label><input type="file" id="pdfFile" name="pdfFile" placeholder="pdfFile"></div>
            <div><label for="date">devoir date</label><input type="date" id="date" name="date" placeholder="date"></div>
            <div><button name="addworker">Add</button></div>
        
        </form>
    </div>   
</body>
</html>













