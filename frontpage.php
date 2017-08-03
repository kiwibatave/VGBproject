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
                <div id="slider" class="carousel-inner onebyone-carosel">

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

       $.ajax({
          url :' https://raw.githubusercontent.com/Coda-Wikicoda/Json-bibliotheque/master/list.json',
          type :'get',
          dataType :'json',

          success: function(data) {
            var change="";
              for(var i=0; i <7 ; i++) {
                if(i==0? change = 'item active' : change = 'item')

             $('#slider').append('<div class="' + change + '" <div class="col-md-4><a href="#">'+
             '<img src="' + data.books[i].cover + '" class="img-responsive center-block" ></a>'+
             '<div class="text-center">' + data.books[i].title + '</div></div></div>');

           }
          },
          error : function() {
            $('#myCarousel').html('Erreur');
            }
          });

       $('#myCarousel').carousel({
        interval: 4000
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
  </body>
</html>
