<?php
require("header.php");
$id=$_SESSION['id'];
$sql="SELECT * FROM user where User_ID='$id'";
$result=mysqli_query($con,$sql) or die(mysqli_error($con));
$row=mysqli_fetch_array($result);
?>
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Hi, <?php echo $_SESSION['name'];?></h4>
                            <p class="mb-0">Here your Dashboard</p>
                        </div>
                    </div>
 
                </div>

                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="stat-widget-one card-body">
                                <div class="stat-icon d-inline-block">
                                    <i class="ti-pencil text-pink border-pink"></i>
                                </div>
                                <div class="stat-content d-inline-block">
                                    <div class="stat-text">Exam Given</div>
                                    <div class="stat-digit">0</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="stat-widget-one card-body">
                                <div class="stat-icon d-inline-block">
                                    <i class="ti-book text-primary border-primary"></i>
                                </div>
                                <div class="stat-content d-inline-block">
                                    <div class="stat-text">Topic Cover</div>
                                    <div class="stat-digit">0</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="stat-widget-one card-body">
                                <div class="stat-icon d-inline-block">
                                    <i class="ti-cup text-success border-success"></i>
                                </div>
                                <div class="stat-content d-inline-block">
                                    <div class="stat-text">High Score</div>
                                    <div class="stat-digit">0</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="stat-widget-one card-body">
                                <div class="stat-icon d-inline-block">
                                    <i class="ti-medall text-warning border-warning"></i>
                                </div>
                                <div class="stat-content d-inline-block">
                                    <div class="stat-text">Level</div>
                                    <div class="stat-digit"><?php echo $row['level']?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Level 1</h4>
                            </div>
                            <div class="card-body">
                                <div class="progress mt-3">
                                    <div class="progress-bar bg-success progress-animated" style="width: 90%; height:6px;" role="progressbar">
                                        
                                    </div>
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