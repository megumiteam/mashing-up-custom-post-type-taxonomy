<?php
new MashingUpCustomPostTypes();
class MashingUpCustomPostTypes extends MashingUpCustomPostTypesTaxonomyInit {

	public function __construct() {
		parent::__construct();
		add_action( 'init', array( $this, 'create_initial_post_types' ) );
		add_action( 'register_post_type_args', array( $this, 'register_post_type_args' ), 10, 2 );
	}

	function create_initial_post_types() {

		$label_name   = __( 'スピーカー', $this->domain );
		$slug         = 'speaker';
		$args         = array(
			'label'               => $label_name,
			'public'              => true,
			'exclude_from_search' => true,
			'publicly_queryable'  => true,
			'show_in_nav_menus'   => false,
			'show_in_admin_bar'   => false,
			'menu_position'       => 4,
			'hierarchical'        => true,
			'supports'            => array( 'title', 'thumbnail' ),
			'taxonomies'          => array( 'speaker_type' ),
			'has_archive'         => false,
			'query_var'           => $slug,
			'show_in_rest'        => true,
		);
		register_post_type( $slug, $args );

		$label_name   = __( 'スポンサー', $this->domain );
		$slug         = 'sponsor';
		$args         = array(
			'label'               => $label_name,
			'public'              => true,
			'exclude_from_search' => true,
			'publicly_queryable'  => false,
			'show_in_nav_menus'   => false,
			'show_in_admin_bar'   => false,
			'menu_position'       => 4,
			'hierarchical'        => true,
			'supports'            => array( 'title', 'editor', 'thumbnail' ),
			'taxonomies'          => array( 'sponsor_type' ),
			'has_archive'         => false,
			'query_var'           => $slug,
			'show_in_rest'        => true,
		);
		register_post_type( $slug, $args );

		$label_name   = __( 'セッション', $this->domain );
		$slug         = 'session';
		$args         = array(
			'label'               => $label_name,
			'public'              => true,
			'exclude_from_search' => true,
			'publicly_queryable'  => true,
			'show_in_nav_menus'   => false,
			'show_in_admin_bar'   => false,
			'menu_position'       => 4,
			'hierarchical'        => true,
			'supports'            => array( 'title' ),
			'taxonomies'          => array( 'session_type', 'session_room' ),
			'has_archive'         => false,
			'query_var'           => $slug,
			'show_in_rest'        => true,
		);
		register_post_type( $slug, $args );

		$label_name   = __( '日程管理', $this->domain );
		$slug         = 'schedule';
		$args         = array(
			'label'               => $label_name,
			'public'              => true,
			'exclude_from_search' => true,
			'publicly_queryable'  => false,
			'show_in_nav_menus'   => false,
			'show_in_admin_bar'   => false,
			'menu_position'       => 4,
			'hierarchical'        => true,
			'supports'            => array( 'title' ),
			'taxonomies'          => array(),
			'has_archive'         => false,
			'query_var'           => $slug,
			'show_in_rest'        => true,
		);
		register_post_type( $slug, $args );

	}

	function register_post_type_args( $args, $post_type ) {
		if ( 'post' === $post_type )
			$args = array();

		return $args;
	}
}
