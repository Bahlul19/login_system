<?php

include('inc/header.php');
include('lib/user.php');

?>
<!--Header Part-->
            

        <?php
        
        $user = new User();
        if(isset($_POST['login']))
        {
            $userLogin = $user->userLogin($_POST);
        }
        
        ?>
                
            
          <!-- Using panel class-->
            <div class="panel panel-default">    
                <div class="panel-heading">
                    <h2>User Login</h2>
                </div>
               
                <div  class="panel-body">
                   
                  <!--Take a login form-->  
                  <div style="max-width: 600px; margin: 0 auto">
                      
                      <?php
                      
                      if(isset($userLogin))
                      {
                          echo $userLogin;
                      }
                      
                      ?>
                      
                  <form action="" method="POST" enctype="multipart/form-data">
                      
                      <div class="form-group">
                          <label for="email">Email Address</label>
                          <input type="text" id="email" name="email" class="form-control"/>
                      </div>
                      
                      <div class="form-group">
                          <label for="password">Password</label>
                          <input type="password" id="password" name="password" class="form-control"/>
                      </div>
                      
                      <button class="btn btn-success" type="submit" name="login">Login</button>
                      
                  </form>
                    
                 </div>      
                      
                </div> 
            </div>
          
          <!--Footer Part-->  
          
          <?php include "inc/footer.php"; ?>
