@extends('layout')
@section('content')
    <p id="url">http://www.unicolum.se/search/</p>
    <form>
      <h2>Vad vill du söka i?</h2>
      <input class="option" type="radio" name="option" value="user"><lable>Användare</lable>
      <input class="option" type="radio" name="option" value="project"><lable>Projekt</lable>
      <input class="option" type="radio" name="option" value="experince"><lable>Erfarenheter</lable>
      <input class="option" type="radio" name="option" value="category"><lable>Kategorier</lable>
      <input class="option" type="radio" name="option" value="status"><lable>Status</lable>
    </form>
    <form id="keysform" style="display:none">
      <h2>Vad söker du efter?</h2>
      <input class="key" type="checkbox" value="user"><lable>Användare</lable>
      <input class="key" type="checkbox" value="project"><lable>Projekt</lable>
      <input class="key" type="checkbox" value="experince"><lable>Erfarenheter</lable>
      <input class="key" type="checkbox" value="category"><lable>Kategorier</lable>
      <input class="key" type="checkbox" value="status"><lable>Status</lable>
    </form>
@stop
