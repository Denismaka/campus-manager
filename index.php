<?php require_once 'layouts/header.php'; ?>

<section class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-brand-900 via-slate-900 to-slate-950 shadow-2xl shadow-brand-900/40">
    <div class="absolute inset-0 opacity-20 bg-[radial-gradient(circle_at_top,_#ffffff22,_transparent_50%)]"></div>
    <div class="relative px-8 py-16 sm:px-16">
        <div class="max-w-4xl">
            <span class="inline-flex items-center gap-2 rounded-full border border-brand-500/50 bg-brand-500/10 px-4 py-1 text-xs font-medium uppercase tracking-[0.3em] text-brand-200">
                <i class="fa-solid fa-bolt"></i> Nouveau design
            </span>
            <h1 class="mt-6 text-4xl sm:text-6xl font-bold leading-tight">
                Pilotez vos étudiants avec <span class="text-brand-300">élégance</span> et simplicité.
            </h1>
            <p class="mt-6 text-lg text-slate-300 sm:max-w-2xl">
                Campus Manager est une démonstration de CRUD en PHP pur, modernisé avec Tailwind CSS, DaisyUI et une sécurité renforcée. Créez, suivez et présentez vos étudiants dans une interface soignée.
            </p>
            <div class="mt-10 flex flex-wrap gap-4">
                <a href="read.php" class="btn btn-lg bg-brand-600 border-brand-600 hover:bg-brand-500 hover:border-brand-500 text-white">
                    <i class="fa-solid fa-users-line mr-2"></i> Voir les étudiants
                </a>
                <a href="create.php" class="btn btn-lg btn-ghost border border-slate-700 text-slate-200 hover:text-brand-200">
                    <i class="fa-solid fa-plus mr-2"></i> Ajouter un profil
                </a>
            </div>
        </div>
        <div class="mt-16 grid gap-6 sm:grid-cols-3">
            <div class="card bg-slate-900/40 border border-slate-800/60">
                <div class="card-body">
                    <span class="badge badge-outline border-brand-400/40 text-brand-200">Design</span>
                    <h3 class="card-title text-xl">Tailwind & DaisyUI</h3>
                    <p class="text-sm text-slate-400">Palette soignée, composants responsives et icônes FontAwesome pour un rendu professionnel.</p>
                </div>
            </div>
            <div class="card bg-slate-900/40 border border-slate-800/60">
                <div class="card-body">
                    <span class="badge badge-outline border-emerald-400/40 text-emerald-200">Sécurité</span>
                    <h3 class="card-title text-xl">Requêtes sécurisées</h3>
                    <p class="text-sm text-slate-400">Requêtes préparées, sessions protégées, hachage moderne `password_hash`.</p>
                </div>
            </div>
            <div class="card bg-slate-900/40 border border-slate-800/60">
                <div class="card-body">
                    <span class="badge badge-outline border-sky-400/40 text-sky-200">Structure</span>
                    <h3 class="card-title text-xl">Code rationalisé</h3>
                    <p class="text-sm text-slate-400">Fonctions centralisées, gestion des messages flash et navigation claire.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="mt-16 rounded-3xl border border-slate-800/60 bg-slate-900/40 p-8">
    <div class="flex flex-col gap-6 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h2 class="text-2xl font-semibold text-brand-200">© <?= date('Y'); ?> Campus Manager</h2>
            <p class="mt-2 text-sm text-slate-400">Créé par Denis Maka pour explorer un CRUD PHP moderne.</p>
        </div>
        <div class="flex flex-wrap gap-3 text-sm text-slate-300">
            <span class="inline-flex items-center gap-2 rounded-full bg-slate-800/70 px-3 py-1">
                <i class="fa-solid fa-shield-halved"></i> Sécurisé
            </span>
            <span class="inline-flex items-center gap-2 rounded-full bg-slate-800/70 px-3 py-1">
                <i class="fa-solid fa-wand-magic-sparkles"></i> Stylé
            </span>
            <span class="inline-flex items-center gap-2 rounded-full bg-slate-800/70 px-3 py-1">
                <i class="fa-solid fa-code"></i> PHP pur
            </span>
        </div>
    </div>
</section>

<?php require_once 'layouts/footer.php'; ?>