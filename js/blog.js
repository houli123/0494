//用于展开或收起内容区域
function more_content(button) {
    // 获取按钮前一个兄弟元素
    var content = button.previousElementSibling;
    // 获取内容容器当前的可见性状态，自定义的属性
    var isVisible = content.getAttribute('data-visible');

    // 检查内容是否可见
    if (isVisible === 'true') {
        // 如果内容是可见的，将其隐藏
        content.style.display = 'none';
        content.setAttribute('data-visible', 'false');
        button.textContent = '阅读更多';
    } else {
        // 如果内容是隐藏的，将其显示
        content.style.display = 'block';
        content.setAttribute('data-visible', 'true');
        button.textContent = '收起';
    }
}

//用于将用户导航到指定的页面
function ToPage(page) {
    window.location.href = '?page=' + page;
}