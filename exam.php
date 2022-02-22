<?php
require("header.php");
$u_id=$_SESSION['id'];
$cat_id=$_GET['cat'];
$ques_query="SELECT * FROM question where catagory='$cat_id'";
$result=mysqli_query($con,$ques_query) or die(mysqli_error($con));
$set_sql="SELECT * from user_catagory where u_id='$u_id' and cat_id='$cat_id'";
$set_res=mysqli_query($con,$set_sql) or die(mysqli_error($con));
$set_row=mysqli_fetch_array($set_res);
$set_no=$set_row['set_id'];
$time="SELECT * FROM ( SELECT ROW_NUMBER() OVER (ORDER BY s_id) AS row_num , s_id , name , minute , second FROM sets ) AS sub WHERE row_num = $set_no";
$time_res=mysqli_query($con,$time) or die(mysqli_error($con));
$time_row=mysqli_fetch_array($time_res);
$set_id=$time_row['s_id'];
$question_sql="SELECT * FROM question where catagory='$cat_id' and sets='$set_id'";
$question_query=mysqli_query($con,$question_sql) or die(mysqli_error($con));
?>
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Hi, <?php echo $_SESSION['name'];?></h4>
                    <?php if(mysqli_num_rows($time_res)!=0){?>
                    <h6 class="mt-2 text-success">SET: <?php echo $time_row['name'];?></h6>
                    <?php } ?>
                    <span class="ml-1">Give your exam sincerly, Best of Luck <i class="ti-thumb-up"></i></span>
                </div>
            </div>
        </div>
        <?php if(mysqli_num_rows($time_res)!=0 && mysqli_num_rows($question_query)!=0){?>
        <div id="toast-container" class="toast-top-right">
            <div class="toast toast-success" aria-live="polite" style="display: block;">
                <div class="toast-progress" id="showprog"></div>
                <div class="toast-title" id="showtime">
                    
                    <?php echo $time_row['minute'] ?>:<?php echo $time_row['second'] ?></div>
                <div class="toast-message">Time Left</div>
            </div>
        </div>
        <?php } ?>
        <form class="row" action="examsubmit.php" method="post" id="myform" oncopy="return false"
            onselectstart="return false">
            <input type="number" name="cat_id" value="<?php echo $cat_id; ?>" hidden />
            <input type="number" name="set_id" value="<?php echo $set_id; ?>" hidden />
            <input type="radio" name="question[0]" value="0" checked hidden/>
            <div class="col-sm-12">
                <?php 
                        
                        if(mysqli_num_rows($question_query)===0){
                            echo '<div class="col-xl-4 col-xxl-6 col-lg-8 col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title text-danger"><i class="ti-face-sad"></i> Sorry There is No Questions for this Set</h4>
                                </div>
                                <div class="card-body">  
                                </div>
                            </div>
                        </div>';
                        }
                        while($questions=mysqli_fetch_array($question_query)){
                        ?>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"><?php echo $questions['title']?></h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-list-group">
                            <ul class="list-group">
                                <?php
                                        $qId=$questions['id'];
                                        $option_sql="SELECT * from options where q_id='$qId'";
                                        $option_res=mysqli_query($con,$option_sql) or die(mysqli_error($con));
                                        while($options=mysqli_fetch_array($option_res)){
                                        ?>
                                <li class="list-group-item">
                                    <input type="radio" name="question[<?php echo $qId ?>]"
                                        value="<?php echo $options['op_no'] ?>" /> <?php  echo $options['answer'] ?>
                                </li>
                                <?php }?>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php }?>
                <?php if(mysqli_num_rows($question_query)!==0){?>
                <button name="submit" type="submit" class="btn btn-rounded btn-success" style="float: right;"
                    id="subm"><span class="btn-icon-left text-success"><i class="ti-write color-success"></i>
                    </span>Submit</button>
                <?php } ?>
            </div>
        </form>


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
let Sbtn = document.getElementById("subm");
let minu = <?php echo $time_row['minute'] ?>;
let sec = <?php echo $time_row['second'] ?>;
let totalSec = minu * 60 + sec;
let incr = 10 / totalSec;
let wid = 0;
let pBar = document.getElementById("showprog");
let times = document.getElementById("showtime");
window.onunload = () => {
    document.getElementById("myform").submit();
}
const progTimer = () => {
    let progT = setInterval(() => {
        wid = wid + incr;

        pBar.style.width = wid + "%";
    }, 100);
    setTimeout(() => {
        clearInterval(progT);
    }, totalSec * 1000);
}
const timer = () => {
    progTimer();
    let inter = setInterval(() => {
        sec--;
        if (sec < 0) {
            sec = 59;
            minu--;
        }

        let munut = minu < 10 ? "0" + minu : minu;
        let secu = sec < 10 ? "0" + sec : sec;
        times.innerHTML = `${munut}:${secu}`;
    }, 1000);
    setTimeout(() => {
        clearInterval(inter);
        Sbtn.click();
    }, totalSec * 1000);
}
window.onload = () => {
    timer();
};
</script>
</body>

</html>