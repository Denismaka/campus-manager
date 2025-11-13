<?php require_once 'functions/login.func.php'; ?>
<?php require_once 'layouts/header.php'; ?>

<section class="grid gap-10 lg:grid-cols-2 items-center">
    <div class="space-y-6">
        <h1 class="text-4xl font-semibold text-brand-200">Connexion</h1>
        <p class="text-slate-400">Retrouvez votre espace de gestion en vous connectant avec vos identifiants.</p>
        <div class="rounded-2xl border border-slate-800/70 bg-slate-900/50 p-6">
            <h2 class="text-lg font-medium text-slate-200">Pourquoi créer un compte ?</h2>
            <ul class="mt-4 space-y-2 text-sm text-slate-400">
                <li><i class="fa-solid fa-circle-check mr-2 text-emerald-300"></i>Accès aux fonctionnalités CRUD</li>
                <li><i class="fa-solid fa-circle-check mr-2 text-emerald-300"></i>Suivi des étudiants en temps réel</li>
                <li><i class="fa-solid fa-circle-check mr-2 text-emerald-300"></i>Interface moderne et responsive</li>
            </ul>
        </div>
    </div>

    <div class="card border border-slate-800/70 bg-slate-900/60 shadow-xl">
        <div class="card-body">
            <h2 class="card-title text-2xl font-semibold text-slate-100">
                <i class="fa-solid fa-arrow-right-to-bracket mr-3"></i> Se connecter
            </h2>

            <?php if (!empty($message)): ?>
                <div class="alert alert-error mt-6 border border-rose-500/40 bg-rose-500/10 text-rose-200">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                    <span><?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?></span>
                </div>
            <?php endif; ?>

            <form action="" method="post" class="mt-8 grid gap-6">
                <div class="grid gap-2">
                    <label class="text-sm font-medium text-slate-300" for="email_user">Adresse email</label>
                    <input class="input input-bordered bg-slate-950/60" type="email" name="email_user" id="email_user" placeholder="exemple@mail.com" required>
                </div>
                <div class="grid gap-2">
                    <label class="text-sm font-medium text-slate-300" for="motpass_user">Mot de passe</label>
                    <input class="input input-bordered bg-slate-950/60" type="password" name="motpass_user" id="motpass_user" placeholder="••••••••" required>
                </div>
                <button type="submit" class="btn btn-primary bg-brand-600 border-brand-600 hover:bg-brand-500">
                    <i class="fa-solid fa-right-to-bracket mr-2"></i> Connexion
                </button>
            </form>

            <p class="mt-6 text-sm text-slate-400">
                Pas encore de compte ?
                <a class="text-brand-200 hover:text-brand-100 font-medium" href="register.php">Créer un compte</a>
            </p>
        </div>
    </div>
</section>

<?php require_once 'layouts/footer.php'; ?>