<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
        <button onclick="location.href='<?php $this->options->siteUrl(); ?>'"><?php _e('首页'); ?></button>
        <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
        <?php while($pages->next()): ?>
        <button onclick="location.href='<?php $pages->permalink(); ?>'"><?php $pages->title(); ?></button>
        <?php endwhile; ?>