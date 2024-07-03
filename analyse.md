#voorstudie
- 3 models
    - Categorieën
        - Gelinkt aan recepten via one to many
    - Recepten
        - Gelinkt aan Category via many to one
        - bestaat uit
            - tekstuele instructie (text)
            - duurtijd in minuten (int)
            - is_hidden (boolean)
    - Ingredienten
        - Gelinkt aan recept via One to one relatie
        - Altijd voor 2 personen
- Werkwijze
    - API
        - starten met maken modellen - seeders - fakers
            - belangrijk bij fakers houd rekening met grote datasets (for loops)
        - Starten met maken van resources/spatie data
            - Begin met de /api/recipes route met query filters Search & Category
            - Return Json response with recipes
        - Eerst dom alles maken dan verbeteren
        - Test schrijven via phpunit
    - Front-end gedeelte
        - Via Inertia/Vue
            - overzichtpagina is een simpele table component met data
                - Voeg searchbar en dropdown voor categoriefilter toe
            - Detailpagina
                - Overview van recept met ingredienten
                    - ingredienten wordt een apart component waar je aantal kan wijzigen
                        - via vue kunnen we dit makkelijk reactive herberekenen en tonen
                - State van voorgestelde recepten kon opgeslagen worden via pinia
            - 2 pagina's testen kan via laravel dusk testen met de inertia plugin om inertia pagina's te testen
        - Via livewire
            - Component maken voor het herberekenen van de ingrediënten per persoon
                - via volgende berekening= ingredient * (x/2)
            - Component met datatable
            - die filtert en search via url attributes

##Opmerkingen
- Ik ben begonnen met een werkende eerste versie
  - Dan ben ik beginnen kijken welke stukken herbruikbaar zijn en welke ik kon refactoren en verplaatsen.
- Ik heb niet gevonden hoe ik de updated ingredient amount kon testen wel heb ik de servings van livewire kunnen testen.
- Ik heb het langste vastgezeten aan het livewire gedeelte omdat ik veel docs gelezen heb ondertussen.
- Ik heb de state van de voorgestelde recepten opgeslaan in de laravel sessie
  - extra mogelijkheid was via alpinejs en livewire deze state op te slaan

##upgrades i could do but not done because of time
- Filter reset button
- authenticatie voor api kant
- lay-out zit er basis in
