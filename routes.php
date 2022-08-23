<?php

use Thaiminh\Diemban\Http\Controllers\DiemBanController;

Route::get('/diem-ban', [DiemBanController::class, 'pageDiemBan'])->name('page.diemban');

$regions = ['mien-bac', 'mien-trung', 'mien-nam'];
foreach($regions as $region){
    Route::get('/'.$region.'/{slug}', [DiemBanController::class, 'pageDiemBanDetail'])->name('page.diemban.'.$region);
}


