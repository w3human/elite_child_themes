<?php 
get_header();
?>

<?php if ( presscore_is_content_visible() ): ?>	
<div id="content" class="content" role="main">	
<?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>
<?php $id = get_the_id(); 
$price = get_field('room_price',$id); 
$link = get_permalink();?>
	<div class="link-tab">
		<ul>
			<li><a href="#room-desc-single">Description</a></li>
			<li><a href="#room-aminites">Room Services</a></li>
			<li><a href="#similarroomsingle">Similar Room</a></li>
		</ul>
<div class="link-tab-price"><div class="left-tab-price"><?php echo $price;?></div><div class="right-tab-price">$<br/> / PER NIGHT</div></div>
	</div>
<h1 class="room-heading"><a herf="<?php echo $link;?>" class="title-link"><?php  $title = get_the_title(); echo $title;?></a></h1>
	    <div class="rating">
	    <?php $rating = get_field('rating' , $id);
			  $tagline = get_field('tag_line' , $id);
			 echo '<p>'.$tagline.'</p>';
			if($rating == 1) {
				echo '<div class="rate rate-one"></div>';
			} elseif ($rating ==2 ) {
				echo '<div class="rate rate-two"></div>';
			} elseif ($rating == 3) {
				echo '<div class="rate rate-three"></div>';
			} elseif ($rating == 4) {
				echo '<div class="rate rate-four"></div>';
			} else {
				echo '<div class="rate rate-five"></div>';
			}
			
	    ?>
	    </div> 
<?php	 the_content();
		
	   
	    $guest = get_field('max_people',$id);
	    $size = get_field('room_size',$id);
	    
	    $service = get_field('services',$id);
	    
	    $description = get_field('room_description',$id); ?>
	    
		<div class="room-detail" id="room-desc-single"><ul><li class="guest"><?php echo $guest;?> GUEST</li><li class="area"><?php echo $size;?> m²</li><li class="per-night-price"><?php echo $price;?>$ / PER NIGHT</li></ul></div>
		<div class="room-desc" id="room-aminites"><?php echo $description; ?></div>
		<div class="room-aminites">
			<h3 class="rooms-sub-heading">Room Services</h3>
			
			<?php 
			if( $service ): 
			
			?>
				<ul>
					<?php foreach( $service as $ser ): ?>
						<li class="<?php echo $ser;?>"><?php $name = ucfirst($ser); $aminites = str_replace('_', ' ', $name); echo  $aminites;?></li>
					<?php endforeach; ?>
				</ul>
				<?php endif; ?>
			
		</div>
		
		<?php endwhile; 
		else : 
			get_template_part( 'no-results', 'microsite' ); 
		endif; ?>
</div><!-- #content -->

	<?php if ( is_active_sidebar( 'sidebar_5' ) ) :
		dynamic_sidebar( 'sidebar_5' ); 
	      endif; ?>	
<?php endif; // if content visible ?>
<!--similar room-->

<div class="similar-room-demo" id="similarroomsingle">
<?php 	
$ids = get_the_id();
$similar_rooms = get_field('similar_rooms',$ids);
?>
	<div class="similar-room" id="similar-room">
			<h3 class="similar-room-head"> Similar Rooms </h3>
			<?php 
			if( $similar_rooms ): ?>
				
					<?php foreach( $similar_rooms as $room ): ?>
						
							<?php 
									$args = array(
									  'name'        => $room,
									  'post_type'   => 'room',
									  'post_status' => 'publish',
									  'numberposts' => 1
									);
							$my_posts = get_posts($args);
							if( $my_posts ) :
							foreach ( $my_posts as $post ) :
							
								$ids = get_the_id();
								$title = get_the_title();
								$guest = get_field('max_people',$ids);
								$size = get_field('room_size',$ids);
								$price = get_field('room_price',$ids);
								$service = get_field('services',$ids);
								$description = get_field('room_description',$ids);
								$link = get_permalink();
							   ?>
								<div class="booking-box">
									<div class="room-img"><?php echo get_the_post_thumbnail( $ids, 'full' );?></div>
									<div class="rating">
										<span><?php echo $tagline; ?></span>
									<?php  
									if($rating == 1) {
										echo '<div class="rate rate-one"></div>';
									} elseif ($rating ==2 ) {
										echo '<div class="rate rate-two"></div>';
									} elseif ($rating == 3) {
										echo '<div class="rate rate-three"></div>';
									} elseif ($rating == 4) {
										echo '<div class="rate rate-four"></div>';
									} else {
										echo '<div class="rate rate-five"></div>';
									}
									
									?></div>
									<div class="listing-page-content-wrap">
									<p class="room-title"><a href="<?php echo $link;?>" class="title-link"><?php echo $title; ?></a></p>
									<div class="room-detail">
										<ul>
										<li class="guest"><?php echo $guest;?> GUEST</li>
										<li class="area"><?php echo $size;?> m²</li>
										</ul>
									</div>
									<div class="room-desc"><?php echo wp_trim_words( $description, 9, '' ); ?></div>
									
									<p class="booking-btn"><a href="<?php echo $link;?>">Book Now From <?php echo $price;?> $</a></p>
									</div>
								</div>
						<?php endforeach; 
							wp_reset_postdata(); ?>
								
							<?php endif;
							?>
							<?php// echo $room; ?>
						
					<?php endforeach; ?>
				
				<?php endif; ?>
			
		</div>
		
</div>

<!--silimar room -->
<?php 
get_footer(); 
?>