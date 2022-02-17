<?php
session_start();
require("conn.php");
require("adminHeader.php");
$qu_id=$_GET['q_id'];
$edit_ques="SELECT * FROM question where id='$qu_id'";
$ques_res=mysqli_query($con,$edit_ques) or die(mysqli_error($con));
$question=mysqli_fetch_array($ques_res);
$op_sql="SELECT * from options where q_id='$qu_id' ORDER BY op_no";
$op_res=mysqli_query($con,$op_sql) or die(mysqli_error($con));
$set_query="SELECT * FROM sets";
$c_sql="SELECT * FROM `catagory`";
$set_res=mysqli_query($con,$set_query)or die(mysqli_error($con));
?>
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Hi <?php echo $name; ?></h4>
                            <p class="mb-0">Edit your Question</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Questions</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="queseditsubmit.php" method="post">

                                    <div class="form-row">
                                        <input type="number" name="q_id" value="<?php echo$qu_id?>" hidden>
                                        <div class="form-group col-md-8">
                                            <label>Question Title</label>
                                            <input name="ques" value="<?php echo $question['title']; ?>" type="text" class="form-control" placeholder="Enter the question">
                                        </div>
                                        <div class="form-group col-md-8">
                                            <label>Option1</label>
                                            <?php $op_row=mysqli_fetch_array($op_res); ?>
                                            <input name="opo" value="<?php echo $op_row['answer']; ?>" type="text" class="form-control" placeholder="Enter option number 1">
                                        </div>
                                        <div class="form-group col-md-8">
                                            <label>Option2</label>
                                            <?php $op_row=mysqli_fetch_array($op_res); ?>
                                            <input name="ops" value="<?php echo $op_row['answer']; ?>" type="text" class="form-control" placeholder="Enter option number 2">
                                        </div>
                                        <div class="form-group col-md-8">
                                            <label>Option3</label>
                                            <?php $op_row=mysqli_fetch_array($op_res); ?>
                                            <input name="opt" value="<?php echo $op_row['answer']; ?>" type="text" class="form-control" placeholder="Enter option number 3">
                                        </div>
                                        <div class="form-group col-md-8">
                                            <label>Option4</label>
                                            <?php $op_row=mysqli_fetch_array($op_res); ?>
                                            <input name="opf" value="<?php echo $op_row['answer']; ?>" type="text" class="form-control" placeholder="Enter option number 4">
                                        </div>
                                        <div class="form-group col-md-8">
                                            <label>Correct Option</label>
                                            <input name="corr" onkeyup="show()" id="myinp" value="<?php echo $question['correct'] ?>" type="number" class="form-control"
                                                placeholder="Enter Correct Option number">
                                                <p id="warn" class="text-danger"></p>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label>Catagory</label>
                                            <select name="catagory" id="inputState" class="form-control">
                                                <option selected>Choose...</option>
                                                <?php
                                                $res = mysqli_query($con, $c_sql) or die(mysqli_error($con));
                                                while ($row = mysqli_fetch_array($res)) {?>
                                                <option value="<?php echo $row['Cat_id'] ?>" <?php if($row['Cat_id']==$question['catagory']){echo "selected";} ?>><?php echo $row['Name']; ?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Set</label>
                                            <select name="set" id="inputState" class="form-control">
                                                <option selected>Choose...</option>
                                                <?php while($row=mysqli_fetch_array($set_res)){?>
                                                <option value="<?php echo $row['s_id']; ?>" <?php if($row['s_id']==$question['sets']){echo "selected";} ?> ><?php echo $row['name']; ?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                    </div>

                                    <button id="mybtn" type="submit" class="btn btn-rounded btn-info"><span
                                            class="btn-icon-left text-info"><i class="ti-plus color-info"></i>
                                        </span>Update</button>
                                        <a href="deleteques.php?q_id=<?php echo$qu_id; ?>" ><button style="float:right;" type="button" class="btn btn-rounded btn-danger"><span
                                            class="btn-icon-left text-info"><i class="ti-trash text-danger"></i>
                                        </span>Delete</button></a>
                                </form>
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
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            <script src="./js/dashboard/dashboard-2.js"></script>
            <script>
                <?php 
                if(isset($_GET['q'])){
                    echo 'swal("Success!", "Question updated Successfully!", "success");';
                    unset($_GET['q']);
                }
                ?>
                function show(){
                    let obj=document.getElementById("myinp");
                    let num=obj.value;
                    if(num.length>1 || num>4){
                        document.getElementById("warn").innerHTML="*Wrong Input";
                        document.getElementById("mybtn").disabled=true;
                    }else{
                        document.getElementById("warn").innerHTML="";
                        document.getElementById("mybtn").disabled=false;
                    }
                }
            </script>
</body>

</html>