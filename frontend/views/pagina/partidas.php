<?php

/** @var yii\web\View $this */

use yii\helpers\Url;

$this->title = 'Partidas e chegadas';
$this->params['larguraTotal'] = true; // a página traz o seu próprio .container
?>
<div class="container">
  <div class="page-head row between wrap" style="align-items: flex-end">
    <div>
      <span class="eyebrow">Aeroporto de Lisboa · Terminal 1</span>
      <h1 class="page-title" style="margin-top: 12px">
        Partidas &amp;
        <em class="serif">chegadas</em>
      </h1>
    </div>
    <div style="text-align: right">
      <div class="clock" id="clock">11:06</div>
      <div class="small subtle" id="today">segunda-feira, 2 de novembro</div>
    </div>
  </div>

  <div class="tabs" data-tabs="">
    <button class="tab active" data-tab="dep">
      <span class="row" style="gap: 8px">
        <i data-lucide="plane-takeoff"></i>
        Partidas
      </span>
    </button>
    <button class="tab" data-tab="arr">
      <span class="row" style="gap: 8px">
        <i data-lucide="plane-landing"></i>
        Chegadas
      </span>
    </button>
  </div>

  <div class="board-tools">
    <div class="input-icon">
      <i data-lucide="search"></i>
      <input class="input" id="q" placeholder="Voo, cidade ou companhia" />
    </div>
    <div class="segmented">
      <button>Ontem</button>
      <button class="active">Hoje</button>
      <button>Amanhã</button>
    </div>
  </div>

  <div class="tab-panel active" id="dep">
    <div class="board">
      <div class="board-row board-head">
        <div>Hora</div>
        <div>Voo</div>
        <div>Destino</div>
        <div>Terminal</div>
        <div>Porta</div>
        <div>Estado</div>
      </div>
      <div id="depRows">
        <div class="board-row">
          <div class="board-time">06:40</div>
          <div class="mono small" style="font-weight: 600">IS7744</div>
          <div class="board-city">
            Nova Iorque
            <span>Ibérica Sky</span>
          </div>
          <div class="small muted">Terminal 1</div>
          <div class="gate">D05</div>
          <div><span class="badge info">Agendado</span></div>
        </div>
        <div class="board-row">
          <div class="board-time">
            <s>07:00</s>
            07:04
          </div>
          <div class="mono small" style="font-weight: 600">MR3388</div>
          <div class="board-city">
            Amesterdão
            <span>Meridian Air</span>
          </div>
          <div class="small muted">Terminal 1</div>
          <div class="gate">C19</div>
          <div><span class="badge">Concluído</span></div>
        </div>
        <div class="board-row">
          <div class="board-time">08:15</div>
          <div class="mono small" style="font-weight: 600">AT1452</div>
          <div class="board-city">
            Nova Iorque
            <span>Atlântica Airways</span>
          </div>
          <div class="small muted">Terminal 1</div>
          <div class="gate">B14</div>
          <div><span class="badge info">Agendado</span></div>
        </div>
        <div class="board-row">
          <div class="board-time">09:30</div>
          <div class="mono small" style="font-weight: 600">NJ0218</div>
          <div class="board-city">
            Porto
            <span>NorteJet</span>
          </div>
          <div class="small muted">Terminal 1</div>
          <div class="gate">A03</div>
          <div><span class="badge ok live">Em embarque</span></div>
        </div>
        <div class="board-row">
          <div class="board-time">
            <s>10:05</s>
            10:45
          </div>
          <div class="mono small" style="font-weight: 600">MR3301</div>
          <div class="board-city">
            Madrid
            <span>Meridian Air</span>
          </div>
          <div class="small muted">Terminal 1</div>
          <div class="gate">C22</div>
          <div><span class="badge warn">Atrasado</span></div>
        </div>
        <div class="board-row">
          <div class="board-time">11:40</div>
          <div class="mono small" style="font-weight: 600">AT0911</div>
          <div class="board-city">
            Paris
            <span>Atlântica Airways</span>
          </div>
          <div class="small muted">Terminal 1</div>
          <div class="gate">B08</div>
          <div><span class="badge info">Agendado</span></div>
        </div>
        <div class="board-row">
          <div class="board-time">12:55</div>
          <div class="mono small" style="font-weight: 600">IS7720</div>
          <div class="board-city">
            Roma
            <span>Ibérica Sky</span>
          </div>
          <div class="small muted">Terminal 1</div>
          <div class="gate">D02</div>
          <div><span class="badge info">Agendado</span></div>
        </div>
        <div class="board-row">
          <div class="board-time">13:30</div>
          <div class="mono small" style="font-weight: 600">AT1460</div>
          <div class="board-city">
            Nova Iorque
            <span>Atlântica Airways</span>
          </div>
          <div class="small muted">Terminal 1</div>
          <div class="gate">B16</div>
          <div><span class="badge info">Agendado</span></div>
        </div>
        <div class="board-row">
          <div class="board-time">14:20</div>
          <div class="mono small" style="font-weight: 600">AT1204</div>
          <div class="board-city">
            Londres
            <span>Atlântica Airways</span>
          </div>
          <div class="small muted">Terminal 1</div>
          <div class="gate">—</div>
          <div><span class="badge danger">Cancelado</span></div>
        </div>
        <div class="board-row">
          <div class="board-time">15:10</div>
          <div class="mono small" style="font-weight: 600">NJ0451</div>
          <div class="board-city">
            Funchal
            <span>NorteJet</span>
          </div>
          <div class="small muted">Terminal 1</div>
          <div class="gate">A11</div>
          <div><span class="badge info">Agendado</span></div>
        </div>
        <div class="board-row">
          <div class="board-time">22:45</div>
          <div class="mono small" style="font-weight: 600">AT2088</div>
          <div class="board-city">
            São Paulo
            <span>Atlântica Airways</span>
          </div>
          <div class="small muted">Terminal 1</div>
          <div class="gate">B21</div>
          <div><span class="badge info">Agendado</span></div>
        </div>
      </div>
    </div>
  </div>
  <div class="tab-panel" id="arr">
    <div class="board">
      <div class="board-row board-head">
        <div>Hora</div>
        <div>Voo</div>
        <div>Origem</div>
        <div>Tapete</div>
        <div>Porta</div>
        <div>Estado</div>
      </div>
      <div id="arrRows">
        <div class="board-row">
          <div class="board-time">06:50</div>
          <div class="mono small" style="font-weight: 600">AT1453</div>
          <div class="board-city">
            Nova Iorque
            <span>Atlântica Airways</span>
          </div>
          <div class="small muted">Tapete 4</div>
          <div class="gate">B12</div>
          <div><span class="badge">Concluído</span></div>
        </div>
        <div class="board-row">
          <div class="board-time">08:40</div>
          <div class="mono small" style="font-weight: 600">NJ0219</div>
          <div class="board-city">
            Porto
            <span>NorteJet</span>
          </div>
          <div class="small muted">Tapete 1</div>
          <div class="gate">A04</div>
          <div><span class="badge">Concluído</span></div>
        </div>
        <div class="board-row">
          <div class="board-time">
            <s>09:55</s>
            10:35
          </div>
          <div class="mono small" style="font-weight: 600">MR3302</div>
          <div class="board-city">
            Madrid
            <span>Meridian Air</span>
          </div>
          <div class="small muted">Tapete 3</div>
          <div class="gate">C20</div>
          <div><span class="badge warn">Atrasado</span></div>
        </div>
        <div class="board-row">
          <div class="board-time">11:05</div>
          <div class="mono small" style="font-weight: 600">AT0912</div>
          <div class="board-city">
            Paris
            <span>Atlântica Airways</span>
          </div>
          <div class="small muted">Tapete 2</div>
          <div class="gate">B07</div>
          <div><span class="badge info">Agendado</span></div>
        </div>
        <div class="board-row">
          <div class="board-time">12:30</div>
          <div class="mono small" style="font-weight: 600">IS7721</div>
          <div class="board-city">
            Barcelona
            <span>Ibérica Sky</span>
          </div>
          <div class="small muted">Tapete 5</div>
          <div class="gate">D01</div>
          <div><span class="badge info">Agendado</span></div>
        </div>
        <div class="board-row">
          <div class="board-time">13:15</div>
          <div class="mono small" style="font-weight: 600">AT1205</div>
          <div class="board-city">
            Londres
            <span>Atlântica Airways</span>
          </div>
          <div class="small muted">Tapete —</div>
          <div class="gate">—</div>
          <div><span class="badge danger">Cancelado</span></div>
        </div>
        <div class="board-row">
          <div class="board-time">14:40</div>
          <div class="mono small" style="font-weight: 600">NJ0452</div>
          <div class="board-city">
            Funchal
            <span>NorteJet</span>
          </div>
          <div class="small muted">Tapete 1</div>
          <div class="gate">A10</div>
          <div><span class="badge info">Agendado</span></div>
        </div>
        <div class="board-row">
          <div class="board-time">16:25</div>
          <div class="mono small" style="font-weight: 600">AT2089</div>
          <div class="board-city">
            São Paulo
            <span>Atlântica Airways</span>
          </div>
          <div class="small muted">Tapete 4</div>
          <div class="gate">B20</div>
          <div><span class="badge info">Agendado</span></div>
        </div>
      </div>
    </div>
  </div>

  <div class="alert" style="margin-top: 20px">
    <i data-lucide="info"></i>
    <div>
      Os horários são atualizados em tempo real. Para receber alertas sobre o seu voo,
      <a href="<?= Url::to(['/site/signup']) ?>" style="font-weight: 600; text-decoration: underline">crie uma conta</a>
      .
    </div>
  </div>
</div>

<?php $this->registerJs(<<<'JS'
// Relógio do painel
function relogio() {
  const agora = new Date();
  document.getElementById("clock").textContent = agora.toLocaleTimeString("pt-PT", { hour: "2-digit", minute: "2-digit" });
  document.getElementById("today").textContent = agora.toLocaleDateString("pt-PT", { weekday: "long", day: "numeric", month: "long" });
}
relogio();
setInterval(relogio, 30000);
JS); ?>
