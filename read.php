<?php require_once 'functions/read.func.php'; ?>
<?php require_once 'layouts/header.php'; ?>

<section class="space-y-8">
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-3xl font-semibold text-brand-200">Liste des étudiants</h1>
            <p class="text-sm text-slate-400">Gérez et consultez l'ensemble des profils enregistrés.</p>
        </div>
        <div class="flex gap-3">
            <a href="create.php" class="btn bg-brand-600 border-brand-600 hover:bg-brand-500 text-white">
                <i class="fa-solid fa-plus mr-2"></i> Nouvel étudiant
            </a>
            <span class="badge badge-outline border-brand-400/60 text-brand-100 text-sm">Total : <?= number_format($studentCount, 0, ',', ' '); ?></span>
        </div>
    </div>

    <div class="overflow-hidden rounded-2xl border border-slate-800/70 bg-slate-900/60">
        <div class="overflow-x-auto">
            <table class="table table-zebra border-slate-800/40 text-slate-200">
                <thead class="text-xs uppercase tracking-[0.3em] text-slate-400">
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Promotion</th>
                        <th>Faculté</th>
                        <th>Département</th>
                        <th>Date de naissance</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($students)): ?>
                        <tr>
                            <td colspan="7" class="py-10 text-center text-sm text-slate-400">
                                <i class="fa-regular fa-face-meh-blank mr-2"></i>Aucun étudiant enregistré pour le moment.
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($students as $student): ?>
                            <tr>
                                <td class="font-medium text-slate-100"><?= htmlspecialchars($student['nom_etudiant'], ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?= htmlspecialchars($student['prenom_etudiant'], ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?= htmlspecialchars($student['nom_promotion'] ?? 'N/A', ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?= htmlspecialchars($student['faculte'] ?? 'N/A', ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?= htmlspecialchars($student['departement'] ?? 'N/A', ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?= htmlspecialchars($student['date_naissance_etudiant'], ENT_QUOTES, 'UTF-8'); ?></td>
                                <td class="text-right">
                                    <div class="flex justify-end gap-2">
                                        <a class="btn btn-sm btn-ghost text-slate-200 hover:text-brand-200" href="readSingle.php?id_etudiant=<?= (int) $student['id_etudiant']; ?>">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                        <?php if (isset($_SESSION['id_role']) && (int) $_SESSION['id_role'] === 1): ?>
                                            <a class="btn btn-sm btn-ghost text-amber-200 hover:text-amber-100" href="update.php?id_etudiant=<?= (int) $student['id_etudiant']; ?>">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                            <a class="btn btn-sm btn-ghost text-rose-300 hover:text-rose-200" href="delete.php?id_etudiant=<?= (int) $student['id_etudiant']; ?>" onclick="return confirm('Confirmer la suppression de cet étudiant ?');">
                                                <i class="fa-solid fa-trash"></i>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<?php require_once 'layouts/footer.php'; ?>