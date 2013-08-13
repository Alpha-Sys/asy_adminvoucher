### Modulname ###
asy_adminvoucher

### Version ###
1.5

### Oxid-Version ###
4.5.0 - 4.7.x

### Author ###
Alpha-Sys
Fabian Kunkler
fabian.kunkler@alpha-sys.de
www.alpha-sys.de

### Beschreibung ###
Das Modul erweitert die Gutscheinfunktionalität im Admin. Es gibt einen neuen Tab bei den Gutscheinserien.
Über diesen Tab können mehrere Gutscheincodes eingegeben und in einem Lauf generiert werden.
Dasweiteren können Zufallscodes generiert werden, die vorgegebene Kriterien entsprechen. Man kann angeben welche
Länge die generierten Codes haben sollen, wie viele Codes generiert werden sollen und aus welchen Zeichen die Codes
bestehen sollen.

### Installation ###
Kopieren Sie alle Dateien aus dem Ordner "copy_this" in Ihr Shopverzeichnis.
Kopieren Sie alle Dateien aus dem Ordner "changed_full" in Ihre Ordnerstruktur. Leeren Sie danach das Verzeichnis
"tmp" in Ihrem Shop. 
Wenn Sie sich nun im Admin-Bereich anmelden, sollte unter "Shopeinstellungen" -> "Gutscheinserien" ein neuer Tab
namens "Gutscheine generieren" erscheinen. Hierüber können Sie die neue Funktionalität nun nutzen.
Falls Sie die Oxid Version 4.6.0 oder höher verwenden, müssen das Modul noch zusätzlich im Admin aktivieren.
Melden Sie sich hierzu im Admin an und navigieren zu Erweiterungen -> Module. Wählen Sie den Eintrag Gutscheincode-Generierung
aus. Tragen Sie den Moduleintrag ein (falls noch nicht vorhanden) und speichern Sie. Danach müssen Sie nur noch auf aktivieren
klicken.

### Moduleinträge ###
nur bei Oxid Version >= 4.6.0 erforderlich:
voucherserie_main => asy_adminvoucher/admin/asy_adminvoucher__voucherserie_main