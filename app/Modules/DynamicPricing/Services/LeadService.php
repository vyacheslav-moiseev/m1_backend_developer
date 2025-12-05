<?php
class LeadService
{
    public function addLead(int $productId, int $geoId)
    {
        $key = "lead_count:$productId:$geoId";

        Redis::incr($key);
        Redis::expire($key, 600);

        LeadJob::dispatch($productId, $geoId);
    }
}
