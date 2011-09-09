<?php
if(preg_match('#' . basename(__FILE__) . '#', $_SERVER['PHP_SELF'])) { die('You are not allowed to call this page directly.'); }


// Handle CSS Styling Tool Options


// VARIABLES


$PageBodyCSSSettings=__("Page Body CSS Settings","Antisnews","Antisnews");
$DateSearchRowCSSSettings=__("Date Search Row CSS Settings","Antisnews");
$LogoTaglineRowCSSSettings=__("Site title/Tagline Row CSS Settings","Antisnews");
$TaglineCSSSettings=__("Tagline CSS Settings","Antisnews");
$HorizontalNavigationMenuCSSSettings=__("Horizontal Navigation Menu CSS Settings","Antisnews");
$LeaderboardAdRowCSSSettings=__("Leaderboard Ad Row CSS Settings","Antisnews");
$FooterCSSSettings=__("Footer CSS Settings","Antisnews");
$sop=__("Select Option","Antisnews");

$loadcolorpickertext=__("Load Color Picker","Antisnews");

$bgimgrepeat=array('No Repeat','Repeat X-axis','Repeat Y-axis','Repeat All');
$textdecops=array('none','underline');
$textstyle=array('normal','italic','oblique');
$texttransform=array('none','uppercase','lowercase','capitalize');
$borderpositionoptions=array('no border','full','left','right','top','bottom','top-bottom','left-right','top-left','top-right','bottom-left','bottom-right','left-right-top','left-right-bottom');
$borderradiusops=array('3','4','5','6','7','8');
$backgroundorborderops=array("neither","border","background","both");
$bulletstyleops=array("disc","square","circle","none");

$bodystyle1=__("Page Background Color.","Antisnews");
$bodystyle1a=__("The background color for your website pages.  Hex value only. Example #000000. For no background color enter the word [none] without brackets.","Antisnews");
$bodystyle2=__("Page Background Image","Antisnews");
$bodystyle2a=__("Full location of background image if using an image as background for your website pages.  Include http://.","Antisnews");
$bodystyle3=__("Background Image Repeat Status","Antisnews");
$bodystyle3a=__("If using image as background for your pages select image repeat status.","Antisnews");
$bodystyle3b=__("Background Image top/bottom align","Antisnews");
$bodystyle3c=__("If using image as background for your pages select the top/bottom alignment if needed.","Antisnews");
$bodystyle3d=__("Background Image left/right/center align","Antisnews");
$bodystyle3e=__("If using image as background for your pages select the left/right/center alignment if needed.","Antisnews");
$bodystyle3f=__("Background Attachment","Antisnews");
$bodystyle3g=__("If using image as background for your pages select the background attachment setting if needed.","Antisnews");
$bodystyle4=__("Main font color.","Antisnews");
$bodystyle4a=__("The font color for your website pages.  Must be visible on page background color. Hex value only. Example #000000. For no background color enter the word [none] without brackets.","Antisnews");
$bodystyle5=__("Main font size.","Antisnews");
$bodystyle5a=__("The font size for your website pages.  Include numerical value and font type. Example 10px, 10pt, 1.1em, 75%. ","Antisnews");
$bodystyle6=__("First Font Style.","Antisnews");
$bodystyle6a=__("The font you want to use as your main font. Example: Arial ","Antisnews");
$bodystyle7=__("Second Font Style.","Antisnews");
$bodystyle7a=__("The font you want to use as your first backup in case user does not have main font installed. Example: Tahoma ","Antisnews");
$bodystyle8=__("Third Font Style.","Antisnews");
$bodystyle8a=__("The font you want to use as your second backup in case user does not have main or first backup font installed. Example: Verdana ","Antisnews");
$bodystyle9=__("Fourth Font Style.","Antisnews");
$bodystyle9a=__("The font you want to use as your third backup in case user does not have main, first or second backup font installed. Example: Georgia ","Antisnews");
$bodystyle10=__("Main link color","Antisnews");
$bodystyle10a=__("The font you want to use for all standard links that do not have their own class definitions. Hex value only. Example #0000ff.","Antisnews");
$bodystyle11=__("Main link hover color.","Antisnews");
$bodystyle11a=__("The font you want to use for all standard links when mouse hovers over link. Hex value only. Example #0000ff.","Antisnews");
$bodystyle12=__("Main link visited color.","Antisnews");
$bodystyle12a=__("The font you want to use for all standard links that have already been visited. Hex value only. Example #0000ff.","Antisnews");
$bodystyle13=__("Link text decoration.","Antisnews");
$bodystyle13a=__("Select underline to use underlined links or none to remove underline from links ","Antisnews");


$datesearchrow1=__("Date/Search row background color","Antisnews");
$datesearchrow1a=__("This is the section with the date and search box. Hex value only. Example #000000. For no background color enter the word [none] without brackets.","Antisnews");
$datesearchrow1b=__("Date/Search row background image","Antisnews");
$datesearchrow1c=__("Full location of background image if using an image as background for the Date/Search row.  Include http://.","Antisnews");
$datesearchrow1d=__("Date/Search row background Image Repeat Status","Antisnews");
$datesearchrow1e=__("If using image as background for Date/Search row select image repeat status.","Antisnews");
$datesearchrow1f=__("Row height/Background Image Height","Antisnews");
$datesearchrow1g=__("Height for Date/Search row or Date/Search background image if using image for the Date/Search row. Example 150,200","Antisnews");
$datesearchrow2=__("Date font color","Antisnews");
$datesearchrow2a=__("The color for the date shown in the Date/Search row. Hex value only. Example #ffffff.","Antisnews");
$datesearchrow3=__("Date font size","Antisnews");
$datesearchrow3a=__("The font size for the date shown in the Date/Search row. Example 12px, 12pt, .5em, 80%. ","Antisnews");
$datesearchrow3b=__("Date font weight","Antisnews");
$datesearchrow3c=__("The font weight for the date shown in the Date/Search row. Example normal,bold,200%. ","Antisnews");
$datesearchrow4=__("Date text transform","Antisnews");
$datesearchrow4a=__("Select uppercase, lowercase etc","Antisnews");
$datesearchrow5=__("Date/Search row top margin","Antisnews");
$datesearchrow5a=__("If you need to adjust the top margin for the search box enter the new value. Example 10,15,20","Antisnews");

$logosloganrow1=__("Background Color for title/tagline row","Antisnews");
$logosloganrow1a=__("This is the section containing logo and tagline. Hex value only. Example #000000.For no background color enter the word [none] without brackets.","Antisnews");
$logosloganrow2=__("Background Image for title/tagline row","Antisnews");
$logosloganrow2a=__("If using a background image for the title/tagline row enter full url to image.","Antisnews");
$logosloganrow3=__("Background Image Repeat Status","Antisnews");
$logosloganrow3a=__("If using background image for the title/tagline row select image repeat status.","Antisnews");
$logosloganrow4=__("Background Image Height/Row height","Antisnews");
$logosloganrow4a=__("Height for background image if using image for the title/tagline row. Example 150,200","Antisnews");
$logosloganrow5=__("Site title top margin","Antisnews");
$logosloganrow5a=__("Top margin defaults to 20 pixels. If you want to move the top blog name and tagline row closer to the top of the page enter your preferred top margin. Enter the word [none] to remove the top margin altogether.","Antisnews");

