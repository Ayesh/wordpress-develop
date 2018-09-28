<?php

/**
 * @group formatting
 */
class Tests_Formatting_SanitizeClassName extends WP_UnitTestCase {
	function test_html_class_name() {
		$tests = array(
			'space separated' => 'spaceseparated',
			'CASE_PRESERVED' => 'CASE_PRESERVED',
			'$invalid^chars' => 'invalidchars',
			'0starts-with-integer' => '_starts-with-integer',
			'-starts-with--' => '-starts-with--', // this is allowed because the rule is /^-[0-9]/
			'-0starts-with-integer' => '__starts-with-integer',
			'--starts-with---' => '__starts-with---',
		);
		foreach ( $tests as $key => $value ) {
			$this->assertEquals( $value, sanitize_html_class( $key ) );
		}
	}
}
