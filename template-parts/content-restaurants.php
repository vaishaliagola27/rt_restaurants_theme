<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

//register script of restaurant
wp_register_script( 'restaurant-js', get_template_directory_uri() . '/js/restaurants.js' );

if ( is_singular( 'restaurants' ) ) {
	global $post;
	?>
	<article class="main-content col span_12_of_12" itemscope itemtype="http://schema.org/Restaurant">
		<header class="entry-header">
			<div class="restaurant_type_tag col span_12_of_12">
				<p class="col span_2_of_12">
					Restaurant Type:
				</p>
				<p class="tag col span_10_of_12">
					<?php
					// Output buffer starts
					ob_start();
					//get restaurant type
					$res_type = wp_get_post_terms( $post->ID, 'restaurants_type', '' );
					if ( !is_wp_error( $res_type ) && $res_type ) {
						$term_text = '';
						foreach ( $res_type as $term ) {
							$term_text .= ' ' . $term->name;
						}
						echo $term_text . '.';
					}
					// Empty output buffer dat into variable 
					$ob_restaurant_type = ob_get_clean();

					/**
					 *  Filter for changing restaurant type html
					 *
					 *   This filter will allow you to customize the look of restaurant type taxonomy.
					 * 
					 * @since 0.1
					 *
					 * @param string  $var     Filter name
					 * @param string  $ob_restaurant_type  output string of restaurant type html
					 */
					$ob_restaurant_type = apply_filters( 'rt_restaurant_type_html', $ob_restaurant_type );

					/**
					 * Action to add fields in restaurant type display
					 * 
					 * @param string  $ob_restaurant_type  output string of restaurant type html
					 */
					do_action( 'rt_restaurants_type_address_frontend_display', $ob_restaurant_type );

					echo $ob_restaurant_type;
					?>
				</p>
			</div>
			<div class="image-gallery col span_12_of_12">
				<?php
				// Output buffer starts
				ob_start();
				/**
				 * Image gallery display
				 */
				$args = array(
				    'post_type' => 'attachment',
				    'numberposts' => -1,
				    'post_status' => null,
				    'post_parent' => $post->ID
				);

				$attachments = get_posts( $args );
				if ( $attachments ) {
					foreach ( $attachments as $attachment ) {
						?>
						<div id="gallery-image"> 
							<?php echo wp_get_attachment_image( $attachment->ID, 'rt_restaurant_slider' ); ?>
						</div>
						<?php
					}
				}
				// Empty output buffer dat into variable 
				$ob_gallery = ob_get_clean();

				/**
				 * Filter for changing restaurant image gallery html.
				 *
				 *   This filter will allow you to customize the look of restaurant image gallery.
				 * 
				 * @since 0.1
				 *
				 * @param string  $var     Filter name
				 * @param string  $ob_gallery  output string of restaurant image gallery html
				 */
				$ob_gallery = apply_filters( 'rt_restaurant_gallery_html', $ob_gallery );

				echo $ob_gallery;
				?>
			</div>
		</header>
		<section class="content">
			<div class="res-details col span_8_of_12">
				<div id="restaurant-title" class="col span_12_of_12">
					<?php echo get_post( $post->ID )->post_title ?>
				</div>
				<div class="rating col span_12_of_12" itemprop="ratingValue">
					<?php
					$rating = get_post_meta( $post->ID, '_average_rating', true );
					if ( !empty( $rating ) || $rating != NULL ) {
						$star_url = \rtCamp\WP\rtRestaurants\URL . 'assets/images/';
						echo "<img class='col span_6_12'src=\"" . $star_url . intval( $rating ) . "star.png\" />";
					}

					//Action to add into rating star display
					do_action( 'rt_restaurants_average_rating_display' );
					?>
					<span class="col span_4_of_12">(<?php echo 25; ?> Reviews)</span>
				</div>


				<div class="details col span_5_of_12">
					<hr />
					<div class="restaurant-timing" itemprop="openingHours">
						<?php
						// Output buffer starts
						ob_start();

						//get current restaurant timing
						$current_post_timing = get_post_meta( $post->ID, '_timing', true );
						$days = array( "mon" => "Monday", "tue" => "Tuesday", "wed" => "Wednesday", "thu" => "Thursday", "fri" => "Friday", "sat" => "Saturday", "sun" => "Sunday" );
						?>

						<p class="labels">Restaurant Timing</p>
						<table class="timing_table">
							<tr id="timing_title">
								<td>Day</td>
								<td>From</td>
								<td>To</td>
							</tr>
							<?php
							foreach ( $current_post_timing as $key => $day ) {
								?>
								<tr class='timing_data'>
									<td> <?php echo $days[ $key ] ?> </td>
									<?php if ( $day[ 0 ] == NULL && $day[ 1 ] == NULL ) { ?>
										<td colspan='3' class='close'>Close</td>
									<?php } else {
										?>
										<td> <?php echo $current_post_timing[ $key ][ 0 ] ?></td>
										<td> <?php echo $current_post_timing[ $key ][ 1 ] ?></td>
									<?php } ?>
								</tr>
								<?php
							}
							?>
						</table>
						<?php
						// Empty output buffer dat into variable 
						$ob_timing = ob_get_clean();

						/**
						 *  Filter for changing restaurant time html.
						 *
						 *   This filter will allow you to customize the look of restaurant time post meta.
						 * 
						 * @since 0.1
						 *
						 * @param string  $var     Filter name
						 * @param string  $ob_timing  output string of restaurant timing html
						 */
						$ob_timing = apply_filters( 'rt_restaurant_timing_table_html', $ob_timing );

						/**
						 * Action to add fields in restaurant timing display
						 * 
						 * @param string  $ob_timing  output string of restaurant timing html
						 */
						do_action( 'rt_restaurants_timing_frontend_display', $ob_timing );

						echo $ob_timing;
						?>
					</div>

					<div class="contact">
						<?php $phone_no = get_post_meta( $post->ID, '_restaurant_contactno', true ); ?>
						<label class="labels">Contact Us:</label>
						<span itemprop="telephone">
							<a href="tel://<?php echo $phone_no ?>"><?php echo $phone_no ?></a>
							<?php
							/**
							 * Action to add fields in contact number display
							 * 
							 * @param string $phone_no
							 */
							do_action( 'rt_restaurants_contactno_frontend_display', $phone_no );
							?>
						</span>
					</div>

					<hr />
				</div>

				<!--- display description of restaurant -->
				<?php echo the_content(); ?>

				<div class="tag-food-type col span_12_of_12">
					<p class="col span_2_of_12">Food Type: </p>
					<div class="tag col span_10_of_12">
						<?php
						// Output buffer starts 
						ob_start();
						//get food type for restaurant
						$food_type = wp_get_post_terms( $post->ID, 'food_type', '' );

						$term_text = '';
						if ( !is_wp_error( $food_type ) && $food_type ) {
							foreach ( $food_type as $term ) {
								$term_text .=" " . $term->name;
							}
							echo $term_text;
						}
						// Empty output buffer dat into variable 
						$ob_food_type = ob_get_clean();

						/**
						 *  Filter for changing food type html
						 *
						 *   This filter will allow you to customize the look of food type taxonomy.
						 * 
						 * @since 0.1
						 *
						 * @param string  $var     Filter name
						 * @param string  $ob_food_type  output string of food type html
						 */
						$ob_food_type = apply_filters( 'rt_restaurant_food_type_html', $ob_food_type );

						/**
						 * Action to add fields in food type display
						 * 
						 * @param string  $ob_food_type  output string of food type html
						 */
						do_action( 'rt_restaurants_food_type_frontend_display', $ob_food_type );

						echo $ob_food_type;
						?>
					</div>
				</div>
				<div class="related_restaurants col span_12_of_12">
					<div class="col span_12_of_12">
						Related Restaurants
					</div>
					<div class="related_restaurants_slide col span_12_of_12">
						<?php
						// Output buffer starts
						ob_start();
						/**
						 * Related restaurants	
						 */
						$related_res_data = get_post_meta( $post->ID, '_related_restaurant', true );
						if ( !empty( $related_res_data ) ) {
							foreach ( $related_res_data as $val ) {
								$related_restaurant = get_post( $val );

								if ( $related_restaurant ) {
									?>
									<div class="related-restaurant"> 
										<div><?php echo get_the_post_thumbnail($val, 'rt_restaurant_thumb' ); ?></div>
										<p class="title col span_11_of_12"><?php echo $related_restaurant->post_title ?></p>
										<?php
										$rating = get_post_meta( $post->ID, '_average_rating', true );
										if ( !empty( $rating ) || $rating != NULL ) {
											$star_url = \rtCamp\WP\rtRestaurants\URL . 'assets/images/';

											echo "<img class='rating' src=\"" . $star_url . intval( $rating ) . "star.png\" />";
										}
										?>
										<p class="details col span_11_of_12">
											<?php
											echo substr( $related_restaurant->post_content, 0, 180 ) . "..." . "<a href='" . get_permalink( $val ) . "'>Read More.</a>";
											?>
										</p>
									</div>
									<?php
								}
							}
						}
						else {
						?>
						<div>No related Restaurants found!</div>
						<?php
						}

						// Empty output buffer dat into variable 
						$ob_related_restaurants = ob_get_clean();

						/**
						 *  Filter to customize the look of related restaurants.
						 * 
						 * @since 0.1
						 *
						 * @param string  $var     Filter name
						 * @param string  $ob_related_restaurants 
						 */
						$ob_related_restaurants = apply_filters( 'rt_restaurant_related_restaurants_html', $ob_related_restaurants );

						echo $ob_related_restaurants;
						?>
					</div>
				</div>

			</div>
			<div class="sidebar col span_4_of_12">
				SIDEBAR
			</div>

		</section>
	</article>
	<?php
}	