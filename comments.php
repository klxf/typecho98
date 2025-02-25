<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div class="window" id="commentsWindow" style="display: none">
    <div class="title-bar" id="addCommentTitleBar">
        <span class="title">
            <img class="logo" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABVUlEQVR42p2SvU7DMBDHz1IlVImlY1iQwsSAinQeqs6MyVCkggRDNntgYChSVo8sSF3tN2Bg6srCxhA/RSVWHsH4Q03qJimFiyI75/x/92UC+4xVxq+Kkr5fdg6EAZbFLitGZoxWhPwCEIbJBBARFA8erNxeH5KBMFJ+AWMIhGMtQKyMlu67H+KdZVma53kKVDHQ9um0PoATz9Nv4Jq5mAGwJ+UWoCgKM50eAVdoU2be+XL34dfF4tjVYZHKQnl3BkKAWa0ql6ObmxdsmxOLk9DVi/NldHZ7/wRNszQlg8HAz308/gxi1CDt6yYzGl1BmqabhoC2lU4mD80YHSTPKSQJi6K0xLMZqPUaULIY4Idpy8kyGQGC+D2U54dBA7gL8Pa6NJc093sXkXIVwSrJ6l5prboB1zePdZ0h6vYK9b7VgwYwrNP9VwanZ8ND71AbsBnjX+wHuoKGdOyr9MkAAAAASUVORK5CYII=" draggable="false">
            评论 - 已有<?php $this->commentsNum('%d'); ?>条评论
        </span>
        <div class="title-bar-controls">
            <button aria-label="Minimize"></button>
            <button aria-label="Maximize"></button>
            <button aria-label="Close" onclick="closeWindow(this)"></button>
        </div>
    </div>

    <div class="body">
        <div class="comments">
            <?php $this->comments()->to($comments); ?>
            
            <?php if ($comments->have()): ?>
            
            <?php $comments->listComments(); ?>

            <?php $comments->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
	
            <?php endif; ?>
        </div>
        <div class="add-comment">
            <div id="<?php $this->respondId(); ?>" class="respond">
		        <div class="cancel-comment-reply">
		        <?php $comments->cancelReply(); ?>
		        </div>
                <?php if($this->allow('comment')): ?>
                <form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form">
                    <?php if($this->user->hasLogin()): ?>
    		    	<p>
    		    	    <?php _e('Hi, '); ?><a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>. <a href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('Logout'); ?> &raquo;</a>
    		    	</p>
    		    	<?php else: ?>
                    <div>
                        <label for="author" class="required"><?php _e('昵称'); ?></label>
                        <input type="text" name="author" id="author" class="text inset-input" value="<?php $this->remember('author'); ?>" required />
                    </div>
                    <div>
                        <label for="mail" <?php if ($this->options->commentsRequireMail): ?> class="required"<?php endif; ?>>邮箱</label>
                        <input type="email" name="mail" id="mail" class="text inset-input" value="<?php $this->remember('mail'); ?>" <?php if ($this->options->commentsRequireMail): ?> required<?php endif; ?> />
                    </div>
                    <div>
    		    		<label for="url"<?php if ($this->options->commentsRequireURL): ?> class="required"<?php endif; ?>><?php _e('主页'); ?></label>
    		    		<input type="url" name="url" id="url" class="text inset-input" placeholder="<?php _e('http://'); ?>" value="<?php $this->remember('url'); ?>"<?php if ($this->options->commentsRequireURL): ?> required<?php endif; ?> />
    		    	</div>
                    <?php endif; ?>
                    <div>
                        <label for="textarea" class="required"><?php _e('内容'); ?></label>
                        <textarea rows="4" name="text" id="textarea" class="textarea inset-input" required ><?php $this->remember('text'); ?></textarea>
                    </div>
                    <button type="submit" class="submit" id="submit"><?php _e('提交评论'); ?></button>
                </form>
            </div>
	        <?php endif; ?>
        </div>
    </div>
</div>