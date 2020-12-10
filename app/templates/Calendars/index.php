<div id="calendars-index-page">
    <div class="row" style="width: 95%">
        <div class="col-3" id="calendars-index-left-col">
            <form>
                <h6>Créer un événement</h6>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-sm" placeholder="Titre" aria-label="Titre" aria-describedby="btn-add-event">
                    <div class="input-group-append">
                        <button class="btn btn-sm btn-primary" type="button" id="btn-add-event">Ajouter</button>
                    </div>
                </div>
            </form>
            <div id='draggable-container' style="margin-top: 50px">
                <h6>Événements à placer</h6>
                <?php foreach ($calendars as $calendar){
                    if($calendar['start'] === null){ ?>
                        <div class='fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event' style="margin-bottom: 5px">
                            <div class='fc-event-main'><?= $calendar['title'] ?></div>
                        </div>
                    <?php }
                } ?>
            </div>
        </div>
        <div class="col-9">
            <div id="calendar"></div>
        </div>
    </div>
</div>

<?= $this->Html->script('/js/calendars_index.js') ?>
