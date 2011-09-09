<?php header("Content-type: text/css");?>
<?php header('Cache-control: must-revalidate');?>
<?php header('Expires: ' . gmdate('D, d M Y H:i:s', time() + 3600) . ' GMT');?>
<?php global $themeoptionsprefix;?>
<?php $AntisnewsOptions=get_antisnewsoptions();?>
<?php $bodybackgroundcolor=$AntisnewsOptions[$themeoptionsprefix.'_color_background_body'];?>
<?php if(!isset($bodybackgroundcolor) || empty($bodybackgroundcolor)){$bodybackgroundcolor="#ffffff";}?>
<?php $bodybackgroundimage=$AntisnewsOptions[$themeoptionsprefix.'_style_background_image_body'];?>
<?php $bodybackgroundimagerepeat=$AntisnewsOptions[$themeoptionsprefix.'_style_background_image_body_repeat'];?>

<?php if($bodybackgroundimagerepeat == "No Repeat"){$bodybackgroundimagerepeat="no-repeat";}elseif($bodybackgroundimagerepeat == "Repeat X-axis"){$bodybackgroundimagerepeat="repeat-x";}elseif($bodybackgroundimagerepeat == "Repeat Y-axis"){$bodybackgroundimagerepeat="repeat-y";}elseif($bodybackgroundimagerepeat == "Repeat All"){$bodybackgroundimagerepeat="repeat";}?>

<?php $bodyfontcolor=$AntisnewsOptions[$themeoptionsprefix.'_color_fontcolor_body'];if(!isset($bodyfontcolor) || empty($bodyfontcolor)){$bodyfontcolor="#333333";}?>
<?php $bodyfontsize=$AntisnewsOptions[$themeoptionsprefix.'_style_fontsize_body'];if(!isset($bodyfontsize) || empty($bodyfontsize)){$bodyfontsize="75%";}?>
<?php $bodyfontfamily1=$AntisnewsOptions[$themeoptionsprefix.'_style_fontfamily1_body'];if(!isset($bodyfontfamily1) || empty($bodyfontfamily1)){$bodyfontfamily1="Verdana";}?>
<?php $bodyfontfamily2=$AntisnewsOptions[$themeoptionsprefix.'_style_fontfamily2_body'];if(!isset($bodyfontfamily2) || empty($bodyfontfamily2)){$bodyfontfamily2="Arial";}?>
<?php $bodyfontfamily3=$AntisnewsOptions[$themeoptionsprefix.'_style_fontfamily3_body'];if(!isset($bodyfontfamily3) || empty($bodyfontfamily3)){$bodyfontfamily3="Tahoma";}?>
<?php $bodyfontfamily4=$AntisnewsOptions[$themeoptionsprefix.'_style_fontfamily4_body'];if(!isset($bodyfontfamily4) || empty($bodyfontfamily4)){$bodyfontfamily4="Georgia";}?>
<?php $bodyalink=$AntisnewsOptions[$themeoptionsprefix.'_color_alink_body'];if(!isset($bodyfontsize) || empty($bodyalink)){$bodyalink="#5897A5";}?>
<?php $bodyalinkhover=$AntisnewsOptions[$themeoptionsprefix.'_color_alinkhover_body'];if(!isset($bodyalinkhover) || empty($bodyalinkhover)){$bodyalinkhover="#C22011";}?>
<?php $bodyalinkvisited=$AntisnewsOptions[$themeoptionsprefix.'_color_alinkvisited_body'];if(!isset($bodyalinkvisited) || empty($bodyalinkvisited)){$bodyalinkvisited="#5897A5";}?>
<?php $bodyalinktextdecoration=$AntisnewsOptions[$themeoptionsprefix.'_style_alinkdecoration_body'];if(!isset($bodyalinktextdecoration) || empty($bodyalinktextdecoration)){$bodyalinktextdecoration="none";}?>
<?php $bodybackgroundimagealigntopbottom=$AntisnewsOptions[$themeoptionsprefix.'_style_background_image_topbottom_body'];?>
<?php $bodybackgroundimagealignleftrightcenter=$AntisnewsOptions[$themeoptionsprefix.'_style_background_image_leftrightcenter_body'];?>
<?php $bodybackgroundattachment=$AntisnewsOptions[$themeoptionsprefix.'_style_background_attachment_body'];?>
<?php if(isset($AntisnewsOptions[$themeoptionsprefix.'_color_contentcontainer_body']) && !empty($AntisnewsOptions[$themeoptionsprefix.'_color_contentcontainer_body'])){$bodycontentcontainerbackgroundcolor=$AntisnewsOptions[$themeoptionsprefix.'_color_contentcontainer_body'];}if(!isset($bodycontentcontainerbackgroundcolor) || empty($bodycontentcontainerbackgroundcolor)){$bodycontentcontainerbackgroundcolor="#ffffff";}?>
<?php if(isset($AntisnewsOptions[$themeoptionsprefix.'_style_contentcontainer_roundedcorners']) && !empty($AntisnewsOptions[$themeoptionsprefix.'_style_contentcontainer_roundedcorners'])){$bodycontentcontainerroundedcorners=$AntisnewsOptions[$themeoptionsprefix.'_style_contentcontainer_roundedcorners'];}if(!isset($bodycontentcontainerroundedcorners) || empty($bodycontentcontainerroundedcorners)){$bodycontentcontainerroundedcorners="on";}?>
<?php if(isset($AntisnewsOptions[$themeoptionsprefix.'_style_contentcontainer_topmargin']) && !empty($AntisnewsOptions[$themeoptionsprefix.'_style_contentcontainer_topmargin'])){$bodycontentcontainertopmargin=$AntisnewsOptions[$themeoptionsprefix.'_style_contentcontainer_topmargin'];}if(!isset($bodycontentcontainertopmargin) || empty($bodycontentcontainertopmargin)){$bodycontentcontainertopmargin="10";}?>
<?php if(isset($AntisnewsOptions[$themeoptionsprefix.'_style_contentcontainer_roundedcornersradius']) && !empty($AntisnewsOptions[$themeoptionsprefix.'_style_contentcontainer_roundedcornersradius'])){$bodycontentcontainerroundedcornersradius=$AntisnewsOptions[$themeoptionsprefix.'_style_contentcontainer_roundedcornersradius'];}if(!isset($bodycontentcontainerroundedcornersradius) || empty($bodycontentcontainerroundedcornersradius)){$bodycontentcontainerroundedcornersradius="5";}?>



<?php $logosloganbackgroundcolor=$AntisnewsOptions[$themeoptionsprefix.'_color_background_logoslogan'];?>
<?php $logosloganbackgroundimage=$AntisnewsOptions[$themeoptionsprefix.'_style_background_image_logoslogan'];?>
<?php $logosloganbackgroundimagerepeat=$AntisnewsOptions[$themeoptionsprefix.'_style_background_image_repeat_logoslogan'];?>
<?php $logosloganh1titlea=$AntisnewsOptions[$themeoptionsprefix.'_color_colorh1title_logoslogan'];?>
<?php $logosloganh1titleahover=$AntisnewsOptions[$themeoptionsprefix.'_color_hovercolorh1title_logoslogan'];?>
<?php $logoslogantaglinetexttransform=$AntisnewsOptions[$themeoptionsprefix.'_style_text_transform_tagline'];?>
<?php $logoslogantaglinetextstyle=$AntisnewsOptions[$themeoptionsprefix.'_style_text_style_tagline'];?>
<?php $logoslogantaglinetextcolor=$AntisnewsOptions[$themeoptionsprefix.'_color_text_color_tagline'];?>
<?php $logoslogantaglinefontsize=$AntisnewsOptions[$themeoptionsprefix.'_style_fontsize_tagline'];?>
<?php $logoslogantitleh1texttransform=$AntisnewsOptions[$themeoptionsprefix.'_style_text_transform_titleh1_logoslogan'];?>
<?php $logoslogantitleh1fontsize=$AntisnewsOptions[$themeoptionsprefix.'_style_fontsize_titleh1_logoslogan'];?>
<?php $logoslogantitletextshadow=$AntisnewsOptions[$themeoptionsprefix.'_style_logo_title_text_shadow_logoslogan'];?>
<?php $logoslogantitletextshadowcolor=$AntisnewsOptions[$themeoptionsprefix.'_color_logo_title_text_shadow_logoslogan'];?>
<?php if(isset($AntisnewsOptions[$themeoptionsprefix.'_style_background_image_height_logoslogan']) && !empty($AntisnewsOptions[$themeoptionsprefix.'_style_background_image_height_logoslogan'])){$logosloganbackgroundimageheight=$AntisnewsOptions[$themeoptionsprefix.'_style_background_image_height_logoslogan'];}?>
<?php if(!isset($logosloganbackgroundimageheight) || empty($logosloganbackgroundimageheight)){$logosloganbackgroundimageheight=80;}?>
<?php if(isset($AntisnewsOptions[$themeoptionsprefix.'_style_row_height_logoslogan']) && !empty($AntisnewsOptions[$themeoptionsprefix.'_style_row_height_logoslogan'])){$logosloganrowheight=$AntisnewsOptions[$themeoptionsprefix.'_style_row_height_logoslogan'];}?>
<?php if(isset($AntisnewsOptions[$themeoptionsprefix.'_style_position_tagline']) && !empty($AntisnewsOptions[$themeoptionsprefix.'_style_position_tagline'])){$logoslogantaglineposition=$AntisnewsOptions[$themeoptionsprefix.'_style_position_tagline'];}?>
<?php if(isset($AntisnewsOptions[$themeoptionsprefix.'_style_top_padding_title_logoslogan']) && !empty($AntisnewsOptions[$themeoptionsprefix.'_style_top_padding_title_logoslogan'])){$logosloganH1toppadding=$AntisnewsOptions[$themeoptionsprefix.'_style_top_padding_title_logoslogan'];}?>
<?php if(isset($AntisnewsOptions[$themeoptionsprefix.'_style_top_padding_tagline']) && !empty($AntisnewsOptions[$themeoptionsprefix.'_style_top_padding_tagline'])){$logoslogantaglinetoppadding=$AntisnewsOptions[$themeoptionsprefix.'_style_top_padding_tagline'];}?>
<?php if(isset($AntisnewsOptions[$themeoptionsprefix.'_style_left_padding_tagline']) && !empty($AntisnewsOptions[$themeoptionsprefix.'_style_left_padding_tagline'])){$logoslogantaglineleftpadding=$AntisnewsOptions[$themeoptionsprefix.'_style_left_padding_tagline'];}?>

<?php $logoslogantaglinefontweight=$AntisnewsOptions[$themeoptionsprefix.'_style_font_weight_tagline'];?>
<?php $logoslogantopmargin=$AntisnewsOptions[$themeoptionsprefix.'_style_top_margin_logoslogan'];?>
<?php if(!isset($logosloganbackgroundcolor) || empty($logosloganbackgroundcolor)){$logosloganbackgroundcolor="none";}?>
<?php if(!isset($logosloganh1titlea) || empty($logosloganh1titlea)){$logosloganh1titlea="#D2D7D6";}?>
<?php if(!isset($logosloganh1titleahover) || empty($logosloganh1titleahover)){$logosloganh1titleahover="#4DBAB1";}?>
<?php if(!isset($logoslogantaglinetexttransform) || empty($logoslogantaglinetexttransform)){$logoslogantaglinetexttransform="capitalize";}?>
<?php if(!isset($logoslogantaglinetextstyle) || empty($logoslogantaglinetextstyle)){ $logoslogantaglinetextstyle="italic";}?>
<?php if(!isset($logoslogantaglinetextcolor) || empty($logoslogantaglinetextcolor)){$logoslogantaglinetextcolor="#ffffff";}?>
<?php if(!isset($logoslogantitleh1texttransform) || empty($logoslogantitleh1texttransform)){$logoslogantitleh1texttransform="uppercase";}?>
<?php if(!isset($logoslogantitleh1fontsize) || empty($logoslogantitleh1fontsize)){$logoslogantitleh1fontsize="3.1em";}?>
<?php if(!isset($logoslogantitletextshadowcolor) || empty($logoslogantitletextshadowcolor)){$logoslogantitletextshadowcolor="#dddddd";}?>
<?php if(!isset($logosloganH1toppadding) || empty($logosloganH1toppadding)){$logosloganH1toppadding="0";}?>
<?php if(!isset($logoslogantaglinetoppadding) || empty($logoslogantaglinetoppadding)){$logoslogantaglinetoppadding="35";}?>
<?php if(!isset($logoslogantaglineleftpadding) || empty($logoslogantaglineleftpadding)){$logoslogantaglineleftpadding="10";}?>
<?php if(!isset($logoslogantopmargin) || empty($logoslogantopmargin)){ $logoslogantopmargin="0";}?>
<?php if($logoslogantopmargin == 'none'){$logoslogantopmargin="0";}?>
<?php if($logosloganbackgroundimagerepeat == "No Repeat"){$logosloganbackgroundimagerepeat="no-repeat";}elseif($logosloganbackgroundimagerepeat == "Repeat X-axis"){$logosloganbackgroundimagerepeat="repeat-x";}elseif($logosloganbackgroundimagerepeat == "Repeat Y-axis"){$logosloganbackgroundimagerepeat="repeat-y";}elseif($logosloganbackgroundimagerepeat == "Repeat All"){$logosloganbackgroundimagerepeat="repeat";}?>
<?php if(!isset($logoslogantaglinefontweight) || empty($logoslogantaglinefontweight)){$logoslogantaglinefontweight="normal";}?>
<?php if(!isset($logoslogantaglinefontsize) || empty($logoslogantaglinefontsize)){$logoslogantaglinefontsize="14px";}?>
<?php if(!isset($logoslogantaglineposition) || empty($logoslogantaglineposition)){$logoslogantaglineposition="left";}?>


