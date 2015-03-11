<?php
class CategoryTableSeeder extends Seeder {


    public function run()
    {
        $categories = array(
            #1
            '0Bild och Grafik',
            #SUB CATEGORIES FOR ID 1
                '3-D modellering',
                'Animering',
                'Kalligrafi',
                'Målning',
                'Ritning',
                'Typografi',
                'Wallpaper',
            #2
            '0Bygg och Anläggning',
            #SUB CATEGORIES FOR ID 2
                'Anläggning (mark, väg, vatten)',
                'Arkitektur',
                'Bergteknik',
                'Fastighetsförvaltning',
                'Övrigt',
            #3
            '0Data och IT',
            #SUB CATEGORIES FOR ID 3
                'Databaser',
                'Datoranvändning',
                'Multimedia/data',
                'Programmeringsteknik',
                'Spelutveckling',
                'Systemvetenskap',
                'Webbdesign',
                'Övrigt',
            #4
            '0Ekonomi och Marknadsföring',
            #SUB CATEGORIES FOR ID 4
                'Administration',
                'Ekonomi',
                'Försäljning',
                'Förvaltning',
                'Logistik',
                'Management och ledarskap',
                'Marknadsföring',
                'Nationalekonomi',
                'Redovisning',
                'Övrigt',
            #5
            '0Frisk- och skönhetsvård',
            #SUB CATEGORIES FOR ID 5
                'Friskvård och hälsopedagogik',
                'Massage',
                'Tränare',
            #6
            '0Hantverk',
            #SUB CATEGORIES FOR ID 6
                'Figuriner',
                'Konsthantverk',
                'Statyetter',
                'Textilhantverk',
                'Trähantverk',
            #7
            '0Hotell, restaurang och turism',
            #SUB CATEGORIES FOR ID 7
                'Eventproduktion',
                'Hotell',
                'Kost',
                'Ledarskap inom turism',
                'Restaurang och storhushåll',
                'Turism och resor',
            #8
            '0Information och media',
            #SUB CATEGORIES FOR ID 8
                'Bibliotek och informationsvetenskap',
                'Grafisk design',
                'Journalistik',
                'Kommunikationsvetenskap',
                'Medieproduktion',
                'Multimedia/Information',
                'TV och radioproduktion',
            #9
            '0Konstnärliga utbildningar',
            #SUB CATEGORIES FOR ID 9
                'Bild och form',
                'Dans',
                'Design/konst',
                'Film',
                'Foto',
                'Inredningsarkitektur',
                'Keramik och glas',
                'Musik',
                'Sång',
                'Teater (drama)',
            #10
            '0Kultur och humanism',
            #SUB CATEGORIES FOR ID 10
                'Arkeologi',
                'Filosofi',
                'Historia',
                'Internationellt',
                'Konstvetenskap',
                'Kulturvetenskap',
                'Litteraturvetenskap',
                'Religionsvetenskap',

            #11
            '0Litteratur'
            #SUB CATEGORIES FOR ID 11
                'Bilderbok',
                'Biografi',
                'Deckare',
                'Dramatik',
                'Epik',
                'Erotica',
                'Fabel',
                'Fantasy',
                'Krönika',
                'Novell',
                'Roman',
                'Skräck',

            #12
            '0Medicin och vård',
            #SUB CATEGORIES FOR ID 12
                'Biomedicin',
                'Dietist',
                'Hjärnkirurg',
                'Hälsa och samhälle',
                'Hälso- och sjukvårdadministration',
                'Kirurg',
                'Läkare',
                'Medicin',
                'Omvårdnad',
                'Plastikkirurg',
                'Psykoterapi',
                'Sjukgymnastik och rehabilitering',
                'Sjuksköterska',
                'Tal och hörsel',
                'Tandvård',
                'Veterinär',

            #13
            '0Musik',
            #SUB CATEGORIES FOR ID 13
                'Ambient',
                'Ballad',
                'Blues',
                'Country',
                'Dance',
                'Dansmusik',
                'Death Metal',
                'Drum and Bass',
                'Dubstep',
                'Electro',
                'Elektronisk musik'
                'Eurobeat',
                'Folkdans',
                'Funk',
                'Gospel',
                'Goth',
                'Hardstyle',
                'Heavy Metal',
                'Hip-Hop',
                'House',
                'Hårdrock',
                'Indie',
                'Industrial',
                'J-Pop',
                'Jazz',
                'K-pop',
                'Klassisk musik',
                'Kör',
                'Metal',
                'New age',
                'Opera',
                'Popmusik',
                'Power Metal',
                'Punkrock',
                'R&B',
                'Reggae',
                'RockNroll',
                'Rockmusik',
                'Rumba',
                'Salsa',
                'Soul',
                'Svensk Hip-Hop',
                'Swing',
                'Techno',
                'Trance',

            #14
            '0Naturbruk',
            #SUB CATEGORIES FOR ID 14
                'Djurvård och hästhållning',
                'Florist',
                'Lant- och skogsbruk',
                'Trädgård',
                'Potatis',
            #15
            '0Naturvetenskap',
            #SUB CATEGORIES FOR ID 15
                'Biologi',
                'Ekologi',
                'Farmakologi',
                'Fysik',
                'Geografi',
                'Geovetenskap',
                'Kemi',
                'Matematik',
                'Miljö',
            #16
            '0Programmeringsspråk',
            #SUB CATEGORIES FOR ID 16
                'Assembler',
                'Basic',
                'C++',
                'C#',
                'J#',
                'JavaScript',
                'Java',
                'Objective-C',
                'Pascal',
                'PHP',
                'Python',
                'Ruby',
                'Swift',
                'SystemC',
                'Visual BASIC',

            #17
            '0Samhällsvetenskap och juridik',
            #SUB CATEGORIES FOR ID 17
                'Bistånd och U-länder',
                'Juridik',
                'Psykologi',
                'Samhällsvetenskap',
                'Socialt inriktade',
                'utbildningar',
                'Sociologi',
                'Statistik',
                'Statsvetenskap',

            #18
            '0Spel',
            #SUB CATEGORIES FOR ID 18
                '4x spel',
                'Actionspel',
                'Action RPG',
                'Beat em up',
                'Fighting spel',
                'First person shooter',
                'Flashsspel',
                'Frågesportsspel',
                'Grand Strategy',
                'Hack and slash',
                'Massively Multiplayer Online - MMO',
                'MMOFPS',
                'MMORPG',
                'MMORTS',
                'Musikspel',
                'Plattformsspel',
                'Racingspel',
                'Rail shooter',
                'Role Playing Game - RPG',
                'Real time strategy',
                'Rytmspel',
                'Partyspel',
                'Pusselspel',
                'Simulator',
                'Stealthspel',
                'Spectaclefighter',
                'Sportspel',
                'Survival Horror'
                'Textspel',
                'Third Person Shooter',
                'Visual Novel',
                'Western RPG',


            #19
            '0Språk',
            #SUB CATEGORIES FOR ID 19
                'Arabiska',
                'Engelska',
                'Finska',
                'Franska',
                'Grekiska',
                'Italienska',
                'Japanska',
                'Kinesiska',
                'Klassiska språk',
                'Lingvistik & Allmänspråkvetenskap',
                'Portugisiska',
                'Ryska',
                'Spanska',
                'Svenska',
                'Teckenspråk',
                'Tyska',
                'Översättare',
                'Övriga nordiska språk',
            #20
            '0Säkerhet och räddningstjänst',
            #SUB CATEGORIES FOR ID 20
                'Ambulanspersonal',
                'Brandman',
                'Polis',
                'Väktare',

            #21
            '0Sport',
            #SUB CATEGORIES FOR ID 21
                'Aikido',
                'Amerikansk fotboll',
                'Backhoppning',
                'Badminton',
                'Bandy',
                'Baseboll',
                'Basket',
                'Biljard',
                'Bilsport',
                'Bodybuilding'
                'Bordshockey'
                'Bordtennis'
                'Bowling'
                'Boxning'
                'Brottning'
                'Brännboll'
                'Bågskytte'
                'Curling',
                'E-sport',
                'Fotboll,',
                'Friidrott',
                'Handboll',
                'Golf',
                'Innebandy',
                'Is-hockey',
                'Judo',
                'Kampsport',
                'Karate',
                'Kendo',
                'Taekwondo',
                'Kick-boxning',
                'Klättring',
                'Konstsim',
                'Konståkning',
                'Maraton',
                'Motorsport',
                'Rugby',
                'Schack',
                'Simning',
                'Skidsport',
                'Tennis',
                'Triathlon',
                'Volleyboll',


            #22
            '0Teknik',
            #SUB CATEGORIES FOR ID 22
                'Arkitektur',
                'Byggnadsteknik',
                'Datateknik',
                'Design och produktutveckling',
                'Elektroteknik',
                'Farkostteknik',
                'Industriell ekonomi',
                'Information- och kommunikationsteknik',
                'Kemiteknik',
                'Lantmäteriteknik',
                'Ljudteknik',
                'Maskinteknik',
                'Materialteknik',
                'Medicinsk',
                'Teknik',
                'Miljö och energiteknik',
                'Rymdteknik',
                'Samhällsbyggnadsteknik',
                'Teknisk fysik',
            #23
            '0Tillverkning och underhållning',
            #SUB CATEGORIES FOR ID 23
                'El',
                'Fastighetsskötsel',
                'Fordon',
                'Grafisk',
                'processteknik',
                'Industri och produktion',
                'Kyl- och VVS',
                'teknik',
                'Livsmedel',
                'Papper',
                'Svetsteknik',
                'Textil',
                'Trä/tillverkning och underhåll',
            #24
            '0Transport',
            #SUB CATEGORIES FOR ID 24
                'Bil',
                'Flyg',
                'Järnväg',
                'Sjöfart',
                'Transportlogistik',
            #25
            '0Undervising och idrott',
            #SUB CATEGORIES FOR ID 25
                'Idrott',
                'Lärare',
                'Pedagogik',
                'Specialpedagog',
                'Studie- och yrkesvägledare'
            );

            $x = 0;
            for ($i=0;$i<count($categories);$i++) {
                $category = new Category;
                if (strpos($categories[$i], "0") !== false) {
                    $x = $i+1;
                    $category_id = str_replace("0","", $categories[$i]);
                    $category->title = $category_id;
                    $category->subcategory_id = 0;
                    $category->save();
                }
                else {
                    $category->title = $categories[$i];
                    $category->subcategory_id = $x;
                    $category->save();
                }
            }
    }
}
