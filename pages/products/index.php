    <main>
      <section class="page-hero">
        <p class="eyebrow">Buying prices</p>
        <h1>ราคารับซื้อขวดพลาสติก</h1>
        <p>ราคาในตารางเป็นข้อมูลตัวอย่างสำหรับหน้าเว็บ demo ราคาจริงสามารถปรับตามพื้นที่ คุณภาพวัสดุ และราคาตลาดรีไซเคิลรายวัน</p>
      </section>

      <section class="section pricing-grid">
        <?php foreach ($pricingTable as $item): ?>
          <article class="price-card">
            <header>
              <h2><?php echo htmlspecialchars($item['type'], ENT_QUOTES, 'UTF-8'); ?></h2>
              <strong>฿<?php echo number_format($item['price'], 2); ?></strong>
            </header>
            <p>ต่อ <?php echo htmlspecialchars($item['unit'], ENT_QUOTES, 'UTF-8'); ?></p>
            <p><?php echo htmlspecialchars($item['note'], ENT_QUOTES, 'UTF-8'); ?></p>
          </article>
        <?php endforeach; ?>
      </section>

      <section class="section">
        <div class="content-card">
          <h2>ตัวอย่างข้อมูลในแอปผู้ขาย</h2>
          <div class="steps">
            <div class="step"><strong>ร้าน A</strong><p>PET ใส 680 ขวด ประเมิน 20.4 กก.</p></div>
            <div class="step"><strong>คอนโด B</strong><p>PET สี 310 ขวด ประเมิน 9.9 กก.</p></div>
            <div class="step"><strong>คลัง C</strong><p>HDPE 120 ขวด ประเมิน 5.4 กก.</p></div>
          </div>
        </div>
      </section>
    </main>
