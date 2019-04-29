<section class="promo">
    <h2 class="promo__title">Нужен стафф для катки?</h2>
    <p class="promo__text">На нашем интернет-аукционе ты найдёшь самое эксклюзивное сноубордическое и горнолыжное снаряжение.</p>
    <ul class="promo__list">
        <?php foreach ($categories as $key => $category): ?>
            <li class="promo__item promo__item--<?=$key;?>">
                <a class="promo__link" href="pages/all-lots.html"><?=$category;?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</section>
<section class="lots">
    <div class="lots__header">
        <h2>Открытые лоты</h2>
    </div>
    <ul class="lots__list">
        <?php foreach($lots as $key => $value): ?>
            <li class="lots__item lot">
                <div class="lot__image">
                    <img src="<?=htmlspecialchars($value['url_img']);?>" width="350" height="260" alt="">
                </div>
                <div class="lot__info">
                    <span class="lot__category"></span><span><?=htmlspecialchars($value['category'])?></span>
                    <h3 class="lot__title"><a class="text-link" href="pages/lot.html"><?=htmlspecialchars($value['name']);?></a></h3>
                    <div class="lot__state">
                        <div class="lot__rate">
                            <span class="lot__amount">Стартовая цена</span>
                            <span class="lot__cost"><?=formatting_number($value['price']);?></span>
                        </div>
                    <?php if($dt > 3600):?>
                        <div class="lot__timer timer">
                            <?=date('H:i', $dt);?>
                        </div>
                    <?php else:?>
                        <div class="lot__timer timer timer--finishing">
                            <?=date('H:i', $dt);?>
                        </div>
                    <?php endif;?>
                    </div>
                </div>
            </li>
        <?php endforeach;?>
    </ul>
</section>
