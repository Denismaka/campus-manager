<?php require_once 'functions/update.func.php'; ?>
<?php require_once 'layouts/header.php'; ?>

<section class="grid gap-10 lg:grid-cols-[2fr_1fr]">
    <div class="card border border-slate-800/70 bg-slate-900/60 shadow-xl">
        <div class="card-body">
            <h1 class="card-title text-3xl font-semibold text-brand-200">
                <i class="fa-solid fa-pen-to-square mr-3"></i> Modifier l'étudiant
            </h1>
            <p class="text-sm text-slate-400">Mettez à jour les informations de l'étudiant sélectionné.</p>

            <?php if (!empty($message)): ?>
                <div class="alert alert-error mt-6 border border-rose-500/40 bg-rose-500/10 text-rose-200">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                    <span><?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?></span>
                </div>
            <?php endif; ?>

            <form action="" method="post" class="mt-8 grid gap-6">
                <div class="grid gap-2">
                    <label class="text-sm font-medium text-slate-300" for="nom_etudiant">Nom</label>
                    <input class="input input-bordered bg-slate-950/60" type="text" name="nom_etudiant" id="nom_etudiant" value="<?= htmlspecialchars($student['nom_etudiant'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
                </div>

                <div class="grid gap-2">
                    <label class="text-sm font-medium text-slate-300" for="prenom_etudiant">Prénom</label>
                    <input class="input input-bordered bg-slate-950/60" type="text" name="prenom_etudiant" id="prenom_etudiant" value="<?= htmlspecialchars($student['prenom_etudiant'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
                </div>

                <div class="grid gap-2">
                    <label class="text-sm font-medium text-slate-300" for="matricule_etudiant">Matricule</label>
                    <input class="input input-bordered bg-slate-950/60" type="text" name="matricule_etudiant" id="matricule_etudiant" value="<?= htmlspecialchars($student['matricule_etudiant'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
                </div>

                <div class="grid gap-2">
                    <label class="text-sm font-medium text-slate-300" for="date_naissance">Date de naissance</label>
                    <input class="input input-bordered bg-slate-950/60" type="date" name="date_naissance" id="date_naissance" value="<?= htmlspecialchars($student['date_naissance_etudiant'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required>
                </div>

                <div class="grid gap-2">
                    <label class="text-sm font-medium text-slate-300" for="id_promotion">Promotion</label>
                    <select class="select select-bordered bg-slate-950/60" name="id_promotion" id="id_promotion" required>
                        <option value="" disabled selected>Choisir une promotion</option>
                        <?php foreach ($promotions as $promotion): ?>
                            <option value="<?= (int) $promotion['id_promotion']; ?>" <?= ((int) ($student['id_promotion'] ?? 0) === (int) $promotion['id_promotion']) ? 'selected' : ''; ?>>
                                <?= htmlspecialchars($promotion['nom_promotion'], ENT_QUOTES, 'UTF-8'); ?> — <?= htmlspecialchars($promotion['departement'] ?? 'Département inconnu', ENT_QUOTES, 'UTF-8'); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="flex flex-wrap items-center gap-4">
                    <button type="submit" class="btn btn-primary bg-brand-600 border-brand-600 hover:bg-brand-500">
                        <i class="fa-solid fa-floppy-disk mr-2"></i> Sauvegarder
                    </button>
                    <a href="readSingle.php?id_etudiant=<?= (int) $student['id_etudiant']; ?>" class="btn btn-ghost border border-slate-700 text-slate-200 hover:text-brand-200">
                        <i class="fa-solid fa-eye mr-2"></i> Voir le profil
                    </a>
                </div>
            </form>
        </div>
    </div>

    <aside class="card border border-slate-800/70 bg-slate-900/60 shadow-lg">
        <div class="card-body">
            <h2 class="card-title text-xl text-slate-100">
                <i class="fa-solid fa-circle-info mr-2"></i> Astuce
            </h2>
            <p class="text-sm text-slate-400">Toutes les modifications sont journalisées et peuvent être revues dans la base de données.</p>
            <ul class="mt-6 space-y-3 text-sm text-slate-300">
                <li><i class="fa-solid fa-check mr-2 text-emerald-300"></i>Requêtes préparées</li>
                <li><i class="fa-solid fa-check mr-2 text-emerald-300"></i>Validation côté serveur</li>
                <li><i class="fa-solid fa-check mr-2 text-emerald-300"></i>Interface responsive</li>
            </ul>
        </div>
    </aside>
</section>

<?php require_once 'layouts/footer.php'; ?>