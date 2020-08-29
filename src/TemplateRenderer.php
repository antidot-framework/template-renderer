<?php

declare(strict_types=1);

namespace Antidot\Render;

interface TemplateRenderer
{
    /**
     * @param string $template
     * @param array<string, mixed> $data
     * @return string
     */
    public function render(string $template, array $data = []): string;
}
