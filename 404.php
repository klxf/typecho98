<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>

<div class="window active" id="errorWindow" style="width:300px;top:10%;">
    <div class="title-bar" id="errorTitleBar">
        <span class="title">
            Windows
        </span>
        <div class="title-bar-controls">
            <button aria-label="Close" onclick="closeWindow(this)"></button>
        </div>
    </div>

    <div class="tips">
        <div style="display: flex; flex-direction: row;">
            <img width="32" height="32" src="<?php $this->options->themeUrl('img/error-32x32-8bpp.png'); ?>" style="margin:16px;display:block;">
            <div style="font-size:14px;margin-top:22px;flex: 1 1 1px;overflow-wrap:break-word;">
                Page Not Found.
            </div>
        </div>
        <div style="display: flex">
            <button style="min-width:75px;height:23px;margin:12px auto;" onclick="location.href='<?php $this->options->siteUrl(); ?>'">OK</button>
        </div>
    </div>
</div>

<?php $this->need('footer.php'); ?>