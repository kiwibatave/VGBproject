  <?php include("head.php");?>
  <link href="css/frontpage.css" rel="stylesheet">
  </head>
  <?php include("header.php");?>
    <div class="container">
      <h1>Nouveautés</h1>
         <div class="row">
             <div class="span12">
                 <div class="well">
                     <div id="myCarousel" class="carousel fdi-Carousel slide">
                      <!-- Carousel items -->
                         <div class="carousel fdi-Carousel slide" id="eventCarousel" data-interval="0">
                             <div class="carousel-inner onebyone-carosel">
                                 <div class="item-active">

                                 </div>
                             </div>
                             <a class="left carousel-control" href="#eventCarousel" data-slide="prev"></a>
                             <a class="right carousel-control" href="#eventCarousel" data-slide="next"></a>
                         </div>
                         <!--/carousel-inner-->
                     </div><!--/myCarousel-->
                 </div><!--/well-->
             </div>
         </div>
     </div>
     <div id="find">
       <input type="text" name="" value="" placeholder="Rechercher un livre">
       <button id="rechercher" type="submit" class="btn btn-primary">Rechercher !</button>
     </div>
     <script>
     $(document).ready(function () {
       $('#myCarousel').carousel({
        interval: 2000
        })
       $('.fdi-Carousel .item').each(function () {
         var next = $(this).next();
         if (!next.length) {
         next = $(this).siblings(':first');
       }
      next.children(':first-child').clone().appendTo($(this));

      if (next.next().length > 0) {
          next.next().children(':first-child').clone().appendTo($(this));
      }
      else {
          $(this).siblings(':first').children(':first-child').clone().appendTo($(this));
      }
  });
});
     </script>
     <script>
     $.ajax({
        url :'./json/list.json',
        type :'get',
        dataType :'json',

        success: function(data) {
         for(var i=0; i <7 ; i++) {
           $('.item-active').append('<div class="item"><div class="col-md-4"><div class="text-center">' + data.books[i].title + '</div></div></div><img src="' + data.books[i].cover + '">');
          }
        //   $('#myCarousel').hide()
        //  });
       },
        error : function() {
          $('#myCarousel').html('Erreur');
        }
      });
     </script>
  </body>
</html>
