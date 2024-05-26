function more_content(button) {
    var content = button.previousElementSibling;
    var isVisible = content.getAttribute('data-visible');

    if (isVisible === 'true') {
        content.style.display = 'none';
        content.setAttribute('data-visible', 'false');
        button.textContent = '阅读更多';
    } else {
        content.style.display = 'block';
        content.setAttribute('data-visible', 'true');
        button.textContent = '收起';
    }
}

function ToPage(page) {
    window.location.href = '?page=' + page;
}