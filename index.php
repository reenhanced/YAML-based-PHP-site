<?
require('includes/spyc/spyc.php5');

$artists = Spyc::YAMLLoad('config/artists.yml');
$sponsors = Spyc::YAMLLoad('config/sponsors.yml');

?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
  "http://www.w3.org/TR/html4/strict.dtd">
<html>
  <head>
    <title>The Rolling Canvas Art Collective</title>
    <link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
    <script type="text/javascript" src="js/mootools.js"></script>
  	<script type="text/javascript" src="js/slimbox.js"></script>
  	<link rel="stylesheet" href="css/slimbox.css" type="text/css" media="screen" />
    
  </head>
  
  <body><a name="top"></a>
    <div id="header">
      
      <div id="logo">
        <img src="images/logo.gif" width="365" height="287">
      </div>
      <div id="title">
        <img src="images/title.gif" width="315" height="166" alt=" The Rolling Canvas Art Collective
        Presented by Fuji Bikes
        With Jinxed Philadelphia and
        R.E. Load Baggage
        August 1st 7PM at Media Bureau ">

				<div id="header_copy">
          <p>Created to celebrate the union of the art and urban bicycle cultures, 
          the Rolling Canvas Art Collective will highlight and encourage the use of bicycles as a means of artistic expression.</p>

          <p>These twenty-plus artists will recreate basic, fixed gear bicycles 
            into one-of-a-kind representations of their creative methods ranging from 
            sculpture and metal work, to street art and paint. The art installations 
            will be auctioned off to the public, with each artist donating a 
            portion of the proceeds to 
            <a href="http://www.neighborhoodbikeworks.org/">Neighborhood Bike Works of Philadelphia</a>.</p>

			<p>A public gallery opening and auction will be held on Friday night, 
				August 1st, 7:00 PM at Media Bureau Gallery in the Northern Liberties
				section of Philadelphia. The exhibit is open to the public through the end of August.</p>
			
			<p>A public online auction will begin on Monday, August 4th at 12 PM EST
				and run through Thursday, August 14th at 12 PM EST. Photos of the pieces 
				and auction links will be posted online as they become available.</p>
          </div>
      </div>
      <div id="artist_list">
        <h2>Featured Artists</h2>
        <ul>
        <?php foreach ($artists as $name => $artist): ?>
          <li><a href="#<?= htmlentities($name); ?>"><?= $name ?></a></li>
        <?php endforeach ?>
        </ul>
      </div>
      
      <div class="clear"></div>
    </div>
    
    <div id="sponsors">
      <?php foreach ($sponsors as $id => $sponsor): ?>
        <div id="sponsor-<?= $id ?>" class="sponsor">
          <? if (isset($sponsor['href'])): ?>
            <a href="<?= $sponsor['href'] ?>">
          <? endif; ?>
          
          <? if (isset($sponsor['image'])): ?>
            <img src="<?= $sponsor['image'] ?>" alt="<?= $sponsor['name'] ?>" title="<?= $sponsor['name'] ?>">
          <? elseif (isset($sponsor['name'])): ?>
            <h3><?= $sponsor['name'] ?></h3>
          <? endif; ?>
          
          <? if (isset($sponsor['href'])): ?>
            </a>
          <? endif; ?>
            
        </div>
      <?php endforeach ?>
      
    </div>
    
    <div class="clear"></div>
    
    <div id="artists">
      <?php foreach ($artists as $name => $artist): ?>
        <div class='line'></div>
        
        <div id="artist-<?= htmlentities($name); ?>" class="artist">
          <div class="artist_left">
            <h2><a name="<?= htmlentities($name); ?>"></a><?= $name ?></h2>
            
            <? if (isset($artist['details'])): ?>
              <p><?= $artist['details'] ?></p>
            <? else: ?>
              <p>Artist biography coming soon!</p>
            <? endif; ?>
            
            <? if (isset($artist['url'])): ?>
              <div class="artist_site">
                <a href="<?= $artist['url']['href']; ?>"><?= $artist['url']['display']; ?></a>
              </div>
            <? endif; ?>
            
          </div>
          
          <div class="artist_right">
            <div class="back_to_top">
              <a href="#top">back to top</a>
            </div>
            
            <? if (isset($artist['auction'])): ?>
              <a href="<?= $artist['auction'] ?>" class="auction_link">Bid on <?= $name ?>'s bike</a>
            <? endif; ?>
            
            <div class="artist_images">
              <? if (isset($artist['images']) && count($artist['images']) > 0): ?>
              
                <?php foreach ($artist['images'] as $image): ?>
                  <div class="artist_image">
                    <? if (isset($image['full'])): ?>
                      <a href="<?= $image['full'] ?>" rel="lightbox[<?= htmlentities($name); ?>]">
                    <? endif;?>
                    
                    <img src="<?= $image['thumb'] ?>">
                    
                    <? if (isset($image['full'])): ?>
                      </a>
                    <? endif;?>
                    
                  </div>
                <?php endforeach ?>
              
              <? else: ?>
                <?php for ($i = 0; $i < 3; $i++): ?>
                  <div class="artist_image">
                    <img src="images/coming-soon.jpg" width='100' height='100'>
                  </div>
                <? endfor ?>
              <? endif; ?>
            </div>
          </div>
          
          <div class="clear"></div>
        </div>
      <?php endforeach ?>
      
    </div>
    
  </body>
</html>