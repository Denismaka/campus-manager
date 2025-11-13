<?php require_once 'functions/register.func.php'; ?>
<?php require_once 'layouts/header.php'; ?>

<section class="grid gap-10 lg:grid-cols-2 items-start">
    <div class="card border border-slate-800/70 bg-slate-900/60 shadow-xl">
        <div class="card-body">
            <h1 class="card-title text-3xl font-semibold text-brand-200">
                <i class="fa-solid fa-user-pen mr-3"></i> Créer un compte
            </h1>
            <p class="text-sm text-slate-400">Rejoignez la plateforme pour gérer les étudiants et accéder aux fonctionnalités avancées.</p>

            <?php if (!empty($message)): ?>
                <div class="alert alert-error mt-6 border border-rose-500/40 bg-rose-500/10 text-rose-200">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                    <span><?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?></span>
                </div>
            <?php endif; ?>

            <form action="" method="post" class="mt-8 grid gap-6">
                <div class="grid gap-2">
                    <label class="text-sm font-medium text-slate-300" for="nom_user">Nom</label>
                    <input class="input input-bordered bg-slate-950/60" type="text" name="nom_user" id="nom_user" placeholder="Ex: Maka" required>
                </div>
                <div class="grid gap-2">
                    <label class="text-sm font-medium text-slate-300" for="prenom_user">Prénom</label>
                    <input class="input input-bordered bg-slate-950/60" type="text" name="prenom_user" id="prenom_user" placeholder="Ex: Denis" required>
                </div>
                <div class="grid gap-2">
                    <label class="text-sm font-medium text-slate-300" for="email_user">Adresse email</label>
                    <input class="input input-bordered bg-slate-950/60" type="email" name="email_user" id="email_user" placeholder="exemple@mail.com" required>
                </div>
                <div class="grid gap-2">
                    <label class="text-sm font-medium text-slate-300" for="motpass_user">Mot de passe</label>
                    <input class="input input-bordered bg-slate-950/60" type="password" name="motpass_user" id="motpass_user" placeholder="••••••••" required>
                </div>
                <div class="grid gap-2">
                    <label class="text-sm font-medium text-slate-300" for="motpass_repeat">Confirmer le mot de passe</label>
                    <input class="input input-bordered bg-slate-950/60" type="password" name="motpass_repeat" id="motpass_repeat" placeholder="••••••••" required>
                </div>
                <button type="submit" class="btn btn-primary bg-brand-600 border-brand-600 hover:bg-brand-500">
                    <i class="fa-solid fa-user-plus mr-2"></i> S'inscrire
                </button>
            </form>

            <p class="mt-6 text-sm text-slate-400">
                Déjà membre ?
                <a class="text-brand-200 hover:text-brand-100 font-medium" href="login.php">Se connecter</a>
            </p>
        </div>
    </div>

    <aside class="space-y-6">
        <div class="rounded-3xl border border-brand-600/40 bg-brand-600/10 p-8">
            <h2 class="text-xl font-semibold text-brand-100">Avantages compte</h2>
            <ul class="mt-4 space-y-2 text-sm text-brand-50/80">
                <li><i class="fa-solid fa-check mr-2"></i>Gestion complète des étudiants</li>
                <li><i class="fa-solid fa-check mr-2"></i>Sécurité renforcée</li>
                <li><i class="fa-solid fa-check mr-2"></i>Interface moderne</li>
            </ul>
        </div>
        <div class="rounded-3xl border border-slate-800/60 bg-slate-900/60 p-8 text-sm text-slate-400">
            <h2 class="text-lg font-semibold text-slate-200 flex items-center gap-2">
                <i class="fa-solid fa-circle-info"></i> Informations
            </h2>
            <p class="mt-2">En créant un compte, vous acceptez notre charte d'utilisation et la politique de confidentialité du projet.</p>
        </div>
    </aside>
</section>

<?php require_once 'layouts/footer.php'; ?>