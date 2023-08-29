<?php

namespace App\Helpers;

use cebe\markdown\Markdown;

class MarkdownHelper
{
    protected $parse;
    public function __construct(Markdown $parser)
    {
        $this->parse = $parser;
    }
    public function parse(array $posts): array
    {


        $parsePosts = [];
        foreach ($posts as $post) {
            $parsePosts[] = [
                'title' => $post->getTitle(),
                'content' =>$this->parse->parse($post->getContent())
            ];

        }
        return $parsePosts;

    }


}