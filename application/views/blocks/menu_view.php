<div class="main">
 <div class="menu">
<ul class="r_menu"align="right">
     <?php foreach ($pages as $item):?>
       <?php if($item['position']=='right'):?>       
	  <li><a href="<?=base_url();?>index.php/pages/page/<?=$item['title_en']?>"><?=$item['title']?></a></li>
	  <?php endif;?>
      <?php endforeach;?>
</ul>
<ul  class="left_menu" align=left> 
       <?php foreach ($pages as $item):?>
       <?php if($item['position']=='left'):?>       
	  <li><a href="<?=base_url();?>index.php/pages/page/<?=$item['title_en']?>"><?=$item['title']?></a></li>
	  <?php endif;?>
      <?php endforeach;?>
</ul>
 </div>
<div class="head">
</div>