<?php $bodyfontfamily='"';?>
<?php $bodyfontfamily.=$bodyfontfamily1;?>
<?php $bodyfontfamily.='",';?>
<?php $bodyfontfamily.='"';?>
<?php $bodyfontfamily.=$bodyfontfamily2;?>
<?php $bodyfontfamily.='",';?>
<?php $bodyfontfamily.='"';?>
<?php $bodyfontfamily.=$bodyfontfamily3;?>
<?php $bodyfontfamily.='",';?>
<?php $bodyfontfamily.='"';?>
<?php $bodyfontfamily.=$bodyfontfamily4;?>
<?php $bodyfontfamily.='"';?>

<?php $date_searchbackgroundcolor=$AntisnewsOptions[$themeoptionsprefix.'_color_background_datesearch'];?>
<?php $date_searchbackgroundimageurl=$AntisnewsOptions[$themeoptionsprefix.'_style_background_image_datesearch'];?>
<?php $date_searchbackgroundimagerepeat=$AntisnewsOptions[$themeoptionsprefix.'_style_background_image_repeat_datesearch'];?>
<?php $date_searchbackgroundimageheight=$AntisnewsOptions[$themeoptionsprefix.'_style_background_image_height_datesearch'];?>
<?php $date_searchfontcolor=$AntisnewsOptions[$themeoptionsprefix.'_color_fontcolor_datesearch'];?>
<?php $date_searchfontsize=$AntisnewsOptions[$themeoptionsprefix.'_style_fontsize_datesearch'];?>
<?php $date_searchfontweight=$AntisnewsOptions[$themeoptionsprefix.'_style_fontweight_datesearch'];?>
<?php $date_searchfonttransform=$AntisnewsOptions[$themeoptionsprefix.'_style_fonttransform_datesearch'];?>
<?php $date_searchsearchformtopmargin=$AntisnewsOptions[$themeoptionsprefix.'_style_top_margin_searchform_datesearch'];?>
<?php if(!isset($date_searchbackgroundcolor) || empty($date_searchbackgroundcolor)){$date_searchbackgroundcolor="";}?>
<?php if($date_searchbackgroundimagerepeat == "No Repeat"){$date_searchbackgroundimagerepeat="no-repeat";}elseif($date_searchbackgroundimagerepeat == "Repeat X-axis"){$date_searchbackgroundimagerepeat="repeat-x";}elseif($date_searchbackgroundimagerepeat == "Repeat Y-axis"){$date_searchbackgroundimagerepeat="repeat-y";}elseif($date_searchbackgroundimagerepeat == "Repeat All"){$date_searchbackgroundimagerepeat="repeat";}?>
<?php if(!isset($date_searchfontcolor) || empty($date_searchfontcolor)){$date_searchfontcolor="#ffffff";}?>
<?php if(!isset($date_searchfontsize) || empty($date_searchfontsize)){$date_searchfontsize="13px";}?>
<?php if(!isset($date_searchfontweight) || empty($date_searchfontweight)){$date_searchfontweight="bold";}?>
<?php if(!isset($date_searchfonttransform) || empty($date_searchfonttransform)){$date_searchfonttransform="uppercase";}?>

<?php $hmenubackgroundcolor=$AntisnewsOptions[$themeoptionsprefix.'_color_background_hmenu'];?>
<?php $hmenubackgroundimageurl=$AntisnewsOptions[$themeoptionsprefix.'_style_background_image_hmenu'];?>
<?php $hmenubackgroundimagerepeat=$AntisnewsOptions[$themeoptionsprefix.'_style_background_image_repeat_hmenu'];?>
<?php $hmenucurrentpageitem=$AntisnewsOptions[$themeoptionsprefix.'_color_licurrentpageitemhmenu'];?>
<?php $hmenucurrentpageitema=$AntisnewsOptions[$themeoptionsprefix.'_color_licurrentpageitemahmenu'];?>
<?php $hmenucurrentpageitemli=$AntisnewsOptions[$themeoptionsprefix.'_color_licurrentpageitemlihmenu'];?>
<?php $hmenucurrentpageitemlia=$AntisnewsOptions[$themeoptionsprefix.'_color_licurrentpageitemliahmenu'];?>
<?php $hmenupageitema=$AntisnewsOptions[$themeoptionsprefix.'_color_colorlihmenu'];?>
<?php $hmenudropdownbordercolor=$AntisnewsOptions[$themeoptionsprefix.'_color_hmenudropdownbordercolor'];?>
<?php $hmenutexttransform=$AntisnewsOptions[$themeoptionsprefix.'_style_text_transform_hmenu'];?>
<?php $hmenufontsize=$AntisnewsOptions[$themeoptionsprefix.'_style_fontsize_hmenu'];?>
<?php $hmenufontweight=$AntisnewsOptions[$themeoptionsprefix.'_style_fontweight_hmenu'];?>
<?php $hmenubottomborder=$AntisnewsOptions[$themeoptionsprefix.'_style_bottom_border_hmenu'];?>
<?php $hmenubottomborderstyle=$AntisnewsOptions[$themeoptionsprefix.'_style_bottom_border_style_hmenu'];?>
<?php $hmenubottomborderwidth=$AntisnewsOptions[$themeoptionsprefix.'_style_bottom_border_width_hmenu'];?>
<?php $hmenubottombordercolor=$AntisnewsOptions[$themeoptionsprefix.'_style_bottom_border_color_hmenu'];?>
<?php $hmenuheight=$AntisnewsOptions[$themeoptionsprefix.'_style_height_hmenu'];?>
<?php if(!isset($hmenuheight) || empty($hmenuheight)){$hmenuheight="35";}?>
<?php if($hmenubackgroundimagerepeat == "No Repeat"){$hmenubackgroundimagerepeat="no-repeat";}elseif($hmenubackgroundimagerepeat == "Repeat X-axis"){$hmenubackgroundimagerepeat="repeat-x";}elseif($hmenubackgroundimagerepeat == "Repeat Y-axis"){$hmenubackgroundimagerepeat="repeat-y";}elseif($hmenubackgroundimagerepeat == "Repeat All"){$hmenubackgroundimagerepeat="repeat";}?>
<?php if(!isset($hmenubackgroundcolor) || empty($hmenubackgroundcolor)){$hmenubackgroundcolor="#f2f2f2";}?>
<?php if(!isset($hmenucurrentpageitem) || empty($hmenucurrentpageitem)){$hmenucurrentpageitem="#8c8c8c";}?>
<?php if(!isset($hmenucurrentpageitema) || empty($hmenucurrentpageitema)){$hmenucurrentpageitema="#ffffff";}?>
<?php if(!isset($hmenucurrentpageitemli) || empty($hmenucurrentpageitemli)){$hmenucurrentpageitemli="#f2f2f2";}?>
<?php if(!isset($hmenucurrentpageitemlia) || empty($hmenucurrentpageitemlia)){$hmenucurrentpageitemlia="#444444";}?>
<?php if(!isset($hmenudropdownbordercolor) || empty($hmenudropdownbordercolor)){$hmenudropdownbordercolor="#dddddd";}?>
<?php if(!isset($hmenupageitema) || empty($hmenupageitema)){$hmenupageitema="#444444";}?>
<?php if(!isset($hmenutexttransform) || empty($hmenutexttransform)){$hmenutexttransform="uppercase";}?>
<?php if(!isset($hmenufontsize) || empty($hmenufontsize)){if($hmenutexttransform == 'uppercase'){$hmenufontsize="10px";}else {$hmenufontsize="12px";}}?>
<?php if(!isset($hmenufontweight) || empty($hmenufontweight)){$hmenufontweight="normal";}?>
<?php if(!isset($hmenubottomborderstyle) || empty($hmenubottomborderstyle)){$hmenubottomborderstyle="double";}?>
<?php if(!isset($hmenubottomborderwidth) || empty($hmenubottomborderwidth)){$hmenubottomborderwidth=4;}?>
<?php if(!isset($hmenubottombordercolor) || empty($hmenubottombordercolor)){$hmenubottombordercolor="#dddddd";}?>
<?php if(!isset($hmenubottomborder) || empty($hmenubottomborder) || ($hmenubottomborder == 'Select On or Off')){$hmenubottomborder="on";}?>

<?php if(!isset($breakingnewsH2toppadding) || empty($breakingnewsH2toppadding)){$breakingnewsH2toppadding=10;}?>
<?php if(!isset($breakingnewsbackgroundimagerepeat) || empty($breakingnewsbackgroundimagerepeat)){$breakingnewsbackgroundimagerepeat="No Repeat";}?>
<?php if($breakingnewsbackgroundimagerepeat == "No Repeat"){$breakingnewsbackgroundimagerepeat="no-repeat";}elseif($breakingnewsbackgroundimagerepeat == "Repeat X-axis"){$breakingnewsbackgroundimagerepeat="repeat-x";}elseif($breakingnewsbackgroundimagerepeat == "Repeat Y-axis"){$breakingnewsbackgroundimagerepeat="repeat-y";}elseif($breakingnewsbackgroundimagerepeat == "Repeat All"){$breakingnewsbackgroundimagerepeat="repeat";}?>
<?php if(!isset($breakingnewsbackgroundcolor) || empty($breakingnewsbackgroundcolor)){$breakingnewsbackgroundcolor="none";}?>
<?php if(!isset($breakingnewsbackgroundimageurl) || empty($breakingnewsbackgroundimageurl)){$breakingnewsbackgroundimageheight="55";$breakingnewsbackgroundimageurl=get_bloginfo('template_url');$breakingnewsbackgroundimageurl.="/images/breaking.png";}?>
<?php if(!isset($breakingnewsfontcolor) || empty($breakingnewsfontcolor)){$breakingnewsfontcolor="#ffffff";}?>
<?php if(!isset($breakingnewsH2fontcolor) || empty($breakingnewsH2fontcolor)){$breakingnewsH2fontcolor="#ffffff";}?>
<?php if(!isset($breakingnewsH2hovercolor) || empty($breakingnewsH2hovercolor)){$breakingnewsH2hovercolor="#B70004";}?>
<?php if(!isset($breakingnewsH2fontweight) || empty($breakingnewsH2fontweight)){$breakingnewsH2fontweight="bold";}?>
<?php if(!isset($breakingnewsH2fontsize) || empty($breakingnewsH2fontsize)){$breakingnewsH2fontsize="1.2em";}?>

<?php if(!isset($featured1borderonoff) || empty($featured1borderonoff)){$featured1borderonoff="on";}?>
<?php if(!isset($featured1bordercolor) || empty($featured1bordercolor)){$featured1bordercolor="#d3d3d3";}?>
<?php if(!isset($featured1overlaybackgroundcolor) || empty($featured1overlaybackgroundcolor)){$featured1overlaybackgroundcolor="#ffffff";}?>
<?php if(!isset($featured1overlayfontcolor) || empty($featured1overlayfontcolor)){$featured1overlayfontcolor="#353534";}?>
<?php if(!isset($featured1overlayfonthovercolor) || empty($featured1overlayfonthovercolor)){$featured1overlayfonthovercolor="#cc0000";}?>
<?php if(!isset($featured1overlayh2fontsize) || empty($featured1overlayh2fontsize)){$featured1overlayh2fontsize="26px";}?>
<?php if(!isset($featured1overlayh2fontweight) || empty($featured1overlayh2fontweight)){$featured1overlayh2fontweight="bold";}?>

<?php if(!isset($featured2h2backgroundcolor) || empty($featured2h2backgroundcolor)){$featured2h2backgroundcolor="#dadada";}?>
<?php if(!isset($featured2h2fontcolor) || empty($featured2h2fontcolor)){$featured2h2fontcolor="#353534";}?>
<?php if(!isset($featured2h3fontcolor) || empty($featured2h3fontcolor)){$featured2h3fontcolor="#414141";}?>
<?php if(!isset($featured2h2roundedcorners) || empty($featured2h2roundedcorners) || ($featured2h2roundedcorners == "")){ $featured2h2roundedcorners="on";}?>
<?php if(!isset($featured2h2roundedcornersradius) || empty($featured2h2roundedcornersradius) || ($featured2h2roundedcornersradius == "Select On or Off")){ $featured2h2roundedcornersradius=5;}?>
<?php if(!isset($featured2h2fontsize) || empty($featured2h2fontsize)){$featured2h2fontsize="18px";}?>
<?php if(!isset($featured2h2fontweight) || empty($featured2h2fontweight)){$featured2h2fontweight="normal";}?>

