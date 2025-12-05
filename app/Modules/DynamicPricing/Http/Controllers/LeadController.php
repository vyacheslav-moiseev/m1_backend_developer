<?php
class LeadController extends Controller
{
    public function store(Request $request, LeadService $service)
    {
        $service->addLead(
            $request->product_id,
            $request->geo_id
        );

        return response()->json(['status' => 'ok']);
    }
}
