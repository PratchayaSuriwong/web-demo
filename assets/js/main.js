const bottleForm = document.querySelector("[data-bottle-form]");
const bottleType = document.querySelector("[data-bottle-type]");
const bottleCount = document.querySelector("[data-bottle-count]");
const resultValue = document.querySelector("[data-estimate-value]");
const resultWeight = document.querySelector("[data-estimate-weight]");
const savedList = document.querySelector("[data-saved-list]");

const priceByType = {
  clear: { label: "PET ใส", price: 8.5, grams: 30 },
  color: { label: "PET สี", price: 5.8, grams: 32 },
  hdpe: { label: "HDPE", price: 11.2, grams: 45 },
};

const storageKey = "greenloop-bottle-records";

function formatBaht(value) {
  return new Intl.NumberFormat("th-TH", {
    style: "currency",
    currency: "THB",
    maximumFractionDigits: 0,
  }).format(value);
}

function calculateEstimate(type, count) {
  const item = priceByType[type] || priceByType.clear;
  const weightKg = (count * item.grams) / 1000;
  const value = weightKg * item.price;
  return { item, value, weightKg };
}

function loadRecords() {
  try {
    const records = JSON.parse(localStorage.getItem(storageKey));
    return Array.isArray(records) ? records : [];
  } catch {
    return [];
  }
}

function saveRecords(records) {
  localStorage.setItem(storageKey, JSON.stringify(records));
}

function renderEstimate() {
  if (!bottleType || !bottleCount || !resultValue || !resultWeight) {
    return;
  }

  const count = Math.max(Number(bottleCount.value || 0), 0);
  const estimate = calculateEstimate(bottleType.value, count);
  resultValue.textContent = formatBaht(estimate.value);
  resultWeight.textContent = `${estimate.weightKg.toFixed(2)} กก. จาก ${count.toLocaleString("th-TH")} ขวด`;
}

function renderSavedRecords() {
  if (!savedList) {
    return;
  }

  const records = loadRecords();
  savedList.replaceChildren();

  if (records.length === 0) {
    const empty = document.createElement("li");
    empty.textContent = "ยังไม่มีรายการที่บันทึก";
    savedList.append(empty);
    return;
  }

  records.slice(0, 4).forEach((record) => {
    const item = document.createElement("li");
    item.textContent = `${record.label}: ${record.count.toLocaleString("th-TH")} ขวด / ${record.weight} / ${record.value}`;
    savedList.append(item);
  });
}

if (bottleForm) {
  bottleForm.addEventListener("input", renderEstimate);
  bottleForm.addEventListener("submit", (event) => {
    event.preventDefault();
    const count = Math.max(Number(bottleCount.value || 0), 0);
    const estimate = calculateEstimate(bottleType.value, count);
    const records = loadRecords();

    records.unshift({
      label: estimate.item.label,
      count,
      weight: `${estimate.weightKg.toFixed(2)} กก.`,
      value: formatBaht(estimate.value),
      createdAt: new Date().toISOString(),
    });

    saveRecords(records);
    renderSavedRecords();
  });

  renderEstimate();
  renderSavedRecords();
}
