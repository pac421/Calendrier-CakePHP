<div id="calendars-index-page">
    <div class="row" style="width: 95%">
        <div class="col-3" id="calendars-index-left-col">
            <form method="post" id="form-add-event">
                <h6 class="text-white"><i class="fas fa-calendar-plus mr-2"></i>Créer un nouvel événement</h6>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-sm" placeholder="Titre" aria-label="Titre" aria-describedby="btn-add-event" id="title-add-event">
                    <div class="input-group-append">
                        <button class="btn btn-sm btn-primary" type="submit">Ajouter</button>
                    </div>
                </div>
            </form>
            <div id='draggable-container' style="margin-top: 50px">
                <h6 class="text-white"><i class="fas fa-list-alt mr-2"></i>Liste des événements à placer</h6>
                <div id="draggable-items-container" style="overflow-y: auto; max-height: 415px"></div>
            </div>
        </div>
        <div class="col-9">
            <div id="calendar"></div>
        </div>
    </div>
</div>
<input id="csrfToken" type="hidden" value="<?= $this->request->getAttribute('csrfToken') ?>">

<?= $this->Html->script('/js/calendars_index.js') ?>