$logosloganrow6=__("Title H1 color","Antisnews");
$logosloganrow6a=__("Font color to use for the site title H1 text. Hex value only. Example #ffffff.","Antisnews");
$logosloganrow7=__("Title H1 hover color","Antisnews");
$logosloganrow7a=__("Font color to use for the site title H1 text when mouse hovers over H1 header title. Hex value only. Example #ffffff.","Antisnews");
$logosloganrow8=__("Top padding for title/tagline row","Antisnews");
$logosloganrow8a=__("If you need more space above the site title enter padding value. Example 10,15,20.","Antisnews");
$logosloganrow9=__("Title H1 header text transform style","Antisnews");
$logosloganrow9a=__("Select uppercase, lowercase or none","Antisnews");
$logosloganrow10=__("Title H1 header font size","Antisnews");
$logosloganrow10a=__("The font size for your website title.  Include numerical value and font type. Example 20px, 20pt, 1.9em, 150%.","Antisnews");
$logosloganrow11=__("Turn on/off logo title text shadow.","Antisnews");
$logosloganrow11a=__("If you want/do not want to use a shadow behind the site title turn on/off depending on preference.","Antisnews");
$logosloganrow12=__("Site title text shadow color","Antisnews");
$logosloganrow12a=__("If using a shadow behind site title set the shadow color. Hex value only. Example #000000.","Antisnews");


$logosloganrowtagline1=__("Tagline font color","Antisnews");
$logosloganrowtagline1a=__("Font color to use for site tagline. Hex value only. Example #ffffff.","Antisnews");
$logosloganrowtagline2=__("Tagline text transformation","Antisnews");
$logosloganrowtagline2a=__("Select uppercase, lowercase or none","Antisnews");
$logosloganrowtagline3=__("Tagline font style","Antisnews");
$logosloganrowtagline3a=__("Select italic,normal or oblique","Antisnews");
$logosloganrowtagline3b=__("Tagline font weight","Antisnews");
$logosloganrowtagline3c=__("The font weight for nav menu links.  Examples bold,normal,500%.","Antisnews");
$logosloganrowtagline4=__("Tagline top padding","Antisnews");
$logosloganrowtagline4a=__("If you need more space above the tagline enter padding value. Example 10,15,20.","Antisnews");
$logosloganrowtagline4b=__("Tagline left padding","Antisnews");
$logosloganrowtagline4c=__("If you need more space on the left edge of the tagline enter padding value. Example 10,15,20.","Antisnews");
$logosloganrowtagline5=__("Tagline font size");
$logosloganrowtagline5a=__("The tagline font size. Include numerical value and font type. Example 10px, 10pt, 1.1em, 75%.");


$horizontalmenu1a=__("Background Color for navigation bar","Antisnews");
$horizontalmenu1b=__("The background color for the naviation bar. For no background color enter the word [none] without brackets.","Antisnews");
$horizontalmenu2a=__("Background Image for navigation bar","Antisnews");
$horizontalmenu2b=__("If using a background image behind navigation bar put full url to image.","Antisnews");
$horizontalmenu3a=__("Background Image Repeat Status","Antisnews");
$horizontalmenu3b=__("If using background image behind navigation bar select image repeat status.","Antisnews");
$horizontalmenu4a=__("Color For horizontal menu links","Antisnews");
$horizontalmenu4b=__("Font color to use for horizontal menu links. Hex value only. Example #000000.","Antisnews");
$horizontalmenu5a=__("Nav menu in-focus background","Antisnews");
$horizontalmenu5b=__("The background color for the in-focus menu list item. Hex value only. Example #000000.","Antisnews");
$horizontalmenu6a=__("Nav menu in-focus link color","Antisnews");
$horizontalmenu6b=__("The link color for the in-focus menu list item. Hex value only. Example #ffffff.","Antisnews");
$horizontalmenu7a=__("Drop-down nav menu in-focus background color","Antisnews");
$horizontalmenu7b=__("The background color for the in-focus drop-down menu list item. Hex value only. Example #ffffff.","Antisnews");
$horizontalmenu8a=__("Drop-down nav menu in-focus link color","Antisnews");
$horizontalmenu8b=__("The link color for the in-focus drop down menu list item. Hex value only. Example #ffffff.","Antisnews");
$horizontalmenu9a=__("Drop-down nav menu border color","Antisnews");
$horizontalmenu9b=__("The drop-down menu border color. Hex value only. Example #ffffff.","Antisnews");
$horizontalmenu10a=__("Navigation text transform","Antisnews");
$horizontalmenu10b=__("Select uppercase, lowercase or none","Antisnews");
$horizontalmenu11a=__("Navigation links font size","Antisnews");
$horizontalmenu11b=__("The font size for the navigation link text.  Include numerical value and font type. Example 10px, 10pt, .9em, 75%.","Antisnews");
$horizontalmenu12a=__("Navigation links font weight","Antisnews");
$horizontalmenu12b=__("The font weight for nav menu links.  Examples bold,normal,500%.","Antisnews");
$hmenubottomborder1a=__("Navigation bar bottom border","Antisnews");
$hmenubottomborder1b=__("Select off or on to hide or display a bottom border under the navigation menu","Antisnews");
$hmenubottomborder1c=__("Navigation bar bottom border style","Antisnews");
$hmenubottomborder1d=__("Select a style for the navigation bar bottom border","Antisnews");
$hmenubottomborder1e=__("Navigation bar bottom border width","Antisnews");
$hmenubottomborder1f=__("Select a width for the navigation bar bottom border","Antisnews");
$hmenubottomborder1g=__("Navigation bar bottom border color","Antisnews");
$hmenubottomborder1h=__("Select a color for the navigation bar bottom border","Antisnews");
$hmenuheight1a=__("Navigtion row height","Antisnews");
$hmenuheight1b=__("Adjust the height setting for the navigation row as needed","Antisnews");

$style4=__("Background Color for leaderboard row");
$style4a=__("The background color for the row containing leaderboard ad content.  Hex value only. Example #000000. For no background color enter the word [none] without brackets.");
$style4b=__("Font color for leaderboard row");
$style4c=__("The font color for leaderboard row text.  Hex value only. Example #000000.");
$style4d=__("Link color for leaderboard row");
$style4e=__("The link color for leaderboard row links.  Hex value only. Example #000000.");


$footerstyle=__("Background Color for footer");
$footerstylea=__("The background color for the page footer.  Hex value only. Example #000000. For no background color enter the word [none] without brackets.");
$footerstyleb=__("Font Color for text");
$footerstylec=__("The font color for the page footer text.  Hex value only. Example #000000. For no background color enter the word [none] without brackets.");
$footerstyled=__("Font size for footer text");
$footerstylee=__("The font size for the page footer text.  Include numerical value and font type. Example 10px, 10pt, .9em, 75%.");
$footerstylef=__("Font weight for footer text");
$footerstyleg=__("The font weight for the page footer text.  Examples bold,normal,500%.");
$footerstyleh=__("Footer row background image","Antisnews");
$footerstylei=__("Full location of background image if using an image as background for the footer row.  Include http://.","Antisnews");
$footerstylej=__("Footer row background Image Repeat Status","Antisnews");
$footerstylek=__("If using image as background for footer row select image repeat status.","Antisnews");
$footerstylel=__("Row height/Background Image Height","Antisnews");
$footerstylem=__("Height for footer row or background image if using image for the footer row. Example 150,200","Antisnews");


