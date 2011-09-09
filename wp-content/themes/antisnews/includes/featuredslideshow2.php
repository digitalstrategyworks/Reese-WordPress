<!-- Slideshow HTML -->



<?php if (have_posts()) : ?>
     <div id="slider1">
	        <ul id="slider1Content">

<?php $antisfslidenum=get_option('antisnews_numpostsfeatured'); if(!isset($antisfslidenum) || empty($antisfslidenum)){$antisfslidenum=5;} ?>


<?php $antisfslidepquer = new WP_Query('cat='.$featuredpostscat.'&showposts='.$antisfslidenum); ?>

<?php $count=0; while($antisfslidepquer->have_posts()) : $antisfslidepquer->the_post(); ?>






	            <li class="slider1Image">
	                <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e("Permanent Link to","Antisnews");?> <?php the_title_attribute(); ?>">
	                <?php
	  				$thecimage = get_image_for_crop($post->ID,$thumborno='');

	  							if(isset($thecimage) ) { ?>

	  			  				<img src="<?php echo bloginfo('template_url'); ?>/cropper.php?src=<?php echo $thecimage; ?>&amp;h=300&amp;w=550&amp;zc=1&amp;q=95" alt="<?php the_title(); ?>" />


	  			  				<?php } ?>

	  			  	</a>
	                <span class="<?php $sliderpossiblepos=array('slidertop','sliderbottom','sliderleft','sliderright');
echo $sliderpossiblepos[array_rand($sliderpossiblepos)]; ?>">
	                <p class="fsplashheader"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e("Permanent Link to","Antisnews");?> <?php the_title_attribute(); ?>">


									<?php

									$thetitle=get_the_title();

									if(strlen($thetitle) > 35)
									{
										$thetitle=LimitText($thetitle,10,35,"");
									}

									echo $thetitle;

									?>

									&raquo;



	                </a></p>
	                <?php
         	  									      $arcsample = get_the_content();
		 	  											// Remove extraneous stuff from the content text
		 	  											$arcstthec = strip_tags($arcsample);
		 	  											$arcsspthec = str_replace(' ',' ',$arcstthec );
														$arcsspthec = preg_replace( '|\[(.+?)\](.+?\[/\\1\])?|s', '', $arcsspthec );

				 					   	 	if(strlen($arcsspthec) > 160)
											{
				 					   	  		$newrcs=LimitText(trim($arcsspthec),10,160,"");
				 					   	  		echo "<p>$newrcs";

				 					   	  	?>

				 					   	  <?php

				 					   	  }
				 					   	  	else
				 					   	  	{
				 					   	  		$newrcs=$arcsspthec;
				 					   	  		echo "<p>$newrcs";
				 					   	  	}

				 					   	  	?>

	  										</p>
											<a class="morelink" href="<?php the_permalink() ?>" rel="bookmark"><?php _e("Read More","Antisnews");?></a>
	  	</span>
	            </li>






<?php $count++;?>
<?php endwhile; ?>
</ul><div class="clear sliderImage"></div>
    </div>
<?php endif; ?>



<!-- Slideshow HTML -->

