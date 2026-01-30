<?php extract(compact('error')); ?>

<h2>Crear Nueva Tarea</h2>

<?php if (!empty($error)): ?>
    <div class="error">
        <?php echo htmlspecialchars($error); ?>
    </div>
<?php endif; ?>

<form method="POST" action="index.php?accion=guardar">
    <label for="titulo">Título:</label>
    <input type="text" name="titulo" id="titulo" required maxlength="60" 
           placeholder="Mínimo 3 caracteres, máximo 60">
    
    <button type="submit">Guardar</button>
    <a href="index.php?accion=listar">Cancelar</a>
</form>

        </main>
    </div>
</body>
</html>
