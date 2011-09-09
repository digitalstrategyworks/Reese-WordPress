<?php
load_theme_textdomain('Antisnews');
if( file_exists(TEMPLATEPATH.'/antisnews_css_styling_tool.php') )
{
	$has_Antisnews_CSS_Styling_Tool=1;
}

$this_theme = "Antisnews";
$themeoptionsprefix = "antisnews";
$options = array();
$sidebarpos=array('1','2');
$commentsonpage=array('yes','no');
$arrnumposts=array('4','5','6','7','8','9','10');
$numfeaturedarr=array('1','2','3','4','5','6','7','8','9','10');
$numfeaturedpostsarr=array('5','6','7','8','9','10');
$showhidearr=array('show','hide');
$hideshowarr=array('hide','show');
$activatedeactivate=array('deactivate','activate');
$sidebar2widgetspos=array('1','2');
$singlepageadsensepositions=array('left','right','above post title','below post title','between post content and post tags','above post comments');
$offonops=array('off','on');
$onoffops=array('on','off');
$textalignlc=array('left','center');
$onoffopswithselect=array('Select On or Off','on','off');
$borderstyles=array('solid','dotted','dashed','double','groove','ridge','inset','outset');
$borderwidthops=array('5','4','3','2','1');
$topbottomops=array('top','bottom');
$leftrightcenterops=array('left','right','center');
$battachmentops=array('Choose One','scroll','fixed');
$zoomcropops=array("0","1");
$operationmodeops=array("Tutorial","Live","Magazine Off");
$stylesheetmodeops=array("Choose One","Static","Dynamic");
$displayorder=array('DESC','ASC');
$pagesorcategoriesarr=array("pages","categories");
$thecatlist_A = get_categories('hide_empty=0');
$catdlist = array();
$excerptorfullops=array("excerpt","full");

foreach ($thecatlist_A as $catforlist)
{

$thecatname=$catforlist->cat_name;
$thecatname=str_replace("&amp;","&",$thecatname);
	$catdlist[$catforlist->cat_ID] = $thecatname;
}

$categories_tmp = array_unshift($catdlist, "Select a category:");



$pathtothemetemplate = get_bloginfo('template_directory');

$menuicoantisnews=TEMPLATEPATH . '/images/antisnewsico.png';

	$PageMetaSettings=__("Page Meta Settings","Antisnews");
	$GoogleAnalyticsSettings=__("Google Analytics Settings","Antisnews");
	$BlogNameTaglineSettings=__("Blog Name and Tagline Settings","Antisnews");
	$AdsSettings=__("Ads Settings","Antisnews");
	$MiscellaneousSidebarSettings=__("Miscellaneous Sidebar Settings","Antisnews");
	$StickyPostsSettings=__("Sticky Post Settings","Antisnews");
	$HorizontalNavigationMenuSettings=__("Horizontal Navigation Menu Settings","Antisnews");
	$FeaturedSliderSettings=__("Featured Category 1 Slider Settings","Antisnews");
	$FeaturedCategory2Options=__("Featured Category 2 Options","Antisnews");
	$CustomLatestPostsRecentCommentsSettings=__("Custom Latest Posts and Recent Comments Settings","Antisnews");
	$FeaturedCategory3Options=__("Featured Category 3 Options","Antisnews");
	$FeaturedCategory4Options=__("Featured Category 4 Options","Antisnews");
	$FeaturedCategory5Options=__("Featured Category 5 Options","Antisnews");
	$FeaturedCategory6Options=__("Featured Category 6 Options","Antisnews");
	$FeaturedCategory7Options=__("Featured Category 7 Options","Antisnews");
	$StandardThumbnailSettings=__("Standard Thumbnail Settings","Antisnews");
	$CommentFormSettings=__("Comment Form Settings","Antisnews");
	$StandardConfigurationOptions=__("Standard Configuration Options","Antisnews");

add_theme_support( 'post-thumbnails');

if( file_exists(TEMPLATEPATH.'/antisnews_css_styling_tool.php') )
{
	include (TEMPLATEPATH . '/antisnews_css_styling_tool.php');
}


