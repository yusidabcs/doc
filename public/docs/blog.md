# Blog

- [Basic](#basic)
- [index.blade.php](#index)
- [show.blade.php](#show)

<a name="basic"></a>
## Basic 

Halaman blog berfungsi untuk menampilkan list blog dan detail blog di tema kamu. Secara umum blog dapat dibedakan menjadi 2 bagian, pertama adalah index dimana berfungsi untuk menampilkan list dari blog/artikel yang dibuat. Yang kedua adalah show yang berfungsi untuk menampilkan detail dari sebuah artikel. 

<a name="index"></a>
## index.blade.php

Fungsi dari file ini adalah untuk menampilkan list blog pada tema anda. Adapun beberapa variable yang bisa anda gunakan untuk dalam halaman ini.

`$categoryList` variable yang menampung semua kategori blog. Adapun object dari $categorylist yang dapat anda gunakan antara lain:

	->id : id dari kategori blog
	->nama : nama/judul dari kategori blog

Untuk membuat link ke halaman detail blog anda dapat menggunakan helper `generateSlug()` dan `class URL` untuk membuat url secara otomatis. 

	URL::to('blog/category/'.generateSlug($value))

	//perlu di perhatikan untuk format urlnya yaitu : blog/category/slug-category-disini untuk menghindari error atau page not found

**Contoh penggunaan dan pemanggilan $categorylist di tema**
	
	Blog Category
	<ul>
      @foreach($categoryList as $key=>$value)
        <li>
        <a href="{{URL::to('blog/category/'.generateSlug($value))}}">{{$value->nama}}</a>
        </li>             
      @endforeach              
    </ul>

`$blogList` variable yang menampung semua blog, default jumlah blog yang ditampilkan adalah 4.

**Object dari $bloglist**
	
	->id : id dari kategori blog
	->judul : nama/judul dari kategori blog
	->author : collection yang berisi detail author dari blog tersebut
	->tags : tags dari blog
	->isi : isi dari blog
	->kategori : collection yang berisi detail kategori dari blog tersebut
	->slug : slug yang digunakan sebagai pembuat url
	->created_at
	->updated_at

**Contoh penggunaan dan pemanggilan $bloglist di tema**
	
	<h1>Blog</h1>   

    @foreach($bloglist as $key=>$value)

    <article>
      <a href={{"'".URL::to("blog/".$value->slug)."'"}}><h2>{{$value->judul}}</h2></a>
      <p>
      {{waktu($value->updated_at)}} | oleh: {{$value->authors->nama}}
      </p>
      {{substr($value->isi,0,250)}}
      <p><a href={{"'".URL::to("blog/".$value->slug)."'"}} class="theme">Baca Selengkapnya →</a></p>
    </article>        

    @endforeach 

However, you may also specify filters from within your controller:

	class UserController extends BaseController {

		/**
		 * Instantiate a new UserController instance.
		 */
		public function __construct()
		{
			$this->beforeFilter('auth');

			$this->beforeFilter('csrf', array('on' => 'post'));

			$this->afterFilter('log', array('only' =>
								array('fooAction', 'barAction')));
		}

	}


<a name="show"></a>
## show.blade.php

fungsi dari file ini adalah untuk menampilkan halaman detail blog yang akan kamu buat. Dihalaman ini kamu dapat mengakses beberapa varible yang dapat kamu gunakan yaitu:

`$detailblog` : varible ini menampung detail informasi blog, `$tag` : varible ini merupakan tags dari detail blog tersebut. 
            `categoryList` : varible ini menampung collection blog kategori, `next` : variable ini menampung infomasi tentang halaman blog selanjutnya. `prev` : variable yang menampung halaman blog sebelumnya. `fbcomment` dan `fbscript` merupakan varible yang dapat kamu gunakan jika ingin menambah halaman comment di detail blog kamu.

**Contoh Halaman Detail Blog**

	<h1>{{$detailblog->judul}}</h1>          
     {{$detailblog->isi}}
    <div class="buttons">
      @if($next!=null)
      <div class="right"><a class="button" href="{{$next->slug}}">Selanjutnya &rarr;</a></div>
      @endif
      @if($prev!=null)
      <div class="left"><a class="button" href="{{$prev->slug}}">&larr; Sebelumnya</a></div>
      @endif
    </div>
    <h1>Comments</h1>
    {{$fbscript}}
    {{$fbcomment}}           