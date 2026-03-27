<?php

?>
<?=$this->extend("layout/template");?>


<?=$this->section("content");?>

<h1>Výrobci</h1>
<form action="<?= base_url('vyrobce/ulozit') ?>" method="post">
    <input type="text" name="vyrobce" required>
    <input type="submit" value="Přidat kategorii">
</form>
<?php $table = new \CodeIgniter\View\Table(); 

$table->setHeading("Id výrobce","Výrobce"); 

foreach ($vyrobce as  $row){
    $editovat = anchor("editace/index/" . $row->idVyrobce, "Editovat", ['class' => ' btn btn-default']);
    $table->addRow($row->idVyrobce, anchor("komponenty/".$row->url,$row->vyrobce),$editovat);
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




<?=$this->endSection();?>