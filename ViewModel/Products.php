<?php

namespace Perspective\Test2\ViewModel;

use Magento\Catalog\Model\CategoryFactory;
use Magento\Catalog\Model\Product;
use Magento\Framework\View\Element\Block\ArgumentInterface;

class Products implements ArgumentInterface
{
    protected $categoryFactory;

    public function __construct(
        CategoryFactory $categoryFactory
    )
    {
        $this->categoryFactory = $categoryFactory;
    }

    /**
     * @return Product[]
     */
    public function getProductsFromCategory()
    {
        $categoryId = 23;
        return $this->categoryFactory->create()->load($categoryId)
            ->getProductCollection()->addAttributeToSelect('*')
            ->addFieldToFilter('price',
                    array('from' => 50, 'to' => 60),
            )->getItems();
    }
}
