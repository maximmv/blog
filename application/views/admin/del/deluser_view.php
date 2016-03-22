<div class="span8">
    
  <div class="page_title">Выберите запись для удаления</div> 
      
      <table border="0" align="center" cellpadding="0" cellspacing="0" id="pageslist">
              <tr>
                <td width="20%" class="title">ID</td>
                <td width="20%" class="title">Имя пользователя</td>
                <td width="20%" class="title">Статус</td>                
                <td width="20%" class="title">E-Mail</td>
                <td width="20%" class="title">Действие</td>
              </tr>
              
              <?php foreach($edit as $item): ?>
              <form method="post" action="">
              <tr>
                <td width="20%"><?=$item['id']?></td>
                <td width="20%"><?=$item['username']?></td>
                <td width="20%"><?=$item['status']?></td>
                <td width="20%"><?=$item['email']?></td>
                <td width="20%"><input name='del' type='submit' value='Удалить' /></td>
                <input type="hidden" name="id" value="<?=$item['id']?>" />
              </tr>
              </form>
              <?php endforeach;?>
              

      </table>
    
    </td>
  </tr>
</table>

</div>
</div>