<?php
Schema::create('geo', function (Blueprint $table) {
    $table->id();
    $table->string('code')->unique();
    $table->string('name');
    $table->foreignId('currency_id')->constrained();
});
