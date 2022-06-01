<?php
/**
 * Available Liber Custom Widgets
 *
 * Learn more: http://codex.wordpress.org/Widgets_API#Developing_Widgets
 *
 * @package Liber
 * @since Liber 1.0
 */

/*-----------------------------------------------------------------------------------*/
/* Custom liber Widget: Promo Block
/*-----------------------------------------------------------------------------------*/
class Liber_Order_Block extends WP_Widget {
	function __construct() {
		$widget_ops = array( 'description' => esc_html__( 'Promo Block', 'liber' ) );
		parent::__construct( false, esc_html__( 'Liber: Promo Block', 'liber' ),$widget_ops );
	}

	function widget( $args, $instance ) {
		$title = null; $imageurl = null; $imagealt = null; $tagline = null; $heading = null; $heading1 = null; $heading2 = null; $buttontext = null; $buttonlink = null;
		if ( ! empty( $instance['title'] ) ) { $title = apply_filters( 'widget_title', $instance['title'] ); }
		if ( ! empty( $instance['imageurl'] ) ) { $imageurl = $instance['imageurl']; }
		if ( ! empty( $instance['imagealt'] ) ) { $imagealt = $instance['imagealt']; }
		if ( ! empty( $instance['tagline'] ) ) { $tagline = $instance['tagline']; }
		if ( ! empty( $instance['heading'] ) ) { $heading = $instance['heading']; }
		if ( ! empty( $instance['heading1'] ) ) { $heading1 = $instance['heading1']; }
		if ( ! empty( $instance['heading2'] ) ) { $heading2 = $instance['heading2']; }
		if ( ! empty( $instance['buttontext'] ) ) { $buttontext = $instance['buttontext']; }
		if ( ! empty( $instance['buttonlink'] ) ) { $buttonlink = $instance['buttonlink']; }
		echo $args['before_widget']; ?>
		<?php if( ! empty( $title ) )
			echo '<div class="widget-title-wrap"><h3 class="widget-title"><span>'. esc_html( $title ) .'</span></h3></div>'; ?>

		<div class="image-banner">
			<img class="image" src="<?php echo esc_url( $imageurl ); ?>" alt="<?php echo esc_html( $imagealt ); ?>">
			<div class="content ">
				<span class="title-tagline"><?php echo esc_html( $tagline ); ?></span>
				<h4 class="entry-title"><?php echo esc_html( $heading ); ?>
				<br><span class="color"><?php echo esc_html( $heading1 ); ?></span><br>
				<?php echo esc_html( $heading2 ); ?></h4>
				<a href="<?php echo esc_url( $buttonlink ); ?>" class="button"><?php echo esc_html( $buttontext ); ?></a>
			</div>
		</div>

		<?php
		echo $args['after_widget'];
		// Reset the post globals as this query will have stomped on it
		wp_reset_postdata();
		}
	function update ($new_instance, $old_instance ) {
		$instance['title'] = $new_instance['title'];
		$instance['imageurl'] = $new_instance['imageurl'];
		$instance['imagealt'] = $new_instance['imagealt'];
		$instance['tagline'] = $new_instance['tagline'];
		$instance['heading'] = $new_instance['heading'];
		$instance['heading1'] = $new_instance['heading1'];
		$instance['heading2'] = $new_instance['heading2'];
		$instance['buttontext'] = $new_instance['buttontext'];
		$instance['buttonlink'] = $new_instance['buttonlink'];
		return $new_instance;
	}
	function form( $instance ) {
		$title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$imageurl = isset( $instance['imageurl'] ) ? esc_attr( $instance['imageurl'] ) : 'http://www.anarieldesign.com/themedemos/liber/wp-content/uploads/2016/11/blog2-391x380.jpg';
		$imagealt = isset( $instance['imagealt'] ) ? esc_attr( $instance['imagealt'] ) : 'events';
		$tagline = isset( $instance['tagline'] ) ? esc_attr( $instance['tagline'] ) : 'Join Today';
		$heading = isset( $instance['heading'] ) ? esc_attr( $instance['heading'] ) : 'Liber.';
		$heading1 = isset( $instance['heading1'] ) ? esc_attr( $instance['heading1'] ) : 'Upcoming';
		$heading2 = isset( $instance['heading2'] ) ? esc_attr( $instance['heading2'] ) : 'Events';
		$buttontext = isset( $instance['buttontext'] ) ? esc_attr( $instance['buttontext'] ) : 'Reserve Now';
		$buttonlink = isset( $instance['buttonlink'] ) ? esc_attr( $instance['buttonlink'] ) : 'http://www.varionica.com/';
	?>
	<p> <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:','liber' ); ?></label>
		<input type="text" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $title ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" /></p>
	<p><label for="<?php echo $this->get_field_id( 'imageurl' ); ?>"><?php esc_html_e( 'Image URL','liber' ); ?></label>
	<input type="text" name="<?php echo esc_attr( $this->get_field_name( 'imageurl' ) ); ?>" value="<?php echo esc_attr( $imageurl ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'imageurl' ); ?>" /></p>
	<p><label for="<?php echo $this->get_field_id( 'imagealt' ); ?>"><?php esc_html_e( 'Image ALT Text','liber' ); ?></label>
	<input type="text" name="<?php echo esc_attr( $this->get_field_name( 'imagealt' ) ); ?>" value="<?php echo esc_attr( $imagealt ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'imagealt' ); ?>" /></p>
	<p> <label for="<?php echo $this->get_field_id( 'tagline' ); ?>"><?php esc_html_e( 'Tagline','liber' ); ?></label>
		<input type="text" name="<?php echo esc_attr( $this->get_field_name( 'tagline' ) ); ?>" value="<?php echo esc_attr( $tagline ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'tagline' ); ?>" /></p>
	<p> <label for="<?php echo $this->get_field_id( 'heading' ); ?>"><?php esc_html_e( 'Heading First Line','liber' ); ?></label>
		<input type="text" name="<?php echo esc_attr( $this->get_field_name( 'heading' ) ); ?>" value="<?php echo esc_attr( $heading ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'heading' ); ?>" /></p>
	<p> <label for="<?php echo $this->get_field_id( 'heading1' ); ?>"><?php esc_html_e( 'Heading Second Line','liber' ); ?></label>
		<input type="text" name="<?php echo esc_attr( $this->get_field_name( 'heading1' ) ); ?>" value="<?php echo esc_attr( $heading1 ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'heading1' ); ?>" /></p>
	<p> <label for="<?php echo $this->get_field_id( 'heading2' ); ?>"><?php esc_html_e( 'Heading Third Line','liber' ); ?></label>
		<input type="text" name="<?php echo esc_attr( $this->get_field_name( 'heading2' ) ); ?>" value="<?php echo esc_attr( $heading2 ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'heading2' ); ?>" /></p>
	<p> <label for="<?php echo $this->get_field_id( 'buttontext' ); ?>"><?php esc_html_e( 'Button Text','liber' ); ?></label>
	<input type="text" name="<?php echo esc_attr( $this->get_field_name( 'buttontext' ) ); ?>" value="<?php echo esc_attr( $buttontext ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'buttontext' ); ?>" /></p>
	<p> <label for="<?php echo $this->get_field_id( 'buttonlink' ); ?>"><?php esc_html_e( 'Button Link','liber' ); ?></label>
	<input type="text" name="<?php echo esc_attr( $this->get_field_name( 'buttonlink' ) ); ?>" value="<?php echo esc_attr( $buttonlink ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'buttonlink' ); ?>" /></p>
	<?php
	}
}
register_widget( 'Liber_Order_Block' );

