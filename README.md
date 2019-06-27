yii2-highlight
==============
yii2-highlight

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist xinyeweb/yii2-highlight "*"
```

or add

```
"xinyeweb/yii2-highlight": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

~~~php
xinyeweb\highlight\HighlightAsset::register($this);
~~~

You can override style in your config file, e.g. `config/web.php`:

~~~php
    'components' => [
        ...
        'assetManager' => [
            'bundles' => [
                'xinyeweb\highlight\HighlightAsset' => [
                    'css' => ['styles/zenburn.css'],
                ],
            ]
        ],
        ...
    ],
~~~

Example of custom cofiguraton of `selector` or `options` properties

~~~php
    'components' => [
        ...
        'assetManager' => [
            'bundles' => [
                'xinyeweb\highlight\HighlightAsset' => [
                    'selector' => '.is-highlighted',
                    'options' => [
                        'classPrefix' => 'custom-',
                        'useBR' => true,
                    ],
                    'css' => ['styles/zenburn.css'],
                ],
            ]
        ],
        ...
    ],
~~~

Using of custom build, located in `/js/highlight`, for example

~~~php
    'components' => [
        ...
        'assetManager' => [
            'bundles' => [
                'xinyeweb\highlight\HighlightAsset' => [
                    'sourcePath' => null,
                    'css' => ['/js/highlight/styles/zenburn.css'],
                    'js' => ['/js/highlight/highlight.pack.js'],
                ],
            ]
        ],
        ...
    ],
~~~