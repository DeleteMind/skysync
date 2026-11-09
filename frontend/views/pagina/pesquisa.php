<?php

/** @var yii\web\View $this */

use yii\helpers\Url;

$this->title = 'Pesquisar voos';
$this->params['larguraTotal'] = true; // a página traz o seu próprio .container
?>
<div class="container">
  <div class="page-head" style="padding-bottom: 24px">
    <div class="breadcrumb">
      <a href="<?= Url::home() ?>">Início</a>
      <i data-lucide="chevron-right"></i>
      <span>Pesquisa</span>
    </div>
    <div class="mini-search">
      <div class="seg">
        Lisboa
        <i data-lucide="arrow-right" style="color: var(--ink-3)"></i>
        <span id="destLabel">Nova Iorque</span>
      </div>
      <span class="dot"></span>
      <span class="muted">Sáb, 14 nov 2026</span>
      <span class="dot"></span>
      <span class="muted">2 passageiros</span>
      <a href="<?= Url::home() ?>" class="btn btn-ghost btn-sm" style="margin-left: auto">
        <i data-lucide="pencil"></i>
        Alterar pesquisa
      </a>
    </div>
  </div>

  <div class="results-layout">
    <!-- FILTROS (RF-FO-02) -->
    <aside class="card filters">
      <div class="row between" style="margin-bottom: 20px">
        <h3 style="font-size: 16px">Filtros</h3>
        <button class="btn btn-text btn-sm" id="reset">Limpar</button>
      </div>
      <div class="filter-group">
        <h4>Escalas</h4>
        <div class="row wrap" style="gap: 8px" id="stopsFilter">
          <button class="chip active" data-stops="all">Todas</button>
          <button class="chip" data-stops="0">Direto</button>
          <button class="chip" data-stops="1">1 escala</button>
          <button class="chip" data-stops="2">2+</button>
        </div>
      </div>
      <div class="filter-group">
        <div class="row between">
          <h4 style="margin: 0">Preço máximo</h4>
          <span class="mono small" id="priceVal">700 €</span>
        </div>
        <input type="range" min="50" max="700" step="10" value="700" id="price" style="margin-top: 12px" />
        <div class="row between xs subtle">
          <span>50 €</span>
          <span>700 €</span>
        </div>
      </div>
      <div class="filter-group">
        <div class="row between">
          <h4 style="margin: 0">Duração máxima</h4>
          <span class="mono small" id="durVal">15h</span>
        </div>
        <input type="range" min="1" max="15" value="15" id="dur" style="margin-top: 12px" />
      </div>
      <div class="filter-group">
        <h4>Companhias aéreas</h4>
        <div class="stack" style="--gap: 10px" id="ciaFilter">
          <label class="check">
            <input type="checkbox" checked="" value="AT" />
            <span class="airline-logo" style="background: #2a5bd7">AT</span>
            <span class="grow">Atlântica Airways</span>
          </label>
          <label class="check">
            <input type="checkbox" checked="" value="NJ" />
            <span class="airline-logo" style="background: #0e7c66">NJ</span>
            <span class="grow">NorteJet</span>
          </label>
          <label class="check">
            <input type="checkbox" checked="" value="MR" />
            <span class="airline-logo" style="background: #b4452f">MR</span>
            <span class="grow">Meridian Air</span>
          </label>
          <label class="check">
            <input type="checkbox" checked="" value="IS" />
            <span class="airline-logo" style="background: #7a4cc2">IS</span>
            <span class="grow">Ibérica Sky</span>
          </label>
        </div>
      </div>
    </aside>

    <!-- RESULTADOS + ORDENAÇÃO (RF-FO-01, RF-FO-03) -->
    <section>
      <div class="row between wrap" style="margin-bottom: 18px">
        <p class="muted">
          <b style="color: var(--ink)" id="count">3</b>
          voos encontrados
        </p>
        <div class="segmented" id="sort">
          <button class="active" data-sort="price">Mais barato</button>
          <button data-sort="dur">Mais rápido</button>
          <button data-sort="dep">Partida mais cedo</button>
        </div>
      </div>
      <div class="stack" id="results">
        <article class="flight-card reveal">
          <div class="flight-main">
            <div class="row between">
              <div class="airline">
                <span class="airline-logo" style="background: #7a4cc2">IS</span>
                <span>
                  <b style="color: var(--ink)">Ibérica Sky</b>
                  ·
                  <span class="mono">IS7744</span>
                </span>
              </div>
            </div>

            <div class="route">
              <div class="route-point">
                <div class="time">06:40</div>
                <div class="code">LIS · Lisboa</div>
              </div>
              <div class="route-line">
                <span class="meta">14h 25m</span>
                <div class="bar">
                  <span class="stop" style="left: calc(33.33333333333333% - 4px)" title="Madrid"></span>
                  <span class="stop" style="left: calc(66.66666666666666% - 4px)" title="Londres"></span>
                </div>
                <span class="meta" style="color: var(--warn)">2 escalas · MAD, LHR</span>
              </div>
              <div class="route-point end">
                <div class="time">16:05</div>
                <div class="code">JFK · Nova Iorque</div>
              </div>
            </div>
          </div>
          <div class="flight-side">
            <div style="text-align: right">
              <div class="xs subtle">desde</div>
              <div class="price">342&nbsp;€</div>
              <div class="xs subtle">por passageiro</div>
            </div>
            <a href="<?= Url::to(['/pagina/voo', 'id' => 11]) ?>" class="btn btn-primary btn-sm">
              Selecionar
              <i data-lucide="arrow-right"></i>
            </a>
          </div>
        </article>
        <article class="flight-card reveal">
          <div class="flight-main">
            <div class="row between">
              <div class="airline">
                <span class="airline-logo" style="background: #2a5bd7">AT</span>
                <span>
                  <b style="color: var(--ink)">Atlântica Airways</b>
                  ·
                  <span class="mono">AT1452</span>
                </span>
              </div>
            </div>

            <div class="route">
              <div class="route-point">
                <div class="time">08:15</div>
                <div class="code">LIS · Lisboa</div>
              </div>
              <div class="route-line">
                <span class="meta">11h 50m</span>
                <div class="bar"><span class="stop" style="left: calc(50% - 4px)" title="Ponta Delgada"></span></div>
                <span class="meta" style="color: var(--warn)">1 escala · PDL</span>
              </div>
              <div class="route-point end">
                <div class="time">15:05</div>
                <div class="code">JFK · Nova Iorque</div>
              </div>
            </div>
          </div>
          <div class="flight-side">
            <div style="text-align: right">
              <div class="xs subtle">desde</div>
              <div class="price">389&nbsp;€</div>
              <div class="xs subtle">por passageiro</div>
            </div>
            <a href="<?= Url::to(['/pagina/voo', 'id' => 1]) ?>" class="btn btn-primary btn-sm">
              Selecionar
              <i data-lucide="arrow-right"></i>
            </a>
          </div>
        </article>
        <article class="flight-card reveal">
          <div class="flight-main">
            <div class="row between">
              <div class="airline">
                <span class="airline-logo" style="background: #2a5bd7">AT</span>
                <span>
                  <b style="color: var(--ink)">Atlântica Airways</b>
                  ·
                  <span class="mono">AT1460</span>
                </span>
              </div>
            </div>

            <div class="route">
              <div class="route-point">
                <div class="time">13:30</div>
                <div class="code">LIS · Lisboa</div>
              </div>
              <div class="route-line">
                <span class="meta">7h 50m</span>
                <div class="bar">
                  <span class="plane"><i data-lucide="plane"></i></span>
                </div>
                <span class="meta" style="color: var(--ok)">Direto</span>
              </div>
              <div class="route-point end">
                <div class="time">16:20</div>
                <div class="code">JFK · Nova Iorque</div>
              </div>
            </div>
          </div>
          <div class="flight-side">
            <div style="text-align: right">
              <div class="xs subtle">desde</div>
              <div class="price">529&nbsp;€</div>
              <div class="xs subtle">por passageiro</div>
            </div>
            <a href="<?= Url::to(['/pagina/voo', 'id' => 10]) ?>" class="btn btn-primary btn-sm">
              Selecionar
              <i data-lucide="arrow-right"></i>
            </a>
          </div>
        </article>
      </div>
      <div class="empty hidden" id="empty">
        <span class="feature-icon"><i data-lucide="plane"></i></span>
        <h3>Nenhum voo corresponde aos filtros</h3>
        <p class="small" style="margin-top: 6px">Experimente aumentar o preço máximo ou permitir escalas.</p>
      </div>
    </section>
  </div>
</div>