$breakingnewsa=__("Breaking News row background color");
$breakingnewsb=__("The background color for the breaking news row. Hex value only. Example #000000. Enter none if no background color.");
$breakingnewsc=__("Breaking News row background image");
$breakingnewsd=__("If using a background image for the breaking news row, enter the full URL to the image.");
$breakingnewse=__("Breaking News row background image height");
$breakingnewsf=__("If using a background image or if you need to force a height value for the featured category #8 content block. Numerical value only. Example 150, 375, 595");
$breakingnewsg=__("Breaking News row background image repeat");
$breakingnewsh=__("If using a background image for the breaking news row select the image repeat status.");
$breakingnewsi=__("Breaking News row font color");
$breakingnewsj=__("The font color for featured category #8. Hex value only. Example #000000");
$breakingnewsk=__("Breaking News row H2 font color");
$breakingnewsl=__("The color for H2 headings used in the breaking news row. Hex value only. Example #000000.");
$breakingnewsm=__("Breaking News row H2 hover font color");
$breakingnewsn=__("The hover font color for H2 headings used in the breaking news row. Hex value only. Example #000000.");
$breakingnewso=__("Breaking News row H2 font weight");
$breakingnewsp=__("The breaking news H2 font weight. Example normal, bold.");
$breakingnewsq=__("Breaking News row H2 font size");
$breakingnewsr=__("The breaking news H2 font size. Example 15px 14pt.");
$breakingnewss=__("H2 left padding","Antisnews");
$breakingnewst=__("Enter value if you need padding on the left of the breaking news headline text. Example 5, 10, 20, 100","Antisnews");
$breakingnewsu=__("H2 top padding","Antisnews");
$breakingnewsv=__("Enter value if you need padding above breaking news headline text. Example 5, 10, 20, 100","Antisnews");


$postareastylea=__("Post area H1 font color");
$postareastyleb=__("The font color for post area H1 headers. Hex value only. Example #000000.");
$postareastylec=__("Post area H2 background color");
$postareastyled=__("Hex value only. Example #000000. Enter none if no background color.");
$postareastylee=__("Post area H2 font color.");
$postareastylef=__("Hex value only. Example #000000.");
$postareastyleg=__("Post area H2 link hover color.");
$postareastyleh=__("Hex value only. Example #000000.");
$postareastylei=__("Post area H3 font color.");
$postareastylej=__("Hex value only. Example #000000. For no background color enter the word [none] without brackets.");
$postareastylek=__("Post area H3 link hover color.");
$postareastylel=__("Hex value only. Example #000000. For no background color enter the word [none] without brackets.");
$postareastylem=__("Rounded Corners");
$postareastylen=__("If you have a background color set for your H2 background color you can create rounded corners (limited browser compatibility)");
$postareastyleo=__("Rounded corners border radius");
$postareastylep=__("The higher the value the rounder the corners.");
$postareastyleq=__("H1 font size","Antisnews");
$postareastyler=__("Example 10px, 10pt, 1.1em, 75%","Antisnews");
$postareastyles=__("H1 font weight","Antisnews");
$postareastylet=__("Examples bold,normal,500%","Antisnews");
$postareastyleu=__("H2 font size","Antisnews");
$postareastylev=__("Example 10px, 10pt, 1.1em, 75%","Antisnews");
$postareastylew=__("H2 font weight","Antisnews");
$postareastylex=__("Examples bold,normal,500%","Antisnews");

$commentlistitem1a=__("Background color even comments","Antisnews");
$commentlistitem1b=__("Background color for even numbered comments in list","Antisnews");
$commentlistitem1c=__("Font color even comments","Antisnews");
$commentlistitem1d=__("Font color for even numbered comments in list","Antisnews");
$commentlistitem1cc=__("Link color even comments","Antisnews");
$commentlistitem1dd=__("Link color for even numbered comments in list","Antisnews");
$commentlistitem1ccc=__("Hover color even comments","Antisnews");
$commentlistitem1ddd=__("Link hover color for even numbered comments in list","Antisnews");
$commentlistitem1e=__("Background color odd comments","Antisnews");
$commentlistitem1f=__("Background color for odd numbered comments in list","Antisnews");
$commentlistitem1g=__("Font color odd comments","Antisnews");
$commentlistitem1h=__("Font color for odd numbered comments in list","Antisnews");
$commentlistitem1gg=__("Link color odd comments","Antisnews");
$commentlistitem1hh=__("Link color for odd numbered comments in list","Antisnews");
$commentlistitem1ggg=__("Hover color odd comments","Antisnews");
$commentlistitem1hhh=__("Link hover color for odd numbered comments in list","Antisnews");

$mytemplatebg=get_bloginfo('template_url').'/images/background.jpg';
$mytemplatedatesearch=get_bloginfo('template_url').'/images/datesearch.png';
$mytemplatefooter=get_bloginfo('template_url').'/images/footer.png';

$c12_premiumoptionsbody = array (

array("optionname" => "$PageBodyCSSSettings",
"optiontype" => "heading"),

array("optionname" => "$bodystyle1",
"optiondescription" => "<p>$bodystyle1a</p>",
"optionid" => $themeoptionsprefix."_color_background_body",
"selectoptiondef" => "#000000",
"optiontype" => "text"),

array("optionname" => "$bodystyle2",
"optiondescription" => "<p>$bodystyle2a</p>",
"optionid" => $themeoptionsprefix."_style_background_image_body",
"selectoptiondef" => "$mytemplatebg",
"optiontype" => "text"),

array("optionname" => "$bodystyle3",
"optiondescription" => "<p>$bodystyle3a</p>",
"optionid" => $themeoptionsprefix."_style_background_image_body_repeat",
"selectoptiondef" => "No Repeat",
"optiontype" => "select",
"options" => $bgimgrepeat),

array("optionname" => "$bodystyle3b",
"optiondescription" => "<p>$bodystyle3c</p>",
"optionid" => $themeoptionsprefix."_style_background_image_topbottom_body",
"selectoptiondef" => "",
"optiontype" => "select",
"options" => $topbottomops),

array("optionname" => "$bodystyle3d",
"optiondescription" => "<p>$bodystyle3e</p>",
"optionid" => $themeoptionsprefix."_style_background_image_leftrightcenter_body",
"selectoptiondef" => "",
"optiontype" => "select",
"options" => $leftrightcenterops),

array("optionname" => "$bodystyle3f",
"optiondescription" => "<p>$bodystyle3g</p>",
"optionid" => $themeoptionsprefix."_style_background_attachment_body",
"selectoptiondef" => "",
"optiontype" => "select",
"options" => $battachmentops),

array("optionname" => "$bodystyle4",
"optiondescription" => "<p>$bodystyle4a</p>",
"optionid" => $themeoptionsprefix."_color_fontcolor_body",
"selectoptiondef" => "#444444",
"optiontype" => "text"),

array("optionname" => "$bodystyle5",
"optiondescription" => "<p>$bodystyle5a</p>",
"optionid" => $themeoptionsprefix."_style_fontsize_body",
"selectoptiondef" => "75%",
"optiontype" => "text"),

array("optionname" => "$bodystyle6",
"optiondescription" => "<p>$bodystyle6a</p>",
"optionid" => $themeoptionsprefix."_style_fontfamily1_body",
"selectoptiondef" => "Verdana",
"optiontype" => "text"),

array("optionname" => "$bodystyle7",
"optiondescription" => "<p>$bodystyle7a</p>",
"optionid" => $themeoptionsprefix."_style_fontfamily2_body",
"selectoptiondef" => "Arial",
"optiontype" => "text"),

array("optionname" => "$bodystyle8",
"optiondescription" => "<p>$bodystyle8a</p>",
"optionid" => $themeoptionsprefix."_style_fontfamily3_body",
"selectoptiondef" => "Tahoma",
"optiontype" => "text"),

array("optionname" => "$bodystyle9",
"optiondescription" => "<p>$bodystyle9a</p>",
"optionid" => $themeoptionsprefix."_style_fontfamily4_body",
"selectoptiondef" => "Georgia",
"optiontype" => "text"),

array("optionname" => "$bodystyle10",
"optiondescription" => "<p>$bodystyle10a</p>",
"optionid" => $themeoptionsprefix."_color_alink_body",
"selectoptiondef" => "#5897A5",
"optiontype" => "text"),

array("optionname" => "$bodystyle11",
"optiondescription" => "<p>$bodystyle11a</p>",
"optionid" => $themeoptionsprefix."_color_alinkhover_body",
"selectoptiondef" => "#820D06",
"optiontype" => "text"),

array("optionname" => "$bodystyle12",
"optiondescription" => "<p>$bodystyle12a</p>",
"optionid" => $themeoptionsprefix."_color_alinkvisited_body",
"selectoptiondef" => "#5897A5",
"optiontype" => "text"),

array("optionname" => "$bodystyle13",
"optiondescription" => "<p>$bodystyle13a</p>",
"optionid" => $themeoptionsprefix."_style_alinkdecoration_body",
"selectoptiondef" => "none",
"optiontype" => "select",
"options" => $textdecops),

);