<?php if(!isset($featured3h2backgroundcolor) || empty($featured3h2backgroundcolor)){$featured3h2backgroundcolor="#dadada";}?>
<?php if(!isset($featured3h2fontcolor) || empty($featured3h2fontcolor)){$featured3h2fontcolor="#353534";}?>
<?php if(!isset($featured3h3fontcolor) || empty($featured3h3fontcolor)){$featured3h3fontcolor="#414141";}?>
<?php if(!isset($featured3h2roundedcorners) || empty($featured3h2roundedcorners) || ($featured3h2roundedcorners == "")){ $featured3h2roundedcorners="on";}?>
<?php if(!isset($featured3h2roundedcornersradius) || empty($featured3h2roundedcornersradius) || ($featured3h2roundedcornersradius == "Select On or Off")){ $featured3h2roundedcornersradius=5;}?>
<?php if(!isset($featured3h2fontsize) || empty($featured3h2fontsize)){$featured3h2fontsize="18px";}?>
<?php if(!isset($featured3h2fontweight) || empty($featured3h2fontweight)){$featured3h2fontweight="normal";}?>

<?php if(!isset($featured4h2backgroundcolor) || empty($featured4h2backgroundcolor)){$featured4h2backgroundcolor="#dadada";}?>
<?php if(!isset($featured4h2fontcolor) || empty($featured4h2fontcolor)){$featured4h2fontcolor="#353534";}?>
<?php if(!isset($featured4h3fontcolor) || empty($featured4h3fontcolor)){$featured4h3fontcolor="#414141";}?>
<?php if(!isset($featured4h2roundedcorners) || empty($featured4h2roundedcorners) || ($featured4h2roundedcorners == "")){ $featured4h2roundedcorners="on";}?>
<?php if(!isset($featured4h2roundedcornersradius) || empty($featured4h2roundedcornersradius) || ($featured4h2roundedcornersradius == "Select On or Off")){ $featured4h2roundedcornersradius=5;}?>
<?php if(!isset($featured4h2fontsize) || empty($featured4h2fontsize)){$featured4h2fontsize="18px";}?>
<?php if(!isset($featured4h2fontweight) || empty($featured4h2fontweight)){$featured4h2fontweight="normal";}?>

<?php if(!isset($featured5h2backgroundcolor) || empty($featured5h2backgroundcolor)){$featured5h2backgroundcolor="#dadada";}?>
<?php if(!isset($featured5h2fontcolor) || empty($featured5h2fontcolor)){$featured5h2fontcolor="#353534";}?>
<?php if(!isset($featured5h3fontcolor) || empty($featured5h3fontcolor)){$featured5h3fontcolor="#414141";}?>
<?php if(!isset($featured5h2roundedcorners) || empty($featured5h2roundedcorners) || ($featured5h2roundedcorners == "")){ $featured5h2roundedcorners="on";}?>
<?php if(!isset($featured5h2roundedcornersradius) || empty($featured5h2roundedcornersradius) || ($featured5h2roundedcornersradius == "Select On or Off")){ $featured5h2roundedcornersradius=5;}?>
<?php if(!isset($featured5h2fontsize) || empty($featured5h2fontsize)){$featured5h2fontsize="18px";}?>
<?php if(!isset($featured5h2fontweight) || empty($featured5h2fontweight)){$featured5h2fontweight="normal";}?>

<?php if(!isset($featured6h2backgroundcolor) || empty($featured6h2backgroundcolor)){$featured6h2backgroundcolor="#dadada";}?>
<?php if(!isset($featured6h2fontcolor) || empty($featured6h2fontcolor)){$featured6h2fontcolor="#353534";}?>
<?php if(!isset($featured6h3fontcolor) || empty($featured6h3fontcolor)){$featured6h3fontcolor="#414141";}?>
<?php if(!isset($featured6h2roundedcorners) || empty($featured6h2roundedcorners) || ($featured6h2roundedcorners == "")){ $featured6h2roundedcorners="on";}?>
<?php if(!isset($featured6h2roundedcornersradius) || empty($featured6h2roundedcornersradius) || ($featured6h2roundedcornersradius == "Select On or Off")){ $featured6h2roundedcornersradius=6;}?>
<?php if(!isset($featured6h2fontsize) || empty($featured6h2fontsize)){$featured6h2fontsize="18px";}?>
<?php if(!isset($featured6h2fontweight) || empty($featured6h2fontweight)){$featured6h2fontweight="normal";}?>

<?php if(!isset($featured7h2backgroundcolor) || empty($featured7h2backgroundcolor)){$featured7h2backgroundcolor="#dadada";}?>
<?php if(!isset($featured7h2fontcolor) || empty($featured7h2fontcolor)){$featured7h2fontcolor="#353534";}?>
<?php if(!isset($featured7h3fontcolor) || empty($featured7h3fontcolor)){$featured7h3fontcolor="#414141";}?>
<?php if(!isset($featured7h2roundedcorners) || empty($featured7h2roundedcorners) || ($featured7h2roundedcorners == "")){ $featured7h2roundedcorners="on";}?>
<?php if(!isset($featured7h2roundedcornersradius) || empty($featured7h2roundedcornersradius) || ($featured7h2roundedcornersradius == "Select On or Off")){ $featured7h2roundedcornersradius=7;}?>
<?php if(!isset($featured7h2fontsize) || empty($featured7h2fontsize)){$featured7h2fontsize="18px";}?>
<?php if(!isset($featured7h2fontweight) || empty($featured7h2fontweight)){$featured7h2fontweight="normal";}?>

<?php if(!isset($stickyh2backgroundcolor) || empty($stickyh2backgroundcolor)){$stickyh2backgroundcolor="#dadada";}?>
<?php if(!isset($stickyh2fontcolor) || empty($stickyh2fontcolor)){$stickyh2fontcolor="#353534";}?>
<?php if(!isset($stickyh3fontcolor) || empty($stickyh3fontcolor)){$stickyh3fontcolor="#414141";}?>
<?php if(!isset($stickyh2roundedcorners) || empty($stickyh2roundedcorners) || ($stickyh2roundedcorners == "")){ $stickyh2roundedcorners="on";}?>
<?php if(!isset($stickyh2roundedcornersradius) || empty($stickyh2roundedcornersradius) || ($stickyh2roundedcornersradius == "Select On or Off")){ $stickyh2roundedcornersradius=7;}?>
<?php if(!isset($stickyh2fontsize) || empty($stickyh2fontsize)){$stickyh2fontsize="18px";}?>
<?php if(!isset($stickyh2fontweight) || empty($stickyh2fontweight)){$stickyh2fontweight="normal";}?>

<?php if(!isset($sidebarwidgetbackgroundorborder) || empty($sidebarwidgetbackgroundorborder)){$sidebarwidgetbackgroundorborder="border";}?>
<?php if(!isset($sidebarwidgetbackgroundcolor) || empty($sidebarwidgetbackgroundcolor)){$sidebarwidgetbackgroundcolor="none";}?>
<?php if(!isset($sidebarwidgetbordercolor) || empty($sidebarwidgetbordercolor)){$sidebarwidgetbordercolor="#dddddd";}?>
<?php if(!isset($sidebarwidgetborderstyle) || empty($sidebarwidgetborderstyle)){$sidebarwidgetborderstyle="solid";}?>
<?php if(!isset($sidebarwidgetborderwidth) || empty($sidebarwidgetborderwidth)){$sidebarwidgetborderwidth=1;}?>
<?php if(!isset($sidebarwidgetfontcolor) || empty($sidebarwidgetfontcolor)){$sidebarwidgetfontcolor="#333333";}?>
<?php if(!isset($sidebarwidgetlinkcolor) || empty($sidebarwidgetlinkcolor)){$sidebarwidgetlinkcolor="#5897A5";}?>
<?php if(!isset($sidebarwidgetroundedcorners) || empty($sidebarwidgetroundedcorners) || ($sidebarwidgetroundedcorners == "")){ $sidebarwidgetroundedcorners="on";}?>
<?php if(!isset($sidebarwidgeth2backgroundcolor) || empty($sidebarwidgeth2backgroundcolor)){$sidebarwidgeth2backgroundcolor="#dadada";}?>
<?php if(!isset($sidebarwidgeth2fontcolor) || empty($sidebarwidgeth2fontcolor)){$sidebarwidgeth2fontcolor="#353534";}?>
<?php if(!isset($sidebarwidgeth2roundedcorners) || empty($sidebarwidgeth2roundedcorners) || ($sidebarwidgeth2roundedcorners == "")){ $sidebarwidgeth2roundedcorners="on";}?>
<?php if(!isset($sidebarwidgeth2roundedcornersradius) || empty($sidebarwidgeth2roundedcornersradius) || ($sidebarwidgeth2roundedcornersradius == "Select On or Off")){ $sidebarwidgeth2roundedcornersradius=7;}?>
<?php if(!isset($sidebarwidgetbulletstyle) || empty($sidebarwidgetbulletstyle)){$sidebarwidgetbulletstyle="none";}?>
<?php if(!isset($sidebarwidgeth2fontsize) || empty($sidebarwidgeth2fontsize)){$sidebarwidgeth2fontsize="18px";}?>
<?php if(!isset($sidebarwidgeth2fontweight) || empty($sidebarwidgeth2fontweight)){$sidebarwidgeth2fontweight="normal";}?>
<?php if(!isset($sidebarwidgeth3fontcolor) || empty($sidebarwidgeth3fontcolor)){$sidebarwidgeth3fontcolor="#131217";}?>
<?php if(!isset($sidebarwidgeth3fontsize) || empty($sidebarwidgeth3fontsize)){$sidebarwidgeth3fontsize="12px";}?>
<?php if(!isset($sidebarwidgeth3fontweight) || empty($sidebarwidgeth3fontweight)){$sidebarwidgeth3fontweight="bold";}?>
<?php if(!isset($sidebarwidgetlibottomborder) || empty($sidebarwidgetlibottomborder) || ($sidebarwidgetlibottomborder != "none")){$sidebarwidgetlibottomborder="#dddddd";}?>
<?php if(!isset($sidebarwidgetlichildstyle) || empty($sidebarwidgetlichildstyle)){$sidebarwidgetlichildstyle="circle";}?>
<?php if(!isset($sidebarwidgetullia) || empty($sidebarwidgetullia)){$sidebarwidgetullia="#131217";}?>


<?php $footerbackgroundcolor=$AntisnewsOptions[$themeoptionsprefix.'_color_background_footer'];if(!isset($footerbackgroundcolor) || empty($footerbackgroundcolor)){$footerbackgroundcolor="";}?>
<?php $footerbackgroundimageurl=$AntisnewsOptions[$themeoptionsprefix.'_style_background_image_footer'];?>
<?php $footerbackgroundimagerepeat=$AntisnewsOptions[$themeoptionsprefix.'_style_background_image_repeat_footer'];?>
<?php $footerbackgroundimageheight=$AntisnewsOptions[$themeoptionsprefix.'_style_background_image_height_footer'];?>
<?php if(!isset($footerbackgroundimageurl) || empty($footerbackgroundimageurl) || ($footerbackgroundimageurl != "none")){if(!isset($footerbackgroundcolor) || empty($footerbackgroundcolor)){$footerbackgroundimageurl=get_bloginfo('template_url');$footerbackgroundimageurl.="/images/bg-footer.gif";$footerbackgroundimagerepeat="repeat";}}?>
<?php $footerfontcolor=$AntisnewsOptions[$themeoptionsprefix.'_color_fontcolor_footer'];if(!isset($footerfontcolor) || empty($footerfontcolor)){$footerfontcolor="#dddddd";}?>
<?php $footerfontsize=$AntisnewsOptions[$themeoptionsprefix.'_style_fontsize_footer'];if(!isset($footerfontsize) || empty($footerfontsize)){$footerfontsize="10px";}?>
<?php $footerfontweight=$AntisnewsOptions[$themeoptionsprefix.'_style_fontweight_footer'];if(!isset($footerfontweight) || empty($footerfontweight)){$footerfontweight="normal";}?>


<?php if(!isset($imagesbackgroundcolor) || empty($imagesbackgroundcolor)){$imagesbackgroundcolor="#f2f2f2";} ?>

<?php if(!isset($blockquotebackgroundcolor) || empty($blockquotebackgroundcolor)){$blockquotebackgroundcolor="#f2f2f2";}?>
<?php if(!isset($blockquoteborderposition) || empty($blockquoteborderposition)){$blockquoteborderposition="no border";} ?>

<?php if(!isset($blockquotefontcolor) || empty($blockquotefontcolor)){$blockquotefontcolor="#172025";}?>


<?php if(!isset($commentlistevenbackgroundcolor) || empty($commentlistevenbackgroundcolor)){$commentlistevenbackgroundcolor="#f2f2f2";}?>
<?php if(!isset($commentlistevenfontcolor) || empty($commentlistevenfontcolor)){$commentlistevenfontcolor="#666666";}?>
<?php if(!isset($commentlistoddbackgroundcolor) || empty($commentlistoddbackgroundcolor)){$commentlistoddbackgroundcolor="#f9f9f9";}?>
<?php if(!isset($commentlistoddfontcolor) || empty($commentlistoddfontcolor)){$commentlistoddfontcolor="#666666";}?>


