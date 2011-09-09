<?php global $themeoptionsprefix; get_header(); ?>
<?php $featuredcatimageszoomcrop=$AntisnewsOptions[$themeoptionsprefix.'_featuredcatimageszoomcrop'];?>
<?php $featuredcatimagesquality=$AntisnewsOptions[$themeoptionsprefix.'_featuredcatimagesquality'];?>
<div id="tier1">
<h1 style="width:96%;">You are currently in Tutorial Mode. After you have setup your options and categories, go to Standard Configuration Options under <?php global $this_theme; echo $this_theme;?> Options and switch to Live Mode</h1>
<div class="tier1main">

			<!--begin featured splash-->
			<div id="featured"> <span class="featured-badge"></span>
				<!--begin featured-content-->
				<div id="featured-content">
					<!--begin container-->
					<div class="container">
						<!--begin featured-slides-->
						<div class="featured-slides">			
						    <div class="featured-image">
		<?php $thefsplashimage=get_bloginfo('template_url'); $thefsplashimage.="/images/tutorial/flower17.jpg";?>

		<?php $operationmode=$AntisnewsOptions[$themeoptionsprefix.'_operationmode'];?>
		<?php if(!isset($operationmode) || empty($operationmode)||($operationmode != 'Live')){?>
		<img src="<?php echo $thefsplashimage;?>" alt="Featured Category 1 for slideshow" width="598" height="324" />
		<?php } else {?>						    
						<?php $thecimgloc=antisnews_crop_img($img=$thefsplashimage,$w=598,$h=324,$featuredcatimagesquality,$featuredcatimageszoomcrop,$postid='');						    ?>
						      <img src="<?php echo $thecimgloc;?>" alt="Featured Category 1 for slideshow" width="598" height="324" />
						 <?php }?>
						    </div>
						    <div class="featured-title">
						      <div class="overlay"></div>
							      <div class="featured-title-content">
								<p><span class="featured-post-date">
								  <?php the_time('l, F j, Y') ?>
								  </span></p>
								<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
								 Featured Category 1 for slideshow
								  </a></h2>
							      </div>
						      </div>			
						</div>
						<!--end featured-slides-->		
					</div>  
					<!--end container-->
				</div>
				<!--end featured-content--> 
			</div>
			<!--end featured splash-->
<p>The top and bottom of the featured slideshow section are widgetized. If you want to add content above or below the slider refer to <b>Featured 1 Filler Space Top</b> for the top and 
<b>Featured 1 Filler Space Bottom</b> for the bottom. The images for the slider are cropped at 598 pixels wide by 324 pixels high. For best results use images in your post that are at least 600 pixels wide by 325 pixels high. You set the number of posts to slide through under the Featured Category 1 for slideshow settings. Only the post title is shown with the slider image. </p>


</div>
<div class="tier1side">

				<h2>Featured Category 2</h2>

				<div class="featured2">
				<div class="imgstyle">
				<img src="<?php bloginfo('template_url'); ?>/images/tutorial/flower1.jpg" alt="" border=""/>
				</div>
				<h3>Place holder post title</h3>
				<p>Setup Featured Category 2 from the theme options page. Section will display 3 posts.</p>
				</div>
				<div class="clear"></div>

				<div class="featured2">
				<div class="imgstyle">
				<img src="<?php bloginfo('template_url'); ?>/images/tutorial/flower2.jpg" alt="" border=""/>
				</div>
				<h3>Place holder post title</h3>
				<p>If your post has images they will show up automatically with the excerpt. The images are cropped to fit. Thumbnail width is 100 and height is 75.</p>
				</div>
				<div class="clear"></div>

				<div class="featured2">
				<div class="imgstyle">
				<img src="<?php bloginfo('template_url'); ?>/images/tutorial/flower3.jpg" alt="" border=""/>
				</div>
				<h3>Place holder post title</h3>
				<p>If your post has no images a default "no image available" image will show unless you choose to disable the default "no image available" image, in which case only the excerpt will show.</p>
				</div>
				<div class="clear"></div>
				
				<div class="featured2">
				<p>The top and bottom of this section are widgetized. To add widgets refer to <b>Featured 2 Filler Space Top</b> and <b>Featured 2 Filler Space Bottom</b>. You can style the H2 and H3 headers font color and font hover colors with the styling tool. For H2 you can add background color, rounded border.</p>
				</div>
				<div class="clear"></div>				
				
</div>

</div><!--close tier 1-->
<div class="clear"></div>

