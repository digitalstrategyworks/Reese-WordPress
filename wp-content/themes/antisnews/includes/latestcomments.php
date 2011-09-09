<?php global $themeoptionsprefix;?>
<?php $recentcommentsexcerptlength=$AntisnewsOptions[$themeoptionsprefix.'_recentcommentsexcerptlength'];?>
<?php $recentcommentshowmany=$AntisnewsOptions[$themeoptionsprefix.'_numrecentcomments'];?>
<?php if(isset($AntisnewsOptions[$themeoptionsprefix.'_recentcommentsthumbwidth']) && !empty($AntisnewsOptions[$themeoptionsprefix.'_recentcommentsthumbwidth'])){$recentcommentsthumbnailwidth=$AntisnewsOptions[$themeoptionsprefix.'_recentcommentsthumbwidth'];}?>
<?php $recentcommentstitle=$AntisnewsOptions[$themeoptionsprefix.'_recentcommentstitle'];?>
<?php $recentcommentstitlephrase=$AntisnewsOptions[$themeoptionsprefix.'_recentcommentstitlephrase'];?>
<?php $recentcommentsreadposttext=$AntisnewsOptions[$themeoptionsprefix.'_recentcommentsreadposttext'];?>
<?php if(!isset($recentcommentsthumbnailwidth) || empty($recentcommentsthumbnailwidth)){$recentcommentsthumbnailwidth = 50;}?>
<?php $featuredcatimageszoomcrop=$AntisnewsOptions[$themeoptionsprefix.'_featuredcatimageszoomcrop'];?>
<?php $featuredcatimagesquality=$AntisnewsOptions[$themeoptionsprefix.'_featuredcatimagesquality'];?>
<?php if(!isset($recentcommentshowmany) || empty($recentcommentshowmany)){$recentcommentshowmany=3;} ?>
<?php $commentsdisplayorder=$AntisnewsOptions[$themeoptionsprefix.'_recentcommentsdisplayorder'];?>
<?php if(!isset($commentsdisplayorder) || empty($commentsdisplayorder)){$commentsdisplayorder="DESC";}?>
<?php if(!isset($recentcommentstitle) || empty($recentcommentstitle)){$recentcommentstitle=__("Comments","Antisnews");} ?>
<?php if(($recentcommentstitlephrase == "none")){$recentcommentstitlephrase='';}elseif(!isset($recentcommentstitlephrase) || empty($recentcommentstitlephrase)){ $recentcommentstitlephrase=__("had this to say","Antisnews"); }?>
<?php if(!isset($recentcommentsreadposttext) || empty($recentcommentsreadposttext)){$recentcommentsreadposttext=__("Read the post","Antisnews");} ?>
<?php if(!isset($recentcommentshowmany) || empty($recentcommentshowmany) ){ $recentcommentshowmany=3; }?>

<?php $commentargs = array(
    'status' => 'approved',
    'orderby' => 'comment_date_gmt',
    'order' => 'DESC',
    'number' => $recentcommentshowmany,
    'offset' => 0,
    ); ?> 
<?php $reccomments = get_comments($commentargs);?>
<?php if(isset($reccomments) && !empty($reccomments)){?>
<h2><?php echo $recentcommentstitle;?></h2>

<?php wp_reset_query();?>

<?php foreach ($reccomments as $reccomment) {?>

<div class="excerpt">
<div class="imgstyle">
<?php echo get_avatar( $reccomment->comment_author_email, $size = $recentcommentsthumbnailwidth, $default = '' );?>
</div>
<p>
		<?php if($AntisnewsOptions[$themeoptionsprefix.'_recentcommentsshowexcerpt'] != 'hide'){?>
		<?php $rcsspthec = $reccomment->comment_content; ?>		
		<?php $rcsspthec = strip_tags($rcsspthec);?>
		<?php $rcsspthec = str_replace(' ',' ',$rcsspthec );?>
		<?php $rcsspthec = preg_replace( '|\[(.+?)\](.+?\[/\\1\])?|s', '', $rcsspthec );?>
		<?php if(!isset($recentcommentsexcerptlength) || empty($recentcommentsexcerptlength) || !is_numeric($recentcommentsexcerptlength)){ $recentcommentsexcerptlength=120; } ?>
		<?php if(strlen($rcsspthec) > $recentcommentsexcerptlength){$rcsspthec=LimitText(trim($rcsspthec),10,$recentcommentsexcerptlength,""); }?>
		
		<h3><?php echo $reccomment->comment_author;?> <?php echo $recentcommentstitlephrase;?></h3>
		<p><?php echo $rcsspthec; ?>
		<a class="morelink" href="<?php echo htmlspecialchars( get_comment_link( $reccomment->comment_ID ) ) ?>" rel="bookmark"> <?php echo $recentcommentsreadposttext;?></a>
 		</p>
 		<?php } ?> 		
</p>
</div><div class="clear"></div>
<?php } ?>
<?php } ?>

