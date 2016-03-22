<div class="span8">

<form method="post" action="">
<legend>Редактировать страницу меню</legend>    
<table border="0" align="center" cellpadding="0"cellspacing="0" class="add_edit_view">
  <tr>
    <td class="title">
        <div>Название</div>
    </td>
  </tr>
  <tr>
    <td class="field_input">
        <input type="text" name="title" value="<?=$pages_info['title'];?>" class="span7"/>
        <div class="example">Пример: Контакты</div>
        <div class="error"><?=form_error('title');?></div>
    </td>
  </tr>
</table>


<table border="0" align="center" cellpadding="0"cellspacing="0" class="add_edit_view">
  <tr>
    <td class="title">
        <div>Название на англ (без пробелов)</div>
    </td>
  </tr>
  <tr>
    <td class="field_input">
        <input type="text" name="title_en" value="<?=$pages_info['title_en'];?>" class="span7"/>
        <div class="example">Пример: contacts</div>
        <div class="error"><?=form_error('title_en');?></div>
    </td>
  </tr>
</table>

<table border="0" align="center" cellpadding="0"cellspacing="0" class="add_edit_view">
  <tr>
    <td class="title">
        <div>Текст страницы</div>
    </td>
  </tr>
  <tr>
    <td class="field_input">
        <textarea name="text" rows="20" class="span7" ><?=$pages_info['text'];?></textarea>
        <div class="error"><?=form_error('text');?></div>
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
        <input type="text" name="keywords" value="<?=$pages_info['keywords'];?>" class="span7"/>
        <div class="example">Пример: связь с администрацией, как с нами связаться</div>
        <div class="error"><?=form_error('keywords');?></div>
    </td>
  </tr>
</table>


<table border="0" align="center" cellpadding="0"cellspacing="0" class="add_edit_view">
  <tr>
    <td class="title">
        <div>Скрыть страницу</div>
    </td>
  </tr>
  <tr>
    <td class="field_input">
        <select name="hidden">
		<option><?=$pages_info['hidden']?></option>
        <option>no</option>
        <option>yes</option>
        </select>
        <div class="example">Если Вы не хотите, чтобы эта страница была в меню - выберите вариант "Да".</div>
    </td>
  </tr>
</table>
<table border="0" align="center" cellpadding="0"cellspacing="0" class="add_edit_view">
  <tr>
    <td class="title">
        <div>Положение в верхнем меню</div>
    </td>
  </tr>
  <tr>
    <td class="field_input">
        <select name="position">
        <option><?=$pages_info['position']?></option>
		<option>no</option>
        <option>left</option>
        <option>right</option>
        </select>
        <div class="example">Если Вы не хотите, чтобы эта страница была в меню - выберите вариант "No".</div>
    </td>
  </tr>
</table>


<p align="center"><input type="submit" name="edit" value="Сохранить" alt="Сохранить"/></p>
 
</form>
</div>
</div>