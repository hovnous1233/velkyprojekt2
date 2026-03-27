<?php

use App\Models\Komponenty;

// Potřebné helpery pro CI4
helper(['form', 'html']); 

?>
<?=$this->extend("layout/template");?>


<?=$this->section("content");?>
<?php $table = new \CodeIgniter\View\Table(); 

$table->setHeading("Název komponentu","Typ komponentu","Fotka"); 

foreach ($vyrobci as  $row){
    $obrazek= [
        "src" => base_url("komponenty/".$row->pic),
        "height" => "200",
        //"width" => "200"
    ];
    $table->addRow(anchor("typkomponentu/".$row->id,$row->nazev), $row->typKomponent, img($obrazek));
}

$template = array(
'table_open'=> '<table class="table table-bordered">',
'thead_open'=> '<thead>',
'thead_close'=> '</thead>',
'heading_row_start'=> '<tr>',
'heading_row_end'=>' </tr>',
'heading_cell_start'=> '<th>',
'heading_cell_end' => '</th>',
'tbody_open' => '<tbody>',
'tbody_close' => '</tbody>',
'row_start' => '<tr>',
'row_end'  => '</tr>',
'cell_start' => '<td>',
'cell_end' => '</td>',
'row_alt_start' => '<tr>',
'row_alt_end' => '</tr>',
'cell_alt_start' => '<td>',
'cell_alt_end' => '</td>',
'table_close' => '</table>'
);

$table->setTemplate($template);

echo $table->generate();
echo $pager->links();
?>

<hr id="formular-sekce">

<div class="card mt-4 mb-5">
    <div class="card-header bg-light">
        <h3>Přidat novou komponentu</h3>
    </div>
    <div class="card-body">
    <?= form_open_multipart('ulozit-novou-komponentu'); ?>
            <div class="mb-3">
                <label for="nazev" class="form-label">Název:</label>
                <input type="text" name="nazev" id="nazev" class="form-control">
            </div>
            <div class="mb-3">
                <label for="typ" class="form-label">Typ:</label>
                <input type="text" name="typ" id="typ" class="form-control">
            </div>
            <div class="mb-3">
                <label for="obrazek" class="form-label">Obrázek:</label>
                <input type="file" name="obrazek" class="form-control" id="logo" accept=".jpg, .png">
            </div>
            <div class="mt-4">
                <button type="submit" class="btn btn-dark">Přidat novou komponentu</button>
            </div>
        <?= form_close(); ?>
    </div>
</div>

<?=$this->endSection();?>