/*-----------------------------------------------------------------------------------*/
/* Custom liber Widget: Opening Hours
/*-----------------------------------------------------------------------------------*/
class Liber_Opening_Hours extends WP_Widget {
	function __construct() {
		$widget_ops = array( 'description' => esc_html__( 'Opening Hours', 'liber' ) );
		parent::__construct( false, esc_html__( 'Liber: Opening Hours', 'liber' ),$widget_ops );
	}

	function widget( $args, $instance ) {
		$title = null; $day1 = null; $hour1 = null; $day2 = null; $hour2 = null; $day3 = null; $hour3 = null; $day4 = null; $hour4 = null; $day5 = null; $hour5 = null; $day6 = null; $hour6 = null; $day7 = null; $hour7 = null; $imageurl = null; $imagealt = null;
		if ( ! empty( $instance['title'] ) ) { $title = apply_filters( 'widget_title', $instance['title'] ); }
		if ( ! empty( $instance['imageurl'] ) ) { $imageurl = $instance['imageurl']; }
		if ( ! empty( $instance['imagealt'] ) ) { $imagealt = $instance['imagealt']; }
		if ( ! empty( $instance['day1'] ) ) { $day1 = $instance['day1']; }
		if ( ! empty( $instance['hour1'] ) ) { $hour1 = $instance['hour1']; }
		if ( ! empty( $instance['day2'] ) ) { $day2 = $instance['day2']; }
		if ( ! empty( $instance['hour2'] ) ) { $hour2 = $instance['hour2']; }
		if ( ! empty( $instance['day3'] ) ) { $day3 = $instance['day3']; }
		if ( ! empty( $instance['hour3'] ) ) { $hour3 = $instance['hour3']; }
		if ( ! empty( $instance['day4'] ) ) { $day4 = $instance['day4']; }
		if ( ! empty( $instance['hour4'] ) ) { $hour4 = $instance['hour4']; }
		if ( ! empty( $instance['day5'] ) ) { $day5 = $instance['day5']; }
		if ( ! empty( $instance['hour5'] ) ) { $hour5 = $instance['hour5']; }
		if ( ! empty( $instance['day6'] ) ) { $day6 = $instance['day6']; }
		if ( ! empty( $instance['hour6'] ) ) { $hour6 = $instance['hour6']; }
		if ( ! empty( $instance['day7'] ) ) { $day7 = $instance['day7']; }
		if ( ! empty( $instance['hour7'] ) ) { $hour7 = $instance['hour7']; }
		echo $args['before_widget']; ?>
		<?php if( ! empty( $title ) )
			echo '<div class="widget-title-wrap"><h3 class="widget-title"><span>'. esc_html( $title ) .'</span></h3></div>'; ?>

		<div class="opening-hours">
		<img class="image" src="<?php echo esc_url( $imageurl ); ?>" alt="<?php echo esc_html( $imagealt ); ?>">
		<ul>
			<li><?php echo esc_html( $day1 ); ?> <span class="hours"><?php echo esc_html( $hour1 ); ?></span></li>
			<li><?php echo esc_html( $day2 ); ?> <span class="hours"><?php echo esc_html( $hour2 ); ?></span></li>
			<li><?php echo esc_html( $day3 ); ?> <span class="hours"><?php echo esc_html( $hour3 ); ?></span></li>
			<li><?php echo esc_html( $day4 ); ?> <span class="hours"><?php echo esc_html( $hour4 ); ?></span></li>
			<li><?php echo esc_html( $day5 ); ?> <span class="hours"><?php echo esc_html( $hour5 ); ?></span></li>
			<li><?php echo esc_html( $day6 ); ?> <span class="hours"><?php echo esc_html( $hour6 ); ?></span></li>
			<li><?php echo esc_html( $day7 ); ?> <span class="hours"><?php echo esc_html( $hour7 ); ?></span></li>
		</ul>
		</div>

		<?php
		echo $args['after_widget'];
		// Reset the post globals as this query will have stomped on it
		wp_reset_postdata();
		}
	function update ($new_instance, $old_instance ) {
		$instance['title'] = $new_instance['title'];
		$instance['imageurl'] = $new_instance['imageurl'];
		$instance['imagealt'] = $new_instance['imagealt'];
		$instance['day1'] = $new_instance['day1'];
		$instance['hour1'] = $new_instance['hour1'];
		$instance['day2'] = $new_instance['day2'];
		$instance['hour2'] = $new_instance['hour2'];
		$instance['day3'] = $new_instance['day3'];
		$instance['hour3'] = $new_instance['hour3'];
		$instance['day4'] = $new_instance['day4'];
		$instance['hour4'] = $new_instance['hour4'];
		$instance['day5'] = $new_instance['day5'];
		$instance['hour5'] = $new_instance['hour5'];
		$instance['day6'] = $new_instance['day6'];
		$instance['hour6'] = $new_instance['hour6'];
		$instance['day7'] = $new_instance['day7'];
		$instance['hour7'] = $new_instance['hour7'];
		return $new_instance;
	}
	function form( $instance ) {
		$title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$imageurl = isset( $instance['imageurl'] ) ? esc_attr( $instance['imageurl'] ) : 'http://www.anarieldesign.com/themedemos/liber/wp-content/uploads/2016/11/blog2-391x380.jpg';
		$imagealt = isset( $instance['imagealt'] ) ? esc_attr( $instance['imagealt'] ) : 'opening hours';
		$day1 = isset( $instance['day1'] ) ? esc_attr( $instance['day1'] ) : 'Monday';
		$hour1 = isset( $instance['hour1'] ) ? esc_attr( $instance['hour1'] ) : '11:00-23:00';
		$day2 = isset( $instance['day2'] ) ? esc_attr( $instance['day2'] ) : 'Tuesday';
		$hour2 = isset( $instance['hour2'] ) ? esc_attr( $instance['hour2'] ) : '11:00-23:00';
		$day3 = isset( $instance['day3'] ) ? esc_attr( $instance['day3'] ) : 'Wednesday';
		$hour3 = isset( $instance['hour3'] ) ? esc_attr( $instance['hour3'] ) : 'CLOSED';
		$day4 = isset( $instance['day4'] ) ? esc_attr( $instance['day4'] ) : 'Thursday';
		$hour4 = isset( $instance['hour4'] ) ? esc_attr( $instance['hour4'] ) : '11:00-22:00';
		$day5 = isset( $instance['day5'] ) ? esc_attr( $instance['day5'] ) : 'Friday';
		$hour5 = isset( $instance['hour5'] ) ? esc_attr( $instance['hour5'] ) : '11:00-24:00';
		$day6 = isset( $instance['day6'] ) ? esc_attr( $instance['day6'] ) : 'Saturday';
		$hour6 = isset( $instance['hour6'] ) ? esc_attr( $instance['hour6'] ) : '11:00-24:00';
		$day7 = isset( $instance['day7'] ) ? esc_attr( $instance['day7'] ) : 'Sunday';
		$hour7 = isset( $instance['hour7'] ) ? esc_attr( $instance['hour7'] ) : '11:00-22:00';
	?>
	<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:','liber' ); ?></label>
		<input type="text" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $title ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" /></p>

	<p><label for="<?php echo $this->get_field_id( 'imageurl' ); ?>"><?php esc_html_e( 'Image URL','liber' ); ?></label>
	<input type="text" name="<?php echo esc_attr( $this->get_field_name( 'imageurl' ) ); ?>" value="<?php echo esc_attr( $imageurl ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'imageurl' ); ?>" /></p>
	<p><label for="<?php echo $this->get_field_id( 'imagealt' ); ?>"><?php esc_html_e( 'Image ALT Text','liber' ); ?></label>
	<input type="text" name="<?php echo esc_attr( $this->get_field_name( 'imagealt' ) ); ?>" value="<?php echo esc_attr( $imagealt ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'imagealt' ); ?>" /></p>

	<p><label for="<?php echo $this->get_field_id( 'day1' ); ?>"><?php esc_html_e( 'Day 1','liber' ); ?></label>
	<input type="text" name="<?php echo esc_attr( $this->get_field_name( 'day1' ) ); ?>" value="<?php echo esc_attr( $day1 ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'day1' ); ?>" /></p>
	<p><label for="<?php echo $this->get_field_id( 'hour1' ); ?>"><?php esc_html_e( 'Hours 1','liber' ); ?></label>
	<input type="text" name="<?php echo esc_attr( $this->get_field_name( 'hour1' ) ); ?>" value="<?php echo esc_attr( $hour1 ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'hour1' ); ?>" /></p>

	<p><label for="<?php echo $this->get_field_id( 'day2' ); ?>"><?php esc_html_e( 'Day 2','liber' ); ?></label>
	<input type="text" name="<?php echo esc_attr( $this->get_field_name( 'day2' ) ); ?>" value="<?php echo esc_attr( $day2 ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'day2' ); ?>" /></p>
	<p><label for="<?php echo $this->get_field_id( 'hour2' ); ?>"><?php esc_html_e( 'Hours 2','liber' ); ?></label>
	<input type="text" name="<?php echo esc_attr( $this->get_field_name( 'hour2' ) ); ?>" value="<?php echo esc_attr( $hour2 ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'hour2' ); ?>" /></p>

	<p><label for="<?php echo $this->get_field_id( 'day3' ); ?>"><?php esc_html_e( 'Day 3','liber' ); ?></label>
	<input type="text" name="<?php echo esc_attr( $this->get_field_name( 'day3' ) ); ?>" value="<?php echo esc_attr( $day3 ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'day3' ); ?>" /></p>
	<p><label for="<?php echo $this->get_field_id( 'hour3' ); ?>"><?php esc_html_e( 'Hours 3','liber' ); ?></label>
	<input type="text" name="<?php echo esc_attr( $this->get_field_name( 'hour3' ) ); ?>" value="<?php echo esc_attr( $hour3 ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'hour3' ); ?>" /></p>

	<p><label for="<?php echo $this->get_field_id( 'day4' ); ?>"><?php esc_html_e( 'Day 4','liber' ); ?></label>
	<input type="text" name="<?php echo esc_attr( $this->get_field_name( 'day4' ) ); ?>" value="<?php echo esc_attr( $day4 ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'day4' ); ?>" /></p>
	<p><label for="<?php echo $this->get_field_id( 'hour4' ); ?>"><?php esc_html_e( 'Hours 4','liber' ); ?></label>
	<input type="text" name="<?php echo esc_attr( $this->get_field_name( 'hour4' ) ); ?>" value="<?php echo esc_attr( $hour4 ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'hour4' ); ?>" /></p>

	<p><label for="<?php echo $this->get_field_id( 'day5' ); ?>"><?php esc_html_e( 'Day 5','liber' ); ?></label>
	<input type="text" name="<?php echo esc_attr( $this->get_field_name( 'day5' ) ); ?>" value="<?php echo esc_attr( $day5 ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'day5' ); ?>" /></p>
	<p><label for="<?php echo $this->get_field_id( 'hour5' ); ?>"><?php esc_html_e( 'Hours 5','liber' ); ?></label>
	<input type="text" name="<?php echo esc_attr( $this->get_field_name( 'hour5' ) ); ?>" value="<?php echo esc_attr( $hour5 ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'hour5' ); ?>" /></p>

	<p><label for="<?php echo $this->get_field_id( 'day6' ); ?>"><?php esc_html_e( 'Day 6','liber' ); ?></label>
	<input type="text" name="<?php echo esc_attr( $this->get_field_name( 'day6' ) ); ?>" value="<?php echo esc_attr( $day6 ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'day6' ); ?>" /></p>
	<p><label for="<?php echo $this->get_field_id( 'hour6' ); ?>"><?php esc_html_e( 'Hours 6','liber' ); ?></label>
	<input type="text" name="<?php echo esc_attr( $this->get_field_name( 'hour6' ) ); ?>" value="<?php echo esc_attr( $hour6 ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'hour6' ); ?>" /></p>

	<p><label for="<?php echo $this->get_field_id( 'day7' ); ?>"><?php esc_html_e( 'Day 7','liber' ); ?></label>
	<input type="text" name="<?php echo esc_attr( $this->get_field_name( 'day7' ) ); ?>" value="<?php echo esc_attr( $day7 ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'day7' ); ?>" /></p>
	<p><label for="<?php echo $this->get_field_id( 'hour7' ); ?>"><?php esc_html_e( 'Hours 1','liber' ); ?></label>
	<input type="text" name="<?php echo esc_attr( $this->get_field_name( 'hour7' ) ); ?>" value="<?php echo esc_attr( $hour7 ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'hour7' ); ?>" /></p>
	<?php
	}
}
register_widget( 'Liber_Opening_Hours' );