$c12_premiumoptionsdatesearch = array (

array("optionname" => "$DateSearchRowCSSSettings",
"optiontype" => "heading"),


array("optionname" => "$datesearchrow1",
"optiondescription" => "<p>$datesearchrow1a</p>",
"optionid" => $themeoptionsprefix."_color_background_datesearch",
"selectoptiondef" => "none",
"optiontype" => "text"),

array("optionname" => "$datesearchrow1b",
"optiondescription" => "<p>$datesearchrow1c</p>",
"optionid" => $themeoptionsprefix."_style_background_image_datesearch",
"selectoptiondef" => "$mytemplatedatesearch",
"optiontype" => "text"),


array("optionname" => "$datesearchrow1d",
"optiondescription" => "<p>$datesearchrow1e</p>",
"optionid" => $themeoptionsprefix."_style_background_image_repeat_datesearch",
"selectoptiondef" => "No Repeat",
"optiontype" => "select",
"options" => $bgimgrepeat),

array("optionname" => "$datesearchrow1f",
"optiondescription" => "<p>$datesearchrow1g</p>",
"optionid" => $themeoptionsprefix."_style_background_image_height_datesearch",
"selectoptiondef" => "40",
"optiontype" => "text"),

array("optionname" => "$datesearchrow2",
"optiondescription" => "<p>$datesearchrow2a</p>",
"optionid" => $themeoptionsprefix."_color_fontcolor_datesearch",
"selectoptiondef" => "#ffffff",
"optiontype" => "text"),

array("optionname" => "$datesearchrow3",
"optiondescription" => "<p>$datesearchrow3a</p>",
"optionid" => $themeoptionsprefix."_style_fontsize_datesearch",
"selectoptiondef" => "13px",
"optiontype" => "text"),

array("optionname" => "$datesearchrow3b",
"optiondescription" => "<p>$datesearchrow3c</p>",
"optionid" => $themeoptionsprefix."_style_fontweight_datesearch",
"selectoptiondef" => "bold",
"optiontype" => "text"),

array("optionname" => "$datesearchrow4",
"optiondescription" => "<p>$datesearchrow4a</p>",
"optionid" => $themeoptionsprefix."_style_fonttransform_datesearch",
"selectoptiondef" => "uppercase",
"optiontype" => "select",
"options" => $texttransform),

array("optionname" => "$datesearchrow5",
"optiondescription" => "<p>$datesearchrow5a</p>",
"optionid" => $themeoptionsprefix."_style_top_margin_searchform_datesearch",
"selectoptiondef" => "",
"optiontype" => "text"),


);


$c12_premiumoptionslogotaglinerow = array (

array("optionname" => "$LogoTaglineRowCSSSettings",
"optiontype" => "heading"),


array("optionname" => "$logosloganrow1",
"optiondescription" => "<p>$logosloganrow1a</p>",
"optionid" => $themeoptionsprefix."_color_background_logoslogan",
"selectoptiondef" => "none",
"optiontype" => "text"),

array("optionname" => "$logosloganrow2",
"optiondescription" => "<p>$logosloganrow2a</p>",
"optionid" => $themeoptionsprefix."_style_background_image_logoslogan",
"selectoptiondef" => "none",
"optiontype" => "text"),


array("optionname" => "$logosloganrow3",
"optiondescription" => "<p>$logosloganrow3a</p>",
"optionid" => $themeoptionsprefix."_style_background_image_repeat_logoslogan",
"selectoptiondef" => "Repeat All",
"optiontype" => "select",
"options" => $bgimgrepeat),

array("optionname" => "$logosloganrow4",
"optiondescription" => "<p>$logosloganrow4a</p>",
"optionid" => $themeoptionsprefix."_style_background_image_height_logoslogan",
"selectoptiondef" => "80",
"optiontype" => "text"),

array("optionname" => "$logosloganrow6",
"optiondescription" => "<p>$logosloganrow6a</p>",
"optionid" => $themeoptionsprefix."_color_colorh1title_logoslogan",
"selectoptiondef" => "#ffffff",
"optiontype" => "text"),

array("optionname" => "$logosloganrow7",
"optiondescription" => "<p>$logosloganrow7a</p>",
"optionid" => $themeoptionsprefix."_color_hovercolorh1title_logoslogan",
"selectoptiondef" => "#4DBAB1",
"optiontype" => "text"),

array("optionname" => "$logosloganrow8",
"optiondescription" => "<p>$logosloganrow8a</p>",
"optionid" => $themeoptionsprefix."_style_top_padding_title_logoslogan",
"selectoptiondef" => "20",
"optiontype" => "text"),

array("optionname" => "$logosloganrow9",
"optiondescription" => "<p>$logosloganrow9a</p>",
"optionid" => $themeoptionsprefix."_style_text_transform_titleh1_logoslogan",
"selectoptiondef" => "uppercase",
"optiontype" => "select",
"options" => $texttransform),

array("optionname" => "$logosloganrow10",
"optiondescription" => "<p>$logosloganrow10a</p>",
"optionid" => $themeoptionsprefix."_style_fontsize_titleh1_logoslogan",
"selectoptiondef" => "3.1em",
"optiontype" => "text"),

array("optionname" => "$logosloganrow11",
"optiondescription" => "<p>$logosloganrow11a</p>",
"optionid" => $themeoptionsprefix."_style_logo_title_text_shadow_logoslogan",
"selectoptiondef" => "on",
"optiontype" => "select",
"options" => $onoffopswithselect),

array("optionname" => "$logosloganrow12",
"optiondescription" => "<p>$logosloganrow12a</p>",
"optionid" => $themeoptionsprefix."_color_logo_title_text_shadow_logoslogan",
"selectoptiondef" => "#dddddd",
"optiontype" => "text"),

array("optionname" => "$logosloganrow5",
"optiondescription" => "<p>$logosloganrow5a</p>",
"optionid" => $themeoptionsprefix."_style_top_margin_logoslogan",
"selectoptiondef" => "20",
"optiontype" => "text"),

);

