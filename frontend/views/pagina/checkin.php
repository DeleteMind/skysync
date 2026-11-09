<?php

/** @var yii\web\View $this */

use yii\helpers\Url;

$this->title = 'Check-in online';
$this->params['larguraTotal'] = true; // a página traz o seu próprio .container
?>
<div class="container ci-wrap">
  <!-- PASSO 1 — Identificação sem conta (RF-FO-23) -->
  <section class="tab-panel active" id="s1">
    <div class="ci-hero">
      <span class="eyebrow">Abre 48 h antes · fecha 1 h antes</span>
      <h1 class="page-title" style="margin-top: 14px">
        Check-in
        <em class="serif" style="color: var(--accent)">online</em>
      </h1>
      <p class="muted" style="margin-top: 14px">Não precisa de conta. Use os dados que estão no seu bilhete.</p>
    </div>
    <form class="card ci-form" id="ciForm" novalidate="">
      <div class="field" id="fT">
        <label for="tk">Número do bilhete</label>
        <div class="input-icon">
          <i data-lucide="ticket"></i>
          <input class="input mono" id="tk" placeholder="SKY-XXXXXX" value="SKY-48K2Q1" />
        </div>
        <span class="field-msg">&nbsp;</span>
      </div>
      <div class="field">
        <label for="dc">Nº do documento</label>
        <div class="input-icon">
          <i data-lucide="id-card"></i>
          <input class="input mono" id="dc" placeholder="Passaporte ou CC" value="P4821390" />
        </div>
        <span class="field-msg">&nbsp;</span>
      </div>
      <button class="btn btn-accent btn-lg" style="margin-bottom: 22px">
        Continuar
        <i data-lucide="arrow-right"></i>
      </button>
    </form>
    <p class="small muted" style="text-align: center; margin-top: 20px">
      Tem conta?
      <a href="<?= Url::to(['/site/login']) ?>" style="font-weight: 600; color: var(--ink)">Entre</a>
      para fazer check-in de todos os bilhetes de uma vez.
    </p>
    <div class="rules" style="margin-top: 40px">
      <div class="rule">
        <i data-lucide="luggage"></i>
        <div>
          <b>Bagagem</b>
          <br />
          <span class="muted">Deixe a bagagem de porão no balcão até 60 min antes.</span>
        </div>
      </div>
      <div class="rule">
        <i data-lucide="id-card"></i>
        <div>
          <b>Documento</b>
          <br />
          <span class="muted">Leve o mesmo documento indicado na compra.</span>
        </div>
      </div>
      <div class="rule">
        <i data-lucide="door-open"></i>
        <div>
          <b>Embarque</b>
          <br />
          <span class="muted">A porta fecha 20 min antes da partida.</span>
        </div>
      </div>
    </div>
  </section>

  <!-- PASSO 2 — Confirmar dados -->
  <section class="tab-panel" id="s2" style="padding-top: 48px">
    <button class="btn btn-text btn-sm" data-go="s1" style="margin-bottom: 16px">
      <i data-lucide="arrow-left"></i>
      Voltar
    </button>
    <h1 class="page-title" style="font-size: 44px">Confirme os seus dados</h1>
    <div class="card" style="margin-top: 24px">
      <div class="row between wrap">
        <div class="row">
          <span class="avatar" style="width: 48px; height: 48px">ID</span>
          <div>
            <b style="font-size: 18px">Inês Duarte</b>
            <div class="small subtle">Passaporte · P4821390 · Portuguesa</div>
          </div>
        </div>
        <span class="badge info">Bilhete válido</span>
      </div>
      <hr class="divider" />
      <div class="grid g-3">
        <div>
          <div class="eyebrow">Voo</div>
          <div style="font-weight: 600; margin-top: 4px" class="mono">AT0911</div>
        </div>
        <div>
          <div class="eyebrow">Rota</div>
          <div style="font-weight: 600; margin-top: 4px">Lisboa → Paris</div>
        </div>
        <div>
          <div class="eyebrow">Partida</div>
          <div style="font-weight: 600; margin-top: 4px">
            14 nov ·
            <span class="mono">11:40</span>
          </div>
        </div>
      </div>
      <hr class="divider" />
      <div class="row between">
        <span class="muted">Bagagem</span>
        <span>1 × Bagagem de porão (20 kg)</span>
      </div>
    </div>
    <label class="check" style="margin-top: 20px">
      <input type="checkbox" id="agree" />
      Declaro que não transporto artigos proibidos na bagagem.
    </label>
    <button class="btn btn-accent btn-lg btn-block" style="margin-top: 20px" id="confirm" disabled="">
      Confirmar check-in
    </button>
  </section>

  <!-- PASSO 3 — Cartão de embarque (RF-FO-25) -->
  <section class="tab-panel" id="s3" style="padding-top: 48px">
    <div class="alert ok" style="margin-bottom: 24px">
      <i data-lucide="circle-check"></i>
      <div>
        <b>Check-in feito.</b>
        Enviámos o cartão de embarque para o seu email.
      </div>
    </div>
    <div class="ticket">
      <div class="ticket-main">
        <div class="row between">
          <span class="eyebrow">Cartão de embarque</span>
          <span class="airline">
            <span class="airline-logo" style="background: #2a5bd7">AT</span>
            <b style="color: var(--ink)">Atlântica Airways</b>
          </span>
        </div>
        <div class="ticket-big">
          <div>
            <div class="iata">LIS</div>
            <div class="small muted">Lisboa · 11:40</div>
          </div>
          <i data-lucide="plane" style="width: 28px; height: 28px; color: var(--accent)"></i>
          <div style="text-align: right">
            <div class="iata">CDG</div>
            <div class="small muted">Paris · 15:15</div>
          </div>
        </div>
        <div class="ticket-fields">
          <div>
            <div class="k">Passageiro</div>
            <div class="v">Inês Duarte</div>
          </div>
          <div>
            <div class="k">Voo</div>
            <div class="v mono">AT0911</div>
          </div>
          <div>
            <div class="k">Porta</div>
            <div class="v mono">B08</div>
          </div>
          <div>
            <div class="k">Embarque</div>
            <div class="v mono">11:05</div>
          </div>
        </div>
      </div>
      <div class="ticket-stub">
        <div class="qr"><canvas data-qr="SKY-48K2Q1-CHK" width="29" height="29"></canvas></div>
        <div class="mono small" style="font-weight: 600">SKY-48K2Q1</div>
      </div>
    </div>
    <div class="row" style="justify-content: center; margin-top: 24px; flex-wrap: wrap">
      <button class="btn btn-ghost" onclick="toast('Cartão exportado em PDF','download')">
        <i data-lucide="download"></i>
        Exportar PDF
      </button>
      <button class="btn btn-ghost" onclick="toast('Enviado para o email','mail')">
        <i data-lucide="mail"></i>
        Enviar por email
      </button>
      <a href="<?= Url::home() ?>" class="btn btn-primary">Concluir</a>
    </div>
  </section>
</div>

<?php $this->registerJs(<<<'JS'
// Passo 1 -> 2 -> 3 (só visual, sem validação no servidor)
document.getElementById("ciForm")?.addEventListener("submit", (e) => { e.preventDefault(); showPanel("s2"); });
const agree = document.getElementById("agree"), confirmar = document.getElementById("confirm");
agree?.addEventListener("change", () => { confirmar.disabled = !agree.checked; });
confirmar?.addEventListener("click", () => showPanel("s3"));
JS); ?>
