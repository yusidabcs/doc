# Layouts

- [Introduction](#introduction)
- [Example](#example)

<a name="introduction"></a>
## Introduction

Layout merupakan hal yang paling dasar dari tema yang anda buat. Dengan kata lain, layout merupakan kerangka dari tema yang anda buat. Template jarvis store dapat dibedakan menjadi 2 bagian utama, yaitu `default.blade.php` dan `namatemakamu.blade.php`.

<a name="example"></a>
## Example
Berikut adalah contoh isi sebuah layout dari tema kami.

****

	<!DOCTYPE html>
	<html lang="en">
	<head>
		<title>{{ Theme::place('title') }}</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="utf-8">
		<meta name="keywords" content="{{ Theme::place('keywords') }}">
		<meta name="description" content="{{ Theme::place('description') }}">
		{{ Theme::partial('defaultcss') }}
		{{ Theme::asset()->styles() }}
		{{ Theme::asset()->scripts() }}
	</head>
	<body>
		{{ Theme::partial('header') }}
		<div class="container">
			{{ Theme::place('content') }}
		</div>
		{{ Theme::partial('footer') }}
		{{ Theme::partial('defaultjs') }}
		{{ Theme::asset()->container('footer')->scripts() }}
	</body>
	{{ Theme::partial('analytic') }}
	</html>

Didalam layout inilah semua file-file assets, partials dan views akan di render. Jadi agar tema yang anda buat dapat berfungsi dengan baik maka anda harus mengikuti penulisan seperti yang di atas.`{{ Theme::place('content') }}` merupakan bagian utama dari layout anda dimana semua content dari tema yang anda buat akan ditampilkan di bagian tersebut.
