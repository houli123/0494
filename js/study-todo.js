// 获取 'todoInput' 元素，并在敲击键盘时添加事件监听
document.getElementById('todoInput').addEventListener('keydown', function(e) {
    // 检查是否按下回车键并且输入内容非空
    if (e.keyCode === 13 && this.value) {
        // 创建新的待办项目（li 元素）
        const li = document.createElement('li');

        // 为待办项目添加文本
        const span = document.createElement('span');
        span.textContent = this.value; // 设置待办项目的内容
        span.className = 'todoText'; // 添加样式类
        li.appendChild(span); // 把文本添加到项目中

        // 添加完成按钮
        const doneBtn = document.createElement('button');
        doneBtn.innerHTML = '完成';
        doneBtn.className = 'todoBtn done';
        doneBtn.addEventListener('click', function() {
            // 点击后给待办项目添加划线样式
            this.parentElement.style.textDecoration = 'line-through';
        });
        li.appendChild(doneBtn);

        // 添加删除按钮
        const deleteBtn = document.createElement('button');
        deleteBtn.innerHTML = '删除';
        deleteBtn.className = 'todoBtn delete';
        deleteBtn.addEventListener('click', function() {
            // 点击后删除该待办项目
            this.parentElement.remove();
        });
        li.appendChild(deleteBtn);

        // 将新的待办项目添加到列表中
        document.getElementById('todolist').appendChild(li);

        // 清空输入框以便添加下一个待办事项
        this.value = '';

        // 如有必要，调整元素大小
        adjustHeights();
    }
});