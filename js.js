// import variants from './variants.js'

const offers = document.querySelector('.offers_items');
const main_title = document.getElementById('main_title');
const scroll_btn = document.getElementById('mouse');
const docsTitle = document.querySelector('.docs_title')

const popupBack = document.querySelector('.popup_back');
const offersItems = document.querySelectorAll('.offers_item');
const popup = document.querySelector('.popup');
const popupContent = document.querySelector('.popup_content');
const header = document.querySelector('.header');
let offersBtnClickHandler;

function autoScroll() {
  main_title.scrollIntoView({ block: 'start', behavior: 'smooth' })
}
scroll_btn.addEventListener('click', autoScroll)

function docScroll() {
  docsTitle.scrollIntoView({ block: 'start', behavior: 'smooth' })
}
scroll_btn.addEventListener('click', autoScroll)

createCard();
iniutOfferSlider();
initPopUp();
upper();
oneRoomF();
twoRoomF();
upscaleDoc();
setTimeout(callBack, 30000);
offersBtn();

// callBack()


function createCard() {
  variants.forEach((variant, index) => {
    const photos = variant.photos.map(photo => `<img class="offer_img swiper-slide" src="${photo}" alt="Изображение">`).join('');
    const offerItemHTML = ` <div data-index="${index}" class="offers_item">
        <div class="swiper">
            <div class="swiper-wrapper">
                ${photos}
            </div>            
            <div class="custom-swiper-button-next"></div>
            <div class="custom-swiper-button-prev"></div>
        </div>
        <div class="offer_descr">
            <p class="title">${variant.room}</p>                
            <div class="sub_title">
            <ol>
                <li>${variant.short_descr}</li>
            </ol>
            </div>                
            <p class="apart_address">${variant.address} </p>
            <a href="tel:89033760101"><img class="call_img" src="images/call.png" alt=""></a>                
            <a href="tel:81231231212" class="number">${variant.short_price}
            </a>
        </div>
    </div>`
    offers.insertAdjacentHTML('afterbegin', offerItemHTML)
    clamp() 
   }
  )


  offersBtn();
  iniutOfferSlider();
  initPopUp();
}

function iniutOfferSlider() {
  const swiper = new Swiper('.swiper', {
    slidesPerView: 'auto',
    spaceBetween: 10,
    grabCursor: true,
    centeredSlides: true,
    loop: true,
    autoplay: {
      delay: 2500,
      disableOnInteraction: true
    },
    // If we need pagination
    pagination: {
      el: '.swiper-pagination',
    },
    // Navigation arrows
    navigation: {
      // nextEl: '.swiper-button-next',
      // prevEl: '.swiper-button-prev',
      nextEl: '.custom-swiper-button-next',
      prevEl: '.custom-swiper-button-prev',
    },
  });
};

function initPopUp() {
  const offersItems = document.querySelectorAll('.offers_item');
  // console.log(offersItems)
  offersItems.forEach(item => {
    item.addEventListener('click', function (e) {
      const index = item.dataset.index;
      const variant = variants[index]
      // console.log(variant)
      if (variant) {
        popupContent.innerHTML = `       
         <div class=" sliider">
    <div class="swiper-wrapper">
        ${variant.photos.map(photo => `<img class="variant_img swiper-slide" src="${photo}">`).join('')}
    </div>
    <div class="custom-swiper-button-prev"></div>
    <div class="custom-swiper-button-next"></div>
</div>
<div class="popUpDesc"><p class="title">${variant.room}</p>
<div class="sub_title_popUp">
    <p>${variant.short_descr}</p>
    <p>${variant.descr}</p>
    <p class="apart_address">${variant.address}</p>
    <a href="tel:89033760101"><img class="call_img" src="images/call.png" alt=""></a>
</div>
<p class="price price_popUp">${variant.price}</p></div>
<div class="close_modal"></div>`;
        initPopUpSLider();
        popup.classList.remove('hidden');
        document.querySelector('.upper_key_block').classList.add('hidden');
        closeModalWindow();
        document.body.style.overflow = 'hidden';
      }
    });

    const prevArrow = item.querySelector('.custom-swiper-button-prev')
    const nextArrow = item.querySelector('.custom-swiper-button-next');
    nextArrow.addEventListener('click', (e) => {
      e.stopPropagation();
    });
    prevArrow.addEventListener('click', (e) => {
      e.stopPropagation();
    });
  })
};

function closeModalWindow() {
  window.addEventListener('click', function (e) {
    if (e.target.classList.contains('close_modal')) {
      popup.classList.add('hidden');
      document.querySelector('.upper_key_block').classList.remove('hidden');
      document.body.style.overflow = '';
      // console.log(e.taget)
    }
  })
  popup.addEventListener('click', function (e) {
    if (e.target === popupBack) {
      popup.classList.add('hidden');
      document.querySelector('.upper_key_block').classList.remove('hidden');
      document.body.style.overflow = '';
    }
  })
}

