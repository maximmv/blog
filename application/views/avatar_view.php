<div id="blog">
			<div align="center" style="font-size: 18px;"><?=$pages_info['title'];?></div>
             <div align="center">
<form method="post" action="<?=base_url();?>index.php/profile/avatar" enctype="multipart/form-data">  
<table border="0" cellpadding="0"cellspacing="0" class="add_edit_view" align="center">
  <tr>
    <td class="title">
        <div>Формат: jpg,jpeg,png,gif. Не более 1мб</div>
    </td>
  </tr>
  <tr>
    <td class="field_input">
        <div align="center"><img src="<?=base_url();?>images/avatars/thumbs/<?=$user_info['avatar'];?>" alt="аватар" width="80" height="80"/></div>
        <div align="center"><input type="file" name="userfile"/></div>
        <span class="error"><?=$error;?></span>
    </td>
  </tr>
</table>
<div align="center"><input type="submit" name="change_avatar" value="Изменить" alt="Изменить" /></div>
</form>
            </div>
			</div>
				