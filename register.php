<?php
    include 'inc/conn-db.php';

     $stmm = "SELECT * FROM allgroup ";
     $qu = $conn->prepare($stmm);
     $qu->execute();
     $groups = $qu->fetchAll(PDO::FETCH_ASSOC);
    if(isset($_POST['submit'])){
        include 'inc/conn-db.php';
        $name=filter_var($_POST['name'],FILTER_SANITIZE_STRING);
        $fami=filter_var($_POST['fami'],FILTER_SANITIZE_STRING);
        $childename=filter_var($_POST['childename'],FILTER_SANITIZE_STRING);
        $birth=filter_var($_POST['birth'],FILTER_SANITIZE_STRING);
        $place=filter_var($_POST['place'],FILTER_SANITIZE_STRING);
        $password=filter_var($_POST['password'],FILTER_SANITIZE_STRING);
        $phone=filter_var($_POST['phone'],FILTER_SANITIZE_NUMBER_INT);
        $email=filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
        $class=filter_var($_POST['class'],FILTER_SANITIZE_EMAIL);

        $errors=[];
        // validate name
        if(empty($name)){
            $errors[]="يجب كتابة الاسم";
        }elseif(strlen($name)>100){
            $errors[]="يجب ان لايكون الاسم اكبر من 100 حرف ";
        }

        // validate email
        if(empty($email)){
            $errors[]="يجب كتابة البريد الاكترونى";
        }elseif(filter_var($email,FILTER_VALIDATE_EMAIL)==false){
            $errors[]="البريد الاكترونى غير صالح";
        }

        $stm="SELECT email FROM users WHERE email ='$email'";
        $q=$conn->prepare($stm);
        $q->execute();
        $data=$q->fetch();

        if($data){
            $errors[]="البريد الاكترونى موجود بالفعل";
        }
        // validate password
        if(empty($password)){
                $errors[]="يجب كتابة  كلمة المرور ";
        }elseif(strlen($password)<6){
            $errors[]="يجب ان لايكون كلمة المرور  اقل  من 6 حرف ";
        }


    
        // insert or errros 
        if(empty($errors)){
            // echo "insert db";
            $stm="INSERT INTO users (name,email,phonenumber,password,fami,childname,birth,place,class,state) 
                    VALUES 
                        ('$name','$email','$phone','$password','$fami','$childename','$birth','$place','$class','on progress')";
            $conn->prepare($stm)->execute();
            $_POST['name']='';
            $_POST['email']='';



            header('location:register.php');
        }
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">    <link rel="stylesheet" href="./sass/index.css">
    <script src="https://kit.fontawesome.com/c0712c6de3.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./sass/login.css">
    <title>register</title>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="nav">
                <a href="login.php">دخول</a>
                <a href="index.php">الصفحة الرئيسية</a>
            </div>
            <div class="logo">
            <img src="./assets/logo.png" alt="" srcset="">
            </div>
            <div class="info">
                <?php 
                    if(isset($errors)){
                        if(!empty($errors)){
                            
                            foreach($errors as $msg){
                                echo "<p>".$msg . "</p>";
                                break;
                            }
                        }
                    }
                    else{
                        echo "<h1>تسجيل الدخول</h1>";
                    }
                ?>
                
            </div>
        </div>
         <form class='form' action="register.php" method="POST">
                
            <div class="div1" ><label for="name"> Your name </label><input type="text" value="<?php if(isset($_POST['name'])){echo $_POST['name'];} ?>" id="name" name="name" placeholder="Enter Your Name"></div>
            <div class="div1" ><label for="fami"> Your family Name </label><input type="text" value="<?php if(isset($_POST['fami'])){echo $_POST['fami'];} ?>" id="fami" name="fami" placeholder="Enter Your family Name"></div>
            <div class="div1" ><label for="childename"> Name of your child </label><input type="text" value="<?php if(isset($_POST['childename'])){echo $_POST['childename'];} ?>" id="childename" name="childename" placeholder=" Enter Name of your childe"></div>
            <div class="div1" ><label for="birth"> Birth day</label><input type="date" value="<?php if(isset($_POST['birth'])){echo $_POST['birth'];} ?>" id="birth" name="birth" placeholder=" Enter birth day of your childe"></div>
            <div class="div1" ><label for="place"> Place of birth </label><input type="text" value="<?php if(isset($_POST['place'])){echo $_POST['place'];} ?>" id="place" name="place" placeholder=" Enter place Birth of your childe"></div>
            <div class="div1" >
            <label for="class">Enter the classroom  :</label>
            <select name="class" id="class">
                <?php foreach($groups as $group){ ?>
                    <option value="<?php echo $group['GroupName']; ?>"><?php echo $group['GroupName']; ?></option>
                <?php } ?>
            </select>
            </div>
            <div class="div2"><label for="phone"> phone Number</label><input type="number" value="<?php if(isset($_POST['phone'])){echo $_POST['phone'];} ?>"  id="phone" name="phone" placeholder=" Enter phone Number"></div>
            <div class="div2"><label for="email"> Email</label><input type="email" value="<?php if(isset($_POST['email'])){echo $_POST['email'];} ?>"  id="email" name="email" placeholder=" Enter Email"></div>
            <div class="div3"><label for="password">Password</label><input type="password" id="password" name="password" placeholder="password"></div>
            <button name="submit"> ارسال طلب </button>
        </form>   
    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.7.1/gsap.min.js"></script>

    <script src="./script/register.js"></script>
</body>
</html>