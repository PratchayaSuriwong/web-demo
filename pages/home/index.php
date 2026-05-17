    <main>
      <section class="hero">
        <div>
          <p class="eyebrow">Plastic bottle buyback platform</p>
          <h1>ขายขวดพลาสติกง่ายขึ้น พร้อมรู้ราคาและนัดรับในแอปเดียว</h1>
          <p class="hero-copy">GreenLoop ช่วยให้ร้านค้า อาคารสำนักงาน และครัวเรือนบันทึกจำนวนขวดที่มีอยู่ ประเมินมูลค่ารับซื้อ และส่งคำขอนัดรถรับซื้อได้โดยไม่ต้องโทรไล่ถามราคา</p>
          <div class="download-actions">
            <a class="app-button" href="<?php echo BASE_URL; ?>/?page=contact"><span>↓</span> ดาวน์โหลดแอปผู้ขาย</a>
            <a class="button secondary" href="<?php echo BASE_URL; ?>/?page=products">ดูราคารับซื้อ</a>
          </div>
        </div>

        <div class="phone-demo" aria-label="ตัวอย่างแอป GreenLoop">
          <div class="phone-frame">
            <div class="phone-screen">
              <div class="app-top">
                <div>
                  <span>บัญชีผู้ขาย</span>
                  <strong>ร้านน้ำใจรีไซเคิล</strong>
                </div>
                <strong>พร้อมรับ</strong>
              </div>
              <div class="scan-window">
                <div class="bottle-visual" aria-hidden="true"></div>
              </div>
              <div class="stat-list">
                <div class="stat-row"><span>จำนวนขวด</span><strong><?php echo $sampleSellerStats['bottles']; ?></strong></div>
                <div class="stat-row"><span>น้ำหนักประมาณ</span><strong><?php echo $sampleSellerStats['weight']; ?></strong></div>
                <div class="stat-row"><span>ราคาประเมิน</span><strong><?php echo $sampleSellerStats['estimate']; ?></strong></div>
              </div>
            </div>
          </div>
          <aside class="pickup-card">
            <strong>รอบรับซื้อถัดไป</strong>
            <p><?php echo $sampleSellerStats['pickup']; ?> ทีมรับซื้อจะยืนยันน้ำหนักจริงและโอนเงินหลังชั่งเสร็จ</p>
          </aside>
        </div>
      </section>

      <section class="section">
        <div class="section-header">
          <div>
            <p class="eyebrow">Seller workflow</p>
            <h2>บันทึกจำนวนขวด ประเมินราคา แล้วเรียกรถรับซื้อ</h2>
          </div>
          <p class="section-lead">ออกแบบสำหรับคนที่มีขวดสะสมและอยากขายอย่างเป็นระบบ ทั้งรายย่อยและจุดรวบรวม</p>
        </div>
        <div class="grid-3">
          <article class="metric-card">
            <strong>01</strong>
            <h3>แยกประเภทขวด</h3>
            <p>เลือก PET ใส, PET สี หรือ HDPE เพื่อให้ระบบคำนวณราคาตามประเภทวัสดุ</p>
          </article>
          <article class="metric-card">
            <strong>02</strong>
            <h3>บันทึกจำนวน</h3>
            <p>ใส่จำนวนขวดที่มีอยู่ ระบบประเมินน้ำหนักและมูลค่ารับซื้อเบื้องต้นทันที</p>
          </article>
          <article class="metric-card">
            <strong>03</strong>
            <h3>นัดรับและรับเงิน</h3>
            <p>ส่งคำขอให้ทีมรับซื้อเข้ารับ ชั่งน้ำหนักจริง และสรุปรายการในแอป</p>
          </article>
        </div>
      </section>

      <section class="section calculator">
        <div class="form-panel">
          <p class="eyebrow">App preview</p>
          <h2>ทดลองบันทึกจำนวนขวด</h2>
          <form data-bottle-form>
            <div class="field">
              <label for="bottleType">ประเภทขวด</label>
              <select id="bottleType" data-bottle-type>
                <option value="clear">PET ใส</option>
                <option value="color">PET สี</option>
                <option value="hdpe">HDPE</option>
              </select>
            </div>
            <div class="field">
              <label for="bottleCount">จำนวนขวดที่มีอยู่</label>
              <input id="bottleCount" data-bottle-count type="number" min="0" value="240" />
            </div>
            <button class="button primary" type="submit">บันทึกรายการตัวอย่าง</button>
          </form>
        </div>
        <div class="estimate-result">
          <span>ราคาประเมิน</span>
          <strong data-estimate-value>฿0</strong>
          <p data-estimate-weight>0 กก.</p>
          <ul data-saved-list></ul>
        </div>
      </section>
    </main>
