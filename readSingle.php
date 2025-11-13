<?php require_once 'functions/viewSingle.func.php'; ?>
<?php require_once 'layouts/header.php'; ?>

<section class="grid gap-10 lg:grid-cols-[1.5fr_1fr] items-start">
    <div class="card border border-slate-800/70 bg-slate-900/60 shadow-xl">
        <div class="card-body">
            <div class="flex flex-col gap-6 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <h1 class="text-3xl font-semibold text-brand-200 flex items-center gap-3">
                        <i class="fa-solid fa-id-card"></i> Profil étudiant
                    </h1>
                    <p class="text-sm text-slate-400">Résumé détaillé du parcours académique.</p>
                </div>
                <a href="read.php" class="btn btn-ghost border border-slate-700 text-slate-200 hover:text-brand-200">
                    <i class="fa-solid fa-arrow-left mr-2"></i> Retour à la liste
                </a>
            </div>

            <div class="mt-10 grid gap-8">
                <div class="flex items-center gap-6">
                    <div class="avatar">
                        <div class="w-28 rounded-full border border-brand-500/60 bg-brand-500/10">
                            <img src="assets/images/dmk.jpg" alt="Avatar étudiant">
                        </div>
                    </div>
                    <div>
                        <h2 class="text-2xl font-semibold text-slate-100">
                            <?= htmlspecialchars($etudiant['nom_etudiant'] . ' ' . $etudiant['prenom_etudiant'], ENT_QUOTES, 'UTF-8'); ?>
                        </h2>
                        <p class="text-sm text-slate-400">Matricule • <?= htmlspecialchars($etudiant['matricule_etudiant'] ?? 'N/A', ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                </div>

                <dl class="grid gap-6 sm:grid-cols-2">
                    <div class="rounded-2xl bg-slate-950/60 border border-slate-800/60 p-6">
                        <dt class="text-xs uppercase tracking-[0.3em] text-slate-400">Date de naissance</dt>
                        <dd class="mt-2 text-lg font-medium text-slate-100">
                            <?= htmlspecialchars($etudiant['date_naissance_etudiant'], ENT_QUOTES, 'UTF-8'); ?>
                        </dd>
                    </div>
                    <div class="rounded-2xl bg-slate-950/60 border border-slate-800/60 p-6">
                        <dt class="text-xs uppercase tracking-[0.3em] text-slate-400">Promotion</dt>
                        <dd class="mt-2 text-lg font-medium text-slate-100">
                            <?= htmlspecialchars($etudiant['nom_promotion'] ?? 'N/A', ENT_QUOTES, 'UTF-8'); ?>
                        </dd>
                    </div>
                    <div class="rounded-2xl bg-slate-950/60 border border-slate-800/60 p-6">
                        <dt class="text-xs uppercase tracking-[0.3em] text-slate-400">Faculté</dt>
                        <dd class="mt-2 text-lg font-medium text-slate-100">
                            <?= htmlspecialchars($etudiant['faculte'] ?? 'N/A', ENT_QUOTES, 'UTF-8'); ?>
                        </dd>
                    </div>
                    <div class="rounded-2xl bg-slate-950/60 border border-slate-800/60 p-6">
                        <dt class="text-xs uppercase tracking-[0.3em] text-slate-400">Département</dt>
                        <dd class="mt-2 text-lg font-medium text-slate-100">
                            <?= htmlspecialchars($etudiant['departement'] ?? 'N/A', ENT_QUOTES, 'UTF-8'); ?>
                        </dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>

    <aside class="card border border-brand-600/40 bg-brand-600/10 shadow-lg">
        <div class="card-body">
            <h2 class="card-title text-xl text-brand-100">Actions rapides</h2>
            <p class="text-sm text-brand-50/80">Gérez ce profil en quelques clics.</p>
            <div class="mt-6 space-y-3">
                <a href="update.php?id_etudiant=<?= (int) $etudiant['id_etudiant']; ?>" class="btn btn-block bg-brand-500 border-brand-500 hover:bg-brand-400 text-white">
                    <i class="fa-solid fa-pen-to-square mr-2"></i> Modifier le profil
                </a>
                <?php if (isset($_SESSION['id_role']) && (int) $_SESSION['id_role'] === 1): ?>
                    <a href="delete.php?id_etudiant=<?= (int) $etudiant['id_etudiant']; ?>" class="btn btn-block bg-rose-500 border-rose-500 hover:bg-rose-400 text-white" onclick="return confirm('Confirmer la suppression de cet étudiant ?');">
                        <i class="fa-solid fa-trash mr-2"></i> Supprimer le profil
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </aside>
</section>

<?php require_once 'layouts/footer.php'; ?>