<?php

namespace AdvancedCoder\ProductTypes\Model\Resolver;

use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Query\Resolver\ContextInterface;
use Magento\Framework\GraphQl\Query\Resolver\Value;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use AdvancedCoder\ProductTypes\Model\ResourceModel\ProductTypes\CollectionFactory;
use AdvancedCoder\ProductTypes\Model\ProductTypes as ProductTypesModel;

class ProductTypes implements ResolverInterface
{
    private CollectionFactory $collectionFactory;

    /**
     * @param CollectionFactory $collectionFactory
     */
    public function __construct(
        CollectionFactory $collectionFactory
    )
    {
        $this->collectionFactory = $collectionFactory;
    }

    /**
     * @param Field $field
     * @param ContextInterface $context
     * @param ResolveInfo $info
     * @param array|null $value
     * @param array|null $args
     * @return array|array[]
     */
    public function resolve(
        Field $field,
        $context,
        ResolveInfo $info,
        array $value = null,
        array $args = null)
    {
        $collection = $this->collectionFactory->create();

        if (empty($collection)) {
            return [];
        }

        $items = [];

        /** @var ProductTypesModel $productType */
        foreach ($collection->getItems() as $productType) {
            $items[] = [
                'id' => $productType->getId(),
                'type' => $productType->getType(),
            ];
        }

        return ['items' => $items];
    }
}
