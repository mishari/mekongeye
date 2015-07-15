<?php get_header(); ?>
		
		<div class="main">

		<!-- anchor used by jump-to nav, needed for accessibility -->
		<a name="content"></a>

            <!-- begin left column -->
            <div id="stories-left">

				<?php
		
				$term_idx = -1;
				foreach(get_terms("sections") as $term):
					$term_idx = $term_idx + 1;
					
					// First loop is lede
					$container_id = ($term_idx == 0) ? 'lede' : $term->slug;
					$stories = get_objects_in_term( $term->term_id, "sections" );

				?>
	    			<!-- begin story container -->				
					<section class="sc-container" id="<?php echo $container_id ?>" >
						<?php
						
						if ($term_idx == 0)
						{
							$story_idx = -1;
							foreach($stories as $story):
																
								$story_idx = $story_idx + 1;
								
								$id = $story->id;
								$permalink = get_permalink( $id );
								$large_image = get_field('large_image', $id)["sizes"]["large"];
								$kicker = "";
								if ( get_field('eye_original',$id) ){
									
									$kicker = '<p class="kicker">Eye Original</p>';
									
								}
								
								$title = get_the_title( $id );
								
								$date = DateTime::createFromFormat('Ymd', get_field('dateline', $id));
								$dateline = $date->format('d F Y');
								
								
								if ($story_idx == 0) {
						?>
			                    <!-- begin slice -->
			                    <div class="sc-slice size-xl">
			                        <article class="sc-story option-image">
			                            <a href="<?php echo $permalink; ?>">
			                                <div class="sc-story__hd">
			                                    <img src="<?php echo $large_image; ?>" alt="story preview">
			                                </div>
			                                <div class="sc-story__bd">
			                                    <?php echo $kicker; ?>
			                                    <h4><?php echo $title; ?></h4>
			                                    <p class="dateline"><?php echo $dateline; ?></p>
			                                </div>
			                            </a>
			                        </article>
			                    </div>

					<?php
								}
							endforeach;
						} 
				?>
						
					
	                </section>
	                <!-- end story container -->
				<?php
				endforeach;

				?>
                

                    <!-- begin slice -->
                    <div class="sc-slice size-xl">
                        <article class="sc-story option-image">
                            <a href="#">
                                <div class="sc-story__hd">
                                    <img src="./images/samples/boat-1080px.jpg" alt="story preview">
                                </div>
                                <div class="sc-story__bd">
                                    <p class="kicker">Eye Original</p>
                                    <h4>Small story hed goes here spot for story</h4>
                                    <p class="dateline">25 May 2015</p>
                                </div>
                            </a>
                        </article>
                    </div>


                    <!-- begin slice -->
                    <div class="sc-slice size-md format-3col ">

                        <article class="sc-story option-image">
                            <a href="#">
                                <div class="sc-story__hd">
                                    <img src="./images/samples/ship-64x64px.jpg" alt="story preview">
                                </div>
                                <div class="sc-story__bd">
                                    <p class="kicker">Eye Original</p>
                                    <h4>Small story hed goes here spot for story</h4>
                                    <p class="dateline">25 May 2015</p>
                                </div>
                            </a>
                        </article>

                        <article class="sc-story option-image">
                            <a href="#">
                                <div class="sc-story__hd">
                                    <img src="./images/samples/pelicans-64x64px.jpg" alt="story preview">
                                </div>
                                <div class="sc-story__bd">
                                    <h4>Small story hed goes here spot for story</h4>
                                    <p class="dateline">25 May 2015, <i>External Site Name</i> <img src="./images/arrow-new-site.png" alt=""></p>
                                </div>
                            </a>
                        </article>

                        <article class="sc-story option-image">
                            <a href="#">
                                <div class="sc-story__hd">
                                    <img src="./images/preview-64x64px.jpg" alt="story preview">
                                </div>
                                <div class="sc-story__bd">
                                    <p class="kicker">Opinion</p>
                                    <h4>Small story hed goes here spot for story</h4>
                                    <p class="dateline">25 May 2015</p>
                                </div>
                            </a>
                        </article>

                    </div>
                    <!-- end slice -->




    			<!-- begin story container -->
    			<section class="sc-container">

    				<h2><a href="#">Extractives <i>Mining, minerals, and oil</i> <b>&raquo;</b></a></h2>

    				<!-- begin slice -->
    				<div class="sc-slice size-md format-3col">

    					<article class="sc-story option-image">
    						<a href="#">
    							<div class="sc-story__hd">
    								<img src="./images/samples/seabees-64x64px.jpg" alt="story preview">
    							</div>
    							<div class="sc-story__bd">
    								<p class="kicker">Eye Original</p>
    								<h4>Small story hed goes here spot for story</h4>
    								<p class="dateline">25 May 2015</p>
    							</div>
    						</a>
    					</article>

    					<article class="sc-story option-image">
    						<a href="#">
    							<div class="sc-story__hd">
    								<img src="./images/preview-64x64px.jpg" alt="story preview">
    							</div>
    							<div class="sc-story__bd">
    								<h4>Small story hed goes here spot for story</h4>
    								<p class="dateline">25 May 2015</p>
    							</div>
    						</a>
    					</article>

    					<article class="sc-story ">
    						<a href="#">
    							<div class="sc-story__bd">
    								<h4>If there is no image, show only the text headine for the story</h4>
    								<p class="dateline">25 May 2015</p>
    							</div>
    						</a>
    					</article>

    				</div>
    				<!-- end slice -->

    			</section>
    			<!-- end story container -->

    			<!-- begin story container -->
    			<section class="sc-container">

    				<h2><a href="#">Environment <b>&raquo;</b></a></h2>

    				<!-- begin slice -->
    				<div class="sc-slice size-xl format-color-a ">

    					<article class="sc-story">
    						<a href="#">
                                <div class="sc-story__hd">
                                    <p>&ldquo;This is a teaser for the story. The text might be a quote or a summary of the story.&rdquo;</p>
                                </div>
    							<div class="sc-story__bd">
    								<h4>Extra Large Story Presented Without an Image</h4>
    								<p class="dateline">25 May 2015</p>
    							</div>
    						</a>
    					</article>

    				</div>

    				<!-- begin slice -->
    				<div class="sc-slice size-md format-md-bg format-color-a format-3col">

    					<article class="sc-story option-image">
    						<a href="#">
    							<div class="sc-story__hd">
    								<img src="./images/samples/seabees-64x64px.jpg" alt="story preview">
    							</div>
    							<div class="sc-story__bd">
    								<h4>Small story hed goes here spot for story</h4>
    								<p class="dateline">25 May 2015</p>
    							</div>
    						</a>
    					</article>

    					<article class="sc-story option-image">
    						<a href="#">
    							<div class="sc-story__hd">
    								<img src="./images/samples/pelicans-64x64px.jpg" alt="story preview">
    							</div>
    							<div class="sc-story__bd">
    								<h4>Small story hed goes here spot for story</h4>
    								<p class="dateline">25 May 2015</p>
    							</div>
    						</a>
    					</article>

    					<article class="sc-story ">
    						<a href="#">
    							<div class="sc-story__bd">
    								<p class="kicker">Eye Original</p>
    								<h4>If there is too much text to fit, the stylesheet will cut off the excess text.</h4>
    								<p class="dateline">25 May 2015</p>
    							</div>
    						</a>
    					</article>

    					<article class="sc-story ">
    						<a href="#">
    							<div class="sc-story__bd">
    								<h4>If there is no image, show only the text headine for the story</h4>
    								<p class="dateline">25 May 2015, <i>External Site Name</i> <img src="./images/arrow-new-site.png" alt=""></p>
    							</div>
    						</a>
    					</article>

    					<article class="sc-story option-image">
    						<a href="#">
    							<div class="sc-story__hd">
    								<img src="./images/preview-64x64px.jpg" alt="story preview">
    							</div>
    							<div class="sc-story__bd">
    								<p class="kicker">Opinion</p>
    								<h4>Small story hed goes here spot for story</h4>
    								<p class="dateline">25 May 2015</p>
    							</div>
    						</a>
    					</article>

    					<article class="sc-story ">
    						<a href="#">
    							<div class="sc-story__bd">
    								<h4>If there is no image, show only the text headine for the story</h4>
    								<p class="dateline">25 May 2015</p>
    							</div>
    						</a>
    					</article>

    				</div>
    				<!-- end slice -->

    			</section>
    			<!-- end story container -->


    			<!-- begin story container -->
    			<section class="sc-container">

    				<h2><a href="#">Dams <i>Hydropower, irrigation, and dam construction</i> <b>&raquo;</b></a></h2>

                    <!-- begin slice -->
    				<div class="sc-slice size-xl">

    					<article class="sc-story option-image">
    						<a href="#">
    							<div class="sc-story__hd">
                                    <img src="./images/samples/pelicans-1080x459px.jpg" alt="story preview">
    							</div>
    							<div class="sc-story__bd">
    								<p class="kicker">Kicker</p>
    								<h4>Large story hed goes here spot for story</h4>
    								<p class="dateline">25 May 2015</p>
    							</div>
    						</a>
    					</article>

    				</div>

    				<!-- begin slice -->
    				<div class="sc-slice size-md format-3col">

    					<article class="sc-story option-image">
    						<a href="#">
    							<div class="sc-story__hd">
    								<img src="./images/preview-64x64px.jpg" alt="story preview">
    							</div>
    							<div class="sc-story__bd">
    								<p class="kicker">Eye Original</p>
    								<h4>Small story hed goes here spot for story</h4>
    								<p class="dateline">25 May 2015</p>
    							</div>
    						</a>
    					</article>

    					<article class="sc-story ">
    						<a href="#">
    							<div class="sc-story__bd">
    								<h4>If there is no image, show only the text headine for the story</h4>
    								<p class="dateline">25 May 2015</p>
    							</div>
    						</a>
    					</article>

    					<article class="sc-story ">
    						<a href="#">
    							<div class="sc-story__bd">
    								<h4>If there is no image, show only the text headine for the story</h4>
    								<p class="dateline">25 May 2015</p>
    							</div>
    						</a>
    					</article>

    				</div>
    				<!-- end slice -->

    			</section>
    			<!-- end story container -->


    			<!-- begin story container -->
    			<section class="sc-container">

    				<h2><a href="#">Transportation <b>&raquo;</b></a></h2>

    				<!-- begin slice -->
    				<div class="sc-slice size-xl">

    					<article class="sc-story option-image">
    						<a href="#">
    							<div class="sc-story__hd">
                                    <iframe width='100%' height='320px' frameBorder='0' src="http://tiles.imaginaryterrain.com/dc-baltimore-rail-terrain/map/#12/39.2291/-76.6707"></iframe>
    							</div>
    							<div class="sc-story__bd">
    								<p class="kicker">Kicker</p>
    								<h4>Large story hed goes here spot for story</h4>
    								<p class="dateline">25 May 2015</p>
    							</div>
    						</a>
    					</article>

    				</div>

    				<!-- begin slice -->
    				<div class="sc-slice size-lg">

    					<article class="sc-story option-image">
    						<a href="#">
    							<div class="sc-story__hd">
    								<img src="./images/samples/ship-166x166px.jpg" alt="story preview">
    							</div>
    							<div class="sc-story__bd">
    								<p class="kicker">Eye Original</p>
    								<h4>Small story hed goes here spot for story</h4>
    								<p class="dateline">25 May 2015</p>
    							</div>
    						</a>
    					</article>

    					<article class="sc-story ">
    						<a href="#">
    							<div class="sc-story__bd">
                                    <p class="kicker">Eye Original</p>
    								<h4>If there is no image, show only the text headine for the story</h4>
    								<p class="dateline">25 May 2015, <i>External Site</i> <img src="./images/arrow-new-site.png" alt=""></p>
    							</div>
    						</a>
    					</article>

    					<article class="sc-story ">
    						<a href="#">
    							<div class="sc-story__bd">
    								<h4>If there is no image, show only the text headine for the story</h4>
    								<p class="dateline">25 May 2015</p>
    							</div>
    						</a>
    					</article>

    					<article class="sc-story option-image">
    						<a href="#">
    							<div class="sc-story__hd">
    								<img src="./images/samples/pelicans-166x166px.jpg" alt="story preview">
    							</div>
    							<div class="sc-story__bd">
    								<p class="kicker">Eye Original</p>
    								<h4>Small story hed goes here spot for story</h4>
    								<p class="dateline">25 May 2015</p>
    							</div>
    						</a>
    					</article>

    				</div>
    				<!-- end slice -->

    			</section>
    			<!-- end story container -->

                <!-- begin story container -->
    			<section class="sc-container">

    				<h2><a href="#">Transportation <b>&raquo;</b></a></h2>

    				<!-- begin slice -->
    				<div class="sc-slice size-lg format-color-a">

    					<article class="sc-story option-image">
    						<a href="#">
    							<div class="sc-story__hd">
    								<img src="./images/samples/boat-166x166px.jpg" alt="story preview">
    							</div>
    							<div class="sc-story__bd">
    								<p class="kicker">Eye Original</p>
    								<h4>Small story hed goes here spot for story</h4>
    								<p class="dateline">25 May 2015</p>
    							</div>
    						</a>
    					</article>

    					<article class="sc-story option-image">
    						<a href="#">
                                <div class="sc-story__hd">
    								<img src="./images/samples/interchange-166x166px.jpg" alt="story preview">
    							</div>
    							<div class="sc-story__bd">
                                    <p class="kicker">Opinion</p>
    								<h4>This is a headline</h4>
    								<p class="dateline">25 May 2015, <i>External Site</i> <img src="./images/arrow-new-site.png" alt=""></p>
    							</div>
    						</a>
    					</article>

    					<article class="sc-story ">
    						<a href="#">
    							<div class="sc-story__bd">
                                    <p class="kicker">Eye Original</p>
    								<h4>If there is no image, show only the text headine for the story</h4>
    								<p class="dateline">25 May 2015</p>
    							</div>
    						</a>
    					</article>

    					<article class="sc-story option-image">
    						<a href="#">
    							<div class="sc-story__hd">
    								<img src="./images/samples/pelicans-166x166px.jpg" alt="story preview">
    							</div>
    							<div class="sc-story__bd">
    								<p class="kicker">Eye Original</p>
    								<h4>Small story hed goes here spot for story</h4>
    								<p class="dateline">25 May 2015</p>
    							</div>
    						</a>
    					</article>

    				</div>
    				<!-- end slice -->

    			</section>
    			<!-- end story container -->

            </div>
            <!-- end left column -->

            <!-- begin right column -->
            <div id="stories-right">

                <!-- begin story container for recent stories -->
    			<section class="sc-container" id="recent">

    				<h2 class="alt">NewsStream</h2>

    				<!-- begin slice -->
    				<div class="sc-slice size-xs">

                        <article class="sc-story ">
    						<a href="#">
    							<div class="sc-story__bd">
    								<h4>If there is no image, show only the text headine for the story <i class="dateline">Publication Name</i> <img src="./images/arrow-new-site.png" alt=""></h4>
    							</div>
    						</a>
    					</article>

    					<article class="sc-story">
    						<a href="#">
    							<div class="sc-story__bd">
    								<h4>Small story hed goes here spot for story <i class="dateline">Publication Name</i> <img src="./images/arrow-new-site.png" alt=""></h4>
    							</div>
    						</a>
    					</article>

    					<article class="sc-story">
    						<a href="#">
    							<div class="sc-story__bd">
    								<h4><b class="kicker">Eye Opinion</b> Small story hed goes here spot for story </h4>
    							</div>
    						</a>
    					</article>

    					<article class="sc-story ">
    						<a href="#">
    							<div class="sc-story__bd">
    								<h4>If there is no image, show only the text headine for the story <i class="dateline">Publication Name</i> <img src="./images/arrow-new-site.png" alt=""></h4>
    							</div>
    						</a>
    					</article>

                        <article class="sc-story ">
    						<a href="#">
    							<div class="sc-story__bd">
    								<h4>If there is no image, show only the text headine for the story <i class="dateline">Publication Name</i> <img src="./images/arrow-new-site.png" alt=""></h4>
    							</div>
    						</a>
    					</article>

    					<article class="sc-story">
    						<a href="#">
    							<div class="sc-story__bd">
    								<h4>Small story hed goes here spot for story <i class="dateline">Publication Name</i> <img src="./images/arrow-new-site.png" alt=""></h4>
    							</div>
    						</a>
    					</article>

    					<article class="sc-story">
    						<a href="#">
    							<div class="sc-story__bd">
    								<h4><b class="kicker">Eye Original</b> Small story hed goes here spot for story </h4>
    							</div>
    						</a>
    					</article>

    					<article class="sc-story ">
    						<a href="#">
    							<div class="sc-story__bd">
    								<h4>If there is no image, show only the text headine for the story <i class="dateline">Publication Name</i> <img src="./images/arrow-new-site.png" alt=""></h4>
    							</div>
    						</a>
    					</article>

    					<article class="sc-story">
    						<a href="#">
    							<div class="sc-story__bd">
    								<h4>Small story hed goes here spot for story <i class="dateline">Publication Name</i> <img src="./images/arrow-new-site.png" alt=""></h4>
    							</div>
    						</a>
    					</article>

    					<article class="sc-story">
    						<a href="#">
    							<div class="sc-story__bd">
    								<h4><b class="kicker">Eye Original</b> Small story hed goes here spot for story </h4>
    							</div>
    						</a>
    					</article>

    					<article class="sc-story ">
    						<a href="#">
    							<div class="sc-story__bd">
    								<h4>If there is no image, show only the text headine for the story <i class="dateline">Publication Name</i> <img src="./images/arrow-new-site.png" alt=""></h4>
    							</div>
    						</a>
    					</article>

    					<article class="sc-story">
    						<a href="#">
    							<div class="sc-story__bd">
    								<h4>Small story hed goes here spot for story <i class="dateline">Publication Name</i> <img src="./images/arrow-new-site.png" alt=""></h4>
    							</div>
    						</a>
    					</article>

    					<article class="sc-story">
    						<a href="#">
    							<div class="sc-story__bd">
    								<h4><b class="kicker">Eye Opinion</b> Small story hed goes here spot for story</h4>
    							</div>
    						</a>
    					</article>

    					<article class="sc-story ">
    						<a href="#">
    							<div class="sc-story__bd">
    								<h4>If there is no image, show only the text headine for the story <i class="dateline">Publication Name</i> <img src="./images/arrow-new-site.png" alt=""></h4>
    							</div>
    						</a>
    					</article>

    					<article class="sc-story">
    						<a href="#">
    							<div class="sc-story__bd">
    								<h4>Small story hed goes here spot for story <i class="dateline">Publication Name</i> <img src="./images/arrow-new-site.png" alt=""></h4>
    							</div>
    						</a>
    					</article>

    					<article class="sc-story">
    						<a href="#">
    							<div class="sc-story__bd">
    								<h4><b class="kicker">Eye Opinion</b> Small story hed goes here spot for story </h4>
    							</div>
    						</a>
    					</article>

    					<article class="sc-story ">
    						<a href="#">
    							<div class="sc-story__bd">
    								<h4>Small story hed goes here spot for story <i class="dateline">Publication Name</i> <img src="./images/arrow-new-site.png" alt=""></h4>
    							</div>
    						</a>
    					</article>

    				</div>
    				<!-- end slice -->

    			</section>
    			<!-- end story container -->

                <!-- begin story container for recent releases -->
    			<section class="sc-container" id="">

    				<h2 class="alt">Press Releases</h2>

    				<!-- begin slice -->
    				<div class="sc-slice size-xs">

                        <article class="sc-story ">
    						<a href="#">
    							<div class="sc-story__bd">
    								<h4>If there is no image, show only the text headine for the story <i class="dateline">25 May 2015</i></h4>
    							</div>
    						</a>
    					</article>

    					<article class="sc-story">
    						<a href="#">
    							<div class="sc-story__bd">
    								<h4>Small story hed goes here spot for story <i class="dateline">25 May 2015</i></h4>
    							</div>
    						</a>
    					</article>

    					<article class="sc-story">
    						<a href="#">
    							<div class="sc-story__bd">
    								<h4>Small story hed goes here spot for story <i class="dateline">25 May 2015</i></h4>
    							</div>
    						</a>
    					</article>

    					<article class="sc-story ">
    						<a href="#">
    							<div class="sc-story__bd">
    								<h4>If there is no image, show only the text headine for the story <i class="dateline">25 May 2015</i></h4>
    							</div>
    						</a>
    					</article>

    					<article class="sc-story">
    						<a href="#">
    							<div class="sc-story__bd">
    								<h4>Small story hed goes here spot for story <i class="dateline">25 May 2015</i></h4>
    							</div>
    						</a>
    					</article>


    					<article class="sc-story">
    						<a href="#">
    							<div class="sc-story__bd">
    								<h4>Small story hed goes here spot for story <i class="dateline">25 May 2015</i></h4>
    							</div>
    						</a>
    					</article>

    					<article class="sc-story ">
    						<a href="#">
    							<div class="sc-story__bd">
    								<h4>Small story hed goes here spot for story <i class="dateline">25 May 2015</i></h4>
    							</div>
    						</a>
    					</article>

    				</div>
    				<!-- end slice -->

    			</section>
    			<!-- end story container -->

                <!-- begin story container -->
    			<section class="sc-container">

    				<h2 class="alt"><a href="#">Most Read <i>Further text here</i> <b>&raquo;</b></a></h2>

    				<!-- begin slice -->
    				<div class="sc-slice size-sm">

    					<article class="sc-story ">
    						<a href="#">
    							<div class="sc-story__bd">
    								<h4>If there is no image, show only the text headine for the story <i class="dateline">25 May 2015</i></h4>
    							</div>
    						</a>
    					</article>

    					<article class="sc-story">
    						<a href="#">
    							<div class="sc-story__bd">
    								<h4>Small story hed goes here spot for story <i class="dateline">25 May 2015</i></h4>
    							</div>
    						</a>
    					</article>

    					<article class="sc-story">
    						<a href="#">
    							<div class="sc-story__bd">
    								<h4><b class="kicker">Kicker</b> Small story hed goes here spot for story <i class="dateline">25 May 2015</i></h4>
    							</div>
    						</a>
    					</article>

    					<article class="sc-story ">
    						<a href="#">
    							<div class="sc-story__bd">
    								<h4>If there is no image, show only the text headine for the story <i class="dateline">25 May 2015</i></h4>
    							</div>
    						</a>
    					</article>

    					<article class="sc-story">
    						<a href="#">
    							<div class="sc-story__bd">
    								<h4>Small story hed goes here spot for story <i class="dateline">25 May 2015</i></h4>
    							</div>
    						</a>
    					</article>


    					<article class="sc-story">
    						<a href="#">
    							<div class="sc-story__bd">
    								<h4><b class="kicker">Opinion</b> Small story hed goes here spot for story <i class="dateline">25 May 2015</i></h4>
    							</div>
    						</a>
    					</article>

    					<article class="sc-story ">
    						<a href="#">
    							<div class="sc-story__bd">
    								<h4>Small story hed goes here spot for story <i class="dateline">25 May 2015</i></h4>
    							</div>
    						</a>
    					</article>

    				</div>
    				<!-- end slice -->

    			</section>
    			<!-- end story container -->

                <div id="subscribe-right">

    				<h3>Subscribe</h3>

    			</div>


            </div>
            <!-- end right column -->

		</div>
        <!-- end main -->

<?php get_footer(); ?>