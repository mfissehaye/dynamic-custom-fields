<div class="post post-webinar-template carousel-cell">
	<div class="img-container" style="width: 100%; min-height: 200px; background: black;">
		<?php $thumbnail_src_url = get_the_post_thumbnail_url($post) ?>
		<?php if($thumbnail_src_url): ?><img src="<?php echo $thumbnail_src_url ?>" alt=""><?php endif ?>
	</div>
	<h3 class="title"><?php echo $post->post_title; ?></h3>
	<p class="content"><?php echo get_custom_post_excerpt($post); ?> <a href="<?php echo get_post_permalink($post->ID) ?>"><strong class="readmore">Read more</strong></a></p>
	<div class="text-left"><a href="#" class="btn btn-danger" style="">Register Now</a></div>
</div>