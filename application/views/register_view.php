<div id="blog">
<div align="center" style="font-size: 18px;"><?=$pages_info['title']?></div>

<div align="center" class="show_error"><?=$error;?></div>


<div id="reg_form" align="center">       
<form action="<?=base_url();?>index.php/login/register" method="post">
<table border="0" align="center" width="420" cellpadding="0" cellspacing="0" id="reg_table">
  <tr>
    <td width="140px" class="reg_td1">
      Логин
    </td>   
    <td width="280px" align="center" class="reg_td2">
      <input type="text" name="username" value="<?=set_value('username');?>"/><br />
      <span class="show_rules">(a-z,A-Z,0-9, от 4 до 16 символов)</span>
      <span class="show_error"><?=form_error('username');?></span>     
    </td>
  </tr>
  
  <tr>
    <td width="140px" class="reg_td1">
      E-mail
    </td>   
    <td width="280px" align="center" class="reg_td2">
      <input type="text" name="email" value="<?=set_value('email');?>" /><br />
      <span class="show_rules">(raponly@gmail.com)</span>
      <span class="show_error"><?=form_error('email');?></span>
    </td>
  </tr>
  
  <tr>
    <td width="140px" class="reg_td1">
      Пароль
    </td>   
    <td width="280px" align="center" class="reg_td2">
      <input type="password" name="pswd"/><br />
      <span class="show_rules">(a-z,A-Z,0-9,-,_,  от 6 до 16 символов)</span>
      <span class="show_error"><?=form_error('pswd');?></span>
    </td>
  </tr>
  
  <tr>
    <td width="140px" class="reg_td1">
      Пароль еще раз
    </td>   
    <td width="280px" align="center" class="reg_td2">
      <input type="password" name="pswd2"/><br />
      <span class="show_rules">(a-z,A-Z,0-9,-,_,  от 6 до 16 символов)</span>
      <span class="show_error"><?=form_error('pswd2');?></span>
    </td>
  </tr>
  
  <tr>
    <td width="140px" class="reg_td1">
      Символы с картинки
    </td>   
    <td width="280px" align="center" class="reg_td2">
      <br /><?=$captcha;?><input type="text" name="captcha"/>
      <span class="show_error"><?=form_error('captcha');?></span>
    </td>
  </tr>
  
  <tr>
    <td width="140px">
    </td>   
    <td width="280px" align="center">
      <input type="submit" name="register" alt="Регистрация" value="Регистрация"/>
    </td>
  </tr>
  
</table>
</form>
			</div>
            </div>