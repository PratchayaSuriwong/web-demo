    <main>
      <section class="page-hero">
        <p class="eyebrow">Contact</p>
        <h1>ขอทดลองใช้แอป หรือจองรอบรับซื้อ</h1>
        <p>ฝากข้อมูลไว้ให้ทีม GreenLoop ติดต่อกลับ พร้อมประเมินพื้นที่และรอบรับซื้อที่เหมาะกับคุณ</p>
      </section>

      <section class="section contact-grid">
        <div class="form-panel">
          <h2>ส่งข้อมูลติดต่อ</h2>
          <form>
            <div class="field">
              <label for="name">ชื่อผู้ติดต่อ</label>
              <input id="name" type="text" placeholder="ชื่อร้านหรือชื่อผู้ขาย" />
            </div>
            <div class="field">
              <label for="phone">เบอร์โทร</label>
              <input id="phone" type="tel" placeholder="08x-xxx-xxxx" />
            </div>
            <div class="field">
              <label for="message">รายละเอียดขวดที่มี</label>
              <textarea id="message" placeholder="เช่น PET ใสประมาณ 500 ขวด อยู่เขตบางนา"></textarea>
            </div>
            <button class="button primary" type="button">ส่งคำขอทดลองใช้</button>
          </form>
        </div>

        <div class="content-card">
          <h2>ช่องทางติดต่อ</h2>
          <p>โทร: 02-118-4020</p>
          <p>Line: @greenloop-demo</p>
          <p>อีเมล: hello@greenloop.example</p>
          <div class="contact-options">
            <a class="button secondary" href="<?php echo BASE_URL; ?>/?page=products">ดูราคาก่อนขาย</a>
            <a class="button primary" href="<?php echo BASE_URL; ?>/?page=home">กลับหน้าแรก</a>
          </div>
        </div>
      </section>
    </main>
