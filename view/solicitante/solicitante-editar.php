<h1 class="page-header">
    <?php echo $alm->id != null ? $alm->Nombre : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Cliente">CLIENTE</a></li>
  <li class="active"><?php echo $alm->id != null ? $alm->Nombre : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-cliente" action="?c=Cliente&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="idCliente" value="<?php echo $alm->idCliente; ?>" />
    
    <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="cnombre" value="<?php echo $alm->cnombre; ?>" class="form-control" placeholder="Ingrese su nombre" data-validacion-tipo="requerido|min:3" />
    </div>
    
    <div class="form-group">
        <label>Descripcion</label>
        <input type="text" name="cdesc" value="<?php echo $alm->cdesc; ?>" class="form-control" placeholder="Ingrese su apellido" data-validacion-tipo="requerido|min:10" />
    </div>
    
    <div class="form-group">
        <label>RUC</label>
        <input type="text" name="RUC" value="<?php echo $alm->RUC; ?>" class="form-control" placeholder="Ingrese su correo electrónico" data-validacion-tipo="requerido|min:10" />
    </div>
    
     
    <hr />
    
    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-cliente").submit(function(){
            return $(this).validate();
        });
    })
</script>