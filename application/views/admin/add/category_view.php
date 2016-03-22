<div class="span8">

<form method="post" action="">
<legend>Добавить категорию статей</legend>    
<table border="0" align="center" cellpadding="0"cellspacing="0" class="add_edit_view">
  <tr>
    <td class="title">
        <div>Название</div>
    </td>
  </tr>
  <tr>
    <td class="field_input">
        <input type="text" name="title"  value="<?=set_value('title');?>" class="span7" />
        <div class="example">Пример: Бизнес</div>
        <div class="error"><?=form_error('title');?></div>
    </td>
  </tr>
</table>
  

<table border="0" align="center" cellpadding="0"cellspacing="0" class="add_edit_view">
  <tr>
    <td class="title">
        <div>Название категории на англ (без пробелов)</div>
    </td>
  </tr>
  <tr>
    <td class="field_input">
        <input type="text" name="title_en" value="<?=set_value('title_en');?>" class="span7" />
        <div class="example">Пример: biznes</div>
        <div class="error"><?=form_error('title_en');?></div>
    </td>
  </tr>
</table>
 
<table border="0" align="center" cellpadding="0"cellspacing="0" class="add_edit_view">
  <tr>
    <td class="title">
        <div>Ключевые слова</div>
    </td>
  </tr>
  <tr>
    <td class="field_input">
        <input type="text" name="keywords" value="<?=set_value('keywords');?>" class="span7" />
        <div class="example">Пример: статьи о бизнесе, бизнес</div>
        <div class="error"><?=form_error('keywords');?></div>
    </td>
  </tr>
</table>

<p align="center"><input type="submit" name="add" value="Добавить" alt="Добавить"/></p>
 
</form>   
</div>
</div>