<script type='text/javascript'>
    $(function () {
        $("a.reply").click(function () { 
            var id = $(this).attr("id");
            $("#parent_id").attr("value", id);
            $("#comment_text").focus();           
        });
    });
</script>


<div id="blog">
			  
			   <div id="article">
				<h2><?=$pages_info['title'];?></h2>
			<div id=photo><img src=<?=base_url()?>images/articles/<?=$pages_info['mini_img'];?> width="100" height="100"/></div>
			 <?=$pages_info['text'];?>
			 
			   
			    <span>Автор: <?=$pages_info['author'];?> Категория: <?=$pages_info['category'];?></span>
				<span>Дата: <?=$pages_info['date'];?></span>
				<span><?php if($cnt_comments){echo "Комментарии: ".$cnt_comments;} ?></span>
			</div>
			<div>
				<hr/>
				<hr/>
			</div>
			
          
          <a name="c"></a>
        <div align="center" style="font-size: 18px;">Комментарии</div>
		
        <hr />
        <ul id="comments-wrapper">
            <? echo $comments;?>
        </ul>
          
        <hr />
        <a name="f"></a>
        <form id="comment_form"   action="<?=base_url();?>index.php/article/view/<?=$pages_info['title_en'];?>#f" method="post">
        <?php 
        if (!empty($user)){
            $par_id=set_value('parent_id','0');
            $err=form_error('comment_text');
            $com_text=set_value('comment_text');
            $tit_en=$pages_info['title_en'];
            $art_id=$pages_info['id'];
            
            printf("
            <input type='hidden' name='parent_id' value='%s' id='parent_id'/>
            <input type='hidden' name='author' value='%s'/>
            <input type='hidden' name='avatar' value='%s' />
            <div>Текст комментария: <span class='show_error'>%s</span></div>
            <textarea id='comment_text' name='comment_text' cols='50' rows='7'>%s</textarea><br />
			<input type='hidden' name='note_id' value='%s' />
			<input type='hidden' name='art_id' value='%s' />
            
            <input type='submit' name='add' value='Отправить' alt='Отправить' />
            ",$par_id,$user,$user_info['avatar'],$err,$com_text,$tit_en,$art_id);            
        }else{
            echo('Для того, чтобы оставить комментарий необходимо авторизироваться!');
        }
        ?>    
                   
            
        </form>
			</div>