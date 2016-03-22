<div class="span8">
    
  <div class="page_title">Выберите комментарий для удаления</div>
      
      <table border="0" align="center" cellpadding="0" cellspacing="0" id="pageslist">
              <tr>
                <td width="10%" class="title">Автор</td>
                <td width="30%" class="title">Дата и время</td>
                <td width="30%" class="title">Комментарий</td>
                <td width="30%" class="title">Действие</td>
              </tr>
              
              <?php foreach($edit as $item): ?>
              <form method="post" action="">
              <tr>
                <td width="10%"><?=$item['author']?></td>
                <td width="30%"><?=$item['date']?> в <?=$item['time']?></a></td>
                <td width="30%"><?=$item['comment']?></td>
                <td width="30%"><input name='del' type='submit' value='Удалить' /></td>
                <input type="hidden" name="id" value="<?=$item['id']?>" />
              </tr>
              </form>
              <?php endforeach; ?>
              
      </table>
    
    
    </td>
  </tr>
</table>
</div>
</div>