<?php if(!isset($pagenavigationbackgroundcolor) || empty($pagenavigationbackgroundcolor)){$pagenavigationbackgroundcolor="#dddddd";} ?>
<?php if(!isset($pagenavigationlinkcolor) || empty($pagenavigationlinkcolor)){$pagenavigationlinkcolor="#172025";}?>
<?php if(!isset($pagenavigationspanfontcolor) || empty($pagenavigationspanfontcolor)){$pagenavigationspanfontcolor="#172025";} ?>
<?php if(!isset($pagenavigationfontweight) || empty($pagenavigationfontweight)){$pagenavigationfontweight="bold";}?>
<?php if(!isset($pagenavigationlinkhovercolor) || empty($pagenavigationlinkhovercolor)){$pagenavigationlinkhovercolor=$bodyalinkhover;}?>

<?php if(!isset($bodytablethbackgroundcolor) || empty($bodytablethbackgroundcolor)){$bodytablethbackgroundcolor="#dddddd";}?>
<?php if(!isset($bodytabletdbackgroundcolor) || empty($bodytabletdbackgroundcolor)){$bodytabletdbackgroundcolor="#f2f2f2";} ?>
<?php if(!isset($bodytablethbordercolor) || empty($bodytablethbordercolor)){$bodytablethbordercolor="#dddddd";}?>
<?php if(!isset($bodytabletdbordercolor) || empty($bodytabletdbordercolor)){$bodytabletdbordercolor="#dddddd";}?>
<?php if(!isset($bodytablethfontcolor) || empty($bodytablethfontcolor)){$bodytablethfontcolor="#172025";}?>
<?php if(!isset($bodytabletdfontcolor) || empty($bodytabletdfontcolor)){$bodytabletdfontcolor="#172025";}?>
<?php if(!isset($bodytablecaptionbackgroundcolor) || empty($bodytablecaptionbackgroundcolor)){$bodytablecaptionbackgroundcolor="#414141";} ?>
<?php if(!isset($bodytablecaptionfontcolor) || empty($bodytablecaptionfontcolor)){$bodytablecaptionfontcolor="#dddddd";} ?>

<?php if(!isset($submitbuttonbackgroundcolor) || empty($submitbuttonbackgroundcolor)){$submitbuttonbackgroundcolor="#dddddd";} ?>
<?php if(!isset($submitbuttonfontcolor) || empty($submitbuttonfontcolor)){$submitbuttonfontcolor="#172025";}?>
<?php if(!isset($submitbuttonhoverbackgroundcolor) || empty($submitbuttonhoverbackgroundcolor)){$submitbuttonhoverbackgroundcolor="#414141";} ?>
<?php if(!isset($submitbuttonhoverfontcolor) || empty($submitbuttonhoverfontcolor)){$submitbuttonhoverfontcolor="#dddddd";} ?>
<?php if(!isset($forminputbordercolor) || empty($forminputbordercolor)){$forminputbordercolor="#dddddd";} ?>

<?php $leaderbackgroundcolor=$AntisnewsOptions[$themeoptionsprefix.'_color_background_leaderboard']; if(!isset($leaderbackgroundcolor) || empty($leaderbackgroundcolor)){$leaderbackgroundcolor="none";}?>
<?php $leaderfontcolor=$AntisnewsOptions[$themeoptionsprefix.'_color_fontcolor_leaderboard']; if(!isset($leaderfontcolor) || empty($leaderfontcolor)){$leaderfontcolor="#172025";}?>
<?php $leaderlinkcolor=$AntisnewsOptions[$themeoptionsprefix.'_color_linkcolor_leaderboard'];if(!isset($leaderlinkcolor) || empty($leaderlinkcolor)){$leaderlinkcolor="#172025";}?>
<?php $leadertextalignlc=$AntisnewsOptions[$themeoptionsprefix.'_showhideleadercontentposition'];?>

<?php if(!isset($postareah1fontcolor) || empty($postareah1fontcolor)){$postareah1fontcolor="#000000";}?>
<?php if(!isset($postareah2backgroundcolor) || empty($postareah2backgroundcolor)){$postareah2backgroundcolor="none";}?>
<?php if(!isset($postareah2fontcolor) || empty($postareah2fontcolor)){$postareah2fontcolor="#131217";}?>
<?php if(!isset($postareah3fontcolor) || empty($postareah3fontcolor)){$postareah3fontcolor="#414141";}?>
<?php if(!isset($postareah2roundedcorners) || empty($postareah2roundedcorners) || ($postareah2roundedcorners == "")){ $postareah2roundedcorners="on";}?>
<?php if(!isset($postareah2roundedcornersradius) || empty($postareah2roundedcornersradius) || ($postareah2roundedcornersradius == "Select On or Off")){ $postareah2roundedcornersradius=7;}?>
<?php if(!isset($postareah1fontsize) || empty($postareah1fontsize)){$postareah1fontsize="25px";}?>
<?php if(!isset($postareah1fontweight) || empty($postareah1fontweight)){$postareah1fontweight="bold";}?>
<?php if(!isset($postareah2fontsize) || empty($postareah2fontsize)){$postareah2fontsize="23px";}?>
<?php if(!isset($postareah2fontweight) || empty($postareah2fontweight)){$postareah2fontweight="bold";}?>

/* HTML Elements */

* {
margin:0;
padding:0;
}

body { background-color:<?php echo $bodybackgroundcolor;?>;color:<?php echo $bodyfontcolor;?>;font-size:<?php echo $bodyfontsize;?>; font-family:<?php echo $bodyfontfamily;?>;<?php if(isset($bodybackgroundimage) && !empty($bodybackgroundimage) && ($bodybackgroundimage != 'none')){?>background-image:url(<?php echo $bodybackgroundimage; ?>);background-repeat:<?php echo $bodybackgroundimagerepeat;?> <?php if(isset($bodybackgroundimagealigntopbottom) && !empty($bodybackgroundimagealigntopbottom)){ echo "$bodybackgroundimagealigntopbottom ";} if(isset($bodybackgroundimagealignleftrightcenter) && !empty($bodybackgroundimagealignleftrightcenter)){ echo $bodybackgroundimagealignleftrightcenter;} ?>;<?php if(isset($bodybackgroundattachment) && !empty($bodybackgroundattachment)){?>background-attachment:<?php echo $bodybackgroundattachment;?>;<?php } ?><?php } ?>}
p { margin:17px 0;}
a:link { color:<?php echo $bodyalink;?>; text-decoration:<?php echo $bodyalinktextdecoration;?>; }
a:visited { color:<?php echo $bodyalinkvisited;?>; text-decoration:<?php echo $bodyalinktextdecoration;?>; }
a:hover, a:active { color:<?php echo $bodyalinkhover;?>; }
hr { display: block; height:1px; border:0; margin:10px 0px 10px 0px; }
small { font-size: 0.95em; padding:3px 6px;}
img, a:link img, a:visited img {border:0}
.clear { clear:both;overflow:hidden;}

h1,h2,h3,h4,h5,h6,span{margin:0px;padding:3px 0px 3px 0px;}


strong {font-weight:bold;}
em, dfn {font-style:italic;}
dfn {font-weight:bold;}
sup, sub {line-height:0;}
abbr, acronym {border-bottom:1px dotted<?php echo $forminputbordercolor;?>;}
address {margin:0 0 1.5em;font-style:italic;}
del {color:<?php echo $forminputbordercolor;?>;}
pre, code {margin:1.5em 0;white-space:pre;}
pre, code, tt {font:1em 'andale mono', 'lucida console', monospace;line-height:1.5;}
pre { overflow:auto;}
dl {margin:0 0 1.5em 0;}
dl dt {font-style:italic; padding:3px 0px 3px 0px;}
dd {margin-left:1.5em;}
table {margin-bottom:1.4em;width:100%;}
th {font-weight:bold; text-align:left; }
th, td {padding:4px 10px 4px 5px;}
tr.even td { text-align:left; }
tfoot {font-style:italic;}

th {background:<?php echo $bodytablethbackgroundcolor; ?>; color:<?php echo $bodytablethfontcolor; ?>; border-right:1px solid <?php echo $bodytablethbordercolor; ?>;}
tr.even td {background:<?php echo $bodytabletdbackgroundcolor;?>; color:<?php echo $bodytabletdfontcolor;?>; border-right:1px solid <?php echo $bodytabletdbordercolor; ?>;}
caption {background:<?php echo $bodytablecaptionbackgroundcolor; ?>; color: <?php echo $bodytablecaptionfontcolor; ?>;}

div#preload { display: none; }

.button { background:<?php echo $submitbuttonbackgroundcolor;?>; color:<?php echo $submitbuttonfontcolor;?> ;}
.button:hover { background:<?php echo $submitbuttonhoverbackgroundcolor; ?>;color:<?php echo $submitbuttonhoverfontcolor; ?>; }

label {font-weight:bold;}
fieldset {padding:1.4em;margin:0 0 1.5em 0;border:1px solid <?php echo $forminputbordercolor;?>;}

.alignleft { float:left; margin-right:10px; }
.alignright { float:right; margin-left:10px; }
.aligncenter { display: block; margin-left: auto; margin-right: auto; margin-top:10px;  }

img.alignleft { float:left; margin-right:10px; background: <?php echo $imagesbackgroundcolor;?>; padding:5px; max-width: 250px; }
img.alignright { float:right; margin-left:10px; background: <?php echo $imagesbackgroundcolor;?>; padding:5px; max-width: 250px; }
img.aligncenter { display: block; margin-left: auto; margin-right: auto; background: <?php echo $imagesbackgroundcolor;?>; padding:5px; max-width: 475px;  margin-top:10px; }

html>body .alignleft { width: auto; height: auto; max-width:250px; }
html>body .alignright { width: auto; height: auto; max-width:250px; }
html>body .aligncenter { width: auto; height: auto; max-width:475px;  margin-top:10px; }

.wp-pagenavi a, .wp-pagenavi a:link,.wp-pagenavi a:visited,.wp-pagenavi a:hover,.wp-pagenavi a:active,.wp-pagenavi span.pages,.wp-pagenavi span.current,.wp-pagenavi span.extend,.wp-pagenavi span.extend {	background-color: <?php echo $pagenavigationbackgroundcolor; ?>; }
.wp-pagenavi a, .wp-pagenavi a:link,.wp-pagenavi a:visited,.wp-pagenavi a:active {color: <?php echo $pagenavigationlinkcolor; ?>; font-weight:<?php echo $pagenavigationfontweight; ?>; }
.wp-pagenavi a:hover { color: <?php echo $pagenavigationlinkhovercolor; ?>; }
.wp-pagenavi span.pages,.wp-pagenavi span.current,.wp-pagenavi span.extend { color: <?php echo $pagenavigationspanfontcolor; ?>; }

.imgstyle { background: <?php echo $imagesbackgroundcolor;?>;}
<?php if( isset($imagesroundedcorners) && !empty($imagesroundedcorners) && ($imagesroundedcorners == "on") ){?>
<?php if( !isset($imageswidgetroundedcornersradius) || empty($imageswidgetroundedcornersradius) ){ $imageswidgetroundedcornersradius=4; } ?>
.imgstyle {-moz-border-radius: <?php echo $imageswidgetroundedcornersradius; ?>px;-khtml-border-radius: <?php echo $imageswidgetroundedcornersradius; ?>px;-webkit-border-radius: <?php echo $imageswidgetroundedcornersradius; ?>px;border-radius: <?php echo $imageswidgetroundedcornersradius; ?>px;}
<?php } ?>

#wrapper { width:1040px; margin:0 auto; padding:0; }

#maincontainer { width:1010px; margin:0 auto; }

#contentcontainer { <?php if($bodycontentcontainerroundedcorners == 'on'){?>border-color:<?php echo $bodycontentcontainerbackgroundcolor;?>;-moz-border-radius-topleft: <?php echo $bodycontentcontainerroundedcornersradius; ?>px; -moz-border-radius-topright: <?php echo $bodycontentcontainerroundedcornersradius; ?>px;-khtml-border-radius: <?php echo $bodycontentcontainerroundedcornersradius; ?>px;-webkit-border-top-right-radius: <?php echo $bodycontentcontainerroundedcornersradius; ?>px;-webkit-border-top-left-radius: <?php echo $bodycontentcontainerroundedcornersradius; ?>px;border-radius-topleft: <?php echo $bodycontentcontainerroundedcornersradius; ?>px;border-radius-topright: <?php echo $bodycontentcontainerroundedcornersradius; ?>px;<?php }?>clear:both; padding:10px; margin:<?php echo $bodycontentcontainertopmargin;?>px auto 0px auto; width:990px; float:left;  background:<?php echo $bodycontentcontainerbackgroundcolor;?>;}

* html .wp-caption.aligncenter img { 
   width: expression( document.body.clientWidth > 475 ? "475px" : "auto" ); /* sets max-width for IE */
}

* html .wp-caption.alignleft img { 
   width: expression( document.body.clientWidth > 250 ? "250px" : "auto" ); /* sets max-width for IE */
}
* html .wp-caption.alignright img { 
   width: expression( document.body.clientWidth > 250 ? "250px" : "auto" ); /* sets max-width for IE */
}

.wp-caption {
border: 1px solid <?php echo $imagesbackgroundcolor;?>;
text-align: center;
background-color:<?php echo $imagesbackgroundcolor;?>;
padding: 4px;
margin: 10px;
-moz-border-radius: 3px;
-khtml-border-radius: 3px;
-webkit-border-radius: 3px;
border-radius: 3px;
}

.wp-caption img {
margin: 0;
padding: 0;
border: 0 none;
}

