<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Scribe — Relations presse & publics à Strasbourg</title>
        <meta name="description" content="Scribe, agence de relations presse et publics à Strasbourg. Storytelling, communiqués, dossiers de presse, veille média, relations médias France & Europe, gestion de crise, média training.">

        @fonts

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            .diag { clip-path: polygon(0 4vw, 100% 0, 100% 100%, 0 100%); }
            .diag-rev { clip-path: polygon(0 0, 100% 4vw, 100% 100%, 0 100%); }
        </style>
    </head>
    <body class="bg-scribe-cream font-sans font-light text-stone-800 antialiased">

        {{-- Nav --}}
        <header class="absolute inset-x-0 top-0 z-50 px-6 pt-6 lg:px-12">
            <a href="#accueil" class="inline-block">
                <img src="{{ asset('images/logo-top.png') }}" alt="Scribe — Relations presse & publics" class="w-[150px]">
            </a>
            <button id="menu-toggle" type="button" aria-expanded="false" aria-controls="menu-panel" class="-ml-6 mt-[116px] flex h-20 w-20 cursor-pointer flex-col items-start justify-center gap-2 bg-white p-5 sm:h-24 sm:w-24 lg:-ml-12" aria-label="Ouvrir le menu">
                <span class="h-1 w-7 bg-stone-900"></span>
                <span class="h-1 w-14 bg-stone-900"></span>
                <span class="ml-7 h-1 w-7 bg-stone-900"></span>
            </button>
        </header>

        {{-- Mobile / anchor menu overlay --}}
        <nav id="menu-panel" class="hidden fixed inset-0 z-[60] flex-col items-center justify-center gap-2 bg-stone-900/98 text-center">
            <button id="menu-close" type="button" class="absolute right-6 top-6 p-2 text-scribe-ink" aria-label="Fermer le menu">
                <span class="block h-0.5 w-7 rotate-45 bg-current"></span>
                <span class="-mt-0.5 block h-0.5 w-7 -rotate-45 bg-current"></span>
            </button>
            <a href="#agence" class="px-6 py-3 font-serif text-2xl font-medium text-scribe-ink hover:text-scribe-blue">L'agence</a>
            <a href="#equipe" class="px-6 py-3 font-serif text-2xl font-medium text-scribe-ink hover:text-scribe-blue">L'équipe</a>
            <a href="#metier" class="px-6 py-3 font-serif text-2xl font-medium text-scribe-ink hover:text-scribe-blue">Notre métier</a>
            <a href="#secteurs" class="px-6 py-3 font-serif text-2xl font-medium text-scribe-ink hover:text-scribe-blue">Secteurs</a>
            <a href="#contact" class="px-6 py-3 font-serif text-2xl font-medium text-scribe-ink hover:text-scribe-blue">Contact</a>
        </nav>

        {{-- Hero --}}
        <section id="accueil" class="relative flex min-h-screen items-center bg-[radial-gradient(ellipse_at_top,_#3a3733_0%,_#1c1a18_55%,_#100f0e_100%)] px-6 pt-32 pb-24 lg:px-12">
            <div class="mx-auto w-full max-w-[1300px]">
                <h1 class="max-w-3xl font-serif text-4xl font-bold leading-tight text-scribe-ink sm:text-5xl lg:text-6xl">
                    Vous êtes le sujet,<br>
                    nous sommes <em class="font-light text-scribe-blue italic">le verbe</em>.
                </h1>
            </div>

            <img src="{{ asset('images/trombone.png') }}" alt="Écrire l'indicible." class="pointer-events-none absolute left-1/2 -bottom-20 z-20 w-48 -translate-x-1/2 sm:-bottom-28 sm:w-64 lg:-bottom-36 lg:w-80">
        </section>

        {{-- Un écosystème global --}}
        <section id="agence" class="diag relative -mt-[4vw] bg-scribe-beige pt-[calc(4vw+5rem)] pb-31 px-6 lg:px-12">
            <div class="mx-auto max-w-[1300px]">
                <div class="grid items-center gap-8 md:grid-cols-2 md:gap-16">
                    <div>
                        <p class="text-base font-semibold tracking-[0.2em] text-scribe-slate">UN ÉCOSYSTÈME GLOBAL</p>
                        <h2 class="mt-3 font-serif font-semibold text-3xl leading-snug text-scribe-brown sm:text-4xl">
                            Une agence RP.<br>
                            <em class="italic font-light text-scribe-brown">Au cœur d'une agence globale.</em>
                        </h2>
                        <p class="mt-4 max-w-xl text-lg text-scribe-brown">
                            SCRIBE se suffit à elle-même comme agence de relations presse pure. Mais elle s'appuie sur un écosystème complet, à la pointe de la technologie, capable de gérer l'image entière de ses annonceurs.
                        </p>
                    </div>

                    <div class="flex flex-col items-end text-right">
                        <img src="{{ asset('images/logo-scribe-2.png') }}" alt="Scribe — Relations presse & publics" class="h-32 w-auto opacity-90 sm:h-40">
                        <p class="mt-6 text-xs font-semibold tracking-[0.2em] text-scribe-brown uppercase">Relations presse & publics</p>
                        <p class="mt-2 max-w-md text-base text-scribe-brown">Storytelling, communiqué et dossiers de presse, veille média, gestion de crise.</p>
                    </div>
                </div>
            </div>
        </section>

        {{-- Diagonal statement banner --}}
        <section class="diag-rev relative -mt-[4vw] bg-scribe-cream pt-[calc(4vw+4rem)] pb-20 px-6 lg:px-12">
            <div class="mx-auto max-w-[1300px]">
                <p class="max-w-4xl font-sans text-3xl font-bold leading-tight text-stone-950 sm:text-4xl lg:text-5xl">
                    <span class="-rotate-[1.5deg] inline-block">De la plaquette au site web, du</span><br>
                    <span class="ml-8 block rotate-[1deg] text-scribe-slate-muted sm:ml-8">communiqué à la campagne :</span>
                    <span class="ml-8 block rotate-[2deg] sm:ml-12">un seul interlocuteur pour toute</span>
                    <span class="ml-4 block -rotate-[1deg] text-scribe-slate-muted sm:ml-6">votre communication.</span>
                </p>
            </div>
        </section>

        {{-- L'humain d'abord --}}
        <section class="diag relative -mt-[3vw] bg-scribe-beige pt-[calc(3vw+5rem)] pb-30 px-6 lg:px-12">
            <div class="mx-auto grid max-w-[1300px] gap-8 md:grid-cols-2 md:gap-16">
                <div>
                    <p class="text-base font-semibold tracking-[0.2em] text-scribe-slate">L'HUMAIN D'ABORD</p>
                    <h2 class="mt-3 font-serif font-semibold text-3xl leading-snug text-scribe-brown sm:text-4xl">
                        Au-delà des médias, <em class="italic font-light text-scribe-brown">l'humain.</em>
                    </h2>
                </div>
                <div class="flex items-center">
                    <p class="text-lg text-scribe-brown">
                        Dans un monde où l'intelligence artificielle et le digital déshumanisent, travailler avec une agence de relations presse, c'est choisir l'humain et les rapports réels. Au-delà de la visibilité qu'elles procurent, les RP restent d'abord une affaire de confiance et de liens.
                    </p>
                </div>
            </div>
        </section>

        {{-- Équipe --}}
        <section id="equipe" class="diag-rev relative -mt-[4vw] bg-white pt-[calc(4vw+5rem)] pb-24 px-6 lg:px-12">
            <div class="mx-auto max-w-[1300px]">
                <h2 class="font-serif text-3xl font-semibold text-scribe-brown sm:text-4xl">Parlons-en, humainement.</h2>
                <p class="mt-2 text-base font-semibold tracking-[0.2em] text-scribe-slate">L'ÉQUIPE</p>

                <div class="mt-16 grid gap-16 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ([
                        ['name' => 'Marie Koenig', 'role' => 'Attachée de presse', 'email' => 'mkoenig@scribe-rp.eu', 'phone' => '+33 (0)7 63 58 87 33', 'photo' => 'marie.png'],
                        ['name' => 'Camille Massotte', 'role' => 'Consultante RP & public', 'email' => 'cmassotte@scribe-rp.eu', 'phone' => '+33 (0)6 99 80 03 84', 'photo' => 'camille.png'],
                        ['name' => 'Nathalie Jaeger', 'role' => 'Attachée de presse', 'email' => 'njaeger@scribe-rp.eu', 'phone' => null, 'photo' => 'nathalie.png'],
                    ] as $member)
                        <div>
                            <div class="relative aspect-square w-full max-w-xs">
                                <div class="absolute inset-0 -translate-y-[40px] -rotate-3 bg-scribe-cream"></div>
                                <img src="{{ asset('images/'.$member['photo']) }}" alt="{{ $member['name'] }}" class="absolute top-1/2 left-1/2 w-[112%] max-w-none -rotate-2 translate-x-[calc(-50%_-_40px)] translate-y-[calc(-50%_-_30px)]">
                                <img src="{{ asset('images/trombone-mini.png') }}" alt="" class="absolute -top-16 -left-12 w-36">
                            </div>
                            <p class="mt-6 font-serif text-2xl font-bold text-scribe-brown">{{ $member['name'] }}</p>
                            <p class="mt-1 text-xs font-semibold tracking-wider text-scribe-brown uppercase">{{ $member['role'] }}</p>
                            <p class="mt-2 text-base text-scribe-slate">{{ $member['email'] }}</p>
                            @if ($member['phone'])
                                <p class="text-base font-semibold text-stone-800">{{ $member['phone'] }}</p>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- Notre conviction + Notre métier --}}
        <section class="diag relative -mt-[4vw] bg-scribe-cream pt-[calc(4vw+5rem)] pb-25 px-6 lg:px-12">
            <div class="mx-auto grid max-w-[1300px] gap-16 lg:grid-cols-[30%_70%] lg:gap-20">
                <div class="text-center">
                    <p class="text-base font-semibold tracking-[0.2em] text-scribe-slate">NOTRE CONVICTION</p>
                    <h2 class="mt-3 font-serif font-semibold text-3xl leading-snug text-scribe-brown sm:text-4xl">
                        Exister à la troisième personne.<br>
                        <em class="italic font-light text-scribe-brown">Celle dont on parle.</em>
                    </h2>
                    <p class="mx-auto mt-6 max-w-sm text-lg text-scribe-brown">
                        Les relations presse amplifient la capacité d'une entreprise, d'une marque ou d'un produit à exister à la troisième personne. Car la première personne, l'expression de l'ego, n'a pas cours dans les médias. Une actualité, une innovation, un geste : les RP se nourrissent de faits. À la télévision, dans la presse, sur le web, la qualité d'une marque n'existe vraiment que lorsqu'elle est reconnue, énoncée par un tiers. À l'ère du quart d'heure de gloire, l'essentiel n'est pas seulement ce que journalistes, influenceurs et blogueurs disent d'une marque : c'est qu'ils jugent bon d'en parler, et de lui transférer le lien de confiance qu'ils nouent avec leur public.
                    </p>
                </div>

                <div id="metier">
                    <p class="font-serif text-2xl leading-snug font-bold text-stone-950 sm:text-3xl">
                        « Quelle est l'aptitude d'une marque à faire parler d'elle&nbsp;?<br>
                        Quelle est sa Guerre des Gaules&nbsp;? »
                    </p>

                    <div class="mt-12 grid gap-8 sm:grid-cols-[600px_1fr]">
                        <img src="{{ asset('images/human.png') }}" alt="" class="w-[600px] max-w-full">
                        <div>
                            <p class="text-base font-semibold tracking-[0.2em] text-scribe-slate">NOTRE MÉTIER</p>
                            <h2 class="mt-3 font-serif font-semibold text-3xl leading-snug text-scribe-brown sm:text-4xl">
                                Faire parler de vous.<br>
                                <em class="italic font-light text-scribe-brown">Avec justesse.</em>
                            </h2>
                            <p class="mt-6 text-lg text-scribe-brown">
                                Du storytelling au média training, nous couvrons l'intégralité de la chaîne des relations presse.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Camera + services list --}}
        <section class="relative -mt-[4vw] pt-[calc(4vw+5rem)] pb-24 px-6 lg:px-12">
            <div class="diag-rev absolute inset-0 bg-scribe-beige"></div>
            <div class="relative mx-auto grid max-w-[1300px] gap-16 lg:grid-cols-2 lg:gap-20">
                <div class="relative z-20 flex items-start justify-center">
                    <img src="{{ asset('images/camera.png') }}" alt="Appareil photo Leica" class="w-full max-w-2xl lg:-ml-40 -mt-[150px]">
                </div>

                <div class="grid grid-flow-col grid-rows-4 gap-x-10 gap-y-8 sm:grid-cols-2">
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
                                <span class="text-3xl font-black text-white">{{ $service['n'] }}</span>
                                <span class="text-sm font-bold text-scribe-brown">{{ $service['t'] }}</span>
                            </p>
                            <p class="mt-1 text-sm text-scribe-brown">{{ $service['d'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- Notre force / chiffres
        <section class="relative -mt-[3vw] pt-[calc(3vw+5rem)] pb-24 px-6 lg:px-12">
            <div class="diag absolute inset-0 bg-scribe-cream"></div>
            <div class="diag-rev absolute inset-x-0 top-[48%] bottom-0 bg-scribe-beige"></div>
            <div class="relative mx-auto max-w-[1300px]">
                <div class="max-w-xl ml-auto">
                    <p class="text-base font-semibold tracking-[0.2em] text-scribe-slate">NOTRE FORCE</p>
                    <h2 class="mt-3 font-serif font-semibold text-2xl leading-snug text-scribe-brown sm:text-3xl">
                        La proximité d'une équipe à taille humaine.<br>
                        <em class="italic font-light text-scribe-brown">La force de frappe d'un grand groupe.</em>
                    </h2>
                    <p class="mt-3 text-base text-scribe-brown">
                        Une agence à taille humaine, dotée d'outils performants qui lui donnent les résultats d'une grande machine. La rigueur et la portée d'un grand groupe, servies par des femmes et des hommes que vous connaissez par leur prénom.
                    </p>
                </div>

                <div class="mt-8">
                    <div class="flex flex-wrap items-end gap-x-4">
                        <p class="font-serif text-[10rem] leading-none font-black text-stone-900/25 sm:text-[14rem]">20+</p>
                        <p class="mb-6 font-semibold text-stone-800 sm:-ml-16">années d'expertise<br>en relations presse.</p>
                    </div>
                    <div class="flex flex-wrap items-end gap-x-4 sm:-mt-24 sm:ml-[45%]">
                        <p class="font-serif text-[10rem] leading-none font-black text-stone-900/25 sm:text-[14rem]">03</p>
                        <p class="mb-6 font-semibold text-stone-800">attachés de presse<br>à temps plein.</p>
                    </div>
                    <div class="mt-4 flex flex-wrap items-end gap-x-4">
                        <p class="font-serif text-[10rem] leading-none font-black text-stone-900/25 sm:text-[14rem]">360°</p>
                        <p class="mb-6 font-semibold text-stone-800 sm:-ml-24">tous supports : écrit,<br>audiovisuel, digital, web.</p>
                    </div>
                </div>
            </div>
        </section> --}}

        {{-- Notre force / intro + chiffres 20+ et 03 --}}
        <section class="relative -mt-[4vw] pt-[calc(4vw+2rem)] pb-32 px-6 lg:px-12">
            <div class="diag absolute inset-0 bg-scribe-cream"></div>
            <div class="relative mx-auto max-w-[1300px]">
                <div class="max-w-xl ml-auto">
                    <p class="text-base font-semibold tracking-[0.2em] text-scribe-slate">NOTRE FORCE</p>
                    <h2 class="mt-3 font-serif font-semibold text-2xl leading-snug text-scribe-brown sm:text-3xl">
                        La proximité d'une équipe à taille humaine.<br>
                        <em class="italic font-light text-scribe-brown">La force de frappe d'un grand groupe.</em>
                    </h2>
                    <p class="mt-3 text-base text-scribe-brown">
                        Une agence à taille humaine, dotée d'outils performants qui lui donnent les résultats d'une grande machine. La rigueur et la portée d'un grand groupe, servies par des femmes et des hommes que vous connaissez par leur prénom.
                    </p>
                </div>

                <div class="mt-1">
                    <div class="flex flex-wrap items-center gap-x-4">
                        <p class="font-serif text-[10rem] leading-none font-black text-[#e9ded1] sm:text-[21rem]">20+</p>
                        <p class="font-semibold text-[#978e86] sm:-ml-100">années d'expertise<br>en relations presse.</p>
                    </div>
                    <div class="absolute flex flex-wrap items-center gap-x-4 sm:mt-[calc(150px_*_-1)] sm:ml-[55%]">
                        <p class="font-serif text-[10rem] leading-none font-black text-[#e9ded1] sm:text-[21rem]">03</p>
                        <p class="font-semibold text-[#978e86] sm:-ml-20">attachés de presse<br>à temps plein.</p>
                    </div>
                </div>
            </div>
        </section>

        {{-- Notre force / chiffre 360° --}}
        <section class="diag-rev relative -mt-[3vw] bg-scribe-beige pt-[calc(3vw+1rem)] pb-10 px-6 lg:px-12">
            <div class="mx-auto max-w-[1300px]">
                <div class="flex flex-wrap items-center gap-x-4">
                    <p class="font-serif text-[10rem] leading-none font-black text-[#f4ecdf] sm:text-[21rem]">360°</p>
                    <p class="font-semibold text-[#978e86] sm:-ml-32">tous supports : écrit,<br>audiovisuel, digital, web.</p>
                </div>
            </div>
        </section>

        {{-- Secteurs d'expertise --}}
        <section id="secteurs" class="bg-scribe-cream px-6 py-24 lg:px-12">
            <div class="mx-auto max-w-[1300px]">
                <p class="text-base font-semibold tracking-[0.2em] text-scribe-slate">SECTEURS D'EXPERTISE</p>
                <h2 class="mt-3 font-serif font-semibold text-3xl leading-snug text-scribe-brown sm:text-4xl">
                    Des univers que nous connaissons.<br>
                    <em class="italic font-light text-scribe-brown">De l'intérieur.</em>
                </h2>
                <p class="mt-6 max-w-2xl text-lg text-scribe-brown">
                    Du grand public à l'institutionnel, une expertise transversale doublée d'une vraie pédagogie des sujets techniques, sensibles et scientifiques.
                </p>

                <div class="mt-16 grid gap-12 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ([
                        ['t' => 'Tourisme & loisirs', 'd' => "Communication presse France d'EuropaPark, élu à de nombreuses reprises meilleur parc d'attraction du monde."],
                        ['t' => 'Industrie & institutionnel', 'd' => "Traduire l'innovation et la technicité en récits clairs, crédibles et repris par les médias."],
                        ['t' => 'Logistique', 'd' => "Rendre lisibles des métiers d'infrastructure et de flux, souvent invisibles du grand public."],
                        ['t' => 'Habitat & équipement de la maison', 'd' => "Donner du désir et du sens aux produits qui font le quotidien de la maison."],
                        ['t' => 'Institutions & services publics', 'd' => "Villes, communes et mobilier urbain : faire vivre la marque dans l'espace public et les lieux de vie."],
                        ['t' => 'Sujets d\'expertise & sciences', 'd' => "Vulgariser sans trahir : notre expérience des sujets scientifiques et spécialisés au service de la clarté."],
                    ] as $secteur)
                        <div>
                            <p class="font-semibold text-scribe-brown">{{ $secteur['t'] }}</p>
                            <p class="mt-2 text-base text-scribe-brown">{{ $secteur['d'] }}</p>
                            <div class="relative mt-8 flex h-32 max-w-52 -rotate-2 items-center justify-center bg-white p-2 shadow-md">
                                <img src="{{ asset('images/trombone-mini.png') }}" alt="" class="absolute -top-4 -left-4 w-12">
                                <span class="font-serif text-2xl text-scribe-brown/70">visuel</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- Références phares --}}
        <section class="diag relative -mt-[3vw] bg-scribe-beige pt-[calc(3vw+5rem)] pb-24 px-6 lg:px-12">
            <div class="mx-auto max-w-[1300px]">
                <div class="grid gap-10 lg:grid-cols-3">
                    <div>
                        <p class="text-base font-semibold tracking-[0.2em] text-scribe-slate">RÉFÉRENCES PHARES</p>
                        <h2 class="mt-3 font-serif text-3xl leading-snug font-semibold text-scribe-brown">
                            La confiance de marques.<br>
                            <em class="italic font-light text-scribe-brown">Qui font référence.</em>
                        </h2>
                    </div>

                    @foreach ([
                        ['secteur' => 'Tourisme & loisirs', 't' => "20 ans aux côtés du meilleur parc du monde.", 'd' => "Nous assurons la communication presse France d'EuropaPark, élu à de nombreuses reprises meilleur parc d'attraction au monde. Deux décennies de relation continue, d'actualités et de campagnes médias."],
                        ['secteur' => 'Institutions & espace public', 't' => "Sineu Graff, le mobilier urbain qui fait la ville.", 'd' => "Client historique de l'agence, présent dans l'espace public et les lieux de vie : un compagnonnage de long terme au service d'une marque devenue référence de son secteur."],
                    ] as $ref)
                        <div>
                            <p class="text-xs font-semibold tracking-wider text-scribe-brown uppercase">{{ $ref['secteur'] }}</p>
                            <p class="mt-1 font-semibold text-scribe-brown">{{ $ref['t'] }}</p>
                            <p class="mt-3 text-base text-scribe-brown">{{ $ref['d'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- Footer --}}
        <footer id="contact" class="diag relative -mt-[4vw] bg-scribe-cream px-6 pt-[calc(4vw+4rem)] pb-16 text-center lg:px-12">
            <img src="{{ asset('images/logo-scribe-2.png') }}" alt="Scribe — Relations presse & publics" class="mx-auto h-28 w-auto opacity-90">
            <p class="mt-8 text-lg text-scribe-brown">1 place Broglie · 67000 Strasbourg</p>
            <a href="tel:+33388143179" class="mt-2 block text-2xl font-bold text-stone-950">+33 (0)3 88 14 31 79</a>
        </footer>

    </body>
</html>
