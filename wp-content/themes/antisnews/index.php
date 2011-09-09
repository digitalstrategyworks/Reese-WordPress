<?php global $themeoptionsprefix;?>
<?php $AntisnewsOptions=get_antisnewsoptions();?>
<?php $operationmode=$AntisnewsOptions[$themeoptionsprefix.'_operationmode'];?>
<?php if(!isset($operationmode) || empty($operationmode)){$operationmode="Magazine Off";}?>
<?php if($operationmode == "Tutorial"){ include (TEMPLATEPATH . '/tutorial-mode.php');}elseif($operationmode == "Magazine Off"){include (TEMPLATEPATH . '/index-nonmag.php');}elseif($operationmode == "Live"){include (TEMPLATEPATH . '/index-live.php');}else{include (TEMPLATEPATH . '/tutorial-mode.php');}?>