/*-----------------------------------------------------------------------------------*/
/* Custom Liber Widget: Recent Posts
/*-----------------------------------------------------------------------------------*/
class Liber_Recent_Post extends WP_Widget {
	function __construct() {
		$widget_ops = array( 'description' => esc_html__( 'One, two or three column recent post widget.', 'liber' ) );
		parent::__construct( false, esc_html__( 'Liber Recent Posts', 'liber' ), $widget_ops );
	}
	function widget( $args, $instance ) {
		$title = null; $postnumber = null; $category = null; $columns = null;
		if ( ! empty( $instance['title'] ) ) { $title = apply_filters( 'widget_title', $instance['title'] ); }
		if ( ! empty( $instance['postnumber'] ) ) { $postnumber = $instance['postnumber']; }
		if ( ! empty( $instance['columns'] ) ) { $columns = $instance['columns']; }
		if ( ! empty( $instance['category'] ) ) { $category = apply_filters( 'widget_title', $instance['category'] ); }
		echo $args['before_widget']; ?>
		<?php if( ! empty( $title ) )
			echo '<div class="widget-title-wrap"><h3 class="widget-title"><span>'. esc_html( $title ) .'</span></h3></div>'; ?>
<?php
// The Query
$recent_query = new WP_Query(array (
		'post_status'	=> 'publish',
		'posts_per_page' => absint( $postnumber ),
		'ignore_sticky_posts' => 1,
		'cat' => $category,
	) );
?>
<div class="liber-panel">
<div class="recent-post child-pages columns clear">
<?php
// The Loop
if( $recent_query->have_posts() ) : ?>
	<?php while( $recent_query->have_posts()) : $recent_query->the_post() ?>
	<div class="<?php echo esc_html( $columns ); ?>">
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<a href="<?php the_permalink(); ?>">
			<?php liber_post_thumbnail(); ?>
		</a>

		<header class="entry-header">

			<div class="entry-meta">
				<span class="posted-on">
					<span class="month"><?php the_date('d-M'); ?></span>
				</span>
			</div><!-- .entry-meta -->

				<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		</header><!-- .entry-header -->

	</article><!-- #post-## -->
	</div>
	<?php endwhile ?>
<?php endif ?>
</div></div>
		<?php
		echo $args['after_widget'];
		// Reset the post globals as this query will have stomped on it
		wp_reset_postdata();
		}
	function update( $new_instance, $old_instance ) {
		$instance['title'] = $new_instance['title'];
		$instance['postnumber'] = $new_instance['postnumber'];
		$instance['columns'] = $new_instance['columns'];
		$instance['category'] = $new_instance['category'];
		return $new_instance;
	}
	function form( $instance ) {
		$title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$postnumber = isset( $instance['postnumber'] ) ? esc_attr( $instance['postnumber'] ) : '4';
		$columns = isset( $instance['columns'] ) ? esc_attr( $instance['columns'] ) : 'fourcolumn';
		$category = isset( $instance['category'] ) ? esc_attr( $instance['category'] ) : '';
	?>
	<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:','liber' ); ?></label>
		<input type="text" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $title ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" /></p>
	<p><label for="<?php echo $this->get_field_id( 'postnumber' ); ?>"><?php esc_html_e( 'Number of posts to show:','liber' ); ?></label>
		<input type="text" name="<?php echo esc_attr( $this->get_field_name( 'postnumber' ) ); ?>" value="<?php echo esc_attr( $postnumber ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'postnumber' ); ?>" /></p>
	<p><label for="<?php echo $this->get_field_id( 'columns' ); ?>"><?php esc_html_e( 'Number of columns to show:','liber' ); ?></label>
	<select name="<?php echo $this->get_field_name( 'columns' ); ?>" id="<?php echo $this->get_field_id( 'columns' ); ?>" class="widefat">
	<?php
	$options = array(
		'threecolumn' => 'Three Columns',
		'twocolumn'   => 'Two Columns',
		'onecolumn'   => 'One Column'
	);
	$option = '';
	foreach ( $options as $class => $label ) {
	echo '<option value="' . $class . '" id="' . $option . '"', $columns == $class ? ' selected="selected"' : '', '>', $label, '</option>';
	}
	?>
	</select>
	<p><label for="<?php echo $this->get_field_id( 'category' ); ?>"><?php esc_html_e( 'Category:', 'liber' ); ?></label></p>
	<?php
			wp_dropdown_categories( array(
				'orderby'    => 'title',
				'hide_empty' => false,
				'name'       => $this->get_field_name( 'category' ),
				'class'      => 'widefat',
				'show_option_all' => 'all categories',
				'selected'   => $category
			) );
			?>
<hr />
	<?php
	}
}
register_widget( 'Liber_Recent_Post' );

