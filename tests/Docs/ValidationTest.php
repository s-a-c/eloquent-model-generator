<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Tests\Docs;

use PHPUnit\Framework\TestCase;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use SAC\EloquentModelGenerator\Docs\Validation\DocumentationValidator;

final class ValidationTest extends TestCase
{
    private string $testDocsPath;

    private DocumentationValidator $validator;

    protected function setUp(): void
    {
        parent::setUp();
        $this->testDocsPath = __DIR__.'/fixtures/docs';
        $this->validator = new DocumentationValidator($this->testDocsPath);

        // Create test documentation structure
        $this->createTestDocs();
    }

    protected function tearDown(): void
    {
        // Clean up test files
        $this->cleanupTestDocs();
        parent::tearDown();
    }

    public function test_validates_file_structure(): void
    {
        // Test with complete structure
        $result = $this->validator->validate();
        $this->assertTrue($result);

        // Test with missing file
        unlink("{$this->testDocsPath}/index.md");
        $result = $this->validator->validate();
        $this->assertFalse($result);
    }

    public function test_validates_internal_links(): void
    {
        // Create test files with links
        $content = "# Test\n[Valid Link](index.md)\n[Invalid Link](missing.md)";
        file_put_contents("{$this->testDocsPath}/links.md", $content);

        $result = $this->validator->validate();
        $this->assertFalse($result);

        // Check validation report
        $report = json_decode(file_get_contents(
            "{$this->testDocsPath}/validation-report.json"
        ), true);

        $this->assertStringContainsString(
            'Broken internal link: missing.md',
            $report['errors'][0]
        );
    }

    public function test_validates_heading_hierarchy(): void
    {
        // Test valid hierarchy
        $validContent = "# H1\n## H2\n### H3";
        file_put_contents("{$this->testDocsPath}/valid-headings.md", $validContent);

        $result = $this->validator->validate();
        $this->assertTrue($result);

        // Test invalid hierarchy
        $invalidContent = "# H1\n### H3\n## H2";
        file_put_contents("{$this->testDocsPath}/invalid-headings.md", $invalidContent);

        $result = $this->validator->validate();
        $this->assertTrue($result); // Should pass but with warnings

        $report = json_decode(file_get_contents(
            "{$this->testDocsPath}/validation-report.json"
        ), true);

        $this->assertStringContainsString(
            'Skipped heading level',
            $report['warnings'][0]
        );
    }

    public function test_validates_image_alt_text(): void
    {
        // Test with alt text
        $validContent = '![Alt text](image.png)';
        file_put_contents("{$this->testDocsPath}/valid-image.md", $validContent);

        $result = $this->validator->validate();
        $this->assertTrue($result);

        // Test without alt text
        $invalidContent = '![](image.png)';
        file_put_contents("{$this->testDocsPath}/invalid-image.md", $invalidContent);

        $result = $this->validator->validate();
        $this->assertTrue($result); // Should pass but with warnings

        $report = json_decode(file_get_contents(
            "{$this->testDocsPath}/validation-report.json"
        ), true);

        $this->assertStringContainsString(
            'Missing alt text',
            $report['warnings'][0]
        );
    }

    public function test_validates_color_contrast(): void
    {
        // Test with good contrast
        $validContent = "```css\ncolor: #000000;\n```";
        file_put_contents("{$this->testDocsPath}/valid-color.md", $validContent);

        $result = $this->validator->validate();
        $this->assertTrue($result);

        // Test with poor contrast
        $invalidContent = "```css\ncolor: #DDDDDD;\n```";
        file_put_contents("{$this->testDocsPath}/invalid-color.md", $invalidContent);

        $result = $this->validator->validate();
        $this->assertTrue($result); // Should pass but with warnings

        $report = json_decode(file_get_contents(
            "{$this->testDocsPath}/validation-report.json"
        ), true);

        $this->assertStringContainsString(
            'Low contrast color',
            $report['warnings'][0]
        );
    }

    public function test_validates_required_sections(): void
    {
        // Test with all required sections
        $validContent = "# Overview\n# Methods\n# Parameters\n# Returns\n# Examples";
        file_put_contents("{$this->testDocsPath}/api/index.md", $validContent);

        $result = $this->validator->validate();
        $this->assertTrue($result);

        // Test with missing sections
        $invalidContent = "# Overview\n# Methods";
        file_put_contents("{$this->testDocsPath}/api/index.md", $invalidContent);

        $result = $this->validator->validate();
        $this->assertTrue($result); // Should pass but with warnings

        $report = json_decode(file_get_contents(
            "{$this->testDocsPath}/validation-report.json"
        ), true);

        $this->assertStringContainsString(
            'Missing required heading',
            $report['warnings'][0]
        );
    }

    private function createTestDocs(): void
    {
        $structure = [
            'index.md' => '# Main Index',
            'README.md' => '# README',
            'architecture/index.md' => "# System Architecture\n# Core Components\n# Integration Points",
            'implementation/index.md' => "# Prerequisites\n# Installation\n# Configuration\n# Usage",
            'api/index.md' => "# Overview\n# Methods\n# Parameters\n# Returns\n# Examples",
            'guides/index.md' => '# Guides',
            'testing/index.md' => '# Testing',
            'styles/index.md' => '# Styles',
            'styles/color-system.md' => '# Color System',
            'validation/index.md' => '# Validation',
        ];

        foreach ($structure as $file => $content) {
            $path = "{$this->testDocsPath}/".dirname($file);
            if (! is_dir($path)) {
                mkdir($path, 0777, true);
            }
            file_put_contents("{$this->testDocsPath}/{$file}", $content);
        }
    }

    private function cleanupTestDocs(): void
    {
        if (is_dir($this->testDocsPath)) {
            $files = new RecursiveIteratorIterator(
                new RecursiveDirectoryIterator($this->testDocsPath, RecursiveDirectoryIterator::SKIP_DOTS),
                RecursiveIteratorIterator::CHILD_FIRST
            );

            foreach ($files as $file) {
                if ($file->isDir()) {
                    rmdir($file->getRealPath());
                } else {
                    unlink($file->getRealPath());
                }
            }
            rmdir($this->testDocsPath);
        }
    }
}
