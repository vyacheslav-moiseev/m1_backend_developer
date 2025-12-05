<?php
class CoefficientService
{
    public function recalcFor(int $productId, int $geoId)
    {
        $count = Redis::get("lead_count:$productId:$geoId") ?? 0;

        $coef = 1 / (1 + $count / 100);

        PriceCoefficient::updateOrCreate(
            ['product_id' => $productId, 'geo_id' => $geoId],
            ['coefficient' => $coef, 'calculated_at' => now()]
        );

        Redis::del("lead_count:$productId:$geoId");

        return $coef;
    }
}
