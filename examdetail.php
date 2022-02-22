<?php
require("header.php");
$cat_id=mysqli_real_escape_string($con,$_GET['cat_id']);
$cat_name="SELECT * from catagory where Cat_id='$cat_id'";
$cat_res=mysqli_query($con,$cat_name) or die(mysqli_error($con));
$cat_row=mysqli_fetch_array($cat_res);
$q_sql="SELECT * FROM sample_ques where catagory='$cat_id'";
$res=mysqli_query($con,$q_sql) or die(mysqli_error($con));

?>
<div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                        <h4>Hi, <?php echo $_SESSION['name'];?></h4>
                            <span class="ml-1">Here is Some Practice question for <?php echo$cat_row['Name'];?></span>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <?php 
                    if(mysqli_num_rows($res)==0){?>

                    <div class="col-xl-4 col-xxl-6 col-lg-8 col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title text-danger"><i class="ti-face-sad"></i> Sorry There is No Sample Questions</h4>
                            </div>
                            <div class="card-body">  
                            </div>
                        </div>
                    </div>
                    <?php }
                    while($row=mysqli_fetch_array($res)){ ?>
                    <div class="col-xl-4 col-xxl-6 col-lg-8 col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"><?php echo$row['title'];?></h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-list-group">
                                    <ul class="list-group question" data-answer="<?php echo $row['correct']; ?>">
                                        <?php
                                        $qId=$row['id']; 
                                        $op_sql="SELECT * from sample_op where q_id='$qId' ORDER BY op_no";
                                        $op_res=mysqli_query($con,$op_sql) or die(mysqli_error($con));
                                        while($op_row=mysqli_fetch_array($op_res)){
                                        ?>
                                        <li class="list-group-item" style="cursor: pointer;" data-option="<?php echo $op_row['op_no']; ?>"><?php echo $op_row['answer']; ?></li>
                                        <?php }?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }?>
                <div class="row">
                    <div class="col-sm-12 ">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Exam Instruction</h5>
                            </div>
                            <div class="card-body">
                                <div class="basic-list-group">
                                    <ul class="list-group">
                                        <li class="list-group-item text-success"><i class="fa fa-file"></i> This is your next set, and after this you will get a new set</li>
                                        <li class="list-group-item text-info"><i class="ti-alarm-clock"></i> There will be a time limit, if you can't do with in time exam will be auto submitted</li>
                                        <li class="list-group-item text-warning"><i class="ti-alert"></i> You Can't retake the test, once you take the test of this set, you can't be able to do the exam in same set</li>
                                        <li class="list-group-item text-warning"><i class="ti-save"></i> You can't copy any content, you can't select or copy any text in the test.</li>
                                        <li class="list-group-item text-success"><i class="ti-thumb-up"></i> Best of Luck</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-footer d-sm-flex justify-content-between">
                                <div class="card-footer-link mb-4 mb-sm-0">
                                    <p class="card-text text-dark d-inline"></p>
                                </div>

                                <a href="exam.php?cat=<?php echo$cat_id; ?>"><button type="button" class="btn btn-rounded btn-info"><span
                                            class="btn-icon-left text-success"><i class="ti-pencil "></i>
                                        </span>Go to Exam</button></a>
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
    <script src="./js/manageans.js"></script>
    <script src="./vendor/global/global.min.js"></script>
    <script src="./js/quixnav-init.js"></script>
    <script src="./js/custom.min.js"></script>
    <script src="./js/dashboard/dashboard-2.js"></script>
</body>

</html>