<?php
new MashingUpCustomTaxonomy();
class MashingUpCustomTaxonomy extends MashingUpCustomPostTypesTaxonomyInit {

	public function __construct() {
		parent::__construct();
		add_action( 'init', array( $this, 'create_initial_taxonomies' ) );
		add_action( 'register_taxonomy_args', array( $this, 'register_taxonomy_args' ), 10, 3 );
	}

	function create_initial_taxonomies() {

		$label_name   = __( 'スピーカー種別', $this->domain );
		$slug         = 'speaker_type';
		$args         = array(
			'label'         => $label_name,
			'public'        => false,
			'show_ui'       => true,
			'show_tagcloud' => false,
			'sort'          => true,
			'show_in_rest'  => true,
			'hierarchical'  => true,
			'show_admin_column' => true,
		);
		register_taxonomy( $slug, array( 'speaker' ), $args );


		$label_name   = __( 'スポンサー種別', $this->domain );
		$slug         = 'sponsor_type';
		$args         = array(
			'label'         => $label_name,
			'public'        => false,
			'show_ui'       => true,
			'show_tagcloud' => false,
			'sort'          => true,
			'show_in_rest'  => true,
			'hierarchical'  => true,
			'show_admin_column' => true,
		);
		register_taxonomy( $slug, array( 'sponsor' ), $args );

		$label_name   = __( 'Room', $this->domain );
		$slug         = 'session_room';
		$args         = array(
			'label'         => $label_name,
			'public'        => false,
			'show_ui'       => true,
			'show_tagcloud' => false,
			'sort'          => true,
			'show_in_rest'  => true,
			'hierarchical'  => true,
		);
		register_taxonomy( $slug, array( 'session' ), $args );
	}

	function register_taxonomy_args( $args, $name, $object_type ) {

		if ( 'category' === $name )
			$args = array();

		return $args;
	}

}