.wp-caption.aligncenter img {  max-width: 475px; height:auto;  }
.wp-caption.alignleft img {  max-width: 250px; height:auto;  }
.wp-caption.alignright img {  max-width: 250px; height:auto;  }

.wp-caption p.wp-caption-text {
font-size: 11px;
line-height: 17px;
padding: 0 4px 5px;
margin: 0;
}


<?php /* Begin date/search row CSS */ ?>
#maincontainer .datesearch { margin:0 auto;width:1010px;background:<?php echo $date_searchbackgroundcolor; ?>;color:<?php echo $date_searchfontcolor; ?>;font-size:<?php echo $date_searchfontsize; ?>;px;font-weight:<?php echo $date_searchfontweight; ?>;px;<?php if( isset($date_searchbackgroundimageurl) && !empty($date_searchbackgroundimageurl) && ($date_searchbackgroundimageurl != 'none')){?>background-image:url(<?php echo $date_searchbackgroundimageurl; ?>);background-repeat:<?php echo $date_searchbackgroundimagerepeat;?>;<?php } ?><?php if( isset($date_searchbackgroundimageheight) && !empty($date_searchbackgroundimageheight)){ ?>height:<?php echo $date_searchbackgroundimageheight; ?>px;<?php } ?>}
#maincontainer .datesearch .date { margin-top:5px;padding:5px 0px 5px 50px;float:left;color:<?php echo $date_searchfontcolor; ?>;font-size:<?php echo $date_searchfontsize; ?>;px;font-weight:<?php echo $date_searchfontweight; ?>;px;text-transform:<?php echo $date_searchfonttransform; ?>;}
#maincontainer .datesearch .search { float:right; padding:5px;}
#maincontainer .datesearch .search #mys{float:left;border:0;width:254px;background:none;margin:4px 0 0 4px;}
#maincontainer .datesearch .search #mygo{float:right;width:25px;height:26px;background-color:transparent;border:0px;cursor:pointer;}

#mysearchform{float:left;width:291px;height:26px;}
#mysearchform {background:url(<?php bloginfo('template_url') ?>/images/searchbg.png) no-repeat;}

#searchform{}
<?php /* End date/search row CSS */ ?>

#leaderboardspace { height:90px; padding:10px; margin:0px; }
#leaderboardspace {background-color:<?php echo $leaderbackgroundcolor;?>;color:<?php echo $leaderfontcolor; ?>;text-align:<?php echo $leadertextalignlc; ?>;}
#leaderboardspace a { color:<?php echo $leaderlinkcolor; ?>;}


<?php /* Begin blogname/tagline row CSS */ ?>
#sitetitle { background:<?php echo $logosloganbackgroundcolor;?>; clear:both; margin:<?php echo $logoslogantopmargin;?>px auto 0 auto; <?php $haslogoset=$AntisnewsOptions[$themeoptionsprefix.'_sitelogo']; if(isset($haslogoset) && !empty($haslogoset)){?>width:1010px;<?php } else {?>padding-left:10px; width:1000px;<?php } ?> <?php if(isset($logosloganbackgroundimage) && !empty($logosloganbackgroundimage) && ($logosloganbackgroundimage != 'none')){?>background-image:url(<?php echo $logosloganbackgroundimage; ?>);background-repeat:<?php echo $logosloganbackgroundimagerepeat;?>;<?php }?><?php if(isset($logosloganbackgroundimageheight) && !empty($logosloganbackgroundimageheight)){?>height:<?php echo $logosloganbackgroundimageheight; ?>px;<?php } ?>}
#sitetitle .logo { float:left; }
#sitetitle .logo h1 { padding-top:<?php echo $logosloganH1toppadding;?>px; color:<?php echo $logosloganh1titlea;?>; font-size:<?php echo $logoslogantitleh1fontsize;?>; text-transform:<?php echo $logoslogantitleh1texttransform;?>; }
#sitetitle .logo h1 a { color:<?php echo $logosloganh1titlea;?>; font-size:<?php echo $logoslogantitleh1fontsize;?>px; text-transform:<?php echo $logoslogantitleh1texttransform;?>; }
#sitetitle .logo h1 a:hover { color:<?php echo $logosloganh1titleahover; ?>; }
<?php if($logoslogantitletextshadow != 'off' ){?>
#sitetitle .logo h1,#sitetitle .logo h1 a { text-shadow:<?php echo $logoslogantitletextshadowcolor; ?> 1px 1px 1px; }
<?php } ?>
#sitetitle .tagline { <?php if($logoslogantaglineposition == "center"){?>text-align:center;<?php } elseif($logoslogantaglineposition == "left"){?>float:left;<?php } elseif($logoslogantaglineposition == "right"){?>float:right;<?php }?> margin-right:20px;color:<?php echo $logoslogantaglinetextcolor; ?>;text-transform:<?php echo $logoslogantaglinetexttransform;?>;font-size:<?php echo $logoslogantaglinefontsize;?>;font-style:<?php echo $logoslogantaglinetextstyle;?>;font-weight:<?php echo $logoslogantaglinefontweight;?>;padding:<?php echo $logoslogantaglinetoppadding;?>px 0px 0px <?php echo $logoslogantaglineleftpadding;?>px; }
<?php /* End blogname/tagline row CSS */ ?>

<?php /* Begin horizontal navigation row CSS */ ?>
#antisnav-navbar{background-color:<?php echo $hmenubackgroundcolor; ?>;text-transform:<?php echo $hmenutexttransform; ?>;font-size:<?php echo $hmenufontsize; ?>;font-weight:<?php echo $hmenufontweight; ?>;<?php if(isset($hmenubackgroundimageurl) && !empty($hmenubackgroundimageurl)){?><?php if(!($hmenubackgroundimageurl == "none")){?>background-image:url(<?php echo $hmenubackgroundimageurl;?>);background-repeat:<?php echo $hmenubackgroundimagerepeat;?>;<?php }?><?php }?>}
<?php if(($hmenubottomborder == 'off') || ($hmenubottomborder == 'Select On or Off' )){?>
#antisnav-navbar{border-bottom:0;}
<?php } else {?>
#antisnav-navbar{border-bottom:<?php echo $hmenubottomborderwidth; ?>px <?php echo "$hmenubottomborderstyle $hmenubottombordercolor";?>;}
<?php } ?>
/* Style drop down list */
#antisnav, #antisnav ul {line-height:<?php echo $hmenuheight;?>px;}
#antisnav li.current_page_item {background-color:<?php echo $hmenucurrentpageitem; ?>;}
#antisnav li.current_page_item a {color:<?php echo $hmenucurrentpageitema; ?> !important;}
#antisnav-navbar a {color:<?php echo $hmenupageitema; ?>;}
#antisnav li.current_page_item li a {color:<?php echo $hmenucurrentpageitemlia; ?> !important;}
#antisnav li ul li a { color:<?php echo $hmenucurrentpageitemlia; ?>; }
#antisnav li ul li { border-color: <?php echo $hmenudropdownbordercolor; ?>; background: <?php echo $hmenucurrentpageitemli; ?>; }
#antisnav-navbar { margin:0 auto; width:1010px;}
#antisnav-navbar { clear:both; }
#antisnav-navbar-inner {width: 960px;margin: 0 auto;}
#antisnav-navbar a:hover {text-decoration: underline;}
#antisnav-navbar ul {}
/* Page Nav */
#antisnav, #antisnav ul {padding: 0;margin: 0;list-style: none;z-index: 100;}
#antisnav a {display: block;text-decoration:none;padding: 0 15px;z-index: 100;display: block;}
#antisnav {float: left;}
#antisnav li {float: left;}
#antisnav li.page_item {}
/* Style drop down list */
#antisnav li ul { position: absolute; width: 160px; left: -999em;}
#antisnav li ul li {border-style: solid; border-width:0 1px 1px 1px; padding: 3px 0px; }
#antisnav li ul li a { line-height:25px; width: 150px; text-shadow:none; text-decoration:none;}
#antisnav li ul ul {margin: -28px 0 0 180px; }
#antisnav li ul ul li a { line-height: 25px; }
#antisnav li ul li ul li a {border-width:0 1px 1px 0px; }
#antisnav li:hover ul, #antisnav li.sfhover ul { left: auto; }
#antisnav li:hover ul ul, #antisnav li.sfhover ul ul { left: -999em; }
#antisnav li:hover ul, #antisnav li li:hover ul, #antisnav li.sfhover ul, #antisnav li li.sfhover ul { left: auto; }
#antisnav li:hover, #antisnav li.hover { position: static; } /* IE7 Fix */
<?php /* End horizontal navigation row CSS */ ?>

<?php /* Begin Breaking News CSS */ ?>
#breakingnews { background-color:<?php echo $breakingnewsbackgroundcolor;?>;}
<?php if( isset($breakingnewsbackgroundimageurl) && !empty($breakingnewsbackgroundimageurl)){?>
<?php if(!($breakingnewsbackgroundimageurl == "none")){?>
#breakingnews { background-image:url(<?php echo $breakingnewsbackgroundimageurl;?>); background-repeat:<?php echo $breakingnewsbackgroundimagerepeat;?>;}<?php } ?>
<?php if(isset($breakingnewsbackgroundimageheight) && !empty($breakingnewsbackgroundimageheight)){?>
#breakingnews {height:<?php echo $breakingnewsbackgroundimageheight;?>px;}
<?php } ?>
<?php } ?>
#breakingnews { width:1010px; margin:0px ; padding:0; }
#breakingnews .bnewsheadline { margin:0px 0px 0px 260px; padding:5px 0;}
#breakingnews .bnewsheadline h2, #breakingnews h2 a { padding-top:<?php echo $breakingnewsH2toppadding;?>px; <?php if(isset($breakingnewsH2leftpadding) && !empty($breakingnewsH2leftpadding)){?>padding-left:<?php echo $breakingnewsH2leftpadding;?>px;<?php }?> color:<?php echo $breakingnewsH2fontcolor;?>; font-weight:<?php echo $breakingnewsH2fontweight;?>; font-size:<?php echo $breakingnewsH2fontsize;?>; line-height:0.9em;  }
#breakingnews span.clearbhlink { float:right; margin-right:10px;}
#breakingnews span.clearbhlink a { color:<?php echo $breakingnewsH2fontcolor;?>;}
<?php /* End Breaking News CSS */ ?>


.filler {padding:10px;}
.filler ul { margin-left:20px;}

.widget {
<?php if($sidebarwidgetbackgroundorborder == "background"){?>background:<?php echo $sidebarwidgetbackgroundcolor;?>;<?php } elseif($sidebarwidgetbackgroundorborder == "border"){?>border:<?php echo $sidebarwidgetborderwidth;?>px <?php echo "$sidebarwidgetborderstyle $sidebarwidgetbordercolor";?>;<?php }elseif($sidebarwidgetbackgroundorborder == "both"){?>background:<?php echo $sidebarwidgetbackgroundcolor;?>;border:<?php echo $sidebarwidgetborderwidth;?>px <?php echo "$sidebarwidgetborderstyle $sidebarwidgetbordercolor";?>;<?php }?>
<?php if(isset($sidebarwidgetfontcolor) && !empty($sidebarwidgetfontcolor)){?>color:<?php echo $sidebarwidgetfontcolor;?>;<?php } ?>
margin-bottom:10px;
}

<?php if(isset($sidebarwidgetlinkcolor) && !empty($sidebarwidgetlinkcolor)){?>
.widget a { color:<?php echo $sidebarwidgetlinkcolor;?>;}
<?php } ?>

<?php if(isset($sidebarwidgetlinkhovercolor) && !empty($sidebarwidgetlinkhovercolor)){?>
.widget a:hover { color:<?php echo $sidebarwidgetlinkhovercolor;?>;}
<?php } ?>

<?php if(isset($sidebarwidgetvisitedlinkcolor) && !empty($sidebarwidgetvisitedlinkcolor)){?>
.widget a:hover { color:<?php echo $sidebarwidgetvisitedlinkcolor;?>;}
<?php } ?>

<?php if(isset($sidebarwidgetlinkdecoration) && !empty($sidebarwidgetlinkdecoration)){?>
.widget a { text-decoration:<?php echo $sidebarwidgetlinkdecoration;?>;}
<?php } ?>

<?php if(isset($sidebarwidgetlinkdecoration) && !empty($sidebarwidgetlinkdecoration)){?>
.widget a { text-decoration:<?php echo $sidebarwidgetlinkdecoration;?>;}
<?php } ?>

<?php if( isset($sidebarwidgetroundedcorners) && !empty($sidebarwidgetroundedcorners) && ($sidebarwidgetroundedcorners == "on") ){?>
<?php if( !isset($sidebarwidgetroundedcornersradius) || empty($sidebarwidgetroundedcornersradius) ){ $sidebarwidgetroundedcornersradius=4; } ?>
.widget {-moz-border-radius: <?php echo $sidebarwidgetroundedcornersradius; ?>px;-khtml-border-radius: <?php echo $sidebarwidgetroundedcornersradius; ?>px;-webkit-border-radius: <?php echo $sidebarwidgetroundedcornersradius; ?>px;border-radius: <?php echo $sidebarwidgetroundedcornersradius; ?>px;}
<?php } ?>

.widget ul { margin:0; padding:0;}

.widget ul li {
padding:5px 0px;
margin:0;
list-style:<?php echo $sidebarwidgetbulletstyle;?>;
<?php if(isset($sidebarwidgetlibottomborder) && !empty($sidebarwidgetlibottomborder) && ($sidebarwidgetlibottomborder != "none")){?>
border-bottom:1px solid <?php echo $sidebarwidgetlibottomborder;?>;
<?php }?>
}

<?php if(isset($sidebarwidgetullia) && !empty($sidebarwidgetullia)){?>
.widget ul li a { color:<?php echo $sidebarwidgetullia;?>;}
<?php }?>

.widget ul li ul li {
list-style:<?php echo $sidebarwidgetlichildstyle;?>;
border-bottom:none;
margin-left:15px;
}

.widget li.widget_tag_cloud {
padding:0;
margin:0;
list-style:none;
text-align:left;
}

.widget ul.widget_tag_cloud {
margin:0;
}

.widgetinside { <?php if($sidebarwidgetbackgroundorborder == "neither"){?>padding:0px 10px 10px 10px;<?php } else {?>padding:10px;<?php } ?> margin:0  auto; }

li.widget_tag_cloud a {}
h2.widget li { list-style:none; }

.widget h2 {
background:<?php echo $sidebarwidgeth2backgroundcolor;?>;
color:<?php echo $sidebarwidgeth2fontcolor;?>;
<?php if(isset($sidebarwidgeth2backgroundcolor) && !empty($sidebarwidgeth2backgroundcolor) && !($sidebarwidgeth2backgroundcolor == "none") ){?>padding:5px 0px 5px 10px;margin-bottom:10px;<?php } else {?>margin-bottom:10px;<?php } ?>
font-size:<?php echo $sidebarwidgeth2fontsize;?>;
font-weight:<?php echo $sidebarwidgeth2fontweight;?>;
}

<?php if( isset($sidebarwidgeth2roundedcorners) && !empty($sidebarwidgeth2roundedcorners) && ($sidebarwidgeth2roundedcorners == "on") ){?>
<?php if( !isset($sidebarwidgeth2roundedcornersradius) || empty($sidebarwidgeth2roundedcornersradius) ){ $sidebarwidgeth2roundedcornersradius=4; } ?>
.widget h2 {-moz-border-radius: <?php echo $sidebarwidgeth2roundedcornersradius; ?>px;-khtml-border-radius: <?php echo $sidebarwidgeth2roundedcornersradius; ?>px;-webkit-border-radius: <?php echo $sidebarwidgeth2roundedcornersradius; ?>px;border-radius: <?php echo $sidebarwidgeth2roundedcornersradius; ?>px;}
<?php } ?>

.widget h2 a {color:<?php echo $sidebarwidgeth2fontcolor;?>;}
<?php if( isset($sidebarwidgeth2fonthovercolor) && !empty($sidebarwidgeth2fonthovercolor) ){?>
.widget h2 a:hover { color:<?php echo $sidebarwidgeth2fonthovercolor;?>; }
<?php } ?>

.widget h3,.widget h3 a {
color:<?php echo $sidebarwidgeth3fontcolor;?>;
font-size:<?php echo $sidebarwidgeth3fontsize;?>;
font-weight:<?php echo $sidebarwidgeth3fontweight;?>;
}

<?php if( isset($sidebarwidgeth3fonthovercolor) && !empty($sidebarwidgeth3fonthovercolor) ){?>
.widget h3 a:hover { color:<?php echo $sidebarwidgeth3fonthovercolor;?>; }
<?php } ?>


.widget select { width:100%;}

.widget .excerpt { margin-bottom:10px;}

.widget .excerpt p { margin-top:5px;}

.widget .excerpt .imgstyle { 
float:left;
margin-right:10px;
padding:5px;
margin-bottom:10px;
}

.textwidget {  }

/* featured post */

#featured {
	float: left;
	width: 639px;
	margin: 0;
	position: relative;
	padding-bottom: 20px;
}
#featured-content {
	margin: 0;
}
.featured-slides-bottom-border {
	width: 618px;
	height: 12px;
}
.featured-slides {
}
.featured-image {
	width: 598px;
	height: 324px;
	<?php if( isset($featured1borderonoff) && !empty($featured1borderonoff)  && ( ($featured1borderonoff == "on") || ($featured1borderonoff == "Select On or Off") ) ){?>border:1px solid <?php echo "$featured1bordercolor";?>;<?php } ?>
	padding: 10px 10px;
	position: relative;
}

