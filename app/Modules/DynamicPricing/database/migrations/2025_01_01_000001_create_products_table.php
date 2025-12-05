<?php
Schema::create('products', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->tinyInteger('status')->default(1);
    $table->timestamps();
});
