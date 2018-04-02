<?php

// 插件地址：https://github.com/facebook/php-webdriver
// An example of using php-webdriver.
// Do not forget to run composer install before and also have Selenium server started and listening on port 4444.
namespace Facebook\WebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
require_once('vendor/autoload.php');
// start Chrome with 5 second timeout
$host = 'http://localhost:4444/wd/hub'; // this is the default
$capabilities = DesiredCapabilities::chrome();
$driver = RemoteWebDriver::create($host, $capabilities, 5000);
// navigate to 'http://www.seleniumhq.org/'
$driver->get('http://bbs.sijiaomao.com/index.php?m=u&c=login/');
// adding cookie
//$driver->manage()->deleteAllCookies();
//$cookie = new Cookie('cookie_name', 'cookie_value');
//$driver->manage()->addCookie($cookie);
$cookies = $driver->manage()->getCookies();
print_r($cookies);
// click the link 'About'
/*$link = $driver->findElement(
    WebDriverBy::id('menu_about')
);
$link->click();
// wait until the page is loaded
$driver->wait()->until(
    WebDriverExpectedCondition::titleContains('About')
);*/
// print the title of the current page
echo "The title is '" . $driver->getTitle() . "'\n";
// print the URI of the current page
echo "The current URI is '" . $driver->getCurrentURL() . "'\n";
// write 'php' in the search box
$driver->findElement(WebDriverBy::id('J_u_login_username'))
    ->sendKeys('your username'); // fill the search box
$driver->wait(3);
$driver->findElement(WebDriverBy::id('J_u_login_password'))
    ->sendKeys('your passwd') // fill the search box
    ->submit(); // submit the whole form
// wait at most 10 seconds until at least one result is shown
$driver->wait(10)->until(
    WebDriverExpectedCondition::presenceOfAllElementsLocatedBy(
        WebDriverBy::className('logo')
    )
);

$cookies = $driver->manage()->getCookies();
print_r($cookies);
// close the browser
//$driver->quit();
