<div id="blog">
			 <h2><?=$pages_info['text']?></h2>
            <hr/>
			<hr/>
             <?php foreach($articles as $item):?>
			   <div id ="date">
			   
				<?=$item['date'];?>
			   
			   </div>
			   <div id="article">
				<h2><?=$item['title'];?></h2>
				<div id=photo><img src=<?=base_url()?>images/articles/<?=$item['mini_img'];?> width="100" height="100"/></div>
			 <?=$item['description'];?><a href="<?=base_url();?>index.php/article/view/<?=$item['title_en'];?>">Читать далее...</a>
			 
			  
			    <span>Автор: <?=$item['author'];?> Категория: <?=$item['category'];?></a></span>
				
			</div>
			<div><hr/>
			<hr/></div>
			<?php endforeach; ?>
            <?php echo $this->pagination->create_links();?>
			</div>
	