<?php
/**
 * NumbersToWordsHelper
 * Convert numbers to words with an without an ordinal suffix
 *
 * User: David Yell <neon1024@gmail.com>
 * Date: 30/10/14
 * Time: 10:47
*/

namespace NumbersToWords\View\Helper;

use Cake\View\Helper;
use Cake\View\View;
use NumberFormatter;

class NumbersToWordsHelper extends Helper {

	protected $_defaultConfig = [
		'locale' => 'en_GB'
	];

	public function __construct(View $view, array $config = []) {
		parent::__construct($view, $config);
	}

/**
 * Convert a number into a word
 *
 * @param $number An integer number to convert
 * @return string
 */
	public function spell($number) {
		$formatter = new NumberFormatter($this->config['locale'], NumberFormatter::SPELLOUT);
		return $formatter->format($number);
	}

/**
 * Convert a number into it's ordinal type
 * eg, 1 -> 1st, 2 -> 2nd
 *
 * @param $number An integer number to convert
 * @return string
*/
	public function ordinal($number) {
		$formatter = new NumberFormatter($this->config['locale'], NumberFormatter::ORDINAL);
		return $formatter->format($number);
	}
} 
