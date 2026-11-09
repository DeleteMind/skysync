<?php

/** @var yii\web\View $this */

use yii\helpers\Url;

$this->title = 'Comprar bilhetes';
$this->params['larguraTotal'] = true; // a página traz o seu próprio .container
?>
<div class="container" style="padding-top: 40px">
  <!-- Stepper (RNF-01: máx. 5 passos) -->
  <div class="stepper" id="stepper">
    <div class="step active">
      <span class="step-num">1</span>
      Passageiros
    </div>
    <span class="step-line"></span>
    <div class="step">
      <span class="step-num">2</span>
      Bagagem
    </div>
    <span class="step-line"></span>
    <div class="step">
      <span class="step-num">3</span>
      Pagamento
    </div>
    <span class="step-line"></span>
    <div class="step">
      <span class="step-num">4</span>
      Bilhetes
    </div>
  </div>

  <div class="checkout">
    <div>
      <!-- PASSO 1 — Passageiros (RF-FO-12, RF-FO-13) -->
      <section class="tab-panel active" data-step="1">
        <h1 class="page-title" style="font-size: 44px; margin-bottom: 8px">Quem vai viajar?</h1>
        <p class="muted" style="margin-bottom: 28px">Os nomes têm de coincidir com o documento de identificação.</p>
        <div id="paxForms">
          <div class="card pax-card">
            <div class="pax-head">
              <span class="avatar">ID</span>
              <div class="grow">
                <b>Titular da conta</b>
                <div class="xs subtle">Dados preenchidos a partir do seu perfil</div>
              </div>
            </div>
            <div class="form-grid">
              <div class="field full">
                <label>Nome completo</label>
                <input class="input" data-i="0" data-k="nome" value="Inês Duarte" placeholder="Como no documento" />
              </div>
              <div class="field">
                <label>Tipo de documento</label>
                <select class="select">
                  <option>Passaporte</option>
                  <option>Cartão de Cidadão</option>
                </select>
              </div>
              <div class="field">
                <label>Nº documento</label>
                <input class="input" value="P4821390" placeholder="P1234567" />
              </div>
              <div class="field">
                <label>Nacionalidade</label>
                <select class="select">
                  <option>Portuguesa</option>
                  <option>Espanhola</option>
                  <option>Francesa</option>
                </select>
              </div>
              <div class="field">
                <label>Contacto</label>
                <input class="input" value="+351 912 345 678" placeholder="+351 …" />
              </div>
            </div>
          </div>
          <div class="card pax-card">
            <div class="pax-head">
              <span class="avatar">2</span>
              <div class="grow">
                <b>Acompanhante 1</b>
                <div class="xs subtle">Não precisa de ter conta</div>
              </div>
              <button class="btn btn-text btn-icon btn-sm" data-rm="1" aria-label="Remover">
                <i data-lucide="x"></i>
              </button>
            </div>
            <div class="form-grid">
              <div class="field full">
                <label>Nome completo</label>
                <input class="input" data-i="1" data-k="nome" value="" placeholder="Como no documento" />
              </div>
              <div class="field">
                <label>Tipo de documento</label>
                <select class="select">
                  <option>Passaporte</option>
                  <option>Cartão de Cidadão</option>
                </select>
              </div>
              <div class="field">
                <label>Nº documento</label>
                <input class="input" value="" placeholder="P1234567" />
              </div>
              <div class="field">
                <label>Nacionalidade</label>
                <select class="select">
                  <option>Portuguesa</option>
                  <option>Espanhola</option>
                  <option>Francesa</option>
                </select>
              </div>
              <div class="field">
                <label>Contacto</label>
                <input class="input" value="" placeholder="+351 …" />
              </div>
            </div>
          </div>
        </div>
        <button class="btn btn-ghost" style="margin-top: 16px" id="addPax">
          <i data-lucide="user-plus"></i>
          Adicionar acompanhante
        </button>
      </section>

      <!-- PASSO 2 — Bagagem (RF-FO-14, RF-FO-20) -->
      <section class="tab-panel" data-step="2">
        <h1 class="page-title" style="font-size: 44px; margin-bottom: 8px">Bagagem</h1>
        <p class="muted" style="margin-bottom: 28px">
          A bagagem de mão está incluída. Adicione bagagem de porão para cada passageiro.
        </p>
        <div id="bagForms"></div>
      </section>

      <!-- PASSO 3 — Pagamento (RF-FO-15) -->
      <section class="tab-panel" data-step="3">
        <h1 class="page-title" style="font-size: 44px; margin-bottom: 8px">Pagamento</h1>
        <p class="muted" style="margin-bottom: 28px">Não guardamos o número completo do cartão nem o CVV.</p>
        <div class="stack" style="--gap: 10px">
          <label class="option-card">
            <input type="radio" name="pay" value="mbway" checked="" />
            <span class="pay-logo" style="background: #d6002a">
              MB
              <br />
              WAY
            </span>
            <div class="grow">
              <b>MB WAY</b>
              <div class="small subtle">Confirme no seu telemóvel</div>
            </div>
          </label>
          <label class="option-card">
            <input type="radio" name="pay" value="card" />
            <span class="pay-logo" style="background: #1a1f71">VISA</span>
            <div class="grow">
              <b>Cartão de crédito ou débito</b>
              <div class="small subtle">Visa, Mastercard</div>
            </div>
          </label>
          <label class="option-card">
            <input type="radio" name="pay" value="mb" />
            <span class="pay-logo" style="background: #3a7bd5">MB</span>
            <div class="grow">
              <b>Referência Multibanco</b>
              <div class="small subtle">Pague no prazo de 24 horas</div>
            </div>
          </label>
        </div>
        <div class="card card-flat" style="margin-top: 20px" id="payMbway">
          <div class="field">
            <label>Número de telemóvel</label>
            <div class="input-icon">
              <i data-lucide="smartphone"></i>
              <input class="input" value="+351 912 345 678" />
            </div>
          </div>
        </div>
        <div class="card card-flat form-grid hidden" style="margin-top: 20px" id="payCard">
          <div class="field full">
            <label>Número do cartão</label>
            <div class="input-icon">
              <i data-lucide="credit-card"></i>
              <input class="input" placeholder="0000 0000 0000 0000" />
            </div>
          </div>
          <div class="field">
            <label>Validade</label>
            <input class="input" placeholder="MM/AA" />
          </div>
          <div class="field">
            <label>CVV</label>
            <input class="input" placeholder="•••" />
          </div>
        </div>
      </section>

      <!-- PASSO 4 — Confirmação (RF-FO-16, RF-FO-17) -->
      <section class="tab-panel" data-step="4">
        <div class="card" style="text-align: center; padding: 48px 24px">
          <div class="success-mark"><i data-lucide="check"></i></div>
          <h1 class="page-title" style="font-size: 44px">Boa viagem!</h1>
          <p class="muted" style="margin: 10px auto 0; max-width: 420px">
            Os bilhetes foram emitidos e enviados para
            <b style="color: var(--ink)">ines.duarte@mail.pt</b>
            .
          </p>
          <div class="row" style="justify-content: center; margin-top: 28px; flex-wrap: wrap">
            <button class="btn btn-ghost" onclick="toast('PDF exportado','download')">
              <i data-lucide="download"></i>
              Exportar PDF
            </button>
            <a href="<?= Url::to(['/pagina/bilhetes']) ?>" class="btn btn-primary">
              Ver os meus bilhetes
              <i data-lucide="arrow-right"></i>
            </a>
          </div>
        </div>
        <div class="stack" style="margin-top: 20px" id="issued"></div>
      </section>

      <div class="row between" style="margin-top: 32px" id="nav">
        <button class="btn btn-text" id="back" style="visibility: hidden">
          <i data-lucide="arrow-left"></i>
          Voltar
        </button>
        <button class="btn btn-accent btn-lg" id="next">
          Continuar
          <i data-lucide="arrow-right"></i>
        </button>
      </div>
    </div>

    <!-- Resumo (preço calculado — RF-FO-14) -->
    <aside class="card summary">
      <div class="row between">
        <span class="eyebrow">O seu voo</span>
        <span id="sStatus"><span class="mono small">AT0911</span></span>
      </div>
      <div id="sRoute" style="margin: 16px 0 4px">
        <div class="row between">
          <div>
            <div class="mono" style="font-size: 22px">11:40</div>
            <b>LIS</b>
          </div>
          <div style="flex: 1; text-align: center" class="xs subtle">
            2h 35m
            <div style="height: 1px; background: var(--line-strong); margin: 4px 12px"></div>
            direto
          </div>
          <div style="text-align: right">
            <div class="mono" style="font-size: 22px">15:15</div>
            <b>CDG</b>
          </div>
        </div>
        <div class="xs subtle" style="margin-top: 8px">Sáb, 14 nov 2026 · Atlântica Airways</div>
      </div>
      <hr class="divider" />
      <div id="sLines">
        <div class="summary-line">
          <span>Inês Duarte</span>
          <b>153&nbsp;€</b>
        </div>
        <div class="summary-line xs subtle" style="padding-top: 0">
          <span>Base 118&nbsp;€ + 1 bagagem</span>
          <span>+35&nbsp;€</span>
        </div>
        <div class="summary-line">
          <span>Passageiro 2</span>
          <b>118&nbsp;€</b>
        </div>
        <div class="summary-line xs subtle" style="padding-top: 0">
          <span>Base 118&nbsp;€</span>
          <span></span>
        </div>
      </div>
      <div class="summary-total">
        <span style="font-weight: 600">Total</span>
        <span class="price" id="sTotal">271&nbsp;€</span>
      </div>
      <p class="xs subtle" style="margin-top: 10px">Valor final validado pela API no momento do pagamento.</p>
    </aside>
  </div>
</div>

<?php $this->registerJs(<<<'JS'
// Passos da compra (só visual)
let passo = 1;
const total = 4;
function mostrarPasso(n) {
  passo = n;
  document.querySelectorAll("section[data-step]").forEach((s) => s.classList.toggle("active", s.dataset.step == n));
  document.querySelectorAll("#stepper .step").forEach((s, i) => {
    s.classList.toggle("active", i + 1 === n);
    s.classList.toggle("done", i + 1 < n);
  });
  document.getElementById("back").style.visibility = n > 1 && n < total ? "visible" : "hidden";
  document.getElementById("nav").style.display = n === total ? "none" : "";
  window.scrollTo({ top: 0, behavior: "smooth" });
}
document.getElementById("next")?.addEventListener("click", () => mostrarPasso(Math.min(passo + 1, total)));
document.getElementById("back")?.addEventListener("click", () => mostrarPasso(Math.max(passo - 1, 1)));
document.querySelectorAll('input[name="pay"]').forEach((r) => r.addEventListener("change", () => {
  document.getElementById("payMbway").classList.toggle("hidden", r.value !== "mbway" || !r.checked);
  document.getElementById("payCard").classList.toggle("hidden", r.value !== "card" || !r.checked);
}));
JS); ?>
