<?php
session_start();
require "conn.php";
require "adminHeader.php";
$sql = "SELECT * from visitor";
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
                                    <table id="myTable" class="table student-data-table m-t-20">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Message</th>
                                                <th>Date</th>
                                                <th>Reply</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i=1;
while ($row = mysqli_fetch_array($res)) {
    echo '<tr>
    <td>'.$i.'</td>
    <td>'.$row['name'].'</td>
    <td>'.$row['mail'].'</td>
    <td>'.$row['msg'].'</td>
    <td>'.$row['dates'].'</td>
    <td><a href = "mailto:'.$row['mail'].'"><i class="ti-share text-success"></i></a></td>
    </tr>';
    ?>
                                        
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
   

</body>

</html>