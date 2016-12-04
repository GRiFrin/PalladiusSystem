# PalladiusSystem
PHP library for transcribing Chinese characters (Pinyin) into the Cyrillic alphabet (using Palladius system) 

## Install

Composer:

```
composer require "grifrin/palladius"
```

### Usage

```php
use GRiFrin\Palladius\Palladius;

$palladius = new Palladius();
$palladius->convert(array('cheng','long'));
// return ['чэн','лун']
$palladius->convert(array('cheng','long'), true);
// return [['pinyin'=>'cheng','cyrillic'=>'чэн'],['pinyin'=>'long','cyrillic'=>'лун']]
```

# License

MIT
