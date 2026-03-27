<?=$this->extend("layout/template");?>  

<?= $this->section('content') ?>

<div class="card ">
    <div class="card-header ">
        <h2 class="">Editace typu komponenty</h2>
    </div>
    <div class="card-body">

        <form action="<?= base_url('editace/aktualizovat/' . $vyrobce['idVyrobce']) ?>" method="post">
            
            <?= csrf_field() ?>

            <input type="hidden" name="_method" value="PUT">

            <input type="hidden" name="id_stare" value="<?= $vyrobce['idVyrobce'] ?>">

            <div class="mb-4">
                <label for="vyrobce_input" class="form-label fw-bold">Název:</label>
                
                <input type="text" 
                       name="vyrobce" 
                       id="vyrobce_input" 
                       class="form-control form-control-lg" 
                       value="<?= $vyrobce['vyrobce'] ?>" 
                       required 
                       autofocus>
                
            

            <div class="d-flex gap-2 mt-4">
                <button type="submit" class="btn  px-4 fw-bold btn-success">
                    Uložit změny 
                </button>
                
                <a href="<?= base_url('/') ?>" class="btn btn-light border">Zrušit</a>
            </div>

        </form>
    </div>
</div>

<?= $this->endSection() ?>