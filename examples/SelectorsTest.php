<?php

namespace Examples;

use Facebook\WebDriver\WebDriverBy;
use Magium\AbstractTestCase;

class SelectorsTest extends AbstractTestCase
{

    /**
     *
     * As a software developer I want to show that simple Xpath and multiple CSS classes require work
     *
     */

    public function testHeaderFails()
    {
        $this->setExpectedException('Facebook\WebDriver\Exception\NoSuchElementException');
        $this->webdriver->findElement(WebDriverBy::xpath('//div[@class="main-content"]'));
    }


    /**
     *
     * As frontend user I want to see te main content area
     *
     */

    public function testHeaderSucceeds()
    {
        $this->webdriver->findElement(WebDriverBy::xpath($this->concatClass('//div[%s]', 'main-content')));
    }





    // helper functionality

    protected function setUp()
    {
        parent::setUp();
        $path = 'file://' . realpath('selectors.html');
        $this->commandOpen($path);
    }

    protected function concatClass($xpath, $class)
    {
        $concat = sprintf('contains(concat(" ",normalize-space(@class)," ")," %s ")', $class);
        return sprintf($xpath, $concat);
    }

}
