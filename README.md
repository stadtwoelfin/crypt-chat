# Crypt-Chat

## Installation
Speicher alle Dateien in ein Verzeichnis. Verteil korrekte Schreibrechte. In der **conf.php** kannst du ein paar Einstellungen vornehmen.

## .htaccess / .htpasswd
Sichere das Verzeichnis mit einer .htaccess und einem .htpasswd-Zugang. Natürlich legst du die .htpasswd irgendwo innerhalb in deinem System ab, von dem man aus dem Internet nicht dran kommt. Die Zugänge, die du dafür erstellst, werden automatisch als Usernamen genommen.

## Benutzung
Am Anfang legen die Chatteilnehmer:innen eine gemeinsame Passphrase fest. Mit dieser Phrase wird der Chat verschlüsselt auf dem Server abgelegt. 

## Crypt
Die Verschlüsselung basiert auf [**alphacrypt2**](http://www.myersdaily.org/joseph/javascript/alphac.html) von Joseph M. Meyers. Wie sicher die Verschlüsselung ist, weiß ich nicht. Da ich nicht für die Sicherheit garantiere, ist dieser Chatprototyp nur als Spielzeug anzusehen. Benutzung auf eigene Gefahr.

Die Scripte sind ein funktionierender Prototyp. 

Lizenz, eigene Scripte: [The Unlicense](https://unlicense.org)  
Alphacrypt2 & andere Scripte: Siehe die Quelltexte in den jeweiligen Dateien.
