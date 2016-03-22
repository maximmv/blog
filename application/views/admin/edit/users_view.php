<div class="span8">
   
 
<form method="post" action="">
<legend>Редактировать пользователей</legend>
<table border="0" align="center" cellpadding="0"cellspacing="0" class="add_edit_view">
  <tr>
    <td class="title">
        <div>Логин</div>
    </td>
  </tr>
  <tr>
    <td class="field_input">
        <input type="text" name="username" size="80" value="<?=$pages_info['username'];?>"/>
        <div class="error"><?=form_error('username');?></div>
    </td>
    <input type="hidden" name="id" size="80" value=""/>
  </tr>
</table>

<table border="0" align="center" cellpadding="0"cellspacing="0" class="add_edit_view">
  <tr>
    <td class="title">
        <div>E-mail</div>
    </td>
  </tr>
  <tr>
    <td class="field_input">
        <input type="text" name="email" size="80" value="<?=$pages_info['email'];?>"/>
        <div class="error"><?=form_error('email');?></div>
    </td>
  </tr>
</table>


<table border="0" align="center" cellpadding="0"cellspacing="0" class="add_edit_view">
  <tr>
    <td class="title">
        <div>Аватар</div>
    </td>
  </tr>
  <tr>
    <td class="field_input">
        <img src="<?=base_url();?>images/avatars/thumbs/<?=$pages_info['avatar'];?>" alt="" />
    </td>
  </tr>
</table>

<table border="0" align="center" cellpadding="0"cellspacing="0" class="add_edit_view">
  <tr>
    <td class="title">
        <div>Статус</div>
    </td>
  </tr>
  <tr>
    <td class="field_input">
        <select name="status">
        <option><?=$pages_info['status'];?></option>
        <?php if($pages_info['status']!='user'){echo "<option>user</option>";}?>
        <?php if($pages_info['status']!='author'){echo "<option>author</option>";}?>
        <?php if($pages_info['status']!='admin'){echo "<option>admin</option>";}?>
        
        
        </select>
    </td>
  </tr>
</table>

<p align="center"><input type="submit" name="edit" value="Сохранить" alt="Сохранить"/></p>
</form>
    
    </td>
  </tr>
</table>
</div>
</div>