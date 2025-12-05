<?php
class PricingService
{
    public function getFinalPrice($productId, $geoId): float
    {
        $key = "final_price:$productId:$geoId";

        if ($price = Redis::get($key)) {
            return (float)$price;
        }

        $row = ProductGeoPrice::where('product_id', $productId)
            ->where('geo_id', $geoId)
            ->firstOrFail();

        $coef = PriceCoefficient::where('product_id', $productId)
            ->where('geo_id', $geoId)
            ->value('coefficient') ?? 1;

        $final = ($row->base_price + $row->shipping_price) * $coef;

        Redis::setex($key, 600, $final);

        return $final;
    }
}
