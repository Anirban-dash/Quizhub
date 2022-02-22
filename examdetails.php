<?php
require("header.php");
$set_id=intval($_GET['set_id']);
$cat_id=intval($_GET['cat_id']);
$us_id=$_SESSION['id'];
$score_id=intval($_GET['sc_id']);
$score_sql="SELECT * from user_score where score_id='$score_id'";
$score_res=mysqli_query($con,$score_sql) or die(mysqli_error($con));
$score=mysqli_fetch_array($score_res);
$us_score=$score['score'];
?>


<div class="content-body">
                <div class="container-fluid">
                    <div class="row page-titles mx-0">
                        <div class="col-sm-6 p-md-0">
                            <div class="welcome-text">
                            <h4>Hi, <?php echo $_SESSION['name'];?></h4>
                                <span class="ml-1">Here your exam history</span>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card bg-light">
                                <div class="card-header">
                                    <h5 class="card-title">
                                        <p class="badge badge-rounded badge-outline-success">Score Card</p>
                                    </h5>
                                </div>
                                <div class="card-body mb-0">
                                    <div class="col-md-8 basic-list-group">
                                        <ul class="list-group">
                                            <li
                                                class="border-dark list-group-item d-flex justify-content-between text-info align-items-center">
                                                Total question <span
                                                    class="badge badge-outline-info badge-circle"><?php echo $score['total']; ?></span>
                                            </li>
                                            <li
                                                class="border-dark list-group-item d-flex justify-content-between text-primary align-items-center">
                                                Attempt <span class="badge badge-outline-primary badge-circle"><?php echo $score['attmpt']; ?></span>
                                            </li>
                                            <li
                                                class="border-dark list-group-item d-flex justify-content-between text-success align-items-center">
                                                Correct <span class="badge badge-outline-success badge-circle"><?php echo $score['corr']; ?></span>
                                            </li>
                                            <li
                                                class="border-dark list-group-item d-flex justify-content-between text-danger align-items-center">
                                                Wrong <span class="badge badge-outline-danger badge-circle"><?php echo $score['attmpt']-$score['corr']; ?></span>
                                            </li>
                                            <li
                                                class="border-dark list-group-item d-flex justify-content-between text-info align-items-center">
                                                Score(100) <span class="badge badge-outline-info badge-circle"><?php echo $score['score']; ?></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card bg-light">
                                <div class="card-header">
                                    <h5 class="card-title">
                                    <p class="badge badge-rounded badge-outline-info">Statistics</p>
                                    </h5>
                                </div>
                                <div class="card-body mb-0">
                                    <div class=""><span class="donut"
                                        data-peity='{ "fill": ["rgb(117, 180, 50)", "rgb(192, 10, 39)"]}'><?php echo $score['corr']; ?>/<?php echo $score['attmpt']; ?></span>
                                </div>
                                </div>
                                <div class="card-footer  border-0">
                                    <span class="badge badge-success badge-circle"> </span> <p>Correct </p>
                                    <span class="badge badge-danger badge-circle"> </span> <p>Incorrect</p>
                                    <div class="container d-flex justify-content-center" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset; border-radius:10px;">
                                    <div  class="container-fluid">
                                    <?php if($us_score<15){ ?>
                                            <span class="text-danger"><i class="fa-solid fa-face-sad-tear fa-2x"></i> Very Poor</span>
                                            <?php }else if($us_score>=15 && $us_score<30){?> 
                                    <span style="color:crimson;"><i class="fa fa-face-frown fa-2x"></i> Poor</span>
                                    <?php }else if($us_score>=30 && $us_score<50){?>
                                    <span class="text-warning"><i class="fa fa-face-rolling-eyes fa-2x"></i> Satisfactory</span>
                                    <?php }else if($us_score>=50 && $us_score<65){?>
                                    <span class="text-success"><i class="fa fa-face-grin fa-2x"></i> Good</span>
                                    <?php }else if($us_score>=65 && $us_score<80){?>
                                    <span class="text-success"><i class="fa fa-face-grin-wide fa-2x"></i> Very Good</span>
                                    <?php }else if($us_score>=80 && $us_score<95){?>
                                    <span class="text-info"><i class="fa fa-face-grin-stars fa-2x"></i> You are unsoppable</span>
                                    <?php }else if($us_score>=95){?>
                                    <span style="color:darkyellow"><i class="fa-solid fa-face-dizzy fa-2x"></i> Legend</span>
                                    <?php }?>
                                    </div>
                                    </div>
                                    </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <?php
                        $ques="SELECT * from question where catagory='$cat_id' and sets='$set_id'";
                        $ques_res=mysqli_query($con,$ques)or die(mysqli_error($ques));
                        while($row=mysqli_fetch_array($ques_res)){
                        ?>
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title"><?php echo $row['title']; ?></h4>
                                </div>
                                <div class="card-body">
                                    <div class="basic-list-group">
                                        <ul class="list-group">
                                            <?php
                                                $qId=$row['id'];
                                                $user_chose="SELECT * from user_ans where q_id='$qId' and u_id='$us_id'";
                                                $user_chose_query=mysqli_query($con,$user_chose) or die(mysqli_error($con));
                                                $user_res=mysqli_fetch_array($user_chose_query);
                                                $op_sql="SELECT * from options where q_id='$qId' ORDER BY op_no";
                                                $op_row=mysqli_query($con,$op_sql) or die(mysqli_error($con));
                                                while($op_res=mysqli_fetch_array($op_row)){
                                                    if(mysqli_num_rows($user_chose_query)!==0 && $user_res['u_op']!=0){
                                                        if($user_res['u_op']==$user_res['corr_op']){
                                                            if($op_res['op_no']==$user_res['corr_op']){
                                                                echo '<li class="list-group-item text-black-50 border-success"> '.$op_res['answer'].'<i class="ti-check text-success" style="float: right;"></i></li>';
                                                            }else{
                                                                echo '<li class="list-group-item text-black-50"> '.$op_res['answer'].'</li>';
                                                            }
                                                        }else{
                                                            if($op_res['op_no']==$user_res['u_op']){
                                                                echo '<li class="list-group-item text-black-50 border-danger"> '.$op_res['answer'].'<i class="ti-close text-danger" style="float: right;"></i></li>';
                                                            }else if($op_res['op_no']==$user_res['corr_op']){
                                                                echo '<li class="list-group-item text-black-50 border-success"> '.$op_res['answer'].'<i class="ti-check text-success" style="float: right;"></i></li>';
                                                            }else{
                                                                echo '<li class="list-group-item text-black-50"> '.$op_res['answer'].'</li>';
                                                            }
                                                        }
                                                    }else{
                                                        if($op_res['op_no']==$user_res['corr_op']){
                                                            echo '<li class="list-group-item text-black-50 border-info"> '.$op_res['answer'].'<i class="ti-check text-success" style="float: right;"></i></li>';
                                                        }else{
                                                            echo '<li class="list-group-item text-black-50"> '.$op_res['answer'].'</li>';
                                                        }
                                                    }
                                            ?>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                                
                                <?php
                                    if(mysqli_num_rows($user_chose_query)!=0 && $user_res['u_op']!=0){
                                        if($user_res['u_op']==$user_res['corr_op']){
                                            echo '<div class="card-footer bg-transparent text-success border-0">
                                            Correct <i class="ti-check text-success"></i>';
                                        }else{
                                            echo '<div class="card-footer text-danger bg-transparent border-0">
                                            Incorrect <i class="ti-close text-danger"></i>';
                                        }
                                    }else{
                                        echo '<div class="card-footer bg-transparent text-warning border-0">
                                        Unattempt <i class="fa-solid fa-comment-slash"></i>';
                                    }
                                ?>
                                    
                            </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="footer">
                <div class="copyright">
                    <p>Copyright © Designed &amp; Developed by <a href="#" target="_blank">Anirban</a> 2022</p>
                </div>
            </div>
        </div>

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="./vendor/global/global.min.js"></script>
        <script src="./js/quixnav-init.js"></script>
        <script src="./js/custom.min.js"></script>
        <script src="./js/peitychart.init.js"></script>
        <script src="./vendor/peity/jquery.peity.min.js"></script>
        <script src="./js/dashboard/dashboard-2.js"></script>
    </div>
    </body>

    </html>