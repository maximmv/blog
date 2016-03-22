<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="<?=base_url()?>style/bootstrap.css" type="text/css" />
<link rel="stylesheet" href="<?=base_url();?>style/css_admin.css" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Вход в админ панель</title>
</head>
<body>
    <div class="container">
        <div class="row" id="login">
            <div class="span7 offset2 hero-unit">
                <form method="post" action="" class="form-horizontal" >
                   <legend>Вход в админ панель</legend>
                  <div class="control-group">
                    <label class="control-label" for="inputLogin">Login</label>
                    <div class="controls">
                      <input type="text" id="inputEmail" name="login" placeholder="Login">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="inputPassword" >Password</label>
                    <div class="controls">
                      <input type="password" id="inputPassword" placeholder="Password" name="password">
                    </div>
                  </div>
                  <div class="control-group">
                    <div class="controls">           
                        <input type="submit" name="enter" value="Войти" class="btn btn-primary">
                    </div>
                  </div>
                </form>
                </div>
        </div>
       
        <p style="color:red;font-size:16px;text-align:center;"><?=$info;?></p>
   
           
    </div>
    
</body>
</html>