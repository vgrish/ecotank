<!DOCTYPE html>
<html lang='ru' dir='ltr'>

{% block head -%}
<head>
	{% block head_link -%}
	<base href='{{ modx.config['site_url'] }}'/>
	<title>{{ modx.resource.longtitle?:modx.resource.pagetitle ~ ' / ' ~ modx.config['site_name'] }}</title>
	{% endblock %}

	{% block head_meta -%}
	<meta charset='{{ modx.config['modx_charset'] }}'>
	<meta http-equiv='X-UA-Compatible' content='IE=edge'>
	<meta name='viewport' content='width=device-width, initial-scale=1.0'>
	<meta name='description' content=''>
	<meta name='author' content=''>
	<meta name='yandex-verification' content='7e0dbfcc147739c0' />
	{% endblock %}

	{% block head_script -%}
	<link rel='stylesheet' href='{{ modx.config['ecotank_assets_url'] }}inc/css/uikit.min.css'>
	<link rel='stylesheet' href='{{ modx.config['ecotank_assets_url'] }}inc/css/main.css'>
	<link rel='stylesheet' href='{{ modx.config['ecotank_assets_url'] }}inc/css/base.css'>
	<link rel='stylesheet' href='{{ modx.config['ecotank_assets_url'] }}inc/css/tablesaw.css'>

	<script src='{{ modx.config['ecotank_assets_url'] }}inc/js/jquery.min.js'></script>
	<script src='{{ modx.config['ecotank_assets_url'] }}inc/js/uikit.min.js'></script>
	<script src='{{ modx.config['ecotank_assets_url'] }}inc/js/core/modal.min.js'></script>
	<script src='{{ modx.config['ecotank_assets_url'] }}inc/js/core/smooth-scroll.min.js'></script>
	<script src='{{ modx.config['ecotank_assets_url'] }}inc/js/components/lightbox.min.js'></script>
	<script src='{{ modx.config['ecotank_assets_url'] }}inc/js/ecotank.js'></script>
	<script src='{{ modx.config['ecotank_assets_url'] }}inc/js/tablesaw.js'></script>
	{% endblock %}

</head>
{% endblock %}

<body>

