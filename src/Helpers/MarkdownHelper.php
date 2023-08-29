<?php

namespace App\Helpers;

use cebe\markdown\Markdown;

class MarkdownHelper
{

    public function __construct(protected Markdown $parser)
    {
    }
    public function parse(array $posts): array
    {


        $parsePosts = [];
        foreach ($posts as $post) {
            $parsePosts[] = [
                'title' => $post->getTitle(),
                'content' =>$this->parser->parse($post->getContent())
            ];

        }
        return $parsePosts;

    }


}