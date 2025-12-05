<?php
Schema::create('product_geo_price', function (Blueprint $table) {
    $table->id();
    $table->foreignId('product_id')->constrained();
    $table->foreignId('geo_id')->constrained();
    $table->decimal('base_price', 12,2);
    $table->decimal('shipping_price', 12,2);
    $table->timestamps();

    $table->unique(['product_id','geo_id']);
});
