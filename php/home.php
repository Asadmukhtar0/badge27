<?php 
    include_once('header.php');  
    if(empty($_SESSION['user'])){
          header('location:index.php');
    }
    include_once('action/cn.php');
    $query = "SELECT * FROM `users`";
    $result = mysqli_query($cn,$query) or die('Cant run query'.mysqli_error($cn));

?>
  <div class="container" style="margin-top:1%;">
    <div class="alert alert-danger">
      <label>Hellow <?php echo $_SESSION['user']; ?>, Your Are Logged In</label>
    </div>
    <table class="table table-bordered">
      <tr>
        <th>
          ID
        </th>
        <th>
          Email
        </th>
        <th>
          Profile
        </th>
        <th>
          Edit
        </th>
        <th>
          Delete
        </th>
      </tr>
      <?php 
        while($row = mysqli_fetch_array($result)){
      ?>
        <tr>
          <td>
            <?php echo $row['id']; ?>
          </td>
          <td>
            <?php echo $row['email']; ?>
          </td>
          <td>
            <a href="profile.php?id=<?php echo $row['id'] ?>">
              <button class="btn btn-info">Profile</button>
            </a>
          </td>
          <td>
            <button class="btn btn-success">Edit</button>
          </td>
          <td>
            <button class="btn btn-danger">Delete</button>
          </td>
        </tr>
      <?php 
        }
      ?>
    </table>
  </div>
<?php include_once('footer.php'); ?>