<div id="tier2">
<div class="tier2a">
<div class="widget"><div class="widgetinside">
This is <b>Magazine Sidebar Home One</b> Any widgets you drag to "Magazine Sidebar Home One" will show up here. Each widget will be in its own widget box. This text is in a widget box in "Magazine Sidebar Home One". The categories are in a widget box in "Magazine Sidebar Home One". The recent posts are in a widget box in "Magazine Sidebar Home One". </p>
</div></div>
<div class="widget"><div class="widgetinside"><h2><?php _e("Categories","Antisnews");?></h2><ul><?php wp_list_categories('title_li=&number=10');?></ul></div></div>
<div class="widget"><div class="widgetinside"><h2><?php _e("Recent Posts","Antisnews");?></h2><ul><?php wp_get_archives('type=postbypost&limit=5'); ?></ul></div></div>
</div>
<div class="tier2b">
<div class="widget"><div class="widgetinside">
This is <b>Magazine Sidebar Home Two</b> Any widgets you drag to "Magazine Sidebar Home Two" will show up here. Each widget will be in its own widget box. This text is in a widget box in "Magazine Sidebar Home Two". The sample skyscraper banner is in a widget box in "Magazine Sidebar Home Two".</p>
</div></div>
<div class="widget"><div class="widgetinside">
<img src="<?php bloginfo('template_url'); ?>/images/tutorial/flower18.jpg"  alt="" border=""/>
</div>
</div>
</div>
<div class="tier2c">


				<div class="top">
				<h2>Featured Category 3</h2>
				<div class="featured3">
				<div class="imgstyle"><img src="<?php bloginfo('template_url'); ?>/images/tutorial/flower4.jpg" width="100%" alt="samplethumb6.jpg" border=""/></a></div>
				<h3>The post title will go here</h3>
				<p>Setup Featured Category 3 from the theme options page. One post excerpt will be displayed. The thumbnail is generated automatically if post contains an image. The thumbnail with is 280 pixels, height is 125 pixels.  
				</p>
				</div>
				</div>


				<div class="bottom">
				<h2>Featured Category 4</h2>

				<div class="featured4">
				<div class="imgstyle"><img src="<?php bloginfo('template_url'); ?>/images/tutorial/flower5.jpg" width="75" alt="" border=""/></div>
				<h3>Place holder post title</h3>
				<p>Setup Featured Category 4 from the theme options page. Section will display 3 post excerpts.</p>
				</div>
				<div class="clear"></div>

				<div class="featured4">
				<div class="imgstyle"><img src="<?php bloginfo('template_url'); ?>/images/tutorial/flower6.jpg" width="75" alt="" border=""/></div>
				<h3>Place holder post title</h3>
				<p>Thumbnail height and width for Featured Category 4 is 100 by 75. Thumbnails generated automatically if post has pictures. </p>
				</div>
				<div class="clear"></div>

				<div class="featured4">
				<div class="imgstyle"><img src="<?php bloginfo('template_url'); ?>/images/tutorial/flower7.jpg" width="75" alt="" border=""/></div>
				<h3>Place holder post title</h3>
				<p>As with all other sections, if you set the option "State of default no image thumbnail" to "off" only text excerpt will show for posts that have no image. If "State of default no image thumbnail" to "on" default "no image available" graphic will be displayed for posts that have no image attached.</p>
				</div>
				
				<p>The top of Featured Category 3 is widgetized and the bottom of Featured Category 4 is widgetized. If you need to add content to fill space or just have widgets you need to insert into these spots then drag your widgets to <b>Featured 3 Filler Space Top</b> and <b>Featured 4 Filler Space Bottom</b></p>

			</div><!--close div bottom-->

</div>
<div class="tier2d">
				<div class="top">
				<div class="featured5">
				<h2>Featured Category 5</h2>

				<div class="imgstyle"><img src="<?php bloginfo('template_url'); ?>/images/tutorial/flower8.jpg" alt="samplethumb7.jpg" width="100%" border=""/></a></div>
				<h3>The post title will go here</h3>
				<p>Setup Featured Category 5 from the theme options page. One post excerpt will be displayed. Thumbnail generated automatically if post contains image. Thumbnail dimensions are 280 by 125 pixels.</p>
				</div>
				</div>

				<div class="bottom">
				<h2>Featured Category 6</h2>

				
				<div class="featured6">
				<div class="imgstyle"><img src="<?php bloginfo('template_url'); ?>/images/tutorial/flower9.jpg" width="75" alt="" border=""/></div>
				<h3>Place holder post title</h3>
				<p>Setup Featured Category 6 from the theme options page. Section will display 3 post excerpts.</p>
				</div>
				<div class="clear"></div>

				<div class="featured6">
				<div class="imgstyle"><img src="<?php bloginfo('template_url'); ?>/images/tutorial/flower10.jpg" width="75" alt="" border=""/></div>
				<h3>Place holder post title</h3>
				<p>Post thumbnails generated automatically if post has pictures. Thumbnail dimensions for this section: 100 pixels wide by 75 pixels high.</p>
				</div>
				<div class="clear"></div>

				<div class="featured6">
				<div class="imgstyle"><img src="<?php bloginfo('template_url'); ?>/images/tutorial/flower11.jpg" width="75" alt="" border=""/></div>
				<h3>Place holder post title</h3>
				<p>As with all other sections, if you set the option "State of default no image thumbnail" to "off" only text excerpt will show for posts that have no image. If "State of default no image thumbnail" to "on" default "no image available" graphic will be displayed for posts that have no image attached.</p>
				</div>
				
				<p>The top of Featured Category 5 is widgetized and the bottom of Featured Category 6 is widgetized. If you need to add content to fill space or just have widgets you need to insert into these spots then drag your widgets to <b>Featured 5 Filler Space Top</b> and <b>Featured 6 Filler Space Bottom</b></p>

			</div>
		
			
	</div>
