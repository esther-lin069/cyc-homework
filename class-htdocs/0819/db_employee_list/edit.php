<?php 
require ("config.php");

$sql_select = "select * from city";
$result_select = mysqli_query($link,$sql_select);

if(isset($_GET['id'])){
    if(!is_numeric($_GET['id']))
        die ("id should be number");
    
    $id = $_GET['id'];
    $sql = "select * from employee where `ID` = $id";
    $result = mysqli_query($link,$sql);

    $row = mysqli_fetch_assoc($result);
    //echo var_dump($row);

    if(isset($_POST['submit'])){
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $cityId = $_POST['cityId'];

        $sql = "update employee set `firstName` = '$firstName',`lastName` = '$lastName',`cityId` = $cityId 
                where `ID` = $id";
    
        echo $sql;
        mysqli_query($link,$sql);
        header("location: index.php");
    }

}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="container w-25">
<div style="height:100px"></div>
<h3>Edit</h3>
    <form method="post">    <!-- 這裡沒寫action會預設為自己，寫的話會重新載入，id的資訊會消失（會出事 -->
    <div class="form-group">
        <label for="firstName">FirstName</label> 
        <input id="firstName" name="firstName" value="<?= $row['firstName']?>" type="text" class="form-control">
    </div>
    <div class="form-group">
        <label for="lastName">LastName</label> 
        <input id="lastName" name="lastName" value="<?= $row['lastName']?>" type="text" class="form-control">
    </div>
    <div class="form-group">
        <label for="cityId">City</label> 
        <div>
        <select id="cityId" name="cityId" class="custom-select">
            <?php while($select_row = mysqli_fetch_assoc($result_select)):?>
            <option <?= ($select_row['cityId'] == $row['cityId'])?"selected='selected'":''?> value="<?=$select_row['cityId']?>" ><?=$select_row['cityName']?></option>
            <?php endwhile?>
        </select>
        </div>
    </div><br> 
    <div class="form-group">
        <button name="submit" type="submit" class="btn btn-primary">Submit</button>
    </div>
    </form>
</div>
    
</body>
</html>