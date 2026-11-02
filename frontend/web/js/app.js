/* =========================================================
   SkySync — JS partilhado
   O header, o footer, a sidebar, a topbar e os dados já estão no HTML.
   Aqui fica só o comportamento:
   tema claro/escuro, menus, dropdowns, modais, tabs, toasts e animações.
   ========================================================= */

/* ---------- HELPERS ---------- */
const $  = (s, el = document) => el.querySelector(s);
const $$ = (s, el = document) => [...el.querySelectorAll(s)];
const eur = (v) => Number(v).toLocaleString("pt-PT", { style: "currency", currency: "EUR", minimumFractionDigits: v % 1 ? 2 : 0 });

function store(key, val) {
  try {
    if (val === undefined) return localStorage.getItem(key);
    localStorage.setItem(key, val);
  } catch (e) { return null; }
}

/* ---------- ÍCONES (Lucide) ---------- */
function icons() { if (window.lucide) lucide.createIcons(); }

/* ---------- TOAST ----------
   toast("Guardado com sucesso")  ou  <button data-toast="Guardado!"> */
function toast(msg, icon = "check-circle-2") {
  let wrap = $(".toast-wrap");
  if (!wrap) { wrap = document.createElement("div"); wrap.className = "toast-wrap"; document.body.appendChild(wrap); }
  const t = document.createElement("div");
  t.className = "toast";
  const i = document.createElement("i"); i.dataset.lucide = icon;
  t.append(i, document.createTextNode(msg));
  wrap.appendChild(t); icons();
  setTimeout(() => { t.classList.add("out"); setTimeout(() => t.remove(), 260); }, 2600);
}

/* ---------- MODAIS ----------
   <a data-open="idDoModal">  ·  <button data-close>  dentro do .modal-backdrop */
function openModal(id) { const m = document.getElementById(id); if (m) { m.classList.add("open"); document.body.style.overflow = "hidden"; } }
function closeModal(m) { if (!m) return; m.classList.remove("open"); document.body.style.overflow = ""; }

/* ---------- TEMA CLARO/ESCURO ---------- */
function isDark() {
  const t = document.documentElement.dataset.theme;
  return t === "dark" || (!t && matchMedia("(prefers-color-scheme: dark)").matches);
}
function setThemeIcon() {
  const dark = isDark();
  $$("[data-theme-toggle]").forEach((b) => (b.innerHTML = `<i data-lucide="${dark ? "sun" : "moon"}"></i>`));
  icons();
}

/* ---------- TABS, SEGMENTED, CHIPS ---------- */
function initTabs() {
  $$("[data-tabs]").forEach((group) => {
    const btns = $$("[data-tab]", group);
    btns.forEach((b) => b.addEventListener("click", () => {
      btns.forEach((x) => x.classList.toggle("active", x === b));
      const scope = group.dataset.tabs ? document.getElementById(group.dataset.tabs) : document;
      $$(".tab-panel", scope).forEach((p) => p.classList.toggle("active", p.id === b.dataset.tab));
    }));
  });
  $$(".segmented").forEach((s) => $$("button", s).forEach((b) => b.addEventListener("click", () => {
    $$("button", s).forEach((x) => x.classList.toggle("active", x === b));
  })));
  $$(".chip[data-toggle]").forEach((c) => c.addEventListener("click", () => c.classList.toggle("active")));
}

/* ---------- PAINÉIS (data-go) ---------- */
function showPanel(id) {
  const alvo = document.getElementById(id);
  if (!alvo) return;
  [...alvo.parentElement.children].filter((p) => p.classList.contains("tab-panel"))
    .forEach((p) => p.classList.toggle("active", p === alvo));
}

/* ---------- ANIMAÇÃO AO APARECER (.reveal) ---------- */
function initReveal() {
  const els = $$(".reveal");
  if (!("IntersectionObserver" in window)) { els.forEach((e) => e.classList.add("in")); return; }
  const io = new IntersectionObserver((entries) => entries.forEach((e) => {
    if (e.isIntersecting) { e.target.classList.add("in"); io.unobserve(e.target); }
  }), { threshold: 0.08 });
  els.forEach((e, i) => { e.style.transitionDelay = `${Math.min(i % 6, 5) * 50}ms`; io.observe(e); });
}

/* ---------- ARRANQUE ---------- */
document.addEventListener("DOMContentLoaded", () => {
  setThemeIcon();

  document.addEventListener("click", (e) => {
    // Tema
    if (e.target.closest("[data-theme-toggle]")) {
      const next = isDark() ? "light" : "dark";
      document.documentElement.dataset.theme = next;
      store("sky-theme", next);
      setThemeIcon();
    }
    // Menu mobile (frontend) e sidebar (back-office)
    if (e.target.closest("[data-menu]")) $("#mnav")?.classList.toggle("open");
    if (e.target.closest("[data-sidebar]")) $("#sidebar")?.classList.toggle("open");
    // Dropdowns
    const dd = e.target.closest("[data-dropdown]");
    $$(".dropdown.open").forEach((d) => { if (!dd || d.id !== dd.dataset.dropdown) d.classList.remove("open"); });
    if (dd) document.getElementById(dd.dataset.dropdown)?.classList.toggle("open");
    // Modais
    const op = e.target.closest("[data-open]"); if (op) { e.preventDefault(); openModal(op.dataset.open); }
    const cl = e.target.closest("[data-close]"); if (cl) closeModal(cl.closest(".modal-backdrop"));
    if (e.target.classList.contains("modal-backdrop")) closeModal(e.target);
    // Trocar de painel (ex.: login → registo → recuperar):  <a href="#" data-go="registo">
    const go = e.target.closest("[data-go]");
    if (go) { e.preventDefault(); showPanel(go.dataset.go); }
    // Mostrar/esconder palavra-passe:  <button type="button" data-pw> ao lado do <input type="password">
    const pw = e.target.closest("[data-pw]");
    if (pw) {
      const i = pw.parentElement.querySelector("input");
      i.type = i.type === "password" ? "text" : "password";
      pw.innerHTML = `<i data-lucide="${i.type === "password" ? "eye" : "eye-off"}"></i>`; icons();
    }
    // Trocar origem/destino na pesquisa
    if (e.target.closest("#swap")) {
      const o = document.getElementById("o"), d = document.getElementById("d");
      if (o && d) [o.value, d.value] = [d.value, o.value];
    }
    // Toast genérico
    const tb = e.target.closest("[data-toast]");
    if (tb) { toast(tb.dataset.toast); const m = tb.closest(".modal-backdrop"); if (m) closeModal(m); }
  });

  document.addEventListener("keydown", (e) => {
    if (e.key === "Escape") $$(".modal-backdrop.open").forEach(closeModal);
  });

  // Header com borda ao fazer scroll
  const header = $(".site-header");
  if (header) addEventListener("scroll", () => header.classList.toggle("scrolled", scrollY > 8), { passive: true });

  initTabs();
  if (location.hash && document.querySelector(location.hash + ".tab-panel")) showPanel(location.hash.slice(1));
  icons();
  initReveal();
});
