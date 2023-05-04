<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{csrf_token()}}">

    <title>5.5: {{ Auth::user() == null ? 'Главная': Auth::user()->name}}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- подключаем свайпер  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"/>
       <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/app.css'])
</head>

<body>
    
<header class="header">

<a href="/" class="logo"><i class='fab fa-nutritionix'>5.5</i></a>

<nav class="navbar">

   
    <a href="{{route('post.index')}}" class="nav-link">Рецепты</a>
  
    <a href="{{route('product.index')}}" class="nav-link">Продукты</a>
    
    
    <a href="#index3.html" id = "demo"class="nav-link">Статьи</a>
  
  
</nav>

<div class="icons">
    <div id="menu-btn" class="fas fa-bars"></div>

    <div id="search-btn" class="fas fa-search"></div>

    <div id="cart-btn" class="fas fa-shopping-cart">
    <i  class = "count"></i></div>
    <div id="login-btn" class="fas fa-user"></div>
       
    <div id="logOut" class="nav-item dropdown">
        <i>
            <a style = "font-size: 1.5rem" id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user() == null ? '': Auth::user()->name}}</a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a style = "font-size: 1.5rem" class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            {{ __('Выход') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                             @csrf
                        </form>
                        </div>
        </i>            
        </div>
    </div>
                      
 

</div>
  <div>
    <div class="search-form">
	   <div class="dropdown">
        <input type="search" onkeyup="showHint(this.value)" placeholder="найти..." id="search-box" value="">
          <label for="search-box" >
          <div id="myDropdown" class="dropdown-content">
              <div id="productHint" class="search-hint"></div>
          </div>
        </label>
		  </div>
</div>
  </div>




<div class="shopping-cart">

  <div class="card-body">
    <h1 class="card-title" style="text-align: center">Калькулятор хлебных единиц</h1>
    
  </div>
  <ul class="list-group list-group-flush">
    <div id = "listCount" style="font-size:1.6rem"></div>
    
  </ul>
  <div class="card-body">
    <div id="empty"></div>
    <p style="font-size:1.5rem">Итого: XE(хлебных ед.)
    <input id="sum" type="text" placeholder='XE'value="" style="width: 10rem; float: right; border-bottom: 2px solid #bdf5b0"></p>
    <p style="font-size:1.5rem"> XE на 100гр.-
    <input id="percent" type="text" placeholder='XE/100гр.'value="" style="width: 10rem; float: right; border-bottom: 2px solid #bdf5b0"></p>
  
  </div>
  <div class="card-body">
     <a href=""type="submit" class="btn mb-3"name="action" id = "clear" value="" onclick="localStorage.clear();">Очистить</button>
    </a>
  </div>

</div>

    
    <form method="POST" action="{{ route('login') }}" class="login-form">
        <h3>форма входа</h3>
                        @csrf 
            <div class="row mb-3">
                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email адрес') }}</label>

                    <div class="col-md-6">
        <input  style="font-size: 1.4rem;"  id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror                   
                    </div>
            </div>
            <div class="row mb-3">
                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Пароль') }}</label>
                    <div class="col-md-6">
            <input style="font-size: 1.4rem;" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            
                

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
                    </div>
            </div>
    <div class="remember">
        <input type="checkbox" name="" id="remember-me">
        <label for="remember-me">запомнить меня</label>
    </div>
    <input type="submit" value="Войти" class="btn">
    <p>забыли пароль? <a href="#">нажмите сюда</a></p>
    <p>Ещё не зарегистрировались? <a href="{{ route('register') }}">зарегистрироваться</a></p>
    <p><a href="{{ route('logout') }}" class="dropdown-item"
        onclick="event.preventDefault();
           document.getElementById('logout-form').submit();">
                {{ __('Выйти') }}
    </a></p>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>                                                                                                                 
</form>

</header>
    

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<script>

</script>
<script>
    const swiper = new Swiper('.swiper', {
  // Optional parameters
  slidesPerView: 3,
  hashNavigation:true,
  // Responsive breakpoints
  //watchSlidesVisibility: true,
  //watchSlidesProgress: true,
  direction: 'horizontal',
  spaceBetween: 5,
  //loop: true,
  effect: 'slide',
  //speed: 300,
  //longSwipes: true,
  //longSwipesMs: 300,
  //focusableElements: 'button',
  // If we need pagination
  pagination: {
    el: '.swiper-pagination',
    clickable: true,
  },
  autoplay: {
   delay: 4000,
 },
  // Navigation arrows
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },

  // And if we need scrollbar
  scrollbar: {
    el: '.swiper-scrollbar',
  },
});
const subswiper = new Swiper('.subswiper', {
  // Optional parameters
  slidesPerView: 8,
  direction: 'horizontal',
  spaceBetween: 1,
  // Responsive breakpoints
  breakpoints: {
    // when window width is >= 320px
    320: {
      slidesPerView: 3,
      spaceBetween: 1
    },
    // when window width is >= 480px
    480: {
      slidesPerView: 4,
      spaceBetween: 1
    },
    // when window width is >= 640px
    640: {
      slidesPerView: 6,
      spaceBetween: 1
    }
  },
  effect: 'slide'
});

    //grosery
    
let searchForm = document.querySelector('.search-form');
let searchHint = document.querySelector('.search-hint');
let dropdownContent = document.querySelector('.dropdown-content');
document.querySelector('#search-btn').onclick = () =>{

    searchForm.classList.toggle('active');
    searchHint.style.display == 'block' ? searchHint.style.display = 'none' : searchHint.style.display = 'block';
    dropdownContent.style.display = ('block');

    ShopCart.classList.remove('active');
    loginForm.classList.remove('active');
    navbar.classList.remove('active');
    document.getElementById('sum').value = '';
}

let ShopCart = document.querySelector('.shopping-cart');

    document.querySelector('#cart-btn').onclick = () =>{
            //... выведем наименование продуктов
            let firstListCount  = document.querySelector('#listCount');
              //удалим предыдущие записи для исключения добавления(дублирования)
              collection = document.querySelectorAll('.list-group-item');
              for (const elem of collection) {
              elem.remove();
            }
           //очистим DOM объект с id= "empty" от предыдущих данных
            document.getElementById("empty").innerHTML = '';
             // в массиве localCart содержатся выбранные элементы из localStorage
            //формируем список с полями input
            (localCart.length == 0)? document.getElementById("empty").innerHTML = "Ничего не выбрано для рассчета.Наидите продукт через поиск и 'кликом' добавьте в корзину для рассчета":'';
              
            
            for (let i = 0; i < localCart.length; i++) {
              
              let il = document.createElement('il');
              il.className = "list-group-item";
              il.innerHTML =  localCart[i].name +"("+localCart[i].carb+"угл.)"+ "<input id='input' class='cls' type='' placeholder='кол-во грамм'  style = 'width: 10rem; float: right; border-bottom: 2px solid #bdf5b0'; >";
              firstListCount.appendChild(il);
            }
            // для расчета хлебных единиц находим input для каждого элемента по имени класса и при вводе(событие 'keyup') вызывается функция для расчета ХЕ func

              let elem = document.getElementsByClassName('cls');
              for(let i = 0; i < elem.length; i++){
                elem[i].addEventListener('keyup', func);
              }

    ShopCart.classList.toggle('active');
    searchForm.classList.remove('active');
    loginForm.classList.remove('active');
    navbar.classList.remove('active');
    document.getElementById('sum').value = '';
}

let loginForm = document.querySelector('.login-form');

document.querySelector('#login-btn').onclick = () =>{
    loginForm.classList.toggle('active');
    searchForm.classList.remove('active');
    ShopCart.classList.remove('active');
    navbar.classList.remove('active');
    document.getElementById('sum').value = '';
}

let navbar = document.querySelector('.navbar');

document.querySelector('#menu-btn').onclick = () =>{
    navbar.classList.toggle('active');
    searchForm.classList.remove('active');
    //cart.classList.remove('active');
    loginForm.classList.remove('active');
}

window.onscroll = () =>{
    searchForm.classList.remove('active');
	dropdownContent.style.display = ('none');
    //cart.classList.remove('active');
    loginForm.classList.remove('active');
    navbar.classList.remove('active');
}

let slides = document.querySelectorAll('.home .slides-container .slide');
let index = 0;

function next(){
    slides[index].classList.remove('active');
    index = (index + 1) % slides.length;
    slides[index].classList.add('active');
}

function prev(){
    slides[index].classList.remove('active');
    index = (index - 1 + slides.length) % slides.length;
    slides[index].classList.add('active');
}
function showHint(str) {
            //сначала удалим подсказки от предыдущих запросов
	          
              if (str.length == 0) {
                document.querySelector('#productHint').innerHTML = '';
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                      let jsonHints = JSON.parse(this.responseText);
                      jsonHints = jsonHints.slice(0,10);
                      
                      let parentHint = document.querySelector('#productHint');  
                      
                      
                        for (let i = 0; i < jsonHints.length; i++) { 
                          let r = document.createElement('button');
                            r.className = "hint p-2";
                            r.name = jsonHints[i].name;
                            r.id = jsonHints[i].id;
                            r.value = jsonHints[i].carb;
                            r.innerHTML = jsonHints[i].name;
                        parentHint.appendChild(r);
                        };  
                      }
                };
                xmlhttp.open("GET", "/productHints?q=" + str, true);
                xmlhttp.send();
            }
          }
          if (!localStorage.getItem('Cart')){
    localStorage.setItem('Cart','[]');
};
//записываем в глобальные переменные массивы, чтобы обращаться к ним из функций

