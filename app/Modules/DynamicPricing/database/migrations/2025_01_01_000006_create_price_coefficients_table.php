<?php
Schema::create('price_coefficients', function (Blueprint $table) {
    $table->id();
    $table->foreignId('product_id')->constrained();
    $table->foreignId('geo_id')->constrained();
    $table->decimal('coefficient', 8,4);
    $table->timestamp('calculated_at');
    $table->unique(['product_id','geo_id']);
});
