$(document).ready(function () {
    function loadTasks(showAll = false) {
        $.get('/tasks', function (data) {
            $('#task-list').empty();
            data.forEach(function (task, index) {
                if (showAll || !task.completed) {
                    $('#task-list').append(`
                        <tr>
                            <td>${index + 1}</td>
                            <td>
                                <input title="${task.completed ? 'Completed' : 'Pending'}" type="checkbox" class="task-checkbox" data-id="${task.id}" ${task.completed ? 'checked' : ''}>
                            </td>
                            <td>${task.title}</td>
                            <td>
                                <button class="btn btn-danger btn-sm delete-task" data-id="${task.id}">Delete</button>
                            </td>
                        </tr>
                    `);
                }
            });
        });
    }

    $('#add_todo').submit(function (e) {
        e.preventDefault();
        const title = $('#task-title').val();
        const token = $('input[name="_token"]').val(); 
        if (title.trim() === '') {
            alert('Task title cannot be empty');
            return;
        }

        $.post('/tasks', { title: title, _token: token }, function () {
            $('#task-title').val('');
            loadTasks();
        }).fail(function (response) {
            alert(response.responseJSON.errors.title[0]);
        });
    });

    $('#show-tasks').click(function () {
        loadTasks(true);
    });

    $(document).on('click', '.task-checkbox', function () {
        const taskId = $(this).data('id');
        const token = $('input[name="_token"]').val(); 
        $.ajax({
            url: `/tasks/${taskId}`,
            type: 'PATCH',
            data: { _token: token },
            success: function () {
                loadTasks();
            }
        });
    });

    $(document).on('click', '.delete-task', function () {
        if (!confirm('Are you sure you want to delete this task?')) {
            return;
        }
        const taskId = $(this).data('id');
        const token = $('input[name="_token"]').val(); 
        $.ajax({
            url: `/tasks/${taskId}`,
            type: 'DELETE',
            data: { _token: token },
            success: function () {
                loadTasks();
            }
        });
    });

    loadTasks();
});
