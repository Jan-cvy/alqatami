<?php
use Alqatami\Theme\App\Image;
?>

<?php get_header(); ?>

<section class="section">
    <div class="wrapper">
        <div class="content">
          <div class="row row-2">
            <div class="col page__content">
              <p>ATELIER AZIZ AL QATAMI<br>
              Award winning achitecture known for creating innovative designs around the world. Provides integrated design services including architecture, public space design, interior design, and master planning.<br>
              Focus on contemporary design in urban environments.</p>

              <p>ABOUT AZIZ AL QATAMI<br>
              Named as one of 15 Young Arab Architects by Venice Biennale 2012 & L’institut du Monde Arabe. Guest critic of Columbia University (New York), Pratt Institute (New York), Kuwait University (Kuwait).<br>
              Photographers : <a href="" class="italic" target="_blank">Nelson Garrido</a>, <a href="" target="_blank" class="italic">Uwe Wruck</a></p>

              <ul>
                <li>
                  <span>2005</span>Graduate from Pratt Institute school of Architecture (New York).</li>
                <li>
                  <span>2007</span>Graduate from Columbia University Graduate School of Architecture, Planning and Preservation (New York).</li>
                <li>
                  <span>2007-08</span>Jr. Architect of OOS Architects (Zurich).</li>
                <li>
                  <span>2008</span>Architect of Masafa Designers (Kuwait).</li>
                <li>
                  <span>2009-</span>Established Atelier Aziz Alqatami (Kuwait).</li>
              </ul>

              <p>
              CONTACT<br>
              <a href="/contact/">aziz@atelierazizalqatami.com</a><br>
              <a href="https://www.google.fr/maps/place/Baghdad+St,+Salmiya,+Kowe%C3%AFt/@29.3369624,48.0466347,16z/data=!4m8!1m2!2m1!1sSalmiya+Baghdad+Street+Building+106,+floor+5+Postal+Code+20011,+Kuwait!3m4!1s0x3fcf9da46deae3cb:0x34de49f9e65ed4df!8m2!3d29.3367464!4d48.050825?hl=fr" target="_blank" class="italic">Salmiya, Block 11<br>
              Baghdad Street<br>
              Building 106, floor 5<br>
              Postal Code 20011, Kuwait</a><br>
              T. 965 99655422
              </p>

              <p><a href="/contact/">Contact me</a></p>
            </div>
            <div class="col col-first page__image">
              <?php 
              Image\get_responsive_featured_image( array( 
                'ID' => get_the_ID(),
                'width' => 768,
                'height' => 512,
                'class' => 'rs',
                'sizes' => '50vw',
                'crop' => false
              ) );
              ?>
            </div>
          </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
