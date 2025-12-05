<?php
class PriceController extends Controller
{
    public function getPrice(Request $request, PricingService $service)
    {
        return response()->json([
            'price' => $service->getFinalPrice(
                $request->product_id,
                $request->geo_id
            )
        ]);
    }
}
