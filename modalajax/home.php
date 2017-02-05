<!DOCTYPE html>
<?php
require 'connect.php';
 ?>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
      <link rel="stylesheet" href="css/bootstrap.min.css" >
      <script src="js/jquery.js"></script>
      <script src="js/bootstrap.min.js"></script>
  </head>
  <body>
      <div class="container">
        <h3 class="">Bootstrap 4 Modal</h3>
        <div class="content">
            <table class="table table-striped">
              <thead>
              <tr>
                <th>Username</th>
                <th>Password</th>
              </tr>
              </thead>
              <?php
              $user = $mysqli->query("SELECT * FROM t_teacher");
              while ($row = $user->fetch_object()) {
                              ?>
              <tr>
                <td><?php echo $row->t_username ?></td>
                <td><?php echo $row->t_password ?></td>
                <td><input type="button" class="btn btn-primary viewdetail" id='<?php echo $row->t_id ?>' value="Detail" /></td>
              </tr>
              <?php
              }
               ?>
            </table>
            <?php require 'modal.php'; ?>
            <script>
              $(document).ready(function() {
                $('.viewdetail').click(function() {
                  var uid = $(this).attr('id');
                    $.ajax({
                        url: 'select.php',
                        method: 'POST',
                        data: {id:uid},
                        success:function(data){
                          $('#detailbody').html(data);
                          $('#modaldetail').modal('show');
                        }

                  });
                });
              });
            </script>
        </div>
      </div>
  </body>
</html>
