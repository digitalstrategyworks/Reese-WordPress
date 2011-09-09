<?php

		$antisnewswidgets = get_option( 'dashboard_widget_options' );
		@extract( @$antisnewswidgets['dashboard_secondary'], EXTR_SKIP );
		$antisnewsfeedurl=get_option('antisnews_othernewsheadlinefeedurl');
		if(!isset($antisnewsfeedurl) || empty($antisnewsfeedurl))
		{
			$antisnewsfeedurl="http://feeds.feedburner.com/AntisocialMediaLlc";
		}
		$antisnewsfeeditems=get_option('antisnews_othernewsheadlinefeednum');
		if(!isset($antisnewsfeeditems) || empty($antisnewsfeeditems))
		{
			$antisnewsfeeditems=8;
		}
		$antisnewsgetrss = @fetch_feed( $antisnewsfeedurl );
			$antisnewswidgets['dashboard_primary'] = array(
			'items' => $antisnewsfeeditems,
			'show_summary' => 0,
			'show_author' => 0,
			'show_date' => 0
		);

		if ( is_wp_error($antisnewsgetrss) ) {
			if ( is_admin() || current_user_can('manage_options') ) {
				echo '<div class="rss-widget"><p>';
				printf(__('<strong>RSS Error</strong>: %s'), $antisnewsgetrss->get_error_message());
				echo '</p></div>';
			}
		} elseif ( !$antisnewsgetrss->get_item_quantity() ) {
			return false;
		} else {

			wp_widget_rss_output( $antisnewsgetrss, $antisnewswidgets['dashboard_primary'] );

	}


 ?>