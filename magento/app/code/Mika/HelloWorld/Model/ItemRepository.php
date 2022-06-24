<?php

namespace Mika\HelloWorld\Model;


use Mika\HelloWorld\Api\ItemSearchResultInterface;
use Mika\HelloWorld\Api\ItemSearchResult;
use Mika\HelloWorld\Api\Data\ItemInterface;
use Mika\HelloWorld\Api\ItemRepositoryInterface;
use Mika\HelloWorld\Model\ResourceModel\Item\CollectionFactory;
use Mika\HelloWorld\Model\ResourceModel\Item as ItemResource;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Api\SearchCriteriaInterface;
use Mika\HelloWorld\Api\ItemSearchResultInterfaceFactory;
use Mika\HelloWorld\Model\ItemFactory;


/**
 * ItemResitory  resource model
 */
class ItemRepository implements ItemRepositoryInterface
{

    protected CollectionFactory $collectionFactory;
    protected ItemResource $itemResource;
    protected ItemFactory $itemFactory;
    protected ItemSearchResultInterfaceFactory $searchResultInterfaceFactory;
    private SearchCriteriaBuilder $searchCriteriaBuilder;
    /**
     * @var \Mika\HelloWorld\Api\ItemSearchResultInterfaceFactory
     */
    protected ItemSearchResultInterfaceFactory $itemSearchResultInterfaceFactory;


    /**
     * @param \Mika\HelloWorld\Model\ItemFactory                          $itemFactory
     * @param \Mika\HelloWorld\Model\ResourceModel\Item\CollectionFactory $collectionFactory
     * @param \Mika\HelloWorld\Model\ResourceModel\Item                   $itemResource
     * @param \Mika\HelloWorld\Api\ItemSearchResultInterfaceFactory       $searchResultInterfaceFactory
     * @param \Magento\Framework\Api\SearchCriteriaBuilder                $searchCriteriaBuilder
     */
    public function __construct(
        ItemFactory $itemFactory,
        CollectionFactory $collectionFactory,
        ItemResource  $itemResource,
        ItemSearchResultInterfaceFactory $searchResultInterfaceFactory,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        ItemSearchResultInterfaceFactory $itemSearchResultInterfaceFactory
    )
    {

        $this->itemFactory = $itemFactory;
        $this->collectionFactory = $collectionFactory;
        $this->itemResource = $itemResource;
        $this->searchResultFactory = $searchResultInterfaceFactory;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;

        $this->itemSearchResultInterfaceFactory
            = $itemSearchResultInterfaceFactory;
    }

    /**
     * @param int $id
     *
     * @return \Mika\HelloWorld\Api\Data\ItemInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function get(int $id): ItemInterface
    {
        $object = $this->itemFactory->create();
        $this->itemResource->load($object, $id);
        if (! $object->getId()) {
            throw new NoSuchEntityException(__('Unable to find entity with ID "%1"', $id));
        }
        return $object;
    }
    /**
     * @return \Magento\Framework\DataObject[]|\Mika\HelloWorld\Api\Mika\HelloWorld\Api\Data\ItemInterface[]
     */
    public function getList(): array
    {
        return $this->collectionFactory->create()->getItems();
    }



//    public function getList(SearchCriteriaInterface $searchCriteria =null):ItemSearchResultInterface
//    {
//        $collection = $this->collectionFactory->create();
//        $searchCriteria = $this->searchCriteriaBuilder->create();
//
//        if (null === $searchCriteria) {
//            $searchCriteria = $this->searchCriteriaBuilder->create();
//        } else {
//            foreach ($searchCriteria->getFilterGroups() as $filterGroup) {
//                foreach ($filterGroup->getFilters() as $filter) {
//                    $condition = $filter->getConditionType() ? $filter->getConditionType() : 'eq';
//                    $collection->addFieldToFilter($filter->getField(), [$condition => $filter->getValue()]);
//                }
//            }
//        }
//
//        $searchResult = $this->searchResultFactory->create();
//        $searchResult->setItems($collection->getItems());
//        $searchResult->setTotalCount($collection->getSize());
//        $searchResult->setSearchCriteria($searchCriteria);
//        return $searchResult;
//    }
    /**
     * @param \Mika\HelloWorld\Api\Data\ItemInterface $news
     *
     * @return \Mika\HelloWorld\Api\Data\ItemInterface
     * @throws \Magento\Framework\Exception\AlreadyExistsException
     */
    public function save(ItemInterface $news): ItemInterface
    {
        $this->itemResource->save($news);
        return $news;
    }


    /**
     * @throws \Magento\Framework\Exception\StateException
     */
    public function delete(ItemInterface $workingHours): bool
    {
        try {
            $this->itemResource->delete($workingHours);
        } catch (\Exception $e) {
            throw new StateException(__('Unable to remove entity #%1', $workingHours->getId()));
        }
        return true;
    }

    /**
     * @param int $id
     *
     * @return bool
     * @throws NoSuchEntityException*@throws \Magento\Framework\Exception\StateException
     * @throws \Magento\Framework\Exception\StateException
     */
    public function deleteById(int $id): bool
    {
        return $this->delete($this->get($id));
    }

}
