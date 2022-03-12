<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: logout.php");
    exit;
}
?>



<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">



  <title>Contact Form</title>
  </head>
  <body>
    <?php require 'local/navigation.php' ?>

    <div class="container my-4">
      <form action="#" method="POST">
           <h1 class="text-center">Contact Form and Contact List Page
           </h1>
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name="fname" required >
            
        </div>
        <div class="form-group">
            <label>Phone Number</label>
            <input type="text" class="form-control" name="phone" required >
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="text" class="form-control" name="email" required >
        </div>

        <div class="form-group">
            <label>Secret Key to Add the Contact</label>
            <input type="text" class="form-control" name="secret" required>
        </div>
       
        <div class="input_field">
          <input type="submit" value="Save" class="btn btn-primary" name="submit">
        </div>
       
      </form>
    </div>
  </body>
</html>


<?php
//inserting
  if($_SERVER["REQUEST_METHOD"] == "POST"){
  include 'local/connection.php';

  $fname=$_POST['fname'];
  $phone=$_POST['phone'];
  $email=$_POST['email'];
  $secret=$_POST['secret'];
  
  $query = "INSERT INTO contacts values('$fname','$phone','$email','$secret')";
  $data=mysqli_query($connection,$query);

  if($data)
  { echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> Data Inserted Into Contacts!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
  </div> ';
  }
  else{
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
    Please fill the form to add contacts.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div> ';
  }
}
?>

<?php
//for displaying

include ("local/connection.php");
error_reporting(0);
if(isset($_POST['submit']))
{ $id=$_POST['secret'];
$query = "SELECT * FROM contacts where Secret='$id' ";
$data = mysqli_query($connection,$query);

$total = mysqli_num_rows($data);

}



if($total !=0)
{  
?> 
<h2 align="center"> My Contacts</h2>
<center><table border="3" cellspaceing="10" width="80%">
    <thead class="table-dark";
    <tr>
    <th width="20%">Name</th>
    <th width="20%">Phone</th>
    <th width="40%">E-Mail</th>
    </tr>
</thead>

<?php
    while($result = mysqli_fetch_assoc($data))
    {
       echo "
       <tr>
            <td>".$result['Name']."</td>
            <td>".$result['Phone']."</td>
            <td>".$result['EMail']."</td>
       </tr>
        ";
        
    }
}
else
{
  echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
  Fill the form to add the records!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">×</span>
  </button>
</div> ';
}
?>
</table>
</center>

<i>Created by Harsh Sharma</i> &copy; <?php echo date('Y'); ?>
