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
use NumberFormatter;

class NumbersToWordsHelper extends Helper
{

    /**
     * Default locale
     *
     * @var array
     */
    protected $_defaultConfig = [
        'locale' => 'en_GB'
    ];

    /**
     * Convert a number into a word
     *
     * @param int|string $item An integer number to convert or a string containing an integer
     * @return string
     */
    public function spell($item)
    {
        $formatter = new NumberFormatter($this->getConfig('locale'), NumberFormatter::SPELLOUT);

        if (is_int($item)) {
            return $formatter->format($item);
        }

        return preg_replace_callback('/([0-9]+)/', function ($matches) use ($formatter) {
            return $formatter->format($matches[0]);
        }, $item);
    }

    /**
     * Convert a number into it's ordinal type
     * eg, 1 -> 1st, 2 -> 2nd
     *
     * @param int|string $item An integer number to convert or a string containing a number
     *
     * @return string
     */
    public function ordinal($item)
    {
        $formatter = new NumberFormatter($this->getConfig('locale'), NumberFormatter::ORDINAL);

        if (is_int($item)) {
            return $formatter->format($item);
        }

        return preg_replace_callback('/([0-9]+)/', function ($matches) use ($formatter) {
            return $formatter->format($matches[0]);
        }, $item);
    }
}
