<?php

/**
 * NumbersToWordsHelperTest.php
 *
 * @author David Yell <dyell@ukwebmedia.com>
 * @copyright 2016 UK Web Media Ltd
 */

namespace NumbersToWords\Tests;

use Cake\TestSuite\TestCase;
use NumbersToWords\View\Helper\NumbersToWordsHelper;

class NumbersToWordsHelperTest extends TestCase
{
    /**
     * Setup before tests
     */
    public function setUp()
    {
        parent::setUp();

        $View = $this->getMockBuilder('\Cake\View\View')
            ->getMock();

        $this->NumbersToWords = new NumbersToWordsHelper($View);
    }

    /**
     * Teardown after tests
     */
    public function tearDown()
    {
        parent::tearDown();
    }

    /**
     * Numbers and expected output
     *
     * @return array
     */
    public function numbersProvider()
    {
        return [
            [
                '2',
                'two'
            ],
            [
                '99',
                'ninety-nine'
            ],
            [
                '12345',
                'twelve thousand three hundred forty-five'
            ],
            [
                'I found 3 apples',
                'I found three apples'
            ],
            [
                '99 problems, but tests aint 1',
                'ninety-nine problems, but tests aint one'
            ]
        ];
    }

    /**
     * Spell numbers
     *
     * @dataProvider numbersProvider
     */
    public function testSpellingNumbers($number, $expected)
    {
        $result = $this->NumbersToWords->spell($number);
        $this->assertEquals($expected, $result);
    }

    public function ordinalsProvider()
    {
        return [
            [
                '2',
                '2nd'
            ],
            [
                '5',
                '5th'
            ],
            [
                '123',
                '123rd'
            ],
            [
                'I dont want to come 2',
                'I dont want to come 2nd'
            ],
            [
                'Set it for July 4',
                'Set it for July 4th'
            ]
        ];
    }

    /**
     * Ordinals
     *
     * @dataProvider ordinalsProvider
     */
    public function testOrdinals()
    {
        $result = $this->NumbersToWords->ordinal(5);
        $this->assertEquals('5th', $result);
    }

    /**
     * Test spelling words which have no numbers
     *
     * @return void
     */
    public function testSpellingWithNoNumbers()
    {
        $result = $this->NumbersToWords->spell('Dave is great!');
        $expected = 'Dave is great!';

        $this->assertSame($expected, $result);
    }
}
