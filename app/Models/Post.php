<?php

namespace Theme\Models;

use Timber\PostCollection;

class Post
{
    /**
     *
     */
    public static function getTimber(string $postType, int $count = -1, array $options = [])
    {
        return (new PostCollection(static::wpPostObjects($postType, $count, $options)));
    }

    /**
     *
     */
    public static function getWordpress(string $postType, int $count = -1, array $options = [])
    {
        return get_posts([
            'post_type' => $postType,
            'posts_per_page' => $count,
        ] + $options);
    }
}