function initPopUpSLider() {
  const swiper = new Swiper('.sliider', {
    slidesPerView: 'auto',
    spaceBetween: 10,
    grabCursor: true,
    centeredSlides: true,
    loop: false,
    // autoplay: {
    //     delay: 2500,
    //     disableOnInteraction: false
    //   },
    // If we need pagination
    pagination: {
      el: '.swiper-pagination',
    },
    // Navigation arrows
    navigation: {
      nextEl: '.custom-swiper-button-next',
      prevEl: '.custom-swiper-button-prev',
    },
  });
}

function upper() {
  const upperKeyBlock = document.querySelector('.upper_key_block')
  const up = document.getElementById('upper_key');
  const topPhoto = document.querySelector('.top_photo')
  up.addEventListener('click', function () {
    topPhoto.scrollIntoView({ block: 'start', behavior: 'smooth' })
  })
  window.addEventListener('scroll', function () {
    if (scrollY >= 200) {
      upperKeyBlock.classList.remove('hidden');
    }
    else {
      upperKeyBlock.classList.add('hidden');
    }
  })
}

function oneRoomF() {
  document.addEventListener('click', function (e) {
    const navItems = e.target.closest('.navbar_list');
    if (navItems) {
      const clickedItem = e.target.closest('.navbar_item');
      if (clickedItem) {
        const index = Array.from(navItems.querySelectorAll('.navbar_item')).indexOf(clickedItem);
        clickedItem.dataset.index = index
        if (clickedItem.dataset.index === '0') {
          main_title.scrollIntoView({ block: 'start', behavior: 'smooth' });
          //определяем все карточки на странице
          const offersItem = document.querySelectorAll('.offers_item');
          //фильтруем массив с объектами и оставляем объекты cluster_1  
          const filteredVariants = variants.filter(variant => variant.cluster === 1);
          //удаляем все карточки
          offersItem.forEach(item => item.remove());
          //проходимся по массиву с cluster1 и выделяем каждый кластер
          filteredVariants.forEach((variant, index) => {
            const photos = variant.photos.map(photo => `<img class="offer_img swiper-slide" src="${photo}" alt="Изображение">`).join('');
            const offerItemHTML = `<div data-index="${index}" class="offers_item">
            <div class="swiper ">
                <div class="swiper-wrapper">
                    ${photos}
                </div>
                <div class="custom-swiper-button-next"></div>
                <div class="custom-swiper-button-prev"></div>
            </div>  
            <div class="offer_descr">
                <p class="title">${variant.room}</p>
                <p>
                <div class="sub_title">
                <ol>
                    <li>${variant.short_descr}</li>
                </ol>
                </div>
                </p>
                <p class="apart_address">${variant.address} </p>                
                <a href="tel:81231231212" class="number">${variant.short_price}
                </a>
            </div>`
            offers.insertAdjacentHTML('afterbegin', offerItemHTML);
            clamp();
          })
          iniutOfferSlider();
          initPopUp();
          offersBtn()
          navi.classList.remove('open');
          header.classList.remove('open');
        }
        if (clickedItem.dataset.index === '3') {
          docScroll()
          navi.classList.remove('open');
          header.classList.remove('open');
        }
      }
    }
  })
}

function twoRoomF() {
  document.addEventListener('click', function (e) {
    const navItems = e.target.closest('.navbar_list')
    if (navItems) {
      const clickedItem = e.target.closest('.navbar_item');
      if (clickedItem) {
        const index = Array.from(navItems.querySelectorAll('.navbar_item')).indexOf(clickedItem);
        clickedItem.dataset.index = index;
        if (clickedItem.dataset.index === '1') {
          main_title.scrollIntoView({ block: 'start', behavior: 'smooth' })
          //определяем все карточки на странице
          const offersItem = document.querySelectorAll('.offers_item');
          //фильтруем массив с объектами и оставляем объекты cluster_1  
          const filteredVariants = variants.filter(variant => variant.cluster === 2);
          //удаляем все карточки
          offersItem.forEach(item => item.remove());
          //проходимся по массиву с cluster1 и выделяем каждый кластер
          filteredVariants.forEach((variant, index) => {
            const photos = variant.photos.map(photo => `<img class="swiper-slide" src="${photo}" alt="Изображение">`).join('');
            const offerItemHTML = `<div data-index="${index}" class="offers_item">
            <div class="swiper ">
                <div class="swiper-wrapper">
                    ${photos}
                </div>
                <div class="custom-swiper-button-next"></div>
                <div class="custom-swiper-button-prev"></div>
            </div>  
            <div class="offer_descr">
                <p class="title">${variant.room}</p>
                <p>
                <div class="sub_title">
                <ol>
                    <li>${variant.short_descr}</li>
                </ol>
                </div>
                </p>
                <p class="apart_address">${variant.address} </p>                
                <a href="tel:81231231212" class="number">${variant.short_price}
                </a>
            </div>`
            offers.insertAdjacentHTML('afterbegin', offerItemHTML);
            clamp();
          })
          iniutOfferSlider();
          initPopUp();
          offersBtn();
          navi.classList.remove('open');
          header.classList.remove('open');
        }
        if (clickedItem.dataset.index === '2') {
          const topphoneBlock = document.querySelector('.topphone_block');
          if (getComputedStyle(topphoneBlock).transform === 'matrix(1, 0, 0, 1, -1000, 0)') {
            topphoneBlock.style.transform = 'translate(0)'
            if (getComputedStyle(topphoneBlock).transform === 'matrix(1, 0, 0, 1, -1000, 0)') {
              const topphoneBtn = document.querySelector('.close_topphone')
              topphoneBtn.addEventListener('click', () => { topphoneBlock.style.transform = 'translate(-1000px)' });
            }
          }
          navi.classList.remove('open');
          header.classList.remove('open');
        }
      }
    }
  })
}


