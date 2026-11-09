<?php

/** @var yii\web\View $this */

use yii\helpers\Url;

$this->title = 'Os meus bilhetes';
$this->params['larguraTotal'] = true; // a página traz o seu próprio .container
?>
<div class="container">
  <div class="page-head row between wrap" style="align-items: flex-end">
    <div>
      <span class="eyebrow">Olá, Inês</span>
      <h1 class="page-title" style="margin-top: 12px">
        Os meus
        <em class="serif">bilhetes</em>
      </h1>
    </div>
    <a href="<?= Url::to(['/pagina/pesquisa']) ?>" class="btn btn-primary">
      <i data-lucide="plus"></i>
      Nova viagem
    </a>
  </div>

  <!-- Próxima viagem em destaque -->
  <div class="next-trip">
    <div class="ticket" id="nextTicket">
      <div class="ticket-main">
        <div class="row between">
          <span class="airline">
            <span class="airline-logo" style="background: #2a5bd7">AT</span>
            <b style="color: var(--ink)">Atlântica Airways</b>
          </span>
          <span class="mono small">AT0911</span>
        </div>
        <div class="ticket-big">
          <div>
            <div class="iata">LIS</div>
            <div class="small muted">Lisboa</div>
          </div>
          <i data-lucide="plane" style="width: 28px; height: 28px; color: var(--accent)"></i>
          <div style="text-align: right">
            <div class="iata">CDG</div>
            <div class="small muted">Paris</div>
          </div>
        </div>
        <div class="ticket-fields">
          <div>
            <div class="k">Passageiro</div>
            <div class="v">Inês Duarte</div>
          </div>
          <div>
            <div class="k">Data</div>
            <div class="v">14 nov</div>
          </div>
          <div>
            <div class="k">Partida</div>
            <div class="v mono">11:40</div>
          </div>
          <div>
            <div class="k">Porta</div>
            <div class="v mono">B08</div>
          </div>
        </div>
      </div>
      <div class="ticket-stub">
        <div class="qr"><canvas data-qr="SKY-48K2Q1" width="29" height="29"></canvas></div>
        <div class="mono small" style="font-weight: 600">SKY-48K2Q1</div>
      </div>
    </div>
    <div class="card stack" style="--gap: 18px">
      <div class="row between">
        <span class="eyebrow">Parte dentro de</span>
        <span class="badge ok">Check-in aberto</span>
      </div>
      <div class="countdown">
        <div>
          <b>03</b>
          <span>dias</span>
        </div>
        <div>
          <b>14</b>
          <span>horas</span>
        </div>
        <div>
          <b>22</b>
          <span>min</span>
        </div>
      </div>
      <a href="<?= Url::to(['/pagina/checkin']) ?>" class="btn btn-accent btn-block">
        <i data-lucide="qr-code"></i>
        Fazer check-in
      </a>
      <button class="btn btn-ghost btn-block" data-open="mTicket" data-tk="0">
        <i data-lucide="luggage"></i>
        Gerir bagagem
      </button>
    </div>
  </div>

  <div class="tabs" data-tabs="">
    <button class="tab active" data-tab="prox">Próximas viagens</button>
    <button class="tab" data-tab="hist">Histórico</button>
  </div>
  <div class="tab-panel active stack" style="--gap: 12px" id="prox">
    <div class="ticket-row reveal">
      <div class="date-block">
        <span class="d">14</span>
        <span class="m">nov 2026</span>
      </div>
      <div>
        <div class="row" style="gap: 10px">
          <b style="font-size: 17px">Lisboa → Paris</b>
          <span class="airline-logo" style="background: #2a5bd7">AT</span>
        </div>
        <div class="small subtle" style="margin-top: 4px">
          <span class="mono">AT0911</span>
          · 11:40–15:15 · Inês Duarte · 1 bagagem
        </div>
      </div>
      <span class="badge info">Emitido</span>
      <div class="row" style="gap: 6px">
        <button class="btn btn-ghost btn-sm" data-open="mTicket" data-tk="0">Gerir</button>
      </div>
    </div>
    <div class="ticket-row reveal">
      <div class="date-block">
        <span class="d">14</span>
        <span class="m">nov 2026</span>
      </div>
      <div>
        <div class="row" style="gap: 10px">
          <b style="font-size: 17px">Lisboa → Paris</b>
          <span class="airline-logo" style="background: #2a5bd7">AT</span>
        </div>
        <div class="small subtle" style="margin-top: 4px">
          <span class="mono">AT0911</span>
          · 11:40–15:15 · Rui Duarte · só bagagem de mão
        </div>
      </div>
      <span class="badge info">Emitido</span>
      <div class="row" style="gap: 6px">
        <button class="btn btn-ghost btn-sm" data-open="mTicket" data-tk="1">Gerir</button>
      </div>
    </div>
    <div class="ticket-row reveal">
      <div class="date-block">
        <span class="d">02</span>
        <span class="m">dez 2026</span>
      </div>
      <div>
        <div class="row" style="gap: 10px">
          <b style="font-size: 17px">Lisboa → Roma</b>
          <span class="airline-logo" style="background: #7a4cc2">IS</span>
        </div>
        <div class="small subtle" style="margin-top: 4px">
          <span class="mono">IS7720</span>
          · 12:55–19:10 · Inês Duarte · 2 bagagem
        </div>
      </div>
      <span class="badge info">Emitido</span>
      <div class="row" style="gap: 6px">
        <button class="btn btn-ghost btn-sm" data-open="mTicket" data-tk="2">Gerir</button>
      </div>
    </div>
  </div>
  <div class="tab-panel stack" style="--gap: 12px" id="hist">
    <div class="ticket-row reveal">
      <div class="date-block">
        <span class="d">21</span>
        <span class="m">out 2026</span>
      </div>
      <div>
        <div class="row" style="gap: 10px">
          <b style="font-size: 17px">Lisboa → Amesterdão</b>
          <span class="airline-logo" style="background: #b4452f">MR</span>
        </div>
        <div class="small subtle" style="margin-top: 4px">
          <span class="mono">MR3388</span>
          · 07:00–13:35 · Inês Duarte · 1 bagagem
        </div>
      </div>
      <span class="badge">Concluído</span>
      <div class="row" style="gap: 6px">
        <button class="btn btn-ghost btn-sm" data-toast="PDF exportado"><i data-lucide="download"></i></button>
      </div>
    </div>
    <div class="ticket-row reveal">
      <div class="date-block">
        <span class="d">03</span>
        <span class="m">set 2026</span>
      </div>
      <div>
        <div class="row" style="gap: 10px">
          <b style="font-size: 17px">Lisboa → Porto</b>
          <span class="airline-logo" style="background: #0e7c66">NJ</span>
        </div>
        <div class="small subtle" style="margin-top: 4px">
          <span class="mono">NJ0218</span>
          · 09:30–10:25 · Inês Duarte · só bagagem de mão
        </div>
      </div>
      <span class="badge">Concluído</span>
      <div class="row" style="gap: 6px">
        <button class="btn btn-ghost btn-sm" data-toast="PDF exportado"><i data-lucide="download"></i></button>
      </div>
    </div>
    <div class="ticket-row reveal">
      <div class="date-block">
        <span class="d">18</span>
        <span class="m">ago 2026</span>
      </div>
      <div>
        <div class="row" style="gap: 10px">
          <b style="font-size: 17px">Lisboa → Londres</b>
          <span class="airline-logo" style="background: #2a5bd7">AT</span>
        </div>
        <div class="small subtle" style="margin-top: 4px">
          <span class="mono">AT1204</span>
          · 14:20–17:00 · Inês Duarte · só bagagem de mão
        </div>
      </div>
      <span class="badge danger">Cancelado</span>
      <div class="row" style="gap: 6px">
        <button class="btn btn-ghost btn-sm" data-toast="PDF exportado"><i data-lucide="download"></i></button>
      </div>
    </div>
  </div>
