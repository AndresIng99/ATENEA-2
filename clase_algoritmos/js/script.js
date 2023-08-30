document.addEventListener('DOMContentLoaded', function () {
    const addTaskButton = document.getElementById('agregarTarea');
    const taskList = document.getElementById('listaTareas');
    const newTaskInput = document.getElementById('nuevaTarea');

    

    //Aquí tendremos el código para agregar una nueva tarea

    addTaskButton.addEventListener('click', function () {
        const taskText = newTaskInput.value;
        if (taskText.trim() !== '') {
            const newTaskItem = document.createElement('li');
            newTaskItem.textContent = taskText;

            //tarea completada
            newTaskItem.addEventListener('click', function(){
                newTaskItem.classList.toggle('completado');
            });
            taskList.appendChild(newTaskItem);
            newTaskInput.value = '';
        }
    })
})