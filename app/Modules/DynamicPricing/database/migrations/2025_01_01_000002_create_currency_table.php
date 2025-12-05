<?php
Schema::create('currency', function (Blueprint $table) {
    $table->id();
    $table->string('code')->unique();
});
