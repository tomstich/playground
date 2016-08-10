<?php

require 'blog_manager.php';

$authors = ['Klaus', 'Peter', 'Lisa', 'Jenny', 'Tom', 'Anouar'];
$roles = ['Admin', 'Moderator', 'User'];
$headlines = ['Hallo', 'Moin', 'Urlaub', 'Sonne'];
$contents = ['ASJDHKASJHDFSDFBKSDDKFDSH', '166416313464613131654', 'fsdkdbisocnxpnofodn', '!@#$%^&*()_(*&^%$#)'];

$articleListSize = 5;
$articleList = [];

for ($i=0; $i < $articleListSize; $i++) {
    $id = $i;

    $author = addAuthor($authors[rand(0, count($authors) - 1)], $roles[rand(0, count($roles) - 1)], $id);

    $article = createArticle(
        $headlines[rand(0, count($headlines) - 1)],
        $contents[rand(0, count($contents) - 1)],
        $author,
        $id
    );

    $articleList[$article['id']] = $article;
}

debugArticle($articleList);
$articleList = deleteArticle($articleList, 3);
debugArticle($articleList);
