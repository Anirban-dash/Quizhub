<?php
require("header.php");
$id=$_SESSION['id'];
$sql="SELECT * FROM user where User_ID='$id'";
$result=mysqli_query($con,$sql) or die(mysqli_error($con));
$row=mysqli_fetch_array($result);
$score_sql="SELECT * from user_score where u_id='$id'";
$score_query=mysqli_query($con,$score_sql) or die(mysqli_error($con));
$score=mysqli_fetch_array($score_query);
$high_score=0;
$topic_cover=0;
$total_exam=mysqli_num_rows($score_query);
if(mysqli_num_rows($score_query)!=0){
    $h_score_sql="SELECT MAX(score) as scr FROM `user_score` WHERE u_id='$id'";
    $h_score_query=mysqli_query($con,$h_score_sql) or die(mysqli_error($con));
    $h_score=mysqli_fetch_array($h_score_query);
    $high_score=$h_score['scr'];
    $topic="SELECT COUNT(*) as cnt FROM `user_catagory` WHERE set_id>1 and u_id='$id'";
    $topic_query=mysqli_query($con,$topic) or die(mysqli_error($con));
    $topic_row=mysqli_fetch_array($topic_query);
    $topic_cover=$topic_row['cnt'];
}
$us_level=$row['level'];
$i=1;
$appear=0;
while($i<4){
    $q_str="skill".strval($i);
    $skill=$row[$q_str];
    $get_cat="SELECT * from catagory where Name='$skill'";
    $get_query=mysqli_query($con,$get_cat)or die(mysqli_query($con));
    $c_id=mysqli_fetch_array($get_query)['Cat_id'];
    $cat_sql="SELECT * from user_catagory where u_id='$id' and cat_id='$c_id' and set_id>'$us_level'";
    $cat_query=mysqli_query($con,$cat_sql) or die(mysqli_error($con));
    if(mysqli_num_rows($cat_query)>0){
        $appear+=1;
    }
    $i+=1;
}
if($appear===3){
    $update_sql="UPDATE `user` SET level=level+1 where User_ID='$id';";
    $update=mysqli_query($con,$update_sql) or die(mysqli_error($con));
    $appear=0;
    $us_level+=1;
}
$level_width=33.33*$appear;
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
                                    <div class="stat-digit"><?php echo $total_exam;?></div>
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
                                    <div class="stat-digit"><?php echo $topic_cover;?></div>
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
                                    <div class="stat-digit"><?php echo $high_score;?></div>
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
                                    <div class="stat-digit"><?php echo $us_level;?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Level <?php echo $us_level;?></h4>
                            </div>
                            <div class="card-body">
                                <div class="progress mt-3">
                                    <div class="progress-bar bg-success progress-animated" style="width: <?php echo $level_width."%"; ?>; height:6px;" role="progressbar">
                                        
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