if ( function_exists('register_sidebar') )
    register_sidebars(1,array(
    	'name'=>'Magazine Sidebar Home One',
        'before_widget' => '<div class="widget"><div class="widgetinside">',
        'after_widget' => '</div></div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));

    register_sidebars(1,array(
    	'name'=>'Magazine Sidebar Home Two',
        'before_widget' => '<div class="widget"><div class="widgetinside">',
        'after_widget' => '</div></div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));

    register_sidebars(1,array(
    	'name'=>'Magazine Sidebar Home Three',
        'before_widget' => '<div class="widget"><div class="widgetinside">',
        'after_widget' => '</div></div>',    	
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));

      register_sidebars(1,array(
      	'name'=>'Magazine Sidebar Home Four',
        'before_widget' => '<div class="widget"><div class="widgetinside">',
        'after_widget' => '</div></div>',      	
          'before_title' => '<h2>',
          'after_title' => '</h2>',
    ));

      register_sidebars(1,array(
      	'name'=>'Magazine Sidebar Home Five',
        'before_widget' => '<div class="widget"><div class="widgetinside">',
        'after_widget' => '</div></div>',      	
          'before_title' => '<h2>',
          'after_title' => '</h2>',
    ));
    
      register_sidebars(1,array(
      	'name'=>'Magazine Sidebar Home Six',
        'before_widget' => '<div class="widget"><div class="widgetinside">',
        'after_widget' => '</div></div>',      	
          'before_title' => '<h2>',
          'after_title' => '</h2>',
    ));

      register_sidebars(1,array(
      	'name'=>'Magazine Sidebar Home Seven',
        'before_widget' => '<div class="widget"><div class="widgetinside">',
        'after_widget' => '</div></div>',      	
          'before_title' => '<h2>',
          'after_title' => '</h2>',
    ));    
    
      register_sidebars(1,array(
      	'name'=>'Sidebar Single Post',
         'before_widget' => '<div class="widget"><div class="widgetinside">',
        'after_widget' => '</div></div>',
          'before_title' => '<h2>',
          'after_title' => '</h2>',
    ));


    register_sidebars(1,array(
    		'name'=>'Sidebar One',
	        'before_widget' => '<div class="widget"><div class="widgetinside">',
	        'after_widget' => '</div></div>',
	        'before_title' => '<h2>',
	        'after_title' => '</h2>',
    ));


    register_sidebars(1,array(
    		'name'=>'Sidebar Two',
	        'before_widget' => '<div class="widget"><div class="widgetinside">',
	        'after_widget' => '</div></div>',
	        'before_title' => '<h2>',
	        'after_title' => '</h2>',
    ));

 
    register_sidebars(1,array(
    		'name'=>'Featured 1 Filler Space Top',
	        'before_widget' => '<div class="filler">',
	        'after_widget' => '</div>',
	        'before_title' => '<h2>',
	        'after_title' => '</h2>',
    ));
    
    register_sidebars(1,array(
        	'name'=>'Featured 1 Filler Space Bottom',
	        'before_widget' => '<div class="filler">',
	        'after_widget' => '</div>',
    	        'before_title' => '<h2>',
    	        'after_title' => '</h2>',
    ));
    
    register_sidebars(1,array(
    		'name'=>'Featured 2 Filler Space Top',
	        'before_widget' => '<div class="filler">',
	        'after_widget' => '</div>',
	        'before_title' => '<h2>',
	        'after_title' => '</h2>',
    ));
    
    register_sidebars(1,array(
        	'name'=>'Featured 2 Filler Space Bottom',
    	        'before_widget' => '',
    	        'after_widget' => '',
    	        'before_title' => '<h2>',
    	        'after_title' => '</h2>',
    ));    
    
    register_sidebars(1,array(
        	'name'=>'Featured 3 Filler Space Top',
	        'before_widget' => '<div class="filler">',
	        'after_widget' => '</div>',
    	        'before_title' => '<h2>',
    	        'after_title' => '</h2>',
    )); 
    
    register_sidebars(1,array(
        	'name'=>'Featured 4 Filler Space Bottom',
	        'before_widget' => '<div class="filler">',
	        'after_widget' => '</div>',
    	        'before_title' => '<h2>',
    	        'after_title' => '</h2>',
    )); 
    
    register_sidebars(1,array(
        	'name'=>'Featured 5 Filler Space Top',
	        'before_widget' => '<div class="filler">',
	        'after_widget' => '</div>',
    	        'before_title' => '<h2>',
    	        'after_title' => '</h2>',
    )); 
    
    register_sidebars(1,array(
        	'name'=>'Featured 6 Filler Space Bottom',
	        'before_widget' => '<div class="filler">',
	        'after_widget' => '</div>',
    	        'before_title' => '<h2>',
    	        'after_title' => '</h2>',
    )); 
    register_sidebars(1,array(
        	'name'=>'Featured 7 Filler Space Bottom',
	        'before_widget' => '<div class="filler">',
	        'after_widget' => '</div>',
    	        'before_title' => '<h2>',
    	        'after_title' => '</h2>',
    ));     
    
/*unregister_sidebar('Filler Space One');
unregister_sidebar('Featured 2 Filler Space Top');
unregister_sidebar('Featured 2 Filler Space Bottom');
unregister_sidebar('Featured 3 Filler Space Top');
unregister_sidebar('Featured 4 Filler Space Bottom');
unregister_sidebar('Featured 5 Filler Space Top');
unregister_sidebar('Featured 6 Filler Space Bottom');  
unregister_sidebar('Featured 7 Filler Space Bottom');
unregister_sidebar('Magazine Sidebar Home One');
unregister_sidebar('Magazine Sidebar Home Two');
unregister_sidebar('Magazine Sidebar Home Three');
unregister_sidebar('Magazine Sidebar Home Four');
unregister_sidebar('Magazine Sidebar Home Five');
unregister_sidebar('Magazine Sidebar Home Six');
unregister_sidebar('Magazine Sidebar Home Seven');*/

remove_action('wp_head', 'wp_generator');


function bdw_get_images($postID,$imgwidth,$imgheight)
{

    // Get the post ID
    $iPostID = $postID;

    // Get images for this post
    $arrImages =& get_children('post_type=attachment&post_mime_type=image&post_parent=' . $iPostID );

    // If images exist for this page
    if($arrImages)
    {

        // Get array keys representing attached image numbers
        $arrKeys = array_keys($arrImages);

		/******BEGIN BUBBLE SORT BY MENU ORDER************
		// Put all image objects into new array with standard numeric keys (new array only needed while we sort the keys)
		foreach($arrImages as $oImage)
		{
			$arrNewImages[] = $oImage;
		}

		// Bubble sort image object array by menu_order TODO: Turn this into std "sort-by" function in functions.php
		for($i = 0; $i < sizeof($arrNewImages) - 1; $i++)
		{
			for($j = 0; $j < sizeof($arrNewImages) - 1; $j++)
			{
				if((int)$arrNewImages[$j]->menu_order > (int)$arrNewImages[$j + 1]->menu_order)
				{
					$oTemp = $arrNewImages[$j];
					$arrNewImages[$j] = $arrNewImages[$j + 1];
					$arrNewImages[$j + 1] = $oTemp;
				}
			}
		}

		// Reset arrKeys array
		$arrKeys = array();

		// Replace arrKeys with newly sorted object ids
		foreach($arrNewImages as $oNewImage)
		{
			$arrKeys[] = $oNewImage->ID;
		}
		******END BUBBLE SORT BY MENU ORDER**************/

        // Get the first image attachment
        $iNum = $arrKeys[0];

        // Get the thumbnail url for the attachment
        $sThumbUrl = wp_get_attachment_thumb_url($iNum);

        // UNCOMMENT THIS IF YOU WANT THE FULL SIZE IMAGE INSTEAD OF THE THUMBNAIL
        //$sImageUrl = wp_get_attachment_url($iNum);

        // Build the <img> string
        $sImgString = '<a href="' . get_permalink() . '">' .
                            '<img src="' . $sThumbUrl . '" width="' . $imgwidth . '" height="' . $imgheight . '" alt="' . get_the_title($iPostID) . '" title="' . get_the_title($iPostID) . '" border="0"/>' .
                        '</a>';

        // Print the image
        echo $sImgString;
	}
}

function get_image_for_crop($postID,$thumborno)
{

  global $themeoptionsprefix;
 $AntisnewsOptions=get_antisnewsoptions();
  $iNum='';
   // Get the post ID
    $iPostID = $postID;

	$files = get_children("post_parent=$iPostID&post_type=attachment&post_mime_type=image");
	if($files){
	        $keys = array_keys($files);
	        $iNum=$keys[0];
	}

        if( (isset($thumborno)) && ($thumborno == 1) )
        {
       	 	$sImageUrlSet = wp_get_attachment_thumb_url($iNum);
       	}
       	elseif( (isset($thumborno)) && ($thumborno == 2) )
        {
       		$sImageUrlSet =wp_get_attachment_medium_url($iNum);
       	}
       	else
       	{
        	$sImageUrlSet = wp_get_attachment_url($iNum);
        }

     	 if(!isset($sImageUrlSet) || empty($sImageUrlSet))
      	{
				$thepostimages = c12pulltheimgurl($iPostID);
				foreach($thepostimages as $thepostimage)
				{
					$sImageUrlSet=$thepostimages[0];
				}
				
	}

        if(isset($sImageUrlSet) && !empty($sImageUrlSet))
        {

        	$sImageUrl = $sImageUrlSet;
        	if($AntisnewsOptions[$themeoptionsprefix.'_precleanthumburl'] == "on"){$sImageUrl=prepsimageurl($sImageUrl);}
	}
	else
	{
		$sImageUrl='';
	}



       return $sImageUrl;

}

function c12pulltheimgurl($thepostid)
{
    $theimgstring=get_the_content($thepostid);

    $c12tcmts = '/<img (?:.*?)src=(?:"|\'){1}(.*?)(?:"|\'){1}/is';

    $theimgmtchesarr = array();

    $procmatchs = preg_match_all($c12tcmts,$theimgstring,$theimgmtchesarr);

    if( $procmatchs!==false && isset($theimgmtchesarr[1]) )
    {
        return $theimgmtchesarr[1];
    }
    else
    {
        return false;
    }
}

function wp_get_attachment_medium_url($id){
 $medium_array = image_downsize( $id, 'medium' );
 $medium_path = $medium_array[0];
 return $medium_path;
}


//Function 'fb_img_caption_shortcode' credit to http://wpengineer.com/filter-caption-shortcode-in-wordpress
function fb_img_caption_shortcode($attr, $content = null) {

	$maxwidth=475;
	$output = apply_filters('img_caption_shortcode', '', $attr, $content);
	if ( $output != '' )
		return $output;

	extract(shortcode_atts(array(
		'id'	=> '',
		'align'	=> 'alignnone',
		'width'	=> '',
		'caption' => ''
	), $attr));

	if ( 1 > (int) $width || empty($caption) )
		return $content;

	if ( $id ) $id = 'id="' . $id . '" ';

	return '<dl ' . $id . 'class="wp-caption ' . $align . '" style="width: ' . (10 + (int) $maxwidth) . 'px"><dt>'
	. do_shortcode( $content ) . '</dt><dd class="wp-caption-text">' . $caption . '</dd></dl>';
}

add_shortcode('wp_caption', 'fb_img_caption_shortcode');
add_shortcode('caption', 'fb_img_caption_shortcode');

function prepsimageurl($src)
{
	$url_parts = parse_url($src);
	$theimgpath=$url_parts['path'];
	return $theimgpath;
}


function has_breaking_news_announcement()
{
	$hasbreakingnews='';
	// Code to check for breaking news

	return $hasbreakingnews;

}

	function LimitText($Text,$Min,$Max,$MinAddChar) {
	    if (strlen($Text) < $Min) {
	        $Limit = $Min-strlen($Text);
	        $Text .= $MinAddChar;
	    }
	    elseif (strlen($Text) >= $Max) {
	        $words = explode(" ", $Text);
	        $check=1;
	        while (strlen($Text) >= $Max) {
	            $c=count($words)-$check;
	            $Text=substr($Text,0,(strlen($words[$c])+1)*(-1));
	            $check++;
	        }
	    }

	    return $Text;
}


$metaoptions = array (

array("optionname" => "$PageMetaSettings",
"optiontype" => "heading"),

array("optionname" => "Default meta keywords",
"optiondescription" => "<p>The theme tries to assist with minor SEO. You can enter default meta keywords for your site here</p>",
"optionid" => $themeoptionsprefix."_metakeywords",
"selectoptiondef" => "",
"optiontype" => "text"),

array("optionname" => "Default meta description",
"optiondescription" => "<p>The theme tries to assist with minor SEO. You can enter default meta description for your site here</p>",
"optionid" => $themeoptionsprefix."_metadescription",
"selectoptiondef" => "",
"optiontype" => "text"),

array("optionname" => "Deactivate Theme Meta",
"optiondescription" => "<p>If you are using an SEO plugin you might need to deactivate the theme meta tags for your plugin to work.</p>",
"optionid" => $themeoptionsprefix."_deactivatethememeta",
"selectoptiondef" => "Select an option:",
"optiontype" => "select",
"options" => $activatedeactivate),

);

$googleanalyticsoptions = array (

array("optionname" => "$GoogleAnalyticsSettings",
"optiontype" => "heading"),

array("optionname" => "Site Tracking Code Example: Google Analytics",
"optiondescription" => "<p>Using Goolge Analytics? You can enter your code above.</p>",
"optionid" => $themeoptionsprefix."_sitetrackingcode",
"selectoptiondef" => "",
"optiontype" => "textarea"),

);

$standardconfigops = array (

array("optionname" => "$StandardConfigurationOptions",
"optiontype" => "heading"),

array("optionname" => "Operation Mode",
"optiondescription" => "",
"optionid" => $themeoptionsprefix."_opmodepagehead",
"optiontype" => "heading"),

array("optionname" => "Run Antisnews in mode",
"optiondescription" => "<p>Tutorial runs the home page in tutorial mode and Live runs it in active mode. So to learn how to use the theme set to Tutorial, and when you have setup your options and categories switch to Live. Magazine Off turns off the magazine style and runs in normal blog mode.</p>",
"optionid" => $themeoptionsprefix."_operationmode",
"selectoptiondef" => "Magazine Off",
"optiontype" => "select",
"options" => $operationmodeops),

array("optionname" => "Archive Page",
"optiondescription" => "",
"optionid" => $themeoptionsprefix."_archivepagehead",
"optiontype" => "heading"),

array("optionname" => "Excerpt or full?",
"optiondescription" => "<p>Show excerpts on archive/category pages or full post?</p>",
"optionid" => $themeoptionsprefix."_archiveexcerptorfull",
"selectoptiondef" => "excerpt",
"optiontype" => "select",
"options" => $excerptorfullops),

array("optionname" => "Archive page title",
"optiondescription" => "<p>Default is Articles. Change as needed.</p>",
"optionid" => $themeoptionsprefix."_archivepagetitle",
"selectoptiondef" => "",
"optiontype" => "text"),

);

$logotaglineoptions = array (

array("optionname" => "$BlogNameTaglineSettings",
"optiontype" => "heading"),

array("optionname" => "Site Logo",
"optiondescription" => "<p>You can replace the text title with a logo by entering the logo URL here Note:include http://</p>",
"optionid" => $themeoptionsprefix."_sitelogo",
"selectoptiondef" => "",
"optiontype" => "text"),

array("optionname" => "Show/Hide Tagline",
"optiondescription" => "<p>Select hide if you prefer to hide the site tagline</p>",
"optionid" => $themeoptionsprefix."_style_showhide_tagline",
"selectoptiondef" => "show",
"optiontype" => "select",
"options" => $showhidearr),

array("optionname" => "Tagline position",
"optiondescription" => "<p>Move tagline to the left right or center</p>",
"optionid" => $themeoptionsprefix."_style_position_tagline",
"selectoptiondef" => "left",
"optiontype" => "select",
"options" => $leftrightcenterops),

);


$adsettingsoptions = array (

array("optionname" => "Ads Settings",
"optiontype" => "heading"),

array("optionname" => "Show/Hide leaderboard Space",
"optiondescription" => "<p>Select <b>hide</b> to hide or <b>show</b> to display the leaderboard content space under the date/search bar</p>",
"optionid" => $themeoptionsprefix."_showhideleader",
"selectoptiondef" => "hide",
"optiontype" => "select",
"options" => $showhidearr),

array("optionname" => "Leaderboard Space Content",
"optiondescription" => "<p>Content for the leaderboard space under the date/search bar</p>",
"optionid" => $themeoptionsprefix."_leadercode",
"selectoptiondef" => "",
"optiontype" => "textarea"),

array("optionname" => "Leaderboard content text position",
"optiondescription" => "<p>Select left to align leaderboard content to left or center to align to center</p>",
"optionid" => $themeoptionsprefix."_showhideleadercontentposition",
"selectoptiondef" => "$sop:",
"optiontype" => "select",
"options" => $textalignlc),

array("optionname" => "Ad code for single page posts",
"optiondescription" => "<p>If using positions left or right best to use 200 by 200 ads. For other positions best to use 468 by 60 ads</p>",
"optionid" => $themeoptionsprefix."_singlepageadsensecode",
"selectoptiondef" => "",
"optiontype" => "textarea"),

array("optionname" => "Position for single page post ads",
"optiondescription" => "<p>Left will float left, right will float right - 6 position options</p>",
"optionid" => $themeoptionsprefix."_singlepageadsenseposition",
"selectoptiondef" => "Select Option:",
"optiontype" => "select",
"options" => $singlepageadsensepositions),

);

$miscellaneoussidebaroptions = array (

array("optionname" => "$MiscellaneousSidebarSettings",
"optiontype" => "heading"),

array("optionname" => "Sidebar One Position",
"optiondescription" => "<p>Select 1 to move Sidebar One to left or 2 for right. Does not apply on homepage</p>",
"optionid" => $themeoptionsprefix."_sidebarpos",
"selectoptiondef" => "2",
"optiontype" => "select",
"options" => $sidebarpos),

array("optionname" => "Share Widget",
"optiondescription" => "<p>Select hide to conceal the share icons widget box in the post sidebar</p>",
"optionid" => $themeoptionsprefix."_hideshareicons",
"selectoptiondef" => "show",
"optiontype" => "select",
"options" => $showhidearr),

array("optionname" => "More From Category",
"optiondescription" => "<p>Select hide to conceal the 'more from this category' widget box in the post sidebar</p>",
"optionid" => $themeoptionsprefix."_hidemorefromcategory",
"selectoptiondef" => "show",
"optiontype" => "select",
"options" => $showhidearr),

array("optionname" => "More From Category Title",
"optiondescription" => "<p>Change header text from Sticky Posts.</p>",
"optionid" => $themeoptionsprefix."_morefromthiscattitle",
"selectoptiondef" => "More from category",
"optiontype" => "text"),

array("optionname" => "More from category number of posts",
"optiondescription" => "<p>How many excerpts to show?</p>",
"optionid" => $themeoptionsprefix."_morefromthiscathowmany",
"selectoptiondef" => "5",
"optiontype" => "text"),

array("optionname" => "More from category show excerpt text",
"optiondescription" => "<p>Only title is shown by default. If you want to include excerpt text select show.</p>",
"optionid" => $themeoptionsprefix."_morefromthiscatshowexcerpt",
"selectoptiondef" => "show",
"optiontype" => "select",
"options" => $hideshowarr),

array("optionname" => "Excerpt Length",
"optiondescription" => "<p>Increase or decrease character length to control appearance.</p>",
"optionid" => $themeoptionsprefix."_morefromthiscatexcerptlength",
"selectoptiondef" => "120",
"optiontype" => "text"),

array("optionname" => "More from category excerpt thumbnail",
"optiondescription" => "<p>If you prefer no thumbnail with the More from category excerpt select hide to conceal thumbnails.</p>",
"optionid" => $themeoptionsprefix."_morefromthiscatshowthumb",
"selectoptiondef" => "show",
"optiontype" => "select",
"options" => $showhidearr),

array("optionname" => "Thumbnail height",
"optiondescription" => "<p>Increase or decrease thumbnail height.</p>",
"optionid" => $themeoptionsprefix."_morefromthiscatthumbheight",
"selectoptiondef" => "75",
"optiontype" => "text"),

array("optionname" => "Thumbnail width",
"optiondescription" => "<p>Increase or decrease thumbnail width.</p>",
"optionid" => $themeoptionsprefix."_morefromthiscatthumbwidth",
"selectoptiondef" => "75",
"optiontype" => "text"),


);

$stickypostssettings = array (

array("optionname" => "$StickyPostsSettings",
"optiontype" => "heading"),

array("optionname" => "Sticky Posts Title",
"optiondescription" => "<p>Change header text from Sticky Posts.</p>",
"optionid" => $themeoptionsprefix."_stickytitle",
"selectoptiondef" => "Sticky Posts",
"optiontype" => "text"),

array("optionname" => "Excerpt Length",
"optiondescription" => "<p>Increase or decrease character length to control appearance.</p>",
"optionid" => $themeoptionsprefix."_stickyexcerptlength",
"selectoptiondef" => "120",
"optiontype" => "text"),

);

$horizontalnavigationmenuoptions = array (

array("optionname" => "$HorizontalNavigationMenuSettings",
"optiontype" => "heading"),

array("optionname" => "Show/Hide Add Post Link",
"optiondescription" => "<p>Selecting <b>show</b> will display an <b>Add Post</b> link in your homepage menu that you can click to have quick access for adding new posts. Only you will be able to see the link</p>",
"optionid" => $themeoptionsprefix."_hideaddpostlink",
"selectoptiondef" => "hide",
"optiontype" => "select",
"options" => $showhidearr),

array("optionname" => "Menu pages or categories",
"optiondescription" => "The horizontal navigation menu shows your pages by default. If you prefer categories switch to categories</p>",
"optionid" => $themeoptionsprefix."_pagesorcategories",
"selectoptiondef" => "pages",
"optiontype" => "select",
"options" => $pagesorcategoriesarr),

array("optionname" => "Pages/Categories exclude IDs",
"optiondescription" => "<p>If there are pages or categories you want to exclude from the horizontal menu (depending on which of the two you are using) enter the IDs of the pages or categories that should be excluded. Separate with comma.</p>",
"optionid" => $themeoptionsprefix."_pagecatidstoexclude",
"selectoptiondef" => "",
"optiontype" => "text"),
);

$featuredslideroptions = array (

array("optionname" => "$FeaturedSliderSettings",
"optiontype" => "heading"),

array("optionname" => "Featured Category 1 for slideshow",
"optiondescription" => "<p>Select your main featured category for the slideshow.</p>",
"optionid" => $themeoptionsprefix."_featuredcat",
"selectoptiondef" => "Select Category:",
"optiontype" => "select",
"options" => $catdlist),

array("optionname" => "Number of Featured Posts to show",
"optiondescription" => "<p>You can set the number of featured posts to show in the featured slideshow.</p>",
"optionid" => $themeoptionsprefix."_numpostsfeatured",
"selectoptiondef" => "5",
"optiontype" => "select",
"options" => $numfeaturedpostsarr),

array("optionname" => "Deactivate Slideshow",
"optiondescription" => "<p>This will turn off the slider and default to a single static image from the slideshow featured category.</p>",
"optionid" => $themeoptionsprefix."_deactivateslideshow",
"selectoptiondef" => "activate",
"optiontype" => "select",
"options" => $activatedeactivate),

);

$featured2options = array (

array("optionname" => "$FeaturedCategory2Options",
"optiontype" => "heading"),

array("optionname" => "Featured Category 2",
"optiondescription" => "<p>Select your second featured category.</p>",
"optionid" => $themeoptionsprefix."_featuredcat2",
"selectoptiondef" => "Select Category:",
"optiontype" => "select",
"options" => $catdlist),


array("optionname" => "Excerpt Length",
"optiondescription" => "<p>Increase or decrease character length to control appearance.</p>",
"optionid" => $themeoptionsprefix."_featuredcat2excerptlength",
"selectoptiondef" => "120",
"optiontype" => "text"),

);

$featured3options = array (

array("optionname" => "$FeaturedCategory3Options",
"optiontype" => "heading"),

array("optionname" => "Featured Category 3",
"optiondescription" => "<p>Select your third featured category.</p>",
"optionid" => $themeoptionsprefix."_featuredcat3",
"selectoptiondef" => "Select Category:",
"optiontype" => "select",
"options" => $catdlist),


array("optionname" => "Excerpt Length",
"optiondescription" => "<p>Increase or decrease character length to control appearance.</p>",
"optionid" => $themeoptionsprefix."_featuredcat3excerptlength",
"selectoptiondef" => "175",
"optiontype" => "text"),

);

$featured4options = array (

array("optionname" => "$FeaturedCategory4Options",
"optiontype" => "heading"),


array("optionname" => "Featured Category 4",
"optiondescription" => "<p>Select your fourth featured category.</p>",
"optionid" => $themeoptionsprefix."_featuredcat4",
"selectoptiondef" => "Select Category:",
"optiontype" => "select",
"options" => $catdlist),


array("optionname" => "Excerpt Length",
"optiondescription" => "<p>Increase or decrease character length to control appearance.</p>",
"optionid" => $themeoptionsprefix."_featuredcat4excerptlength",
"selectoptiondef" => "90",
"optiontype" => "text"),


);

$featured5options = array (

array("optionname" => "$FeaturedCategory5Options",
"optiontype" => "heading"),

array("optionname" => "Featured Category 5",
"optiondescription" => "<p>Select your fifth featured category.</p>",
"optionid" => $themeoptionsprefix."_featuredcat5",
"selectoptiondef" => "Select Category:",
"optiontype" => "select",
"options" => $catdlist),

array("optionname" => "Excerpt Length",
"optiondescription" => "<p>Increase or decrease character length to control appearance.</p>",
"optionid" => $themeoptionsprefix."_featuredcat5excerptlength",
"selectoptiondef" => "175",
"optiontype" => "text"),

);

$featured6options = array (

array("optionname" => "$FeaturedCategory6Options",
"optiontype" => "heading"),

array("optionname" => "Featured Category 6",
"optiondescription" => "<p>Select your fifth featured category.</p>",
"optionid" => $themeoptionsprefix."_featuredcat6",
"selectoptiondef" => "Select Category:",
"optiontype" => "select",
"options" => $catdlist),

array("optionname" => "Excerpt Length",
"optiondescription" => "<p>Increase or decrease character length to control appearance.</p>",
"optionid" => $themeoptionsprefix."_featuredcat6excerptlength",
"selectoptiondef" => "90",
"optiontype" => "text"),

);

$featured7options = array (

array("optionname" => "$FeaturedCategory7Options",
"optiontype" => "heading"),

array("optionname" => "Featured Category 7",
"optiondescription" => "<p>Select your sixth featured category.</p>",
"optionid" => $themeoptionsprefix."_featuredcat7",
"selectoptiondef" => "Select Category:",
"optiontype" => "select",
"options" => $catdlist),


array("optionname" => "Excerpt Length Left",
"optiondescription" => "<p>Increase or decrease character length to control appearance.</p>",
"optionid" => $themeoptionsprefix."_featuredcat7excerptlength1",
"selectoptiondef" => "275",
"optiontype" => "text"),

array("optionname" => "Excerpt Length Right",
"optiondescription" => "<p>Increase or decrease character length to control appearance.</p>",
"optionid" => $themeoptionsprefix."_featuredcat7excerptlength2",
"selectoptiondef" => "123",
"optiontype" => "text"),

);

$customsidebarelementoptions = array (

array("optionname" => "$CustomLatestPostsRecentCommentsSettings",
"optiontype" => "heading"),

array("optionname" => "Hide Custom Latest Topics",
"optiondescription" => "<p>The package comes with a custom latest topics in Sidebar Two. Select hide if you prefer to hide it.</p>",
"optionid" => $themeoptionsprefix."_hidecustomlatesttopics",
"selectoptiondef" => "show",
"optiontype" => "select",
"options" => $showhidearr),

array("optionname" => "Hide Custom Latest Comments",
"optiondescription" => "<p>The package comes with a custom latest comments in Sidebar Two. Select hide if you prefer to hide it.</p>",
"optionid" => $themeoptionsprefix."_hidecustomlatestcomments",
"selectoptiondef" => "show",
"optiontype" => "select",
"options" => $showhidearr),

array("optionname" => "Position for sidebar 2 widgets",
"optiondescription" => "<p>If not hiding the custom recent topics and custom recent comments you can decide if to show your dragged widgets on top of the packaged sidebar elements or below them. Choose 1 for top or 2 for bottom.</p>",
"optionid" => $themeoptionsprefix."_sidebar2widgetspos",
"selectoptiondef" => "2",
"optiontype" => "select",
"options" => $sidebar2widgetspos),

array("optionname" => "Number of items for Custom Latest Topics",
"optiondescription" => "<p>If using the customized Latest Topics in sidebar select how many to display</p>",
"optionid" => $themeoptionsprefix."_numlatesttopics",
"selectoptiondef" => "5",
"optiontype" => "select",
"options" => $numfeaturedarr),

array("optionname" => "Number of items for Custom Recent Comments ",
"optiondescription" => "<p>If using the customized Recent Comments in sidebar select how many to display</p>",
"optionid" => $themeoptionsprefix."_numrecentcomments",
"selectoptiondef" => "5",
"optiontype" => "select",
"options" => $numfeaturedarr),

array("optionname" => "Latest Topics Title",
"optiondescription" => "<p>Change header text from Latest Topics.</p>",
"optionid" => $themeoptionsprefix."_latesttopicstitle",
"selectoptiondef" => "Latest Topics",
"optiontype" => "text"),

array("optionname" => "Latest Topics hide excerpt text",
"optiondescription" => "<p>If you prefer to only have the title in the latest topics excerpts you can select hide to conceal the excerpt text.</p>",
"optionid" => $themeoptionsprefix."_latesttopicsshowexcerpt",
"selectoptiondef" => "show",
"optiontype" => "select",
"options" => $showhidearr),

array("optionname" => "Recent Comments Title",
"optiondescription" => "<p>Change header text from Recent Comments.</p>",
"optionid" => $themeoptionsprefix."_recentcommentstitle",
"selectoptiondef" => "Recent Comments",
"optiontype" => "text"),

array("optionname" => "Recent Comments title phrase",
"optiondescription" => "<p>Where it says author 'had this to say' in custom comment list you can change 'had this to say' to whatever you prefer. Enter 'none' (without the quotes) for no text.</p>",
"optionid" => $themeoptionsprefix."_recentcommentstitlephrase",
"selectoptiondef" => "had this to say",
"optiontype" => "text"),

array("optionname" => "Recent Comments read the post text",
"optiondescription" => "<p>Where it says author 'Read the post' under custom comments list you can change 'Read the post' to whatever you prefer.</p>",
"optionid" => $themeoptionsprefix."_recentcommentsreadposttext",
"selectoptiondef" => "Read the post",
"optiontype" => "text"),

array("optionname" => "Comments order",
"optiondescription" => "<p>Select ASC for lowest to highest or DESC for highest to lowest</p>",
"optionid" => $themeoptionsprefix."_recentcommentsdisplayorder",
"selectoptiondef" => "ASC",
"optiontype" => "select",
"options" => $displayorder),

array("optionname" => "Recent comments hide excerpt text",
"optiondescription" => "<p>If you prefer to only have the title in the latest topics excerpts you can select hide to conceal the excerpt text.</p>",
"optionid" => $themeoptionsprefix."_recentcommentsshowexcerpt",
"selectoptiondef" => "show",
"optiontype" => "select",
"options" => $showhidearr),

array("optionname" => "Latest Topics excerpt length",
"optiondescription" => "<p>Increase or decrease character length to control appearance.</p>",
"optionid" => $themeoptionsprefix."_latesttopicsexcerptlength",
"selectoptiondef" => "120",
"optiontype" => "text"),

array("optionname" => "Recent comments excerpt length",
"optiondescription" => "<p>Increase or decrease character length to control appearance.</p>",
"optionid" => $themeoptionsprefix."_recentcommentsexcerptlength",
"selectoptiondef" => "120",
"optiontype" => "text"),

);

$generalthumbnailoptions = array (

array("optionname" => "$StandardThumbnailSettings",
"optiontype" => "heading"),

array("optionname" => "State of default no image thumbnail",
"optiondescription" => "<p>If you prefer not to use a no image thumbnail for posts that have no image change state to off</p>",
"optionid" => $themeoptionsprefix."_noimagethumbnailstate",
"selectoptiondef" => "on",
"optiontype" => "select",
"options" => $onoffops),

array("optionname" => "Pre-clean thumb URL",
"optiondescription" => "<p>Some installations have problems with the TimThumb cropping script. If your thumbnails don't show select on to pre clean the thumbnail url before it gets passed to the TimThumb to be cropped. This sometimes resolves the problem.</p>",
"optionid" => $themeoptionsprefix."_precleanthumburl",
"selectoptiondef" => "",
"optiontype" => "select",
"options" => $offonops),

array("optionname" => "Remote Image Allowed Site Override",
"optiondescription" => "<p>You bear the responsibiity for the security risks involved in attempting to resize images from any remote website not included in the allowed sites list. Currently remote image resizing is restricted to [flickr.com,picasa.com,blogger.com,wordpress.com,img.youtube.com,ecx.images-amazon.com]. If you set this option to on the script will attempt to grab and resize images from the locations where they are being hosted even if it is not a location in the allowed sites list. However this presents a security risk and is not recommended. By setting this option to on you acknowledge that you have been advised that the better and safer practice is to host the images on your own site or only use images from one of sites in the allowed sites list so as to use the script as intended and not to activate web-wide remote image cropping and that if you choose to activate web-wide remote image cropping you bear full responsibility for your choice to do so.  </p>",
"optionid" => $themeoptionsprefix."_overrideremotehostrestriction",
"selectoptiondef" => "",
"optiontype" => "select",
"options" => $offonops),

array("optionname" => "Archive/Search excerpt length",
"optiondescription" => "<p>Excerpt length for search results and archive pages</p>",
"optionid" => $themeoptionsprefix."_archivesearchexcerptlength",
"selectoptiondef" => "275",
"optiontype" => "text"),

array("optionname" => "Image Zoom Crop",
"optiondescription" => "<p>Select 1 to zoom in on image and crop part or 0 to crop full image</p>",
"optionid" => $themeoptionsprefix."_featuredcatimageszoomcrop",
"selectoptiondef" => "1",
"optiontype" => "select",
"options" => $zoomcropops),


array("optionname" => "Image Quality",
"optiondescription" => "<p>Modify value as needed to adjust image quality</p>",
"optionid" => $themeoptionsprefix."_featuredcatimagesquality",
"selectoptiondef" => "95",
"optiontype" => "text"),

);

$commentformoptions = array (

array("optionname" => "$CommentFormSettings",
"optiontype" => "heading"),

array("optionname" => "Comment form on Post Pages",
"optiondescription" => "<p>Do you want posts of the type <b>Page</b> to have a comment form?</p>",
"optionid" => $themeoptionsprefix."_commentsonpage",
"selectoptiondef" => "Select yes or no:",
"optiontype" => "select",
"options" => $commentsonpage),

);

function get_antisnewsoptions()
{
	$mypsoptions=array();
	global $themeoptionsprefix;

	$pstandoptions=get_option($themeoptionsprefix.'_theme_options');
	$ppremoptions=get_option($themeoptionsprefix.'_css_style_options');

	
	if(isset($pstandoptions) && !empty($pstandoptions))
	{
	
		foreach ($pstandoptions as $pstandoption)
		{
			if(isset($pstandoption['optionid']) && !empty($pstandoption['optionid']))
			{


				$mypsoptions[$pstandoption['optionid']]=$pstandoption['selectoptiondef'];
			}

		}
	}
	
	if(isset($ppremoptions) && !empty($ppremoptions))
	{
		foreach ($ppremoptions as $ppremoption)
		{
			if(isset($ppremoption['optionid']) && !empty($ppremoption['optionid']))
			{	
				$mypsoptions[$ppremoption['optionid']] = $ppremoption['selectoptiondef'];
			}

		}
	}
	
	return $mypsoptions;

}

function get_ppremoption($psoptionid)
{
	$psopval='';
	global $themeoptionsprefix;
	
	$cssoptions=$AntisnewsOptions[$themeoptionsprefix.'_css_style_options'];
	
	foreach ($cssoptions as $cssoption)
	{	
		if($cssoption['optionid'] == $psoptionid)
		{
						
			$mypsoptions[]=array("optionname" => $cssoption['optionname'],
			"optiondescription" => $cssoption['optiondescription'],
			"optionid" => $cssoption['optionid'],
			"selectoptiondef" => $cssoption['selectoptiondef'],
			"optiontype" => $cssoption['optiontype'],
			"options" => $cssoption['options']);			

		}
	}
	
	if(isset($mypsoptions) && !empty($mypsoptions))
	{
		foreach($mypsoptions as $mypsoptions)
		{
			$psopval=$mypsoptions['selectoptiondef'];
		}
	}
	
	return $psopval;

}

function get_myoptionsarray($whichpremiumoptions)
{
	
	global $themeoptionsprefix;
	$AntisnewsOptions=get_antisnewsoptions();
	
	
	$mywhichoptions=array();
	
	foreach ($whichpremiumoptions as $optionvalue)
	{	
		if(isset($optionvalue['optionid']) && !empty($optionvalue['optionid']))
		{
		
			if(!isset($optionvalue['options']) || empty($optionvalue['options']))
			{
				$optionvalue['options']='';
			}
			
			if(isset($AntisnewsOptions[$optionvalue['optionid']]) && !empty($AntisnewsOptions[$optionvalue['optionid']]))
			{
				$whichpremiumoptionval = $AntisnewsOptions[$optionvalue['optionid']];
			}else {$whichpremiumoptionval='';}
			
			
			$mywhichoptions[]=array("optionname" => $optionvalue['optionname'],
			"optiondescription" => $optionvalue['optiondescription'],
			"optionid" => $optionvalue['optionid'],
			"selectoptiondef" => $whichpremiumoptionval,
			"optiontype" => $optionvalue['optiontype'],
			"options" => $optionvalue['options']);	
		}

	}	
	
	return $mywhichoptions;

}

function get_def_opt_val($c12_premiumoptions,$optionvalue)
{
	$psopval='';
	
	foreach ($c12_premiumoptions as $c12_premiumoption)
	{	
		if(isset($c12_premiumoption['optionid']) && !empty($c12_premiumoption['optionid']))
		{
			if($c12_premiumoption['optionid'] == $optionvalue)
			{						
				$psopval=$c12_premiumoption['selectoptiondef'];	
			}
		}
	}
	
	return $psopval;

}

check_for_options();
function check_for_options()
{
	$AntisnewsOptions=get_antisnewsoptions();
	global $themeoptionsprefix,$metaoptions,$googleanalyticsoptions,$logotaglineoptions,$adsettingsoptions,$miscellaneoussidebaroptions,$stickypostssettings,$horizontalnavigationmenuoptions,$featuredslideroptions,$featured2options,$featured3options,$featured4options,$featured5options,$featured6options,$featured7options,$generalthumbnailoptions,$commentformoptions,$customsidebarelementoptions,$standardconfigops;
		
	$mydefoptions=array_merge($metaoptions,$googleanalyticsoptions,$logotaglineoptions,$adsettingsoptions,$miscellaneoussidebaroptions,$stickypostssettings,$horizontalnavigationmenuoptions,$featuredslideroptions,$featured2options,$featured3options,$featured4options,$featured5options,$featured6options,$featured7options,$generalthumbnailoptions,$commentformoptions,$customsidebarelementoptions,$standardconfigops);
	$mythemeoptions=$themeoptionsprefix.'_theme_options';
	$mysavedthemeoptions=get_option($mythemeoptions);
		
		$options = $mysavedthemeoptions;			
	
		if (!isset($options) || empty($options) || !is_array($options)) 
		{			
			$options = $mydefoptions;

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
			
			update_option($mythemeoptions,$setmyoptions);
		}
}

function antisnews_reconcile_standard_options()
{
	global $themeoptionsprefix,$metaoptions,$googleanalyticsoptions,$logotaglineoptions,$adsettingsoptions,$miscellaneoussidebaroptions,$stickypostssettings,$horizontalnavigationmenuoptions,$featuredslideroptions,$featured2options,$featured3options,$featured4options,$featured5options,$featured6options,$featured7options,$generalthumbnailoptions,$commentformoptions,$customsidebarelementoptions,$standardconfigops;
	$mydefoptions=array_merge($metaoptions,$googleanalyticsoptions,$logotaglineoptions,$adsettingsoptions,$miscellaneoussidebaroptions,$stickypostssettings,$horizontalnavigationmenuoptions,$featuredslideroptions,$featured2options,$featured3options,$featured4options,$featured5options,$featured6options,$featured7options,$generalthumbnailoptions,$commentformoptions,$customsidebarelementoptions,$standardconfigops);
	$AntisnewsOptions=get_antisnewsoptions();
	$mythemeoptions=$themeoptionsprefix.'_theme_options';		

			$setmyoptions=array();
			

				foreach ($mydefoptions as $optionvalue)
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
					if(!isset($optionvalue['options']) || empty($optionvalue['options']))
					{
						$optionvalue['options']='';
					}				
								
					
					if(isset($AntisnewsOptions[$optionvalue['optionid']]) && !empty($AntisnewsOptions[$optionvalue['optionid']]))
					{
						$savedoptionvalue=$AntisnewsOptions[$optionvalue['optionid']];
					}
					elseif(isset($optionvalue['selectoptiondef']) && !empty($optionvalue['selectoptiondef']))
					{
						$savedoptionvalue=$optionvalue['selectoptiondef'];
					}
					else
					{
						$savedoptionvalue='';
					}
					$setmyoptions[]=array("optionname" => $optionvalue['optionname'],
					"optiondescription" => $optionvalue['optiondescription'],
					"optionid" => $optionvalue['optionid'],
					"selectoptiondef" => $savedoptionvalue,
					"optiontype" => $optionvalue['optiontype'],
					"options" => $optionvalue['options']);					
				}
			
				update_option($mythemeoptions,$setmyoptions);			
		
}

function do_options_update_theme()
{

	global $this_theme,$themeoptionsprefix,$optionsupdated,$optionsreset;
	global $metaoptions,$googleanalyticsoptions,$logotaglineoptions,$adsettingsoptions,$miscellaneoussidebaroptions,$stickypostssettings,$horizontalnavigationmenuoptions,$featuredslideroptions,$featured2options,$featured3options,$featured4options,$featured5options,$featured6options,$featured7options,$generalthumbnailoptions,$commentformoptions,$customsidebarelementoptions,$standardconfigops;
			
		$myantisoptions=array_merge($metaoptions,$googleanalyticsoptions,$logotaglineoptions,$adsettingsoptions,$miscellaneoussidebaroptions,$stickypostssettings,$horizontalnavigationmenuoptions,$featuredslideroptions,$featured2options,$featured3options,$featured4options,$featured5options,$featured6options,$featured7options,$generalthumbnailoptions,$commentformoptions,$customsidebarelementoptions,$standardconfigops);
		$myantisoptionname=$themeoptionsprefix.'_theme_options';
		$myantisoptionsaved=get_myoptionsarray($myantisoptions);
		if (!isset($myantisoptionsaved) || empty($myantisoptionsaved) || !is_array($myantisoptionsaved)) 
		{			
			$optionsforupdate = $myantisoptions;	
		}
		else
		{
			$optionsforupdate = $myantisoptionsaved;
		}		

	if ( isset($_REQUEST['page']) && ($_REQUEST['page'] == basename(__FILE__) ) ) 
	{
		if( isset($_REQUEST['action']) && ( 'updateoptions' == $_REQUEST['action'] ))
		{			
			
			foreach ($optionsforupdate as $optionvalue)
			{	
			
				if(isset($optionvalue['optionid']) && !empty($optionvalue['optionid']))
				{
					if( isset( $_REQUEST[ $optionvalue['optionid'] ] ) )
					{				
						$myantisoptionvalue = $_REQUEST[ $optionvalue['optionid'] ];
					}
					else
					{
						$myantisoptionvalue=$optionvalue['selectoptiondef'];
					}
				}
				
				$mypoptions[]=array("optionname" => $optionvalue['optionname'],
				"optiondescription" => $optionvalue['optiondescription'],
				"optionid" => $optionvalue['optionid'],
				"selectoptiondef" => $myantisoptionvalue,
				"optiontype" => $optionvalue['optiontype'],
				"options" => $optionvalue['options']);				

			}			
			
				update_option($myantisoptionname,$mypoptions);
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
				$options=$metaoptions;
			}
			elseif($whichoptions == 2)
			{
				$options=$googleanalyticsoptions;
			}			
			elseif($whichoptions == 3)
			{
				$options=$logotaglineoptions;
			}			
			elseif($whichoptions == 4)
			{
				$options=$adsettingsoptions;
			}
			elseif($whichoptions == 5)
			{
				$options=$miscellaneoussidebaroptions;
			}
			elseif($whichoptions == 6)
			{
				$options=$stickypostssettings;
			}
			elseif($whichoptions == 7)
			{
				$options=$horizontalnavigationmenuoptions;
			}
			elseif($whichoptions == 8)
			{
				$options=$featuredslideroptions;
			}
			elseif($whichoptions == 9)
			{
				$options=$featured2options;
			}
			elseif($whichoptions == 10)
			{
				$options=$featured3options;
			}
			elseif($whichoptions == 11)
			{
				$options=$featured4options;
			}
			elseif($whichoptions == 12)
			{
				$options=$featured5options;
			}
			elseif($whichoptions == 13)
			{
				$options=$featured6options;
			}
			elseif($whichoptions == 14)
			{
				$options=$generalthumbnailoptions;
			}
			elseif($whichoptions == 15)
			{
				$options=$commentformoptions;
			}
			elseif($whichoptions == 16)
			{
				$options=$customsidebarelementoptions;
			}
			elseif($whichoptions == 17)
			{
				$options=$standardconfigops;
			}	
			elseif($whichoptions == 18)
			{
				$options=$featured7options;
			}			
			elseif($whichoptions == 'all')
			{
				$options=array_merge($metaoptions,$googleanalyticsoptions,$logotaglineoptions,$adsettingsoptions,$miscellaneoussidebaroptions,$stickypostssettings,$horizontalnavigationmenuoptions,$featuredslideroptions,$featured2options,$featured3options,$featured4options,$featured5options,$featured6options,$featured7options,$generalthumbnailoptions,$commentformoptions,$customsidebarelementoptions,$standardconfigops);
			}
			
			foreach ($options as $option)
			{
				if(isset($option['optionid']) && !empty($option['optionid']))
				{			
					$optionidsfordel[]=$option['optionid'];
				}
			}
			
			
			foreach ($optionsforupdate as $optionvalue)
			{
			
			
				if(in_array($optionvalue['optionid'],$optionidsfordel))
				{
					$myoptiondelvalue = get_def_opt_val($options,$optionvalue['optionid']);
					if(!isset($myoptiondelvalue) || empty($myoptiondelvalue))
					{
						$myoptiondelvalue="";
					}
					
					$myoptionvalue = "$myoptiondelvalue";
				}
				else
				{
					$myoptionvalue=$optionvalue['selectoptiondef'];
				}
				
				$mypoptions[]=array("optionname" => $optionvalue['optionname'],
				"optiondescription" => $optionvalue['optiondescription'],
				"optionid" => $optionvalue['optionid'],
				"selectoptiondef" => $myoptionvalue,
				"optiontype" => $optionvalue['optiontype'],
				"options" => $optionvalue['options']);		

			}			
			
				update_option($myantisoptionname,$mypoptions);
				$optionsupdated=true;
		
		}

	}

	add_theme_page($this_theme." Options", $this_theme." Options", 'edit_themes', basename(__FILE__), 'display_page_options_antisnews', '');
}


function display_page_options_antisnews()
{

	global $themeoptionsprefix;
	global $optionsreset,$optionsupdated,$this_theme;
	global $metaoptions,$googleanalyticsoptions,$logotaglineoptions,$adsettingsoptions,$miscellaneoussidebaroptions,$stickypostssettings,$horizontalnavigationmenuoptions,$featuredslideroptions,$featured2options,$featured3options,$featured4options,$featured5options,$featured6options,$featured7options,$generalthumbnailoptions,$commentformoptions,$customsidebarelementoptions,$standardconfigops;
	global $PageMetaSettings,$GoogleAnalyticsSettings,$BlogNameTaglineSettings,$AdsSettings,$MiscellaneousSidebarSettings,$StickyPostsSettings,$HorizontalNavigationMenuSettings,$FeaturedSliderSettings,$FeaturedCategory2Options,$FeaturedCategory3Options,$FeaturedCategory4Options,$FeaturedCategory5Options,$FeaturedCategory6Options,$FeaturedCategory7Options,$StandardThumbnailSettings,$CommentFormSettings,$CustomLatestPostsRecentCommentsSettings,$StandardConfigurationOptions;
	
	$mymergedoptions=array_merge($metaoptions,$googleanalyticsoptions,$logotaglineoptions,$adsettingsoptions,$miscellaneoussidebaroptions,$stickypostssettings,$horizontalnavigationmenuoptions,$featuredslideroptions,$featured2options,$featured3options,$featured4options,$featured5options,$featured6options,$featured7options,$generalthumbnailoptions,$commentformoptions,$customsidebarelementoptions,$standardconfigops);

	if(isset($_REQUEST['action']) && !empty($_REQUEST['action']) && ($_REQUEST['action'] == 'loadstandardoptionsform'))
	{ 
		if(isset($_REQUEST['antistandops']) && !empty($_REQUEST['antistandops']))
		{ 
			$whichoptions=$_REQUEST['antistandops'];
			
			if($whichoptions == 1)
			{ 
				$options=$metaoptions;
			}
			elseif($whichoptions == 2)
			{
				$options=$googleanalyticsoptions;
			}			
			elseif($whichoptions == 3)
			{
				$options=$logotaglineoptions;
			}			
			elseif($whichoptions == 4)
			{
				$options=$adsettingsoptions;
			}
			elseif($whichoptions == 5)
			{
				$options=$miscellaneoussidebaroptions;
			}
			elseif($whichoptions == 6)
			{
				$options=$stickypostssettings;
			}
			elseif($whichoptions == 7)
			{
				$options=$horizontalnavigationmenuoptions;
			}
			elseif($whichoptions == 8)
			{
				$options=$featuredslideroptions;
			}
			elseif($whichoptions == 9)
			{
				$options=$featured2options;
			}
			elseif($whichoptions == 10)
			{
				$options=$featured3options;
			}
			elseif($whichoptions == 11)
			{
				$options=$featured4options;
			}
			elseif($whichoptions == 12)
			{
				$options=$featured5options;
			}
			elseif($whichoptions == 13)
			{
				$options=$featured6options;
			}
			elseif($whichoptions == 14)
			{
				$options=$generalthumbnailoptions;
			}
			elseif($whichoptions == 15)
			{
				$options=$commentformoptions;
			}
			elseif($whichoptions == 16)
			{
				$options=$customsidebarelementoptions;
			}
			elseif($whichoptions == 17)
			{
				$options=$standardconfigops;
			}
			elseif($whichoptions == 18)
			{
				$options=$featured7options;
			}			
			else
			{
				$options=$logotaglineoptions;
			}			
		}
		else 
		{
			$options=$mymergedoptions;
		}		
			do_page_antisnews($options,$whichoptions);

	}
	else 
	{
		antisnews_reconcile_standard_options();
?>

<div class="wrap">

	<h2><?php echo $this_theme; _e(" Antisnews Theme Options","Antisnews"); ?></h2>
	<?php _e("Need to reset all your standard options in one click? Clicking the reset all link will reset all standard options to the default settings. If you only want to reset the options for one set click the manage options button and use the reset link on that specific page. ","Antisnews");?>
	<p><a href="?page=functions.php&action=reset&w=all"><?php _e("Reset All Standard Options","Antisnews");?></a></p>
	<?php if ( $optionsupdated ) {?><div id="message" class="updated fade"><?php _e("The options have been saved","Antisnews"); ?></div><?php } elseif ( $optionsreset ) {?><div id="message" class="updated fade"><?php _e("The options have been reset","Antisnews");?></div><?php } ?>


		<table class="widefat" cellspacing="0">
		<thead>
		<tr>
		<th scope="col" class="manage-column">
		Option Title
		</th>
		<th scope="col" class="manage-column">
		Manage Options
		</th>
		</tr>
		</thead>
		<tfoot>
		<tr>

		<th scope="col" class="manage-column">
		Option Title
		</th>
		<th scope="col" class="manage-column">
		Manage Options
		</th>
		</tr>
		</tfoot>
		<tbody>
		
		<td><?php echo $StandardConfigurationOptions; ?></td>
		<td><form method="post"><input type="hidden" name="action" value="loadstandardoptionsform"><input type="hidden" name="antistandops" value="17"><input type="submit" class="button" value="Manage Options"></form></td>
		</tr>
		<tr>		
		<td><?php echo 	$PageMetaSettings; ?></td>
		<td><form method="post"><input type="hidden" name="action" value="loadstandardoptionsform"><input type="hidden" name="antistandops" value="1"><input type="submit" class="button" value="Manage Options"></form></td>
		</tr>
		<tr>
		<td><?php echo 	$GoogleAnalyticsSettings; ?></td>
		<td><form method="post"><input type="hidden" name="action" value="loadstandardoptionsform"><input type="hidden" name="antistandops" value="2"><input type="submit" class="button" value="Manage Options"></form></td>
		</tr>
		<tr>
		<td><?php echo $BlogNameTaglineSettings; ?></td>
		<td><form method="post"><input type="hidden" name="action" value="loadstandardoptionsform"><input type="hidden" name="antistandops" value="3"><input type="submit" class="button" value="Manage Options"></form></td>
		</tr>		
		<tr>
		<td><?php echo $AdsSettings; ?></td>
		<td><form method="post"><input type="hidden" name="action" value="loadstandardoptionsform"><input type="hidden" name="antistandops" value="4"><input type="submit" class="button" value="Manage Options"></form></td>
		</tr>
		<tr>
		<td><?php echo $MiscellaneousSidebarSettings; ?></td>
		<td><form method="post"><input type="hidden" name="action" value="loadstandardoptionsform"><input type="hidden" name="antistandops" value="5"><input type="submit" class="button" value="Manage Options"></form></td>
		</tr>		
		<tr>
		<td><?php echo $StickyPostsSettings; ?></td>
		<td><form method="post"><input type="hidden" name="action" value="loadstandardoptionsform"><input type="hidden" name="antistandops" value="6"><input type="submit" class="button" value="Manage Options"></form></td>
		</tr>
		<tr>
		<td><?php echo $HorizontalNavigationMenuSettings; ?></td>
		<td><form method="post"><input type="hidden" name="action" value="loadstandardoptionsform"><input type="hidden" name="antistandops" value="7"><input type="submit" class="button" value="Manage Options"></form></td>
		</tr>	
		<tr>
		<td><?php echo $FeaturedSliderSettings; ?></td>
		<td><form method="post"><input type="hidden" name="action" value="loadstandardoptionsform"><input type="hidden" name="antistandops" value="8"><input type="submit" class="button" value="Manage Options"></form></td>
		</tr>
		<tr>
		<td><?php echo $FeaturedCategory2Options; ?></td>
		<td><form method="post"><input type="hidden" name="action" value="loadstandardoptionsform"><input type="hidden" name="antistandops" value="9"><input type="submit" class="button" value="Manage Options"></form></td>
		</tr>	
		<tr>
		<td><?php echo $FeaturedCategory3Options; ?></td>
		<td><form method="post"><input type="hidden" name="action" value="loadstandardoptionsform"><input type="hidden" name="antistandops" value="10"><input type="submit" class="button" value="Manage Options"></form></td>
		</tr>	
		<tr>	
		<td><?php echo $FeaturedCategory4Options;?></td>
		<td><form method="post"><input type="hidden" name="action" value="loadstandardoptionsform"><input type="hidden" name="antistandops" value="11"><input type="submit" class="button" value="Manage Options"></form></td>
		</tr>	
		<tr>	
		<td><?php echo $FeaturedCategory5Options; ?></td>
		<td><form method="post"><input type="hidden" name="action" value="loadstandardoptionsform"><input type="hidden" name="antistandops" value="12"><input type="submit" class="button" value="Manage Options"></form></td>
		</tr>	
		<tr>
		<td><?php echo $FeaturedCategory6Options; ?></td>
		<td><form method="post"><input type="hidden" name="action" value="loadstandardoptionsform"><input type="hidden" name="antistandops" value="13"><input type="submit" class="button" value="Manage Options"></form></td>
		</tr>
		<tr>
		<td><?php echo $FeaturedCategory7Options; ?></td>
		<td><form method="post"><input type="hidden" name="action" value="loadstandardoptionsform"><input type="hidden" name="antistandops" value="18"><input type="submit" class="button" value="Manage Options"></form></td>
		</tr>
		<tr>		
		<td><?php echo $StandardThumbnailSettings; ?></td>
		<td><form method="post"><input type="hidden" name="action" value="loadstandardoptionsform"><input type="hidden" name="antistandops" value="14"><input type="submit" class="button" value="Manage Options"></form></td>
		</tr>	
		<tr>
		<td><?php echo $CommentFormSettings; ?></td>
		<td><form method="post"><input type="hidden" name="action" value="loadstandardoptionsform"><input type="hidden" name="antistandops" value="15"><input type="submit" class="button" value="Manage Options"></form></td>
		</tr>	
		<tr>
		<td><?php echo $CustomLatestPostsRecentCommentsSettings ?></td>
		<td><form method="post"><input type="hidden" name="action" value="loadstandardoptionsform"><input type="hidden" name="antistandops" value="16"><input type="submit" class="button" value="Manage Options"></form></td>
		</tr>
		</tbody></table>

</div>	
<?php 
}
}

function do_page_antisnews ($options,$antistandops)
{

	global $this_theme,$optionsreset,$optionsupdated;
	global	$logotaglineoptions;
	$AntisnewsOptions=get_antisnewsoptions();	
	
	
	if(!isset($options) || empty($options))
	{
		$options=$logotaglineoptions;
	}
	
	$activeoptions = get_myoptionsarray($options);

	if(!isset($activeoptions) || empty($activeoptions))
	{
		$activeoptions=$options;
	}
	

?>


	<div class="wrap">

    <form method="post">

	<h2><?php echo $this_theme; ?> Options</h2>

	<?php if(isset($_REQUEST['optionsupdated']) && !empty( $_REQUEST['optionsupdated'] )) { ?><?php echo "The options for $this_theme were saved";  } ?>

	<table>

<?php

		foreach ($activeoptions as $optionvalue)
		{

			if ( $optionvalue['optiontype'] <> "heading" )
			{

?>
				<tr>
				<td valign="top" style="margin:0px 25px 30px 0px;background:#eeeeee;padding:10px;"><?php echo $optionvalue['optionname']; ?></td>
				<td style="width:100%;margin:0px 25px 30px 0px;background:#eeeeee;padding:10px;">
<?php
			}

				switch ( $optionvalue['optiontype'] )
				{
					case 'text':

?>
					<input name="<?php echo $optionvalue['optionid']; ?>" id="<?php echo $optionvalue['optionid']; ?>" type="<?php echo $optionvalue['optiontype']; ?>" value="<?php if( isset($AntisnewsOptions[$optionvalue['optionid'] ]) && ( $AntisnewsOptions[$optionvalue['optionid'] ] != "")) { echo stripslashes($AntisnewsOptions[$optionvalue['optionid']]); } else { echo $optionvalue['selectoptiondef']; } ?>" />

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
						<textarea name="<?php echo $optionvalue['optionid']; ?>" id="<?php echo $optionvalue['optionid']; ?>" cols="100" rows="8"><?php  if( $AntisnewsOptions[$optionvalue['optionid']] != "") { echo stripslashes($AntisnewsOptions[$optionvalue['optionid']]); } else { echo $optionvalue['selectoptiondef']; } ?></textarea>
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
					<input name="updateoptions" type="submit" value="Update Options" />
					<input type="hidden" name="action" value="updateoptions" />
					<input type="hidden" name="antistandops" value="<?php echo $antistandops; ?>" />

					</p></form>
					</div>
<?php

}

add_action('admin_menu', 'do_options_update_theme');



function antisnews_breaking_news_submenu_page(){

// Add admin page for adding and editing classfied fields

add_submenu_page('post-new.php', 'Add A Breaking News Post', 'Breaking News', '10', basename('breakingnews.php'), 'antisnews_add_breaking_news_post');

}

add_action('admin_menu', 'antisnews_breaking_news_submenu_page');

function antisnews_add_breaking_news_post()
{

	global $AntisnewsOptions,$themeoptionsprefix;
	if(current_user_can('manage_options'))
	{

		if($AntisnewsOptions[$themeoptionsprefix.'_breakingnews'])
		{
			echo "<p>You have a breaking news headline running. If you need to unset it use the link below to clear the breaking news headline.</p>";

		?>
			<a href="?action=clearbreakingnews">Clear the breaking news headline</a>

		<?php } ?>

		 <div class="wrap">
		 <form method="post">

		<h3>Setup Breaking News</h3>

		<?php if(isset($_REQUEST['breakingnewsupdated']) && !empty( $_REQUEST['breakingnewsupdated'] )) { ?><div class="updated fade">The breaking news headline has been set</div> <?php  } elseif(isset($_REQUEST['breakingnewscleared']) && !empty($_REQUEST['breakingnewscleared'] )) { ?> <div class="updated fade">The breaking news headline has been cleared</div> <?php } ?>

		<p><label>Enter the ID for the post that you want to set as the breaking news story</label></p>
		<p><input name="<?php echo $themeoptionsprefix; ?>_breakingnews" id="<?php echo $themeoptionsprefix; ?>_breakingnews" type="text" value="<?php if ( get_option( $themeoptionsprefix.'_breakingnews' ) != "") { echo $AntisnewsOptions[$themeoptionsprefix.'_breakingnews']; } else { } ?>" /></p>
						<p class="submit">
						<input name="updateoptions" type="submit" value="Set Breaking News Post ID" />
						<input type="hidden" name="action" value="setbreakingnewsid" />
						</p></form>
		 </div>
	<?php
	}
	else
	{
		wp_redirect(get_option('siteurl'));
	}

}

if(isset($_REQUEST['action']) && ($_REQUEST['action'] == 'setbreakingnewsid'))
{

	$breakingnewspostid=$_REQUEST[$themeoptionsprefix.'_breakingnews'];
	update_option( $themeoptionsprefix.'_breakingnews', $breakingnewspostid   );
	header("Location: admin.php?page=breakingnews.php&breakingnewsupdated=true");


}

if(isset($_REQUEST['action']) && ($_REQUEST['action'] == 'clearbreakingnews'))
{
	delete_option( $themeoptionsprefix.'_breakingnews' );
	header("Location: admin.php?page=breakingnews.php&breakingnewscleared=true");
}

if ( ! function_exists( 'custom_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own twentyten_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since 3.0.0
 */

function custom_comment($comment, $args, $depth) {
 global $themeoptionsprefix,$AntisnewsOptions;
if(isset($AntisnewsOptions[$themeoptionsprefix.'_recentcommentsthumbwidth']) && !empty($AntisnewsOptions[$themeoptionsprefix.'_recentcommentsthumbwidth'])){ $commentsthumbnailwidth=$AntisnewsOptions[$themeoptionsprefix.'_recentcommentsthumbwidth'];}
 if(!isset($commentsthumbnailwidth) || empty($commentsthumbnailwidth)){$commentsthumbnailwidth=48;}

    $GLOBALS['comment'] = $comment; ?>
    <li style="list-style:none;" <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
      <div class="excerpt" id="comment-<?php comment_ID(); ?>">
       <div class="imgstyle">
          <?php echo get_avatar($comment,$size=$commentsthumbnailwidth,$default='<path_to_url>' ); ?>
 	</div>
          <?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
       
       <?php if ($comment->comment_approved == '0') : ?>
          <em><?php _e('Your comment is awaiting moderation.') ?></em>
          <br />
       <?php endif; ?>
 
       <div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','') ?></div>
 
       <?php comment_text() ?>
 
       <div class="reply">
          <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
       </div>
      </div>
 <?php
         }
endif;         

function create_tiny_Url($url) {
    $tinyurl = file_get_contents("http://tinyurl.com/api-create.php?url=".$url);
    if(!isset($tinyurl) || empty($tinyurl)){$tinyurl='';}
    return $tinyurl;
}

add_filter('query_vars', 'antisnews_my_style_query_vars');
function antisnews_my_style_query_vars($public_query_vars) {
	$public_query_vars[] = 'antisnews-my-style';
	return $public_query_vars;
}

add_action('template_redirect', 'antisnews_css_display');
function antisnews_css_display(){
	$css = get_query_var('antisnews-my-style');
	if ($css == 'load-style-antisnews'){	
	include_once (TEMPLATEPATH . '/style.php');
	exit;  
	}
}

$AntisnewsOptions=get_antisnewsoptions();
$operationmode=$AntisnewsOptions[$themeoptionsprefix.'_operationmode'];
if(isset($operationmode) && !empty($operationmode) && ($operationmode == 'Live'))
{

	if( file_exists(TEMPLATEPATH.'/cropper.php') )
	{
		include(TEMPLATEPATH.'/cropper.php');
	}
}

function theme_init(){
	load_theme_textdomain('Antisnews', get_template_directory() . '/languages');
}
add_action ('init', 'theme_init');

?>