</div>

<!-- MODAL: detalhe do bilhete + bagagem (RF-FO-18 a RF-FO-22) -->
<div class="modal-backdrop" id="mTicket">
  <div class="modal modal-lg">
    <div class="modal-head">
      <div>
        <h3 id="mtTitle">Lisboa → Paris · AT0911</h3>
        <div class="small subtle mono" id="mtNum">SKY-48K2Q1 · Inês Duarte</div>
      </div>
      <button class="btn btn-text btn-icon" data-close=""><i data-lucide="x"></i></button>
    </div>
    <div class="modal-body">
      <div class="row between" style="margin-bottom: 12px">
        <h4 style="font-size: 15px">Bagagem</h4>
        <button class="btn btn-ghost btn-sm" id="addBag" data-toast="Bagagem adicionada">
          <i data-lucide="plus"></i>
          Adicionar
        </button>
      </div>
      <div class="table-wrap">
        <table class="table">
          <thead>
            <tr>
              <th>Tipo</th>
              <th>Peso</th>
              <th class="right">Preço</th>
              <th></th>
            </tr>
          </thead>
          <tbody id="bagRows">
            <tr>
              <td>Bagagem de porão</td>
              <td class="mono">23 kg</td>
              <td class="right">35&nbsp;€</td>
              <td class="right"><button class="btn btn-text btn-icon btn-sm" data-toast="Bagagem retirada"><i data-lucide="trash-2"></i></button></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="summary-line" style="margin-top: 16px">
        <span class="muted">Preço base do voo</span>
        <span id="mtBase">118&nbsp;€</span>
      </div>
      <div class="summary-total" style="margin-top: 4px">
        <b>Total do bilhete</b>
        <span class="price" style="font-size: 26px" id="mtTotal">153&nbsp;€</span>
      </div>
      <div class="alert warn" style="margin-top: 20px">
        <i data-lucide="triangle-alert"></i>
        <div>Pode cancelar este bilhete até à partida do voo. O reembolso segue as regras da companhia aérea.</div>
      </div>
    </div>
    <div class="modal-foot" style="justify-content: space-between">
      <button class="btn btn-danger" data-toast="Bilhete cancelado">
        <i data-lucide="ban"></i>
        Cancelar bilhete
      </button>
      <div class="row">
        <button class="btn btn-ghost" data-toast="PDF exportado">
          <i data-lucide="download"></i>
          Exportar
        </button>
        <button class="btn btn-primary" data-toast="Alterações guardadas">Guardar</button>
      </div>
    </div>
  </div>
</div>
