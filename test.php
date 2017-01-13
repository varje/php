<?php
/**
 * Created by PhpStorm.
 * User: Elitebook 1020
 * Date: 12-Jan-17
 * Time: 11:19
 */
//use text object class
require_once 'text.php';
//create objects
$sentence1 = new text();
echo '<pre>';
print_r($sentence1);
echo '<pre>';
//set text value
$sentence1->setText("Tere VS16!");
//object output
echo '<pre>';
print_r($sentence1);
echo '<pre>';
 //object output by show method
$sentence1->show();
echo '<hr>';

$sentence2 = new text('Tere koos kontrukturiga');
echo '<pre>';
print_r($sentence2);
echo '<pre>';
$sentence2->show();
echo '<hr>';

$sentence3 = new ctext('Värviline tere koos konstrikturiga');
// control object output
echo '<pre>';
print_r($sentence3);
echo '</pre>';
// show object output
$sentence3->show();
?>
