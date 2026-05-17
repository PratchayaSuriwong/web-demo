<?php
define('SITE_NAME', 'GreenLoop Bottle Market');
define('SITE_DESCRIPTION', 'แพลตฟอร์มรับซื้อขวดพลาสติกสำหรับผู้ขายที่ต้องการบันทึกจำนวนขวด ประเมินราคา และเรียกรถรับซื้อ');
define('BASE_URL', '');

$pricingTable = [
    ['type' => 'PET ใส', 'price' => 8.50, 'unit' => 'กก.', 'note' => 'ขวดน้ำดื่มใส แยกฝาและฉลากแล้ว'],
    ['type' => 'PET สี', 'price' => 5.80, 'unit' => 'กก.', 'note' => 'ขวดชา น้ำหวาน หรือขวดสีอื่น'],
    ['type' => 'HDPE', 'price' => 11.20, 'unit' => 'กก.', 'note' => 'แกลลอนนม ขวดแชมพู และบรรจุภัณฑ์หนา'],
];

$sampleSellerStats = [
    'bottles' => '1,240',
    'weight' => '37.2 กก.',
    'estimate' => '฿316',
    'pickup' => 'วันนี้ 16:30',
];
