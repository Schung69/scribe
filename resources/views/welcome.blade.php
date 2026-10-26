<!DOCTYPE html>
<html lang="fr" class="motion-safe:scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Scribe — Relations presse & publics à Strasbourg</title>
        <meta name="description" content="Scribe, agence de relations presse et publics à Strasbourg. Storytelling, communiqués, dossiers de presse, veille média, relations médias France & Europe, gestion de crise, média training.">

        {{-- Signale que le JS est actif : le titre du hero reste masqué jusqu'à son animation d'écriture (pas de flash) --}}
        <script>document.documentElement.classList.add('js');</script>

        @fonts

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="overflow-x-clip bg-scribe-bg font-sans font-light text-scribe-green antialiased">

        {{-- Nav --}}
        <header class="absolute inset-x-0 top-0 z-50 px-6 pt-3 lg:px-12">
            <a href="#accueil" class="inline-block">
                <img src="{{ asset('images/logo-top.png') }}" alt="Scribe — Relations presse & publics" class="w-[135px]">
            </a>
            <button id="menu-toggle" type="button" aria-expanded="false" aria-controls="menu-panel" class="-ml-6 mt-4 flex h-20 w-20 cursor-pointer flex-col items-start justify-center gap-2 bg-white p-5 sm:h-24 sm:w-24 lg:-ml-12 lg:h-[126px] lg:w-[126px] lg:p-10" aria-label="Ouvrir le menu">
                <span class="h-1 w-6 bg-scribe-green"></span>
                <span class="h-1 w-11 bg-scribe-green"></span>
                <span class="ml-5 h-1 w-6 bg-scribe-green"></span>
            </button>
        </header>

        {{-- Mobile / anchor menu overlay --}}
        <nav id="menu-panel" class="hidden fixed inset-0 z-[60] flex-col items-center justify-center gap-2 bg-scribe-green/98 text-center">
            <button id="menu-close" type="button" class="absolute right-6 top-6 p-2 text-white" aria-label="Fermer le menu">
                <span class="block h-0.5 w-7 rotate-45 bg-current"></span>
                <span class="-mt-0.5 block h-0.5 w-7 -rotate-45 bg-current"></span>
            </button>
            @foreach ([
                '#agence' => 'L\'agence',
                '#humain' => 'L\'humain d\'abord',
                '#equipe' => 'L\'équipe',
                '#notre-conviction' => 'Notre conviction',
                '#services' => 'Nos services',
                '#force' => 'Notre force',
                '#secteurs' => 'Secteurs d\'expertise',
                '#references' => 'Références',
                '#contact' => 'Contact',
            ] as $ancre => $intitule)
                <a href="{{ $ancre }}" class="px-6 py-2 text-xl font-medium text-white hover:text-scribe-green-light sm:text-2xl">{{ $intitule }}</a>
            @endforeach
        </nav>

        {{-- Hero : showreel en fond (muet par défaut, bouton son), titre écrit lettre par lettre, trombone qui tombe --}}
        <section id="accueil" class="relative flex min-h-screen items-start overflow-x-clip bg-black px-6 pt-56 pb-24 sm:pt-36 lg:px-12 lg:pt-32">
            <video id="hero-video" class="absolute inset-0 h-full w-full object-cover opacity-55" autoplay muted loop playsinline preload="auto" poster="{{ asset('video/showreel-poster.jpg') }}" aria-hidden="true">
                <source src="{{ asset('video/showreel.mp4') }}" type="video/mp4">
            </video>

            <div class="relative mx-auto w-full max-w-[1300px] lg:pl-[130px]">
                <h1 id="hero-title" class="max-w-3xl text-4xl font-semibold leading-tight text-white sm:text-5xl lg:text-6xl">
                    Vous êtes le sujet,<br>
                    nous sommes <em data-reveal="zoom" class="inline-block font-normal text-scribe-green-light italic">le verbe</em><span data-reveal="dot" class="inline-block">.</span>
                </h1>
            </div>

            <button id="hero-sound" type="button" aria-pressed="false" aria-label="Activer le son de la vidéo" class="absolute right-6 bottom-[calc(var(--diag)+1.5rem)] z-30 flex h-12 w-12 cursor-pointer items-center justify-center rounded-full border border-white/60 bg-black/30 text-white backdrop-blur-sm transition hover:bg-white hover:text-scribe-green lg:right-12">
                <svg data-icon="muted" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M11 5 6 9H2v6h4l5 4V5z"/><path d="m23 9-6 6"/><path d="m17 9 6 6"/></svg>
                <svg data-icon="sound" class="hidden h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M11 5 6 9H2v6h4l5 4V5z"/><path d="M15.5 8.5a5 5 0 0 1 0 7"/><path d="M19 5a10 10 0 0 1 0 14"/></svg>
            </button>

            <div id="hero-clip" class="pointer-events-none absolute left-1/2 -bottom-24 z-20 w-28 -translate-x-[70%] sm:-bottom-32 sm:w-36 lg:-bottom-36 lg:w-[180px]">
                <img src="{{ asset('images/trombone-hero.png') }}" alt="" class="w-full">
                <p class="absolute top-[19%] left-[55%] whitespace-nowrap text-sm font-normal text-scribe-red uppercase sm:text-base lg:text-[22px]">Écrire l'indicible.</p>
            </div>
        </section>

        {{-- Un écosystème global --}}
        <section id="agence" class="diag diag-bg-scribe-bg pb-[calc(var(--diag)+6rem)] px-6 lg:px-12">
            <div class="mx-auto max-w-[1300px]">
                <div class="grid items-center gap-8 md:grid-cols-2 md:gap-16">
                    <div>
                        <p class="text-base font-medium tracking-[0.2em] text-scribe-red">UN ÉCOSYSTÈME GLOBAL</p>
                        <h2 class="mt-3 text-3xl font-semibold leading-snug sm:text-4xl">
                            Une agence RP.<br>
                            <em class="font-normal italic">Au cœur d'une agence globale.</em>
                        </h2>
                        <p class="mt-4 max-w-xl text-lg">
                            SCRIBE se suffit à elle-même comme agence de relations presse pure. Mais elle s'appuie sur un écosystème complet, à la pointe de la technologie, capable de gérer l'image entière de ses annonceurs.
                        </p>
                    </div>

                    <div class="flex flex-col items-end text-right">
                        <img src="{{ asset('images/logo-scribe-2.png') }}" alt="Scribe — Relations presse & publics" class="h-32 w-auto sm:h-40">
                        <p class="mt-6 text-xs font-semibold tracking-[0.2em] text-scribe-grey uppercase">Relations presse & publics</p>
                        <p class="mt-2 max-w-md text-base text-scribe-grey">Storytelling, communiqués et dossiers de presse, veille média, gestion de crise.</p>
                    </div>
                </div>
            </div>
        </section>

        {{-- Bandeau : un seul interlocuteur --}}
        <section class="diag-rev diag-bg-scribe-green diag-pad-16 pb-[calc(var(--diag)+6rem)] px-6 lg:px-12">
            <div class="mx-auto max-w-[1300px]">
                <p class="max-w-4xl text-3xl font-bold leading-tight text-white sm:text-4xl lg:text-5xl">
                    <span class="-rotate-[1.5deg] inline-block">De la plaquette au site web, du</span><br>
                    <span class="ml-4 block rotate-[1deg] text-scribe-green-light sm:ml-6">communiqué à la campagne :</span>
                    <span class="ml-8 block rotate-[2deg] sm:ml-12">un seul interlocuteur pour toute</span>
                    <span class="ml-4 block -rotate-[1deg] text-scribe-green-light sm:ml-6">votre communication.</span>
                </p>
            </div>
        </section>

        {{-- L'humain d'abord --}}
        <section id="humain" class="diag diag-bg-scribe-band pb-[calc(var(--diag)+6rem)] px-6 lg:px-12">
            <div class="mx-auto grid max-w-[1300px] gap-8 md:grid-cols-[2fr_3fr] md:gap-16">
                <div>
                    <p class="text-base font-medium tracking-[0.2em] text-scribe-red">L'HUMAIN D'ABORD</p>
                    <h2 class="mt-3 text-3xl font-semibold leading-snug sm:text-4xl">
                        Au-delà des médias, <em class="font-normal italic">l'humain.</em>
                    </h2>
                </div>
                <div class="flex items-center">
                    <p class="text-lg">
                        Dans un monde où l'intelligence artificielle et le digital déshumanisent, travailler avec une agence de relations presse, c'est choisir l'humain et les rapports réels. Au-delà de la visibilité qu'elles procurent, les RP restent d'abord une affaire de confiance et de liens.
                    </p>
                </div>
            </div>
        </section>

        {{-- Équipe --}}
        <section id="equipe" class="diag-rev diag-bg-white pb-24 px-6 lg:px-12">
            <div class="mx-auto max-w-[1300px]">
                <h2 class="text-3xl font-semibold sm:text-4xl">Parlons-en, humainement.</h2>
                <p class="mt-2 text-base font-medium tracking-[0.2em] text-scribe-red">L'ÉQUIPE</p>

                {{-- Vidéo de l'équipe animée au scroll (frames dessinées dans un canvas) --}}
                {{-- Desktop : vidéo et cartes sont toutes deux sticky dans #members-scroll ; #members-track donne la durée de la vidéo,
                     puis les cartes apparaissent par-dessus et restent fixées pendant le dernier espaceur avant de libérer la page.
                     Mobile : la vidéo est sticky dans son propre bloc, les cartes suivent normalement. --}}
                <div id="members-scroll" class="relative mt-10" data-frames="{{ asset('frames/members') }}" data-frame-count="113">
                  <div class="lg:contents">
                    <div class="sticky top-0 flex h-screen items-center justify-center">
                        <div id="members-frame" class="relative w-full max-w-[min(900px,calc(72vh*1152/802))]">
                            <div class="members-sheet absolute inset-0 translate-x-6 -translate-y-8 rotate-2 bg-scribe-sheet shadow-lg"></div>
                            <canvas id="members-canvas" class="relative block aspect-[1152/802] w-full -rotate-2" aria-label="L'équipe Scribe s'installe et ouvre la presse" role="img"></canvas>
                            <img src="{{ asset('images/trombone-mini.png') }}" alt="" class="members-frame-clip absolute -top-16 -left-12 w-36 drop-shadow-[2px_3px_3px_rgba(0,0,0,0.25)]">
                        </div>
                    </div>
                    <div id="members-track" class="h-[100vh] md:h-[200vh]"></div>
                  </div>

                <div id="members-cards" class="relative z-10 mt-16 grid gap-16 sm:grid-cols-2 lg:sticky lg:top-0 lg:-mt-[100vh] lg:h-screen lg:grid-cols-3 lg:content-center">
                    {{-- Desktop : le titre réapparaît au-dessus des portraits (le titre d'origine est déjà sorti de l'écran à ce moment-là) --}}
                    <div class="members-heading hidden lg:col-span-3 lg:mb-6 lg:block" aria-hidden="true">
                        <p class="text-3xl font-semibold sm:text-4xl">Parlons-en, humainement.</p>
                        <p class="mt-2 text-base font-medium tracking-[0.2em] text-scribe-red">L'ÉQUIPE</p>
                    </div>

                    @foreach ([
                        ['name' => 'Marie Koenig', 'role' => 'Attachée de presse', 'email' => 'mkoenig@scribe-rp.eu', 'phone' => '+33 (0)7 63 58 87 33', 'photo' => 'marie.png'],
                        ['name' => 'Camille Massotte', 'role' => 'Consultante RP & public', 'email' => 'cmassotte@scribe-rp.eu', 'phone' => '+33 (0)6 99 80 03 84', 'photo' => 'camille.png'],
                        ['name' => 'Nathalie Jaeger', 'role' => 'Attachée de presse', 'email' => 'njaeger@scribe-rp.eu', 'phone' => null, 'photo' => 'nathalie.png'],
                    ] as $member)
                        <div class="member-card">
                            <div class="relative aspect-square w-full max-w-xs">
                                <div class="absolute inset-0 -translate-y-[40px] -rotate-3 bg-scribe-sheet shadow-lg"></div>
                                <img src="{{ asset('images/'.$member['photo']) }}" alt="{{ $member['name'] }}" class="absolute top-1/2 left-1/2 w-[112%] max-w-none -rotate-2 translate-x-[calc(-50%_-_40px)] translate-y-[calc(-50%_-_30px)]">
                                <img src="{{ asset('images/trombone-mini.png') }}" alt="" class="member-clip absolute -top-16 -left-12 w-36 drop-shadow-[2px_3px_3px_rgba(0,0,0,0.25)]">
                            </div>
                            <p class="mt-6 text-2xl font-bold">{{ $member['name'] }}</p>
                            <p class="mt-1 text-sm font-normal tracking-wider uppercase">{{ $member['role'] }}</p>
                            <p class="mt-1 text-base font-normal">{{ $member['email'] }}</p>
                            @if ($member['phone'])
                                <p class="text-base font-semibold">{{ $member['phone'] }}</p>
                            @endif
                        </div>
                    @endforeach
                </div>

                <div class="hidden h-[60vh] lg:block"></div>
                </div>
            </div>
        </section>

        {{-- Notre conviction + Notre métier --}}
        {{-- Desktop : toutes les positions/tailles reprennent la maquette mesurée à 1200 px, converties en vw
             (1vw = 12 px de la maquette) et plafonnées à la largeur du conteneur (1396 px). Mobile/tablette : empilé. --}}
        <section id="notre-conviction" class="diag diag-bg-scribe-bg pb-25 px-6 lg:px-12 lg:pb-[min(5.25vw,73px)]">
            {{-- La colonne du texte « Notre conviction » a la largeur de l'objectif et se centre au-dessus de lui --}}
            <div class="mx-auto grid max-w-[1300px] gap-16 lg:grid-cols-[min(32.35vw,452px)_1fr] lg:gap-[min(2vw,28px)]">
                {{-- #conviction : le texte « sort » de l'objectif de l'appareil photo (camera.js) --}}
                <div id="conviction" class="text-center lg:ml-[min(10.1vw,141px)] lg:w-[min(22.25vw,310px)]">
                    <p class="text-base font-medium tracking-[0.2em] text-scribe-red">NOTRE CONVICTION</p>
                    <h2 class="mt-3 text-3xl font-semibold leading-snug sm:text-4xl lg:text-[min(2vw,1.75rem)]">
                        Exister à la troisième personne.<br>
                        <em class="font-normal italic">Celle dont on parle.</em>
                    </h2>
                    <p class="mx-auto mt-6 max-w-sm text-lg lg:mt-4 lg:max-w-none lg:text-[min(1.08vw,0.95rem)] lg:leading-[1.45]">
                        Les relations presse amplifient la capacité d'une entreprise, d'une marque ou d'un produit à exister à la troisième personne. Car la première personne, l'expression de l'ego, n'a pas cours dans les médias. Une actualité, une innovation, un geste : les RP se nourrissent de faits. À la télévision, dans la presse, sur le web, la qualité d'une marque n'existe vraiment que lorsqu'elle est reconnue, énoncée par un tiers. À l'ère du quart d'heure de gloire, l'essentiel n'est pas seulement ce que journalistes, influenceurs et blogueurs disent d'une marque : c'est qu'ils jugent bon d'en parler, et de lui transférer le lien de confiance qu'ils nouent avec leur public.
                    </p>
                </div>

                <div id="metier">
                    <p class="text-2xl leading-snug font-black sm:text-3xl lg:ml-[min(12.67vw,177px)] lg:text-[min(2.33vw,1.95rem)] lg:leading-[1.15]">
                        <span class="block">« Quelle est l'aptitude d'une marque</span>
                        <span class="block lg:pl-[0.75em]">à faire parler d'elle&nbsp;?</span>
                        <span class="block lg:pl-[0.75em]">Quelle est sa Guerre des Gaules&nbsp;? »</span>
                    </p>

                    {{-- Desktop : le lecteur juste sous la citation, « Notre métier » posé en haut à droite de l'illustration --}}
                    <div class="mt-12 grid gap-8 sm:grid-cols-[minmax(0,3fr)_minmax(0,2fr)] lg:relative lg:mt-0 lg:ml-[min(1.08vw,15px)] lg:block lg:w-[min(43vw,600px)]">
                        <img src="{{ asset('images/human.png') }}" alt="" class="w-full max-w-[600px] lg:max-w-none">
                        <div class="lg:absolute lg:top-[min(3.42vw,48px)] lg:left-[min(33.5vw,468px)] lg:w-[min(22vw,307px)]">
                            <p class="text-base font-medium tracking-[0.2em] text-scribe-red lg:text-[min(1.1vw,0.95rem)]">NOTRE MÉTIER</p>
                            <h2 class="mt-3 text-3xl font-semibold leading-snug sm:text-4xl lg:mt-2 lg:text-[min(1.95vw,1.7rem)] lg:leading-tight lg:whitespace-nowrap">
                                Faire parler de vous.<br>
                                <em class="font-normal italic">Avec justesse.</em>
                            </h2>
                            <p class="mt-6 text-lg lg:mt-2 lg:text-[min(1.25vw,1.1rem)]">
                                Du storytelling au média training, nous couvrons l'intégralité de la chaîne des relations presse.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Appareil photo + services --}}
        <section id="services" class="diag-rev diag-bg-scribe-green pb-24 px-6 lg:px-12">
            <div class="relative mx-auto grid max-w-[1300px] gap-16 lg:grid-cols-2 lg:gap-20">
                <div class="relative z-20 flex items-start justify-center lg:justify-start">
                    {{-- -mt-[150px] = repli sans JS ; camera.js cale le haut de l'objectif 20 px au-dessus du bord du bandeau.
                         Desktop : taille et position de la maquette (image avec ombre = 64.7vw, décalée de 8.75vw à gauche), plafonnées. --}}
                    <img id="camera" src="{{ asset('images/camera.png') }}" alt="Appareil photo Leica" class="w-full max-w-2xl -mt-[150px] lg:w-[min(64.7vw,903px)] lg:max-w-none lg:shrink-0 lg:-ml-[min(8.75vw,122px)]">
                </div>

                <div class="grid gap-x-10 gap-y-8 self-center sm:grid-flow-col sm:grid-rows-4 sm:grid-cols-2">
                    @foreach ([
                        ['n' => '01', 't' => 'Storytelling & narration de marque', 'd' => "Vous êtes le sujet, nous sommes le verbe : nous racontons votre histoire et présentons votre univers."],
                        ['n' => '02', 't' => 'Communiqués de presse', 'd' => "Un angle, une actualité, une écriture calibrée pour les rédactions et prête à être reprise."],
                        ['n' => '03', 't' => 'Dossiers de presse', 'd' => "Des dossiers complets qui donnent à voir l'actualité comme l'univers entier de nos annonceurs."],
                        ['n' => '04', 't' => 'Veille média connectée', 'd' => "Une veille permanente, reliée aux principales plateformes et sources d'information : la précision d'outils de pointe."],
                        ['n' => '05', 't' => 'Relations médias France & Europe', 'd' => "Trois attachés de presse à temps plein, des relations privilégiées avec les rédactions, sur tous les supports."],
                        ['n' => '06', 't' => 'Gestion & communication de crise', 'd' => "Anticiper, cadrer, répondre : protéger votre image quand tout s'accélère."],
                        ['n' => '07', 't' => 'Média training', 'd' => "Nous coachons et préparons vos porte-parole à répondre aux médias et à peaufiner leur discours pour prendre la parole avec aisance et impact."],
                    ] as $service)
                        <div>
                            <p>
                                <span class="text-2xl font-black text-scribe-green-light">{{ $service['n'] }}</span>
                                <span class="text-sm font-semibold text-white">{{ $service['t'] }}</span>
                            </p>
                            <p class="mt-1 text-sm text-white">{{ $service['d'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- Notre force / intro + chiffres 20+ et 03 --}}
        <section id="force" class="diag diag-bg-scribe-bg diag-pad-8 pb-[148px] px-6 lg:px-12">
            <div class="relative mx-auto max-w-[1300px]">
                <div class="max-w-xl ml-auto">
                    <p class="text-base font-medium tracking-[0.2em] text-scribe-red">NOTRE FORCE</p>
                    <h2 class="mt-3 text-2xl font-semibold leading-snug sm:text-3xl">
                        La proximité d'une équipe à taille humaine.<br>
                        <em class="font-normal italic">La force de frappe d'un grand groupe.</em>
                    </h2>
                    <p class="mt-3 text-base">
                        Une agence à taille humaine, dotée d'outils performants qui lui donnent les résultats d'une grande machine. La rigueur et la portée d'un grand groupe, servies par des femmes et des hommes que vous connaissez par leur prénom.
                    </p>
                </div>

                <div class="mt-1">
                    <div class="flex flex-wrap items-center gap-x-4">
                        <p class="text-[10rem] leading-none font-black text-outline-scribe-green sm:text-[21rem]">20+</p>
                        <p class="font-semibold text-xl sm:-ml-[618px]">années d'expertise<br>en relations presse.</p>
                    </div>
                    <div class="absolute z-10 flex flex-wrap items-center gap-x-4 sm:mt-[calc(150px_*_-1)] sm:ml-[55%]">
                        <p class="text-[10rem] leading-none font-black text-outline-scribe-green sm:text-[21rem]">03</p>
                        <p class="font-semibold text-xl sm:-ml-[130px] sm:-translate-y-[7px]">attachés de presse<br>à temps plein.</p>
                    </div>
                </div>
            </div>
        </section>

        {{-- Notre force / chiffre 360° --}}
        <section class="diag-rev diag-bg-scribe-green diag-pad-4 pb-10 px-6 lg:px-12">
            <div class="mx-auto max-w-[1300px]">
                <div class="flex flex-wrap items-end gap-x-4">
                    <p class="text-[6.5rem] leading-none font-black text-outline-scribe-green-light sm:text-[21rem]">360°</p>
                    <p class="pb-6 text-right font-semibold text-xl text-scribe-green-light sm:-ml-48">tous supports : écrit,<br>audiovisuel, digital, web.</p>
                </div>
            </div>
        </section>

        {{-- Secteurs d'expertise : liste à gauche, deux illustrations épinglées à droite --}}
        <section id="secteurs" class="px-6 py-24 lg:px-12">
            <div class="mx-auto grid max-w-[1300px] gap-16 lg:grid-cols-2">
                <div>
                    <p class="text-base font-medium tracking-[0.2em] text-scribe-red">SECTEURS D'EXPERTISE</p>
                    <h2 class="mt-3 text-3xl font-semibold leading-snug sm:text-4xl">
                        Des univers que nous connaissons.<br>
                        <em class="font-normal italic">De l'intérieur.</em>
                    </h2>
                    <p class="mt-4 max-w-2xl text-lg">
                        Du grand public à l'institutionnel, une expertise transversale doublée d'une vraie pédagogie des sujets techniques, sensibles et scientifiques.
                    </p>

                    <div class="mt-12 max-w-sm space-y-7">
                        @foreach ([
                            ['t' => 'Tourisme & loisirs', 'd' => "Communication presse France d'Europa Park, élu à de nombreuses reprises meilleur parc d'attraction du monde."],
                            ['t' => 'Habitat & équipement de la maison', 'd' => "Donner du désir et du sens aux produits qui font le quotidien de la maison."],
                            ['t' => 'Industrie & institutionnel', 'd' => "Traduire l'innovation et la technicité en récits clairs, crédibles et repris par les médias."],
                            ['t' => 'Institutions & services publics', 'd' => "Villes, communes et mobilier urbain : faire vivre la marque dans l'espace public et les lieux de vie."],
                            ['t' => 'Logistique', 'd' => "Rendre lisibles des métiers d'infrastructure et de flux, souvent invisibles du grand public."],
                            ['t' => 'Sujets d\'expertise & sciences', 'd' => "Vulgariser sans trahir : notre expérience des sujets scientifiques et spécialisés au service de la clarté."],
                        ] as $secteur)
                            <div>
                                <p class="font-semibold">{{ $secteur['t'] }}</p>
                                <p class="text-base">{{ $secteur['d'] }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="flex flex-col items-center gap-[100px] pt-8 lg:items-end lg:self-center lg:pt-0 lg:pr-[min(4.9vw,68px)]">
                    {{-- Feuilles = exports du graphiste sans trombone (__maquettes/elements/1-2.png et 2-2.png).
                         L'ombre portée est ajoutée en CSS (drop-shadow sur la figure : elle suit la forme de la feuille).
                         Trombone animé positionné par rapport à la feuille (centre 94.7 % / 16 % - 100 px, 41.4 % de large). --}}
                    @foreach ([
                        ['img' => 'secteur-conference.png', 'alt' => 'Conférence de presse'],
                        ['img' => 'secteur-dossier.png', 'alt' => 'Dossier de presse'],
                    ] as $visuel)
                        <figure class="secteur-sheet relative w-full max-w-[384px] drop-shadow-[6px_10px_10px_rgba(0,0,0,0.22)] lg:w-[min(28.9vw,403px)] lg:max-w-none">
                            <img src="{{ asset('images/'.$visuel['img']) }}" alt="{{ $visuel['alt'] }}" width="347" height="292" class="block h-auto w-full">
                            {{-- L'enveloppe porte position + centrage + rotation (jamais animée) ; l'image ne porte que l'animation
                                 (glissement dans le repère tourné = le long de l'axe du trombone). Ombre contre-tournée pour tomber
                                 dans le même sens (2px, 3px) que celle des autres trombones. --}}
                            <span class="pointer-events-none absolute top-[16%] left-[94.7%] block w-[41.4%] -translate-x-1/2 -translate-y-1/2 -rotate-[75.5deg]">
                                <img src="{{ asset('images/trombone-mini.png') }}" alt="" width="200" height="200" class="secteur-clip block h-auto w-full drop-shadow-[-2.4px_2.7px_3px_rgba(0,0,0,0.25)]">
                            </span>
                        </figure>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- Références phares --}}
        <section id="references" class="relative bg-scribe-green px-6 pt-20 pb-[calc(var(--diag)+4rem)] lg:px-12">
            <div class="mx-auto max-w-[1300px]">
                <div class="grid gap-10 lg:grid-cols-3">
                    <div>
                        <p class="text-base font-medium tracking-[0.2em] text-scribe-green-light">RÉFÉRENCES PHARES</p>
                        <h2 class="mt-3 text-3xl leading-snug font-semibold text-white">
                            La confiance de marques.<br>
                            <em class="font-normal italic">Qui font référence.</em>
                        </h2>
                    </div>

                    @foreach ([
                        ['secteur' => 'Tourisme & loisirs', 't' => "20 ans aux côtés du meilleur parc du monde.", 'd' => "Nous assurons la communication presse France d'EuropaPark, élu à de nombreuses reprises meilleur parc d'attraction au monde. Deux décennies de relation continue, d'actualités et de campagnes médias."],
                        ['secteur' => 'Institutions & espace public', 't' => "Sineu Graff, le mobilier urbain qui fait la ville.", 'd' => "Client historique de l'agence, présent dans l'espace public et les lieux de vie : un compagnonnage de long terme au service d'une marque devenue référence de son secteur."],
                    ] as $ref)
                        <div>
                            <p class="text-sm font-semibold text-white">{{ $ref['secteur'] }}</p>
                            <p class="mt-1 text-lg leading-snug font-bold text-scribe-green-light">{{ $ref['t'] }}</p>
                            <p class="mt-3 text-base text-white">{{ $ref['d'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- Contact : formulaire posé sur une feuille épinglée (même langage que les portraits et les secteurs).
             Envoi en JS sans rechargement (contact-form.js) ; sans JS, POST classique et retour sur #contact. --}}
        <section id="contact" class="diag diag-bg-scribe-bg pb-16 px-6 lg:px-12">
            <div class="mx-auto grid max-w-[1300px] gap-16 lg:grid-cols-[2fr_3fr] lg:gap-20">
                <div class="lg:pt-10">
                    <p class="text-base font-medium tracking-[0.2em] text-scribe-red">CONTACT</p>
                    <h2 class="mt-3 text-3xl font-semibold leading-snug sm:text-4xl">
                        Parlons de votre actualité.<br>
                        <em class="font-normal italic">Simplement.</em>
                    </h2>
                    <p class="mt-6 max-w-md text-lg">
                        Un lancement, une annonce, une prise de parole délicate : racontez-nous votre projet, l'équipe revient vers vous rapidement.
                    </p>
                    <p class="mt-8 text-sm font-medium tracking-[0.2em] uppercase">Ou appelez-nous</p>
                    <a href="tel:+33388143179" class="mt-1 inline-block text-2xl font-bold hover:text-scribe-red">+33 (0)3 88 14 31 79</a>
                </div>

                <div class="relative">
                    {{-- Feuilles superposées : vert pâle décalé derrière, feuille blanche légèrement inclinée devant --}}
                    <div class="absolute inset-0 translate-x-4 translate-y-4 rotate-2 bg-scribe-sheet" aria-hidden="true"></div>
                    <div class="absolute inset-0 -rotate-1 bg-white shadow-[6px_10px_18px_rgba(0,0,0,0.12)]" aria-hidden="true"></div>
                    <img src="{{ asset('images/trombone-mini.png') }}" alt="" width="200" height="200" class="contact-clip absolute -top-14 -left-10 z-10 w-32 drop-shadow-[2px_3px_3px_rgba(0,0,0,0.25)]">

                    <form id="contact-form" action="{{ route('contact.store') }}" method="POST" novalidate class="relative px-6 py-10 sm:px-12 sm:py-14">
                        @csrf
                        <input type="hidden" name="form_time" value="{{ \Illuminate\Support\Facades\Crypt::encryptString((string) now()->timestamp) }}">
                        {{-- Champ piège anti-spam : invisible pour les humains, rempli par les robots --}}
                        <div class="absolute -left-[9999px] h-px w-px overflow-hidden" aria-hidden="true">
                            <label for="site_web">Ne pas remplir</label>
                            <input type="text" id="site_web" name="site_web" tabindex="-1" autocomplete="off">
                        </div>

                        <div id="contact-status" role="status" aria-live="polite" tabindex="-1" @class([
                            'mb-8 border-l-4 px-4 py-3 text-base focus:outline-none',
                            'hidden' => ! session('contact_status') && ! session('contact_error'),
                            'border-scribe-red text-scribe-red' => session('contact_error'),
                            'border-scribe-green bg-scribe-band/40' => ! session('contact_error'),
                        ])>{{ session('contact_status') ?? session('contact_error') }}</div>

                        <div class="contact-fields grid gap-x-10 gap-y-8 sm:grid-cols-2">
                            @foreach ([
                                ['name' => 'nom', 'label' => 'Nom', 'type' => 'text', 'required' => true, 'autocomplete' => 'name'],
                                ['name' => 'email', 'label' => 'E-mail', 'type' => 'email', 'required' => true, 'autocomplete' => 'email'],
                                ['name' => 'telephone', 'label' => 'Téléphone', 'type' => 'tel', 'required' => false, 'autocomplete' => 'tel'],
                                ['name' => 'societe', 'label' => 'Société', 'type' => 'text', 'required' => false, 'autocomplete' => 'organization'],
                            ] as $champ)
                                <div>
                                    <label for="{{ $champ['name'] }}" class="block text-xs font-medium tracking-[0.2em] uppercase">{{ $champ['label'] }}@if ($champ['required']) <span class="text-scribe-red">*</span>@endif</label>
                                    <input type="{{ $champ['type'] }}" id="{{ $champ['name'] }}" name="{{ $champ['name'] }}" value="{{ old($champ['name']) }}" autocomplete="{{ $champ['autocomplete'] }}" @if ($champ['required']) required @endif
                                        aria-describedby="{{ $champ['name'] }}-error"
                                        class="mt-2 w-full border-0 border-b-2 border-scribe-green/25 bg-transparent px-0 py-2 text-base font-normal text-scribe-green transition focus:border-scribe-green focus:outline-none aria-[invalid=true]:border-scribe-red">
                                    <p id="{{ $champ['name'] }}-error" class="mt-1 text-sm text-scribe-red" data-error-for="{{ $champ['name'] }}">@error($champ['name']){{ $message }}@enderror</p>
                                </div>
                            @endforeach

                            <div class="sm:col-span-2">
                                <label for="message" class="block text-xs font-medium tracking-[0.2em] uppercase">Votre message <span class="text-scribe-red">*</span></label>
                                <textarea id="message" name="message" rows="5" required aria-describedby="message-error"
                                    class="mt-2 w-full resize-y border-0 border-b-2 border-scribe-green/25 bg-transparent px-0 py-2 text-base font-normal text-scribe-green transition focus:border-scribe-green focus:outline-none aria-[invalid=true]:border-scribe-red">{{ old('message') }}</textarea>
                                <p id="message-error" class="mt-1 text-sm text-scribe-red" data-error-for="message">@error('message'){{ $message }}@enderror</p>
                            </div>
                        </div>

                        <div class="contact-actions mt-10 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                            <p class="max-w-xs text-xs text-scribe-green/70">Les informations saisies servent uniquement à répondre à votre demande.</p>
                            <button type="submit" class="group inline-flex cursor-pointer items-center justify-center gap-3 bg-scribe-green px-8 py-4 text-sm font-semibold tracking-[0.2em] text-white uppercase transition hover:bg-scribe-red disabled:cursor-wait disabled:opacity-60">
                                <span data-label>Envoyer</span>
                                <svg class="h-4 w-4 transition group-hover:translate-x-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14"/><path d="m13 6 6 6-6 6"/></svg>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        {{-- Footer --}}
        <footer id="coordonnees" class="px-6 pt-8 pb-16 text-center lg:px-12">
            <img src="{{ asset('images/logo-footer.png') }}" alt="Scribe — Relations presse & publics" class="mx-auto h-36 w-auto">
            <p class="mt-8 text-2xl font-normal text-black">1 place Broglie · 67000 Strasbourg</p>
            <a href="tel:+33388143179" class="mt-3 block text-3xl font-bold text-black sm:text-4xl">+33 (0)3 88 14 31 79</a>
        </footer>

    </body>
</html>
