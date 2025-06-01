<?php
if (isset($_POST['todo_item'])) {
    $items = get_option('simple_todo_items', []);
    $items[] = sanitize_text_field($_POST['todo_item']);
    update_option('simple_todo_items', $items);
}

if (isset($_GET['delete'])) {
    $items = get_option('simple_todo_items', []);
    unset($items[intval($_GET['delete'])]);
    update_option('simple_todo_items', array_values($items));
}

$todo_items = get_option('simple_todo_items', []);
?>

<div class="wrap">
    <h1>Simple To-Do List</h1>
    <form method="post">
        <input type="text" name="todo_item" placeholder="Enter new task..." required />
        <button type="submit" class="button button-primary">Add Task</button>
    </form>

    <ul class="todo-list">
        <?php foreach ($todo_items as $index => $item): ?>
            <li>
                <?php echo esc_html($item); ?>
                <a href="?page=simple-todo&delete=<?php echo $index; ?>" class="delete-link">×</a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
