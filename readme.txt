=== XSD socialshareprivacy ===
Contributors: XSized
Donate link:
Tags: social bookmarks, button, 2 clicks, 2 klicks, privacy, Facebook, Twitter, Google+, Google plus, Share, Privacy, Datenschutz, heise, social
Requires at least: 3.0
Tested up to: 3.2.1
Stable tag: 0.8

Implements more privacy for social sharing (Facebook, Twitter, Google+) 2 clicks for more privacy

== Description ==
[English description]

Implements the socialshareprivacy JQuery-Plugin from heise (http://www.heise.de/ct/artikel/2-Klicks-fuer-mehr-Datenschutz-1333879.html) into Wordpress. More privacy for social sharing (Facebook, Twitter, Google+). Shows dummy buttons for Facebook, Twitter an Google+ until your visitor activate sharing. Before activating no information will be sent to Facebook, Twitter or Google-Servers, much more privacy for your visitors!

In this version you have to translate the description bubbles under plugin settings, pre-translated descriptions coming soon. You can place the buttons before or below the content, in single view or on pages. See screenshots for details.

No Facebook AppID needed!

[Deutsche Beschreibung]

Datenschutzkonforme Einbindung von Twitter, Google+ und Facebook-Buttons in Dein Wordpress Blog. 

2-Klick-L&ouml;sung von heise (http://www.heise.de/ct/artikel/2-Klicks-fuer-mehr-Datenschutz-1333879.html) angepasst f&uuml;r eine komfortable Integration in Wordpress sowie einfache Administrierbarkeit. Mouseover-Informationen k&ouml;nnen aus der Admin-Oberfl&auml;che heraus konfiguriert werden. 

Die Buttons erscheinen ausschliesslich in der Einzelansicht der Beitr&auml;ge konfigierbar unterhalb oder oderhalb des Textes. Mehrfacheinbindung (z.B. auf &Uuml;bersichtsseiten mit mehreren Artikeln) ist derzeit nicht m&ouml;glich. Dar&uuml;ber hinaus k&ouml;nnen die Buttons auch auf Seiten eingeblendet werden. Jeder Button kann nach Belieben ein oder ausgeblendet werden.

Nun mit Version 1.2 des JQuery-Plugins von heise (keine Facebook App-ID mehr erforderlich!)

In Arbeit: 

* &Uuml;bernahme der URLs aus Wordpress, um Plugin auch auf &Uuml;bersichtsseiten verwenden zu k&ouml;nnen 

Mehr Informationen unter http://www.xsized.de/2011/09/2-klicks-fuer-mehr-datenschutz-als-wordpress-plugin-update/


== Installation ==

1. Unzip the files
2. Upload `xsd-socialshareprivacy` folder to your WP plugin folder `/wp-content/plugins/` directory (path have to look like this: `/wp-content/plugins/xsd-socialshareprivacy/`)
3. Activate the plugin through the 'Plugins' menu in WordPress admin
4. Configure the plugin under `socialshareprivacy`

== Frequently Asked Questions ==

keine Fragen...

== Screenshots ==

1. Configuration Screen (German Version)
2. Buttons below the content

== Changelog ==

= 0.8 =
* Now multilingual, English and German translation included.
* Mehrsprachigkeit ist nun umgesetzt, Deutsche und Englische &Uuml;bersetzung enthalten

= 0.7.3 =
Jeder Button kann nun nach Belieben ein- oder ausgeblendet werden (wenn jemand zum Beispiel nur den Google+-Button anzeigen m&ouml;chte). Zudem ist nun konfigurierbar, ob die Buttons vor oder nach dem Inhalt angezeigt werden sollen.

= 0.7.2 =
Buttons k&ouml;nnen nun auch auf Wunsch auf Seiten angezeigt werden. Daf&uuml;r gibt es eine neue Einstellung in den Optionen.
Wichtig: Werden Caching-Plugins (wie bspw. W3TotalCache) verwendet, kann es zum Teil sehr lange dauern, bis die &Auml;nderung der Option f&uuml;r Seiten (aktivieren/deaktivieren) sichtbar wird!

= 0.7.1 =
JQuery Plugin in der Version 1.2 eingebunden. Ab sofort keine App-ID mehr f&uuml;r Facebook erforderlich, diesen Part aus dem Code (und der Admin-Oberfl&auml;che) entfernt.

= 0.7 =
Beschreibung der Optionen nun &auml;nderbar, fest eingebauter Hinweis auf meine Seite aus der Infobubble wieder entfernt (ist doch ein wenig zu aufdringlich).

= 0.6.9.1 =
kleiner Bugfix

= 0.6.9 =
Backend aufger&auml;mt und neu gestyled in Vorvereitung f&uuml;r erweiterte Optionen. Verzeichnisstruktur angepasst.

= 0.6.7 =
Einbindung der aktualisierten Version 1.1 des JQuery-Plugins socialSharePrivacy von heise. &Auml;nderungen am Plugin:

CSS: Bei diversen Elementen haben wir mehr Angaben hinzugef&uuml;gt, um die Nacharbeiten, bei der Integration in eigene Seiten, geringer zu halten. Vor allem haben wir margin-, padding-, width- und height-Angaben hinzugef&uuml;gt.

Das Plug-In wurde inhaltlich etwas umgestellt und einige Code-Abk&uuml;rzungen vorgenommen.

JS-Bug Korrektur: Es gab einen Fehler, wenn es in der Seite ein canonical-Attribut gab, das aber einen leeren Wert hatte.

JS-Bug Korrektur: Bei den Optionen von Google+ gab es eine Angabe, die sp&auml;ter im Script nie abgefragt wurde.

JS-Bug Korrektur: Die Perma-Option von Google+ wurde nur angezeigt, wenn auch die Perma-Option von Twitter aktiviert war.

zzgl. Korrekturen, die ich bereits vorgenommen hatte.

Die neuen Optionen in V1.1 werden in den kommenden Tagen in der Admin-Oberf&auml;che verf&uuml;gbar sein.

= 0.6.5 =
Der beim hovern von i angezeigte Infotext ist nun frei konfigurierbar

= 0.6.4 =
Anpassungen am Stylesheet, da in manchen Templates der Twitter- und G+-Button in die n&auml;chste Zeile rutschte

= 0.6.3 =
Bugfix im JQuery-Plugin, Twitter-iFrame &uuml;berlagerte z.T. nachfolgende Links, korrigiert

= 0.6.2 =
Menueeintrag umbenannt in socialSharePrivacy, da sonst zu lang und unschoen umgebrochen im Menue

= 0.6.1 = 
Diverse Anpassungen im Code, um aus der quick and dirty Ecke heraus zu kommen. Script und Stylesheet per WP-Funktionen laden, Parameteruebergabe nun per JSON statt wie bisher im Header.