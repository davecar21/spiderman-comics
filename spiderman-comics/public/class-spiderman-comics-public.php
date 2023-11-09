<?php
class Spiderman_Comics_Public {
	private $spiderman_comics_data;
	// TODO add an menu option to input the api key and hash
	private $marvel_api_key = '3dc56cdcc2882a7f6ff832413ad16699';
	private $marvel_hash = '92d672bf9c91112e174c940909f778d8ff6a2e66';
	
	public function __construct( $spiderman_comics, $version ) {
		$this->spiderman_comics = $spiderman_comics;
		$this->version = $version;

		// Add actions and filters here
        add_shortcode('spiderman_comics', array($this, 'spiderman_comics_shortcode'));
	}
	
	public function enqueue_styles() {
		wp_enqueue_style( $this->spiderman_comics, plugin_dir_url( __FILE__ ) . 'css/spiderman-comics-public.css', array(), $this->version, 'all' );
	}

	public function enqueue_scripts() {
		wp_enqueue_script( $this->spiderman_comics, plugin_dir_url( __FILE__ ) . 'js/spiderman-comics-public.js', array( 'jquery' ), $this->version, false );
	}

	public function spiderman_comics_shortcode($atts) {
		$this->fetch_spiderman_comics();
        ob_start(); 
        include(plugin_dir_path(__FILE__) . '/partials/spiderman-comics-public-display.php'); 
        $content = ob_get_clean();
        return $content; 
    }

	public function fetch_spiderman_comics() {
		$api_url = 'https://gateway.marvel.com/v1/public/comics';
		$api_params = array(
			'apikey' => $this->marvel_api_key,
			'hash' => md5(time().$this->marvel_hash.$this->marvel_api_key),
			'ts' => time(),
			'titleStartsWith' => 'Spider-Man',
			'startYear' => 2022,
			'limit' => 8,
		);
		$response = wp_remote_get(add_query_arg($api_params, $api_url));
	
		if (is_wp_error($response)) {
			return 'Error fetching spiderman comics';
		}
	
		$body = wp_remote_retrieve_body($response);
		$data = json_decode($body, true);
		$this->spiderman_comics_data = $data;
		return $data;
	}


}
