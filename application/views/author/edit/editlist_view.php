	<div class="span8">

	<div class="page_title">Выберите запись для редактирования</div>
		  <table border="0" align="center" cellpadding="0" cellspacing="0" id="pageslist">
				  <tr>
					<td width="10%" class="title">Номер</td>
					<td width="30%" class="title">Название</td>
				  </tr>
				  <?php foreach($edit as $item): ?>
				  <tr>
					<td width="10%"><?=$item['id'];?></td>
					<td width="30%"><a href="<?=base_url();?>index.php/admin/edit/<?=$page?>/<?=$item['id'];?>"><?=$item['title'];?></a></td>
				  </tr>
				  <?php endforeach; ?>
		  </table>
	</div>
</div>