$c12_premiumoptionstagline = array (

array("optionname" => "$TaglineCSSSettings",
"optiontype" => "heading"),

array("optionname" => "$logosloganrowtagline1",
"optiondescription" => "<p>$logosloganrowtagline1a</p>",
"optionid" => $themeoptionsprefix."_color_text_color_tagline",
"selectoptiondef" => "#ffffff",
"optiontype" => "text"),

array("optionname" => "$logosloganrowtagline2",
"optiondescription" => "<p>$logosloganrowtagline2a</p>",
"optionid" => $themeoptionsprefix."_style_text_transform_tagline",
"selectoptiondef" => "capitalize",
"optiontype" => "select",
"options" => $texttransform),

array("optionname" => "$logosloganrowtagline3",
"optiondescription" => "<p>$logosloganrowtagline3a</p>",
"optionid" => $themeoptionsprefix."_style_text_style_tagline",
"selectoptiondef" => "normal",
"optiontype" => "select",
"options" => $textstyle),

array("optionname" => "$logosloganrowtagline3b",
"optiondescription" => "<p>$logosloganrowtagline3c</p>",
"optionid" => $themeoptionsprefix."_style_font_weight_tagline",
"selectoptiondef" => "normal",
"selectoptiondef" => "",
"optiontype" => "text"),

array("optionname" => "$logosloganrowtagline4",
"optiondescription" => "<p>$logosloganrowtagline4a</p>",
"optionid" => $themeoptionsprefix."_style_top_padding_tagline",
"selectoptiondef" => "35",
"optiontype" => "text"),

array("optionname" => "$logosloganrowtagline4b",
"optiondescription" => "<p>$logosloganrowtagline4c</p>",
"optionid" => $themeoptionsprefix."_style_left_padding_tagline",
"selectoptiondef" => "10",
"optiontype" => "text"),

array("optionname" => "$logosloganrowtagline5",
"optiondescription" => "<p>$logosloganrowtagline5a</p>",
"optionid" => $themeoptionsprefix."_style_fontsize_tagline",
"selectoptiondef" => "14px",
"optiontype" => "text"),

);


$c12_premiumoptionshorizontalmenu = array (

array("optionname" => "$HorizontalNavigationMenuCSSSettings",
"optiontype" => "heading"),

array("optionname" => "$horizontalmenu1a",
"optiondescription" => "<p>$horizontalmenu1b</p>",
"optionid" => $themeoptionsprefix."_color_background_hmenu",
"selectoptiondef" => "#f2f2f2",
"optiontype" => "text"),

array("optionname" => "$horizontalmenu2a",
"optiondescription" => "<p>$horizontalmenu2b</p>",
"optionid" => $themeoptionsprefix."_style_background_image_hmenu",
"selectoptiondef" => "none",
"optiontype" => "text"),

array("optionname" => "$horizontalmenu3a",
"optiondescription" => "<p>$horizontalmenu3b</p>",
"optionid" => $themeoptionsprefix."_style_background_image_repeat_hmenu",
"selectoptiondef" => "",
"optiontype" => "select",
"options" => $bgimgrepeat),

array("optionname" => "$horizontalmenu4a",
"optiondescription" => "<p>$horizontalmenu4b</p>",
"optionid" => $themeoptionsprefix."_color_colorlihmenu",
"selectoptiondef" => "#444444",
"optiontype" => "text"),

array("optionname" => "$horizontalmenu5a",
"optiondescription" => "<p>$horizontalmenu5b</p>",
"optionid" => $themeoptionsprefix."_color_licurrentpageitemhmenu",
"selectoptiondef" => "#8c8c8c",
"optiontype" => "text"),

array("optionname" => "$horizontalmenu6a",
"optiondescription" => "<p>$horizontalmenu6b</p>",
"optionid" => $themeoptionsprefix."_color_licurrentpageitemahmenu",
"selectoptiondef" => "#ffffff",
"optiontype" => "text"),

array("optionname" => "$horizontalmenu7a",
"optiondescription" => "<p>$horizontalmenu7b</p>",
"optionid" => $themeoptionsprefix."_color_licurrentpageitemlihmenu",
"selectoptiondef" => "#f2f2f2",
"optiontype" => "text"),

array("optionname" => "$horizontalmenu8a",
"optiondescription" => "<p>$horizontalmenu8b</p>",
"optionid" => $themeoptionsprefix."_color_licurrentpageitemliahmenu",
"selectoptiondef" => "#444444",
"optiontype" => "text"),


array("optionname" => "$horizontalmenu9a",
"optiondescription" => "<p>$horizontalmenu9b</p>",
"optionid" => $themeoptionsprefix."_color_hmenudropdownbordercolor",
"selectoptiondef" => "#dddddd",
"optiontype" => "text"),

array("optionname" => "$horizontalmenu10a",
"optiondescription" => "<p>$horizontalmenu10b</p>",
"optionid" => $themeoptionsprefix."_style_text_transform_hmenu",
"selectoptiondef" => "uppercase",
"optiontype" => "select",
"options" => $texttransform),

array("optionname" => "$horizontalmenu11a",
"optiondescription" => "<p>$horizontalmenu11b</p>",
"optionid" => $themeoptionsprefix."_style_fontsize_hmenu",
"selectoptiondef" => "10px",
"optiontype" => "text"),

array("optionname" => "$horizontalmenu12a",
"optiondescription" => "<p>$horizontalmenu12b</p>",
"optionid" => $themeoptionsprefix."_style_fontweight_hmenu",
"selectoptiondef" => "normal",
"optiontype" => "text"),

array("optionname" => "$hmenubottomborder1a",
"optiondescription" => "<p>$hmenubottomborder1b</p>",
"optionid" => $themeoptionsprefix."_style_bottom_border_hmenu",
"selectoptiondef" => "on",
"optiontype" => "select",
"options" => $onoffopswithselect),

array("optionname" => "$hmenubottomborder1c",
"optiondescription" => "<p>$hmenubottomborder1d</p>",
"optionid" => $themeoptionsprefix."_style_bottom_border_style_hmenu",
"selectoptiondef" => "double",
"optiontype" => "select",
"options" => $borderstyles),

array("optionname" => "$hmenubottomborder1e",
"optiondescription" => "<p>$hmenubottomborder1f</p>",
"optionid" => $themeoptionsprefix."_style_bottom_border_width_hmenu",
"selectoptiondef" => "4",
"optiontype" => "select",
"options" => $borderwidthops),

array("optionname" => "$hmenubottomborder1g",
"optiondescription" => "<p>$hmenubottomborder1h</p>",
"optionid" => $themeoptionsprefix."_style_bottom_border_color_hmenu",
"selectoptiondef" => "#dddddd",
"optiontype" => "text"),

array("optionname" => "$hmenuheight1a",
"optiondescription" => "<p>$hmenuheight1b</p>",
"optionid" => $themeoptionsprefix."_style_height_hmenu",
"selectoptiondef" => "35",
"optiontype" => "text"),

);

$c12_premiumoptionsleaderboardrow = array (

array("optionname" => "$LeaderboardAdRowCSSSettings",
"optiontype" => "heading"),

array("optionname" => "$style4",
"optiondescription" => "<p>$style4a</p>",
"optionid" => $themeoptionsprefix."_color_background_leaderboard",
"selectoptiondef" => "",
"optiontype" => "text"),

array("optionname" => "$style4b",
"optiondescription" => "<p>$style4c</p>",
"optionid" => $themeoptionsprefix."_color_fontcolor_leaderboard",
"selectoptiondef" => "",
"optiontype" => "text"),

array("optionname" => "$style4d",
"optiondescription" => "<p>$style4e</p>",
"optionid" => $themeoptionsprefix."_color_linkcolor_leaderboard",
"selectoptiondef" => "",
"optiontype" => "text"),

);

