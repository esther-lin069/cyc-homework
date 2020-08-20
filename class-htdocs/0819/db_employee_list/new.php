<?php 
require ("config.php");

$sql_select = "select * from city";
$result_select = mysqli_query($link,$sql_select);

if(isset($_POST['submit'])){
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $cityId = $_POST['cityId'];

    $insert_sql = "insert into `employee` values (null, '$firstName', '$lastName', $cityId)";
    mysqli_query($link,$insert_sql);

    header("location: index.php");
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
<h3>Add</h3>
    <form method="post" action="new.php">    
    <div class="form-group">
        <label for="firstName">FirstName</label> 
        <input id="firstName" name="firstName" type="text" class="form-control">
    </div>
    <div class="form-group">
        <label for="lastName">LastName</label> 
        <input id="lastName" name="lastName" type="text" class="form-control">
    </div>
    <div class="form-group">
        <label for="cityId">City</label> 
        <div>
        <select id="cityId" name="cityId" class="custom-select">
            <?php while($select_row = mysqli_fetch_assoc($result_select)):?>
            <option value="<?=$select_row['cityId']?>"><?=$select_row['cityName']?></option>
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