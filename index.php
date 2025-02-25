<?php
/**
 * Windows 98 风格的 Typecho 主题
 *
 * @package Typecho98
 * @author Mr_Fang
 * @version 0.1
 * @link https://fang.blog.miri.site
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>
    <div class="window active" id="mainWindow">
        <div class="title-bar" id="mainTitleBar">
        <span class="title">
            <img class="logo" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQBAMAAADt3eJSAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAG1BMVEUAAACAgID////AwMAAAP8AAAAAAICAgAD//wAEq6BCAAAAAXRSTlMAQObYZgAAAAFiS0dEAmYLfGQAAAAHdElNRQfiBAkBOygXFdSWAAAAZUlEQVQI12NgYBQEAgYgYFRSUlIWgDEUwQwVJ9XQAAYGNhc3FSVlICO9xSUJxGCrcFJzAzHYW1xcwIzilCSQtgCG8hRnM7BISZgLRDELa2ggWIrBUQmihoHRGASADNZQEAhggAEA5J8Wdj6wl6oAAAAldEVYdGRhdGU6Y3JlYXRlADIwMTgtMDQtMDlUMDE6NTk6NDAtMDQ6MDB6jF5OAAAAJXRFWHRkYXRlOm1vZGlmeQAyMDE4LTA0LTA5VDAxOjU5OjQwLTA0OjAwC9Hm8gAAAABJRU5ErkJggg==" draggable="false">
            <?php $this->options->title(); ?>
        </span>
            <div class="title-bar-controls">
                <button aria-label="Minimize"></button>
                <button aria-label="Maximize"></button>
                <button aria-label="Close" onclick="closeWindow(this)"></button>
            </div>
        </div>

        <div class="toolbar">
            <?php $this->need('toolbar.php'); ?>
        </div>

        <div class="body">
            <div class="content">
                <div class="panel">
                    <h1><?php $this->options->title(); ?></h1>
                    <span class="hr"></span>
                    <p><?php $this->options->description(); ?></p>
                </div>
                <div class="app">
                    <div class="post-list">
                        <?php while($this->next()): ?>
                            <div class="post-title">
                                <a href="<?php $this->permalink() ?>"><?php $this->title(); ?></a>
                            </div>
                            <div class="post-meta">
                                <span><?php $this->author(); ?></span> 于 <time datetime="<?php $this->date('c'); ?>"><?php $this->date(); ?></time> <span class="split"></span> 共1条评论
                            </div>
                            <div class="post-content">
                                <p><?php $this->excerpt(); ?></p>
                            </div>
                            <div class="post-categories">
                                分类：<?php $this->category(','); ?>
                            </div>
                        <?php endwhile; ?>
                    </div>
                    <?php $this->pageNav("«","»","1") ;?>
                </div>
            </div>
        </div>
    </div>

<?php $this->need('footer.php'); ?>