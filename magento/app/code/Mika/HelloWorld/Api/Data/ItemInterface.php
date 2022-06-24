<?php

namespace Mika\HelloWorld\Api\Data;

/**
 ** Interface ItemInterface
 * Get news and comments
 *
 * @api
 */
interface ItemInterface
{
    const ID = 'news_id';
    const TYPE = 'news';

    /**
     * @return string
     */
    public function getNews(): string;

    /**
     * @param string $news
     *
     * @return void
     */
    public function setNews(string $news): void;

//    /**
//     * @return string|null
//     */
//    public function getComment();

    /**
     * @return mixed
     */
    public function getId();

    /**
     * @param int $id
     *
     * @return $this
     */
    public function setId(int $id);
}
