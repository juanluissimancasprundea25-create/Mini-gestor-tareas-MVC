<?php extract(compact('tareas')); ?>

<h2>Lista de Tareas</h2>

<?php if (count($tareas) == 0): ?>
    <div class="empty">
        <p>No hay tareas</p>
        <p><a href="index.php?accion=crear">Crear primera tarea</a></p>
    </div>
<?php else: ?>
    <table>
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Título</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tareas as $tarea): ?>
            <tr>
                <td><?php echo $tarea->getFechaCreacion(); ?></td>
                <td><?php echo htmlspecialchars($tarea->getTitulo()); ?></td>
                <td><?php echo $tarea->getEstado(); ?></td>
                <td>
                    <a href="index.php?accion=borrar&id=<?php echo $tarea->getId(); ?>" 
                       class="btn"
                       onclick="return confirm('¿Borrar esta tarea?')">Borrar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>

        </main>
    </div>
</body>
</html>
