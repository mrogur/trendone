<!--</header>-->
<div class="trendone-slider carousel slide mt-2 d-sm-none" data-ride="carousel">
	<div class="carousel-inner" role="listbox">
		<?php $slider = get_posts( [ 'post_type' => 'slider', 'posts_per_page' => 5 ] ) ?>
		<?php $count = 0; ?>
		<?php foreach ( $slider as $slide ): ?>
			<div class="carousel-item <?php echo $count == 0 ? 'active' : '' ?>">
				<img class="d-block mx-auto" max-width="100%" max-height="100%"
				     src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $slide->ID ) ) ?>"
				     alt="First slide">
				<div class="container">
					<div class="carousel-caption d-none d-md-block text-left">
						<h1><?php echo $slide->post_title ?></h1>
						<p><?php echo $slide->post_content ?></p>
						<!--                        <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>-->
					</div>
				</div>
			</div>
			<?php $count ++ ?>
		<?php endforeach; ?>
	</div>
</div>
	<!--<a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>-->