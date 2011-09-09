<!-- Slideshow HTML -->

<?php if (have_posts()) : ?>

<?php $featuredpostquerynoslide = new WP_Query('cat='.$featuredpostscat.'&showposts=1'); ?>

<?php $count=0; while($featuredpostquerynoslide->have_posts()) : $featuredpostquerynoslide->the_post(); ?>




					<div <?php $thecimage = get_image_for_crop($post->ID,$thumborno='');
					if (isset($thecimage)) { echo "style=\"background:url($thecimage) no-repeat; width:550px; height:300px;\">";}
					else { echo "class=\"fsplash\">";} ?>

						<div class="fsplashover">
							<p class="fsplashheader"><a href="<?php the_permalink() ?>" rel="bookmark">

									<?php

									$thetitle=get_the_title();

									if(strlen($thetitle) > 35)
									{
										$thetitle=LimitText($thetitle,10,35,"");
									}

									echo $thetitle;

									?>

									&raquo;</a></p>
								<p>
								<span>

								<?php
				 					   	    $rcsample = get_the_content();
				 					   	  	// Remove extraneous stuff from the content text
				 					   	  	$rcstthec = strip_tags($rcsample);
				 					   	  	$rcsspthec = str_replace(' ',' ',$rcstthec );
									$rcsspthec = preg_replace( '|\[(.+?)\](.+?\[/\\1\])?|s', '', $rcsspthec );


				 					   	 	if(strlen($rcsspthec) > 160)
											{
				 					   	  		$newrcs=LimitText(trim($rcsspthec),10,160,"");
				 					   	  		echo "<p>$newrcs";

				 					   	  	?>

				 					   	  <?php

				 					   	  }
				 					   	  	else
				 					   	  	{
				 					   	  		$newrcs=$rcsspthec;
				 					   	  		echo "<p>$newrcs";
				 					   	  	}

 				 						?>
										</p><br/>
 								 		<a class="morelink" href="<?php the_permalink() ?>" rel="bookmark"><?php _e("Read More","Antisnews");?></a>
										<br/>
								</span>
								</p>
							</div>
					</div>






<?php $count++;?>
<?php endwhile; ?>
<?php endif; ?>


<!-- Slideshow HTML -->

