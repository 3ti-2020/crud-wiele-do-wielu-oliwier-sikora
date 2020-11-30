document.addEventListener('DOMContentLoaded', () => {
    const form = document.querySelector(".form");
    const textarea = document.querySelector(".text-area");
    const list = document.querySelector(".list");

    function addTask(text) {

        const task = document.createElement("div");
        task.classList.add("task");

        const del = document.createElement("button");
        del.classList.add("del");
        del.innerText = "DELETE";
        del.addEventListener("click", () => {
            task.remove();
        });

        const taskInner = document.querySelector(".task-cont").content.cloneNode(true);

        task.append(taskInner);
        task.append(del);

        task.querySelector(".task-value").innerText = text;

        list.append(task);
    }

    form.addEventListener("submit", prevent => {
        prevent.preventDefault();

        if(textarea.value !== ""){
            addTask(textarea.value);
            textarea.value = "";
        }
    });
});