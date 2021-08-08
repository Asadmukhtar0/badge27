<?php 
    include_once('header.php');  
    if(empty($_SESSION['user'])){
          header('location:index.php');
    }
    include_once('action/cn.php');
    $id = $_GET['id'];
    $query = "SELECT * FROM `users` WHERE id='$id'";
    $result = mysqli_query($cn,$query) or die('Cant run query'.mysqli_error($cn));
    $row = mysqli_fetch_array($result);
    $q = "SELECT * FROM `description` WHERE user_id='$id'";
    $res = mysqli_query($cn,$q) or die('Cant run query'.mysqli_error($cn));
    $rows = mysqli_fetch_array($res);

?>
  <div class="container" style="margin-top:1%;">
    <div class="alert alert-danger">
      <label>Hellow <?php echo $_SESSION['user']; ?>, Your Are Logged In</label>
    </div>
    <div class="card">
      <div class="card-header">
          <?php echo $row['fname']; ?>
      </div>
      <div class="card-body">
        <table class="table table-bordered">
            <tr>
              <th>Full Name</th>
              <td><?php echo $row['fname']; ?></td>
            </tr>
            <tr>
              <th>Email</th>
              <td><?php echo $row['email']; ?></td>
            </tr>
            <tr>
              <th>Phone</th>
              <td><?php echo $row['phone']; ?></td>
            </tr>
            <tr>
              <th>Description</th>
              <td>
                  <?php if(!empty($rows['description'])){  
                    echo $rows['description']; 
                    } else {
                  ?>   
                    <button class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">Add Description</button>
                  <?php } ?>
                  <!-- Button trigger modal -->
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Description</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form class="form-group" action="action/descriptin.php?user_id=<?php echo $row['id']; ?>" method="get">
                          <label>Descriptoin</label>
                          <textarea class="form-control" name="description" rows="10"></textarea> <br />
                          <button type="submit" class="btn btn-danger">Save</button>
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                      </div>
                    </div>
                  </div>
                </div>

              </td>
            </tr>
        </table>
      </div>
    </div>
  </div>
<?php include_once('footer.php'); ?>