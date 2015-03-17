 @extends('layouts.master')
@section('content')

@include('layouts.nav')
@yield('nav')
<div id="main_content">
  <div id="add_new_experience">
    <h1>+ Lägg till en erfarenhet</h1>

        {{ Form::open(array('url' => 'experience', 'method'=>'post')) }}

         <div id="exp_types">

           <div class="exp_education exp_square">  {{ Form::radio('type',1, false) }} <label for="education"> <span><span></span></span>Utbildning </label></div>
           <div class="exp_employment exp_square"> {{ Form::radio('type',0, false) }}<label for="employment"><span><span></span></span>Anställning</label></div>
           <div class="exp_merits exp_square">{{ Form::radio('type',2, false) }}<label for="merits">    <span><span></span></span>Meriter    </label></div>
           <div class="exp_other exp_square"> {{ Form::radio('type',3, false) }}<label for="other">     <span><span></span></span>Övrigt     </label></div>
        </div>


          <div class="things">        
                  <div class="upload_column">
                      <div class="dark_icon employer_icon" id="exp_employer"></div>
                          <h3 class="employerTitle">Arbetsgivare</h3>
                             {{ Form::text('location', Input::old('name'), array('class' => 'form-control')) }}
                  </div>

                  <div class="upload_column">
                    <div class="dark_icon employment_icon" id="exp_description"></div>
                        <h3 class="employmentDescription">Arbetsbeskrivning</h3>
                           {{ Form::text('description', Input::old('name'), array('class' => 'form-control')) }}
                    </div>

                  <div class="upload_column">
                    <div class="dark_icon employment_icon" id="exp_description"></div>
                        <h3 class="employmentDescription">Kategori</h3>
                          {{ Form::select('category', array('0' => 'Kategori'), Input::old('category'), array('id' => 'project_category')) }}
                    </div>

                    <div class="upload_column">
                      <div class="dark_icon location_icon"></div>
                        <div class="time_separator"> 
                        <h3>Län</h3>
                          <select class="form-control" id="state-select">
                            @foreach ($states as $state)
                              <option value="{{ $state->id }}">{{$state->name}}</option>
                            @endforeach
                          </select>
                        </div>
                      <div class="time_separator" > 
                      <h3>Stad</h3>
                        {{ Form::select('cities', array('0' => 'Select a city'), Input::old('cities'), array('class' => 'form-control', 'id' => 'cities')) }}
                      </div>
                  </div>

                  <div class="upload_column">
                    <div class="dark_icon time_icon"></div>
                    <div class="time_separator"> <h3>Från</h3>
                     {{ Form::text('from', Input::old('name'), array('class' => 'form-control')) }}</div>
                    <div class="time_separator"> <h3>Till</h3>
                    {{ Form::text('to', Input::old('name'), array('class' => 'form-control')) }}</div>
                    
                  </div>    
                   
      {{ Form::submit('Lägg till erfarenhet', array('class' => 'submit_project')) }}
           {{ HTML::ul($errors->all()) }}  
    {{ Form::close() }}

           </div>

      </div>


          <h1>Mina erfarenheter</h1>
  @foreach ($experiences as $experience)
      <div id="my_experience">
        <div class="ex_column">
            @if ($experience->type === '0')
            <div class="ex ico_employment">
            Anställning
            @elseif ($experience->type === '1')
            <div class="ex ico_education">
            Utbildning
            @elseif ($experience->type === '2')
            <div class="ex merits_icon">
            Merit
            @elseif ($experience->type === '3')
            <div class="ex other_icon">
            Övrigt
            @endif
            </div>
                <h2 class="edit_this edit_column">Redigera anställning</h2>

              <div class="edit_wrapper">

                   <!-- <Plats/tid>  -->
                      <div class="ex_float hide_this exp_location">
                        @foreach ($cities as $city)
                        {{ $city->name }}
                        @endforeach
                       <img src="img/icons/edit/location.PNG"/>

                     </div>
                      <div class="ex_float hide_this">{{ $experience->duration }} <img src="img/icons/edit/time.PNG"/></div>
                   <!-- </Plats/tid>  -->

                   <!-- <Redigera plats/tid>  -->
                       <div class="ex_float edit_this"> 
                       <img src="img/icons/edit/location.PNG" style="float: right;"/><select><option value="none">Västra Götaland</option>
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
                       <div class="ex_float edit_this"><input value="2014"></input><input value="2014"></input> <img src="img/icons/edit/time.PNG"/></div>
                  <!-- </Redigera plats/tid>  -->
                   
                  
                          

                   <!-- <Kontrollknappar>  -->
                          <div class="ex_button" style="background-color: #d70808;"><img src="img/icons/edit/delete.PNG"/></div>
                          <div class="ex_button edit_experience"><img src="img/icons/edit/edit.PNG"/></div>
                          <div class="ex_button edit_references"><img src="img/icons/edit/add.PNG"/></div>
                          <div class="ex_button"><img src="img/icons/edit/search.PNG"/></div>

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
                {{ Form::open(array('url' => 'experience/'.$experience->id)) }}
                <div class="ref_column">
                  <h3> Förnamn</h3>
                  <input type="text" class="references_input" id="first_name"></input>

                  <h3>Efternamn</h3>
                  <input type="text" class="references_input" id="last_name"></input>

                </div>

                 <div class="ref_column">

                    <h3>Email </h3>
                    <input type="text" class="references_input" id="email_address"></input>

                    <h3>Telefon </h3>
                    <input type="text" class="references_input" id="phone_number"></input>
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
            <img src="img/small_menu.PNG"/> Visa referenser <br/>
            
              <div class="allreferences">

                <div class="ref_square">
                        <div class="delete_reference"><img src="img/icons/edit/delete.PNG"/></div>
                    <img src="img/references.PNG"/> Lord Voldemort<br/> <img src="img/phonenumber.PNG"/>  073-4V4D4-K3D4VR4  <br/> <img src="img/email.PNG"/> lord.voldemort@deatheaterslondon.net
                </div>

                <div class="ref_square">
                        <div class="delete_reference"><img src="img/icons/edit/delete.PNG"/></div>
                  <img src="img/references.PNG"/> Albus Dumbledore<br/> <img src="img/phonenumber.PNG"/>  073-M4G1C-D00MBL3  <br/> <img src="img/email.PNG"/> albus.dumbledore@hogwarts.net
                </div>

              </div>
            </div>
             <!-- </Referenser>  -->
@endforeach

          </div>

      </div>

  </div>
</div>






<script>
function deleteExp() {
    confirm("Vill du ta bort?");
}
</script>
@stop