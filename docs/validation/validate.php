<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Docs\Validation;

use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use RegexIterator;
use RuntimeException;

final class DocumentationValidator
{
    private const REQUIRED_FILES = [
        'index.md',
        'README.md',
        'architecture/index.md',
        'implementation/index.md',
        'api/index.md',
        'guides/index.md',
        'testing/index.md',
        'styles/index.md',
        'styles/color-system.md',
        'validation/index.md',
    ];

    private const REQUIRED_SECTIONS = [
        'api' => ['Overview', 'Methods', 'Parameters', 'Returns', 'Examples'],
        'implementation' => ['Prerequisites', 'Installation', 'Configuration', 'Usage'],
        'architecture' => ['System Architecture', 'Core Components', 'Integration Points'],
    ];

    private array $errors = [];

    private array $warnings = [];

    private string $docsPath;

    public function __construct(string $docsPath)
    {
        $this->docsPath = mb_rtrim($docsPath, '/');
    }

    public function validate(): bool
    {
        $this->validateFileStructure();
        $this->validateLinks();
        $this->validateAccessibility();
        $this->validateContent();

        return $this->generateReport();
    }

    private function validateFileStructure(): void
    {
        foreach (self::REQUIRED_FILES as $file) {
            $path = "{$this->docsPath}/{$file}";
            if (! file_exists($path)) {
                $this->errors[] = "Missing required file: {$file}";
            }
        }
    }

    private function validateLinks(): void
    {
        $files = $this->findMarkdownFiles();

        foreach ($files as $file) {
            $content = file_get_contents($file);
            preg_match_all('/\[([^\]]+)\]\(([^\)]+)\)/', $content, $matches);

            foreach ($matches[2] as $link) {
                if (str_starts_with($link, 'http')) {
                    $this->validateExternalLink($link);
                } else {
                    $this->validateInternalLink($link, dirname($file));
                }
            }
        }
    }

    private function validateAccessibility(): void
    {
        $files = $this->findMarkdownFiles();

        foreach ($files as $file) {
            $content = file_get_contents($file);

            // Check heading hierarchy
            $this->validateHeadingHierarchy($content, $file);

            // Check image alt text
            $this->validateImageAltText($content, $file);

            // Check color contrast in code blocks
            $this->validateColorContrast($content, $file);
        }
    }

    private function validateContent(): void
    {
        foreach (self::REQUIRED_SECTIONS as $section => $requiredHeadings) {
            $indexFile = "{$this->docsPath}/{$section}/index.md";
            if (file_exists($indexFile)) {
                $content = file_get_contents($indexFile);
                foreach ($requiredHeadings as $heading) {
                    if (! str_contains($content, "# {$heading}") &&
                        ! str_contains($content, "## {$heading}")) {
                        $this->warnings[] = "Missing required heading '{$heading}' in {$section}/index.md";
                    }
                }
            }
        }
    }

    private function validateExternalLink(string $url): void
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_NOBODY, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_exec($ch);
        $responseCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($responseCode !== 200) {
            $this->errors[] = "Broken external link: {$url}";
        }
    }

    private function validateInternalLink(string $link, string $basePath): void
    {
        $path = realpath($basePath.'/'.$link);
        if (! $path || ! file_exists($path)) {
            $this->errors[] = "Broken internal link: {$link}";
        }
    }

    private function validateHeadingHierarchy(string $content, string $file): void
    {
        $lines = explode("\n", $content);
        $level = 1;

        foreach ($lines as $line) {
            if (preg_match('/^(#{1,6})\s/', $line, $matches)) {
                $currentLevel = mb_strlen($matches[1]);
                if ($currentLevel > $level + 1) {
                    $this->warnings[] = "Skipped heading level in {$file}";
                }
                $level = $currentLevel;
            }
        }
    }

    private function validateImageAltText(string $content, string $file): void
    {
        preg_match_all('/!\[([^\]]*)\]\(([^\)]+)\)/', $content, $matches);

        foreach ($matches[1] as $index => $alt) {
            if (empty($alt)) {
                $this->warnings[] = "Missing alt text for image {$matches[2][$index]} in {$file}";
            }
        }
    }

    private function validateColorContrast(string $content, string $file): void
    {
        // Extract color definitions
        preg_match_all('/#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})/', $content, $matches);

        foreach ($matches[1] as $color) {
            $this->checkColorContrast($color, $file);
        }
    }

    private function checkColorContrast(string $color, string $file): void
    {
        // Convert color to RGB
        $color = mb_str_pad($color, 6, mb_substr($color, -1));
        $r = hexdec(mb_substr($color, 0, 2));
        $g = hexdec(mb_substr($color, 2, 2));
        $b = hexdec(mb_substr($color, 4, 2));

        // Calculate relative luminance
        $luminance = 0.2126 * $r + 0.7152 * $g + 0.0722 * $b;

        // Check against WCAG guidelines
        if ($luminance < 128) {
            $this->warnings[] = "Low contrast color #{$color} in {$file}";
        }
    }

    private function findMarkdownFiles(): array
    {
        $directory = new RecursiveDirectoryIterator($this->docsPath);
        $iterator = new RecursiveIteratorIterator($directory);
        $files = new RegexIterator($iterator, '/\.md$/i');

        return array_map(
            fn ($file) => $file->getPathname(),
            iterator_to_array($files)
        );
    }

    private function generateReport(): bool
    {
        $reportFile = "{$this->docsPath}/validation-report.json";
        $report = [
            'timestamp' => date('c'),
            'status' => empty($this->errors),
            'summary' => [
                'errors' => count($this->errors),
                'warnings' => count($this->warnings),
            ],
            'errors' => $this->errors,
            'warnings' => $this->warnings,
        ];

        file_put_contents($reportFile, json_encode($report, JSON_PRETTY_PRINT));

        return empty($this->errors);
    }
}

// Run validation if executed directly
if (PHP_SAPI === 'cli' && realpath($_SERVER['SCRIPT_FILENAME']) === __FILE__) {
    $docsPath = dirname(__DIR__);
    $validator = new DocumentationValidator($docsPath);

    try {
        $result = $validator->validate();
        exit($result ? 0 : 1);
    } catch (RuntimeException $e) {
        fwrite(STDERR, "Error: {$e->getMessage()}\n");
        exit(1);
    }
}
