<?php get_header(); ?>
<div class="main_body_mobile">           
	<div class="wrapper">
		<div class="ui-body ui-body-c">
		        		
		  <table border="0" cellpadding="0" cellspacing="0" width="100%">
		  <tbody>
		      <tr>
		      
		          <td valign="top" style="width:100%;">
		              <div id="container">
		  
		                  <?php if(have_posts()) : ?>
		                  <?php while(have_posts()) : the_post(); ?>
		  
		                      <div class="post_mobile" id="post-<?php the_ID(); ?>">
		  
		                          <div class="post_the_title">
		                              <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
		                          </div>        
		                          
				<div class="entry">                        
					 <script src="http://widgets.twimg.com/j/2/widget.js"></script>
					<script>
						new TWTR.Widget({
						  version: 2,
						  type: 'search',
						  search: 'uncdm2011',
						  interval: 6000,
						  title: '',
						  subject: '',
						  width: '240',
						  height: 'auto; -arnom-nl: 0',
						  theme: {
						    shell: {
						      background: 'transparent',
						      color: '#21d3ff'
						    },
						    tweets: {
						      background: 'transparent',
						      color: '#444444',
						      links: '#1985b5'
						    }
						  },
						  features: {
						    scrollbar: false,
						    loop: false,
						    live: true,
						    hashtags: true,
						    timestamp: false,
						    avatars: true,
						    toptweets: false,
						    behavior: 'all'
						  }
						}).render().start();
					</script>
		            
				</div>
		                          
		                          <div class="comments-template">
									<?php comments_template(); ?>
		                          </div>                                              	
		  
		                      </div>                    
		  
		                  <?php endwhile; ?>
		                  
		                  <?php else : ?>
		  
		                      <div class="post" id="post-<?php the_ID(); ?>">
		                          <h2><?php _e('No posts are added.'); ?></h2>
		                      </div>
		  
		                  <?php endif; ?>
		                  
		              </div>
		          </td>
				</tr>
		  </tbody>
		  </table>  
	        
		</div>
	</div>
</div>
<?php get_footer(); ?>        