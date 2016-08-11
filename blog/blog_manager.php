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
            'images' => $images
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
