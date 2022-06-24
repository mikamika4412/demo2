<?php

namespace Mika\HelloWorld\Api;

use Mika\HelloWorld\Api\ItemSearchResultInterface;
use Mika\HelloWorld\Api\Data\ItemInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
/**
 * Interface ItemRepositoryInterface
 * @api
 */
interface ItemRepositoryInterface
{
    /**
     * @param int $id
     * @return \Mika\HelloWorld\Api\Data\ItemInterface
     */
    public function get(int $id): ItemInterface;

    /**
     * @return Mika\HelloWorld\Api\Data\ItemInterface[];
     */
    public function getList();


//    /**
//     * @param \Magento\Framework\Api\SearchCriteriaInterface|null $searchCriteria
//     *
//     * @return \Mika\HelloWorld\Api\ItemSearchResultInterface
//     */
//    public function getList(SearchCriteriaInterface $searchCriteria = null): ItemSearchResultInterface;


    /**
     * @param \Mika\HelloWorld\Api\Data\ItemInterface $news
     *
     * @return \Mika\HelloWorld\Api\Data\ItemInterface
     */
    public function save(ItemInterface $news): ItemInterface;


    /**
     * @param \Mika\HelloWorld\Api\Data\ItemInterface $workingHours
     *
     * @return bool
     */
    public function delete(ItemInterface $workingHours): bool;

    /**
     * @param int $id
     *
     * @return bool
     */
    public function deleteById(int $id): bool;

}