$c12_premiumoptionsfooter = array (

array("optionname" => "$FooterCSSSettings",
"optiontype" => "heading"),

array("optionname" => "$footerstyle",
"optiondescription" => "<p>$footerstylea</p>",
"optionid" => $themeoptionsprefix."_color_background_footer",
"selectoptiondef" => "none",
"optiontype" => "text"),

array("optionname" => "$footerstyleb",
"optiondescription" => "<p>$footerstylec</p>",
"optionid" => $themeoptionsprefix."_color_fontcolor_footer",
"selectoptiondef" => "",
"optiontype" => "text"),

array("optionname" => "$footerstyled",
"optiondescription" => "<p>$footerstylee</p>",
"optionid" => $themeoptionsprefix."_style_fontsize_footer",
"selectoptiondef" => "",
"optiontype" => "text"),

array("optionname" => "$footerstylef",
"optiondescription" => "<p>$footerstyleg</p>",
"optionid" => $themeoptionsprefix."_style_fontweight_footer",
"selectoptiondef" => "",
"optiontype" => "text"),

array("optionname" => "$footerstyleh",
"optiondescription" => "<p>$footerstylei</p>",
"optionid" => $themeoptionsprefix."_style_background_image_footer",
"selectoptiondef" => "$mytemplatefooter",
"optiontype" => "text"),


array("optionname" => "$footerstylej",
"optiondescription" => "<p>$footerstylek</p>",
"optionid" => $themeoptionsprefix."_style_background_image_repeat_footer",
"selectoptiondef" => "No Repeat",
"optiontype" => "select",
"options" => $bgimgrepeat),

array("optionname" => "$footerstylel",
"optiondescription" => "<p>$footerstylem</p>",
"optionid" => $themeoptionsprefix."_style_background_image_height_footer",
"selectoptiondef" => "40",
"optiontype" => "text"),

);

check_for_prem_options();
function check_for_prem_options()
{
	$AntisnewsOptions=get_antisnewsoptions();
	global $themeoptionsprefix;
	global $c12_premiumoptionsbody,$c12_premiumoptionslogotaglinerow,$c12_premiumoptionstagline,$c12_premiumoptionshorizontalmenu,$c12_premiumoptionsdatesearch,$c12_premiumoptionsleaderboardrow,$c12_premiumoptionsfooter;
		
	$mypremiumoptions=array_merge($c12_premiumoptionsbody,$c12_premiumoptionslogotaglinerow,$c12_premiumoptionstagline,$c12_premiumoptionshorizontalmenu,$c12_premiumoptionsdatesearch,$c12_premiumoptionsleaderboardrow,$c12_premiumoptionsfooter);
	$mypremoptions=$themeoptionsprefix.'_css_style_options';
	$mysavedpremoptions=get_option($mypremoptions);
		
		$options = $mysavedpremoptions;			
	
		if (!isset($options) || empty($options) || !is_array($options)) 
		{			
			$options = $mypremiumoptions;

			foreach ($options as $optionvalue)
			{			
				if(!isset($optionvalue['optionid']) || empty($optionvalue['optionid']))
				{
					$optionvalue['optionid']='';
				}
				if(!isset($optionvalue['options']) || empty($optionvalue['options']))
				{
					$optionvalue['options']='';
				}
				if(!isset($optionvalue['optiondescription']) || empty($optionvalue['optiondescription']))
				{
					$optionvalue['optiondescription']='';
				}
				if(!isset($optionvalue['selectoptiondef']) || empty($optionvalue['selectoptiondef']))
				{
					$optionvalue['selectoptiondef']='';
				}				
				
					if(isset($optionvalue['optionid']) && !empty($optionvalue['optionid']))
					{					
						$savedoptionvalue=get_option($optionvalue['optionid']);	
					}					
					if(!isset($savedoptionvalue) || empty ($savedoptionvalue))
					{
						$savedoptionvalue=$optionvalue['selectoptiondef'];
					}


					$setmyoptions[]=array("optionname" => $optionvalue['optionname'],
					"optiondescription" => $optionvalue['optiondescription'],
					"optionid" => $optionvalue['optionid'],
					"selectoptiondef" => $savedoptionvalue,
					"optiontype" => $optionvalue['optiontype'],
					"options" => $optionvalue['options']);						
					

				if(isset($optionvalue['optionid']) && !empty($optionvalue['optionid']))
				{				
					delete_option($optionvalue['optionid']);
				}
			}
			
			update_option($mypremoptions,$setmyoptions);
		}
}

function antisnews_reconcile_css_options()
{
	$AntisnewsOptions=get_antisnewsoptions();
	$setmypremoptions=array();
	global $themeoptionsprefix;
	global $c12_premiumoptionsbody,$c12_premiumoptionslogotaglinerow,$c12_premiumoptionstagline,$c12_premiumoptionshorizontalmenu,$c12_premiumoptionsdatesearch,$c12_premiumoptionsleaderboardrow,$c12_premiumoptionsfooter;
		
	$mypremiumoptions=array_merge($c12_premiumoptionsbody,$c12_premiumoptionslogotaglinerow,$c12_premiumoptionstagline,$c12_premiumoptionshorizontalmenu,$c12_premiumoptionsdatesearch,$c12_premiumoptionsleaderboardrow,$c12_premiumoptionsfooter);
	$mypremoptions=$themeoptionsprefix.'_css_style_options';


				foreach ($mypremiumoptions as $mypremoptionvalue)
				{	
				
					if(!isset($mypremoptionvalue['optionid']) || empty($mypremoptionvalue['optionid']))
					{
						$mypremoptionvalue['optionid']='';
					}
					if(!isset($mypremoptionvalue['options']) || empty($mypremoptionvalue['options']))
					{
						$mypremoptionvalue['options']='';
					}
					if(!isset($mypremoptionvalue['optiondescription']) || empty($mypremoptionvalue['optiondescription']))
					{
						$mypremoptionvalue['optiondescription']='';
					}
					if(!isset($mypremoptionvalue['selectoptiondef']) || empty($mypremoptionvalue['selectoptiondef']))
					{
						$mypremoptionvalue['selectoptiondef']='';
					}
				
				
					
					if(isset($AntisnewsOptions[$mypremoptionvalue['optionid']]) && !empty($AntisnewsOptions[$mypremoptionvalue['optionid']]))
					{
						$savedpremoptionvalue=$AntisnewsOptions[$mypremoptionvalue['optionid']];
					}
					elseif(isset($mypremoptionvalue['selectoptiondef']) && !empty($mypremoptionvalue['selectoptiondef']))
					{
						$savedpremoptionvalue=$mypremoptionvalue['selectoptiondef'];
					}
					else
					{
						$savedpremoptionvalue='';
					}					
					
					$setmypremoptions[]=array("optionname" => $mypremoptionvalue['optionname'],
					"optiondescription" => $mypremoptionvalue['optiondescription'],
					"optionid" => $mypremoptionvalue['optionid'],
					"selectoptiondef" => $savedpremoptionvalue,
					"optiontype" => $mypremoptionvalue['optiontype'],
					"options" => $mypremoptionvalue['options']);					
				}

			
			update_option($mypremoptions,$setmypremoptions);
		
}		

