<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<script>
    let isDragging = false;
    let currentDraggingTitleBar = null;
    let offsetX, offsetY;

    document.addEventListener('DOMContentLoaded', () => {
        document.querySelectorAll('.window').forEach((windowElement) => {
            const p = JSON.parse(localStorage.getItem(windowElement.id + '_p'));
            if (p) {
                windowElement.style.left = p.x + 'px';
                windowElement.style.top = p.y + 'px';
            }
        });
    });

    document.addEventListener('mousedown', (e) => {
        const titleBar = e.target.closest('.title-bar');
        const clickedWindow = e.target.closest('.window');

        if (titleBar) {
            isDragging = true;
            currentDraggingTitleBar = titleBar;
            const windowElement = titleBar.closest('.window');
            if (windowElement) {
                offsetX = e.clientX - windowElement.offsetLeft;
                offsetY = e.clientY - windowElement.offsetTop;
            }
        }
        if (clickedWindow) {
            toggleActive(clickedWindow);
        }
    });

    document.addEventListener('mousemove', (e) => {
        if (!isDragging || !currentDraggingTitleBar) return;

        const windowElement = currentDraggingTitleBar.closest('.window');
        if (windowElement) {
            windowElement.style.left = e.clientX - offsetX + 'px';
            windowElement.style.top = e.clientY - offsetY + 'px';

            const p = {
                x: e.clientX - offsetX,
                y: e.clientY - offsetY
            };

            localStorage.setItem(windowElement.id + '_p', JSON.stringify(p));
        }
    });

    document.addEventListener('mouseup', () => {
        isDragging = false;
        currentDraggingTitleBar = null;
    });

    document.querySelectorAll('a').forEach((a) => {
        a.addEventListener('click', (e) => {
            const audio = new Audio('<?php $this->options->themeUrl('audio/START.wav'); ?>');
            audio.play();
        });
    });

    function closeWindow(closeButton) {
        const windowElement = closeButton.closest('.window');
        if (windowElement) {
            windowElement.style.display = 'none';
        }
    }

    function toggleActive(currentWindow) {
        document.querySelectorAll('.window').forEach((windowElement) => {
            windowElement.classList.remove('active');
        });

        currentWindow.classList.add('active');
    }

    function toggleCommentWindow() {
        if(document.getElementById("commentsWindow").style.display === 'none') {
            document.getElementById("commentsWindow").style.display = 'block';
            toggleActive(document.getElementById("commentsWindow"));
        } else {
            document.getElementById("commentsWindow").style.display = 'none';
        }
    }

    if (window.location.hash === '#comments') {
        toggleCommentWindow();
    }

    // 愚人节彩蛋
    if (!document.cookie.includes('hideTips=true')) {
        document.getElementById("tipsWindow").style.display = 'block';
        toggleActive(document.getElementById("tipsWindow"));
    }
    function closeTipsWindow(closeButton) {
        const windowElement = closeButton.closest('.window');
        if (windowElement) {
            windowElement.style.display = 'none';
            document.cookie = 'hideTips=true; expires=Fri, 31 Dec 9999 23:59:59 GMT';
        }
    }
</script>
<?php $this->footer(); ?>
</body>
</html>
