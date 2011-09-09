<?php
$numtodisplay=7;
$before="<li>";
$after="</li>";
$show_pass_post='';
$duration='';
global $wpdb;
$hottopics = "SELECT ID, post_title, COUNT($wpdb->comments.comment_post_ID) AS 'comment_count' FROM $wpdb->posts, $wpdb->comments";
$hottopics .= " WHERE comment_approved = '1' AND $wpdb->posts.ID=$wpdb->comments.comment_post_ID AND post_status = 'publish'";
if(!$show_pass_post) $request .= " AND post_password =''";
if($duration !="") { $request .= " AND DATE_SUB(CURDATE(),INTERVAL ".$duration." DAY) < post_date ";
}
$hottopics .= " GROUP BY $wpdb->comments.comment_post_ID ORDER BY comment_count DESC LIMIT $numtodisplay";
$posts = $wpdb->get_results($hottopics);
$return = '';
if ($posts) {
foreach ($posts as $post) {
$post_title = stripslashes($post->post_title);

if(strlen($post_title) > 35){
$post_title=LimitText($post_title,10,35,"");
$post_title.="...";
}

$comment_count = $post->comment_count;
$permalink = get_permalink($post->ID);
$return .= $before . '<a href="' . $permalink . '" title="' . $post_title.'">' . $post_title . '</a>' . $after;
}
} else {
$return .= $before . __("No hot topics found") . $after;
}
echo $return;


?>