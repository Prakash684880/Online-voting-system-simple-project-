
<?php 
    if(isset($_GET['added']))
    {
?>
        <div class="alert alert-success my-3" role="alert">
            Message has been added successfully.
        </div>
<?php 
    }else if(isset($_GET['delete_id']))
    {
        $d_id = $_GET['delete_id'];
        mysqli_query($db, " DELETE FROM `message`  WHERE id = '". $d_id ."'") OR die(mysqli_error($db));
?>
       <div class="alert alert-danger my-3" role="alert">
            Message has been deleted successfully!
        </div>
<?php

    }
?>




<!DOCTYPE html>
<html>
<head>
  <style>
.box {
  border: 1px solid #ccc;
  padding: 10px;
  padding-top: 10px;
  margin-bottom: 10px;
}

.box p {
  margin: 5px 0;
}

.box span {
  font-weight: bold;
}

.delete-btn {
  color: #fff;
  background-color: #dc3545;
  padding: 5px 10px;
  border-radius: 4px;
  text-decoration: none;
}

.delete-btn:hover {
  background-color: #c82333;
}
  </style>
</head>
<body>

   
   <div class="col-8">
    <br>
    <br>
        <h3>Complain & Feedback </h3>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">S.No</th>
                    <th scope="col">Voter Name</th>
                    <th scope="col">Voter Email</th>
                    <th scope="col">Voter Number</th>
                    <th scope="col">message</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php 

                    $fetchingData = mysqli_query($db, " SELECT * FROM `message` ") or die(mysqli_error($db)); 
                    $isAnyMessageAdded = mysqli_num_rows($fetchingData);

                    if($isAnyMessageAdded > 0)
                    {
                        $sno = 1;
                        while($row = mysqli_fetch_assoc($fetchingData))
                        {
                            $message_id = $row['id'];
                ?>
                            <tr>
                                <td><?php echo $sno++; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['number']; ?></td>
                                <td><?php echo $row['message']; ?></td>
                            
                                <td> 
                                    <button class="btn btn-sm btn-danger" onclick="DeleteData(<?php echo $message_id; ?>)"> Delete </button>
                                </td>
                            </tr>
                <?php
                        }
                    }else {
            ?>
                        <tr> 
                            <td colspan="7"> No any Message is added yet. </td>
                        </tr>
            <?php
                    }
                ?>
            </tbody>    
        </table>
    </div>
</div>


<script>
    const DeleteData = (e_id) => 
    {
        let c = confirm("Are you really want to delete it?");

        if(c == true)
        {
            location.assign("index.php?message=1&delete_id=" + e_id);
        }
    }
</script>





</body>
</html>