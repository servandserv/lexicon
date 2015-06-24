<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet
    xmlns="http://www.w3.org/1999/xhtml"
    xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
    xmlns:html="http://www.w3.org/1999/xhtml"
    xmlns:lexi="urn:ru:battleship:lexicon"
    xmlns:sess="urn:ru:battleship:Lexicon:Session"
    xmlns:user="urn:ru:battleship:Lexicon:User"
    xmlns:link="urn:ru:battleship:Lexicon:Link"
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

<xsl:template match="sess:Sessions">
    <html lang="ru" xml:lang="ru">
        <head>
            <title>Lexi | Battleship</title>
            <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0;" />
            <meta content='text/html; charset=utf-8' http-equiv='Content-Type' />
            <!--link href='http://fonts.googleapis.com/css?family=Open+Sans:300,600' rel='stylesheet'-->
            <!--link href="styles/typography.css" rel="stylesheet" type="text/css" /-->
            <link href="../../css/semanticss.css" rel="stylesheet" type="text/css" />
            <!--link href="styles/gridism.css" rel="stylesheet" type="text/css" /-->
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
                
                h1 {
                    margin-top:2.25rem;
                }
                
                h1 + p {
                    margin-top:1.75rem;
                }
                
                dl {
                    margin: 2.75rem 0 2.75rem 0;
                }
                dt {
                    color: #777;
                    font-size: .85em;
                    margin-bottom:0;
                }
                dd {
                    font-size: 1.6rem;
                    margin: .5rem .5rem .5rem 0;
                }
                @media all and (min-width: 43.75em) {
                    body > div > div:first-child {
                        flex: 1 auto;
                        max-width: 160px;
                    }
                    body > div > div:first-child + div {
                        max-width: 640px;
                    }
                }
                
            </style>
        </head>
        <body>
            <div>
                <div>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </div>
                <div>
                    <h1 word="greeting">Hi, <xsl:value-of select="link:Link[@rel='user']/link:resource/link:firstName" /></h1>
                    <xsl:choose>
                        <xsl:when test="sess:Session">
                            <xsl:apply-templates select="sess:Session" />
                        </xsl:when>
                        <xsl:otherwise>
                            <p>Изучение слов английского языка</p>
                            <p>
                                <form method="POST" action="sessionCreate.php">
                                    <input type="hidden" name="code" value="en_RU" />
                                    <input type="submit" value="Начать" />
                                </form>
                            </p>
                        </xsl:otherwise>
                    </xsl:choose>
                    <p>
                        &#169; 2013-2015 Battleship.ru
                    </p>
                </div>
            </div>
        
        </body>
    </html>
</xsl:template>

<xsl:template match="sess:Session">
    <p>Ваши предыдущие достижения в изучении слов английского языка<br/></p>
    <dl>
        <dt>Дата и время начала изучения</dt>
        <dd><xsl:value-of select="sess:dtStart" /></dd>
        <dt>Выучено слов</dt>
        <dd><xsl:value-of select="sess:used" /></dd>
        <dt>Сделано ответов</dt>
        <dd><xsl:value-of select="sess:attempts" /></dd>
        <xsl:if test="sess:lastmod">
            <dt>Дата и время последнего ответа</dt>
            <dd><xsl:value-of select="sess:lastmod" /></dd>
        </xsl:if>
    </dl>
    <p>
        <a class="button" href="attemptNext.php?code={sess:code}#word">Продолжить</a>
    </p>
</xsl:template>

</xsl:stylesheet>
