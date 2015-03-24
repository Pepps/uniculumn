 @extends('layouts.master')
@section('content')

@include('layouts.nav')
@yield('nav')

<div id="main_content">
           {{ HTML::ul($errors->all()) }}
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
                    @if (!$experiences)

                    @foreach ($experiences as $experience)

                    <?php

                     $titles = array_pad(explode('-', $experience->location, 2), 2, $experience->location);

                    ?>
                    @endforeach
                    @else
                    <?php
                    $titles = ["", ""];
                    ?>


                    @endif
                  <div class="upload_column">
                      <div class="dark_icon employer_icon" id="exp_employer"></div>

                          <h3 class="employerTitle">Arbetsgivare</h3>
                             {{ Form::text('location', $titles[0], Input::old('name'), array('class' => 'form-control')) }}
                  </div>

                  <div class="upload_column">
                    <div class="dark_icon employment_icon" id="exp_description"></div>

                          <h3>Titel</h3>
                             {{ Form::text('title', $titles[1], Input::old('name'), array('class' => 'form-control')) }}
                  </div>

                  <div class="upload_column">
                      <div class="dark_icon employer_icon" id="exp_employer"></div>
                        <h3 class="employmentDescription">Arbetsbeskrivning</h3>
                           {{ Form::text('description', Input::old('name'), array('class' => 'form-control')) }}
                    </div>

                  <div class="upload_column">
                    <div class="dark_icon categories_icon" id="exp_description"></div>
                        <h3>Kategori</h3>
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
                        {{ Form::select('cities',array('0' => 'Select a city'), Input::old('cities'), array('class' => 'form-control', 'id' => 'cities')) }}
                      </div>
                  </div>

                  <div class="upload_column">
                    <div class="dark_icon time_icon"></div>
                    <div class="time_separator"> <h3>Från</h3>
                     {{ Form::text('from', Input::old('name'), array('class' => 'form-control', 'placeholder' => 'År')) }}</div>
                    <div class="time_separator"> <h3>Till</h3>
                    {{ Form::text('to', Input::old('name'), array('class' => 'form-control', 'placeholder' => 'År')) }}</div>

                  </div>

      {{ Form::submit('Lägg till erfarenhet', array('class' => 'submit_project')) }}

    {{ Form::close() }}

           </div>

      </div>


          <h1>Mina erfarenheter</h1>
         @foreach ($experiences as $experience)
      <div id="my_experience">


          <div class="ex_column">
            @if ($experience->type === '0')
            <div class="ex ico_employment">Anställning</div>
 <h2 class="edit_this edit_column">Redigera anställning</h2>
            @elseif ($experience->type === '1')
            <div class="ex ico_education">Utbildning</div>
            @elseif ($experience->type === '2')
            <div class="ex ico_merits">Merit</div>
            @elseif ($experience->type === '3')
            <div class="ex ico_other">Övrigt</div>
            @endif
              {{ Form::open(array('url' => array('/experience/' . $experience->id . '/update'), 'method' => 'post')) }}

                  <div class="edit_wrapper">

                       <!-- <Plats/tid>  -->
                        <div class="ex_float hide_this exp_location">

                          {{ City::find($experience->city_id)->name }}

                         <img src="../img/icons/edit/location.PNG"/>

                       </div>
                        <div class="ex_float hide_this">{{ $experience->duration }} <img src="../img/icons/edit/time.PNG"/></div>
                       <!-- </Plats/tid>  -->
                       <!-- <Redigera plats/tid>  -->
                         <div class="ex_float edit_this">

                 <img src="img/icons/edit/location.PNG" style="float: right;"/>
                 {{ Form::select('change-cities', array($experience->city_id => 'Select a city'), Input::old('cities'), array('class' => 'form-control', 'id' => 'change-cities')) }}

                 <select id="change-state-select">
                  @foreach ($states as $state)
                        <option value="{{ $state->id }}">{{$state->name}}</option>
                      @endforeach
                    </select>

                    </div>

                    <?php
                     $duration = array_pad(explode('-', $experience->duration, 2), 2, $experience->duration);

                    ?>

                   <div class="ex_float edit_this">
                    {{ Form::text('from', $duration[0], Input::old('name')) }}
                    {{ Form::text('to', $duration[1], Input::old('name')) }}

                      <img src="../img/icons/edit/time.PNG"/>
                  </div>
<!-- </Redigera plats/tid>  -->

                       <!-- <Kontrollknappar>  -->



                      <a onclick="return confirm('Är du säker på att du vill ta bort?')" href="{{ URL::to('/experience/' . $experience->id . '/deleteExp') }}"><div class="ex_button" style="background-color: #d70808;"><img src="../img/icons/edit/delete.PNG"/></div></a>

                        <div class="ex_button edit_experience"><img src="../img/icons/edit/edit.PNG"/></div>
                        <div class="ex_button edit_references"><img src="../img/icons/edit/add.PNG"/></div>
                                                    <!-- <Spara ändringar>  -->

                    <button class="add_edit edit_this" style="border: none;">

                          Spara ändringar

                    </button>
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
                    <div class="edit_this">{{ Form::text('location', $experience->location, Input::old('name')) }}</div>
                 <!-- </Redigera titel>  -->

                 <div class="ex_description">
                 <!-- <Beskrivning>  -->
                   <span class="hide_this">{{ $experience->description }}</span>
                 <!-- </Beskrivning>  -->

                 <!-- <Redigera beskrivning>  -->
                    <div class="edit_this">{{ Form::textarea('description', $experience->description, Input::old('name'), array('class' => 'edit_this')) }}</div>
                 <!-- </Redigera beskrivning>  -->

                 </div>

          {{ Form::close() }}

  <!-- <Referenser>  -->
    <div class="show_references">
      <img src="../img/small_menu.PNG"/> Visa referenser <br/>
    <div class="allreferences">

      @foreach ($experience->reference as $ref)
    <div class="ref_square">
      <a onclick="return confirm('Är du säker på att du vill ta bort?')" href="{{ URL::to('/reference/' . $ref->id . '/deleteRef') }}">
    <div class="delete_reference">
      <img src="../img/icons/edit/delete.PNG"/>
    </div></a>
      <img src="../img/references.PNG"/> {{ $ref->firstname }}  {{ $ref->lastname }}<br/>
      <img src="../img/phonenumber.PNG"/>{{ $ref->phone }}  <br/>
      <img src="../img/email.PNG"/>  {{ $ref->email }}
        </div>
      </div>
      @endforeach
    </div>
   <!-- </Referenser>  -->




 </div>
   <!-- <Lägg till ny referens>  -->
    <div class="references_choices">

      <div class="ref_column">
        {{ Form::open(array('url' => '/reference/' . $experience->id, 'method'=>'post')) }}

          {{ Form::text('expid',$experience->id, Array('style' => 'display:none;') ) }}

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


                <button class="addreference blue_submit">
                Lägg till

                {{ Form::close() }}
              </button>

              <div class="clearreference">
                Ta bort
              </div>
            </div>
          </div>
  <!-- </Lägg till ny referens>  -->
 

    @endforeach
 </div>
</div>



@stop
