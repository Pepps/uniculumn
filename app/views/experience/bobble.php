@if ($experience->type === '0')
<div class="ex ico_employment">Anställning</div>
@elseif ($experience->type === '1')
<div class="ex ico_education">Utbildning</div>
@elseif ($experience->type === '2')
<div class="ex ico_merits">Merit</div>
@elseif ($experience->type === '3')
<div class="ex ico_other">Övrigt</div>
@endif

    <h2 class="edit_this edit_column">Redigera anställning</h2>

  <div class="edit_wrapper">

       <!-- <Plats/tid>  -->
          <div class="ex_float hide_this exp_location">
            @foreach ($cities as $city)
            {{ $city->name }}
            @endforeach
           <img src="../img/icons/edit/location.PNG"/>

         </div>
          <div class="ex_float hide_this">{{ $experience->duration }} <img src="../img/icons/edit/time.PNG"/></div>
       <!-- </Plats/tid>  -->

       <!-- <Redigera plats/tid>  -->
           <div class="ex_float edit_this">
           <img src="../img/icons/edit/location.PNG" style="float: right;"/><select><option value="none">Västra Götaland</option>
                  <option value="volvo">Potatis</option>
                  <option value="saab">Fläsksallad</option>
                  <option value="mercedes">Grötrullar</option>
                  <option value="audi">Bananlåda</option>
                </select>
                <select>
                  <option value="none">Göteborg</option>
                  <option value="volvo">Potatis</option>
                  <option value="saab">Fläsksallad</option>
                  <option value="mercedes">Grötrullar</option>
                  <option value="audi">Bananlåda</option>
                </select></div>
                {{ $years = explode(" ", $experience->duration) }}
           <div class="ex_float edit_this"><input value="{{ $years[0] }}">{{ $experience->from }}</input><input value="{{ $years[1] }}"></input> <img src="../img/icons/edit/time.PNG"/></div>
      <!-- </Redigera plats/tid>  -->




       <!-- <Kontrollknappar>  -->
              <a onclick="return confirm('Är du säker på att du vill ta bort?')" href="{{ URL::to('experience/' . $experience->id . '/deleteExp') }}"><div class="ex_button" style="background-color: #d70808;"><img src="../img/icons/edit/delete.PNG"/></div></a>
              <div class="ex_button edit_experience"><img src="../img/icons/edit/edit.PNG"/></div>
              <div class="ex_button edit_references"><img src="../img/icons/edit/add.PNG"/></div>
          <!-- <Spara ändringar>  -->
              <div class="add_edit edit_this">
                  Spara ändringar
              </div>
              <div class="ignore_edit edit_this">
                  Ångra
              </div>
           <!-- </Spara ändringar>  -->
       <!-- </Kontrollknappar>  -->

  </div>


 <!-- <Titel>  -->
    <h2 class="hide_this">{{ $experience->location }}</h2>
 <!-- </Titel>  -->

 <!-- <Redigera titel>  -->
    <input type="text" value="{{ $experience->location }}" class="edit_this"></input>
 <!-- </Redigera titel>  -->

 <div class="ex_description">
 <!-- <Beskrivning>  -->
   <span class="hide_this">{{ $experience->description }}</span>
 <!-- </Beskrivning>  -->

 <!-- <Redigera beskrivning>  -->
    <textarea class="edit_this" rows="6">{{ $experience->description }}</textarea>
 <!-- </Redigera beskrivning>  -->
 </div>




 <!-- <Lägg till ny referens>  -->
<div class="references_choices">

    <div class="ref_column">
      <h3> Förnamn</h3>
        {{ Form::text('firstname', Input::old('name'), array('class' => 'references_input')) }}

      <h3>Efternamn</h3>
        {{ Form::text('lastname', Input::old('name'), array('class' => 'references_input')) }}

    </div>

     <div class="ref_column">

        <h3>Email </h3>
          {{ Form::text('email', Input::old('name'), array('class' => 'references_input')) }}

        <h3>Telefon </h3>
        {{ Form::text('phone', Input::old('name'), array('class' => 'references_input')) }}
        <br/>

      <div class="addreference">
         Klar
      </div>
      <div class="clearreference">
          Ta bort
      </div>
    </div>
  </div>

 <!-- </Lägg till ny referens>  -->

 <!-- <Referenser>  -->
<div class="show_references">
<img src="../img/small_menu.PNG"/> Visa referenser <br/>

  <div class="allreferences">

    <div class="ref_square">
      @foreach ($experience->reference as $ref)
        <div class="delete_reference"><img src="../img/icons/edit/delete.PNG"/></div>
        <img src="../img/references.PNG"/> Lord Voldemort<br/> <img src="../img/phonenumber.PNG"/>  073-4V4D4-K3D4VR4  <br/> <img src="../img/email.PNG"/> lord.voldemort@deatheaterslondon.net
      @endforeach

    </div>


  </div>
</div>
 <!-- </Referenser>  -->



