	<div class="span8">
			  
			  <table border="0" align="center" cellpadding="0" cellspacing="0" id="pageslist">
				  <tr>
					<td width="10%" class="title">№</td>
					<td width="30%" class="title">Название</td>
					<td width="30%" class="title">Ссылка</td>
					<td width="30%" class="title">Скрыта</td>
				  </tr>
				  <?php foreach($edit as $item): ?>
				  <tr>
					<td width="10%"><?=$item['id'];?></td>
					<td width="30%"><a href="<?=base_url();?>index.php/admin/edit/<?=$page?>/<?=$item['id'];?>"><?=$item['title'];?></a></td>
					<td width="30%"><a href="<?=base_url();?>index.php/pages/page/<?=$item['title_en']?>" target="_blank"><?=base_url();?>index.php/pages/page/<?=$item['title_en']?></a></td>
					<td width="30%"><?=$item['hidden'];?></td>
				  </tr>
				  <?php endforeach; ?>
			  </table>

		</td>
	  </tr>
	</table>
	</div>
</div>