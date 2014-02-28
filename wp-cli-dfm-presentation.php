<?php 

/**
 * Presentation for WordPress enthusiasts at DFM
 */
class DFM_WP_CLI_Presentation_Command extends WP_CLI_Command {
 
	/**
	 * Start the presentation with a demonstration
	 *
	 * @subcommand slide
	 * @synopsis <number>
	 */
	public function slide( $args ) {
 
		list( $num ) = $args;
 
		$slides = array(
			0 => array(
				'header' => 'wp-cli is for WP devs on a deadline (http://wp-cli.org)',
				'body' => array(
					'Daniel Bachhuber',
					'dbachhuber@digitalfirstmedia.com',
					'@danielbachhuber on Twitter and Skype',
				),
			),
			1 => array(
				'header' => 'What is wp-cli?',
				'body' => array(
					'- A Command Line Interface for WordPress',
					'- A powerful tool for manipulating WordPress',
					'- A nascent WordPress community project with lots of opportunity for contributions',
				),
			),
			2 => array(
				'header' => 'Why is it useful to me?',
				'body' => array(
					'- Open wp shell to execute arbitrary functions',
					'- Install, update, activate or delete plugins',
					'- Create posts, users, terms',
					'- Import users',
					'- Export a large amount of data',
					'- Scaffold a theme, plugin, or unit tests for a plugin',
				),
			),
			3 => array(
				'header' => 'Where do I start?',
				'body' => array(
					'- Install wp-cli',
					'- (monkey dance)',
					'- Profit!',
				),
			),
			4 => array(
				'header' => 'How do I install?',
				'body' => array(
					'On your command line:',
					'- curl -L https://raw.github.com/wp-cli/builds/gh-pages/phar/wp-cli.phar > wp-cli.phar',
					'- ln -s wp-cli.phar /usr/bin/wp',
				),
			),
			5 => array(
				'header' => 'How do I write my own command?',
				'body' => array(
					'- Create a class extending WP_CLI_Command',
					"- Register your command with WP_CLI::add_command( 'dfm-presentation', 'DFM_WP_CLI_Presentation_Command' );",
					'- public methods are subcommands',
					'- PHPdoc allows you to set a <synopsis>',
					'- Sekret pro tip: Package useful commands with your plugins :)',
				),
			),
			6 => array(
				'header' => 'Now go! http://wp-cli.org',
				'body' => array(
				),
			),
		);
 
		passthru( '/usr/bin/clear' );
		if ( ! empty( $slides[(int)$num] ) ) {
			$slide = $slides[(int)$num];
			for( $i = 0; $i < 30; $i++ ) {
		 
				if ( $i == 8 ) {
					$this->line( $slide['header'] );
					continue;
				}
		 
				if ( $i == 11 ) {
					foreach( $slide['body'] as $line ) {
						$this->line( $line );
						$i++;
					}
				}
				$this->line();
			}
		} else {
		
			WP_CLI::error( "No slide #{$num}" );
		
		}
		 
	}
		 
	private function line( $out = '' ) {
		WP_CLI::line( " " . $out );
	}
 
}

WP_CLI::add_command( 'dfm-presentation', 'DFM_WP_CLI_Presentation_Command' );