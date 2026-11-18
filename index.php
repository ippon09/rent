<?php
include('path.php');

// Путь к картинке с кодированием имени файла (в именах есть пробелы и скобки)
function img_url($path)
{
    return implode('/', array_map('rawurlencode', explode('/', $path)));
}

// Каталог: карточка на главной + все фото категории для модального окна «Подробнее»
$catalog = [
    [
        'title' => 'Памятники резные',
        'text' => 'Художественная резьба по граниту любой сложности',
        'cover' => 'images/granite_carved/granit_carved1.jpg',
        'photos' => [
            ['images/granite_carved/granit_samples.jpg', 'Образцы резных памятников', ''],
            ['images/granite_carved/granit_carved1.jpg', 'Резной памятник из гранита', ''],
            ['images/granite_carved/granit_carved2.jpg', 'Резной памятник из гранита', ''],
            ['images/granite_carved/granit_carved3.jpg', 'Резной памятник из гранита', ''],
            ['images/granite_carved/granit_carved4.jpg', 'Резной памятник из гранита', ''],
            ['images/granite_carved/granit_carved5.jpg', 'Резной памятник из гранита', ''],
        ],
    ],
    [
        'title' => 'Памятники фигурные',
        'text' => 'Оригинальные формы по индивидуальным эскизам',
        'cover' => 'images/granite_figure/granit_figured1.jpg',
        'photos' => [
            ['images/granite_figure/granit_figured1.jpg', 'Фигурный памятник из гранита', ''],
            ['images/granite_figure/granit_figured3.jpg', 'Фигурный памятник из гранита', ''],
            ['images/granite_figure/granit_figured4.jpg', 'Фигурный памятник из гранита', ''],
            ['images/granite_figure/granit_figured5.jpg', 'Фигурный памятник из гранита', ''],
            ['images/granite_figure/granit_figured6.jpg', 'Фигурный памятник из гранита', ''],
            ['images/granite_figure/granit_figured7.jpg', 'Фигурный памятник из гранита', ''],
            ['images/granite_figure/granit_figured8.jpg', 'Фигурный памятник из гранита', ''],
            ['images/granite_figure/granit_figured9.jpg', 'Фигурный памятник из гранита', ''],
            ['images/granite_figure/granit_figured10.jpg', 'Фигурный памятник из гранита', ''],
        ],
    ],
    [
        'title' => 'Ограды',
        'text' => 'Кованые и сварные ограды любой сложности',
        'cover' => 'images/fences/lotos.jpg',
        'photos' => [
            ['images/fences/kosichka.jpg', 'Ограда «Косичка»', 'Косичка'],
            ['images/fences/krest.jpg', 'Ограда «Крест»', 'Крест'],
            ['images/fences/lotos.jpg', 'Ограда «Лотос»', 'Лотос'],
            ['images/fences/muza.jpg', 'Ограда «Муза»', 'Муза'],
        ],
    ],
    [
        'title' => 'Мемориальные плиты',
        'text' => 'Плиты из гранита для установки на могилу',
        'cover' => 'images/signs/3.jpg',
        'photos' => [
            ['images/signs/3.jpg', 'Мемориальная плита из гранита', ''],
            ['images/signs/1.jpg', 'Мемориальная плита из гранита', ''],
            ['images/signs/2.jpg', 'Мемориальная плита из гранита', ''],
            ['images/signs/sign_4.jpg', 'Мемориальная плита из гранита', ''],
            ['images/signs/sign_5.jpg', 'Мемориальная плита из гранита', ''],
        ],
    ],
    [
        'title' => 'Кресты',
        'text' => 'Кресты для установки на могилу',
        'cover' => 'images/crosses/cross_usual.jpg',
        'photos' => [
            ['images/crosses/cross_usual.jpg', 'Крест на могилу', ''],
            ['images/crosses/cross_hammer.jpg', 'Крест на могилу', ''],
        ],
    ],
];

