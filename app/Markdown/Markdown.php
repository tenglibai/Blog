<?php
/**
 * Created by PhpStorm.
 * User: tenglibai
 * Date: 2017/11/24
 * Time: 17:23
 */

namespace App\Markdown;


class Markdown
{
    protected $parser;

    /**
     * Markdown constructor.
     * @param $parser
     */
    public function __construct(Parser $parser)
    {
        $this->parser = $parser;
    }

    public function markdown($text)
    {
        $html = $this->parser->makeHtml($text);
        return $html;
    }
}