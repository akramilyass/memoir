<?php
    include 'inc/conn-db.php';

    $stmm = "SELECT * FROM users ";
    $qu = $conn->prepare($stmm);
    $qu->execute();
    $data = $qu->fetchAll(PDO::FETCH_ASSOC);

    if(isset($_GET['accept'])){
        $reqid = $_GET['accept'];
        $stmm = "SELECT * FROM users WHERE id ='$reqid'";
        $qu = $conn->prepare($stmm);
        $qu->execute();
        $data = $qu->fetch();
        $reqname = $data['name'] ;
        $reqemail = $data['email'] ;
        $reqphonenumber = $data['phonenumber'] ;
        $reqpassword = $data['password'] ;
        $reqfami = $data['fami'] ;
        $reqchildname = $data['childname'] ;
        $reqbirth = $data['birth'] ;
        $reqplace = $data['place'] ;
        $reqclass = $data['class'] ;
        $stm="INSERT INTO members 
        (name,email,password,type,phonenumber,groupname)
        VALUES 
        ('$reqname','$reqemail','$reqpassword','parent','$reqchildname','$reqclass')";
        $conn->prepare($stm)->execute();

        $stm = "DELETE FROM users WHERE id = '$reqid'";
        $conn->prepare($stm)->execute();

        header('location:orders.php');
    }

?>

                






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="./sass/orders.css">
    <script src="https://kit.fontawesome.com/c0712c6de3.js" crossorigin="anonymous"></script>
    <title>REQ</title>
</head>
<body>
    <div class="wraper">
        <div  class="req" >
                <p> parent name</p>
                <p> family name</p>
                <p>childe name </p>
                <p>birth day</p>
                <p>place of birth</p>
                <p>class</p>
                <p>action</p>

            </div>
        <?php foreach($data as $req){?>
            <div  class="req" >
                <p><?php echo $req['name'] ?></p>
                <p><?php echo $req['fami'] ?></p>
                <p><?php echo $req['childname'] ?></p>
                <p><?php echo $req['birth'] ?></p>
                <p><?php echo $req['place'] ?></p>
                <p><?php echo $req['class'] ?></p>
                <a class="a" href="orders.php?accept=<?php echo $req['id'] ?>" >accept </a>

            </div>
        <?php } ?>        
    </div>

</body>
</html>