// «Наши работы»: сетка с фильтрами. Первые 10 видны сразу, остальные — по кнопке «Смотреть ещё»
$workFilters = [
    'all' => 'Все',
    'complex' => 'Комплексы',
    'fence' => 'Ограды',
    'plate' => 'Плиты',
    'monument' => 'Памятники',
];
$works = [
    ['images/monuments/111.jpg', 'complex', 'Памятник с кованой оградой и плиткой'],
    ['images/monuments/2026-03-28 02.39.32.jpg', 'plate', 'Памятник из мрамора с цветником и плиткой'],
    ['images/monuments/0328.jpg', 'complex', 'Памятник с кованой оградой и плиткой'],
    ['images/monuments/2026-03-28 02.38.49.jpg', 'fence', 'Кованая ограда на два места'],
    ['images/monuments/2026-03-28 02.37.39.jpg', 'plate', 'Горизонтальный памятник с цветником и плиткой'],
    ['images/monuments/33.jpg', 'complex', 'Горизонтальный памятник с оградой и плиткой'],
    ['images/monuments/1.jpg', 'monument', 'Памятник с портретом и гравировкой'],
    ['images/monuments/2026-03-28 02.38.57.jpg', 'plate', 'Горизонтальный памятник с вазой и плиткой'],
    ['images/monuments/1111.jpg', 'complex', 'Памятник с кованой оградой и плиткой'],
    ['images/monuments/88.jpg', 'fence', 'Кованая ограда'],
    ['images/monuments/0328(2).jpg', 'complex', 'Памятник с кованой оградой и плиткой'],
    ['images/monuments/2026-03-28 02.37.43.jpg', 'plate', 'Горизонтальный памятник с плиткой'],
    ['images/monuments/333.jpg', 'complex', 'Горизонтальный памятник с оградой и плиткой'],
    ['images/monuments/2026-03-28 02.39.11.jpg', 'plate', 'Памятники с цветниками и плиткой'],
    ['images/monuments/2026-03-28 02.37.03.jpg', 'fence', 'Памятник с кованой оградой'],
    ['images/monuments/2026-03-28 02.38.46.jpg', 'plate', 'Горизонтальный памятник с цветником'],
    ['images/monuments/4.jpg', 'monument', 'Гравировка на памятнике'],
    ['images/monuments/2026-03-28 02.39.25.jpg', 'monument', 'Памятники с портретами'],
    ['images/monuments/2026-03-28 02.37.08.jpg', 'monument', 'Памятник с портретом перед установкой'],
];
$worksVisible = 10;

// «Все наши работы»: бегущие ленты из всех фото папки images/monuments (новые фото попадут сюда автоматически)
$allWorksSkip = ['2table_back.jpg', '2026-03-28 02.39.01.jpg', '2026-03-28 02.39.07.jpg']; // фон и дубли
$allWorks = [];
foreach (scandir(__DIR__ . '/images/monuments') as $file) {
    if (preg_match('/\.(jpe?g|png|webp)$/i', $file) && !in_array($file, $allWorksSkip, true)) {
        $allWorks[] = 'images/monuments/' . $file;
    }
}
natsort($allWorks);
$allWorks = array_values($allWorks);
$marqueeRows = [[], [], []];
foreach ($allWorks as $i => $src) {
    $marqueeRows[$i % 3][] = $i;
}
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/favicon-96x96.png" sizes="96x96" type="image/png">
    <link rel="icon" href="favicon.ico" sizes="any">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700&family=PT+Serif:wght@400;700&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css" />
    <link rel="stylesheet" href="style.css">
    <meta property="og:type" content="website">
    <meta property="og:locale" content="ru_RU">
    <meta property="og:title" content="Ритуал 08 — изготовление памятников, Малые Дербеты">
    <meta property="og:description" content="Памятники, ограды, мемориальные плиты и кресты. Изготовление и установка по Калмыкии.">
    <meta property="og:url" content="https://xn--08-6kc5aq1api.xn--p1ai/">
    <meta property="og:image" content="https://xn--08-6kc5aq1api.xn--p1ai/images/monuments/111.jpg">
    <title>Ритуал 08 — памятники и ритуальные услуги, Малые Дербеты</title>
    <meta name="description" content="Ритуал 08 — ритуальные услуги и товары в с. Малые Дербеты: изготовление и установка памятников, оград, плит и крестов. Круглосуточно: 8-927-59-59-070.">
    <link rel="canonical" href="https://xn--08-6kc5aq1api.xn--p1ai/">
    <script type="application/ld+json">
        {
            "@context":"https://schema.org",
            "@type":"LocalBusiness",
            "name":"Ритуал 08",
            "description":"Ритуальные услуги - изготовление и установка памятников, оград, мемориальных плит, крестов. Продажа ритуальных принадлежностей(гробы, венки, вазы, цветы, полотенца)",
            "url": "https://xn--08-6kc5aq1api.xn--p1ai/",
            "telephone": "+79275959070",
            "image": "https://xn--08-6kc5aq1api.xn--p1ai/images/monuments/111.jpg",
            "address":{
                "@type": "PostalAddress",
                "addressLocality": "с. Малые Дербеты",
                "addressRegion": "Республика Калмыкия",
                "addressCountry": "RU"
            },
            "areaServed": "Республика Калмыкия",
            "openingHours": "Mo-Su 00:00-23:59"
        }
    </script>
