<?php
session_start();
require "conn.php";
require "adminHeader.php";
$sql = "SELECT * from question";
$res = mysqli_query($con, $sql) or die(mysqli_error($con));
?>

<div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Hi <?php echo $name; ?></h4>
                            <p class="mb-0">Here your all questions</p>
                        </div>
                    </div>

                </div>



                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">All Questions</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <input type="text" id="myInput" onkeyup="myFunction()"
                                        placeholder="Search Questions">
                                    <table id="myTable" class="table student-data-table m-t-20">
                                        <thead>
                                            <tr>
                                                <th>Question</th>
                                                <th>Option1</th>
                                                <th>Option2</th>
                                                <th>Option3</th>
                                                <th>Option4</th>
                                                <th>Correct Option</th>
                                                <th>Catagory</th>
                                                <th>Set</th>
                                                <th>Edit</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
while ($row = mysqli_fetch_array($res)) {
    ?>
                                            <tr>
                                                <td><?php echo $row['title'] ?></td>
                                                <?php
$ques_id = $row['id'];
    $op_sql = "SELECT * from options where q_id='$ques_id' ORDER BY op_no";
    $op_res = mysqli_query($con, $op_sql) or die(mysqli_error($con));
    while ($op_row = mysqli_fetch_array($op_res)) {
        ?>
                                                <td><?php echo $op_row['answer']; ?></td>
                                                <?php }?>
                                                <td><?php echo $row['correct'] ?></td>
                                                <?php
$c_id = $row['catagory'];
    $cat_sql = "SELECT * from catagory where Cat_id='$c_id'";
    $cat_res = mysqli_query($con, $cat_sql);
    $cat_row = mysqli_fetch_array($cat_res);
    $s_id = $row['sets'];
    $set_sql = "SELECT * from sets where s_id='$s_id'";
    $set_res = mysqli_query($con, $set_sql);
    $set_row = mysqli_fetch_array($set_res);
    ?>
                                                <td><?php echo $cat_row['Name'] ?></td>
                                                <td><?php echo $set_row['name'] ?></td>
                                                <td><a href="quesedit.php?q_id=<?php echo $row['id']; ?>"><i class="ti-pencil-alt text-info"></i></a>
                                            </tr>
                                           <?php }?>

                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="#" target="_blank">Anirban</a> 2022</p>
            </div>
        </div>
    </div>
    <script src="./vendor/global/global.min.js"></script>
    <script src="./js/quixnav-init.js"></script>
    <script src="./js/custom.min.js"></script>
    <script src="./js/dashboard/dashboard-2.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        <?php
if (isset($_GET['q'])) {
    echo 'swal("Success!", "Question updated Successfully!", "success");';
    unset($_GET['q']);
}
if (isset($_GET['d'])) {
    echo 'swal("Deleted!", "Question Deleted Successfully!", "warning");';
    unset($_GET['d']);
}
?>
        function myFunction() {
          var input, filter, table, tr, td, i, txtValue;
          input = document.getElementById("myInput");
          filter = input.value.toUpperCase();
          table = document.getElementById("myTable");
          tr = table.getElementsByTagName("tr");
          for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
              txtValue = td.textContent || td.innerText;
              if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
              } else {
                tr[i].style.display = "none";
              }
            }
          }
        }
        </script>

</body>

</html>