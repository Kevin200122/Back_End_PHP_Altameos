<?php
session_start();
include('config.php');
if(!$_SESSION['pseudo']) {
    header('Location: connexion.php');
}
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="keywords" content="htmlcss bootstrap, multi level menu, submenu, treeview nav menu examples" />
<meta name="description" content="Bootstrap 5 navbar multilevel treeview examples for any type of project, Bootstrap 5" />  

<title>Demo - Bootstrap 5 multilevel dropdown submenu sample</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
<link href="../styles/Accueil.css" rel="stylesheet" type="text/css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"crossorigin="anonymous"></script>

<script type="text/javascript">
//	window.addEventListener("resize", function() {
    //		"use strict"; window.location.reload(); 
    //	});
    
    
    document.addEventListener("DOMContentLoaded", function(){
        
        
        /////// Prevent closing from click inside dropdown
        document.querySelectorAll('.dropdown-menu').forEach(function(element){
            element.addEventListener('click', function (e) {
                e.stopPropagation();
            });
        })
        
        
        
        // make it as accordion for smaller screens
        if (window.innerWidth < 992) {
            
            // close all inner dropdowns when parent is closed
            document.querySelectorAll('.navbar .dropdown').forEach(function(everydropdown){
                everydropdown.addEventListener('hidden.bs.dropdown', function () {
                    // after dropdown is hidden, then find all submenus
                    this.querySelectorAll('.submenu').forEach(function(everysubmenu){
                        // hide every submenu as well
                        everysubmenu.style.display = 'none';
                    });
                })
            });
            
            document.querySelectorAll('.dropdown-menu a').forEach(function(element){
                element.addEventListener('click', function (e) {
                    
                    let nextEl = this.nextElementSibling;
                    if(nextEl && nextEl.classList.contains('submenu')) {	
                        // prevent opening link if link needs to open dropdown
                        e.preventDefault();
                        console.log(nextEl);
                        if(nextEl.style.display == 'block'){
                            nextEl.style.display = 'none';
                        } else {
                            nextEl.style.display = 'block';
                        }
                        
                    }
                });
            })
        }
        // end if innerWidth
        
    }); 
    // DOMContentLoaded  end
    </script>
    </head>
    <body>
    
    <!-- ============= COMPONENT ============== -->
    
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav"  aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    
    
    <div class="collapse navbar-collapse" id="Main_nav">
    
    
    <ul class="navbar-nav"> 
    <img src="../Image/titan-fm-logo copie 1.png" alt="logo" id="Le_logo"/>
    <li class="nav-item active"> <a class="nav-link" href="#" id="Accueil">ACCUEIL </a> </li>
    <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="Titan" data-bs-toggle="dropdown">  TITAN BEARD  </a>
    <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="../PHP/A_PROPOS_DE_MOI.php"> A PROPOS DE L'ARTISTE </a></li>
    <li><a class="dropdown-item" href="#"> ALBUMS </a>
    </li>
    <ul class="submenu dropdown-menu">
    <li><a class="dropdown-item" href="#">Submenu item 1</a></li>
    <li><a class="dropdown-item" href="#">Submenu item 2</a></li>
    <li><a class="dropdown-item" href="#">Submenu item 3 </a>
    <ul class="submenu dropdown-menu">
    <li><a class="dropdown-item" href="#">Multi level 1</a></li>
    <li><a class="dropdown-item" href="#">Multi level 2</a></li>
    </ul>
    </li>
    <li><a class="dropdown-item" href="#">Submenu item 4</a></li>
    <li><a class="dropdown-item" href="#">Submenu item 5</a></li>
    </ul>
    </li>
    <li><a class="dropdown-item" href="../PHP/Clip_Et_Videos.php"> CLIPS & VIDÉOS </a></li>
    <li><a class="dropdown-item" href="#"> ACTUALITÉS </a>
    <li><a class="dropdown-item" href="#"> ILS PARLENT DE MOI... </a>
    <li><a class="dropdown-item" href="../PHP/Contact.php"> CONTACT </a>
    </ul>
    </li>
    <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="Association" data-bs-toggle="dropdown"> ASSOCIATION </a>
    <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="#"> Dropdown item 1 </a></li>
    <li><a class="dropdown-item" href="#"> Dropdown item 2 </a>
    <ul class="submenu dropdown-menu">
    <li><a class="dropdown-item" href="#">Submenu item 1</a></li>
    <li><a class="dropdown-item" href="#">Submenu item 2</a></li>
    <li><a class="dropdown-item" href="#">Submenu item 3</a></li>
    </ul>
    </li>
    <li><a class="dropdown-item" href="#"> Dropdown item 3  </a>
    <ul class="submenu dropdown-menu">
    <li><a class="dropdown-item" href="#">Another submenu 1</a></li>
    <li><a class="dropdown-item" href="#">Another submenu 2</a></li>
    <li><a class="dropdown-item" href="#">Another submenu 3</a></li>
    <li><a class="dropdown-item" href="#">Another submenu 4</a></li>
    </ul>
    </li>
    <li><a class="dropdown-item" href="#"> Dropdown item 4 </a>
    <ul class="submenu dropdown-menu">
    <li><a class="dropdown-item" href="#">Another submenu 1</a></li>
    <li><a class="dropdown-item" href="#">Another submenu 2</a></li>
    <li><a class="dropdown-item" href="#">Another submenu 3</a></li>
    <li><a class="dropdown-item" href="#">Another submenu 4</a></li>
    
    <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="Association" data-bs-toggle="dropdown">RADIO TITAN </a>
    <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="#"> Dropdown item 1 </a></li>
    <li><a class="dropdown-item" href="#"> Dropdown item 2 </a>
    <ul class="submenu dropdown-menu">
    <li><a class="dropdown-item" href="#">Submenu item 1</a></li>
    <li><a class="dropdown-item" href="#">Submenu item 2</a></li>
    <li><a class="dropdown-item" href="#">Submenu item 3</a></li>
    </ul>
    </li>
    <li><a class="dropdown-item" href="#"> Dropdown item 3  </a>
    <ul class="submenu dropdown-menu">
    <li><a class="dropdown-item" href="#">Another submenu 1</a></li>
    <li><a class="dropdown-item" href="#">Another submenu 2</a></li>
    <li><a class="dropdown-item" href="#">Another submenu 3</a></li>
    <li><a class="dropdown-item" href="#">Another submenu 4</a></li>
    </ul>
    </li>
    <li><a class="dropdown-item" href="#"> Dropdown item 4 </a>
    <ul class="submenu dropdown-menu">
    <li><a class="dropdown-item" href="#">Another submenu 1</a></li>
    <li><a class="dropdown-item" href="#">Another submenu 2</a></li>
    <li><a class="dropdown-item" href="#">Another submenu 3</a></li>
    <li><a class="dropdown-item" href="#">Another submenu 4</a></li>
    </ul>
    </li>
    </ul>
    </ul>
    </li>
    </ul>
    
    
    </div> <!-- navbar-collapse.// -->
    </div> <!-- container-fluid.// -->
    </nav>
    
    <!-- ============= COMPONENT END// ============== -->
    
    
    </div><!-- container //  -->
    <h1>ENTREZ DANS L'UNIVERS <br> DE <br> TRISTAN BEARD</h1>
    <button href="">DEVENIR MEMBRE</button>
    </body>
    
    </html>