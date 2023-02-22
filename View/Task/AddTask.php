<div id="btn-label">
    <button id="btn-add" onclick="addTask();"><img src="View/Assets/plus-btn-32.png"></button>
    <label for="btn-add">Adicione Uma Nova Tarefa</label>
</div>

<div id="taskModal" class="modal"> 
    <span class="close" onclick="closeTask();">&times;</span>
    <div class="modal-content">
        <form action="Controller/Task/Edit.php" method="post" class="modal-form">
            <label for="input-title">Título:</label>
            <input type="text" name="title" id="input-title" class="modal-form-title" required>

            <label for="input-description">Descrição:</label>
            <textarea name="description" id="input-description" class="modal-form-description" cols="35" rows="10"></textarea>

            <button type="submit" class="modal-form-submit">ENVIAR</button>

        </form>
    </div>
</div>