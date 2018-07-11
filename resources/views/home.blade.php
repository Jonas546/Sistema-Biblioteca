@extends('layout')

@section('title', 'Biblioteca - Home')

@section('content')

<style type="text/css">
footer {
background-color: #555;
color: #fff;
}
</style>

<input type="hidden" id="h_menu" value='default'>

<div class="container">
<br/>
<h2>Biblioteca Online</h2>
</br>

<div class="row">
  <div class="col">
    <img src="{{ asset('img/img1.jpg')}}" class="img-thumbnail">
    <p>A leitura é fundamental para o desenvolvimento intelectual e para a construção do conhecimento, pois ela modifica, transforma, amplia a visão de mundo, proporciona a descoberta da realidade, das idéias, das palavras, levando o leitor até a sua plenitude humana.</p>
  </div>
  <div class="col">
    <img src="{{ asset('img/img2.jpg')}}" class="img-thumbnail">
    <p>E a Poesia é extremamente significativa para a reflexão e para a descoberta do interior de cada um, possibilitando, assim, a aprendizagem e o prazer pela leitura e pela literatura.</p>
  </div>
  <div class="w-100"></div>
  <div class="col">
    <img src="{{ asset('img/img3.jpg')}}" class="img-thumbnail">
    <p>Acreditamos que através do texto poético é possível ensinar e aprender, abrindo portas nos corações e deixando fluir toda a sensibilidade existente na essência de cada ser. E, quem sabe, assim, seja viável a construção de um mundo diferente, mais humano.</p>
  </div>
  <div class="col">
    <img src="{{ asset('img/img4.jpg')}}" class="img-thumbnail">
    <p>"Amar a poesia é forma de praticá-la recriando-a. O que eu pediria à escola, se não me faltassem luzes pedagógicas, era considerar a poesia como primeira visão direta das coisas e depois como veículo de informação prática e teórica, preservando em cada aluno o fundo mágico, lúdico, intuitivo e criativo, que se identifica basicamente com a sensibilidade poética." </p>
  </div>
</div>
<br/>
</div>

<div>
<footer class="container-fluid">

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2018 Copyright: Biblioteca<p></p></div>
  <!-- Copyright -->

</footer>
</div>

@stop

