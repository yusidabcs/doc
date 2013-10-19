# Layout Tema / Template

- [Pengenalan](#pengenalan)
- [Penjelasan](#penjelasan)

<a name="pengenalan"></a>
## Introduction
Secara umum sistem template yang digunakan di jarvis store dapat dipisahkan menjadi beberapa bagian utama yang harus diikuti.

**Susunan Layout Tema**

	Root Tema
		- assets
		- layouts
		- partials
		- views
			- blog
			- checkout
			- contact
			- halaman
			- home
			- member
			- produk
			- search
			- service
			- testimonial
		- widget
		- config.php
		- youricon.jpg
		- yourthemeimage.jpg

<a name="penjelasan"></a>
## Penjelasan

###1. Assets folder
Didalam assets ini merupakan tempat semua file-file yang dibutuhkan oleh tema yang anda buat yang meliputi file-file css, file-file javascript, file-file gambar yang digunakan dalam tema anda.

**Sususan di Dalam assets Folder**

	Assets Folder
		- css : folder untuk tempat semua file css/style tema kamu
		- images : folder untuk tempat semua file gambar yang dibutuhkan tema anda
		- js : folder untuk tempat semua file-file javascript yang dibutuhkan tema anda

*note : pastikan semua images yang di file css sudah mengarah ke folder image.
###2. Layouts Folder
Didalam layout folder akan berisi layout utama dari tema yang anda buat, penjelasan mengenai filefile layout akan dijelaskan secara detail di bagian layout.

###3. Partials Folder
Di dalam folder partials berisi file-file yang merupakan potongan-potongan tema yang anda buat. Susunan file di dalam folder partials dapat dilihat seperti di bawah ini.

**Susunan folder di dalam views folder**

	Partials Folder
		- analytic.blade.php
		- defaultcss.blade.php
		- defaultjs.blade.php
		- footer.blade.php
		- header.blade.php
		- seostuff.blade.php
		- slider.blade.php

Penjelasan mengenai masing-masing file diatas akan dijelaskan lebih detail di bagian partials.

###4. Views Folder
Di folder ini merupakan tempat semua tampilan yang ada di dalam tema anda. Berikut adalah susunan folder di dalam folder views.

**Susunan folder di dalam views folder**

	Views Folder
		- blog
		- checkout
		- contact
		- halaman
		- home
		- member
		- produk
		- search
		- service
		- testimonial

###5. Widgets Folder
Didalam folder widget berisi widget-widget tambahan yang dapat digunakan di dalam tema anda. Untuk saat ini widget yang baru tersedia adalah shopping cart.

**Susunan file di dalam widgets folder**

	Widgets Folder
		- shopingcart.blade.php