.featured-badge {
	width: 150px;
	height: 150px;
	position: absolute;
	display: block;
	background: url(<?php bloginfo('template_url') ?>/images/featured-badge.png) no-repeat;
	top: -6px;
	left:-6px;
	z-index: 2;
}
.overlay {
	width: 600px;
	background: <?php echo $featured1overlaybackgroundcolor;?>;
	filter:alpha(opacity=60);
	-moz-opacity:0.6;
	-khtml-opacity: 0.6;
	opacity: 0.6;
	position: absolute;
	left: 10px;
	top: 290px;
	height: 50px;
}
.featured-title-content {
	position: absolute;	
	left: 20px;	
	top: 293px;
	width: 568px;

}

.featured-title-content p {
	padding-bottom: 5px;	
}

.featured-post-date {
	color: <?php echo $featured1overlayfontcolor;?>;
	font-size:11px;
	margin: 0;
	line-height: 18px;
}

.featured-title h2, .featured-title h2 a {
	font-weight:<?php echo $featured1overlayh2fontweight;?>;
	font-size:<?php echo $featured1overlayh2fontsize;?>;
	color: <?php echo $featured1overlayfontcolor;?>;
}

<?php if(isset($featured1overlayfonthovercolor) && !empty($featured1overlayfonthovercolor)){?>
.featured-title h2 a:hover { color:<?php echo $featured1overlayfonthovercolor;?>; }
<?php } ?>

.container, #loopedSlider, div.slides, ul.slides {
	width:620px;
}
.container {
	height:346px;
	overflow:hidden;
	position:relative;
}
div.slides {
	position:absolute;
	top:0;
	left:0;
}
#loopedSlider {
	margin:0;
	position:relative;
	clear:both;
}

#loopedSlider a.next {
	position:absolute;
	top:200px;
	right:30px;
	opacity:0.8;
}
#loopedSlider a.previous {
	position:absolute;
	top:200px;
	left:30px;
	opacity:0.8;
}
#loopedSlider a.next:hover, #loopedSlider a.previous:hover {
	opacity:1;
}

/* tier 1 */

#tier1 {
width:1010px;
margin:0 auto 10px auto;
padding:0px;
}

#tier1 .tier1main {
width:640px;
margin:0;
float:left;
}

#tier1 .tier1main p {
padding-right:10px;
}

#tier1 .tier1side {float:left;width:350px;}

#tier1 .tier1side h2 {
background:<?php echo $featured2h2backgroundcolor;?>;
color:<?php echo $featured2h2fontcolor;?>;
<?php if(isset($featured2h2backgroundcolor) && !empty($featured2h2backgroundcolor) && !($featured2h2backgroundcolor == "none") ){?>padding:5px 0px 5px 10px;margin-bottom:10px;<?php } else {?>margin-bottom:10px;<?php } ?>
font-size:<?php echo $featured2h2fontsize;?>;
font-weight:<?php echo $featured2h2fontweight;?>;
}

<?php if( isset($featured2h2roundedcorners) && !empty($featured2h2roundedcorners) && ($featured2h2roundedcorners == "on") ){?>
<?php if( !isset($featured2h2roundedcornersradius) || empty($featured2h2roundedcornersradius) ){ $featured2h2roundedcornersradius=4; } ?>
#tier1 .tier1side h2 {-moz-border-radius: <?php echo $featured2h2roundedcornersradius; ?>px;-khtml-border-radius: <?php echo $featured2h2roundedcornersradius; ?>px;-webkit-border-radius: <?php echo $featured2h2roundedcornersradius; ?>px;border-radius: <?php echo $featured2h2roundedcornersradius; ?>px;}
<?php } ?>

#tier1 .tier1side h2 a {color:<?php echo $featured2h2fontcolor;?>;}
<?php if( isset($featured2h2fonthovercolor) && !empty($featured2h2fonthovercolor) ){?>
#tier1 .tier1side h2 a:hover { color:<?php echo $featured2h2fonthovercolor;?>; }
<?php } ?>

#tier1 .tier1side .featured2 {
margin-bottom:10px;
}

#tier1 .tier1side .featured2 h3 {
margin-top:0px;
padding-top:0px;
}

#tier1 .tier1side .featured2 h3, #tier1 .tier1side .featured2 h3 a {color:<?php echo $featured2h3fontcolor;?>;}
<?php if( isset($featured2h3fonthovercolor) && !empty($featured2h3fonthovercolor) ){?>
#tier1 .tier1side .featured2 h3 a:hover { color:<?php echo $featured2h3fonthovercolor;?>; }
<?php } ?>

#tier1 .tier1side .featured2 p {
margin-top:0px;
}

#tier1 .tier1side .featured2 .imgstyle {
float:left;
margin-right:10px;
padding:5px;
margin-bottom:10px;
}

#tier1 .tier1side .stickyout .sticky p {
margin-top:0px;
}

#tier1 .tier1side .stickyout .sticky .imgstyle {
float:left;
margin-right:10px;
padding:5px;
margin-bottom:10px;
}

#tier1 .tier1side .stickyout h2 {
background:<?php echo $stickyh2backgroundcolor;?>;
color:<?php echo $stickyh2fontcolor;?>;
<?php if(isset($stickyh2backgroundcolor) && !empty($stickyh2backgroundcolor) && !($stickyh2backgroundcolor == "none") ){?>padding:5px 0px 5px 10px;margin-bottom:10px;<?php } else {?>margin-bottom:10px;<?php } ?>
font-size:<?php echo $stickyh2fontsize;?>;
font-weight:<?php echo $stickyh2fontweight;?>
}

<?php if( isset($stickyh2roundedcorners) && !empty($stickyh2roundedcorners) && ($stickyh2roundedcorners == "on") ){?>
<?php if( !isset($stickyh2roundedcornersradius) || empty($stickyh2roundedcornersradius) ){ $stickyh2roundedcornersradius=4; } ?>
#tier1 .tier1side .stickyout h2 {-moz-border-radius: <?php echo $stickyh2roundedcornersradius; ?>px;-khtml-border-radius: <?php echo $stickyh2roundedcornersradius; ?>px;-webkit-border-radius: <?php echo $stickyh2roundedcornersradius; ?>px;border-radius: <?php echo $stickyh2roundedcornersradius; ?>px;}
<?php } ?>

#tier1 .tier1side .stickyout h2 a {color:<?php echo $featured2h2fontcolor;?>;}
<?php if( isset($featured2h2fonthovercolor) && !empty($featured2h2fonthovercolor) ){?>
#tier1 .tier1side .stickyout h2 a:hover { color:<?php echo $featured2h2fonthovercolor;?>; }
<?php } ?>

#tier1 .tier1side .stickyout .sticky h3, #tier1 .tier1side .stickyout .sticky h3 a {color:<?php echo $stickyh3fontcolor;?>;}
<?php if( isset($stickyh3fonthovercolor) && !empty($stickyh3fonthovercolor) ){?>
#tier1 .tier1side .stickyout .sticky h3 a:hover { color:<?php echo $stickyh3fonthovercolor;?>; }
<?php } ?>

/* tier 2 */

#tier2 {
width:1010px;
margin:0px auto 0px auto;
}

/* tier 2 a */
#tier2 .tier2a {
float:left;
width:225px;
padding:0;
margin:0 10px 0px auto;
}

/* tier 2 b */
#tier2 .tier2b {
float:left;
width:140px;
margin:0 10px 0px 5px;
}


/* tier 2 c */

#tier2 .tier2c {
float:left;
width:290px;
margin:0 15px 0px 5px;
}

#tier2 .tier2c .widget { padding:0px 10px 10px 10px; }

#tier2 .tier2c .top h2 {
background:<?php echo $featured3h2backgroundcolor;?>;
color:<?php echo $featured3h2fontcolor;?>;
<?php if(isset($featured3h2backgroundcolor) && !empty($featured3h2backgroundcolor) && !($featured3h2backgroundcolor == "none") ){?>padding:5px 0px 5px 10px;margin-bottom:10px;<?php } else {?>margin-bottom:10px;<?php } ?>
font-size:<?php echo $featured3h2fontsize;?>;
font-weight:<?php echo $featured3h2fontweight;?>;
}

<?php if( isset($featured3h2roundedcorners) && !empty($featured3h2roundedcorners) && ($featured3h2roundedcorners == "on") ){?>
<?php if( !isset($featured3h2roundedcornersradius) || empty($featured3h2roundedcornersradius) ){ $featured3h2roundedcornersradius=4; } ?>
#tier2 .tier2c .top h2 {-moz-border-radius: <?php echo $featured3h2roundedcornersradius; ?>px;-khtml-border-radius: <?php echo $featured3h2roundedcornersradius; ?>px;-webkit-border-radius: <?php echo $featured3h2roundedcornersradius; ?>px;border-radius: <?php echo $featured3h2roundedcornersradius; ?>px;}
<?php } ?>

