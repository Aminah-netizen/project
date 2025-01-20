<?php
declare(strict_types=1);

namespace App\Test\TestCase\View\Helper;

use App\View\Helper\HtmlHelper;
use Cake\TestSuite\TestCase;
use Cake\View\View;

/**
 * App\View\Helper\HtmlHelper Test Case
 */
class HtmlHelperTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\View\Helper\HtmlHelper
     */
    protected $HtmlHelper;

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $view = new View();
        $this->HtmlHelper = new HtmlHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->HtmlHelper);

        parent::tearDown();
    }
}
