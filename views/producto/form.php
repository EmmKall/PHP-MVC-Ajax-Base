<div class="form-group col-12 col-md-4">
    <div class="input-group">
        <span class="input-group-text bg-dark"><i class="fas fa-warehouse"></i></span>
        <input type="text" class="form-control" placeholder="Ingresa nombre de producto" name="nombre" id="nombre" value="<?php echo(isset($this->nombre)) ? $this->nombre: ''; ?>">
    </div>
</div>

<div class="form-group col-12 col-md-4">
    <div class="input-group">
        <span class="input-group-text bg-dark"><i class="fas fa-warehouse"></i></span>
        <input type="number" class="form-control" placeholder="Ingrese el monto" name="precio" id="precio" value="<?php echo(isset($this->nombre)) ? $this->nombre: ''; ?>">
    </div>
</div>