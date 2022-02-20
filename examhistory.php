<?php
require("header.php");
$us_id=$_SESSION['id'];
$score_sql="SELECT * from user_score where u_id='$us_id'";
$score_res=mysqli_query($con,$score_sql) or die(mysqli_error($con));
?>
 <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                        <h4>Hi, <?php echo $_SESSION['name'];?></h4>
                            <p class="mb-0">Here your previos exam results</p>
                        </div>
                    </div>
                </div>



                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">All Exam Result</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table student-data-table m-t-20">
                                        <thead>
                                            <tr>
                                                <th>Topic</th>
                                                <th>Score</th>
                                                <th>Set</th>
                                                <th>Attempt</th>
                                                <th>Correct</th>
                                                <th>Date</th>
                                                <th>Full Details</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while($score=mysqli_fetch_array($score_res)){
                                                $set_id=$score['set_id'];
                                                $cat_id=$score['cat_id'];
                                                $set_sql="SELECT * from sets where s_id='$set_id'";
                                                $set_res=mysqli_query($con,$set_sql) or die(mysqli_error($con));
                                                $sets=mysqli_fetch_array($set_res);
                                                $cat_sql="SELECT * from catagory where Cat_id='$cat_id'";
                                                $cat_res=mysqli_query($con,$cat_sql) or die(mysqli_error($con));
                                                $catagory=mysqli_fetch_array($cat_res);     
                                            ?>
                                            <tr>
                                                <td><?php echo $catagory['Name'];?></td>
                                                <td><?php echo $score['score'];?></td>
                                                <td><?php echo $sets['name'];?></td>
                                                <td><?php echo $score['attmpt'];?></td>
                                                <td><?php echo $score['corr'];?></td>
                                                <td><?php echo $score['dete'];?></td>
                                                <td><a href="examdetails.php?cat_id=<?php echo $cat_id ?>&set_id=<?php echo $set_id ?>&sc_id=<?php echo $score['score_id']; ?>"><i class="ti-eye text-primary"></i></a>
                                                </td>
                                            </tr>
                                            <?php } ?>
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
</body>

</html>