    <footer class="site-footer" id="contacts">
        <div class="container">

            <!-- Плашка «Нужна консультация?» -->
            <div class="contact-bar">
                <div class="contact-bar__phones">
                    <svg class="icon contact-bar__icon" aria-hidden="true"><use href="icons/sprite.svg#phone"></use></svg>
                    <div>
                        <a class="contact-bar__phone" href="tel:+79275959070">8-927-59-59-070</a>
                        <a class="contact-bar__phone contact-bar__phone--second" href="tel:+79033769002">8-903-37-69-002</a>
                        <p class="contact-bar__note">Звоните круглосуточно</p>
                    </div>
                </div>
                <div class="contact-bar__text">
                    <p class="contact-bar__title">Нужна консультация?</p>
                    <p class="contact-bar__lead">Поможем подобрать памятник и рассчитать стоимость.</p>
                </div>
                <a class="cta cta--gold contact-bar__cta" href="tel:+79275959070">
                    <svg class="icon" aria-hidden="true"><use href="icons/sprite.svg#phone"></use></svg>
                    Бесплатная консультация
                </a>
            </div>

            <!-- Нижняя строка -->
            <div class="site-footer__bottom">
                <a class="site-logo site-logo--footer" href="<?php echo BASE_URL ?>">
                    <img class="site-logo__img" src="images/logo-icon.png" alt="" width="36" height="36" loading="lazy">
                    <span class="site-logo__text">Ритуал 08</span>
                </a>
                <p class="site-footer__address">Республика Калмыкия, с. Малые Дербеты</p>
                <a class="site-footer__max" href="https://max.ru/u/f9LHodD0cOLP1rdKr3fKwUz4Av5NfHLAGAwXr_2PeoNNa9QbEokncFgM-uk" target="_blank" rel="noopener">
                    <img src="images/max.png" alt="" width="24" height="24" loading="lazy">
                    Написать в Max
                </a>
                <p class="site-footer__copy">© Ритуал 08, 1994–<?php echo date('Y'); ?></p>
            </div>
        </div>

        <!-- Обратный звонок (сейчас скрыт, оставлен без изменений) -->
        <div class="topphone_block container">
            <h2 class="topphone_block_title">Обратный звонок</h2>
            <form id="form" class="phone_form" action="https://api.web3forms.com/submit(delete=together=clapmps)"
                method="POST" name="tophone" action="">
                <input type="hidden" name="access_key" value="4f75351a-4784-4ff5-ae66-4f76ab661494">
                <label for="phone_name">Имя:</label>
                <input id="phone_name" class="topphone_input" placeholder="Ваше имя" name="name" type="text">
                <label for="phone_number">Номер:</label>
                <input id="phone_number" class="topphone_input" placeholder="Мобильный  номер" name="number" type="tel">
                <button type="submit" class="phone_form_btn">Заказать звонок</button>
                <div class="order_now">
                    <a href="tel:89275959070"><img class="call_img" src="images/call.png" alt=""></a>
                </div>
                <div id="result"></div>
            </form>
            <div class="close_topphone"></div>
        </div>
    </footer>

    <!-- Плавающая кнопка звонка -->
    <a class="call-fab" href="tel:+79275959070" aria-label="Позвонить: 8-927-59-59-070">
        <svg class="icon" aria-hidden="true"><use href="icons/sprite.svg#phone"></use></svg>
    </a>
