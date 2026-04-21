<?php
use App\Models\Komponenty;
?>
<?=$this->extend("layout/template");?>
<?=$this->section("content");?>

<h1>Informace o komponentu</h1>
<p><b>Název: </b> <?= $komponenty->nazev ?></p>
<p><b>Výrobce: </b> <?= $komponenty->vyrobce ?></p>
<p><b>Typ komponentu: </b> <?= $komponenty->typKomponent ?></p>
<p><b>Odkaz na eshop: </b> <?= anchor($komponenty->odkaz.$komponenty->id) ?></p>

<?php
 $obrazek= [
    "src" => base_url("komponenty/".$komponenty->pic),
    "height" => "150"
];
?>
<p><b>Fotka: </b> <?= img($obrazek) ?></p>

<?php 

if (!function_exists('form_modal')) {
    function form_modal($idModal, $idRow, $heading, $message, $route, $type = "danger", $buttonText = "Smazat")
    {
        $result = "";
        $result .= "<div class=\"modal fade\" id=\"" . $idModal . "\">\n";
        $result .= "<div class=\"modal-dialog\">\n";
        $result .= " <div class=\"modal-content\">\n";
        $result .= "<div class=\"modal-header\">\n";
        $result .= "<h4 class=\"modal-title\">" . $heading . "</h4>\n";
        $result .= "<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\"></button>\n";
        $result .= "</div>\n";
        $result .= "<div class=\"modal-body\">\n";
        $result .= $message . "\n";
        $result .= "</div>\n";
        $result .= "<div class=\"modal-footer\">\n";
        $result .= form_open($route);
        $result .= "<input type=\"hidden\" name=\"_method\" value=\"DELETE\">";
        $result .= "<input type=\"hidden\" name=\"id\" value=\"" . $idRow . "\">";
        $result .= "<button type=\"submit\" class=\"btn btn-" . $type . "\">" . $buttonText . "</button>\n";
        $result .= "</form>\n";
        $result .= "</div>\n</div>\n</div>\n</div>\n";

        return $result;
    }
}

$table = new \CodeIgniter\View\Table(); 
$table->setHeading("Název vlastnosti", "Hodnota", "Akce"); 


foreach ($parametr as $row){
    $currentModalId = "modal_" . $row->idParametr;
    $butonka = '<button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#' . $currentModalId . '">Smazat</button>';
    
    $table->addRow($row->nazev, $row->hodnota, $butonka);

    $modaly .= form_modal(
        $currentModalId, 
        $row->idParametr, 
        "Smazat hodnotu", 
        "Opravdu chcete smazat hodnotu <b>" . $row->hodnota . "</b>?", 
        "typkomponentu/delete" 
    );
}

$template = array(
    'table_open'=> '<table class="table table-bordered">',
    'table_close' => '</table>'
);
$table->setTemplate($template);
echo $table->generate();
echo $modaly;
?>

<?=$this->endSection();?>