# Partials

- [Introduction](#introduction)
- [anaytic.blade.php](#analytic)
- [defaultcss.blade.php](#defaultcss)
- [defaultjs.blade.php](#defaultjs)
- [header.blade.php](#header)
- [footer.blade.php](#footer)
- [slider.blade.php](#slider)
- [seostuff.blade.php](#seostuff)


<a name="introduction"></a>
## Introduction

Partials atau bisa disebut dengan part merupakan potongan-potongan dari tema yang anda buat yang nanti akan dirender ke dalam layout tema yang sudah anda buat. Ada beberapa file di dalam partials yang harus anda sediakan agar tema yang anda buat dapat berfungsi dengan baik yaitu `anaytic.blade.php`, `defaultcss.blade.php`, `defaultjs.blade.php`, `header.blade.php`, `footer.blade.php`, `slider.blade.php`, dan `seostuff.blade.php`.

<a name="analytic"></a>
### analytic.blade.php
file ini berfungsi untuk menampilkan google analytic script.

**Isi file anlytic.blade.php**

	{{$analytic}}

<a name="defaultcss"></a>
### defaultcss.blade.php
file ini berfungsi untuk menampilkan file-file css yang ada di tema yang kamu buat.

**Contoh file defaultcss.blade.php**

	{{HTML::style('themes/tender/assets/css/bootstrap.min.css')}}
	{{HTML::style('themes/tender/assets/css/font.css')}}

Cara untuk memanggil file css anda dengan tag : `HTML::style('themes/namatemakamu/assets/css/namastylekamu.css')`.

<a name="defaultjs"></a>
### defaultjs.blade.php
file ini berfungsi untuk menampilkan file-file javascript yang ada di tema yang kamu buat.

**Contoh file defaultjs.blade.php**

	{{HTML::script("themes/ustore/assets/js/jquery.js")}}
	{{HTML::script("themes/ustore/assets/js/jquery.nivo.slider.pack.js")}}
	{{HTML::script("themes/ustore/assets/js/jquery.jcarousel.min.js")}}
	{{HTML::script("themes/ustore/assets/js/tabs.js")}}

Cara untuk mengembed file-file javascript anda adalah dengan tag : `HTML::script('themes/namatemakamu/assets/js/namajavascriptkamu.js')`.

<a name="header"></a>
### header.blade.php
 File header biasanya meliputi bagian-bagian atas dari tema yang kamu mau buat. Didalam header ini juga merupakan tempat bagi keranjang belanja, menu utama dari tema kamu, logo dari toko online dan juga bisa digunakan untuk tempat link-link untuk login dan member information.

**Contoh file header.blade.php**

	<header class="header-top-main">
	    <section class="header-top">

	    //DI PART INI ADALAH BAGIAN UNTUK LINK MEMBER / ACCOUMNT /LOGIN/LOGOUT
	    @if (Sentry::check())
				<div id="welcome">Selamat datang {{Sentry::getUser()->nama}}, {{HTML::link('member', 'Akun')}} | {{HTML::link('order-history', 'Order History' )}} | {{HTML::link('logout', 'logout')}}</div>
			@else
				<div id="welcome">Selamat datang! Silakan {{HTML::link('member', 'Login disini')}} atau {{HTML::link('member/create', 'Register')}}.</div>
			@endif      
	      <!--<div id="currency"> <a title="US Dollar"><b>$</b></a> <a title="Euro">€</a> <a title="Pound Sterling">£</a> </div>-->
	      <div id="language"> 
	      
	      </div>

	      //CONTOH PEMANGGILAN KERANJANG BELANJA
	      <!-- Mini Cart Start-->
	      <div id='shoppingcartplace'>
	      	{{$ShoppingCart}}      
	  	  </div>
	      <!-- Mini Cart End-->
	      <div class="clear"></div>
	    </section>
	    <section id="header-main">
	      <div id="header">


	      //FILE INI DAPAT DIGUNAKAN UNTUK MENAMPILKAN LOGO TOKO
	        <div id="logo"><a href="{{URL::to('home')}}"><img src="{{URL::to(getPrefixDomain().'/galeri/'.$toko->logo)}}" alt="" /></div>


	        //BAGIAN INI MERUPAKAN MENU UTAMA
	        <div class="links"> 
	        	@foreach($mainMenu as $key=>$link)
					@if($link->halaman=='1')
						<a href={{"'".URL::to("halaman/".strtolower($link->linkTo))."'"}}>{{$link->nama}}</a>
					@elseif($link->url=='1')
						<a href={{"'".URL::to('http://'.strtolower($link->linkTo))."'"}}>{{$link->nama}}</a>
					@else
						<a href={{"'".URL::to(strtolower($link->linkTo))."'"}}>{{$link->nama}}</a>
					@endif
				@endforeach
	        </div>

	        //SEBUAH SEARCHING FORM JUGA BISA DITEMPATKAN DIFILE INI
	        <div id="search">
	          <div class="button-search"></div>
	          <form action="{{URL::to('search')}}"  method="post">
	          		<input type="text" value="" placeholder="Cari Produk" id="filter_name" name="search">
	          </form>
	        </div>
	      </div>
	    </section>

	    //SELAIN MENU UTAMA, KALIAN JUGA BISA MEMBUAT MENU DENGAN LIST KATEGORI PRODUK
	    <!-- Main Navigation Start-->
	    <nav class="menu-main">
	      <h3 class="menuarrow"><span>Menu</span></h3>
	      <div id="menu">
	        <ul>
	          @foreach($katMenu as $key=>$menu)
	          	@if($menu->parent=='0')
		          <li><a href={{URL::to('category/'.$menu->id.'-'.Str::slug($menu->nama))}}>{{$menu->nama}}</a>
		          	@if($menu->anak->count()!=0)
		          	<div>
			            <ul>
		          	@foreach($katMenu as $key=>$submenu)                                
		                @if($menu->id==$submenu->parent)		            
			                <li><a href={{URL::to('category/'.$menu->id.'-'.Str::slug($submenu->nama))}}>{{$submenu->nama}}</a></li>
			            @endif
		            @endforeach
		               </ul>
			        </div>	
			        @endif
		          </li>
		        @endif
	          @endforeach                    
	        </ul>
	      </div>
	    </nav>
	    <!-- Main Navigation Start-->
	 </header>


Contoh di atas merupakan part-part yang dapat anda isi di dalam file header tema anda.

<a name="footer"></a>
### foter.blade.php
 File footer biasanya meliputi bagian-bagian bawah/bottom dari tema yang kamu mau buat. Di dalam file footer ini anda bisa menampilkan informasi-informasi tambahan seperti quick link, informasi kontak, tentang toko, list testimonial, trademark dan copyright dan juga social media.

**Contoh file footer.blade.php**


	<footer>
		<div class="container">
			<section class="row foot">

			//CONTOH QUICK LINK
			@foreach($tautan as $key=>$group)
            @if($key==0 || $key>2)
            @else
			<article class="span3">
					<strong>{{$group->nama}}</strong>
					<ul>
						@foreach($quickLink as $key=>$link)
				            @if($group->id==$link->tautanId)
							<li>
								@if($link->halaman=='1')
									<a href={{"'".URL::to("halaman/".strtolower($link->linkTo))."'"}}>{{$link->nama}}</a>
								@elseif($link->url=='1')
									<a href="http://{{strtolower($link->linkTo)}}">{{$link->nama}}</a>
								@else
									<a href={{"'".URL::to(strtolower($link->linkTo))."'"}}>{{$link->nama}}</a>
								@endif
							</li>
							@endif
						@endforeach
						<!-- <li><a href="#">About Us</a></li>
						<li><a href="#">Privacy</a></li>
						<li><a href="#">Returns Policies</a></li>
						<li><a href="#">News</a></li>
						<li><a href="#">Feedback</a></li>
						<li><a href="#">Contact Us</a></li> -->
					</ul>
			</article>
			@endif
			@endforeach

			//CONTOH PENAMPILAN DAFTAR BLOG TERBARU 
			<article class="span3">
				<strong>Posting Terbaru</strong>
				<ul>
					@foreach ($blogBaru as $items)
						<li><a href="{{slugBlog($items)}}">{{$items->judul}}</a><br /><small>diposting pada {{waktu($items->created_at)}}</small></li>
					@endforeach
				</ul>
			</article>
			<!-- <article class="span3">
				<strong>Tweets</strong>
				<div id=""></div>
			</article> -->

			//SEBUAH FORM SUBSCRIBER DAN INFORMASI KONTAK
			<article class="span3">
				<strong>Newsletter</strong>
				<div>
					<form class="form-inline">
					<input class="input-medium" type="text" placeholder="Email address">
					<button class="btn"><i class="icon-direction"></i></button>
					</form>
				</div>
				@if($kontak->alamat!='')
					<address class="row-fluid">
						<div class="pull-left clabel"><i class="icon-location"></i></div>
						<div class="pull-left cdata">{{$kontak->alamat}}, {{$kota->nama}}</div>
					</address>
					<address class="row-fluid">
						<div class="pull-left clabel"><i class="icon-phone"></i></div>
						<div class="pull-left cdata">{{$kontak->telepon}}</div>
					</address>
					<address class="row-fluid">
						<div class="pull-left clabel"><i class="icon-mail"></i></div>
						<div class="pull-left cdata"><a href="#">{{$kontak->email}}</a></div>
					</address>
					<address class="row-fluid">
						<div class="pull-left clabel"><img src="{{URL::to('img/bbm.png')}}"></div>
						<div class="pull-left cdata"><a href="#">{{$kontak->bb}}</a></div>
					</address>
					<address class="row-fluid">
						<div class="pull-left clabel"></div>
						<div class="pull-left cdata"><a href="ymsgr:sendIM?{{$kontak->ym}}"><img src="http://opi.yahoo.com/online?u=hilmi_atiq&m=g&t=1" border="0"></a></div>					
					</address>
				@else
					<div></div>
				@endif
			</article>
		</section>

	</div>

	//INFORMASI PEMBAYARAN SEPERI BANK ATAU PAYPAL BISA ANDA TAMPILKAN DI SINI
	<section class="row-fluid doubleline">
			<div class="container">
			<div class="span6">
				<!-- <div class="payment amex"></div>
					<div class="payment mastercard"></div>

					<div class="payment visa"></div>

					<div class="payment paypal"></div>-->
				@foreach($bank as $value)
					<img style="" src="{{URL::to('img/'.$value->bankdefault->logo)}}" alt="" />
				@endforeach
			</div>
			</div>
		</section>

		<section class="row-fluid social">
			<div class="container">

			//TRADEMARK ATAU COPYRIGHT
			<div class="pull-left">&copy; 2012 {{ Theme::place('title') }}. Powered by <a href="http://jarvis-store.com">Jarvis Store</a> </div>


			//SOCIAL MEDIA 

			<div class="pull-right">
				<ul>
					@if($kontak->fb)
						<li><a href="{{$kontak->fb}}"><i class="icon-facebook"></i></a></li>
					@endif
					@if($kontak->tw)
						<li><a href="{{$kontak->tw}}"><i class="icon-twitter"></i></a></li>
					@endif
					@if($kontak->gp)
						<li><a href="{{$kontak->gp}}"><i class="icon-gplus"></i></a></li>
					@endif
					@if($kontak->pt)
						<li><a href="{{$kontak->pt}}"><i class="icon-pinterest"></i></a></li>
					@endif
					@if($kontak->tl)
						<li><a href="{{$kontak->tl}}"><i class="icon-tumblr"></i></a></li>
					@endif
					@if($kontak->ig)
						<li><a href="{{$kontak->ig}}"><i class="icon-instagrem"></i></a></li>
					@endif
				</ul>
			</div>
			</div>
		</section>
	</footer>


Contoh di atas merupakan part-part yang dapat anda isi di dalam file footer tema anda.

<a name="slider"></a>
### slider.blade.php

File ini dapat anda gunakan jika tema yang anda buat memiliki sebuah slideshow. Namun jika tema anda tidak memiliki slideshow anda bisa buat saja file slider.blade.php dan biarkan isinya kosong.


<a name="seostuff"></a>
### seostuff.blade.php

Coming soon.
