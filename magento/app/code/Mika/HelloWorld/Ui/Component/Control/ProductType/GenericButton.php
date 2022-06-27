<?php

namespace Mika\HelloWorld\Ui\Component\Control\ProductType;

use Mika\HelloWorld\Model\ItemRepository;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\UrlInterface;
use phpDocumentor\Reflection\Utils;

class GenericButton
{
    private UrlInterface $urlBuilder;
    private RequestInterface $request;
    private ItemRepository $itemRepository;

    public function __construct(
        UrlInterface $urlBuilder,
        RequestInterface $request,
        ItemRepository $itemRepository
    ) {
        $this->urlBuilder = $urlBuilder;
        $this->request = $request;
        $this->itemRepository = $itemRepository;
    }

    public function getUrl($route = '', $params = [])
    {
        return $this->urlBuilder->getUrl($route, $params);
    }

    public function getProductType()
    {
        $productTypeId = $this->request->getParam('id');
        if ($productTypeId === null) {
            return 0;
        }
        $productType = $this->itemRepository->get($productTypeId);

        return $productType->getId() ?: null;
    }
}
