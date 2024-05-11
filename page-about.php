<?php get_header(); ?>

<main class="p-about__main">
    <div class="p-main__Wrap">
        <section class="l-underlayer__common">
            <?php
            include('templates/under-mv.php');
            ?>
        </section>
        <section class="p-about__introduction">
            <div class="p-about__bg">
                <div class="p-about__introductionWrap">
                    <div class="p-about__titleWrap u-mb__50">
                        <h2 class="c-contents__title p-about__title">
                            ポートフォリオサイトについて
                        </h2>
                    </div>
                    <p class="p-about__text u-mb__50">
                        こちらのポートフォリオサイトは、実務で制作したサイトの一覧サイトです。<br><br>
                        header.php(ヘッダー)・footer.php(フッター)・front-page.php(トップページ)以外は、今まで実務経験で使用したコードを準用(箇所によっては複写)しております。<br><br>
                        header.php(ヘッダー)・footer.php(フッター)・front-page.php(トップページ)については、BEMとSMACSSとユーティリティークラスを併用したCSS設計になっておりますが、
                        そのほかのページは、制作工数短縮のためcss設計を行っておりません。
                    </p>
                </div>
            </div>
        </section>
        <section class="p-about__info" id="p-about__company">
            <div class="p-about__infoWrap">
                <div class="p-about__infoWrap-column u-mb__50">
                    <div class="p-about__titleWrap">
                        <h2 class="c-contents__title p-about__title">
                            サイト制作者
                        </h2>
                    </div>
                    <div class="p-about__imgWrap">
                        <img src="<?php echo get_template_directory_uri(); ?>/dist/images/only/pc.webp" alt="githubプロフィール画像" class="p-about___img">
                        <p class="p-about__caption">
                            <a href="https://github.com/code-polaris044" target="_blank" rel="noopener noreferrer"> code-polaris044</a>
                        </p>
                    </div>
                </div>
                <dl class="p-about__list__inner">
                    <dt class="p-about__dt">氏名</dt>
                    <dd class="p-about__dd">菅原 俊哉（スガワラ シュンヤ）</dd>
                    <dt class="p-about__dt">所在地</dt>
                    <dd class="p-about__dd">北海道札幌市北区新琴似</dd>
                    <dt class="p-about__dt">TEL</dt>
                    <dd class="p-about__dd">011-000-0000</dd>
                    <dt class="p-about__dt">FAX</dt>
                    <dd class="p-about__dd">011-000-0000</dd>
                    <dt class="p-about__dt">職業</dt>
                    <dd class="p-about__dd">フロントエンジニア</dd>
                </dl>
            </div>
        </section>
        <session class="p-about__mapWrap">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d23037.818019467726!2d141.3254432754836!3d43.10908003415067!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x5f0b28b9df4066d3%3A0x507d400b452d8353!2z6bq755Sf6aeF!5e0!3m2!1sja!2sjp!4v1687806058381!5m2!1sja!2sjp" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="p-about__map"></iframe>
        </session>
    </div>
</main>
</main>
<?php get_footer(); ?>
