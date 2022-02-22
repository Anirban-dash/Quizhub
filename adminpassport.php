<?php
session_start();
require("adminHeader.php");
require("conn.php");

?>
<section class="vh-100">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                    <p class="text-center h3 fw-bold mb-2 mx-1 mx-md-4 mt-4">Change Password</p>

                                    <form action="adminpasschange.php" method="POST" enctype="multipart/form-data"
                                        class="mx-1 mx-md-4">
                                        <div class="d-flex flex-row align-items-center mb-3">
                                            <i class="ti-lock mr-2"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input name="Oldpass" type="password"  class="form-control"
                                                    placeholder="Old Passport" required/>
                                                    
                                            </div>
                                        </div>
                                        <?php if(isset($_GET['pass'])){ echo '<p class="text-danger">Incorrect Password</p>';} ?>
                                        <div class="d-flex flex-row align-items-center mb-3">
                                            <i id="toggle" class="fa fa-eye-slash mr-2"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input name="Newpass" type="password" id="myPassword" class="form-control"
                                                    placeholder="New Passport" required/>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center mx-3 mb-5 mb-lg-4">
                                            <button id="myBtn" name="submit" type="submit"
                                                class="btn btn-info btn-lg">Change <i class="ti-settings"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
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
        if(isset($_GET['succ'])){
            echo 'swal("Updated!", "Your password is updated successfully!", "success");';
        }
        ?>
    const togglePassword = document.querySelector("#toggle");
        const password = document.querySelector("#myPassword");

        togglePassword.addEventListener("click", function () {
            // toggle the type attribute
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);
            
            if(type==="text"){
                this.classList.add("fa-eye");
                this.classList.remove("fa-eye-slash");
            }else{
                this.classList.add("fa-eye-slash");
                this.classList.remove("fa-eye");
            }
        });
</script>
</body>

</html>