<?php

include('inc/header.php');

?>
<!--Header Part-->
            
            
            
          <!-- Using panel class-->
            <div class="panel panel-default">    
                <div class="panel-heading">
                    <h2>User Login</h2>
                </div>
               
                <div  class="panel-body">
                   
                  <!--Take a login form-->  
                  <div style="max-width: 600px; margin: 0 auto">
                      
                  <form action="" method="POST" enctype="multipart/form-data">
                      
                      <div class="form-group">
                          <label for="email">Email Address</label>
                          <input type="text" id="email" name="email" class="form-control" required=""/>
                      </div>
                      
                      <div class="form-group">
                          <label for="password">Password</label>
                          <input type="text" id="password" name="password" class="form-control" required=""/>
                      </div>
                      
                      <button class="btn btn-success" type="submit" name="login">Login</button>
                      
                  </form>
                    
                 </div>      
                      
                </div> 
            </div>
          
          <!--Footer Part-->  
          
          <?php include "inc/footer.php"; ?>