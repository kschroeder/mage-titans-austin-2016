<?php

namespace Examples;

use Facebook\WebDriver\WebDriverBy;
use Magium\AbstractTestCase;
use Magium\WebDriver\ExpectedCondition;

class PlanTest extends AbstractTestCase
{

    public function testThisIsAlmostTooEasyAndWillProbablyBreakWhenITryItLive()
    {

        $button1 = '//button[@id="click-1"]';
        $element = $this->webdriver->findElement(WebDriverBy::xpath($button1));
        self::assertTrue($element->isDisplayed());
        $element->click();

        $button2 = '//button[@id="click-2"]';
        $element = $this->webdriver->findElement(WebDriverBy::xpath($button2));
        self::assertTrue($element->isDisplayed());
        $element->click();

        $button3 = '//button[@id="click-3"]';
        $element = $this->webdriver->findElement(WebDriverBy::xpath($button3));
        self::assertTrue($element->isDisplayed());
        $element->click();

        $finalElement = '//div[@id="third-click-result"]/p';
        $element = $this->webdriver->findElement(WebDriverBy::xpath($finalElement));
        $this->webdriver->wait(2)->until(ExpectedCondition::visibilityOf($element));

        $text = $element->getText();

        $checkText = 'You did it!!';

        self::assertEquals($text, $checkText);

    }





    // helper functionality

    protected function setUp()
    {
        parent::setUp();
        $path = 'file://' . realpath('plan.html');
        $this->commandOpen($path);
    }


}