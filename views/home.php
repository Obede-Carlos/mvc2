<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=ç, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Inventario de los Productos</h1>
    <?php foreach($products as $item): ?>
    <table>
        <tr>
            <td>Identificador: <a href=""></a></td>
            <td>Descripcion: <?= $item[1] ?></td>
            <td><a href="?method=show&&id=<?= $item[0] ?>"> Ver detalle</a></td>
        </tr>
    </table>
    <?php endforeach; ?>
</body>
</html>