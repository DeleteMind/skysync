<?php

/** @var yii\web\View $this */

use yii\helpers\Url;

$this->title = 'Voar começa aqui';
$this->params['larguraTotal'] = true; // a página traz o seu próprio .container
?>
<div>
    <!-- HERO + PESQUISA (RF-FO-01) -->
    <section class="hero">
        <svg class="hero-art" viewBox="0 0 560 320" fill="none" aria-hidden="true">
            <path
                    d="M20 300 C 160 40, 400 20, 540 140"
                    stroke="currentColor"
                    stroke-width="1.5"
                    stroke-dasharray="2 8"
                    stroke-linecap="round"
            ></path>
            <circle cx="20" cy="300" r="6" fill="var(--bg)" stroke="var(--ink-3)" stroke-width="1.5"></circle>
            <circle cx="540" cy="140" r="6" fill="var(--ink)"></circle>
            <g transform="translate(372 52) rotate(18)" color="var(--accent)">
                <path
                        d="M-14 0 L14 0 M2 0 L-6 -12 M2 0 L-6 12 M-12 0 L-16 -5 M-12 0 L-16 5"
                        stroke="currentColor"
                        stroke-width="2.4"
                        stroke-linecap="round"
                ></path>
            </g>
        </svg>

        <div class="container">
            <span class="eyebrow">Aeroporto de Lisboa · LIS</span>
            <h1 class="hero-title" style="margin-top: 14px">
                Voar começa
                <br />
                <em>aqui.</em>
            </h1>
            <p class="hero-sub">
                Pesquise voos diretos e com escalas, compre bilhetes para quem viaja consigo e faça check-in em segundos.
            </p>

            <form class="search-card" method="get" action="<?= Url::to(['/pagina/pesquisa']) ?>">
                <div class="search-top">
                    <div class="segmented">
                        <button type="button" class="active">Só ida</button>
                        <button type="button">Partidas de Lisboa</button>
                    </div>
                    <span class="small subtle row" style="gap: 6px">
            <i data-lucide="shield-check"></i>
            Preço final calculado sem surpresas
          </span>
                </div>
                <div class="search-grid">
                    <div class="search-cell">
                        <label for="o">Origem</label>
                        <input id="o" name="o" value="Lisboa (LIS)" />
                        <div class="hint">Humberto Delgado</div>
                    </div>
                    <button type="button" class="swap-btn" aria-label="Trocar origem e destino" id="swap">
                        <i data-lucide="arrow-left-right"></i>
                    </button>
                    <div class="search-cell">
                        <label for="d">Destino</label>
                        <input id="d" name="d" placeholder="Para onde?" list="dest" />
                        <datalist id="dest">
                            <option value="Porto (OPO)"></option>
                            <option value="Ponta Delgada (PDL)"></option>
                            <option value="Funchal (FNC)"></option>
                            <option value="Madrid (MAD)"></option>
                            <option value="Paris (CDG)"></option>
                            <option value="Londres (LHR)"></option>
                            <option value="Roma (FCO)"></option>
                            <option value="Amesterdão (AMS)"></option>
                            <option value="Nova Iorque (JFK)"></option>
                            <option value="São Paulo (GRU)"></option>
                            <option value="Barcelona (BCN)"></option>
                        </datalist>
                        <div class="hint">Cidade ou código IATA</div>
                    </div>
                    <div class="search-cell">
                        <label for="dt">Data</label>
                        <input id="dt" name="dt" type="date" value="2026-11-14" />
                        <div class="hint">Sábado</div>
                    </div>
                    <div class="search-cell">
                        <label for="p">Passageiros</label>
                        <select id="p" name="p">
                            <option>1 adulto</option>
                            <option selected="">2 adultos</option>
                            <option>3 adultos</option>
                            <option>4 adultos</option>
                        </select>
                        <div class="hint">Económica</div>
                    </div>
                    <button class="btn btn-accent btn-lg search-submit">
                        <i data-lucide="search"></i>
                        Pesquisar
                    </button>
                </div>
            </form>
        </div>
    </section>

    <!-- PARTIDAS AO VIVO (RF-FO-05) -->
    <section class="section" style="padding-top: 24px">
        <div class="container">
            <div class="section-head">
                <div>
                    <span class="badge ok live">Em direto</span>
                    <h2 class="section-title" style="margin-top: 12px">Próximas partidas</h2>
                </div>
                <a href="<?= Url::to(['/pagina/partidas']) ?>" class="btn btn-ghost">
                    Ver painel completo
                    <i data-lucide="arrow-right"></i>
                </a>
            </div>
            <div class="board reveal">
                <div class="board-row board-head">
                    <div>Hora</div>
                    <div>Voo</div>
                    <div>Destino</div>
                    <div>Terminal</div>
                    <div>Porta</div>
                    <div>Estado</div>
                </div>
                <div id="liveBoard">
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
                </div>
            </div>
        </div>
    </section>

    <!-- DESTINOS -->
    <section class="section" style="padding-top: 0">
        <div class="container">
            <div class="section-head">
                <h2 class="section-title">Destinos em destaque</h2>
                <p class="muted" style="max-width: 360px">
                    Preços base por passageiro, já com taxas. A bagagem de porão é escolhida na compra.
                </p>
            </div>
            <div class="grid g-4" id="destinos">
                <a href="<?= Url::to(['/pagina/pesquisa']) ?>" class="card card-hover reveal" style="padding: 0px; overflow: hidden">
                    <div style="height: 150px; background: #e7edfb; display: grid; place-items: center; position: relative">
            <span class="serif" style="font-size: 72px; color: #0e1726; opacity: 0.85; letter-spacing: -0.04em">
              CDG
            </span>
                    </div>
                    <div style="padding: 18px 20px">
                        <div class="row between">
                            <b>Paris</b>
                            <span class="small subtle">FR</span>
                        </div>
                        <div class="row between" style="margin-top: 6px">
                            <span class="small muted">Direto · 2h 35m</span>
                            <span style="font-weight: 600">desde 118&nbsp;€</span>
                        </div>
                    </div>
                </a>
                <a href="<?= Url::to(['/pagina/pesquisa']) ?>" class="card card-hover reveal" style="padding: 0px; overflow: hidden">
                    <div style="height: 150px; background: #fbf0dc; display: grid; place-items: center; position: relative">
            <span class="serif" style="font-size: 72px; color: #0e1726; opacity: 0.85; letter-spacing: -0.04em">
              JFK
            </span>
                    </div>
                    <div style="padding: 18px 20px">
                        <div class="row between">
                            <b>Nova Iorque</b>
                            <span class="small subtle">US</span>
                        </div>
                        <div class="row between" style="margin-top: 6px">
                            <span class="small muted">2 escalas · 14h 25m</span>
                            <span style="font-weight: 600">desde 342&nbsp;€</span>
                        </div>
                    </div>
                </a>
                <a href="<?= Url::to(['/pagina/pesquisa']) ?>" class="card card-hover reveal" style="padding: 0px; overflow: hidden">
                    <div style="height: 150px; background: #e3f2ea; display: grid; place-items: center; position: relative">
            <span class="serif" style="font-size: 72px; color: #0e1726; opacity: 0.85; letter-spacing: -0.04em">
              FNC
            </span>
                    </div>
                    <div style="padding: 18px 20px">
                        <div class="row between">
                            <b>Funchal</b>
                            <span class="small subtle">PT</span>
                        </div>
                        <div class="row between" style="margin-top: 6px">
                            <span class="small muted">Direto · 1h 45m</span>
                            <span style="font-weight: 600">desde 89&nbsp;€</span>
                        </div>
                    </div>
                </a>
                <a href="<?= Url::to(['/pagina/pesquisa']) ?>" class="card card-hover reveal" style="padding: 0px; overflow: hidden">
                    <div style="height: 150px; background: #fbe7e3; display: grid; place-items: center; position: relative">
            <span class="serif" style="font-size: 72px; color: #0e1726; opacity: 0.85; letter-spacing: -0.04em">
              FCO
            </span>
                    </div>
                    <div style="padding: 18px 20px">
                        <div class="row between">
                            <b>Roma</b>
                            <span class="small subtle">IT</span>
                        </div>
                        <div class="row between" style="margin-top: 6px">
                            <span class="small muted">1 escala · 5h 15m</span>
                            <span style="font-weight: 600">desde 164&nbsp;€</span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <!-- FUNCIONALIDADES -->
    <section class="section" style="padding-top: 0">
        <div class="container">
            <div class="grid g-3">
                <div class="feature reveal">
                    <span class="feature-icon"><i data-lucide="qr-code"></i></span>
                    <h3>Check-in sem conta</h3>
                    <p class="muted">
                        Basta o número do bilhete e o documento de identificação. O cartão de embarque fica pronto a descarregar.
                    </p>
                    <a href="<?= Url::to(['/pagina/checkin']) ?>" class="link">
                        Fazer check-in
                        <i data-lucide="arrow-right"></i>
                    </a>
                </div>
                <div class="feature reveal">
                    <span class="feature-icon"><i data-lucide="users"></i></span>
                    <h3>Viaje acompanhado</h3>
                    <p class="muted">
                        Compre bilhetes para si e para quem vai consigo, com bagagem individual para cada passageiro.
                    </p>
                    <a href="<?= Url::to(['/pagina/pesquisa']) ?>" class="link">
                        Pesquisar voos
                        <i data-lucide="arrow-right"></i>
                    </a>
                </div>
                <div class="feature reveal">
                    <span class="feature-icon"><i data-lucide="bell"></i></span>
                    <h3>Alertas do seu voo</h3>
                    <p class="muted">Atrasos, cancelamentos ou mudanças de porta chegam ao seu email em menos de um minuto.</p>
                    <a href="<?= Url::to(['/site/signup']) ?>" class="link">
                        Criar conta grátis
                        <i data-lucide="arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>