#tier2 .tier2c .top h2 a {color:<?php echo $featured3h2fontcolor;?>;}
<?php if( isset($featured3h2fonthovercolor) && !empty($featured3h2fonthovercolor) ){?>
#tier2 .tier2c .top h2 a:hover { color:<?php echo $featured3h2fonthovercolor;?>; }
<?php } ?>

#tier2 .tier2c .top .featured3 .imgstyle {
width:96%;
display:block;
float:none;
margin:0 auto;
text-align:center;
padding:2%;
}

#tier2 .tier2c .top .featured3 h3 {
margin:5px 0px;
}

#tier2 .tier2c .top .featured3 h3, #tier2 .tier2c .top .featured3 h3 a {color:<?php echo $featured3h3fontcolor;?>;}
<?php if( isset($featured3h3fonthovercolor) && !empty($featured3h3fonthovercolor) ){?>
#tier2 .tier2c .top .featured3 h3 a:hover { color:<?php echo $featured3h3fonthovercolor;?>; }
<?php } ?>

#tier2 .tier2c .top .featured3 p {
margin-bottom:10px;
margin-top:0px;
}

#tier2 .tier2c .bottom { margin-top:20px; }

#tier2 .tier2c .bottom h2 {
background:<?php echo $featured4h2backgroundcolor;?>;
color:<?php echo $featured4h2fontcolor;?>;
<?php if(isset($featured4h2backgroundcolor) && !empty($featured4h2backgroundcolor) && !($featured4h2backgroundcolor == "none") ){?>padding:5px 0px 5px 10px;margin-bottom:10px;<?php } else {?>margin-bottom:10px;<?php } ?>
font-size:<?php echo $featured4h2fontsize;?>;
font-weight:<?php echo $featured4h2fontweight;?>;
}

<?php if( isset($featured4h2roundedcorners) && !empty($featured4h2roundedcorners) && ($featured4h2roundedcorners == "on") ){?>
<?php if( !isset($featured4h2roundedcornersradius) || empty($featured4h2roundedcornersradius) ){ $featured4h2roundedcornersradius=4; } ?>
#tier2 .tier2c .bottom h2 {-moz-border-radius: <?php echo $featured4h2roundedcornersradius; ?>px;-khtml-border-radius: <?php echo $featured4h2roundedcornersradius; ?>px;-webkit-border-radius: <?php echo $featured4h2roundedcornersradius; ?>px;border-radius: <?php echo $featured4h2roundedcornersradius; ?>px;}
<?php } ?>

#tier2 .tier2c .bottom h2 a {color:<?php echo $featured4h2fontcolor;?>;}
<?php if( isset($featured4h2fonthovercolor) && !empty($featured4h2fonthovercolor) ){?>
#tier2 .tier2c .bottom h2 a:hover { color:<?php echo $featured4h2fonthovercolor;?>; }
<?php } ?>


#tier2 .tier2c .bottom .featured4 {
margin-bottom:10px;
}

#tier2 .tier2c .bottom .featured4 h3 {
margin-top:0px;
padding-top:0px;
}

#tier2 .tier2c .bottom .featured4 h3, #tier2 .tier2c .bottom .featured4 h3 a {color:<?php echo $featured4h3fontcolor;?>;}
<?php if( isset($featured4h3fonthovercolor) && !empty($featured4h3fonthovercolor) ){?>
#tier2 .tier2c .bottom .featured4 h3 a:hover { color:<?php echo $featured4h3fonthovercolor;?>; }
<?php } ?>

#tier2 .tier2c .bottom .featured4 p {
margin-top:0px;
}

#tier2 .tier2c .bottom .featured4 .imgstyle {
float:left;
margin-right:10px;
padding:5px;
margin-bottom:10px;
}

/* tier 2 d */

#tier2 .tier2d {
float:left;
width:290px;
margin:0 auto;
}


#tier2 .tier2d .top h2 {
background:<?php echo $featured5h2backgroundcolor;?>;
color:<?php echo $featured5h2fontcolor;?>;
<?php if(isset($featured5h2backgroundcolor) && !empty($featured5h2backgroundcolor) && !($featured5h2backgroundcolor == "none") ){?>padding:5px 0px 5px 10px;margin-bottom:10px;<?php } else {?>margin-bottom:10px;<?php } ?>
font-size:<?php echo $featured5h2fontsize;?>;
font-weight:<?php echo $featured5h2fontweight;?>;
}

<?php if( isset($featured5h2roundedcorners) && !empty($featured5h2roundedcorners) && ($featured5h2roundedcorners == "on") ){?>
<?php if( !isset($featured5h2roundedcornersradius) || empty($featured5h2roundedcornersradius) ){ $featured5h2roundedcornersradius=4; } ?>
#tier2 .tier2d .top h2 {-moz-border-radius: <?php echo $featured5h2roundedcornersradius; ?>px;-khtml-border-radius: <?php echo $featured5h2roundedcornersradius; ?>px;-webkit-border-radius: <?php echo $featured5h2roundedcornersradius; ?>px;border-radius: <?php echo $featured5h2roundedcornersradius; ?>px;}
<?php } ?>

#tier2 .tier2d .top h2 a {color:<?php echo $featured5h2fontcolor;?>;}
<?php if( isset($featured5h2fonthovercolor) && !empty($featured5h2fonthovercolor) ){?>
#tier2 .tier2d .top h2 a:hover { color:<?php echo $featured5h2fonthovercolor;?>; }
<?php } ?>

#tier2 .tier2d .top .featured5 .imgstyle {
width:96%;
display:block;
float:none;
margin:0 auto;
text-align:center;
padding:2%;
}

#tier2 .tier2d .top .featured5 h3 {
margin:5px 0px;
}

#tier2 .tier2d .top .featured5 h3, #tier2 .tier2d .top .featured5 h3 a {color:<?php echo $featured5h3fontcolor;?>;}
<?php if( isset($featured5h3fonthovercolor) && !empty($featured5h3fonthovercolor) ){?>
#tier2 .tier2d .top .featured5 h3 a:hover { color:<?php echo $featured5h3fonthovercolor;?>; }
<?php } ?>

#tier2 .tier2d .top .featured5 p {
margin-bottom:10px;
margin-top:0px;
}

#tier2 .tier2d .bottom { margin-top:20px; }

#tier2 .tier2d .bottom h2 {
background:<?php echo $featured6h2backgroundcolor;?>;
color:<?php echo $featured6h2fontcolor;?>;
<?php if(isset($featured6h2backgroundcolor) && !empty($featured6h2backgroundcolor) && !($featured6h2backgroundcolor == "none") ){?>padding:5px 0px 5px 10px;margin-bottom:10px;<?php } else {?>margin-bottom:10px;<?php } ?>
font-size:<?php echo $featured6h2fontsize;?>;
font-weight:<?php echo $featured6h2fontweight;?>;
}

<?php if( isset($featured6h2roundedcorners) && !empty($featured6h2roundedcorners) && ($featured6h2roundedcorners == "on") ){?>
<?php if( !isset($featured6h2roundedcornersradius) || empty($featured6h2roundedcornersradius) ){ $featured6h2roundedcornersradius=4; } ?>
#tier2 .tier2d .bottom h2 {-moz-border-radius: <?php echo $featured6h2roundedcornersradius; ?>px;-khtml-border-radius: <?php echo $featured6h2roundedcornersradius; ?>px;-webkit-border-radius: <?php echo $featured6h2roundedcornersradius; ?>px;border-radius: <?php echo $featured6h2roundedcornersradius; ?>px;}
<?php } ?>

#tier2 .tier2d .bottom h2 a {color:<?php echo $featured6h2fontcolor;?>;}
<?php if( isset($featured6h2fonthovercolor) && !empty($featured6h2fonthovercolor) ){?>
#tier2 .tier2d .bottom h2 a:hover { color:<?php echo $featured6h2fonthovercolor;?>; }
<?php } ?>


#tier2 .tier2d .bottom .featured6 {
margin-bottom:10px;
}

#tier2 .tier2d .bottom .featured6 h3 {
margin-top:0px;
padding-top:0px;
}

#tier2 .tier2d .bottom .featured6 h3, #tier2 .tier2d .bottom .featured6 h3 a {color:<?php echo $featured6h3fontcolor;?>;}
<?php if( isset($featured6h3fonthovercolor) && !empty($featured6h3fonthovercolor) ){?>
#tier2 .tier2d .bottom .featured6 h3 a:hover { color:<?php echo $featured6h3fonthovercolor;?>; }
<?php } ?>

#tier2 .tier2d .bottom .featured6 p {
margin-top:0px;
}

#tier2 .tier2d .bottom .featured6 .imgstyle {
float:left;
margin-right:10px;
padding:5px;
margin-bottom:10px;
}

/* tier 3 */

#tier3 {
width:1010px;
margin:20px auto 0px auto;
padding:5px;
}

#tier3 .tier3main {
width:635px;
magin:0;
float:left;
padding:0;
}


#tier3 .tier3main h2 {
background:<?php echo $featured7h2backgroundcolor;?>;
color:<?php echo $featured7h2fontcolor;?>;
<?php if(isset($featured7h2backgroundcolor) && !empty($featured7h2backgroundcolor) && !($featured7h2backgroundcolor == "none") ){?>padding:5px 0px 5px 10px;margin-bottom:10px;<?php } else {?>margin-bottom:10px;<?php } ?>
font-size:<?php echo $featured7h2fontsize;?>;
font-weight:<?php echo $featured7h2fontweight;?>;
}

<?php if( isset($featured7h2roundedcorners) && !empty($featured7h2roundedcorners) && ($featured7h2roundedcorners == "on") ){?>
<?php if( !isset($featured7h2roundedcornersradius) || empty($featured7h2roundedcornersradius) ){ $featured7h2roundedcornersradius=4; } ?>
#tier3 .tier3main h2 {-moz-border-radius: <?php echo $featured7h2roundedcornersradius; ?>px;-khtml-border-radius: <?php echo $featured7h2roundedcornersradius; ?>px;-webkit-border-radius: <?php echo $featured7h2roundedcornersradius; ?>px;border-radius: <?php echo $featured7h2roundedcornersradius; ?>px;}
<?php } ?>

#tier3 .tier3main h2 a {color:<?php echo $featured7h2fontcolor;?>;}
<?php if( isset($featured7h2fonthovercolor) && !empty($featured7h2fonthovercolor) ){?>
#tier3 .tier3main h2 a:hover { color:<?php echo $featured7h2fonthovercolor;?>; }
<?php } ?>


#tier3 .tier3main .tier3mainleft {
width:260px;
float:left;
margin-right:10px;
}

#tier3 .tier3main .tier3mainleft .featured7 {
margin-bottom:20px;
}

#tier3 .tier3main .tier3mainleft .featured7 h3 {
margin-top:5px;
padding-top:0px;
}

#tier3 .tier3main .tier3mainleft .featured7 h3,#tier3 .tier3main .tier3mainleft .featured7 h3 a, #tier3 .tier3main .tier3mainright .featured7 h3,#tier3 .tier3main .tier3mainright .featured7 h3 a {color:<?php echo $featured7h3fontcolor;?>;}
<?php if( isset($featured7h3fonthovercolor) && !empty($featured7h3fonthovercolor) ){?>
#tier3 .tier3main .tier3mainleft .featured7 h3 a:hover,#tier3 .tier3main .tier3mainright .featured7 h3 a:hover { color:<?php echo $featured7h3fonthovercolor;?>; }
<?php } ?>

#tier3 .tier3main .tier3mainleft .featured7 p {
margin-top:0px;
margin-right:10px;
}

#tier3 .tier3main .tier3mainleft .featured7 .imgstyle {
margin:0 auto;
padding:5px;
}


#tier3 .tier3main .tier3mainright {
width:340px;
float:left;
padding:0px 0px 10px 0px;
}

#tier3 .tier3main .tier3mainright .featured7 {
margin-bottom:20px;
}

#tier3 .tier3main .tier3mainright .featured7 h3 {
margin-top:0px;
padding-top:0px;
}

#tier3 .tier3main .tier3mainright .featured7 p {
margin-top:0px;
margin-right:10px;
}

#tier3 .tier3main .tier3mainright .featured7 .imgstyle {
float:left;
margin-right:10px;
padding:5px;
}

#tier3 .tier3side {
float:left;
width:340px;
margin:0px 0px 0px 10px;
}



/* tier 4 */

#tier4 {
width:1010px;
margin:5px auto 0px auto;
padding:5px;

}

#tier4 .tier4a {
float:left;
width:335px;
margin:0 5px 0px 0px;
}


#tier4 .tier4b {
float:left;
width:640px;
margin:0 0px 0px 5px;
}

#tier4 .tier4b .tier4btop {
width:640px;
margin:0 auto;
}

#tier4 .tier4b .tier4btop .tier4btopleft {
float:left;
width:315px;
margin:0 auto;
padding:0px;
}

#tier4 .tier4b .tier4btop .tier4btopright {
float:right;
width:315px;
margin:0 auto;
}


#tier4 .tier4b .tier4bbottom {
clear:both;
width:640px;
margin:0 auto;
}



#tier4 .tier4c {
float:left;
width:300px;
margin:0 auto;
}

/* Content */


#content { width:1010px; margin:0 auto; }
.postarea { width:530px; margin:0 auto; padding:10px; float:left; }

.postareameta { margin: 30px 0;}

