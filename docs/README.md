# Antidot Template Renderer

This package is a simple interface that allows implementing different template renderer engines in our applications.

## Install

<!-- tabs:start -->

### **Pug**

```bash
composer require antidot-fw/phug-template-renderer
```

### **Twig**

Coming soon

```bash
composer require antidot-fw/twig-template-renderer
```

<!-- tabs:end -->

## Available Implementations

* [Phug Template Renderer](https://github.com/antidot-framework/phug-template-renderer)

## Config

<!-- tabs:start -->

### **Pug**

```php
<?php

declare(strict_types=1);

$config = [
    'pug' => [
        'pretty' => true,
        'expressionLanguage' => 'js',
        'pugjs' => false,
        'localsJsonFile' => false,
        'cache' => 'var/cache/pug',
        'template_path' => 'templates/',
        'globals' => [],
        'filters' => [],
        'keywords' => [],
        'helpers' => [],
        'default_params' => [],
    ],
];
```

### **Twig**

```php
<?php

declare(strict_types=1);

$config = [
    'template' => [
        'debug' => false,
        'file_extension' => 'twig',
        'charset' => 'utf-8',
        'template_path' => 'templates',
        'cache' => 'var/cache/twig',
        'auto_reload' => false,
        'autoescape' => 'html',
        'strict_variables' => true,
        'globals' => [
            // 'name' => 'value',
        ],
        'extensions' => [
            // EtensionClassName::class,
        ],
        'filters' => [
            // 'name' => PHPCallableClass::class,
            // 'some_function' => 'php_some_function,
        ],
        'functions' => [
            // 'name' => PHPCallableClass::class,
            // 'some_function' => 'php_some_function,
        ],
    ],
];
```

<!-- tabs:end -->

## Usage

<!-- tabs:start -->

### **Pug**

See full [PHP Pug documentation](https://www.phug-lang.com/) for more detail.

### **Twig**

See full [Twig documentation](https://twig.symfony.com/) for more detail.

<!-- tabs:end -->

### In a PSR7 Request Handler

```php
<?php

declare(strict_types=1);

use Antidot\Render\TemplateRenderer;
use Laminas\Diactoros\Response\HtmlResponse;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;

class SomeHandler implements RequestHandlerInterface
{
    private TemplateRenderer $template;

    public function __construct(TemplateRenderer $template) 
    {
        $this->template = $template;
    }

    public function handle(ServerRequestInterface $request) : ResponseInterface
    {
        return new HtmlResponse(
            $this->template->render('index', [
                'name' => 'Koldo ;-D',
            ])
        );
    }
}
```

<!-- tabs:start -->

### **Pug**

```pug
// templates/index.pug
html
    head
        title Antidot Todo List app
        link(rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css")
        link(href="//fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet")
    body
        main
            section(class="container")
                h1 Hello #{name} 

    script(type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js")
    block scripts

```

### **Twig**

```twig
<!--// templates/index.html.twig-->
<html>
<head></head>
<title>{{ title }}</title>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"/>
<link href="//fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
<body>
<main>
    <section class="container">
    <h1>Hello {{ name }}</h1>

        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"/>
    </section>
</main>
```

<!-- tabs:end -->
