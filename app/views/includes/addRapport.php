<?php require APPROOT . '/views/includes/header.php'; ?>
<?php foreach ($data['consult'] as $id => $Consultation) : ?>

    <section class="module-page-title">
        <div class=" container">
            <div class="row-page-title">
                <div class="page-title-secondary">
                    <h5 class="h5 text-center"><?= $data['patient']->nomPatient ?> &nbsp; <?= $data['patient']->prenomPatient ?></h5>
                </div>
            </div>
        </div>
    </section>
    <main>
        <div class="message">
            <div class="centered">
                <h1>RAPPORT DES CONSULTATIONS</h1>

            </div>
        </div>
        <div class="centered">
            <div class="document-editor">
                <div class="toolbar-container"></div>

                <div class="content-container">
                    <p>je soussigne Dr <?= $Consultation->nomMedecin . " " . $Consultation->prenomMedecin ?> avoir consulter le patient:<?= $Consultation->nomPatient . " " . $Consultation->prenomPatient ?> le: <?= $Consultation->dateRdv ?></p>

                    <div id="editor">

                    </div>
                </div>
            </div>


        </div>
    </main>

    </div>
    </div>
    </div>
    <script src="<?= URLROOT ?>/Rapport/ckeditor.js"></script>

    <script>
        DecoupledEditor
            .create(document.querySelector('#editor'), {
                // toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
            })
            .then(editor => {
                const toolbarContainer = document.querySelector('main .toolbar-container');

                toolbarContainer.prepend(editor.ui.view.toolbar.element);

                window.editor = editor;
            })
            .catch(err => {
                console.error(err.stack);
            });
    </script>
<?php endforeach; ?>
<?php require APPROOT . '/views/includes/footer.php'; ?>