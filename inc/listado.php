<?php

$sql2 = mysqli_query($conn, "SELECT * FROM url ORDER BY id DESC");

if (mysqli_num_rows($sql2) > 0) {
    $sql = mysqli_prepare($conn, "SELECT COUNT(*), SUM(clicks) FROM url");
    mysqli_stmt_execute($sql);
    mysqli_stmt_bind_result($sql, $count, $total);
    mysqli_stmt_fetch($sql);
?>
    <div class="statistics">
        <span>Links Totales: <span><?php echo $count ?></span> - Clics Totales: <span><?php echo $total ?></span></span>
        <a href="php/delete.php?delete=all" onclick="return confirm('¿Estás seguro de que deseas borrar todos los registros?')" title="Borrar todos los registros">Borrar Todo</a>
    </div>

    <div class="urls-area">
        <div class="title">
            <li>URL corta</li>
            <li>URL original</li>
            <li>Clics</li>
            <li>Acción</li>
            <li>Eliminar</li>
        </div>

        <?php while ($row = mysqli_fetch_assoc($sql2)): ?>
            <div class="data">
                <li>
                    <a href="<?php echo $row['shorten_url'] ?>" class="shorten-url" target="_blank">
                        <?php echo $domain . (strlen($row['shorten_url']) > 50 ? substr($row['shorten_url'], 0, 50) . '...' : $row['shorten_url']) ?>
                    </a>
                </li>
                <li>
                    <?php echo strlen($row['full_url']) > 50 ? substr($row['full_url'], 0, 50) . '...' : $row['full_url'] ?>
                </li>
                <li><?php echo $row['clicks'] ?></li>
                <li><button class="copy-button" data-clipboard-text="<?php echo $domain . $row['shorten_url'] ?>" title="Copiar enlace">Copiar</button></li>
                <li><a href="php/delete.php?id=<?php echo $row['shorten_url'] ?>" title="Borrar enlace" id="borrar-enlace">Borrar</a></li>
            </div>
        <?php endwhile; ?>
    </div>
<?php 
} 
?>
