<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package gsen
 */

get_header();
?>
<!--banner-->
<div id="banner" class="section_style">
<div class="container">
  <p class="welcome">WELCOME TO GHANA SOCCER EDUCATION NETWORK</p>
  <h1>Providing Opportunites <br/>
    For Student-Athletes<br/>
    In Ghana And Beyond
  </h1>
  <p class="tagline">We specialize in the recruiting process from researching which<br/>schools are a fit, to communicating with college coaches, to resources<br/>for SAT Prep, Ghana Soccer Education Network has you covered.</p>
  <a href="<?= home_url();?>/application" class="btn btn-primary">Get Started</a>
</div>
</div>
<!--Down Arrow-->
<div class="container">
  <div class="down-arrow" id="#main">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22.789 12.191"><defs><style>.da{fill:#fff;}</style></defs><g transform="translate(-6.4 -33.4)"><path class="da" d="M28.956,33.636a.806.806,0,0,0-1.139,0L17.806,43.667,7.774,33.636a.805.805,0,1,0-1.139,1.139L17.217,45.355a.786.786,0,0,0,.569.236.82.82,0,0,0,.569-.236L28.936,34.774a.789.789,0,0,0,.02-1.139Z" transform="translate(0)"/></g></svg>
  </div>
</div>
</div>
      <!--Service-->
    <section class="row bgk_change" id="service">
      <h2 class="top_heading">
          Our Service
      </h2>
      <div class="container">
      <div class="col-row">
        <div class="col-3">
          <div class="service-wrap">
          <div class="img-sub-svg">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 86.492 86.492"><defs><style>.af{fill:#f45b69;}</style></defs><g transform="translate(-0.5)"><path class="af" d="M96.5,416h5.965v2.982H96.5Zm0,0" transform="translate(-78.105 -338.455)"/><path class="af" d="M.5,192H9.447v5.965H.5Zm0,0" transform="translate(0 -156.21)"/><path class="af" d="M1.344,57.32A10.43,10.43,0,0,0,.5,61.372V79.443H9.447V71.625a13.416,13.416,0,0,0-3.323-8.84Zm0,0" transform="translate(0 -46.635)"/><path class="af" d="M139.687,1.059,136.3,0h-.519L121.613,18.89,107.446,0h-.519l-3.388,1.059,18.074,21.946Zm0,0" transform="translate(-83.832)"/><path class="af" d="M165.377,0H144.5l10.439,13.918Zm0,0" transform="translate(-117.158)"/><path class="af" d="M360.6,57.32l-4.782,5.465a13.422,13.422,0,0,0-3.321,8.84v7.817h8.947V61.372A10.43,10.43,0,0,0,360.6,57.32Zm0,0" transform="translate(-286.385 -46.635)"/><path class="af" d="M83.387,16.833a10.383,10.383,0,0,0-4.851-3.248l-8.81-2.753L48.58,36.51,27.434,10.832l-8.81,2.753a10.383,10.383,0,0,0-4.851,3.248L19.17,23a16.393,16.393,0,0,1,4.059,10.8v5.626l50.7,42.251V33.8A16.393,16.393,0,0,1,77.991,23ZM60.51,51.406,49.871,38.638H71.15Zm0,0" transform="translate(-10.799 -8.813)"/><path class="af" d="M245.851,181.127,250.124,176h-8.546Zm0,0" transform="translate(-196.14 -143.193)"/><path class="af" d="M352.5,192h8.947v5.965H352.5Zm0,0" transform="translate(-286.385 -156.21)"/><path class="af" d="M64.5,193.134l26.307,21.923L88.9,217.35,64.5,197.02v8.045l8.412,7.011L71,214.367l-6.5-5.417V237.08H98.258L73.983,216.853l1.911-2.292,27.026,22.519h9.654l-20.7-17.245,1.911-2.292L115.2,235.386v-8.045L64.5,185.09ZM79.412,225.15V234.1H67.482V225.15Zm0,0" transform="translate(-52.07 -150.588)"/></g></svg>
          </div>
          <h4 class="sub_heading">Student-Athlete Recruiting</h4>
          <p class="col-p">We make the college dream a reality by providing the opportunity to introduce student athletes directly to college coaches and maximizing their...<br><span class="strong">Learn More</span></p>
          </div>
          <div class="info-desc">
            <p>Ghana Soccer Education Network makes the college dream a reality by providing the opportunity to introduce student athletes directly to college coaches and maximizing their chances of being seen and recruited by college programs throughout the United States.</p>
          </div>
        </div>
        <div class="col-3">
          <div class="service-wrap">
          <div class="img-sub-svg">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 86.492 86.492"><defs><style>.af{fill:#f45b69;}</style></defs><g transform="translate(28.042)"><path class="af" d="M181.2,0a15.288,15.288,0,1,0,15.2,15.373A15.366,15.366,0,0,0,181.2,0Z" transform="translate(-166)"/></g><g transform="translate(28.01 30.576)"><path class="af" d="M186.114,181H175.978a22.722,22.722,0,0,0-10.168,2.5,63.584,63.584,0,0,1,15.236,6.313,63.587,63.587,0,0,1,15.236-6.313A22.722,22.722,0,0,0,186.114,181Z" transform="translate(-165.81 -181)"/></g><g transform="translate(76.356 45.78)"><path class="af" d="M457.068,271A5.068,5.068,0,0,0,452,276.068V286.2a5.068,5.068,0,1,0,10.136,0V276.068A5.068,5.068,0,0,0,457.068,271Z" transform="translate(-452 -271)"/></g><g transform="translate(0 45.78)"><path class="af" d="M5.068,271A5.068,5.068,0,0,0,0,276.068V286.2a5.068,5.068,0,1,0,10.136,0V276.068A5.068,5.068,0,0,0,5.068,271Z" transform="translate(0 -271)"/></g><g transform="translate(5.068 35.644)"><path class="af" d="M32.534,211A2.533,2.533,0,0,0,30,213.534v2.534A10.146,10.146,0,0,1,40.136,226.2v10.136A10.146,10.146,0,0,1,30,246.475v2.534a2.532,2.532,0,0,0,2.534,2.534c12.991,0,23.378,4.1,33.11,10.3V219.209C55.868,213.6,45.356,211,32.534,211Z" transform="translate(-30 -211)"/></g><g transform="translate(45.78 35.644)"><path class="af" d="M306.644,216.068v-2.534A2.533,2.533,0,0,0,304.11,211c-12.822,0-23.334,2.6-33.11,8.209v42.639c9.732-6.2,20.119-10.3,33.11-10.3a2.533,2.533,0,0,0,2.534-2.534v-2.534a10.146,10.146,0,0,1-10.136-10.136V226.2A10.146,10.146,0,0,1,306.644,216.068Z" transform="translate(-271 -211)"/></g></svg>
          </div>
          <h4 class="sub_heading">SAT/TOEFL Preparation</h4>
          <p class="col-p">One of the most important things we do at Ghana Soccer Education Network is educate and prepare prospective student athletes for...<br><span class="strong">Learn More</span></p>
          </div>
          <div class="info-desc">
            <p>One of the most important services  Ghana Soccer Education Network provide is to educate and prepare prospective student athletes for the SAT/TOEFL. By educating and preparing  High school student athletes and their families about the sports recruiting process and importance of the SAT/TOEFL, we enhance their chances of receiving college academic and athletic scholarship offers.</p><p>We will accomplish this service by providing organized classes and after school programs run by standardized test experts. With access to preparation books and teaching methods otherwise unavailable to these student athletes, these classes and after school programs will allow them more opportunity to better their education, enhance their chances of receiving academic and athletic  scholarships, and ultimately better their lives.</p>
          </div>
        </div>
        <div class="col-3">
            <div class="service-wrap">
            <div class="img-sub-svg">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 86.448 86.492"><defs><style>.af{fill:#f45b69;}</style></defs><path class="a" d="M3.29,296.09a20.719,20.719,0,0,0-2.65,7.927l5.292-2.645Zm0,0" transform="translate(-0.521 -240.897)"/><path class="af" d="M14.766,345.212l-1.2-6.009L7.479,336.77,0,340.508a20.715,20.715,0,0,0,2.779,9.539H11.14Zm0,0" transform="translate(0 -273.994)"/><path class="af" d="M76.125,392l-3.582,4.775,2.288,8.01a20.179,20.179,0,0,0,9.775.07l1.161-8.131L83.405,392Zm0,0" transform="translate(-59.021 -318.929)"/><path class="af" d="M26.1,424a20.963,20.963,0,0,0,7.511,5.649L31.993,424Zm0,0" transform="translate(-21.233 -344.964)"/><path class="af" d="M35.152,264.628l4.7-3.523v-6.093l-6.484-6.484a20.959,20.959,0,0,0-8.159,6.055L29,262.166Zm0,0" transform="translate(-20.508 -202.2)"/><path class="af" d="M239.762,0h17.895V2.982H239.762Zm0,0" transform="translate(-195.069)"/><path class="af" d="M88.594,333.239l1.067,5.336h6.5l1.068-5.336L92.912,330Zm0,0" transform="translate(-72.079 -268.486)"/><path class="af" d="M227.552,0h-5.965V5.965h-23.86V0h-5.965V11.93h35.79Zm0,0" transform="translate(-156.016)"/><path class="af" d="M156.161,350.025a20.7,20.7,0,0,0,2.782-9.62l-6.1-3.663-7.476,2.492-1.221,6.106,2.341,4.684Zm0,0" transform="translate(-117.275 -273.972)"/><path class="af" d="M95.694,240.572a20.2,20.2,0,0,0-9.55,0l4.775,4.775Zm0,0" transform="translate(-70.087 -195.263)"/><path class="af" d="M255.873,85.965A7.471,7.471,0,0,0,263.178,80H248.566A7.471,7.471,0,0,0,255.873,85.965Zm0,0" transform="translate(-202.232 -65.088)"/><path class="af" d="M132,262.17l2.487-7.463a20.976,20.976,0,0,0-8.247-6.171l-6.482,6.483v6.093l4.743,3.558Zm0,0" transform="translate(-97.437 -202.207)"/><path class="af" d="M242.718,176a10.446,10.446,0,0,0-10.32,8.947h20.639A10.446,10.446,0,0,0,242.718,176Zm1.491,5.965h-2.982v-2.982h2.982Zm0,0" transform="translate(-189.078 -143.193)"/><path class="af" d="M242.718,248.947A10.448,10.448,0,0,0,253.038,240H232.4A10.448,10.448,0,0,0,242.718,248.947Zm-1.491-5.965h2.982v2.982h-2.982Zm0,0" transform="translate(-189.078 -195.263)"/><path class="af" d="M165.447,0V14.912H154.888a10.425,10.425,0,0,1-20.639,0H123.692V0h-11.93V41.755h19.474a13.416,13.416,0,0,1,26.667,0h19.474V0Zm0,0" transform="translate(-90.929)"/><path class="af" d="M194.875,251.93A13.437,13.437,0,0,1,181.541,240h-7.948a23.873,23.873,0,0,1,12.334,20.877c0,.775-.044,1.542-.116,2.3a10.422,10.422,0,0,1,19.383,3.665h10.558v14.912h11.93V240H208.208A13.437,13.437,0,0,1,194.875,251.93Zm0,0" transform="translate(-141.235 -195.263)"/><path class="af" d="M201.375,303.248l3.968,2.38a20.744,20.744,0,0,0-2.35-7.237Zm0,0" transform="translate(-163.838 -242.769)"/><path class="af" d="M162.244,424h-7.22l-.841,5.891A20.963,20.963,0,0,0,162.244,424Zm0,0" transform="translate(-125.443 -344.964)"/><path class="af" d="M239.762,448h17.895v2.982H239.762Zm0,0" transform="translate(-195.069 -364.49)"/><path class="af" d="M173.594,411.93h9.352v-5.965h23.86v5.965h5.965V400h-28.6A23.986,23.986,0,0,1,173.594,411.93Zm0,0" transform="translate(-141.235 -325.438)"/><path class="af" d="M255.873,352a7.471,7.471,0,0,0-7.306,5.965h14.612A7.471,7.471,0,0,0,255.873,352Zm0,0" transform="translate(-202.232 -286.385)"/></svg>
            </div>
            <h4 class="sub_heading">Organize Showcase Games</h4>
            <p class="col-p">Showcase games are organized regularly in Ghana throughout the year. It provides a good opportunity for prospective student athletes in...<br><span class="strong">Learn More</span></p>
            </div>
            <div class="info-desc">
              <p>Showcase games are organized regularly in Ghana throughout the year. It provides a good opportunity for prospective student athletes in Ghana and other West African countries to audition their talent in front of several American College coaches. Ghana Soccer Education Network will allow  American college coaches looking to visit ghana and other west african countries an efficient and effective opportunity to see prospective student athletes play in person. Showcase games serves as a platform where most talents are scouted, so it is a great opportunity for college coaches to see the wealth of talent at display.</p>
            </div>
        </div>
      </div>
      </div>
    </section>
      <!--Mission-->
      <section class="row">
        <?php
        $myquery = new WP_Query('category_name=home-words&posts_per_page=1');
        while ( $myquery->have_posts() ) :
          $myquery->the_post(); ?>
          <h2 class="top_heading text-mt2" id="title_width"><?php the_title() ;?></h2>
          <?php the_content();?>
        <?php
        endwhile; // End of the loop.
        wp_reset_query();
        ?>
      </section>
      <!--Testimonial-->
      <section class="row bgk_change" id="test-row">
        <div class="bck-test">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 335.684 312.43"><defs><style>.t{fill:#fff;}</style></defs><g transform="translate(337.229 232.118) rotate(162)"><g transform="translate(0 5)"><path class="t" d="M52.808,5C23.642,5,0,29.326,0,59.333s23.642,54.333,52.808,54.333c52.8,0,17.6,105.043-52.808,105.043v25.355C125.653,244.063,174.9,5,52.808,5ZM204.939,5c-29.166,0-52.808,24.326-52.808,54.333s23.642,54.333,52.808,54.333c52.8,0,17.6,105.043-52.808,105.043v25.355C277.784,244.063,327.031,5,204.939,5Z" transform="translate(0 -5)"/></g></g></svg>
        </div>
        <h2 class="top_heading">
            Testimonials
        </h2>
        <div class="wrapper"><!--Parent container-->
          <div class="slide-wrap">
          <?php
          $args = array(
            'category_name' => 'testimonial',
            'posts_per_page' => 5,
            'order' => 'ASC'
          );
          $mytestimonials = new WP_Query($args);
          while ( $mytestimonials->have_posts() ) :
            $mytestimonials->the_post();?>
            <div class="words fade">
              <div class="words-img" style="background: url(<?= get_the_post_thumbnail_url();?>) no-repeat top center/cover">
                <?php //the_post_thumbnail();?>
              </div>
              <div class="words-p">
                <?php the_content();?>
              </div>
            </div>
          <?php
          endwhile; // End of the loop.
          wp_reset_query();
          ?>
          </div>
          <a class="prev"><i class="fas fa-chevron-left"></i></a>
          <a class="next"><i class="fas fa-chevron-right"></i></a>
        </div>
      </section>
      <!--Schools-->
      <section class="row" id="school-bck">
        <h2 class="top_heading">
            Schools our talents have played
        </h2>
        <div class="container">
          <div class="logo-schools">
            <div class="ind-school-logo">
              <img src="<?php echo get_template_directory_uri();?>/assests/images/liberty.png" alt="liberty university logo">
              <span class="tooltip">Liberty University</span>
            </div>

            <div class="ind-school-logo">
              <img src="<?php echo get_template_directory_uri();?>/assests/images/Delaware.png" alt="Delaware University logo">
              <span class="tooltip">Delaware University</span>
            </div>

            <div class="ind-school-logo">
              <img src="<?php echo get_template_directory_uri();?>/assests/images/Gccc.png" alt="Garden City Community College logo">
              <span class="tooltip" id="tooltipChange">Garden City Community College</span>
            </div>

            <div class="ind-school-logo">
              <img src="<?php echo get_template_directory_uri();?>/assests/images/newvt.png" alt="Virginia Tech Logo">
              <span class="tooltip">Virginia Tech</span>
            </div>

            <div class="ind-school-logo">
              <img src="<?php echo get_template_directory_uri();?>/assests/images/anderson.png" alt="Anderson University Logo">
              <span class="tooltip">Anderson University</span>
            </div>

            <div class="ind-school-logo">
              <img src="<?php echo get_template_directory_uri();?>/assests/images/st-bonaventure-university.png" alt="St Bonaventure University Logo">
              <span class="tooltip">St Bonaventure University</span>                                          
            </div>

            <div class="ind-school-logo">
              <img src="<?php echo get_template_directory_uri();?>/assests/images/dayton-flyers.png" alt="Dayton Flyers Logo">
              <span class="tooltip">University of Dayton</span>                                          
            </div>
          </div>
        </div>
      </section>
      <!--Register-->
      <section class="row" id="pattern">
        <div class="container">
          <h3 class="sub_heading">
              Start your recruiting process today.
          </h3>
          <a href="<?= home_url();?>/application/" class="btn btn-primary">Register Today</a>
        </div>
      </section>

<?php
get_footer();
