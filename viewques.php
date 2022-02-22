<?php
session_start();
require "conn.php";
require "adminHeader.php";
$sql = "SELECT * from question";
$res = mysqli_query($con, $sql) or die(mysqli_error($con));
$get_cat="SELECT * from catagory";
$get_query=mysqli_query($con, $get_cat) or die(mysqli_error($con));

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
                                <div class="form-row d-flex justify-content-between">
                                    <input class="ml-2" type="text" id="myInput" onkeyup="myFunction()"
                                        placeholder="Search Questions">
                                        <div class="form-group col-md-4">
                                        <select onchange="getCat(this.value);" class="form-control   custom-select-lg mb-3" >
                                        <option value="1">All</option>
                                            <?php while($get = mysqli_fetch_array($get_query)){?>
    <option value="<?php echo $get['Name'];?>"><?php echo $get['Name'];?></option>
    <?php }?>
  
    </select>
</div>
</div>
                            <table id="myTable" class="table student-data-table m-t-20">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Question</th>
                                                <th>Option1</th>
                                                <th>Option2</th>
                                                <th>Option3</th>
                                                <th>Option4</th>
                                                <th>Correct</th>
                                                <th>Catagory</th>
                                                <th>Set</th>
                                                <th>Edit</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i=1;
while ($row = mysqli_fetch_array($res)) {
    ?>
                                            <tr>
                                            <td><?php echo $i; ?></td>
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
                                           <?php 
                                        $i+=1;
                                        }?>

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
        function getCat(val){
            console.log(val);
            table = document.getElementById("myTable");
          tr = table.getElementsByTagName("tr");
          let j=1;
          for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[7];
            cnt= tr[i].getElementsByTagName("td")[0];
            if(td){
               let txtValue = td.textContent || td.innerText;
                if(txtValue==val || val=='1'){
                    tr[i].style.display = "";
                    cnt.innerText=j;
                    j+=1;
              } else {
                tr[i].style.display = "none";
              }
                }
            }
          }
        
        </script>

</body>

</html>