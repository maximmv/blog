<div class="content">
	
	<div id="sidebar">
				<div id="login_form" align="center">
					<form method="post" action="<?=base_url();?>index.php/login">
					 Логин: <span style="margin-left: 15px;"><input name="login" type="text" value="" /></span><br />
					 Пароль: <span style="margin-left: 8px;"><input name="password" type="password" value="" /></span>
					 <div align="right" style="margin-right: 33px;"><input type="submit" name="enter" value="Войти" /></div>
					</form>
				</div>
				<div id="lk_actions">
              <a href="<?=base_url()?>index.php/login/register">Регистрация</a> | 
              <a href="<?=base_url()?>index.php/login/forgot">Забыли пароль?</a>
        </div>
		<hr>
       