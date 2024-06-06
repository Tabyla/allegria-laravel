@extends('frontend.layouts.app')
@section('title', 'Бренды')

@section('additional_css')
    <link rel="stylesheet" href="{{ asset('css/brand.css') }}?v={{ time() }}">
@endsection
@section('content')
    <section class="first_brand_banner">
        <div class="banner_content">
            <div class="banner_text">
                <h2><span>бренд</span><br>american vintage</h2>
                <p class="brand_text">American Vintage - модная торговая марка по производству трикотажной одежды
                    для
                    мужчин и женщин. </p>
            </div>
        </div>
    </section>
    <section class="first_brand container">
        <div class="first_brand_context">
            <img src="{{asset('images/first-brand-image.png')}}" alt="model woman">
            <div class="first_brand_text">
                <h3>American vintage</h3>
                <p>Продукция также включает немногочисленные аксессуары в виде шарфов, ремней, шапок, а также
                    женских
                    сумок.<br>
                    Несмотря на название «American Vintage», бренд создан французом Мишель Азулэ.
                    Отличие бренда от других - это простота в исполнении изделий (минимализм) и 100% натуральные
                    ткани.
                    бренд сочетает в себе расслабленность южной Франции и простоту Америки. При создании одежды
                    используется очень тонкий высококачественный трикотаж, который дает ощущение «второй кожи».
                    Основная
                    цветовая гамма - это спокойные пастельные расцветки: ореховые, бежевые, желтые, серые и так
                    далее.<br>
                    На первый взгляд, кажется, что вещи просты в своем исполнении, но вся продукция от этой марки
                    выглядит очень стильно, оставляя без ума многих покупателей.
                </p>
            </div>
        </div>
        <img src="{{asset('images/first-brand-small-image.png')}}" alt="model woman">
    </section>
    <section class="second_brand_banner">
        <div class="banner_content">
            <div class="banner_text">
                <h2><span>бренд</span><br>deha</h2>
                <p class="brand_text">Бренд DEHA принадлежит компании Meeting Group SpA, которая является лидером на
                    итальянском рынке спортивной одежды премиум-класса. </p>
            </div>
        </div>
    </section>
    <section class="second_brand container">
        <div class="second_brand_content">
            <div class="second_brand_text">
                <h3>deha</h3>
                <p>Требование и суть коллекций DEHA-это чувство женственности, не показной, но подходящей всем
                    женщинам,
                    которые являются женами, матерями,<br> профессионалами, сексуальными, спортивными и веселыми
                    одновременно.<br>
                    Коллекции DEHA идеально подходят для ежедневных тренировок, но Deha – <br>больше, чем одежда для
                    спорта,
                    это удобная и естественная женственность на<br>каждый день. Это яркие струящиеся ткани, легкость
                    и
                    удобство.<br>
                    DEHA очень чутко относится к теме экологической устойчивости и защите <br>окружающей среды.
                    Поэтому
                    расширяет каждый сезон ассортимент одежды из органических натуральных волокон и переработанных
                    материалов, вносит свой <br>вклад в благосостояние планеты .
                </p>
            </div>
            <img src="{{asset('images/second-brand-image.png')}}" alt="model woman">
        </div>
        <img src="{{asset('images/second-brand-small-image.png')}}" alt="model woman" class="small-img">
    </section>
    <section class="third_banner">
        <div class="third_brand_title">
            <h2><span>бренд</span><br>george gina & lucy</h2>
            <p>Бренд основан в 2004 году недалеко от Франкфурта, когда супруги Николь Бейли и Николас Нойхаус вместе
                с
                Оливером Брюном выпустили свою первую и очень удачную коллекцию сумок, каждая из которых имела свое
                имя. </p>
        </div>
        <img src="{{asset('images/third-brand-bg.png')}}" alt="george gina & lucy models" class="third_brand_images">
    </section>
    <section class="third_brand container">
        <div class="third_brand_context">
            <img src="{{asset('images/third-brand-image.png')}}" alt="model woman">
            <div class="third_brand_text">
                <h3>george gina & lucy</h3>
                <p>Популярность и любовь дизайнеры заслужили тем, что соединили в своих творениях оригинальность,
                    индивидуальность и легкий юмор, что вызвало у них появление огромного количества поклонниц во
                    всем
                    мире.<br>
                    Каждая сумка этого уникального бренда неповторима и индивидуальна, а их отличие от других
                    брендовых
                    сумок в том, что они имеют преувеличенно крупную фурнитуру <br>– кольца, карабины и молнии.<br>
                    Такие сумки созданы специально для тех , кто любит индивидуальность и неповторимость.
                </p>
            </div>
        </div>
    </section>
    <section class="fourth_brand_banner">
        <div class="banner_content">
            <div class="banner_text">
                <h2><span>бренд</span><br>birkenstock</h2>
                <p class="brand_text">BIRKENSTOCK — известная немецкая компания, занимающаяся производством
                    ортопедической обуви. </p>
            </div>
        </div>
    </section>
    <section class="fourth_brand container">
        <div class="fourth_brand_content">
            <div class="fourth_brand_text">
                <h3>birkenstock</h3>
                <p>Свою славу она заслужила благодаря удобству, экологичности материалов и поддержанию здоровья ног.
                    Знаменитая мягкая ортопедическая стелька фирмы BIRKENSTOCK позволяет долгое время находиться в
                    обуви
                    не уставая.<br>
                    В 1990 году пара сандалий BIRKENSTOCK Аризона в США была признана самой экологичной.<br>
                    В 2004 году BIRKENSTOCK были удостоены звания «лучший дизайн, проверенный годами и подходящий
                    всем».<br>
                    На данном этапе бренд производит не только вьетнамки и сандалии, а и много других комфортных
                    видов
                    обуви. Созданы в стиле кэжуал и вписываются в будничные образы. Бренд также прославился
                    капсульными
                    коллекциями, выпущенными в коллаборации со многими современными дизайнерами.
                </p>
            </div>
            <img src="{{asset('images/fourth-brand-image.png')}}" alt="model woman">
        </div>
        <img src="{{asset('images/fourth-brand-small-image.png')}}" alt="model woman" class="small-img">
    </section>
@endsection