function do_canvas_premium_options_update_theme()
{
	global $themeoptionsprefix,$this_theme,$optionsupdated,$optionsreset;
	global $c12_premiumoptionsbody,$c12_premiumoptionslogotaglinerow,$c12_premiumoptionstagline,$c12_premiumoptionshorizontalmenu,$c12_premiumoptionsdatesearch,$c12_premiumoptionsleaderboardrow,$c12_premiumoptionsfooter;

		$myantiscssoptions=array_merge($c12_premiumoptionsbody,$c12_premiumoptionslogotaglinerow,$c12_premiumoptionstagline,$c12_premiumoptionshorizontalmenu,$c12_premiumoptionsdatesearch,$c12_premiumoptionsleaderboardrow,$c12_premiumoptionsfooter);
		$myantiscssoptionname=$themeoptionsprefix.'_css_style_options';
		$myantiscssoptionsaved=get_myoptionsarray($myantiscssoptions);
		if (!isset($myantiscssoptionsaved) || empty($myantiscssoptionsaved) || !is_array($myantiscssoptionsaved)) 
		{			
			$myantiscssoptionsforupdate = $myantiscssoptions;	
		}
		else
		{
			$myantiscssoptionsforupdate = $myantiscssoptionsaved;
		}		

	if ( isset($_REQUEST['page']) && ($_REQUEST['page'] == basename(__FILE__) ) ) 
	{
		if( isset($_REQUEST['action']) && ( 'updateoptions' == $_REQUEST['action'] ))
		{			
			
			foreach ($myantiscssoptionsforupdate as $optionvalue)
			{	
			
				if(isset($optionvalue['optionid']) && !empty($optionvalue['optionid']))
				{
					if( isset( $_REQUEST[ $optionvalue['optionid'] ] ) )
					{				
						$myantiscssoptionvalue = $_REQUEST[ $optionvalue['optionid'] ];
					}
					else
					{
						$myantiscssoptionvalue=$optionvalue['selectoptiondef'];
					}
				}
				
				$mypoptions[]=array("optionname" => $optionvalue['optionname'],
				"optiondescription" => $optionvalue['optiondescription'],
				"optionid" => $optionvalue['optionid'],
				"selectoptiondef" => $myantiscssoptionvalue,
				"optiontype" => $optionvalue['optiontype'],
				"options" => $optionvalue['options']);				

			}			
			
				update_option($myantiscssoptionname,$mypoptions);
				$optionsupdated=true;	

		}
		else if( isset($_REQUEST['action']) && ( 'reset' == $_REQUEST['action'] ))
		{
			if(isset($_REQUEST['w']) && !empty($_REQUEST['w']))
			{ 
				$whichoptions=$_REQUEST['w'];
			}
		
			if($whichoptions == 1)
			{ 
				$c12_premiumoptions=$c12_premiumoptionsbody;
			}
			elseif($whichoptions == 2)
			{
				$c12_premiumoptions=$c12_premiumoptionslogotaglinerow;
			}			
			elseif($whichoptions == 3)
			{
				$c12_premiumoptions=$c12_premiumoptionstagline;
			}
			elseif($whichoptions == 4)
			{
				$c12_premiumoptions=$c12_premiumoptionshorizontalmenu;
			}			
			elseif($whichoptions == 5)
			{
				$c12_premiumoptions=$c12_premiumoptionsdatesearch;
			}
			elseif($whichoptions == 6)
			{
				$c12_premiumoptions=$c12_premiumoptionsleaderboardrow;
			}			
			elseif($whichoptions == 17)
			{
				$c12_premiumoptions=$c12_premiumoptionsfooter;
			}
			elseif($whichoptions == 'all')
			{
				$c12_premiumoptions=$myantiscssoptions;
			}

		
			foreach ($c12_premiumoptions as $c12_premiumoption)
			{
				if(isset($c12_premiumoption['optionid']) && !empty($c12_premiumoption['optionid']))
				{			
					$myantiscssoptionidsfordel[]=$c12_premiumoption['optionid'];
				}
			}
			
			
			foreach ($myantiscssoptionsforupdate as $optionvalue)
			{
			
			
				if(in_array($optionvalue['optionid'],$myantiscssoptionidsfordel))
				{
					$myantiscssoptiondelvalue = get_def_opt_val($c12_premiumoptions,$optionvalue['optionid']);
					if(!isset($myantiscssoptiondelvalue) || empty($myantiscssoptiondelvalue))
					{
						$myantiscssoptiondelvalue="";
					}
					
					$myantiscssoptionvalue = "$myantiscssoptiondelvalue";
				}
				else
				{
					$myantiscssoptionvalue=$optionvalue['selectoptiondef'];
				}
				
				$mypoptions[]=array("optionname" => $optionvalue['optionname'],
				"optiondescription" => $optionvalue['optiondescription'],
				"optionid" => $optionvalue['optionid'],
				"selectoptiondef" => $myantiscssoptionvalue,
				"optiontype" => $optionvalue['optiontype'],
				"options" => $optionvalue['options']);		

			}			
			
				update_option($myantiscssoptionname,$mypoptions);
				$optionsreset=true;
		}

	}

	add_theme_page($this_theme." CSS Styling Tool", $this_theme." CSS Styling Tool", 'edit_themes', basename(__FILE__), 'do_canvas_premium_page_opsmenu_Antisnews', '');

}

function do_canvas_premium_page_opsmenu_Antisnews()
{
		global $themeoptionsprefix, $optionsreset,$optionsupdated,$this_theme;
		global $PageBodyCSSSettings,$DateSearchRowCSSSettings,$LogoTaglineRowCSSSettings,$TaglineCSSSettings,$HorizontalNavigationMenuCSSSettings,$LeaderboardAdRowCSSSettings,$FooterCSSSettings;
		global $c12_premiumoptionsbody,$c12_premiumoptionslogotaglinerow,$c12_premiumoptionstagline,$c12_premiumoptionshorizontalmenu,$c12_premiumoptionsdatesearch,$c12_premiumoptionsleaderboardrow,$c12_premiumoptionsfooter;
		$myantiscssmergedoptions=array_merge($c12_premiumoptionsbody,$c12_premiumoptionslogotaglinerow,$c12_premiumoptionstagline,$c12_premiumoptionshorizontalmenu,$c12_premiumoptionsdatesearch,$c12_premiumoptionsleaderboardrow,$c12_premiumoptionsfooter);

		
		if(isset($_REQUEST['action']) && !empty($_REQUEST['action']) && ($_REQUEST['action'] == 'loadoptionsform'))
		{ 
			if(isset($_REQUEST['prodoptions']) && !empty($_REQUEST['prodoptions']))
			{ 
				$whichoptions=$_REQUEST['prodoptions'];

				if($whichoptions == 1)
				{ 
					$c12_premiumoptions=$c12_premiumoptionsbody;
				}
				elseif($whichoptions == 2)
				{
					$c12_premiumoptions=$c12_premiumoptionslogotaglinerow;
				}			
				elseif($whichoptions == 3)
				{
					$c12_premiumoptions=$c12_premiumoptionstagline;
				}
				elseif($whichoptions == 4)
				{
					$c12_premiumoptions=$c12_premiumoptionshorizontalmenu;
				}			
				elseif($whichoptions == 5)
				{
					$c12_premiumoptions=$c12_premiumoptionsdatesearch;
				}
				elseif($whichoptions == 6)
				{
					$c12_premiumoptions=$c12_premiumoptionsleaderboardrow;
				}			
				elseif($whichoptions == 17)
				{
					$c12_premiumoptions=$c12_premiumoptionsfooter;
				}

			}
			else
			{
				$c12_premiumoptions=$myantiscssmergedoptions;
			}

			do_canvas_premium_page_Antisnews($c12_premiumoptions,$whichoptions);
		}

		else 
		{
			antisnews_reconcile_css_options();
?>

<div class="wrap">

	<h2><?php _e(" Antisnews CSS Styling Tool","Antisnews"); ?></h2>
	<?php _e("Need to reset all your CSS Styling Tool Settings in one click? Clicking the reset all link will reset all the CSS Styling Tool Options to the default settings. If you only want to reset the options for one set click the manage options button and use the reset link on that specific page. ","Antisnews");?>
	<p><a href="?page=antisnews_css_styling_tool.php&action=reset&w=all"><?php _e("Reset All CSS Styling Tool Options","Antisnews");?></a></p>
	<?php if ( $optionsupdated ) {?><div id="message" class="updated fade"><?php _e("The options have been saved","Antisnews"); ?></div><?php } elseif ( $optionsreset ) {?><div id="message" class="updated fade"><?php _e("The options have been reset","Antisnews");?></div><?php } ?>
	
		<table class="widefat" cellspacing="0">
		<thead>
		<tr>
		<th scope="col" class="manage-column">
		CSS Setting Title
		</th>
		<th scope="col" class="manage-column">
		Manage Options
		</th>
		</tr>
		</thead>
		<tfoot>
		<tr>

		<th scope="col" class="manage-column">
		CSS Setting Title
		</th>
		<th scope="col" class="manage-column">
		Manage Options
		</th>
		</tr>
		</tfoot>
		<tbody>
		<td><?php echo $PageBodyCSSSettings; ?></td>
		<td><form method="post"><input type="hidden" name="action" value="loadoptionsform"><input type="hidden" name="prodoptions" value="1"><input type="submit" class="button" value="Manage Options"></form></td>
		</tr>
		<tr>
		<td><?php echo $LogoTaglineRowCSSSettings; ?></td>
		<td><form method="post"><input type="hidden" name="action" value="loadoptionsform"><input type="hidden" name="prodoptions" value="2"><input type="submit" class="button" value="Manage Options"></form></td>
		</tr>
		<tr>
		<td><?php echo $TaglineCSSSettings; ?></td>
		<td><form method="post"><input type="hidden" name="action" value="loadoptionsform"><input type="hidden" name="prodoptions" value="3"><input type="submit" class="button" value="Manage Options"></form></td>
		</tr>
		<tr>
		<td><?php echo $HorizontalNavigationMenuCSSSettings; ?></td>
		<td><form method="post"><input type="hidden" name="action" value="loadoptionsform"><input type="hidden" name="prodoptions" value="4"><input type="submit" class="button" value="Manage Options"></form></td>
		</tr>
		<tr>
		<td><?php echo $DateSearchRowCSSSettings; ?></td>
		<td><form method="post"><input type="hidden" name="action" value="loadoptionsform"><input type="hidden" name="prodoptions" value="5"><input type="submit" class="button" value="Manage Options"></form></td>
		</tr>
		<tr>
		<td><?php echo $LeaderboardAdRowCSSSettings; ?></td>
		<td><form method="post"><input type="hidden" name="action" value="loadoptionsform"><input type="hidden" name="prodoptions" value="6"><input type="submit" class="button" value="Manage Options"></form></td>
		</tr>
		<tr>
		<td><?php echo $FooterCSSSettings; ?></td>
		<td><form method="post"><input type="hidden" name="action" value="loadoptionsform"><input type="hidden" name="prodoptions" value="17"><input type="submit" class="button" value="Manage Options"></form></td>
		</tr>
		</tbody></table>


</div>	
<?php 
}
}

