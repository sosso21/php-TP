<?php 


// SESSION
if (!empty(@$_SESSION['prenom']  ) ) { 
    $welcome = 'Bienvenu '. $_SESSION['prenom'] . ' ! '; 
    }
     
?>
<h4 class="my-4"> <?= @$welcome ?>  </h4>
</div>

<div class="parentSlider" id="c1"></div>
    <div class="slick d-none ">
        <img src="View/image/photo-1462206092226-f46025ffe607.jpg" alt="image2">
        <img src="View/image/photo-1454165804606-c3d57bc86b40.jpg" alt="image1">
        <img src="View/image/photo-1511988617509-a57c8a288659.jpg" alt="image3">
        <img src="View/image/photo-1529333166437-7750a6dd5a70.jpg" alt="image4">
    </div>
</div>

<h1  id='m_s' class=" container font-weight-light my-4 ">Maroua Shopping</h1> 

<div class="container">
    
<form class='q'  method="get">

<input type="text" name=""q id="q" placeholder="Rechercher" >
 <a class="btn  ">
 <svg class="bi bi-search" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
  <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
</svg>
 </a>


</form>
<br>
<form class="filter" method="get" action=""> 
  <label for="order" > Tirer Par  </label>  <select name="order" id="order">
  <option value=''"> </option>
        <option value="id">Identifiant</option>
        <option value="name">Nom</option> 
        <option value="prix">Prix</option>
        <option value="p_date">Date</option>
    </select> </label> 

    <label for="dir" >   Ordre </label>  <select name="dir" id="dir">

        <option value="DESC">Déscendant</option>    
        <option value="ASC">Ascendant </option>
    </select>    </label> 

    
               filtrer les prix :
        <label for="min">  Entre   
            <input type="number" name='min' id='min' >
        </label>
        <label for="max">   et    
            <input type="number" name='max' id='max' >
        </label>
    
    <label for="devise" >    Unitée    </label>  <select name="devise" id="devise">
        <option value=''"> </option>
        <option value="DZD">DZD </option>
        <option value="point">Points</option>
    </select> </label> 

</form>

</div>
<main id="main-home" >


<section id="home-categories">
<p class="spinner-border">
    
</p> 

</section>
<section id="home-produits">
<p class="spinner-border">
    
</p> 
</section>
</main>
<div class="parentmore">
    
    <div class="more  ">
        <a id="pv" class='btn btn-outline-secondary  rounded-circle  '  href="#1"> <  </a> <a class='btn btn-outline-secondary  rounded-circle ' id="nx" href="#31" >  > </a>
    </div>
</div>









<div class='container' > 

<script type="text/javascript"  src="elements/js/jquery.js"></script>
<script async type="text/javascript"  src="elements/js/home.js"></script>
<script src="elements/js/slick/slick.js" type="text/javascript" ></script>
<script async type="text/javascript"  src="elements/js/carou.js"></script>








