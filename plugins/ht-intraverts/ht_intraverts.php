<?php
/*
Plugin Name: HT Intraverts
Plugin URI: http://www.helpfultechnology.com
Description: Display promotional adverts which register clicks
Author: Luke Oatham
Version: 1.2
Author URI: http://www.helpfultechnology.com
*/

class htIntraverts extends WP_Widget {
    function htIntraverts() {
        parent::WP_Widget(false, 'HT Intraverts', array('description' => 'Displays an individual spot from a selection of spots and hides from user if already viewed'));

		/*
		Load js and css
		*/
		wp_register_script( 'intraverts', plugins_url("/ht-intraverts/ht_intraverts.js"));
		wp_enqueue_script( 'intraverts' );
		wp_enqueue_style( 'intraverts', plugins_url("/ht-intraverts/ht_intraverts.css"));
        
		/*
		Register intravert custom post type
		*/
        
		add_action('init', 'cptui_register_my_cpt_intravert');
		function cptui_register_my_cpt_intravert() {
		register_post_type('intravert', array(
		'label' => 'Intraverts',
		'description' => '',
		'public' => false,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => 'post',
		'map_meta_cap' => true,
		'hierarchical' => false,
		'rewrite' => array('slug' => 'intravert', 'with_front' => true),
		'query_var' => true,
		'has_archive' => true,
		'exclude_from_search' => true,
		'menu_position' => '30',
		'menu_icon' => 'dashicons-welcome-view-site',
		'supports' => array('title','editor','excerpt','revisions','thumbnail','author','page-attributes'),
		'labels' => array (
		  'name' => 'Intraverts',
		  'singular_name' => 'Intravert',
		  'menu_name' => 'Intraverts',
		  'add_new' => 'Add Intravert',
		  'add_new_item' => 'Add New Intravert',
		  'edit' => 'Edit',
		  'edit_item' => 'Edit Intravert',
		  'new_item' => 'New Intravert',
		  'view' => 'View Intravert',
		  'view_item' => 'View Intravert',
		  'search_items' => 'Search Intraverts',
		  'not_found' => 'No Intraverts Found',
		  'not_found_in_trash' => 'No Intraverts Found in Trash',
		  'parent' => 'Parent Intravert',
		)
		) ); }
		
		/*
		Register Advanced Custom Fields for the intraverts custom post type
		*/
		
		if( function_exists('register_field_group') ):
		

			register_field_group(array (
				'key' => 'group_5494c172a5fb9',
				'title' => 'Intraverts',
				'fields' => array (
					array (
						'key' => 'field_5494c635e6e0e',
						'label' => 'Link text',
						'name' => 'intravert_link_text',
						'prefix' => '',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
						'readonly' => 0,
						'disabled' => 0,
					),
					array (
						'key' => 'field_5494c648e6e0f',
						'label' => 'Intranet destination page',
						'name' => 'intravert_destination_page',
						'prefix' => '',
						'type' => 'relationship',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'post_type' => '',
						'taxonomy' => '',
						'filters' => array (
							0 => 'search',
							1 => 'post_type',
							2 => 'taxonomy',
						),
						'elements' => array (
							0 => 'featured_image',
						),
						'max' => 1,
						'return_format' => 'id',
					),
					array (
						'key' => 'field_54bc153f9a49c',
						'label' => 'Cookie period',
						'name' => 'intravert_cookie_period',
						'prefix' => '',
						'type' => 'number',
						'instructions' => 'The number of days before the intravert will reappear after being viewed. Default is 14 days.',
						'required' => 0,
						'conditional_logic' => 0,
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'min' => '',
						'max' => '',
						'step' => '',
						'readonly' => 0,
						'disabled' => 0,
					),
					array (
						'key' => 'field_5494c1c796832',
						'label' => 'Date range',
						'name' => 'intravert_date_range',
						'prefix' => '',
						'type' => 'true_false',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'message' => '',
						'default_value' => 0,
					),
					array (
						'key' => 'field_5494c21a96833',
						'label' => 'Start date',
						'name' => 'intravert_start_date',
						'prefix' => '',
						'type' => 'date_picker',
						'instructions' => '',
						'required' => 1,
						'conditional_logic' => array (
							array (
								'rule_rule_rule_0' => array (
									'field' => 'field_5494c1c796832',
									'operator' => '==',
									'value' => '1',
								),
							),
						),
						'display_format' => 'd/m/Y',
						'return_format' => 'd/m/Y',
						'first_day' => 1,
					),
					array (
						'key' => 'field_5494c25596834',
						'label' => 'End date',
						'name' => 'intravert_end_date',
						'prefix' => '',
						'type' => 'date_picker',
						'instructions' => '',
						'required' => 1,
						'conditional_logic' => array (
							array (
								'rule_rule_rule_0' => array (
									'field' => 'field_5494c1c796832',
									'operator' => '==',
									'value' => '1',
								),
							),
						),
						'display_format' => 'd/m/Y',
						'return_format' => 'd/m/Y',
						'first_day' => 1,
					),
					array (
						'key' => 'field_5494c18696831',
						'label' => 'Target logged in users',
						'name' => 'intravert_logged_in_only',
						'prefix' => '',
						'type' => 'true_false',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'message' => '',
						'default_value' => 0,
					),
					array (
						'key' => 'field_5494d7fd784af',
						'label' => 'Contributors and above',
						'name' => 'intravert_contributors',
						'prefix' => '',
						'type' => 'true_false',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => array (
							array (
								'rule_0' => array (
									'field' => 'field_5494c18696831',
									'operator' => '==',
									'value' => '1',
								),
							),
						),
						'message' => '',
						'default_value' => 0,
					),
					array (
						'key' => 'field_5494c2af96836',
						'label' => 'Teams',
						'name' => 'intravert_teams',
						'prefix' => '',
						'type' => 'relationship',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => array (
							array (
								'rule_rule_rule_0' => array (
									'field' => 'field_5494c18696831',
									'operator' => '==',
									'value' => '1',
								),
							),
						),
						'post_type' => array (
							0 => 'team',
						),
						'taxonomy' => '',
						'filters' => array (
							0 => 'search',
						),
						'elements' => '',
						'max' => '',
						'return_format' => 'object',
					),
					array (
						'key' => 'field_5494c30696837',
						'label' => 'Grades',
						'name' => 'intravert_grades',
						'prefix' => '',
						'type' => 'taxonomy',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => array (
							array (
								'rule_rule_rule_0' => array (
									'field' => 'field_5494c18696831',
									'operator' => '==',
									'value' => '1',
								),
							),
						),
						'taxonomy' => 'grade',
						'field_type' => 'checkbox',
						'allow_null' => 0,
						'load_save_terms' => 0,
						'return_format' => 'object',
						'multiple' => 0,
					),
					array (
						'key' => 'field_5494c29196835',
						'label' => 'Target content',
						'name' => 'intravert_target_content',
						'prefix' => '',
						'type' => 'select',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'choices' => array (
							'All' => 'All',
							'Task category' => 'Task category',
							'News type' => 'News type',
						),
						'default_value' => array (
						),
						'allow_null' => 0,
						'multiple' => 0,
						'ui' => 0,
						'ajax' => 0,
						'placeholder' => '',
						'disabled' => 0,
						'readonly' => 0,
					),
					array (
						'key' => 'field_5494d3330049d',
						'label' => 'Task category',
						'name' => 'intravert_category',
						'prefix' => '',
						'type' => 'taxonomy',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => array (
							array (
								'rule_rule_rule_rule_0' => array (
									'field' => 'field_5494c29196835',
									'operator' => '==',
									'value' => 'Task category',
								),
							),
						),
						'taxonomy' => 'category',
						'field_type' => 'checkbox',
						'allow_null' => 0,
						'load_save_terms' => 0,
						'return_format' => 'id',
						'multiple' => 0,
					),
					array (
						'key' => 'field_5494d775784ae',
						'label' => 'News type',
						'name' => 'intravert_news_type',
						'prefix' => '',
						'type' => 'taxonomy',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => array (
							array (
								'rule_rule_0' => array (
									'field' => 'field_5494c29196835',
									'operator' => '==',
									'value' => 'News type',
								),
							),
						),
						'taxonomy' => 'news-type',
						'field_type' => 'checkbox',
						'allow_null' => 0,
						'load_save_terms' => 0,
						'return_format' => 'id',
						'multiple' => 0,
					),
				),
				'location' => array (
					array (
						array (
							'param' => 'post_type',
							'operator' => '==',
							'value' => 'intravert',
						),
					),
				),
				'menu_order' => 0,
				'position' => 'normal',
				'style' => 'default',
				'label_placement' => 'top',
				'instruction_placement' => 'label',
				'hide_on_screen' => '',
			));
			
			
			/*
			Register Advanced Custom Fields for the intraverts widget
			*/
			
			register_field_group(array (
				'key' => 'group_54c2f059881dc',
				'title' => 'Intraverts widget',
				'fields' => array (
					array (
						'key' => 'field_54c2f09fa63e3',
						'label' => 'Eligible intraverts',
						'name' => 'eligible_intraverts',
						'prefix' => '',
						'type' => 'relationship',
						'instructions' => 'Choose which intraverts are eligible to appear in this widget area. ',
						'required' => 0,
						'conditional_logic' => 0,
						'post_type' => array (
							0 => 'intravert',
						),
						'taxonomy' => '',
						'filters' => array (
							0 => 'search',
						),
						'elements' => array (
							0 => 'featured_image',
						),
						'max' => '',
						'return_format' => 'id',
					),
				),
				'location' => array (
					array (
						array (
							'param' => 'widget',
							'operator' => '==',
							'value' => 'htintraverts',
						),
					),
				),
				'menu_order' => 0,
				'position' => 'normal',
				'style' => 'default',
				'label_placement' => 'top',
				'instruction_placement' => 'label',
				'hide_on_screen' => '',
			));
			
		endif;
    }

