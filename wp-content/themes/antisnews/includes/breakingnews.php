<?php


function configure_breakingnews_headline($breakingpostID)
{

	$breakingnewsheadline='';

	// get the title and permalink of the post


	$thebreakingnewstitle=get_the_title($breakingpostID);

	if(strlen($thebreakingnewstitle) > 100)
	{
		$thebreakingnewstitle=LimitText($thebreakingnewstitle,10,100,"");
		$thebreakingnewstitle.="...";
	}


	$thebreakingnewslink=get_permalink($breakingpostID);

	$breakingnewsheadline="<h2><a href=\"";
	$breakingnewsheadline.=$thebreakingnewslink;
	$breakingnewsheadline.="\">";
	$breakingnewsheadline.=$thebreakingnewstitle;
	$breakingnewsheadline.="</a></h2>";

	return $breakingnewsheadline;
}



?>