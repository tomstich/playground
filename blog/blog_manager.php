<?php

/**
 * Creates a blog
 *
 * @param string $title
 * @return array
 */
function createBlog(string $title): array
{
    return [
        'name' => $title,
        'article' => [],
    ];
}

/**
 * Creates an author
 *
 * @param string $author
 * @param string $role
 * @return array
 */
function createAuthor(string $author, string $role): array
{
    return [
        'name' => $author,
        'role' => $role,
        'id' => uniqid(),
    ];
}

/**
 * Creates an image
 *
 * @param string $name
 * @param int $width
 * @param int $height
 * @return array
 */
function createImage(string $name, int $width, int $height)
{
    return [
        'name' => $name,
        'width' => $width,
        'height' => $height,
    ];
}

/**
 * Creates an article
 *
 * @param array $blog
 * @param array $author
 * @param string $headline
 * @param string $content
 * @param array $images
 * @return array $blog
 */
function createArticle(
    array $blog,
    array $author,
    string $headline,
    string $content,
    array $images = []
): array
{
    $article = [
            'headline' => $headline,
            'author' => $author,
            'content' => $content,
            'images' => $images,
            'date' => date("m.d.Y"),
    ];
    $blog['article'][] = $article;
    return $blog;
}

/**
 * Finds articles by author
 *
 * @param array $blog
 * @param array $author
 * @return array $results
 */
function findArticlesByAuthor(array $blog, array $author): array
{
    $results = [];
    foreach ($blog['article'] as $article) {
        if ($article['author']['name'] === $author['name']) {
            $results[] = $article;
        }
    }
    return $results;
}

/**
 * Finds articles by date
 *
 * @param array $blog
 * @param int $day
 * @param int $month
 * @param int $year
 * @return array $results
 */
function findArticlesByDate(array $blog, int $day, int $month, int $year): array
{
    $date = date("m.d.Y", mktime(0, 0, 0, $month, $day, $year));
    $results = [];
    foreach ($blog['article'] as $article) {
        if ($article['date'] === $date) {
            $results[] = $article;
        }
    }
    return $results;
}

/**
 * Outputs debug information
 *
 * @param array $articleList
 */
function printBlog(array $articleList)
{
    foreach ($articleList['article'] as $article) {
        if (count($article['images']) > 0) {

            $imageOutput = '';
            foreach ($article['images'] as $image) {
                $imageOutput .=  $image['width'] . 'x' . $image['height'] . ", '" . $image['name'] . "'; ";
            }
            printf("Headline:\t%s\nContent:\t%s\nImage:\t\t%s\nDate:\t\t%s\nAuthor:\t\t%s, %s\n\n"
                , $article['headline']
                , $article['content']
                , $imageOutput
                , $article['date']
                , $article['author']['name']
                , $article['author']['role']
                );
        } else {
            printf("Headline:\t%s\nContent:\t%s\nImage:\nDate:\t\t%s\nAuthor:\t\t%s, %s\n\n"
                , $article['headline']
                , $article['content']
                , $article['date']
                , $article['author']['name']
                , $article['author']['role']
                );
        }
    }
}
