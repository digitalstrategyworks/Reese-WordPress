<?php //coupon form ?>

<p>Coupon name: <input type="text" name="name" size="25" value="<?php echo $the_coupon['name']; ?>" /></p>
			
<p>Content: <textarea name="content" rows="6" cols="60"><?php echo $the_coupon['content']; ?></textarea></p>