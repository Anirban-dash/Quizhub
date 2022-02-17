<?php
session_start();
require("conn.php");
require("adminHeader.php");
$sql="SELECT * FROM catagory";
$res=mysqli_query($con,$sql) or die(mysqli_error($con));
?>
 <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Hi <?php echo $name; ?></h4>
                            <p class="mb-0">Add some topics for quizes</p>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Details</h4>
                        </div>
                        <div class="card-body" style="width: 100%;">

                            <form action="catagorysubmit.php" method="post">

                                <div class="form-row col-md-12">
                                    <div class="form-group col-md-12">
                                        <label>Catagory Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="java,c,c++,etc..">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <?php if(isset($_GET['cat'])){?>
                                        <p class="text-danger">*Already Exists</p>
                                        <?php 
                                        unset($_GET['cat']);
                                        } ?>
                                    </div>
                                    <div class="form-group col-md-12">

                                    </div>

                                </div>


                                <button type="submit" class="btn btn-rounded btn-info"><span
                                        class="btn-icon-left text-info"><i class="ti-plus color-info"></i>
                                    </span>Add</button>
                            </form>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Catagories</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <input type="text" id="myInput" onkeyup="myFunction()"
                                        placeholder="Search Catagories">
                                    <table id="myTable" class="table student-data-table m-t-20">
                                        <thead>
                                            <tr>
                                                <th>Catagory ID</th>
                                                <th>Catagory Name</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while($row=mysqli_fetch_array($res)) {?>
                                            <tr>
                                                <td><?php echo $row['Cat_id']; ?></td>
                                                <td><?php echo $row['Name']; ?></td>
                                            </tr>
                                            <?php }?>
                                            

                                        </tbody>

                                    </table>
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
                if (isset($_GET['suc'])) {
                echo 'swal("Added!", "Catagory added Successfully!", "success");';
                unset($_GET['suc']);
                }
                ?>
                function myFunction() {
          var input, filter, table, tr, td, i, txtValue;
          input = document.getElementById("myInput");
          filter = input.value.toUpperCase();
          table = document.getElementById("myTable");
          tr = table.getElementsByTagName("tr");
          for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
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