<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div id="error_message"></div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title" id="panel-title">Current Deck: <strong><span id="deck-number">Deck 1</span></strong></h3>
                </div>
                <div class="panel-body">
                    <div class="col-lg-3 col-md-3 col-sm-4">
                        <div class="list-group">
                            <div class="list-group-item disabled">
                                <strong>Cards</strong>
                            </div>
                            <div id="cards-list">
                                <?php foreach ($cards as $card): ?>
                                    <div class="list-group-item"><?= $card['card_name'] ?></div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title text-center"><strong>Strength</strong></h3>
                            </div>
                            <div class="panel-body">
                                <div class="card text-center">
                                    <span class="points" id="strength"><?=$strength; ?><span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title text-center"><strong>Defence</strong></h3>
                            </div>
                            <div class="panel-body">
                                <div class="card text-center">
                                    <span class="points" id="defence"><?=$defence; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-4 col-sm-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><strong>Skills</strong></h3>
                            </div>
                            <div class="panel-body">
                                <div class="card" id="skills">
                                    <?php foreach ($cards as $crd): ?>
                                        <?php if ($crd['skills']): ?>
                                            <strong>+ <?= $crd['skills']; ?></strong><br/>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title" id="panel-title"><strong>Deck Selection</strong></h3>
                </div>
                <div class="panel-body">
                    <form action="" method="post" onsubmit="deck_switch(); return false;">
                        <div class="col-lg-8">
                            <select class="form-control" name="deck">
                                <?php foreach ($decks as $deck): ?>
                                    <option value="<?= $deck['deck_id']; ?>"><?= $deck['deck_number']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-lg-4">
                            <button type="submit" class="btn btn-md btn-success">Change Deck</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <p class="pull-right">Page rendered in {exec_time}s using {mem_usage}mb of memory.</p>
        <p>
            <a href="http://fuelphp.com">FuelPHP</a> is released under the MIT license.<br />
            <small>Version: <?php echo Fuel::VERSION; ?></small>
        </p>
    </footer>
</div>