let Cart =  JSON.parse(localStorage.getItem('Cart'));

//функция добавления продукта в localStorage***********************
function  addToCart(id, name, value){
	
	let Cart = localStorage.getItem('Cart');
	
			let newProduct = [
				{
				'id': id,
				'name': name,
				'carb': value
			}
			]

	if(!Cart){
		
		localStorage.setItem('Cart', JSON.stringify(newProduct));
		
			} else{
				//преобразуем строковое представление Cart из localStorage в массив
				Cart = JSON.parse(Cart);
				//методом find переберем массив Cart и если найдется свойство id == аргументу функции (id), то ничего не делаем... 
				let cart = Cart.find(item=>item.id == id);
				//а если нет, то метод find вернет undefined которое сохраним в cart
					if (cart==undefined){
					//и добавляем данные newPoduct в массив Cart
					Array.prototype.push.apply(Cart, newProduct);
				}
				//добавляем в localStorage полученный массив Cart приведенный к стрковому формату
				localStorage.setItem('Cart', JSON.stringify(Cart));
					
				}
		}
    let localCart = JSON.parse(localStorage.getItem('Cart'));
   

    function func() {
          let elemInput = document.getElementsByClassName('cls');
          let sum = 0;
          let summass = 0;
          for (let i = 0; i < elemInput.length; i++) {
            sum += +localCart[i].carb/100*elemInput[i].value/12;
          
            summass += +elemInput[i].value;
          }
          let  sumElem = document.getElementById('sum');
          sumElem.value = Math.floor(sum * 100) / 100 ;
          let s = sum/summass*100;
          let percentElement = document.getElementById('percent');
          percentElement.value = Math.floor(s * 10) / 10;
         
        } 

  document.addEventListener ('click', event=>{      //определяем событие click для объекта document
	
    const element = event.target;                 //событие event аргумент функции, которая присваивает const element результат метода target
	 
      if (element.className ==="hint p-2"){            //если элемент имеет className ==="alert"
        
          //функция добавляет в localStorage элемент с событием 'click'
          addToCart(element.id, element.name, element.value);
       
            // далее запускается анимация
            element.style.animationPlayState = 'running';
            //слушаем: когда анимация закончится элемент получит событие animationend 
            element.addEventListener ('animationend', ()=>{
            //стрелочная функция запускает встроенный метод объекта element и элемент удаляется со страницы
            element.remove();  
                                        
            });
        
		   //в массив localCart помещаем содержимое localStorage
		  localCart = JSON.parse(localStorage.getItem('Cart'));
				let count = document.querySelectorAll(".count");
					for(let i=0; i<count.length; i++){
					count[i].innerHTML = localCart.length;
					}
     
		  
	   }
   });
   
   
  
   
   let count = document.querySelectorAll(".count");
   		for(let i=0; i<count.length; i++){
			count[i].innerHTML = localCart.length;
		}
  
   // наименование продуктов и кл-во углеводов для карточки 
 /* let x = "";
for (let i = 0; i < localCart.length; i++) { 
	  x +=localCart[i].name+"--  "+localCart[i].carb+" углеводов<br>";   
}
document.getElementById("name").innerHTML = x;
**************************************** */

/*{
    nameCount += localCart[i].name+ "<br>";
    
	inputCount += localCart[i].input="<input id='input' class='cls' type='number' placeholder='грамм'>"+ "<br>";
};	
	document.getElementById("nameCount").innerHTML = nameCount;
    
	document.getElementById("inputCount").innerHTML = inputCount;


//************************************ 
   // далее запускается анимация
   element.style.animationPlayState = 'running';
   //слушаем: когда анимация закончится элемент получит событие animationend 
   element.addEventListener ('animationend', ()=>{
   //стрелочная функция запускает встроенный метод объекта element и элемент удаляется со страницы
   element.remove();                              
   })
  */
    

</script>
</html>
