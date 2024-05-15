<?php
include 'header.php';
 $Error = "";

if (!isset($_SESSION['username'])){
      

    if (count($_POST) > 0){
        $user = new User();  // class is User class
        $Error = $user->login($_POST); // function is login
                if (!$Error=""){
                echo" <script>window.open('http://localhost/security/public/home','_self')</script>";
            
               }else echo "1errr";

    }else echo  "2errr";

}else echo" <script>window.open('http://localhost/security/public/profile','_self')</script>";
            
?>



<h1>Login Page</h1>
<section class="col-lg-12 col-xl-6">
  <?php  if($Error != ""){
    echo $Error;
  }
  
  ?>
            <form action="" method='POST' class="">

                <section class="form-outline mb-4">
                    <!--  user name field-->
                    <label for="user_email">User Email</label>
                    <input type="text" id='user_email' name='user_email' 
                    class='form-control' required/>
                </section>


                <section class="form-outline mb-4">
                    <!--  user password field-->
                    <label for="user_password">Enter password </label>
                    <input type="password" id='user_password' name='user_password' 
                    class='form-control' />
                </section>


                <section class="form-group mb-4 ">
                    <!--  user submit field-->
                   
                    <input type="submit" id='login_btn' name='login_btn' 
                    class='btn btn-success' value='Login'/>
                    <a class='float-end' href="reset-password.php">Forgot password?</a>
                </section>
                <p class='float-end mx-16'>Don't have an account? <a href="register.php">Register here</a></p>
            </form>
        </section>
    </section>
</section>




<?php
include 'footer.php';
?>