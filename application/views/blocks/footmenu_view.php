<div id="footmenu">
	<ul>
        <?php foreach ($pages as $item):?>
        <li><a href="<?=base_url();?>index.php/pages/page/<?=$item['title_en']?>"><?=$item['title']?></a></li>
        <?php endforeach;?>
	</ul> 
</div>
	</div>