/*-----------------------------------------------------------------------------------*/
/* Custom Liber Widget: Testimonial Posts
/*-----------------------------------------------------------------------------------*/
class Liber_Testimonials_Post extends WP_Widget {
	function __construct() {
		$widget_ops = array( 'description' => esc_html__( 'One, two or three column testimonial post widget.', 'liber' ) );
		parent::__construct( false, esc_html__( 'Liber Testimonial Posts', 'liber' ), $widget_ops );
	}
	function widget( $args, $instance ) {
		$title = null; $postnumber = null; $columns = null;
		if ( ! empty( $instance['title'] ) ) { $title = apply_filters( 'widget_title', $instance['title'] ); }
		if ( ! empty( $instance['postnumber'] ) ) { $postnumber = $instance['postnumber']; }
		if ( ! empty( $instance['columns'] ) ) { $columns = $instance['columns']; }
		echo $args['before_widget']; ?>
		<?php if( ! empty( $title ) )
			echo '<div class="widget-title-wrap"><h3 class="widget-title"><span>'. esc_html( $title ) .'</span></h3></div>'; ?>
<?php
// The Query
$testimonials = new WP_Query(array (
		'post_type'   => 'testimonials',
		'post_status'	=> 'publish',
		'posts_per_page' => absint( $postnumber ),
	) );
?>
<div class="liber-panel">
<div class="testimonials clear">
<?php
// The Loop
if( $testimonials->have_posts() ) : ?>
	<?php while( $testimonials->have_posts()) : $testimonials->the_post() ?>
	<div class="<?php echo esc_html( $columns ); ?>">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">

			<?php if ( has_post_thumbnail() ) { ?>
			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div>
			<?php } ?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php
				/* translators: %s: Name of current post */
				the_content( sprintf(
					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'liber' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );
			?>

			<?php the_title( sprintf( '<h3 class="entry-title">', esc_url( get_permalink() ) ), '</h3>' ); ?>

			<?php edit_post_link( esc_html__( 'Edit', 'liber' ), '<span class="edit-link">', '</span>' ); ?>

			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'liber' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->
	</article><!-- #post-## -->
	</div>
	<?php endwhile ?>
<?php endif ?>
</div></div>
		<?php
		echo $args['after_widget'];
		// Reset the post globals as this query will have stomped on it
		wp_reset_postdata();
		}
	function update( $new_instance, $old_instance ) {
		$instance['title'] = $new_instance['title'];
		$instance['postnumber'] = $new_instance['postnumber'];
		$instance['columns'] = $new_instance['columns'];
		return $new_instance;
	}
	function form( $instance ) {
		$title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$postnumber = isset( $instance['postnumber'] ) ? esc_attr( $instance['postnumber'] ) : '4';
		$columns = isset( $instance['columns'] ) ? esc_attr( $instance['columns'] ) : 'fourcolumn';
	?>
	<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:','liber' ); ?></label>
		<input type="text" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $title ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" /></p>
	<p><label for="<?php echo $this->get_field_id( 'postnumber' ); ?>"><?php esc_html_e( 'Number of posts to show:','liber' ); ?></label>
		<input type="text" name="<?php echo esc_attr( $this->get_field_name( 'postnumber' ) ); ?>" value="<?php echo esc_attr( $postnumber ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'postnumber' ); ?>" /></p>
	<p><label for="<?php echo $this->get_field_id( 'columns' ); ?>"><?php esc_html_e( 'Number of columns to show:','liber' ); ?></label>
	<select name="<?php echo $this->get_field_name( 'columns' ); ?>" id="<?php echo $this->get_field_id( 'columns' ); ?>" class="widefat">
	<?php
	$options = array(
		'threecolumn' => 'Three Columns',
		'twocolumn'   => 'Two Columns',
		'onecolumn'   => 'One Column'
	);
	$option = '';
	foreach ( $options as $class => $label ) {
	echo '<option value="' . $class . '" id="' . $option . '"', $columns == $class ? ' selected="selected"' : '', '>', $label, '</option>';
	}
	?>
	</select>
<hr />
	<?php
	}
}
register_widget( 'Liber_Testimonials_Post' );

/*-----------------------------------------------------------------------------------*/
/* Custom Liber Widget: Food Menu Posts
/*-----------------------------------------------------------------------------------*/
class Liber_Food_Menu_Post extends WP_Widget {
	function __construct() {
		$widget_ops = array( 'description' => esc_html__( 'Food menu post widget.', 'liber' ) );
		parent::__construct( false, esc_html__( 'Liber Food Menu Posts', 'liber' ), $widget_ops );
	}
	function widget( $args, $instance ) {
		$title = null; $postnumber = null; $menucategory = null;
		if ( ! empty( $instance['title'] ) ) { $title = apply_filters( 'widget_title', $instance['title'] ); }
		if ( ! empty( $instance['postnumber'] ) ) { $postnumber = $instance['postnumber']; }
		if ( ! empty( $instance['menucategory'] ) ) { $menucategory = apply_filters( 'menucategory', $instance['menucategory'] ); }
		echo $args['before_widget']; ?>
		<?php if( ! empty( $title ) )
			echo '<div class="widget-title-wrap"><h3 class="widget-title"><span>'. esc_html( $title ) .'</span></h3></div>'; ?>
<?php
// The Query
$menu = new WP_Query(array (
		'post_type'   => 'menu',
		'post_status'	=> 'publish',
		'posts_per_page' => absint( $postnumber ),
		'menu_category' => $menucategory,
	) );
?>
<div class="liber-panel">
<div class="special-offer clear">
<?php
// The Loop
if( $menu->have_posts() ) : ?>
	<?php while( $menu->have_posts()) : $menu->the_post() ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
	</header><!-- .entry-header -->

	<?php if ( '' != get_the_content() ) : ?>
		<div class="entry-content">
		<div class="menu-content">
			<?php the_post_thumbnail( 'liber-menu-widget-thumbnail' ); ?>
			<?php
				the_content( sprintf(
					/* translators: %s: Name of current post. */
					wp_kses( __( 'Continue reading %s', 'liber' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );
			?>
		</div>
		</div><!-- .entry-content -->
	<?php endif; ?>

	</article><!-- #post-## -->
	<?php endwhile ?>
<?php endif ?>
</div></div>
		<?php
		echo $args['after_widget'];
		// Reset the post globals as this query will have stomped on it
		wp_reset_postdata();
		}
	function update( $new_instance, $old_instance ) {
		$instance['title'] = $new_instance['title'];
		$instance['postnumber'] = $new_instance['postnumber'];
		$instance['menucategory'] = $new_instance['menucategory'];
		return $new_instance;
	}
	function form( $instance ) {
		$title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$postnumber = isset( $instance['postnumber'] ) ? esc_attr( $instance['postnumber'] ) : '4';
		$menucategory = isset( $instance['menucategory'] ) ? esc_attr( $instance['menucategory'] ) : '';
	?>
	<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:','liber' ); ?></label>
		<input type="text" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $title ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" /></p>
	<p><label for="<?php echo $this->get_field_id( 'postnumber' ); ?>"><?php esc_html_e( 'Number of posts to show:','liber' ); ?></label>
		<input type="text" name="<?php echo esc_attr( $this->get_field_name( 'postnumber' ) ); ?>" value="<?php echo esc_attr( $postnumber ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'postnumber' ); ?>" /></p>
	<p><label for="<?php echo $this->get_field_id( 'menucategory' ); ?>"><?php esc_html_e('Enter Food Menu Category Name or Slug (separate multiple categories by comma)', 'liber') ?></label>
	<input type="text" name="<?php echo esc_attr( $this->get_field_name( 'menucategory' ) ); ?>" value="<?php echo esc_attr( $menucategory ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'menucategory' ); ?>" /></p>
<hr />
	<?php
	}
}
register_widget( 'Liber_Food_Menu_Post' );

/*-----------------------------------------------------------------------------------*/
/* Custom liber Widget: Banner Block
/*-----------------------------------------------------------------------------------*/
class Liber_Banner_Block extends WP_Widget {
	function __construct() {
		$widget_ops = array( 'description' => esc_html__( 'Banner Block', 'liber' ) );
		parent::__construct( false, esc_html__( 'Liber: Banner Block', 'liber' ),$widget_ops );
	}

	function widget( $args, $instance ) {
		$title = null; $imageurl = null; $imagealt = null; $buttonlink = null;
		if ( ! empty( $instance['title'] ) ) { $title = apply_filters( 'widget_title', $instance['title'] ); }
		if ( ! empty( $instance['imageurl'] ) ) { $imageurl = $instance['imageurl']; }
		if ( ! empty( $instance['imagealt'] ) ) { $imagealt = $instance['imagealt']; }
		if ( ! empty( $instance['buttonlink'] ) ) { $buttonlink = $instance['buttonlink']; }
		echo $args['before_widget']; ?>
		<?php if( ! empty( $title ) )
			echo '<div class="widget-title-wrap"><h3 class="widget-title"><span>'. esc_html( $title ) .'</span></h3></div>'; ?>

		<div class="banner">
			<a href="<?php echo esc_url( $buttonlink ); ?>"><img class="image" src="<?php echo esc_url( $imageurl ); ?>" alt="<?php echo esc_html( $imagealt ); ?>"></a>
		</div>

		<?php
		echo $args['after_widget'];
		// Reset the post globals as this query will have stomped on it
		wp_reset_postdata();
		}
	function update ($new_instance, $old_instance ) {
		$instance['title'] = $new_instance['title'];
		$instance['imageurl'] = $new_instance['imageurl'];
		$instance['imagealt'] = $new_instance['imagealt'];
		$instance['buttonlink'] = $new_instance['buttonlink'];
		return $new_instance;
	}
	function form( $instance ) {
		$title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$imageurl = isset( $instance['imageurl'] ) ? esc_attr( $instance['imageurl'] ) : 'http://www.anarieldesign.com/themedemos/liber/wp-content/uploads/2017/01/banner-sidebar.jpg';
		$imagealt = isset( $instance['imagealt'] ) ? esc_attr( $instance['imagealt'] ) : 'banner';
		$buttonlink = isset( $instance['buttonlink'] ) ? esc_attr( $instance['buttonlink'] ) : 'http://easyveggiekitchen.com/';
	?>
	<p> <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:','liber' ); ?></label>
		<input type="text" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $title ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" /></p>
	<p><label for="<?php echo $this->get_field_id( 'imageurl' ); ?>"><?php esc_html_e( 'Image URL','liber' ); ?></label>
	<input type="text" name="<?php echo esc_attr( $this->get_field_name( 'imageurl' ) ); ?>" value="<?php echo esc_attr( $imageurl ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'imageurl' ); ?>" /></p>
	<p><label for="<?php echo $this->get_field_id( 'imagealt' ); ?>"><?php esc_html_e( 'Image ALT Text','liber' ); ?></label>
	<input type="text" name="<?php echo esc_attr( $this->get_field_name( 'imagealt' ) ); ?>" value="<?php echo esc_attr( $imagealt ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'imagealt' ); ?>" /></p>
	<p> <label for="<?php echo $this->get_field_id( 'buttonlink' ); ?>"><?php esc_html_e( 'Button Link','liber' ); ?></label>
	<input type="text" name="<?php echo esc_attr( $this->get_field_name( 'buttonlink' ) ); ?>" value="<?php echo esc_attr( $buttonlink ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'buttonlink' ); ?>" /></p>
	<?php
	}
}
register_widget( 'Liber_Banner_Block' );