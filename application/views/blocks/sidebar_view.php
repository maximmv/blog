
        <div class="right_title">Статьи</div>
        <div class="right_items">
            
            <?php foreach ($category as $item): ?>
                <div><a href="<?=base_url();?>index.php/articles/cat/<?=$item['title_en'];?>"><?=$item['title'];?></a></div>
            <?php endforeach; ?>
            <div><a href="<?=base_url();?>index.php/articles">Все статьи</a></div>
        </div> 
		
		</div>