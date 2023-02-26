<div class="card-add-task">
    <form action="../Controller/Task/HandleTask.php" class="card-form" method="post">
        <input type="text" name="task_title" minlength="5" maxlength="20" placeholder="Título" size="20" class="card-form-title" required>
        <textarea name="task_description" cols="20" rows="5" maxlength="250" class="card-form-description" placeholder="Descrição"></textarea>
        <button type="submit" class="card-form-submit">ENVIAR</button>
    </form>
</div>