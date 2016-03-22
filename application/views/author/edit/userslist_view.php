<div class="span8">

<table width="100%" border="0" align="center" cellspacing="0" cellpadding="0" id="userlist">
  <tr>
    <td width="25%" class="title">Пользователь</td>
    <td width="25%" class="title">E-mail</td>
    <td width="25%" class="title">Статус</td>
  </tr>
  
  <?php foreach($edit as $item): ?>
  <tr>
    <td><a href="<?=base_url();?>index.php/admin/edit/users/<?=$item['id']?>"><?=$item['username'];?></a></td>
    <td><?=$item['email'];?></td>
    <td><?=$item['status'];?></td>
  </tr>
  <?php endforeach;?>
</table>

    
    </td>
  </tr>
</table>
</div>
</div>