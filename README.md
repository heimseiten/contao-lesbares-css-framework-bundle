# Lesbares CSS-Framework für Contao

Stellt ein „lesbares" CSS-Framework (deutsche, sprechende Klassennamen) bereit und macht
die Klassen im Backend an **Artikeln** und **Inhaltselementen** auswählbar – ohne
Konfiguration im Backend. Die gewählten Klassen werden in das normale `cssID`-Klassenfeld
des Elements geschrieben (und live mitaktualisiert, während man auswählt).

## Installation

```bash
composer require heimseiten/contao-lesbares-css-framework-bundle
vendor/bin/contao-console contao:migrate
```

Ohne weitere Konfiguration ist das mitgelieferte Framework aktiv: Die CSS wird im Frontend
geladen und alle Klassen erscheinen – nach Kategorien gruppiert – im Auswahlfeld
„Lesbare CSS-Klassen".

## Konfiguration (optional)

Alles über `config/config.yaml` – nichts davon ist Pflicht:

```yaml
heimseiten_contao_lesbares_css_framework:
    # Das mitgelieferte Framework parsen und im Frontend laden.
    # false = nur eigene Klassen verwenden (mein Framework wird weder geladen noch angeboten).
    builtin: true

    # Einzelne Kategorien aus dem Auswahlfeld ausblenden ("nur Teile").
    # Verfügbare Kategorien: TEXT, BILDER, LISTEN, LINKS, SPALTEN, FORMULARE, FLÄCHEN,
    # KACHELN, BREITE, HÖHE, ABSTÄNDE, FARBEN, SCROLLING, ICONS, animierterUnterstrich
    exclude_categories: ['FARBEN']

    # Eigene CSS-Dateien, deren Klassen zusätzlich auswählbar werden.
    sources:
        - '%kernel.project_dir%/files/mein-theme/eigene-klassen.css'
```

### Eigene Klassen definieren

Lege eine CSS-Datei an und gruppiere die Klassen über Kommentar-Marker – genau diese
Titel werden zu den Kategorien im Auswahlfeld:

```css
/************ EIGENE FLÄCHEN ************/
.MeinKastenHervorgehoben { ... }
.MeinKastenDezent       { ... }
```

Trage die Datei unter `sources` ein. Die Klassen tauchen dann unter „EIGENE FLÄCHEN" auf.
Das Laden dieser eigenen CSS übernimmt weiterhin dein Projekt/Theme – das Bundle liest sie
nur für das Auswahlfeld aus.

> Hinweis: Technische Selektoren (`.mod_*`, `.ce_*`, `.rte`, `.icon` …) werden automatisch
> herausgefiltert; ein Klassenname, der in mehreren Kategorien vorkommt, erscheint nur einmal.
