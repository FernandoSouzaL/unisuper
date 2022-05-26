<div class="c-shop__item">
                  <div class="c-shop__img">
                    <img src="<?php echo get_field('image'); ?>">
                  </div>
                  <div class="c-shop__txt">
                    <?php $terms = get_the_terms( $post->ID, 'cidade' ); 
                          $term = array_shift( $terms ); ?>
                    <h2 class="o-ttl--20"><?php the_title(); ?> - <?php echo $term->name; ?></h2>

                    <p class="c-shop__icon">
                      <svg width="20" height="20">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#pin" />
                      </svg>
                      <?php echo get_field('street'); ?>
                    </p>

                    <p class="c-shop__icon">
                      <svg width="20" height="20" style="color: #009A4D;">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#telphone" />
                      </svg>
                      <?php echo get_field('telphones'); ?>
                    </p>

                    <p class="c-shop__icon">
                      <svg width="20" height="20">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#whatsapp2" />
                      </svg>
                      <?php echo get_field('whastsapp'); ?>
                    </p>

                    <h3 class="o-ttl--medium o-ttl--16">Horário de Atendimento</h3>

                    <p>
                      <?php echo get_field('open_time'); ?>
                    </p>
                  </div>
                </div>