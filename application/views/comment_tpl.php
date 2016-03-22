<li>
    <div class="wrapper">
        <div class="info">
            <span><strong>Автор:</strong> <?=$comment['author']?></span>
            <span><strong>Добавлен:</strong> <?=$comment['date']?></span>
            <img src="<?=base_url();?>images/avatars/thumbs/<?=$comment['avatar'];?>" />
            <hr>
        </div>
        <div class="comment-text">
            <div>Текст комментария:</div>
            <?=$comment['comment']?>
        </div>
        
        <a href='#comment_form' class='reply' id='<?= $comment['id'] ?>'>Ответить</a>
    </div>
    <? if(!empty($comment['childs'])):?>
        <ul class="comment-child"/>
            <?
            $this->load->library('comments_lib');
            echo $this->comments_lib->render($comment['childs']);
            ?>
        </ul>
    <? endif;?>
</li>