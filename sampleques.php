<?php
session_start();
require("conn.php");
require("adminHeader.php");
$c_sql="SELECT * FROM `catagory`";
?>
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Hi <?php echo $name; ?></h4>
                            <p class="mb-0">Add some sample question for practice</p>
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
                                <form action="samplequestionadd.php" method="post">

                                    <div class="form-row">
                                        <div class="form-group col-md-8">
                                            <label>Question Title</label>
                                            <input name="ques" type="text" class="form-control" placeholder="Enter the question" required>
                                        </div>
                                        <div class="form-group col-md-8">
                                            <label>Option1</label>
                                            <input name="opo" type="text" class="form-control" placeholder="Enter option number 1" required>
                                        </div>
                                        <div class="form-group col-md-8">
                                            <label>Option2</label>
                                            <input name="ops" type="text" class="form-control" placeholder="Enter option number 2" required>
                                        </div>
                                        <div class="form-group col-md-8">
                                            <label>Option3</label>
                                            <input name="opt" type="text" class="form-control" placeholder="Enter option number 3" required>
                                        </div>
                                        <div class="form-group col-md-8">
                                            <label>Option4</label>
                                            <input name="opf" type="text" class="form-control" placeholder="Enter option number 4" required>
                                        </div>
                                        <div class="form-group col-md-8">
                                            <label>Correct Option</label>
                                            <input name="corr" onkeyup="show()" id="myinp" type="number" class="form-control"
                                                placeholder="Enter Correct Option number" required>
                                                <p id="warn" class="text-danger"></p>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label>Catagory</label>
                                            <select name="catagory" id="inputState" class="form-control" required>
                                                <?php
                                                $res = mysqli_query($con, $c_sql) or die(mysqli_error($con));
                                                while ($row = mysqli_fetch_array($res)) {?>
                                                <option value="<?php echo $row['Cat_id'] ?>"><?php echo $row['Name']; ?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            
                                        </div>
                                    </div>

                                    <button id="mybtn" type="submit" class="btn btn-rounded btn-info"><span
                                            class="btn-icon-left text-info"><i class="ti-plus color-info"></i>
                                        </span>Add</button>
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
                    echo 'swal("Success!", "Question added Successfully!", "success");';
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