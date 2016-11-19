<?php
  include 'header.php';
?>
<body><br/>
<div class="container">
    <div class="row">
        <div class="col-md-offset-4 col-md-4 login-from" style="border:solid thin #eae7de">
            <h4>BMT La-Tahzan</h4><hr/>
            <form id="login">
                <div class="form-group">
                    <label for="">Username</label>
                    <input id="username" type="text" class="form-control" name="username" placeholder="Username"/>
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input id="password" type="password" class="form-control" name="password" placeholder="Password" />
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Login</button>
                </div>
            </form>
            <br />     
        </div>
    </div>
</div> 
<!-- End container -->
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Notifikasi</h4>
      </div>
      <div class="modal-body">
        <p id="notifLogin"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

    
</body>
</html>