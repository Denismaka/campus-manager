<?php require_once 'functions/create.func.php'; ?>
<?php require_once 'layouts/header.php'; ?>

<section class="grid gap-10 lg:grid-cols-[2fr_1fr]">
    <div class="card border border-slate-800/70 bg-slate-900/60 shadow-xl">
        <div class="card-body">
            <h1 class="card-title text-3xl font-semibold text-brand-200">
                <i class="fa-solid fa-user-plus mr-3"></i> Ajouter un étudiant
            </h1>
            <p class="text-sm text-slate-400">Complétez les informations ci-dessous pour enregistrer un nouvel étudiant dans la plateforme.</p>

            <?php if (!empty($message)): ?>
                <div class="alert alert-warning mt-6 border border-amber-400/40 bg-amber-400/10 text-amber-200">
                    <i class="fa-solid fa-circle-info"></i>
                    <span><?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?></span>
                </div>
            <?php endif; ?>

            <form action="" method="post" class="mt-8 grid gap-6">
                <div class="grid gap-2">
                    <label class="text-sm font-medium text-slate-300" for="nom_etudiant">Nom</label>
                    <input class="input input-bordered input-primary bg-slate-950/60" type="text" name="nom_etudiant" id="nom_etudiant" placeholder="Ex: Kasa" value="<?= htmlspecialchars($formData['nom'], ENT_QUOTES, 'UTF-8'); ?>" required>
                </div>

                <div class="grid gap-2">
                    <label class="text-sm font-medium text-slate-300" for="prenom_etudiant">Prénom</label>
                    <input class="input input-bordered input-primary bg-slate-950/60" type="text" name="prenom_etudiant" id="prenom_etudiant" placeholder="Ex: Aline" value="<?= htmlspecialchars($formData['prenom'], ENT_QUOTES, 'UTF-8'); ?>" required>
                </div>

                <div class="grid gap-2">
                    <label class="text-sm font-medium text-slate-300" for="matricule_etudiant">Matricule</label>
                    <input class="input input-bordered bg-slate-950/60" type="text" name="matricule_etudiant" id="matricule_etudiant" placeholder="Ex: 2025-IG-001" value="<?= htmlspecialchars($formData['matricule'], ENT_QUOTES, 'UTF-8'); ?>" required>
                </div>

                <div class="grid gap-2">
                    <label class="text-sm font-medium text-slate-300" for="date_naissance">Date de naissance</label>
                    <input class="input input-bordered bg-slate-950/60" type="date" name="date_naissance" id="date_naissance" value="<?= htmlspecialchars($formData['date_naissance'], ENT_QUOTES, 'UTF-8'); ?>" required>
                </div>

                <div class="grid gap-2">
                    <label class="text-sm font-medium text-slate-300" for="id_promotion">Promotion</label>
                    <select class="select select-bordered bg-slate-950/60" name="id_promotion" id="id_promotion" required>
                        <option value="" disabled <?= $formData['id_promotion'] ? '' : 'selected'; ?>>Sélectionner une promotion</option>
                        <?php foreach ($promotions as $promotion): ?>
                            <option value="<?= (int) $promotion['id_promotion']; ?>" <?= ((int) $formData['id_promotion'] === (int) $promotion['id_promotion']) ? 'selected' : ''; ?>>
                                <?= htmlspecialchars($promotion['nom_promotion'], ENT_QUOTES, 'UTF-8'); ?> — <?= htmlspecialchars($promotion['departement'] ?? 'Département inconnu', ENT_QUOTES, 'UTF-8'); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="flex flex-wrap items-center gap-4">
                    <button type="submit" class="btn btn-primary bg-brand-600 border-brand-600 hover:bg-brand-500">
                        <i class="fa-solid fa-floppy-disk mr-2"></i> Enregistrer
                    </button>
                    <a href="read.php" class="btn btn-ghost border border-slate-700 text-slate-200 hover:text-brand-200">
                        <i class="fa-solid fa-list mr-2"></i> Voir la liste
                    </a>
                </div>
            </form>
        </div>
    </div>

    <aside class="card border border-brand-600/40 bg-brand-600/10 shadow-lg">
        <div class="card-body">
            <h2 class="card-title text-xl text-brand-100">
                <i class="fa-solid fa-chart-simple mr-2"></i> Statistiques
            </h2>
            <p class="text-sm text-brand-50/80">Nombre total d'étudiants enregistrés</p>
            <p class="mt-6 text-5xl font-semibold text-white">
                <?= number_format($studentCount, 0, ',', ' '); ?>
            </p>
            <p class="text-xs uppercase tracking-[0.3em] text-brand-100/60 mt-3">Étudiants actifs</p>
            <div class="mt-8 space-y-3 text-sm text-brand-50/80">
                <p><i class="fa-solid fa-shield-halved mr-2"></i>Données sécurisées</p>
                <p><i class="fa-solid fa-bolt mr-2"></i>Enregistrement instantané</p>
                <p><i class="fa-solid fa-wand-magic-sparkles mr-2"></i>Interface inspirante</p>
            </div>
        </div>
    </aside>
</section>

<?php require_once 'layouts/footer.php'; ?>