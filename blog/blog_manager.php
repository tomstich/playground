<?php

/**
*   Adds an author
*
*   @param string $name
*   @param string $role
*   @return array
*/
function addAuthor(string $name, string $role, int $id): array
{
    return [
        'name' => $name,
        'role' => $role,
        'id' => $id,
    ];
}

/**
*   Creates an article
*
*   @param string $headline
*   @param string $content
*   @param array $author
*   @param int $id
*   @return array
*/
function createArticle(string $headline, string $content, array $author, int $id): array
{
    return [
        'headline' => $headline,
        'content' => $content,
        'author' => $author,
        'datum' => date("d.m.Y"),
        'id' => $id,
        'image' => createImage(),
    ];
}

/**
*   Creates an image
*
*   @return array $image
*/
function createImage(): array
{
    $imageNames = ['Sonnenuntergang', 'Sonnenaufgang', 'Spaziergang', 'Spielende Kinder', 'Baum im Herbst'];
    $image = [
        'width' => 300,
        'height' => 200,
        'name' => $imageNames[rand(0, count($imageNames) - 1)],
        ];
    return $image;
}

// function addArticle($articleList)
// {
//     fill_Array()
// }




/**
*   Deletes an article
*
*   @param array $article
*   @param int $id
*   @return array
*/
function deleteArticle(array $article, int $id): array
{
    unset($article[$id]);
    echo "Article deleted: $id\n\n";
    return $article;
}

/**
*   Outputs debug information
*
*   @param array $article
*/
function debugArticle(array $articleList)
{
    foreach ($articleList as $id => $article) {
        printf("Headline:\t%s\nContent:\t%s\nImage:\t\t%dx%d, '%s'\nDate:\t\t%s\nAuthor:\t\t%s, %s\nID:\t\t%s\n\n"
            , $article['headline']
            , $article['content']
            , $article['image']['width']
            , $article['image']['height']
            , $article['image']['name']
            , $article['datum']
            , $article['author']['name']
            , $article['author']['role']
            , $article['id']
        );
    }

}
