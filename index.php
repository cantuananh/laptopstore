<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
    $tnv="";
    $nnv="";
    $thang="";
    $nam="";
    $kq="";
   if(isset($_POST["kiemtra"]) ) {
       $thang = $_POST["nhapthang"];
       $nam = $_POST["nhapnam"];
       $kq = "true";
       switch ($thang) {
           case 1:
           case 3:
           case 5:
           case 7:
           case 8:
           case 10:
           case 12:
               $kq = "có 31 ngày";
               break;

           case 4:
           case 6:
           case 10:
           case 11:
               $kq = "có 3 ngày";
               break;

           case 2:
               if ($nam % 400 || ($nam % 4 == 0 && $nam % 100 != 0)) {
                   $kq = "có 29 ngày";
               } else {
                   $kq = "có 28 ngày";
                   break;
               }
       }
   }
?>
<body>
    <form action="" method="POST">
        nhập tháng <input type="number" min=1 max=12 name="nhapthang">
        <br> <br>
        nhập năm <input type="number" min=1 max=10000 name="nhapnam">
        <br><br>
        số ngày trong tháng là <input type="text" name="ketqua" value="<?php echo $kq ;?>" id="">
        <br><br>
        <input type="submit" name="kiemtra">
    </form>
</body>
</html>