    function widget($args, $instance) {
        extract( $args ); 
		global $post; 
		wp_reset_postdata();						
		$originaltitle = str_replace(site_url(), "",  get_permalink(get_the_id()) );
		$currentpostterms = get_the_terms(get_the_id(), 'category');
		$currentnewsterms = get_the_terms(get_the_id(), 'news-type');
		$temp = array();
		if ( $currentpostterms ) foreach ($currentpostterms as $c){
			$temp[] = $c->term_id;
		}
		$currentpostterms = $temp;
		$temp = array();
		if ( $currentnewsterms ) foreach ($currentnewsterms as $c){
			$temp[] = $c->term_id;
		}
		$currentnewsterms = $temp;

		/*
		Get eligible intraverts to display and build intravertToShow array
		*/

		$acf_key = "widget_" . $this->id_base . "-" . $this->number . "_eligible_intraverts" ;  
		$intravertToShow = get_option($acf_key); 
		if ( count($intravertToShow) > 0 && $intravertToShow ):
			$cquery = array(
			    'post_type' => 'intravert',
			    'posts_per_page' => -1,
			    'post__in' => $intravertToShow,
			    'orderby'=>'menu_order',
			    'order' => 'ASC',
				);
				$eligibles =new WP_Query($cquery);
		else:
			$eligibles =new WP_Query();
		endif;
		$read = 0;
		$alreadydone= array();
		if ($eligibles->have_posts()) while ($eligibles->have_posts()) {
			$eligibles->the_post();  
			if (isset($_COOKIE['ht_intravert_'.get_the_id()])) { $read++; $alreadydone[] = get_the_id(); }
		}
		$k = 0;
		while ($eligibles->have_posts()) {
			$eligibles->the_post();

			if (in_array(get_the_id(), $alreadydone )) continue;

			$icookie = get_post_meta(get_the_id(), 'intravert_cookie_period', true); 
			if (!$icookie) $icookie = 14;

			// check logged on?
			if ( get_post_meta(get_the_id(), 'intravert_logged_in_only', true) ): 
				if ( !is_user_logged_in() ) continue;
				
				// contributors or above?
				if ( get_post_meta(get_the_id(), 'intravert_contributors', true) ):				
					global $wp_roles;
					$current_user = wp_get_current_user();
					$roles = $current_user->roles;
					$role = array_shift($roles);
					$crole = isset($wp_roles->role_names[$role]) ? translate_user_role($wp_roles->role_names[$role] ) : false;
					if (!in_array($crole, array('Administrator','Editor','Author','Contributor'))) continue;
				endif;
				
				// target a team?
				if ( $teams = get_post_meta(get_the_id(), 'intravert_teams', true) ):			
					$teamcheck = false;
					$userteams = get_user_meta(get_current_user_id(), 'user_team', true);
					if ($userteams) foreach ((array)$userteams as $u){
						if (in_array($u,$teams)) $teamcheck = true;
					}
					if (!$teamcheck) continue;
				endif;

				// target a grade?
				if ( $grades = get_post_meta(get_the_id(), 'intravert_grades', true) ):			
					$gradecheck = false;
					$usergrades = get_user_meta(get_current_user_id(), 'user_grade', true);
					if ($usergrades) foreach ((array)$usergrades as $u){
						if (in_array($u,$grades)) $gradecheck = true;
					}
					if (!$gradecheck) continue;
				endif;

			endif;
			
			// date range?
			$sdate = date('Ymd');
			if ( get_post_meta(get_the_id(), 'intravert_date_range', true) && ( $sdate < get_post_meta(get_the_id(), 'intravert_start_date', true) || $sdate > get_post_meta(get_the_id(), 'intravert_end_date', true) ) ) continue;

			$catcheck = false;

			// target content?
			if ( get_post_meta(get_the_id(), 'intravert_target_content', true) ): 
				if ( $icategory = get_post_meta(get_the_id(), 'intravert_category', true) ): 
					if ($icategory) foreach ((array)$icategory as $u){
						if (in_array($u,$currentpostterms)) $catcheck = true; 
					}
					if (!$catcheck && !get_post_meta(get_the_id(), 'intravert_news_type', true)) continue;
				endif;
			endif;

			if ( get_post_meta(get_the_id(), 'intravert_target_content', true) ): 
				if ( $icategory = get_post_meta(get_the_id(), 'intravert_news_type', true) ): 
					if ($icategory) foreach ((array)$icategory as $u){
						if (in_array($u,$currentnewsterms)) $catcheck = true; 
					}
					if (!$catcheck) continue;
				endif;
			endif;

			
			
			/*
			Display intravert
			*/
			echo $before_widget; 
			echo "<div id='intraverts'>";
			
			$k++;
			$thistitle = get_the_title($post->ID);
			$thisURL = get_permalink($post->ID);
			$destination = get_post_meta(get_the_id(),'intravert_destination_page',true);
			if ($destination) { $destination = get_permalink($destination[0]); } else { $destination="#nowhere"; }
			if (has_post_thumbnail($post->ID)):
				echo "<a href='".$destination."' onclick='pauseIntravert(\"ht_intravert_".get_the_id()."\",".$icookie.",\"".$post->post_title."\",\"".$originaltitle."\");'> ";
				the_post_thumbnail('large',array('class'=>'img-responsive'));
				echo "</a>";
			endif;
			the_content();
			if (get_post_meta(get_the_id(),'intravert_link_text',true)):
				echo "<a id='intravert_hook' class='btn btn-info filter_results' href='".$destination."' onclick='pauseIntravert(\"ht_intravert_".get_the_id()."\",".$icookie.",\"".$post->post_title."\",\"".$originaltitle."\");'> ";
				echo get_post_meta(get_the_id(),'intravert_link_text',true);
				if ( $destination != '#nowhere' ) echo " <span class='dashicons dashicons-arrow-right-alt2'></span>";
				echo "</a> ";
			endif;
			break;
		}

		if ($k){
			echo "</div>";
			echo "<div class='clearfix'></div>";
			if ( get_option( 'options_track_homepage' ) ):
			?>
			
			<?php
			endif;
			echo $after_widget;
		}
		

		wp_reset_postdata();						

    }

    function update($new_instance, $old_instance) {
		$instance = $old_instance;
       return $instance;
    }

    function form($instance) {
        $title = esc_attr($instance['title']);
        ?>
         <p>
		 Choose all intraverts eligible to appear in this widget.
        </p>
		<?php
    }
}

add_action('widgets_init', create_function('', 'return register_widget("htIntraverts");'));

?>