.postarea h1,.postarea h1 a {color:<?php echo $postareah3fontcolor;?>;}
<?php if( isset($postareah1fonthovercolor) && !empty($postareah1fonthovercolor) ){?>
.postarea h1 a:hover { color:<?php echo $postareah1fonthovercolor;?>; }
<?php } ?>

.postarea h2 {
background:<?php echo $postareah2backgroundcolor;?>;
color:<?php echo $postareah2fontcolor;?>;
<?php if(isset($postareah2backgroundcolor) && !empty($postareah2backgroundcolor) && !($postareah2backgroundcolor == "none") ){?>padding:5px 0px 5px 10px;margin-bottom:10px;<?php } else {?>margin-bottom:10px;<?php } ?>
}

<?php if( isset($postareah2roundedcorners) && !empty($postareah2roundedcorners) && ($postareah2roundedcorners == "on") ){?>
<?php if( !isset($postareah2roundedcornersradius) || empty($postareah2roundedcornersradius) ){ $postareah2roundedcornersradius=4; } ?>
.postarea h2 {-moz-border-radius: <?php echo $postareah2roundedcornersradius; ?>px;-khtml-border-radius: <?php echo $postareah2roundedcornersradius; ?>px;-webkit-border-radius: <?php echo $postareah2roundedcornersradius; ?>px;border-radius: <?php echo $postareah2roundedcornersradius; ?>px;}
<?php } ?>

.postarea h2 a {color:<?php echo $postareah2fontcolor;?>;}
<?php if( isset($postareah2fonthovercolor) && !empty($postareah2fonthovercolor) ){?>
.postarea h2 a:hover { color:<?php echo $postareah2fonthovercolor;?>; }
<?php } ?>

.postarea h3,.postarea h3 a {color:<?php echo $postareah3fontcolor;?>;}
<?php if( isset($postareah3fonthovercolor) && !empty($postareah3fonthovercolor) ){?>
.postarea h3 a:hover { color:<?php echo $postareah3fonthovercolor;?>; }
<?php } ?>

.postarea blockquote,.entry blockquote { clear:both; padding:10px;}
.postarea blockquote,.entry blockquote { background:<?php echo $blockquotebackgroundcolor;?>;color:<?php echo $blockquotefontcolor;?>;<?php if($blockquoteborderposition == "full"){?>border:<?php echo $blockquoteborderwidth;?>px <?php echo "$blockquoteborderstyle $blockquotebordercolor";?>;<?php } elseif($blockquoteborderposition == "left"){?>border-left:<?php echo $blockquoteborderwidth;?>px <?php echo "$blockquoteborderstyle $blockquotebordercolor";?>;<?php } elseif($blockquoteborderposition == "right"){?>border-right:<?php echo $blockquoteborderwidth;?>px <?php echo "$blockquoteborderstyle $blockquotebordercolor";?>;<?php } elseif($blockquoteborderposition == "top"){?>border-top:<?php echo $blockquoteborderwidth;?>px <?php echo "$blockquoteborderstyle $blockquotebordercolor";?>;<?php } elseif($blockquoteborderposition == "bottom"){?>border-left:<?php echo $blockquoteborderwidth;?>px <?php echo "$blockquoteborderstyle $blockquotebordercolor";?>;<?php } elseif($blockquoteborderposition == "top-bottom"){?>border-top:<?php echo $blockquoteborderwidth;?>px <?php echo "$blockquoteborderstyle $blockquotebordercolor";?>;border-bottom:<?php echo $blockquoteborderwidth;?>px <?php echo "$blockquoteborderstyle $blockquotebordercolor";?>;<?php } elseif($blockquoteborderposition == "left-right"){?>border-left:<?php echo $blockquoteborderwidth;?>px <?php echo "$blockquoteborderstyle $blockquotebordercolor";?>;border-right:<?php echo $blockquoteborderwidth;?>px <?php echo "$blockquoteborderstyle $blockquotebordercolor";?>;<?php } elseif($blockquoteborderposition == "top-left"){?>border-top:<?php echo $blockquoteborderwidth;?>px <?php echo "$blockquoteborderstyle $blockquotebordercolor";?>;border-left:<?php echo $blockquoteborderwidth;?>px <?php echo "$blockquoteborderstyle $blockquotebordercolor";?>;<?php } elseif($blockquoteborderposition == "top-right"){?>border-top:<?php echo $blockquoteborderwidth;?>px <?php echo "$blockquoteborderstyle $blockquotebordercolor";?>;border-right:<?php echo $blockquoteborderwidth;?>px <?php echo "$blockquoteborderstyle $blockquotebordercolor";?>;<?php } elseif($blockquoteborderposition == "bottom-left"){?>border-bottom:<?php echo $blockquoteborderwidth;?>px <?php echo "$blockquoteborderstyle $blockquotebordercolor";?>;border-left:<?php echo $blockquoteborderwidth;?>px <?php echo "$blockquoteborderstyle $blockquotebordercolor";?>;<?php } elseif($blockquoteborderposition == "bottom-right"){?>border-bottom:<?php echo $blockquoteborderwidth;?>px <?php echo "$blockquoteborderstyle $blockquotebordercolor";?>;border-right:<?php echo $blockquoteborderwidth;?>px <?php echo "$blockquoteborderstyle $blockquotebordercolor";?>;<?php } elseif($blockquoteborderposition == "left-right-top"){?>border-left:<?php echo $blockquoteborderwidth;?>px <?php echo "$blockquoteborderstyle $blockquotebordercolor";?>;border-right:<?php echo $blockquoteborderwidth;?>px <?php echo "$blockquoteborderstyle $blockquotebordercolor";?>;border-top:<?php echo $blockquoteborderwidth;?>px <?php echo "$blockquoteborderstyle $blockquotebordercolor";?>;<?php } elseif($blockquoteborderposition == "left-right-bottom"){?>border-left:<?php echo $blockquoteborderwidth;?>px <?php echo "$blockquoteborderstyle $blockquotebordercolor";?>;border-right:<?php echo $blockquoteborderwidth;?>px <?php echo "$blockquoteborderstyle $blockquotebordercolor";?>;border-bottom:<?php echo $blockquoteborderwidth;?>px <?php echo "$blockquoteborderstyle $blockquotebordercolor";?>;<?php }?>}

.postarea ul li { list-style:square; }
.postarea .byline { display:block; padding:4px 4px 4px 0px; font-size:x-small; }
.postarea .byline a { text-decoration:none; }
.postarea .byline a:hover { text-decoration:underline; }
.postarea .excerpt { margin:20px 0px 20px 0px; }
.postarea .excerpt p { margin:0px; }
.postarea .excerpt .byline { margin-bottom:10px; }
.postarea .excerpt .imgstyle { 
float:left;
margin-right:10px;
padding:5px;
}


.postarea h1 {
font-size:<?php echo $postareah1fontsize;?>;
font-weight:<?php echo $postareah1fontweight;?>;
width:510px;
}

.postarea h2 {
font-size:<?php echo $postareah2fontsize;?>;
font-weight:<?php echo $postareah2fontweight;?>;
width:510px;
}

#postsidebar {
float:left;
width:220px;
}

#share {
width:220px;
margin:0 auto;
}

#share ul {
width:220px;
}

#share ul li {
float:left;
width:75px;
list-style:none;
text-align:center;
margin-top:15px;
}

#postmeta .byline {padding:10px;}

.bnavigation {
padding:10px auto 10px auto;
width:500px;
margin:20px auto 20px auto;
}
.bnavigation a {
font-size: 1em;
}

.bnavleft {
width:250px;
float:left;
}

.bnavright {
width:220px;
float:right;
}

.paginav {
width:510px;
margin-bottom:15px;
float:left;
padding:10px;
}
.paginav a {
font-size: 1em;
font-weight: bold;
}

.npfsearchmsg {padding-right:20px;}
.npfsearchmsg h2 {margin:0px 0px 10px 0px;}

.postareameta {margin:10px 0px 10px 30px;}

.entry { width:510px; margin-bottom:20px; }

.entry .tags {padding:5px;}

.entry ul, .entry ol {margin:10px 0px 10px 30px;clear:both;}

.entry ul li {list-style:square; padding:3px 0px 3px 0px;}

.entry ol li {  list-style-type: decimal; padding:3px 0px 3px 0px; }
.entry ol ol li {  list-style-type: lower-roman; padding:3px 0px 3px 0px; }

.entry img { margin-bottom:10px;  }

.entry textarea {
width:100%;
height:auto !important;
min-height:100px;
border:1px solid<?php echo $forminputbordercolor;?>;
}

.entry input[type=text] {
width: 300px;
padding:5px;
border:1px solid<?php echo $forminputbordercolor;?>;
}

.entry input.text {
width: 300px;
padding:5px;
border:1px solid<?php echo $forminputbordercolor;?>;
}

.entry input[type=password] {
width: 300px;
padding:5px;
border:1px solid<?php echo $forminputbordercolor;?>;
}

.entry input.password {
width: 300px;
padding:5px;
border:1px solid<?php echo $forminputbordercolor;?>;
}

ul.list404, ol.list404 { margin-left:30px;}
ul.list404 li, ol.list404 li { padding:6px 0px 6px 0px; }
ul.list404 li a, ol.list404 li a { color:#423B35; }

.postmetadata { margin:10px 0px 10px 0px;}


/************************************************
* Sidebar                                        * 
************************************************/

<?php $sbp=$AntisnewsOptions[$themeoptionsprefix.'_sidebarpos']; if( !isset($sbp) || empty($sbp) || ($sbp == 2) ) {?>#sidebarone { width: 210px; float:left; margin:0px 0px 0px 10px; }<?php } else {?>#sidebarone  { width: 220px; float:left; margin:0px; }<?php } ?>


#calendar caption, #wp-calendar caption { margin:0; padding:2px 0 2px 10px; text-align:center; }
#calendar table, #wp-calendar table { width: 100%; padding: 0; text-align: center; }
#calendar thead th, #wp-calendar thead th { padding:3px; text-align:center; }
#calendar tbody td, #wp-calendar tbody td { padding: 5px 0;   text-align:center;  }
#calendar tfoot td, #wp-calendar tfoot td { }
#calendar #prev, #wp-calendar #prev { text-align: left; }
#calendar #next, #wp-calendar #next { text-align: right; }
#calendar a, #wp-calendar a { font-weight: normal; }


/* Form Elements */

.button { padding: 1px; border:none; }
.button:hover { text-decoration:none }

#respond { }

#commentform input { width: 170px; margin: 5px 5px 1px 0; padding:5px;  }
#commentform textarea { width:500px; margin-top:5px;height:auto !important; min-height:100px; border:1px solid<?php echo $forminputbordercolor;?>;
 }

/* Comments*/

.commentarea { clear:both; margin-top:25px; width:500px; padding:20px 0px; }
.commentareain h2,.commentareain h3 {margin-bottom:10px;}
.commentlist {  }

.commentlist li { margin:0; padding: 18px 15px 10px 15px; }
#commentform small { font-weight:normal; padding:0; }
.commentmetadata { display: block; }
.commentlist small { font-size:x-small; }

.commentlist cite { font-size:12px; font-weight:bold; }

.cancel-comment-reply { font-size:12px; font-weight:bold; }

.commentlist ul li, .comments ol li { list-style:none;}

.commentlist p { margin:15px 0px 15px 0px; }

.commentlist li.even {  margin-right:10px; }

.commentlist li.alt {   margin-right:10px; }
.commentlist li.odd { padding-top:10px; }

.commentlist li img { float:left; margin-right:5px;border:none;}

.commentlist li.even { padding:5px;background:<?php echo $commentlistevenbackgroundcolor;?>;color:<?php echo $commentlistevenfontcolor;?>; }
.commentlist li.alt { padding:5px;background:<?php echo $commentlistoddbackgroundcolor;?>;color:<?php echo $commentlistoddfontcolor;?>; }
.commentlist li.odd { padding:5px;background:<?php echo $commentlistoddbackgroundcolor;?>;color:<?php echo $commentlistoddfontcolor;?>; }


/* Footer*/

#footer { margin:5px auto 10px auto; width:990px; padding:10px; clear:both; }
#footer .tools { float:right; margin-right:30px; }
#footer .tools ul { list-style: none; margin-right:30px; margin-top:0px; }
#footer .tools ul li { float: left; display: block; padding-left:20px; }
#footer .tools ul li a { float: left; display: block; }
#footer .tools ul li a: hover { text-decoration:underline;}

#footer {
background-color:<?php echo $footerbackgroundcolor; ?>;
<?php if( isset($footerbackgroundimageurl) && !empty($footerbackgroundimageurl) && ($footerbackgroundimageurl != 'none')){?>background-image:url(<?php echo $footerbackgroundimageurl; ?>);background-repeat:<?php echo $footerbackgroundimagerepeat;?>;<?php } ?><?php if( isset($footerbackgroundimageheight) && !empty($footerbackgroundimageheight)){ ?>height:<?php echo ($footerbackgroundimageheight - 20); ?>px;<?php } ?>
color:<?php echo $footerfontcolor; ?>;
font-size:<?php echo $footerfontsize; ?>;
font-weight:<?php echo $footerfontweight; ?>;
}

#footer a {color:<?php echo $footerfontcolor; ?>;}



.clear {clear: both;}
.ratingblock,.ratingmulti { clear:both; }

