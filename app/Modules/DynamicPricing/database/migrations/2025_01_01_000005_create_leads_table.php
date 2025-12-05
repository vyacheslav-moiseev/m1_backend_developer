<?php
Schema::create('leads', function (Blueprint $table) {
    $table->id();
    $table->foreignId('product_id')->constrained();
    $table->foreignId('geo_id')->constrained();
    $table->timestamp('created_at');
});
