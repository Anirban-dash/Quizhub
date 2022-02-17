<?php
session_start();
require("conn.php");
require("adminHeader.php");
$query="SELECT * FROM sets";
$res=mysqli_query($con,$query) or die(mysqli_error($con));
?>
<div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Hi <?php echo $name; ?></h4>
                            <p class="mb-0">Add sets and duration for tests</p>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Details</h4>
                        </div>
                        <div class="card-body" style="width: 100%;">

                            <form action="setsubmit.php" method="post">

                                <div class="form-row">
                                    <div class="col-md-12">
                                        <label>Set Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="A,B,C,etc." required>
                                        <?php if(isset($_GET['cat'])){?>
                                        <p class="text-danger">*Already Exists</p>
                                        <?php 
                                        unset($_GET['cat']);
                                        } ?>
                                    </div>
                                    <div class="col-md-8 my-3">

                                        <label>Duration</label>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <input type="number" name="mint" class="form-control" placeholder="Minutes" required>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="number" name="sec" class="form-control" placeholder="Seconds" required>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <button type="submit" class="btn btn-rounded btn-info"><span
                                        class="btn-icon-left text-info"><i class="ti-plus color-info"></i>
                                    </span>Add</button>
                        </div>
                    </div>
                    </form>

                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Sets</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="myTable" class="table student-data-table m-t-20">
                                        <thead>
                                            <tr>
                                                <th>Set Name</th>
                                                <th>Minutes</th>
                                                <th>Seconds</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while($row=mysqli_fetch_array($res)) {?>
                                            <tr>
                                                <td><?php echo $row['name']; ?></td>
                                                <td><?php echo $row['minute']; ?></td>
                                                <td><?php echo $row['second']; ?></td>
                                            </tr>
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
            <script>
                <?php
                if (isset($_GET['suc'])) {
                echo 'swal("Added!", "Set added Successfully!", "success");';
                unset($_GET['suc']);
                }
                ?>
    </script>
</body>

</html>