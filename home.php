<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ARDHAS SCHOOL</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
 
</head>
<style>





.categories{
  padding-top: 40px;
    text-align: center;

  }
  .cat h3{
    font-size:60px;
    font-weight: 900;
    color: #e1e1e9;
    line-height: 1em;
    opacity: .6;
    margin: 0;
    position: relative;
    z-index: -1;}
  .cat p{
    font-size: 22px;
    margin-top: -30px;
    font-weight: 600;
    line-height: 1.4em;
    padding-bottom: 10px;
  }
  .mes-caption p{
    color: #7a7778;
    padding-bottom: 30px;
  }


.image{
    height:250px;
    width:100%;
    display: block;
}
.thumbnail {
            margin-bottom: 20px; 
        }
        .img-container {
            position: relative;
            overflow: hidden;
            border-radius: 8px;
        }
       
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            background-color: rgba(0, 0, 0, 0.5); 
            color: white;
            opacity: 0;
            transition: opacity 0.3s ease;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .caption {
            text-align: center;
            font-size: 1.5rem;
            font-weight: bold;
        }
        .img-container:hover .overlay {
            opacity: 1; 
        }
        .card {
            border: 1px solid #000;
            background-color: #fff;
            transition: transform 0.3s;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .card-title {
            font-size: 1.5rem;
            font-weight: bold;
            color: #333;
        }
        .card-text {
            font-size: 1.1rem;
            color: #666;
        }
     /* gallery */
     .row {
  display: flex;
  flex-wrap: wrap;
  padding: 0 4px;
}

.column {
  flex: 25%;
  max-width: 25%;
  padding: 0 4px;
}

.column img {
  margin-top: 8px;
  vertical-align: middle;
  width: 100%;
}

@media screen and (max-width: 800px) {
  .column {
    flex: 50%;
    max-width: 50%;
  }
}

@media screen and (max-width: 600px) {
  .column {
    flex: 100%;
    max-width: 100%;
  }
}

.carousel-caption{
  top: 60px;
}

.carousel-caption h1{
  font-size: 15px;
}

@media screen and (min-width: 425px) {
  .carousel-caption{
    top: 80px;
  }
  .carousel-caption h1{
  font-size: 25px;
}
}
@media screen and (min-width: 375px) {
  .carousel-caption{
    top: 70px;
  }
  .carousel-caption h1{
  font-size: 22px;
}
}
@media screen and (min-width: 768px) {
  .carousel-caption{
    top: 190px;
  }
  .carousel-caption h1{
  font-size: 35px;
}
}
@media screen and (min-width: 1024px) {
  .carousel-caption{
    top: 250px;
  }
  .carousel-caption h1{
  font-size: 40px;
}
}


.modal-body img{

width:450px;height:500px;}
@media screen and (min-width: 320px) {

.modal-body img{
  width:250px;height:350px;

}
}
/* @media screen and (max-width: 375px) {

.modal-body img{
  width:300px;height:350px;

}
} */

    </style>

<body>
    
    <?php 
    include("homeheader.php");

     ?>


<!-- courosel -->
<div id="carouselExampleCaptions" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
  <div class="carousel-item active">
  <img src="assets/images/carousel3cam.png" class="w-100" alt="..." style="max-height: 720px;">
  <div class="carousel-caption">
    <h1 class="fw-bold">
      Your <span class="text-primary">Inspiration</span><br>
      <span class="text-secondary"> Partner for </span><span>Growth.</span>
    </h1>
    <button type="button" class="btn btn-primary btn-md" data-bs-toggle="modal" data-bs-target="#exampleModal">Admission Opens</button>
    <div class="container">
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-black" id="exampleModalLabel">Admission Opens</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <img src="assets/images/admission.png">
      </div>
</div>
    </div>
  </div>
</div>


  </div>
</div>

<div class="carousel-item">
  <img src="assets/images/carousel1can.png" class="d-block w-100" alt="..." style="max-height: 720px;"> 
  <div class="carousel-caption">
    <h1 class="fw-bold">
      Your <span class="text-primary">Presence</span><br>
      <span class="text-secondary"> Makes Things </span><span> Different.</span>
    </h1>
    <button type="button" class="btn btn-primary btn" data-bs-toggle="modal" data-bs-target="#exampleModalclassroom">Class Rooms</button>

<div class="container">
<div class="modal fade" id="exampleModalclassroom" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-title text-black" id="exampleModalLabel">Class Rooms</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
  </div>
  <div class="modal-body">
  <img src="assets/images/classroom.png">
  </div>
</div>
</div>
</div>
</div>

</div>
</div>

<div class="carousel-item">
  <img src="assets/images/carousel3.png" class="d-block w-100" alt="..." style="max-height: 720px;">
  <div class="carousel-caption">
    <h1 class="fw-bold">
      For <span class="text-primary">Future</span><br>
      <span class="text-secondary"> Leader </span><span> Enhancing.</span>
    </h1>
    <button type="button" class="btn btn-primary btn" data-bs-toggle="modal" data-bs-target="#exampleModallib">E-Library</button>

    <div class="container">
<div class="modal fade" id="exampleModallib" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-black" id="exampleModalLabel">E-Library</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <img src="assets/images/library.png">
      </div>
</div>
    </div>
  </div>
</div>


  </div>
</div>

  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>








<!-- body content -->

<!-- our services -->
<div class="categories text-black" id="services">
  <div class="catergories-name">
   <div class="cat"><h3>SERVICES</h3>
   <p>What we do?</p></div>
  </div>
  <div class="mes-caption"><p>Explore from the best choosen for your children</p></div>




<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="thumbnail">
                <div class="img-container">
                    <img src="assets/images/academics.png" alt="Academics" class="image">
                    <div class="overlay">
                        <p class="caption">Academics</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="thumbnail">
                <div class="img-container">
                    <img src="assets/images/achievements.png" alt="Achievements" class="image">
                    <div class="overlay">
                        <p class="caption">Achievements</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="thumbnail">
                <div class="img-container">
                    <img src="assets/images/bus.png" alt="Bus" class="image">
                    <div class="overlay">
                        <p class="caption">Bus</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="thumbnail">
                <div class="img-container">
                    <img src="assets/images/canteen.png" alt="Canteen" class="image">
                    <div class="overlay">
                        <p class="caption">Canteen</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="thumbnail">
                <div class="img-container">
                    <img src="assets/images/clubs.png" alt="Clubs" class="image">
                    <div class="overlay">
                        <p class="caption">Clubs</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="thumbnail">
                <div class="img-container">
                    <img src="assets/images/learningportal.png" alt="Learning Portal" class="image">
                    <div class="overlay">
                        <p class="caption">Learning Portal</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="thumbnail">
                <div class="img-container">
                    <img src="assets/images/news.png" alt="News" class="image">
                    <div class="overlay">
                        <p class="caption">News</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="thumbnail">
                <div class="img-container">
                    <img src="assets/images/sports.png" alt="Sports" class="image">
                    <div class="overlay">
                        <p class="caption">Sports</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="thumbnail">
                <div class="img-container">
                    <img src="assets/images/events.png" alt="Sports" class="image">
                    <div class="overlay">
                        <p class="caption">Events</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    </div>

<!-- why us -->

<div class="categories text-black" id="about">
  <div class="catergories-name">
   <div class="cat"><h3>ABOUT</h3>
   <p>Why us?</p></div>
  </div>
  <div class="mes-caption"><p>Explore what we assure for your children</p></div>



<div class="container">

    <div class="row row-cols-1 row-cols-md-2 g-4">
        <div class="col">
            <div class="card h-100 shadow">
                <div class="card-body">
                    <h5 class="card-title border-bottom">Vision</h5>
                    <p class="card-text">
                        <p>"The Ardhas School prepares students to understand, contribute to, and succeed in a rapidly changing society, thus making the world a better and more just place.We will ensure that our students develop both the skills that a sound education provides and the competencies essential for success and leadership in the emerging creative economy. We will also lead in generating practical 
                              and theoretical knowledge that enables people to better understand our world and improve conditions for local and global communities."</p>
                    </p>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100 shadow">
                <div class="card-body">
                    <h5 class="card-title border-bottom">Mission</h5>
                    <p class="card-text ">
                        <p>"The mission of our school is to cultivate academic excellence, nurturing each student's intellectual curiosity and preparing
                             them for future academic pursuits and careers. We are committed to fostering personal growth by 
                             supporting the holistic development of our students—intellectually, socially, emotionally, and
                              physically—instilling values of honesty, integrity, respect, and responsibility. Embracing diversity 
                              and inclusion, we strive to create a welcoming community that celebrates differences and promotes 
                              equity for all."</p>
                </p>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100 shadow">
                <div class="card-body">
                    <h5 class="card-title border-bottom">Values</h5>
                    <p class="card-text">
                        <p>"At our school, we cherish values that shape our community and guide our actions every day.
                             Excellence is at the core of our mission, driving us to achieve high academic standards and nurture 
                             personal growth in every student. Integrity forms the foundation of our interactions, emphasizing honesty, ethical conduct, and accountability in all endeavors. We value respect, celebrating diversity and creating a supportive environment where everyone is valued and included." </p>
                    </p>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100 shadow">
                <div class="card-body">
                    <h5 class="card-title border-bottom">History</h5>
                    <p class="card-text">
                        <p>"Our school was founded in 1997 with a vision to provide quality education .Over the years,
                             it grew steadily, expanding its facilities, curriculum offerings, and student body.Throughout its history, our 
                             school has been committed to core values, aiming to foster academic excellence, 
                             personal growth, and community engagement among its students.Today, our school continues to 
                             uphold its legacy of values and mission." </p>
                    </p>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100 shadow">
                <div class="card-body">
                    <h5 class="card-title border-bottom">Achievements</h5>
                    <p class="card-text">
                        <p>"Throughout its history, our school has celebrated numerous achievements that reflect 
                            our commitment to excellence and community. Academically, our students consistently achieve
                             high honors in national competitions and exams, showcasing their dedication to learning and mastery
                              of subjects. Our sports teams have garnered multiple championships 
                            in various leagues, demonstrating teamwork, discipline, and sportsmanship."</p>
                    </p>
                </div>
            </div>
        </div>
    </div>

</div>

    </div>
<!-- contact form -->
<div class="categories text-black" id="contact">
  <div class="catergories-name">
   <div class="cat"><h3>CONTACT</h3>
   <p>Any queries?</p></div>
  </div>
  <div class="mes-caption"><p>Feel free to ask anything</p></div>




  <div class="container" style="display: flex;
      justify-content: center;
      align-items: center;
      max-height: 100vh;">
    <div class="cards" style="width: 100%;
      max-width: 600px;
      padding: 60px;
      backgroud-color:#fff;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);border-radius:30px;">
<form id="contactForm" action="contact_form.php" method="POST" class="text-black">
<h4 class="mb-4">Your Message</h4>
        <div class="form-group mb-3">
          <label for="fname" class="d-flex justify-content-start">Name</label>
          <input type="text" class="form-control" id="fname" name="firstname" minlength=2 placeholder="Enter your name" required>
        </div>
        <div class="form-group mb-3">
          <label for="email" class="d-flex justify-content-start">Email</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
        </div>
        <div class="form-group mb-3">
          <label for="message" class="d-flex justify-content-start">Message</label>
          <textarea class="form-control" id="message" name="message" placeholder="Write your query" style="height:100px" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
 
  <script>
  $(document).ready(function() {
    $("#contactForm").validate({
      rules: {
        firstname: {
          required: true,
          minlength: 2,
          lettersonly: true,
          noMiddleSpace:true
        },
        email: {
          required: true,
          email: true,
          pattern:true
        },
        message: {
          required: true,
          minlength: 5,
          noSpace:true
        }
      },
      messages: {
        firstname: {
          required: "Please enter your name",
          minlength: "Your name must consist atleast 2 characters",
          lettersonly: "Please enter alphabets only",
          noSpace:"Space not allowed"

        },
        email: {
          required: "Please enter your email",
          email: "Please enter a valid email address",
          pattern:"Please enter a valid email address"
        },
        message: {
          required: "Please enter a message",
          minlength: "Your message must be atleast 5 characters long",
          noMiddleSpace:"Please enter some message"

        }
      },
      errorElement: "div",
      errorPlacement: function(error, element) {
        error.addClass("invalid-feedback");
        error.insertAfter(element);
      },
      highlight: function(element, errorClass, validClass) {
        $(element).addClass("is-invalid").removeClass("is-valid");
      },
      unhighlight: function(element, errorClass, validClass) {
        $(element).addClass("is-valid").removeClass("is-invalid");
      }
    });
    $.validator.addMethod("lettersonly", function(value, element) {
      return this.optional(element) || /^[a-zA-Z\s]*$/i.test(value);
    }, "Letters only please");
    $.validator.addMethod("pattern", function(value, element) {
      return this.optional(element) || /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i.test(value);
    }, "Please enter valid email address");
    $.validator.addMethod("noMiddleSpace", function(value, element) { 
    return value.indexOf(" ") < 0 && value != ""; 
  }, "Space are not allowed");
  $.validator.addMethod("noSpace", function(value, element) {
      return this.optional(element) || /^(?!\s).*$/i.test(value);
    }, "Please enter valid email address");


  });
</script>









<!-- gallery -->
<div class="categories text-black" id="gallery">
  <div class="catergories-name">
   <div class="cat"><h3>GALLERY</h3>
   <p>Join with us</p></div>
  </div>
  <div class="mes-caption"><p>Moments we cherish</p></div></div>


<div class="container">
<div class="row">
  <div class="column">
    <img src="assets/images/gallery8.png">
    <img src="assets/images/gallery9.png">
    <img src="assets/images/gallery10.png">
  </div>
  <div class="column">
  <img src="assets/images/gallery2.png">
    <img src="assets/images/gallery3.png">
    <img src="assets/images/gallery5.png">
    
  </div>
</div>
</div>

<!-- footer -->
<div class="mt-5"></div>

<!-- footer file -->
<?php 
    include("footer.php");
?>
</body>
</html>









