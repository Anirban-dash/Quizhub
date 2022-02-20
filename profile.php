<?php
require("header.php");
$u_id=$_SESSION['id'];
$sql="SELECT * from user where `User_ID` ='$u_id'";
$image_sql="SELECT * from images where us_id='$u_id'";
$user_query=mysqli_query($con,$sql) or die(mysqli_error($con));
$image_query=mysqli_query($con,$image_sql) or die(mysqli_error($con));
$user=mysqli_fetch_array($user_query);
$image=mysqli_fetch_array($image_query);
?>
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Hi, <?php echo $_SESSION['name'];?></h4>
                    <span class="ml-1">This is your profile</span>
                </div>
            </div>

        </div>
        <section id="main-content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="user-profile">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="user-photo m-b-30">
                                            <img class="img-fluid" src="uploads/<?php echo $image['file_name'] ?>"
                                                alt="" /><br />
                                        </div>

                                        <div class="user-skill my-3">
                                            <h4>Skill</h4>
                                            <ul>
                                                <li class="my-1">
                                                    <a href="#"><?php echo $user['skill1'] ?></a>
                                                </li>
                                                <li class="my-1">
                                                    <a href="#"><?php echo $user['skill2'] ?></a>
                                                </li>
                                                <li class="my-1">
                                                    <a href="#"><?php echo $user['skill3'] ?></a>
                                                </li>
                                            </ul>
                                        </div>

                                    </div>
                                    <div class="col-lg-8">
                                        <div class="user-profile-name my-1"><?php echo $user['name'] ?></div>
                                        <div class="user-Location my-1">
                                            <i class="ti-location-pin"></i> <?php echo $user['address'] ?>
                                        </div>
                                        <div class="custom-tab user-profile-tab">
                                            <div class="tab-content my-2">
                                                <div role="tabpanel" class="tab-pane active" id="1">
                                                    <div class="contact-information">
                                                        <h4>Contact information</h4>
                                                        <div class="phone-content my-1">
                                                            <span class="contact-title">Phone:</span>
                                                            <span
                                                                class="phone-number"><?php echo $user['mobile'] ?></span>
                                                        </div>
                                                        <div class="address-content my-1">
                                                            <span class="contact-title">Address:</span>
                                                            <span
                                                                class="mail-address"><?php echo $user['address'] ?></span>
                                                        </div>
                                                        <div class="email-content my-1">
                                                            <span class="contact-title">Email:</span>
                                                            <span
                                                                class="contact-email"><?php echo $user['email'] ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="basic-information">
                                                        <h4>Basic information</h4>
                                                        <div class="gender-content my-1">
                                                            <span class="contact-title">Gender:</span>
                                                            <span class="gender"><?php echo $user['Gender'] ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="card nestable-cart">
                                                        <div class="card-title">
                                                            <h4>Statistics</h4>
                                                            <div class="card-title-right-icon">
                                                                <ul>

                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-lg-12 col-sm-4">
                                                                    <span class="bar"
                                                                        data-peity='{ "fill": ["#13DAFE", "#6164C1","#19ad9f"]}'>1,1,1</span>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
</div>
<div class="footer">
    <div class="copyright">
        <p>Copyright © Designed &amp; Developed by <a href="#" target="_blank">Quixkit</a> 2019</p>
    </div>
</div>
</div>
<script src="./vendor/global/global.min.js"></script>
<script src="./js/quixnav-init.js"></script>
<script src="./js/custom.min.js"></script>
<script src="./js/peitychart.init.js"></script>
<script src="./js/jquery.peity.min.js"></script>
<script src="./js/dashboard/dashboard-2.js"></script>
</body>

</html>