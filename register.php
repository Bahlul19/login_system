<?php

include('inc/header.php');
include('lib/User.php');

?>
<!--Header Part-->

<!--For Validate Registration part-->
        <?php

        $user = new User();
        
        if(isset($_POST['register']))
        {
            $userReg = $user->userRegistration($_POST);
        }
        
        ?>
            
            
            
          <!-- Using panel class-->
            <div class="panel panel-default">    
                <div class="panel-heading">
                    <h2>User Registration</h2>
                </div>
               
                <div  class="panel-body">
                   
                  <!--Take a login form-->  
                  <div style="max-width: 600px; margin: 0 auto">
                      
<!--                      For Error and success message-->
                      <?php
                      
                      if(isset($userReg))
                      {
                          echo $userReg;
                      }
                      
                      ?>
                      
                  <form action="" method="POST" enctype="multipart/form-data">
                      
                      <div class="form-group">
                          <label for="name">Name</label>
                          <input type="text" id="name" name="name" class="form-control"/>
                      </div>
                      
                      <div class="form-group">
                          <label for="password">Username</label>
                          <input type="text" id="username" name="username" class="form-control"/>
                      </div>
                      
                      <div class="form-group">
                          <label for="email">Email Address</label>
                          <input type="text" id="email" name="email" class="form-control"/>
                      </div>
                      
                      <div class="form-group">
                          <label for="password">Password</label>
                          <input type="password" id="password" name="password" class="form-control"/>
                      </div>
                      
                      <button class="btn btn-success" type="submit" name="register">Register</button>
                      
                  </form>
                    
                 </div>      
                      
                </div> 
            </div>
          
          <!--Footer Part-->  
          
          <?php include "inc/footer.php"; ?>
