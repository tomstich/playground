<?php

require 'blog_manager.php';

$blog = createBlog('My Fancy Blog');

$tom = createAuthor('Tom Stich', 'admin');
$jenny = createAuthor('Jennifer Eschenhorn', 'moderator');

$imagesForTomsArticle = [
    createImage('sunset.jpg', 640, 480),
    createImage('moonlight.jpg', 640, 480),
    createImage('forest.jpg', 630, 580),
];


$blog = createArticle($blog, $tom, 'My Headline', 'Some content...', $imagesForTomsArticle);
$blog = createArticle($blog, $jenny, 'My Headline 2', 'Some other content...');
$blog = createArticle($blog, $tom, 'My Headline 3', 'Yet some other content...');
$blog = createArticle($blog, $jenny, 'Another Headline', 'Some other content... bla');


// All articles from Jenny
$jennysArticles = findArticlesByAuthor($blog, $jenny);

// All articles from Tom
$tomsArticles = findArticlesByAuthor($blog, $tom);

// All articles from a specific date

$day = 11;
$month = 8;
$year = 2016;

$articlesOfDate = findArticlesByDate($blog, $day, $month, $year);

// Output all articles in a formatted manner sorted by date
printBlog($blog);
