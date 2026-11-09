<?php

/** @var yii\web\View $this */

use yii\helpers\Url;

$this->title = 'Detalhe do voo';
$this->params['larguraTotal'] = true; // a página traz o seu próprio .container
?>
<div class="container">
  <div class="page-head">
    <div class="breadcrumb">
      <a href="<?= Url::home() ?>">Início</a>
      <i data-lucide="chevron-right"></i>
      <a href="<?= Url::to(['/pagina/pesquisa']) ?>">Pesquisa</a>
      <i data-lucide="chevron-right"></i>
      <span id="bcNum">AT1452</span>
    </div>
    <div class="row wrap" style="gap: 10px; margin-bottom: 28px" id="headMeta">
      <span class="airline">
        <span class="airline-logo" style="background: #2a5bd7">AT</span>
        <b style="color: var(--ink)">Atlântica Airways</b>
      </span>
      <span class="mono small muted">AT1452</span>
      <span class="badge info">Agendado</span>
      <span class="small muted">Sábado, 14 de novembro de 2026</span>
    </div>
    <div class="big-route" id="bigRoute">
      <div>
        <div class="iata">LIS</div>
        <div class="muted" style="margin-top: 8px">Lisboa · 08:15</div>
      </div>
      <div class="line"><i data-lucide="plane"></i></div>
      <div style="text-align: right">
        <div class="iata">JFK</div>
        <div class="muted" style="margin-top: 8px">Nova Iorque · 15:05</div>
      </div>
    </div>
  </div>

  <div class="detail-layout">
    <div class="stack" style="--gap: 28px">
      <!-- Detalhes (RF-FO-04) -->
      <div class="facts" id="facts">
        <div class="fact">
          <div class="k">
            <i data-lucide="plane-takeoff"></i>
            Partida prevista
          </div>
          <div class="v"><span class="mono">08:15</span></div>
        </div>
        <div class="fact">
          <div class="k">
            <i data-lucide="plane-landing"></i>
            Chegada prevista
          </div>
          <div class="v"><span class="mono">15:05</span></div>
        </div>
        <div class="fact">
          <div class="k">
            <i data-lucide="timer"></i>
            Duração
          </div>
          <div class="v">11h 50m</div>
        </div>
        <div class="fact">
          <div class="k">
            <i data-lucide="door-open"></i>
            Porta de embarque
          </div>
          <div class="v"><span class="mono">B14</span></div>
        </div>
        <div class="fact">
          <div class="k">
            <i data-lucide="plane"></i>
            Avião
          </div>
          <div class="v">Airbus A330-900</div>
        </div>
        <div class="fact">
          <div class="k">
            <i data-lucide="clock"></i>
            Horas reais
          </div>
          <div class="v"><span class="subtle" style="font-weight: 500">Após conclusão</span></div>
        </div>
      </div>

      <!-- Itinerário com escalas -->
      <section class="card">
        <div class="card-head">
          <h3>Itinerário</h3>
          <span class="small subtle" id="itSum">1 escala(s)</span>
        </div>
        <div class="timeline" id="timeline">
          <div class="tl-item start">
            <span class="tl-dot"></span>
            <div class="row between">
              <div>
                <b>Lisboa</b>
                <span class="mono small subtle">LIS</span>
                <div class="small muted">Humberto Delgado</div>
              </div>
              <div class="mono" style="text-align: right"><div>parte 08:15</div></div>
            </div>
          </div>
          <div class="tl-item stop">
            <span class="tl-dot"></span>
            <div class="row between">
              <div>
                <b>Ponta Delgada</b>
                <span class="mono small subtle">PDL</span>
                <div class="small muted">João Paulo II</div>
              </div>
              <div class="mono" style="text-align: right">
                <div class="small subtle">chega 10:25</div>
                <div>parte 11:40</div>
              </div>
            </div>
            <span class="tl-layover">
              <i data-lucide="clock"></i>
              Escala no aeroporto
            </span>
          </div>
          <div class="tl-item end">
            <span class="tl-dot"></span>
            <div class="row between">
              <div>
                <b>Nova Iorque</b>
                <span class="mono small subtle">JFK</span>
                <div class="small muted">John F. Kennedy</div>
              </div>
              <div class="mono" style="text-align: right"><div class="small subtle">chega 15:05</div></div>
            </div>
          </div>
        </div>
      </section>

      <section class="card">
        <div class="card-head">
          <h3>Bagagem disponível</h3>
          <span class="small subtle">adicionada na compra ou depois</span>
        </div>
        <div class="grid g-2" id="bags">
          <div class="row" style="padding: 14px; border: 1px solid var(--line); border-radius: 12px">
            <span class="feature-icon" style="width: 38px; height: 38px"><i data-lucide="briefcase"></i></span>
            <div class="grow">
              <b class="small">Bagagem de mão</b>
              <div class="xs subtle">até 10 kg</div>
            </div>
            <b class="small">Incluída</b>
          </div>
          <div class="row" style="padding: 14px; border: 1px solid var(--line); border-radius: 12px">
            <span class="feature-icon" style="width: 38px; height: 38px"><i data-lucide="luggage"></i></span>
            <div class="grow">
              <b class="small">Bagagem de porão</b>
              <div class="xs subtle">até 23 kg</div>
            </div>
            <b class="small">35&nbsp;€</b>
          </div>
          <div class="row" style="padding: 14px; border: 1px solid var(--line); border-radius: 12px">
            <span class="feature-icon" style="width: 38px; height: 38px"><i data-lucide="package"></i></span>
            <div class="grow">
              <b class="small">Bagagem pesada</b>
              <div class="xs subtle">até 32 kg</div>
            </div>
            <b class="small">60&nbsp;€</b>
          </div>
          <div class="row" style="padding: 14px; border: 1px solid var(--line); border-radius: 12px">
            <span class="feature-icon" style="width: 38px; height: 38px"><i data-lucide="bike"></i></span>
            <div class="grow">
              <b class="small">Equipamento desportivo</b>
              <div class="xs subtle">até 30 kg</div>
            </div>
            <b class="small">50&nbsp;€</b>
          </div>
        </div>
      </section>
    </div>

    <!-- Cartão de compra -->
    <aside class="card book">
      <div class="xs subtle">Preço base por passageiro</div>
      <div class="price" style="font-size: 40px" id="bPrice">389&nbsp;€</div>
      <hr class="divider" />
      <div class="row between">
        <div>
          <div style="font-weight: 600">Passageiros</div>
          <div class="xs subtle">Você + acompanhantes</div>
        </div>
        <div class="stepper-ctrl">
          <button id="minus">−</button>
          <span id="pax">2</span>
          <button id="plus">+</button>
        </div>
      </div>
      <div class="summary-line" style="margin-top: 18px">
        <span class="muted">Subtotal</span>
        <b id="sub">778&nbsp;€</b>
      </div>
      <div class="summary-line">
        <span class="muted">Lugares disponíveis</span>
        <span id="left">57 lugares</span>
      </div>
      <a class="btn btn-accent btn-lg btn-block" style="margin-top: 18px" id="buy" href="<?= Url::to(['/pagina/compra']) ?>">
        Comprar bilhetes
        <i data-lucide="arrow-right"></i>
      </a>
      <p class="xs subtle" style="margin-top: 12px; text-align: center">
        O preço final é confirmado pelo sistema antes do pagamento.
      </p>
    </aside>
  </div>
</div>

<?php $this->registerJs(<<<'JS'
// Número de passageiros e subtotal (só visual)
const preco = 389;
let pax = 2;
function atualizar() {
  document.getElementById("pax").textContent = pax;
  document.getElementById("sub").textContent = (preco * pax) + " €";
}
document.getElementById("minus")?.addEventListener("click", () => { if (pax > 1) { pax--; atualizar(); } });
document.getElementById("plus")?.addEventListener("click", () => { if (pax < 9) { pax++; atualizar(); } });
JS); ?>
