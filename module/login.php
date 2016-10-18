<div class="middlePage">
   <div class="panel panel-info">
      <div class="panel-heading">
         <h3 class="panel-title">Đăng nhập hệ thống</h3>
      </div>
      <div class="panel-body">

         <div class="row">
            <div class="col-md-5 col-left-login" >
              <img class="login-icon" src="images/login.png" />
            </div>

            <div class="col-md-7 col-right-login" style="border-left:1px solid #ccc;min-height:160px">
               <form class="form-horizontal" method="POST">
                  <?php
                  if( !empty($login_error) ) {
                     ?>
                     <fieldset >
                        <div class="spacing"><br/></div>
                        <i class="error"><small><?php echo $login_error;?></small></i>
                        <p><small> Tài khoản demo: admin/admin</small></p>
                        <div class="spacing"><br/></div>
                     </fieldset>
                     <?php
                  }?>
                  <fieldset>
                     <input id="username" name="username" type="text" placeholder="Tên đăng nhập" class="form-control input-md required" required>
                     <div class="spacing"><br/></div>
                     <input id="password" name="password" type="text" placeholder="Mật khẩu" class="form-control input-md required" required>
                     <div class="spacing"><br/></div>

                        <label for="checkbox" class="col-md-8"><input type="checkbox" name="checkboxes" id="checkbox" value="1"><small> &nbsp; Ghi nhớ cho lần đang nhập sau</small> </label>
                        <div class = "col-md-4 txt-right col-right">
                        <button type="submit" name ="submit" value="login" id="singlebutton" name="singlebutton" class="btn btn-info btn-sm pull-right">Đăng nhập</button>
                        </div>

                  </fieldset>
               </form>
            </div>
         </div>
      </div>
  </div>
  <p class="txt-right">Hệ thống quản lý thư viện. version 1.0</p>
</div>