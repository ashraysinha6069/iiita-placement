<?php
    include ("header.php");
?>

<div class="container content">
    <hr/>
    <span style="font-size:20px; margin:20px 20px;">Enter your details</span>
    <form class="form-horizontal" style="margin-top:10px;">
          <div class="form-group" style="margin-top:10px;">
                <label for="inputName2" class="col-sm-2 control-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputName2" placeholder="Full Name">
                </div>
          </div>
          <div class="form-group" style="margin-top:10px;">
                <label for="inputEmail2" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail2" placeholder="Email">
                </div>
          </div>
          <div class="form-group" style="margin-top:10px;">
                <label for="inputContact2" class="col-sm-2 control-label">Phone number</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputContact2" placeholder="Phone Number">
                </div>
          </div>        
          <div class="form-group">
                <label for="inputPassword2" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="inputPassword2" placeholder="Password">
                </div>
          </div>
          <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                      <div class="checkbox">
                            <label>
                              <input type="checkbox"> Remember me
                            </label>
                      </div>
                </div>
          </div>
          <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-default">Sign in</button>
                </div>
          </div>
    </form>
    as
</div>
<?php
    include ("footer.php");
?>