document.addEventListener("DOMContentLoaded", function () {
  var reduceMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
  var header = document.querySelector(".header");
  var navCollapse = document.getElementById("navbarNav");

  /* ---------- Плавный скролл к секциям (меню, кнопки первого экрана) ---------- */
  document.querySelectorAll("[data-info]").forEach(function (link) {
    link.addEventListener("click", function (e) {
      var target = link.getAttribute("data-info");
      if (target === "other-page") return;
      var section = document.getElementById(target);
      if (!section) return; // секции нет на странице — переходим по обычной ссылке
      e.preventDefault();
      section.scrollIntoView({ behavior: reduceMotion ? "auto" : "smooth" });
      if (navCollapse && navCollapse.classList.contains("show") && window.bootstrap) {
        bootstrap.Collapse.getOrCreateInstance(navCollapse).hide();
      }
    });
  });

  /* ---------- Шапка темнеет при прокрутке ---------- */
  if (header) {
    var onScroll = function () {
      header.classList.toggle("is-scrolled", window.scrollY > 10);
    };
    onScroll();
    window.addEventListener("scroll", onScroll, { passive: true });
  }

  /* ---------- Галерея в модальном окне (каталог и работы) ---------- */
  var galleryModalEl = document.getElementById("galleryModal");
  var gallerySwiper = null;
  var galleryStart = 0;

  function openGallery(title, photos, startIndex) {
    if (!galleryModalEl || !window.bootstrap || !photos.length) return;
    var wrapper = galleryModalEl.querySelector(".swiper-wrapper");
    galleryModalEl.querySelector(".gallery-modal__title").textContent = title;
    wrapper.innerHTML = "";
    photos.forEach(function (photo) {
      var slide = document.createElement("div");
      slide.className = "swiper-slide";
      var figure = document.createElement("figure");
      figure.className = "gallery-slide";
      var img = document.createElement("img");
      img.src = photo.src;
      img.alt = photo.alt || "";
      figure.appendChild(img);
      if (photo.caption) {
        var caption = document.createElement("figcaption");
        caption.textContent = photo.caption;
        figure.appendChild(caption);
      }
      slide.appendChild(figure);
      wrapper.appendChild(slide);
    });
    galleryStart = startIndex || 0;
    bootstrap.Modal.getOrCreateInstance(galleryModalEl).show();
  }

  if (galleryModalEl) {
    var counter = galleryModalEl.querySelector(".gallery-swiper__counter");
    var updateCounter = function (swiper) {
      if (counter) counter.textContent = swiper.activeIndex + 1 + " / " + swiper.slides.length;
    };

    galleryModalEl.addEventListener("shown.bs.modal", function () {
      if (typeof Swiper === "undefined") return;
      gallerySwiper = new Swiper(galleryModalEl.querySelector(".gallery-swiper"), {
        initialSlide: galleryStart,
        spaceBetween: 16,
        speed: reduceMotion ? 0 : 300,
        keyboard: { enabled: true },
        navigation: {
          prevEl: galleryModalEl.querySelector(".gallery-swiper__nav--prev"),
          nextEl: galleryModalEl.querySelector(".gallery-swiper__nav--next"),
        },
        on: {
          init: updateCounter,
          slideChange: updateCounter,
        },
      });
    });

    galleryModalEl.addEventListener("hidden.bs.modal", function () {
      if (gallerySwiper) {
        gallerySwiper.destroy(true, true);
        gallerySwiper = null;
      }
      galleryModalEl.querySelector(".swiper-wrapper").innerHTML = "";
    });
  }

  /* Каталог: «Подробнее» → фото категории */
  document.querySelectorAll(".catalog-card__more").forEach(function (button) {
    button.addEventListener("click", function () {
      var template = button.parentElement.querySelector(".catalog-card__photos");
      if (!template) return;
      var photos = Array.prototype.map.call(template.content.querySelectorAll("img"), function (img) {
        return {
          src: img.getAttribute("src"),
          alt: img.getAttribute("alt"),
          caption: img.getAttribute("data-caption"),
        };
      });
      openGallery(button.getAttribute("data-gallery-title"), photos, 0);
    });
  });

  /* ---------- «Наши работы»: фильтр, «Смотреть ещё», лайтбокс ---------- */
  var works = document.querySelector(".works");
  if (works) {
    var items = Array.prototype.slice.call(works.querySelectorAll(".works__item"));
    var chips = works.querySelectorAll(".chip");
    var moreBtn = works.querySelector(".works__more");
    var filter = "all";
    var expanded = false;

    var renderWorks = function () {
      items.forEach(function (item) {
        var matches = filter === "all" || item.getAttribute("data-cat") === filter;
        var hiddenAsExtra = filter === "all" && !expanded && item.classList.contains("is-extra");
        item.hidden = !matches || hiddenAsExtra;
      });
      if (moreBtn) {
        var hasExtra = items.some(function (item) {
          return item.classList.contains("is-extra");
        });
        moreBtn.parentElement.hidden = filter !== "all" || expanded || !hasExtra;
      }
    };

    chips.forEach(function (chip) {
      chip.addEventListener("click", function () {
        filter = chip.getAttribute("data-filter");
        chips.forEach(function (c) {
          var active = c === chip;
          c.classList.toggle("is-active", active);
          c.setAttribute("aria-pressed", active ? "true" : "false");
        });
        renderWorks();
      });
    });

    if (moreBtn) {
      moreBtn.addEventListener("click", function () {
        expanded = true;
        renderWorks();
      });
    }

    items.forEach(function (item) {
      item.querySelector(".works__btn").addEventListener("click", function () {
        var visible = items.filter(function (i) {
          return !i.hidden;
        });
        var photos = visible.map(function (i) {
          var img = i.querySelector("img");
          return { src: img.getAttribute("src"), alt: img.alt, caption: img.alt };
        });
        openGallery("Наши работы", photos, visible.indexOf(item));
      });
    });

    renderWorks();
  }

  /* ---------- «Все наши работы»: клик по миниатюре в бегущей ленте ---------- */
  var allWorksData = document.getElementById("allWorksData");
  if (allWorksData) {
    var allPhotos = [];
    try {
      allPhotos = JSON.parse(allWorksData.textContent);
    } catch (err) {
      allPhotos = [];
    }
    document.querySelectorAll(".marquee__btn").forEach(function (button) {
      button.addEventListener("click", function () {
        openGallery("Все наши работы", allPhotos, Number(button.getAttribute("data-index")) || 0);
      });
    });
  }

  /* ---------- Калькулятор: собираем заявку и отправляем через Max ---------- */
  var calcForm = document.getElementById("calc");
  if (calcForm) {
    var summary = document.getElementById("calcSummary");

    var readCalc = function () {
      var type = calcForm.querySelector('input[name="type"]:checked');
      var material = calcForm.querySelector('input[name="material"]:checked');
      var extras = Array.prototype.map.call(calcForm.querySelectorAll('input[name="extra"]:checked'), function (input) {
        return input.value;
      });
      return {
        type: type ? type.value : "",
        material: material ? material.value : "",
        extras: extras,
      };
    };

    var updateSummary = function () {
      var data = readCalc();
      var parts = [data.type, data.material].concat(data.extras).filter(Boolean);
      if (summary) summary.textContent = parts.join(", ");
    };

    calcForm.addEventListener("change", updateSummary);
    updateSummary();

    calcForm.addEventListener("submit", function (e) {
      e.preventDefault();
      var data = readCalc();
      var text =
        "Здравствуйте! Хочу узнать стоимость.\n" +
        "Тип: " + data.type + "\n" +
        "Материал: " + data.material + "\n" +
        "Дополнительно: " + (data.extras.length ? data.extras.join(", ") : "не нужно");

      var modalEl = document.getElementById("maxModal");
      var textArea = document.getElementById("maxModalText");
      var status = document.getElementById("maxModalStatus");
      if (textArea) textArea.value = text;

      var showModal = function (copied) {
        if (status) {
          status.textContent = copied
            ? "Текст заявки скопирован. Откройте чат в Max и вставьте его — мастер ответит с расчётом."
            : "Скопируйте текст заявки ниже, откройте чат в Max и вставьте его — мастер ответит с расчётом. Или просто позвоните.";
        }
        if (modalEl && window.bootstrap) {
          bootstrap.Modal.getOrCreateInstance(modalEl).show();
        } else {
          window.location.href = "tel:+79275959070";
        }
      };

      if (navigator.clipboard && window.isSecureContext) {
        // если браузер не ответил за 1.5 с (например, ждёт разрешения) — показываем окно без копирования
        var shown = false;
        var showOnce = function (copied) {
          if (shown) return;
          shown = true;
          showModal(copied);
        };
        setTimeout(function () { showOnce(false); }, 1500);
        navigator.clipboard.writeText(text).then(
          function () { showOnce(true); },
          function () { showOnce(false); }
        );
      } else {
        var copied = false;
        if (textArea) {
          textArea.select();
          try {
            copied = document.execCommand("copy");
          } catch (err) {
            copied = false;
          }
        }
        showModal(copied);
      }
    });
  }
});
