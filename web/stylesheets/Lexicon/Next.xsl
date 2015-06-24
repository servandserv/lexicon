<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet
    xmlns="http://www.w3.org/1999/xhtml"
    xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
    xmlns:html="http://www.w3.org/1999/xhtml"
    xmlns:w="urn:ru:battleship:Lexicon:Word"
    xmlns:l="urn:ru:battleship:Lexicon:Link"
    xmlns:a="urn:ru:battleship:Lexicon:Attempt"
    xmlns:s="urn:ru:battleship:Lexicon:Session"
    xmlns:exsl="http://exslt.org/common"
    xmlns:wadlext="urn:wadlext"
    xmlns:ns="urn:namespace"
    extension-element-prefixes="exsl"
    exclude-result-prefixes="xsd w l html xsl"
    version="1.0">

<xsl:output
    media-type="application/xhtml+xml"
    method="xml"
    encoding="UTF-8"
    indent="yes"
    omit-xml-declaration="no"
    doctype-public="-//W3C//DTD XHTML 1.1//EN"
    doctype-system="http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd" />

<xsl:template match="a:Attempt">
    <html lang="ru" xml:lang="ru">
        <head>
            <title>Lexi | Battleship</title>
            <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0;" />
            <meta content='text/html; charset=utf-8' http-equiv='Content-Type' />
            <!--link href='http://fonts.googleapis.com/css?family=Open+Sans:300,600' rel='stylesheet'-->
            <link href='http://fonts.googleapis.com/css?family=Voces' rel='stylesheet' type='text/css' />
            <link href="styles/typography.css" rel="stylesheet" type="text/css" />
            <!--link href="styles/grid.css" rel="stylesheet" type="text/css" /-->
            <link href="styles/lexicon.css" rel="stylesheet" type="text/css" />
            <style>
                h1 > div {
                    font-family: 'Voces', cursive;
                    font-size: 1rem;
                    padding: 1rem 0 0;
                }
                h1 + p {
                    text-align:left;
                }
                form {
                    margin: 4em 0;
                }
                form input[type=radio] {
                    margin:.5em 0;
                }
                form input[type=submit] {
                    margin:2em 0;
                }
                @media (min-width: 43.75em) {
                    h1 ~ p > code {
                        white-space:pre-wrap;
                    }
                }
                
                @-webkit-keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
                @-moz-keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
                @-o-keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
                @keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
                 
                .fade-in {
                    opacity:0;
                    -webkit-animation:fadeIn ease-in 1;
                    -moz-animation:fadeIn ease-in 1;
                    -o-animation:fadeIn ease-in 1;
                    animation:fadeIn ease-in 1;
                    -webkit-animation-fill-mode:forwards;
                    -moz-animation-fill-mode:forwards;
                    -o-animation-fill-mode:forwards;
                    animation-fill-mode:forwards;
                     
                    -webkit-animation-duration:2s;
                    -moz-animation-duration:2s;
                    -o-animation-duration:2s;
                    animation-duration:2s;
                }
                    
                .fade-in.one {
                    -webkit-animation-delay: 1s;
                    -moz-animation-delay: 1s;
                    animation-delay: 1s;
                }
            </style>
        </head>
        <body>
            <h4>
                <ul>
                    <li><a href="index.php">Главная</a></li>
                    <li><a href="logout.php">Выход</a></li>
                </ul>
            </h4>
            <h1>
                <xsl:value-of select="w:Word/w:word" />
                <div class="trans"><xsl:value-of select="w:Word/w:trans" /></div>
            </h1>
            <p>
                <audio id='audio' controls="controls">
                    <source src="http://www.gstatic.com/dictionary/static/sounds/de/0/{w:Word/w:word}.mp3" type="audio/mpeg" />
                    <embed src="http://www.gstatic.com/dictionary/static/sounds/de/0/{w:Word/w:word}.mp3" />
                </audio>
            </p>
            <p>
                <xsl:choose>
                    <xsl:when test="s:Session/s:Word/s:status = 'used'">Выученное слово, всего повторений - <xsl:value-of select="s:Session/s:Word/s:tAttempts + s:Session/s:Word/s:fAttempts" />.</xsl:when>
                    <xsl:when test="s:Session/s:Word/s:status = 'new'">Новое слово, правильных ответов - <xsl:value-of select="s:Session/s:Word/s:cAttempts" /></xsl:when>
                    <xsl:otherwise>Новое слово</xsl:otherwise>
                </xsl:choose>
            </p>
            <p>
                <form method="post" action="attemptCreate.php">
                    <input type="hidden" name="code" value="{s:Session/s:code}" />
                    <input type="hidden" name="word" value="{w:Word/w:word}" />
                    <input type="radio" name="result" value="true" />&#160;Я правильно перевел<br/>
                    <input type="radio" name="result" value="false" />&#160;Я был неправ<br/>
                    <xsl:if test="not(s:Session/s:Word/s:status = 'used')">
                        <input type="radio" name="result" value="stop" />&#160;Я его уже выучил<br/>
                    </xsl:if>
                    <input class="button" type="submit" value="Сохранить" />
                </form>
            </p>
            <p>
                <div>Перевод ...</div>
                <code class="fade-in one"><xsl:value-of select="w:Word/w:desc" /></code>
            </p>
            
            <p>
                &#169; 2013-2015 Battleship.ru
            </p>
        </body>
    </html>
</xsl:template>

</xsl:stylesheet>
