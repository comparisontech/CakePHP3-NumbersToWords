#NumbersToWordsHelper
A helper for CakePHP3 to convert numbers into words.

Have you ever wanted to use a number as a css class? Or title items in a loop, but number just look messy? I have, and so I made this quick plugin to solve that problem.

##Installation
You can find the plugin listed on Packagist.
https://packagist.org/packages/davidyell/cakephp-numberstowords

You can use this to require it into your CakePHP 3 project by adding it to your `composer.json` file.

##Configuration
You need to load the plugin in your `config/bootstrap.php`
`Plugin::load('NumbersToWords');`

You'll need to add it to your controllers helpers array and configure your locale.
```php
public $helpers = [
	'NumbersToWords.NumbersToWords' => [
		'locale' => 'en_GB'
	]
];
```
##Usage
<?= $this->NumbersToWords->spell(5); // 'five';?>

