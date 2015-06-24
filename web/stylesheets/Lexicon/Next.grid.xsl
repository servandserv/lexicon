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
            <!--link href="styles/typography.css" rel="stylesheet" type="text/css" /-->
            <link href="../../css/semanticss.css" rel="stylesheet" type="text/css" />
            <link href="styles/lexicon.css" rel="stylesheet" type="text/css" />
            <!--link rel="stylesheet" href="http://basehold.it/20/0/0/0/0.5" /-->
            <style>
                body > div {
                    display: flex;
                    flex-flow: row wrap;
                    justify-content: center;
                }
                body > div > div {
                    flex: 1 100%;
                }
                @media all and (min-width: 43.75em) {
                    body > div > div:first-child + div {
                        max-width: 35em;
                    }
                    
                    body > div > div:first-child + div + div {
                        max-width: 35em;
                    }
                }
                @media all and (min-width: 56.25em) {
                    body > div > div:first-child {
                        max-width: 10em;
                    }
                    
                }
            
                h1 {
                	margin-top:2.25rem;
                }
                h1 > div {
                    font-size: 1.25rem;
                    color:#444;
                    padding:0;
                    margin:-.25rem 0;
                }
                
                audio {
                    width: 15em;
                    margin-bottom: 1em;
                }
                
                form {
                    margin: 2em 0 0;
                }
                form input[type=radio] {
                    margin:.5em 0;
                }
                form input[type=radio] {
                    vertical-align: top;
                    width: 17px;
                    height: 17px;
                    margin: 0 3px 0 0;
                }
                form input[type=radio] + label {
                    cursor: pointer;
                    font-size: 1.25rem;
                }
                form input[type=radio]:not(checked) {
                    position: absolute;
                    opacity: 0;
                }
                form input[type=radio]:not(checked) + label {
                    position: relative;
                    padding: 0 0 0 35px;
                }
                form input[type=radio]:not(checked) + label:before {
                    content: '';
                    position: absolute;
                    top: -4px;
                    left: 0;
                    width: 22px;
                    height: 22px;
                    border: 1px solid #CDD1DA;
                    border-radius: 50%;
                    background: #FFF;
                }
                form input[type=radio]:not(checked) + label:after {
                    content: '';
                    position: absolute;
                    top: 0px;
                    left: 4px;
                    width: 16px;
                    height: 16px;
                    border-radius: 50%;
                    background: tomato;/*#9FD468;*/
                    box-shadow: inset 0 1px 1px rgba(0,0,0,.5);
                    opacity: 0;
                    transition: all .1s;
                }
                form input[type=radio]:checked + label:after {
                    opacity: 1;
                }
                form input[type=radio]:focus + label:before {
                    /*box-shadow: 0 0 0 3px rgba(255,255,0,.5);*/
                }
                form input[type=submit] {
                    font-size:1.25rem;
                    margin:2.75rem 0 0 0;
                    -webkit-appearance: none;
                }
                
                h4 {
                    margin: 0px;
                }
                
                @media (min-width: 43.75em) {
                    audio {
                        width: auto;
                    }
                    h4 {
                        margin-top:3.5rem;
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
                    -webkit-animation-delay: 3s;
                    -moz-animation-delay: 3s;
                    animation-delay: 3s;
                    
                    font-size: 1.4rem;
                    line-height: 20px;
                }
            </style>
        </head>
        <body>
            <div>
                <div>
                    <ul>
                        <li><a href="index.php#greeting">Home</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </div>
                <div>
                    <h1 id="word">
                        <xsl:value-of select="w:Word/w:word" />
                        <div class="trans"><xsl:value-of select="w:Word/w:trans" /></div>
                    </h1>
                    <audio id='audio' controls="controls">
                        <source src="http://www.gstatic.com/dictionary/static/sounds/de/0/{w:Word/w:word}.mp3" type="audio/mpeg" />
                        <embed src="http://www.gstatic.com/dictionary/static/sounds/de/0/{w:Word/w:word}.mp3" />
                    </audio>
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
                            <input id="true" type="radio" name="result" value="true" />
                            <label for="true">Я правильно перевел</label><br/><br/>
                            <input id="false" type="radio" name="result" value="false" />
                            <label for="false">Я был неправ</label><br/><br/>
                            <xsl:if test="not(s:Session/s:Word/s:status = 'used')">
                                <input id="stop" type="radio" name="result" value="stop" />
                                <label for="stop">Я его уже выучил</label><br/><br/>
                            </xsl:if>
                            <input class="button" type="submit" value="Сохранить" />
                        </form>
                    </p>
                    <p>&#160;</p>
                </div>
                <div>
                    <h4>Перевод ...</h4>
                    <p class="fade-in one">
                        <xsl:copy-of select="w:Word/w:desc" />
                    </p>
                    <p>
                        &#169; 2013-2015 Battleship.ru
                    </p>
                </div>
            </div>
        </body>
    </html>
</xsl:template>

</xsl:stylesheet>