<div class='uk-container uk-container-center uk-padding-remove'>

	{% block header -%}
	<header>
		<div class='tm-showcase uk-width-1-1 uk-grid uk-grid-collapse'>
			<a class='uk-width-2-10' href='#tank' data-uk-smooth-scroll>
				<img src='{{ modx.config['ecotank_assets_url'] }}inc/img/elements/tank/septik-tank-1_big.png' alt=''
					 width='600' height='600'/>
				<p>Септик «Танк»</p>
			</a>
			<a class='uk-width-2-10' href='#bio' data-uk-smooth-scroll>
				<img src='{{ modx.config['ecotank_assets_url'] }}inc/img/elements/bio/septik_biotank4_big.png' alt=''
					 width='600' height='600'/>
				<p>Септик «Био-Танк»</p>
			</a>
			<a class='uk-width-2-10' href='#tankuni' data-uk-smooth-scroll>
				<img src='{{ modx.config['ecotank_assets_url'] }}inc/img/elements/uni/tankuni1_big.png' alt=''
					 width='600' height='600'/>
				<p>Септик «Танк-Универсал»</p>
			</a>
			<a class='uk-width-2-10' href='#microb' data-uk-smooth-scroll>
				<img src='{{ modx.config['ecotank_assets_url'] }}inc/img/elements/microb/septik_microb_450_big.png'
					 alt='' width='600' height='600'/>
				<p>Септик «Микроб»</p>
			</a>
			<a class='uk-width-2-10' href='#pogreb' data-uk-smooth-scroll>
				<img src='{{ modx.config['ecotank_assets_url'] }}inc/img/elements/pogreb/pogreb.png' alt='' width='271'
					 height='265'/>
				<p>Погреба</p>
			</a>
		</div>
		<div class='tm-number uk-width-1-1'>
			{{ modx.config['ecotank_phone'] }}, {{ modx.config['ecotank_phone2'] }}
		</div>
		<div class='tm-sale uk-width-1-1'>
			<p>
				{{ modx.resource.description }}
			</p>
		</div>
	</header>
	{% endblock %}

	<div class='main'>

		<h1 class='tm-title uk-margin-large-top uk-text-center tm-text-uppercase'>Септик ТАНК</h1>

		{% set ecotankTank = runSnippet("pdoResources",{
		"class":"ecotankTank",
		"includeContent":1,
		"limit":10,
		"totalVar":"total1",
		"sortby":"rank",
		"sortdir":"ASC",
		"return":"json"
		}) %}

		{% set ecotankTank = fromJson(ecotankTank) %}
		{#{ log(ecotankTank) }#}

		{%- for row in ecotankTank -%}

		{% if row.main %}
		<div class='tm-middle-present uk-grid uk-margin-large-bottom'>
			<div class='tm-image uk-width-1-1 uk-width-medium-5-10 uk-width-large-5-10 uk-position-relative'>
				<img src='{{ row.image }}' alt='{{ row.model }}'
					 width='600' height='600'/>
				{% if row.discount %}
				<span>{{ row.discount|number_format(0) }}%<br><small>скидка</small></span>
				{%- endif -%}
			</div>
			<div class='uk-width-1-1 uk-width-medium-5-10 uk-width-large-5-10'>
				<div class='empty-wrapper'>
					<p>{{ row.content }}</p>
				</div>
			</div>
		</div>
		<p class='tm-title celebrity uk-text-center'>от {{ row.price|number_format(0) }} рублей!</p>
		{% include 'chunk|et.sale' %}
		{%- endif -%}

		{%- if loop.first -%}
		<table class='tablesaw uk-margin-large-bottom' data-tablesaw-mode='columntoggle'>
			<thead>
			<tr>
				<th scope='col' data-tablesaw-sortable-col data-tablesaw-priority='persist'>&nbsp;</th>
				<th scope='col' data-tablesaw-sortable-col data-tablesaw-sortable-default-col>Модель</th>
				<th scope='col' data-tablesaw-sortable-col data-tablesaw-priority='2'>Кол-во,<br/>польз.чел.</th>
				<th scope='col' data-tablesaw-sortable-col data-tablesaw-priority='6'>Размеры<br/>(ДхШхВ),мм.</th>
				<th scope='col' data-tablesaw-sortable-col data-tablesaw-priority='5'>Объем,л.</th>
				<th scope='col' data-tablesaw-sortable-col data-tablesaw-priority='4'>Производ.<br/>л./сут.</th>
				<th scope='col' data-tablesaw-sortable-col data-tablesaw-priority='3'>Масса,кг.</th>
				<th scope='col' data-tablesaw-sortable-col data-tablesaw-priority='7'>Цена руб.</th>
				<th scope='col' data-tablesaw-sortable-col data-tablesaw-priority='1'>Цена с уст.</th>
			</tr>
			</thead>
			<tbody>
		{%- endif -%}

		<tr>
			<td class='img'>
				{%- if row.image -%}
				<a href='{{ row.image }}' data-uk-lightbox title=''>
					<img src='{{ row.ico }}'/>
				</a>
				{%- else -%}
				<img src='{{ row.ico }}'/>
				{%- endif -%}
			</td>
			<td class='title'><strong>{{ row.model }}</strong></td>
			<td>{{ row.number_of_users }}</td>
			<td>{{ row.size }}</td>
			<td>{{ row.volume|number_format(0) }}</td>
			<td>{{ row.power|number_format(0) }}</td>
			<td>{{ row.weight|number_format(0) }}</td>
			<td>{{ row.price|number_format(0) }}</td>
			<td>{{ (row.price + row.installing_price)|number_format(0) }}</td>
		</tr>

		{%- if loop.last -%}
			</tbody>
		</table>
		{%- endif -%}

		{%- endfor -%}


		<p class='tm-title uk-text-center' id='bio'>Био-Танк вертикальный</p>

		{% set ecotankBioTank1 = runSnippet("pdoResources",{
		"class":"ecotankBioTank",
		"includeContent":1,
		"limit":10,
		"totalVar":"total2",
		"sortby":"rank",
		"sortdir":"ASC",
		"return":"json",
		"where":'{"type":1}'
		}) %}

		{% set ecotankBioTank1 = fromJson(ecotankBioTank1) %}
		{#{ log(ecotankBioTank1) }#}

		{%- for row in ecotankBioTank1 -%}

		{% if row.main %}
		<div class='tm-middle-present uk-grid uk-margin-large-bottom'>
			<div class='tm-image uk-width-1-1 uk-width-medium-5-10 uk-width-large-5-10 uk-position-relative'>
				<img src='{{ row.image }}' alt='{{ row.model }}'
					 width='600' height='600'/>
				{% if row.discount %}
				<span>{{ row.discount|number_format(0) }}%<br><small>скидка</small></span>
				{%- endif -%}
			</div>
			<div class='uk-width-1-1 uk-width-medium-5-10 uk-width-large-5-10'>
				<div class='empty-wrapper'>
					<p>{{ row.content }}</p>
				</div>
			</div>
		</div>
		<p class='tm-title celebrity uk-text-center'>от {{ row.price|number_format(0) }} рублей!</p>
		{% include 'chunk|et.sale' %}
		{%- endif -%}

		{%- if loop.first -%}
		<table class='tablesaw uk-margin-large-bottom' data-tablesaw-mode='columntoggle'>
			<thead>
			<tr>
				<th scope='col' data-tablesaw-sortable-col data-tablesaw-priority='persist'>&nbsp;</th>
				<th scope='col' data-tablesaw-sortable-col data-tablesaw-sortable-default-col>Модель</th>
				<th scope='col' data-tablesaw-sortable-col data-tablesaw-priority='2'>Кол-во,<br/>польз.чел.</th>
				<th scope='col' data-tablesaw-sortable-col data-tablesaw-priority='6'>Размеры<br/>(ДхШхВ),мм.</th>
				<th scope='col' data-tablesaw-sortable-col data-tablesaw-priority='4'>Производ.<br/>л./сут.</th>
				<th scope='col' data-tablesaw-sortable-col data-tablesaw-priority='3'>Масса,кг.</th>
				<th scope='col' data-tablesaw-sortable-col data-tablesaw-priority='7'>Цена руб.</th>
				<th scope='col' data-tablesaw-sortable-col data-tablesaw-priority='1'>Цена с уст.</th>
			</tr>
			</thead>
			<tbody>
			{%- endif -%}

			<tr>
				<td class='img'>
					{%- if row.image -%}
					<a href='{{ row.image }}' data-uk-lightbox title=''>
						<img src='{{ row.ico }}'/>
					</a>
					{%- else -%}
					<img src='{{ row.ico }}'/>
					{%- endif -%}
				</td>
				<td class='title'><strong>{{ row.model }}</strong></td>
				<td>{{ row.number_of_users }}</td>
				<td>{{ row.size }}</td>
				<td>{{ row.power|number_format(0) }}</td>
				<td>{{ row.weight|number_format(0) }}</td>
				<td>{{ row.price|number_format(0) }}</td>
				<td>{{ (row.price + row.installing_price)|number_format(0) }}</td>
			</tr>

			{%- if loop.last -%}
			</tbody>
		</table>
		{%- endif -%}

		{%- endfor -%}

		<p class='tm-title uk-text-center'>Био-Танк горизонтальный</p>

		{% set ecotankBioTank2 = runSnippet("pdoResources",{
		"class":"ecotankBioTank",
		"includeContent":1,
		"limit":10,
		"totalVar":"total3",
		"sortby":"rank",
		"sortdir":"ASC",
		"return":"json",
		"where":'{"type":2}'
		}) %}

		{% set ecotankBioTank2 = fromJson(ecotankBioTank2) %}
		{#{ log(ecotankBioTank2) }#}

		{%- for row in ecotankBioTank2 -%}

		{% if row.main %}
		<div class='tm-middle-present uk-grid uk-margin-large-bottom'>
			<div class='tm-image uk-width-1-1 uk-width-medium-5-10 uk-width-large-5-10 uk-position-relative'>
				<img src='{{ row.image }}' alt='{{ row.model }}'
					 width='600' height='600'/>
				{% if row.discount %}
				<span>{{ row.discount|number_format(0) }}%<br><small>скидка</small></span>
				{%- endif -%}
			</div>
			<div class='uk-width-1-1 uk-width-medium-5-10 uk-width-large-5-10'>
				<div class='empty-wrapper'>
					<p>{{ row.content }}</p>
				</div>
			</div>
		</div>
		<p class='tm-title celebrity uk-text-center'>от {{ row.price|number_format(0) }} рублей!</p>
		{% include 'chunk|et.sale' %}
		{%- endif -%}

		{%- if loop.first -%}
		<table class='tablesaw uk-margin-large-bottom' data-tablesaw-mode='columntoggle'>
			<thead>
			<tr>
				<th scope='col' data-tablesaw-sortable-col data-tablesaw-priority='persist'>&nbsp;</th>
				<th scope='col' data-tablesaw-sortable-col data-tablesaw-sortable-default-col>Модель</th>
				<th scope='col' data-tablesaw-sortable-col data-tablesaw-priority='2'>Кол-во,<br/>польз.чел.</th>
				<th scope='col' data-tablesaw-sortable-col data-tablesaw-priority='6'>Размеры<br/>(ДхШхВ),мм.</th>
				<th scope='col' data-tablesaw-sortable-col data-tablesaw-priority='4'>Производ.<br/>л./сут.</th>
				<th scope='col' data-tablesaw-sortable-col data-tablesaw-priority='3'>Масса,кг.</th>
				<th scope='col' data-tablesaw-sortable-col data-tablesaw-priority='7'>Цена руб.</th>
				<th scope='col' data-tablesaw-sortable-col data-tablesaw-priority='1'>Цена с уст.</th>
			</tr>
			</thead>
			<tbody>
			{%- endif -%}

			<tr>
				<td class='img'>
					{%- if row.image -%}
					<a href='{{ row.image }}' data-uk-lightbox title=''>
						<img src='{{ row.ico }}'/>
					</a>
					{%- else -%}
					<img src='{{ row.ico }}'/>
					{%- endif -%}
				</td>
				<td class='title'><strong>{{ row.model }}</strong></td>
				<td>{{ row.number_of_users }}</td>
				<td>{{ row.size }}</td>
				<td>{{ row.power|number_format(0) }}</td>
				<td>{{ row.weight|number_format(0) }}</td>
				<td>{{ row.price|number_format(0) }}</td>
				<td>{{ (row.price + row.installing_price)|number_format(0) }}</td>
			</tr>

			{%- if loop.last -%}
			</tbody>
		</table>
		{%- endif -%}

		{%- endfor -%}


		<p class='tm-title uk-text-center' id='tankuni'>Танк-Универсал</p>

		{% set ecotankUniTank = runSnippet("pdoResources",{
		"class":"ecotankUniTank",
		"includeContent":1,
		"limit":10,
		"totalVar":"total4",
		"sortby":"rank",
		"sortdir":"ASC",
		"return":"json"
		}) %}

		{% set ecotankUniTank = fromJson(ecotankUniTank) %}
		{#{ log(ecotankUniTank) }#}

		{%- for row in ecotankUniTank -%}

		{% if row.main %}
		<div class='tm-middle-present uk-grid uk-margin-large-bottom'>
			<div class='tm-image uk-width-1-1 uk-width-medium-5-10 uk-width-large-5-10 uk-position-relative'>
				<img src='{{ row.image }}' alt='{{ row.model }}'
					 width='600' height='600'/>
				{% if row.discount %}
				<span>{{ row.discount|number_format(0) }}%<br><small>скидка</small></span>
				{%- endif -%}
			</div>
			<div class='uk-width-1-1 uk-width-medium-5-10 uk-width-large-5-10'>
				<div class='empty-wrapper'>
					<p>{{ row.content }}</p>
				</div>
			</div>
		</div>
		<p class='tm-title celebrity uk-text-center'>от {{ row.price|number_format(0) }} рублей!</p>
		{% include 'chunk|et.sale' %}
		{%- endif -%}

		{%- if loop.first -%}
		<table class='tablesaw uk-margin-large-bottom' data-tablesaw-mode='columntoggle'>
			<thead>
			<tr>
				<th scope='col' data-tablesaw-sortable-col data-tablesaw-priority='persist'>&nbsp;</th>
				<th scope='col' data-tablesaw-sortable-col data-tablesaw-sortable-default-col>Модель</th>
				<th scope='col' data-tablesaw-sortable-col data-tablesaw-priority='2'>Кол-во,<br/>польз.чел.</th>
				<th scope='col' data-tablesaw-sortable-col data-tablesaw-priority='6'>Размеры<br/>(ДхШхВ),мм.</th>
				<th scope='col' data-tablesaw-sortable-col data-tablesaw-priority='4'>Производ.<br/>л./сут.</th>
				<th scope='col' data-tablesaw-sortable-col data-tablesaw-priority='3'>Масса,кг.</th>
				<th scope='col' data-tablesaw-sortable-col data-tablesaw-priority='7'>Цена руб.</th>
				<th scope='col' data-tablesaw-sortable-col data-tablesaw-priority='1'>Цена с уст.</th>
			</tr>
			</thead>
			<tbody>
			{%- endif -%}

			<tr>
				<td class='img'>
					{%- if row.image -%}
					<a href='{{ row.image }}' data-uk-lightbox title=''>
						<img src='{{ row.ico }}'/>
					</a>
					{%- else -%}
					<img src='{{ row.ico }}'/>
					{%- endif -%}
				</td>
				<td class='title'><strong>{{ row.model }}</strong></td>
				<td>{{ row.number_of_users }}</td>
				<td>{{ row.size }}</td>
				<td>{{ row.power|number_format(0) }}</td>
				<td>{{ row.weight|number_format(0) }}</td>
				<td>{{ row.price|number_format(0) }}</td>
				<td>{{ (row.price + row.installing_price)|number_format(0) }}</td>
			</tr>

			{%- if loop.last -%}
			</tbody>
		</table>
		{%- endif -%}

		{%- endfor -%}



		<p class='tm-title uk-text-center' id='microb'>Микроб</p>

		{% set ecotankMicrob = runSnippet("pdoResources",{
		"class":"ecotankMicrob",
		"includeContent":1,
		"limit":10,
		"totalVar":"total5",
		"sortby":"rank",
		"sortdir":"ASC",
		"return":"json"
		}) %}

		{% set ecotankMicrob = fromJson(ecotankMicrob) %}
		{#{ log(ecotankMicrob) }#}

		{%- for row in ecotankMicrob -%}

		{% if row.main %}
		<div class='tm-middle-present uk-grid uk-margin-large-bottom'>
			<div class='tm-image uk-width-1-1 uk-width-medium-5-10 uk-width-large-5-10 uk-position-relative'>
				<img src='{{ row.image }}' alt='{{ row.model }}'
					 width='600' height='600'/>
				{% if row.discount %}
				<span>{{ row.discount|number_format(0) }}%<br><small>скидка</small></span>
				{%- endif -%}
			</div>
			<div class='uk-width-1-1 uk-width-medium-5-10 uk-width-large-5-10'>
				<div class='empty-wrapper'>
					<p>{{ row.content }}</p>
				</div>
			</div>
		</div>
		<p class='tm-title celebrity uk-text-center'>от {{ row.price|number_format(0) }} рублей!</p>
		{% include 'chunk|et.sale' %}
		{%- endif -%}

		{%- if loop.first -%}
		<table class='tablesaw uk-margin-large-bottom' data-tablesaw-mode='columntoggle'>
			<thead>
			<tr>
				<th scope='col' data-tablesaw-sortable-col data-tablesaw-priority='persist'>&nbsp;</th>
				<th scope='col' data-tablesaw-sortable-col data-tablesaw-sortable-default-col>Модель</th>
				<th scope='col' data-tablesaw-sortable-col data-tablesaw-priority='6'>Размеры<br/>(ДхШхВ),мм.</th>
				<th scope='col' data-tablesaw-sortable-col data-tablesaw-priority='4'>Производ.<br/>л./сут.</th>
				<th scope='col' data-tablesaw-sortable-col data-tablesaw-priority='3'>Масса,кг.</th>
				<th scope='col' data-tablesaw-sortable-col data-tablesaw-priority='7'>Цена руб.</th>
				<th scope='col' data-tablesaw-sortable-col data-tablesaw-priority='1'>Цена с уст.</th>
			</tr>
			</thead>
			<tbody>
			{%- endif -%}

			<tr>
				<td class='img'>
					{%- if row.image -%}
					<a href='{{ row.image }}' data-uk-lightbox title=''>
						<img src='{{ row.ico }}'/>
					</a>
					{%- else -%}
					<img src='{{ row.ico }}'/>
					{%- endif -%}
				</td>
				<td class='title'><strong>{{ row.model }}</strong></td>
				<td>{{ row.size }}</td>
				<td>{{ row.power|number_format(0) }}</td>
				<td>{{ row.weight|number_format(0) }}</td>
				<td>{{ row.price|number_format(0) }}</td>
				<td>{{ (row.price + row.installing_price)|number_format(0) }}</td>
			</tr>

			{%- if loop.last -%}
			</tbody>
		</table>
		{%- endif -%}

		{%- endfor -%}



		<p class='tm-title uk-text-center' id='pogreb'>Погреб - Прямоугольный</p>

		{% set ecotankPogreb = runSnippet("pdoResources",{
		"class":"ecotankPogreb",
		"includeContent":1,
		"limit":10,
		"totalVar":"total6",
		"sortby":"rank",
		"sortdir":"ASC",
		"return":"json",
		"where":'{"type":2}'
		}) %}

		{% set ecotankPogreb = fromJson(ecotankPogreb) %}
		{#{ log(ecotankPogreb) }#}

		{%- for row in ecotankPogreb -%}

		{% if row.main %}
		<div class='tm-middle-present uk-grid uk-margin-large-bottom'>
			<div class='tm-image uk-width-1-1 uk-width-medium-5-10 uk-width-large-5-10 uk-position-relative'>
				<img src='{{ row.image }}' alt='{{ row.model }}'
					 width='300' height='300'/>
				{% if row.discount %}
				<span>{{ row.discount|number_format(0) }}%<br><small>скидка</small></span>
				{%- endif -%}
			</div>
			<div class='uk-width-1-1 uk-width-medium-5-10 uk-width-large-5-10'>
				<div class='empty-wrapper'>
					<p>{{ row.content }}</p>
				</div>
			</div>
		</div>
		<p class='tm-title celebrity uk-text-center'>от {{ row.price|number_format(0) }} рублей!</p>
		{% include 'chunk|et.sale' %}
		{%- endif -%}

		{%- if loop.first -%}
		<table class='tablesaw uk-margin-large-bottom' data-tablesaw-mode='columntoggle'>
			<thead>
			<tr>
				<th scope='col' data-tablesaw-sortable-col data-tablesaw-priority='persist'>&nbsp;</th>
				<th scope='col' data-tablesaw-sortable-col data-tablesaw-sortable-default-col>Модель</th>
				<th scope='col' data-tablesaw-sortable-col data-tablesaw-priority='6'>Размеры<br/>(ДхШхВ),мм.</th>
				<th scope='col' data-tablesaw-sortable-col data-tablesaw-priority='7'>Цена руб.</th>
				<th scope='col' data-tablesaw-sortable-col data-tablesaw-priority='1'>Цена с уст.</th>
			</tr>
			</thead>
			<tbody>
			{%- endif -%}

			<tr>
				<td class='img'>
					{%- if row.image -%}
					<a href='{{ row.image }}' data-uk-lightbox title=''>
						<img src='{{ row.ico }}'/>
					</a>
					{%- else -%}
					<a href='#' data-uk-lightbox title=''>
					</a></td>
					{%- endif -%}
				</td>
				<td class='title'><strong>{{ row.model }}</strong></td>
				<td>{{ row.size }}</td>
				<td>{{ row.price|number_format(0) }}</td>
				<td>{{ (row.price + row.installing_price)|number_format(0) }}</td>
			</tr>

			{%- if loop.last -%}
			</tbody>
		</table>
		{%- endif -%}

		{%- endfor -%}

		<p class='tm-title uk-text-center' >Погреб - Цилиндрический</p>

		{% set ecotankPogreb = runSnippet("pdoResources",{
		"class":"ecotankPogreb",
		"includeContent":1,
		"limit":10,
		"totalVar":"total7",
		"sortby":"rank",
		"sortdir":"ASC",
		"return":"json",
		"where":'{"type":1}'
		}) %}

		{% set ecotankPogreb = fromJson(ecotankPogreb) %}
		{#{ log(ecotankPogreb) }#}

		{%- for row in ecotankPogreb -%}

		{% if row.main %}
		<div class='tm-middle-present uk-grid uk-margin-large-bottom'>
			<div class='tm-image uk-width-1-1 uk-width-medium-5-10 uk-width-large-5-10 uk-position-relative'>
				<img src='{{ row.image }}' alt='{{ row.model }}'
					 width='300' height='300'/>
				{% if row.discount %}
				<span>{{ row.discount|number_format(0) }}%<br><small>скидка</small></span>
				{%- endif -%}
			</div>
			<div class='uk-width-1-1 uk-width-medium-5-10 uk-width-large-5-10'>
				<div class='empty-wrapper'>
					<p>{{ row.content }}</p>
				</div>
			</div>
		</div>
		<p class='tm-title celebrity uk-text-center'>от {{ row.price|number_format(0) }} рублей!</p>
		{% include 'chunk|et.sale' %}
		{%- endif -%}

		{%- if loop.first -%}
		<table class='tablesaw uk-margin-large-bottom' data-tablesaw-mode='columntoggle'>
			<thead>
			<tr>
				<th scope='col' data-tablesaw-sortable-col data-tablesaw-priority='persist'>&nbsp;</th>
				<th scope='col' data-tablesaw-sortable-col data-tablesaw-sortable-default-col>Модель</th>
				<th scope='col' data-tablesaw-sortable-col data-tablesaw-priority='6'>Размеры<br/>(ДхШхВ),мм.</th>
				<th scope='col' data-tablesaw-sortable-col data-tablesaw-priority='7'>Цена руб.</th>
				<th scope='col' data-tablesaw-sortable-col data-tablesaw-priority='1'>Цена с уст.</th>
			</tr>
			</thead>
			<tbody>
			{%- endif -%}

			<tr>
				<td class='img'>
					{%- if row.image -%}
					<a href='{{ row.image }}' data-uk-lightbox title=''>
						<img src='{{ row.ico }}'/>
					</a>
					{%- else -%}
					<a href='#' data-uk-lightbox title=''>
					</a></td>
				{%- endif -%}
				</td>
				<td class='title'><strong>{{ row.model }}</strong></td>
				<td>{{ row.size }}</td>
				<td>{{ row.price|number_format(0) }}</td>
				<td>{{ (row.price + row.installing_price)|number_format(0) }}</td>
			</tr>

			{%- if loop.last -%}
			</tbody>
		</table>
		{%- endif -%}

		{%- endfor -%}


	</div>
	<footer>
		<div class='tm-number uk-width-1-1'>
			{{ modx.config['ecotank_phone'] }}, {{ modx.config['ecotank_phone2'] }}
		</div>
		<div class='tm-text'>
			{{ modx.resource.introtext }}
		</div>
		<div class='tm-extra'>
			<p class='name'>@ {{ modx.config['site_name'] }}</p>
			<p class='date'>2016</p>
			<span class='uk-clearfix'> </span>
		</div>
		<small>
			<code>{{ getInfo() }}</code>
		</small>
	</footer>

</div>

<div id='modal' class='uk-modal'>
	<div style='' class='uk-modal-dialog'>
		<a class='uk-modal-close uk-close'></a>

		{{ runSnippet("!mf.form", {
		"tplForm":"et.form.order",
		"tplModal":"",
		"selector": ".mfform",
		"validation": '{
			"rules": {
				"name": {
					"required": true
				},
				"phone": {
					"required": true,
					"customphone": true
				}
			},
			"messages": {
				"name": {
					"required": "Пожалуйста введите имя"
				},
				"phone": {
					"required": "Пожалуйста укажите телефон",
					"customphone": "Пожалуйста укажите правильный телефон"
				}
			},
			"error": {
				"label": true
			}
		}',
		"inputmask":'{
			"phone": {
				"mask":"+7(999)999-99-99",
				"showMaskOnHover": false
			}
		}',
		"modal":'{"center":true}',
		"frontendJs":modx.config['ecotank_assets_url'] ~ 'app/modforms/js/web/default.js'
		})
		}}
	</div>
</div>

{% include 'chunk|et.metrika' %}

</body>
</html>