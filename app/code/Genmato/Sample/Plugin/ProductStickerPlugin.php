<?php
namespace Genmato\Sample\Plugin;

class ProductStickerPlugin
{
    public function afterGetProductDetailsHtml(
        \Magento\Catalog\Block\Product\ListProduct $subject,
        $result,
        \Magento\Catalog\Model\Product $product
    ) {
        $newFromDate = $product->getData('news_from_date');
        $newToDate = $product->getData('news_to_date');
        $now = date('Y-m-d H:i:s');

        if ($newFromDate && $newToDate && $now >= $newFromDate && $now <= $newToDate) {
            $sticker = '<div class="genmato-sticker">NEW</div>';
            $result = $sticker . $result;
        }

        return $result;
    }
}
