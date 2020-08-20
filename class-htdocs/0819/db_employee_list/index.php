<?php
require ("config.php");

$sql = "select ID,firstName,lastName,cityName 
        from employee e join city c on e.cityId = c.cityId order by `ID`";
$result = mysqli_query($link,$sql);



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
<div style="height:100px"></div>
  <h3>Employee List
  <a href="new.php" class="btn btn-outline-success float-right" role="button">New</a>
  </h3>            
  <table class="table">
    <thead>
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>City</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
    <?php while($row = mysqli_fetch_assoc($result)):?>
      <tr>
        <td><?= $row['firstName']?></td>
        <td><?= $row['lastName']?></td>
        <td><?= $row['cityName']?></td>
        <td>
        <span class="float-right">
            <a href="<?= 'edit.php?id='.$row['ID']?>" class="btn btn-outline-info" role="button">Edit</a>
            <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#alertModal"
            data-row="<?= 'delete.php?id='.$row['ID'] ?>"  onclick="DeleteClick(this);">
            Delete
            </button>
            <!-- <a href="<?= 'delete.php?id='.$row['ID']?>" class="btn btn-outline-danger" role="button">Delete</a> -->
        </span>
        </td>
      </tr>
    <?php endwhile?>

    </tbody>
  </table>
</div>

<!-- modal -->
<div class="modal fade" id="alertModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        確定要刪除該項目嗎？
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a id="delSubmit" href="#" role="button" class="btn btn-primary">OK</a>
      </div>
    </div>
  </div>
</div>

</body>
<script>

function DeleteClick(obj){
  var delRow = obj.dataset.row;
  var Btn = document.getElementById('delSubmit').href = delRow;
  //console.log(delRow);
}

</script>
</html>