<!DOCTYPE html>
<html>
    <body>
        <header class="default">
            <div class="container">
                <div class="intro-text">
                    <div class="col-lg-offset-3 col-lg-6">
                        <div class="form-group">
                            <?php echo form_open(base_url() . 'index.php/admin/pdf/geraPDF'); ?>
                            <button class="btn btn-large" type="submit">Gerar</button>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </body>
</html>
