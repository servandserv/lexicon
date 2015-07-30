<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet
    xmlns="http://www.w3.org/1999/xhtml"
    xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
    xmlns:html="http://www.w3.org/1999/xhtml"
    xmlns:lexi="urn:ru:battleship:Lexicon"
    xmlns:exsl="http://exslt.org/common"
    xmlns:wadlext="urn:wadlext"
    xmlns:ns="urn:namespace"
    extension-element-prefixes="exsl"
    exclude-result-prefixes="xsd stat html xsl"
    version="1.0">

<xsl:output
    media-type="application/xhtml+xml"
    method="xml"
    encoding="UTF-8"
    indent="yes"
    omit-xml-declaration="no"
    doctype-public="-//W3C//DTD XHTML 1.1//EN"
    doctype-system="http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd" />

<xsl:template match="lexi:url">
    <html lang="ru" xml:lang="ru">
        <head>
            <title>Lexi | Battleship</title>
            <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0;" />
            <meta content='text/html; charset=utf-8' http-equiv='Content-Type' />
            <!--link href='http://fonts.googleapis.com/css?family=Open+Sans:300,600' rel='stylesheet'-->
            <!--link href="styles/typography.css" rel="stylesheet" type="text/css" /-->
            <link href="components/semanticss/dist/css/semanticss.css" rel="stylesheet" type="text/css" />
            <!--link href="styles/gridism.css" rel="stylesheet" type="text/css" /-->
            <link href="styles/lexicon.css" rel="stylesheet" type="text/css" />
            <!--link rel="stylesheet" href="http://basehold.it/20/0/0/0/0.5" /-->
            <style>
                body > div {
                    display: flex;
                    flex-direction: row;
                    justify-content: center;
                    align-items: flex-end;
                }
                body > div > div {
                    max-width: 640px;
                }
                h1 {
                    margin-top: 4.25rem;
                }
                h1 + p {
                    margin: 4.5rem 0;
                    text-align: center;
                }
            </style>
        </head>
        <body>
            <div>
                <div>
                    <h1>Lexi<sup>5K</sup></h1>
                    <p>
                        <a class="button" href="{.}">Get It</a>
                    </p>
                    <p>
                        <strong>Lexi<sup>5K</sup></strong> - простой и доступный сервис для изучения слов английского языка.
                        Выгодная сторона сервиса заключается в том, что он предназначен исключительно для целенаправленного 
                        пополнения словарного запаса и не отвлекает вас на что-либо другое.
                    </p>
                    <p>
                        Для изучения используется словарь частотный словарь изучаемого языка. 
                        Словарь содержит более 5000 наиболее часто используемых слов.
                        Этого количества вполне достаточно, для уверенного чтения и понимания текстов на изучаемом языке.
                    </p>
                    <p>
                        <strong>Lexi<sup>5K</sup></strong> подбирает случайным образом слова для изучения и регистрирует результаты перевода.
                        Для каждого слова необходимо дать правильный ответ подряд 8 раз, чтобы оно считалось выученным.
                        Оценку результата вы фиксируете самостоятельно.
                    </p>
                    <p>
                        Вы можете отказаться от восьмикратного повторения вопросов по слову, которое, по вашему мнению,
                        вы отлично знаете. Для этого достаточно выбрать опцию "Я его уже выучил" при сохранении результата.
                    </p>
                    <p>
                        Для того, чтобы выученные слова не забывались, <strong>Lexi<sup>5K</sup></strong> чередует изучаемые слова с изученными.
                        Неправильный перевод изученного слова переводит его в новые.
                    </p>
                    <p>
                        Для использования <strong>Lexi<sup>5K</sup></strong> требуется регистрация через Facebook.
                    </p>
                    <p>
                        &#169; 2013-2015 Battleship.ru
                    </p>
                </div>
            </div>
            <!--div class="grid wrap wider">
                <div class="unit one-quarter">&#160;</div>
                <div class="unit half">
                    
                </div>
                <div class="unit one-quarter">&#160;</div>
            </div-->
        </body>
    </html>
</xsl:template>

</xsl:stylesheet>
