<div class="row">
    <div class="col-sm-12 col-md-6">
        <h2>Importar Rubros, SubRubros y Grupos de Productos</h2>
        <form action="/cpanel.php?opcion=importar_rub" method="post" enctype="multipart/form-data" name="frmImportar">
            <div class="form-group">
                <label for="fileSQL">Seleccione archivo para importar los rubros, subrubros y grupos</label>
                <input type="file" name="fileSQL" id="fileSQL" class="form-control" accept="text/plain" required>
            </div>

            <div class="form-group">
                <input type="submit" name="cmdImportar" id="Importar" class="btn btn-primary" value="Importar">
            </div>
        </form>
        <br><br>
        <?php if (isset($_FILES["fileSQL"])) :
	
            $fileSQL = $_FILES["fileSQL"];
            
            $sql = file_get_contents($fileSQL['tmp_name']);
            $sql = utf8_encode($sql);

            $productos = new Productos();
            $result = $productos->importRub_SRub_Gru($sql);
            
            if (is_integer($result) && $result > 1) : ?>
                <p class="text-success"><?php echo $result; ?> Rubros, SubRubros y Grupos Importados Correctamente!</p>
            <?php else : ?>
                <p class="text-danger">Ocurrió un error en la importación. <?php echo $result; ?></p>
            <?php endif;

        endif; ?>
    </div>
</div>