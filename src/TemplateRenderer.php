<?php

declare(strict_types=1);

namespace Antidot\Render;

interface TemplateRenderer
{
    public function render(string $template, array $data = []): string;
}
