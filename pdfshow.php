<?php



    $cvname= $_GET['cv-name'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    *{
        margin:0;
        padding:0;
        box-sizing:border-box;
    }
    embed{
        width:100%; 
        height:100vh;
    }
</style>
<body>
    

<embed src="assets/<?php echo $cvname ; ?>" type="application/pdf"   />

</body>
</html>