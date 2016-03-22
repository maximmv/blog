<div id="blog">
	<div align="center" style="font-size: 18px;"><?=$pages_info['title'];?></div>

<div id="reg_form" align="center"> 
<span class="show_error"><?=$error;?></span>       

<div style="font-size:10px; padding:4px;">Введите свой логин и email адресс и мы Вам вышлем новый пароль от Вашего аккаунта.</div>               
</div>
<div id="reg_form" align="center">       
<form action="<?=base_url();?>index.php/login/forgot " method="post">
<table border="0" align="center" width="420" cellpadding="0" cellspacing="0" id="reg_table">
  <tr>
    <td width="140px" class="reg_td1">
      Логин
    </td>   
    <td width="280px" align="center" class="reg_td2">
      <input type="text" name="login" value="<?=set_value('login');?>"/><br />
      <span class="show_rules">(a-z,A-Z,0-9, от 4 до 16 символов)</span>
      <span class="show_error"><?=form_error('login');?></span>     
    </td>
  </tr>
  
  <tr>
    <td width="140px" class="reg_td1">
      E-mail
    </td>   
    <td width="280px" align="center" class="reg_td2">
      <input type="text" name="email" value= "<?=set_value('email');?>" /><br />
      <span class="show_rules">(raponly@gmail.com)</span>
      <span class="show_error"><?=form_error('email');?></span>
    </td>
  </tr>
  
  <tr>
    <td width="140px">
    </td>   
    <td width="280px" align="center">
      <input name="send_pswd" type="submit" value="Восстановить" alt="Восстановить" />
    </td>
  </tr>
  
</table>
</form>
			
<hr>
<hr>
</div>
			
				