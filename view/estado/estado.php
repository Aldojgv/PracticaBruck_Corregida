<h1 class="page-header">Alumnos</h1>

<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=Alumno&a=Crud">Nuevo alumno</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th style="width:180px;">Nombre</th>
            <th>Descripcion</th>
            <th>RUC</th>
            <th style="width:60px;"></th>
            <th style="width:60px;"></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->cnombre; ?></td>
            <td><?php echo $r->cdesc; ?></td>
            <td><?php echo $r->RUC; ?></td>
    </td>
            <td>
                <a href="?c=Cliente&a=Crud&idCliente=<?php echo $r->idCliente; ?>">Editar</a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Cliente&a=Eliminar&idCliente=<?php echo $r->idCliente; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 
