const storageKey = "launch-desk-tasks";

const demoTasks = [
  { id: crypto.randomUUID(), title: "Sketch the homepage structure", priority: "High", done: false },
  { id: crypto.randomUUID(), title: "Write launch copy", priority: "Medium", done: false },
  { id: crypto.randomUUID(), title: "QA responsive layout", priority: "High", done: true },
  { id: crypto.randomUUID(), title: "Publish repo README", priority: "Low", done: false },
];

const state = {
  view: "overview",
  tasks: loadTasks(),
};

const elements = {
  activeMetric: document.querySelector("#activeMetric"),
  chartValue: document.querySelector("#chartValue"),
  clearDoneButton: document.querySelector("#clearDoneButton"),
  completionMetric: document.querySelector("#completionMetric"),
  emptyState: document.querySelector("#emptyState"),
  focusMetric: document.querySelector("#focusMetric"),
  form: document.querySelector("#taskForm"),
  list: document.querySelector("#taskList"),
  navItems: document.querySelectorAll(".nav-item"),
  nextTask: document.querySelector("#nextTask"),
  seedButton: document.querySelector("#seedButton"),
  titleInput: document.querySelector("#taskTitle"),
  priorityInput: document.querySelector("#taskPriority"),
  todayCount: document.querySelector("#todayCount"),
  canvas: document.querySelector("#progressCanvas"),
};

elements.form.addEventListener("submit", (event) => {
  event.preventDefault();
  const title = elements.titleInput.value.trim();

  if (!title) {
    elements.titleInput.focus();
    return;
  }

  state.tasks.unshift({
    id: crypto.randomUUID(),
    title,
    priority: elements.priorityInput.value,
    done: false,
  });

  elements.form.reset();
  elements.priorityInput.value = "Medium";
  saveTasks();
  render();
});

elements.clearDoneButton.addEventListener("click", () => {
  state.tasks = state.tasks.filter((task) => !task.done);
  saveTasks();
  render();
});

elements.seedButton.addEventListener("click", () => {
  state.tasks = demoTasks.map((task) => ({ ...task, id: crypto.randomUUID() }));
  saveTasks();
  render();
});

elements.navItems.forEach((item) => {
  item.addEventListener("click", () => {
    state.view = item.dataset.view;
    render();
  });
});

function loadTasks() {
  try {
    const parsed = JSON.parse(localStorage.getItem(storageKey));
    return Array.isArray(parsed) ? parsed : [];
  } catch {
    return [];
  }
}

function saveTasks() {
  localStorage.setItem(storageKey, JSON.stringify(state.tasks));
}

function visibleTasks() {
  if (state.view === "active") {
    return state.tasks.filter((task) => !task.done);
  }

  if (state.view === "done") {
    return state.tasks.filter((task) => task.done);
  }

  return state.tasks;
}

function render() {
  const total = state.tasks.length;
  const done = state.tasks.filter((task) => task.done).length;
  const active = total - done;
  const highFocus = state.tasks.filter((task) => !task.done && task.priority === "High").length;
  const completion = total ? Math.round((done / total) * 100) : 0;
  const next = state.tasks.find((task) => !task.done);
  const tasks = visibleTasks();

  elements.completionMetric.textContent = `${completion}%`;
  elements.chartValue.textContent = `${completion}%`;
  elements.activeMetric.textContent = active;
  elements.focusMetric.textContent = highFocus;
  elements.todayCount.textContent = `${active} active ${active === 1 ? "task" : "tasks"}`;
  elements.nextTask.textContent = next ? next.title : "All clear for now";

  elements.navItems.forEach((item) => {
    item.classList.toggle("active", item.dataset.view === state.view);
  });

  elements.list.replaceChildren(...tasks.map(createTaskItem));
  elements.emptyState.classList.toggle("visible", tasks.length === 0);
  drawChart(completion);
}

function createTaskItem(task) {
  const item = document.createElement("li");
  item.className = `task-item${task.done ? " done" : ""}`;

  const toggle = document.createElement("button");
  toggle.className = "task-toggle";
  toggle.type = "button";
  toggle.setAttribute("aria-label", task.done ? "Mark active" : "Mark done");
  toggle.addEventListener("click", () => {
    task.done = !task.done;
    saveTasks();
    render();
  });

  const copy = document.createElement("div");
  copy.className = "task-copy";

  const title = document.createElement("span");
  title.className = "task-title";
  title.textContent = task.title;

  const meta = document.createElement("span");
  meta.className = "task-meta";
  meta.textContent = task.done ? "Completed" : "Ready to work";

  copy.append(title, meta);

  const priority = document.createElement("span");
  priority.className = `priority ${task.priority}`;
  priority.textContent = task.priority;

  item.append(toggle, copy, priority);
  return item;
}

function drawChart(completion) {
  const canvas = elements.canvas;
  const context = canvas.getContext("2d");
  const size = canvas.width;
  const center = size / 2;
  const radius = center - 22;
  const start = -Math.PI / 2;
  const end = start + (completion / 100) * Math.PI * 2;

  context.clearRect(0, 0, size, size);
  context.lineWidth = 22;
  context.lineCap = "round";

  context.beginPath();
  context.arc(center, center, radius, 0, Math.PI * 2);
  context.strokeStyle = "#e4e5df";
  context.stroke();

  context.beginPath();
  context.arc(center, center, radius, start, end);
  context.strokeStyle = completion >= 75 ? "#127c79" : completion >= 35 ? "#c79624" : "#d45c43";
  context.stroke();
}

render();