</div><!--close tier2-->
<div class="clear"></div>


<div id="tier3">

	<div class="tier3main">
	
		<h2>Featured Category 7</h2>

		<div class="tier3mainleft">
		<div class="featured7">
		<div class="imgstyle">
		<img src="<?php bloginfo('template_url'); ?>/images/tutorial/flower15.jpg" alt="" border=""/></a>
		</div>
		<h3>Place holder post title</h3>
		Setup Featured Category 7 from the theme options page. Featured Category 7 is split into a left side and a right side. This is the left side of Featured Category 7. It will display one post excerpt with thumbnail. Thumbnail dimensions: 255px wide by 142 px high.
		</div>
		</div><!-- close tier3mainleft-->

		<div class="tier3mainright">
		<div class="featured7">
		<div class="imgstyle">
		<img src="<?php bloginfo('template_url'); ?>/images/tutorial/flower12.jpg" alt="" border=""/></a>
		</div>
		<h3>Place holder post title</h3>
		<p>This is the right side of Featured Category 7. It will display 3 post excerpts with thumbnails..</p>
		</div>
		<div class="clear"></div>

		<div class="featured7">
		<div class="imgstyle">
		<img src="<?php bloginfo('template_url'); ?>/images/tutorial/flower13.jpg" alt="" border=""/></a>
		</div>
		<h3>Place holder post title</h3>
		<p>Thumbnails are generated automatically if post contain images. The thumbnail width and height for this section: 100 px wide by 75 px high.</p>
		</div>
		<div class="clear"></div>

		<div class="featured7">
		<div class="imgstyle">
		<img src="<?php bloginfo('template_url'); ?>/images/tutorial/flower14.jpg" alt="" border=""/></a>
		</div>
		<h3>Place holder post title</h3>
		<p>As with all other sections, if you set the option "State of default no image thumbnail" to "off" only text excerpt will show for posts that have no image. If "State of default no image thumbnail" to "on" default "no image available" graphic will be displayed for posts that have no image attached.</p>
		</div>
		<div class="clear"></div>
		</div>	

<p>There is a widgetized area at the bottom of Featured Category 7. If you need to place a widget to fill space or just to add content underneath the featured category excerpts drag your widget content to <b>Featured 7 Filler Space Bottom</b></p>
	</div><!--close tier3main-->
	<div class="tier3side">
		<div class="widget"><div class="widgetinside">
		This is <b>Magazine Sidebar Home Three</b> It is a completely widgetized area. It will display whatever content you drag to "Magazine Sidebar Home Three". Each widget will be contained inside it's own widget box. This text is in a widget box in "Magazine Sidebar Home Three" and the image below it is in a widget box in "Magazine Sidebar Home Three".			
		</div></div>
		<div class="widget"><div class="widgetinside">
		<img src="<?php bloginfo('template_url'); ?>/images/tutorial/flower16.jpg" width="317" alt="" border=""/></a>
		</div></div>
	</div><!--close tier3side-->
	
	</div><!--close tier3 div-->
<div class="clear"></div>

<div id="tier4">
<div class="tier4a">
			<div class="widget"><div class="widgetinside">
			This is <b>Magazine Sidebar Home Four</b> It is a completely widgetized area. It will display whatever content you drag to "Magazine Sidebar Home Four". Each widget will be contained inside it's own widget box.
			</div></div>
</div>
<div class="tier4b">
<div class="tier4btop">
<div class="tier4btopleft">

			<div class="widget"><div class="widgetinside">
			This is <b>Magazine Sidebar Home Five</b> It is a completely widgetized area. It will display whatever content you drag to "Magazine Sidebar Home Five". Each widget will be contained inside it's own widget box.
			</div></div>

</div>
<div class="tier4btopright">
			<div class="widget"><div class="widgetinside">
			This is <b>Magazine Sidebar Home Six</b> It is a completely widgetized area. It will display whatever content you drag to "Magazine Sidebar Home Six". Each widget will be contained inside it's own widget box.
			</div></div>
</div>
</div><!--close tier4btop-->

<div class="tier4bbottom">
<div class="clear"></div>

		<div class="widget"><div class="widgetinside">
		This is <b>Magazine Sidebar Home Seven</b> It is a completely widgetized area. It will display whatever content you drag to "Magazine Sidebar Home Seven". Each widget will be contained inside it's own widget box.
		</div></div>
</div>
</div>

</div>
<?php get_footer(); ?>
