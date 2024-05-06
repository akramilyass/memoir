<?php
    session_start();
    // if(!isset($_SESSION['user'])){
    //     header('location:login.php');
    //     exit();
    // }
    include 'inc/conn-db.php';
    $id = $_COOKIE['id'];

    $stm="SELECT * FROM members WHERE id ='$id'";
    $q=$conn->prepare($stm);
    $q->execute();
    $data=$q->fetch();
    $name = $data['name'];
    $groupname = $data['groupname'];
    if(isset($_POST['addnote'])){
        $mada = filter_var($_POST['mada'],FILTER_SANITIZE_STRING);
        $note = filter_var($_POST['note'],FILTER_SANITIZE_STRING);

        $stm="INSERT INTO  notes
            (name,groupname,mada,note)
             VALUES 
            ('$name','$groupname','$mada','$note')";
        $conn->prepare($stm)->execute();
        header('location:notes.php');

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./sass/note.css">
    <script src="https://kit.fontawesome.com/c0712c6de3.js" crossorigin="anonymous"></script>
    <title><?php echo $name ; ?></title>
</head>
<body>
    
    <header>
        <p><a href="workerprofile.php">profile</a></p>
        <p><?php echo $name ; ?></p> 
        <p><?php echo $groupname ; ?></p>             
    </header>

    
    <div class="container" >

        <form class="addgroups" action="notes.php" method="POST" >
            <div class="addgroup">
                <h3>Add note</h3>
                <div>
                    <label for="mada">Enter the mada Name :</label>
                    <input type="text" id="mada" name="mada" placeholder="mada" required >
                </div>
                <div>
                    <label for="note">Enter the note Name :</label>
                    <input type="text" id="note" name="note" placeholder="note" required >
                </div>
            </div>
            <button name="addnote" >Add Group</button>
        </form>
    </div>
    <div class="infos" >
        <h1>Notes</h1>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.7.1/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.7.1/ScrollTrigger.min.js"></script>
    <script src="./script/workerinfos.js"></script>
</body>
</html>

