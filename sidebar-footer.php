<?php
/**
 * Widgets do Sidebar.
 *
 * Autor: Jair Rebello
 * Site: www.escolasites.com
 */

//pegar a quantidade de conjuntos de widgets
$footerwidgets = is_active_sidebar('rodape-1') + is_active_sidebar('rodape-2') + is_active_sidebar('rodape-3') + is_active_sidebar('rodape-4');

// padrão
$footergrid = "one_fourth";

// se existir apenas um conjunto de widgets
if ($footerwidgets == "1") {
	$footergrid = "sixteen columns alpha omega";
// se existir dois conjuntos de widgets
} elseif ($footerwidgets == "2") {
	$footergrid = "one_half";
// se existir três conjuntos de widgets
} elseif ($footerwidgets == "3") {
	$footergrid = "one_third";
// se existir quatro conjuntos de widgets
} elseif ($footerwidgets == "4") {
	$footergrid = "one_fourth";
}

?>

<?php if ($footerwidgets) : ?>

<?php if (is_active_sidebar('rodape-1')) : ?>
<div class="<?php echo $footergrid;?>">
	<?php dynamic_sidebar('rodape-1'); ?>
</div>
<?php endif;?>

<?php if (is_active_sidebar('rodape-2')) :
$last = ($footerwidgets == '2' ? ' last' : false);?>

<div class="<?php echo $footergrid.$last;?>">
	  <?php dynamic_sidebar('rodape-2'); ?>
</div>
<?php endif;?>

<?php if (is_active_sidebar('rodape-3')) : 
$last = ($footerwidgets == '3' ? ' last' : false);?>

<div class="<?php echo $footergrid.$last;?>">
	  <?php dynamic_sidebar('rodape-3'); ?>
</div>
<?php endif;?>

<?php if (is_active_sidebar('rodape-4')) : 
$last = ($footerwidgets == '4' ? ' last' : false);?>

<div class="<?php echo $footergrid.$last;?>">
		  <?php dynamic_sidebar('rodape-4'); ?>
</div>
<?php endif;?>

<div class="clear"></div>

<?php endif;?>