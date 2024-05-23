document.getElementById('todoInput').addEventListener('keydown', function(e) {
    if (e.keyCode === 13 && this.value) {
        const li = document.createElement('li');

        const span = document.createElement('span');
        span.textContent = this.value;
        span.className = 'todoText';
        li.appendChild(span);

        const doneBtn = document.createElement('button');
        doneBtn.innerHTML = '完成';
        doneBtn.className = 'todoBtn done';
        doneBtn.addEventListener('click', function() {
            this.parentElement.style.textDecoration = 'line-through';
        });
        li.appendChild(doneBtn);

        const deleteBtn = document.createElement('button');
        deleteBtn.innerHTML = '删除';
        deleteBtn.className = 'todoBtn delete';
        deleteBtn.addEventListener('click', function() {
            this.parentElement.remove();
        });
        li.appendChild(deleteBtn);

        document.getElementById('todolist').appendChild(li);

        this.value = '';

        //调整大小
        adjustHeights();
    }
});