function do_canvas_premium_page_Antisnews ($c12_premiumoptions,$prodoptions)
{
	

	global	$c12_premiumoptionsbody,$this_theme;
	
	if(!isset($c12_premiumoptions) || empty($c12_premiumoptions))
	{
		$c12_premiumoptions=$c12_premiumoptionsbody;
	}
	
	$premoptions = get_myoptionsarray($c12_premiumoptions);

	if(!isset($premoptions) || empty($premoptions))
	{
		$premoptions=$c12_premiumoptions;
	}
	
?>


<div class="wrap">


    <form method="post">
	<h2><?php  _e(" Antisnews CSS Styling Tool","Antisnews"); ?></h2>

	<?php if(isset($_REQUEST['optionsupdated']) && !empty( $_REQUEST['optionsupdated'] ) ){  _e("Settings saved","Antisnews");  } ?>
<?php _e("Need to clear your settings and start over? All current settings on this page will be lost ","Antisnews"); ?>
<a href="?page=antisnews_css_styling_tool.php&action=reset&w=<?php echo $prodoptions;?>">Reset Styling Tool Options</a>

	<table>

<?php

	global $has_Antisnews_CSS_Styling_Tool,$loadcolorpickertext;
	$c12_colorpicker_code='';

		foreach ($premoptions as $optionvalue)
		{
			if(isset($optionvalue['optionid']) && !empty($optionvalue['optionid']))
			{
				$thec12opid=$optionvalue['optionid'];
			}
			
			$c12colorstr="_color_";

			if ( $optionvalue['optiontype'] <> "heading" )
			{

?>
				<tr>
				<td valign="top" style="margin:0px 25px 30px 0px;background:#eeeeee;padding:10px;">
				<?php echo $optionvalue['optionname'];

				if($has_Antisnews_CSS_Styling_Tool==1)
				{
					if(strstr( $thec12opid, strtolower( $c12colorstr ) ) )
					{
						echo "<br/><input type=\"button\" value=\"$loadcolorpickertext\" onclick=\"showColorPicker(this,document.forms[0].$thec12opid)\">";

					}
				}
				?>
				</td>
				<td style="margin:0px 25px 30px 0px;background:#eeeeee;padding:10px;">
<?php
			}

				switch ( $optionvalue['optiontype'] )
				{
					case 'text':

?>
					<input name="<?php echo $optionvalue['optionid']; ?>" id="<?php echo $optionvalue['optionid']; ?>" type="<?php echo $optionvalue['optiontype']; ?>" value="<?php if ( get_option( $optionvalue['optionid'] ) != "") { echo get_option($optionvalue['optionid']); } else { echo $optionvalue['selectoptiondef']; } ?>" />

<?php

					break;
					case 'select':
?>
						<select name="<?php echo $optionvalue['optionid']; ?>" id="<?php echo $optionvalue['optionid']; ?>">
<?php

					foreach ($optionvalue['options'] as $option)
					{

?>
						<option<?php if ( get_option( $optionvalue['optionid'] ) == $option) { echo ' selected="selected"'; } elseif ($option == $optionvalue['selectoptiondef']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option>

<?php
					}

?>
						</select>

<?php
					break;
					case 'textarea':
					$textareainput = $optionvalue['options'];

?>
						<textarea name="<?php echo $optionvalue['optionid']; ?>" id="<?php echo $optionvalue['optionid']; ?>" cols="100" rows="8"><?php  if( get_option($optionvalue['optionid']) != "") { echo stripslashes(get_option($optionvalue['optionid'])); } else { echo $optionvalue['selectoptiondef']; } ?></textarea>
<?php

					break;
					case "heading":

?>
						</table>
   						<h3 class="title"><?php echo $optionvalue['optionname']; ?></h3>
						<table>

<?php

					break;
					default:
					break;

				}

?>

<?php

				if ( $optionvalue['optiontype'] <> "heading" )
				{

?>
					<span><?php echo $optionvalue['optiondescription']; ?></span>
					</td></tr>

<?php

				}

?>

<?php
			
		}			

?>
					</table>

					<p class="submit">
					<input name="updateoptions" type="submit" value="<?php _e("Update Options",'Antisnews');?>" />
					<input type="hidden" name="action" value="updateoptions" />
					<input type="hidden" name="prodoptions" value="<?php echo $prodoptions; ?>" />
					</p></form>
					</div>
<?php

}

			function add_cpicker_c12() {
				$url = get_bloginfo('template_directory');
				$dir = $url . '/includes/CPicker/';
				echo '<link rel="stylesheet" href="' . $dir .'js_color_picker_v2.css" type="text/css" />';
				echo '<script type="text/javascript" src="' . $dir .'js_color_picker_v2.js"></script>';
				echo '<script type="text/javascript" src="' . $dir .'color_functions.js"></script>';
			}

			if($has_Antisnews_CSS_Styling_Tool==1)
			{
				add_action('admin_head', 'add_cpicker_c12');
			}

add_action('admin_menu', 'do_canvas_premium_options_update_theme');

?>
