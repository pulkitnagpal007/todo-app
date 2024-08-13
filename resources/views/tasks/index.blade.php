<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel To-Do List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <form id="add_todo">
            @csrf
            <h1>Laravel To-Do List</h1>
            <input type="text" id="task-title" placeholder="Enter task" class="form-control mb-3">
            <button type="submit" id="add-task" class="btn btn-primary mb-3">Add Task</button>
        </form>
        <button id="show-tasks" class="btn btn-secondary mb-3">Show All Tasks</button>
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Completed/Pending</th>
                    <th>Task</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="task-list"></tbody>
        </table>
    </div>
    
    <script src="{{asset('js/task.js')}}">
    </script>   

</body>
</html>
