<?php
class RecalculateCoefficientsCommand extends Command
{
    protected $signature = 'pricing:recalculate';

    public function handle(CoefficientService $service)
    {
        ProductGeoPrice::chunk(500, function ($items) use ($service) {
            foreach ($items as $item) {
                $service->recalcFor($item->product_id, $item->geo_id);
            }
        });
    }
}
