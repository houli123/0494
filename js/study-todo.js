// 获取 'todoInput' 元素，并在敲击键盘时添加事件监听
document.getElementById('todoInput').addEventListener('keydown', function(e) {
    // 检查是否按下回车键 (keyCode 13) 并且输入框（this.value）内输入的内容非空
    if (e.keyCode === 13 && this.value.trim()) { // 使用 trim() 确保仅仅是回车
        // 创建新的待办项目
        const li = document.createElement('li');

        // 为待办项目添加文本内容
        const span = document.createElement('span'); 
        span.textContent = this.value; // 设置待办项目的文本内容为输入框中的值
        span.className = 'todoText'; // 为 span 标签添加样式类
        li.appendChild(span); 

        // 添加完成按钮
        const doneBtn = document.createElement('button');
        doneBtn.textContent = '完成';
        doneBtn.className = 'todoBtn done'; 
        // 为完成按钮的事件监听器
        doneBtn.addEventListener('click', function() {
            // 当按钮点击时，给待办项目 li 标签添加划线样式表示完成
            this.parentElement.style.textDecoration = 'line-through';
        });
        li.appendChild(doneBtn); 

        // 添加删除按钮
        const deleteBtn = document.createElement('button');
        deleteBtn.textContent = '删除'; 
        deleteBtn.className = 'todoBtn delete'; 
        // 为删除按钮添加事件监听
        deleteBtn.addEventListener('click', function() {
            // 当按钮被点击时，删除整个（待办项）
            this.parentElement.remove();
        });
        li.appendChild(deleteBtn); // 将删除按钮添加到 li （待办项）中

        // 将新的待办项目 li 添加到待办事项列表（ul元素）中
        document.getElementById('todolist').appendChild(li);

        // 清空输入框以便添加下一个待办事项
        this.value = '';

        // 根据内容调整大小
        adjustHeights();
    }
}); 