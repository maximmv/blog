<div class="span8">

<form method="post" action="" enctype="multipart/form-data">
<legend>Редактировать статью</legend>
<table border="0" align="center" cellpadding="0"cellspacing="0" class="add_edit_view">
  <tr>
    <td class="title">
        <div>Название статьи</div>
    </td>
  </tr>
  <tr>
    <td class="field_input">
        <input type="text" name="title" value="<?=$pages_info['title'];?>" class="span7"  />
        <div class="example">Пример: Как похудеть</div>
        <div class="error"><?=form_error('title');?></div>
    </td>
  </tr>
</table>

<table border="0" align="center" cellpadding="0"cellspacing="0" class="add_edit_view">
  <tr>
    <td class="title">
        <div>Название для url (транслитом, без пробелов)</div>
    </td>
  </tr>
  <tr>
    <td class="field_input">
        <input type="text" name="title_en" value="<?=$pages_info['title_en'];?>" class="span7" />
        <div class="example">Пример: kak-pohudetj</div>
        <div class="error"><?=form_error('title_en');?></div>
    </td>
  </tr>
</table>

<table border="0" align="center" cellpadding="0"cellspacing="0" class="add_edit_view">
  <tr>
    <td class="title">
        <div>Описание статьи (краткое, 250 символов)</div>
    </td>
  </tr>
  <tr>
    <td class="field_input">
        <textarea name="description" rows="10"  class="span7" ><?=$pages_info['description'];?></textarea>        
        <div class="example">Пример: Вас интересует вопрос как быстро похудеть? Мы Вам расскажем</div>
        <div class="error"><?=form_error('description');?></div>
    </td>
  </tr>
</table> 

<table border="0" align="center" cellpadding="0"cellspacing="0" class="add_edit_view">
  <tr>
    <td class="title">
        <div>Полная статья</div>
    </td>
  </tr>
  <tr>
    <td class="field_input">
        <textarea name="text" rows="20" class="span7"><?=$pages_info['text'];?></textarea>
        <div class="error"><?=form_error('text');?></div>
    </td>
  </tr>      
</table>  

<table border="0" align="center" cellpadding="0"cellspacing="0" class="add_edit_view">
  <tr>
    <td class="title">
        <div>Загрузите мини-картинку (В формате png,jpg,gif - макс.размер:100х100 и не более 1мб)</div>
    </td>
  </tr>
  <tr>
    <td class="field_input">
        <input type="file" name="userfile" />
        <div class="error"></div>
    </td>
  </tr>
</table>

<input type="hidden" name="date" value="<?=$pages_info['author'];?>" />


<table border="0" align="center" cellpadding="0"cellspacing="0" class="add_edit_view">
  <tr>
    <td class="title">
        <div>Ключевые слова</div>
    </td>
  </tr>
  <tr>
    <td class="field_input">
        <input type="text" name="keywords" value="<?=$pages_info['keywords'];?>"  class="span7" />
        <div class="example">Пример: как похудеть, быстрое похудание, похудание</div>
        <div class="error"><?=form_error('keywords');?></div>
    </td>
  </tr>
</table>

<table border="0" align="center" cellpadding="0"cellspacing="0" class="add_edit_view">
  <tr>
    <td class="title">
        <div>Выберите категорию</div>
    </td>
  </tr>
  <tr>
    <td class="field_input">
        <select name="category">
		<option><?=$pages_info['category']?></option>
        <?php foreach($categories as $item): ?>
          <option value="<?=$item['title'];?>"><?=$item['title'];?></option> 
        <?php endforeach;?> 
        </select>       
        <div class="example">Если список пустой, то сначало создайте категорию.</div>
        <div class="error"><?=form_error('category');?></div>        
    </td>
  </tr>
</table>

<input type="hidden" name="date" value="<?=date('Y-m-d');?>" />

<p align="center"><input type="submit" name="edit" value="Сохранить" alt="Сохранить"/></p>
 
</form>
</div>
</div>