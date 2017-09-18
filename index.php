<?php

include('inc/header.php');
include ('lib/User.php');
$user = new USER();

?>
<!--Header Part-->
            
            
            
          <!-- Using panel class-->
            <div class="panel panel-default">    
                <div class="panel-heading">
                    <h2>User List<span class="pull-right"><strong>Welcome</strong>Delowar</span></h2>
                </div>
               
                <div  class="panel-body">
                    <table class="table table-striped">
                        <tr>
                        <th width="20%">Serial No</th>
                        <th width="20%">Name</th>
                        <th width="20%">User Name</th>
                        <th width="20%">Email Address</th>
                        <th width="20%">Action</th>
                        </tr>
                        
                        <tr>
                            <td>1</td>
                            <td>Tausif</td>
                            <td>Tausif_19</td>
                            <td>bahlul.tausif@gmai.com</td>
                             <td>
                                   <a class="btn btn-primary" href="profile.php?id=1">View</a>
                             </td>
                        </tr>
                        
                        <tr>
                            <td>2</td>
                            <td>Bahlul</td>
                            <td>Bahlul_19</td>
                            <td>bahlul.tausif@gmai.com</td>
                             <td>
                                   <a class="btn btn-primary" href="profile.php?id=1">View</a>
                             </td>
                        </tr>
                        
                        <tr>
                            <td>3</td>
                            <td>Fahmi</td>
                            <td>Fahmi_0006</td>
                            <td>bahlul.tausif@gmai.com</td>
                             <td>
                                   <a class="btn btn-primary" href="profile.php?id=1">View</a>
                             </td>
                        </tr>
                        
                        
                    </table>
                </div> 
            </div>
          
          <!--Footer Part-->  
          
          <?php include "inc/footer.php"; ?>
