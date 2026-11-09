<?php

/** @var yii\web\View $this */

use yii\helpers\Url;

$this->title = 'Dados pessoais';
$this->params['larguraTotal'] = true; // a página traz o seu próprio .container
?>
<div class="container">
  <div class="page-head row wrap" style="gap: 24px">
    <span class="avatar" style="width: 84px; height: 84px; font-size: 28px">ID</span>
    <div>
      <h1 class="page-title" style="font-size: 48px">Inês Duarte</h1>
      <p class="muted" style="margin-top: 6px">Passageira desde outubro de 2026 · 4 viagens</p>
    </div>
  </div>

  <div class="profile-layout">
    <nav class="profile-nav">
      <a href="#dados" class="active">
        <i data-lucide="user"></i>
        Dados pessoais
      </a>
      <a href="#conta">
        <i data-lucide="lock"></i>
        Conta e segurança
      </a>
      <a href="#notif">
        <i data-lucide="bell"></i>
        Notificações
      </a>
      <a href="<?= Url::to(['/pagina/bilhetes']) ?>">
        <i data-lucide="ticket"></i>
        Os meus bilhetes
      </a>
    </nav>

    <div class="stack" style="--gap: 24px">
      <!-- Dados pessoais (RF-FO-10, RF-FO-11) -->
      <section class="card" id="dados">
        <div class="card-head">
          <div>
            <h3>Dados pessoais</h3>
            <p class="small subtle">Usados para preencher automaticamente os seus bilhetes.</p>
          </div>
          <span class="badge ok">Completo</span>
        </div>
        <form class="form-grid" onsubmit="event.preventDefault();toast('Dados atualizados')">
          <div class="field full">
            <label>Nome completo</label>
            <input class="input" value="Inês Duarte" />
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
            <input class="input mono" value="P4821390" />
          </div>
          <div class="field">
            <label>Data de nascimento</label>
            <input class="input" type="date" value="1998-04-17" />
          </div>
          <div class="field">
            <label>Nacionalidade</label>
            <select class="select">
              <option>Portuguesa</option>
              <option>Espanhola</option>
              <option>Brasileira</option>
            </select>
          </div>
          <div class="field full">
            <label>Contacto</label>
            <div class="input-icon">
              <i data-lucide="phone"></i>
              <input class="input" value="+351 912 345 678" />
            </div>
          </div>
          <div class="full row" style="justify-content: flex-end">
            <button type="reset" class="btn btn-text">Cancelar</button>
            <button class="btn btn-primary">Guardar alterações</button>
          </div>
        </form>
      </section>

      <section class="card" id="conta">
        <div class="card-head"><h3>Conta e segurança</h3></div>
        <div class="form-grid">
          <div class="field full">
            <label>Email</label>
            <div class="input-icon">
              <i data-lucide="mail"></i>
              <input class="input" value="ines.duarte@mail.pt" />
            </div>
          </div>
          <div class="field">
            <label>Palavra-passe atual</label>
            <input class="input" type="password" value="12345678" />
          </div>
          <div class="field">
            <label>Nova palavra-passe</label>
            <input class="input" type="password" placeholder="Mínimo 8 caracteres" />
          </div>
        </div>
        <div class="row" style="justify-content: flex-end; margin-top: 16px">
          <button class="btn btn-ghost" data-toast="Palavra-passe alterada">Alterar palavra-passe</button>
        </div>
      </section>

      <!-- Notificações (RF-FO-26) -->
      <section class="card" id="notif">
        <div class="card-head"><h3>Notificações por email</h3></div>
        <div class="pref">
          <span class="feature-icon" style="width: 38px; height: 38px"><i data-lucide="clock"></i></span>
          <div class="grow">
            <b>Atrasos</b>
            <div class="small subtle">Quando a hora de partida muda</div>
          </div>
          <label class="switch">
            <input type="checkbox" checked="" />
            <span></span>
          </label>
        </div>
        <div class="pref">
          <span class="feature-icon" style="width: 38px; height: 38px"><i data-lucide="ban"></i></span>
          <div class="grow">
            <b>Cancelamentos</b>
            <div class="small subtle">Sempre ativo por segurança</div>
          </div>
          <label class="switch">
            <input type="checkbox" checked="" disabled="" />
            <span></span>
          </label>
        </div>
        <div class="pref">
          <span class="feature-icon" style="width: 38px; height: 38px"><i data-lucide="door-open"></i></span>
          <div class="grow">
            <b>Porta de embarque</b>
            <div class="small subtle">Atribuição e mudanças de porta</div>
          </div>
          <label class="switch">
            <input type="checkbox" checked="" />
            <span></span>
          </label>
        </div>
      </section>

      <section class="card" style="border-color: var(--danger-soft)">
        <div class="row between wrap">
          <div>
            <h3 style="font-size: 16px">Eliminar conta</h3>
            <p class="small subtle">Os seus dados pessoais são apagados de acordo com o RGPD.</p>
          </div>
          <button class="btn btn-danger btn-sm">Eliminar conta</button>
        </div>
      </section>
    </div>
  </div>
</div>