</head>
<body>
<header class="header">
    <?php
    include("app/include/header.php");
    ?>
</header>

<main>

    <!-- Первый экран -->
    <section class="hero" id="top">
        <div class="container hero__inner">
            <div class="hero__main">
                <p class="hero__eyebrow">С 1994 года сохраняем память о близких</p>
                <h1 class="hero__title">Изготавливаем памятники и&nbsp;мемориальные комплексы с&nbsp;1994&nbsp;года</h1>
                <p class="hero__lead">Индивидуальный подход, качественные материалы и профессиональная установка под ключ.</p>
                <div class="hero__actions">
                    <a class="cta cta--gold" href="#calc" data-info="calc">
                        Рассчитать стоимость
                        <svg class="icon" aria-hidden="true"><use href="icons/sprite.svg#calculator"></use></svg>
                    </a>
                    <a class="cta cta--ghost" href="#catalog" data-info="catalog">
                        Посмотреть каталог
                        <svg class="icon" aria-hidden="true"><use href="icons/sprite.svg#arrow-right"></use></svg>
                    </a>
                </div>
            </div>

            <ul class="hero__facts">
                <li class="hero-fact">
                    <img class="hero-fact__icon" src="icons/shield-icon.png" alt="" width="48" height="48">
                    <p class="hero-fact__text"><strong>30+</strong> лет опыта работы</p>
                </li>
                <li class="hero-fact">
                    <img class="hero-fact__icon" src="icons/monument-icon.png" alt="" width="48" height="48">
                    <p class="hero-fact__text"><strong>1000+</strong> выполненных работ</p>
                </li>
                <li class="hero-fact">
                    <img class="hero-fact__icon" src="icons/reward-icon.png" alt="" width="48" height="48">
                    <p class="hero-fact__text"><strong>Бесплатный</strong> эскиз и расчёт стоимости</p>
                </li>
            </ul>
        </div>
    </section>

    <!-- Каталог -->
    <section class="catalog" id="catalog" aria-labelledby="catalogTitle">
        <div class="container">
            <div class="section-head">
                <div>
                    <p class="eyebrow">Каталог</p>
                    <h2 class="section-title section-title--rule" id="catalogTitle">Изделия из гранита и металла</h2>
                </div>
            </div>

            <ul class="catalog__grid">
                <?php foreach ($catalog as $item): ?>
                <li class="catalog-card">
                    <div class="catalog-card__media">
                        <img src="<?php echo img_url($item['cover']); ?>" alt="<?php echo htmlspecialchars($item['title']); ?>" loading="lazy">
                    </div>
                    <div class="catalog-card__body">
                        <h3 class="catalog-card__title"><?php echo $item['title']; ?></h3>
                        <p class="catalog-card__text"><?php echo $item['text']; ?></p>
                        <button class="catalog-card__more" type="button" data-gallery-title="<?php echo htmlspecialchars($item['title']); ?>">
                            Подробнее
                            <svg class="icon" aria-hidden="true"><use href="icons/sprite.svg#arrow-right"></use></svg>
                        </button>
                        <template class="catalog-card__photos">
                            <?php foreach ($item['photos'] as $photo): ?>
                            <img src="<?php echo img_url($photo[0]); ?>" alt="<?php echo htmlspecialchars($photo[1]); ?>" data-caption="<?php echo htmlspecialchars($photo[2]); ?>">
                            <?php endforeach; ?>
                        </template>
                    </div>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </section>

    <!-- Калькулятор + О компании + Этапы -->
    <section class="details">
        <div class="container details__grid">

            <form class="calc" id="calc" aria-labelledby="calcTitle" novalidate>
                <p class="eyebrow eyebrow--light">Рассчитайте стоимость</p>
                <h2 class="calc__title" id="calcTitle">Узнайте стоимость памятника</h2>
                <p class="calc__lead">Выберите параметры — мастер рассчитает цену и ответит в Max или по телефону.</p>

                <fieldset class="calc__group">
                    <legend class="calc__legend">1. Тип памятника</legend>
                    <div class="calc__options">
                        <label class="calc-option"><input type="radio" name="type" value="Вертикальный памятник" checked><span>Вертикальный</span></label>
                        <label class="calc-option"><input type="radio" name="type" value="Горизонтальный памятник"><span>Горизонтальный</span></label>
                        <label class="calc-option"><input type="radio" name="type" value="Мемориальный комплекс"><span>Комплекс</span></label>
                    </div>
                </fieldset>

                <fieldset class="calc__group">
                    <legend class="calc__legend">2. Материал</legend>
                    <div class="calc__options">
                        <label class="calc-option"><input type="radio" name="material" value="гранит" checked><span>Гранит</span></label>
                        <label class="calc-option"><input type="radio" name="material" value="мрамор"><span>Мрамор</span></label>
                    </div>
                </fieldset>

                <fieldset class="calc__group">
                    <legend class="calc__legend">3. Дополнительные услуги</legend>
                    <div class="calc__options calc__options--checks">
                        <label class="calc-check"><input type="checkbox" name="extra" value="установка"><span class="calc-check__box" aria-hidden="true"><svg class="icon"><use href="icons/sprite.svg#check"></use></svg></span>Установка</label>
                        <label class="calc-check"><input type="checkbox" name="extra" value="ограда"><span class="calc-check__box" aria-hidden="true"><svg class="icon"><use href="icons/sprite.svg#check"></use></svg></span>Ограда</label>
                        <label class="calc-check"><input type="checkbox" name="extra" value="благоустройство"><span class="calc-check__box" aria-hidden="true"><svg class="icon"><use href="icons/sprite.svg#check"></use></svg></span>Благоустройство</label>
                    </div>
                </fieldset>

                <div class="calc__footer">
                    <div class="calc__summary">
                        <p class="calc__summary-label">Ваш выбор</p>
                        <p class="calc__summary-value" id="calcSummary" aria-live="polite">Вертикальный памятник, гранит</p>
                    </div>
                    <button type="submit" class="cta cta--gold">
                        <svg class="icon" aria-hidden="true"><use href="icons/sprite.svg#calculator"></use></svg>
                        Получить расчёт
                    </button>
                </div>
                <p class="calc__note">Или позвоните: <a href="tel:+79275959070">8-927-59-59-070</a></p>
            </form>

            <div class="info-panel">
                <div class="why" id="about">
                    <h2 class="section-title section-title--rule section-title--sm">Почему выбирают нас</h2>
                    <p class="why__text">Изготавливаем и устанавливаем памятники, мемориальные плиты и ограды, облицовываем могилы брусчаткой и гранитной плиткой. Ритуальные услуги и товары: венки, кресты, гробы.</p>
                    <ul class="why__list">
                        <li class="why-item">
                            <svg class="why-item__icon" aria-hidden="true"><use href="icons/sprite.svg#factory"></use></svg>
                            <h3 class="why-item__title">Собственное производство</h3>
                            <p class="why-item__text">Контроль качества на каждом этапе изготовления</p>
                        </li>
                        <li class="why-item">
                            <svg class="why-item__icon" aria-hidden="true"><use href="icons/sprite.svg#stone"></use></svg>
                            <h3 class="why-item__title">Качественные материалы</h3>
                            <p class="why-item__text">Используем только проверенный гранит и металл</p>
                        </li>
                        <!-- <li class="why-item">
                            <svg class="why-item__icon" aria-hidden="true"><use href="icons/sprite.svg#contract"></use></svg>
                            <h3 class="why-item__title">Работаем по договору</h3>
                            <p class="why-item__text">Прозрачные условия и фиксированные сроки</p>
                        </li> -->
                        <li class="why-item">
                            <svg class="why-item__icon" aria-hidden="true"><use href="icons/sprite.svg#crane"></use></svg>
                            <h3 class="why-item__title">Профессиональная установка</h3>
                            <p class="why-item__text">Опытные бригады и аккуратный монтаж</p>
                        </li>
                    </ul>
                </div>

                <div class="steps" id="steps">
                    <h2 class="section-title section-title--sm">Этапы работы</h2>
                    <ol class="steps__list">
                        <li class="step">
                            <span class="step__icon"><svg aria-hidden="true"><use href="icons/sprite.svg#request"></use></svg></span>
                            <h3 class="step__title">1. Заявка</h3>
                            <p class="step__text">Вы оставляете заявку удобным способом</p>
                        </li>
                        <li class="step">
                            <span class="step__icon"><svg aria-hidden="true"><use href="icons/sprite.svg#ruler"></use></svg></span>
                            <h3 class="step__title">2. Замер</h3>
                            <p class="step__text">Выезжаем на место и делаем замеры</p>
                        </li>
                        <li class="step">
                            <span class="step__icon"><svg aria-hidden="true"><use href="icons/sprite.svg#sketch"></use></svg></span>
                            <h3 class="step__title">3. Макет</h3>
                            <p class="step__text">Согласовываем эскиз и детали проекта</p>
                        </li>
                        <li class="step">
                            <span class="step__icon"><svg aria-hidden="true"><use href="icons/sprite.svg#chisel"></use></svg></span>
                            <h3 class="step__title">4. Изготовление</h3>
                            <p class="step__text">Изготавливаем изделие на производстве</p>
                        </li>
                        <li class="step">
                            <span class="step__icon"><svg aria-hidden="true"><use href="icons/sprite.svg#monument"></use></svg></span>
                            <h3 class="step__title">5. Установка</h3>
                            <p class="step__text">Доставляем и устанавливаем</p>
                        </li>
                    </ol>
                </div>
            </div>

        </div>
    </section>

    <!-- Наши работы -->
    <section class="works" id="works" aria-labelledby="worksTitle">
        <div class="container">
            <div class="works__head">
                <h2 class="section-title" id="worksTitle">Наши работы</h2>
                <div class="works__filters" role="group" aria-label="Фильтр работ">
                    <?php foreach ($workFilters as $key => $label): ?>
                    <button class="chip<?php echo $key === 'all' ? ' is-active' : ''; ?>" type="button" data-filter="<?php echo $key; ?>" aria-pressed="<?php echo $key === 'all' ? 'true' : 'false'; ?>"><?php echo $label; ?></button>
                    <?php endforeach; ?>
                </div>
            </div>

            <ul class="works__grid">
                <?php foreach ($works as $i => $work): ?>
                <li class="works__item<?php echo $i >= $worksVisible ? ' is-extra' : ''; ?>" data-cat="<?php echo $work[1]; ?>">
                    <button class="works__btn" type="button" aria-label="Открыть фото: <?php echo htmlspecialchars($work[2]); ?>">
                        <img src="<?php echo img_url($work[0]); ?>" alt="<?php echo htmlspecialchars($work[2]); ?>" loading="lazy">
                    </button>
                </li>
                <?php endforeach; ?>
            </ul>

            <div class="works__more-wrap">
                <button class="cta cta--dark works__more" type="button">
                    Смотреть ещё
                    <svg class="icon" aria-hidden="true"><use href="icons/sprite.svg#chevron-down"></use></svg>
                </button>
            </div>
        </div>
    </section>

    <!-- Все наши работы: бегущие ленты -->
    <section class="all-works" id="all-works" aria-labelledby="allWorksTitle">
        <div class="container">
            <h2 class="section-title" id="allWorksTitle">Все наши работы</h2>
            <p class="section-lead">Реальные объекты, которые мы изготовили и установили. Наведите, чтобы остановить ленту, нажмите на фото, чтобы рассмотреть.</p>
        </div>

        <div class="marquee">
            <?php foreach ($marqueeRows as $r => $row):
                if (!$row) continue;
                // скорость ~40px/с: длина ряда = кол-во фото × (ширина 220 + отступ 12)
                $duration = max(30, round(count($row) * 232 / 40));
            ?>
            <div class="marquee__row<?php echo $r % 2 ? ' marquee__row--reverse' : ''; ?>" style="--marquee-duration: <?php echo $duration; ?>s">
                <ul class="marquee__track">
                    <?php for ($copy = 0; $copy < 2; $copy++): ?>
                        <?php foreach ($row as $idx): ?>
                        <li class="marquee__item"<?php echo $copy ? ' aria-hidden="true"' : ''; ?>>
                            <button class="marquee__btn" type="button" data-index="<?php echo $idx; ?>"<?php echo $copy ? ' tabindex="-1"' : ''; ?> aria-label="Открыть фото работы">
                                <img src="<?php echo img_url($allWorks[$idx]); ?>" alt="" loading="lazy">
                            </button>
                        </li>
                        <?php endforeach; ?>
                    <?php endfor; ?>
                </ul>
            </div>
            <?php endforeach; ?>
        </div>

        <script type="application/json" id="allWorksData"><?php
            echo json_encode(array_map(function ($src) {
                return ['src' => img_url($src), 'alt' => 'Работа «Ритуал 08»'];
            }, $allWorks), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        ?></script>
    </section>

    <!-- Цифры -->
    <section class="stats" aria-label="Ритуал 08 в цифрах">
        <div class="container">
            <ul class="stats__list">
                <li class="stat">
                    <img class="stat__icon" src="icons/reward-icon.png" alt="" width="56" height="56" loading="lazy">
                    <p class="stat__text"><strong>30+</strong> лет на рынке</p>
                </li>
                <li class="stat">
                    <img class="stat__icon" src="icons/monument-icon.png" alt="" width="56" height="56" loading="lazy">
                    <p class="stat__text"><strong>1000+</strong> установленных памятников</p>
                </li>
                <li class="stat">
                    <img class="stat__icon" src="icons/star-icon.png" alt="" width="56" height="56" loading="lazy">
                    <p class="stat__text"><strong>Бесплатно</strong> эскиз и расчёт стоимости</p>
                </li>
                <li class="stat">
                    <img class="stat__icon" src="icons/hands-icon.png" alt="" width="56" height="56" loading="lazy">
                    <p class="stat__text"><strong>Работаем</strong> по договору</p>
                </li>
            </ul>
        </div>
    </section>

</main>

    <?php
    include("app/include/footer.php");
    ?>

    <!-- Галерея: фото категории каталога и фото работ -->
    <div class="modal fade gallery-modal" id="galleryModal" tabindex="-1" aria-labelledby="galleryModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title gallery-modal__title" id="galleryModalTitle">Фото</h2>
                    <button type="button" class="gallery-modal__close" data-bs-dismiss="modal" aria-label="Закрыть">
                        <svg class="icon" aria-hidden="true"><use href="icons/sprite.svg#close"></use></svg>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="swiper gallery-swiper">
                        <div class="swiper-wrapper"></div>
                        <button class="gallery-swiper__nav gallery-swiper__nav--prev" type="button" aria-label="Предыдущее фото">
                            <svg class="icon" aria-hidden="true"><use href="icons/sprite.svg#chevron-left"></use></svg>
                        </button>
                        <button class="gallery-swiper__nav gallery-swiper__nav--next" type="button" aria-label="Следующее фото">
                            <svg class="icon" aria-hidden="true"><use href="icons/sprite.svg#chevron-right"></use></svg>
                        </button>
                    </div>
                    <p class="gallery-swiper__counter" aria-live="polite"></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Заявка из калькулятора: текст копируется, клиент вставляет его в чат Max -->
    <div class="modal fade maxModal" id="maxModal" tabindex="-1" aria-labelledby="maxModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="maxModalLabel">Заявка готова</h2>
                    <button type="button" class="gallery-modal__close gallery-modal__close--dark" data-bs-dismiss="modal" aria-label="Закрыть">
                        <svg class="icon" aria-hidden="true"><use href="icons/sprite.svg#close"></use></svg>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="maxModal__status" id="maxModalStatus">Текст заявки скопирован в буфер обмена. Откройте чат в Max и вставьте его — мастер ответит с расчётом.</p>
                    <textarea class="maxModal__text" id="maxModalText" rows="4" readonly aria-label="Текст заявки"></textarea>
                </div>
                <div class="modal-footer">
                    <a class="cta cta--outline" href="tel:+79275959070">
                        <svg class="icon" aria-hidden="true"><use href="icons/sprite.svg#phone"></use></svg>
                        Позвонить
                    </a>
                    <a class="cta cta--gold" href="https://max.ru/u/f9LHodD0cOLP1rdKr3fKwUz4Av5NfHLAGAwXr_2PeoNNa9QbEokncFgM-uk" target="_blank" rel="noopener">Открыть Max</a>
                </div>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js"></script>
    <script src="js.js"></script>
</body>

</html>
