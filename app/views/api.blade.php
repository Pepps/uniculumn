 @extends('layouts.master')
@section('content')

@include('layouts.nav')
@yield('nav')
<div id="main_content">
    <div style="padding: 0vw 20vw;">
    <h1>Dokumentation</h1>
	    <p>Vi kommer referera till en och samma URI under alla exempel. Vi kommer gå igenom grunderna hur man skriver egna URI’s och vad varje del gör.
		<b>foo.com/search/project/users-firstname_users-lastname_project-title/Dennis-Isak+Emelie_Magnusson_~Hello/first-5</b>

		<p>
		  URI’n är uppdelad i 4 delar
		foo.com är hemsidan, i detta fallet är det Uniculum, search är våran path där funktionaliteten ligger.
		Dem två är en standard sak för alla sökningar.
		Den första delen är table, i vårat fall är det "/project/" då vi söker efter projekt som är skapade.
		</p>
		<p>
		Den andra delen är row och column ivårat fall är det users med firstname, users med lastname och project med title.
		</p>
		<p>
		Som du kan se så separerar vi varje del med ett understräck och sammanfogar row och column med ett mellanstreck.
		Som du ser söker vi project och som i vårat exempel vill vi ha titel. Om den söker efter en Row och Column som är i sig själv ivårat fall project söker efter project med en titel.
		När den söker efter saker som inte är i sig själv ska det vara i plural så som att vi söker efter project som en speciell andvändare har varit med att skapa.
		</p>
		<p>
		Den tredje delen är vad som du kollar efter, det finns en parameter man kan använda i denna delen och det är ~ (Ungefär lika med tecken).
		</p>
		<p>
		För den andra delen i URI:n vi hade så delar vi den med ett understreck.
		</p>
		<p>
		Som du även kanske såg i vår exempel URI, så andvänder vi även ett plus i denna delen, den betyder “eller” (or) och minus betyder “och”(and).
		Så projecten blir filtrerade efter Dennis och Isak eller Emelie. Där efternamn ska vara Magnusson.
		Då får vi alla project som Dennis och Isak har jobbat ihop och alla project där Emelie har jobbat på.
		</p>

		<p>
		Vi filtrera även efter alla titlar som innerhåller ordet Hello. Så om ett project innehåller Hello World eller World Hello så får vi båda dem två. Hade vi inte haft ~ tecknet så hade det bara hetat Hello. 
		~ tecknet fungar på alla variabler så vill du söka på body i project eller emails som innehåller @gmail.com för att få fram alla andvändare med G Mail konton så funkar det.
		</p>
</div>

@stop