function upscaleDoc() {
  document.addEventListener('click', function (e) {
    const docsItems = e.target.closest('.docs_items')
    if (docsItems) {
      const selectedDoc = e.target.closest('.docs_item');
      if (selectedDoc) {
        const index = Array.from(docsItems.querySelectorAll('.docs_item')).indexOf(selectedDoc);
        selectedDoc.dataset.index = index;
        if (selectedDoc.dataset.index === '0') {
          const docsIMG = selectedDoc.querySelector('.docs_img');
          if (docsIMG) {
            const imgHTML = `<img class="docs_img" src="${docsIMG.src}"></img> <div class="close_modal"></div>`
            popup.classList.remove('hidden')
            popupContent.innerHTML = imgHTML;
            closeModalWindow();
            document.body.style.overflow = 'hidden';
          }
        }
        if (selectedDoc.dataset.index === '1') {
          const docsIMG = selectedDoc.querySelector('.docs_img');
          if (docsIMG) {
            const imgHTML = `<img class="docs_img" src="${docsIMG.src}"></img> <div class="close_modal"></div>`
            popup.classList.remove('hidden')
            popupContent.innerHTML = imgHTML;
            closeModalWindow();
            document.body.style.overflow = 'hidden';
          }
        }
        if (selectedDoc.dataset.index === '2') {
          const docsIMG = selectedDoc.querySelector('.docs_img');
          if (docsIMG) {
            const imgHTML = `<img class="docs_img" src="${docsIMG.src}"></img> <div class="close_modal"></div>`
            popup.classList.remove('hidden')
            popupContent.innerHTML = imgHTML;
            closeModalWindow();
            document.body.style.overflow = 'hidden';
          }
        }
      }
    }
  })
};


function callBack() {
  const callBack = document.querySelector('.topphone_block');
  callBack.style.transform = 'translateX(0px)';
  document.querySelector('.close_topphone').addEventListener('click', () => {
    callBack.style.transform = 'translateX(-1000px)'
  });
}

function clamp() {
  const subTitle = document.querySelectorAll('.sub_title ol li');

  subTitle.forEach(title => {
    $clamp(title, {
      clamp: 4,
      useNativeClamp: false
    });
    title.style.listStyle = 'none';
  })
}


const result = document.getElementById('result');
const form = document.getElementById('form');
form.addEventListener('submit', (e) => {
  e.preventDefault();
  const formData = new FormData(form);
  const object = Object.fromEntries(formData);
  const json = JSON.stringify(object);
  result.innerHTML = "Пожалуйста подождите..."

  fetch('https://api.web3forms.com/submit', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'Accept': 'application/json'
    },
    body: json
  })
    .then(async (response) => {
      let json = await response.json();
      if (response.status == 200) {
        result.innerHTML = 'Ждите звонка';
      } else {
        result.innerHTML = json.message;
      }
    })
    .catch(error => {
      console.log(error);
      result.innerHTML = "Что-то пошло не так";
    })
    .then(function () {
      form.reset();
      setTimeout(() => {
        result.style.display = "none";
      }, 3000);
    });
});

function offersBtn() {
  const offersItems = document.querySelectorAll('.offers_item');
  const offersBtn = document.querySelector('.offers_btn');
  if (offersItems.length < 7) {
    offersBtn.classList.remove('hidden')
  }
  else {
    offersBtn.classList.add('hidden');
  }
  if (offersBtnClickHandler) {
    offersBtn.removeEventListener('click', offersBtnClickHandler);
  }
  offersBtnClickHandler = (e) => {
    const offersItems = document.querySelectorAll('.offers_item');
    offersItems.forEach((item) => {
      item.remove();
    })
    autoScroll();
    createCard();
  }
  offersBtn.addEventListener('click', offersBtnClickHandler);
}
const navItems = document.querySelector('.navbar_list');

// burger menu
const burger_btn = document.querySelector('.header_burger_menu');
const navi = document.querySelector('.navi')
burger_btn.addEventListener('click', () => {
  const navItem = document.querySelectorAll('.navbar_item');
  header.classList.toggle('open');
  navi.classList.toggle('open');
  navItems.style.background = 'white';
});

changeColorMenu()
function changeColorMenu() {

  document.addEventListener('scroll', (e) => {
    const isMenuOpen = header.classList.contains('open');
    if (isMenuOpen) {
      navItems.style.background = 'white';
    }
    else {

      if (scrollY >= 470) {
        navItems.style.background = '#00000060';
      }
      if (scrollY <= 470) {
        navItems.style.background = 'inherit';
      }
    }
  })
}





