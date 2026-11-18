<nav class="navbar navbar-expand-xl site-nav" aria-label="Основное меню">
  <div class="container site-nav__inner">

    <!-- Логотип -->
    <a class="site-logo" data-info="other-page" href="<?php echo BASE_URL ?>">
      <img class="site-logo__img" src="images/logo-icon.png" alt="" width="44" height="44">
      <span class="site-logo__text">Ритуал 08</span>
    </a>

    <!-- Кнопка для мобильных -->
    <button class="navbar-toggler site-nav__toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Открыть меню">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Пункты меню -->
    <div class="collapse navbar-collapse" data-nosnippet id="navbarNav">
      <ul class="navbar-nav site-nav__list">
        <li class="nav-item"><a class="nav-link" data-info="catalog" href="<?php echo BASE_URL ?>#catalog">Каталог</a></li>
        <li class="nav-item"><a class="nav-link" data-info="works" href="<?php echo BASE_URL ?>#works">Наши работы</a></li>
        <li class="nav-item"><a class="nav-link" data-info="calc" href="<?php echo BASE_URL ?>#calc">Услуги</a></li>
        <li class="nav-item"><a class="nav-link" data-info="steps" href="<?php echo BASE_URL ?>#steps">Этапы работы</a></li>
        <li class="nav-item"><a class="nav-link" data-info="about" href="<?php echo BASE_URL ?>#about">О компании</a></li>
        <li class="nav-item"><a class="nav-link" data-info="contacts" href="<?php echo BASE_URL ?>#contacts">Контакты</a></li>
      </ul>

      <div class="site-nav__phone">
        <svg class="icon site-nav__phone-icon" aria-hidden="true"><use href="icons/sprite.svg#phone"></use></svg>
        <div>
          <a href="tel:+79275959070" class="site-nav__phone-link">8-927-59-59-070</a>
          <p class="site-nav__phone-note">круглосуточно</p>
        </div>
      </div>
    </div>

  </div>
</nav>
